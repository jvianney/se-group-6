  
<?php

if(isset($_REQUEST['cmd'])){
    $cmd = $_REQUEST['cmd'];
    
    switch($cmd){
            
        case 1:
            getCourses();
            break;
        case 2:
            deleteCourse();
            break;
    }
}
			

function getCourses(){

    include("deleteCourse.php"); 
    
    $obj = new deleteCourse();
    $obj->viewCourse();


    echo '{"result":1, "courses":[';
    $row = $obj->fetch();
    while($row){
        echo json_encode($row);
        if( $row = $obj->fetch()){
            echo ',';
        }
    }
    echo ']}';
}

    
function deleteCourse(){
    if(isset($_REQUEST['id'])){
        include("deleteCourse.php"); 
        $id=$_REQUEST['id'];
    
        $obj = new deleteCourse();
    
        if($obj->deleteACourse($id)){
            echo '{"result":1, "message": "deleted"}';
        }else{
            echo '{"result":0, "message": "unsuccesful query"}';
        }
    }
}    

?>		
