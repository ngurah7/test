<div class="content-wrapper">
  <section class="content-header">
    <h1>
    Data User
    <small>Sports</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Data Master</a></li>
      <li><a href="#">Data User</a></li>
    </ol>
  </section>
  <br>
  
  <div class="row">
    <div style="padding: 1%">
      <div class="col-md-2">
        <center><button class="btn btn-primary" id="btn_add">Tambah User <i class="fa fa-plus-circle"></i> </button></center>
      </div>
    </div>
  </div>
  
  <div id="add_content" style="display: none ; ">
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> Tambah Admin</h3>
              </div><!-- /.box-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" id="formAdd" action="pages/user/proses_user.php?aksi=add_data">
                <div class="box-body">
                  
                  <div class="form-group">
                    <label class="col-md-2 control-label">Nama User</label>
                    <div class="col-md-8">
                      <input type="text" name="nama" class="form-control" placeholder="Nama Pengguna ..." required="" autofocus="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Username</label>
                    <div class="col-md-8">
                      <input type="text" name="username" class="form-control" placeholder="Username Pengguna ..." required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Password</label>
                    <div class="col-md-8">
                      <input type="password" name="password" class="form-control" placeholder="Password Pengguna ..." required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Ulangi Password</label>
                    <div class="col-md-8">
                      <input type="password" name="repassword" class="form-control" placeholder="Ulangi Password Pengguna ..." required="">
                    </div>
                  </div>
                  
                  <div class="box-footer">
                    <div class="col-md-7"></div>
                    <div class="col-md-3">
                      <input type="submit" class="btn btn-success pull-right" name="add_data" id="add_data" value="Simpan Data"/>
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
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box" style="overflow-y: auto;">
                <div class="box-header">
                  <h3 class="box-title">Data User</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama User</th>
                          <th>Username</th>
                          <th>Aksi</th>
                          
                        </tr>
                      </thead>
                      
                      <tbody>
                        <?php
                        $no=1;
                        $sql = "SELECT * from user";
                        $query = $connect->query($sql);
                        while ($data = $query->fetch(PDO::FETCH_OBJ)) {
                        
                        ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $data->nama_user; ?></td>
                          <td><?php echo $data->username; ?></td>
                          <td>
                            <a href="?page=user&action=edit&edit=<?php echo $data->id_user; ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                          </td>
                          
                          <?php } ?>
                        </tr>
                      </tbody>
                      
                    </table>
                    </div><!-- /.box-body -->
                    </div><!-- /.box -->
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                    </section><!-- /.content -->
                  </div>