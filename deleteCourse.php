

<?php


include_once ("adb.php");

class deleteCourse extends adb{




function viewCourse(){
  $query="select * from courses";
 $result=$this->query($query).mysql_error();
    return $result;
    
}    
        
  /**
	*This method deletes course from the repository 
	*
	*@param int $id Identification number of the course to be deleted
	*
	*/
      
function deleteACourse($id){

    function deleteACourse($id){
$str_query="delete from courses where course_id=$id";
return $this->query($str_query);	
}
    //header("location:deleteview.php");
    
}
}

?>

