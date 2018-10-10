<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class account_views 
{

	public function admin_registration()
	{
		return 'Account/Admin_Registration';
	}
	public function account_list()
	{
		return 'Account/Account_List';
	}

	public function create_account()
	{
		return 'Account/Create_Account_input';
	}
	public function update_account()
	{
		return 'Account/Account_Edit';
	}

	public function autenthic_user()
	{
		return 'Account/Authentic_User';
	}
	public function personal_data()
	{
		return 'Account/Account_Info';
	}
	public function searchuser()
	{
		return 'Account/Search_User';
	}





}	