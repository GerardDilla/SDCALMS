<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller {

    function __construct() {

		parent::__construct();
		
		$this->load->library('assesment_views');
        $this->load->library('account_views');
        $this->load->library('course_views');
        $this->load->library('education_views');
        $this->load->library('general_views');

		$this->load->model('Management/AccountManagement');

		//Use the following if login token is needed for access
        //Note: Pass the login token userdata
       // $this->load->model('Rules/logincheck');
        //$this->logincheck->token_check($this->session->userdata('LoginToken'));
	}
	public function Profile()
	{	
		$userid = $this->session->userdata('UserID');
		$this->data['Account_data'] = $this->AccountManagement->GetPersonalInfo($userid);
		$this->data['Account_Types'] = $this->AccountManagement->GetAccountTypes();
		$this->render($this->account_views->personal_data());
	}
	public function AccountList()
	{	
		//Displays login page
		$search = '';
		$search = $this->input->post('SearchAccount');
		$this->data['Account_List'] = $this->AccountManagement->GetAccountList($search);
		$this->render($this->account_views->account_list());
		
	}
	public function AccountList_Directory()
	{	
		$userid = $this->input->post('UserID');
		$edit = $this->input->post('Edit');
		$activate = $this->input->post('Activate');
		$deactivate = $this->input->post('Deactivate');
		if(isset($edit)){
			$this->AccountUpdate();
		}
		else if(isset($activate)){
			$this->AccountDeactivate();
		}
		else if(isset($deactivate)){
			$this->AccountActivate();
		}
	}
	public function AccountDeactivate()
	{	
		$userid = $this->input->post('UserID');
		$this->AccountManagement->DeactivateAccount($userid);
		redirect('Account/AccountList','refresh');
		
	}
	public function AccountActivate()
	{	
		$userid = $this->input->post('UserID');
		$this->AccountManagement->ActivateAccount($userid);
		redirect('Account/AccountList','refresh');
		
	}
	public function AccountUpdate()
	{	
		$userid = $this->input->post('UserID');
		$this->data['Account_data'] = $this->AccountManagement->GetPersonalInfo($userid);
		$this->data['Account_Types'] = $this->AccountManagement->GetAccountTypes();
		$this->render($this->account_views->update_account());
	}
	public function AccountUpdate_Process(){

		$userid = $this->input->post('userid');
		$fname = $this->input->post('fname');
		$mname = $this->input->post('mname');
		$lname = $this->input->post('lname');
		$uname = $this->input->post('uname');
		$email = $this->input->post('email');
		$pword = $this->input->post('pword');
		$Atype = $this->input->post('Atype');
		//echo $userid.':'.$fname.' '.$mname. ' '.$lname.'<br>'.$uname.':'.$email.':'.$pword.'<br>'.$Atype;
		$this->AccountManagement->AccountUpdate($userid,$fname,$mname,$lname,$uname,$email,md5($pword),$Atype);
		redirect('Account/AccountList','refresh');
		

	}
	public function Registration()
	{	
		$register = $this->input->post('registerbutton');
		$fname = $this->input->post('fname');
		$mname = $this->input->post('mname');
		$lname = $this->input->post('lname');
		$uname = $this->input->post('uname');
		$email = $this->input->post('email');
		$pword = $this->input->post('pword');
		$Atype = $this->input->post('Atype');
		$this->data['Account_Types'] = $this->AccountManagement->GetAccountTypes();
		if(isset($register)){
			$this->render($this->account_views->create_account());
			$this->AccountManagement->AccountRegistration($fname,$mname,$lname,$uname,$email,md5($pword),$Atype);
			redirect('Home','refresh');
		}
		else{
			$this->render($this->account_views->create_account());
			
		}
		//Displays login page
		
	}
	public function AdminRegistration()
	{	
		$register = $this->input->post('registerbutton');
		$fname = $this->input->post('fname');
		$mname = $this->input->post('mname');
		$lname = $this->input->post('lname');
		$uname = $this->input->post('uname');
		$email = $this->input->post('email');
		$pword = $this->input->post('pword');
		$Atype = $this->input->post('Atype');
		if(isset($register)){
			$this->render($this->account_views->admin_registration());
			$this->AccountManagement->AccountRegistration($fname,$lname,$uname,$email,$pword,$Atype);
		}
		else{
			$this->render($this->account_views->admin_registration());
		}
		//Displays login page
		
	}




	


}
