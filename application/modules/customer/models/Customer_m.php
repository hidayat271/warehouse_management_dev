<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_m extends MY_Model {

	protected $_table_name = 'customer';
    protected $_primary_key = 'id';
    protected $_timestamps = TRUE;
    protected $_order_by = 'name';

}

/* End of file Customer_m.php */
/* Location: ./application/modules/customer/models/Customer_m.php */