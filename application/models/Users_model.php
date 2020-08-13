<?php
/**
 * Description of Users_model
 *
 * @author Mukesh Yadav
 */
class Users_model extends CI_Model{

    public function __construct(){

        parent::__construct();
        $this->db->reconnect();
    }

    public function get_users(){
        $this->db->select('*');
        $this->db->from('tm_users');
        $this->db->order_by('user_id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }
  
    public function chnage_status($id){
        $status = array(
        'status'=>$this->security->xss_clean($this->input->post('name'))
        ); 
        $this->db->update('tm_users',$status,['user_id'=> $id]);
        return $this->db->affected_rows();      
       
    }

    public function view_user_info($id){
        $query = $this->db->get_where('tm_users',['user_id'=> $id]);
        return $query->row_array();
    }
}