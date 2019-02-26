<?php 

if (isset($_POST['kode_penjualan']) && $_POST['tombol']=="Ubah") {
	$kode_penjualan=$_POST['kode_penjualan'];
	$harga_penjualan=$_POST['harga_penjualan'];
	$jenis_penjualan=$_POST['jenis_penjualan'];
	$jumlah=$_POST['jumlah'];
	
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