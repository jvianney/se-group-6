
<?php

include("adb.php");

class Courses extends adb{
         /*This is the courses class. it has the updatecourse function which takses in  details of the course as parameters */ 
         /*updateCourse()-this function takes the parameter below to update a particular course*/
         /*@param $obj- is an object of the courses class
		  @param $code-this is a unique code of a of a particular course
		  @param $title-this is the title of the course
		  @param $semester-this is the semester in which the courses are offered
		  @param $lecturer-this is the name of the lecturer that teachs the course
		  @param $facultyIntern-this the faculty intern for the course
		  @param $objective-this is the objective of the courses
		  @param $courseMaterials- this are the reading materials for the course
          @param $description- this is the description of the course that is being offered
          @param $academicYear- this refers to the academic year in which the course is offered
          @param $prerequisites-these are the courses that must be taken before this particular course can be done by a student
          @param $department this is the department that handles this particular course 		  
		*/

	function updateCourse($code, $title,$department,$academicYear,$lecturer, $facultyIntern,$prerequisites,$semester,$description,$objective,$courseMaterials
	   ){
	   $insert="update  courses set course_code='$code',course_description='$description',course_materials='$courseMaterials',
       course_objective='$objective',	prerequisites='$prerequisites',lecturer='$lecturer',faculty_intern='$facultyIntern',department='$department',
       semester='$semester',academic_year='$academicYear'	where course_title='$title'";
	//echo $insert;
	  if(!$this->query($insert).mysql_error()){
	  echo "not successfully submitted";
	  echo mysql_error() ;
	//echo $insert;
	
	}}
	/*The display() course method displays the details of a course*/
	function displayCourse(){
		$str_query="select * from courses ";
		if(!$this->query($str_query)){
			return false;
		}	
		return $this->fetch();
		
	}
	/*the SignUp() takes in the following parameters to add a user to the system.
	@param $firstName- this is the first name of the user
	@param $surname - this takes in the surname of the user
	@param $password-this is the password of the user
	@param $email-this is the email that the user will use to sign up for verification*/
	function signUp($firstName,$surname,$password,$email){
	$insert="insert into signUp set first='$firstName',surname='$surname',password='$password',email='$email'";
	if(!$this->query($insert)){
	echo "not successfully inserted";
	}
	}
	/*this login() function takes parameters to give the user access to the system
	@param $email-this is the email that the user will use to login
	@param $password-this is the password that the use will use to login*/
	function login($email,$password){
	$login="select * from login where email='$email'AND password='$password'";
	if(!$this->query($login)){
	return false;
	}
	return $this->fetch();
	}
	}

?>