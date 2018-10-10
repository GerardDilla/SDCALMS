<?php


class AssessmentManagement extends CI_Model{
	

    public function SaveAssessmentQuestions($AssessmentQuestion,$code,$QuestionType,$choices,$question_answer,$point,$CILO,$CO){

        $data = array(
            'AssessmentCode' => $code,
            'QuestionType' => $QuestionType,
            'Question' => $AssessmentQuestion,
            'Answer' => $question_answer,
            'CILO_ID' => $CILO,
            'Choice_A' => $choices['0'],
            'Choice_B' => $choices['1'],
            'Choice_C' => $choices['2'],
            'Choice_D' => $choices['3'],
            'Points' => $point
            
        );
        
        $this->db->insert('lms_assessment_questions', $data);

    }
    public function SaveAssessmentDetails($user_id,$title,$description,$start,$end,$timelimit,$code){

        $current = date("y-m-d h:i:s",NOW());
        $data = array(
            'AssessmentCode' => $code,
            'AssessmentName' => $title,
            'Account_ID' => $user_id,
            'Description' => $description,
            'DateCreated' => $current,
            'CreatorID' => $user_id,
            'StartDate' => $start,
            'EndDate' => $end,
            'Timelimit' => $timelimit,
        );
        
        $this->db->insert('lms_assessment', $data);

    }
	public function CheckCodeAvailability($code){

		$this->db->where('AssessmentCode', $code);
		$this->db->where('Active', '1');
		$query = $this->db->get('lms_assessment');
		return $query;
    }
    public function GetAssessmentList($user_id){

		$this->db->where('CreatorID', $user_id);
		$this->db->where('Active', '1');
		$query = $this->db->get('lms_assessment');
		return $query;
    }
    public function GetAssessmentLayout($assessment_code){

        $this->db->select('
        
        A.AssessmentName,
        A.AssessmentCode,
        A.Description,
        A.StartDate,
        A.Timelimit,
        A.EndDate,
        B.QuestionID,
        B.Question,
        B.Answer,
        B.Choice_A,
        B.Choice_B,
        B.Choice_C,
        B.Choice_D,
        B.Points,
        C.QuestionType,
        C.QuestionTypeID,
        D.FirstName,
        D.MiddleName,
        D.LastName,
        E.CILO
        ');
        $this->db->join('lms_assessment_questions as B', 'A.AssessmentCode = B.AssessmentCode');
        $this->db->join('lms_assessment_question_types as C', 'B.QuestionType = C.QuestionTypeID');
        $this->db->join('lms_accounts as D', 'A.Account_ID = D.Account_ID');
        $this->db->join('lms_cilo as E', 'B.CILO_ID = E.CILO_ID');
        $this->db->where('A.Active', '1');
        $this->db->where('A.AssessmentCode', $assessment_code);
		$query = $this->db->get('lms_assessment as A');
		return $query;
    }
    public function TimeRecord($ac,$uid,$start,$end){
        
        $data = array(
            'AssessmentCode' => $ac,
            'Account_ID' => $uid,
            'TimeStarted' => $start,
            'TimeEnd' => $end,
        );
        $this->db->insert('lms_assessment_timer', $data);
         

    }
    public function SubmitAnswer($ac,$qid,$uid,$ans,$date){
        
        $data = array(
            'AssessmentCode' => $ac,
            'QuestionID' => $qid,
            'AccountID' => $uid,
            'QuestionAnswer' => $ans,
            'Date' => $date,
        );
        $this->db->insert('lms_assessment_answers', $data);
         

    }
    public function GetAssessmentResult($ac,$uid){
        $date = $this->GetlatestAnswer($ac,$uid);
        $this->db->select('
        
        A.QuestionAnswer,
        A.Date,
        B.QuestionID,
        B.Question,
        B.Answer,
        B.Choice_A,
        B.Choice_B,
        B.Choice_C,
        B.Choice_D,
        B.Points,
        C.QuestionType,
        C.QuestionTypeID,
        D.AssessmentName,
        D.AssessmentCode,
        D.Description,
        D.StartDate,
        D.Timelimit,
        D.EndDate,
        E.FirstName,
        E.MiddleName,
        E.LastName,
        E.Email
        ');
        
        $this->db->join('lms_assessment_questions as B', 'A.QuestionID = B.QuestionID');
        $this->db->join('lms_assessment_question_types as C', 'B.QuestionType = C.QuestionTypeID');
        $this->db->join('lms_assessment as D', 'D.AssessmentCode = A.AssessmentCode');
        $this->db->join('lms_accounts as E', 'A.AccountID = E.Account_ID');
        $this->db->where('A.Active', '1');
        $this->db->where('A.AssessmentCode', $ac);
        $this->db->where('A.AccountID', $uid);
        $this->db->where('A.Date', $date);
        $query = $this->db->get('lms_assessment_answers as A');
		return $query;
         

    }
    public function GetlatestAnswer($ac,$uid){

        $this->db->select_max('Date');
        $this->db->where('AccountID', $uid);
        $this->db->where('AssessmentCode', $ac);
        $query = $this->db->get('lms_assessment_answers');
        foreach($query->result_array() as $row){
            return $row['Date'];
        }

    }
    public function GetExaminees($ac){

        $this->db->select('
        
        A.AssessmentName,
        A.AssessmentCode,
        A.Description,
        A.StartDate,
        A.Timelimit,
        A.EndDate,
        B.AccountID,
        C.FirstName,
        C.MiddleName,
        C.LastName,
        C.Email

        ');
        $this->db->join('lms_assessment_answers as B', 'A.AssessmentCode = B.AssessmentCode');
        $this->db->join('lms_accounts as C', 'B.AccountID = C.Account_ID');
        $this->db->where('A.Active', '1');
        $this->db->where('A.AssessmentCode', $ac);
        $this->db->group_by('B.AccountID');
		$query = $this->db->get('lms_assessment as A');
		return $query;
         

    }
    public function CheckTimer($assessment_code,$user_id){

        $this->db->where('AssessmentCode', $assessment_code);
        $this->db->where('Account_ID', $user_id);
        $this->db->where('Active', '1');
		$query = $this->db->get('lms_assessment_timer');
		return $query;
    }

    


}
?>