
<?php

$cmd=$_REQUEST['cmd'];
switch($cmd)
{
		case 1:
		update();
		break;
		case 2;
		viewCourse();
		break;
		case 3;
		signUp();
		break;
	   case 4;
	   login();
	   break;   
		
		}
		/* The update() responds to an ajax request to update the details of a particular course. it takes parameters such as*/
		/**@param $obj- is an object of the courses class
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
		**/
	
		function update(){
		  include("add_course.php");
		  $obj=new Courses();
		  $code=$_REQUEST['code'];
		  $title=$_REQUEST['title'];
	      $semester=$_GET['semester'];
	      $lecturer=$_GET['lecturer'];
		  $facultyIntern=$_GET['faculty_intern'];
		  $objective=$_GET['objective'];
		  $courseMaterials=$_GET['course_material'];
		  $description=$_GET['description'];
		  $academicYear=$_GET['academic_year'];
		  $prerequisites=$_GET['prerequisites'];
		  $department=$_GET['department'];
	    /*Obj is an object of the courses class that calls the updateCourse method*/
		 $row=$obj->updateCourse($code,$title,$department,$academicYear,$lecturer,$facultyIntern,
		 $prerequisites,$semester,$description,$objective,$courseMaterials);
		}
		/*the viewCourse() responds to an ajax request to display the details of the course. the details are displayed in a jason format*/
		
		function viewCourse(){
		  include("add_course.php");
		  $obj=new Courses();
		  $row=$obj->displayCourse();
		if(!$row){
        echo '{"result": 0, "message": "You have no course in the database"}';
        return;
         }
        echo '{"result": 1, "message": [';
        while($row){
        echo json_encode($row);
        $row = $obj->fetch();
        if($row){
            echo ',';
        }
    }
     echo "]}";
    return;
}
    /*the signUp() responds to an ajax request to add a user to the system*/
    function signUp(){
	include("add_course.php");
	$first=$_GET['firstName'];
	$surname=$_GET['surname'];
	$email=$_GET['email'];
	$password=$_GET['password'];
	$row=$obj->signUp($first,$surname,$email,$password);
	
	
	}
	/*the login() responds to an ajax request to login a user into the system*/
	function login(){
		  include("add_course.php");
		  $obj=new Courses();
		  $email=$_GET['email'];
		  $password=$_GET['password'];
		  $row=$obj->login($email,$password);
		if(!$row){
		echo mysql_error();
        echo '{"result": 0, "message": "You are not  in the database"}';
        return;
         }
        echo '{"result": 1, "message": [';
        while($row){
        echo json_encode($row);
        $row = $obj->fetch();
        if($row){
            echo ',';
        }
    }
     echo "]}";
    return;
}
		/* if ($row=$obj->displayCourse())
		{
			echo '{"result":1, "message":[';
		    while ($row)
		{
		 echo json_encode($row);
			
			 $row = $obj->fetch (); 
			if ($row){
				echo ",";
			}
		}
			echo "]}";
		}
		else{
		echo '{"result":1, "message":"not display"}';
		} 
		}*/
    




?>