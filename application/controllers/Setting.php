<?php

/**
 * Description of Setting
 *
 * @author Varun Negi
 */
class Setting extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Admin_model', 'setting_model']);
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
        $data['title'] = "FAQ's";
        $data['notications'] = $this->Admin_model->count_booking();
        $data['admin_info'] = $this->getLoginDetail();
        $data['faqs'] = $this->setting_model->get_faqs();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/sidebar');
        $this->load->view('admin/websetting/faq-list',$data);
        $this->load->view('admin/commons/footer');
    }

    /**
     * add_faqs  using this function add faqs view!
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function add_faqs($id = NUll){
        if (empty($this->session->userdata('email'))) {
            redirect(base_url('admin'));
        }
        if (!empty($id)) {

            $data['faqs'] = $this->setting_model->get_details_byid($id);
        }
        if (!empty($id)) {
            $data['title'] = "Edit FAQ's";
        }else{
            $data['title'] = "Add FAQ's";
        }
      $data['admin_info'] = $this->getLoginDetail();
        $date['editor'] = 1;
        $data['notications'] = $this->Admin_model->count_booking();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/sidebar');
        $this->load->view('admin/websetting/add-faqs');
        $this->load->view('admin/commons/footer');
    }

    /**
     * do_add_faqs add new faqs
     *
     * @return void
     */
    public function do_add_faqs(){
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');

        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $results = $this->setting_model->do_add_faqs();
        if (!empty($results)) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Save changes successfully done.!', 'url' => base_url('admin/settings/faqs')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'No changes found here.!', 'url' => base_url('settings/faqs')]));
            return FALSE;
        }
    }

    /**
     * view_details using this function view details of faqs
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function view_details($id){
        if (empty($id)) {
            redirect(base_url('admin'));
        }
        $data['title'] = "view faqs";
        $data['notications'] = $this->Admin_model->count_booking();
        $data['admin_info'] = $this->getLoginDetail();
        $data['faqsdetails'] = $this->setting_model->get_faqs_details($id);
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/sidebar');
        $this->load->view('admin/websetting/view-faqs',$data);
        $this->load->view('admin/commons/footer');
    }

    /**
     * do_update_faqs using this function update faqs!
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function do_update_faqs($id){
         $this->output->set_content_type('application/json');
         $this->form_validation->set_rules('title', 'Title', 'trim|required');
         $this->form_validation->set_rules('description', 'Description', 'trim|required');

         if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
         }

        $results = $this->setting_model->do_update_faqs($id);
        if (!empty($results)) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Update  successfully done.!', 'url' => base_url('admin/settings/faqs')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'No changes found here.!', 'url' => base_url('admin/settings/terms-and-conditions')]));
            return FALSE;
        }

    }

    /**
     * faqs_chnage_status using this change status!
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function faqs_chnage_status($id){
         $this->output->set_content_type('application/json');
          $result = $this->setting_model->chnage_status($id);
        if (!empty($result)) {
            $this->output->set_output(json_encode(['result' => 1,  'msg' => 'Status Update  Successfully']));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Somethin went wrong']));
            return FALSE;
        }

    }

    /**
     * delete_faqs detele FAQs here
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function delete_faqs($id){
        $this->output->set_content_type('application/json');
        $result = $this->setting_model->delete_faqs($id);
        if (!empty($result)) {
            $this->output->set_output(json_encode(['result' => 1,  'msg' => 'Status Delete  Successfully', 'url' => base_url('admin/settings/faqs')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Somethin went wrong', 'url' => base_url('admin/settings/faqs')]));
            return FALSE;
        }

    }

      public function terms() {
         if(empty($this->is_login())){
            redirect(base_url('admin'));
        }
        $data['title'] = 'Terms and Conditions';
        $data['editor'] = '1';
        $data['admin_info'] = $this->getLoginDetail();
        $data['notications'] = $this->Admin_model->count_booking();
        $data['msg'] = $this->setting_model->fetchterms();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/sidebar', $data);
        $this->load->view('admin/websetting/terms-and-conditions');
        $this->load->view('admin/commons/footer');
    }
    public function update_terms($id) {
        $this->output->set_content_type('application/json');
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $results = $this->setting_model->upd_terms($id,$title,$description); 
        if (!empty($results)) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Save changes successfully done.!', 'url' => base_url('admin/settings/term-and-conditions')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'No changes found here.!', 'url' => base_url('admin/settings/term-and-conditions')]));
            return FALSE;
        }
    }
    
    public function about() {
         if(empty($this->is_login())){
            redirect(base_url('admin'));
        }
        $data['title'] = 'About';
        $data['editor'] = '1';
      $data['admin_info'] = $this->getLoginDetail();
        $data['notications'] = $this->Admin_model->count_booking();
        $data['msg'] = $this->setting_model->fetchabout();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/sidebar', $data);
        $this->load->view('admin/websetting/about-us');
        $this->load->view('admin/commons/footer');
    }

    public function update_about($id) {
        $this->output->set_content_type('application/json');
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $results = $this->setting_model->update_about($id,$title,$description); 
        if (!empty($results)) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Save changes successfully done.!', 'url' => base_url('admin/settings/about-us')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'No changes found here.!', 'url' => base_url('admin/settings/about-us')]));
            return FALSE;
        }
    }

    

}
