<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

	/**
	 * Order  Model.
	 * Created By Varun Negi
	 
	 */

	public function getorder_status(){
		$this->db->select('*');
		$this->db->from('order_status');
		 $query = $this->db->get();
		return $query->result_array();
	}

	public function changeorderstatus($id){
	$status = 'Pending';
	$data = array(
     'order_status' =>$status,
	);
	$this->db->update('order_status', $data, array('id'=>$id));//update 
     return $this->db->affected_rows();
	}
}