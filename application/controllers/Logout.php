<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('Management/LoginModel');
    }
	public function index()
	{
		
		$session = array(

			'UserID',
			'FirstName',
			'MiddleName',
			'LastName',
			'AccountType_ID',
			'Email',
			'LoginToken'

		);

		$this->session->unset_userdata($session);
		$this->session->set_flashdata('modal','');
		$this->session->set_flashdata('LoginMessage','');
		redirect(base_url().'index.php/Home','refresh');
	}
}
