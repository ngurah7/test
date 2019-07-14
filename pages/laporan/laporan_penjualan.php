<div class="content-wrapper">
  <section class="content-header">
    <h1>
    Laporan Penjualan
    <small>Sports</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Laporan</a></li>
      <li><a href="#">Laporan Penjualan</a></li>
    </ol>
  </section>
  <br>
  <?php
  $total_qty = 0;
  $total_biaya = 0;
  ?>
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <form method="post" class="form-horizontal">
        <div class="col-md-12">
          <div class="form-group">
            <label class="col-md-1 control-label">Periode</label>
            <div class="col-md-3">
              <input type="date" name="periode1" class="form-control">
            </div>
            <label class="col-md-1 control-label">Sampai</label>
            <div class="col-md-3">
              <input type="date" name="periode2" class="form-control">
            </div>
            <div class="col-md-2">
              <input type="submit" name="cari" value="Cari Data" class="btn btn-primary">
            </div>
          </form>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <div class="box" style="overflow-y: auto;">
              <div class="box-header">
                <h3 class="box-title">Data Laporan Penjualan</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>No. Nota</th>
                        <th>Tanggal</th>
                        <th>User</th>
                        <th>Barang</th>
                        <th>Total Qty</th>
                        <th>Total Penjualan</th>
                        
                        
                      </tr>
                    </thead>
                    
                    <tbody>
                      <?php
                      if(isset($_POST['cari'])){
                      $periode1 = $_POST['periode1'];
                      $periode2 = $_POST['periode2'];
                      $no=1;
                      
                      $query = $connect->query("SELECT penjualan.*, user.* 
                        from penjualan
                        join user on penjualan.id_user = user.id_user
                      WHERE tgl_penjualan between '$periode1' and '$periode2'
                      ");
                      
                      while ($data = $query->fetch(PDO::FETCH_OBJ)) {
                      @$total_qty += $data->total_qty;
                      @$total_biaya += $data->total_belanja;
                      $id_penjualan = $data->id_penjualan;
                      ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data->id_penjualan; ?></td>
                        <td><?php echo $data->tgl_penjualan; ?></td>
                        <td><?php echo $data->nama_user; ?></td>
                        <td>
                          <?php
                          $sql_barang = $connect->query("SELECT detail_penjualan.*, barang.*
                          from detail_penjualan
                          JOIN barang on detail_penjualan.id_barang = barang.id_barang
                          where id_penjualan='$id_penjualan'
                          ");
                          while ($data_barang = $sql_barang->fetch(PDO::FETCH_OBJ)) { ?>
                          <b><?php echo $data_barang->nama_barang; ?></b> (<?php echo $data_barang->qty_jual; ?> @ <?php echo "Rp. " . number_format($data_barang->harga_satuan_jual,0,',','.'); ?>) Subtotal : <?php echo "Rp. " . number_format($data_barang->subtotal_jual,0,',','.'); ?> ,
                          <?php } ?>
                        </td>
                        <td><?php echo $data->total_qty; ?></td>
                        <td><?php rupiah($data->total_belanja); ?></td>
                        
                        <?php }} ?>
                      </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                      <td colspan="5"><strong><center>Total Penjualan</center></strong> </td>
                      <td><?php echo $total_qty; ?></td>
                      <td><?php rupiah($total_biaya); ?></td>
                    </tr>
                    </tfoot>
                  </table>
                  </div><!-- /.box-body -->
                  </div><!-- /.box -->
                  </div><!-- /.col -->
                  </div><!-- /.row -->
                  <div class="row">
                    <div style="padding: 1%">
                      <div class="col-md-12">
                        <?php
                        if(isset($_POST['cari'])){
                        $periode1 = $_POST['periode1'];
                        $periode2 = $_POST['periode2'];
                        
                        $query = $connect->query("SELECT penjualan.*, user.* 
                        from penjualan
                        join user on penjualan.id_user = user.id_user
                      WHERE tgl_penjualan between '$periode1' and '$periode2'
                      ");
                        $itung = $query->rowCount();
                        
                        if ($itung>0) {
                        ?>
                        
                        <form method="post" action="pages/laporan/print_laporan_penjualan.php" target="_blank">
                          <input type="hidden" name="periode1nya" value="<?php echo $periode1; ?>" />
                          <input type="hidden" name="periode2nya" value="<?php echo $periode2; ?>" />
                          <input type="submit" class="btn btn-danger pull-right" value="Cetak Laporan" />
                        </form>
                        
                        <?php }} ?>
                        <!-- <a href="?page=stok-opname" class="btn btn-danger pull-right"> Cetak</a> -->
                      </div>
                    </div>
                  </div>
                  </section><!-- /.content -->
                </div>