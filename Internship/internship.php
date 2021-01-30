<?php
    session_start();
	require_once('./database/database.php');
    require_once('./login/null.php');
?>
<?php
	$sqlinternship = "SELECT sv.id, sv.codestudy, sv.fullname, sv.gender, sv.address, sv.date,
    sv.phone, sv.img, scl.nameschool, sv.status FROM internship AS sv 
    INNER JOIN school AS scl ON sv.schoolid = scl.id WHERE sv.status = 1";
	$resultinternship = $db->getData($sqlinternship);
	$total = count($resultinternship); 
?>
<?php
	if(isset($_POST['btn_timkiem'])){
		$search = $_POST['timkiem'];
		if(empty($search)){
			$sqlinternship = "SELECT sv.id, sv.codestudy, sv.fullname, sv.gender, sv.address, sv.date,
            sv.phone, sv.img, scl.nameschool, sv.status FROM internship AS sv 
            INNER JOIN school AS scl ON sv.schoolid = scl.id";
			$resultinternship = $db->getData($sqlinternship);
		}else if(!empty($search)){
			$sqlinternship = "SELECT sv.id, sv.codestudy, sv.fullname, sv.gender, sv.address, sv.date,
            sv.phone, sv.img, scl.nameschool, sv.status FROM internship AS sv 
            INNER JOIN school AS scl ON sv.schoolid = scl.id WHERE sv.fullname LIKE '%$search%'";
			$resultinternship = $db->getData($sqlinternship);
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

    <title>Internship - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Vptd Admin<sup> 2</sup></div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="home.php">
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
                                <a class="collapse-item" href="account.php">Account</a>
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
                        <a class="nav-link" href="school.php">
                            <i class="fas fa-fw fa-table"></i>
                            <span>School</span></a>
                    </li>
                    <!-- Nav Item - INTERNSHIP -->
                    <li class="nav-item active">
                        <a class="nav-link" href="internship.php">
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
                        <a class="nav-link" href="school.php">
                            <i class="fas fa-fw fa-table"></i>
                            <span>School</span></a>
                    </li>
                    <!-- Nav Item - INTERNSHIP -->
                    <li class="nav-item active">
                        <a class="nav-link" href="internship.php">
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

               <!-- Topbar -->
               <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <form method="POST" action=""
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input name="timkiem" type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button type="submit" name="btn_timkiem" class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                    <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $fullname;?></span>
                                <img class="img-profile rounded-circle"
                                    src="./upload/<?php echo $image;?>">
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
                    <h1 class="h3 mb-2 text-gray-800">Tables Internship</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List Of Internship</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Fullname</th>
                                            <th>School's name</th>
                                            <th>Picture</th>
                                            <th>Status</th>
                                            <th>
                                                <a href="./internship/addinternship.php"><button class="btn btn-secondary" type="button" data-dismiss="modal" style="background-color: mediumseagreen;">Add</button></a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Code</th>
                                            <th>Fullname</th>
                                            <th>School's name</th>
                                            <th>Picture</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            foreach($resultinternship as $rowinternship){
                                        ?>
                                        <tr>
                                            <td><?php echo $rowinternship['codestudy'];?></td>
                                            <td><?php echo $rowinternship['fullname'];?></td>
                                            <td><?php echo $rowinternship['nameschool'];?></td>
                                            <td><img style="width: 50px; height:50px;" src="./upload/<?php echo $rowinternship['img'];?>"></td>
                                            <?php 
                                                $statuss = $rowinternship['status'];
                                                if($statuss == 1){?>
                                                    <td><?php echo "Đang thực tập";?></td>
                                                <?php }else{?>
                                                    <td><?php echo "Đã hoàn thành";?></td>
                                            <?php } ?>
                                            <td>
                                                <button class="btn btn-secondary" style="background-color: #4e73df;" type="button" data-dismiss="modal">
                                                    <a style="color: white;" href="./internship/editinternship.php?id=<?php echo $rowinternship['id'];?>">Edit</a>
                                                </button>
                                                <button class="btn btn-secondary" style="background-color: dimgrey;" type="button" data-dismiss="modal">
                                                    <a style="color: white;" href="./internship/viewinternship.php?id=<?php echo $rowinternship['id'];?>">View</a>
                                                </button>
                                                <button class="btn btn-secondary" style="background-color: orangered; color: white;" type="button" data-dismiss="modal">
                                                    <a style="color: white;" href="./internship/deleteinternship.php?id=<?php echo $rowinternship['id'];?>"
								                        onclick="return window.confirm('Bạn có muốn xóa <?php echo $rowinternship['fullname'];?> không?');">
										        Delete</button>
                                            </td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
                    <a class="btn btn-primary" href="./login/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>