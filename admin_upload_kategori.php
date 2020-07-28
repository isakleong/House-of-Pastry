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
	$fileDes = 'foto_kategori/'.$fileName;

	move_uploaded_file($fileTmpName, $fileDes);

	$koneksi->query("INSERT INTO kategori (nama_kategori, foto_kategori) VALUES ('$_POST[nama]','$fileName')");
	echo "<script> alert('Data Tersimpan'); </script>";
	echo "<script> location='admin_kategori.php'; </script>";
}
?>