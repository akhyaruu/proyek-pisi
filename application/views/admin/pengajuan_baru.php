<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Pengajuan Baru</h1>
   </div>

   <div class="row">
      <!-- <div class="input-group col-md-8 mb-3">
         <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"> <i class="fas fa-search"></i></span>
         </div>
         <input id="cariPengajuan" type="text" class="form-control" placeholder="Cari pengajuan...">
      </div>
      <div class="col-md-4">
         <p class="mr-4 d-block d-md-inline">Berdasarkan status</p>
         <select id="statusPengajuan">
            <option value="Antri">Antri</option>
            <option value="Revisi">Revisi</option>
         </select>
      </div> -->
      <div class="form-group col-md-4">
         <label for="exampleFormControlSelect1">Filter Berdasarkan Status</label>
         <select class="form-control" id="statusPengajuan">
            <option value="Antri">Antri</option>
            <option value="Revisi">Revisi</option>
            <option value="Menyerahkan Revisi">Menyerahkan Revisi</option>
         </select>
      </div>
   </div>

   <?php if ($this->session->flashdata('pesan')) : ?>
   <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= $this->session->flashdata('pesan')?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
      </button>
   </div>
   <?php elseif ($this->session->flashdata('error')) :?>
   <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <?= $this->session->flashdata('error')?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
      </button>
   </div>
   <?php endif; ?>

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

                     <tbody id="tBodyPengajuan">
                        <?php $no = 1?>
                        <?php foreach ($pengajuan as $pj): ?>

                        <?php if ($pj->STATUS_PENGAJUAN !== 'Disetujui') : ?>
                        <tr>
                           <td><?= $no++?></td>
                           <td><?= $pj->NAMA_USER?></td>
                           <td><?= $pj->NAMA_UKM?></td>
                           <td><?= $pj->NAMA_ACARA?></td>
                           <td><?= date('d F Y', strtotime($pj->TGL_ACARA))?></td>

                           <?php if ($pj->STATUS_PENGAJUAN == 'Antri') : ?>
                           <td><i class="fas fa-hourglass-start"></i> Antri</td>
                           <?php elseif ($pj->STATUS_PENGAJUAN == 'Revisi') : ?>
                           <td class="text-warning"><i class="fas fa-undo"></i> Revisi</td>
                           <?php else : ?>
                           <td class="text-success"><i class="far fa-file-pdf"></i></i> Menyerahkan Revisi</td>
                           <?php endif; ?>

                           <td>
                              <?php if ($pj->STATUS_PENGAJUAN !== 'Revisi') : ?>
                              <a href="<?= site_url('admin/downloadPengajuan/'.$pj->ID_PENGAJUAN)?>"
                                 class="btn btn-sm btn-primary">Download Pengajuan</a>
                              <a href="<?= site_url('admin/setujuiPengajuan/'.$pj->ID_PENGAJUAN)?>"
                                 class="btn btn-sm btn-success"
                                 onclick="return confirm('apakah kamu yakin mensetujui pengajuan <?= $pj->NAMA_USER?> ?')">Disetujui</a>
                              <?php endif; ?>
                              <button id="bRevisi" class="btn btn-sm btn-warning" data-toggle="modal"
                                 data-target="#modalRevisi" value="<?= $pj->ID_PENGAJUAN?>">Revisi</button>
                              <?php if ($pj->STATUS_PENGAJUAN !== 'Revisi') : ?>
                              <a href="<?= site_url('admin/hapusPengajuan/'.$pj->ID_PENGAJUAN)?>"
                                 class="btn btn-sm btn-danger"
                                 onclick="return confirm('apakah kamu yakin menghapus pengajuan <?= $pj->NAMA_USER?> ?')">Hapus</a>
                              <?php endif; ?>
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
            <form action="<?= site_url('admin/revisiPengajuan')?>" method="post" enctype="multipart/form-data">
               <div class="modal-body">
                  Masukan file revisi pengajuan
                  <div>
                     <input type="file" class="mt-3" name="filerevisi">
                     <input id="idRevisi" type="text" name="idpengajuan" value="" hidden>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<script>
$(document).ready(function() {

   $("#bRevisi").click(function() {
      $('#idRevisi').val($('#bRevisi').val());
   });

   // cari pengajuan baru
   $("#cariPengajuan").keyup(function() {
      const nilai = $(this).val();
      if (nilai) {
         $.get("<?= site_url('admin/caripengajuan/')?>" + nilai, function(response) {
            const data = JSON.parse(response);
            let output = '';
            // $("#tBodyPengajuan").empty();

         });
      }

   });

});
</script>