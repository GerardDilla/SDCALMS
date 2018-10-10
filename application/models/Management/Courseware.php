<?php


class Courseware extends CI_Model{
	

	
	public function GetCourseList($id)
	{
		$this->db->select('
		A.Course_ID,
		A.Account_ID,
		A.CourseCode,
		A.CourseName,
		A.Description,
		A.DateCreated,
		A.Active,
		B.FirstName,
		B.MiddleName,
		B.LastName,
		');
		$this->db->join('lms_accounts AS B','A.Account_ID = B.Account_ID');
		$this->db->where('A.Account_ID',$id);
		$this->db->where('A.Active', '1');
		$query = $this->db->get('lms_courses AS A');
		return $query;

	}
	public function GetEnrolledCourseList($id)
	{
		$this->db->select('
		A.Account_ID,
		A.Course_ID,
		A.DateJoined,
		A.Active,
		B.CourseName,
		B.CourseCode,
		C.FirstName,
		C.MiddleName,
		C.LastName,
		');
		$this->db->join('lms_courses AS B','A.Course_ID = B.Course_ID');
		$this->db->join('lms_accounts AS C','A.Account_ID = C.Account_ID');
		$this->db->where('A.Account_ID',$id);
		$this->db->where('A.Active', '1');
		$this->db->where('B.Active', '1');
		$query = $this->db->get('lms_enrolled_students AS A');
		return $query;

	}
	public function GetCourse($postid)
	{
		$this->db->select('
		A.CoursePost_ID,
		A.Course_ID,
		A.Title,
		A.Description,
		A.Account_ID,
		A.Active,
		A.DateCreated,
		B.FirstName,
		B.MiddleName,
		B.LastName,
		C.CourseName,
		');
		$this->db->join('lms_accounts AS B','A.Account_ID = B.Account_ID');
		$this->db->join('lms_courses AS C','A.Course_ID = C.Course_ID');
		$this->db->where('A.Course_ID',$postid);
		$this->db->where('A.Active', '1');
		$this->db->order_by('A.CoursePost_ID', 'DESC');
		$query = $this->db->get('lms_course_posts AS A');
		return $query;
	}
	public function GetAttachments(){
		$query = $this->db->get('lms_attachment_type');
		return $query;
	}
	public function GetComments($id){

		$this->db->select('
		A.Comment,
		A.CommentDate,
		B.FirstName,
		B.MiddleName,
		B.LastName
		');
		$this->db->join('lms_accounts AS B','A.Account_ID = B.Account_ID');
		$this->db->where('A.Post_ID',$id);
		$this->db->where('A.Active', '1');
		$this->db->order_by('A.Comment_ID', 'ASC');
		$query = $this->db->get('lms_post_comments AS A');

		return $query->result_array();
	}
	public function NewComment($id,$PostID,$Comment){

		$current = date("y-m-d",NOW());
		$data = array(
			'Account_ID' => $id,
			'Post_ID' => $PostID,
			'Comment' => $Comment,
			'CommentDate' => $current,
		);
		if($this->db->insert('lms_post_comments', $data)){
			return true;
		}
		else{
			return false;
		}
	}
	public function AddNewPost($id,$title,$description,$courseid)
	{
		$current = date("y-m-d",NOW());
		$data = array(
			'Account_ID' => $id,
			'Title' => $title,
			'Description' => $description,
			'Course_ID' => $courseid,
			'DateCreated' => $current
		);

		$this->db->insert('lms_course_posts', $data);
	}
	public function AddNewCourse($id,$title,$description,$code)
	{
		$current = date("y-m-d",NOW());
		$data = array(
			'Account_ID' => $id,
			'CourseCode' => $code,
			'CourseName' => $title,
			'Description' => $description,
			'DateCreated' => $current
		);
		$this->db->insert('lms_courses', $data);
	}
	public function DeleteCourse(){

	}
	public function UpdateCourse($id,$course)
	{
		$this->db->set('Active', '0', FALSE);
		$this->db->where('Account_ID', $id);
		$this->db->where('Course_ID', $course);
		$this->db->update('lms_courses');
	}
	public function DeletePost(){
		
	}
	public function UpdatePost(){
		
	}
	public function DeleteComment(){
		
	}
	public function UpdateComment(){
		
	}
	public function EnrollCourse($id,$code)
	{
		$current = date("y-m-d",NOW());
		$c_id = $this->GetCourseID($code);
		$data = array(
			'Account_ID' => $id,
			'Course_ID' => $c_id,
			'DateJoined' => $current
		);
		$this->db->insert('lms_enrolled_students', $data);
	}
	public function LeaveCourse($id,$course)
	{
		$this->db->set('Active', '0', FALSE);
		$this->db->where('Account_ID', $id);
		$this->db->where('Course_ID', $course);
		$this->db->update('lms_enrolled_students');
	}
	public function DeactivateCourse($id,$course)
	{
		$this->db->set('Active', '0', FALSE);
		$this->db->where('Account_ID', $id);
		$this->db->where('Course_ID', $course);
		$this->db->update('lms_courses');
	}
	public function CheckCodeAvailability($code){

		$this->db->where('CourseCode', $code);
		$this->db->where('Active', '1');
		$query = $this->db->get('lms_courses');
		return $query;
	}
	public function GetEnrollees($id){

		$this->db->join('lms_accounts AS B','A.Account_ID = B.Account_ID');
		$this->db->join('lms_courses AS C','A.Course_ID = C.Course_ID');
		$this->db->where('A.Course_ID',$id);
		$this->db->where('A.Active', '1');
		$query = $this->db->get('lms_enrolled_students AS A');

		return $query;
	}
	public function GetCourseID($code){

		$this->db->select('Course_ID');
		$this->db->where('CourseCode', $code);
		$this->db->where('Active', '1');
		$query = $this->db->get('lms_courses');

		if($query->num_rows() != 0){
			foreach($query->result_array() as $row){
				return $row['Course_ID'];
			}
		}
		return false;
	}
	public function InsertCourseSO($cc,$sid)
	{
		$data = array(
			'CourseCode' => $cc,
			'SO_ID' => $sid
		);
		$this->db->insert('lms_course_so', $data);
	}
	public function CompareToSo($split){

		foreach($split as $row){
			
            $this->db->or_like('Description', $row,false);
        }
		$query = $this->db->get('lms_student_outcomes');

		return $query;
	}
}
?>