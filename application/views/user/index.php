<div class="card mt-5">
   <div class="card-header ">
      <b>Form Pengajuan Kegiatan</b>
   </div>
   <div class="card-body">

      <p class="card-text"><b>NIM : <?=$this->session->userdata('NIM')?></b></p>
      <p class="card-text"><b>Nama : <?=$this->session->userdata('NAMA_USER')?></b></p>
   </div>
</div>

<div class="row mt-3">
   <div class="col-lg-6">
      <a><button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
            tambah data
         </button></a>
   </div>
</div>
<?php if ($this->session->flashdata('pesan')):?>

<div class="row mt-3">
   <div class="col-md-6">

      <?= $this->session->flashdata('pesan'); ?>

   </div>
</div>
   <?php endif; ?>
<div class="row mt-3">  
<div class="col-md-12">
<div class="card">
<div class="card-body">
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th scope="col" class="table-dark">No</th>
                     <th scope="col" class="table-dark">Nama Ukm</th>
                     <th scope="col" class="table-dark">Nama Kegiatan</th>
                     <th scope="col" class="table-dark">Tgl Kegiatan</th>
                     <th scope="col" class="table-dark">Status</th>
                     <th scope="col" class="table-dark">Tgl Revisi</th>
                     <th scope="col" class="table-dark">Jumlah Revisi</th>
                     <th scope="col" class="table-dark">Upload / Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach($x['0'] as $pj): ?>
                  <tr>
                     <td><?= ++$start?></td>
                     <td><?= $pj['NAMA_UKM']?></td>
                     <td><?= $pj['NAMA_ACARA']?></td>
                     <td><?= date('d F Y', strtotime($pj['TGL_ACARA']))?></td>
                     <?php if ($pj['STATUS_PENGAJUAN'] == 'Antri') : ?>
                     <td><i class="fas fa-hourglass-start"></i> Antri</td>
                     <?php elseif ($pj['STATUS_PENGAJUAN'] == 'Revisi') : ?>
                     <td class="text-warning"><i class="fas fa-undo"></i> Revisi</td>
                     <?php elseif ($pj['STATUS_PENGAJUAN'] == 'Menyerahkan Revisi'): ?>
                     <td class="text-success"><i class="far fa-file-pdf"></i></i> Revisi Masuk</td>
                     <?php else :?>
                     <td class="text-success"><i class="fas fa-check"></i>Disetujui</td>
                     <?php endif; ?>
                     <td><?= $pj['TGL_REV_PENGAJUAN']?></td>
                     <td><?= $pj['JUMLAH_REV']?></td>
                     <td>
                        <?php if ($pj['STATUS_PENGAJUAN'] !== 'Disetujui' && $pj['STATUS_PENGAJUAN'] !== 'Revisi' &&  $pj['STATUS_PENGAJUAN'] !== 'Menyerahkan Revisi') : ?>
                        <a href="<?=base_url(); ?>user/hapus/<?= $pj['ID_PENGAJUAN']; ?>" n
                              class="badge badge-danger tombol-hapus ml-1"
                              onclick="return confirm('apakah kamu yakin menghapus pengajuan ini');">Hapus</a>
                        <?php endif; ?>
                        <?php if ($pj['STATUS_PENGAJUAN'] !== 'Disetujui' &&  $pj['STATUS_PENGAJUAN'] !== 'Menyerahkan Revisi') : ?>
                        <a href="<?=base_url(); ?>user/ubah/<?= $pj['ID_PENGAJUAN']; ?>" n
                           class="badge badge-warning tombol-hapus ml-1 tampilModalUbah" data-toggle="modal"
                           data-target="#formModal" data-id="<?= $pj['ID_PENGAJUAN']; ?>">Ubah</a>
                        <?php endif; ?>
                        <?php if ($pj['STATUS_PENGAJUAN'] == 'Revisi') : ?>
                        <a href="<?=base_url(); ?>user/revisi/<?= $pj['ID_PENGAJUAN']; ?>"  class="badge badge-success ml-1 tampilModalRevisi" data-toggle="modal"
                           data-target="#formModalRevisi" data-id="<?= $pj['ID_PENGAJUAN']; ?>">Revisi</a>
                           <a href="<?=base_url(); ?>user/downloadrevisi/<?= $pj['ID_PENGAJUAN']; ?>"  class="badge badge-primary ml-1 ">Download Revisi</a>
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
   

</>


<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="formModalLabel">Tambah Data Pengajuan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="<?php echo base_url(); ?>user/tambah" method="post" enctype="multipart/form-data">
               <input type="hidden" name='id' id='id' value="1">
               <div class="form-group ">
                  <label for="nama_ukm">Nama Ukm</label>
                  <input type="text" class="form-control" id="nama_ukm" name="nama_ukm">

               </div>
               <div class="form-group">
                  <label for="nama_kegiatan">Nama Kegiatan</label>
                  <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan">
               </div>
               <div class="form-group">
                  <label for="datepicker">Tanggal</label>
                  <input type="text" class="form-control" id="datepicker" name="datepicker">
               </div>
               <div class="form-group">
                  <label for="kategori">Pilih Kategori</label>
                  <select class="form-control" id="kategori" name="kategori">
                     <?php foreach($x['1'] as $fk): ?>
                     <option value="<?= $fk['ID_FAKULTAS']?>"><?= $fk['NAMA_FAKULTAS']?></option>
                     <?php endforeach; ?>
                  </select>
               </div>

               <div class="form-group">
                  <label for="exampleFormControlFile1">Upload Proposal</label>
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
<div class="modal fade formModalRevisi" id="formModalRevisi" tabindex="-1" aria-labelledby="judulModal"
   aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="formModalLabelRevisi">Revisi Proposal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="<?php echo base_url(); ?>user/revisi" method="post" enctype="multipart/form-data">
               <input type="hidden" name='id_rev' id='id_rev' value="">

               <div class="form-group">
                  <label for="exampleFormControlFile1">Upload Proposal</label>
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