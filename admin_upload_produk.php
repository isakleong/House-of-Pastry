<?php 
session_start();
if(empty($_SESSION['admin'])){
	header("location:login.php");
}

if(isset($_POST['save'])){
	include 'koneksi.php';

	$file = $_FILES['file'];
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileDes = 'foto_produk/'.$fileName;

	move_uploaded_file($fileTmpName, $fileDes);

	$koneksi->query("INSERT INTO produk (id_produk, nama_produk, harga_produk, berat_produk, foto_produk, deskripsi_produk, id_kategori, rating) VALUES (null,'$_POST[nama]','$_POST[harga]','$_POST[berat]','$fileName','$_POST[deskripsi]','$_POST[kategori]', '$_POST[rating]')");
	echo "<script> alert('Data Tersimpan'); </script>";
	echo "<script> location='admin_produk.php'; </script>";
}
?>