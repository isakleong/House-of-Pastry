<?php 
session_start();
if(empty($_SESSION['admin'])){
	header("location:login.php");
}

include 'koneksi.php';

$ambil = $koneksi->query("SELECT * FROM produk where id_produk = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotoproduk = $pecah['foto_produk'];

if(file_exists("foto_produk/$fotoproduk")){
	unlink("foto_produk/$fotoproduk");
}

$koneksi->query("DELETE from produk where id_produk='$_GET[id]'");

echo "<script> alert('Produk Terhapus!'); </script>";
echo "<script> location='admin_produk.php'; </script>";
?>