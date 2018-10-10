<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('Management/LoginModel');
    }
	public function index()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$result = $this->LoginModel->login($username,md5($password));
		if($result->num_rows() != 0){
			foreach($result->result_array() as $row){
				$login_array = array(

					'UserID' => $row['Account_ID'],
					'FirstName' => $row['FirstName'],
					'MiddleName' => $row['MiddleName'],
					'LastName' => $row['LastName'],
					'AccountType' => $row['AccountType_ID'],
					'Email' => $row['Email'],
					'LoginToken' => '1',
					
				);
				$this->session->set_userdata($login_array);
				redirect(base_url().'index.php/'.$row['ControllerAccess'],'refresh');
			}
		}else{
			$msg = 'Invalid Username or Password';
			$this->set_msg($msg);
			$this->set_modal();
			redirect(base_url().'index.php/Home','refresh');
		}
		echo 'test';
		
	}
	public function set_modal(){
		//Call if modal appearance is needed, sets a session with a string of "show", can be called to js script
		$this->session->set_flashdata('modal','show');

	}
	public function set_msg($msg){
		//Sets the message from login module
		$this->session->set_flashdata('LoginMessage',$msg);

	}

}
