<div class="container mt-5">
      <h1>Form Pengajuan Kegiatan</h1>
      <div class="row mb-3">
         <div class="col-lg-6">
            <button type="button" class="btn btn-primary btnTambah" data-toggle="modal" data-target="#formModal">
               tambah data
            </button>
         </div>
      </div>
    <?php if ($this->session->flashdata('flash')):?>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>    
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
            </tr>
         </thead>
         <tbody>
            <tr>
               <th scope="row">1</th>
               <td>ukor</td>
               <td>Mancing Bersama</td>
               <td>12-12-2020</td>
               <td>Proses <button type="button" class="btn btn-danger float-right">SPJ</button></td>
            </tr>
         </tbody>
      </table>
      <nav aria-label="Page navigation example">
         <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
         </ul>
      </nav>
   </div>
   <!-- Modal -->
   <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="judulModalLabel">Tambah Data Pengajuan</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
         <h1>
         </h1>
               <form action="<?php echo base_url(); ?>user/tambah" method="post">
                  <input type="hidden" name='id' id='id' value="1">
                  <div class="form-group">
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
                        
                        <?php foreach($fakultas as $fk): ?>
                            <option value="<?= $fk['ID_FAKULTAS']?>"><?= $fk['NAMA_FAKULTAS']?></option>
                        <?php endforeach; ?>
                    
                     </select>
                  </div>
                  
                     <div class="form-group">
                        <label for="exampleFormControlFile1">Upload Proposal</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
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
   