<?php 
session_start();
if (!isset($_SESSION['userLogin'])) {
	header('location:login.php');
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
	<title>Daftarkan Akun / Toko</title>

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="signin.css" rel="stylesheet">

	<script type="text/javascript" src="vendor/jquery/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="vendor/jquery/jquery.validate.min.js"></script>


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
	<div class="container w-50">

		<h4 class="form-signin-heading text-center">Daftarkan Akun Baru. <i class="fa fa-keyboard"></i></h4>

		<center><label class="text-center text-light">Gunakan Nama Akun yang berbeda dengan yang sudah didaftarkan sebelumnya.</label></center>
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
		<form method="post" id="signupForm">
			<label for="nama_akun" class="text-light font-weight-bold">Nama Akun</label>
			<div class="row">
				<div class="col-4">
					<input type="username" name="nama_akun" id="nama_akun" class="form-control" placeholder="Masukan Nama Akun" required autofocus>
				</div>
				<div class="col">
					<input type="text" name="ket_akun" id="ket_akun" class="form-control" placeholder="Keterangan Akun / Nama Toko.">
				</div>
			</div>
			
			<br>
			<label for="password" class="text-light font-weight-bold">Buat Password Baru.</label>
			<div class="row">
				<div class="col-5">
					<input type="password" id="password" name="password" class="form-control" placeholder="Buat Password" required />
				</div>
				<div class="col-7">
					<input type="password" id="repassword" name="repassword" class="form-control" placeholder="Konfirmasi Password" required />
				</div>
			</div><br>
			<label for="hak_akses" class="text-light font-weight-bold">Atur Hak Akses</label>
			<br>
			<select name="hak_akses" id="hak_akses" class="form-control">
				<option value="1">Manager</option>
				<option value="2">Admin</option>
				<option value="3">Gudang</option>
				<option value="4">Toko</option>
			</select>
			<br>
			<div name="repaptcha" class="g-recaptcha" data-sitekey="6LeDVJUUAAAAAHtBMi1IxPu_ZvAM6Prh9hBd2sc-" data-callback="enableBtn"></div>
			<br>
			<button class="btn btn-lg btn-success btn-block" type="submit" name="register" id="register">Daftarkan Akun Baru <i class="fa fa-power-off"></i></button>
		</form>

	</div> <!-- /container -->
	<script>
	

	$.validator.setDefaults( {
			submitHandler: function () {
				alert( "submitted!" );
			}
		} );

		$( document ).ready( function () {
			$( "#signupForm" ).validate( {
				rules: {
					nama_akun: "required",
					ket_akun: "required",
					nama_akun: {
						required: true,
						minlength: 3
					},
					password: {
						required: true,
						minlength: 5
					},
					repassword: {
						required: true,
						minlength: 5,
						equalTo: "#password"
					},
					hak_akses: {
						required: true,
					},
				messages: {
					nama_akun: "Masukan Nama Akun.",
					ket_akun: "Masukan Nama Toko / Akun.",
					nama_akun: {
						required: "Please enter a User Account",
						minlength: "Your username must consist of at least 3 characters"
					},
					password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long"
					},
					repassword: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long",
						equalTo: "Please enter the same password as above"
					},
					
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
				}
			} );
</script>
</body>
</html>
