<?php
    session_start();
    $log = "../index.php";
    unset($_SESSION['users']);
    session_destroy();
	header("location: {$log}");
 ?>