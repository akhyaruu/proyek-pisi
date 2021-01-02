<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Transaksi Pengajuan</h1>
   </div>

   <div class="row">
      <div class="form-group col-md-6">
         <label for="exampleFormControlInput1">Cari Pengajuan</label>
         <input type="email" class="form-control" id="cariTransaksi" placeholder="Ketikan disini...">
      </div>
      <div class="form-group col-md-6">
         <label for="exampleFormControlSelect1">Filter Berdasarkan Status</label>
         <select class="form-control" id="statusTransaksi">
            <option value="Sedang Berjalan">Sedang Berjalan</option>
            <option value="Menyerahkan SPJ">Menyerahkan SPJ</option>
            <option value="Revisi SPJ">Revisi</option>
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
               <div class="table-responsive">
                  <table class="table">
                     <thead class="thead-dark">
                        <tr>
                           <th scope="col">No.</th>
                           <th scope="col">UKM</th>
                           <th scope="col">Kegiatan</th>
                           <th scope="col">Tgl Acara</th>
                           <th scope="col">Tgl Disetujui</th>
                           <th scope="col">Tgl Revisi</th>
                           <th scope="col">Status</th>
                           <th scope="col">Aksi</th>
                        </tr>
                     </thead>
                     <tbody id="tBodyTransaksi">
                        <?php $no = 1?>
                        <?php foreach ($transaksi as $tr): ?>

                        <?php if ($tr->STATUS_TPENGAJUAN !== 'Selesai') : ?>
                        <tr>
                           <td><?= $no++?></td>
                           <td><?= $tr->NAMA_UKM?></td>
                           <td><?= $tr->NAMA_ACARA?></td>
                           <td><?= date('d F Y', strtotime($tr->TGL_ACARA))?></td>
                           <td><?= date('d F Y', strtotime($tr->TGL_P_DISETUJUI))?></td>
                           <?php if ($tr->TGL_REV_SPJ === null) : ?>
                           <td>Belum Revisi</td>
                           <?php else : ?>
                           <td><?= date('d F Y', strtotime($tr->TGL_REV_SPJ))?></td>
                           <?php endif; ?>

                           <?php if ($tr->STATUS_TPENGAJUAN === 'Sedang Berjalan') : ?>
                           <td class="text-secondary"><i class="fas fa-hourglass-half"></i> Sedang Berjalan</td>
                           <?php elseif ($tr->STATUS_TPENGAJUAN == 'Revisi SPJ') : ?>
                           <td class="text-warning "><i class="fas fa-undo"></i> Revisi SPJ</td>
                           <?php else : ?>
                           <td class="text-success"><i class="far fa-file-pdf"></i> Menyerahkan SPJ</td>
                           <?php endif; ?>

                           <td>
                              <?php if ($tr->STATUS_TPENGAJUAN === 'Menyerahkan SPJ') : ?>
                              <a href="<?= site_url('admin/downloadSpj/'.$tr->ID_TPENGAJUAN)?>"
                                 class="btn btn-sm btn-primary">Download SPJ</a>
                              <button class="bRevisi btn btn-sm btn-warning" data-toggle="modal"
                                 data-target="#modalRevisi" value="<?= $tr->ID_TPENGAJUAN?>">Revisi</button>
                              <a href="<?= site_url('admin/setujuiSpj/'.$tr->ID_TPENGAJUAN)?>"
                                 onclick="return confirm('apakah kamu yakin mensetujui spj kegiatan <?= $tr->NAMA_ACARA?> ?')"
                                 class="btn btn-sm btn-success">Selesai</a>
                              <?php else : ?>
                              <span class="text-info font-weight-bold">Menunggu SPJ</span>
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
            <form action="<?= site_url('admin/revisiSpj')?>" method="post" enctype="multipart/form-data">
               <div class="modal-body">
                  Masukan file revisi spj
                  <div>
                     <input type="file" class="mt-3" name="filerevisi">
                     <input id="idRevisi" type="text" name="idrevisi" value="" hidden>
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

   $("#tBodyTransaksi").on("click", "button.bRevisi", function() {
      $('#idRevisi').val($(this).val());
      // $('#coba').text($(this).val());
   });

   // filter status
   $("#statusTransaksi").change(function() {
      const nilai = $(this).val();
      $.post("<?= site_url('admin/filtertransaksi')?>", {
         nilai: nilai
      }, function(data) {

         let output = '';
         let statusRevisi = '';
         let statusTpengajuan = '';
         let statusTpengajuan2 = '';

         const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
         ];

         $("#tBodyTransaksi").empty();
         data.map((data, index) => {
            const tglAcara = new Date(`${data.TGL_ACARA}`);
            const tglDisetujui = new Date(`${data.TGL_P_DISETUJUI}`);
            const tglRevSpj = new Date(`${data.TGL_REV_SPJ}`);

            if (data.TGL_REV_SPJ === null) {
               statusRevisi = `<td>Belum Revisi</td>`;
            } else {
               statusRevisi =
                  `<td>${tglRevSpj.getDate()} ${monthNames[tglRevSpj.getMonth()]} ${tglRevSpj.getFullYear()}</td>`;
            }

            if (data.STATUS_TPENGAJUAN === 'Sedang Berjalan') {
               statusTpengajuan =
                  `<td class="text-secondary"><i class="fas fa-hourglass-half"></i> Sedang Berjalan</td>`;
            } else if (data.STATUS_TPENGAJUAN === 'Revisi SPJ') {
               statusTpengajuan =
                  `<td class="text-warning "><i class="fas fa-undo"></i> Revisi SPJ</td>`;
            } else {
               statusTpengajuan =
                  `<td class="text-success"><i class="far fa-file-pdf"></i> Menyerahkan SPJ</td>`;
            }

            if (data.STATUS_TPENGAJUAN === 'Menyerahkan SPJ') {
               statusTpengajuan2 = `
               <a href="<?= site_url('admin/downloadSpj/').'${data.ID_TPENGAJUAN}'?>" class="btn btn-sm btn-primary">Download SPJ</a>
               <button class="bRevisi btn btn-sm btn-warning" data-toggle="modal" data-target="#modalRevisi" value="${data.ID_TPENGAJUAN}">Revisi</button>
               <a href="<?= site_url('admin/setujuiSpj/').'${data.ID_TPENGAJUAN}'?>"
                  onclick="return confirm('apakah kamu yakin mensetujui spj kegiatan ${data.NAMA_ACARA} ?')"
                  class="btn btn-sm btn-success">Selesai</a>`;
            } else {
               statusTpengajuan2 =
                  `<span class="text-info font-weight-bold">Menunggu SPJ</span>`;
            }

            if (data.STATUS_TPENGAJUAN !== 'Selesai') {
               output += `
                  <tr>
                     <td>${index+1}</td>
                     <td>${data.NAMA_UKM}</td>
                     <td>${data.NAMA_ACARA}</td>
                     <td>${tglAcara.getDate()} ${monthNames[tglAcara.getMonth()]} ${tglAcara.getFullYear()}</td>
                     <td>${tglDisetujui.getDate()} ${monthNames[tglDisetujui.getMonth()]} ${tglDisetujui.getFullYear()}</td>
                     ${statusRevisi}
                     ${statusTpengajuan}
                     <td>${statusTpengajuan2}</td>
                  </tr>
               `;
            }
         })
         $("#tBodyTransaksi").append(output);
      }, "json");
   });


   // pencarian
   $("#cariTransaksi").keyup(function() {
      const nilai = $(this).val();
      $.post("<?= site_url('admin/pencarianTransaksi')?>", {
         nilai: nilai
      }, function(data) {
         let output = '';
         let statusRevisi = '';
         let statusTpengajuan = '';
         let statusTpengajuan2 = '';

         const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
         ];

         $("#tBodyTransaksi").empty();
         data.map((data, index) => {
            const tglAcara = new Date(`${data.TGL_ACARA}`);
            const tglDisetujui = new Date(`${data.TGL_P_DISETUJUI}`);
            const tglRevSpj = new Date(`${data.TGL_REV_SPJ}`);

            if (data.TGL_REV_SPJ === null) {
               statusRevisi = `<td>Belum Revisi</td>`;
            } else {
               statusRevisi =
                  `<td>${tglRevSpj.getDate()} ${monthNames[tglRevSpj.getMonth()]} ${tglRevSpj.getFullYear()}</td>`;
            }

            if (data.STATUS_TPENGAJUAN === 'Sedang Berjalan') {
               statusTpengajuan =
                  `<td class="text-secondary"><i class="fas fa-hourglass-half"></i> Sedang Berjalan</td>`;
            } else if (data.STATUS_TPENGAJUAN === 'Revisi SPJ') {
               statusTpengajuan =
                  `<td class="text-warning "><i class="fas fa-undo"></i> Revisi SPJ</td>`;
            } else {
               statusTpengajuan =
                  `<td class="text-success"><i class="far fa-file-pdf"></i> Menyerahkan SPJ</td>`;
            }

            if (data.STATUS_TPENGAJUAN === 'Menyerahkan SPJ') {
               statusTpengajuan2 = `
               <a href="<?= site_url('admin/downloadSpj/').'${data.ID_TPENGAJUAN}'?>" class="btn btn-sm btn-primary">Download SPJ</a>
               <button class="bRevisi btn btn-sm btn-warning" data-toggle="modal" data-target="#modalRevisi" value="${data.ID_TPENGAJUAN}">Revisi</button>
               <a href="<?= site_url('admin/setujuiSpj/').'${data.ID_TPENGAJUAN}'?>"
                  onclick="return confirm('apakah kamu yakin mensetujui spj kegiatan ${data.NAMA_ACARA} ?')"
                  class="btn btn-sm btn-success">Selesai</a>`;
            } else {
               statusTpengajuan2 =
                  `<span class="text-info font-weight-bold">Menunggu SPJ</span>`;
            }

            if (data.STATUS_TPENGAJUAN !== 'Selesai') {
               output += `
                  <tr>
                     <td>${index+1}</td>
                     <td>${data.NAMA_UKM}</td>
                     <td>${data.NAMA_ACARA}</td>
                     <td>${tglAcara.getDate()} ${monthNames[tglAcara.getMonth()]} ${tglAcara.getFullYear()}</td>
                     <td>${tglDisetujui.getDate()} ${monthNames[tglDisetujui.getMonth()]} ${tglDisetujui.getFullYear()}</td>
                     ${statusRevisi}
                     ${statusTpengajuan}
                     <td>${statusTpengajuan2}</td>
                  </tr>
               `;
            }
         })
         $("#tBodyTransaksi").append(output);
      }, "json");




   });

});
</script>