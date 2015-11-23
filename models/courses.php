<?php
    include_once ("adb.php");

    class courses extends adb {
        
        function searchCourseByName($searchText) {
            $queryText = "SELECT * FROM courses where course_title like '%$searchText'"
            if (!$this->query($queryText)){
                echo '{"result": 0, "message": "Error Occured While Searching For Course'.mysql_error().'"}';
            }
        }
    }
?>