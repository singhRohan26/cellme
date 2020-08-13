<?php
/**
 * Description of Users_model
 *
 * @author Rohan Singh
 */
class User_model extends CI_Model{

    public function __construct(){

        parent::__construct();
        $this->db->reconnect();
    }
    
    public function checkLogin(){
        $data = array(
            'email' => $this->security->xss_clean($this->input->post('email')),
            'password' => $this->security->xss_clean(hash('sha256', $this->input->post('password')))
        );
        $query = $this->db->get_where('tm_users', $data);
        return $query->row_array();
    }
    
    public function getLoginDetail($email){
        $query = $this->db->get_where('tm_users', ['email' => $email]);
        return $query->row_array();
    }
    
    public function getEmailId(){
        $query = $this->db->get_where('tm_users', ['email' => $this->security->xss_clean($this->input->post('email'))]);
        return $query->row_array();
    }
    
    public function updatePassword($password){
        $data = array(
            'password' => $this->security->xss_clean(hash('sha256', $password))
        );
        $this->db->update('tm_users', $data);
        return $this->db->affected_rows();
    }
    
    public function doChangePass(){
        $data = array(
            'password' => $this->security->xss_clean(hash('sha256', $this->input->post('npass')))
        );
        $this->db->update('tm_users', $data);
        return $this->db->affected_rows();
    }
    
    public function doChangeProfile($id,$img){
         $logindata = array(
        'full_name' => $this->security->xss_clean($this->input->post('admin_name')),
        'image_url' =>$img
      );
         $this->db->update('tm_users', $logindata,['user_id'=>$id]);
        return $this->db->affected_rows();

    }
    
    public function warrantyPhoneList($user_id){
        $this->db->select('warranty_repair.*,tm_user_device.device_name,tm_user_device.model_no');
        $this->db->from('warranty_repair');
        $this->db->join('tm_user_device','tm_user_device.device_id=warranty_repair.device_id');
        $this->db->where('warranty_repair.user_id',$user_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function warrantyCount($user_id){
       $this->db->select('warranty_repair.*,tm_user_device.device_name,tm_user_device.model_no');
        $this->db->from('warranty_repair');
        $this->db->join('tm_user_device','tm_user_device.device_id=warranty_repair.device_id');
        $this->db->where('warranty_repair.user_id',$user_id);
        $sel = $this->db->get();
        return $sel->num_rows(); 
    }
    
    public function warrantyInfo($device_id){
        $this->db->select('warranty_repair.*,tm_user_device.*');
        $this->db->from('warranty_repair');
        $this->db->join('tm_user_device','tm_user_device.device_id=warranty_repair.device_id');
        $this->db->where('warranty_repair.device_id',$device_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function dispatchedList($user_id){
        $this->db->select('order_status.*,tm_user_device.*');
        $this->db->from('order_status');
        $this->db->join('tm_user_device','tm_user_device.device_id=order_status.device_id');
        $this->db->where('order_status.user_id',$user_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function sellmeCount($user_id){
        $this->db->select('order_status.*,tm_user_device.*');
        $this->db->from('order_status');
        $this->db->join('tm_user_device','tm_user_device.device_id=order_status.device_id');
        $this->db->where('order_status.user_id',$user_id);
        $sel = $this->db->get();
        return $sel->num_rows();
    }
    
    public function dispatchedInfo($device_id){
         $this->db->select('order_status.*,tm_user_device.*');
        $this->db->from('order_status');
        $this->db->join('tm_user_device','tm_user_device.device_id=order_status.device_id');
        $this->db->where('order_status.device_id',$device_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function changeStatus($device_id,$status){
        $this->db->where('device_id',$device_id);
        $this->db->update('order_status',['order_status'=>$status]);
        return $this->db->affected_rows();
    }

}