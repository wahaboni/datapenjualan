<?php 
if (!isset($_COOKIE['username'])) {
    header('location:login.php');
}
?>
<?php 
if (isset($_POST['kode_penjualan'])) {
	include_once 'koneksi.php';
	// Tangkap data dari GET URL
	$kode_penjualan=$_POST['kode_penjualan'];
	// $request=$_POST['request'];

	$query="SELECT * FROM data_barang, data_penjualan, data_akun where data_barang.kode_barang=data_penjualan.kode_barang";
	$data=mysqli_query($conn, $query);
	$hasil=mysqli_fetch_array($data);
	echo json_encode($hasil);

} else {
	header("location:index.php");
}
 ?>