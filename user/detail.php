<?php
include '../conn.php';
if(isset($_GET['id'])){
  $id=$_GET['id'];
}
else {
  die ("Error. No ID Selected!");    
}
$query= mysqli_query($conn, "SELECT * FROM jalan WHERE id='$id'");
$result =mysqli_fetch_array($query);



?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SITIJA</title>
       <!-- Google Fonts -->
       <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    

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
            <!--<li><a href="#about">About</a></li>
            <li><a href="#services">Maps</a></li> -->
            <!-- <li><a href="#portfolio">Portfolio</a></li>
            <li><a href="#team">Team</a></li> -->
            <!-- <li><a href="#contact">Contact</a></li>
            <li class="drop-down"><a href="detail/detailsekolah.php">Login</a>
              <ul>
                <li><a href="#">Login</a></li> -->
                <!-- <li class="drop-down"><a href="#">Drop Down 2</a>
                  <ul>
                    <li><a href="#">Deep Drop Down 1</a></li>
                    <li><a href="#">Deep Drop Down 2</a></li>
                    <li><a href="#">Deep Drop Down 3</a></li>
                    <li><a href="#">Deep Drop Down 4</a></li>
                    <li><a href="#">Deep Drop Down 5</a></li>
                  </ul>
                </li> -->
                <!-- <li><a href="#">Register</a></li> -->
<!--                 <li><a href="#">Drop Down 4</a></li>
                <li><a href="#">Drop Down 5</a></li> -->
              <!-- </ul>
            </li> -->

            <li class="get-started"><a href="peta.php">Kembali</a></li>
          </ul>
        </nav><!-- .nav-menu -->
      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->
  <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAbXF62gVyhJOVkRiTHcVp_BkjPYDQfH5w"></script>
    <script>

        function initialize() {
        var myLatlng = new google.maps.LatLng(<?php echo $result["latitude"] ?>,<?php echo $result["longitude"] ?>);
        var mapOptions = {
            zoom: 13,
            center: myLatlng
        };

        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading"><?php echo $result["nama"] ?></h1>'+
            '<div id="bodyContent">'+
            '<p><?php echo $result["kampung"] ?></p>'+
            '</div>'+
            '</div>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: 'Maps Info',
            icon:'../img/marker.png'
        });
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map,marker);
        });
        }

        google.maps.event.addDomListener(window, 'load', initialize);

            </script>
  <div class="container" style="padding-top: 120px;">
      <div class="row">
        
        <div class="col-md-7" data-aos="fade-up" data-aos-delay="200">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-heading centered">
              <h2 class="panel-title"><strong>Informasi Detail Jalan</strong></h4>
            </div>
            <div class="panel-body">
             <table class="table">
               <tr>
                 <!-- <th>Item</th> -->
                 <th>Detail</th>
               </tr>
               <tr>
                 <td>Nama Jalan</td>
                 <td><h5><?php echo $result["nama"] ?></h5></td>
               </tr>
               <tr>
                 <td>Latitude</td>
                 <td><h5><?php echo $result["latitude"] ?></h5></td>
               </tr>
               <tr>
                 <td>Longitude</td>
                 <td><h5><?php echo $result["longitude"] ?></h5></td>
               </tr>
               <tr>
                 <td>Volume</td>
                 <td><h5><?php echo $result["volume"] ?></td>
               </tr>
               <tr>
                 <td>Lokasi</td>
                 <td><h5><?php echo $result["kampung"] ?></td>
               </tr>
               <tr>
                 <td>Sumber Dana</td>
                 <td><h5><?php echo $result["sumber_dana"] ?></h5></td>
               </tr>
               <tr>
                 <td>Kerusakan</td>
                 <td><h5><?php echo $result["kerusakan"] ?></h5></td>
               </tr>
               <tr>
                 <td>Penyebab</td>
                 <td><h5><?php echo $result["penyebab"] ?></h5></td>
               </tr>
               <tr>
                 <td>Kondisi Jalan</td>
                 <td><h5><?php echo $result["kondisi_jalan"] ?></h5></td>
               </tr>
               <tr>
                 <td>Foto</td>
                 <td><h5><img src="../img/<?php echo $result['foto'];?>" width="100"></h5></td>
               </tr>
             </table>
            </div>
            </div>
          </div>
          
        <div class="col-md-5" data-aos="zoom-in">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-heading centered">
              <h2 class="panel-title"><strong>Lokasi</strong></h4>
            </div>
            <div class="panel-body">
              <div id="map-canvas" style="width:100%;height:380px;"></div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap-hover-dropdown.js"></script>
  <script src="js/script.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/datatable-bootstrap.js"></script>

</body>
</html>