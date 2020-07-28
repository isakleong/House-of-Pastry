<?php 
include 'koneksi.php';

$id_produk = $_GET['proId'];
$newqty = $_GET['qty'];


$ambil = $koneksi->query("SELECT * FROM keranjang join produk on keranjang.id_produk = produk.id_produk where keranjang.id_produk = $id_produk; ");
$pecah = $ambil->fetch_assoc();

$harga = $pecah['harga_produk'];
$jumlah_baru = $newqty;
/*echo "<script> alert(".$jumlah_baru."); </script>";*/
$subtotal_baru = $harga * $jumlah_baru;

$koneksi->query("UPDATE keranjang set jumlah='$jumlah_baru', subtotal='$subtotal_baru' where id_produk = '$id_produk'; ");

echo "<script> location='keranjang_produk.php'; </script>";
?>