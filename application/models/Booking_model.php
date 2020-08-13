<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_model extends CI_Model {

	/**
	 * Booking  Model.
	 * Created By varun negi
	 
	 */

	public function booking_details(){
		$this->db->select('id,user_id,device_id,working_price,non_working_price,order_status,message,created_at');
		$this->db->from('order_status');
		$this->db->where('user_id IS NOT NULL');
		$this->db->where('device_id IS NOT NULL');
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}
	public function view_booking($device_id){
		$this->db->select('u.*,s.*');
		$this->db->from('order_status s');
		$this->db->join('tm_users u','u.user_id = s.user_id');
		//$this->db->group_by('s.device_id');
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
	public function invoice_generate($id){
		$query = $this->db->get_where('sellme',['id' => $id]);
		return $query->row_array();
	}

	public function getAllMobileList(){
		$this->db->select('*');
		$this->db->from('tm_mobile_list');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getDeviceListById($id){
		$this->db->select('*');
		$this->db->from('tm_mobile_list');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row_array();
	}


	public function getuserdetails($user_id){
		$query = $this->db->get_where('tm_users',['user_id' =>$user_id]);
		return $query->row_array();

	}

	public function do_add_device(){
		$data = array(
			'mb_id' =>$this->input->post('mobile_id'),
			'mb_model_no' =>$this->input->post('model_no'),
			'mb_model_checkmend' =>$this->input->post('model_checkmend'),
			'mb_working_price' =>$this->input->post('working_price'),
			'mb_not_working_price' =>$this->input->post('not_working_price'),
		);
		$this->db->insert('tm_mobile_list',$data);
		return $this->db->insert_id();
	}

	public function insertmobilelist($data){
		$this->db->insert_batch('tm_mobile_list',$data);
		return $this->db->insert_id();
	}

	public function updateorderstatus($user_id,$device_id){
		$data = array(
			'order_status' =>$this->input->post('status'),
			'message' =>$this->input->post('message'),
		);
		$this->db->update('order_status', $data, ['user_id' => $user_id, 'device_id' =>$device_id]);
		return $this->db->affected_rows();
	}

	public function updateorderstatusprice($user_id,$device_id,$image_url){
		$data = array(
			'order_status' =>$this->input->post('status'),
			'price' =>$this->input->post('price'),
			'image'=>$image_url,
		);
		$this->db->update('order_status', $data, ['user_id' => $user_id, 'device_id' =>$device_id]);
		return $this->db->affected_rows();
	}

	public function addorderstatus($user_id,$device_id){
		$data = array(
			'order_status'=>$this->input->post('status'),
		);
      $query = $this->db->update('order_status', $data, array('user_id'=>$user_id,'device_id'=>$device_id));//update 
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