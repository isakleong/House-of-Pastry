<?php 
session_start();
if(empty($_SESSION['admin'])){
	header("location:login.php");
}

if(isset($_POST['save'])){
	include 'koneksi.php';

	$koneksi->query("INSERT INTO icing (id_icing, nama_icing, harga_icing) VALUES (null,'$_POST[nama]','$_POST[harga]')");
	echo "<script> alert('Data Tersimpan'); </script>";
	echo "<script> location='admin_icing.php'; </script>";
}
?>