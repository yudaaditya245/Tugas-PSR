<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Transaksi Penjualan</title>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-theme.min.css">

  </head>
  <body>
    <div style="margin-top:10px;" class="container">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <a style="margin-right:10px" class="btn btn-info" href="<?= base_url()?>home"><span class="glyphicon glyphicon-home"></span></a>
          Maskapai
        </div>
        <div class="panel-body">
          <div class="alert alert-info">! Pilih maskapai yang menjadi tujuan Pembeli</div>
          <table class="table table-hover table-striped">
            <tr>
              <th>ID</th>
              <th>Kode</th>
              <th>Maskapai</th>
              <th>Asal</th>
              <th>Tujuan</th>
              <th>Waktu Keberangkatan</th>
              <th>Harga</th>
              <th>Action</th>
            </tr>
            <?php

            foreach ($jadwal as $row) {
              echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['kode'].'</td>';
                echo '<td>'.$row['maskapai'].'</td>';
                echo '<td>'.$row['asal'].'</td>';
                echo '<td>'.$row['tujuan'].'</td>';
                echo '<td>'.$row['waktu'].'</td>';
                echo '<td>'.$row['harga'].'</td>';
                echo '<td><a class="btn btn-success" href="'.base_url().'home/t_jual/'.$row['kode'].'">Pilih</a></td>';
              echo '</tr>';
            }

             ?>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
