<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

    protected $_table_name = '';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = '';
    protected $_limit = '';
    protected $_offset = '';
    protected $_timestamps = FALSE;

    function __construct() {
        parent::__construct();
    }

    public function array_from_post($fields){
        $data = array();
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        return $data;
    }

    public function get($id = NULL, $single = FALSE){

        if ($id != NULL) {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->where($this->_table_name.'.'.$this->_primary_key, $id);
            $method = 'row';
        }
        elseif($single == TRUE) {
            $method = 'row';
        }
        else {
            $method = 'result';
        }

        if(!count($this->db->order_by($this->_order_by))) {
            $this->db->order_by($this->_order_by);
        }
        if($this->_limit != '' && $this->_offset != '')
        {
            $this->db->limit($this->_limit,$this->_offset);
        }

        return $this->db->get($this->_table_name)->$method();
    }

    public function get_by($where, $single = FALSE){
        if($where != NULL) {
            $this->db->where($where);
        }
        return $this->get(NULL, $single);
    }

    public function save($data, $id = NULL){

        // Set timestamps
        if ($this->_timestamps == TRUE) {
            $now = date('Y-m-d H:i:s');
            $id || $data['created_at'] = $now;
            $data['updated_at'] = $now;
        }

        // Insert
        if ($id === NULL) {
            !isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
            $this->db->set($data);
            $this->db->insert($this->_table_name);
            $id = $this->db->insert_id();
        }
        // Update
        else {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->set($data);
            $this->db->where($this->_primary_key, $id);
            $this->db->update($this->_table_name);
        }

        return $id;
    }

    public function delete($id){
        $filter = $this->_primary_filter;
        $id = $filter($id);

        if (!$id) {
            return FALSE;
        }
        $this->db->where($this->_primary_key, $id);
        $this->db->limit(1);
        $this->db->delete($this->_table_name);
    }

    public function delete_all(){
        $this->db->query("DELETE FROM " . $this->_table_name);
    }

    public function generate_id($kode)
    {
        $maxid = 0;
        $row = $this->db->query('SELECT MAX(id) AS `maxid` FROM `' .$this->_table_name. '`')->row();
        if ($row) {
            $maxid = $row->maxid; 
        }

        return $kode.date('ydm').$maxid;
    }

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

}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */