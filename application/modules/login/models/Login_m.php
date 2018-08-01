<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_m extends MY_Model {

	protected $_table_name = 'employees';

    function get_login_info($username)
    {
        $this->db->where('username', $username);
        return parent::get();
    }

    function set_session($value, $data_store){
        $data_session["account"] = array(
			'id' => $value->id,
			'code' => $value->kode,
			'name' => $value->firstname . ' ' . $value->lastname,
			'username' => $value->username,
			'email' => $value->email,
			'password' => $value->password,
			'username' => $value->username,
			'avatar' => $value->avatar,
			'online' => $value->online,
			'telepon' => $value->telepon,

			'store_code' => $data_store->code,
			'store_name' => $data_store->name,
			'store_telepon' => $data_store->telepon,
			'store_fax' => $data_store->fax,
			'store_area' => $data_store->area,
			'store_address' => $data_store->address,
			'store_email' => $data_store->email,
			'store_jenis' => $data_store->jenis,
			
			'is_loggin' => TRUE,
        );
        $this->session->set_userdata($data_session);
    }

    function set_cookie_account($username, $password){
        $cookie_username= array(
            'name'   => 'username',
            'value'  => $username,
            'expire' => '3600',
        );
        $cookie_password= array(
            'name'   => 'password',
            'value'  => $password,
            'expire' => '3600',
        );

        $this->input->set_cookie($cookie_username);
        $this->input->set_cookie($cookie_password);
    }

}

/* End of file Login_m.php */
/* Location: ./application/modules/login/models/Login_m.php */