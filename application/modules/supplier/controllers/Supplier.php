<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('supplier_m', 'model_suppliers');
		$this->load->library('pagination');
	}

	public function get_list()
	{
		$value = $this->input->get('q');
		$this->db->like('code', $value, 'BOTH');
		$this->db->or_like('name', $value, 'BOTH');
		$this->db->or_like('address', $value, 'BOTH');
		$this->db->limit(10);
		$data = $this->model_suppliers->get();
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function index()
	{
		$limit_per_page = 5;
        $page = ($this->input->get('per_page')) ? ($this->input->get('per_page') - 1) : 0;
        $total_records = $this->model_suppliers->get_total();
     
        if ($total_records > 0)
        {
        	// get current page records
            $this->data["data_suppliers"] = $this->model_suppliers->get_current_page_records($limit_per_page, $page*$limit_per_page);
             
        	$config = $this->model_suppliers->config_page(base_url('supplier/index'), $total_records, $limit_per_page);
        	$this->pagination->initialize($config);
                 
            // build paging links
            $this->data["link_page"] = $this->pagination->create_links();
        }

		$this->data['content'] = "supplier_list_page";
		$this->load->view('template/_main_page_template', $this->data);
	}

	public function action($id=NULL)
	{
		$this->data['data_code'] = $this->model_suppliers->generate_id('SPB');

		if($id){
			$this->data['data_suppliers'] = $this->model_suppliers->get($id);
		}
		
		$this->data['content'] = "supplier_action_page";
		$this->load->view('template/_main_page_template', $this->data);
	}

	public function process($id=NULL)
	{
		var_dump($_POST);
		$form = array('kode_supplier','nama_supplier','nama_kontak','handphone','telepon','fax','email','alamat','description');
		$data_form = $this->model_suppliers->array_from_post($form);

		$data_save['code'] = $data_form['kode_supplier'];
		$data_save['name'] = $data_form['nama_supplier'];
		$data_save['contact'] = $data_form['nama_kontak'];
		$data_save['phone'] = $data_form['telepon'];
		$data_save['fax'] = $data_form['fax'];
		$data_save['handphone'] = $data_form['handphone'];
		$data_save['email'] = $data_form['email'];
		$data_save['address'] = $data_form['alamat'];
		$data_save['description'] = $data_form['description'];

		$this->session->set_flashdata('message_type', 'alert-success');
		$this->session->set_flashdata('message', '<strong>Berhasil menyimpan data</strong> : data supplier berhasil dibuat dan sudah siap digunakan');
		$is_save = $this->model_suppliers->save($data_save, $id);

		redirect('supplier','refresh');

	}

	public function delete($id=NULL)
	{
		$this->model_suppliers->delete($id);
		$this->session->set_flashdata('message_type', 'alert-success');
		$this->session->set_flashdata('message', '<strong>Berhasil delete data</strong> : data supplier berhasil didelete');
		redirect('supplier','refresh');
	}

}

/* End of file Supplier.php */
/* Location: ./application/modules/supplier/controllers/Supplier.php */