<?php


class LoginModel extends CI_Model{
	

	
public function login($u,$p)
{
	//$this->db->select('*ds');
	//$this->db->from('lms_accounts');
	$this->db->join('lms_accounttypes', 'lms_accounts.AccountType_ID = lms_accounttypes.Type_ID');
	$this->db->where('lms_accounts.Username', $u);
	$this->db->where('lms_accounts.Password', $p);
	$this->db->where('lms_accounts.Active', '1');
	$this->db->where('lms_accounttypes.LoginAccessible', '1');
	$this->db->limit(1);
	$query = $this->db->get('lms_accounts');
	return $query;

}
public function AdminLogin($u,$p)
{
	//$this->db->select('*ds');
	//$this->db->from('lms_accounts');
	$this->db->join('lms_accounttypes', 'lms_accounts.AccountType_ID = lms_accounttypes.Type_ID');
	$this->db->where('lms_accounts.Username', $u);
	$this->db->where('lms_accounts.Password', $p);
	$this->db->where('lms_accounts.Active', '1');
	$this->db->where('lms_accounttypes.LoginAccessible', '0');
	$this->db->limit(1);
	$query = $this->db->get('lms_accounts');
	return $query;
}

}
?>