<?php
session_start();
if(empty($_SESSION['admin'])){
	header("location:login.php");
}
include 'koneksi.php';

$ambil = $koneksi->query("SELECT * FROM produk where id_produk = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Update Produk | House of Pastry </title>
	<!-- Fav Icon di bar -->
	<link rel="shortcut icon" type="image/png" href="img/logo1.jpg"> 

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="admin.css" rel="stylesheet">
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
				<h2 style="text-align: center"> Update Produk </h2>
				<hr>
				<br>
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label> Nama Produk </label>
						<input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama_produk']; ?>" required>
					</div>
					<div class="form-group">
						<label> Harga (Rp) </label>
						<input type="number" class="form-control" name="harga" value="<?php echo $pecah['harga_produk']; ?>" required>
					</div>
					<div class="form-group">
						<label> Size </label>
						<input type="text" class="form-control" name="berat" value="<?php echo $pecah['berat_produk']; ?>" required>
					</div>
					<div class="form-group">
						<label> Kategori </label>
						<select name="kategori" class="form-control" value="<?php echo $pecah['id_kategori'];?>" required>
							<?php $pilih = $koneksi->query("SELECT * FROM kategori;"); ?>
							<?php while($row = $pilih->fetch_assoc()) { ?>
								<option value="<?php echo $row['id_kategori']; ?>"> <?php echo $row['nama_kategori']?> </option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label> Rating </label>
						<input type="number" class="form-control" name="rating" value="<?php echo $pecah['rating']; ?>"  required min="1" max="5">
					</div>
					<div class="form-group">
						<label> Deskripsi </label>
						<textarea class="form-control" name="deskripsi" rows="10" required>
							<?php echo $pecah['deskripsi_produk']; ?> 
						</textarea>
					</div>
					<div class="form-group">
						<img src="foto_produk/<?php echo $pecah['foto_produk'] ?>" width="300">
					</div>
					<div class="form-group">
						<label> Ganti Foto </label>
						<input type="file" class="form-control" name="file">
					</div>
					<div class="form-group">
						<button class="btn btn-primary" name="update"> Update </button>
						<a href="admin_produk.php" class="btn btn-primary"> Back </a>
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
	$fileDes = 'foto_produk/'.$fileName;
	

	if(!empty($fileTmpName)){
		move_uploaded_file($fileTmpName, $fileDes);

		$koneksi->query("UPDATE produk set nama_produk='$_POST[nama]', harga_produk='$_POST[harga]', berat_produk='$_POST[berat]', foto_produk='$fileName', deskripsi_produk='$_POST[deskripsi]', id_kategori='$_POST[kategori]', rating='$_POST[rating]' where id_produk='$_GET[id]'");
	}
	else{
		$koneksi->query("UPDATE produk set nama_produk='$_POST[nama]', harga_produk='$_POST[harga]', berat_produk='$_POST[berat]', deskripsi_produk='$_POST[deskripsi]', id_kategori='$_POST[kategori]' , rating='$_POST[rating]' where id_produk='$_GET[id]'");
	}
	echo "<script> alert('Data Produk Berhasil di Ubah') </script>";
	echo "<script> location='admin_produk.php'; </script>";
}
?>