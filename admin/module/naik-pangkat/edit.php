<div class="modal fade" id="addpercepatan<?php echo $p['nip']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Percepatan Promosi Pangkat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                include "../config/connection.php";

                $data1 = mysqli_query($con, "SELECT * FROM pegawai INNER JOIN pangkat_terakhir
                ON pegawai.nip=pangkat_terakhir.nip WHERE pegawai.nip='" . $p['nip'] . "'");
                while ($a = mysqli_fetch_assoc($data1)) {
                ?>
                    <div class="container-fluid">
                        <form method="POST" action="?module=naik-pangkat/function-proses&act=percepatan_kp&nip=<?php echo $a['nip']; ?>">
                            <div class="row">
                                <div class="col-xl-4">
                                    <label style="position:relative; top:7px;">NIP</label>
                                </div>
                                <div class="col-xl-8">
                                    <input type="text" name="nip" class="form-control" value="<?php echo $a['nip']; ?>" readonly>
                                </div>
                            </div>

                            <input type="hidden" name="periode" value="<?= $p['periode_kenaikan'] ?>">
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label style="position:relative; top:7px;">Nama</label>
                                </div>
                                <div class="col-xl-8">
                                    <input type="text" name="nama" class="form-control" value="<?php echo $a['nama']; ?>" readonly>
                                </div>
                            </div>
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label style="position:relative; top:7px;">Periode KP</label>
                                </div>
                                <div class="col-xl-8">
                                    <input type="text" class="form-control" value="<?php echo $a['periode_kenaikan']; ?> tahun" readonly>
                                </div>
                            </div>
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label style="position:relative; top:7px;">KP Selanjutnya</label>
                                </div>
                                <div class="col-xl-8">
                                    <input type="text" name="kenaikan" class="form-control" value="<?= kenaikanSelanjutnya($p['tgl_pangkat_terakhir'], $p['periode_kenaikan'], $p['percepatan_kenaikan'], $p['penundaan_kenaikan']) ?>" readonly></div>
                            </div>
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label style="position:relative; top:7px;">Percepatan KP</label>
                                </div>
                                <div class="col-xl-8">
                                    <input type="number" id="percepatan_kp" name="percepatan_kp" class="form-control" value="<?= $a['percepatan_kenaikan']; ?>">
                                    <i class="form-control-feedback"></i>
                                    <span class="text-warning"></span>
                                </div>
                            </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
            </div>
            </form>
        <?php } ?>
        </div>
    </div>
</div>

<!-- penundaan promosi pangkat -->
<div class="modal fade" id="addpenundaan<?php echo $p['nip']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Penundaan Promosi Pangkat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $data1 = mysqli_query($con, "SELECT * FROM pegawai INNER JOIN pangkat_terakhir
                ON pegawai.nip=pangkat_terakhir.nip WHERE pegawai.nip='" . $p['nip'] . "'");
                while ($a = mysqli_fetch_assoc($data1)) {
                ?>
                    <div class="container-fluid">
                        <form method="POST" action="?module=naik-pangkat/function-proses&act=penundaan_kp&nip=<?php echo $a['nip']; ?>">
                            <div class="row">

                                <input type="hidden" name="periode" value="<?= $p['periode_kenaikan'] ?>">
                                <div class="col-xl-4">
                                    <label style="position:relative; top:7px;">NIP</label>
                                </div>
                                <div class="col-xl-8">
                                    <input type="text" name="nip" class="form-control" value="<?php echo $a['nip']; ?>" readonly>
                                </div>
                            </div>
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label style="position:relative; top:7px;">Nama</label>
                                </div>
                                <div class="col-xl-8">
                                    <input type="text" name="nama" class="form-control" value="<?php echo $a['nama']; ?>" readonly>
                                    <input type="hidden" name="periode" value="<?= $a['periode_kenaikan'] ?>">
                                </div>
                            </div>
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label style="position:relative; top:7px;">Periode KP</label>
                                </div>
                                <div class="col-xl-8">
                                    <input type="text" class="form-control" value="<?php echo $a['periode_kenaikan']; ?> tahun" readonly>
                                </div>
                            </div>
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label style="position:relative; top:7px;">KP Selanjutnya</label>
                                </div>
                                <div class="col-xl-8">
                                    <input type="text" name="kenaikan" class="form-control" value="<?= kenaikanSelanjutnya($p['tgl_pangkat_terakhir'], $p['periode_kenaikan'], $p['percepatan_kenaikan'], $p['penundaan_kenaikan']) ?>" readonly></div>
                            </div>
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label style="position:relative; top:7px;">Penundaan KP</label>
                                </div>
                                <div class="col-xl-8">
                                    <input type="number" id="penundaan_kp" name="penundaan_kp" value="<?= $a['penundaan_kenaikan']; ?>" class="form-control">
                                    <i class="form-control-feedback"></i>
                                    <span class="text-warning"></span>
                                </div>
                            </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
            </div>
            </form>
        <?php } ?>
        </div>
    </div>
</div>

<div class="example-modal">
    <div id="deletepenundaan<?php echo $p['nip']; ?>" class="modal fade" role="dialog" style="display:none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title">Konfirmasi Delete Penundaan Promosi Pangkat</h3>
                </div>
                <?php
                $data1 = mysqli_query($con, "SELECT * FROM pegawai INNER JOIN pangkat_terakhir
                ON pegawai.nip=pangkat_terakhir.nip WHERE pegawai.nip='" . $p['nip'] . "'");
                while ($b = mysqli_fetch_array($data1)) {

                ?>
                    <div class="modal-body">
                        <p align="center">Apakah anda yakin ingin menghapus Penundaan Promosi Pangkat <b> <?php echo $b['nama']; ?></b><strong><span class="grt"></span></strong> ?</p>
                    </div>

                    <input type="hidden" name="periode" value="<?= $b['periode_kenaikan'] ?>">
                    <div class="modal-footer">
                        <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                        <a href="?module=naik-pangkat/function-proses&act=delete_penundaan&nip=<?php echo $b['nip']; ?>" class="btn btn-primary">Delete</a>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div><!-- modal delete -->


<div class="example-modal">
    <div id="deletepercepatan<?php echo $p['nip']; ?>" class="modal fade" role="dialog" style="display:none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi Delete Percepatan Promosi Pangkat </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                $data1 = mysqli_query($con, "SELECT * FROM pegawai INNER JOIN pangkat_terakhir
                ON pegawai.nip=pangkat_terakhir.nip WHERE pegawai.nip='" . $p['nip'] . "'");
                while ($b = mysqli_fetch_array($data1)) {

                ?>
                    <div class="modal-body">
                        <p align="center">Apakah anda yakin ingin menghapus Percepatan Promosi Pangkat <b> <?php echo $b['nama']; ?></b><strong><span class="grt"></span></strong> ?</p>
                    </div>

                    <input type="hidden" name="periode" value="<?= $b['periode_kenaikan'] ?>">
                    <div class="modal-footer">
                        <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                        <a href="?module=naik-pangkat/function-proses&act=delete_percepatan&nip=<?php echo $b['nip']; ?>" class="btn btn-primary">Delete</a>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div><!-- modal delete -->
<script>
    $('#percepatan_kp').blur(function() {
        var percepatan_kp = $(this).val();
        var len = password.length;
        if (len > 3) {
            $(this).parent().find('.text-warning').text("");
            $(this).parent().find('.text-warning').text("percepatan kenaikan pangkat maksimal adalah 3 tahun");
            return apply_feedback_error(this);
        }

    });
</script>