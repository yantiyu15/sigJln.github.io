<?php
include '../conn.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    die("Error. No ID Selected!");
}
$query = mysqli_query($conn, "SELECT * FROM jalan WHERE id='$id'");
$result = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SITIJA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" id="sidebarMenu">
            <div class="position-sticky">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                    <img src="../img/logo-cianjur-kabupaten.png" alt="" class="img-fluid" style="width: 30px">
                    <span class="fs-5 fw-bold ms-2">Sistem Informasi Optimasi Jalan Melalui Sistem Informasi Geografis Berbasis Web</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto fs-5">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link link-dark">
                            <i class="bi bi-house-door me-2"></i>Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="jalan.php" class="nav-link link-dark active">
                            <i class="bi bi-file-earmark-post me-2"></i>Data Jalan
                        </a>
                    </li>
                    <li>
                        <a href="keluhan.php" class="nav-link link-dark">
                            <i class="bi bi-file-earmark-post me-2"></i>Keluhan
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container card shadow mt-3 mb-3 p-3">
            <div class="row mb-3">
                <div class="col-lg-8">
                    <h5>Detail Jalan</h5>
                </div>
                <div class="col-lg-4 text-end">
                  <a href="jalan.php" class="text-decoration-none text-danger"><i class="bi bi-arrow-left"></i>Kembali</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <table class="table table-striped">
                    <tr>
                 <th>Item</th>
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
                 <td><h5><?php echo $result["volume"] ?></h5></td>
               </tr>
               <tr>
                 <td>Lokasi</td>
                 <td><h5><?php echo $result["kampung"] ?></h5></td>
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
                 <td><h5><img src="../img/<?php echo $result['foto'];?>" width="75"></h5></td>
                  <!-- <td><img src="../img/logo-cianjur-kabupaten.png" width="75"></td> -->
              </tr>
                    </table>
                </div>
            </div>

            <div id="map-canvas" style="height: 500px;"></div>
        </main>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YQ68Cb6XhTpG4LpAL5g6/0piN4aS5j2EoQhq/Z06Gg6RB9n2M6Ab2vpldZHGmdTy" crossorigin="anonymous"></script>
</body>
</html>
