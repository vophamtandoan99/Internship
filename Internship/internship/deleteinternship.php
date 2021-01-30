<?php 
    require_once('../database/database.php');
    $table = "internship";
    $id    = $_GET['id'];
    $db->delete($table, $id);
    header('Location: ../internship.php');
?>