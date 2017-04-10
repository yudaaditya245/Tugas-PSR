<?php
if ($this->session->is_login == 0) {
    echo 'Login dulu bray <a href="'.base_url().'main/login">Login</a>';
} elseif ($this->session->level == 0) {
    echo 'Anda adalah Staff, tidak boleh masuk ke daerah admin, <a href="'.base_url().'home">Kembali ke Home</a>';
} else {
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Jadwal</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-theme.css">
    </head>
    <body>

        <div style="margin-top:10px;" class="container">
            <div class="row">
                <div class="col-md-6">
                <form action="<?= base_url() ?>home/tambahValJadwal" method="post">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Tambah Jadwal</div>
                            <div class="panel-body">
                                <label>Kode Jadwal <span class="label label-info">Contoh : A01</span> </label>
                                <input class="form-control" type="text" name="kode_jadwal" value="<?= $this->input->post('kode_jadwal') ?>">
                                <p></p>

                                <label>Maskapai</label>
                                <select class="form-control" name="maskapai">
                                <?php

                                foreach ($row as $row) {
                                    echo '<option value="'.$row['maskapai'].'">'.$row['maskapai'].'</option>';
                                }

                                    ?>
                                </select>
                                <p></p>

                                <label>Asal</label>
                                <input class="form-control" type="text" name="asal" value="<?= $this->input->post('asal') ?>">
                                <p></p>

                                <label>Tujuan</label>
                                <input class="form-control" type="text" name="tujuan" value="<?= $this->input->post('tujuan') ?>">
                                <p></p>

                                <label>Waktu</label>
                                <input class="form-control" type="date" name="waktu" value="<?= $this->input->post('waktu') ?>">
                                <p></p>

                                <label>Harga</label>
                                <input class="form-control" type="number" name="harga" value="<?= $this->input->post('harga') ?>">
                                <p></p>
                            </div>

                            <div class="panel-footer">
                                <input class="btn btn-success" type="submit" name="submit" value="Tambah">
                                <a class="btn btn-danger" href="<?= base_url() ?>home/jadwal">Cancel</a>
                            </div>

                        </div>
                    </form>
                </div>

                <div class="col-md-6">
                <?php
                echo validation_errors('<div class="alert alert-danger">', '</div>');
                ?>
                </div>

            </div>
        </div>
    </body>
</html>

<?php
}
?>
