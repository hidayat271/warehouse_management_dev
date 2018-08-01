<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees_m extends MY_Model {

	protected $_table_name = 'employees';
    protected $_primary_key = 'id';
    protected $_timestamps = TRUE;
    protected $_order_by = 'firstname';

    public function rule_form_employee()
    {
        $config = array(
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'repassword',
                        'label' => 'Ulangi Password',
                        'rules' => 'required|matches[password]'
                )
        );

        return $config;
    }

}

/* End of file Employees_m.php */
/* Location: ./application/modules/employees/models/Employees_m.php */