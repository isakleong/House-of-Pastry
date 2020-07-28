<?php 
session_start();
if(empty($_SESSION['admin'])){
	header("location:login.php");
}

include 'koneksi.php';

$koneksi->query("DELETE from ongkir where id_ongkir='$_GET[id]'");

echo "<script> alert('Ongkir Terhapus!'); </script>";
echo "<script> location='admin_ongkir.php'; </script>";
?>