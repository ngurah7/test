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


<?php

$id = $_GET['edit'];

$sql_edit = $connect->query("SELECT * FROM barang where id_barang = '$id'");
$data = $sql_edit->fetch(PDO::FETCH_OBJ);
$id_barang =$data->id_barang;
$nama = $data->nama_barang;
$kategori = $data->id_kategori;
$harga_jual = number_format($data->harga_jual,0,',','.');
$harga_beli = number_format($data->harga_beli,0,',','.');
$stok = $data->stok;
?>

  <div id="add_content">
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update Barang</h3>
              </div><!-- /.box-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" id="formEdit" action="pages/barang/proses_barang.php?aksi=edit_data&id=<?php echo($id_barang) ?>">
                <div class="box-body">
                  
                  <div class="form-group">
                    <label class="col-md-3 control-label">Nama Barang</label>
                    <div class="col-md-8">
                      <input type="text" name="nama" class="form-control" placeholder="Nama Barang ..." autofocus="" required="" value="<?php echo($nama) ?>">
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
                        <option value="<?php echo $data->id_kategori ?>" <?php if ($kategori=="$data->id_kategori") { echo "selected=\"selected\""; } ?>><?php echo $data->kategori; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-3 control-label">Harga Beli *per Satuan</label>
                    <div class="col-md-8">
                      <input type="text" name="harga_beli" id="harga1" class="form-control" placeholder="Harga Beli Barang ..." required="" onkeyup="autoRupiah();" value="<?php echo($harga_beli) ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-3 control-label">Harga Jual *per Satuan</label>
                    <div class="col-md-8">
                      <input type="text" name="harga_jual" id="harga2" class="form-control" placeholder="Harga Jual Barang ..." required="" onkeyup="autoRupiah2();" value="<?php echo($harga_jual) ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-3 control-label">Stok</label>
                    <div class="col-md-8">
                      <input type="text" name="stok" class="form-control" placeholder="Stok Produk ..." value="<?php echo($stok) ?>" required="" readonly="">
                    </div>
                  </div>
                 
                  
                  <div class="box-footer">
                    <div class="col-md-7"></div>
                    <div class="col-md-3">
                      <input type="submit" class="btn btn-success" name="edit_data" id="edit_data" value="Update Data"/>
                      &nbsp;&nbsp;&nbsp;
                      <a href="?page=barang" class="btn btn-danger">Batal</a>
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