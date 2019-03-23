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
  <link rel="icon" href="favicon.ico"/>
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
            $simpanpenjualan=$_POST['simpanpenjualan'];
            
            $kode_barang=$_SESSION['ses.kode_barang'];
            $nama_barang=$_SESSION['ses.nama_barang'];
            $harga_modal=$_SESSION['ses.harga_modal'];
            $komisi=$_SESSION['ses.komisi'];

            $harga_penjualan=$_POST['harga_penjualan'];
            $jenis_penjualan=$_POST['jenis_penjualan'];
            $jumlah=$_POST['jumlah'];
            $tgl_penjualan=$_POST['tgl_penjualan'];

            $nama_akun=$_SESSION['userLogin'];
            if ($simpanpenjualan=='bookingbarang'){
              $kode_status=1;
            } elseif ($simpanpenjualan=='jualbarang') {
              $kode_status=2;
            }

            include_once 'koneksi.php';
            $query="INSERT INTO data_penjualan (kode_barang, nama_barang, harga_penjualan, harga_modal, komisi, jenis_penjualan, jumlah, kode_status, tgl_penjualan, nama_akun) VALUES ('$kode_barang', '$nama_barang', '$harga_penjualan', '$harga_modal', '$komisi', '$jenis_penjualan', '$jumlah', '$kode_status', '$tgl_penjualan', '$nama_akun')";
            if ($conn->query($query) ==TRUE) {

              $cekstok="SELECT stok FROM data_barang where kode_barang='$kode_barang'";
              $databarang=mysqli_query($conn, $cekstok);
              $data=mysqli_fetch_row($databarang);
              $updatestok=$data['0'];
              $updatestok-=$jumlah;

              $rumus="UPDATE data_barang SET stok='$updatestok' WHERE kode_barang='$kode_barang'";
              mysqli_query($conn, $rumus);
              header('location:inputpenjualan.php?info=1');
              mysqli_close();
            }
            else {
              header('location:inputpenjualan.php?info=2');
              mysqli_close();
            }
          }

          if (isset($_GET['info'])) {
            if ($_GET['info']==1) {
              ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data sudah Berhasil tersimpan!</strong> Kamu bisa melihatnya di <a href="lihatpenjualan.php">Data Penjualan</a>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?php
            } elseif ($_GET['info']==2) {
              ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal tersimpan!</strong> Pastikan Semua Data yang diisi sudah benar.  Silahkan <a href="inputpenjualan.php"><button class="btn btn-outline-secondary">Coba Kembali</button></a> <br>
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
          <input type="text" class="form-control text-light" id="stok" readonly  placeholder="-">
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
          <small class="form-text text-muted margin">Margin :</small>
          

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
          <input class="form-control form-control" type="number" required name="jumlah" id="jumlah">
          
        </div>

        <div class="form-group col-sm">
          <label for="jumlah">Tanggal</label>
          <input class="form-control form-control" type="date" required name="tgl_penjualan" value="<?php echo date("Y-m-d"); ?>">
        </div>
      </div>
<hr/>
      <div class="row">

        <div class="col-sm-2">
          <button class="btn btn-primary simpanpenjualan" type="submit" name="simpanpenjualan" value="jualbarang"><span class="fa fa-shopping-cart"></span> Jual Barang</button>
        </div>
        <div class="col-sm-3">
          <button class="btn btn-warning text-dark simpanpenjualan" type="submit" name="simpanpenjualan" value="bookingbarang"><span class="fa fa-thumbtack"></span> Booking/Hold Barang</button>
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
          <h5 class="modal-title text-danger" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle"></i> Peringatan !</h5>
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
  <script src="vendor/jquery/jquery-1.10.2.js"></script>

  <script src="vendor/jquery/jquery-ui.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" charset="utf-8" src="vendor/AYS/jquery.are-you-sure.js"></script>


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
        $('input#jumlah').attr('max',data.stok);


        if (data.stok < 10) {
          $('input#stok').attr('class','form-control bg-warning text-light');
        }
        if(data.stok < 5) {
         $('input#stok').attr('class','form-control bg-danger text-light'); 
       }
       if (data.stok>9){
        $('input#stok').attr('class','form-control bg-primary text-light');
      }

      if (data.stok<1) {
        $('button.simpanpenjualan').attr('disabled','true');
        $('#ModalWarning').modal('show');
        var modalwarn = $('#ModalWarning')
        modalwarn.find('.modal-title').html('<i class="fa fa-exclamation-triangle"></i> Peringatan! Stok Barang Habis.');
        modalwarn.find('.modal-body').html('Tidak dapat Melakukan Penjualan apabila Stok Habis.');
      } else {
        $('button.simpanpenjualan').removeAttr('disabled');
      }

      $('input#komisi').val(data.komisi);
      $('input#harga_penjualan').focus();
      $('input#harga_penjualan').attr('min',data.harga_modal);


    }
    }); // Punya Ajax
    
  </script>
  <?php
}
?>
<script>

  $(document).ready(function () {
    $('form').areYouSure();
    
    $('button.simpanpenjualan').attr('disabled','true');

    $('input#kode_barang').focus()
    $('#kode_barang').keyup(function() {
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
                $('input#jumlah').attr('max',data.stok);

                if (data.stok < 10) {
                  $('input#stok').attr('class','form-control bg-warning text-light');
                }
                if(data.stok < 5) {
                 $('input#stok').attr('class','form-control bg-danger text-light'); 
               }
               if (data.stok>9){
                $('input#stok').attr('class','form-control bg-primary text-light');
              }

              if (data.stok<1) {
                $('button.simpanpenjualan').attr('disabled','true');

                $('#ModalWarning').modal('show');
                var modalwarn = $('#ModalWarning')
                modalwarn.find('.modal-title').html('<i class="fa fa-exclamation-triangle"></i> Peringatan! Stok Barang Habis.');
                modalwarn.find('.modal-body').html('Tidak dapat Melakukan Penjualan apabila Stok Habis.');
              } else {
                $('button.simpanpenjualan').removeAttr('disabled');
              }

              $('input#komisi').val(data.komisi);
              $('input#harga_penjualan').focus();
              $('input#harga_penjualan').attr('min',data.harga_modal);


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
                $('input#harga_m2').val(data.harga_m2).toLocaleString();
                $('input#stok').val(data.stok);
                $('input#jumlah').attr('max',data.stok);
                

                if (data.stok < 10) {
                  $('input#stok').attr('class','form-control bg-warning text-light');
                }
                if(data.stok < 5) {
                 $('input#stok').attr('class','form-control bg-danger text-light'); 
               }
               if (data.stok>9){
                $('input#stok').attr('class','form-control bg-primary text-light');
              }


              if (data.stok<1) {
                $('button.simpanpenjualan').attr('disabled','true');
                $('#ModalWarning').modal('show');
                var modalwarn = $('#ModalWarning')
                modalwarn.find('.modal-title').html('<i class="fa fa-exclamation-triangle"></i> Peringatan! Stok Barang Habis.');
                modalwarn.find('.modal-body').html('Tidak dapat Melakukan Penjualan apabila Stok Habis.');
              } else {
                $('button.simpanpenjualan').removeAttr('disabled');
              }

              $('input#komisi').val(data.komisi);
              $('input#harga_penjualan').focus();
              $('input#harga_penjualan').attr('min',data.harga_modal);
              
            }

              }); // Punya Ajax
          });
           

    // Untuk outfocus Kode Barang
    $("#kode_barang").focusout(function () {

     var kode_barang = $('#kode_barang').val();
            // Ambil data Barang otomatis
            $.ajax({
              method:"POST",
              url:"readbarang.php",
              data:{kode_barang:kode_barang},
              dataType:"json",
              
              error:function (jqXHR, textStatus, errorThrown) {
                alert('tidak ada data.')
              },
              success:function(data){
                if (!$.trim(data)){   
                  $('button.simpanpenjualan').attr('disabled','true');
                }

                $('input#kode_barang').val(data.kode_barang);
                $('input#nama_barang').val(data.nama_barang+' -> '+data.deskripsi);
                $('input#harga_modal').val(data.harga_modal);
                $('input#harga_m2').val(data.harga_m2).toLocaleString();
                $('input#stok').val(data.stok);
                $('input#jumlah').attr('max',data.stok);
                
                if (data.stok < 10) {
                  $('input#stok').attr('class','form-control bg-warning text-light');
                }
                if(data.stok < 5) {
                 $('input#stok').attr('class','form-control bg-danger text-light'); 
               }
               if (data.stok>9){
                $('input#stok').attr('class','form-control bg-primary text-light');
              }


              if (data.stok<1) {
                $('button.simpanpenjualan').attr('disabled','true');
                $('#ModalWarning').modal('show');
                var modalwarn = $('#ModalWarning')
                modalwarn.find('.modal-title').html('<i class="fa fa-exclamation-triangle"></i> Peringatan! Stok Barang Habis.');
                modalwarn.find('.modal-body').html('Tidak dapat Melakukan Penjualan apabila Stok Habis.');
              } else {
                $('button.simpanpenjualan').removeAttr('disabled');
                
                $.post("sess_penjualan.php",
                {
                  kode_barang:data.kode_barang,
                  nama_barang:data.nama_barang,
                  harga_modal:data.harga_modal,
                  komisi:data.komisi
                  
                },
                function (response,status) {
                console.log(response+status)
                }
                )
              }

              $('input#komisi').val(data.komisi);
              $('input#harga_penjualan').focus();
              $('input#harga_penjualan').attr('min',data.harga_modal);

              
            }
            

              }); // Punya Ajax
          });
     // Akhir dari outfocus

     $('input#harga_penjualan').keyup(function () {
        var harga_modal = $('input#harga_modal').val();
        var harga_penjualan = $('input#harga_penjualan').val();
        var margin  =harga_penjualan - harga_modal;
       $('small.margin').text('Margin : ' + margin );
     })

     $('button#reset').click(function() {
      $('input#kode_barang').focus()

    })
 }) // Tutup Ready Document



</script>

</body>
</html>