<?php 
session_start();
if (isset($_SESSION['userLogin'])) {
	header('location:index.php');
}
?>
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
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<title>Selamat Datang di Sistem Penjualan - Silahkan Login</title>

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="signin.css" rel="stylesheet">


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
	<div class="container form-signin">

		<h4 class="form-signin-heading text-center">Login Sistem Penjualan  <i class="fa fa-lock"></i></h4>

		<label class="text-center text-light">Silahkan Login terlebih dahulu untuk Memulai Program. <b>Selamat Berjualan </b></label>
		<hr>
		<?php 

		if (isset($_POST['login'])) {

			$userIP = $_SERVER["REMOTE_ADDR"];
			$recaptchaResponse = $_POST['g-recaptcha-response'];
			$secretKey = "6LeDVJUUAAAAAKS4GzX5oc9pw7ZbS_1uihKyEwNe";
			$request = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$recaptchaResponse}&remoteip={$userIP}");

			if(!strstr($request, "true")){
				?>
				<div class="alert alert-danger">
						<strong>Robot tidak boleh Masuk!</strong> Silahkan Centang terlebih dahulu apabila anda bukan Robot.
					</div>
				<?php
			}
			else{
				
				include 'koneksi.php';
				
				$inputID=htmlspecialchars($_POST['inputID']);
				$inputPassword=htmlspecialchars($_POST['inputPassword']);

				$login=$conn->query("SELECT * FROM data_akun WHERE id_akun='$inputID' or nama_akun='$inputID' and password='$inputPassword'");
				$hasil=$login->num_rows;
				if ($hasil>0) {
					echo "Login Berhasil & akan segera dialihkan ke Beranda.";
					session_start();
					$_SESSION['userLogin'] = $inputID;
					sleep(2);
					header('location:index.php');
				} else {
					?>
					<div class="alert alert-danger">
						<strong>Gagal!</strong> Akun atau Password tidak Cocok.
					</div>
					<?php
				}
				
			}
		}
		?>
		<form method="post">
			<label for="inputID" class="sr-only">ID Akun</label>
			<input type="text" name="inputID" id="inputID" class="form-control" placeholder="Masukan ID Toko / Nama Akun" required autofocus>
			<br>
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Masukan Password" required /><br>
			<div class="g-recaptcha" data-sitekey="6LeDVJUUAAAAAHtBMi1IxPu_ZvAM6Prh9hBd2sc-" data-callback="enableBtn"></div>
			<div class="">
				<label class="text-light">
					Lupa Password ?
				</label>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="login" id="login" disabled>Memulai <i class="fa fa-power-off"></i></button>
		</form>

	</div> <!-- /container -->
<script>
	function enableBtn(){
    document.getElementById("login").disabled = false;
   }
</script>
</body>
</html>
