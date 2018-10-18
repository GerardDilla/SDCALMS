<?php
class Reports_model extends CI_Model{
 
// ACCOUNT LIST MODEL

    public function  get_account_lists(){
        $this->db->select('*');
        $this->db->where('lms_accounts.Active','1');
        $this->db->from('lms_accounts');
        $this->db->join('lms_accounttypes','lms_accounttypes.Type_ID = lms_accounts.AccountType_ID');
        $this->db->group_by('lms_accounttypes.Type_ID');
        $query = $this->db->get();
        return $query;        
    }      


public function  account_lists(){
   $acc_type = $this->input->post('account_type');
   $from = $this->input->post('from');
   $to = $this->input->post('to');
   $submit = $this->input->post('search_button');

echo $from;
echo $to;

    $this->db->select('*');
    $this->db->from('lms_accounts');
    $this->db->join('lms_accounttypes','lms_accounttypes.Type_ID = lms_accounts.AccountType_ID');
   

    if(isset($submit)){
        $this->db->where('lms_accounts.Active','1');
        if(isset($acc_type)){
        $this->db->where('lms_accounttypes.Type_ID',$acc_type);
        } 
        
        if(isset($from,$to)){

            $this->db->where('lms_accounts.DateRegistered BETWEEN "'. date('Y-m-d', strtotime($from)). '" and "'. date('Y-m-d', strtotime($to)).'"');
        
        }
    }
    
    $this->db->order_by("lms_accounts.LastName", "asc");
    $query = $this->db->get();
    return $query;
      
  }                                             


// Course LIST MODEL


public function  course_lists(){
    $from = $this->input->post('from');
    $to = $this->input->post('to');
 
     $this->db->select('*');
     $this->db->from('lms_courses');
     $this->db->join('lms_accounts','lms_accounts.Account_ID = lms_courses.Account_ID');
     $this->db->where('lms_accounts.DateRegistered BETWEEN "'. date('Y-m-d', strtotime($from)). '" and "'. date('Y-m-d', strtotime($to)).'"');
     $this->db->where('lms_courses.Active','1');
     $query = $this->db->get();
     return $query;
                           
}

// Curriculum LIST MODEL

public function  curriculum_lists(){
    $Curriculum_year = $this->input->post('cy');
    $submit = $this->input->post('search_button');
    $Programs = $this->input->post('pro');
      
    $this->db->select('*');
    $this->db->from('curriculum_info');
    $this->db->join('programs','programs.Program_ID = curriculum_info.Program_ID');

    if(isset($submit)){
        $this->db->where('curriculum_info.Valid', '1');
        if(isset($Curriculum_year)){
        $this->db->where('curriculum_info.Curriculum_Year',$Curriculum_year);
        }
        if(isset($Programs)){
            $this->db->where('curriculum_info.Program_ID',$Programs);
         }
    }
    $query = $this->db->get();
    return $query;
                          
}

public function  subject_list(){
    $Curriculum_id = $this->input->post('curtId');

    $this->db->select('*');
    $this->db->from('curriculum');
    $this->db->where('Curriculum_ID',  $Curriculum_id);
    $this->db->order_by("Curriculum_Semester", "Desc");
    $query = $this->db->get();
    return $query;
                          
}



public function  curriculum_lists_dropdown(){

    $this->db->select('*');
    $this->db->from('curriculum_info');
    $this->db->group_by('Curriculum_Year');
    $this->db->order_by("Curriculum_Year", "Asc");
    $query = $this->db->get();
    return $query;
                          
}


public function  curriculum_lists_dropdowns(){

    $this->db->select('*');
    $this->db->from('curriculum_info');
    $this->db->join('programs','programs.Program_ID = curriculum_info.Program_ID');
    $this->db->group_by('programs.Program_Code');
    $query = $this->db->get();
    return $query;
                          
}

//Upload File

public function  insert_file(){

$name = $this->upload->data();
$Filename = $name['file_name'];
//$Filename = $this->input->post('userFile');

$date = date("Y-m-d");
$this->db->set('file_name', $Filename);
$this->db->set('Date_upload', $date);
$this->db->insert('lms_file_upload');

}

public function  set_file(){

    $id = $this->input->post('Upload_id');

    $this->db->set('Active', '0');
    $this->db->where('id', $id);
    $this->db->update('lms_file_upload');
    
    }

public function  get_file_upload(){

    $this->db->select('*');
    $this->db->from('lms_file_upload');
    $this->db->where('Active','1');
    $query = $this->db->get();
    return $query;
                          
}


}
?>