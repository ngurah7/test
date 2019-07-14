<?php
include '../connect/connection.php';
$id = $_GET['detail'];
$sql_detail = $connect->query("SELECT penjualan.*, user.*
from penjualan
JOIN user on penjualan.id_user = user.id_user
where id_penjualan='$id'
");
$data_detail = $sql_detail->fetch(PDO::FETCH_OBJ);
$id_po = $data_detail->id_penjualan;
$tgl_jual = $data_detail->tgl_penjualan;
$admin = $data_detail->nama_user;
$jumlah_qty = $data_detail->total_qty;
$total_pembelian = $data_detail->total_belanja;
$pembayaran = $data_detail->pembayaran;
$kembalian = $data_detail->kembalian;
?>
<!-- Modal -->
<div class="modal-dialog">
  
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" onclick="reload()">&times;</button>
      <h4 class="modal-title">Detail Penjualan</h4>
    </div>
    <div class="modal-body">
      <table>
        <tr>
          <td>No. Nota</td>
          <td>&nbsp;:&nbsp;</td>
          <td><?php echo $id_po; ?></td>
        </tr>
        <tr>
          <td>Tanggal Penjualan</td>
          <td>&nbsp;:&nbsp;</td>
          <td><?php echo $tgl_jual; ?></td>
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
          <td>Bayar</td>
          <td>&nbsp;:&nbsp;</td>
          <td><?php echo "Rp. " . number_format($pembayaran,0,',','.'); ?></td>
        </tr>
        <tr>
          <td>Kembalian</td>
          <td>&nbsp;:&nbsp;</td>
          <td><?php echo "Rp. " . number_format($kembalian,0,',','.'); ?></td>
        </tr>
        <tr>
          <td valign="top">Pembelian Barang</td>
          <td valign="top">&nbsp;:&nbsp;</td>
          <td>
            <ul>
            <?php
            $sql_barang = $connect->query("SELECT detail_penjualan.*, barang.*
            from detail_penjualan
            JOIN barang on detail_penjualan.id_barang = barang.id_barang
            where id_penjualan='$id_po'
            ");
            while ($data_barang = $sql_barang->fetch(PDO::FETCH_OBJ)) { ?>
            <li><?php echo $data_barang->nama_barang; ?> ( Qty : <?php echo $data_barang->qty_jual; ?> @ <?php echo "Rp. " . number_format($data_barang->harga_satuan_jual,0,',','.'); ?>) / Subtotal : <?php echo "Rp. " . number_format($data_barang->subtotal_jual,0,',','.'); ?></li>
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