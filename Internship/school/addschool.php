<?php
    session_start();
	require_once('../database/database.php');
    require_once('../login/setSession.php');
?>
<?php
    $isError = false;
    if(isset($_POST['btn_add'])){
      $codeschool = $_POST['matruong'];
      $nameschool = $_POST['tentruong'];
      $address    = $_POST['diachi'];
      $phone      = $_POST['sdt'];

        if(empty($codeschool) || empty($nameschool) || empty($address) || empty($phone)){
          $loi = "Vui lòng nhập đầy đủ thông tin!";
          $isError = true;
        }else{
          $sqlschool = "SELECT * FROM school WHERE codeschool = '$codeschool'";
          $resultschool = $db->query($sqlschool);
          $total = $db->sum($resultschool);
          if($total > 0){
            $loii = "Mã trường đã tồn tại!";
            $isError = true;
          }else{
            $sqlISschool = "INSERT INTO school (codeschool, nameschool, address, phone, status) 
            VALUES ('$codeschool', '$nameschool', '$address', '$phone', 1)";
            $db->add($sqlISschool);
            echo '<script>alert("Thêm trường thành công thành công"); window.location="../school.php"; </script>';
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

    <title>Add-School</title>

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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../home.php">
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
            <?php
                if($roleID ==1){
            ?>
                     <!-- Heading -->
                    <div class="sidebar-heading">
                        ADMIN
                    </div>

                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                            aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Admin</span>
                        </a>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Manager</h6>
                                <a class="collapse-item" href="../account.php">Account</a>
                            </div>
                        </div>
                    </li>
                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Internship information
                    </div>
                    <!-- Nav Item - Tables -->
                    <li class="nav-item active">
                        <a class="nav-link" href="../school.php">
                            <i class="fas fa-fw fa-table"></i>
                            <span>School</span></a>
                    </li>
                    <!-- Nav Item - INTERNSHIP -->
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
            <?php }else{?>
                        <!-- Heading -->
                    <div class="sidebar-heading">
                        Internship information
                    </div>
                    <!-- Nav Item - Tables -->
                    <li class="nav-item active">
                        <a class="nav-link" href="../school.php">
                            <i class="fas fa-fw fa-table"></i>
                            <span>School</span></a>
                    </li>
                    <!-- Nav Item - INTERNSHIP -->
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
            <?php } ?>
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
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
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables School</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add University</h6>
                        </div>
                            <form method="POST" action="addschool.php">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="inputEmail4">Mã trường</label>
                                    <input type="text" name="matruong" class="form-control" id="inputEmail4" placeholder="Nhập mã trường">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="inputPassword4">Số điện thoại</label>
                                    <input type="number" name="sdt" class="form-control" id="inputPassword4" placeholder="Nhập số điện thoại">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Tên trường</label>
                                    <input type="text" name="tentruong" class="form-control" id="inputAddress" placeholder="Nhập địa tên trường">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Địa chỉ</label>
                                    <input type="text" name="diachi" class="form-control" id="inputAddress" placeholder="Nhập địa chỉ trường">
                                </div>
                                <div class="form-group">
                                    <div style="display: flex; align-items: center;justify-content: center;">
                                        <span style="color: red; font-size:14px;"><?php if(isset($loi)) echo $loi; if(isset($loii)) echo $loii;?>
                                    </div>  
                                </div>
                                <div style="display: flex; align-items: center;justify-content: center;">
                                    <button name="btn_add" style="margin: 0 20px;" type="submit" class="btn btn-primary">Add</button>
                                    <button style="margin: 0 20px;" type="submit" class="btn btn-danger">
                                        <a href="../school.php" style="color: black;">Cancel</a>
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