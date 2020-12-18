$(function() {

    $('.tombolTambahData').on('click', function() {
        $('#formModalLabel').html('Tambah Data Pengajuan');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        
    });


    $('.tampilModalUbah').on('click', function() {
        
        $('#formModalLabel').html('Ubah Data Pengajuan');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/proyekpisi/user/ubah');

        const id = $(this).data('id');
        
        $.ajax({
            url: 'http://localhost/proyekpisi/user/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $('#nama_ukm').val(data.NAMA_UKM);
                $('#nama_kegiatan').val(data.NAMA_ACARA);
                $('#datepicker').val(data.TGL_ACARA);
                $('#id').val(data.ID_PENGAJUAN);
            }
        });
        
    });
    $('.tampilModalRevisi').on('click', function() {
        
        $('#formModalLabelRevisi').html('coba');
        $('.modal-footer button[type=submit]').html('Ubah Data revisi');
        $('.modal-body form').attr('action', 'http://localhost/proyekpisi/user/revisi');

        const id = $(this).data('rev');
        
        $.ajax({
            url: 'http://localhost/proyekpisi/user/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $('#id_rev').val(data.ID_PENGAJUAN);
            }
        });
        
    });
   



});