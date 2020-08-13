<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Api_model extends CI_Model
{
    
     public function check_useraccount($email){
        $this->db->select('*');
        $this->db->from('tm_users');
        $this->db->where('email', $email);
         $query = $this->db->get();
        return $query->row_array();
    }
    
    public function check_useraccount_mobile($mobile_no){
        $this->db->select('*');
        $this->db->from('tm_users');
        $this->db->where('mobile_no', $mobile_no);
         $query = $this->db->get();
        return $query->row_array();
    }
    public function user_register(){
        $user_data = array(
            'full_name' => $this->security->xss_clean($this->input->post('full_name')),
            'email' => $this->security->xss_clean($this->input->post('email')),
            'country_code' => $this->security->xss_clean($this->input->post('country_code')),
            'mobile_no' => $this->security->xss_clean($this->input->post('mobile_no')),
            'password' => $this->security->xss_clean(hash('sha256', $this->input->post('password'))),
        );
        $this->db->insert('tm_users', $user_data);
        $id =   $this->db->insert_id();
        $this->db->select('*');
        $this->db->from('tm_users u');
        $this->db->where('u.user_id',$id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_userdata($user_id){
        $this->db->select('*');
        $this->db->from('tm_users u');
        $this->db->where(['u.user_id' => $user_id, 'status' => 'Active']);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function check_alreadyexist($user_id, $tokenid){
        $query = $this->db->get_where('tm_firebase_token',['user_id'=>$user_id,'token_id'=>$tokenid]);
        return $query->row_array();

    }

    public function update_tokenid($token_update){
         $query = $this->db->update('tm_firebase_token',$token_update);
         return $this->db->affected_rows();
    }
    public function insert_tokenid($token_info){
         $query = $this->db->insert('tm_firebase_token',$token_info);
         return $this->db->insert_id();

    }

    public function check_oldpassword(){
        $user_id = $this->security->xss_clean($this->input->post('user_id'));
        $current_password = $this->security->xss_clean(hash('sha256', $this->input->post('current_password')));
        $query = $this->db->get_where('tm_users', ['user_id' => $user_id, 'password' => $current_password, 'status' => 'Active']);
        return $query->row_array();
    }
    public function change_password($user_id){
        $password = $this->security->xss_clean(hash('sha256', $this->input->post('password')));
        $this->db->update('tm_users', ['password' => $password], ['user_id' => $user_id, 'status' => 'Active']);
        return $this->db->affected_rows();
    }

    
    public function device_specification(){
        $this->db->select('*');
        $this->db->from('tm_device_specification');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function manualTestingResult($device_id)
    {
        $this->db->select('*');
        $this->db->from('manual_testing');        
        $this->db->where('device_id',$device_id);
        $this->db->order_by('testing_id','desc');
        $sel = $this->db->get();
        return $sel->row_array();        
    }
    
    public function manualHistory($device_id){
     $this->db->select('*');
        $this->db->from('manual_testing');
        $this->db->join('automatic_testing at','at.testing_id=manual_testing.automatic_testing_id');
        $this->db->where('manual_testing.device_id',$device_id);        
        $sel = $this->db->get();
        return $sel->result_array();   
    }
    
    public function automaticTestingResult($device_id){
        $this->db->select('*');
        $this->db->from('automatic_testing');        
        $this->db->where('device_id',$device_id);
        $this->db->order_by('testing_id','desc');
        $sel = $this->db->get();
        return $sel->row_array();
    } 
    
    public function automaticHistory($device_id){
        $this->db->select('automatic_testing.*,mt.*,ct.*,automatic_testing.testing_id');
        $this->db->from('automatic_testing');
        $this->db->join('manual_testing mt','mt.automatic_testing_id=automatic_testing.testing_id');
        $this->db->join('cosmetic_testing ct','ct.automatic_testing_id=automatic_testing.testing_id');
        $this->db->where('automatic_testing.device_id',$device_id);
        $this->db->order_by('automatic_testing.testing_id','desc');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function quickHistory($device_id){
        $this->db->select('automatic_testing.*,mt.*,ct.*,automatic_testing.testing_id');
        $this->db->from('automatic_testing');
        $this->db->join('quick_testing mt','mt.automatic_testing_id=automatic_testing.testing_id');
        $this->db->join('cosmetic_testing ct','ct.automatic_testing_id=automatic_testing.testing_id');
        $this->db->where('automatic_testing.device_id',$device_id);
        $this->db->order_by('automatic_testing.testing_id','desc');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function cosmeticHistory($device_id){
        $this->db->select('*');
        $this->db->from('cosmetic_testing');
        $this->db->join('automatic_testing at','at.testing_id=cosmetic_testing.automatic_testing_id');
        $this->db->where('cosmetic_testing.device_id',$device_id);        
        $sel = $this->db->get();
        return $sel->result_array(); 
    }
    
    public function cosmeticTestingResult($device_id){
        $this->db->select('*');
        $this->db->from('cosmetic_testing');        
        $this->db->where('device_id',$device_id);
        $this->db->order_by('testing_id','desc');
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function login($email, $password) {
        $this->db->select('*');
        $this->db->from('tm_users');
        $this->db->where([ 'password' => $password, 'status' => 'Active']);
        $this->db->where("(email = '$email' OR mobile_no = '$email')");
        $query = $this->db->get();
        return $query->row_array();
    }

    public function check_email($email){
        $this->db->select('*');
        $this->db->from('tm_users');
        $this->db->where(['email' => $email, 'status' => 'Active']);
        $query = $this->db->get();
        return $query->row_array();

    }
    
    public function check_phone($number){
        $this->db->select('*');
        $this->db->from('tm_users');
        $this->db->where(['mobile_no' => $number, 'status' => 'Active']);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function insert_user_activationcode($user_id){
        $this->db->update('tm_users', ['is_forgot' => 'Active'], ['user_id' => $user_id]);
        return $this->db->affected_rows();
    }
    public function do_reset_passowrd($user_id){
        $reset_data = array(
            'password' => $this->security->xss_clean(hash('sha256', $this->input->post('newpassword')))
        );
        $this->db->update('tm_users', $reset_data, ['user_id' => $user_id]);
//        $this->db->update('tm_users', ['is_forgot' => 'Inactive'], ['user_id' => $user_id]);
        return $this->db->affected_rows();
    }
   /* public function edit_profile_image($user_id, $image_url){
        $this->db->update('tm_users', ['image_url' => $image_url], ['user_id' => $user_id]);
        $this->db->affected_rows();
        $this->db->select('*');
        $this->db->from('tm_users');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        return $query->row_array();
    }*/

    public function edit_profile($user_id,$image_url){
        $user_info = array(
        'full_name' => $this->security->xss_clean($this->input->post('full_name')),
        'email' => $this->security->xss_clean($this->input->post('email')),
        'mobile_no' => $this->security->xss_clean($this->input->post('mobile_no')),
        'image_url' => $image_url,
        );
        $this->db->update('tm_users', $user_info, ['user_id' => $user_id]);
        $this->db->affected_rows();
        $this->db->select('tm_users.*');
        $query = $this->db->get_where('tm_users', ['user_id' => $user_id]);
        return $query->row_array();
    }

    public function get_faqs(){
        $this->db->select('id,title,description');
        $query = $this->db->get_where('tm_faq', ['status' => 'Active']);
        return $query->result_array();

    }
    
    
    public function userDevice($device_id)
    { 
        $data = array(
        'user_id'=>$this->input->post('user_id'),
        'device_id'=>$device_id,
        'device_name'=>$this->input->post('name'),
        'model_no'=>$this->input->post('model_no'),
        'device_ram'=>$this->input->post('ram'),
        'main_camera'=>$this->input->post('back_camera'),
        'front_camera'=>$this->input->post('front_camera'),
        'imei'=>$this->input->post('imei'),
        'processor'=>$this->input->post('processor'),
        'os'=>$this->input->post('os'),
        'resolution'=>$this->input->post('resolution'),
        'storage'=>$this->input->post('storage'),
        );
        $this->db->insert('tm_user_device',$data);
        $id =  $this->db->insert_id();
        $this->db->select('*');
        $this->db->from('tm_user_device');
        $this->db->where('id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function checkDeviceId($device_id){
        $this->db->select('*');
        $this->db->from('tm_user_device');
        $this->db->where('device_id',$device_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function manualTouchScreen(){
        $data = array(
        'device_id'=>$this->input->post('device_id'),
        'touch_Screen'=>$this->input->post('score'),
        'user_id'=>$this->input->post('user_id'),
        'automatic_testing_id'=>$this->input->post('automatic_testing_id')
        );
        $this->db->insert('manual_testing',$data);
        return $this->db->insert_id();
    }
    
    public function updatemanualTouchScreen(){
       $data = array(
        'touch_Screen'=>$this->input->post('score')
        ); 
        
        $this->db->where('automatic_testing_id',$this->input->post('automatic_testing_id'));
        $this->db->update('manual_testing',$data);
        return true;
    }
    
    public function checkManualTouchscreen(){
      $auto = $this->input->post('automatic_testing_id');
      $sel = $this->db->get_where('manual_testing',['automatic_testing_id'=>$auto]);
      return $sel->row_array();
    }
    
    public function quickTouchscreen(){
        $data = array(
        'device_id'=>$this->input->post('device_id'),
        'touch_Screen'=>$this->input->post('score'),
        'user_id'=>$this->input->post('user_id'),
        'automatic_testing_id'=>$this->input->post('automatic_testing_id')
        );
        $this->db->insert('quick_testing',$data);
        return $this->db->insert_id();
    }
    
    public function manualTesting(){
        $this->db->where('testing_id',$this->input->post('testing_id'));
        $this->db->update('manual_testing',[$this->input->post('key')=>$this->input->post('score')]);
        return true;
        
    }
    
    public function automaticBattery(){
        $data = array(
        'device_id'=>$this->input->post('device_id'),
        'battery'=>$this->input->post('score'),
        'user_id'=>$this->input->post('user_id')
        );
        $this->db->insert('automatic_testing',$data);
        return $this->db->insert_id();
    }
    
    public function automaticTesting(){
        $this->db->where('testing_id',$this->input->post('testing_id'));
        $this->db->update('automatic_testing',[$this->input->post('key')=>$this->input->post('score')]);
        return true;
    }
    
    public function quickTesting(){
        $this->db->where('testing_id',$this->input->post('testing_id'));
        $this->db->update('quick_testing',[$this->input->post('key')=>$this->input->post('score')]);
        return true;
    }
    
    public function cosmeticTesting(){
        
        $data = array(
        'user_id'=>$this->input->post('user_id'),
        'device_id'=>$this->input->post('device_id'),
        'automatic_testing_id'=>$this->input->post('automatic_testing_id'),
        'display'=> $this->input->post('display'),
        'all_sides'=> $this->input->post('sides'),
        'buttons'=> $this->input->post('buttons'),
        'rear_back_cover'=> $this->input->post('rear_back_cover'),
        'image_shaddow'=> $this->input->post('image_shaddow'),
        
        );
        
        $this->db->insert('cosmetic_testing',$data);
        return $this->db->insert_id();
        
    }
    
    public function sellMe(){
        $data = array(
        'user_id'=>$this->input->post('user_id'),
        'device_id'=>$this->input->post('device_id'),
        'first_name'=>$this->input->post('first_name'),
        'last_name'=>$this->input->post('last_name'),
        'email'=>$this->input->post('email'),
        'address'=>$this->input->post('address'),
        'phone'=>$this->input->post('phone'),
        'quality'=>$this->input->post('quality'),
        'backup'=>$this->input->post('backup'),
        'account'=>$this->input->post('account'),
        'power'=>$this->input->post('power'),
        'erase_content'=>$this->input->post('erase_content'),
        'sim_card'=>$this->input->post('sim_card'),             
        );
        $this->db->insert('sellme',$data);
        $data1 = array(
        'user_id' => $this->input->post('user_id'),
            'holder_name'=>$this->input->post('holder_name'),
            'account'=>$this->input->post('acc_no'),
            'ifsc'=>$this->input->post('ifsc'),
            'bank_name'=>$this->input->post('bank_name')
        );
        
        $this->db->insert('bank_detail',$data1);
        return $this->db->insert_id();
    }
    
    public function checksellme(){
        $sel = $this->db->get_where('sellme',['user_id'=>$this->input->post('user_id')]);
        if($sel){
            $sel = $this->db->get_where('bank_detail',['user_id'=>$this->input->post('user_id')]);
            return $sel->row_array();
        }
    }
    
    public function updateBankDetails(){
        $user_id = $this->input->post('user_id');
        $data1 = array(        
            'holder_name'=>$this->input->post('holder_name'),
            'account'=>$this->input->post('acc_no'),
            'ifsc'=>$this->input->post('ifsc'),
            'bank_name'=>$this->input->post('bank_name')
        );
        $this->db->where('user_id',$user_id);
        $this->db->update('bank_detail',$data1);
        return true;
        
    }
   
    
    public function updateUserId($testing_id,$device_id,$user_id){
        $this->db->where('testing_id',$testing_id);
        $this->db->update('automatic_testing',['user_id'=>$user_id]);        
        $this->db->where('device_id',$device_id);
        $this->db->update('tm_user_device',['user_id'=>$user_id]);
        return true;
      }
    
    public function warranty($file1){
        $data = array(
        'user_id'=>$this->input->post('user_id'),
        'device_id'=>$this->input->post('device_id'),
        'owner_name'=>$this->input->post('owner_name'),
        'dop'=>$this->input->post('dop'),
        'phone'=>$this->input->post('phone'),
        'model_no'=>$this->input->post('model_no'),
        'serial_no'=>$this->input->post('serial_no'),
        'imei_1'=>$this->input->post('imei_1'),
        'imei_2'=>$this->input->post('imei_2'),
        'warranty_time'=>$this->input->post('warranty_time'),    
        'email'=>$this->input->post('email'),    
        'file'=>$file1
        );
        
        $this->db->insert('warranty',$data);
        return $this->db->insert_id();
    }
    
    public function checkWarranty($device_id){
        $sel = $this->db->get_where('warranty',['device_id'=>$device_id]);
        return $sel->row_array();
    }
    
    public function getDateOfPurchase($device_id){
        $this->db->select('warranty.dop,warranty.warranty_time');
        $this->db->from('warranty');
        $this->db->where('device_id',$device_id);
        $this->db->order_by('warranty_id','desc');
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
//    public function otpVerification(){
//        $this->db->where('id',$this->input->post('id'));
//        $this->db->update('tm_users',['is_verify'=>$this->input->post('is_verify')]);
//        return $this->db->affected_rows();
//    }
    public function otpVerification(){
        $this->db->where('id',$this->input->post('id'));
        $this->db->update('sellme',['is_verified'=>$this->input->post('is_verify')]);
        return $this->db->affected_rows();
    }
    
    public function siteSettings(){
        $sel = $this->db->get_where('tm_web_setting',['function'=>$this->input->post('type')]);
        return $sel->row_array();
    }
    
    public function faq(){
        $this->db->select('*');
        $this->db->from('faq');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function getNotificationList(){
        $sel = $this->db->get_where('tm_notification',['user_id'=>$this->input->post('user_id')]);
        return $sel->result_array();
    }
    
    public function getPrice($device_id){
        $this->db->select('*');
        $this->db->from('tm_mobile_list');
        $this->db->join('tm_user_device','tm_user_device.model_no=tm_mobile_list.mb_model_no');
        $this->db->where('tm_user_device.device_id',$device_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    
    public function claim($file1){
        $data = array(
        'user_id'=>$this->input->post('user_id'),
        'device_id'=>$this->input->post('device_id'),
        'owner_name'=>$this->input->post('owner_name'),
        'dop'=>$this->input->post('dop'),
        'phone'=>$this->input->post('phone'),
        'model_no'=>$this->input->post('model_no'),
        'serial_no'=>$this->input->post('serial_no'),
        'imei_1'=>$this->input->post('imei_1'),
        'imei_2'=>$this->input->post('imei_2'),
        'fault'=>$this->input->post('fault'),
        'email'=>$this->input->post('email'),
        'file'=>$file1
        );
        
        $this->db->insert('claim',$data);
        return $this->db->insert_id();
    }
    
    public function postage(){
       $data = array(        
        'device_id'=>$this->input->post('device_id'),
        'owner_name'=>$this->input->post('owner_name'),        
        'phone'=>$this->input->post('phone'),       
        'email'=>$this->input->post('email'),
        'address'=>$this->input->post('address'),
        'comment'=>$this->input->post('comment'),        
        );
        
        $this->db->insert('postage',$data);
        return $this->db->insert_id(); 
    }
    
    public function quickManualTesting($device_id){
        $this->db->select('*');
        $this->db->from('quick_testing');        
        $this->db->where('device_id',$device_id);
        $this->db->order_by('testing_id','desc');
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function phoneListByUserId($user_id){
        $this->db->select('history.*,tm_user_device.*');
        $this->db->from('tm_user_device');
        $this->db->join('history','history.device_id=tm_user_device.device_id');
        $this->db->where('tm_user_device.user_id',$user_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function sendPhone($user_id,$device_id,$working_price,$non_working_price){
        $data = array(
        'user_id'=>$user_id,
            'device_id'=>$device_id,
            'working_price'=>$working_price,
            'non_working_price'=>$non_working_price,
            'order_status'=>'Phone sent'
        );
        
        $this->db->insert('order_status',$data);
        return $this->db->insert_id();
    }
    
    public function dispatchedList($user_id){
        $this->db->select('order_status.*,tm_user_device.*');
        $this->db->from('order_status');
        $this->db->join('tm_user_device','tm_user_device.device_id=order_status.device_id');
        $this->db->where('order_status.user_id',$user_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function checkresult($device_id){
        $sel = $this->db->get_where('history',['device_id'=>$device_id]);
        return $sel->row_array();
    }
    
    public function updateResult($device_id,$working_price,$non_working_price){
        $data = array(
        'working_price'=>$working_price,
        'non_working_price'=>$non_working_price
        );
        $this->db->where('device_id',$device_id);
        $this->db->update('history',$data);
        return $this->db->affected_rows();
        
        
    }
    
    public function insertResult($device_id,$working_price,$non_working_price){
        $data = array(
        'device_id'=>$device_id,
        'working_price'=>$working_price,
        'non_working_price'=>$non_working_price
        );
        $this->db->insert('history',$data);
        return $this->db->insert_id();
    }
    
    public function checkDeviceHistory($device_id){
        $sel = $this->db->get_where('order_status',['device_id'=>$device_id]);
        return $sel->row_array();
    }
    
    public function dispatchStatusUpdate($device_id,$var){
        $this->db->where('device_id',$device_id);
        $this->db->update('order_status',['order_status'=>$var]);
        return $this->db->affected_rows();
    }
    
    public function warrantyDetails($email){
        $this->db->select('warranty.*,tm_user_device.device_name,tm_user_device.model_no');
        $this->db->from('warranty');
        $this->db->join('tm_users','tm_users.user_id=warranty.user_id');
        $this->db->join('tm_user_device','tm_user_device.device_id=warranty.device_id');
        $this->db->where('tm_users.email',$email);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function warrantyRepair($user_id,$device_id){
        $data = array(
        'user_id'=>$user_id,
        'device_id'=>$device_id,
        'order_status'=>'Phone sent'
        );
        
        $this->db->insert('warranty_repair',$data);
        return $this->db->insert_id();
    }
    
    public function warrantyPhoneList($user_id){
        $this->db->select('warranty_repair.*,tm_user_device.device_name,tm_user_device.model_no');
        $this->db->from('warranty_repair');
        $this->db->join('tm_user_device','tm_user_device.device_id=warranty_repair.device_id');
        $this->db->where('warranty_repair.user_id',$user_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function checkWarrantyRepair($device_id){
        $sel = $this->db->get_where('warranty_repair',['device_id'=>$device_id]);
        return $sel->row_array();
    }
    
    public function privacyPolicy(){
        $sel = $this->db->get_where('tm_web_setting',['function'=>'privacy']);
        return $sel->row_array();
    }
    
    
    
    
}

?>