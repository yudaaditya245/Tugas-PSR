
<!DOCTYPE html>
<html>
  <head>
    <title>Ubah Maskapai</title>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-theme.css">
  </head>
  <body>

    <div style="margin-top:10px;" class="container">
      <div class="row">
        <div class="col-md-6">
          <form action="<?= base_url()?>home/e_val_maskapai/<?= $row->id?>" method="post">
            <div class="panel panel-primary">
              <div class="panel-heading">Ubah Maskapai</div>
              <div class="panel-body">
                  <input class="form-control" type="text" name="nama_mas" value="<?= $row->maskapai?>">
                  <p></p>
              </div>

              <div class="panel-footer">
                <input class="btn btn-success" type="submit" name="submit" value="Ubah">
                <a class="btn btn-danger" href="<?= base_url()?>home/maskapai">Cancel</a>
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
