<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Assessment extends MY_Controller  {

	
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
        $this->load->model('Management/AssessmentManagement');
        $this->load->model('Management/EducationManagement');
        date_default_timezone_set('Asia/Manila');
        
        //Use the following if login token is needed for access
        //Note: Pass the login token userdata
        $this->load->model('Rules/logincheck');
        $this->logincheck->token_check($this->session->userdata('LoginToken'));
        
    }	
    public function index()
    {
        $this->NewAssessment();
    }
    public function NewAssessment()
    {
        $this->render($this->assesment_views->assessment_initial());
    }
    public function AssessmentBuilder()
    {
        $Assessment_Title = $this->input->post('Assessment_Title');
        $Assessment_Description = $this->input->post('Assessment_Description');
        $StartDate = $this->input->post('StartDate');
        $EndDate = $this->input->post('EndDate');
        $Timelimit = $this->input->post('Timelimit');
        $data = array(
            'Assessment_Title' => $Assessment_Title,
            'Assessment_Description' => $Assessment_Description,
            'StartDate' => $StartDate,
            'EndDate' => $EndDate,
            'Timelimit' => $Timelimit
        );
        $this->session->set_userdata($data);
        $this->data['CILO_List'] = $this->EducationManagement->GetCILOList();
        $this->render($this->assesment_views->assessment_build());
    }
    public function AssessmentSave()
    {
        $AssessmentQuestion = $this->input->post('AssessmentQuestion');
        $user_id = $this->session->userdata('UserID');
        echo $user_id;
        $title = $this->session->userdata('Assessment_Title');
        $description = $this->session->userdata('Assessment_Description');
        $start = $this->session->userdata('StartDate');
        $end = $this->session->userdata('EndDate');
        $timelimit = $this->session->userdata('Timelimit');
        $code = $this->AssessmentCodeGen();

        $this->AssessmentManagement->SaveAssessmentDetails($user_id,$title,$description,$start,$end,$timelimit,$code);

        $count = 0;
        foreach($AssessmentQuestion as $row){

            $count++;
            
            $MultChoice = $this->input->post($count.'MultChoice');
            $Question = $row;

            if(isset($MultChoice)){
                foreach($MultChoice as $choice){
                    $MultAnswer = $this->input->post($count.'Mult_QuestionAnswer');
                    if(isset($MultAnswer)){
                        foreach($MultAnswer as $a => $answer){
                            $choices[] = $answer;
                        }
                        foreach($MultAnswer as $a => $answer){
                            if($choice == $a){
                                $question_answer = $answer;
                            }
                        }
                    }else{
                        echo 'No Answer Found';
                    }
                }
            
            }else{
                $QuestionAnswer = $this->input->post($count.'QuestionAnswer');
                foreach($QuestionAnswer as $answer){
                    $question_answer = $answer;
                }
            }

            $QuestionPoint = $this->input->post($count.'QuestionPoint');
            foreach($QuestionPoint as $point){
                $question_point = $point;
            }

            $QuestionType = $this->input->post($count.'QuestionType');
            foreach($QuestionType as $type){
                $question_type = $type;
               
            }

            $learningoutcome = $this->input->post($count.'CILO');
            foreach($learningoutcome as $cilo_data){
                $CILO = $cilo_data;
                echo $CILO;
            }
        
            $this->AssessmentManagement->SaveAssessmentQuestions($Question,$code,$question_type,$choices,$question_answer,$question_point,$CILO);
            unset($choices);
        }
        $this->data['message'] = 'Assessment Added!';
        $this->session->set_flashdata('message',$this->data['message']);
        redirect('Assessment/AssessmentList','refresh');
        //$this->render($this->assesment_views->assessment_list());
    }
    public function AssessmentList(){

        $user_id = $this->session->userdata('UserID');
        $this->data['Assessment_List'] = $this->AssessmentManagement->GetAssessmentList($user_id);
        $this->render($this->assesment_views->assessment_list());

    }
    public function AssessmentDirectory(){

        $result = $this->input->post('result');
        $view = $this->input->post('viewassessment');
        $exam = $this->input->post('exam');

        if(isset($result)){
            $this->AssessmentExamineesList();
        }
        else if(isset($exam)){
            $this->AssessmentBriefing();
        }
        else if(isset($view)){
            $this->ViewAssessment();
        }
        else{
            $this->AssessmentList();
        }
       
    }
    public function ViewResults(){

   
        $this->render($this->assesment_views->assessment_list());
      
       
    }
    public function AssessmentBriefing(){
        
        $assessment_code = $this->session->userdata('assessment_code');
        if(isset($assessment_code)){

            $this->AssessmentStart();
            
        }else{

            $assessment_code = $this->input->post('assessment_code');
            //echo $assessment_code;
            $user_id = $this->session->userdata('UserID');
            $this->data['ExamBrief'] = $this->AssessmentManagement->GetAssessmentLayout($assessment_code);
            $this->assessment_form($this->assesment_views->assessment_brief());   

        }
 
    }
    public function AssessmentSetup(){
        
        $starbutton = $this->input->post('start');
        $ac = $this->input->post('A_code');
        $tl = $this->input->post('time');
        echo $ac.'<br>';
        if(isset($starbutton)){

            $this->session->set_userdata('assessment_code',$ac);
            $user_id = $this->session->userdata('UserID');
            $check_timer_record = $this->AssessmentManagement->CheckTimer($ac,$user_id);
            echo $check_timer_record->num_rows().'<br>';

            //Set current Date
            $now = new DateTime();
            $start = $now->format('y-m-d h:i:s').'<br>';
            $start_h = $now->format('h');
            $start_m = $now->format('i');
            echo $start.'<br>';
            //.Set current Date
    
            //Set Minutes that will be added
            $minutesToAdd = $tl;
            echo $tl;
            //.Set Minutes that will be added
    
            //Add the minutes to the current date
            $now->modify("+60 minutes");
            $end = $now->format('y-m-d h:i:s');
            $end_h = $now->format('h');
            $end_m = $now->format('i');
            echo $end.'<br>';
            //.Add the minutes to the current date
            
            if($check_timer_record->num_rows() == 0){

                $this->AssessmentManagement->TimeRecord($ac,$user_id,$start,$end);
            }
            

            redirect(base_url().'index.php/Assessment/AssessmentStart');
        }else{
            redirect(base_url().'index.php/Assessment/AssessmentList');
        }

       
    }
    public function AssessmentStart(){

        $assessment_code = $this->session->userdata('assessment_code');
        if(isset($assessment_code)){
            $user_id = $this->session->userdata('UserID');

            $now = new DateTime();
            $start = $now->format('Y-m-d g:i:s');

            $endtime_checker = $this->AssessmentManagement->CheckTimer($assessment_code,$user_id);
            foreach($endtime_checker->result_array() as $row){
                $endtime = new DateTime($row['TimeEnd']);
                $end = $endtime->format('Y-m-d g:i:s');
            }
            //echo 'Start Date: '.$start.'<br>End Date: '.$end.'<br>';
            $start = date_create($start);
            $end = date_create($end);
            $diff = date_diff($end,$start);
            //print_r($diff);
            //echo date_format($end, 'm').'<br>';
            //echo date_format($start, 'm').'<br>';
            if(date_format($end, 'Y-m-d g:i:s') >= date_format($start, 'Y-m-d g:i:s')){
                
                $hour = $diff->h * 60;
                $minute = $diff->i;
                $second = $diff->s;
                $timelimit_m = $hour + $minute;
                //echo $timelimit;

                $this->session->set_userdata('timelimit_m', $timelimit_m);
                $this->session->set_userdata('timelimit_s', $second);

                $this->data['AssessmentExam'] = $this->AssessmentManagement->GetAssessmentLayout($assessment_code);
            
            
                $this->assessment_form($this->assesment_views->assessment_start());
            }
            else{
                echo 'timeout';
            }



        }else{
            redirect(base_url().'index.php/Assessment/AssessmentList');
        }
       
    }
    public function CheckAssessmentData(){





    }
    public function AssessmentExamSubmit(){

        $ac = $this->session->userdata('assessment_code');
        $uid = $this->session->userdata('UserID');
        $date = new DateTime();
        $date = $date->format('Y-m-d g:i:s');

        $question_id = $this->input->post('QuestionID');
        foreach($question_id as $qid){
            $count++;
            $answer = $this->input->post($count.'QuestionAnswer');
            foreach($answer as $ans){
                echo $qid.'<br>';
                echo $ans.'<br>';
                
                $this->AssessmentManagement->SubmitAnswer($ac,$qid,$uid,$ans,$date);
            }
        }
        redirect(base_url().'index.php/Assessment/AssessmentExamResult');
        $assessment_id = $this->input->post('');
      
    }
    public function AssessmentExamResult(){

        $ac = $this->session->userdata('assessment_code');
        $uid = $this->session->userdata('UserID');
        $this->data['AssessmentLayout'] = $this->AssessmentManagement->GetAssessmentResult($ac,$uid);
        $this->render($this->assesment_views->assessment_result());

    }
    public function AssessmentPerformance(){

        $ac = $this->input->post('assessmentcode');
        $uid = $this->input->post('uid');
        $this->data['AssessmentLayout'] = $this->AssessmentManagement->GetAssessmentResult($ac,$uid);
        $this->render($this->assesment_views->assessment_result());

    }
    public function AssessmentExamineesList(){

        $assessment_code = $this->input->post('assessment_code');
        $this->data['ExamineeList'] = $this->AssessmentManagement->GetExaminees($assessment_code);
        $this->render($this->assesment_views->assessment_examinees());

    }
    public function ViewAssessment(){

        $assessment_code = $this->input->post('assessment_code');
        $this->data['AssessmentLayout'] = $this->AssessmentManagement->GetAssessmentLayout($assessment_code);
        $this->render($this->assesment_views->assessment_view());
      
    }
    public function AssessmentSubmit(){

        $assessment_code = $this->input->post('assessment_code');
        $this->data['AssessmentLayout'] = $this->AssessmentManagement->GetAssessmentLayout($assessment_code);
        $this->assessment_form($this->assesment_views->assessment_build());

    }
    public function AssessmentCodeGen(){

        $code = strtoupper(substr(md5(uniqid(mt_rand(), true)) , 0, 8));
        $check = $this->AssessmentManagement->CheckCodeAvailability($code);

        while($check->num_rows() >= 1){
            $code = strtoupper(substr(md5(uniqid(mt_rand(), true)) , 0, 8));
            $check = $this->AssessmentManagement->CheckCodeAvailability($code);
        }
        
        return $code;
    }
    //TEMPORARY, FOR TESTING PURPOSES
    public function Remove_a_b_c_3_2_1_code(){
        $this->session->unset_userdata('assessment_code');
        redirect(base_url().'index.php/Assessment/AssessmentList');
    }

}
?>
