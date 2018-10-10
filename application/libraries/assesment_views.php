<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class assesment_views 
{

	public function assessment_initial()
	{
		return 'Assessment/Assessment_Form';
	}
	public function assessment_build()
	{
		return 'Assessment/Assessment_Builder';
	}
	public function assessment_list()
	{
		return 'Assessment/Assessment_List';
	}
	public function assessment_view()
	{
		return 'Assessment/Assessment_View';
	}
	public function assessment_brief()
	{
		return 'Assessment/AssessmentBriefing';
	}
	public function assessment_start()
	{
		return 'Assessment/body';
	}
	public function assessment_result()
	{
		return 'Assessment/Assessment_Results';
	}
	public function assessment_examinees()
	{
		return 'Assessment/Assessment_Examinees';
	}




}