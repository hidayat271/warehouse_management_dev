<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_op_name extends My_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('stock_op_name_m', 'model_stock_op_name');
		$this->load->model('stock_op_name_detail_m', 'model_stock_op_name_detail');
		$this->load->model('product/product_m', 'model_product');
		$this->load->model('inventory/inventory_m', 'model_inventory');
		$this->load->library('cart');
	}

	public function action($id = NULL)
	{
		$this->data['data_stock_code'] = $this->model_stock_op_name->generate_id('SON');

		$this->data['content'] = "stock_op_name_action_page";
		$this->load->view('template/_main_page_template', $this->data);
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
		redirect('stock_op_name/action','refresh');
	}

	public function destroy()
	{
		$this->cart->destroy();
		redirect('stock_op_name/action','refresh');
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
	        'qty_fisik'			=> $data[0]->qty_fisik
		);

		$this->cart->insert($data);

		echo $this->load->view('product_cart', NULL, TRUE);;
	}

	public function process()
	{
		$data_save['code'] = $this->model_stock_op_name->generate_id('SON');
		$data_save['user_input'] = $this->session->userdata('account')['code'];
		$data_save['status'] = "Draft Stock Op Name";

		$is_save = $this->model_stock_op_name->save($data_save, NULL);

		$id_inventory = $this->input->post('inventory_id');
		$awal = $this->input->post('qty_awal');

		for ($i=0; $i < count($id_inventory); $i++) { 
			$data_fisik = $this->input->post('fisik_' . $id_inventory[$i]);
			$data_rusak = $this->input->post('rusak_' . $id_inventory[$i]);
			$data_return = $this->input->post('return_' . $id_inventory[$i]);

			$data_save_detail['qty_hilang'] = $awal[$i] - $data_fisik - $data_return - $data_rusak;
			$data_save_detail['qty_return'] = $data_return;
			$data_save_detail['qty_rusak'] = $data_rusak;
			$data_save_detail['qty_fisik'] = $data_fisik;
			$data_save_detail['qty_awal'] = $awal[$i];
			$data_save_detail['id_sop'] = $is_save;

			$is_save_detail = $this->model_stock_op_name_detail->save($data_save_detail, NULL);
		}

		$this->cart->destroy();

		redirect('stock_op_name/action','refresh');

	}

}

/* End of file Stock_op_name.php */
/* Location: ./application/modules/stock_op_name/controllers/Stock_op_name.php */