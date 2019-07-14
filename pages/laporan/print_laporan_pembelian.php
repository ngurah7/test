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
		$tanggal = date("d-M-Y");
		$periode1 = $_POST['periode1nya'];
		$periode2 = $_POST['periode2nya'];
				
				
		?>
		
		<div style="width: 1000px; margin: 0 auto;">
			
			<div class="row">
				<div class="col-md-12">
					<div style="padding-left: 0px;">
						<center>
						<table border="0" style="margin-top: 3%">
							<tr>
								<!-- <td rowspan ="3">
									<img src="<?php echo($logo) ?>" style="width: 110px; ">
								</td> -->
								<td style="width: 50px;"></td>
								<td align="center"><h3 style="margin:0px;">Sports</h3></td>
							</tr>
							<tr>
								<td></td>
								
								<td align="center"><h3 style="margin:0px;">Laporan Data Pembelian</h3></td>
							</tr>
							<tr>
								<td></td>
								<td align="center"> <h4 style="margin:0px;">Periode : <?php echo $periode1; ?> - <?php echo $periode2; ?></h4></td>
							</tr>
							
						</table>
						</center>
					</div>
				</div>
			</div>
			<br>
			<center>
			<p>===================================================================================================</p>
			</center>
			<br>
			<center>
			<table border="1" width="800">
				
				<thead>
					<tr>
						<th style="padding: 8px">No.</th>
						<th style="padding: 8px">No. Nota</th>
						<th style="padding: 8px">Tanggal</th>
						<th style="padding: 8px">Supplier</th>
						<th style="padding: 8px" width="300">Barang</th>
						<th style="padding: 8px">Total Qty</th>
						<th style="padding: 8px" width="120">Total Penjualan</th>
					</tr>
				</thead>
				<tbody>
					<?php
					
					$no=1;
					$query = $connect->query("SELECT pembelian.*, supplier.*, user.*
					from pembelian
					JOIN supplier on pembelian.id_supplier = supplier.id_supplier
					JOIN user on pembelian.id_user = user.id_user
					where tgl_pembelian between '$periode1' and '$periode2'
					");
					
					while ($data = $query->fetch(PDO::FETCH_OBJ)) {
					@$total_qty += $data->total_qty;
					@$total_biaya += $data->total_belanja;
					$id_pembelian = $data->id_pembelian;
					?>
					<tr>
						<td style="padding: 8px"><?php echo $no++; ?></td>
						<td style="padding: 8px"><?php echo $data->id_pembelian; ?></td>
						<td style="padding: 8px"><?php echo $data->tgl_pembelian; ?></td>
						<td style="padding: 8px"><?php echo $data->nama_supplier; ?></td>
						<td style="padding: 8px">
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
						<td style="padding: 8px" align="right"><?php echo $data->total_qty; ?></td>
						<td style="padding: 8px" align="right">
							<?php echo "Rp " . number_format($data->total_belanja,0,',','.'); ?>
						</td>
						
					</tr>
					<?php } ?>
				</tbody>
				<tfoot>
				<tr>
					<td colspan="5" style="text-align: center; padding: 8px;"><strong>Total Pembelian</strong></td>
					<td style="text-align: right; padding: 8px;"><strong><?php echo @$total_qty;  ?></strong></td>
					<td style="text-align: right; padding: 8px;"><strong><?php echo "Rp " . number_format(@$total_biaya,0,',','.');  ?></strong></td>
				</tr>
				</tfoot>
				
			</table>
			</center>
			<br>
			<div style="float: right; padding-right: 15%;">
				<span >Tanggal <?php echo $tanggal; ?></span>
			</div>
		</div>
		<script type="text/javascript">
		window.print();
		</script>
	</body>
</html>