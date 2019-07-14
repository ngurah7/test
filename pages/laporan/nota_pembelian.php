<!DOCTYPE html>
<html>
	<head>
		<title>Sports</title>
		<link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
		<script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body>
		<?php
		include '../connect/connection.php';
		$nota = $_GET['nota'];
		$sql_detail = $connect->query("SELECT pembelian.*, user.*, supplier.*
		from pembelian
		JOIN user on pembelian.id_user = user.id_user
		JOIN supplier on pembelian.id_supplier = supplier.id_supplier
		where id_pembelian='$nota'
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
		
		<div style="width: 1000px; margin: 0 auto;">
			
			<div class="row">
				<div class="col-md-3"></div>
				
				<div class="col-md-6">
					<center>
					<h3 style="line-height: 8px">Sports</h3>
					<h3 style="line-height: 8px">Nota Pembelian</h3>
					
					</center>
				</div>
				<div class="col-md-3"></div>
			</div>
			<br>
			<center>
			<p>==============================================================================================</p>
			</center>
			<br>
			
			<div style="margin-left: 15%">
				<table >
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
						<td>Admin</td>
						<td>&nbsp;:&nbsp;</td>
						<td><?php echo $admin; ?></td>
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
						<td>Telp</td>
						<td>&nbsp;:&nbsp;</td>
						<td><?php echo $telp; ?></td>
					</tr>
					
				</table>
			</div>
			
			<br>
			<center>
			
			<table border="1">
				<thead>
					<tr>
						<th style="padding: 8px;">No.</th>
						<th style="padding: 8px;">Nama Barang</th>
						<th style="padding: 8px;">Harga Satuan</th>
						<th style="padding: 8px;">Jumlah</th>
						<th style="padding: 8px;">Subtotal</th>
						
					</tr>
				</thead>
				
				<tbody>
					<?php
					$no = 1;
					$sql_barang = $connect->query("SELECT detail_pembelian.*, barang.*
					from detail_pembelian
					JOIN barang on detail_pembelian.id_barang = barang.id_barang
					where id_pembelian='$id_po'
					");
					while ($data_barang = $sql_barang->fetch(PDO::FETCH_OBJ)) { ?>
					<tr>
						<td style="padding: 8px;"><?php echo $no++; ?></td>
						<td style="padding: 8px;"><?php echo $data_barang->nama_barang; ?></td>
						<td style="padding: 8px;"><?php echo "Rp " . number_format($data_barang->harga_satuan_beli,0,',','.'); ?></td>
						<td style="padding: 8px;"><?php echo $data_barang->qty_beli; ?></td>
						<td style="padding: 8px; text-align: right;"><?php echo "Rp " . number_format($data_barang->subtotal_beli,0,',','.'); ?></td>
						
					</tr>
					<?php } ?>
				</tbody>
				
			</table>
			</center>
			<br>
			
			<div style="margin-left: 15%">
				<table>
					<tr>
						<td>Total</td>
						<td>&nbsp; : &nbsp;</td>
						<td style="text-align: right;"><?php echo "Rp " . number_format($total_pembelian,0,',','.'); ?></td>
					</tr>
					
					
				</table>
			</div>
			
		</div>
		<script type="text/javascript">
		window.print();
		</script>
	</body>
</html>