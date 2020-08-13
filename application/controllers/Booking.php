<?php

/**
 * Description of Setting
 *
 * @author Varun Negi
 */
class Booking extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['admin_model', 'Booking_model']);
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
        $data['title'] = "Booking Details";
        $data['admin_info'] = $this->getLoginDetail();
        $data['notications'] = $this->admin_model->count_booking();
        $data['booking'] =  $result =  $this->Booking_model->booking_details();
        $i = 0;
        foreach ($data['booking'] as $booking) {
            $res = $this->Booking_model->getuserdetails($booking['user_id']);
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
        $data['booking'] = $result;

        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/sidebar');
        $this->load->view('admin/booking/booking-list',$data);
        $this->load->view('admin/commons/footer');
    }

    public function view_booking($device_id = NULL){
        if (empty($this->session->userdata('email'))) {
            redirect(base_url('admin'));
        }
        $data['table'] = 1;
        $data['title'] = " View Booking";
        $data['admin_info'] = $this->getLoginDetail();
        $data['booking_details'] = $this->Booking_model->view_booking($device_id);
        $data['warrenty'] = $this->Booking_model->getwarrentydetail($data['booking_details']['user_id'],$data['booking_details']['device_id']);
        $data['notications'] = $this->admin_model->count_booking();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/sidebar');
        $this->load->view('admin/booking/booking-info',$data);
        $this->load->view('admin/commons/footer');
    }

    public function invoice($id = NULL){
        $this->load->helper('pdf_helper');
        $data['userData'] = $this->getLoginDetail();
        $data['user_detail'] = $this->Booking_model->invoice_generate($id);
        echo $data['user_detail']['first_name'];
       // print_r($data['user_detail']);die;
        $this->load->view('admin/booking/invoice', $data);

    }

    public function getAllDeviceList(){
        if (empty($this->session->userdata('email'))) {
            redirect(base_url('admin'));
        }
        $data['title'] = " Price Listing";
        $data['admin_info'] = $this->getLoginDetail();
        $data['device_detail'] = $this->Booking_model->getAllMobileList();
        $data['notications'] = $this->admin_model->count_booking();
        
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/sidebar');
        $this->load->view('admin/price-list/device-list',$data);
        $this->load->view('admin/commons/footer');
    }

    public function getDeviceListById($id){
        if (empty($this->session->userdata('email'))) {
            redirect(base_url('admin'));
        }
        $data['title'] = " Device Listing";
        $data['admin_info'] = $this->getLoginDetail();
        $data['devicedetail'] = $this->Booking_model->getDeviceListById($id);
        $data['notications'] = $this->admin_model->count_booking();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/sidebar');
        $this->load->view('admin/price-list/device-details',$data);
        $this->load->view('admin/commons/footer');
    }

    public function add_price(){
        if (empty($this->session->userdata('email'))) {
            redirect(base_url('admin'));
        }
        $data['title'] = "Add Price";
        $data['admin_info'] = $this->getLoginDetail();
        $data['notications'] = $this->admin_model->count_booking();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/sidebar');
        $this->load->view('admin/price-list/add-price',$data);
        $this->load->view('admin/commons/footer');
    }

    public function do_add_device(){
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('mobile_id', 'Mobile Id', 'required');
        $this->form_validation->set_rules('model_no', 'Model Number', 'required');
        $this->form_validation->set_rules('model_checkmend', 'Model Checkmand', 'required');
        $this->form_validation->set_rules('working_price', 'Working Price', 'required');
        $this->form_validation->set_rules('not_working_price', 'Not Working Price', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->Booking_model->do_add_device();
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('admin/pricelist'), 'msg' => 'Device Add Successfully!!']));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Something Went Wrong']));
            return FALSE;
        }

    }

    public function status_wrapper($user_id,$device_id) {
        $this->output->set_content_type('application/json');
        $status = $this->input->post('status');
        if($status == 'Received-error' || $status == 'Follow-up'){
           $data['user_id'] = $user_id;
           $data['device_id'] = $device_id;
           $data['status'] = $this->input->post('status');
           $content_wrapper = $this->load->view('admin/wrapper/status-wrapper', $data, true);
           $this->output->set_output(json_encode(['result' => 1, 'content_wrapper' => $content_wrapper]));
           return FALSE;
       }

       $order = $this->Booking_model->addorderstatus($user_id,$device_id);
       if (!empty($order)) {
         $this->senderMail($user_id,$status);
        $this->sendpushnotification($user_id,$status);

        
        $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Order Status successfully updated', 'url' => base_url('admin/booking')]));
        return true;
    } else {
       $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Order Status not successfully updated.']));
       return false;
   }

}

public function Follow_up($user_id,$device_id){
    $this->output->set_content_type('application/json');
    $this->form_validation->set_rules('message', 'Message', 'required');
    if ($this->form_validation->run() === FALSE) {
        $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
        return FALSE;
    }
    $status = $this->input->post('status');
    $message = $this->input->post('message');
    $results = $this->Booking_model->updateorderstatus($user_id,$device_id);
    if (!empty($results)) {
        $this->sendMail($user_id,$status,$message);
        $this->sendpushnotification($user_id,$status);
     $this->output->set_output(json_encode(['result' => 1, 'msg' => ' Status successfully updated', 'url' => base_url('admin/booking')]));
     return true;
 } else {
   $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Status not successfully updated.']));
   return false;
}
}

public function addprice($user_id,$device_id){
    $this->output->set_content_type('application/json');
    $this->form_validation->set_rules('price', 'price', 'required');
    if ($this->form_validation->run() === FALSE) {
        $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
        return FALSE;
    }
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
    $status = $this->input->post('status');
    $results = $this->Booking_model->updateorderstatusprice($user_id,$device_id,$image_url);
    if (!empty($results)) {
        $this->senderMail($user_id,$status);
        $this->sendpushnotification($user_id,$status);

     $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Order Status successfully updated', 'url' => base_url('admin/booking')]));
     return true;
 } else {
   $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Order Status not successfully updated.']));
   return false;
}
}

public function senderMail($user_id,$status) {

   $this->load->library('email');
   $results = $this->Booking_model->get_userdata($user_id);

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
public function sendMail($user_id,$status,$message) {

   $this->load->library('email');
   $results = $this->Booking_model->get_userdata($user_id);

   $htmlContent = "<h3>Dear " . $results['full_name'] . ",</h3>";
   $htmlContent .= "<div style='padding-top:8px;'>Please respond to the Message..</div>";
   $htmlContent .= "<div style='padding-top:8px;'>Your Phone Status ".$status ." </div>";
   $htmlContent .=  "<div style='padding-top:8px;'>Admin Message ".$message ." </div>";
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

   $result = $this->Booking_model->get_userdata($user_id);
    $token = $this->Booking_model->gettoken($user_id);
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
        'upload_path' => "./uploads/phone-error/",
        'allowed_types' => 'png|jpg|jpeg',
        'file_name' => rand(11111, 99999),
        'remove_spaces'=>TRUE,
        'encrypt_name' => TRUE,
            'max_size' => "9048" // Can be set to particular file size , here it is 2 MB(2048 Kb)
        );
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if ($this->upload->do_upload('image_url')) {
        $data = $this->upload->data();
        return $data['file_name'];
    } else {
        $this->session->set_userdata('error', ['image_url' => $this->upload->display_errors()]);
        return 0;
    }
}

public function upload_excel(){
    $this->output->set_content_type('application/json');
    if(isset($_FILES["file"]["name"]))
    {
        $path = $_FILES["file"]["tmp_name"];
        $object = PHPExcel_IOFactory::load($path);
        foreach($object->getWorksheetIterator() as $worksheet)
        {
            $highestRow = $worksheet->getHighestRow();
            $highestColumn = $worksheet->getHighestColumn();
            for($row=2; $row<=$highestRow; $row++)
            {
                $mb_id = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                $mb_model_no = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                $mb_model_checkmend  = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                $mb_working_price    = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                $mb_not_working_price    = $worksheet->getCellByColumnAndRow(4, $row)->getValue();

                $data[] = array(
                    'mb_id'              =>  $mb_id,
                    'mb_model_no'             =>  $mb_model_no,
                    'mb_model_checkmend'         =>  $mb_model_checkmend,
                    'mb_working_price'       =>  $mb_working_price,
                    'mb_not_working_price,'          =>  $mb_not_working_price,
                );
            }
        }
        $results = $this->Booking_model->insertmobilelist($data);
        if (!empty($results)) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Save changes successfully done.!', 'url' => base_url('pricelist')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'No changes found here.!', 'url' => base_url('pricelist')]));
            return FALSE;
        }

    }   

}


}