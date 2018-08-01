<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('encryption');
        $this->load->helper('cookie');
		$this->load->model('login_m', 'model_login');
		$this->load->model('store/store_m', 'model_store');
	}

	public function index()
	{
		$this->data['content'] = "login_form";
		$this->load->view('template/_main_blank_template', $this->data);
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect('login','refresh');
    }

    public function process(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $remember = $this->input->post('remember');

        $data_users = $this->model_login->get_login_info($username);

        foreach ($data_users as $value) {
            $data_password = $this->encryption->decrypt($value->password);
            $data_pin = $this->encryption->decrypt($value->pin);

            if($username == $value->username && ($password == $data_password || $password == $data_pin)){

                $update_data = array('last_login' => date('Y-m-d H:i:s'), 'ip_address' => $this->input->ip_address());
                $data_store = $this->model_store->get_by_code($value->lokasi);
                $this->model_login->set_session($value, $data_store);
                if($remember == '1') {
                    $this->model_login->set_cookie_account($username, $password);
                }

                $this->model_login->save($update_data, $value->id);
                redirect('dashboard','refresh');
            }
        }

        $this->session->set_flashdata('error', "<div class=\"alert alert-error alert-dismissible\" role=\"alert\">Username atau password yang dimasukan salah silahkan periksa kembali</div>");
        redirect('login','refresh');
    }

}

/* End of file Login.php */
/* Location: ./application/modules/login/controllers/Login.php */