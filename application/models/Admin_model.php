<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	/**
	 * Admin  Model.
	 * Created By Ram Yadav
	 
	 */

	public function checkLogin() {
        $data = array(
            'email' => $this->security->xss_clean($this->input->post('email')),
            'password' => $this->security->xss_clean(hash('sha256', $this->input->post('password')))
        );
        $query = $this->db->get_where('admin', $data);
        return $query->row_array();
    }


    public function getLoginDetail($email){
        $query = $this->db->get_where('admin', ['email' => $email]);
        return $query->row_array();
    }
    public function doChangePass(){
        $data = array(
            'password' => $this->security->xss_clean(hash('sha256', $this->input->post('npass')))
        );
        $this->db->update('admin', $data);
        return $this->db->affected_rows();
    }

    public function getEmailId(){
        $query = $this->db->get_where('admin', ['email' => $this->security->xss_clean($this->input->post('email'))]);
        return $query->row_array();
    }
    public function updatePassword($password){
        $data = array(
            'password' => $this->security->xss_clean(hash('sha256', $password))
        );
        $this->db->update('admin', $data);
        return $this->db->affected_rows();
    }

    public function edit_profile($id){
       $query = $this->db->get_where('admin',['id'=>$id]);
       return $query->row_array();
    }
     public function get_login_data($id){
        $query = $this->db->get_where('admin', ['id' => $id]);
        return $query->row_array();

    }
     public function count_user(){
       $this->db->select('count(user_id) as count');
       $this->db->from('tm_users');
       $query = $this->db->get(); 
     //echo $this->db->last_query();die; 
        return $query->row_array();

    }

     public function count_booking(){
       $this->db->select('count(id) as booking');
       $this->db->from('order_status');
       $query = $this->db->get(); 
        return $query->row_array();

    }
     public function doChangeProfile($id,$img){
         $logindata = array(
        'name' => $this->security->xss_clean($this->input->post('admin_name')),
        'email' => $this->security->xss_clean($this->input->post('email_id')),
        'image_url' =>$img
      );
         $this->db->update('admin', $logindata,['id'=>$id]);
        return $this->db->affected_rows();

    }
    /* notification */
     public function getAllUsersNotifications(){
        $this->db->select('u.*');
        $this->db->from('tm_users u');
        $this->db->where('status','Active');
        $this->db->order_by('user_id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

     public function getUserById($user_id) {
        $query = $this->db->get_where('tm_users', ['user_id' => $user_id]);
        return $query->row_array();
    }
     public function getTokenIdByUser_id($user_id) {
        $query = $this->db->get_where('tm_firebase_token', ['user_id' => $user_id, 'status' =>'Active']);
        return $query->row_array();
    }

        public function addNotification($title, $body, $user_id) {
        $data = array(
            'title' => $title,
            'body' => $body,
            'user_id' => $user_id
        );
        $this->db->insert('tm_notification', $data);
        return $this->db->insert_id();
    }
     public function getNotificationByUserId($user_id) {
        $query = $this->db->get_where('tm_notification', ['user_id' => $user_id]);
        return $query->result_array();
    }
    
}
