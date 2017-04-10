
<!DOCTYPE html>
<html>
  <head>
    <title>LOGIN</title>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-theme.css">
  </head>
  <body>

    <div style="margin-top:10px;" class="container">
      <div class="row">
        <div class="col-md-6">
          <form action="<?= base_url()?>main/login_val" method="post">
            <div class="panel panel-primary">
              <div class="panel-heading">LOGIN FORM</div>
              <div class="panel-body">
                  <label>Email</label>
                  <input class="form-control" type="email" name="email" value="<?= $this->input->post('email')?>">
                  <p></p>

                  <label>Password</label>
                  <input class="form-control" type="password" name="password">
                  <p></p>

              </div>

              <div class="panel-footer">
                <input class="btn btn-success" type="submit" name="submit" value="Login">
                Belum punya akun? <a href="<?= base_url()?>main/signup">Register</a>

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
