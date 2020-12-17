<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Pengajuan Baru</h1>
   </div>

   <div class="row">
      <div class="input-group col-md-8 mb-3">
         <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"> <i class="fas fa-search"></i></span>
         </div>
         <input id="cariTransaksi" type="text" class="form-control" placeholder="Cari pengajuan...">
      </div>
      <div class="col-md-4">
         <p class="mr-4 d-block d-md-inline">Berdasarkan status</p>
         <select id="cars">
            <option value="volvo">Antri</option>
            <option value="volvo">Revisi</option>
         </select>
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
                           <th scope="col">No</th>
                           <th scope="col">Pengaju</th>
                           <th scope="col">UKM</th>
                           <th scope="col">Acara</th>
                           <th scope="col">Tgl Acara</th>
                           <th scope="col">Status</th>
                           <th scope="col">Aksi</th>
                        </tr>
                     </thead>
                     <tbody id="tBodyTransaksi">
                        <tr>
                           <td>1</td>
                           <td>Ilham</td>
                           <td>UQPI</td>
                           <td>Tahun Baru</td>
                           <td>12-07-2000</td>
                           <td><i class="fas fa-hourglass-start"></i> Antri</td>
                           <td>
                              <button class="btn btn-sm btn-primary">Download Pengajuan</button>
                              <a href="" class="btn btn-sm btn-success"
                                 onclick="return confirm('apakah kamu yakin mensetujui pengajuan ini?')">Disetujui</a>
                              <button class="btn btn-sm btn-warning" data-toggle="modal"
                                 data-target="#modalRevisi">Revisi</button>
                              <button class="btn btn-sm btn-danger float-right"
                                 onclick="return confirm('apakah kamu yakin menghapus pengajuan ini?')">Hapus</button>
                           </td>
                        </tr>
                        <tr>
                           <td>1</td>
                           <td>Ilham</td>
                           <td>UQPI</td>
                           <td>Tahun Baru</td>
                           <td>12-07-2000</td>
                           <td class="text-warning"><i class="fas fa-undo"></i> Revisi</td>
                           <td>
                              <button class="btn btn-sm btn-primary">Download Pengajuan</button>
                              <button class="btn btn-sm btn-success">Disetujui</button>
                              <button class="btn btn-sm btn-warning">Revisi</button>
                              <button class="btn btn-sm btn-danger float-right">Hapus</button>
                           </td>
                        </tr>

                     </tbody>
                  </table>
               </div>

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
               <button type="button" class="btn btn-primary">Submit</button>
            </div>
         </div>
      </div>
   </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
if (document.readyState === 'complete') {
   console.log('ya');
}
</script>