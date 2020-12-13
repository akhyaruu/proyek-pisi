<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Histori Transaksi Pengajuan</h1>
   </div>

   <div class="row">
      <div class="input-group col-md-12 mb-3">
         <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"> <i class="fas fa-search"></i></span>
         </div>
         <input id="cariTransaksi" type="text" class="form-control" placeholder="Cari pengajuan...">
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
                           <th scope="col">Pengaju</th>
                           <th scope="col">UKM</th>
                           <th scope="col">Kegiatan</th>
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
                           <td>Akhir Tahun</td>
                           <td>12-07-2015</td>
                           <td class="text-success">Selesai</td>
                           <td>
                              <button class="btn btn-sm btn-primary">Download Pengajuan</button>
                              <button class="btn btn-sm btn-primary">Download SPJ</button>
                           </td>
                        </tr>


                     </tbody>
                  </table>
               </div>

            </div>
         </div>
      </div>
   </div>

   <!-- Modal Persetujuan -->
   <div class="modal fade" id="modalPersetujuan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Ulang</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               Apakah kamu yakin untuk menyetujui pengajuan ini?
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-primary">Ya, saya setuju</button>
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

<script>
if (document.readyState === 'complete') {
   console.log('ya');
}
</script>