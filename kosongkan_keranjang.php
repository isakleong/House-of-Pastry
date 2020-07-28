<?php 
include 'koneksi.php';

$koneksi->query(" TRUNCATE TABLE `keranjang` ");

echo "<script> alert('Cart is empty now !'); </script>";
echo "<script> location='kategori.php'; </script>";
?>