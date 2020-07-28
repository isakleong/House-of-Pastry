<?php 
session_start();
if(empty($_SESSION['admin'])){
	header("location:login.php");
}

include 'koneksi.php';

$ambil = $koneksi->query("SELECT * FROM kategori where id_kategori = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotokategori = $pecah['foto_kategori'];

if(file_exists("foto_kategori/$fotokategori")){
	unlink("foto_kategori/$fotokategori");
}

$koneksi->query("DELETE from kategori where id_kategori='$_GET[id]'");

echo "<script> alert('Kategori Terhapus!'); </script>";
echo "<script> location='admin_kategori.php'; </script>";
?>