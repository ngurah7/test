<div class="content-wrapper">
  <section class="content-header">
    <h1>
    Data Admin
    <small>Sports</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Data Master</a></li>
      <li><a href="#">Data Admin</a></li>
    </ol>
  </section>
  <br>
  <?php
  $id = $_GET['edit'];
  $sql = "SELECT * FROM user where id_user = '$id'";
  $result = $connect->query($sql);
  $data = $result->fetch(PDO::FETCH_OBJ);
  $id_user = $data->id_user;
  $nama = $data->nama_user;
  $username = $data->username;
  
  ?>
  <div id="add_content">
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update User</h3>
              </div><!-- /.box-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" id="formEdit" action="pages/user/proses_user.php?aksi=edit_data&id=<?php echo($id_user) ?>">
                <div class="box-body">

                  <div class="form-group">
                    <label class="col-md-2 control-label">Nama User</label>
                    <div class="col-md-8">
                      <input type="text" name="nama" class="form-control" placeholder="Nama Pengguna ..." required="" autofocus="" value="<?php echo($nama) ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label">Username</label>
                    <div class="col-md-8">
                      <input type="text" name="username" class="form-control" placeholder="Username Pengguna ..." required="" value="<?php echo($username) ?>" readonly="">
                    </div>
                  </div>

                  
                  <div class="box-footer">
                    <div class="col-md-7"></div>
                    <div class="col-md-3">
                      <input type="submit" class="btn btn-success" name="edit_data" id="edit_data" value="Update Data"/>
                      &nbsp;&nbsp;&nbsp;
                      <a href="?page=user" class="btn btn-danger">Batal</a>
                    </div>
                    <div class="col-md-1"></div>
                    </div><!-- /.box-footer -->
                  </form>
                  </div><!-- /.box -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>