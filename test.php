<!DOCTYPE html>
<html lang="id">
<head>
  <link rel="stylesheet" href="vendor/jquery/jquery.min.js"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
   $(document).ready(function () {
     

     $("#tombol").click(function () {
      var nama = $("#nama").val();
      var samaran = $("#samaran").val();
      $("#paragraf").html("Sorry, Nama Asli saya "+nama);
      $("#par2").html("Dan Samaran "+samaran);
    });

   });
 </script>



</head>
<body>

  <div id="paragraf">
    <p><h3>Halo, Nama Saya Wahab</h3></p>
  </div>
  <div id="par2">
    <p>
      <h3>sAYA bOLED</h3>
    </p>
  </div><hr>
  <input type="text" id="nama"/ placeholder="Nama"><br>
  <input type="text" id="samaran" placeholder="samaran"><br>  
  <button id="tombol">Koreksi</button>

</body>
</html>
