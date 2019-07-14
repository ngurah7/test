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
								
								<td align="center"><h3 style="margin:0px;">Laporan Data Supplier</h3></td>

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
						<th style="padding: 8px" width="250">Nama Supplier</th>
						<th style="padding: 8px">No. Telp</th>
						<th style="padding: 8px" width="300">Alamat</th>
					</tr>
				</thead>
				<tbody>
					<?php
					
					$no=1;
					$query = $connect->query("SELECT * from supplier");
					while ($data = $query->fetch(PDO::FETCH_OBJ)) {

					?>
					<tr>
                        <td style="padding: 8px"><?php echo $no++; ?></td>
                        <td style="padding: 8px"><?php echo $data->nama_supplier; ?></td>
                        <td style="padding: 8px"><?php echo $data->no_telp; ?></td>
                        <td style="padding: 8px"><?php echo $data->alamat; ?></td>
                        
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