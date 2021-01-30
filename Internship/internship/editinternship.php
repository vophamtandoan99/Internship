<?php
        session_start();
        require_once('../login/setSession.php');
        require_once('../database/database.php');
?>
<?php
    $idinternship        = $_GET['id'];
    $sqlgetinternship    = "SELECT s.codestudy, s.fullname, s.gender, s.address, s.date, cl.nameschool, s.schoolid, s.status, s.img, s.phone FROM internship AS s INNER JOIN school AS cl ON s.schoolid = cl.id WHERE s.id = '$idinternship'";
    $resultgetinternship = $db->getData($sqlgetinternship);

    $mainternship        = $resultgetinternship[0]['codestudy'];
    $hovateninternship   = $resultgetinternship[0]['fullname'];
    $gioitinhinternship  = $resultgetinternship[0]['gender'];
    $diachiinternship    = $resultgetinternship[0]['address'];
    $ngaysinhinternship  = $resultgetinternship[0]['date'];
    $truonginternship    = $resultgetinternship[0]['nameschool'];
    $anhinternship       = $resultgetinternship[0]['img'];
    $sdtinternship       = $resultgetinternship[0]['phone'];
    $trangthaiinternship = $resultgetinternship[0]['status']; 
    $idschool            = $resultgetinternship[0]['schoolid']; 
?>
<?php
    $isError = false;
    if(isset($_POST['btn_edit'])){
        $codeinternship = $_POST['masv'];
        $nameinternship = $_POST['hovaten'];
        $ngaysinh       = $_POST['ngaysinh'];
        $sdt            = $_POST['sdt'];
        $diachi         = $_POST['diachi'];
        $truong         = $_POST['truong'];
        $gioitinh       = $_POST['gioitinh'];
        $anh            = $_FILES['c_img']['name'];
        $trangthai      = $_POST['status'];

        if(empty($codeinternship) || empty($nameinternship) || empty($ngaysinh) || empty($sdt) || empty($diachi) || empty($truong) || empty($gioitinh) || empty($trangthai)){
            $loi = "Vui lòng nhập đầy đủ thông tin";
            $isError = true;
        }else{
            $sqlschoolt     = "SELECT * FROM internship WHERE codestudy = '$codeinternship'";
            $resultschoolt  = $db->query($sqlschoolt);
            $total          = $db->sum($resultschoolt);
            if($codeinternship == $mainternship){
                if(!empty($anh)){
                    $path       = "../upload/";
                    $tmp_name   = $_FILES['c_img']['tmp_name'];
                    $anh        = $_FILES['c_img']['name'];
        
                    move_uploaded_file($tmp_name,$path.$anh);
                    $sqlinternshipupdate = "UPDATE `internship` SET `codestudy` = '$codeinternship',
                        `fullname` = '$nameinternship', `gender` = '$gioitinh', `address` = '$diachi',
                        `date` = '$ngaysinh', `schoolid` = '$truong', `status` = '$trangthai', `img` = '$anh',
                        `phone` = '$sdt' WHERE `internship`.`id` = '$idinternship'";
                    $db->update($sqlinternshipupdate);
                    echo '<script>alert("Cập nhật thực tập sinh thành công."); window.location="../internship.php";</script>';
                }else{
                    $path       = "../upload/";
                    $tmp_name   = $_FILES['c_img']['tmp_name'];
                    $anh        = $_FILES['c_img']['name'];
        
                    move_uploaded_file($tmp_name,$path.$anh);
                    $sqlinternshipupdate = "UPDATE `internship` SET `codestudy` = '$codeinternship',
                        `fullname` = '$nameinternship', `gender` = '$gioitinh', `address` = '$diachi',
                        `date` = '$ngaysinh', `schoolid` = '$truong', `status` = '$trangthai', `img` = '$anhinternship',
                        `phone` = '$sdt' WHERE `internship`.`id` = '$idinternship'";
                    $db->update($sqlinternshipupdate);
                    echo '<script>alert("Cập nhật thực tập sinh thành công."); window.location="../internship.php";</script>';
                }
            }else if($total >0){
                $loii    = "Thực tập sinh này đã tồn tại!";
                $isError = true;
            }else{
                if(!empty($anh)){
                    $path       = "../upload/";
                    $tmp_name   = $_FILES['c_img']['tmp_name'];
                    $anh        = $_FILES['c_img']['name'];
        
                    move_uploaded_file($tmp_name,$path.$anh);
                    $sqlinternshipupdate = "UPDATE `internship` SET `codestudy` = '$codeinternship',
                        `fullname` = '$nameinternship', `gender` = '$gioitinh', `address` = '$diachi',
                        `date` = '$ngaysinh', `schoolid` = '$truong', `status` = '$trangthai', `img` = '$anh',
                        `phone` = '$sdt' WHERE `internship`.`id` = '$idinternship'";
                    $db->update($sqlinternshipupdate);
                    echo '<script>alert("Cập nhật thực tập sinh thành công."); window.location="../internship.php";</script>';
                }else{
                    $path       = "../upload/";
                    $tmp_name   = $_FILES['c_img']['tmp_name'];
                    $anh        = $_FILES['c_img']['name'];
        
                    move_uploaded_file($tmp_name,$path.$anh);
                    $sqlinternshipupdate = "UPDATE `internship` SET `codestudy` = '$codeinternship',
                        `fullname` = '$nameinternship', `gender` = '$gioitinh', `address` = '$diachi',
                        `date` = '$ngaysinh', `schoolid` = '$truong', `status` = '$trangthai', `img` = '$anhinternship',
                        `phone` = '$sdt' WHERE `internship`.`id` = '$idinternship'";
                    $db->update($sqlinternshipupdate);
                    echo '<script>alert("Cập nhật thực tập sinh thành công."); window.location="../internship.php";</script>';
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

    <title>Edit-Internship</title>

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
            <?php if($roleID ==1){?>
                <!-- Divider -->
                    <hr class="sidebar-divider">
                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Admin
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
                    <li class="nav-item">
                        <a class="nav-link" href="../school.php">
                            <i class="fas fa-fw fa-table"></i>
                            <span>School</span></a>
                    </li>
                    <!-- Nav Item - INTERNSHIP -->
                    <li class="nav-item active">
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
                <!-- End of Sidebar -->
            <?php }else{ ?>
                     <!-- Divider -->
                     <hr class="sidebar-divider">
                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Internship information
                    </div>
                    <li class="nav-item">
                        <a class="nav-link" href="../school.php">
                            <i class="fas fa-fw fa-table"></i>
                            <span>School</span></a>
                    </li>
                    <!-- Nav Item - INTERNSHIP -->
                    <li class="nav-item active">
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
                <!-- End of Sidebar -->
            <?php } ?>
            <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
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
            <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables Internship</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Internship</h6>
                        </div>
                            <form action="" method="POST"  enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                        <label for="inputEmail4">Mã thực tập sinh</label>
                                        <input type="text" name="masv" class="form-control" id="inputEmail4" placeholder="Nhập mã thực tập sinh" value="<?php echo $mainternship;?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label for="inputPassword4">Họ và tên</label>
                                            <input type="text" name="hovaten" class="form-control" id="inputPassword4" placeholder="Nhập họ và tên" value="<?php echo $hovateninternship;?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Ngày sinh</label>
                                            <input type="date" name="ngaysinh" class="form-control" id="inputPassword4" placeholder="Chọn ngày tháng năm sinh" value="<?php echo $ngaysinhinternship;?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Số điện thoại</label>
                                            <input type="number" name="sdt" class="form-control" id="inputPassword4" placeholder="Nhập số điện thoại" value="<?php echo "0".$sdtinternship;?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress">Địa chỉ</label>
                                        <input type="text" name="diachi" class="form-control" id="inputAddress" placeholder="Nhập địa địa chỉ" value="<?php echo $diachiinternship;?>">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <!-- <label for="inputAddress">Trường</label> -->
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Trường</label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="truong">
                                                <?php
                                                    $sqldataschool = "SELECT * FROM school WHERE status = 1";
                                                    $resultschool = $db->getData($sqldataschool);
                                                    foreach($resultschool as $row){
                                                ?>
                                                    <option value="<?php echo $row['id'];?>"
                                                    <?php if($row['id'] == $idschool){echo "selected";}?>>
                                                    <?php echo $row['nameschool'];?></option>
                                                <?php } ?> 
                                                </select>
                                              
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <fieldset class="form-group">
                                                <div class="row">
                                                    <legend class="col-form-label col-sm-2 pt-0">Giới tính</legend>
                                                    <div class="col-sm-10">
                                                        <?php 
                                                            if($gioitinhinternship == 1){
                                                        ?>
                                                            <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="gioitinh" id="gridRadios1" value="1" checked>
                                                            <label class="form-check-label" for="gridRadios1">
                                                                Nam
                                                            </label>
                                                            </div>
                                                            <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="gioitinh" id="gridRadios2" value="2">
                                                            <label class="form-check-label" for="gridRadios2">
                                                                Nữ
                                                            </label>
                                                            </div>
                                                            <div class="form-check disabled">
                                                            <input name="gioitinh" class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
                                                            <label class="form-check-label" for="gridRadios3">
                                                                Khác
                                                            </label>
                                                            </div>
                                                        <?php }else{?>  
                                                            <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="gioitinh" id="gridRadios1" value="1">
                                                            <label class="form-check-label" for="gridRadios1">
                                                                Nam
                                                            </label>
                                                            </div>
                                                            <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="gioitinh" id="gridRadios2" value="2" checked>
                                                            <label class="form-check-label" for="gridRadios2">
                                                                Nữ
                                                            </label>
                                                            </div>
                                                            <div class="form-check disabled">
                                                            <input name="gioitinh" class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
                                                            <label class="form-check-label" for="gridRadios3">
                                                                Khác
                                                            </label>
                                                            </div>
                                                        <?php }?>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleFormControlFile1">Hình ảnh</label>
                                            <input name="c_img" type="file" class="form-control-file" id="exampleFormControlFile1" value="<?php echo $anhinternship;?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4"><img style="width: 80px; height:100px;" src="../upload/<?php echo $anhinternship;?>" alt=""></label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                            <label for="inputState">Trạng thái</label>
                                            <select id="inputState" class="form-control" name="status">
                                                <?php if($trangthaiinternship == 1){?>
                                                    <option value="1">Đang thực tập</option>
                                                    <option value="2">Đã hoàn thành</option>
                                                <?php }else{ ?>
                                                    <option value="2">Đã hoàn thành</option>
                                                    <option value="1">Đang thực tập</option>
                                                <?php } ?>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <div style="display: flex; align-items: center;justify-content: center;">
                                            <span style="color: red; font-size:14px;"><?php if(isset($loi)) echo $loi; if(isset($loii)) echo $loii; if(isset($loiii)) echo $loiii;?>
                                        </div>  
                                    </div>
                                    <div style="display: flex; align-items: center;justify-content: center;">
                                        <button name="btn_edit" style="margin: 0 20px;" type="submit" class="btn btn-primary">Edit</button>
                                        <button style="margin: 0 20px;" type="submit" class="btn btn-danger">
                                            <a href="../internship.php" style="color: black;">Cancel</a>
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