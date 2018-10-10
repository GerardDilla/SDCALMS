<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class education_views 
{

	//OBE VIEWS
	//CILO
	public function obe_add_cilo()
	{
		return 'Education/CILO_Form';
	}
	public function obe_list()
	{
		return 'Education/CILO_List';
	}
	public function obe_edit_cilo()
	{
		return 'Education/CILO_EditForm';
	}
	//CILO
	//CO
	public function obe_add_so()
	{
		return 'Education/SO_Form';
	}
	public function obe_list_so()
	{
		return 'Education/SO_List';
	}
	public function obe_edit_so()
	{
		return 'Education/SO_EditForm';
	}
	//CO




}	