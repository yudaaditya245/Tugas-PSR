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
      <div class="row">
        <div class="col-md-6">
          <form action="<?= base_url()?>home/t_val_jual/<?= $row['kode']?>" method="post">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <a style="margin-right:10px" class="btn btn-info" href="<?= base_url()?>home"><span class="glyphicon glyphicon-home"></span></a>
                Transaksi Penjualan
              </div>
              <div class="panel-body">

                <div class="alert alert-info">Isi Informasi Diri Pembeli</div>

                <label>Nama Pembeli</label>
                <input class="form-control" type="text" name="nama" value="<?= $this->input->post('nama')?>">
                <p></p>

                <label>No Identitas <span class="label label-info">Kartu pelajar/KTP</span></label>
                <input class="form-control" type="number" name="no_id" value="<?= $this->input->post('no_id')?>">
                <p></p>

                <label>No Telp</label>
                <input class="form-control" type="telp" name="no_telp" value="<?= $this->input->post('no_telp')?>">
                <p></p>


                <hr>


                <label>Kode Penerbangan</label>
                <input class="form-control" type="text" name="kode" value="<?= $row['kode']?>" readonly>
                <p></p>

                <label>Maskapai</label>
                <input class="form-control" type="text" name="maskapai" value="<?= $row['maskapai']?>" readonly>
                <p></p>

                <label>Asal</label>
                <input class="form-control" type="text" name="asal" value="<?= $row['asal']?>" readonly>
                <p></p>

                <label>Tujuan</label>
                <input class="form-control" type="text" name="tujuan" value="<?= $row['tujuan']?>" readonly>
                <p></p>

                <label>Waktu Berangkat</label>
                <input class="form-control" type="date" name="waktu" value="<?= $row['waktu']?>" readonly>
                <p></p>

                <label>Harga</label>
                <input class="form-control" type="number" name="harga" value="<?= $row['harga']?>" readonly>
                <p></p>



              </div>
              <div class="panel-footer">
                <input class="btn btn-success" type="submit" name="submit" value="Oke">
                <a class="btn btn-danger" href="<?= base_url()?>home/t_penjualan">Cancel</a>
              </div>
            </div>
          </form>
        </div>

        <div class="col-md-6">
          <?php
          echo validation_errors('<div class="alert alert-danger">','</div>');
           ?>
        </div>

      </div>
    </div>
  </body>
</html>
