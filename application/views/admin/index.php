<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Buat laporan</a> -->
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
                     <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $revisipengajuan?></div>
                     <!-- ini sudah dinamis -->
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
                     <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalProses?></div>
                     <!-- datanya belum dinamis -->
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
      <div class="col-md-12">
         <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-primary">Pengajuan tervalidasi</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
               <div class="chart-area">
                  <canvas id="myChart" height="100px"></canvas>
               </div>
            </div>
         </div>
      </div>

      <!-- Pie Chart -->
   </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
$(document).ready(function() {

   const arrayTotalPengajuanDiproses = [];
   const monthPengajuan = [];

   let monthJan = 0;
   let monthFeb = 0;
   let monthMar = 0;
   let monthApr = 0;
   let monthMay = 0;
   let monthJun = 0;
   let monthJul = 0;
   let monthAug = 0;
   let monthSep = 0;
   let monthOct = 0;
   let monthNov = 0;
   let monthDec = 0;

   $.get("<?= site_url('admin/graphpengajuan')?>", function(response) {
      const data = JSON.parse(response);
      const currentYear = new Date().getFullYear();
      data.map((data) => {
         const jsDate = new Date(data.TGL_P_DISETUJUI).toString();
         let splited = jsDate.split(" ");
         if (splited[3] == currentYear) {
            if (splited[1] == "Jan") {
               monthJan += 1;
               if (monthPengajuan.includes("Jan") != true) {
                  monthPengajuan.push("Jan");
               }

            } else if (splited[1] == "Feb") {
               monthFeb += 1;
               if (monthPengajuan.includes("Feb") != true) {
                  monthPengajuan.push("Feb");
               }

            } else if (splited[1] == "Mar") {
               monthMar += 1;
               if (monthPengajuan.includes("Mar") != true) {
                  monthPengajuan.push("Mar");
               }

            } else if (splited[1] == "Apr") {
               monthApr += 1;
               if (monthPengajuan.includes("Apr") != true) {
                  monthPengajuan.push("Apr");
               }

            } else if (splited[1] == "May") {
               monthMay += 1;
               if (monthPengajuan.includes("May") != true) {
                  monthPengajuan.push("May");
               }

            } else if (splited[1] == "Jun") {
               monthJun += 1;
               if (monthPengajuan.includes("Jun") != true) {
                  monthPengajuan.push("Jun");
               }

            } else if (splited[1] == "Jul") {
               monthJul += 1;
               if (monthPengajuan.includes("Jul") != true) {
                  monthPengajuan.push("Jul");
               }

            } else if (splited[1] == "Aug") {
               monthAug += 1;
               if (monthPengajuan.includes("Aug") != true) {
                  monthPengajuan.push("Aug");
               }

            } else if (splited[1] == "Sep") {
               monthSep += 1;
               if (monthPengajuan.includes("Sep") != true) {
                  monthPengajuan.push("Sep");
               }

            } else if (splited[1] == "Oct") {
               monthOct += 1;
               if (monthPengajuan.includes("Oct") != true) {
                  monthPengajuan.push("Oct");
               }

            } else if (splited[1] == "Nov") {
               monthNov += 1;
               if (monthPengajuan.includes("Nov") != true) {
                  monthPengajuan.push("Nov");
               }

            } else if (splited[1] == "Dec") {
               monthDec += 1;
               if (monthPengajuan.includes("Dec") != true) {
                  monthPengajuan.push("Dec");
               }
            }
         };

      });

      if (monthJan != 0) {
         arrayTotalPengajuanDiproses.push(monthJan);
      }

      if (monthFeb != 0) {
         arrayTotalPengajuanDiproses.push(monthFeb);
      }

      if (monthMar != 0) {
         arrayTotalPengajuanDiproses.push(monthMar);
      }

      if (monthApr != 0) {
         arrayTotalPengajuanDiproses.push(monthApr);
      }

      if (monthMay != 0) {
         arrayTotalPengajuanDiproses.push(monthMay);
      }

      if (monthJun != 0) {
         arrayTotalPengajuanDiproses.push(monthJun);
      }

      if (monthJul != 0) {
         arrayTotalPengajuanDiproses.push(monthJul);
      }

      if (monthAug != 0) {
         arrayTotalPengajuanDiproses.push(monthAug);
      }

      if (monthSep != 0) {
         arrayTotalPengajuanDiproses.push(monthSep);
      }

      if (monthOct != 0) {
         arrayTotalPengajuanDiproses.push(monthOct);
      }

      if (monthNov != 0) {
         arrayTotalPengajuanDiproses.push(monthNov);
      }

      if (monthDec != 0) {
         arrayTotalPengajuanDiproses.push(monthDec);
      }

      var ctx = document.getElementById('myChart');
      var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
            labels: monthPengajuan,
            datasets: [{
               label: 'tervalidasi',
               data: arrayTotalPengajuanDiproses,
               backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
               ],
               borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
               ],
               borderWidth: 1
            }]
         },
         options: {
            scales: {
               yAxes: [{
                  ticks: {
                     beginAtZero: true
                  }
               }]
            }
         }
      });



   });






});
</script>