<?php
if (isset($_GET['term'])) {

	include_once 'koneksi.php';
		//get search term
	$searchTerm = $_GET['term'];
		//get matched data from skills table
	$query = $conn->query("SELECT * FROM data_barang WHERE kode_barang LIKE '%".$searchTerm."%' or nama_barang LIKE '%".$searchTerm."%' or deskripsi LIKE '%".$searchTerm."%'");
	while ($row = $query->fetch_assoc()) {
		$data[] = $row['kode_barang'];
		$data[] = $row['nama_barang'];
	}
		//return json data
	echo json_encode($data);
}

?>