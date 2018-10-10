<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class course_views 
{

	public function course_list()
	{
		return 'Course/Course_List';
	}
	public function add_course()
	{
		return 'Course/Course_Form';
	}
	public function course_page()
	{
		return 'Course/Course_Home';
	}
	public function course_enrollees()
	{
		return 'Course/Course_Enrollees';
	}
	public function add_course_so()
	{
		return 'Course/Course_Form_SO';
	}
	



}