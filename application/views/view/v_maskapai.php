<?php

if($this->session->is_login == 0){
  echo 'Login dulu bray <a href="'.base_url().'main/login">Login</a>';
}else{

  if($this->session->level == 1){
    $headline = '<a href="'.base_url().'home/t_maskapai" class="btn btn-info">Tambah Maskapai</a>';
    $th = '<th>Action</th>';
  }else{
    $headline = 'Daftar Maskapai';
    $th = '';
  }

?>

  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>Daftar Maskapai</title>
      <link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap-theme.min.css">
    </head>
    <body>
      <div style="margin-top:10px;" class="container">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <a style="margin-right:10px" class="btn btn-info" href="<?= base_url()?>home"><span class="glyphicon glyphicon-home"></span></a>
            <?= $headline ?>
          </div>
          <div class="panel-body">
            <table class="table table-striped table-hover">
              <tr>
                <th>Id</th>
                <th>Maskapai</th>
                <?= $th ?>
              </tr>

              <?php

              foreach ($row as $r) {

                if($this->session->level == 1){
                  $td = '<td>
                            <a href="'.base_url().'home/e_maskapai/'. $r['id'] .'" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a>
                            <a href="'.base_url().'home/h_maskapai/'. $r['id'] .'" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                         </td>
                          ';
                }else{
                  $td = '';
                }

                echo '<tr>';
                  echo '<td>'.$r['id'].'</td>';
                  echo '<td>'.$r['maskapai'].'</td>';
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
