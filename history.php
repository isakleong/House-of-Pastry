<?php
session_start();
if(empty($_SESSION['pelanggan'])){
	header("location:login.php");
}
include 'koneksi.php';
$nama = $_SESSION['pelanggan'];
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> History | House of Pastry </title>
	<!-- Fav Icon di bar -->
	<link rel="shortcut icon" type="image/png" href="img/logo1.jpg"> 

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="home1.css" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.css"/>
	
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.js"></script>

	<script type="text/javascript">
		$(document).ready( function () {
			$('#datatables').DataTable();
		} );
	</script>
</head>
<body>
	<?php 
	require ('navbar_pelanggan1.php');
	?>
	
	<br>
	<hr>
	<h2 style="text-align: center"> Shopping History </h2>
	<hr>
	<br>

	<table class=" table table-bordered text-center" id="datatables">
		<thead>
			<tr>
				<th> No </th>
				<th> Tanggal </th>
				<th> Total </th>
				<th> Status </th>
				<th> Invoice </th>
				<th> Payment </th>
			</tr>
		</thead>


		<tbody>
			<?php 
			$nomor = 1;
			$ambil = $koneksi->query("SELECT * FROM pembelian join pelanggan on pembelian.id_pelanggan=pelanggan.id_pelanggan where pelanggan.nama_pelanggan='$nama' order by pembelian.tanggal_pembelian"); 

			$detailcocok = $ambil->num_rows;

			if ($detailcocok >= 1) {
				while($pecah = $ambil->fetch_assoc()) { ?>
					<tr>
						<td> <?php echo $nomor; ?> </td>
						<td> <?php echo $pecah['tanggal_pembelian'] ?> </td>
						<td> IDR. <?php echo number_format($pecah['total_pembelian']); ?></td>
						<td>
							<?php 
							if ($pecah['status_pembelian'] == "Accept"){
								echo "<font color='#ff0000'>" .$pecah['status_pembelian']. "</font>";		
							}else{
								echo $pecah['status_pembelian'];
							}
							?>
						</td>
						<td> <a href="nota.php?id=<?php echo $pecah['id_pembelian'] ?>" class="btn btn-info"> <img src="icon/svg/si-glyph-document-bullet-list.svg" width="20" height="20"> </a></td>

						<?php if ($pecah['status_pembelian'] == "Pending"): ?> 
							<td><a href="pembayaran_pelanggan.php?id=<?php echo $pecah['id_pembelian']?>" class="btn btn-success"> 
								<img src="icon/svg/si-glyph-money-3.svg" width="20" height="20"> </a> </td>	
								<?php else: ?>
									<td> <img src='img/centang.png'> </td>
								<?php endif ?>
							</tr>

							<?php $nomor++; ?>
						<?php } ?>
					<?php }
					else{ 
						echo "<script> alert('Your shopping history is empty') </script>";
						echo "<script> location='kategori.php' </script>"; 
					}
					?>

				</tbody>
			</table>

		</body>
		</html>
