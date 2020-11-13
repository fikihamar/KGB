<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<!-- Bootstrap 4  -->
<script src="../assets/js/bootstrap.min.js"></script>
<script language="javascript">
    $('body').on('hidden.bs.modal', '.modal', function() {
        $(this).removeData('bs.modal');
    });
</script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<!-- datatable -->
<script src="../assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="../assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/js/demo.js"></script>
<!-- DataTables -->
<script>
    $(document).ready(function() {
        $('#table-data').DataTable();
    });
    $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
    $(document).ready(function() {
        $('#btn-filter').on('click', function() {
            let golongan = $('#filter-golongan').find(':selected').val();
            $.get(`config-filter.php?gol=${golongan}`, function(data, status) {
                $('#fill-data').html('')
                result = JSON.parse(data)
                $.each(result, function(index, data) {
                    cekGol = data.id_golongan;
                    cekGol = cekGol.slice(-1);
                    $('#fill-data').append(`<tr>\<td>${data.mkg}\</td>`);
                    if (cekGol == 'a') {
                        $('#fill-data').append(`
                <td>${data.gaji}</td>\
                <td></td>\
                <td></td>\
                <td></td>\
                <td></td>\
                <td>\
                  <a href=''>Edit</a>\
                  <a href=''>Hapus</a>\
                </td>`);
                    } else if (cekGol == 'b') {
                        $('#fill-data').append(`
                <td></td>\
                <td>${data.gaji}</td>\
                <td></td>\
                <td></td>\
                <td></td>\
                <td>\
                  <a href=''>Edit</a>\
                  <a href=''>Hapus</a>\
                </td>`);
                    } else if (cekGol == 'c') {
                        $('#fill-data').append(`<tr>
                <td>${data.mkg}</td>\
                <td></td>\
                <td></td>\
                <td>${data.gaji}</td>\
                <td></td>\
                <td></td>\
                <td>\
                  <a href=''>Edit</a>\
                  <a href=''>Hapus</a>\
                </td>\</tr>
                `);
                    } else if (cekGol == 'd') {
                        $('#fill-data').append(`<tr>
                <td>${data.mkg}</td>\
                <td></td>\
                <td></td>\
                <td></td>\
                <td>${data.gaji}</td>\
                <td></td>\
                <td>\
                  <a href=''>Edit</a>\
                  <a href=''>Hapus</a>\
                </td>\</tr>`);
                    } else {
                        $('#fill-data').append(`<tr>
                <td>${data.mkg}</td>\
                <td></td>\
                <td></td>\
                <td></td>\
                <td></td>\
                <td>${data.gaji}</td>\
                <td>\
                  <a href=''>Edit</a>\
                  <a href=''>Hapus</a>\
                </td>\
              </tr>`);
                    }

                });
                $('#fill-data').append('</tr>');
                // $('#fill-data').append(`<tr>\
                //   <td>test</td>\
                //   <td>test</td>\
                //   <td>test</td>\
                //   <td>test</td>\
                //   <td>test</td>\
                //   <td>test</td>\
                // </tr>`);
            });
        });
    });
    $(document).ready(function() {
        $('#btn-tambah').on('click', function() {
            let mkg = $('#filter-mkg').find(':selected').val();
            $.get(`config-filter.php?mkg=${mkg}`, function(data, status) {
                $('#fill-data').html('')
                result = JSON.parse(data)
                $.each(result, function(index, data) {
                    cekId = data.id_golongan;

                    if (cekId == 'I.a') {
                        $('#fill-data').append(`<div class='row'>\
                <div class='col-md-4'><label>I.a</label></div> \
                <div class = 'col-md-8'> <input type = 'number'class = 'form-control'value = '${data.gaji}'> </div>\
                 </div>`);
                    } else if (cekId == 'I.b') {
                        $('#fill-data').append(`<div class='row'>\
                <div class='col-md-4'><label>I.a</label></div> \
                <div class = 'col-md-8'> <input type = 'number'class = 'form-control'value = '${data.gaji}'> </div>\
                 </div>`);
                    } else if (cekId == 'I.c') {
                        $('#fill-data').append(`<div class='row'>\
                <div class='col-md-4'><label>I.a</label></div> \
                <div class = 'col-md-8'> <input type = 'number'class = 'form-control'value = '${data.gaji}'> </div>\
                 </div>`);
                    } else if (cekId == 'I.d') {
                        $('#fill-data').append(`<div class='row'>\
                <div class='col-md-4'><label>I.a</label></div> \
                <div class = 'col-md-8'> <input type = 'number'class = 'form-control'value = '${data.gaji}'> </div>\
                 </div>`);
                    } else if (cekId == 'II.a') {
                        $('#fill-data').append(`<div class='row'>\
                <div class='col-md-4'><label>I.a</label></div> \
                <div class = 'col-md-8'> <input type = 'number'class = 'form-control'value = '${data.gaji}'> </div>\
                 </div>`);
                    } else if (cekId == 'II.b') {
                        $('#fill-data').append(`<div class='row'>\
                <div class='col-md-4'><label>I.a</label></div> \
                <div class = 'col-md-8'> <input type = 'number'class = 'form-control'value = '${data.gaji}'> </div>\
                 </div>`);
                    } else if (cekId == 'II.c') {
                        $('#fill-data').append(`<div class='row'>\
                <div class='col-md-4'><label>I.a</label></div> \
                <div class = 'col-md-8'> <input type = 'number'class = 'form-control'value = '${data.gaji}'> </div>\
                 </div>`);
                    } else if (cekId == 'II.d') {
                        $('#fill-data').append(`<div class='row'>\
                <div class='col-md-4'><label>I.a</label></div> \
                <div class = 'col-md-8'> <input type = 'number'class = 'form-control'value = '${data.gaji}'> </div>\
                 </div>`);
                    } else if (cekId == 'III.a') {
                        $('#fill-data').append(`<div class='row'>\
                <div class='col-md-4'><label>I.a</label></div> \
                <div class = 'col-md-8'> <input type = 'number'class = 'form-control'value = '${data.gaji}'> </div>\
                 </div>`);
                    } else if (cekId == 'III.b') {
                        $('#fill-data').append(`<div class='row'>\
                <div class='col-md-4'><label>I.a</label></div> \
                <div class = 'col-md-8'> <input type = 'number'class = 'form-control'value = '${data.gaji}'> </div>\
                 </div>`);
                    } else if (cekId == 'III.c') {
                        $('#fill-data').append(`<div class='row'>\
                <div class='col-md-4'><label>I.a</label></div> \
                <div class = 'col-md-8'> <input type = 'number'class = 'form-control'value = '${data.gaji}'> </div>\
                 </div>`);
                    } else if (cekId == 'III.d') {
                        $('#fill-data').append(`<div class='row'>\
                <div class='col-md-4'><label>I.a</label></div> \
                <div class = 'col-md-8'> <input type = 'number'class = 'form-control'value = '${data.gaji}'> </div>\
                 </div>`);
                    } else if (cekId == 'IV.a') {
                        $('#fill-data').append(`<div class='row'>\
                <div class='col-md-4'><label>I.a</label></div> \
                <div class = 'col-md-8'> <input type = 'number'class = 'form-control'value = '${data.gaji}'> </div>\
                 </div>`);
                    } else if (cekId == 'IV.b') {
                        $('#fill-data').append(`<div class='row'>\
                <div class='col-md-4'><label>I.a</label></div> \
                <div class = 'col-md-8'> <input type = 'number'class = 'form-control'value = '${data.gaji}'> </div>\
                 </div>`);
                    } else if (cekId == 'IV.c') {
                        $('#fill-data').append(`<div class='row'>\
                <div class='col-md-4'><label>I.a</label></div> \
                <div class = 'col-md-8'> <input type = 'number'class = 'form-control'value = '${data.gaji}'> </div>\
                 </div>`);
                    } else if (cekId == 'IV.d') {
                        $('#fill-data').append(`<div class='row'>\
                <div class='col-md-4'><label>I.a</label></div> \
                <div class = 'col-md-8'> <input type = 'number'class = 'form-control'value = '${data.gaji}'> </div>\
                 </div>`);
                    } else if (cekId == 'IV.e') {
                        $('#fill-data').append(`<div class='row'>\
                <div class='col-md-4'><label>I.a</label></div> \
                <div class = 'col-md-8'> <input type = 'number'class = 'form-control'value = '${data.gaji}'> </div>\
                 </div>`);
                    }
                });
            });
        });

    });
    $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });

    function terms_changed_promosi(termsCheckBox) {
        //If the checkbox has been checked
        if (termsCheckBox.checked) {
            //Set the disabled property to FALSE and enable the button.
            document.getElementById("periode_promosi").disabled = false
        } else {
            //Otherwise, disable the submit button.
            document.getElementById("periode_promosi").disabled = true;
        }
    }

    function terms_changed_kgb(termsCheckBox) {
        //If the checkbox has been checked
        if (termsCheckBox.checked) {
            //Set the disabled property to FALSE and enable the button.
            document.getElementById("periode_kgb").disabled = false;
        } else {
            //Otherwise, disable the submit button.
            document.getElementById("periode_kgb").disabled = true;
        }
    }

    function terms_changed_pass(termsCheckBox) {
        //If the checkbox has been checked
        if (termsCheckBox.checked) {
            //Set the disabled property to FALSE and enable the button.
            document.getElementById("pass").disabled = false;
        } else {
            //Otherwise, disable the submit button.
            document.getElementById("pass").disabled = true;
        }
    }

    function tampil_kgb(waktu) {

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("Mhs").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "?module=naik-pangkat/function.php?wktu=" + waktu, true);
        xmlhttp.send();
    }

    $(document).ready(function() {
        $('#percepatanModal').on('show.bs.modal', function(e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type: 'post',
                url: 'detail-percepatan.php',
                data: 'rowid=' + rowid,
                success: function(data) {
                    $('.fetched-data').html(data); //menampilkan data ke dalam modal
                }
            });
        });
    });
    $('#percepatan_kp').blur(function() {
        var percepatan_kp = $(this).val();
        var len = percepatan_kp.length;
        if (len > 3) { //jika ada isinya
            if (!valid_nama(percepatan_kp)) { //jika nama tidak valid
                $(this).parent().find('.text-warning').text("");
                $(this).parent().find('.text-warning').text("Percepatan tidak boleh lebih dari 3");
                return apply_feedback_error(this);
            }

        }
    });
</script>