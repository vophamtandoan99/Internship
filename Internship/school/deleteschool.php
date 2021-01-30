<?php 
    require_once('../database/database.php');
    $sqlUPSchool = "UPDATE school SET status=2 WHERE id = '$_GET[id]'";
    $db->update($sqlUPSchool);
    header('Location: ../school.php');
?>