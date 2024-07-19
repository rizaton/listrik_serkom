<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-5 d-none d-sm-inline">Menu</span>
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="nav-item">
                <a href="<?= base_url('/admin') ?>" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-house"> </i>
                    <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('/admin/kelola_pelanggan') ?>" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-house"> </i>
                    <span class="ms-1 d-none d-sm-inline">Kelola Pelanggan</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('/admin/kelola_penggunaan') ?>" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-house"> </i>
                    <span class="ms-1 d-none d-sm-inline">Kelola Penggunaan</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('/admin/kelola_tagihan') ?>" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-house"> </i>
                    <span class="ms-1 d-none d-sm-inline">Kelola Tagihan</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('/admin/kelola_pembayaran') ?>" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-house"> </i>
                    <span class="ms-1 d-none d-sm-inline">Kelola Pembayaran</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('/admin/laporan') ?>" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-house"> </i>
                    <span class="ms-1 d-none d-sm-inline">Laporan</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('/admin/kelola_user') ?>" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-house"> </i>
                    <span class="ms-1 d-none d-sm-inline">Kelola User</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('/admin/kelola_tarif') ?>" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-house"> </i>
                    <span class="ms-1 d-none d-sm-inline">Kelola Tarif</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('/admin/kelola_level') ?>" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-house"> </i>
                    <span class="ms-1 d-none d-sm-inline">Kelola Level</span>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a href="<?php //base_url('/admin/pengaturan') 
                            ?>" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-house"> </i>
                    <span class="ms-1 d-none d-sm-inline">Pengaturan</span>
                </a>
            </li> -->
        </ul>
        <hr>
        <div class="dropdown pb-4">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <!-- <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle"> -->
                <span class="d-none d-sm-inline mx-1"><?= $name;  ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <!-- <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li> -->
                <li><a class="dropdown-item" href="<?= base_url('/logout')  ?>">Log out</a></li>
            </ul>
        </div>
    </div>
</div>