<?php
    if(isset($_SESSION["users"])){
            $ibb        =  $_SESSION['users']['id'];
            $fullname   =  $_SESSION['users']['fullname'];
            $username   =  $_SESSION['users']['username'];
            $statusSS   =  $_SESSION['users']['status'];
            $image      =  $_SESSION['users']['img'];
            $roleID     =  $_SESSION['users']['roleid'];
    }else{
            header('Location: ../404.php');
            exit;
    }
?>