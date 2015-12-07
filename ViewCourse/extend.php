<?php
include("courses.php");
class extendedCourse extends courses{
	function setCourse(){
			if(isset($_REQUEST['cd'])){
				//include("courses.php");
				//create object of project_users 
				//$obj=new courses();
				
				$c_code=$_REQUEST['cd'];
				$c_title=$_REQUEST['ct'];
				$c_decrip=$_REQUEST['cdes'];
				$c_objective=$_REQUEST['co'];
				$c_materials=$_REQUEST['cm'];
				$year=$_REQUEST['cy'];
				$dept=$_REQUEST['dept'];
				$Lecturer=$_REQUEST['cl'];
				$f_intern=$_REQUEST['cfi'];
				$sem=$_REQUEST['cs'];
				$prereq=$_REQUEST['pc'];
				
			
				if(!$this->add_course($c_code, $c_title, $c_decrip,
		$c_objective, $c_materials, $year,$dept, $Lecturer, $f_intern, $sem, $prereq))
				{
					echo '{"result": 0, "message": "Error adding"}'; 
					return;
				}else{
					echo '{"result": 1, "message": "$c_title added into the db"}';
					return;
				}
			}
			}
			
			function viewCourses(){
				if(!$this->view_courses()){
					echo "Failed to fetch ".mysql_error();
					return;
				}
				echo '{"result":1,"course":[';
				$row=$this->fetch();
				while($row){
					echo json_encode($row);
					$row=$this->fetch();
					if($row){
						echo ",";
					}
				}echo "]}";
			}
			}
			
			$mycourse=new extendedCourse();
			if(isset($_REQUEST['cmd'])){
				$cmd=$_REQUEST['cmd'];
				switch($cmd){
					case 1:
					$mycourse->setCourse();
					break;
					case 2:
					$mycourse->viewCourses();
					break;
				}
			}
						
		?>