<?php 
session_start();
include 'koneksi.php';

$id_pembelian_barusan = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan on pembelian.id_pelanggan=pelanggan.id_pelanggan where pembelian.id_pembelian = $id_pembelian_barusan;");
$detail = $ambil->fetch_assoc();
//echo "<pre>";
//print_r($detail);
//echo "</pre>";

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Invoice Purchase | House of Pastry  </title>
	<!-- Fav Icon di bar -->
	<link rel="shortcut icon" type="image/png" href="img/logo1.jpg"> 

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="home1.css" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">
</head>
<body>

	<?php 
	require ('navbar_pelanggan1.php');
	?>

	<section class="konten">
		<div class="container">

			<br>
			<h2 style="text-align: center"> Purchase Invoice  </h2>
			<hr>
			<br>

			<?php 
			// pelanggan yang beli 
			$pbeli = $detail['id_pelanggan'];
			$plogin = $_SESSION['pelanggan2']['id_pelanggan'];

			if($pbeli !== $plogin){
				echo "<script> alert('That is not your Purchase Invoice') </script>";
				echo "<script> location='history.php' </script>"; 
				exit();
			}
			?>

			<div class="row">
				<div class="col-md-4">
					<h3> Purchase </h3>
					<strong> Purchase No : <?php echo $detail['id_pembelian']; ?> </strong> <br>
					Date : <?php echo $detail['tanggal_pembelian']; ?> <br><br>

				</div>
				<div class="col-md-4"> 
					<h3> Customer </h3>
					<strong> <?php echo $detail['nama_pelanggan']; ?> </strong> <br>
					<p>
						Phone : <?php echo $detail['telepon_pelanggan']; ?> <br>
						Address : <?php echo $detail['alamat_pelanggan']; ?> <br>

					</p>
				</div>
				<div class="col-md-4">
					<h3> Delivery Detail </h3>
					Address : <?php echo $detail['alamat_tujuan']; ?> <br><br>
				</div>
			</div>

			<table class=" table table-bordered text-center">
				<thead>
					<tr>
						<th> No </th>
						<th> Quantity </th>
						<th> Product Name </th>
						<th> Price </th>
						<th> Sub Total </th>
					</tr>
				</thead>


				<tbody>
					<?php $nomor = 1; ?>
					<?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian ='$_GET[id]'"); ?>
					<?php while($pecah = $ambil->fetch_assoc()) { ?>
						<tr>
							<td> <?php echo $nomor; ?> </td>
							<td> <?php echo $pecah['jumlah'] ?> </td>
							<td> <?php echo $pecah['nama'] ?> </td>
							<td> IDR. <?php echo number_format($pecah['harga']); ?> </td>
							<td> IDR. <?php echo number_format($pecah ['subharga']); ?></td>
						</tr>
						<?php $nomor++; ?>
					<?php } ?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="4"> Delivery Cost </td>
						<td colspan="1" > IDR. <?php echo number_format($detail['tarif']);?> </td>
					</tr>
					<tr>
						<td colspan="4" style="font-weight: bold"> Grand Total </td>
						<td colspan="1" style="font-weight: bold"> IDR. <?php echo number_format($detail['total_pembelian']);?> </td>
					</tr>	
				</tfoot>
			</table>

			<div class="row">
				<div class="col-md-7">
					<div class="alert alert-info">
						<p>
							Please make payment to : <br>
							<strong> House Of Pastry <br>
								BANK BCA <br>
							A/C 123-456789-1233</strong>
						</p>
					</div>
				</div>
			</div>
			<!-- <div class="row text-center">
				&nbsp;&nbsp;&nbsp;&nbsp;<a href="pdf_nota.pdf?id=<?php echo $id_pembelian_barusan; ?>" class="btn btn-danger"><i class="fa fa-print" aria-hidden="true"></i> Export to PDF </a>
			</div> -->
		</section>

	</body>
	</html>