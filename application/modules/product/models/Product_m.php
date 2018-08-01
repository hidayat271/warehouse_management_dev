<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_m extends MY_Model {

	protected $_table_name = 'product';
    protected $_primary_key = 'id';
    protected $_timestamps = TRUE;
    protected $_order_by = 'barcode';

	public function get_id($category_id){
        $this->db->select('COUNT(*) AS id');
        $this->db->where('SUBSTR(barcode, 1, 8) = ', $category_id);
        return $this->db->get($this->_table_name)->row()->id + 1;
    }

}

/* End of file Product_m.php */
/* Location: ./application/modules/product/models/Product_m.php */