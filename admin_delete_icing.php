<?php 
session_start();
if(empty($_SESSION['admin'])){
	header("location:login.php");
}

include 'koneksi.php';

$koneksi->query("DELETE from icing where id_icing='$_GET[id]'");

echo "<script> alert('Icing Terhapus!'); </script>";
echo "<script> location='admin_Icing.php'; </script>";
?>