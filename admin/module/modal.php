div class="modal fade" id="upload-detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Upload File</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
                <form method="POST" enctype="multipart/form-data" action="?module=arsip-kgb/proses&act=add-file-detail">
                    <div class="row">
                        <div class="col-xl-4">
                            <label style="position:relative; top:7px;">Pegawai</label>
                        </div>
                        <div class="col-xl-8">
                            <select readonly name="nip" class="form-control" required>
                                <option readonly value="<?= $a['nip'] ?>"><?= $a['nip'] ?>||<?= $a['nama'] ?></option>
                            </select>
                        </div>
                    </div>
                    <div style="height: 10px;"></div>
                    <div class="row">
                        <div class="col-xl-4">
                            <label style="position:relative; top:7px;">Tahun KGB</label>
                        </div>
                        <div class="col-xl-8">
                            <select class="form-control" name="tahun_kgb">
                                <option value="">Pilih Tahun</option>
                                <?php for ($i = date('Y'); $i >= '1980'; $i--) { ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php } ?>
                            </select> </div>
                    </div>
                    <div style="height: 10px;"></div>
                    <div class="row">
                        <div class="col-xl-4">
                            <label style="position:relative; top:7px;">File</label>
                        </div>
                        <div class="col-xl-8">
                            <input type="file" class="form-control" name="file_upload" required>
                        </div>
                    </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
        </div>
        </form>
    </div>
</div>
</div>