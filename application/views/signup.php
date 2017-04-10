
<!DOCTYPE html>
<html>
  <head>
    <title>REGISTER</title>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-theme.css">
  </head>
  <body>

    <div style="margin-top:10px;" class="container">
      <div class="row">
        <div class="col-md-6">

          <form action="<?= base_url()?>main/signupVal" method="post">
          <div class="panel panel-primary">
            <div class="panel-heading">REGISTER FORM</div>
            <div class="panel-body">

                <label>Nama</label>
                <input class="form-control" type="name" name="nama" value="<?= $this->input->post('nama');?>">
                <p></p>

                <label>Email</label>
                <input class="form-control" type="email" name="email" value="<?= $this->input->post('email');?>">
                <p></p>

                <label>Password</label>
                <input class="form-control" type="password" name="password">
                <p></p>

                <label>Confirm Password</label>
                <input class="form-control" type="password" name="cpassword">
                <p></p>

                <label>Level</label>
                <select class="form-control" name="level">
                  <option value="1">Admin</option>
                  <option value="0">Staff</option>
                </select>
                <p></p>


            </div>
            <div class="panel-footer">
              <input class="btn btn-success" type="submit" name="submit" value="Register">
              Sudah punya akun? <a href="<?= base_url()?>main/login">login</a>

            </div>
            </form>


          </div>
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
