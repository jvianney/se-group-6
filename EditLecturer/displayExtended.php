<?php
/**
* 
* @var 
* 
*/
if(isset($_REQUEST['c_id'])){
				include("lecturers.php");
				//create object of lecturers 
				$obj=new lecturers();
				
				$row=$obj->view_lecturers();
				
				
				$result=$obj->view_lecturers($lecid);
				if(!$result){
					echo '{"result": 0, "message": "Error displaying lecturers"}'; 
					return;
				}else{
					echo '{"result": 1, "message": "Displaying lecturers"}';
					return;
				}
			}			
?>