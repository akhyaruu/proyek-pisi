<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Transaksi Pengajuan</h1>
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
                           <th scope="col">UKM</th>
                           <th scope="col">Kegiatan</th>
                           <th scope="col">Tgl Acara</th>
                           <th scope="col">Tgl Revisi</th>
                           <th scope="col">Status</th>
                           <th scope="col">Aksi</th>
                        </tr>
                     </thead>
                     <tbody id="tBodyTransaksi">
                        <tr>
                           <td>1</td>
                           <td>UQPI</td>
                           <td>Kegiatan Baru</td>
                           <td>20-07-2000</td>
                           <td>Belum Revisi</td>
                           <td class="text-secondary"><i class="fas fa-hourglass-half"></i> Sedang Berjalan</td>
                           <td>
                              <button class="btn btn-sm btn-primary" disabled>Download SPJ</button>
                              <button class="btn btn-sm btn-warning" disabled>Revisi</button>
                              <button class="btn btn-sm btn-success" disabled>Selesai</button>
                           </td>
                        </tr>
                        <tr>
                           <td>2</td>
                           <td>UQPI</td>
                           <td>Kegiatan Baru</td>
                           <td>20-07-2000</td>
                           <td>Belum Revisi</td>
                           <td class="text-success"><i class="far fa-file-pdf"></i> Menyerahkan SPJ</td>
                           <td>
                              <button class="btn btn-sm btn-primary">Download SPJ</button>
                              <button class="btn btn-sm btn-warning" data-toggle="modal"
                                 data-target="#modalRevisi">Revisi</button>
                              <button class="btn btn-sm btn-success">Selesai</button>
                           </td>
                        </tr>
                        <tr>
                           <td>2</td>
                           <td>UQPI</td>
                           <td>Kegiatan Baru</td>
                           <td>20-07-2000</td>
                           <td>31-07-2000</td>
                           <td class="text-warning"><i class="fas fa-undo"></i> Revisi SPJ</td>
                           <td>
                              <button class="btn btn-sm btn-primary" disabled>Download SPJ</button>
                              <button class="btn btn-sm btn-warning">Revisi</button>
                              <button class="btn btn-sm btn-success">Selesai</button>
                           </td>
                        </tr>

                     </tbody>
                  </table>
               </div>

               <nav aria-label="Page navigation example">
                  <ul class="pagination">
                     <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                           <span aria-hidden="true">&laquo;</span>
                        </a>
                     </li>
                     <li class="page-item"><a class="page-link" href="#">1</a></li>
                     <li class="page-item"><a class="page-link" href="#">2</a></li>
                     <li class="page-item"><a class="page-link" href="#">3</a></li>
                     <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                           <span aria-hidden="true">&raquo;</span>
                        </a>
                     </li>
                  </ul>
               </nav>

            </div>
         </div>
      </div>
   </div>

   <!-- Modal Revisi -->
   <div class="modal fade" id="modalRevisi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Kirim Revisi</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               ...
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-primary">Kirim ke pengaju</button>
            </div>
         </div>
      </div>
   </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->