<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store_m extends MY_Model {

	protected $_table_name = 'store';
    protected $_primary_key = 'id';
    protected $_timestamps = TRUE;
    protected $_order_by = 'name';

    public function is_exist($field, $value)
    {
    	$this->db->where($field, $value);
    	return $this->db->count_all_results($this->_table_name);
    }

    public function config_page($url, $total_records, $limit_per_page)
    {
        $config['base_url'] = $url;
        $config['total_rows'] = $total_records;
        $config['per_page'] = $limit_per_page;
        $config['page_query_string'] = TRUE;
        // custom paging configuration
        $config['num_links'] = 2;
        $config['use_page_numbers'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $config['attributes'] = array('class' => 'btn btn-success');
         
        $config['full_tag_open'] = '<div class="btn-group">';
        $config['full_tag_close'] = '</div>';
         
        $config['first_link'] = '<i class="pg-arrow_left"></i> Awal';
        // $config['first_tag_open'] = '<li class="page-item">';
        // $config['first_tag_close'] = '</li>';
         
        $config['last_link'] = 'Akhir <i class="pg-arrow_right"></i>';
        // $config['last_tag_open'] = '<li class="page-item">';
        // $config['last_tag_close'] = '</li>';
         
        $config['next_link'] = '<i class="pg-arrow_right"></i>';
        // $config['next_tag_open'] = '<li class="page-item">';
        // $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '<i class="pg-arrow_left"></i>';
        // $config['prev_tag_open'] = '<li class="page-item">';
        // $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<a href="#" class="btn btn-success active">';
        $config['cur_tag_close'] = '</a>';

        // $config['num_tag_open'] = '<li class="page-item">';
        // $config['num_tag_close'] = '</li>';

        return $config;
    }

    public function get_total() 
    {
        return $this->db->count_all($this->_table_name);
    }

    public function get_current_page_records($limit, $start) 
    {
        $this->db->limit($limit,$start);
        return $this->get();
    }

    public function get_by_code($code)
    {
        $where = array("code" => $code);
        return $this->get_by($where, TRUE);
    }

}

/* End of file Store_m.php */
/* Location: ./application/modules/store/models/Store_m.php */