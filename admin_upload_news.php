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
	$fileDes = 'foto_news/'.$fileName;

	move_uploaded_file($fileTmpName, $fileDes);

	$koneksi->query("INSERT INTO news (id_news, nama_news, foto_news, deskripsi_news) VALUES (null, '$_POST[nama]','$fileName','$_POST[deskripsi]')");
	echo "<script> alert('Data Tersimpan'); </script>";
	echo "<script> location='admin_news.php'; </script>";
}
?>