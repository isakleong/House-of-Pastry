<?php 
session_start();
if(empty($_SESSION['admin'])){
	header("location:login.php");
}

if(isset($_POST['save'])){
	include 'koneksi.php';

	$koneksi->query("INSERT INTO flavor (id_flavor, nama_flavor, harga_flavor) VALUES (null,'$_POST[nama]','$_POST[harga]')");
	echo "<script> alert('Data Tersimpan'); </script>";
	echo "<script> location='admin_flavor.php'; </script>";
}
?>