<?php


class EducationManagement extends CI_Model{
	
    public function GetCILOList(){
        
        $this->db->where('Active', '1');
        $query = $this->db->get('lms_cilo');
    
        return $query;
    }
    public function GetSOList(){

        $this->db->where('Active', '1');
        $query = $this->db->get('lms_student_outcomes');
    
        return $query;
    }
    public function GetCILOSpecific($id){
        
        $this->db->where('CILO_ID', $id);
        $this->db->where('Active', '1');
        $query = $this->db->get('lms_cilo');
    
        return $query;
    }
    public function GetSOSpecific($id){
        
        $this->db->where('SO_ID', $id);
        $this->db->where('Active', '1');
        $query = $this->db->get('lms_student_outcomes');
    
        return $query;
    }
    public function Add_CILO($title,$desc,$uid){

        $data = array(
            'CILO' => $title,
            'Description' => $desc,
            'AccountID' => $uid
        );
        $this->db->insert('lms_cilo', $data);

    }
    public function Add_SO($title,$desc,$uid){

        $data = array(
            'SO' => $title,
            'Description' => $desc,
        );
        $this->db->insert('lms_student_outcomes', $data);

    }
    public function UpdateCILO($id,$title,$desc,$uid)
	{
        $this->db->set('CILO', $title);
        $this->db->set('Description', $desc);
        $this->db->where('CILO_ID', $id);
		$this->db->update('lms_cilo');
    }
    public function UpdateSO($id,$title,$desc,$uid)
	{
        $this->db->set('SO', $title);
        $this->db->set('Description', $desc);
        $this->db->where('SO_ID', $id);
		$this->db->update('lms_student_outcomes');
	}



}
?>