<?php 
session_start();
if (!isset($_SESSION['userLogin'])) {
    header('location:login.php');
}


if (isset($_GET['kode_barang'])) {
	$kode_barang=$_GET['kode_barang'];
	include 'koneksi.php';
	$query="DELETE from data_barang where kode_barang='$kode_barang'";
          if ($conn->query($query) ==TRUE) {
            header('location:lihatbarang.php?alert=2');
            mysqli_close();
          } else {
            header('location:lihatbarang.php?alert=0');
            mysqli_close();
          }

}



?>