<!doctype html>
<html lang="id">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  
  <!-- Bootstrap, Jquery css -->
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">


  <title>Input Data Penjualan</title>



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
      <div class="col-sm-7">
        <h3>Input Data Penjualan</h3>
    <label class="fa fa-user-edit"> </label> <label> Perhatikan Harga & Stok yang diinput. </label>
      </div>
      <div class="col-sm">
        
        <div class="col">

        <?php 
        if (isset($_POST['simpanpenjualan'])) {
          $kode_barang=$_POST['kode_barang'];
          $harga_penjualan=$_POST['harga_penjualan'];
          $jenis_penjualan=$_POST['jenis_penjualan'];
          $jumlah=$_POST['jumlah'];
          $tgl_penjualan=$_POST['tgl_penjualan'];
          $id_akun=$_POST['id_akun'];
          
          
          include_once 'koneksi.php';
          $query="INSERT INTO data_penjualan (kode_barang, harga_penjualan, jenis_penjualan, jumlah, tgl_penjualan, id_akun) VALUES ('$kode_barang', '$harga_penjualan', '$jenis_penjualan', '$jumlah', '$tgl_penjualan', '$id_akun')";
          if ($conn->query($query) ==TRUE) {
            header('location:inputpenjualan.php?info=1');
            mysqli_close();
          } else {
            header('location:inputpenjualan.php?info=2');
            mysqli_close();
          }
        }

        if (isset($_GET['info'])) {
          if ($_GET['info']==1) {
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Data sudah Berhasil tersimpan!</strong> Kamu bisa melihatnya di <a href="lihatpenjualan.php.php">Data Penjualan</a>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php
          } elseif ($_GET['info']==2) {
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Gagal tersimpan! Pastikan Kode Barang sudah benar. </strong> Silahkan <a href="inputpenjualan.php.php"><button class="btn btn-outline-primary">Coba Kembali</button></a> <br>
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
    </div>
    
    <form class="form" method="post">
      <div class="row">
        <div class="form-group col-sm-4">
          <label for="kode_barang">Kode Barang  - (Enter)</label>
          <input class="form-control" id="kode_barang" type="text" name="kode_barang" required/>
          <small class="form-text text-muted">Masukan Kode Barang, Nama Barang, Seri, Model, dll</small>
        </div>
        <div class="form-group col-sm">
          <label for="nama_barang">Nama Barang & Deskripsi</label>
          <input class="form-control form-control-plaintext" id="nama_barang" type="text" readonly placeholder="-">
        </div>
      </div>

      <div class="row">
        <div class="form-group col-sm">
          <label for="harga_modal">Harga Modal (M.1)</label>
          <input type="text" class="form-control form-control-plaintext" id="harga_modal" readonly  placeholder="-">
        </div>
        <div class="form-group col-sm">
          <label for="harga_m2">Harga Min. Jual Offline (M.2)</label>
          <input type="text" class="form-control form-control-plaintext" id="harga_m2" readonly  placeholder="-">
        </div>
        <div class="form-group col-sm-2">
          <label for="stok">Jumlah Stok.</label>
          <input type="text" class="form-control bg-primary text-light" id="stok" readonly  placeholder="-">
        </div>
        <div class="form-group col-sm">
          <label for="komisi">Komisi @Unit</label>
          <input type="text" class="form-control bg-primary text-light" id="komisi" readonly  placeholder="-">
        </div>
      </div>

      <div class="row">
        <div class="form-group col-sm-4">
          <label for="harga_penjualan">Harga Penjualan</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Rp. </span>
            </div>
            <input id="harga_penjualan" type="number" class="form-control" aria-label="Harga Satuan" name="harga_penjualan" required="">
            <div class="input-group-append">
              <span class="input-group-text">.-</span>
            </div>
          </div>
        </div>

        <div class="form-group col-sm-3">
          <label for="jenis_penjualan">Jenis Penjualan</label>
          <select id="jenis_penjualan" class="form-control" name="jenis_penjualan">
            <option value="Offline">Offline (Langsung)</option>
            <option value="Online">Online (eCommerce)</option>
          </select>
        </div>

        <div class="form-group col-sm-2">
          <label for="jumlah">Jumlah</label>
          <input class="form-control form-control" type="number" required name="jumlah">
          
        </div>

        <div class="form-group col-sm">
          <label for="jumlah">Tanggal</label>
          <input class="form-control form-control" type="date" required name="tgl_penjualan" value="<?php echo date("Y-m-d"); ?>">

        </div>

      </div>
      <!-- Session ID TOKO -->
      <input type="hidden" name="id_akun" value="1002">

      <div class="row">
        <div class="col-sm-2">
          <button class="btn btn-primary" type="submit" name="simpanpenjualan"><span class="fa fa-shopping-cart"></span> Jual Barang</button>
        </div>
        <div class="col-sm-3">
          <button class="btn btn-warning text-dark"><span class="fa fa-thumbtack"></span> Book/Hold Barang</button>
        </div>
        <div class="col"><button type="reset" id="reset" class="btn btn-light"><span class="fa fa-trash"></span> Bersihkan</button></div>
        
      </div>

    </form>


  </div>   <!--  Container -->

<!-- Modal Dialog -->


<!-- Modal -->
<div class="modal fade bg-warning" id="ModalWarning" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLongTitle">Peringatan !</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" id="button" class="btn btn-danger" data-dismiss="modal">&times; Tutup</button>
      </div>
    </div>
  </div>
</div>


<br><br><br>

<!-- Optional JavaScript -->
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>


<!-- // Ambil kode Barang dari URL -->
<?php 
if (isset($_GET['kode_barang'])) {
  ?>
  <script>

    $('#kode_barang').val(<?php echo $_GET['kode_barang']; ?>);
    var kode_barang = $('#kode_barang').val();
    // Ambil data Barang otomatis
    

    $.ajax({
      method:"POST",
      url:"readbarang.php",
      data:{kode_barang:kode_barang},
      dataType:"json",
      success:function(data){
        $('input#kode_barang').val(data.kode_barang);
        $('input#nama_barang').val(data.nama_barang+' -> '+data.deskripsi);
        $('input#harga_modal').val(data.harga_modal);
        $('input#harga_m2').val(data.harga_m2);
        $('input#stok').val(data.stok);
        if (data.stok<1) {
          $('#ModalWarning').modal('show');
          var modalwarn = $('#ModalWarning')
          modalwarn.find('.modal-title').text('Stok Habis.');
          modalwarn.find('.modal-body').html('Tidak dapat Melakukan Penjualan apabila Stok Habis.');
          

        }
        $('input#komisi').val(data.komisi);
         $('input#harga_jual').focus();


      }
    }); // Punya Ajax
    
  </script>
  <?php
}
?>
<script>

  $(document).ready(function () {
    $('input#kode_barang').focus()
    $('#kode_barang').keypress(function() {
      $('input#nama_barang').val('');
        $('input#harga_modal').val('');
        $('input#harga_m2').val('');
        $('input#komisi').val('');
        $('input#stok').val('');

      $("#kode_barang").autocomplete({
        source: 'autocomplete_barang.php',

        select:function() {
        return true;
          }


        })

    });
    $('#kode_barang').keypress(function(event){
      var keycode = (event.keyCode ? event.keyCode : event.which);
      if(keycode == '13'){
        // Jika Tombol Enter ditekan
        var kode_barang = $('#kode_barang').val();
            // Ambil data Barang otomatis
            

            $.ajax({
              method:"POST",
              url:"readbarang.php",
              data:{kode_barang:kode_barang},
              dataType:"json",
              success:function(data){
                $('input#kode_barang').val(data.kode_barang);
                $('input#nama_barang').val(data.nama_barang+' -> '+data.deskripsi);
                $('input#harga_modal').val(data.harga_modal);
                $('input#harga_m2').val(data.harga_m2);
                $('input#stok').val(data.stok);
                $('input#komisi').val(data.komisi);
                $('input#harga_jual').focus();


              },
              error:function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(ajaxOptions);
                alert(thrownError);
              }

              }); // Punya Ajax

          }



         }); //Akhir Keypress

          $("#kode_barang").keydown(function (e) {
           if (e.which == 9)
               var kode_barang = $('#kode_barang').val();
            // Ambil data Barang otomatis
            $.ajax({
              method:"POST",
              url:"readbarang.php",
              data:{kode_barang:kode_barang},
              dataType:"json",
              success:function(data){
                $('input#kode_barang').val(data.kode_barang);
                $('input#nama_barang').val(data.nama_barang+' -> '+data.deskripsi);
                $('input#harga_modal').val(data.harga_modal);
                $('input#harga_m2').val(data.harga_m2);
                $('input#stok').val(data.stok);
                $('input#komisi').val(data.komisi);
                $('input#harga_jual').focus();
              }

              }); // Punya Ajax
        });

          $('button#reset').click(function() {
            $('input#kode_barang').focus()
          })
 }) // Tutup Ready Document



</script>

</body>
</html>