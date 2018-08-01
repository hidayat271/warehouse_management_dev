<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('customer_m', 'model_customer');
		$this->load->library('pagination');
	}

	public function get_list()
	{
		$value = $this->input->get('q');
		$this->db->like('code', $value, 'BOTH');
		$this->db->or_like('name', $value, 'BOTH');
		$this->db->or_like('daerah', $value, 'BOTH');
		$this->db->limit(10);
		$data = $this->model_customer->get();
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function index()
	{
		$limit_per_page = 5;
        $page = ($this->input->get('per_page')) ? ($this->input->get('per_page') - 1) : 0;
        $total_records = $this->model_customer->get_total();
     
        if ($total_records > 0)
        {
        	// get current page records
            $this->data["data_customers"] = $this->model_customer->get_current_page_records($limit_per_page, $page*$limit_per_page);
             
        	$config = $this->model_customer->config_page(base_url('customer/index'), $total_records, $limit_per_page);
        	$this->pagination->initialize($config);
                 
            // build paging links
            $this->data["link_page"] = $this->pagination->create_links();
        }

		$this->data['content'] = "customer_list_page";
		$this->load->view('template/_main_page_template', $this->data);
	}

	public function action($id=NULL)
	{
		$this->data['data_code'] = $this->model_customer->generate_id('CSS');

		if($id){
			$this->data['data_customers'] = $this->model_customer->get($id);
		}
		
		$this->data['content'] = "customer_action_page";
		$this->load->view('template/_main_page_template', $this->data);
	}

	public function process($id=NULL)
	{
		$form = array('code','name','telepon','handphone','email','alamat','daerah','description');
		$data_form = $this->model_customer->array_from_post($form);

		$data_save['code'] = $data_form['code'];
		$data_save['name'] = $data_form['name'];
		$data_save['telepon'] = $data_form['telepon'];
		$data_save['handphone'] = $data_form['handphone'];
		$data_save['email'] = $data_form['email'];
		$data_save['alamat'] = $data_form['alamat'];
		$data_save['daerah'] = $data_form['daerah'];
		$data_save['description'] = $data_form['description'];

		$this->session->set_flashdata('message_type', 'alert-success');
		$this->session->set_flashdata('message', '<strong>Berhasil menyimpan data</strong> : data customer berhasil dibuat dan sudah siap digunakan');
		$is_save = $this->model_customer->save($data_save, $id);

		redirect('customer','refresh');

	}

	public function delete($id=NULL)
	{
		$this->model_customer->delete($id);
		$this->session->set_flashdata('message_type', 'alert-success');
		$this->session->set_flashdata('message', '<strong>Berhasil delete data</strong> : data customer berhasil didelete');
		redirect('customer','refresh');
	}

}

/* End of file Customer.php */
/* Location: ./application/modules/customer/controllers/Customer.php */