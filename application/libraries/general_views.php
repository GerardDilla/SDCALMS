<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class general_views 
{

	public function admin_dashboard()
	{
		return 'body/Admin_View/Dashboard';
	}
	
	public function user_dashboard()
	{
		return 'General/Dashboard';
	}

	public function admin_upload_file()
	{
		return 'body/Admin_View/Upload_File';
	}
	
	

	
}	