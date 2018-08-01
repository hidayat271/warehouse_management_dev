<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_m', 'model_product');
		$this->load->model('inventory/inventory_m', 'model_inventory');
		$this->load->library('pagination');
		$this->load->library('cart');
	}

	public function get_list()
	{
		$value = $this->input->get('q');
		$this->db->like('code', $value, 'BOTH');
		$this->db->or_like('barcode', $value, 'BOTH');
		$this->db->or_like('name', $value, 'BOTH');
		$this->db->limit(10);
		$this->db->join('product', 'product.barcode = inventory.product', 'INNER');
		$data = $this->model_inventory->get();
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($data);
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

	public function index()
	{
		$limit_per_page = 5;
        $page = ($this->input->get('per_page')) ? ($this->input->get('per_page') - 1) : 0;
        $total_records = $this->model_product->get_total();
     
        if ($total_records > 0)
        {
        	// get current page records
            $this->data["data_products"] = $this->model_product->get_current_page_records($limit_per_page, $page*$limit_per_page);
             
        	$config = $this->model_product->config_page(base_url('products/index'), $total_records, $limit_per_page);
        	$this->pagination->initialize($config);
                 
            // build paging links
            $this->data["link_page"] = $this->pagination->create_links();
        }

		$this->data['content'] = "product_list_page";
		$this->load->view('template/_main_page_template', $this->data);
	}

	public function get_barcode(){
        $where = $this->input->get('category');
        $data = $this->model_product->get_id($where);
        header('Content-Type: application/json');
		echo json_encode($data);
    }

	public function action($id=NULL)
	{
		$this->data['content'] = "product_action_page";
		$this->load->view('template/_main_page_template', $this->data);
	}

	public function process($id = NULL)
	{
		$form = array('barcode','supplier_name','kategori','nama_produk','deskripsi','harga_supplier','harga_distributor','harga_jual_seri','harga_jual_grosir','harga_jual_eceran', 'harga_jual_pancingan', 'qty_fisik', 'qty_limit');
		$data_form = $this->model_product->array_from_post($form);

		$data_save_produk['name'] = $data_form['nama_produk'];
		$data_save_produk['description'] = $data_form['deskripsi'];
		$data_save_produk['barcode'] = $data_form['barcode'];
		$data_save_produk['category'] = $data_form['kategori'];
		$data_save_produk['supplier'] = $data_form['supplier_name'];

		$code_inventory = $this->model_product->generate_id('INV') . $this->session->userdata('account')['store_code'];
		$data_save_inventory['code'] = $code_inventory;
		$data_save_inventory['harga_supplier'] = $data_form['harga_supplier'];
		$data_save_inventory['harga_distributor'] = $data_form['harga_distributor'];
		$data_save_inventory['harga_jual_seri'] = $data_form['harga_jual_seri'];
		$data_save_inventory['harga_jual_grosir'] = $data_form['harga_jual_grosir'];
		$data_save_inventory['harga_jual_pancingan'] = $data_form['harga_jual_pancingan'];
		$data_save_inventory['harga_jual_eceran'] = $data_form['harga_jual_eceran'];
		$data_save_inventory['qty_fisik'] = $data_form['qty_fisik'];
		$data_save_inventory['qty_limit'] = $data_form['qty_limit'];
		$data_save_inventory['product'] = $data_form['barcode'];
		$data_save_inventory['store'] = $this->session->userdata('account')['store_code'];
		$data_save_inventory['qty_init'] = $data_form['qty_fisik'];

		$count_barcode = $this->model_product->is_exist('barcode', $data_form['barcode']);

		if ($count_barcode == 0) {
				$this->session->set_flashdata('message_type', 'alert-success');
				$this->session->set_flashdata('message', '<strong>Berhasil menyimpan data</strong> : data product berhasil dibuat dan sudah siap digunakan');
				$is_save = $this->model_product->save($data_save_produk, $id);

				$this->db->where('product', $data_form['barcode']);
				$this->db->where('store', $data_save_inventory['store']);
				$data_inventory = $this->model_inventory->get();
				$id_inventory = ($data_inventory) ? $data_inventory->id : NULL;
				$is_save_inventory = $this->model_inventory->save($data_save_inventory, $id_inventory);

				$this->add_to_shopping($is_save, $is_save_inventory, $data_save_produk, $data_save_inventory);

				redirect('logisin_new_product','refresh');
			}else{

				if($id){
					$data_product = $this->model_product->get($id);

					if($data_form['barcode'] == $data_product->barcode){
						$this->session->set_flashdata('message_type', 'alert-success');
						$this->session->set_flashdata('message', '<strong>Berhasil menyimpan data</strong> : data product berhasil diubah dan sudah siap digunakan');
						$is_save = $this->model_product->save($data_save_produk, $id);

						$this->db->where('product', $data_form['barcode']);
						$this->db->where('store', $data_save_inventory['store']);
						$data_inventory = $this->model_inventory->get();
						$id_inventory = ($data_inventory) ? $data_inventory->id : NULL;
						$is_save_inventory = $this->model_inventory->save($data_save_inventory, $id_inventory);

						$this->add_to_shopping($is_save, $is_save_inventory, $data_save_produk, $data_save_inventory);

						redirect('logisin_new_product','refresh');
					}
				}

				$this->session->set_flashdata('message_type', 'alert-warning');
				$this->session->set_flashdata('message', '<strong>Gagal menyimpan data</strong> : product sudah digunakan');
			}
		$this->action();
	}

	public function add_to_shopping($id, $id_inventory, $data_product, $data_inventory)
	{
		$data = array(
	        'id'      			=> 'pro_' . $id,
	        'qty'     			=> $data_inventory['qty_fisik'],
	        'price'   			=> $data_inventory['harga_supplier'],
	        'name'    			=> $data_product['name'],
	        'barcode'    		=> $data_product['barcode'],
	        'barcode_iventoty'  => $data_inventory['code'],
	        'product_id'		=> $id,
	        'inventory_id'		=> $id_inventory,
		);

		$this->cart->insert($data);
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
				$this->model_product->delete($items['product_id']);
				$this->model_inventory->delete($items['inventory_id']);
				break;
			}
		}
		redirect('logisin_new_product','refresh');
	}

	public function destroy()
	{
		foreach ($this->cart->contents() as $items) {
			$this->model_product->delete($items['product_id']);
			$this->model_inventory->delete($items['inventory_id']);
		}
		$this->cart->destroy();
		redirect('logisin_new_product','refresh');
	}

}

/* End of file Product.php */
/* Location: ./application/modules/product/controllers/Product.php */