<?php
defined('BASEPATH') or exit ('No direct script access allowed');

/**
 * Author Rajat Agarwal
 */
class Notification extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model(['Admin_model']);
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
        $data['title'] = 'Notification';
         $data['admin_info'] = $this->getLoginDetail();
         $data['notications'] = $this->Admin_model->count_booking();
        $data['users'] = $this->Admin_model->getAllUsersNotifications();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/sidebar', $data);
        $this->load->view('admin/notification/notification');
        $this->load->view('admin/commons/footer');
    }

    public function setUserInNotification() {
        $this->output->set_content_type('application/json');
        $user_id = $this->input->post('user_id');
        $data['user_id'] = implode(',', $user_id);
        $list = [];
        $i = 0;
        foreach ($user_id as $user) {
            $arr = $this->Admin_model->getUserById($user);
            $list[$i] = $arr['full_name'];
            $i++;
        }
        $data['user_name'] = implode(',', $list);
        $content_wrapper = $this->load->view('admin/notification/send-notification-wrapper', $data, true);
        $this->output->set_output(json_encode(['result' => 1, 'notification_wrapper' => $content_wrapper]));
        return FALSE;
    }

    public function do_send_notification() {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $user_ids = explode(',', $this->input->post('user_id'));
        $title = $this->input->post('title');
        $body = $this->input->post('body');

        $token_arrs = [];
        $i = 0;
        foreach ($user_ids as $user_id) {
            $token = $this->Admin_model->getTokenIdByUser_id($user_id);
            $token_arrs[$i]['token_id'] = $token['token_id'];
            $token_arrs[$i]['user_id'] = $user_id;
            $i++;
        }

        foreach ($token_arrs as $tok) {
            $msg = array(
                'body' => $body,
                'title' => $title
            );

            $fields = array(
                'to' => $tok["token_id"],
                'notification' => $msg
            );
            
            $this->Admin_model->addNotification($title, $body, $tok['user_id']);
            
            $headers = array('Authorization:key = ' . 'AAAAvoE-tGc:APA91bEfBDIaCjg6M7pQfvFt5lbQgdat19NgTrxZyC7jRD91KZ_J6FOVJSFjsXhW--xyxZvb2kdZG1G92Kw2Z3RHKnCNvjkT5w5OhPyzC6TsaecLC7OYrYfIVVdTaEa_Njb30a8viusi',
                'Content-Type: application/json'
            );
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

            $result = curl_exec($ch);
            if ($result === FALSE) {
                die('Curl failed: ' . curl_error($ch));
            }
            curl_close($ch);
        }
        $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Notification Send Sucessfully', 'url' => base_url('admin/notification')]));
        return FALSE;
    }
    
    public function view_user_notification($user_id) {
        if(empty($this->is_login())){
			redirect(base_url('admin'));
		}
        $data['notifications']= $this->admin_model->getNotificationByUserId($user_id);
        $data['title'] = 'Notification';
        $data['table'] = '1';
        $data['notications'] = $this->admin_model->count_booking();
        $data['userData'] = $this->getLoginDetail();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/sidebar', $data);
        $this->load->view('admin/notification/view-user-notification');
        $this->load->view('admin/commons/footer');
    }
}
?>