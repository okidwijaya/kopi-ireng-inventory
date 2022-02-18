<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Kopi Ireng Admin</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('user'); ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa fa-coffee"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Kopi Ireng</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Heading -->
            <div class="sidebar-heading">
                Admin
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dashboard/index'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">



            <!-- Nav Item - produksi dsan penjualan Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-keyboard-o"></i>
                    <span>Data Input</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Admin</h6>
                        <a class="collapse-item" href="<?= base_url('jns/index'); ?>">Jenis Produk</a>
                        <a class="collapse-item" href="<?= base_url('bahan/index'); ?>">Bahan Baku</a>
                        <a class="collapse-item" href="<?= base_url('produk/index'); ?>">Produk</a>
                        <a class="collapse-item" href="<?= base_url('penjualan/index'); ?>">Penjualan</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Laporan
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('laporan/index'); ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Laporan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item ">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                    </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item ">
                <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>logout</span>
                </a>
            </li>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']; ?></span>
                                <img class="img-profile rounded-circle" src="https://www.oxbridgeacademy.edu.za/wp-content/uploads/2014/11/secreterial.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('auth / logout'); ?> " data-toggle="modal" data-target="#logoutModal">
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
                    <h1 class="h3 mb-4 text-gray-800">My Profile</h1>



                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="data:image/png;base64,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" class="card-img">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $user['name']; ?></h5>
                                    <p class="card-text"><?=
                                                                $user['email']; ?>
                                    </p>
                                    <p class="card-text"><small class="text-muted">
                                            Member since <?= date('d F Y', $user['date_created']);
                                                            ?>
                                        </small></p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="footer-wrapper">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Kopi Ireng <?= date('y') ?>
                            <p>oki dwijaya afiq rahmansah</p>
                        </span>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?> ">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

</body>

</html>