<div class="content-wrapper">
  <section class="content-header">
    <h1>
    Data Penjualan Barang
    <small>Sports</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Transaksi</a></li>
      <li><a href="#">Data Penjualan Barang</a></li>
    </ol>
  </section>
  <br>
  
  <div class="row">
    <div style="padding: 1%">
      <div class="col-md-2">
        <center>
        <a href="?page=penjualan&action=add-penjualan" class="btn btn-primary">Tambah Penjualan <i class="fa fa-plus-circle"></i></a>
        </center>
      </div>
    </div>
  </div>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box" style="overflow-y: auto;">
                <div class="box-header">
                  <h3 class="box-title">Data Penjualan</h3>
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
                          <th colspan="2">Aksi</th>
                          
                        </tr>
                      </thead>
                      
                      <tbody>
                        <?php
                        $no=1;
                        $query = $connect->query("SELECT penjualan.*, user.* 
                          from penjualan
                          join user on penjualan.id_user = user.id_user
                          ");
                        while ($data = $query->fetch(PDO::FETCH_OBJ)) {
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
                          <td>
                            <a href="pages/transaksi/detail_penjualan.php?detail=<?php echo $data->id_penjualan; ?>" data-toggle="modal" data-target="#myModal" class="btn btn-primary"><i class="fa fa-info"></i></a>
                          </td>
                          <td>

                            <a href="pages/laporan/nota_penjualan.php?nota=<?php echo $data->id_penjualan; ?>" target="_blank" class="btn btn-danger"><i class="fa fa-print"></i></a>
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

                  <!-- Modal -->
                  <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                      
                      <!-- Modal content-->
                      <div class="modal-content">
                        
                      </div>
                      
                    </div>
                  </div>