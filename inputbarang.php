<!doctype html>
<html lang="id">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  <title>Input Data Barang</title>
</head>
<body>

  <div class="fixed-top">
    <!-- Menu Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php"><i class="fa fa-store-alt"></i> Sistem Penjualan</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php"><label class=" fa fa-warehouse"></label> Rincian <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item dropdown  active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <label class="fa fa-edit"> </label> Input Data
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="inputpenjualan.php">Input Data Penjualan</a>
              <a class="dropdown-item" href="inputbarang.php">Input Data Barang</a>
              <a class="dropdown-item" href="#">-</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <label class="fa fa-list-ul"> </label> 
              Lihat Data
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="lihatpenjualan.php">Lihat Data Penjualan</a>
              <a class="dropdown-item" href="lihatbarang.php">Lihat Data Barang</a>
              <a class="dropdown-item" href="#">-</a>
            </div>
          </li>


        </ul>
      </div>
    </nav> 
  </div><!-- Akhir Menu bar -->
  <br><br><br><br>
  <div class="container">
    <div class="row">
      <div class="col-7">
        <h3>Input Data Barang</h3>
        <label class="fa fa-user-edit"> </label> <label> Kode Barang akan dibuat otomatis oleh Sistem. </label>
      </div>

      <div class="col">

        <?php 
        if (isset($_POST['simpan'])) {
          $nama_barang=$_POST['nama_barang'];
          $deskripsi=$_POST['deskripsi'];
          $stok=$_POST['stok'];
          $brand=$_POST['brand'];
          $komisi=$_POST['komisi'];
          $harga_modal=$_POST['harga_modal'];
          $harga_m2=$_POST['harga_m2'];
          
          include_once 'koneksi.php';
          $query="INSERT INTO data_barang (nama_barang, deskripsi, stok, brand, harga_modal, harga_m2, komisi) VALUES ('$nama_barang', '$deskripsi', '$stok', '$brand', '$harga_modal', '$harga_m2', '$komisi')";
          if ($conn->query($query) ==TRUE) {
            header('location:inputbarang.php?info=1');
            mysqli_close();
          } else {
            header('location:inputbarang.php?info=2');
            mysqli_close();
          }
        }

        if (isset($_GET['info'])) {
          if ($_GET['info']==1) {
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Data sudah Berhasil tersimpan!</strong> Kamu bisa melihatnya di <a href="lihatbarang.php">Data Barang</a>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php
          } elseif ($_GET['info']==2) {
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Gagal tersimpan! Pastikan Nama Barang tidak ada yang sama dengan data Sebelumnya. </strong> Silahkan <a href="inputbarang.php"><button class="btn btn-outline-primary">Coba Lagi</button></a> <br>
              <?php
              echo "Error: " . $query . "<br>" . $conn->error;
              ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php
          } else {

          }
        }
        ?>

      </div>
    </div>
    
    <hr>


    <form class="form" method="post">
      <div class="row">
        <div class="form-group col-sm-4">
          <label for="nama_barang">Nama Barang</label>
          <input class="form-control" id="nama_barang" type="text" name="nama_barang" title="Masukan Type / Model dari barang yang akan di Input. Misal: Legion Y720 6AID (Tidak boleh ada Nama Barang yang sama dengan data sebelumnya.)" required/>
          <small class="form-text text-muted">Masukan Nama Barang / Type Model / MTM / SKU / dll</small>
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
          <div class="col-sm-2">
            <button class="btn btn-warning" type="reset"><i class="fa fa-trash"></i> Bersihkan</button>
          </div>
          <div class="col-sm-6">
            <button class="btn btn-success" type="submit" name="simpan" value="barang"><i class="fa fa-save"></i> Simpan Barang</button></div>
          </form>

      </div>
      


    </div>    

  </div>

  <br><br><br>
  <script>
    $(function(){
      document.getElementById('nama_barang').focus();
    });
  </script>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>