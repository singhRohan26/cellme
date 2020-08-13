<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Admin  controller.
	 * Created By Ram Yadav
	 
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('User_model');
	}
	
	public function index(){
	    if(!empty($this->is_login())){
			redirect(base_url('User/dashboard'));
		}
	    
	    $data['title'] = 'User Login';
	    $this->load->view('user/login',$data);
	    
	}
	
	public function forgotPassword(){
	    $data['title'] = "Forgot Password";
		$this->load->view('user/forgot-password', $data);
	}
	
	public function doLogin(){
	    $this->output->set_content_type('application/json');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() === FALSE) {
			$this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
			return FALSE;
		}
		$result = $this->User_model->checkLogin();
		if ($result) {
			$this->session->set_userdata('email', $result['email']);
			$this->output->set_output(json_encode(['result' => 1, 'url' => base_url("User/dashboard"), 'msg' => 'Loading..']));
			return FALSE;
		} else {
			$this->output->set_output(json_encode(['result' => -1, 'msg' => 'Invalid username or password']));
			return FALSE;
		}
	}
	
	public function doForgotPassword(){
        $this->output->set_content_type('application/json');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		if ($this->form_validation->run() === FALSE) {
			$this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
			return FALSE;
		}
		$result = $this->User_model->getEmailId();
		if ($result) {
			$password = substr(md5(uniqid()), 0, 6);
			$this->User_model->updatePassword($password);
			$this->send_forgot_password_link($password, $result['full_name'], $result['email']);
			$this->output->set_output(json_encode(['result' => 1, 'url' => base_url("user"), 'msg' => 'Reset password link sent to your email.!']));
			return FALSE;
		} else {
			$this->output->set_output(json_encode(['result' => -1, 'msg' => 'This email-id does not exist']));
			return FALSE;
		}
    }
    
     private function send_forgot_password_link($password, $name, $email) {
        $config = array(
            'mailtype' => 'html',
        );
        $this->load->library('email',$config);
        $htmlContent = "<div>Hi " . $name . ",</div>";
        $htmlContent .= "your new  password is ".$password;
        $this->email->to($email);
        $this->email->from('info@cellme.com', 'Admin');
        $this->email->subject('Hey! ' . $name . ',  Forgot Password?');
        $this->email->message($htmlContent);
        $this->email->send();
        return true;
    }
	
	public function dashboard(){
	    if(empty($this->is_login())){
			redirect(base_url('User'));
		}
	    
	    $data['title'] = 'Dashboard';
	    $data['userData'] = $this->getLoginDetail();
	    $user_id = $data['userData']['user_id'];
	    $data['sellmeCount'] = $this->User_model->sellmeCount($user_id);
	    $data['warrantyCount'] = $this->User_model->warrantyCount($user_id);
	    $this->load->view('user/commons/header',$data);
	    $this->load->view('user/commons/sidebar');
	    $this->load->view('user/index');
	    $this->load->view('user/commons/footer');
	}
	
	private function is_login(){
		return $this->session->userdata('email');
	}
	
	private function getLoginDetail(){
		$email = $this->session->userdata('email');
		return $this->User_model->getLoginDetail($email);
	}
    
    public function logout() {
		$this->session->unset_userdata('email');
		redirect(base_url('User'));
	}
	
	public function changePassword(){
	  if(empty($this->is_login())){
			redirect(base_url('User'));
		}
	    
	    $data['title'] = 'Change Password';
	    $data['userData'] = $this->getLoginDetail();
	    $this->load->view('user/commons/header',$data);
	    $this->load->view('user/commons/sidebar');
	    $this->load->view('user/changePassword');
	    $this->load->view('user/commons/footer');  
	}
	
	public function doChangePass(){
		$this->output->set_content_type('application/json');
		$this->form_validation->set_rules('opass', 'Old Password', 'required');
		if ($this->form_validation->run() === FALSE) {
			$this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
			return FALSE;
		}
		$this->form_validation->set_rules('npass', 'New Password', 'required|min_length[6]');
		$this->form_validation->set_rules('cpass', 'Confirm Password', 'required|min_length[6]|matches[npass]');
		$userData = $this->getLoginDetail();
		if($userData['password'] != $this->security->xss_clean(hash('sha256', $this->input->post('opass')))){
			$err['opass'] = 'Old Password is incorrect';
			$this->output->set_output(json_encode(['result' => 0, 'errors' => $err]));
			return FALSE;
		}
		if ($this->form_validation->run() === FALSE) {
			$this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
			return FALSE;
		}
		$result = $this->User_model->doChangePass();
		if ($result) {
			$this->output->set_output(json_encode(['result' => 1, 'url' => base_url("User/changePassword"), 'msg' => 'Password Changed Successfully..']));
			return FALSE;
		} else {
			$this->output->set_output(json_encode(['result' => -1, 'msg' => 'Old Password and new password should not be same']));
			return FALSE;
		}
	}
	
	public function editProfile(){
	    if(empty($this->is_login())){
			redirect(base_url('User'));
		}
	    
	    $data['title'] = 'Edit Profile';
	    $data['userData'] = $this->getLoginDetail();
	    $this->load->view('user/commons/header',$data);
	    $this->load->view('user/commons/sidebar');
	    $this->load->view('user/edit-profile');
	    $this->load->view('user/commons/footer');
	}
	
	public function doChangeProfile($admin_id){
        $this->output->set_content_type('application/json');
        	$this->form_validation->set_rules('admin_name','admin name','trim|required');

        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        if (!empty($_FILES['image_url']['name'])) {
            $img = $this->uploadImage();
            if ($img == 0) {
                $errors = $this->session->userdata('errors');
                $this->session->unset_userdata('errors');
                $this->output->set_output(json_encode(['result' => -2, 'errors' => $errors]));
                return false;
            }
        }
        else {
            $user = $this->User_model->get_login_data($admin_id);
            $img = $user['image_url'];
        }
        $result = $this->User_model->doChangeProfile($admin_id,$img);
        if (!empty($result)) {
            $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('User/editProfile/' .$admin_id), 'msg' => 'Successfully saved your changes!']));
            return FALSE;
            
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'No Chnages Found Here','url' => base_url('User/editProfile/' .$admin_id)]));
            return FALSE;
        }
    }

    public function uploadImage() {
        $file_name = $_FILES['image_url']['name'];
        $file_tmpname = $_FILES['image_url']['tmp_name'];
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $allowed_type = array("jpeg", "jpg", "png", "gif");
        if (in_array(strtolower($ext), $allowed_type)) {
            if ($_FILES["image_url"]["size"] > 6000000) {
                $this->session->set_userdata('errors', ['image_url' => 'Sorry, your file is too large.']);
                return 0;
            }
            $new_file_name = rand(111111, 999999) . '.' . $ext;
            move_uploaded_file($file_tmpname, './uploads/users-profile/' . $new_file_name);
            return $new_file_name;
        } else {
            $this->session->set_userdata('errors', ['image_url' => '.' . $ext . ' Extension Not Allowed Here...']);
            return 0;
        }
    }
    
    public function warrantyPhoneList(){
        if(empty($this->is_login())){
			redirect(base_url('User'));
		}
        $user_id =  $this->getLoginDetail()['user_id'];
        $data['warranty'] = $this->User_model->warrantyPhoneList($user_id);
        $data['title'] = 'Warranty List';
	    $data['userData'] = $this->getLoginDetail();
	    $this->load->view('user/commons/header',$data);
	    $this->load->view('user/commons/sidebar');
	    $this->load->view('user/warrantyList');
	    $this->load->view('user/commons/footer'); 
        
    }
    public function warrantyInfo($device_id){
       if(empty($this->is_login())){
			redirect(base_url('User'));
		}
	    $user_id =  $this->getLoginDetail()['user_id'];
        $data['title'] = 'Warranty Info';
	    $data['userData'] = $this->getLoginDetail();
	    $data['warranty'] = $this->User_model->warrantyInfo($device_id);
	    $this->load->view('user/commons/header',$data);
	    $this->load->view('user/commons/sidebar');
	    $this->load->view('user/warranty_info');
	    $this->load->view('user/commons/footer'); 	
		
		
    }
    
    public function dispatchedPhoneList(){
       if(empty($this->is_login())){
			redirect(base_url('User'));
		}
        $user_id =  $this->getLoginDetail()['user_id'];
        $data['sellme'] = $this->User_model->dispatchedList($user_id);
        // print_r($data['sellme']);die;
        $data['title'] = 'Dispatched List';
	    $data['userData'] = $this->getLoginDetail();
	    $this->load->view('user/commons/header',$data);
	    $this->load->view('user/commons/sidebar');
	    $this->load->view('user/dispatchedList');
	    $this->load->view('user/commons/footer');  
    }
    
    public function dispatchedInfo($device_id){
       if(empty($this->is_login())){
			redirect(base_url('User'));
		}
        $user_id =  $this->getLoginDetail()['user_id']; 
        $data['title'] = 'Dispatched Info';
	    $data['userData'] = $this->getLoginDetail();
	    $data['dispatch'] = $this->User_model->dispatchedInfo($device_id);
	    $this->load->view('user/commons/header',$data);
	    $this->load->view('user/commons/sidebar');
	    $this->load->view('user/dispatch_info');
	    $this->load->view('user/commons/footer');  
    }
    
    public function changeStatus($device_id){
        $this->output->set_content_type('application/json');
        $status = $this->input->post('status');
        $result = $this->User_model->changeStatus($device_id,$status);
        if($result){
          $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('dispatchedInfo/'.$device_id), 'msg' => 'Successfully saved your changes!']));
            return FALSE;  
        }else{
            $this->output->set_output(json_encode(['result' => 1, 'url' => $_SERVER['HTTP_REFERER'], 'msg' => 'Failed']));
            return FALSE;  
        }
        
    }
    
	
	



}
