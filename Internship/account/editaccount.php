<?php
        session_start();
        require_once('../login/setSession.php');
        require_once('../database/database.php');
?>
<?php
    $id = $_GET['id'];
	$sqlaccount = "SELECT * FROM users WHERE id = '$id'";
	$resultaccount = $db->getData($sqlaccount);
    $total = count($resultaccount);
    
    $userr = $resultaccount[0]['username'];
    $passs = $resultaccount[0]['password'];
    $namee = $resultaccount[0]['fullname'];
    $anhh = $resultaccount[0]['img'];
    $roleidd = $resultaccount[0]['roleid'];
    $statusss = $resultaccount[0]['status'];
?>
<?php
    $errro = false;
	if(isset($_POST['edit_account'])){
        $userrr		= $_POST['tendangnhap'];
        $passs		= $_POST['matkhau'];
        $fullnameh	= $_POST['hovaten'];
		$role		= $_POST['role'];
		$anh		= $_FILES['c_img']['name'];
		$status		= $_POST['status'];
		
		if(empty($userrr)||empty($passs)||empty($fullnameh)||empty($role)||empty($status)){
			$loi 	= "Vui lòng nhập đầy đủ thông tin!";
			$errro	= true;
		}else{
			$sqlcheckuser	= "SELECT * FROM users WHERE username = '$userrr'";
			$reusultcheck	= $db->query($sqlcheckuser);
			$totalcheck		= mysqli_num_rows($reusultcheck);
			if($userrr == $userr){
				if($anh != null){
                    $path		= "../upload/";
                    $tmp_name	= $_FILES['c_img']['tmp_name'];
                    $anh		= $_FILES['c_img']['name'];
                    move_uploaded_file($tmp_name,$path.$anh);
                    $sqlUPaccount = "UPDATE users SET username='$userrr',password='$passs',fullname='$fullnameh',
                    roleid='$role',status='$status',img='$anh' WHERE id = '$id'";
                    $db->query($sqlUPaccount);
                    echo '<script>alert("Sửa account thành công!"); window.location="../account.php";</script>';
                }else{
                    $path		= "../upload/";
                    $tmp_name	= $_FILES['c_img']['tmp_name'];
                    $anh		= $_FILES['c_img']['name'];
                    move_uploaded_file($tmp_name,$path.$anh);
                    $sqlUPaccount = "UPDATE users SET username='$userrr',password='$passs',fullname='$fullnameh',
                    roleid='$role',status='$status',img='$anhh' WHERE id = '$id'";
                    $db->query($sqlUPaccount);
                    echo '<script>alert("Sửa account thành công!"); window.location="../account.php";</script>';
                }
			}elseif($totalcheck >0){
				$loii	= "Tài khoản đã tồn tại!";
				$errro	= true;
			}else{
                if($anh != null){
                    $path		= "../upload/";
                    $tmp_name	= $_FILES['c_img']['tmp_name'];
                    $anh		= $_FILES['c_img']['name'];
                    move_uploaded_file($tmp_name,$path.$anh);
                    $sqlUPaccount = "UPDATE users SET username ='$userrr',password ='$passs',fullname ='$fullnameh',
                                    roleid   ='$role',status   ='$status',img      ='$anh' WHERE id = '$id'";
                    $db->query($sqlUPaccount);
                    echo '<script>alert("Sửa account thành công!"); window.location="../account.php";</script>';
                }else{
                    $path		= "../upload/";
                    $tmp_name	= $_FILES['c_img']['tmp_name'];
                    $anh		= $_FILES['c_img']['name'];
                    move_uploaded_file($tmp_name,$path.$anh);
                    $sqlUPaccount = "UPDATE users SET username='$userrr',password='$passs',fullname='$fullnameh',
                    roleid='$role',status='$status',img='$anhh' WHERE id = '$id'";
                    $db->query($sqlUPaccount);
                    echo '<script>alert("Sửa account thành công!"); window.location="../account.php";</script>';
                }
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Edit-Account</title>
    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">VPTD Admin <sup>2</sup></div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="../home.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Admin
            </div>
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Admin</span>
                </a>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manager</h6>
                        <a class="collapse-item active" href="../account.php">Account</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Internship information
            </div>
            <li class="nav-item">
                <a class="nav-link" href="../school.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>School</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../internship.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Internship</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $fullname;?></span>
                                <img class="img-profile rounded-circle"
                                    src="../upload/<?php echo $image;?>">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    <?php echo $username;?>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Tables Account</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Account</h6>
                        </div>
                            <form action="" method="POST"  enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                        <label for="inputEmail4">Tên đăng nhập</label>
                                        <input type="text" name="tendangnhap" class="form-control" id="inputEmail4" placeholder="@ Nhập tên đăng nhập" value="<?php echo $userr;?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label for="inputPassword4">Mật khẩu</label>
                                            <input type="password" name="matkhau" class="form-control" id="inputPassword4" placeholder="Nhập mật khẩu" value="<?php echo $passs;?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                       
                                            <label for="inputPassword4">Họ và tên</label>
                                            <input type="text" name="hovaten" class="form-control" id="inputPassword4" placeholder="Nhập họ và tên" value="<?php echo $namee;?>">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Phân quyền</label>
                                                        <select class="form-control" id="exampleFormControlSelect1" name="role">
                                                        <?php
                                                            $sqlrole = "SELECT * FROM role";
                                                            $resultrole = $db->getData($sqlrole);
                                                            foreach($resultrole as $rowrole){
                                                        ?>
                                                            <option value="<?php echo $rowrole['id'];?>"
                                                            <?php if($rowrole['id'] == $roleidd){echo "selected";}?>>
                                                            <?php echo $rowrole['name'];?></option>
                                                        <?php } ?> 
                                                        </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="form-group">
                                            <label for="inputState">Trạng thái</label>
                                                <select id="inputState" class="form-control" name="status">
                                                    <?php if($statusss == 1){?>
                                                        <option value="1">Đang hoạt động</option>
                                                        <option value="2">Ngừng hoạt động</option>
                                                    <?php }else{ ?>
                                                        <option value="2">Ngừng hoạt động</option>
                                                        <option value="1">Đang hoạt động</option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                                <label for="exampleFormControlFile1">Hình ảnh</label>
                                                <input name="c_img" type="file" class="form-control-file" id="exampleFormControlFile1">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4"><img style="width: 100px; height:100px;" src="../upload/<?php echo $anhh;?>" alt=""></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div style="display: flex; align-items: center;justify-content: center;">
                                            <span style="color: red; font-size:14px;"><?php if(isset($loi)) echo $loi; if(isset($loii)) echo $loii;?>
                                        </div>  
                                    </div>
                                    <div style="display: flex; align-items: center;justify-content: center;">
                                        <button name="edit_account" style="margin: 0 20px;" type="submit" class="btn btn-primary">Edit</button>
                                        <button style="margin: 0 20px;" type="submit" class="btn btn-danger">
                                            <a href="../account.php" style="color: black;">Cancel</a>
                                        </button>
                                    </div>                              
                            </form>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../login/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>