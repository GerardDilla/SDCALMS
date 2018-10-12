<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller  {

	
    function __construct() {

        parent::__construct();
        $this->load->library('assesment_views');
        $this->load->library('account_views');
        $this->load->library('course_views');
        $this->load->library('education_views');
        $this->load->library('general_views');

        $this->load->library('email');
        $this->load->library('pagination');

        //Use the following if login token is needed for access
        //Note: Pass the login token userdata
        $this->load->model('Rules/logincheck');
        $this->logincheck->token_check($this->session->userdata('LoginToken'));
            
    }	
    public function index()
    {
         $this->Dashboard();
    }
    public function Dashboard()
    {
         $this->render($this->general_views->user_dashboard());
    }
    public function Create_Account_Input()
    {
         $this->render($this->set_views->admin_creatacc_input());
    }


    /*---------------------------------------------------Admin Update Personal Data Module-------------------------------*/

    public function Personal_Data()
    {
     $this->render($this->set_views->admin_updatepersonal_data());
    }

    /*---------------------------------------------------Admin Search User Module-------------------------------*/

    public function Search_User()
    {
    $this->render($this->set_views->admin_searchuser());
    }
   


}
?>
