<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dialy_logisout extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dialy_logisout_m', 'model_dialy_logisout');
		$this->load->library('pagination');
	}

	public function index()
	{
		$limit_per_page = 5;
        $page = ($this->input->get('per_page')) ? ($this->input->get('per_page') - 1) : 0;
        $total_records = $this->model_dialy_logisout->get_total();
     
        if ($total_records > 0)
        {
        	// get current page records
            $this->data["data_logisin"] = $this->model_dialy_logisout->get_current_page_records($limit_per_page, $page*$limit_per_page);
             
        	$config = $this->model_dialy_logisout->config_page(base_url('dialy_logisout/index'), $total_records, $limit_per_page);
        	$this->pagination->initialize($config);
                 
            // build paging links
            $this->data["link_page"] = $this->pagination->create_links();
        }

		$this->data['content'] = "dialy_logisout_list_page";
		$this->load->view('template/_main_page_template', $this->data);
	}

}

/* End of file Dialy_logisout.php */
/* Location: ./application/modules/dialy_logisout/controllers/Dialy_logisout.php */