<?php
    include_once("../models/courses.php");
    
    if (!isset($_REQUEST['cmd'])){
        echo '{"result" : 0, "message" : "Command Not Set"}';
    }
?>