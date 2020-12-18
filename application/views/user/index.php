<div class="container mt-5">
   <h1>Form Pengajuan Kegiatan</h1>
   <h2>NIM : <?=$this->session->userdata('NIM')?></h2>
   <h2>Nama : <?=$this->session->userdata('NAMA_USER')?></h2>
   <div class="row mb-3">
      <div class="col-lg-6">
         <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
            tambah data
         </button>
      </div>
   </div>
   <?php if ($this->session->flashdata('pesan')):?>

   <div class="row mt-3">
      <div class="col-md-6">

         <?= $this->session->flashdata('pesan'); ?>

      </div>
   </div>
   <?php endif; ?>
   <table class="table table-bordered">
      <thead>
         <tr>
            <th scope="col" class="table-dark">No</th>
            <th scope="col" class="table-dark">Nama Ukm</th>
            <th scope="col" class="table-dark">Nama Kegiatan</th>
            <th scope="col" class="table-dark">Tgl Kegiatan</th>
            <th scope="col" class="table-dark">Status</th>
            <th scope="col" class="table-dark">Upload / Aksi</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach($x['0'] as $pj): ?>
         <tr>
            <td><?= ++$start?></td>
            <td><?= $pj['NAMA_UKM']?></td>
            <td><?= $pj['NAMA_ACARA']?></td>
            <td><?= $pj['TGL_ACARA']?></td>
            <td><?= $pj['STATUS_PENGAJUAN']?> </td>
            <td><a href="<?=base_url(); ?>user/hapus/<?= $pj['ID_PENGAJUAN']; ?>" n
                  class="badge badge-danger tombol-hapus ml-1"
                  onclick="return confirm('apakah kamu yakin menghapus pengajuan ini');">hapus</a>
               <a href="<?=base_url(); ?>user/ubah/<?= $pj['ID_PENGAJUAN']; ?>" n
                  class="badge badge-warning tombol-hapus ml-1 tampilModalUbah" data-toggle="modal"
                  data-target="#formModal" data-id="<?= $pj['ID_PENGAJUAN']; ?>">ubah</a>
               <?php if ($pj['STATUS_PENGAJUAN'] == 'revisi') : ?>
               <a href="<?=base_url(); ?>user/revisi/<?= $pj['ID_PENGAJUAN']; ?>" class="badge badge-success ml-1 tampilModalRevisi" data-toggle="modal"
                  data-target="#formModalRevisi" data-id="<?= $pj['ID_PENGAJUAN']; ?>">revisi</a>
               <?php endif; ?>

               <a href="" class="badge badge-primary ml-1">spj</a>
            </td>
         </tr>
         <?php endforeach; ?>
      </tbody>
   </table>
   <?= $this->pagination->create_links(); ?>

   <!-- logout -->
   <a href="<?= base_url('login/logout')?>"><button class="btn btn-warning mb-3">Keluar</button></a>

</div>

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
      <div class="modal fade " id="formModalRevisi" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="formModalLabelRevisi">Revisi Proposal</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <form action="<?php echo base_url(); ?>user/tambah" method="post" enctype="multipart/form-data">
                     <input type="hidden" name='id_rev' id='id_rev' value="1">

                        <div class="form-group">
                           <label for="exampleFormControlFile1">Upload Proposal</label>
                           <input type="file" class="form-control-file" id="exampleFormControlFile1" name="proposal_revisi">
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
      