<?php
include '../conn.php';
$post = query("SELECT * FROM jalan");


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
            <li><a href="peta.php">Peta</a></li>
            <li><a href="pengajuan.php">Pengajuan</a></li>
            </li>
            <li class="get-started"><a href="../logout.php">Logout</a></li>
          </ul>
        </nav><!-- .nav-menu -->
      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->

  <!-- d -->
  <section id="cl" class="cl">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info panel-dashboard centered">
                      <div class="panel-heading">
                        <h3 class="text-center"><strong> - TAMPILAN PETA - </strong></h3>
                      </div>
                    <div class="panel-body">
                        <div id="map" style="width:100%;height:460px;"></div>
                            <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAbXF62gVyhJOVkRiTHcVp_BkjPYDQfH5w"></script>
                             <script type="text/javascript">
                                function initialize() {

                                var mapOptions = {   
                                zoom: 8,
                                center: new google.maps.LatLng(-7.309235, 107.0251503), 
                                disableDefaultUI: true
                                };

                                var mapElement = document.getElementById('map');

                                var map = new google.maps.Map(mapElement, mapOptions);

                                setMarkers(map, officeLocations);

                                }

                                var officeLocations = [
                                <?php
                                $data = file_get_contents('http://localhost/sigjln/user/ambil_data.php');
                                        $no=1;
                                        if(json_decode($data,true)){
                                        $obj = json_decode($data);
                                        foreach($obj->results as $item){
                                          
                                ?>
                                [<?php echo $item->id ?>,'<?php echo $item->nama ?>','<?php echo $item->kampung ?>', <?php echo $item->longitude ?>, <?php echo $item->latitude ?>],
                                <?php 
                                }
                                } 
                                ?>    
                                ];

                                function setMarkers(map, locations)
                                {
                                var globalPin = '../img/marker.png';

                                for (var i = 0; i < locations.length; i++) {

                                var office = locations[i];
                                var myLatLng = new google.maps.LatLng(office[4], office[3]);
                                var infowindow = new google.maps.InfoWindow({content: contentString});
                                
                                var contentString = 
                                    '<div id="content">'+
                                    '<div id="siteNotice">'+
                                    '</div>'+
                                    '<h5 id="firstHeading" class="firstHeading">'+ office[1] + '</h5>'+
                                    '<div id="bodyContent">'+ 
                                    '<a href=detail.php?id='+office[0]+'>Info Detail</a>'+
                                    '</div>'+
                                    '</div>';

                                var marker = new google.maps.Marker({
                                    position: myLatLng,
                                    map: map,
                                    title: office[1],
                                    icon:'../img/marker.png'
                                });

                                google.maps.event.addListener(marker, 'click', getInfoCallback(map, contentString));
                                }
                                }

                                function getInfoCallback(map, content) {
                                var infowindow = new google.maps.InfoWindow({content: content});
                                return function() {
                                    infowindow.setContent(content); 
                                    infowindow.open(map, this);
                                };
                                }

                                initialize();
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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