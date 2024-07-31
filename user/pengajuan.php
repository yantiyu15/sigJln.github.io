<?php
include '../conn.php';

// cek apakah tombol submit sudah ditekan atau belum

if (isset($_POST["submit"])) {
  $komentar = $_POST["komentar"];
  $saran = $_POST["saran"];
  $latitude = $_POST["latitude"];
  $longitude = $_POST["longitude"];
  $alamat = $_POST["alamat"];
  $foto = upload();
  if( !$foto){
      return false;
  }
  $status = $_POST["status"];

  $query = "INSERT INTO keluhan VALUES('','$komentar', '$saran', '$latitude', '$longitude', '$alamat', '$foto', '$status')";
  if (mysqli_query($conn, $query)) {
    echo "
    <script>
    alert('Pengajuan berhasil dikirim');
    document.location.href = 'index.php'
    </script>
    ";
  } else {
    echo "
    <script>
    alert('Pengajuan gagal dikirim');
    document.location.href = 'pengajuan.php'
    </script>
    ";
  }
}

     


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SITIJA</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body>
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center">
        <div class="logo mr-auto">
          <h1 class="text-light"><a href="index.php"><span>SITIJA</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="peta.php">Peta</a></li>
            <li><a href="pengajuan.php">Pengajuan</a></li>
            </li>
            <li class="get-started"><a href="../logout.php">Logout</a></li>
          </ul>
        </nav><!-- .nav-menu -->
      </div><!-- End Header Container -->
    </div>
</header><!-- End Header -->
<!-- ======= Hero Section ======= -->
<section id="contact" class="contact">
      <div class="container">
        <div class="row">
          

          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">

            <!-- <iframe style="border:0; width: 100%; height: 270px;" id="map-canvas"></iframe> -->
            

            <form action="" method="POST" class="php-email-form mt-4" enctype="multipart/form-data">
              <div class="form-row">
                <div class="col-md-10 form-group">
                <input type="text" class="form-control" name="komentar" id="komentar" placeholder="komentar" required />
                </div>
                <div class="col-md-10 form-group">
                  <input type="text" class="form-control" name="saran" id="saran" placeholder="saran" required />
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Latitude"  required/>
               
              </div>
              <div class="form-group">
              <input type="text" name="longitude" class="form-control" id="longitude" placeholder="longitude"  data-msg="Masukkan sedikitnya 4 karakter" required/>
               
              </div>
              <div class="form-group">
              <input type="text" name="alamat" class="form-control" id="alamat" placeholder="alamat"  data-msg="Masukkan sedikitnya 4 karakter" required />
               
              </div>
              <div class="form-group">
                <input type="file" name="foto" id="foto">
               
              </div>
              <select class="form-select" name="status">
                <option value="sedang diproses">Sedang Diproses</option> 
              </select>
              <div class="text-center"><button type="submit" name="submit" style="background-color: #6482AD;">Kirim pesan</button></div>
            </form>
          </div>
        </div>

      </div>
    </section><!-- End Contact Section -->
      <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap-hover-dropdown.js"></script>
  <script src="js/script.js"></script>
</body>
</html>