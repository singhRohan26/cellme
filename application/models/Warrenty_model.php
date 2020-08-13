<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warrenty_model extends CI_Model {

	/**
	 * Booking  Model.
	 * Created By varun negi
	 
	 */

	public function warrentdetails(){
		$this->db->select('id,user_id,device_id,order_status,created_at');
		$this->db->from('warranty_repair');
		$this->db->where('user_id IS NOT NULL');
		$this->db->where('device_id IS NOT NULL');
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}
	public function view_booking($device_id){
		$this->db->select('u.*,s.device_id,s.order_status');
		$this->db->from('warranty_repair s');
		$this->db->join('tm_users u','u.user_id = s.user_id');
		$this->db->where('s.device_id',$device_id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getwarrentydetail($user_id,$device_id){
		$this->db->select('*');
		$this->db->from('warranty');
		$this->db->where('device_id',$device_id);
		$this->db->group_by('device_id');
		$query = $this->db->get();
		return $query->row_array();

	}


	public function getuserdetails($user_id){
		$query = $this->db->get_where('tm_users',['user_id' =>$user_id]);
		return $query->row_array();

	}


	public function warrentyupdatestatus($user_id,$device_id,$status,$image_url){
		$data = array(
			'order_status' =>$status,
			'image'=>$image_url,
		);
		$query = $this->db->update('warranty_repair', $data, array('user_id'=>$user_id,'device_id'=>$device_id));//update 
      return $this->db->affected_rows();
	}

	public function addorderstatus($user_id,$device_id){
		$data = array(
			'order_status'=>$this->input->post('status'),
		);
      $query = $this->db->update('warranty_repair', $data, array('user_id'=>$user_id,'device_id'=>$device_id));//update 
      return $this->db->affected_rows();
  }
  public function get_userdata($user_id){
  	$this->db->select('*');
  	$this->db->from('tm_users u');
  	$this->db->where(['u.user_id' => $user_id, 'status' => 'Active']);
  	$query = $this->db->get();
  	return $query->row_array();
  }
  public function gettoken($user_id){
  	$this->db->select('token_id');
  	$this->db->from('tm_firebase_token');
  	$this->db->where('user_id', $user_id);
  	$this->db->where('status','Active');
  	$query = $this->db->get();
  	return $query->result_array();
  }


}