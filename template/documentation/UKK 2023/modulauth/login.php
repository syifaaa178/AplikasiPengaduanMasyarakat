<?php 
 
include '../koneksi/config.php';
 
error_reporting(0);
?>
  <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Login</h3>
                <form>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control p_input" placeholder="masukan username anda">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control p_input" placeholder="masukan password anda">
                  </div>
                  <div class="mb-3">
                    <label for="disabledSelect" class="form-label">Status</label>
                    <select id="disabledSelect" class="btn btn-secondary">
                      <option>Petugas</option>
                      <option>Masyarakat</option>
                    </select>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                  <p class="sign-up">Belum punya akun?<a href="registrasi.php"> Registrasi disini</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>