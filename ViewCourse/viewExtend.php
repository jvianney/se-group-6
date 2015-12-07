<?php
if(isset($_REQUEST['c_id'])){
				include("courses.php");
				//create object of project_users 
				$obj=new courses();
				
				$row=$obj->view_courses();
				
				
				$result=$obj->view_courses($c_id);
				if(!$result){
					echo '{"result": 0, "message": "Error displaying courses"}'; 
					return;
				}else{
					echo '{"result": 1, "message": "Displaying courses"}';
					return;
				}
			}			
?>