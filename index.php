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
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<!-- Bootstrap core CSS -->

<link rel="stylesheet" href="css/bootstrap.min.css">
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
    <div class="container">
        <div class="row border">
            <div class="col-sm-9">
                <br>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Rincian Penjualan
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Hari ini</a>
                                <a class="dropdown-item" href="#">Minggu Ini</a>
                                <a class="dropdown-item" href="#">Bulan Ini</a>
                                <a class="dropdown-item" href="#">Bulan lalu</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">-> Laporan Penjualan</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm">
                        <h5>Total Penjualan <span class="badge badge-primary">9</span>
                            <span class="sr-only">Total Penjualan</span>
                        </h5>
                    </div>

                    <div class="col-sm">
                        <h5>Margin <span class="badge badge-primary">900.000</span>
                            <span class="sr-only">Margin</span>
                        </h5>
                    </div>

                </div>
                <br/>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
                <nav aria-label="...">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item" aria-current="page">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
                <br>
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
                <div class="col-sm-3 border">
                    <br>
                    <div class="alert alert-info" role="alert"><label>Informasi</label></div>
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Kumpulkan Report</h4>
                        <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                        <hr>
                        <p class="mb-0"><button class="btn btn-primary">Kirim</button>.</p>
                    </div>
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
       Anda akan keluar dari Akun <b><?php echo $_SESSION['userLogin']; ?></b>, Apakah anda yakin?
      </div>
      <div class="modal-footer">
        <a href="logout.php"><button type="button" class="btn btn-warning"><i class="fa fa-power-off"> </i> Keluar Akun</button></a>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
      </div>
    </div>
  </div>
</div>


    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/js/bootstrap.min.js"></script>

</body>
</html>