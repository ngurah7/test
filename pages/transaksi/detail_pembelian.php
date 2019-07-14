<?php
include '../connect/connection.php';
$id = $_GET['detail'];
$sql_detail = $connect->query("SELECT pembelian.*, user.*, supplier.*
from pembelian
JOIN user on pembelian.id_user = user.id_user
JOIN supplier on pembelian.id_supplier = supplier.id_supplier
where id_pembelian='$id'
");
$data_detail = $sql_detail->fetch(PDO::FETCH_OBJ);
$id_po = $data_detail->id_pembelian;
$tgl_beli = $data_detail->tgl_pembelian;
$supplier = $data_detail->nama_supplier;
$alamat = $data_detail->alamat;
$telp = $data_detail->no_telp;
$admin = $data_detail->nama_user;
$jumlah_qty = $data_detail->total_qty;
$total_pembelian = $data_detail->total_belanja;

?>
<!-- Modal -->
<div class="modal-dialog">
  
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" onclick="reload()">&times;</button>
      <h4 class="modal-title">Detail Pembelian</h4>
    </div>
    <div class="modal-body">
      <table>
        <tr>
          <td>No. Nota</td>
          <td>&nbsp;:&nbsp;</td>
          <td><?php echo $id_po; ?></td>
        </tr>
        <tr>
          <td>Tanggal Pembelian</td>
          <td>&nbsp;:&nbsp;</td>
          <td><?php echo $tgl_beli; ?></td>
        </tr>
        <tr>
          <td>Supplier</td>
          <td>&nbsp;:&nbsp;</td>
          <td><?php echo $supplier; ?></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>&nbsp;:&nbsp;</td>
          <td><?php echo $alamat; ?></td>
        </tr>
        <tr>
          <td>No. Telp</td>
          <td>&nbsp;:&nbsp;</td>
          <td><?php echo $telp; ?></td>
        </tr>
        <tr>
          <td>User</td>
          <td>&nbsp;:&nbsp;</td>
          <td><?php echo $admin; ?></td>
        </tr>
        <tr>
          <td>Total Qty</td>
          <td>&nbsp;:&nbsp;</td>
          <td><?php echo $jumlah_qty; ?></td>
        </tr>
        <tr>
          <td>Total Pembelian</td>
          <td>&nbsp;:&nbsp;</td>
          <td><?php echo "Rp. " . number_format($total_pembelian,0,',','.'); ?></td>
        </tr>
        
        <tr>
          <td valign="top">Pembelian Barang</td>
          <td valign="top">&nbsp;:&nbsp;</td>
          <td>
            <ul>
            <?php
            $sql_barang = $connect->query("SELECT detail_pembelian.*, barang.*
            from detail_pembelian
            JOIN barang on detail_pembelian.id_barang = barang.id_barang
            where id_pembelian='$id_po'
            ");
            while ($data_barang = $sql_barang->fetch(PDO::FETCH_OBJ)) { ?>
            <li><?php echo $data_barang->nama_barang; ?> ( Qty : <?php echo $data_barang->qty_beli; ?> @ <?php echo "Rp. " . number_format($data_barang->harga_satuan_beli,0,',','.'); ?>) / Subtotal : <?php echo "Rp. " . number_format($data_barang->subtotal_beli,0,',','.'); ?></li>
            <?php } ?>
            </ul>
          </td>
        </tr>
        
        
      </table>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal" onclick="reload()">Tutup</button>
    </div>
  </div>
  
</div>