<?php 
if (!isset($_COOKIE['username'])) {
    header('location:login.php');
}
?>

<?php 
if (isset($_POST['kode_barang'])) {
	include_once 'koneksi.php';
	// Tangkap data dari GET URL
	$kode_barang=$_POST['kode_barang'];
	// $request=$_POST['request'];

	$query="SELECT * FROM data_barang where kode_barang='$kode_barang' or nama_barang = '$kode_barang'";
	$data=mysqli_query($conn, $query);
	$hasil=mysqli_fetch_array($data);
	echo json_encode($hasil);

} else {
	header("location:index.php");
}
 ?>