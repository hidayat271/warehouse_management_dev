<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function get_location_store($code)
{
	$ci =& get_instance();
	$ci->load->model('store/store_m', 'model_store');

	$where = array("code" => $code);
    $data = $ci->model_store->get_by($where, TRUE);

    return (($data) ? '<span class="label label-success">[' . $data->area . '] ' . $data->code . '-' . $data->name . '</span>' : '<span class="label label-important">Belum di alokasikan</span>');
}

function get_product($code)
{
	$ci =& get_instance();
	$ci->load->model('product/product_m', 'model_product');

	$where = array("barcode" => $code);
    $data = $ci->model_product->get_by($where, TRUE);

    return (($data) ? $data->name : '');
}

function get_product_id($id)
{
	$ci =& get_instance();
	$ci->load->model('product/product_m', 'model_product');

    $data = $ci->model_product->get($id);

    return (($data) ? $data : NULL);
}

function get_inventory_detail($barcode)
{
	$ci =& get_instance();
	$ci->load->model('inventory/inventory_m', 'model_inventory');

	$where = array("product" => $barcode, "store" => $ci->session->userdata('account')['store_code']);
    $data = $ci->model_inventory->get_by($where, TRUE);

    return (($data) ? $data : NULL);
}

function get_supplier($code)
{
	$ci =& get_instance();
	$ci->load->model('supplier/supplier_m', 'model_supplier');

	$where = array("code" => $code);
    $data = $ci->model_supplier->get_by($where, TRUE);

    return (($data) ? $data : NULL);
}

function get_store($code)
{
	$ci =& get_instance();
	$ci->load->model('store/store_m', 'model_store');

	$where = array("code" => $code);
    $data = $ci->model_store->get_by($where, TRUE);

    return (($data) ? $data : NULL);
}

function get_detail_logist($id)
{
	$ci =& get_instance();
	$ci->load->model('logisin_new_product/logisin_new_product_detail_m', 'model_logisin_new_product_detail');

	$where = array("code_logistic" => $id);
    $data = $ci->model_logisin_new_product_detail->get_by($where);

    return (($data) ? $data : NULL);
}

/* End of file app_helper.php */
/* Location: ./application/helpers/app_helper.php */