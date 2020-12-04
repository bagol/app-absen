<?php if ($this->session->userdata("level") == "admin") { ?>
<!-- sidebar untuk admin -->
    <div class="nav">
        <div class="sb-sidenav-menu-heading">Core</div>
        <a class="nav-link" href="<?=base_url("Admin") ?>">
            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
            Dashboard
        </a>
        <div class="sb-sidenav-menu-heading">Absen</div>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Absen" aria-expanded="false" aria-controls="collapseLayouts">
            <div class="sb-nav-link-icon"><i class="fas fa-qrcode"></i></div>
            Absen
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="Absen" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="<?=base_url("Admin/absen/1") ?>">Pagi</a>
                <a class="nav-link" href="<?=base_url("Admin/absen/2") ?>">Siang</a>
            </nav>
        </div>
        <div class="sb-sidenav-menu-heading">Menu</div>
        <!-- User Menu -->
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
            Pengguna
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="<?=base_url("admin/kelola_user") ?>">Kelola Pengguna</a>
                <a class="nav-link" href="<?=base_url("admin/tambah_user") ?>">Tambah Pengguna</a>
            </nav>
        </div>
        <!-- sift menu -->
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#shift" aria-expanded="false" aria-controls="collapseLayouts">
            <div class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div>
            Shift
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="shift" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="<?=base_url("Admin/kelola_shift") ?>">Kelola Shift</a>
                <a class="nav-link" href="<?=base_url("Admin/tambah_shift") ?>">Tambah Shift</a>
            </nav>
        </div>
        <!-- Device -->
        <!-- sift menu -->
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Device" aria-expanded="false" aria-controls="collapseLayouts">
            <div class="sb-nav-link-icon"><i class="fas fa-desktop"></i></div>
            Perangkat
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="Device" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="<?=base_url("Admin/kelola_device") ?>">Kelola Perangkat</a>
                <a class="nav-link" href="<?=base_url("Admin/tambah_perangkat") ?>">Tambah Perangkat</a>
            </nav>
        </div>
        <!-- Laporan -->
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Laporan" aria-expanded="false" aria-controls="collapseLayouts">
            <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
            Laporan
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="Laporan" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="<?=base_url("Admin/laporan_pegawai") ?>">Pegawai</a>
                <a class="nav-link" href="">Pribadi</a>
            </nav>
        </div>
    <!-- end menu -->
    </div>
<?php } elseif ($this->session->userdata("level") == "karyawan") { ?>
    <div class="nav">
        <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="<?=base_url("Admin") ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Absen</div>
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Absen" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-qrcode"></i></div>
                Absen
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="Absen" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="<?=base_url("Karyawan/absen/pagi") ?>">Pagi</a>
                    <a class="nav-link" href="<?=base_url("Karyawan/absen/siang") ?>">Siang</a>
                </nav>
            </div>
        <div class="sb-sidenav-menu-heading">Menu</div>
        <!-- user menu -->
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Laporan" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                Laporan
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="Laporan" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="">Pribadi</a>
                </nav>
            </div>
    <!-- end menu -->
    </div>
<?php } ?>