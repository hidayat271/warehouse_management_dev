<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logisin_repeat_order extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('logisin_repeat_order_m', 'model_logisin_repeat_order');
		$this->load->model('logisin_repeat_order_detail_m', 'model_logisin_repeat_order_detail');
		$this->load->library('cart');
	}

	public function index($id = NULL)
	{
		$this->data['data_logisin_code'] = $this->model_logisin_repeat_order->generate_id('PO');

		$this->data['content'] = "logisin_repeat_order_action_page";
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
		redirect('logisin_repeat_order','refresh');
	}

	public function destroy()
	{
		$this->cart->destroy();
		redirect('logisin_repeat_order','refresh');
	}

	public function process()
	{
		$form = array('no_faktur','no_faktur_supplier','supplier','draft_date','description');
		$data_form = $this->model_logisin_repeat_order->array_from_post($form);

		$data_save['code'] = $data_form['no_faktur'];
		$data_save['draft_at'] = $data_form['draft_date'];
		$data_save['type'] = 'Logistic In [Repeat Order]';
		$data_save['user_draft'] = $this->session->userdata('account')['id'];
		$data_save['store'] = $this->session->userdata('account')['store_code'];
		$data_save['deskripsi_draft'] = $data_form['description'];
		$data_save['faktur'] = $data_form['no_faktur_supplier'];
		$data_save['supplier'] = $data_form['supplier'];

		$is_save = $this->model_logisin_repeat_order->save($data_save, NULL);

		foreach ($this->cart->contents() as $items) {
			$data_detail_save['code_logistic'] = $is_save;
			$data_detail_save['qty_draft'] = $items['qty'];
			$data_detail_save['price_supplier'] = $items['price'];
			$data_detail_save['code_product'] = $items['product_id'];
			$is_save_detail = $this->model_logisin_repeat_order_detail->save($data_detail_save, NULL);

		}

		$this->cart->destroy();

		$this->data['data_logisin'] = $this->model_logisin_repeat_order->get($is_save);

		$this->data['content'] = "logisin_repeat_order_complete_page";
		$this->load->view('template/_main_page_template', $this->data);
	}

}

/* End of file Logisin_repeat_order.php */
/* Location: ./application/modules/logisin_repeat_order/controllers/Logisin_repeat_order.php */