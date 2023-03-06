<?php
// SESSION
session_start();
include('../../config/database.php');
if (empty($_SESSION['username'])) {
    @header('location:../modul-auth/index.php');
} else {
    if ($_SESSION['level'] == 'masyarakat') {
        $nik = $_SESSION['nik'];
        $nama = $_SESSION['nama'];
    }
}
// CRUD
if (isset($_POST['tambahPengaduan'])) {
    $isi_laporan = $_POST['isi_laporan'];
    $tgl = $_POST['tgl_pengaduan'];
    //upload
    $ekstensi_diperbolehkan = array('jpg', 'png');
    $foto = $_FILES['foto']['name'];
    // print_r($foto);
    $x = explode(".", $foto);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];
    if (!empty($foto)) {
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            $q = "INSERT INTO `pengaduan`(id_pengaduan, tgl_pengaduan, nik, isi_laporan, foto, `status`) VALUES ('', '$tgl', '$nik', '$isi_laporan', '$foto', '0')";
            // echo($q);
            $r = mysqli_query($con, $q);
            if ($r) {
                move_uploaded_file($file_tmp, '../../assets/images/masyarakat/' . $foto);
            }
        }
    } else {
        $q = "INSERT INTO `pengaduan`(id_pengaduan, tgl_pengaduan, nik, isi_laporan, foto, `status`) VALUES ('', '$tgl', '$nik', '$isi_laporan', '', '0')";
        $r = mysqli_query($con, $q);
    }
}

if (isset($_POST['edit'])) {
    $status = $_POST['status'];
    $nik = $_POST['nik'];
    $q = mysqli_query($con, "UPDATE `masyarakat` SET verifikasi = '$status' WHERE nik = '$nik'");
}

if (isset($_POST['hapus'])) {
    $id_pengaduan = $_POST['id_pengaduan'];
    $q = mysqli_query($con, "DELETE FROM `pengaduan` WHERE id_pengaduan = '$id_pengaduan'");
}
if (isset($_POST['update'])) {
    $nikLama = $_POST['nikLama'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $telp = $_POST['telp'];
    $password = md5($_POST['password']);
    if ($password == '') {
        $q = mysqli_query($con, "UPDATE `masyarakat` SET nik = '$nik', nama = '$nama', username = '$username', telp = '$telp' WHERE nik = '$nikLama'");
    } else {
        $q = mysqli_query($con, "UPDATE `masyarakat` SET `password` = '$password', nik = '$nik', nama = '$nama', username = '$username', telp = '$telp' WHERE nik = '$nikLama'");
    }
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
                                    <h4 class="card-title">Pengaduan</h4>
                                    <?php if ($_SESSION['level'] == 'masyarakat') { ?>
                                        <div class="card">
                                            <div class="card-header">
                                                <button data-toggle="modal" data-target="#modal-lg" class="btn btn-success">buat pengaduan&nbsp;<i class="fa fa-pen"></i></button>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <!-- modal -->
                                    <div class="modal fade" id="modal-lg">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    Buat Pengaduan
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <input hidden name="nik" value="">
                                                        <div class="form-group">
                                                            <label for="isi_laporan">Isi Laporan</label>
                                                            <textarea name="isi_laporan" class="form-control" cols="30" rows="10"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tgl_pengaduan">Tanggal Pengaduan</label>
                                                            <input type="date" name="tgl_pengaduan" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="foto">Foto</label>
                                                            <input type="file" name="foto" class="form-control">
                                                        </div>
                                                        <input type="submit" name="tambahPengaduan" value="simpan" class="btn btn-success">
                                                    </form>
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end modal -->

                                    </p>
                                    <div class="table-responsive">
                                        <table id="dataTablesNya" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Tanggal</th>
                                                    <th>Nik</th>
                                                    <th>Isi Laporan</th>
                                                    <th>Foto</th>
                                                    <th>Status</th>
                                                    <?php if ($_SESSION['level'] == 'masyarakat') { ?>
                                                        <th>hapus</th>
                                                    <?php } ?>

                                                    <?php if ($_SESSION['level'] == 'petugas') { ?>

                                                        <th>proses Pengaduan</th>
                                                    <?php } ?>

                                                </tr>
                                            </thead>
                                            <?php  ?>
                                            <tbody>
                                                <?php
                                                if ($_SESSION['level'] == 'masyarakat') {
                                                    $q = "SELECT * FROM `pengaduan` WHERE `nik` = $nik";
                                                } else {
                                                    $q = "SELECT * FROM `pengaduan`";
                                                }
                                                $r = mysqli_query($con, $q);
                                                $no = 1;
                                                while ($d = mysqli_fetch_object($r)) {
                                                ?>
                                                    <tr>
                                                        <td><?= $no ?></td>
                                                        <td><?= $d->tgl_pengaduan ?></td>
                                                        <td><?= $d->nik ?></td>
                                                        <td><?= $d->isi_laporan ?></td>
                                                        <td><?php if ($d->foto == '') {
                                                                echo '<img style="max-height:100px" class="img img-thumbnail" src="../../assets/images/no-foto.png">';
                                                                echo ("kosong");
                                                            } else {
                                                                echo '<img style="max-height:500px" class="img " src="../../assets/images/masyarakat/' . $d->foto . '">';
                                                            } ?></td>
                                                        <td><?= $d->status ?></td>
                                                        <?php if ($_SESSION['level'] == 'masyarakat') { ?>
                                                            <td>
                                                                <form action="" method="post"><input type="hidden" name="id_pengaduan" value="<?= $d->id_pengaduan ?>"><button type="submit" name="hapus" class="btn btn-danger"><i class="fa fa-trash"></i></button></form>
                                                            </td>
                                                        <?php } ?>
                                                        <?php if ($_SESSION['level'] == 'petugas') { ?>
                                                            <td>
                                                                <form action="" method="post">
                                                                    <input type="hidden" name="id_pengaduan" value="<?= $d->id_pengaduan ?>">
                                                                    <select class="form-control" name="status">
                                                                        <option value="0"> 0 </option>
                                                                        <option value="proses"> proses </option>
                                                                        <option value="selesai"> selesai </option>
                                                                    </select><br>
                                                                    <button type="submit" name="proses_pengaduan" class="btn btn-success form-control">ubah</button>
                                                                </form>
                                                            </td>
                                                        <?php } ?>
                                                    </tr>
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
</body>


</html>