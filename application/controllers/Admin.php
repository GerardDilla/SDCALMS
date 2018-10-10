<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller  {

	
    function __construct() {

        parent::__construct();
        $this->load->library('set_views');
        $this->load->library('email');
        $this->load->library('session');
        $this->load->library('pagination');   
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->model('Admin_Model/Rubrics_model');
        $this->load->model('Admin_Model/Reports_model');
        $this->load->helper('array');

                           }	
    
                                                 /*Admin*/

    /*-------------------------------------------Admin Login------------------------------------------------------*/

	public function index()
	{
     $this->login();
    }
   
    /*---------------------------------------------Admin Dashboard------------------------------------------------*/

    public function Dashboard()
    {
     $this->render($this->set_views->admin_dashboard());
    }


    /*---------------------------------------------------Admin Creat Account Module-------------------------------*/
    
    public function Create_Account()
    {
     $this->render($this->set_views->admin_creatacc());
    }

    public function Create_Account_Input()
    {
     $this->render($this->set_views->admin_creatacc_input());
    }

    /*---------------------------------------------------Admin Authentic User Module-------------------------------*/

    public function Authentic_User()
    {
     $this->render($this->set_views->admin_autenthic_user());
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
   /*---------------------------------------------------Admin Generate Rubrics Module-------------------------------*/
  
  
  
  
   public function Generate_Rubrics()
   {
   $this->$data['rubrics'] = $this->Rubrics_model->rubrics(); 
   $this->session->unset_userdata('message');
   $this->form_validation->set_rules('rubrics_title','Rubrics', 'required|trim|max_length[150]');
   if ($this->form_validation->run() == FALSE){
   $this->render($this->set_views->admin_generate_rubrics());
   }else{
    $this->Rubrics_model->addrubrics_title();    
    $this->session->set_flashdata('message','Rubrics Added Successfully');
    redirect('Admin/Generate_Rubrics','Refresh');  
        }
   }


   public function ViewRubrics()
   {
   $this->$data['v_rubrics'] = $this->Rubrics_model->view_rubrics();
   $this->$data['v_rubrics_escale'] = $this->Rubrics_model->view_rubrics_escale();
   $this->$data['v_rubrics_description'] = $this->Rubrics_model->view_rubrics_description();                                            
   $this->$data['test_output'] =  $this->Rubrics_model->getdescription();
   $this->render($this->set_views->admin_view_rubrics());
   }

   public function add_criteria()
   {
    $this->$data['v_rubrics'] = $this->Rubrics_model->view_rubrics();
    $this->$data['v_rubrics_escale'] = $this->Rubrics_model->view_rubrics_escale();
    $this->$data['test_output'] =  $this->Rubrics_model->getdescription();
    $this->render($this->set_views->admin_edit_rubrics());
   }
   
   public function insert_criteria()
   {
    $this->Rubrics_model->addcriteria();
    $this->$data['v_rubrics'] = $this->Rubrics_model->view_rubrics();
    $this->$data['v_rubrics_escale'] = $this->Rubrics_model->view_rubrics_escale();
    $this->$data['test_output'] =  $this->Rubrics_model->getdescription();
    $this->render($this->set_views->admin_edit_rubrics());
   
   }

   public function DeleteCriteria()
   {
    $this->Rubrics_model->delete_Criteria();
    $this->$data['v_rubrics'] = $this->Rubrics_model->view_rubrics();
    $this->$data['v_rubrics_escale'] = $this->Rubrics_model->view_rubrics_escale();
    $this->$data['test_output'] =  $this->Rubrics_model->getdescription();
    $this->render($this->set_views->admin_edit_rubrics());
   
   }
   
   public function DeleteRubrics()
   {
   $this->Rubrics_model->deleterubrics();
   $this->session->set_flashdata('message','Rubrics Deleted Successfully');
   redirect('Admin/Generate_Rubrics','Refresh');  
   } 
   

   public function Rubrics_Escale()
   {  
   $this->$data['v_rubrics'] = $this->Rubrics_model->view_rubrics();
   $this->$data['v_rubrics_escale'] = $this->Rubrics_model->view_rubrics_escale();
   $this->$data['v_rubrics_description'] = $this->Rubrics_model->view_rubrics_description();   
   $this->render($this->set_views->admin_rubrics_criteria());
   }

   public function AddUpdate()
   {
    $add = $this->input->post('add_escale');
    $update = $this->input->post('update_escale');

    if(isset($add)){
        $this->Add_Escale();
    }
    else if(isset($update)) {
        $this->Update_Escale();
    }
   }


   public function Add_Escale()
   {
    $this->Rubrics_model->addrubrics();
    redirect('Admin/Generate_Rubrics','Refresh'); 
   }
   
   public function Update_Escale()
   {
    $this->Rubrics_model->update_escale();
    redirect('Admin/Generate_Rubrics','Refresh'); 
   }
   

   public function Create_Rubrics_insert()
   {  
    $this->form_validation->set_rules('rubrics_description','Rubrics Description','required|trim|max_length[400]');
    if ($this->form_validation->run() == FALSE){ 
    $this->render($this->set_views->admin_rubrics_criteria());
    }else{
    $this->Rubrics_model->addrubrics();
    $this->session->set_flashdata('message','Rubrics Added Successfully');
    redirect('Admin/Generate_Rubrics','Refresh');   
         }
    }


  

   public function UpdateRubrics()
   {
    $this->form_validation->set_rules('rubrics_title','Rubrics', 'is_unique[lms_rubrics_table.rubrics]|trim|max_length[150]');
   // $this->form_validation->set_rules('description','Description', 'is_unique[lms_rubrics_description.description]|trim|max_length[150]');
    if ($this->form_validation->run() == FALSE){

    //echo validation_errors(); 
    $this->$data['v_rubrics'] = $this->Rubrics_model->view_rubrics();
    $this->$data['v_rubrics_escale'] = $this->Rubrics_model->view_rubrics_escale();
    $this->$data['v_rubrics_description'] = $this->Rubrics_model->view_rubrics_description();                                            
    $this->$data['test_output'] =  $this->Rubrics_model->getdescription();
    $this->render($this->set_views->admin_edit_rubrics());
    }else{
   // $this->Rubrics_model->addrubrics();
   // $this->session->set_flashdata('message','Rubrics Added Successfully');
   // redirect('Admin/Generate_Rubrics','Refresh');   
    }
  
   } 


   public function ReportAccount()
   {
    $this->$data['get_Account'] = $this->Reports_model->get_account_lists();
    $this->$data['account_list'] = $this->Reports_model->account_lists();
    $this->render($this->set_views->admin_report_account());
  
   } 

   public function ReportCourse()
   {
    $this->$data['course_list'] = $this->Reports_model->course_lists();
    $this->render($this->set_views->admin_report_course());
   } 

   public function CurriculumList()
   {
    $this->$data['program'] = $this->Reports_model->curriculum_lists_dropdowns();
    $this->$data['curriculum_year'] = $this->Reports_model->curriculum_lists_dropdown();
    $this->$data['curriculum_list'] = $this->Reports_model->curriculum_lists();
    $this->render($this->set_views->admin_curriculum_list());
   } 

   public function CurriculumCourseList()
   {
    $this->$data['curriculum_course_list'] = $this->Reports_model->subject_list();
    $this->render($this->set_views->admin_curriculum_course_list());
   } 

   public function UploadFile()
   {
    $this->$data['file_upload'] = $this->Reports_model->get_file_upload();
    $this->render($this->set_views->admin_upload_file());
   } 

   public function DeleteUploadFile()
   {
    $this->Reports_model->set_file();
    redirect('Admin/UploadFile');
   } 


   public function do_upload(){
    
    $config['upload_path'] = 'uploads';
    $config['allowed_types'] = '*';
    $config['max_size'] = '150240000';
    $config['file_ext_tolower']  = TRUE;
    $config['overwrite']  = FALSE;
    $config['detect_mime']  = TRUE;
    $config['mod_mime_fix']  = TRUE;
           
           $this->load->library('upload',$config);
           
           if( !$this->upload->do_upload('userFile') ){
               $error = array( 'error' => $this->upload->display_errors() );
               echo $error;
           }
           else{
              
               $data = array( 'upload_data' => $this->upload->data() );
               echo "Successfully Uploaded";
           
           }
        $this->Reports_model->insert_file();
        redirect('Admin/UploadFile');
        
           
   }





}
?>
