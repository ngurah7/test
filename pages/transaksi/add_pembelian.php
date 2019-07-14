<style type="text/css">
.font-label{
font-size: 16px;
line-height: 5px;
}
</style>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
    Data Pembelian Barang
    <small>Sports</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Transaksi</a></li>
      <li><a href="#">Data Pembelian Barang</a></li>
    </ol>
  </section>
  <br>
  <?php
  $tanggal = date('Y-m-d');
  $id_admin = $_SESSION['id'];
  $total_pembelian = 0;
  $total_qty = 0;
  $sql_nota = "SELECT * FROM pembelian order by id_pembelian desc limit 1";
  $cek_nota = $connect->query($sql_nota)->rowCount();
  if ($cek_nota > 0) {
  $query_nota = $connect->query($sql_nota);
  $data_nota = $query_nota->fetch(PDO::FETCH_OBJ);
  $kodeBarang = $data_nota->id_pembelian;
  $noUrut = (int) substr($kodeBarang, 3, 3);
  $noUrut++;
  $id_nota = "PB-" . sprintf("%03s", $noUrut);
  // $id = $data_det['id_order']+1;
  }else{
  $id_nota = "PB-001";
  }
  ?>
  <div id="add_content" style="display: ; ">
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Keranjang</h3>
              </div><!-- /.box-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" id="formAdd" action="pages/transaksi/proses_pembelian.php?aksi=add_keranjang">
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-md-2 control-label">Nama Barang</label>
                    <div class="col-md-8">
                      <select class="form-control selectpicker" data-live-search="true" name="id_barang" required="">
                        <option value="">- Pilih Barang -</option>
                        <?php
                        $query = $connect->query("SELECT * from barang");
                        while ($data = $query->fetch(PDO::FETCH_OBJ)) {
                        ?>
                        <option value="<?php echo $data->id_barang ?>"><?php echo $data->nama_barang; ?> ( Harga Satuan : <?php echo "Rp " . number_format($data->harga_beli,0,',','.'); ?> / Stok : <?php echo $data->stok; ?>)</option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-md-2 control-label">Qty</label>
                    <div class="col-md-3">
                      <input type="number" name="qty" class="form-control" placeholder="Qty Barang ..." required="">
                    </div>
                  </div>
                  
                  
                  <div class="box-footer">
                    <div class="col-md-7"></div>
                    <div class="col-md-3">
                      <input type="submit" class="btn btn-success pull-right" name="add_data" value="Tambah Keranjang"/>
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
        <section class="content" style="margin-top: -30px;">
          <div class="row">
            <div class="col-xs-12">
              <div class="box" style="overflow-y: auto;">
                <div class="box-header">
                  <h3 class="box-title">Data Keranjang Belanja</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama Barang</th>
                          <th>Harga Satuan</th>
                          <th>Qty</th>
                          <th>Subtotal</th>
                          <th>Aksi</th>
                          
                        </tr>
                      </thead>
                      
                      <tbody>
                        <?php
                        $no=1;
                        $query = $connect->query("SELECT barang.*, keranjang.*
                        from keranjang
                        JOIN barang on keranjang.id_barang = barang.id_barang
                        where status_keranjang=2
                        ");
                        while ($data = $query->fetch(PDO::FETCH_OBJ)) {
                        $total_pembelian += $data->subtotal;
                        $total_qty += $data->qty;
                        $id_cart = $data->id_keranjang;
                        ?>
                        <tr>
                          <form method="post" id="formEdit" action="pages/transaksi/proses_pembelian.php?aksi=edit_cart&id=<?php echo($id_cart) ?>">
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data->nama_barang; ?></td>
                            <td><?php rupiah($data->harga); ?></td>
                            <td><input type="number" name="qty_cart" class="form-control" style="width: 100px;" value="<?php echo $data->qty; ?>">
                          </td>
                          <td><?php rupiah($data->subtotal); ?></td>
                          <td>
                            <button class="btn btn-success" name="edit_cart" id="edit_data"><i class="fa fa-pencil"></i></button>
                            <a data-url="pages/transaksi/proses_pembelian.php?aksi=delete&id=<?php echo($id_cart) ?>" href="" class="btn btn-danger confirm_delete"><i class="fa fa-times"></i></a>
                          </td>
                        </form>
                        <?php } ?>
                      </tr>
                    </tbody>
                    
                  </table>
                  </div><!-- /.box-body -->
                  </div><!-- /.box -->
                  </div><!-- /.col -->
                  <div class="content">
                    <div class="row">
                      <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="box box-primary">
                          <div class="box-header with-border">
                            <h3 class="box-title">Pembayaran</h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form class="form-horizontal" method="post" id="formBayar" action="pages/transaksi/proses_pembelian.php?aksi=add_pembayaran">
                              <div class="box-body">
                                <div class="form-group">
                                  <label class="col-md-3 control-label font-label">No. Nota</label>
                                  <div class="col-md-6">
                                    <label class="control-label font-label"><?php echo $id_nota; ?></label>
                                    <input type="hidden" name="id_nota" class="form-control" value="<?php echo($id_nota) ?>" readonly="">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-md-3 control-label font-label">Supplier</label>
                                  <div class="col-md-6">
                                    <select class="form-control selectpicker" data-live-search="true" name="id_supplier" required="">
                                      <option value="">- Cari Supplier -</option>
                                      <?php
                                      $query = $connect->query("SELECT * from supplier");
                                      while ($data = $query->fetch(PDO::FETCH_OBJ)) {
                                      ?>
                                      <option value="<?php echo $data->id_supplier ?>"><?php echo $data->nama_supplier; ?> </option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-md-3 control-label font-label">Total Qty</label>
                                  <div class="col-md-6">
                                    <label class="control-label font-label"><?php echo $total_qty; ?></label>
                                    <input type="hidden" name="total_qty" class="form-control" value="<?php echo($total_qty) ?>" readonly="">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-md-3 control-label font-label">Total Pembelian</label>
                                  <div class="col-md-6">
                                    <label class="control-label font-label"><?php echo number_format($total_pembelian,0,',','.') ?></label>
                                    <input type="hidden" name="total_belanja" id="total_belanja" class="form-control" value="<?php echo($total_pembelian) ?>" readonly="">
                                  </div>
                                </div>
                                
                                
                                
                                <div class="box-footer">
                                  <div class="col-md-6">
                                    <input type="submit" class="btn btn-success pull-right" name="bayar_transaksi" id="bayar_transaksi" value="Simpan Transaksi"/>
                                  </div>
                                  <div class="col-md-2">
                                    <a data-url="pages/transaksi/proses_pembelian.php?aksi=delete_cart" href="" class="btn btn-danger confirm_cart">Batal Transaksi</a>
                                  </div>
                                  <div class="col-md-1">
                                    <a href="?page=pembelian" class="btn btn-warning pull-right">Kembali</a>
                                    
                                  </div>
                                  <div class="col-md-1"></div>
                                  </div><!-- /.box-footer -->
                                </form>
                                </div><!-- /.box -->
                              </div>
                            </div>
                          </div>
                          </div><!-- /.row -->
                          </section><!-- /.content -->
                        </div>