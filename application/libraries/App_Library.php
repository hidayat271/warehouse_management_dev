<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_Library
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

}

/* End of file App_Library.php */
/* Location: ./application/libraries/App_Library.php */
