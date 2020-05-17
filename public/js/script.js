$(function() {

    $('.tombolTambahData').on('click', function() {
        // Ubah judul form
        $('#judulModal').html('Tambah Data Donasi');
        // Ubah teks button
        $('.modal-footer button[type=submit]').html('Tambah Data');

        // Ubah action form
        $('.modal form').attr('action', 'http://localhost/integratif/eascovid/public/donasi/add');

        // Kosongkan isi teks
        $('#nama').val("");
        $('#nama_bantuan').val("");
        $('#jumlah_bantuan').val("");
        // $('#time').val("");
        // $('#id').val("");
    });

});