<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Admin  controller.
	 * Created By Ram Yadav
	 
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('Admin_model');
	}


	public function index()
	{
		if(!empty($this->is_login())){
			redirect(base_url('admin/dashboard'));
		}
		$data['title'] = "Login Page";
		$this->load->view('admin/login', $data);
	}

	public function forgot_password()
	{
		$data['title'] = "Forgot Password";
		$this->load->view('admin/forgot-password', $data);
	}

	public function doLogin(){
		$this->output->set_content_type('application/json');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() === FALSE) {
			$this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
			return FALSE;
		}
		$result = $this->Admin_model->checkLogin();
		if ($result) {
			$this->session->set_userdata('email', $result['email']);
			$this->output->set_output(json_encode(['result' => 1, 'url' => base_url("admin/dashboard"), 'msg' => 'Loading..']));
			return FALSE;
		} else {
			$this->output->set_output(json_encode(['result' => -1, 'msg' => 'Invalid username or password']));
			return FALSE;
		}
	}

	private function is_login(){
		return $this->session->userdata('email');
	}


	private function getLoginDetail(){
		$email = $this->session->userdata('email');
		return $this->Admin_model->getLoginDetail($email);
	}
	public function dashboard(){
		if(empty($this->is_login())){
			redirect(base_url('admin'));
		}
		$data['title'] = "Dashboard";
		$data['admin_info'] = $this->Admin_model->getLoginDetail($this->session->userdata('email'));
		$data['notications'] = $this->Admin_model->count_booking();
		$data['count_book'] = $this->Admin_model->count_booking();
		$data['count'] = $this->Admin_model->count_user();
		$data['admin_info'] = $this->getLoginDetail();
		$this->load->view('admin/commons/header', $data);
		$this->load->view('admin/commons/sidebar');
		$this->load->view('admin/index');
		$this->load->view('admin/commons/footer');
	}


    public function doForgotPassword(){
        $this->output->set_content_type('application/json');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		if ($this->form_validation->run() === FALSE) {
			$this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
			return FALSE;
		}
		$result = $this->Admin_model->getEmailId();
		if ($result) {
			$password = substr(md5(uniqid()), 0, 6);
			$this->Admin_model->updatePassword($password);
			// $this->send_forgot_password_link($password, $result['name'], $result['email']);
			$this->output->set_output(json_encode(['result' => 1, 'url' => base_url("admin"), 'msg' => 'Reset password link sent to your email.!']));
			return FALSE;
		} else {
			$this->output->set_output(json_encode(['result' => -1, 'msg' => 'Invalid Email ID...']));
			return FALSE;
		}
    }

    private function send_forgot_password_link($password, $name, $email) {
        $config = array(
            'mailtype' => 'html',
        );
        $this->load->library('email',$config);
        $htmlContent = "<div>Hi " . $name . ",</div>";
        $htmlContent .= "<div style='padding-top:8px;'>your password is ".$password."</div>";
        $this->email->to($email);
        $this->email->from('info@admin.com', 'Admin');
        $this->email->subject('Hey!, ' . $name . ' Forgot Password');
        $this->email->message($htmlContent);
        $this->email->send();
        return true;
    }

	public function change_password(){
		if(empty($this->is_login())){
			redirect(base_url('admin'));
		}
		$data['admin_info'] = $this->getLoginDetail();
		$data['notications'] = $this->Admin_model->count_booking();
		$data['title'] = "Change Password";
		$this->load->view('admin/commons/header', $data);
		$this->load->view('admin/commons/sidebar');
		$this->load->view('admin/change_password');
		$this->load->view('admin/commons/footer');
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
		$result = $this->Admin_model->doChangePass();
		if ($result) {
			$this->output->set_output(json_encode(['result' => 1, 'url' => base_url("admin/change_password"), 'msg' => 'Password Changed Successfully..']));
			return FALSE;
		} else {
			$this->output->set_output(json_encode(['result' => -1, 'msg' => 'Old Password and new password should not be same']));
			return FALSE;
		}
	}

	public function table(){
		if(empty($this->is_login())){
			redirect(base_url('admin'));
		}
		$data['title'] = "Tables";
		$this->load->view('admin/commons/header', $data);
		$this->load->view('admin/commons/sidebar');
		$this->load->view('admin/tables');
		$this->load->view('admin/commons/footer');
	}
//<------------------user list------------------------------------>

	public function edit_profile($id){
		if(empty($this->is_login())){
			redirect(base_url('admin'));
		}
		$data['title'] = "edit profile";
		$data['profileData'] = $this->Admin_model->edit_profile($id);
		$data['admin_info'] = $this->getLoginDetail();
		$data['notications'] = $this->Admin_model->count_booking();
		$this->load->view('admin/commons/header', $data);
		$this->load->view('admin/commons/sidebar');
		$this->load->view('admin/edit-profile');
		$this->load->view('admin/commons/footer');
	}

	public function doChangeProfile($admin_id){
        $this->output->set_content_type('application/json');
        	$this->form_validation->set_rules('admin_name','admin name','trim|required');
		$this->form_validation->set_rules('email_id','Email','required|valid_email');

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
            $user = $this->Admin_model->get_login_data($admin_id);
            $img = $user['image_url'];
        }
        $result = $this->Admin_model->doChangeProfile($admin_id,$img);
        if (!empty($result)) {
            $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('admin/edit-profile/' .$admin_id), 'msg' => 'Successfully saved your changes!']));
            return FALSE;
            
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'No Chnages Found Here','url' => base_url('admin/edit-profile/' .$admin_id)]));
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
            move_uploaded_file($file_tmpname, './uploads/admin-profile/' . $new_file_name);
            return $new_file_name;
        } else {
            $this->session->set_userdata('errors', ['image_url' => '.' . $ext . ' Extension Not Allowed Here...']);
            return 0;
        }
    }

	
	public function logout() {
		$this->session->unset_userdata('email');
		redirect(base_url('admin'));
	}

}
