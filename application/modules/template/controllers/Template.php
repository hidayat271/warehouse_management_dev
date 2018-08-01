<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MY_Controller {

	public function index()
	{
		$this->load->view('_main_page_template', $this->data);
	}

	public function blank()
	{
		$this->load->view('_main_blank_template', $this->data);
	}

}

/* End of file Template.php */
/* Location: ./application/modules/template/controllers/Template.php */