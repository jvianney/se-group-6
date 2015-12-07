<?php
include_once("adb.php");
class courses extends adb{
	
	function courses(){
	}

//A function to add a course into the db
	function add_course($c_code, $c_title, $c_decrip,
		$c_objective, $c_materials, $year,$dept, $lecturer, $f_intern, $sem, $prereq){
		$str_query="insert into courses set
		course_code='$c_code',
		course_title='$c_title',
		course_description='$c_decrip',
		course_objective='$c_objective',
		course_materials='$c_materials',
		academic_year='$year',
		semester='$sem',
		department='$dept',
		lecturer='$lecturer',
		faculty_intern='$f_intern',
		prerequisites='$prereq'";
		$res=$this->query($str_query);
		if(!$res){
			return false;
		}
		else{
			return true;
		}
	}
	
	//A function to display all the courses from the db
	function view_courses(){
		$str_query="select * from courses";
		return $this->query($str_query);
	}

}

?>