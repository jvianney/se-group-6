<?php
/**
* 
*/
include("lecturers.php");
/**
* 
*/
class extendedLecturer extends lecturers{
	/**
	* 
	* 
	* @return
	*/
	function setLecturer(){
			if(isset($_REQUEST['lecid'])){
					
				$lect_id=$_REQUEST['lecid'];
				$lect_fname=$_REQUEST['lfn'];
				$lect_lname=$_REQUEST['lln'];
				$lect_off_hrs=$_REQUEST['ohrs'];
				$dept=$_REQUEST['k'];
				$lect_course=$_REQUEST['ct'];
					
				if(!$this->edit_lecturer($lect_id, $lect_fname, $lect_lname,
		$lect_off_hrs, $dept, $lect_course))
				{
					echo '{"result": 0, "message": "Error editing"}'; 
					return;
				}else{
					echo '{"result": 1, "message": "Lecturer successfully edited"}';
					return;
				}
			}
		}
		/**
		* 
		* 
		* @return
		*/
			function displayLecturers(){
				if(!$this->view_lecturers()){
					echo '{"result": 0, "mesage": "Failed to fetch"}';
					return;
				}else{
				
				echo '{"result":1,"lecturer":[';
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
			
			/**
			* 
			* 
			* @return
			*/
			function get_reference(){
				if (isset($_REQUEST['lid'])){
					$lid=$_REQUEST['lid'];
					if(!$this->get_lecturer($lid)){
						echo '{"result": 0, "message": "ID does not exist"}';
						return;
					}else{
						echo '{"result":1,"lecturer":[';
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
				else{
					
					echo '{"result": 0, "message": "ID not found"}';
					return;
				}
			}
		}
			/**
			* 
			* @var 
			* 
			*/
			$mylecturer=new extendedLecturer();
			if(isset($_REQUEST['cmd'])){
				$cmd=$_REQUEST['cmd'];
				switch($cmd){
					case 1:
					$mylecturer->setLecturer();
					break;
					case 2:
					$mylecturer->displayLecturers();
					break;
					case 3;
					$mylecturer->get_reference();
					break;
				}
			}
?>