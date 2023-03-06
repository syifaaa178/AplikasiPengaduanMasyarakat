<!DOCTYPE html>
<html lang="en">
<?php
// SESSION
session_start();
include('../../config/database.php');
if (empty($_SESSION['username'])) {
    @header('location:../modul-auth/index.php');
}
// CRUD


if (isset($_POST['hapus'])) {
    $idLama = $_POST['idLama'];
    $q = mysqli_query($con, "DELETE FROM `petugas` WHERE id_petugas = '$idLama'");
}
if (isset($_POST['update'])) {
    $idLama = $_POST['idLama'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $telp = $_POST['telp'];
    $password = md5($_POST['password']);
    if ($password == '') {
        $q = mysqli_query($con, "UPDATE `petugas` SET id_petugas = '$idLama', nama _petugas= '$nama', username = '$username', telp = '$telp' WHERE id_petugas = '$idLama'");
    } else {
        $q = mysqli_query($con, "UPDATE `petugas` SET `password` = '$password', id_petugas = '$idLama', nama_petugas = '$nama', username = '$username', telp = '$telp' WHERE id_petugas = '$idLama'");
    }
}

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
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Petugas</h4>
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table"  id="dataTablesNya">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>ID Petugas</th>
                                                    <th>Nama Petugas</th>
                                                    <th>Username</th>
                                                    <th>Telp</th>
                                                    <th>Update</th>
                                                    <th>Hapus</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $q = mysqli_query($con, "SELECT * FROM `petugas`");
                                                $no = 1;
                                                while ($d = mysqli_fetch_object($q)) { ?>
                                                    <tr>
                                                        <td><?= $no ?></td>
                                                        <td><?= $d->id_petugas ?></td>
                                                        <td><?= $d->nama_petugas ?></td>
                                                        <td><?= $d->username ?></td>
                                                        <td><?= $d->telp ?></td>
                                                        <td><button data-toggle="modal" data-target="#modal-xl<?= $d->id_petugas ?>" class="btn btn-success"><i class="fa fa-pen"></i></button></td>
                                                        <td>
                                                            <form action="" method="post"><input type="hidden" name="id_petugas" value="<?= $d->id_petugas ?>"><button name="hapus" class="btn btn-danger"><i class="fa fa-trash"></i></button></form>
                                                        </td>
                                                    </tr>

                                                    <!-- modal start -->
                                                    <div class="modal fade" id="modal-xl<?= $d->id_petugas ?>">
                                                        <div class="modal-dialog modal-xl<?= $d->id_petugas ?>">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Edit Data</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="" method="post">
                                                                    <input type="hidden" name="idLama" value="<?= $d->id_petugas ?>">
                                                                    <div class="modal-body">
                                                                        <div class="form-group"><label for="nama">Nama</label>
                                                                            <input class="form-control" type="text" name="nama" value="<?= $d->nama_petugas ?>">
                                                                        </div>
                                                                        <div class="form-group"><label for="username">Username</label>
                                                                            <input class="form-control" type="text" name="username" value="<?= $d->username ?>">
                                                                        </div>
                                                                        <div class="form-group"><label for="username">New Password</label>
                                                                            <input class="form-control" type="password" name="password" value="">
                                                                        </div>
                                                                        <div class="form-group"><label for="username">Telepon</label>
                                                                            <input class="form-control" type="number" name="telp" value="<?= $d->telp ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        <button type="submit" name="update" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                            </div>
                                                            </form>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                    <!-- modal - ends -->

                                                <?php $no++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <?php include('../../assets/footer.php') ?>

    </body>
</html>