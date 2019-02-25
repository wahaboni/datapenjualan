<?php 
if (isset($_GET['kode_barang'])) {
	include 'koneksi.php';
	$kode_barang=$_GET['kode_barang'];
	$query="SELECT * FROM data_barang where kode_barang=$kode_barang";
	$data=mysqli_fetch_array(mysqli_query($conn,$query));
	?>
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ubah Data Barang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST">
					<div class="row">
						<div class="form-group col-sm-4">
							<label for="nama_barang">Nama Barang</label>
							<input class="form-control" id="nama_barang" type="text" name="nama_barang" title="Masukan Type / Model dari barang yang akan di Input. Misal: Legion Y720" required/>
							<small class="form-text text-muted">Masukan Kode Barang / Type Model / MTM / SKU.</small>
						</div>
						<div class="form-group col">
							<label for="deskripsi">Deskripsi</label>
							<input class="form-control form-control" type="text" name="deskripsi" id="deskripsi" placeholder="Spesifikasi, SKU"  title="Masukan Spesifikasi Singkat. Misal: RAM, HDD, SSD, Windows" required>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-3">
							<label for="stok">Stok</label>
							<input type="number" name="stok" id="stok" class="form-control" placeholder="Masukan Stok Barang." required="">
						</div>

						<div class="form-group col-sm-3">
							<label for="brand">Brand / Merk</label>
							<select id="brand" class="form-control" name="brand">
								<option value="Asus">Asus</option>
								<option value="Lenovo">Lenovo</option>
								<option value="Acer">Acer</option>
								<option value="HP">HP</option>
								<option value="Dell">Dell</option>
								<option value="Zyrex">Zyrex</option>
								<option value="Lainnya">Lainnya</option>
							</select>
						</div>

						<div class="form-group col-sm">
							<label for="komisi">Komisi Penjualan</label>
							<input class="form-control form-control" id="komisi" name="komisi" type="number" required>
							
						</div>
					</div>
					<div class="row">
						<div class="form-group col-5">
							<label for="harga_modal">Harga Modal (M.1)</label>
							<input type="number" class="form-control" id="harga_modal" name="harga_modal" required="">
						</div>
						<div class="form-group col">
							<label for="harga_m2">Harga Min. Jual Offline (M.2)</label>
							<input type="number" class="form-control" id="harga_m2" name="harga_m2" required="">
						</div>

					</div>
					<hr>
					
					<div class="row">
						<div class="col-sm-4">
							<button class="btn btn-outline-dark" type="reset">Bersihkan</button>
						</div>
						<div class="col-sm-3">
							<button class="btn btn-primary" type="submit" name="simpan" value="barang">Simpan Barang</button></div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Send message</button>
				</div>
			</div>
		</div>
	</div>
	<?php


}

?>