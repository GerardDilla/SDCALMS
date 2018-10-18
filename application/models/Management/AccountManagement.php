<?php


class AccountManagement extends CI_Model{
	

    public function GetAccountList($search){

 
        $this->db->join('lms_accounttypes AS B','A.AccountType_ID = B.Type_ID');
        $this->db->like('A.FirstName', $search);
        $this->db->or_like('A.LastName', $search);
        $this->db->or_like('A.Email', $search);
        $this->db->where('A.Active', '1');
        $query = $this->db->get('lms_accounts AS A');
    
        return $query;
    }	
    public function UpdateCourse($id,$course)
	{
		$this->db->set('Active', '0', FALSE);
		$this->db->where('Account_ID', $id);
		$this->db->where('Course_ID', $course);
		$this->db->update('lms_courses');
	}
    public function AccountRegistration($fname,$mname,$lname,$uname,$email,$pword,$Atype){

        $current = date("y-m-d",NOW());
        $data = array(
            'FirstName' => $fname,
            'MiddleName' => $mname,
            'LastName' => $lname,
            'Username' => $uname,
            'Email' => $email,
            'Password' => $pword,
            'AccountType_ID' => $Atype,
            'DateRegistered' => $current,
        );
        $this->db->insert('lms_accounts', $data);

    }
    public function AccountUpdate($userid,$fname,$mname,$lname,$uname,$email,$pword,$Atype){

        $data = array(
            'FirstName' => $fname,
            'MiddleName' => $mname,
            'LastName' => $lname,
            'Username' => $uname,
            'Email' => $email,
            'Password' => $pword,
            'AccountType_ID' => $Atype,
        );
        //echo $userid.':'.$fname.' '.$mname. ' '.$lname.'<br>'.$uname.':'.$email.':'.$pword.'<br>'.$Atype;
        $this->db->where('Account_ID', $userid);
        $this->db->update('lms_accounts', $data);

    }
    public function GetAccountTypes(){
        
        $this->db->where('LoginAccessible', '1');
        $query = $this->db->get('lms_accounttypes');
        return $query;
    }
    public function GetPersonalInfo($id){
        
        $this->db->where('Account_ID', $id);
        $this->db->where('Active', '1');
        $query = $this->db->get('lms_accounts');
    
        return $query;
    }
    public function ActivateAccount($id)
	{
		$this->db->set('Active', '1', FALSE);
		$this->db->where('Account_ID', $id);
		$this->db->update('lms_accounts');
	}
    public function DeactivateAccount($id)
	{
		$this->db->set('Active', '0', FALSE);
		$this->db->where('Account_ID', $id);
		$this->db->update('lms_accounts');
    }
 


}
?>