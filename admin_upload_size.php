<?php 
session_start();
if(empty($_SESSION['admin'])){
	header("location:login.php");
}

if(isset($_POST['save'])){
	include 'koneksi.php';

	$koneksi->query("INSERT INTO size (id_size, nama_size, harga_size) VALUES (null,'$_POST[nama]','$_POST[harga]')");
	echo "<script> alert('Data Tersimpan'); </script>";
	echo "<script> location='admin_size.php'; </script>";
}
?>