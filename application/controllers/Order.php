<?php

/**
 * Description of Setting
 *
 * @author Varun Negi
 */
class Order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Admin_model', 'Order_model']);
    }
  
   private function is_login(){
        return $this->session->userdata('email');
    }
    private function getLoginDetail(){
        $email = $this->session->userdata('email');
        return $this->Admin_model->getLoginDetail($email);
    }


    public function index(){
        if (empty($this->session->userdata('email'))) {
            redirect(base_url('admin'));
        }
        
            $data['status'] = $this->Order_model->getorder_status();
            //print_r($data['status']);die;
             $i = 0;
           foreach ($data['status'] as $status) {
                    $todays = $status['created_at'];
                    $newDateTime = date('Y-m-d', strtotime($todays));
                    $next_date = date('Y-m-d', strtotime($newDateTime . ' + 7 days'));
                    $today = date('Y-m-d');
            if ($next_date == $today && $status['order_status'] =='Phone sent') {
                $res = $this->Order_model->changeorderstatus($status['id']);
      
              }
              else {
                    $result[$i]['order_status'] = "";
                }
                  $i++;
          }
          echo 'status Update';

}
}