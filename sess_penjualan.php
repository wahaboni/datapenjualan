<?php 

session_start();
if (!isset($_SESSION['userLogin'])) {
    header('location:login.php');
}

$_SESSION['ses.kode_barang']=$_POST['kode_barang'];
$_SESSION['ses.nama_barang']=$_POST['nama_barang'];
$_SESSION['ses.harga_modal']=$_POST['harga_modal'];
$_SESSION['ses.komisi']=$_POST['komisi'];

?>