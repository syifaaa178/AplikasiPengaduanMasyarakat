<?php
include('../../config/database.php');
if (isset($_POST['cek'])) {
  $pilihan = $_POST['pilihan']; //masyarakat atau petugas
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  if ($pilihan == 'masyarakat') {
    $q = mysqli_query($con, "SELECT * FROM `masyarakat` WHERE username = '$username' AND password = '$password' AND verifikasi = 1");
    $r = mysqli_num_rows($q);
    if ($r == 1) {
      $d = mysqli_fetch_object($q);
      @session_start();
      $_SESSION['nik'] = $d->nik;
      $_SESSION['username'] = $d->username;
      $_SESSION['nama'] = $d->nama;
      $_SESSION['telp'] = $d->telp;
      $_SESSION['level'] = 'masyarakat';
      @header('location:../../modul/modul-profile/');
    } else {
      echo '<div class="alert alert-danger alert-dismissable"><a href="" class="close" data-dismiss="alert">x</a> <strong class="text-black">Data salah atau belum di verifikasi</strong></div>';
    }
  } else if ($pilihan == 'petugas') {
    $q = mysqli_query($con, "SELECT * FROM `petugas` WHERE username = '$username' AND password = '$password'");
    $r = mysqli_num_rows($q);
    if ($r == 1) {
      $d = mysqli_fetch_object($q);
      @session_start();
      $_SESSION['username'] = $d->username;
      $_SESSION['nama_petugas'] = $d->nama_petugas;
      $_SESSION['level'] = $d->level;
      $_SESSION['id_petugas'] = $d->id_petugas;
      $_SESSION['telp'] = $d->telp;
      if ($_SESSION['level'] == 'admin') {
        @header('location:../../modul/modul-dashboard/');
      }
      if ($_SESSION['level'] == 'petugas') {
        @header('location:../../modul/modul-profile/');
      }

    }else {
      echo '<div class="alert alert-danger alert-dismissable"><a href="" class="close" data-dismiss="alert">x</a> <strong class="text-white">Data salah atau belum di verifikasi</strong></div>';
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- header -->
<?php include('../../assets/header.php') ?>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <h3 class="card-title text-left mb-3">Login</h3>
              <form action="" method="post">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control p_input" name="username">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control p_input" name="password">
                </div>

                <div class="form-group row">          
                  <div class="col-sm-4">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="pilihan" id="pilihan" value="petugas" > Petugas </label>
                    </div>
                  </div>
                  <div class="col-sm-5">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="pilihan" id="pilihan" value="masyarakat" checked> Masyarakat </label>
                    </div>
                  </div>
                </div>


                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-block enter-btn" name="cek" >Login</button>
                </div>

                <p class="sign-up">Don't have an Account?<a href="register.php"> Sign Up</a></p>
              </form>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/hoverable-collapse.js"></script>
  <script src="../../assets/js/misc.js"></script>
  <script src="../../assets/js/settings.js"></script>
  <script src="../../assets/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>