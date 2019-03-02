

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="favicon.ico">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
	<title>Selamat Datang di Sistem Penjualan - Silahkan Login</title>

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="signin.css" rel="stylesheet">

	<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
	<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	<script src="js/ie-emulation-modes-warning.js"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
	<br><br>
	<div class="container form-signin">

		<h4 class="form-signin-heading text-center">Login Sistem Penjualan  <i class="fa fa-lock"></i></h4>

		<label class="text-center text-light">Silahkan Login terlebih dahulu untuk Memulai Program. <b>Selamat Berjualan </b></label>
		<hr>
		<?php 

		if (isset($_POST['login'])) {
			include 'koneksi.php';
			$inputID=$_POST['inputID'];
			$inputPassword=$_POST['inputPassword'];

			$login=$conn->query("SELECT * FROM data_akun WHERE id_akun='$inputID' or nama_akun='$inputID' and password='$inputPassword'");
			$hasil=$login->num_rows;
			if ($hasil>0) {
				echo "Login Berhasil & akan dialihkan ke Beranda.";
				sleep(3);
				header('location:index.php');
			} else {
				?>
				<div class="alert alert-danger">
				  <strong>Gagal!</strong> ID Akun dan Password tidak Cocok.
				</div>
				<?php
			}
			
		}
		?>
		<br>
		<form method="post">
			<label for="inputID" class="sr-only">ID Akun</label>
				<input type="text" name="inputID" id="inputID" class="form-control" placeholder="Masukan ID Toko / Nama Akun" required autofocus>
			
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Masukan Password" required>
			<div class="">
				<label class="text-light">
					Lupa Password ?
				</label>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Memulai <i class="fa fa-power-off"></i></button>
		</form>

	</div> <!-- /container -->


	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
