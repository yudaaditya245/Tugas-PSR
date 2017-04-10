<?php

if ($this->session->is_login == 0) {
    echo 'Login dulu bray <a href="'.base_url().'main/login">Login</a>';
} else {
    if ($this->session->level == 1) {
        $headline = '<a href="'.base_url().'home/tambahJadwal" class="btn btn-info">Tambah Jadwal</a>';
        $th = '<th>Action</th>';
    } else {
        $headline = 'Jadwal Keberangkatan';
        $th = '';
    }

?>

    <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <title>Jadwal Keberangkatan</title>
            <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-theme.min.css">
        </head>
        <body>
            <div style="margin-top:10px;" class="container">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <a style="margin-right:10px" class="btn btn-info" href="<?= base_url() ?>home"><span class="glyphicon glyphicon-home"></span></a>
                        <?= $headline ?>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>Id</th>
                                <th>Kode</th>
                                <th>Maskapai</th>
                                <th>Asal</th>
                                <th>Tujuan</th>
                                <th>Waktu Keberangkatan</th>
                                <th>Harga</th>
                                <?= $th ?>
                            </tr>

                            <?php

                            foreach ($row as $r) {
                                echo '<tr>';
                                if ($this->session->level == 1) {
                                    $td = '<td>
                                              <a href="'.base_url().'home/editJadwal/'.$r['id'].'" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a>
                                              <a href="'.base_url().'home/hapusJadwal/'.$r['id'].'" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                           </td>';
                                } else {
                                    $td = '';
                                }

                                    echo '<td>'.$r['id'].'</td>';
                                    echo '<td>'.$r['kode'].'</td>';
                                    echo '<td>'.$r['maskapai'].'</td>';
                                    echo '<td>'.$r['asal'].'</td>';
                                    echo '<td>'.$r['tujuan'].'</td>';
                                    echo '<td>'.$r['waktu'].'</td>';
                                    echo '<td>'.$r['harga'].'</td>';
                                    echo $td;
                                echo '</tr>';
                            }

                            ?>

                        </table>
                    </div>
                </div>
            </div>
        </body>
    </html>


<?php
}
?>
