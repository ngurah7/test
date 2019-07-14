<div class="content-wrapper">
  <section class="content-header">
    <h1>
    Data Barang
    <small>Sports</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Data Master</a></li>
      <li><a href="#">Data Barang</a></li>
    </ol>
  </section>
  <br>
  
  <div class="row">
    <div style="padding: 1%">
      <div class="col-md-2">
        <center><button class="btn btn-primary" id="btn_add">Tambah Barang <i class="fa fa-plus-circle"></i> </button></center>
      </div>
    </div>
  </div>
  
  <div id="add_content" style="display: none; ">
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Barang</h3>
              </div><!-- /.box-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" id="formAdd" action="pages/barang/proses_barang.php?aksi=add_data">
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-md-3 control-label">Nama Barang</label>
                    <div class="col-md-8">
                      <input type="text" name="nama" class="form-control" placeholder="Nama Barang ..." autofocus="" required="">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-md-3 control-label">Kategori Barang</label>
                    <div class="col-md-8">
                      <select class="form-control selectpicker" data-live-search="true" name="id_kategori" required="">
                        <option value="">- Pilih Kategori Barang -</option>
                        <?php
                        $query = $connect->query("SELECT * from kategori");
                        while ($data = $query->fetch(PDO::FETCH_OBJ)) {
                        ?>
                        <option value="<?php echo $data->id_kategori ?>"><?php echo $data->kategori; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-3 control-label">Harga Beli *per Satuan</label>
                    <div class="col-md-8">
                      <input type="text" name="harga_beli" id="harga1" class="form-control" placeholder="Harga Beli Barang ..." required="" onkeyup="autoRupiah();">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-3 control-label">Harga Jual *per Satuan</label>
                    <div class="col-md-8">
                      <input type="text" name="harga_jual" id="harga2" class="form-control" placeholder="Harga Jual Barang ..." required="" onkeyup="autoRupiah2();">
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
                  <h3 class="box-title">Data Barang</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama Barang</th>
                          <th>Kategori</th>
                          <th>Stok</th>
                          <th>Harga Beli</th>
                          <th>Harga Jual</th>
                          <th>Aksi</th>
                          
                        </tr>
                      </thead>
                      
                      <tbody>
                        <?php
                        $no=1;
                        $query = $connect->query("SELECT barang.*, kategori.*
                          from barang
                          JOIN kategori on barang.id_kategori = kategori.id_kategori
                          ");
                        while ($data = $query->fetch(PDO::FETCH_OBJ)) {
                        
                        ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $data->nama_barang; ?></td>
                          <td><?php echo $data->kategori; ?></td>
                          <td><?php echo $data->stok; ?></td>
                          <td><?php rupiah($data->harga_beli); ?></td>
                          <td><?php rupiah($data->harga_jual); ?></td>
                          <td>
                            <a href="?page=barang&action=edit&edit=<?php echo $data->id_barang; ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
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
                        
                        $query = $connect->query("SELECT * from barang");
                        $itung = $query->rowCount();
                        
                        if ($itung>0) {
                        ?>
                        
                        <a href="pages/barang/print_barang.php" class="btn btn-danger pull-right" target="_blank">Cetak Laporan</a>

                        <?php } ?>
                        <!-- <a href="?page=stok-opname" class="btn btn-danger pull-right"> Cetak</a> -->
                      </div>
                    </div>
                  </div>
                    </section><!-- /.content -->
                  </div>