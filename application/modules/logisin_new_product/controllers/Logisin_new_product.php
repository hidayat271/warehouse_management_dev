<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logisin_new_product extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('logisin_new_product_m', 'model_logisin_new_product');
		$this->load->model('logisin_new_product_detail_m', 'model_logisin_new_product_detail');
		$this->load->library('cart');
	}

	public function index($id = NULL)
	{
		$this->data['data_logisin_code'] = $this->model_logisin_new_product->generate_id('PO');

		$this->data['content'] = "logisin_new_product_action_page";
		$this->load->view('template/_main_page_template', $this->data);
	}

	public function process()
	{
		$form = array('no_faktur','no_faktur_supplier','supplier','draft_date','description');
		$data_form = $this->model_logisin_new_product->array_from_post($form);

		$data_save['code'] = $data_form['no_faktur'];
		$data_save['draft_at'] = $data_form['draft_date'];
		$data_save['type'] = 'Logistic In [New Product]';
		$data_save['user_draft'] = $this->session->userdata('account')['id'];
		$data_save['store'] = $this->session->userdata('account')['store_code'];
		$data_save['deskripsi_draft'] = $data_form['description'];
		$data_save['faktur'] = $data_form['no_faktur_supplier'];
		$data_save['supplier'] = $data_form['supplier'];

		$is_save = $this->model_logisin_new_product->save($data_save, NULL);

		foreach ($this->cart->contents() as $items) {
			$data_detail_save['code_logistic'] = $is_save;
			$data_detail_save['qty_draft'] = $items['qty'];
			$data_detail_save['price_supplier'] = $items['price'];
			$data_detail_save['code_product'] = $items['product_id'];
			$is_save_detail = $this->model_logisin_new_product_detail->save($data_detail_save, NULL);

		}

		$this->cart->destroy();

		$this->data['data_logisin'] = $this->model_logisin_new_product->get($is_save);

		$this->data['content'] = "logisin_new_product_complete_page";
		$this->load->view('template/_main_page_template', $this->data);
	}

}

/* End of file Logisin_new_product.php */
/* Location: ./application/modules/logisin_new_product/controllers/Logisin_new_product.php */