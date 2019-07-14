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

  
  <div class="row">
    <div style="padding: 1%">
    <div class="col-md-2">
      <center><button class="btn btn-primary" id="btn_add">Tambah Supplier <i class="fa fa-plus-circle"></i> </button></center>
    </div>
  </div>
  </div>

  <div id="add_content" style="display:none ; ">
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Supplier</h3>
              </div><!-- /.box-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" id="formAdd" action="pages/supplier/proses_supplier.php?aksi=add_data">
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-md-2 control-label">Nama Supplier</label>
                    <div class="col-md-8">
                      <input type="text" name="nama" class="form-control" placeholder="Nama Supplier ..." autofocus="" required="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label">Alamat</label>
                    <div class="col-md-8">
                      <textarea class="form-control" rows="5" name="alamat" placeholder="Alamat Supplier ..."></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label">No. Telp</label>
                    <div class="col-md-8">
                      <input type="text" name="telp" class="form-control" placeholder="No. Telp ..."  maxlength="13" required="">
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
                  <h3 class="box-title">Data Supplier</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama Supplier</th>
                          <th>Alamat</th>
                          <th>No. Telp</th>
                          <th>Aksi</th>
                          
                        </tr>
                      </thead>
                      
                      <tbody>
                        <?php
                        $no=1;
                        $query = $connect->query("SELECT * from supplier");
                        while ($data = $query->fetch(PDO::FETCH_OBJ)) {
                        
                        ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $data->nama_supplier; ?></td>
                          <td><?php echo $data->alamat; ?></td>
                          <td><?php echo $data->no_telp; ?></td>
                          <td>
                            <a href="?page=supplier&action=edit&edit=<?php echo $data->id_supplier; ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                          </td>
                          
                          <?php } ?>
                        </tr>
                      </tbody>
                      
                    </table>
                    </div><!-- /.box-body -->
                    </div><!-- /.box -->
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                    <div class="row">
                    <div style="padding: 1%">
                      <div class="col-md-12">
                        <?php
                        
                        $query = $connect->query("SELECT * from supplier");
                        $itung = $query->rowCount();
                        
                        if ($itung>0) {
                        ?>
                        
                        <a href="pages/supplier/print_supplier.php" class="btn btn-danger pull-right" target="_blank">Cetak Laporan</a>

                        <?php } ?>
                        <!-- <a href="?page=stok-opname" class="btn btn-danger pull-right"> Cetak</a> -->
                      </div>
                    </div>
                  </div>
                    </section><!-- /.content -->
                  </div>