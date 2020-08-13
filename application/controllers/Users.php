<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Description of Users Controller
 *
 * @author Mukesh Yadav
 */
class Users extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model(['Users_model','Admin_model']);
    }
    
    private function getLoginDetail(){
        $email = $this->session->userdata('email');
        return $this->Admin_model->getLoginDetail($email);
    }

    /**
     * index   this function using for user list!.
     *
     * @return void
     */
    public function index(){
        if (empty($this->session->userdata('email'))) {
            redirect(base_url('admin'));
        }
        $data['title'] = "Account Management";
        $data['notications'] = $this->Admin_model->count_booking();
        $data['admin_info'] = $this->getLoginDetail();
        $data['users'] = $this->Users_model->get_users();
        //print_r($data['users']);die;
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/sidebar');
        $this->load->view('admin/users/users-list');
        $this->load->view('admin/commons/footer');
    }


    /**
     * chnage_status use for user account status
     *
     * @return void
     */
    public function chnage_status($id){
        $this->output->set_content_type('application/json');
        $result = $this->Users_model->chnage_status($id);
        if (!empty($result)) {
            $this->output->set_output(json_encode(['result' => 1,  'msg' => 'Status Update  Successfully']));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Somethin went wrong']));
            return FALSE;
        }
    }

    /**
     * view_user_info get user detail and show
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function view_user_info($id){
        $data['title'] = "Users Infromation";
        $data['notications'] = $this->Admin_model->count_booking();
         $data['admin_info'] = $this->getLoginDetail();
        $data['User_information'] = $this->Users_model->view_user_info($id);
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/sidebar');
        $this->load->view('admin/users/user-information',$data);
        $this->load->view('admin/commons/footer');
    } 
}
