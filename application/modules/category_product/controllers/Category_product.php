<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_product extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('category_m', 'model_category');
		$this->load->library('pagination');
	}

	public function get_list()
	{
		$value = $this->input->get('q');
		$this->db->like('code', $value, 'BOTH');
		$this->db->or_like('name', $value, 'BOTH');
		$this->db->limit(10);
		$data = $this->model_category->get();
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function index()
	{
		$limit_per_page = 5;
        $page = ($this->input->get('per_page')) ? ($this->input->get('per_page') - 1) : 0;
        $total_records = $this->model_category->get_total();
     
        if ($total_records > 0)
        {
        	// get current page records
            $this->data["data_categories"] = $this->model_category->get_current_page_records($limit_per_page, $page*$limit_per_page);
             
        	$config = $this->model_category->config_page(base_url('category_product/index'), $total_records, $limit_per_page);
        	$this->pagination->initialize($config);
                 
            // build paging links
            $this->data["link_page"] = $this->pagination->create_links();
        }

		$this->data['content'] = "category_page";
		$this->load->view('template/_main_page_template', $this->data);
	}

	public function action($id=NULL)
	{
		if($id){
			$this->data['data_categori'] = $this->model_category->get($id);
		}
		
		$this->index();
	}

	public function process($id=NULL)
	{
		$form = array('kode','nama');
		$data_form = $this->model_category->array_from_post($form);

		$data_save['code'] = $data_form['kode'];
		$data_save['name'] = $data_form['nama'];

			$count_kode = $this->model_category->is_exist('code', $data_form['kode']);
			
			if ($count_kode == 0) {
				$this->session->set_flashdata('message_type', 'alert-success');
				$this->session->set_flashdata('message', '<strong>Berhasil menyimpan data</strong> : data kategori produk berhasil dibuat dan sudah siap digunakan');
				$is_save = $this->model_category->save($data_save, $id);

				redirect('category_product','refresh');
			}else{

				if($id){
					$data_categori = $this->model_category->get($id);

					if($data_form['kode'] == $data_categori->code){
						$this->session->set_flashdata('message_type', 'alert-success');
						$this->session->set_flashdata('message', '<strong>Berhasil menyimpan data</strong> : data kategori produk berhasil diubah dan sudah siap digunakan');
						$is_save = $this->model_category->save($data_save, $id);

						redirect('category_product','refresh');
					}
				}

				$this->session->set_flashdata('message_type', 'alert-warning');
				$this->session->set_flashdata('message', '<strong>Gagal menyimpan data</strong> : data kategori produk sudah digunakan');
			}
		
		$this->action();
	}

	public function delete($id=NULL)
	{
		$this->model_category->delete($id);
		$this->session->set_flashdata('message_type', 'alert-success');
		$this->session->set_flashdata('message', '<strong>Berhasil delete data</strong> : data kategori produk berhasil didelete');
		redirect('category_product','refresh');
	}
}

/* End of file Category_product.php */
/* Location: ./application/modules/category_product/controllers/Category_product.php */