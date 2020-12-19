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

   <a href="#" class="d-none mb-3 mt-1 d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
         class="fas fa-download fa-sm text-white-50"></i> Buat laporan</a>
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
                           <th scope="col">Total Revisi</th>
                           <th scope="col">Status</th>
                           <th scope="col">Download File</th>
                        </tr>
                     </thead>
                     <tbody id="tBodyTransaksi">
                        <?php $no = 1?>
                        <?php foreach ($histori as $ht): ?>
                        <?php if ($ht->STATUS_TPENGAJUAN === 'Selesai') : ?>
                        <tr>
                           <td><?= $no++?></td>
                           <td><?= $ht->NAMA_USER?></td>
                           <td><?= $ht->NAMA_UKM?></td>
                           <td><?= $ht->NAMA_ACARA?></td>
                           <td><?= date('d F Y', strtotime($ht->TGL_ACARA))?></td>
                           <td><?= $ht->JUMLAH_REV + $ht->JUMLAH_REV_SPJ?></td>
                           <td class="text-success"><i class="fas fa-check"></i> <?= $ht->STATUS_TPENGAJUAN?></td>
                           <td>
                              <a href="<?= site_url('admin/downloadPengajuanTransaksi/'.$ht->ID_TPENGAJUAN)?>"
                                 class="btn btn-sm btn-primary">Pengajuan</a>
                              <a href="" class="btn btn-sm btn-primary">SPJ</a>
                           </td>
                        </tr>
                        <?php endif; ?>
                        <?php endforeach; ?>

                     </tbody>
                  </table>
               </div>
               <?= $this->pagination->create_links(); ?>

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