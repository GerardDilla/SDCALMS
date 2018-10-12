<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Education extends MY_Controller  {

	
    function __construct() {

        parent::__construct();

        $this->load->library('assesment_views');
        $this->load->library('account_views');
        $this->load->library('course_views');
        $this->load->library('education_views');
        $this->load->library('general_views');

        $this->load->library('email');
        $this->load->library('pagination');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->data['message'] = '';
        $this->load->model('Management/EducationManagement');
        date_default_timezone_set('Asia/Manila');
        
        //Use the following if login token is needed for access
        //Note: Pass the login token userdata
        $this->load->model('Rules/logincheck');
        $this->logincheck->token_check($this->session->userdata('LoginToken'));
        
        
    }

    //COURSE INTENDED LEARNING OUTCOME//
    public function CILO(){

        $this->data['CILO_List'] = $this->EducationManagement->GetCILOList();
        $this->render($this->education_views->obe_list());

    }
    public function CILOUpdateForm(){

        $id = $this->input->post('cilo_id');
        $this->data['CILO_Info'] = $this->EducationManagement->GetCILOSpecific($id);
        $this->render($this->education_views->obe_edit_cilo());

    }
    public function AddCILO(){

        $title = $this->input->post('cilo_title');
        $desc = $this->input->post('cilodescription');
        $uid = $this->session->userdata('UserID');
        $this->EducationManagement->Add_CILO($title,$desc,$uid);
        redirect(base_url().'index.php/Education/CILO');
       
    }
    public function CILOForm(){
        
        $id = $this->input->post('cilo_id');
        $this->data['CILO_Info'] = $this->EducationManagement->GetCILOSpecific($id);
        $this->render($this->education_views->obe_add_cilo());

    }
    public function EditCILO(){

        $id = $this->input->post('cilo_id');
        $title = $this->input->post('cilo_title');
        $desc = $this->input->post('cilodescription');
        $uid = $this->session->userdata('UserID');
        $this->EducationManagement->UpdateCILO($id,$title,$desc,$uid);
        redirect(base_url().'index.php/Education/CILO');
       
    }
    //.COURSE INTENDED LEARNING OUTCOME//

    //STUDENT OUTCOME//
    public function SO(){

        $this->data['SO_List'] = $this->EducationManagement->GetSOList();
        $this->render($this->education_views->obe_list_so());

    }
    public function SOForm(){
        
        $id = $this->input->post('cilo_id');
        $this->data['SO_Info'] = $this->EducationManagement->GetSOSpecific($id);
        $this->render($this->education_views->obe_add_so());

    }
    public function SOUpdateForm(){

        $id = $this->input->post('so_id');
        $this->data['SO_Info'] = $this->EducationManagement->GetSOSpecific($id);
        $this->render($this->education_views->obe_edit_so());

    }
    public function AddSO(){

        $title = $this->input->post('so_title');
        $desc = $this->input->post('sodescription');
        $uid = $this->session->userdata('UserID');
        $this->EducationManagement->Add_SO($title,$desc,$uid);
        redirect(base_url().'index.php/Education/SO');
       
    }
    public function EditSO(){

        $id = $this->input->post('so_id');
        $title = $this->input->post('so_title');
        $desc = $this->input->post('sodescription');
        $uid = $this->session->userdata('UserID');
        $this->EducationManagement->UpdateSO($id,$title,$desc,$uid);
        redirect(base_url().'index.php/Education/SO');
       
    }
    //.STUDENT OUTCOME//

    //INTENDED LEARNING OUTCOME//
    public function ILO(){

        $this->data['SO_List'] = $this->EducationManagement->GetSOList();
        $this->render($this->education_views->obe_list_so());

    }
    public function ILOForm(){
        
        $id = $this->input->post('cilo_id');
        $this->data['SO_Info'] = $this->EducationManagement->GetSOSpecific($id);
        $this->render($this->education_views->obe_add_so());

    }
    public function ILOUpdateForm(){

        $id = $this->input->post('so_id');
        $this->data['SO_Info'] = $this->EducationManagement->GetSOSpecific($id);
        $this->render($this->education_views->obe_edit_so());

    }
    //.INTENDED LEARNING OUTCOME//

}
?>
