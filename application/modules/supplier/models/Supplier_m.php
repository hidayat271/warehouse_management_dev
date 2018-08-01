<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_m extends MY_Model {

	protected $_table_name = 'supplier';
    protected $_primary_key = 'id';
    protected $_timestamps = TRUE;
    protected $_order_by = 'name';

}

/* End of file Supplier_m.php */
/* Location: ./application/modules/supplier/models/Supplier_m.php */