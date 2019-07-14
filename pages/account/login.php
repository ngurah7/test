<?php
@session_start();
include '../connect/connection.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sports</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../assets/font-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../assets/dist/css/AdminLTE.min.css">
    <!-- sweetalert -->
    <link href="../../assets/dist/css/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../assets/dist/css/skins/_all-skins.min.css">
  </head>
  <body class="hold-transition login-page" style="background-color: #ffcdd2;">
    <div class="login-box">
      <div class="login-logo">
        <span><b>Sports</b> Toko Olahraga</span>
        
        </div><!-- /.login-logo -->
        <?php
        @$username = $_POST['username'];
        @$password = $_POST['password'];
        @$login = $_POST['submit'];
        if ($login) {
        $sql = "SELECT * from user where username='$username' && password='$password'";
        $query = $connect->query($sql)->rowCount();
        // $sql = $koneksi->query();
        // $find = $sql->num_rows;
        
        if ($query >0) {
        
        $result = $connect->query($sql);
        $data = $result->fetch(PDO::FETCH_OBJ);
        
        $_SESSION['username'] =  $data->username;
        $_SESSION['id'] = $data->id_user;
        $user = $_SESSION['username'];
        
        ?>
        <script type="text/javascript">
        setTimeout(function () {
        swal({
        title: "Login Sukses !",
        text: "Selamat datang, <?php echo($user) ?>",
        type: "success",
        confirmButtonText: "OK"
        },
        function(isConfirm){
        if (isConfirm) {
        window.location.href = "../../index.php?page=home";
        }
        }); });
        </script>
        
        <?php }else{ ?>

        <script type="text/javascript">
        setTimeout(function () {
        swal({
        title: "Oops...",
        text: "Username atau Password salah, silahkan cek kembali !",
        type: "error",
        confirmButtonText: "OK"
        },
        function(isConfirm){
        if (isConfirm) {
        window.location.href = "login.php";
        }
        }); });
        </script>
        
        <?php }} ?>
        
        <div class="login-box-body">
          <p class="login-box-msg">Silahkan Login untuk mengakses halaman Admin.</p>
          <form method="post">
            <div class="form-group has-feedback">
              <input type="text" class="form-control" placeholder="Username ..." name="username" autofocus="" required="">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control" placeholder="Password ..." name="password" required="">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <input type="submit" name="submit" value="Sign In" class="btn btn-primary btn-block btn-flat">
                </div><!-- /.col -->
              </div>
            </form>
            
            <div class="social-auth-links text-center">
              <!-- <p> <a href="lupa_password.php"> Lupa Password ? </a></p> -->
              
              </div><!-- /.social-auth-links -->
              <div class="social-auth-links text-center">
                <p>- <b>Sports </b> Toko Olahraga -</p>
                
                </div><!-- /.social-auth-links -->
                
                </div><!-- /.login-box-body -->
                </div><!-- /.login-box -->
                
                <!-- jQuery 2.1.4 -->
                <script src="../../assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
                <!-- Bootstrap 3.3.5 -->
                <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
                <!-- sweetalert -->
                <script src="../../assets/dist/js/sweetalert.min.js"></script>
              </body>
            </html>