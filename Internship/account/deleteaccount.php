<?php
    session_start();
    require_once('../login/setSession.php');
    require_once('../database/database.php');
?>
<?php
    $id    = $_GET['id'];
    if($id == $ibb){
        echo '<script>alert("Tài khoản đang đăng nhập không thể xóa!"); window.location="../account.php"; </script>';
    }else{
        $table = "users";
        $db->delete($table, $id);
        header('Location: ../account.php');
    }
?>