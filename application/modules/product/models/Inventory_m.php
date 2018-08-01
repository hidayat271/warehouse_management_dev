<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_m extends MY_Model {

	protected $_table_name = 'inventory';
    protected $_primary_key = 'id';
    protected $_timestamps = TRUE;
    protected $_order_by = 'code';

}

/* End of file Inventory_m.php */
/* Location: ./application/modules/product/models/Inventory_m.php */