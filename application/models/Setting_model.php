<?php

/**
 * Description of Setting_model
 *
 * @author Varun Negi
 */
class Setting_model extends CI_Model {

   
    public function fetchterms() {
        $terms = $this->db->get_where('tm_web_setting', ['function' => 'terms']);
        return $terms->row_array();
    }
     public function upd_terms($id,$title,$description) {
        $terms =array(
            'title' =>$this->input->post('title'),
            'description' => $this->input->post('description')
        );
        $this->db->update('tm_web_setting', $terms ,['id'=> $id]);
        return $this->db->affected_rows();
    }
    
    public function fetchabout() {
        $sel = $this->db->get_where('tm_web_setting', ['function' => 'aboutus']);
        return $sel->row_array();
    }
   

   public function update_about($id,$title,$description) {
        $terms =array(
            'title' =>$this->input->post('title'),
            'description' => $this->input->post('description')
        );
        $this->db->update('tm_web_setting', $terms ,['id'=> $id]);
        return $this->db->affected_rows();
    }
   
    public function get_faqs()
    {
        $this->db->select('*');
        $query = $this->db->get('tm_faqs');
        return $query->result_array();
    }

    public function do_add_faqs(){
        $faqs_data =array(
            'title' =>$this->input->post('title'),
            'description' => $this->input->post('description')
        );
        $this->db->insert('tm_faqs',$faqs_data);
        return $this->db->insert_id();
    }
// view full details of faqs
    public function get_faqs_details($id){
        $query = $this->db->get_where('tm_faqs', ['id'=>$id]); 
        return $query->row_array();
    }

    public function get_details_byid($id){
        $query = $this->db->get_where('tm_faqs', ['id'=>$id]); 
        return $query->row_array();
    }

   public function do_update_faqs($id){
       $faqs_data =array(
            'title' =>$this->input->post('title'),
            'description' => $this->input->post('description')
        );
        $this->db->update('tm_faqs', $faqs_data ,['id'=> $id]);
        return $this->db->affected_rows();
    }

    public function chnage_status($id){
         $status = array(
        'status'=>$this->security->xss_clean($this->input->post('name'))
        ); 
        $this->db->update('tm_faqs',$status,['id'=> $id]);
        return $this->db->affected_rows();

    }

    public function delete_faqs($id){
        $this->db->delete('tm_faqs',['id'=> $id]);
        return $this->db->affected_rows();
    }
   
}
