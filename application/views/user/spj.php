
   
   <div class="card mt-5">
  <div class="card-header ">
  <b>Form SPJ</b>
  </div>
  <div class="card-body">
    
    <p class="card-text"><b>NIM : <?=$this->session->userdata('NIM')?></b></p>
    <p class="card-text"><b>Nama : <?=$this->session->userdata('NAMA_USER')?></b></p>
  </div>
</div>

   <?php if ($this->session->flashdata('pesan')):?>

   <div class="row mt-3">
      <div class="col-md-6">

         <?= $this->session->flashdata('pesan'); ?>

      </div>
   </div>
   <?php endif; ?>
   <div class="card shadow-sm mt-3">
      <div class="card-body">
         <div class="table-responsive-md">
            <table class="table table-bordered mt-3">
               <thead>
                  <tr>
                     <th scope="col" class="table-dark">No</th>
                     <th scope="col" class="table-dark">Nama Ukm</th>
                     <th scope="col" class="table-dark">Nama Kegiatan</th>
                     <th scope="col" class="table-dark">Tgl Kegiatan</th>
                     <th scope="col" class="table-dark">Status</th>
                     <th scope="col" class="table-dark">Upload</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach($x['2'] as $pj): ?>
                  <tr>
                     <td><?= ++$start?></td>
                     <td><?= $pj['NAMA_UKM']?></td>
                     <td><?= $pj['NAMA_ACARA']?></td>
                     <td><?= date('d F Y', strtotime($pj['TGL_ACARA']))?></td>
                     <?php if ($pj['STATUS_TPENGAJUAN'] == 'Sedang Berjalan') : ?>
                                    <td class="text-secondary"><i class="fas fa-hourglass-half"></i> Sedang Berjalan</td>
                                    <?php elseif ($pj['STATUS_TPENGAJUAN'] == 'Revisi SPJ') : ?>
                                    <td class="text-warning "><i class="fas fa-undo"></i> Revisi SPJ</td>
                                    <?php elseif ($pj['STATUS_TPENGAJUAN'] == 'Selesai') : ?>
                                       <td class="text-success"><i class="fas fa-check"></i>Selesai</td>
                                    <?php else : ?>
                                    <td class="text-success"><i class="far fa-file-pdf"></i> Menyerahkan SPJ</td>
                                    <?php endif; ?>
                     
                     <td>
                     <?php if ($pj['STATUS_TPENGAJUAN'] == 'Sedang Berjalan') : ?>
                     <a href="<?=base_url(); ?>user/uploadSpj/<?= $pj['ID_TPENGAJUAN']; ?>"  class="badge badge-primary ml-1 tampilModalSpj" data-toggle="modal"
                           data-target="#formModalSpj" data-id="<?= $pj['ID_TPENGAJUAN']; ?>">Spj</a>
                     <?php endif; ?>
                        <?php if ($pj['STATUS_TPENGAJUAN'] == 'Revisi SPJ') : ?>
                        <a href="<?=base_url(); ?>user/revisiSpj/<?= $pj['ID_TPENGAJUAN']; ?>"  class="badge badge-success ml-1 tampilModalRevisiSPJ" data-toggle="modal"
                           data-target="#formModalSpj" data-id="<?= $pj['ID_TPENGAJUAN']; ?>">Revisi</a>
                        <a href="<?=base_url(); ?>user/downloadSpj/<?= $pj['ID_TPENGAJUAN']; ?>"  class="badge badge-primary ml-1">Download SPJ</a>
                        <?php endif; ?>

                        
                     </td>
                  </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
            <?= $this->pagination->create_links(); ?>
         </div>
      </div>
   </div>
   

   <!-- logout -->
   

</div>
      <div class="modal fade" id="formModalSpj" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="formModalLabelSpj">Upload SPJ</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <form action="<?php echo base_url(); ?>user/uploadSpj" method="post" enctype="multipart/form-data">
                     <input type="hidden" name='id_rev' id='id_rev' value="">

                        <div class="form-group">
                           <label for="exampleFormControlFile1">Upload SPJ</label>
                           <input type="file" class="form-control-file" id="exampleFormControlFile1" name="proposal">
                           <small class="form-text text-danger">Harus berformat PDF</small>
                        </div>

                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                     <button type="submit" class="btn btn-primary">Tambah Data</button>
                  </div>
                  </form>

            </div>
         </div>
      </div>
      </div>
     
      