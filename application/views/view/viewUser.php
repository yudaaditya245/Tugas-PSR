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
        <meta charset="utf-8">
        <title>User</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-theme.min.css">
    </head>
    <body>
        <div style="margin-top:10px;" class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                <a style="margin-right:10px;" class="btn btn-info" href="<?= base_url()?>home"><span class="glyphicon glyphicon-home"></span></a>
                    Users Page
                </div>
                <div class="panel-body">
                <div class="alert alert-info">Anda login sebagai <b>Admin</b> dengan akun <b><?= $this->session->email ?></b></div>

                    <table class="table table-hover table-striped">
                        <tr>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>

                    <?php
                    foreach ($user as $user) {
                        echo '<tr>';
                            echo '<td>'.$user['id'].'</td>';
                            echo '<td>'.$user['nama'].'</td>';
                            echo '<td>'.$user['email'].'</td>';

                        if ($user['level'] == 1) {
                            echo '<td>Admin</td>';
                        } else {
                            echo '<td>Staff</td>';
                        }

                        if ($user['email'] == $this->session->email) {
                            echo '<td>
                                       <a class="btn btn-danger" href="" disabled="disabled"><span class="glyphicon glyphicon-trash"></span></a>
                                  </td>';
                        } else {
                            echo '<td>
                                       <a class="btn btn-danger" href="'.base_url().'home/hapusUser/'.$user['id'].'"><span class="glyphicon glyphicon-trash"></span></a>
                                  </td>';
                        }

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
