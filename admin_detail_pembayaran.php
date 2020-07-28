<?php
session_start();
if(empty($_SESSION['admin'])){
	header("location:login.php");
}
include 'koneksi.php';

$ambil = $koneksi->query("SELECT * FROM pembelian where id_pembelian = '$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Admin Pembayaran | House of Pastry </title>
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
	require ('navbar_admin.php');
	?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"> </div>
			<div class="col-md-8">
				<br>
				<hr>
				<h2 style="text-align: center"> Detail Pembayaran </h2>
				<hr>
				<br>
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label> Tanggal Beli </label>
						<input type="text" class="form-control" name="tanggal" value="<?php echo $detail['tanggal_pembelian']; ?>" readonly>
					</div>
					<div class="form-group">
						<label> Total Pembelian </label>
						<input type="text" class="form-control" name="total" value="IDR. <?php echo number_format($detail['total_pembelian']) ?>" readonly>
					</div>
					<div class="form-group">
						<img src="foto_nota/<?php echo $detail['foto_nota'] ?>" width="300">
					</div>
					<div class="form-group">
						<label> Status Pembayaran</label>
						<input type="text" class="form-control" name="status" value="<?php echo $detail['status_pembelian'] ?>">
					</div>
					<div class="form-group">
						<button class="btn btn-primary" name="save"> Save </button>
						<a href="admin_pembelian.php" class="btn btn-primary"> Back </a>
					</div>
				</form>
			</div>
			<div class="col-md-2"> </div>
		</div>
	</div>
</body>
</html>

<?php
if(isset ($_POST['save'])){

/*	if($status != ""){*/
	$koneksi->query("UPDATE pembelian set status_pembelian = '$_POST[status]' where id_pembelian='$_GET[id]'");

		echo "<script> alert('Update Success') </script>";
		echo "<script> location='admin_pembelian.php'; </script>";
	/*}*/
/*	else{
		echo "<script> alert('No update detect') </script>";
		echo "<script> location='admin_detail_pembayaran.php?id=<?php echo '$_GET[id]'?>'; </script>";
	}*/
}
?>