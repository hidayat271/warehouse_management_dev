<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lock extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
        $this->load->library('encryption');
		$this->load->model('login/login_m', 'model_login');
		$this->load->model('chat/message_m', 'model_message');
		$this->load->model('store/store_m', 'model_store');
	}

	public function index()
	{
		$this->data['count_message'] = $this->model_message->unread($this->session->userdata('account')['id']);

		$this->data['content'] = "lock_form";
		$this->load->view('template/_main_blank_template', $this->data);
	}

	public function process(){
		$user = $this->session->userdata('account');
		if($user){
	        $password = $this->input->post("password");
	        $data_users = $this->model_login->get_login_info($user['username']);

	        foreach ($data_users as $value) {
	            $data_password = $this->encryption->decrypt($value->password);
	            $data_pin = $this->encryption->decrypt($value->pin);
	            if ($password == $data_password || $password == $data_pin) {
	                $update_data = array('last_login' => date('Y-m-d H:i:s'), 'ip_address' => $this->input->ip_address());
	               	$data_store = $this->model_store->get_by_code($value->lokasi);
                	$this->model_login->set_session($value, $data_store);
	                $this->model_login->save($update_data, $value->id);

	                redirect('dashboard','refresh');
	            }
	        }

	        redirect('lock','refresh');
        }

        redirect('login','refresh');
    }

}

/* End of file Lock.php */
/* Location: ./application/modules/lock/controllers/Lock.php */