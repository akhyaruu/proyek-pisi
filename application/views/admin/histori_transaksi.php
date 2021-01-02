<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Histori Transaksi Pengajuan</h1>
   </div>

   <a href="<?= site_url('admin/excel')?>"
      class="d-none mb-3 mt-1 d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
         class="fas fa-download fa-sm text-white-50"></i> Buat laporan</a>
   <!-- Content Row -->
   <div class="row mb-5">
      <div class="col-md-12">
         <div class="card shadow-sm">
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table display" id="tableHistori">
                     <thead class="thead-dark">
                        <tr>
                           <th scope="col">No.</th>
                           <th scope="col">Pengaju</th>
                           <th scope="col">UKM</th>
                           <th scope="col">Kegiatan</th>
                           <th scope="col">Tgl Acara</th>
                           <th scope="col">Tgl Selesai</th>
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
                           <td><?= date('d F Y', strtotime($ht->TGL_T_DISETUJUI))?></td>
                           <td><?= $ht->JUMLAH_REV + $ht->JUMLAH_REV_SPJ?></td>
                           <td class="text-success"><i class="fas fa-check"></i> <?= $ht->STATUS_TPENGAJUAN?></td>
                           <td>
                              <a href="<?= site_url('admin/downloadPengajuanTransaksi/'.$ht->ID_TPENGAJUAN)?>"
                                 class="btn btn-sm btn-primary">Pengajuan</a>
                              <a href="<?= site_url('admin/downloadPengajuanSPJ/'.$ht->ID_TPENGAJUAN)?>"
                                 class="btn btn-sm btn-primary">SPJ</a>
                           </td>
                        </tr>
                        <?php endif; ?>
                        <?php endforeach; ?>

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

<script>
$(document).ready(function() {
   $('#tableHistori').DataTable();
});
</script>