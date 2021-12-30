<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#008080">
    <title>Neobooks | <?= $title ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/img/logo/'); ?>b_icon.png" type="image/x-icon">
    <!-- Asset -->
    <link rel="icon" type="image/png" href="<?= base_url('assets/img/logo/'); ?>logo-pb.png">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/user/css/bootstrap.css">
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/vendor/'); ?>datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,400;1,500;1,700&display=swap');
        * {
            font-family: 'Poppins', sans-serif;
        }
        :root {
            --skyblue: #00aeef;
            --greencanyon: #008080;
        }
        html, body, .wrapper {
            margin: 0;
            padding: 0;
        }
        body {
            background: linear-gradient(50deg, var(--white), #faebd7);
        }
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 2;
            /* background: linear-gradient(var(--warning), var(--indigo)); */
            background: url("<?= base_url('assets/'); ?>img/background/sakura-2.png");
        }
        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(var(--cyan), #ffe4e1);
            opacity: 0.2;
            z-index: 3;
        }
        .wrapper {
            position: absolute;
            min-height: 100%;
            width: 100%;
            top: 0;
        }
        .container { 
            max-width: 100%; 
            width: 90%; 
            margin: 0 5%;
        }

        /* HEADER */
        .topbar {
            position: absolute;
            z-index: 100;
            background: var(--greencanyon);
            display: flex;
            align-items: center;
            justify-content: center;
            top: 0;
            left: 0;
            width: 100%;
            height: 60px;
        }
        .topbar .brand {
            padding-left: 1rem;
        }
        nav.navbar {
            position: absolute;
            top: 60px;
            width: 100%;
            left: 0;
            z-index: 100;
            background: var(--greencanyon) !important;
            box-shadow: 0 1px 10px #13c6dc;
            border-bottom: none;
        }
        nav.navbar.show {
            border-bottom: 1px solid lightblue;
        }
        nav.navbar.sticky {
            top: 0;
            position: fixed;
        }
        .my-navbar-collapse {
            display: block;
            flex-grow: 1;
            flex-basis: 100%;
            transition: 0.4s;
        }
        .navbar-nav a.nav-item, .navbar-light .navbar-nav .nav-link:focus {
            color: #fff;
            font-weight: 500;
        }
        .navbar-nav a.nav-item.nav-link:hover {
            color: #000;
        }
        .navbar-nav a.booking {
            padding-right: 20px;
            position: relative;
        }
        .navbar-nav a.booking span {
            position: absolute;
            font-size: 0.755rem;
            font-weight: 500;
            border: 1px solid var(--greencanyon);
            min-width: 18px;
            height: 18px;
            border-radius: 50%;
            background: var(--danger);
            margin-top: -5px;
            transform: translateY(-129%) translateX(13px);
            transition: 0.1s ease-in;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .navbar-nav .nav-link.booking:hover span {
            color: #fff;
            background: #000;
        }
        .navbar-brand, .nav-item {
            z-index: 1;
            padding: 0;
        }
        nav.navbar .user-dropdown-menu {
            width: auto;
            color: #fff;
            position: relative;
            min-height: 35px;
            max-height: 40px;
            display: flex;
            align-items: center;
            /* border-left: 1px solid rgba(255, 255, 255, 0.7);
            padding-left: 10px; */
        }
        a#userInformation {
            display: flex;
            position: relative;
            width: auto;
            font-size: 0.7rem;
            color: var(--white);
            font-weight: 400;
            justify-content: space-between;
            align-items: center;
            text-decoration: none;
        }
        .user-dropdown-menu span.nav-link, 
        .user-dropdown-menu .nama-user,
        .user-dropdown-menu .nav-link {
            white-space: nowrap;
        }
        .nama-user {
            padding-right: 10px;
        }
        .img-user {
            max-width: 30px;
            max-height: 30px;
            border-radius: 50%;
            overflow: hidden;
            margin-top: 4px;
            width: 35px;
            height: 35px;
            transform: translateY(-7%);
        }
        .img-user img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .navbar-nav .nav-item:link,
        .navbar-nav .nav-item:visited,
        .navbar-nav .nav-item:hover,
        .navbar-nav .nav-item:active,
        .navbar-toggler {
            color: #fff;
        }
        .navbar-nav .nav-item:hover {
            color: #113450;
        }
        .navbar-toggler,
        .navbar-toggler:focus {
            background: none;
            border: none;
            outline: none;
            padding-right: 0;
            padding-left: 0;
        }
        .navbar-toggler, 
        .navbar-toggler:focus {
            padding-right: 24px;
        }
        .user-dropdown-menu .nav-item.nav-link {
            padding-left: 14px;
        }
        .navbar-toggler span, 
        .user-dropdown-menu .nav-item.nav-link {
            color: #fff;
            font-size: 1.2em;
            font-weight: 700;
        }
        .searching-book input {
            padding: 4px 10px;
            font-size: 14px;
            font-weight: 400;
            color: #a0a0a0;
            outline: none;
            border: none;
            box-shadow: 0px 0px 5px rgba(255, 255, 255, 0.4);
            border-radius: 5px; 
            max-width: 200px;
            transition: 0.3s;
        }
        .searching-book input:focus {
            border: 2px solid rgba(19, 198, 220, 0.7);
        }
        .title-box {
            position: absolute; 
            width: 100%; 
            top: calc(3.2rem + 60px); 
            text-align: center; 
            background: rgba(19, 198, 220, 0.7); 
            backdrop-filter: blur(9px);
            padding-bottom: 10px; 
            padding-top: 10px; 
            color: #fff; 
            z-index: 11;
        }
        .modal.fade {
            margin-top: 6.3rem !important;
            z-index: 1100;
        }
        .modal-backdrop {
            z-index: 10 !important;
        }
        h4 {
            display: inline;
        }
        
        /* User dropdown */
        .my-dropdown-menu {
            position: absolute;
            right: -5px;
            top: 3.5rem;
            background: #fff;
            border-radius: 3px;
            text-align: center;
            z-index: 20;
            border-radius: 4px;
            opacity: 0;
            transition: .15s ease-in-out;
            transform: translateY(10px);
            pointer-events: none;
        }
        .user-dropdown-menu.active .my-dropdown-menu {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }
        .my-dropdown-menu .indicator {
            position: absolute;
            width: 30px;
            height: 30px;
            transform: rotate(45deg) translateY(15px);
            background: var(--greencanyon);
            top: -1rem;
            right: -3px;
            border-radius: 4px;
        }
        .my-dropdown-menu .indicator::before {
            content: '';
            position: absolute;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: transparent;
            top: -5px;
            left: -30px;
            box-shadow: 26px 7.5px var(--greencanyon);
        }
        .my-dropdown-menu .indicator::after {
            content: '';
            position: absolute;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: transparent;
            top: -30px;
            left: -5px;
            box-shadow: 7.5px 26px var(--greencanyon);
            pointer-events: none;
        }
        .dropdown-user .user-info  {
            max-width: 100%;
            max-height: 100%;
            padding-top: 1rem;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            background: var(--greencanyon);
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
        }
        .dropdown-user .user-info div {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid #fff;
        }
        .dropdown-user .user-info img{
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: relative;
        }
        .dropdown-user .user-info p {
            margin-top: 10px;
            color: var(--white);
            line-height: 20px;
            font-size: 0.9rem;
            white-space: nowrap;
        }
        .dropdown-user .link-box {
            display: flex;
            align-items: center;
            justify-content: space-around;
            padding: 0.7rem;
        }
        .dropdown-user .link-box a {
            font-size: 0.8rem;
            font-weight: 400;
            white-space: nowrap;
            padding: 4px 8px;
            border-radius: 3px;
            text-decoration: none;
            border: 1px solid var(--greencanyon);
            color: var(--greencanyon);
        }
        .dropdown-user .link-box a:hover {
            background: var(--greencanyon);
            color: #fff;
        }
        /* end user dropdown */
        /* END HEADER */

        /* CONTENT */
        .container.mt-six {
            margin-top: calc(8.5rem + 60px) !important;
            position: relative;
            z-index: 11;
            margin-bottom: 5rem;
        }
        /* END CONTENT */

        /* FOOTER*/
        .my-footer {
            position: absolute;
            bottom: 0;
            height: 60px;
            width: 100%;
            background-color: var(--greencanyon);
            color: #fff;
            display: flex;
            padding-left: 20px;
            align-items: center;
            padding-top: 17px;
            /* z-index: 10; */
            /* border-bottom: 20px solid var(--greencanyon); */
        }
        /* END FOOTER */

        /* Responsive */
        @media (min-width: 1000px) {
            /* nav.navbar .user-dropdown-menu span {
                position: absolute;
                right: 5vw;
            } */
            .navbar-brand, nav.navbar .user-dropdown-menu {
                margin-left: 20px;
                margin-right: 20px;
            }
            .navbar-light .navbar-nav .nav-link {
                padding: 0 16px !important;
            }
        }
        @media (max-width: 990px) {
            nav.navbar {
                margin: 0;
                width: 100%;
            }
            nav.navbar .navbar-brand {
                order: 2;
            }
            nav.navbar .user-dropdown-menu {
                order: 3;
            }
            .my-navbar-collapse {
                overflow: hidden;
                order: 4;
            }
            .my-collapse:not(.show).my-navbar-collapse {
                height: 0px;
            }
            .my-collapse.show {
                margin-top: 7px;
                border-top: 1px solid lightblue;
            }
            .my-collapse:not(.login).show {
                height: 126px;
            }
            .my-collapse.login:not(.admin).show {
                height: 127px;
            }
            .my-collapse.login.admin.show {
                height: 165px;
            }
            .navbar-light .navbar-nav .nav-link {
                padding-left: 10px;
                padding-top: 14px;
            }
            .my-dropdown-menu {
                right: -8px;
            }
            .nama-user {
                display: none;
            }
            .my-footer {
                justify-content: center;
            }
        }
        @media (max-width: 570px) {
            .container {
                width: 100%;
                margin: 0;
            }
        }
        /* end responsive */
    </style>
</head>

<body>
<div class="wrapper">
    <div class="topbar">
        <div class="brand">
        <a class="navbar-brand" href="<?= base_url(); ?>"><img style="max-width: 135px; height: 50px; width: 100%; height: 100%;" src="<?= base_url('assets/img/logo/'); ?>second_logo_neo.png" alt=""></a>
        </div>
    </div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light show">
        <div class="container">

            <!-- Logo and toggle button -->
            <button id="toggler" class="navbar-toggler" type="button">
                <span><i class="fas fw fa-bars"></i></span>
            </button>
            <!-- end Logo and toggle button -->
            <!-- Menu -->
            <div class="my-collapse my-navbar-collapse <?= $user == 'Pengunjung' ? '' : 'login'; ?> <?php if (isset($user['role_id'])) echo $user['role_id'] == 1 ? 'admin' : 'bukan'; ?>" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                    <a class="nav-item nav-link" href="<?= base_url(); ?>">Home<span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="#" data-toggle="modal" data-target="#categoryModal">Kategori<span class="sr-only">(current)</span></a>
                    
                    <?php
                    if (!empty($this->session->userdata('email'))) { ?>
                        <?php 
                        if ($this->session->userdata("role_id") == 1) { ?>
                            <a href="<?= base_url('admin'); ?>" class="nav-item nav-link">Admin</a>
                            <?php
                        }?>
                        <a href="<?= base_url('booking'); ?>" class="nav-item nav-link booking"><abbr title="Keranjang Booking" style="cursor: pointer;"><i class="fas fw fa-shopping-cart"></i><span><?= $this->ModelBooking->getDataWhere('temp', ['email_user' => $this->session->userdata('email')])->num_rows(); ?></span></abbr></a>
                    <?php } else { ?>
                        <a href="#" data-toggle="modal" onclick="loginShow()" data-target="#daftarModal" class="nav-item nav-link">Daftar</a>
                        <?php } ?>
                    </div>
            </div>
            <!-- end menu -->
            <!-- Searching book -->
            <div class="searching-book">
                <form action="<?= base_url('home/cari_buku') ?>" method="post">
                    <input type="text" name="keyword" id="searchBook" placeholder="Cari judul buku...">
                </form>
            </div>
            <!-- end searching book -->
            <!-- User Information -->
            <div class="user-dropdown-menu" data-Mydropdown>
                <?php if ($user != 'Pengunjung') { ?>
    
                    <a class="isLogin" id="userInformation" data-username="kosong" data-Mydropdown-button>
                        <span class="nama-user">
                            <?= $user['nama'] ?>
                        </span>
                        <span class="img-user">
                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="user image" >
                        </span>
                    </a>
                    <div class="my-dropdown-menu">
                        <div class="indicator"></div>
                        <div class="dropdown-user">
                            <div class="user-info">
                                <div>
                                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="">
                                </div>
                                <p><?= $user['nama'] ?></p>
                            </div>
                            <div class="link-box">
                                <a href="<?= base_url('member/logout'); ?>" style="margin-right: 0.5rem;">Log Out</a>
                                <a href="<?= base_url('member/myprofil'); ?>" style="margin-left: 0.5rem;">My Profile</a>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <a href="#" data-toggle="modal" onclick="daftarShow()" data-target="#loginModal" class="nav-item nav-link"><i class="fas fw fa-sign-in-alt"></i></a>
                <?php } ?>
            </div>
            <!-- End User Information -->
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="title-box">
        <h4 style="font-size: 1rem; font-weight: 400;"><?= $title ?></h4>
    </div>
    <div class="container mt-six">