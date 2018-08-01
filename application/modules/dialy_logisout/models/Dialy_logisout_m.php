<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dialy_logisout_m extends MY_Model {

	protected $_table_name = 'logistic';
    protected $_primary_key = 'id';

    public function get_total() 
    {
    	$this->db->where('draft_at', date('Y-m-d'));
    	$this->db->where('store', $this->session->userdata('account')['store_code']);
        return $this->db->count_all($this->_table_name);
    }

    public function get_current_page_records($limit, $start) 
    {
    	$this->db->where('draft_at', date('Y-m-d'));
    	$this->db->where('store', $this->session->userdata('account')['store_code']);
        $this->db->limit($limit,$start);
        return $this->get();
    }

}

/* End of file Dialy_logisout_m.php */
/* Location: ./application/modules/dialy_logisout/models/Dialy_logisout_m.php */