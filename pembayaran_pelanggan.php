<?php
session_start();
include 'koneksi.php';

$ambil = $koneksi->query("SELECT * FROM pembelian where id_pembelian = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$status = $pecah['status_pembelian'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Form Pembayaran | House of Pastry </title>
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

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"> </div>
			<div class="col-md-8">

				<?php 
			// pelanggan yang beli 
				$pbeli = $pecah['id_pelanggan'];
				$plogin = $_SESSION['pelanggan2']['id_pelanggan'];

				if($pbeli !== $plogin){
					echo "<script> alert('This is not your Payment Invoice') </script>";
					echo "<script> location='history.php' </script>"; 
					exit();
				}
				if($status == "Accept"){
					echo "<script> alert('You already paid this order !') </script>";
					echo "<script> location='history.php' </script>"; 
					exit();
				}
				?>

				<br>
				<hr>
				<h2 style="text-align: center"> Payment Invoice </h2>
				<hr>
				<br>
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label> Tanggal Beli </label>
						<input type="text" class="form-control" name="tanggal" value="<?php echo $pecah['tanggal_pembelian']; ?>" readonly>
					</div>
					<div class="form-group">
						<label> Total Pembelian </label>
						<input type="text" class="form-control" name="total" value="IDR. <?php echo number_format($pecah['total_pembelian']) ?>" readonly>
					</div>
					<div class="form-group">
						<img src="foto_nota/<?php echo $pecah['foto_nota'] ?>" width="300">
					</div>
					<div class="form-group">
						<label> Update Foto Nota </label>
						<input type="file" class="form-control" name="file">
					</div>
					<div class="form-group">
						<button class="btn btn-primary" name="update"> Update </button>
						<a href="history.php" class="btn btn-primary"> Back </a>
					</div>
				</form>
			</div>
			<div class="col-md-2"> </div>
		</div>
	</div>
</body>
</html>

<?php
if(isset ($_POST['update'])){

	$file = $_FILES['file'];
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileDes = 'foto_nota/'.$fileName;


	if(!empty($fileTmpName)){
		move_uploaded_file($fileTmpName, $fileDes);

		$koneksi->query("UPDATE pembelian set foto_nota='$fileName' where id_pembelian='$_GET[id]'");

		echo "<script> alert('Update Success') </script>";
		echo "<script> location='history.php'; </script>";
	}
	else{
		echo "<script> alert('No update detect') </script>";
		echo "<script> location='pembayaran_pelanggan.php?id=<?php echo '$_GET[id]'?>'; </script>";
	}
}
?>