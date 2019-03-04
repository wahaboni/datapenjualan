<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

  <a class="navbar-brand" href="#"><i class="fa fa-store-alt"></i> Sistem Penjualan</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse mr-auto" id="navbarNavDropdown">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"><label class=" fa fa-warehouse"></label> Rincian <span class="sr-only">(current)</span></a>
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

      <li class="nav-item dropdown">
        <a class="nav-link" href="laporan.php" id="navbarDropdownMenuLink" role="button" aria-haspopup="true" aria-expanded="false">
          <label class="fa fa-table"> </label> 
          Laporan
        </a>
      </li>



    </ul>

    <span class="navbar-text">
      Masuk sebagai <b> 
      <?php 
      echo $_COOKIE['username'];
       ?></b>,  
        <a href="#" data-toggle="modal" data-target="#konfirmasiLogout">
          <label class="fa fa-power-off"> </label> 
          Keluar
        </a>

    </span>





  </div>
</nav>