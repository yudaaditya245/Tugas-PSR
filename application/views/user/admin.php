
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Admin Page</title>
    <link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap-theme.min.css">
  </head>
  <body>
    <div style="margin-top:10px;" class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">Admin Page</div>
            <div class="panel-body">
              <div class="alert alert-info">Anda login sebagai <b>Admin</b> dengan akun <b><?= $this->session->email?></b></div>
              <ul class="nav nav-pills nav-stacked">
              <li>  <a href="<?= base_url()?>home/user">Users</a></li>
              <li>  <a href="<?= base_url()?>home/maskapai">Maskapai</a></li>
              <li>  <a href="<?= base_url()?>home/jadwal">Jadwal Penerbangan</a></li>
              <li>  <a href="<?= base_url()?>home/t_penjualan">Transaksi Penjualan</a></li>
              <li>  <a href="<?= base_url()?>home/l_penjualan">Laporan Penjualan</a></li>
              </ul>
            </div>
            <div class="panel-footer">
              <a class="btn btn-success" href="<?= base_url()?>main/logout">Logout</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
