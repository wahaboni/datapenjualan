<?php 

if (isset($_GET['kode_penjualan']) && $_GET['tombol']=="Ubah") {
	$kode_penjualan=$_GET['kode_penjualan'];
	$harga_penjualan=$_GET['harga_penjualan'];
	$jenis_penjualan=$_GET['jenis_penjualan'];
	$jumlah=$_GET['jumlah'];
	
	include 'koneksi.php';
	$query="UPDATE data_penjualan SET harga_penjualan='$harga_penjualan', jenis_penjualan='$jenis_penjualan', jumlah='$jumlah'  WHERE kode_penjualan='$kode_penjualan' ";
	if (mysqli_query($conn, $query)) {
		header("location:lihatpenjualan.php?alert=1");
	} else {
		echo mysql_errno();
	}



} else {
	
}



 ?>