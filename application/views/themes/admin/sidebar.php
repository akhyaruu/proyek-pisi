<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Dashboard Admin</title>
   <link href="<?= base_url('assets/admin/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
   <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
   <link href="<?= base_url('assets/admin/css/sb-admin-2.min.css')?>" rel="stylesheet">
   <script src="<?= base_url('assets/admin/vendor/jquery/jquery.min.js')?>"></script>
   <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
   <script charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>

</head>

<body id="page-top">
   <!-- Page Wrapper -->
   <div id="wrapper">
      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

         <!-- Sidebar - Brand -->
         <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <!-- <div class="sidebar-brand-icon rotate-n-15">
               <i class="fas fa-laugh-wink"></i>
            </div> -->
            <div class="sidebar-brand-text mx-3">Hai <?=$this->session->userdata('NAMA_USER')?></div>
         </a>

         <!-- Divider -->
         <hr class="sidebar-divider my-0">

         <!-- Nav Item - Dashboard -->
         <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin')?>">
               <i class="fas fa-chart-line"></i>
               <span>Dashboard</span></a>
         </li>

         <!-- Divider -->
         <hr class="sidebar-divider">

         <!-- Heading -->
         <div class="sidebar-heading">
            Pengajuan Kegiatan
         </div>

         <!-- Nav Item - Tables -->
         <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/pengajuanbaru')?>">
               <i class="far fa-file-alt"></i>
               <span>Pengajuan Baru</span></a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/transaksipengajuan')?>">
               <i class="far fa-check-square"></i>
               <span>Transaksi Pengajuan</span></a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/historipengajuan')?>">
               <i class="fas fa-history"></i>
               <span>Histori Transaksi</span></a>
         </li>

         <!-- Divider -->
         <hr class="sidebar-divider">

         <!-- Sidebar Toggler (Sidebar) -->
         <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>

      </ul>
      <!-- End of Sidebar -->