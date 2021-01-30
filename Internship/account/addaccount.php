<?php
        session_start();
        require_once('../login/setSession.php');
        require_once('../database/database.php');
?>
<?php
    $isError = false;
    if(isset($_POST['btn_add'])){
      $user     = $_POST['tendangnhap'];
      $pass     = $_POST['matkhau'];
      $fist     = $_POST['ho'];
      $name     = $_POST['ten'];
      $role     = $_POST['role'];
      $anh      = $_FILES['c_img']['name']; 


        if(empty($user) || empty($pass) || empty($fist) || empty($name) || empty($role)){
          $loi = "Vui lòng nhập đầy đủ thông tin!";
          $isError = true;
        }else{
            $sqlusers    = "SELECT * FROM users WHERE username = '$user'";
            $resultusers = $db->query($sqlusers);
            $total       = $db->sum($resultusers);
            if($total > 0){
              $loii      = "Tài khoản đã tồn tại!";
              $isError   = true;
            }else{
              if(!empty($anh)){
                  $path     = "../upload/";
                  $tmp_name = $_FILES['c_img']['tmp_name'];
                  $anh      = $_FILES['c_img']['name'];
  
                  move_uploaded_file($tmp_name,$path.$anh);
                  $full     = $fist." ".$name;
                $sqlISinternship = "INSERT INTO users (username, fullname, password, roleid, img, status) 
                VALUES ('$user', '$full', '$pass', '$role', '$anh', '1')";
                $db->add($sqlISinternship);
                echo '<script>alert("Thêm tài khoản thành công."); window.location="../account.php"; </script>';
              }else{
                  $loiii    = "Vui lòng chọn ảnh!";
                  $isError  = true;
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
    <title>Add-account</title>
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
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">VPTD Admin <sup>2</sup></div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../home.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Admin
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
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
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Internship information
            </div>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="../school.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>School</span></a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="../internship.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Internship</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $fullname;?></span>
                                <img class="img-profile rounded-circle"
                                    src="../upload/<?php echo $image;?>">
                            </a>
                            <!-- Dropdown - User Information -->
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
                            <h6 class="m-0 font-weight-bold text-primary">Add Account</h6>
                        </div>
                            <form action="" method="POST"  enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                        <label for="inputEmail4">Tên đăng nhập</label>
                                        <input type="text" name="tendangnhap" class="form-control" id="inputEmail4" placeholder="@ Nhập tên đăng nhập">
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label for="inputPassword4">Mật khẩu</label>
                                            <input type="password" name="matkhau" class="form-control" id="inputPassword4" placeholder="Nhập mật khẩu">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Họ</label>
                                            <input type="text" name="ho" class="form-control" id="inputPassword4" placeholder="Nhập họ">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Tên</label>
                                            <input type="text" name="ten" class="form-control" id="inputPassword4" placeholder="Nhập tên">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Phân quyền</label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="role">
                                                <option value="0">---Chọn quyền---</option>
                                                <?php
                                                    $sqlrole = "SELECT * FROM role";
                                                    $resultrole = $db->getData($sqlrole);
                                                    foreach($resultrole as $rowrole){
                                                ?>
                                                <option value="<?php echo $rowrole['id'];?>"><?php echo $rowrole['name'];?></option>
                                                <?php } ?> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Hình ảnh</label>
                                            <input name="c_img" type="file" class="form-control-file" id="exampleFormControlFile1">
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div style="display: flex; align-items: center;justify-content: center;">
                                            <span style="color: red; font-size:14px;"><?php if(isset($loi)) echo $loi; if(isset($loii)) echo $loii; if(isset($loiii)) echo $loiii;?>
                                        </div>  
                                    </div>
                                    <div style="display: flex; align-items: center;justify-content: center;">
                                        <button name="btn_add" style="margin: 0 20px;" type="submit" class="btn btn-primary">Add</button>
                                        <button style="margin: 0 20px;" type="submit" class="btn btn-danger">
                                            <a href="../account.php" style="color: black;">Cancel</a>
                                        </button>
                                        <button style="margin: 0 20px;"type="reset" class="btn btn-secondary">Reset</button>
                                    </div>                              
                            </form>
                    </div>
                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>

        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
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
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../js/demo/datatables-demo.js"></script>
</body>
</html>