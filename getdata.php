<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Get data barang</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.js">
</head>
<body>
	<script>
		$(document).ready(function () {
			$("input#kode_barang").focus()
			var kodeBarang=$('input#kode_barang').val()
			$("input#kode_barang").keypress(function () {
				$.get('readbarang.php',{
					kode_barang:"1",
					request:"nama_barang";
				},function(data,status) {
					$("#isidata").html(data)
				})
			})
		})
	</script>
	<div class="container">
		<form>
			<label for="kode_barang">Masukan Kode Barang</label>
			<input type="text" class="form-control" id="kode_barang">

			<div id="isidata">
				

			</div>



		</form>


	</div>
</body>
</html>