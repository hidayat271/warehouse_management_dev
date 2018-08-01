<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logisout_order_toko extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('logisout_order_toko_m', 'model_logisout_order_toko');
		$this->load->model('logisout_order_toko_detail_m', 'model_logisout_order_toko_detail');
		$this->load->model('product/product_m', 'model_product');
		$this->load->model('inventory/inventory_m', 'model_inventory');
		$this->load->library('cart');
	}

	public function index($id = NULL)
	{
		$this->data['data_logisout_code'] = $this->model_logisout_order_toko->generate_id('PO');

		$this->data['content'] = "logisout_order_toko_action_page";
		$this->load->view('template/_main_page_template', $this->data);
	}

	public function get_by_barcode()
	{
		$barcode = $this->input->get('barcode');

		$this->db->select('*, product.id AS id_product, inventory.id AS id_inventory');
		$this->db->where('code', $barcode);
		$this->db->join('product', 'product.barcode = inventory.product', 'INNER');
		$data = $this->model_inventory->get();

		$data = array(
	        'id'      			=> 'pro_' . $data[0]->id_product,
	        'qty'     			=> 1,
	        'price'   			=> $data[0]->harga_supplier,
	        'name'    			=> $data[0]->name,
	        'barcode'    		=> $data[0]->barcode,
	        'barcode_iventoty'  => $data[0]->code,
	        'product_id'		=> $data[0]->id_product,
	        'inventory_id'		=> $data[0]->id_inventory,
		);

		$this->cart->insert($data);

		echo $this->load->view('product_cart', NULL, TRUE);;
	}

	public function remove_shopping($rowid)
	{
		foreach ($this->cart->contents() as $items) {
			if($items['rowid'] == $rowid){
				$data = array(
			        'rowid'  => $items['rowid'],
			        'qty'    => 0
				);

				$this->cart->update($data);
				break;
			}
		}
		redirect('logisout_order_toko','refresh');
	}

	public function destroy()
	{
		$this->cart->destroy();
		redirect('logisout_order_toko','refresh');
	}

	public function process()
	{
		$form = array('no_faktur','store','draft_date','description');
		$data_form = $this->model_logisout_order_toko->array_from_post($form);

		$data_save['code'] = $data_form['no_faktur'];
		$data_save['draft_at'] = $data_form['draft_date'];
		$data_save['type'] = 'Logistic Out [Order Toko]';
		$data_save['user_draft'] = $this->session->userdata('account')['id'];
		$data_save['store'] = $this->session->userdata('account')['store_code'];
		$data_save['deskripsi_draft'] = $data_form['description'];
		$data_save['request_to_store'] = $data_form['store'];

		$is_save = $this->model_logisout_order_toko->save($data_save, NULL);

		foreach ($this->cart->contents() as $items) {
			$data_detail_save['code_logistic'] = $is_save;
			$data_detail_save['qty_draft'] = $items['qty'];
			$data_detail_save['code_product'] = $items['product_id'];
			$is_save_detail = $this->model_logisout_order_toko_detail->save($data_detail_save, NULL);

		}

		$this->cart->destroy();

		$this->data['data_logisin'] = $this->model_logisout_order_toko->get($is_save);

		$this->data['content'] = "logisout_order_toko_complete_page";
		$this->load->view('template/_main_page_template', $this->data);
	}

}

/* End of file Logisout_order_toko.php */
/* Location: ./application/modules/logisout_order_toko/controllers/Logisout_order_toko.php */