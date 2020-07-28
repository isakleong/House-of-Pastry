<?php 
session_start();
if(empty($_SESSION['admin'])){
	header("location:login.php");
}

if(isset($_POST['save'])){
	include 'koneksi.php';

	$koneksi->query("INSERT INTO ongkir (id_ongkir, nama_kota, tarif) VALUES (null,'$_POST[nama]','$_POST[harga]')");
	echo "<script> alert('Data Tersimpan'); </script>";
	echo "<script> location='admin_ongkir.php'; </script>";
}
?>