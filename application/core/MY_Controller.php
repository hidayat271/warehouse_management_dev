<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $data = array();

	public function __construct()
	{
		parent::__construct();

		date_default_timezone_set("Asia/Jakarta");

		$this->load->model('employees/employees_m', 'model_employees_core');
		$this->load->model('chat/message_m', 'model_message_core');
		$id = $this->session->userdata('account')['id'];
		$this->data['cur_user'] = $this->model_employees_core->get($id);
		$contacts 	  = $this->model_employees_core->get();
		foreach ($contacts as $key=>$contact) {
			//get unread messages from this user
			$unread = $this->model_message_core->unread_per_user($id, $contact->id); 
			$contacts[$key]->unread =  $unread > 0 ? $unread : null ; 
		}
		$this->data['users'] = $contacts;

	}
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */