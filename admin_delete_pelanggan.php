<?php 

include 'koneksi.php';

$id_pelanggan = $_GET['id'];
$koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");

echo "<script> alert('Pelanggan telah dihapus'); </script>";
echo "<script> location='admin_pelanggan.php'; </script>";
?>