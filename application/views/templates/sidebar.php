        <style>
            .sidebar-dark .nav-item .nav-link.active,
            .sidebar-dark .nav-item .nav-link.active i {
                color: #fff;
            }
        </style>
        
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-book"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><img style="max-width: 125px; max-height: 40px;" src="<?= base_url('assets/img/logo/'); ?>second_logo_neo.png" alt=""></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Looping Menu-->
            <div class="sidebar-heading">
                Home
            </div>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('admin'); ?>">
                    <i class="fa fa-fw fa-home"></i>
                    <span>Dashboard Admin</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('home'); ?>">
                    <i class="fa fa-fw fa-store"></i>
                    <span>Peminjaman Buku</span>
                </a>
            </li>

                <!-- Divider -->
                <hr class="sidebar-divider mt-3">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Master Data
                </div>
                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item">
                        <a class="nav-link pb-0" href="<?= base_url('buku/kategori'); ?>">
                            <i class="fa fa-fw fa-book"></i>
                            <span>Kategori Buku</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pb-0" href="<?= base_url('buku'); ?>">
                            <i class="fa fa-fw fa-book"></i>
                            <span>Data Buku</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pb-0" href="<?= base_url('user/anggota'); ?>">
                            <i class="fa fa-fw fa-users"></i>
                            <span>Data Anggota</span></a>
                    </li>
                <!-- Divider -->
                <hr class="sidebar-divider mt-3">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Transaksi
                </div>
                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item">
                        <a class="nav-link pb-0" href="<?= base_url('pinjam'); ?>">
                            <i class="fa fa-fw fa-shopping-cart"></i>
                            <span>Data Peminjaman</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pb-0" href="<?= base_url('pinjam/daftarBooking'); ?>">
                            <i class="fa fa-fw fa-list"></i>
                            <span>Data Booking</span></a>
                    </li>
                <!-- Divider -->
                <hr class="sidebar-divider mt-3">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Laporan
                </div>
                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item">
                        <a class="nav-link pb-0" href="<?= base_url('laporan/laporan_buku'); ?>">
                            <i class="fa fa-fw fa-address-book"></i>
                            <span>Laporan Data Buku</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pb-0" href="<?= base_url('laporan/laporan_anggota'); ?>">
                            <i class="fa fa-fw fa-address-book"></i>
                            <span>Laporan Data Anggota</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pb-0" href="<?= base_url('laporan/laporan_pinjam'); ?>">
                            <i class="fa fa-fw fa-address-book"></i>
                            <span>Laporan Peminjaman</span></a>
                    </li>
                <!-- Divider -->
                <hr class="sidebar-divider mt-3">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar --> 
        
        