<?php 
include 'koneksi.php';

$id_keranjang = $_GET['id'];
$koneksi->query("DELETE from keranjang where id_keranjang=$id_keranjang;");

echo "<script> alert('Product remove from your cart !'); </script>";
echo "<script> location='keranjang_produk.php'; </script>";
?>