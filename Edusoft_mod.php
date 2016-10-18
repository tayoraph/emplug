<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Edusoft_mod extends CI_Model {

	//testing form validation model starts here 


function form_insert($data){
// Inserting in Table(students) of Database(college)
$this->db->insert('students', $data);
}


	// testing form validation model ends here 

	//this model is to get the data from the database.
	public function adlog(){
		

			$this->db->select('*');
			$this->db->from('edusoft_user');
			$this->db->where('uname', $username);
			$this->db->where('pword', $password);
			$query = $this->db->get();
			return $query->num_rows();
			}




		//$query=$this->db->get('edusoft_user');//the edusoft_user is the name of your table in the database

			//return $query->result(); // return result for multiple row

	//}
			// Getting the admin access level starts here 
		public function admin_access() {
				$this->db->select('*');
				$this->db->from('edusoft_users_access');
				$query = $this->db->get();
				if ($query == True) {
				return $query->result();
				} else {
				return false;
				}
				}
			//getting the admin access level ends here 


			// setting the user active start here 
		public function grace_online($alpha,$omega) {
				
				$this->db->where('username', $omega);
				$query= $this->db->update('edusoft_user', $alpha);
				if ($query == True) {
				return true;
				} else {
				return false;
				}
				}
			///setting the user active ends here

			// setting the student active start here 
		public function mercy_online($alpha,$omega) {
				
				$this->db->where('username', $omega);
				$query= $this->db->update('edusoft_stalite_user', $alpha);
				if ($query == True) {
				return true;
				} else {
				return false;
				}
				}
			///setting the student active ends here

			// counting available users starts here
		public function get_available_users() {
				$this->db->select('*');
				$this->db->from('edusoft_user');
				$this->db->where('active', 1);
				$query = $this->db->get();
				$active_users = $query->num_rows();
				if ($query->num_rows() >= 1) {
				
				return $active_users;
				} else {
				return false;
				}
				}

				
			///counting available users ends here


		// counting total registerd students  starts here
		public function all_reg_stu() {
				$this->db->select('*');
				$this->db->from('edusoft_stu_details');
				$query = $this->db->get();
				$total_reg_stu = $query->num_rows();
				if ($query->num_rows() >= 1) {
				return $total_reg_stu;
				} else {
				return false;
				}
				}
			
			//counting total registerd students ends here
	

	public function validate($data) {

	$condition = "username =" . "'" . $data['uname'] . "' AND " . "password =" . "'" . $data['pword'] . "'AND " . "access =" . "'" . $data['access'] . "'";
	$this->db->select('*');
	$this->db->from('edusoft_user');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();

	if ($query->num_rows() == 1) {
	return $query->result();
	} else {
	return false;
	}
	}


	public function read_user_information($username) {// you can use any name  in this function  but make sure its is the same as in the condition (e.g. $username as $username ) in the $condition

	$condition = "username =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('edusoft_user');
		$this->db->where($condition);
		$this->db->limit(1);
	$query = $this->db->get();
		if ($query->num_rows() == 1) {
		return $query->result();
		} else {
		return false;
		}
		}

	public function contact_process($contact_pro){

		$this->db->insert('edusoft_contact_msg', $contact_pro);
		
	}

	


	public function get_fristname($username){

		$condition = "username =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('edusoft_stu_details');
		$this->db->where($condition);
		$this->db->limit(1);
	$query = $this->db->get();
		if ($query == True) {
		return $query->result();
		} else {
		return false;
		}
		}
	

	public function stu_validate($data) {

	$condition = "username =" . "'" . $data['uname'] . "' AND " . "password =" . "'" . $data['pword'] . "'";
	$this->db->select('*');
	$this->db->from('edusoft_stalite_user');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();

	if ($query->num_rows() == 1) {
	return true;
	} else {
	return false;
	}
	}


public function read_stailte_info($username) {// you can use any name  in this function  but make sure its is the same as in the condition (e.g. $username as $username ) in the $condition

	$condition = "username =" . "'" . $username . "'";
	$this->db->select('*');
	$this->db->from('edusoft_stalite_user');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();

	if ($query->num_rows() == 1) {
		$rs = $query->row();
	return $query->result();
	} else {
	return false;
	}
	}
	// Student registration edit begin Here

/// here start the student forgot password model

function recover_password($recover){


	$condition = "username =" . "'" . $recover['uname'] . "'";
	$this->db->select('password');
	$this->db->from('edusoft_stalite_user');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();

	if ($query->num_rows() == 1) {
	$val = $query->row();
	return $val->password;    

	} else {
	return false;
	}
	}


	function password_reset($uname,$new_pass){

		$this->db->where('username', $uname);
		$query= $this->db->update('edusoft_stu_details', $new_pass);
		$query2= $this->db->update('edusoft_stalite_user', $new_pass);
		return $this->db->affected_rows() > 0;

		
		//$afftectedRows = $this->db->affected_rows($query);
		//if (num_rows() == 1) {
		//	return True;
		//
	//	} else {
	//return false;
	//}
			//$afftectedRows = $this->db->affected_rows();
		}


///here ends the student forgot password model

public function vc_mail_pro($stumsg){

		$this->db->insert('edusoft_vc_mail',$stumsg);
		
	}
// here starts the count bar model

function count(){

  $this->db->$this->db->select_count('id');
			$this->db->from('edusoft_stu_details');
			$query = $this->db->get();
			if ($query->num_rows() > 0)
        { return $query->row_array();
        }
        else {return NULL;}

			}




// here ends the count bar model


			// Function To Fetch All Students Record /// put this in the admin panel profile
			
			function show_students(){
			$query = $this->db->get('edusoft_stu_details');
			$query_result = $query->result();
			return $query_result;
			}


			// Function To Fetch Selected Student Record
			function show_student_id($data){
			$this->db->select('*');
			$this->db->from('edusoft_stu_details');
			$this->db->join('edusoft_course', 'edusoft_course.course_id = edusoft_stu_details.course_id', 'left');
			$this->db->join('edusoft_department', 'edusoft_department.dept_id = edusoft_stu_details.dept_id', 'left');
			$this->db->join('edusoft_faculty', 'edusoft_faculty.faculty_id = edusoft_stu_details.faculty_id', 'left');
			$this->db->join('edusoft_level', 'edusoft_level.level_id = edusoft_stu_details.present_level', 'left');	
			$this->db->where('id', $data);
			$query = $this->db->get();
			$result = $query->result();
			return $result;
			}


			// Update Query For Selected Student


			function update_student_id1($id,$data){
			$this->db->where('id', $id);
			$query=$this->db->update('edusoft_stu_details', $data);
			return $this->db->affected_rows() > 0;
		}


	// Student registration edit ends here


	

			// here starts the students' model function


			public function validating($data) {

	$condition = "username =" . "'" . $data['uname'] . "' AND " . "password =" . "'" . $data['pword'] . "'";
	$this->db->select('*');
	$this->db->from('edusoft_stu_details');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();

	if ($query->num_rows() == 1) {
		return true;
	} else {
	return false;
	}
	}


	public function read_user_info($username) {// you can use any name  in this function  but make sure its is the same as in the condition (e.g. $username as $username ) in the $condition

	$condition = "username =" . "'" . $username . "'";
	$this->db->select('*');
	$this->db->from('edusoft_stu_details');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();

	if ($query->num_rows() == 1) {

		$rs = $query->row();
		

	return $query->result();
	} else {
	return false;
	}
	}

		
			// here ends the students' model function

// here starts the VC student mail model function
	public function show_all_stu_message() {
			$this->db->select('*');
			$this->db->from('edusoft_vc_mail');
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
			return $query->result();
			} else {
			return false;
			}
}


///////////////////////////////////////////////////////////////////


// here starts the VC model message selection


			// Function To Fetch Selected Student Record
			function read_message($id){
			$this->db->select('*');
			$this->db->from('edusoft_vc_mail');
			$this->db->where('id', $id);
			$query = $this->db->get();
			$result = $query->result();
			return $result;
			}
///////////////////////////////////////////////////////////////////


			public function add_sci_payment($add)
{


		$this->db->insert('edusoft_fee_prices',$add);
}



	
 // here starts fee prices selection



// here begin the frontend student registration into the database

	public function frontend_student($frontend_addstudent){

		$this->db->insert('edusoft_stu_details', $frontend_addstudent );
	}

	public function insert_login($user_login){


		$this->db->insert('edusoft_stalite_user', $user_login );
	}


// here ends the frontend student registration into the database 
	public function show_prices() {



			$this->db->select('*');
			$this->db->from('edusoft_fee_prices');
			$this->db->join('edusoft_course', 'edusoft_course.course_id = edusoft_fee_prices.course_id', 'left');


					$query = $this->db->get();

			if ($query->num_rows() >= 0) {
			return $query->result();
			} else {
			return false;
			}
		}
////////////////////////////////////////////////

		// courses model starts here

		// checking double course entry starts here 
public function check_course($cos){
			$this->db->select('*');
			$this->db->from('edusoft_all_courses');
			$this->db->where('course', $cos);
			$query = $this->db->get();
			if ($query->num_rows() == 1) {
			return $query->result();
			} else {
			return false;
			}
		}
/// checking double course entry ends here

			//inputing new course starts here

public function new_course($new_course){


		$query= $this->db->insert('edusoft_all_courses',$new_course);
		if ($query){
			return true;
			} else {
			return false;
			}
	}
			/// inputing new course ends here

	// selecting faculty starts here 
public function faculty_select(){
			$this->db->select('*');
			$this->db->from('edusoft_faculty');
			$query = $this->db->get();
		if ($query->num_rows() >= 0) {
			return $query->result();
			} else {
			return false;
			}
		}
/// selecting faculty ends here

// selecting dept starts here 
public function dept_select(){
			$this->db->select('*');
			$this->db->from('edusoft_department');
			$query = $this->db->get();
		if ($query->num_rows() >= 0) {
			return $query->result();
			} else {
			return false;
			}
		}
/// selecting dept ends here
// selecting course starts here 
	public function course_select(){
			$this->db->select('*');
			$this->db->from('edusoft_course');
			$query = $this->db->get();
		if ($query->num_rows() >= 0) {
			return $query->result();
			} else {
			return false;
			}
		}
/// selecting course ends here

		// selecting course starts here 
	public function level_select(){
			$this->db->select('*');
			$this->db->from('edusoft_level');
			$query = $this->db->get();
		if ($query->num_rows() >= 0) {
			return $query->result();
			} else {
			return false;
			}
		}
/// selecting course ends here
		/// courses model ends here 

// inserting present semester into database starts here

public function Present_sem_un($underu){
			$this->db->where('sem_id', 1);
			$this->db->update('edusoft_present_semester', $underu);
			$updated = $this->db->affected_rows() > 0;
			return $updated;
}


public function Present_sem_po($underg){
			$this->db->where('sem_id', 1);
			$this->db->update('edusoft_present_semester', $underg);
			$updated = $this->db->affected_rows() > 0;
			return $updated;
	}

/// inserting present semester into database ends here

	// selecting present semester to set as session starts here 

		public function present_semester_call(){
			$this->db->select('*');
			$this->db->from('edusoft_present_semester');
			$query = $this->db->get();
		if ($query->num_rows() >= 0) {
			return $query->result();
			} else {
			return false;
			}
		}
	/// selecting present semester to set as session ends here 

	// Inserting the examination question into the database session starts here 

		public function insert_exam($dina){
			$this->db->insert('edusoft_exam_questions', $dina);
			
		}
	// Inserting the examination question into the database session ends here 

}

	?>