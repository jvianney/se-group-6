

<?php

/**
	 *@author Emmanuel Nii Tackie <emmanuel.tackie@ashesi.edu.gh.com>
	 *@version 2 
	 */

include_once ("adb.php");

class deleteCourse extends adb{



/**
	*This method deletes course from the repository 
	*
	*@param int $id Identification number of the course to be deleted
	*
	*/
    
function viewCourse(){
  $query="select * from courses";
 $result=$this->query($query).mysql_error();
    return $result;
    
}    
    
    
function deleteACourse($id){

    $str_query="delete from courses where course_id=$id";
    return $this->query($str_query)
    //header("location:deleteview.php");
    
}
}


	




 /**checking the deleteCourse method
$a= new course();
$id= 1;
$a->deleteCourse($id);
*/

//
//if(!$this->query($str_query)){
//			return false;
//		}	
//		return $this->fetch();
//		
//	}


