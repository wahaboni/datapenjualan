<html>
<head>
  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
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
        <a href="data.php"><button class="btn btn-info"><span class="fa fa-sync-alt"></span> Refresh Data</button></a>
      </div>
      <div class="col-3">
        <a href="inputbarang.php"><button class="btn btn-success"><span class="fa fa-plus-circle"></span> Tambah Barang Baru</button></a>
        
      </div>
    </div>
    <div class="table-responsive">
     <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Deskripsi</th>
          <th>Stok</th>
          <th>Brand</th>
          <th>Harga Modal</th>
          <th>Harga M.2</th>
          <th>Komisi</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Deskripsi</th>
          <th>Stok</th>
          <th>Brand</th>
          <th>Harga Modal</th>
          <th>Harga M.2</th>
          <th>Komisi</th>
          <th>Opsi</th>
        </tr>
      </tfoot>
      <tbody>
        
        <tr>
          <td>Tiger Nixon</td>
          <td>System Architect</td>
          <td>Edinburgh</td>
          <td>61</td>
          <td>2011/04/25</td>
          <td>$320,800</td>
          <td>61</td>
          <td>2011/04/25</td>
          <td></td>
        </tr>
        <tr>
          <td>Garrett Winters</td>
          <td>Accountant</td>
          <td>Tokyo</td>
          <td>63</td>
          <td>2011/07/25</td>
          <td>$170,750</td>
          <td>61</td>
          <td>2011/04/25</td>
          <td>$320,800</td>
        </tr>
        <tr>
          <td>Ashton Cox</td>
          <td>Junior Technical Author</td>
          <td>San Francisco</td>
          <td>66</td>
          <td>2009/01/12</td>
          <td>$86,000</td>
          <td>61</td>
          <td>2011/04/25</td>
          <td>$320,800</td>
        </tr>
        <tr>
          <td>Cedric Kelly</td>
          <td>Senior Javascript Developer</td>
          <td>Edinburgh</td>
          <td>22</td>
          <td>2012/03/29</td>
          <td>$433,060</td>
          <td>61</td>
          <td>2011/04/25</td>
          <td>$320,800</td>
        </tr>
        <tr>
          <td>Airi Satou</td>
          <td>Accountant</td>
          <td>Tokyo</td>
          <td>33</td>
          <td>2008/11/28</td>
          <td>$162,700</td>
          <td>61</td>
          <td>2011/04/25</td>
          <td>$320,800</td>
        </tr>
        <tr>
          <td>Brielle Williamson</td>
          <td>Integration Specialist</td>
          <td>New York</td>
          <td>61</td>
          <td>2012/12/02</td>
          <td>$372,000</td>
          <td>61</td>
          <td>2011/04/25</td>
          <td>$320,800</td>
        </tr>
        <tr>
          <td>Herrod Chandler</td>
          <td>Sales Assistant</td>
          <td>San Francisco</td>
          <td>59</td>
          <td>2012/08/06</td>
          <td>$137,500</td>
          <td>61</td>
          <td>2011/04/25</td>
          <td>$320,800</td>
        </tr>
        <tr>
          <td>Rhona Davidson</td>
          <td>Integration Specialist</td>
          <td>Tokyo</td>
          <td>55</td>
          <td>2010/10/14</td>
          <td>$327,900</td>
          <td>61</td>
          <td>2011/04/25</td>
          <td>$320,800</td>
        </tr>
        <tr>
          <td>Colleen Hurst</td>
          <td>Javascript Developer</td>
          <td>San Francisco</td>
          <td>39</td>
          <td>2009/09/15</td>
          <td>$205,500</td>
          <td>61</td>
          <td>2011/04/25</td>
          <td>$320,800</td>
        </tr>

        <tr>
          <td>Donna Snider</td>
          <td>Customer Support</td>
          <td>New York</td>
          <td>27</td>
          <td>2011/01/25</td>
          <td>$112,000</td>
          <td>61</td>
          <td>2011/04/25</td>
          <td>$320,800</td>
        </tr>
        <tr>
          <td>Donna Snider</td>
          <td>Customer Support</td>
          <td>New York</td>
          <td>27</td>
          <td>2011/01/25</td>
          <td>$112,000</td>
          <td>61</td>
          <td>2011/04/25</td>
          <td>$320,800</td>
        </tr>
        <tr>
          <td>Donna Snider</td>
          <td>Customer Support</td>
          <td>New York</td>
          <td>27</td>
          <td>2011/01/25</td>
          <td>$112,000</td>
          <td>61</td>
          <td>2011/04/25</td>
          <td>$320,800</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>


<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
</body>
</html>