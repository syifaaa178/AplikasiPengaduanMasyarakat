<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.html"><img src="../../assets/images/logo.svg" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle " src="../../assets/images/faces/face15.jpg" alt="">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal"><?= $_SESSION['username'] ?></h5>
                        <span><?= $_SESSION['level'] ?></span>
                    </div>
                </div>

            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>

        <?php if ($_SESSION['level'] == 'petugas' || $_SESSION['level'] == 'masyarakat' || $_SESSION['level'] == 'admin') { ?>
            <li class="nav-item menu-items">
                <a class="nav-link" href="http://<?= $_SERVER['SERVER_NAME'] ?>/ujikom%202023/modul/modul-profile/">
                    <span class="menu-icon">
                        <i class="mdi mdi-account"></i>
                    </span>
                    <span class="menu-title">Profile</span>
                </a>
            </li>
        <?php } ?>

        <?php if ($_SESSION['level'] == 'admin') { ?>
            <li class="nav-item menu-items">
                <a class="nav-link" href="http://<?= $_SERVER['SERVER_NAME'] ?>/ujikom%202023/modul/modul-dashboard/">
                    <span class="menu-icon">
                        <i class="mdi mdi-speedometer"></i>
                    </span>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <span class="menu-icon">
                        <i class="mdi mdi-laptop"></i>
                    </span>
                    <span class="menu-title">Admin</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item menu-items">
                            <a class="nav-link" href="http://<?= $_SERVER['SERVER_NAME'] ?>/ujikom%202023/modul/modul-masyarakat/">
                                <span class="menu-icon">
                                    <i class="mdi mdi-nature-people"></i>
                                </span>
                                <span class="menu-title">Masyarakat</span>
                            </a>

                        <li class="nav-item menu-items">
                            <a class="nav-link" href="http://<?= $_SERVER['SERVER_NAME'] ?>/ujikom%202023/modul/modul-petugas/">
                                <span class="menu-icon">
                                    <i class="mdi mdi-account-key"></i>
                                </span>
                                <span class="menu-title">Petugas</span>
                            </a>
                    </ul>
                </div>
            </li>
        <?php } ?>


        <?php if ($_SESSION['level'] == 'masyarakat' ) { ?>
            <li class="nav-item menu-items">
                <a class="nav-link" href="http://<?= $_SERVER['SERVER_NAME'] ?>/ujikom%202023/modul/modul-pengaduan/">
                    <span class="menu-icon">
                        <i class="mdi mdi-message-alert"></i>
                    </span>
                    <span class="menu-title">Pengaduan</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="http://<?= $_SERVER['SERVER_NAME'] ?>/ujikom%202023/modul/modul-tanggapan">
                    <span class="menu-icon">
                        <i class="mdi mdi-at"></i>
                    </span>
                    <span class="menu-title">Tanggapan</span>
                </a>
            </li>
        <?php } ?>
        



        <?php if ( $_SESSION['level'] == 'petugas' || $_SESSION['level'] == 'admin') { ?>
            <li class="nav-item menu-items">
                <a class="nav-link" href="http://<?= $_SERVER['SERVER_NAME'] ?>/ujikom%202023/modul/modul-pengaduan/">
                    <span class="menu-icon">
                        <i class="mdi mdi-message-alert"></i>
                    </span>
                    <span class="menu-title">Pengaduan</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="http://<?= $_SERVER['SERVER_NAME'] ?>/ujikom%202023/modul/modul-tanggapan">
                    <span class="menu-icon">
                        <i class="mdi mdi-at"></i>
                    </span>
                    <span class="menu-title">Tanggapan</span>
                </a>
            </li>
        <?php } ?>




    </ul>
</nav>