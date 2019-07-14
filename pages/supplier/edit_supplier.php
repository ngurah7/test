<div class="content-wrapper">
  <section class="content-header">
    <h1>
    Data Supplier
    <small>Sports</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Data Master</a></li>
      <li><a href="#">Data Supplier</a></li>
    </ol>
  </section>
  <br>
  <?php
  $id = $_GET['edit'];
  $sql_edit = $connect->query("SELECT * FROM supplier where id_supplier = '$id'");
  $data = $sql_edit->fetch(PDO::FETCH_OBJ);
  $id_supplier = $data->id_supplier;
  $nama = $data->nama_supplier;
  $alamat = $data->alamat;
  $telp = $data->no_telp;
  ?>
  <div id="add_content">
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update Supplier</h3>
              </div><!-- /.box-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" id="formEdit" action="pages/supplier/proses_supplier.php?aksi=edit_data&id=<?php echo($id_supplier) ?>">
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-md-2 control-label">Nama Supplier</label>
                    <div class="col-md-8">
                      <input type="text" name="nama" class="form-control" placeholder="Nama Supplier ..." autofocus="" required="" value="<?php echo($nama) ?>">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-md-2 control-label">Alamat</label>
                    <div class="col-md-8">
                      <textarea class="form-control" rows="5" name="alamat" placeholder="Alamat Supplier ..."><?php echo "$alamat"; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">No. Telp</label>
                    <div class="col-md-8">
                      <input type="text" name="telp" class="form-control" placeholder="No. Telp ..." value="<?php echo($telp) ?>"  maxlength="13" required="">
                    </div>
                  </div>
                  <div class="box-footer">
                    <div class="col-md-7"></div>
                    <div class="col-md-3">
                      <input type="submit" class="btn btn-success" name="edit_data" id="edit_data" value="Update Data"/>
                      &nbsp;&nbsp;&nbsp;
                      <a href="?page=supplier" class="btn btn-danger">Batal</a>
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