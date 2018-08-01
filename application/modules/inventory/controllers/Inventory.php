<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('pagination');
		$this->load->model('inventory_m', 'model_inventory');
	}

	public function index()
	{
		$limit_per_page = 5;
        $page = ($this->input->get('per_page')) ? ($this->input->get('per_page') - 1) : 0;
        $total_records = $this->model_inventory->get_total();
     
        if ($total_records > 0)
        {
        	// get current page records
        	$this->db->where('store', $this->session->userdata('account')['store_code']);
            $this->data["data_inventorys"] = $this->model_inventory->get_current_page_records($limit_per_page, $page*$limit_per_page);
             
        	$config = $this->model_inventory->config_page(base_url('inventory/index'), $total_records, $limit_per_page);
        	$this->pagination->initialize($config);
                 
            // build paging links
            $this->data["link_page"] = $this->pagination->create_links();
        }

		$this->data['content'] = "inventory_list_page";
		$this->load->view('template/_main_page_template', $this->data);
	}

}

/* End of file Inventory.php */
/* Location: ./application/modules/inventory/controllers/Inventory.php */