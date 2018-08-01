<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('employees_m', 'model_employees');
		$this->load->model('store/store_m', 'model_store');
		$this->load->library('encryption');
		$this->load->library('pagination');
	}

	public function index()
	{
		$limit_per_page = 5;
        $page = ($this->input->get('per_page')) ? ($this->input->get('per_page') - 1) : 0;
        $total_records = $this->model_employees->get_total();
     
        if ($total_records > 0)
        {
        	// get current page records
            $this->data["data_employees"] = $this->model_employees->get_current_page_records($limit_per_page, $page*$limit_per_page);
             
        	$config = $this->model_employees->config_page(base_url('employees/index'), $total_records, $limit_per_page);
        	$this->pagination->initialize($config);
                 
            // build paging links
            $this->data["link_page"] = $this->pagination->create_links();
        }

		$this->data['content'] = "employee_list_page";
		$this->load->view('template/_main_page_template', $this->data);
	}

	public function action($id=NULL)
	{
		$this->data['data_code'] = $this->model_employees->generate_id('EMP');

		if($id){
			$this->data['data_employees'] = $this->model_employees->get($id);
			$this->data['data_employees']->password = $this->encryption->decrypt($this->data['data_employees']->password);
			$this->data['data_employees']->pin = $this->encryption->decrypt($this->data['data_employees']->pin);
		}
		
		$this->data['content'] = "employee_action_page";
		$this->load->view('template/_main_page_template', $this->data);
	}

	public function process($id=NULL)
	{
		$form = array('kode_pegawai','nama_depan','nama_belakang','email','telepon','lokasi_penempatan','username','pin','password','repassword');
		$data_form = $this->model_employees->array_from_post($form);

		$password = $this->encryption->encrypt($data_form['password']);
		$pin = $this->encryption->encrypt($data_form['pin']);
		$lokasi = $this->model_store->get_by_code($data_form['lokasi_penempatan']);

		$data_save['firstname'] = $data_form['nama_depan'];
		$data_save['lastname'] = $data_form['nama_belakang'];
		$data_save['email'] = $data_form['email'];
		$data_save['username'] = $data_form['username'];
		$data_save['telepon'] = $data_form['telepon'];
		$data_save['kode'] = $data_form['kode_pegawai'];
		$data_save['pin'] = $pin;
		$data_save['password'] = $password;
		$data_save['avatar'] = 'avatar.png';
		$data_save['online'] = 1;
		$data_save['lokasi'] = (($lokasi) ? $lokasi->code:NULL);

		$rules = $this->model_employees->rule_form_employee();
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run())
		{
			$count_username = $this->model_employees->is_exist('username', $data_form['username']);
			$count_email = $this->model_employees->is_exist('email', $data_form['email']);
			
			if ($count_email == 0 && $count_username == 0) {
				$this->session->set_flashdata('message_type', 'alert-success');
				$this->session->set_flashdata('message', '<strong>Berhasil menyimpan data</strong> : data pegawai berhasil dibuat dan sudah siap digunakan');
				$is_save = $this->model_employees->save($data_save, $id);

				redirect('employees','refresh');
			}else{

				if($id){
					$data_employees = $this->model_employees->get($id);

					if($data_form['email'] == $data_employees->email && $data_form['username'] == $data_employees->username){
						$this->session->set_flashdata('message_type', 'alert-success');
						$this->session->set_flashdata('message', '<strong>Berhasil menyimpan data</strong> : data pegawai berhasil diubah dan sudah siap digunakan');
						$is_save = $this->model_employees->save($data_save, $id);

						redirect('employees','refresh');
					}
				}

				$this->session->set_flashdata('message_type', 'alert-warning');
				$this->session->set_flashdata('message', '<strong>Gagal menyimpan data</strong> : email atau username sudah digunakan oleh pegawai lain');
			}
		}else{
			$this->session->set_flashdata('message_type', 'alert-warning');
			$this->session->set_flashdata('message', '<strong>Gagal menyimpan data</strong> : password tidak cocok periksa kembali');
		}
		$this->action();
	}

	public function delete($id=NULL)
	{
		$this->model_employees->delete($id);
		$this->session->set_flashdata('message_type', 'alert-success');
		$this->session->set_flashdata('message', '<strong>Berhasil delete data</strong> : data pegawai berhasil didelete');
		redirect('employees','refresh');
	}

}

/* End of file Employees.php */
/* Location: ./application/modules/employees/controllers/Employees.php */