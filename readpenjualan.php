<?php 
session_start();
if (!isset($_SESSION['userLogin'])) {
    header('location:login.php');
}
?>
<?php 
if (isset($_POST['kode_penjualan'])) {
	include_once 'koneksi.php';
	// Tangkap data dari GET URL
	$kode_penjualan=$_POST['kode_penjualan'];
	// $request=$_POST['request'];

	$query="SELECT * FROM data_penjualan, data_akun where kode_penjualan='$kode_penjualan'";
	$data=mysqli_query($conn, $query);
	$hasil=mysqli_fetch_array($data);
	echo json_encode($hasil);

} else {
	header("location:index.php");
}
 ?>