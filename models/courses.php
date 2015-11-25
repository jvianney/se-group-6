<?php
    include_once ("adb.php");

    class courses extends adb {
        
        function searchCourseByName($searchText) {
            $queryText = "SELECT * FROM courses where course_title like '%$searchText%'"
            if (!$this->query($queryText)){
                return false;
            }
            return true;
        }
    }
?>