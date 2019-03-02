<?php 
if (!isset($_COOKIE['username'])) {
    header('location:login.php');
}
?>
<?php 

if (isset($_POST['kode_barang']) && $_POST['tombol']=="Ubah") {
	$kode_barang=$_POST['kode_barang'];
	$nama_barang=$_POST['nama_barang'];
	$deskripsi=$_POST['deskripsi'];
	$stok=$_POST['stok'];
	$brand=$_POST['brand'];
	$harga_modal=$_POST['harga_modal'];
	$harga_m2=$_POST['harga_m2'];
	$komisi=$_POST['komisi'];
	include 'koneksi.php';
	$query="UPDATE data_barang SET nama_barang='$nama_barang',deskripsi='$deskripsi',stok='$stok',brand='$brand',harga_modal='$harga_modal',harga_m2='$harga_m2',komisi='$komisi' WHERE kode_barang='$kode_barang' ";
	if (mysqli_query($conn, $query)) {
		header("location:lihatbarang.php?alert=1");
	} else {
		echo mysql_errno();
		header("location:lihatbarang.php?alert=0");
	}



} else {
	
}



 ?>