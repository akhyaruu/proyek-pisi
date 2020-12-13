$(function() {

    $('.tombolTambahData').on('click', function() {
        $('#formModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#nama').val('');
        $('#nrp').val('');
        $('#email').val('');
        $('#jurusan').val('');
        $('#id').val('');
    });


    $('.tampilModalUbah').on('click', function() {
        
        $('#formModalLabel').html('Ubah Data Mahasiswa');
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
                $('#nama_ukm').val(data.nama_ukm);
                $('#nama_kegiatan').val(data.nama_acara);
                $('#datepicker').val(data.tgl_acara);
                $('#kategori').val(data.id_fakultas);
                $('#id').val(data.id_pengajuan);
            }
        });
        
    });

});