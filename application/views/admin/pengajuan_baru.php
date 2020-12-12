<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Daftar Pengajuan Baru</h1>
   </div>

   <div class="row">
      <div class="input-group col-md-6 mb-3">
         <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"> <i class="fas fa-search"></i></span>
         </div>
         <input id="cariTransaksi" type="text" class="form-control" placeholder="Cari pengajuan...">
      </div>
      <div class="col-md-6">
         <p class="mr-2 d-block d-md-inline">Berdasarkan tgl</p>
         <input type="date">
         <!-- <span>-</span> -->
         <input type="date">
      </div>
   </div>

   <!-- Content Row -->
   <!-- Content Row -->
   <div class="row mb-5">
      <div class="col-md-12">
         <div class="card shadow-sm">
            <div class="card-body">
               <div class="table-responsive-md">
                  <table class="table">
                     <thead class="thead-dark">
                        <tr>
                           <th scope="col">No.</th>
                           <th scope="col">Nama Pengaju</th>
                           <th scope="col">UKM</th>
                           <th scope="col">Kegiatan</th>
                           <th scope="col">Aksi</th>
                        </tr>
                     </thead>
                     <tbody id="tBodyTransaksi">
                        <td>Ilham</td>
                        <td>Ilham</td>
                        <td>Ilham</td>
                        <td>Ilham</td>
                        <td>
                           <button class="btn btn-sm btn-info">Download Pengajuan</button>
                           <button class="btn btn-sm btn-success">Disetujui</button>
                           <button class="btn btn-sm btn-warning">Revisi</button>
                           <button class="btn btn-sm btn-danger float-right">Tolak</button>
                        </td>
                     </tbody>
                  </table>
               </div>

            </div>
         </div>
      </div>
   </div>






</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->