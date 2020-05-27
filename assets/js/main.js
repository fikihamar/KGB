$(document).ready(function () {
    var id_dokter;

    DisplayData();

    $('#update').hide();

    $('#save').on('click', function () {
        if ($('#nama').val() == "" || $('#usia').val() == "" || $('#spealisasi').val() == "" || $('#alamat').val() == "") {
            alert("Hello World");
        } else {
            var nama = $('#nama').val();
            var usia = $('#usia').val();
            var spealisasi = $('#spealisasi').val();
            var alamat = $('#alamat').val();
            $.ajax({
                url: 'config/config-save.php',
                type: 'POST',
                data: {
                    firstname: firstname,
                    lastname: lastname,
                    address: address
                },
                success: function (data) {
                    $('#nama').val('');
                    $('#usia').val('');
                    $('#spealisasi').val('');
                    $('#alamat').val('');
                    DisplayData();
                }
            });
        }

    });

    function DisplayData() {
        $.ajax({
            url: 'config/config-tampil.php',
            type: 'POST',
            data: {
                res: 1
            },
            success: function (response) {
                $('#data').html(response);
            }
        })
    }

    $(document).on('click', '.delete', function () {
        var id = $(this).attr('name');

        $.ajax({
            url: 'config/config-delete.php',
            type: 'POST',
            data: {
                id: id
            },
            success: function (data) {
                DisplayData();
                $('#update').hide();
                $('#save').show();
                $('#nama').val('');
                $('#usia').val('');
                $('#spealisasi').val('');
                $('#alamat').val('');
            }
        });
    })

    $(document).on('click', '.edit', function () {
        var id = $(this).attr('name');

        $.ajax({
            url: 'config/config-edit.php',
            type: 'POST',
            data: {
                id: id
            },
            success: function (response) {
                var getArray = jQuery.parseJSON(response);

                id_dokter = getArray.id_dokter;

                $('#nama').val(getArray.nama);
                $('#usia').val(getArray.usia);
                $('#spealisasi').val(getArray.spealisasi);
                $('#alamat').val(getArray.alamat);

                $('#update').show();
                $('#save').hide();
            }
        })
    });

    $('#update').on('click', function () {
        var nama = $('#nama').val();
        var usia = $('#usia').val();
        var spealisasi = $('#spealisasi').val();
        var alamat = $('#alamat').val();


        $.ajax({
            url: 'config/config-update.php',
            type: 'POST',
            data: {
                id_dokter: id_dokter,
                nama: nama,
                usia: usia,
                spealisasi: spealisasi,
                alamat: alamat
            },
            success: function () {
                DisplayData();
                $('#nama').val('');
                $('#usia').val('');
                $('#spealisasi').val('');
                $('#alamat').val('');

                alert("Successfully Updated!");

                $('#update').hide();
                $('#save').show();

                id_dokter = "";
            }
        });
    });
});