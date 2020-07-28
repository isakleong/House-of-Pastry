<?php 
session_start();
include 'koneksi.php';

if(isset($_POST['login'])){

	$email = $_POST['email'];
	$password = $_POST['password'];

	$ambil = $koneksi->query("SELECT * FROM pelanggan where email_pelanggan='$email' AND password_pelanggan ='$password'");

	$akunyangcocok = $ambil->num_rows;
	
	if ($email == "Admin@gmail.com" && $akunyangcocok == 1){
		$akun = $ambil->fetch_assoc();
		$nama = $akun['nama_pelanggan'];
		$_SESSION['admin'] = $nama;
		echo "<script> alert('Welcome, Admin'); </script>";
		echo "<script> location='admin_kategori.php'; </script>";
	}
	else if ($akunyangcocok == 1){
		$akun = $ambil->fetch_assoc();
		$nama = $akun['nama_pelanggan'];
		$telepon = $akun['telepon_pelanggan'];
		$id = $akun['id_pelanggan'];

		$_SESSION['id'] = $id;
		$_SESSION['pelanggan2'] = $akun;
		$_SESSION['pelanggan'] = $nama;
		$_SESSION['telepon'] = $telepon;
		$_SESSION['pelanggan1'] = $akun;
		echo "<script> alert('Welcome, " .$nama. "'); </script>";


		if(isset($_SESSION['keranjang']) OR !empty($_SESSION['keranjang'])){
			echo "<script> location= 'keranjang_produk.php'; </script>";	
		}else{
			echo "<script> location='home.php'; </script>";
		}

	}
	else{
		echo "<script> alert('Email / Password is wrong'); </script>";
		echo "<script> location= 'login.php'; </script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title> Login Form </title>
	<!-- Fav Icon di bar -->
	<link rel="shortcut icon" type="image/png" href="img/logo1.jpg"> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="login1.css" rel="stylesheet" type="text/css" >

	<script src="//cdn.muicss.com/mui-0.9.39/extra/mui-combined.js"></script>
	<script src="//cdn.muicss.com/mui-0.9.39/extra/mui-combined.min.js"></script>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<link href="//cdn.muicss.com/mui-0.9.39/css/mui.min.css" rel="stylesheet" type="text/css" />
	<script src="//cdn.muicss.com/mui-0.9.39/js/mui.min.js"></script>
</head>

<body>
	<?php 
	require ('navbar_pelanggan.php');
	?>

	<div class="loginbox">
		<img src="img/profile.png" class="profile">
		<h1 style="font-size: 25px; margin: 0; text-align: center;padding: 0 0 20px;"> Login Here </h1>
		<form class="mui-form" method="POST">
			<div class="mui-textfield mui-textfield--float-label" style="margin-top: -5px;">
				<input type="email" name="email" required>
				<label style="color: black; font-weight: bold;">Email</label>
			</div>
			<div class="mui-textfield mui-textfield--float-label">
				<input type="password" name="password" required>
				<label style="color: black; font-weight: bold;">Password</label>
			</div>
			<input type="submit" value="Login" name="login"><br><br>
			<!-- <a href="forgot.php"> Forgot Password ? </a><br> -->
			<h4>Don't have an account ? <a href="register.php"> Register </a> </h4>
		</form>
	</div>
</body>
</html>

