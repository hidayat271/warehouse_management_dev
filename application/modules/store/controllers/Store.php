<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('store_m', 'model_store');
		$this->load->library('pagination');
	}

	public function get_list()
	{
		$value = $this->input->get('q');
		$this->db->like('code', $value, 'BOTH');
		$this->db->or_like('name', $value, 'BOTH');
		$this->db->or_like('area', $value, 'BOTH');
		$this->db->or_like('jenis', $value, 'BOTH');
		$this->db->limit(10);
		$data = $this->model_store->get();
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function index()
	{
		$limit_per_page = 5;
        $page = ($this->input->get('per_page')) ? ($this->input->get('per_page') - 1) : 0;
        $total_records = $this->model_store->get_total();
     
        if ($total_records > 0)
        {
        	// get current page records
            $this->data["data_stores"] = $this->model_store->get_current_page_records($limit_per_page, $page*$limit_per_page);
             
        	$config = $this->model_store->config_page(base_url('employees/index'), $total_records, $limit_per_page);
        	$this->pagination->initialize($config);
                 
            // build paging links
            $this->data["link_page"] = $this->pagination->create_links();
        }

		$this->data['content'] = "store_list_page";
		$this->load->view('template/_main_page_template', $this->data);
	}

	public function action($id=NULL)
	{
		$this->data['data_code'] = $this->model_store->generate_id('SWL');

		if($id){
			$this->data['data_toko'] = $this->model_store->get($id);
		}
		
		$this->data['content'] = "store_action_page";
		$this->load->view('template/_main_page_template', $this->data);
	}

	public function process($id=NULL)
	{
		$form = array('kode_store','nama_toko','email','telepon','fax','alamat','area','jenis_toko');
		$data_form = $this->model_store->array_from_post($form);

		$data_save['code'] = $data_form['kode_store'];
		$data_save['name'] = $data_form['nama_toko'];
		$data_save['email'] = $data_form['email'];
		$data_save['telepon'] = $data_form['telepon'];
		$data_save['fax'] = $data_form['fax'];
		$data_save['address'] = $data_form['alamat'];
		$data_save['area'] = $data_form['area'];
		$data_save['jenis'] = $data_form['jenis_toko'];

		$count_email = $this->model_store->is_exist('email', $data_form['email']);
		
		if ($count_email == 0) {
			$this->session->set_flashdata('message_type', 'alert-success');
			$this->session->set_flashdata('message', '<strong>Berhasil menyimpan data</strong> : data toko berhasil dibuat dan sudah siap digunakan');
			$is_save = $this->model_store->save($data_save, $id);

			redirect('store','refresh');
		}else{

			if($id){
					$data_store = $this->model_store->get($id);

				if($data_form['email'] == $data_store->email){
					$this->session->set_flashdata('message_type', 'alert-success');
					$this->session->set_flashdata('message', '<strong>Berhasil menyimpan data</strong> : data store berhasil diubah dan sudah siap digunakan');
					$is_save = $this->model_store->save($data_save, $id);

					redirect('store','refresh');
				}
			}

			$this->session->set_flashdata('message_type', 'alert-warning');
			$this->session->set_flashdata('message', '<strong>Gagal menyimpan data</strong> : email sudah digunakan oleh toko lain');
		}
		$this->action();
	}

	public function delete($id=NULL)
	{
		$this->model_store->delete($id);
		$this->session->set_flashdata('message_type', 'alert-success');
		$this->session->set_flashdata('message', '<strong>Berhasil delete data</strong> : data store berhasil didelete');
		redirect('store','refresh');
	}

}

/* End of file Store.php */
/* Location: ./application/modules/store/controllers/Store.php */