<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SIA Total Buah Segar - <?=$title ?></title>
        <link href="<?=base_url("assets/sb-admin/dist/css/styles.css") ?>" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="<?=base_url("assets/css/dataTable.bootstrap4.css") ?>" rel="stylesheet" crossorigin="anonymous" />
        <link href="<?=base_url("assets/css/buttons.dataTables.min.css") ?>" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="<?=base_url() ?>">SIA Total Buah segar</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i> <?=$this->session->userdata("username") ?></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?=base_url() ?><?=$this->session->userdata("level") ?>/profile">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?=base_url("Auth/logout") ?>">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                       <?php include "sidebar.php" ?>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Dashboard :</div>
                        SI-Absen Total Buah Segar
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <?php if ($this->session->flashdata("msg_err")) { ?>
                            <div class="alert alert-danger mt-1"><?=$this->session->flashdata("msg_err") ?></div>
                        <?php } elseif ($this->session->flashdata("msg_scc")) { ?>
                            <div class="alert alert-success mt-1"><?=$this->session->flashdata("msg_scc") ?></div>
                        <?php } ?>
                        <h1 class="mt-4"><?=$title ?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard<?=$bc ?></li>
                        </ol>
