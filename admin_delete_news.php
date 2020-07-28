<?php 
session_start();
if(empty($_SESSION['admin'])){
	header("location:login.php");
}

include 'koneksi.php';

$ambil = $koneksi->query("SELECT * FROM news where id_news = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotonews = $pecah['foto_news'];

if(file_exists("foto_news/$fotonews")){
	unlink("foto_news/$fotonews");
}

$koneksi->query("DELETE from news where id_news='$_GET[id]'");

echo "<script> alert('News Terhapus!'); </script>";
echo "<script> location='admin_news.php'; </script>";
?>