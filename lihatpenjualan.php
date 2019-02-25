<html>
<head>
  <title>Lihat Semua Penjualan</title>
  <!-- Custom fonts for this template -->

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <!-- Jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
  <!-- Custom styles for this page -->
  
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  
</head>
<body>

  <div class="fixed-top"> 
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
              <a class="dropdown-item" href="lihatpenjualan.php">Lihat Data Penjualan</a>
              <a class="dropdown-item" href="lihatbarang.php">Lihat Data Barang</a>
              <a class="dropdown-item" href="#">-</a>
            </div>
          </li>
        </ul>
      </div>
    </nav> 
  </div>
  <br><br><br><br>
  <div class="container-fluid">
    <div class="row">
      <div class="col-5">
        <h3><span class="fa fa-cash-register"></span> Data Penjualan</h3><br>
      </div>
      <div class="col-3">
        <a href="lihatpenjualan.php"><button class="btn btn-info"><span class="fa fa-sync-alt"></span> Refresh Data (F5)</button></a>
      </div>
      <div class="col-3">
        <a href="inputpenjualan.php"><button class="btn btn-primary"><span class="fa fa-plus-circle"></span> Tambah Barang Baru</button></a>
      </div>
      <div class="col-12">
      <?php
      if (isset($_GET['alert'])) {
        if ($_GET['alert']==1) {
          ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Data berhasil diubah!</strong>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php
        }
      }


      ?>
      </div>
    </div>
    <div class="table-responsive">
     <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th title="Kode Penjualan">#</th>
          <th>Nama Barang</th>
          <th>Harga Penjualan</th>
          <th>Jenis</th>
          <th>Jumlah</th>
          <th>Komisi</th>
          <th>Margin</th>
          <th>Tanggal</th>
          <th>Akun</th>
          <td><span class="fa fa-cogs"></span></td>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th title="Kode Penjualan">#</th>
          <th>Nama Barang</th>
          <th>Harga Penjualan</th>
          <th>Jenis</th>
          <th>Jumlah</th>
          <th>Komisi</th>
          <th>Margin</th>
          <th>Tanggal</th>
          <th>Akun</th>
          <th><span class="fa fa-cogs"></span></th>
        </tr>
      </tfoot>
      <tbody>


        <?php 
        include_once 'koneksi.php';
        $datapenjualan=mysqli_query($conn, 'SELECT * FROM data_barang, data_penjualan, data_akun WHERE data_penjualan.kode_barang = data_barang.kode_barang and data_penjualan.id_akun = data_akun.id_akun');
        while ($data=mysqli_fetch_array($datapenjualan)) {
          ?>
          <tr>
            <td><?php echo $data['kode_penjualan']; ?></td>
            <td><?php echo $data['nama_barang']; ?></td>
            <td><?php echo number_format($data['harga_penjualan'],0,",","."); ?></td>
            <td><?php echo $data['jenis_penjualan']; ?></td>
            <td><?php echo $data['jumlah']; ?></td>
            <td><?php echo number_format($data['komisi']*$data['jumlah'],0,",","."); ?></td>
            <td><?php echo number_format($data['harga_penjualan']-$data['harga_modal'],0,",","."); ?></td>
            <td><?php echo $data['tgl_penjualan']; ?></td>
            <td><?php echo $data['nama_akun']; ?></td>
            <td>
              <a href="inputpenjualan.php?kodebarang=<?php echo $data[0]; ?>" title="Jual Barang"><button class="btn btn-success btn-sm"><span class="fa fa-shopping-cart"></span></button></a>
              <button class="btn btn-warning btn-sm ubahdata" id="<?php echo $data[0]; ?>"><span class="fa fa-edit"></span></button>
            </td>
          </tr>



          <?php

        }
        ?>


      </tbody>
    </table>
  </div> <!-- table responsive -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Data Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row">
             <form class="form" method="post" action="ubahbarang.php">
              <div class="row">
                <div class="form-group col-sm-4">
                  <input type="hidden" name="kode_barang" id="kode_barang">
                  <label for="nama_barang">Nama Barang</label>
                  <input class="form-control" id="nama_barang" type="text" name="nama_barang" title="Misal: Legion Y720" required/>
                  <small class="form-text text-muted">Kode Barang / Type Model / MTM / SKU.</small>
                </div>
                <div class="form-group col">
                  <label for="deskripsi">Deskripsi</label>
                  <input class="form-control form-control" type="text" name="deskripsi" id="deskripsi" placeholder="Spesifikasi, SKU"  title="Misal: RAM, HDD, SSD, Windows" required>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-sm-3">
                  <label for="stok">Stok</label>
                  <input type="number" name="stok" id="stok" class="form-control" placeholder="Masukan Stok Barang." required="">
                </div>

                <div class="form-group col-sm-4">
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


            </div>
          </div>
        </div> <!-- Modal Body -->
        <div class="modal-footer">
          <button type="button" class="btn btn-md btn-danger float-left hapusbarang"><i class="fa fa-trash-alt"></i> Hapus Barang</button>
          <button type="submit" name="tombol" class="btn btn-lg btn-primary" value="Ubah"><i class="fa fa-save"> </i> Simpan</button>         
        </form>
      </div>
    </div>
  </div>
</div>



</div> <!-- Container Fuild -->



<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<!--   Akhir -->

<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script src="js/demo/datatables-demo.js"></script>

<script text="text/javascript">
  $(document).ready(function () {
    
    var table = $('#dataTable').DataTable();
 
    $('div.dataTables_filter input', table.table().container()).focus();

    $(document).on('click','.ubahdata', function () {
      var kode_barang=$(this).attr("id");
      $('#exampleModal').modal('show');

      var modal = $('#exampleModal')
      modal.find('.modal-title').text('Ubah Data Barang');
      modal.find('.modal-body input#kode_barang').val(kode_barang);

      $.ajax({
        method:"POST",
        url:"readbarang.php",
        data:{kode_barang:kode_barang},
        dataType:"json",
        success:function(data){
          modal.find('.modal-title').text('Edit Data Barang, dengan Kode Barang : ' + kode_barang);
          modal.find('.modal-body input#nama_barang').val(data.nama_barang);
          modal.find('.modal-body input#deskripsi').val(data.deskripsi);
          modal.find('.modal-body input#stok').val(data.stok);
          modal.find('.modal-body select#brand').val(data.brand);
          modal.find('.modal-body input#harga_modal').val(data.harga_modal);
          modal.find('.modal-body input#harga_m2').val(data.harga_m2);
          modal.find('.modal-body input#komisi').val(data.komisi);
          modal.find('.modal-body input#kode_barang').val(data.kode_barang);

                  //menampilkan data ke dalam modal
                }


        }); // Punya Ajax

      

    })    




  });

function hapus() {
  var r = confirm("Apakah yakin Mau Menghapus Data Barang! Setelah dihapus, data tidak dapat dipulihkan.");
  if (r == true) {
    return true;
  } else {
    return false;
  }
}


</script>

</body>
</html>