<?php
session_start();
if(empty($_SESSION['pelanggan'])){
	header("location:login.php");
}
include 'koneksi.php';

$ambil = $koneksi->query("SELECT * FROM pelanggan where id_pelanggan = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Edit Profile | House of Pastry </title>
	<!-- Fav Icon di bar -->
	<link rel="shortcut icon" type="image/png" href="img/logo1.jpg"> 

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="admin.css" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">
	<script src="//cdn.muicss.com/mui-0.9.39/extra/mui-combined.js"></script>
	<script src="//cdn.muicss.com/mui-0.9.39/extra/mui-combined.min.js"></script>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<link href="//cdn.muicss.com/mui-0.9.39/css/mui.min.css" rel="stylesheet" type="text/css" />
	<script src="//cdn.muicss.com/mui-0.9.39/js/mui.min.js"></script>

	<script>
		function myFunction() {
			var x = document.getElementById("myInput");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}
	</script>

</head>
<body>

	<?php 
	require ('navbar_pelanggan1.php');
	?>

	<?php 
	$pbeli = $pecah['id_pelanggan'];
	$plogin = $_SESSION['pelanggan2']['id_pelanggan'];

	if($pbeli !== $plogin){
		echo "<script> alert('That is not your Profile') </script>";
		echo "<script> location='home.php' </script>"; 
		exit();
	}
	?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"> </div>
			<div class="col-md-8">
				<br>
				<hr>
				<h2 style="text-align: center"> Update  Your Profile </h2>
				<hr>
				<br>
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label> Full Name </label>
						<input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama_pelanggan']; ?>" required>
					</div>
					<div class="form-group">
						<label> Address </label>
						<input type="text" class="form-control" name="alamat" value="<?php echo $pecah['alamat_pelanggan']; ?>" required>
					</div>
					<div class="form-group">
						<label> Phone Number </label>
						<input type="text" class="form-control" name="telepon" value="<?php echo $pecah['telepon_pelanggan']; ?>" required>
					</div>
					<div class="form-group">
						<label> Email </label>
						<input type="email" class="form-control" name="email" value="<?php echo $pecah['email_pelanggan'];?>" required>
					</div>
					<div class="form-group">
						<label> Password </label>
						<input type="Password" name="password" id="myInput" value="<?php echo $pecah['password_pelanggan'];?>" required>
					</div>
					<div class="form-group">
						<input type="checkbox" onclick="myFunction()">Show Password
					</div>	
					<div class="form-group">
						<button class="btn btn-primary" name="update"> Update </button>
						<a href="home.php" class="btn btn-primary"> Back </a>
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

	$koneksi->query("UPDATE pelanggan set email_pelanggan='$_POST[email]', password_pelanggan='$_POST[password]', nama_pelanggan='$_POST[nama]', telepon_pelanggan='$_POST[telepon]', alamat_pelanggan='$_POST[alamat]' where id_pelanggan='$_GET[id]'");


	echo "<script> alert('Update Success') </script>";
	echo "<script> location='home.php'; </script>";
}
?>