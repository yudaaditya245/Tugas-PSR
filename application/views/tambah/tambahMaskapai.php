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
        <title>Tambah Maskapai</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-theme.css">
    </head>
    <body>

        <div style="margin-top:10px;" class="container">
            <div class="row">
                <div class="col-md-6">
                    <form action="<?= base_url() ?>home/tambahValMaskapai" method="post">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Tambah Maskapai</div>
                            <div class="panel-body">
                                <input class="form-control" type="text" name="nama_mas" value="<?= $this->input->post('nama_mas') ?>">
                                <p></p>
                            </div>

                            <div class="panel-footer">
                                <input class="btn btn-success" type="submit" name="submit" value="Tambah">
                            <a class="btn btn-danger" href="<?= base_url() ?>home/maskapai">Cancel</a>
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
