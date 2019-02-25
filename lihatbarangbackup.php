<!doctype html>
<html lang="id">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="filter.css"/>

<!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.css">


	<title>Data Semua Barang</title>
</head>
<body>

	<div class="fixed-top">
		<!-- Menu Bar -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="index.php">Data Penjualan</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="index.php"><label class=" fa fa-warehouse"></label> Beranda <span class="sr-only">(current)</span></a>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<label class="fa fa-edit"> </label> Input Data
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="inputpenjualan.php">Input Data Penjualan</a>
							<a class="dropdown-item" href="inputbarang.php">Input Data Barang</a>
							<a class="dropdown-item" href="#">-</a>
						</div>
					</li>

					<li class="nav-item dropdown  active">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<label class="fa fa-list-ul"> </label> 
							Lihat Data
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="#">Lihat Data Penjualan</a>
							<a class="dropdown-item" href="#">Lihat Data Barang</a>
							<a class="dropdown-item" href="#">-</a>
						</div>
					</li>


				</ul>
			</div>
		</nav> 
	</div><!-- Akhir Menu bar -->
	<br><br><br><br>

	<div class="container-fluid">
		<div class="row">
			<div class="col-5">
				<h3><span class="fa fa-box-open"></span> Data Semua Barang</h3><br>
			</div>
			<div class="col-3">
				<a href="lihatbarang.php"><button class="btn btn-info"><span class="fa fa-sync-alt"></span> Refresh Data</button></a>
			</div>
			<div class="col-3">
				<a href="inputbarang.php"><button class="btn btn-success"><span class="fa fa-plus-circle"></span> Tambah Barang Baru</button></a>
				
			</div>
		</div>



		<div class="panel panel-primary filterable">
			<div class="panel-heading">
				
				<button class="btn btn-outline-warning btn-filter" id="cari">
					<span for="cari" class="fa fa-search"> </span> Cari</button>

					<div class="btn-group">
						<button type="button" class="btn btn-outline-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Urutkan
						</button>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="#">Stok</a>
							<a class="dropdown-item" href="#">Brand</a>
							<a class="dropdown-item" href="#">Harga</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">Standar</a>
						</div>
					</div>

				</div>
				<div class="table-responsive">
					<table class="table table-striped  display" id="dataTable">
						<thead>
							<tr class="filters">
								<th><input type="text" class="form-control" placeholder="Kode Barang" disabled></th>
								<th><input type="text" class="form-control" placeholder="Nama Barang" disabled></th>
								<th><input type="text" class="form-control" placeholder="Brand" disabled></th>
								<th><input type="text" class="form-control" placeholder="Stok" disabled></th>
								<th><label class="font-weight-bold">Komisi</label></th>
								<th><label class="font-weight-bold text-success">Harga M.1</label></th>
								<th><label class="text-success">Harga M.2</label></th>
								<th><span class="fa fa-cogs"></span></th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Kode Barang</th>
								<th>Nama barang</th>
								<th>Brand</th>
								<th>Stok</th>
								<th>Komisi</th>
								<th>Harga M.1</th>
								<th>Harga M.2</th>
								<th>Opsi</th>
							</tr>
						</tfoot>
						<tbody>
							<tr>
								<td>1020020011</td>
								<td>Legion Y520</td>
								<td>Lenovo</td>
								<td>14</td>
								<td>
									<?php 
									echo number_format("1000000",0,",",".");
									?>
								</td>
								<td>
									<?php 
									echo number_format("14200000",0,",",".");
									?>
								</td>
								<td>
									<?php 
									echo number_format("14600000",0,",",".");
									?>
								</td>
								<td><label><a href="#" class="fa fa-edit"> Edit</a></label></td>
							</tr>
							<td>1020020011</td>
							<td>Legion Y520</td>
							<td>Lenovo</td>
							<td>14</td>
							<td>
								<?php 
								echo number_format("1000000",0,",",".");
								?>
							</td>
							<td>
								<?php 
								echo number_format("14200000",0,",",".");
								?>
							</td>
							<td>
								<?php 
								echo number_format("14600000",0,",",".");
								?>
							</td>
							<td><label><a href="#" class="fa fa-edit"> Edit</a></label></td>
						</tr>
						<td>1020020011</td>
						<td>Legion Y520</td>
						<td>Lenovo</td>
						<td>14</td>
						<td>
							<?php 
							echo number_format("1000000",0,",",".");
							?>
						</td>
						<td>
							<?php 
							echo number_format("14200000",0,",",".");
							?>
						</td>
						<td>
							<?php 
							echo number_format("14600000",0,",",".");
							?>
						</td>
						<td><label><a href="#" class="fa fa-edit"> Edit</a></label></td>
					</tr>
				</tbody>
			</table>
		</div>





	</div>    <!-- AKhir Container -->


	<br><br><br>



	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="filter.js" type="text/javascript" charset="utf-8"></script>

  	<script src="js/bootstrap.min.js"></script>

	  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  

</body>
</html>