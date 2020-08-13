<?php

/**
 * Description of Setting
 *
 * @author Varun Negi
 */
class Warrenty extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['admin_model', 'Booking_model', 'Warrenty_model']);
        $this->load->library('excel');
    }
    private function is_login(){
        return $this->session->userdata('email');
    }
    private function getLoginDetail(){
        $email = $this->session->userdata('email');
        return $this->admin_model->getLoginDetail($email);
    }

    public function index(){
        if (empty($this->session->userdata('email'))) {
            redirect(base_url('admin'));
        }
        $data['title'] = "warrenty repaire";
        $data['admin_info'] = $this->getLoginDetail();
        $data['notications'] = $this->admin_model->count_booking();
        $data['warrenty'] =  $result =  $this->Warrenty_model->warrentdetails();
        $i = 0;
        foreach ($data['warrenty'] as $booking) {
            $res = $this->Warrenty_model->getuserdetails($booking['user_id']);
            if ($res) {
                $result[$i]['full_name'] = $res['full_name'];
                $result[$i]['email'] = $res['email'];
                $result[$i]['image_url'] = $res['image_url'];
                $result[$i]['country_code'] = $res['country_code'];
                $result[$i]['mobile_no'] = $res['mobile_no'];
            } else {
                $result[$i]['order_status'] = "";
            }
            $i++;
        }
        $data['warrenty'] = $result;
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/sidebar');
        $this->load->view('admin/warrenty/warrenty-list',$data);
        $this->load->view('admin/commons/footer');
    }

      public function view($device_id = NULL){
        if (empty($this->session->userdata('email'))) {
            redirect(base_url('admin'));
        }
        $data['table'] = 1;
        $data['title'] = " View warenty";
        $data['admin_info'] = $this->getLoginDetail();
        $data['warrentdetails'] = $this->Warrenty_model->view_booking($device_id);
        $data['warrenty'] = $this->Warrenty_model->getwarrentydetail($data['warrentdetails']['user_id'],$data['warrentdetails']['device_id']);
        $data['notications'] = $this->admin_model->count_booking();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/sidebar');
        $this->load->view('admin/warrenty/warrenty-info',$data);
        $this->load->view('admin/commons/footer');
    }


    public function status_wrapper($user_id,$device_id) {
        $this->output->set_content_type('application/json');
        $status = $this->input->post('status');
        if($status == 'Received-error'){
           $data['user_id'] = $user_id;
           $data['device_id'] = $device_id;
           $data['status'] = $this->input->post('status');
           $content_wrapper = $this->load->view('admin/wrapper/warrenty-wrapper', $data, true);
           $this->output->set_output(json_encode(['result' => 1, 'content_wrapper' => $content_wrapper]));
           return FALSE;
       }

       $order = $this->Warrenty_model->addorderstatus($user_id,$device_id);
       if (!empty($order)) {
        $this->senderMail($user_id,$status);
       $this->sendpushnotification($user_id,$status);
        
        $this->output->set_output(json_encode(['result' => 1, 'msg' => ' Status successfully updated', 'url' => base_url('admin/warrenty-repair')]));
        return true;
    } else {
       $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Status not successfully updated.']));
       return false;
   }

}

public function warrentyupdatestatus($user_id,$device_id,$status){
    $this->output->set_content_type('application/json');
    if (!empty($_FILES['image_url']['name'])) {
        $image_url = $this->doUploadImg();
        if (!$image_url) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->session->userdata('error')]));
            $this->session->unset_userdata('error');
            return FALSE;
        }
    }else {
        $this->output->set_output(json_encode(['result' => 0, 'errors' => ['image_url' => 'Image Field required.!']]));
        return FALSE;
    }
    $results = $this->Warrenty_model->warrentyupdatestatus($user_id,$device_id,$status,$image_url);
    if (!empty($results)) {
        //$this->senderMail($user_id,$status);
        //$this->sendpushnotification($user_id,$status);

     $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Status successfully updated', 'url' => base_url('admin/warrenty-repair')]));
     return true;
 } else {
   $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Status not successfully updated.']));
   return false;
}
}

public function senderMail($user_id,$status) {

   $this->load->library('email');
   $results = $this->Warrenty_model->get_userdata($user_id);

   $htmlContent = "<h3>Dear " . $results['full_name'] . ",</h3>";
   $htmlContent .= "<div style='padding-top:8px;'>Your Phone Status ".$status ." </div>";
   $from = "info@teksmart.com";
   $to = $results['email'];
   $headers = 'MIME-Version: 1.0' . "\r\n";
   $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
   $headers .= 'From: ' . $from . "\r\n";
   $subject = "Phone Status";
   mail($to, $subject, $htmlContent, $headers);
   return true;
}

private function sendpushnotification($user_id,$status){

   $result = $this->Warrenty_model->get_userdata($user_id);
    $token = $this->Warrenty_model->gettoken($user_id);
    define('API_ACCESS_KEY','AAAA_qvdRtA:APA91bFfIHjCdy30N-XrAMOvADvMQsh_UOzlSQJNKhJHUL7XpuE-dhpmD3eFYauvOMRTRT-pEdWKykvqn_Okpu0oosO8BzymlH-ntLvMwwSiVvT7kS0SxBZ9a8GsN27OjaFB9rgYlz5y');
    
    $description = 'Hello ' .$result['full_name'] . ',' . ' Your Phone Status is ' .$status;
    $title = $result['full_name'] . ' Your Phone Status';
    foreach ($token as $token_id) {
        $msg = array(
            'title'=>$title,
            'body' => $description,
        );

        $fields = array(
            'to' => $token_id['token_id'],
            'notification' => $msg
        );
        
        $headers = array('Authorization:key = ' . API_ACCESS_KEY,
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
    }
    $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Message Send Sucessfully', 'url' => base_url('notification')]));
    return FALSE;

}

 /**
     * doUploadImg upload service image form here
     *
     * @return void
     */
 function doUploadImg(){
    $config = array(
        'upload_path' => "./uploads/warrenty-repaire/",
        'allowed_types' => 'png|jpg|jpeg',
        'file_name' => rand(11111, 99999),
        'remove_spaces'=>TRUE,
        'encrypt_name' => TRUE,
            'max_size' => "9048" // Can be set to particular file size , here it is 2 MB(2048 Kb)
        );
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('image_url')) {
        $data = $this->upload->data();
        return $data['file_name'];
    } else {
        $this->session->set_userdata('error', ['image_url' => $this->upload->display_errors()]);
        return 0;
    }
}


}