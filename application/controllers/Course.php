<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends MY_Controller  {

	
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

        //Calls the model for courseware
        $this->load->model('Management/Courseware');
        $this->load->model('Management/EducationManagement');
        $this->data['Course_List'] = '';
        $this->data['Enrollees_List'] = '';


        
        //Use the following if login token is needed for access
        //Note: Pass the login token userdata
        $this->load->model('Rules/logincheck');
        $this->logincheck->token_check($this->session->userdata('LoginToken'));
        
        
    }	
    public function index()
    {
         $this->CourseList();
    }
    public function CourseList()
    {
        //TBA: Fail Checker
        $id = $this->session->userdata('UserID');
        $this->data['Course_List'] = $this->Courseware->GetCourseList($id);
        $this->data['Enrolled_List'] = $this->Courseware->GetEnrolledCourseList($id);
        $this->render($this->course_views->course_list());
    }
    public function CourseInfo(){

        $enrollees = $this->input->post('enrollees');
        $viewpage = $this->input->post('viewpage');
        $leavecourse = $this->input->post('leavecourse');
        $remove = $this->input->post('remove');
        if(isset($enrollees)){

            $this->Enrollees();
        }
        else if(isset($viewpage)){
            $this->PageSession();

        }
        else if(isset($leavecourse)){
            $this->LeaveCourse();
        }
        else if(isset($remove)){
            $this->DeactivateCourse();
        }
    }
    public function PageSession()
    {
        $postid = $this->input->post('Post_ID');
        $this->session->set_userdata('Course_ID',$postid);
        redirect('Course/Page','refresh');
    }
    public function Page()
    {
        //TBA: Fail Checker
        $id = $this->session->userdata('UserID');
        $postid = $this->session->userdata('Course_ID');
        $this->data['Course_Page'] = $this->Courseware->GetCourse($postid);
        $this->data['Attachments'] = $this->Courseware->GetAttachments();
        $this->render($this->course_views->course_page());
    }
    public function NewPost()
    {
        //TBA: Fail Checker
        $id = $this->session->userdata('UserID');
        $title = $this->input->get('Post_Title');
        $description = $this->input->get('PostDescription');
        $courseid = $this->session->userdata('Course_ID');
        //echo $title.': '.$description;
        $this->Courseware->AddNewPost($id,$title,$description,$courseid);
        redirect('Course/Page','refresh');
    }
    public function Comments(){
        $PostID = $this->input->get('PostID');
        $array = array(

            'CommentPostID' => $PostID

        );
        $this->session->set_userdata($array);
        $result = $this->Courseware->GetComments($PostID);
        echo json_encode($result);
    }
    public function NewComment(){

        $this->form_validation->set_rules('CommentContent', 'Comment', 'required|trim|max_length[200]');
        
        if ($this->form_validation->run() == FALSE)
		{
            //$this->load->view('myform');
            //echo 'fail: <br>';
            echo '<span style="color:#cc0000">'.form_error('feedback').'</span>';
            //echo validation_errors();
		}
		else
		{
            $id = $this->session->userdata('UserID');
            $PostID = $this->session->userdata('CommentPostID');
            $Comment = $this->input->post('CommentContent');

            $result = $this->Courseware->NewComment($id,$PostID,$Comment);
            echo $result;
        }
        
    }
    public function AddCourse()
    {
        $this->render($this->course_views->add_course());
    }
    public function AddCourse_SO()
    {
        $sess = array(
            'title' => $this->input->get('Course_Title'),
            'description' => $this->input->get('CourseDescription')
        );
        $this->data['SO_List'] = $this->EducationManagement->GetSOList();
        $this->data['SO_Suggested'] = $this->SchemanticMatching_Course_To_SO();
        $this->session->set_userdata($sess);
        $this->render($this->course_views->add_course_so());
    }
    public function AddCourse_process()
    {
        $id = $this->session->userdata('UserID');
        $title = $this->session->userdata('title');
        $description = $this->session->userdata('description');

        $code = $this->CourseCodeGen();
        $SO = $this->input->post('SO');
        foreach($SO as $row){
                echo $code.'<vr>';
                echo $row;
            $this->Courseware->InsertCourseSO($code,$row);
        }   

        $this->Courseware->AddNewCourse($id,$title,$description,$code);
        redirect('Course/CourseList','refresh');
    }
    public function EnrollCourse_process(){
        $id = $this->session->userdata('UserID');
        $code = $this->input->get('CourseCode');
        $this->Courseware->EnrollCourse($id,$code);
        redirect('Course/CourseList','refresh');
    }
    public function CourseCodeGen(){

        $code = strtoupper(substr(md5(uniqid(mt_rand(), true)) , 0, 8));
        $check = $this->Courseware->CheckCodeAvailability($code);

        while($check->num_rows() >= 1){
            $code = strtoupper(substr(md5(uniqid(mt_rand(), true)) , 0, 8));
            $check = $this->Courseware->CheckCodeAvailability($code);
        }
        
        return $code;
    }
    public function Enrollees(){
        $courseid = $this->input->post('Post_ID');
        $this->data['Enrollees_List'] = $this->Courseware->GetEnrollees($courseid);
        $this->render($this->course_views->course_enrollees());
    }
    public function LeaveCourse(){
        $id = $this->session->userdata('UserID');
        $courseid = $this->input->post('Post_ID');
        $this->Courseware->LeaveCourse($id,$courseid);
        redirect('Course/CourseList','refresh');
    }
    public function DeactivateCourse(){
        $id = $this->session->userdata('UserID');
        $courseid = $this->input->post('Post_ID');
        $this->Courseware->DeactivateCourse($id,$courseid);
        redirect('Course/CourseList','refresh');
    }
    public function UpdateCourse(){
        $id = $this->session->userdata('UserID');
        $courseid = $this->input->post('Post_ID');
        $courseid = $this->input->post('Post_ID');
        $courseid = $this->input->post('Post_ID');
        $this->Courseware->DeactivateCourse($id,$courseid);
        redirect('Course/CourseList','refresh');
    }
    public function Create_Account_Input()
    {
        $this->render($this->course_views->admin_creatacc_input());
    }
    public function SchemanticMatching_Course_To_SO()
    {
        $string = $this->session->userdata('title').''.$this->session->userdata('description');
        $split = preg_split("/[^\w]*([\s]+[^\w]*|$)/", $string, -1, PREG_SPLIT_NO_EMPTY);

      
        return $this->Courseware->CompareToSo($split);
        
    }



}
?>
