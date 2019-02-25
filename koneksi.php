<?php 
$host="localhost";
$username="root";
$password="";
$database="datapenjualan";

	// $koneksi=mysqli_connect($host,$username,$password,$database);

$conn = new mysqli($host, $username, $password, $database);

/* check connection */

if ($conn->connect_error) {
	?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<?php
		printf("<strong>Koneksi ke Database Gagal: </strong>%s\n", $conn->connect_error);
		echo "<strong style=color:red;> Hubungi Bantuan Support / Hosting Provider !</strong>";
		exit();
		?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>


	<?php
}
