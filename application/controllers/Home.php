<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    function __construct() {

		parent::__construct();
		
        $this->load->library('assesment_views');
        $this->load->library('account_views');
        $this->load->library('course_views');
        $this->load->library('education_views');
        $this->load->library('general_views');

	}
	public function index()
	{	
		//Displays login page
		$this->login();
		
	}
	//Test Views
	public function testview()
	{	
		//Displays login page
		$this->render($this->set_views->admin_account_list());
		
	}

	
	/*
		Beyond this are the temporary modules for all accounts
	 */


	


}
