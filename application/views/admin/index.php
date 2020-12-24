<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Buat laporan</a>
   </div>

   <!-- Content Row -->
   <div class="row">

      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Pengajuan Baru</div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pengajuanbaru?></div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Revisi Pengajuan
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $revisipengajuan?></div> <!-- ini sudah dinamis -->
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-undo fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Pengajuan Diproses</div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalProses?></div> <!-- datanya belum dinamis -->
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-user-check fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Pengajuan
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">
                     <?= $total?>
                     </div> <!-- datanya belum dinamis -->
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-file fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>


   </div>

   <!-- Content Row -->

   <div class="row">

      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
         <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-primary">Pengajuan tervalidasi</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
               <div class="chart-area">
                  <canvas id="myAreaChart"></canvas>
               </div>
            </div>
         </div>
      </div>

      <!-- Pie Chart -->
      <div class="col-xl-4 col-lg-5">
         <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-primary">Daftar UKM</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
               <div class="chart-pie pt-4 pb-2">
                  <canvas id="myPieChart"></canvas>
               </div>
               <div class="mt-4 text-center small">

               </div>
            </div>
         </div>
      </div>
   </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->