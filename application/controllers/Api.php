<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Api extends Ci_Controller {

    /**
     * __construct
     *
     * @return void
     */
    public function __construct() {

        parent::__construct();
        $this->load->model(['Api_model']);
    }

    public function index() {
        echo "Hey varun";
        exit;
    }
    
    public function uniqueId() {
        $str = '123456789';
        $nstr = str_shuffle($str);
        $unique_id = substr($nstr, 0, 4);
        return $unique_id;
    }

    public function login_register() {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('country_code', 'Country Code', 'required');
        $this->form_validation->set_rules('mobile_no', 'Mobile Number', 'required|min_length[8]|max_length[16]');
        $this->form_validation->set_rules('token_id', 'Token Id', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[15]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]');
        if ($this->form_validation->run() === false) {
            $this->output->set_output(json_encode(['result' => 0, 'msg' => $this->form_validation->error_array()]));
            return false;
        }
        $email = $this->security->xss_clean($this->input->post('email'));
        $already_register = $this->Api_model->check_useraccount($email);
        if($already_register){
            $this->output->set_output(json_encode(['result' => 0, 'msg' => 'This Mail Id is already Registered']));
            return false;
        } 
        $mobile_no = $this->security->xss_clean($this->input->post('mobile_no'));
        $already_register_mobile = $this->Api_model->check_useraccount_mobile($mobile_no);
        if($already_register_mobile){
            $this->output->set_output(json_encode(['result' => 0, 'msg' => 'This Mobile No. is already Registered']));
            return false;
        }
        $tokenid = $this->security->xss_clean($this->input->post('token_id'));
        $already_register = $this->Api_model->check_useraccount($email);
        if (!empty($already_register)) {
    
                if (!empty($already_register['status'] === 'Active')) {
                    $sended = $this->send_tokenid($already_register['user_id'], $tokenid);
                    $users_info = $this->Api_model->get_userdata($already_register['user_id']);
                    if (!empty($users_info['profile_url'])) {
                        $users_info['image_url'] = base_url('uploads/users-profile/' . $users_info['profile_url']);
                    } else {
                        $users_info['image_url'] = NULL;
                    }
                    $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Registered successfully!', 'data' => $users_info]));
                    return true;
                } else {
                    $this->output->set_output(json_encode(['result' => -1, 'msg' => 'You are block by admin!', 'data' => Null]));
                    return false;
                }
           
        } else {
            $registered = $this->Api_model->user_register();
            $testing_id = $this->input->post('testing_id');
            $device_id =  $this->input->post('device_id');
            if(!empty($testing_id || $device_id)){
                $this->Api_model->updateUserId($testing_id,$device_id,$registered['user_id']);
            }
            $sended = $this->send_tokenid($registered['user_id'], $tokenid);
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Registered successfully!', 'data' => $registered]));
            return true;
        }
    }

    public function send_tokenid($user_id, $tokenid) {

        $this->output->set_content_type('application/json');
        $already = $this->Api_model->check_alreadyexist($user_id, $tokenid);
        if (!empty($already > 0)) {
            $token_update = array(
                'token_id' => $tokenid,
                'status' => 'Active'
            );
            $results = $this->Api_model->update_tokenid($token_update);
            if ($results) {
                $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Data successfully Added', 'data' => 'Data successfully Added.']));
                return true;
            } else {
                $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Data did not successfully Added.', 'data' => 'Data did not successfully Added.']));
                return false;
            }
        } else {
            $token_info = array(
                'user_id' => $user_id,
                'token_id' => $tokenid
            );

            $results = $this->Api_model->insert_tokenid($token_info);
            if ($results) {
                $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Data successfully Added', 'data' => 'Data successfully Added.']));
                return true;
            } else {
                $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Data did not successfully Added.', 'data' => 'Data did not successfully Added.']));
                return false;
            }
        }
    }

    public function login(){
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('user_name', 'User Name', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('token_id', 'Token Id', 'trim|required');
        if ($this->form_validation->run() === false) {
            $this->output->set_output(json_encode(['result' => 0, 'msg' => $this->form_validation->error_array()]));
            return false;
        }
        $email = $this->security->xss_clean($this->input->post('user_name'));
        $password = $this->security->xss_clean(hash('sha256', $this->input->post('password')));
        $results = $this->Api_model->login($email,$password);
        if ($results) {
            
            $testing_id = $this->input->post('testing_id');
            $device_id =  $this->input->post('device_id');
            if(!empty($testing_id || $device_id)){
                $this->Api_model->updateUserId($testing_id,$device_id,$results['user_id']);
            }
            if (!empty($results['image_url'])) {
                $results['image_url'] = base_url('uploads/users-profile/' . $results['image_url']);
            } else {
                $results['image_url'] = null;
            }
            $tokenid = $this->input->post('token_id');
            $sended = $this->send_tokenid($results['user_id'], $tokenid);
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Login successfully!', 'data' => $results]));
            return true;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Email ID or Password is not correct!!', 'data' => 'Email ID or Password is not correct!!']));
            return false;
        }
    }

     /**
     * changes_password Using this function user change password!
     *
     * @return void
     */

        public function change_password(){
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('user_id', 'User ID', 'trim|required');
        $this->form_validation->set_rules('current_password', 'Current Password', 'trim|required');
        if ($this->form_validation->run() === false) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return false;
        }
        $checked = $this->Api_model->check_oldpassword();
        if (!empty($checked)) {
            $this->form_validation->set_rules('password', 'New Password', 'trim|required|min_length[6]|max_length[15]');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]');
            if ($this->form_validation->run() === false) {
                $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
                return false;
            }
            $results = $this->Api_model->change_password($checked['user_id']);
            if ($results) {
                $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Password change successfully!', 'data' => 'Password change successfully!']));
                return true;
            } else {
                $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Password not change successfully!', 'data' => 'Password not change successfully!']));
                return false;
            }
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Failed! Your current password not matched!', 'data' => 'Failed! Your current password not matched!']));
            return false;
        }
    }
    

    /**
     * forgot_password change user password here!
     *
     * @return void
     */

    public function forgot_password(){
         $this->output->set_content_type('application/json');
         $this->form_validation->set_rules('number','Number','required');
         if($this->form_validation->run() === false){
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
         }
         $number = $this->security->xss_clean($this->input->post('number'));
         $results = $this->Api_model->check_phone($number);
         if ($results){
//            $this->send_forgot_password_link($results);
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Otp sent','data'=>$results['user_id']]));
            return true;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Your Phone number does not exist! Try again..']));
            return false;
        }
    }

//    public function send_forgot_password_link($results)
//    {
//        $this->load->library('email');
//        $getEmailResponse = $this->Api_model->insert_user_activationcode($results['user_id']);
//
//        $htmlContent = "<h3>Dear " . $results['full_name'] . ",</h3>";
//        $htmlContent .= "<div style='padding-top:8px;'>Please click The following link For Update your password..</div>";
//        $htmlContent .= "<a href='" . base_url('api/reset-password/' . $results['user_id']) . "'> Click Here!!</a> Set new password!";
//
//        $from = "info@teksmart.com";
//        $to = $results['email'];
//        $headers = 'MIME-Version: 1.0' . "\r\n";
//        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//        $headers .= 'From: ' . $from . "\r\n";
//        $subject = "Reset Password Link";
//        mail($to, $subject, $htmlContent, $headers);
//        return true;
//    }
     /**
     * reset_password reset password using this function
     *
     * @param  mixed $user_id
     *
     * @return void
     */
    public function reset_password($user_id)
    {
        $data['user_id'] = $user_id;
        $data['title'] = 'Reset Password';
        $this->load->view('admin/users/reset-password', $data);
    }

     /**
     * do_reset_passowrd reset password using this function
     *
     * @param  mixed $user_id
     *
     * @return void
     */

    public function do_reset_passowrd(){
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('user_id', 'User Id', 'trim|required');
        $this->form_validation->set_rules('newpassword', 'New Password', 'trim|required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[newpassword]');
        if($this->form_validation->run()=== FALSE){
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $user_id = $this->input->post('user_id');
        $results = $this->Api_model->do_reset_passowrd($user_id);
        if (!empty($results)) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Password successfully changed.!','data'=>$results]));
            return TRUE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Password did not changed successfully!']));
            return FALSE;
        }
    }

   /*public function edit_profile_image(){
    $this->output->set_content_type('application/json');
    $this->form_validation->set_rules('user_id', 'User ID', 'trim|required');
    if($this->form_validation->run()=== FALSE){
        $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
        return FALSE;
    }
    $user_id = $this->security->xss_clean($this->input->post('user_id'));
    if(!empty($_FILES['image_url']['name'])){
        $image_url = $this->updateProfileImage($user_id);
    }
    else{
         $image_url = '';
            $this->output->set_output(json_encode(['result' => 0, 'msg' => 'Please Choose file first!', 'data' => 'Please Choose file first!']));
            return false;
    }
    $results = $this->Api_model->edit_profile_image($user_id, $image_url);
    if ($results) {
            if (!empty($results['image_url'])) {
                $results['image_url'] = base_url('uploads/users-profile/' . $results['image_url']);
            } else {
                $results['image_url'] = null;
            }
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Successfully updated your profile!', 'data' => $results]));
            return TRUE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Successfully not updated your profile!']));
            return false;
        }

   }*/

   /**
     * edit_profile edit user profile here
     *
     * @return void
     */
    public function edit_profile()
    {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('user_id', 'User ID', 'trim|required');
        $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('mobile_no', 'Mobile Number', 'trim|required');

        if ($this->form_validation->run() === false) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return false;
        }
        $user_id = $this->security->xss_clean($this->input->post('user_id'));
         if(!empty($_FILES['image_url']['name'])){
        $image_url = $this->updateProfileImage($user_id);
          }
    else{
         $image = $this->Api_model->get_userdata($user_id);
         $image_url = $image['image_url'];
        }
        $results = $this->Api_model->edit_profile($user_id,$image_url);
        if ($results) {
            if (!empty($results['image_url'])) {
                $results['image_url'] = base_url('uploads/users-profile/' . $results['image_url']);
            } else {
                $results['image_url'] = null;
            }
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Successfully updated your profile!', 'data' => $results]));
            return TRUE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Successfully not updated your profile!']));
            return false;
        }
    }

   public function updateProfileImage($user_id){
     $config = array(
            'upload_path' => './uploads/users-profile/',
            'allowed_types' => 'jpeg|jpg|png',
            'file_name' => 'U-' . $user_id . '@' . rand(1111, 9999),
            'max_size' => "3048"
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('image_url')) {
            $data = $this->upload->data();
            return $data['file_name'];
        } else {
            $this->session->set_userdata('error', ['file' => $this->upload->display_errors()]);
            return 0;
        }

   }

    /**
     * faqs using this function get faqs list!
     *
     * @return void
     */
    public function faqs()
    {
        $this->output->set_content_type('application/json');
        $faqs = $this->Api_model->get_faqs();
        $faqsdatas = array();
        $i = 0;
        foreach ($faqs as $faqsdata) {
            $faqsdatas[$i]['id'] = $faqsdata['id'];
            $faqsdatas[$i]['title'] = $faqsdata['title'];
            $faqsdatas[$i]['description'] = strip_tags($faqsdata['description']);
            $i++;
        }
        if (!empty($faqsdatas)) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Data loaded!', 'data' => $faqsdatas]));
            return true;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Somethin went wrong!']));
            return false;
        }
    }
    
    public function manualTouchScreen(){
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('device_id', 'Device ID', 'required');
        $this->form_validation->set_rules('score', 'Score', 'required');
        $this->form_validation->set_rules('automatic_testing_id', 'Automatic Testing Id', 'required');
        if ($this->form_validation->run() === false) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return false;
        }
        $check = $this->Api_model->checkManualTouchscreen();
        if($check){
            //update
            $result = $this->Api_model->updatemanualTouchScreen();            
        }
        else{
        //insert   
        $result = $this->Api_model->manualTouchScreen();        
        }
        if (!empty($result)) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Score recorded successfully', 'data' => $result]));
            return true;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Something went wrong!', 'data'=> 'Something went wrong!']));
            return false;
        }
        
    }
    
    public function manualTesting(){
      $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('testing_id', 'Testing ID', 'required');
        $this->form_validation->set_rules('score', 'Score', 'required');
        $this->form_validation->set_rules('key', 'Key', 'required');
        if ($this->form_validation->run() === false) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return false;
        }
        $result = $this->Api_model->manualTesting();
        if (!empty($result)) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Score recorded successfully', 'data' => $result]));
            return true;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Something went wrong!', 'data'=> 'Something went wrong!']));
            return false;
        }
    }
    
    public function automaticBattery(){
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('device_id', 'Device ID', 'required');
        $this->form_validation->set_rules('score', 'Score', 'required');
        if ($this->form_validation->run() === false) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return false;
        }
        
        $result = $this->Api_model->automaticBattery();        
        if (!empty($result)) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Score recorded successfully', 'data' => $result]));
            return true;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Something went wrong!', 'data'=> 'Something went wrong!']));
            return false;
        }
        
    }
    
    public function automaticTesting(){
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('testing_id', 'Testing ID', 'required');
        $this->form_validation->set_rules('score', 'Score', 'required');
        $this->form_validation->set_rules('key', 'Key', 'required');
        if ($this->form_validation->run() === false) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return false;
        }
        $result = $this->Api_model->automaticTesting();
        if (!empty($result)) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Score recorded successfully', 'data' => $result]));
            return true;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Something went wrong!', 'data'=> 'Something went wrong!']));
            return false;
        }
        
    }
    
    public function cosmeticTesting(){
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('device_id', 'Device ID', 'required');
        $this->form_validation->set_rules('automatic_testing_id', 'Automatic Testing ID', 'required');
        if ($this->form_validation->run() === false) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return false;
        }
        $result = $this->Api_model->cosmeticTesting();
        if (!empty($result)) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Score recorded successfully', 'data' => $result]));
            return true;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Something went wrong!', 'data'=> 'Something went wrong!']));
            return false;
        }
        
    }
    
    public function quickTouchscreen(){
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('device_id', 'Device ID', 'required');
        $this->form_validation->set_rules('score', 'Score', 'required');
        $this->form_validation->set_rules('automatic_testing_id', 'Automatic Testing Id', 'required');
        if ($this->form_validation->run() === false) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return false;
        }
        $result = $this->Api_model->quickTouchscreen();
        if (!empty($result)) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Score recorded successfully', 'data' => $result]));
            return true;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Something went wrong!', 'data'=> 'Something went wrong!']));
            return false;
        }
    }
    
    public function quickTesting(){
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('testing_id', 'Testing ID', 'required');
        $this->form_validation->set_rules('score', 'Score', 'required');
        $this->form_validation->set_rules('key', 'Key', 'required');
        if ($this->form_validation->run() === false) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return false;
        }
        $result = $this->Api_model->quickTesting();
        if (!empty($result)) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Score recorded successfully', 'data' => $result]));
            return true;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Something went wrong!', 'data'=> 'Something went wrong!']));
            return false;
        }
    }        
    
  public function testStatus(){
       $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('device_id', 'Device ID', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');
        if ($this->form_validation->run() === false) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return false;
        }
        $type = $this->input->post('type');
        $device_id = $this->input->post('device_id');
        $manualTesting = $this->Api_model->manualTestingResult($device_id);
        $res1 = $this->precentageCalculation($manualTesting, 13);
        $err1 = $this->faultCalculation($manualTesting);
        $automaticTesting = $this->Api_model->automaticTestingResult($device_id);        
        $res2 = $this->precentageCalculation($automaticTesting, 15);
        $err2 = $this->faultCalculation($automaticTesting);
        $cosmeticTesting = $this->Api_model->cosmeticTestingResult($device_id);
//        $overall = ($res1['percentage'] + $res2['percentage']) / 2;
        $overall = ($res1['attempt'] + $res2['attempt'])/ 28 * 100;
        $fault = array_merge($err1,$err2);
//        unset($fault['user_id']);
//        print_r($fault);die;
        
        if($type == 'full_test'){
               if($manualTesting || $automaticTesting || $cosmeticTesting){
               $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Data Loaded', 'Manual_testing' => $manualTesting, 'Automatic_testing' =>$automaticTesting, 'Cosmetic_testing' =>$cosmeticTesting, 'manual_percentage'=>$res1['percentage'],'automatic_percentage'=>$res2['percentage'],'total_attempet'=> $res1['attempt']+$res2['attempt'].'/28','overall_percentage'=>round($overall),'manual_attempt'=>$res1['attempt'].'/13',
                'automatic_attempt'=>$res2['attempt'].'/15']));
                return true;   
            }else{
              $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Data not found','data'=>'Data not found']));
                return false;  
            } 
            
        }else{
                if($manualTesting || $automaticTesting || $cosmeticTesting){
               $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Data Loaded', 'Manual_testing' => $manualTesting, 'Automatic_testing' =>$automaticTesting, 'Cosmetic_testing' =>$cosmeticTesting, 'manual_percentage'=>$res1['percentage'],'automatic_percentage'=>$res2['percentage'],'total_attempet'=> $res1['attempt']+$res2['attempt'].'/28','overall_percentage'=>round($overall),'faults'=>$fault,'manual_attempt'=>$res1['attempt'].'/13','automatic_attempt'=>$res2['attempt'].'/15']));
                return true;   
            }else{
              $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Data not found','data'=>'Data not found']));
                return false;  
            }
        }
        
        
    }
    
    public function faultCalculation($test){
        $i = 0;
        $keys = [];
        if(!empty($test)){  
        foreach($test as $key=>$value){
                if(($value == '0' || $value == null) && $key != 'user_id')
                {
                    $keys[] = $key;
                    $i++;
                }
            
        }
    }
        return $keys;
        
       
     
    }
    
    public function totalfault($test){
        $i = 0;
        $no = ['display','all_sides','buttons','rear_back_cover','image_shaddow'];
        foreach($test as $key=>$value){
                if(($value == '0' || $value == null) && $key != 'user_id' && !in_array($key,$no))
                {
                    
                    $i++;
                }
            
        }
       
        return $i;
        
       
     
    }
    
    public function quickTestStatus(){
      $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('device_id', 'Device ID', 'required');
        if ($this->form_validation->run() === false) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return false;
        }
        $device_id = $this->input->post('device_id');
        $quickManual = $this->Api_model->quickManualTesting($device_id);
        $res1 = $this->precentageCalculation($quickManual,5);
        $automaticTesting = $this->Api_model->automaticTestingResult($device_id);
        $res2 = $this->precentageCalculation($automaticTesting, 15);
        $cosmeticTesting = $this->Api_model->cosmeticTestingResult($device_id);
//        $overall = ($res1['percentage'] + $res2['percentage']) / 2;
        $overall = ($res1['attempt'] + $res2['attempt'])/ 27 * 100;
        
        if($quickManual || $automaticTesting || $cosmeticTesting){
           $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Data Loaded', 'Manual_testing' => $quickManual, 'Automatic_testing' =>$automaticTesting, 'Cosmetic_testing' =>$cosmeticTesting, 'manual_percentage'=>$res1['percentage'],'automatic_percentage'=>$res2['percentage'],'total_attempet'=> $res1['attempt']+$res2['attempt'].'/20','overall_percentage'=>round($overall),'manual_attempt'=>$res1['attempt'].'/5','automatic_attempt'=>$res2['attempt'].'/15']));
            return true;   
        }else{
          $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Data not found','data'=>'Data not found']));
            return false;  
        }
   
    }
    
    
    
    public function precentageCalculation($test, $total){
        $single_val = 100/$total;
        $i = 0;
        $no = ['display','all_sides','buttons','rear_back_cover','image_shaddow'];
        if(!empty($test)){  
        foreach($test as $key=>$value){
                if($value == '1' && !in_array($key,$no) )
                {
                    $i++;
                }
        }
        
    }
        $arr = array(
                    'attempt' => $i,
                    'percentage' => round(($i)*$single_val)
                );
        return $arr;
        
    }
    
    public function testHistory(){
     $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('device_id', 'Device ID', 'required');
        if ($this->form_validation->run() === false) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return false;
        }  
        $device_id = $this->input->post('device_id');
        $fullHistory = $this->Api_model->automaticHistory($device_id);
        $i=0;$fullTest = [];
        foreach($fullHistory as $history){
            $fullTest[$i]['health'] = $this->precentageCalculation($history,27)['percentage'];
            $fullTest[$i]['error'] = $this->totalfault($history);
            $fullTest[$i]['created_at'] = $history['created_at'];
            $i++;
        }
        $quickHistory = $this->Api_model->quickHistory($device_id);
        $i=0;$quickTest = [];
        foreach($quickHistory as $quick){
            $quickTest[$i]['health'] = $this->precentageCalculation($quick,27)['percentage'];
            $quickTest[$i]['error'] = $this->totalfault($history);
            $quickTest[$i]['created_at'] = $history['created_at'];
            $i++;
        }
        $fullHistory = array_merge($fullTest,$quickTest);
        $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Data Loaded', 'data' => $fullHistory]));
            return true;
        
    }
    
    
    public function userDevice(){
        $this->output->set_content_type('application/json');
        $device_id = $this->input->post('device_id');

          $checkDeviceId = $this->Api_model->checkDeviceId($device_id);
          if($checkDeviceId){
              if($checkDeviceId['user_id'] == 0){
                    $checkDeviceId['user_id'] = '';
                }
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Data Loaded', 'data' => $checkDeviceId]));
            return true;
        } 

        else{
        $this->form_validation->set_rules('device_id', 'Device ID', 'required');
        $this->form_validation->set_rules('name', 'Mobile Name', 'required');
        $this->form_validation->set_rules('model_no', 'Model No.', 'required');
        $this->form_validation->set_rules('imei', 'IMEI Number', 'required');
        $this->form_validation->set_rules('front_camera', 'Front Camera', 'required');
        $this->form_validation->set_rules('back_camera', 'Back Camera', 'required');
        $this->form_validation->set_rules('ram', 'RAM', 'required');
        $this->form_validation->set_rules('processor', 'Processor', 'required');
        $this->form_validation->set_rules('os', 'os', 'required');
        $this->form_validation->set_rules('resolution', 'Resolution', 'required');
        $this->form_validation->set_rules('storage', 'Storage', 'required');
        if ($this->form_validation->run() === false) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return false;
        }
            
            
        $result = $this->Api_model->userDevice($device_id);
            if($result){
                if($result['user_id'] == 0){
                    $result['user_id'] = '';
                }
              $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Details Inserted', 'data' => $result]));
                return true;  
            }else{
               $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Something went wrong!','data'=>'Something went wrong!']));
                return false; 
            }
            
        }
}
    
    public function sellMe(){
        $this->output->set_content_type('application/json');
//        $this->form_validation->set_rules('user_id', 'User ID', 'required');
//        $this->form_validation->set_rules('device_id', 'Device ID', 'required');
//        $this->form_validation->set_rules('first_name', 'First name', 'required');
//        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
//        $this->form_validation->set_rules('email', 'Email', 'required');
//        $this->form_validation->set_rules('address', 'Address', 'required');
//        $this->form_validation->set_rules('phone', 'Phone Number', 'required');
//        $this->form_validation->set_rules('quality', 'Quality and Ownership', 'required');
//        $this->form_validation->set_rules('backup', 'Backup', 'required');
//        $this->form_validation->set_rules('account', 'Account Deactivated', 'required');
//        $this->form_validation->set_rules('power', 'Power off', 'required');
//        $this->form_validation->set_rules('erase_content', 'Erase content', 'required');
//        $this->form_validation->set_rules('sim_card', 'Sim card', 'required');
//        $this->form_validation->set_rules('holder_name', 'Holder Name', 'required');
//        $this->form_validation->set_rules('acc_no', 'Account No.', 'required');
//        $this->form_validation->set_rules('ifsc', 'IFSC', 'required');
//        $this->form_validation->set_rules('bank_name', 'Bank name', 'required');
//        if ($this->form_validation->run() === false) {
//            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
//            return false;
//        }
        $checksellme = $this->Api_model->checksellme();
        if($checksellme){
            $this->Api_model->updateBankDetails();
//            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'You already filled this form','data'=>$checksellme]));
            
        }else{
        //insert new entries 
        $result = $this->Api_model->sellMe();
        if($result){     
            
        $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Please verify OTP', 'data' => $result]));
                return true;  
        }else{
           $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Something went wrong!','data'=>'Something went wrong!'])); 
        }
            
        }
        
}

    
    public function warranty(){
      $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('user_id', 'User ID', 'required');
        $this->form_validation->set_rules('device_id', 'Device ID', 'required');
        $this->form_validation->set_rules('owner_name', 'First name', 'required');
        $this->form_validation->set_rules('dop', 'Date of Purchase', 'required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required');
        $this->form_validation->set_rules('model_no', 'Model Number', 'required');
        $this->form_validation->set_rules('serial_no', 'Serial Number', 'required');
        $this->form_validation->set_rules('imei_1', 'IMEI slot1', 'required');
        $this->form_validation->set_rules('imei_2', 'IMEI slot2', 'required');
        $this->form_validation->set_rules('warranty_time', 'Warranty Time', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        if ($this->form_validation->run() === false) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return false;
        }
        $device_id = $this->input->post('device_id');
//        $checkWarranty = $this->Api_model->checkWarranty($device_id);
//        if($checkWarranty){
//            
//            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Warranty of this device already exists.','data'=>'Warranty of this device already exists.']));
//                    return false;
//            
//        }else{
            if(!empty($_FILES['file1']['name'])){
                $file1=$this->doUploadFile('file1');
            }if(empty($_FILES['file1']['name'])){
                $file1='';
            }        
            $result = $this->Api_model->warranty($file1);
            if($result){
               $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Thanks for Registration of Warranty', 'data' => $result]));
                    return true;  
            }else{
                $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Failed','data'=>'Failed']));
                    return false;
            }
            
//        }
        
    }
    
    public function outOfWarranty(){
      $this->output->set_content_type('application/json');
      $this->form_validation->set_rules('device_id', 'Device ID', 'required');
      if ($this->form_validation->run() === false) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return false;
       }
       $device_id = $this->input->post('device_id');
       $getDateOfPurchase = $this->Api_model->getDateOfPurchase($device_id);
       $dop = $getDateOfPurchase['dop'];
       $warranty_time =  $getDateOfPurchase['warranty_time'];
       if($warranty_time == '6 Months'){
           $effectiveDate = date('Y-m-d', strtotime("+6 months", strtotime($dop)));   
           $current_date = date('Y-m-d');
           if($current_date < $effectiveDate ){
              $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Device is in Warranty', 'data' => 'Device is in Warranty']));
                return true;  
           }else{
               $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Device is in Out of Warranty','data'=>'Device is in Out of Warranty']));
                return false;
           }
           
       } else{
           $effectiveDate = date('Y-m-d', strtotime("+12 months", strtotime($dop)));   
            $current_date = date('Y-m-d');
           if($current_date < $effectiveDate ){
              $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Device is in Warranty', 'data' => 'Device is in Warranty']));
                return true;  
           }else{
               $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Device is in Out of Warranty','data'=>'Device is in Out of Warranty']));
                return false;
           }
       }          
               
     }
    
    public function claim(){
      $this->output->set_content_type('application/json');
//        $this->form_validation->set_rules('user_id', 'User ID', 'required');
        $this->form_validation->set_rules('device_id', 'Device ID', 'required');
        $this->form_validation->set_rules('owner_name', 'First name', 'required');
        $this->form_validation->set_rules('dop', 'Date of Purchase', 'required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required');
        $this->form_validation->set_rules('model_no', 'Model Number', 'required');
        $this->form_validation->set_rules('serial_no', 'Serial Number', 'required');
        $this->form_validation->set_rules('imei_1', 'IMEI slot1', 'required');
        $this->form_validation->set_rules('imei_2', 'IMEI slot2', 'required');
        $this->form_validation->set_rules('fault', 'Fault', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        if ($this->form_validation->run() === false) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return false;
        }
        
        if(!empty($_FILES['file1']['name'])){
            $file1=$this->doUploadFile('file1');
        }if(empty($_FILES['file1']['name'])){
            $file1='';
        }        
        $result = $this->Api_model->claim($file1);
        if($result){
           $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Thanks for claiming', 'data' => $result]));
                return true;  
        }else{
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Failed','data'=>'Failed']));
                return false;
        }
        
    }
    
    public function doUploadFile($file)
    {
        // echo $file;die;
        $file1 = $_FILES[$file]['name'];
        $config['upload_path'] = './uploads/warranty/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|';
        $config['max_size'] = '0';
       // $config['max_filename'] = '2555';
        $config['file_name'] = rand();
        $this->upload->initialize($config);
        $this->upload->do_upload($file);
        $upload_data = $this->upload->data();
        return $upload_data['file_name'];
        
    }
    
    public function getNotificationList(){
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('user_id', 'User ID', 'required');
        if ($this->form_validation->run() === false) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return false;
        }
        $result = $this->Api_model->getNotificationList();
        if($result){
          $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Data Loaded', 'data' => $result]));
                return true;   
        }else{
          $this->output->set_output(json_encode(['result' => -1, 'msg' => 'No Notifications yet!','data'=>'No Notifications yet!']));
                return false;  
        }
    }
    
    public function otpVerification(){
       $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('is_verify', 'Verify Status', 'required');
        if ($this->form_validation->run() === false) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return false;
        } 
        
        $result = $this->Api_model->otpVerification();
        if($result){
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Otp Verified', 'data' => $result]));
                return true;
        }else{
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Failed to verify','data'=>'Failed to verify']));
                return false; 
        }
    }
    
    public function siteSettings(){
       $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('type', 'Type', 'required');
        
        if ($this->form_validation->run() === false) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return false;
        }
        $result = $this->Api_model->siteSettings();
        if($result){
            $result = strip_tags($result['description']);
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Data loaded', 'data' => $result]));
                return true;
        }else{
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Data not found','data'=>'Data not found']));
                return false; 
        }
        
    }
    
    public function faq(){
       $this->output->set_content_type('application/json');
        $result = $this->Api_model->faq();
        if($result){
            $i=0;
            foreach($result as $res){
                
                $result[$i]['answer'] = strip_tags($res['answer']);
                $i++;
            }

            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Data loaded', 'data' => $result]));
            return true;
        }else{
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Data not found','data'=>'Data not found']));
            return false; 
        } 
    }
    
    public function result(){
       $this->output->set_content_type('application/json');
       $device_id = $this->input->post('device_id'); 
       $grade = $this->overallGrade($device_id);
        if(!empty($grade)){
          $checkResult = $this->Api_model->checkresult($device_id);
            if($checkResult){
                $this->Api_model->updateResult($device_id,$grade['Price']['Price1'],$grade['Price']['Price2']);
            }else{
                $this->Api_model->insertResult($device_id,$grade['Price']['Price1'],$grade['Price']['Price2']);
            }
            
          $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Data Loaded', 'Grade' => $grade['grade'], 'Working_price'=>$grade['Price']['Price1'],'Non_working_price'=>$grade['Price']['Price2']]));
        return true;  
        }else{
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'No result found','data'=>'No result found']));
            return false; 
        }
       
       
    }
    
    public function overallGrade($device_id){
        $this->output->set_content_type('application/json');
        $cosmetic = $this->Api_model->cosmeticTestingResult($device_id);
        if($cosmetic){
           $display =  $cosmetic['display']; 
        $all_sides =  $cosmetic['all_sides']; 
        $buttons =  $cosmetic['buttons'];        
        $rear_back_cover =  $cosmetic['rear_back_cover'];        
        $image_shaddow =  $cosmetic['image_shaddow'];
        $sum = $display + $all_sides + $buttons + $rear_back_cover;
        if($image_shaddow == 'Yes'){
              $grade = 'D';
        }
        else if($display == 9 or $all_sides == 9 or $buttons == 9 or $rear_back_cover == 9){            
               $grade = 'D';
        }
        else if($display == 8 or $all_sides == 8 or $buttons == 8 or $rear_back_cover == 8){
            if($sum >= 29 && $sum <= 34){
                 $grade = 'D';
            }else{
                 $grade = 'C';
            }            
        }else if($display == 7 or $all_sides == 7 or $buttons == 7 or $rear_back_cover == 7){
            if($sum >= 29 && $sum <= 34){
                 $grade = 'D';
            }else{
                 $grade = 'C';
            }            
        }else if($display == 6 or $all_sides == 6 or $buttons == 6 or $rear_back_cover == 6) {
            if($sum >= 29 && $sum <= 34){
                 $grade = 'D';
            }else{
                 $grade = 'C';
            }
        } else if($display >= 3 or $all_sides >= 3 or $buttons >= 3 or $rear_back_cover >= 3){
             if($sum >= 15 && $sum <= 28){
                 $grade = 'C';
            }else{
                 $grade = 'B';
            }            
        } else{            
            if($sum == '4'){
                 $grade = 'A+';
            }
        } 
        $price = $this->priceCalculation($grade,$device_id);
        $array = ['grade' => $grade,'Price'=>$price];
        return $array;
 
}       else
        {
            return false;
        }
                
    }
    
    public function priceCalculation($grade,$device_id){  
//        echo $device_id;die;
        $this->output->set_content_type('application/json');
        $getPrice = $this->Api_model->getPrice($device_id);
        if($getPrice){
            $working_price = $getPrice['mb_working_price'];
        $Nonworking_price = $getPrice['mb_not_working_price'];
        if($grade == 'A+'){
            $price1 = $working_price + (10/100 * $working_price);
            $price2 = $Nonworking_price;
        }else if($grade == 'A'){
            $price1 = $working_price + (5/100 * $working_price);
            $price2 = $Nonworking_price;
        }
        else if($grade == 'B'){
            $price1 = $working_price ;
            $price2 = $Nonworking_price;
        }
        else if($grade == 'C'){
            $price1 = $price1 = $working_price - (20/100 * $working_price);
            $price2 = $Nonworking_price;
        }
        else if($grade == 'D'){
            $price1 = $price1 = $working_price - (50/100 * $working_price);
            $price2 = $Nonworking_price - (50/100 * $Nonworking_price);
        }
        $arr = ['Price1'=>$price1,'Price2'=>$price2];
        return $arr;
            
        }else{
            
            return false;
        }
        
    }
    
    public function downloadEstimatePdf($device_id)
    {
        $grade = $this->overallGrade($device_id);
        $data['manualTesting'] = $manualTesting = $this->Api_model->manualTestingResult($device_id);
        foreach($data['manualTesting'] as $key=> $value){
            if($value == '1'){
                $data['manualTesting'][$key] = "Pass";
            }if($value == '0' || $value == null){
                $data['manualTesting'][$key] = "Fail";
            }
        }
        $data['manualTesting']['res1'] = $this->precentageCalculation($manualTesting, 13);
        $data['manual_attempt'] = $data['manualTesting']['res1']['attempt'].'/13';
        $data['automaticTesting'] = $automaticTesting = $this->Api_model->automaticTestingResult($device_id);
         foreach($data['automaticTesting'] as $key=> $value){
            if($value == '1'){
                $data['automaticTesting'][$key] = "Pass";
            }if($value == '0' || $value == null){
                $data['automaticTesting'][$key] = "Fail";
            }
        }
        $data['automaticTesting']['res2'] = $this->precentageCalculation($automaticTesting, 15);
        $data['automatic_attempt'] = $data['automaticTesting']['res2']['attempt'].'/15';
        $data['cosmeticTesting'] = $this->Api_model->cosmeticTestingResult($device_id);
        $data['overall'] = ($data['manualTesting']['res1']['percentage'] + $data['automaticTesting']['res2']['percentage']) / 2;
        $data['device'] = $this->Api_model->checkDeviceId($device_id);
        $data['grade'] = $this->overallGrade($device_id);

        $data['title'] = "Estimate PDF";
        $this->load->view('admin/pdf', $data);
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("testReport.pdf", array("Attachment"=>0));
    }
    
    public function quickPDF($device_id){  
        $grade = $this->overallGrade($device_id);
        $data['quickManualTesting'] = $quickManualTesting = $this->Api_model->quickManualTesting($device_id);
        foreach($data['quickManualTesting'] as $key=> $value){
            if($value == '1'){
                $data['quickManualTesting'][$key] = "Pass";
            }if($value == '0' || $value == null){
                $data['quickManualTesting'][$key] = "Fail";
            }
        }
        $data['quickManualTesting']['res1'] = $this->precentageCalculation($quickManualTesting, 5);
        $data['manual_attempt'] = $data['quickManualTesting']['res1']['attempt'].'/5';
        $data['automaticTesting'] = $automaticTesting = $this->Api_model->automaticTestingResult($device_id);
         foreach($data['automaticTesting'] as $key=> $value){
            if($value == '1'){
                $data['automaticTesting'][$key] = "Pass";
            }if($value == '0' || $value == null){
                $data['automaticTesting'][$key] = "Fail";
            }
        }
        $data['automaticTesting']['res2'] = $this->precentageCalculation($automaticTesting, 15);
        $data['automatic_attempt'] = $data['automaticTesting']['res2']['attempt'].'/15';
        $data['cosmeticTesting'] = $this->Api_model->cosmeticTestingResult($device_id);
        $data['overall'] = ($data['manualTesting']['res1']['percentage'] + $data['automaticTesting']['res2']['percentage']) / 2;
        $data['device'] = $this->Api_model->checkDeviceId($device_id);
        $data['grade'] = $this->overallGrade($device_id);

        $data['title'] = "Quick Test PDF";
        $this->load->view('admin/pdf', $data);
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("QuicktestReport.pdf", array("Attachment"=>0));
    
    
    }
    
    public function warrantyPDF($device_id){
        $data['manualTesting'] = $manualTesting = $this->Api_model->manualTestingResult($device_id);
        foreach($data['manualTesting'] as $key=> $value){
            if($value == '1'){
                $data['manualTesting'][$key] = "Pass";
            }if($value == '0' || $value == null){
                $data['manualTesting'][$key] = "Fail";
            }
        }
        $data['manualTesting']['res1'] = $this->precentageCalculation($manualTesting, 13);
        $data['manual_attempt'] = $data['manualTesting']['res1']['attempt'].'/13';
        $data['automaticTesting'] = $automaticTesting = $this->Api_model->automaticTestingResult($device_id);
         foreach($data['automaticTesting'] as $key=> $value){
            if($value == '1'){
                $data['automaticTesting'][$key] = "Pass";
            }if($value == '0' || $value == null){
                $data['automaticTesting'][$key] = "Fail";
            }
        }
        $data['automaticTesting']['res2'] = $this->precentageCalculation($automaticTesting, 15);
        $data['automatic_attempt'] = $data['automaticTesting']['res2']['attempt'].'/15';
        $data['overall'] = ($data['manualTesting']['res1']['percentage'] + $data['automaticTesting']['res2']['percentage']) / 2;
        $data['device'] = $this->Api_model->checkDeviceId($device_id);
        $data['grade'] = $this->overallGrade($device_id);

        $data['title'] = "Warranty Test PDF";
        $this->load->view('admin/warrantyPdf', $data);
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("warrantyReport.pdf", array("Attachment"=>0));
    
    }
    
    
    public function postage(){
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('device_id', 'Device ID', 'required');
        $this->form_validation->set_rules('owner_name', 'First name', 'required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('comment', 'Comment', 'required');
        if ($this->form_validation->run() === false) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return false;
        }
        $result = $this->Api_model->postage();
        if($result){        

            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Sent successfully', 'data' => $result]));
            return true;
        }else{
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Failed to send','data'=>'Failed to send']));
            return false; 
        } 
        
    }
    
    
    public function phoneListByUserId(){
      $this->output->set_content_type('application/json');
      $user_id = $this->input->post('user_id');
      $result = $this->Api_model->phoneListByUserId($user_id);   
        if($result){
          $this->output->set_output(json_encode(['result' => 1, 'msg' => 'List of phones', 'data' => $result]));
            return true;  
        }else{
           $this->output->set_output(json_encode(['result' => -1, 'msg' => 'data not found','data'=>'data not found']));
            return false;  
        }
    }
    
    public function sendPhone(){
      $this->output->set_content_type('application/json');
      $user_id = $this->input->post('user_id');
      $device_id = $this->input->post('device_id');
      $working_price = $this->input->post('working_price');
      $non_working_price = $this->input->post('non_working_price');
      $checkDevice = $this->Api_model->checkDeviceHistory($device_id);
        if($checkDevice){
           $this->output->set_output(json_encode(['result' => -1, 'msg' => 'You already sent this phone','data'=>'You already sent this phone']));
            return false;   
        }else{
            
            $result = $this->Api_model->sendPhone($user_id,$device_id,$working_price,$non_working_price);
            if($result){
               $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Phone sent to the Admin', 'data' => $result]));
            return true;   
            }else{
                $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Failed to send','data'=>'Failed to send']));
            return false;   
            }
            
        }
        
    }
    
    public function dispatchedList(){
      $this->output->set_content_type('application/json');
      $user_id = $this->input->post('user_id'); 
      $result = $this->Api_model->dispatchedList($user_id);
      if($result){
        $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Dispatched phone list', 'data' => $result]));
            return true;   
      }else{
          $this->output->set_output(json_encode(['result' => -1, 'msg' => 'data not found','data'=>'data not found']));
            return false; 
      }
    }
    
    public function sendWarrantyMail(){
       $this->output->set_content_type('application/json');
       $email = $this->input->post('email');
       $result = $this->Api_model->check_useraccount($email);
        if($result){
        $get = $this->Api_model->warrantyDetails($email);
        $checkWarrantyRepair = $this->Api_model->checkWarrantyRepair($get['device_id']);
        if(empty($checkWarrantyRepair)){
            $this->Api_model->warrantyRepair($get['user_id'],$get['device_id']);
        }         
        $this->load->library('email');
        $htmlContent = "<h3>Dear Admin,</h3>";
        $htmlContent .= "<div style='padding-top:8px;'>User wants for warranty repair/repair quote</div>";
        $htmlContent .= "<div style='padding-top:8px;'>Device_id :".$get['device_id']."</div>";
        $htmlContent .= "<div style='padding-top:8px;'>Owner Name :".$get['owner_name']."</div>";
        $htmlContent .= "<div style='padding-top:8px;'>Date of Purchasing :".$get['dop']."</div>";
        $htmlContent .= "<div style='padding-top:8px;'>Device Name :".$get['device_name']."</div>";
        $htmlContent .= "<div style='padding-top:8px;'>Model No. :".$get['model_no']."</div>";

        $from = $email;
        $to = "rlc@cellme.tech";
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: ' . $from . "\r\n";
        $subject = "Warranty Repair";
        mail($to, $subject, $htmlContent, $headers);
        $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Mail sent Successfully', 'data' => 'Mail sent Successfully']));
            return true;
        }else{
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Email id not found', 'data' => 'Email id not found']));
            return true;
        }
        
    }
    
    
    public function dispatchStatusUpdate(){
       $this->output->set_content_type('application/json'); 
       $device_id = $this->input->post('device_id');
        $status = $this->input->post('status');
        if($status == 'yes'){
               $var = 'Accepted';
        }else{
            $var = 'Return';            
        }
        
        $result = $this->Api_model->dispatchStatusUpdate($device_id,$var);
       if($result){
        $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Status updated', 'data' => $result]));
            return true;   
      }else{
          $this->output->set_output(json_encode(['result' => -1, 'msg' => 'failed to update','data'=>'failed to update']));
            return false; 
      }
    }
    
    public function warrantyPhoneList(){
       $this->output->set_content_type('application/json'); 
       $user_id = $this->input->post('user_id'); 
        $result = $this->Api_model->warrantyPhoneList($user_id);
        if($result){
           $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Phone List', 'data' => $result]));
            return true;  
 
        }else{
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'data not found','data'=>'data not found']));
            return false; 
        }
    }
    
    public function privacyPolicy(){
      $data['page_data'] = $this->Api_model->privacyPolicy();
      $this->load->view('user/privacy',$data);
    }
    
    

}

?>