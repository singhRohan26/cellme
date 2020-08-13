<?php
defined('BASEPATH') or exit ('No direct script access allowed');

/**
 * Author Varun Negi
 */
class Account extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model(['Admin_model','Account_model']);
	}

	private function is_login(){
		return $this->session->userdata('email');
	}

	private function getLoginDetail(){
        $email = $this->session->userdata('email');
        return $this->Admin_model->getLoginDetail($email);
    }

	public function index($id = NULL) {
		if(empty($this->is_login())){
			redirect(base_url('admin'));
		}
        $data['table'] = '1';
        $data['title'] = 'Account Management';
        $data['admin_info'] = $this->getLoginDetail();
        $data['checkformdata'] = $this->Account_model->checkinformdata();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/sidebar', $data);
        $this->load->view('admin/account/account-list');
        $this->load->view('admin/commons/footer');
    }


    /**
     * view_user_info get user detail and show
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function view_checkin_form_data($id){
        $data['title'] = "chekinform Infromation";
        $data['admin_info'] = $this->getLoginDetail();
        $data['User_information'] = $this->Account_model->view_user_info($id);
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/sidebar');
        $this->load->view('admin/account/account-information',$data);
        $this->load->view('admin/commons/footer');
    }

    

}