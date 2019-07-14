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
								
								<td align="center"><h3 style="margin:0px;">Laporan Data Barang</h3></td>

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
			<table border="1">
				
				<thead>
					<tr>
						<th style="padding: 8px">No.</th>
						<th style="padding: 8px">Nama Barang</th>
						<th style="padding: 8px">Kategori</th>
						<th style="padding: 8px">Stok</th>
						<th style="padding: 8px">Harga Beli</th>
						<th style="padding: 8px">Harga Jual</th>
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
                        <td style="padding: 8px"><?php echo $no++; ?></td>
                        <td style="padding: 8px"><?php echo $data->nama_barang; ?></td>
                        <td style="padding: 8px"><?php echo $data->kategori; ?></td>
                        <td style="padding: 8px"><?php echo $data->stok; ?></td>
                        <td style="padding: 8px"><?php echo "Rp. " . number_format($data->harga_beli,0,',','.'); ?></td>
						<td style="padding: 8px"><?php echo "Rp. " . number_format($data->harga_jual,0,',','.'); ?></td>
					</tr>
					<?php } ?>
				</tbody>

				
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