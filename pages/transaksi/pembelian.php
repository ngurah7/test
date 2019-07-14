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
  
  <div class="row">
    <div style="padding: 1%">
      <div class="col-md-2">
        <center>
        <a href="?page=pembelian&action=add-pembelian" class="btn btn-primary">Tambah Pembelian <i class="fa fa-plus-circle"></i></a>
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
                  <h3 class="box-title">Data Pembelian</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>No. Nota</th>
                          <th>Tanggal</th>
                          <th>Supplier</th>
                          <th>Barang</th>
                          <th>Total Qty</th>
                          <th>Total Pembelian</th>
                          <th colspan="2">Aksi</th>
                          
                        </tr>
                      </thead>
                      
                      <tbody>
                        <?php
                        $no=1;
                        $query = $connect->query("SELECT pembelian.*, supplier.* 
                          from pembelian
                          join supplier on pembelian.id_supplier = supplier.id_supplier
                          ");
                        while ($data = $query->fetch(PDO::FETCH_OBJ)) {
                        $id_pembelian = $data->id_pembelian;
                        ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $data->id_pembelian; ?></td>
                          <td><?php echo $data->tgl_pembelian; ?></td>
                          <td><?php echo $data->nama_supplier; ?></td>
                          <td>
                          <?php
                          $sql_barang = $connect->query("SELECT detail_pembelian.*, barang.*
                          from detail_pembelian
                          JOIN barang on detail_pembelian.id_barang = barang.id_barang
                          where id_pembelian='$id_pembelian'
                          ");
                          while ($data_barang = $sql_barang->fetch(PDO::FETCH_OBJ)) { ?>
                          <b><?php echo $data_barang->nama_barang; ?></b> (<?php echo $data_barang->qty_beli; ?> @ <?php echo "Rp. " . number_format($data_barang->harga_satuan_beli,0,',','.'); ?>) Subtotal : <?php echo "Rp. " . number_format($data_barang->subtotal_beli,0,',','.'); ?> ,
                          <?php } ?>
                        </td>
                          <td><?php echo $data->total_qty; ?></td>
                          <td><?php rupiah($data->total_belanja); ?></td>
                          <td>
                            <a href="pages/transaksi/detail_pembelian.php?detail=<?php echo $data->id_pembelian; ?>" data-toggle="modal" data-target="#myModal" class="btn btn-primary"><i class="fa fa-info"></i></a>
                          </td>
                          <td>

                            <a href="pages/laporan/nota_pembelian.php?nota=<?php echo $data->id_pembelian; ?>" target="_blank" class="btn btn-danger"><i class="fa fa-print"></i></a>
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