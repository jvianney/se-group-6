<?php
/**
* 
*/
include_once("adb.php");
/**
* 
*/
class lecturers extends adb{
	
	function lecturers(){
	}
    
    /**
	* A function to edit a lecturer
	* @param integer $lect_id
	* @param string $lect_fname
	* @param string $lect_lname
	* @param string $lect_off_hrs
	* @param string $dept
	* @param string $lect_course
	* 
	* @return
	*/
	function edit_lecturer($lect_id, $lect_fname, $lect_lname,
		$lect_off_hrs, $dept, $lect_course){
		$str_query="update lecturers set
		lecturer_fname = '$lect_fname',
		lecturer_lname = '$lect_lname',
		lecturer_office_hrs = '$lect_off_hrs',
		department = '$dept',
		lecturer_course = '$lect_course' 
		where lecturer_id = '$lect_id'";
		return $this->query($str_query);
	}
	
	/**
	* 
	* A function to display all lecturers
	* @return
	*/
	function view_lecturers(){
		$str_query="select * from lecturers";
		return $this->query($str_query);
	}
	
	/**
	* 
	* @param string $lid A lecturers id
	* A function to get the id of a lecturer
	* @return Lecturer's id
	*/
	function get_lecturer($lid){
		$str_query="select * from lecturers where lecturer_id='$lid'";
		return $this->query($str_query);
	}
}
?>