<?php
// SESSION
session_start();
include('../../config/database.php');
if (empty($_SESSION['username'])) {
    @header('location:../modul-auth/index.php');
} else {
    if ($_SESSION['level'] == 'masyarakat') {
        $nik = $_SESSION['nik'];
    } else {
        $id_petugas = $_SESSION['id_petugas'];
    }
}
// tambah tanggapan
if (isset($_POST['tambah_tanggapan'])) {
    $id_pengaduan = $_POST['id_pengaduan'];
    $tgl_tanggapan = $_POST['tgl_tanggapan'];
    $id_petugas = $_POST['id_petugas'];
    $tanggapan = $_POST['tanggapan'];
    $q = "INSERT INTO `tanggapan` (id_tanggapan, id_pengaduan, tgl_tanggapan, tanggapan, id_petugas) VALUES ('','$id_pengaduan', '$tgl_tanggapan', '$tanggapan', '$id_petugas')";
    $r = mysqli_query($con, $q);
}
// hapus tanggapan
if (isset($_POST['hapusTanggapan'])) {
    $id_tanggapan = $_POST['id_tanggapan'];
    mysqli_query($con, "DELETE FROM `tanggapan` WHERE id_tanggapan = '$id_tanggapan'");
}
// update tanggapan
if (isset($_POST['ubahTanggapan'])) {
    $id_tanggapan =  $_POST['id_tanggapan'];
    $tgl_tanggapan = $_POST['tgl_tanggapan'];
    $tanggapan = $_POST['tanggapan'];
    mysqli_query($con, "UPDATE `tanggapan` SET tgl_tanggapan = '$tgl_tanggapan', tanggapan = '$tanggapan' WHERE `id_tanggapan` = '$id_tanggapan'");
}
?>

<!DOCTYPE html>
<html lang="en">
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
                                    <h4 class="card-title">Tanggapan</h4>
                                    <?php if ($_SESSION['level'] == 'petugas') { ?>

                                        <div class="col-sm-3" style="padding:0.5%;">
                                            <button data-toggle="modal" data-target="#modal-lg" class="btn btn-success"><i class="fa fa-pen"></i>&nbsp;tambah tanggapan</button>
                                        </div>
                                    <?php } ?>

                                    </p>
                                    <!-- modal start -->
                                    <div class="modal fade" id="modal-lg">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    Tambah Tanggapan
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post">
                                                        <label for="id_pengaduan"> Pilih Id Pengaduan</label>
                                                        <select name="id_pengaduan" class="form-control">
                                                            <?php
                                                            $q = "SELECT * FROM pengaduan JOIN `masyarakat` WHERE pengaduan.nik = masyarakat.nik";
                                                            $r = mysqli_query($con, $q);
                                                            while ($d = mysqli_fetch_object($r)) { ?>
                                                                <option value="<?= $d->id_pengaduan ?>"><?= $d->id_pengaduan . '|' . $d->nik . '|' . $d->nama ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <br>
                                                        <label for="tgl_tanggapan">Tanggal</label>
                                                        <input class="form-control" type="date" name="tgl_tanggapan">
                                                        <label for="tanggapan">Beri Tanggapan</label>
                                                        <textarea class="form-control" name="tanggapan" id="" cols="30" rows="10"></textarea>
                                                        <label for="id_petugas">ID Petugas</label>
                                                        <input name="id_petugas" type="text" class="form-control" value="<?= $id_petugas ?>" readonly>
                                                        <br>
                                                        <button name="tambah_tanggapan" type="submit" class="btn btn-info">simpan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal ends -->
                                    <div class="table-responsive">
                                        <table id="dataTablesNya" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Id Pengaduan</th>
                                                    <th>tanggal Tanggapan</th>
                                                    <th>Isi Tanggapan</th>
                                                    <th>Petugas</th>
                                                    <?php if ($_SESSION['level'] == 'petugas') { ?>

                                                        <th>hapus</th>
                                                        <th>edit</th>
                                                    <?php } ?>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $q = "SELECT * FROM `tanggapan` JOIN `petugas` JOIN `pengaduan`
                             WHERE tanggapan.id_petugas = petugas.id_petugas 
                             AND tanggapan.id_pengaduan = pengaduan.id_pengaduan";
                                                $r = mysqli_query($con, $q);
                                                while ($d = mysqli_fetch_object($r)) { ?>
                                                    <tr>
                                                        <td>
                                                            <?= $no ?>
                                                        </td>
                                                        <td>
                                                            <?= $d->id_pengaduan ?>
                                                        </td>
                                                        <td>
                                                            <?= $d->tgl_tanggapan ?>
                                                        </td>
                                                        <td>
                                                            <?= $d->tanggapan ?>
                                                        </td>
                                                        <td>
                                                            <?= $d->nama_petugas ?>
                                                        </td>
                                                        <?php if ($_SESSION['level'] == 'petugas') { ?>
                                                            <td>
                                                                <form action="" method="post"><input type="hidden" name="id_tanggapan" value="<?= $d->id_tanggapan ?>"><button name="hapusTanggapan" class="btn btn-danger" type="submit"><i class="fa fa-trash"></i>&nbsp;hapus</button></form>
                                                            </td>
                                                        <?php } ?>
                                                        <?php if ($_SESSION['level'] == 'petugas') { ?>
                                                            <td>
                                                                <button class="btn btn-success" data-toggle="modal" data-target="#modal-lg<?= $d->id_pengaduan ?>" class="btn btn-success"><i class="fa fa-pen"></i>&nbsp;Edit</button>
                                                            </td>
                                                        <?php } ?>
                                                    </tr>
                                                    <div class="modal fade" id="modal-lg<?= $d->id_pengaduan ?>">
                                                        <div class="modal-dialog modal-lg<?= $d->id_pengaduan ?>">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    Edit Pengaduan
                                                                </div>
                                                                <form action="" method="post">
                                                                    <div class="modal-body">
                                                                        <input class="form-control" name="id_tanggapan" type="hidden" value="<?= $d->id_tanggapan ?>">
                                                                        <label for="id_pengaduan">ID Pengaduan</label><br>
                                                                        <select class="form-control" name="id_pengaduan">
                                                                            <?php
                                                                            $result = mysqli_query($con, "SELECT * FROM `pengaduan` JOIN `masyarakat` WHERE pengaduan.nik = masyarakat.nik");
                                                                            while ($data = mysqli_fetch_object($result)) { ?>
                                                                                <option value="<?= $data->id_pengaduan ?>" <?php if ($d->id_pengaduan == $data->id_pengaduan) {
                                                                                                                                echo 'selected';
                                                                                                                            } ?>><?= $data->id_pengaduan . '|' . $data->nik . '|' . $data->nama ?></option>
                                                                            <?php } ?>
                                                                        </select><br>
                                                                        <label for="tgl_tanggapan">Tanggal Tanggapan</label>
                                                                        <input class="form-control" name="tgl_tanggapan" class="form-control" type="date" name="" value="<?= $d->tgl_tanggapan ?>">
                                                                        <label for="tanggapan">Tanggapan</label>
                                                                        <textarea class="form-control" name="tanggapan" id="" cols="30" rows="10"><?= $d->tanggapan ?></textarea>
                                                                        <br>
                                                                        <button name="ubahTanggapan" type="submit" class="btn btn-info">Update</button>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                <?php $no++;
                                                } ?>
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


</html>