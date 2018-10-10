<?php


class Logincheck extends CI_Model{
	

	
	public function admin_check()
	{
		
	}
	public function token_check($token)
	{
		//Usage: Pass the Login token as a parameter
		if($token != '1'){

			$msg = 'You must login first';
			$this->session->set_flashdata('modal','show');
			$this->session->set_flashdata('LoginMessage',$msg);
			redirect(base_url().'index.php/Home','refresh');

		}
	}

}
?>