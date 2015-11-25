<?php
    include_once("../models/courses.php");
    
//    if (!isset($_REQUEST['cmd'])){
//        echo '{"result" : 0, "message" : "Command Not Set"}';
//        exit();
//    }
    
    $cmd = $_REQUEST['cmd'];
    switch($cmd) {
        case 1 :
            if (!isset($_REQUEST['st'])){
                echo '{"result" : 0, "message" : "Parameter Not Set"}';
            } else {
                searchCourseByName($_REQUEST['st']);
            }
            break;
            
        default :
            echo '{"result" : 0, "message" : "Incorrect Command"}';
            break;
    }

    function searchCourseByName($searchText) {
        $course = new courses();
        if (!$course->searchCourseByName($searchText)){
            echo '{"result": 0, "message": "Error Occured While Searching For Course'.mysql_error().'"}';
            return;
        }
        
        $row = $course->fetch();
        echo '{"result" : 1, "message" : [';
        
        while ($row){
            echo json_encode($row);
            if($row){
                echo ",";
            }
        }
        echo ']}';
        return;
    }
?>