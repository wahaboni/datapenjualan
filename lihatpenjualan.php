<?php 
session_start();
if (!isset($_SESSION['userLogin'])) {
    header('location:login.php');
}
?>
<html>
<head>
  <title>Lihat Semua Penjualan</title>
  <link rel="icon" href="favicon.ico"/>
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
        <a href="inputpenjualan.php"><button class="btn btn-primary"><span class="fa fa-plus-circle"></span> Tambah Penjualan Baru</button></a>
      </div>
      <div class="col-12">
        <?php
        if (isset($_GET['alert'])) {
          if ($_GET['alert']==1) {
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
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
          <th>Harga Jual</th>
          <th>Jenis</th>
          <th>Jumlah</th>
          <th>Komisi</th>
          <th>Margin</th>
          <th>Tanggal</th>
          <th>Penjual</th>
          <td><span class="fa fa-cogs"></span></td>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th title="Kode Penjualan">#</th>
          <th>Nama Barang</th>
          <th>Penjualan</th>
          <th>Jenis</th>
          <th>Jumlah</th>
          <th>Komisi</th>
          <th>Margin</th>
          <th>Tanggal</th>
          <th>Penjual</th>
          <th><span class="fa fa-cogs"></span></th>
        </tr>
      </tfoot>
      <tbody>


        <?php 
        include_once 'koneksi.php';
        $datapenjualan=mysqli_query($conn, 'SELECT * FROM data_barang, data_penjualan, data_akun WHERE data_penjualan.kode_barang = data_barang.kode_barang and data_penjualan.nama_akun = data_akun.nama_akun');
        while ($data=mysqli_fetch_array($datapenjualan)) {
          if ($data['kode_status']==1) {
            echo "<tr class=bg-warning>";
          } else {
             echo "<tr>";
          }
          ?>
         
            <td><?php echo $data['kode_penjualan']; ?></td>
            <td><?php echo $data['nama_barang']; ?></td>
            <td><?php echo number_format($data['harga_penjualan'],0,",","."); ?></td>
            <td><?php echo $data['jenis_penjualan']; ?></td>
            <td><?php echo $data['jumlah']; ?></td>
            <td><?php echo number_format($data['komisi']*$data['jumlah'],0,",","."); ?></td>
            <td><?php echo number_format(($data['harga_penjualan']-$data['harga_modal'])*$data['jumlah'],0,",","."); ?></td>
            <td><?php echo $data['tgl_penjualan']; ?></td>
            <td><?php echo $data['ket_akun']; ?></td>
            <td>

              <button class="btn btn-secondary btn-sm lihatdata" title="Lihat Penjualan" id="<?php echo $data['kode_penjualan']; ?>"><span class="fa fa-eye"></span></button>

              <button class="btn btn-danger btn-sm ubahdata" title="Edit Penjualan" id="<?php echo $data['kode_penjualan']; ?>"><span class="fa fa-edit"></span></button>
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
          <h5 class="modal-title" id="exampleModalLabel">Ubah Data Penjualan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="container">
            <div class="row">
             <form class="form" method="get" action="ubahpenjualan.php">
              <div class="row">
                <input type="hidden" name="kode_penjualan" id="kode_penjualan">
                <input type="hidden" name="harga_modal" id="harga_modal">

                <div class="form-group col-sm">
                  <label for="harga_penjualan">Harga Penjualan Satuan</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp. </span>
                    </div>
                    <input id="harga_penjualan" type="number" class="form-control" aria-label="Harga Penjualan Satuan" name="harga_penjualan" required="" placeholder="">
                    <div class="input-group-append">
                      <span class="input-group-text">.-</span>
                    </div>
                  </div>
                </div>
                
              </div>
              <div class="row">

                <div class="form-group col-sm-8">
                 <label for="jenis_penjualan">Jenis Penjualan</label>
                 <select id="jenis_penjualan" class="form-control" name="jenis_penjualan">
                  <option value="Offline">Offline (Langsung)</option>
                  <option value="Online">Online (eCommerce)</option>
                </select>
              </div>

              <div class="form-group col-sm">
                <label for="jumlah">Jumlah</label>
                <input class="form-control form-control" type="number" required id="jumlah" name="jumlah">

              </div>
            </div>
            <div class="row">
              <div class="form-group col-sm-6">
                <label for="komisi" id="lblkomisi">Komisi</label>
                <input type="number" readonly class="form-control form-control-plaintext" id="komisi" name="komisi" placeholder="-">
              </div>
              <div class="form-group col-sm">
                <label for="margin" id="lblmargin">Margin</label>
                <input type="number" class="form-control" readonly id="margin" placeholder="-">
              </div>

            </div>
            <div class="row">
              <div class="form-group col">
                <label for="total" id="total"><b>Total Pembayaran Penjualan :</b></label>
                <input type="number" class="form-control bg-primary text-light float-sm-right" readonly id="total" placeholder="-">
              </div>
            </div>

          </form>
        </div>
      </div>
    </div> <!-- Modal Body -->
    <div class="modal-footer">
      <button type="button" class="btn btn-md btn-warning float-left hapusbarang"><i class="fa fa-trash-alt"></i> Hapus Penjualan</button>
      <button type="submit" name="tombol" class="btn btn-lg btn-primary" value="Ubah"><i class="fa fa-save"> </i> Simpan</button>         

    </div>
  </div>
</div>
</div> <!-- Akhir Modal Example -->


<!-- Awal Modal  lihatdata-->
  <div class="modal fade" id="Modallihatdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Lihat Data Penjualan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="container">
            <div class="row">
             <form class="form" method="get" action="ubahpenjualan.php">
              <div class="row">
                <input type="hidden" name="kode_penjualan" id="kode_penjualan">
                <input type="hidden" name="harga_modal" id="harga_modal">

                <div class="form-group col-sm">
                  <label for="harga_penjualan">Harga Penjualan Satuan</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp. </span>
                    </div>
                    <input id="harga_penjualan" type="number" class="form-control" aria-label="Harga Penjualan Satuan" name="harga_penjualan" required="" placeholder="">
                    <div class="input-group-append">
                      <span class="input-group-text">.-</span>
                    </div>
                  </div>
                </div>
                
              </div>
              <div class="row">

                <div class="form-group col-sm-8">
                 <label for="jenis_penjualan">Jenis Penjualan</label>
                 <select id="jenis_penjualan" class="form-control" name="jenis_penjualan">
                  <option value="Offline">Offline (Langsung)</option>
                  <option value="Online">Online (eCommerce)</option>
                </select>
              </div>

              <div class="form-group col-sm">
                <label for="jumlah">Jumlah</label>
                <input class="form-control form-control" type="number" required id="jumlah" name="jumlah">

              </div>
            </div>
            <div class="row">
              <div class="form-group col-sm-6">
                <label for="komisi" id="lblkomisi">Komisi</label>
                <input type="number" readonly class="form-control form-control-plaintext" id="komisi" name="komisi" placeholder="-">
              </div>
              <div class="form-group col-sm">
                <label for="margin" id="lblmargin">Margin</label>
                <input type="number" class="form-control" readonly id="margin" placeholder="-">
              </div>

            </div>
            <div class="row">
              <div class="form-group col">
                <label for="total" id="total"><b>Total Pembayaran Penjualan :</b></label>
                <input type="number" class="form-control bg-primary text-light float-sm-right" readonly id="total" placeholder="-">
              </div>
            </div>

          </form>
        </div>
      </div>
    </div> <!-- Modal Body -->
    <div class="modal-footer">
      <button type="button" class="btn btn-md btn-warning float-left hapusbarang"><i class="fa fa-trash-alt"></i> Hapus Penjualan</button>
      <button type="submit" name="tombol" class="btn btn-lg btn-primary" value="Ubah"><i class="fa fa-save"> </i> Simpan</button>         

    </div>
  </div>
</div>
</div> <!-- Akhir Modal Modallihatdata -->



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


    $(document).on('click','.lihatdata', function () {  // Lihat Data Modal Penjualan
      var kode_penjualan=$(this).attr("id");
      $('#Modallihatdata').modal('show');

    })


    $(document).on('click','.ubahdata', function () {
      var kode_penjualan=$(this).attr("id");
      $('#exampleModal').modal('show');

      var modal = $('#exampleModal')
      modal.find('.modal-title').text('Ubah Data Penjualan');
      modal.find('.modal-body input#kode_penjualan').val(kode_penjualan);

      $.ajax({
        method:"POST",
        url:"readpenjualan.php",
        data:{kode_penjualan:kode_penjualan},
        dataType:"json",
        success:function(data){
          modal.find('.modal-title').text('Edit Data Penjualan, dengan Kode : ' + kode_penjualan);
          modal.find('.modal-body input#harga_penjualan').val(data.harga_penjualan);
          modal.find('.modal-body input#harga_penjualan').attr('placeholder',data.harga_penjualan);
          modal.find('.modal-body select#jenis_penjualan').val(data.jenis_penjualan);
          modal.find('.modal-body input#jumlah').val(data.jumlah);
          modal.find('.modal-body input#harga_modal').val(data.harga_modal);
          modal.find('.modal-body label#lblkomisi').html('Komisi/Unit: '+data.komisi+',<br><b>Total Komisi</b>:');
          modal.find('.modal-body input#komisi').val(data.komisi*data.jumlah);
          var margin = data.harga_penjualan-data.harga_modal;
          modal.find('.modal-body label#lblmargin').html('Margin/Unit:'+margin+',<br><b>Total Margin</b>:');
          modal.find('.modal-body input#margin').val((margin)*data.jumlah);
          modal.find('.modal-body input#total').val(data.harga_penjualan*data.jumlah);

                  //menampilkan data ke dalam modal
                }
        }); // Punya Ajax

        $(modal.find('.modal-body input#harga_penjualan')).keyup(function () {  // Ketika Input Harga Penjualan ditulis
          var harga_modal = modal.find('.modal-body input#harga_modal').val()

          var hitung = $(this).val() - harga_modal
          modal.find('.modal-body input#margin').val(hitung)
        })

        $(modal.find('.modal-body input#jumlah')).keyup(function () { // Ketika Input jumlah Penjualan ditulis
          var harga_modal = modal.find('.modal-body input#harga_modal').val()

          var hitung = $(this).val() - harga_modal
          modal.find('.modal-body input#margin').val(hitung)

        })



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