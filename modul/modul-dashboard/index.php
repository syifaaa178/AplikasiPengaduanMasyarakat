<!DOCTYPE html>
<html lang="en">
<?php
include('../../config/database.php');

session_start();
if (empty($_SESSION['username'])) {
    @header('location:../modul-auth/index.php');
} else {
    $id_petugas = $_SESSION['id_petugas'];
    $nama = $_SESSION['nama_petugas'];
    $username = $_SESSION['username'];
}

//Total Pengaduan
$pengaduan = "SELECT * from pengaduan";
$resultPengaduan = mysqli_query($con, $pengaduan);
$countPengaduan = mysqli_num_rows($resultPengaduan);

//Total Tanggapan
$tanggapan = "SELECT * from tanggapan";
$resultTanggapan = mysqli_query($con, $tanggapan);
$countTanggapan = mysqli_num_rows($resultTanggapan);

//Total Petugas
$petugas = "SELECT * from petugas";
$resultPetugas = mysqli_query($con, $petugas);
$countPetugas = mysqli_num_rows($resultPetugas);

//Total Masyarakat
$masyarakat = "SELECT * from masyarakat";
$resultMasyarakat = mysqli_query($con, $masyarakat);
$countMasyarakat = mysqli_num_rows($resultMasyarakat);


?>
<!-- header -->
<?php include('../../assets/header.php') ?>
<?= $username ?>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <?php include('../../assets/sidebar.php'); ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar p-0 fixed-top d-flex flex-row">
                <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href="duar.html"><img src="../../assets/images/logo-mini.svg" alt="logos" /></a>
                </div>
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">

                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                                <div class="navbar-profile">
                                    <img class="img-xs rounded-circle" src="../../assets/images/faces/face15.jpg" alt="">
                                    <p class="mb-0 d-none d-sm-block navbar-profile-name">
                                        <?php
                                        if ($_SESSION['level'] == 'masyarakat') {
                                            echo ($_SESSION['nama']);
                                        } elseif ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'petugas') {
                                            echo ($_SESSION['nama_petugas']);
                                        }
                                        ?>
                                    </p>
                                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                                <h6 class="p-3 mb-0">Profile</h6>
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-divider"></div>
                                <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/ujikom%202023/modul/modul-auth/logout.php" class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-logout text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Log out</p>
                                    </div>
                                </a>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                        <span class="mdi mdi-format-line-spacing"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">

                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="d-flex align-items-center align-self-start">
                                                <h3 class="mb-0"><?php echo ($countMasyarakat) ?> </h3>

                                            </div>
                                        </div>
                                        <div class="col-3">

                                        </div>
                                    </div>
                                    <h6 class="text-muted font-weight-normal">Masyarakat Aktif</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="d-flex align-items-center align-self-start">
                                                <h3 class="mb-0"><?php echo ($countPetugas) ?></h3>

                                            </div>
                                        </div>
                                        <div class="col-3">

                                        </div>
                                    </div>
                                    <h6 class="text-muted font-weight-normal">Petugas Aktif</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="d-flex align-items-center align-self-start">
                                                <h3 class="mb-0"><?php echo ($countPengaduan) ?></h3>
                                            </div>
                                        </div>
                                        <div class="col-3">

                                        </div>
                                    </div>
                                    <h6 class="text-muted font-weight-normal">Total Pengaduan</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="d-flex align-items-center align-self-start">
                                                <h3 class="mb-0"><?php echo ($countTanggapan) ?></h3>
                                            </div>
                                        </div>
                                        <div class="col-3">

                                        </div>
                                    </div>
                                    <h6 class="text-muted font-weight-normal">Total Tanggapan</h6>
                                </div>
                            </div>
                        </div>
                    </div>
            
                </div>
                <!-- content-wrapper ends

            <!-- </div>  -->

                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->

        <?php include('../../assets/footer.php') ?>


</html>