<?php 
session_start();
if (!isset($_SESSION['userLogin'])) {
  header('location:login.php');
}
?>
<!doctype html>
<html lang="id">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- 
    Bootstrap CSS
    <link rel="stylesheet" href="css/bootstrap.min.css">
    Font Awesome
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  -->

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">


  <!-- Material Design Bootstrap -->
  <link rel="icon" href="favicon.ico"/>
  <title>Program Data Penjualan</title>
</head>
<body>

  <div class="fixed-top">
    <?php
    // Menu Utama
    include('menu.php');
    ?>
  </div>
  <br><br><br>
  <div class="container-fluid">
    <div class="row border">
      <div class="col">
        <br>
        <!-- Content Row -->
        <div class="row">

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Penjualan (Bulanan)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 
                      <?php 
                      include 'koneksi.php';
                      $bulan=date("Y-m");
                      $user=$_SESSION['userLogin'];
                      $total_penjualan="SELECT Sum(data_penjualan.harga_penjualan*data_penjualan.jumlah) AS total_penjualan, Sum((data_penjualan.harga_penjualan-data_penjualan.harga_modal)*jumlah) 'total_margin', Count(*) AS penjualan, Sum(data_penjualan.jumlah) AS penjualan_unit FROM data_penjualan WHERE data_penjualan.tgl_penjualan LIKE '%$bulan%' AND data_penjualan.nama_akun = '$user'";
                      $data=mysqli_query($conn, $total_penjualan);
                      $hasil=mysqli_fetch_array($data);
                      echo number_format($hasil['total_penjualan'],0,",",".");
                      ?>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Margin</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 
                      <?php 
                      echo number_format($hasil['total_margin'],0,",",".");

                      ?>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Target</div>
                    <div class="row no-gutters align-items-center">
                      <div class="col-auto">
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">80%</div>
                      </div>
                      <div class="col">
                        <div class="progress progress-sm mr-2">
                          <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Pending Requests Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Penjualan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php 
                      echo $hasil['penjualan_unit']." <span data-toggle=\"tooltip\" data-placement=bottom title=\"".$hasil['penjualan_unit']." Penjualan Barang dari ".$hasil['penjualan']." Penjualan / Transaksi\" class=\"fa fa-box-open\"> dari ".$hasil['penjualan']." <span title=\"Penjualan.\" class=\"fa fa-cash-register\">.";
                      ?>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Content Row -->

        <!-- Kartu Statistik Penjualan -->
        <div class="card shadow mb">
          <div class="card-header">
            <label class="m-0 font-weight-bold text-primary">Statistik Penjualan</label>
            <div class="dropdown float-right">
              <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Rincian Penjualan
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Harian</a>
                <a class="dropdown-item" href="#">Mingguan</a>
                <a class="dropdown-item" href="#">Bulanan</a>
                <a class="dropdown-item" href="#">Tahunan</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="laporan.php">-> Laporan Penjualan</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">

              <canvas id="myAreaChart" class="col-sm-7"></canvas>


              <canvas id="myPieChart" class="col-sm-5"></canvas>
            </div>
          </div>
        </div> <!-- Akhir Kartu Statistik Penjualan -->

        <table class="table table-striped">
          <h4><label>Stok Barang paling sedikit</label></h4>
          <thead>
            <tr>
              <th scope="col">Stok</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Harga M.1 > M.2</th>
              <th scope="col">Komisi</th>
              <td>Opsi</td>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th colspan="4">
                <label>Untuk melihat Keseluruhan Data Barang, buka </label><a href="lihatbarang.php"><button class="btn btn-success btn-sm"> <span class="fa fa-box-open"></span> Data Barang</button></a>
              </th></tr>

            </tfoot>
            <tbody>
              <?php 
              include 'koneksi.php';
              $querybarang="SELECT * FROM data_barang ORDER BY stok ASC LIMIT 8";
              $data=mysqli_query($conn, $querybarang);
              while ($hasil=mysqli_fetch_array($data)) {
                ?>
                <!-- Data Barang urutkan stok sedikit-->
                <tr>
                  <td><?php echo $hasil['stok'] ?></td>
                  <td><?php echo $hasil['brand'] ?> <?php echo $hasil['nama_barang'] ?></td>
                  <td><?php echo "<b>".number_format($hasil['harga_modal'],0,",",".")."</b>";  ?>-> <?php echo number_format($hasil['harga_m2'],0,",","."); ?></td>
                  <td><?php echo number_format($hasil['komisi'],0,",","."); ?></td>
                  <td><a href="inputpenjualan.php?kode_barang=<?php echo $hasil['kode_barang']; ?>" title="Jual Barang ini"><button class="btn btn-success btn-sm"><span class="fa fa-shopping-cart"></span></button></a></td>

                </tr>
                <?php
              }

              ?>


            </tbody>

          </table>

        </div>

      </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="konfirmasiLogout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Keluar dari Sistem Penjualan.</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           Anda akan keluar dari Akun <b><?php echo $_SESSION['userLogin']; ?></b>, Apakah anda yakin mau keluar?
         </div>
         <div class="modal-footer">
          <a href="logout.php"><button type="button" class="btn btn-danger"><i class="fa fa-power-off"> </i> Keluar Akun</button></a>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js" type="text/javascript" charset="utf-8"></script>

  <script src="js/demo/chart-area-demo.js" type="text/javascript" charset="utf-8"></script>

  <script src="js/demo/chart-pie-demo.js"></script>

  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script>
  $('document').ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>

</body>
</html>