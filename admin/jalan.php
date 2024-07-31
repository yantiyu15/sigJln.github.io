<?php
  include '../conn.php';
  session_start();

  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['roll']==""){
      header("location:index.php?pesan=gagal");
  }

  $post = query("SELECT * FROM jalan");
  if (isset($_POST["cari"])) {
    $post = cari($_POST["key"]);
  }
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
    <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
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
              <i class="bi bi-flag me-2"></i>Keluhan
            </a>
          </li>
        </ul>
        <div class="dropdown fixed-bottom" style="bottom: 20px; left: 30px">
          <a class="nav-link d-flex align-items-center gap-2" href="../logout.php">
            <i class="fa-solid fa-door-open"></i>logout
          </a>
        </div>
      </div>
    </nav>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">
      <div class="container card shadow p-3">
        <div class="row mb-3 justify-content-center">
            <div class="row mb-3">
                <div class="col-lg-8">
                    <h5>Data Jalan</h5>
                </div>
                <div class="col-lg-4 text-end">
                  <a href="index.php" class="text-decoration-none text-danger"><i class="bi bi-arrow-left"></i>Kembali</a>
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-lg-6">
                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari data" name="key"  autofocus autocomplete="off">
                            <button class="btn btn-primary" type="submit" name="cari"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>   
                    </form>
                </div>
                <div class="col-lg-3">
                        <a href="tambah.php" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>Tambah</a>
                </div>
            </div>
        </div>
        <div class="row mb-3 justify-content-center">
          <div class="col-lg-10">
            <table class="table table-responsive">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Jalan</th>
                  <th>Lokasi</th>
                  <th>Kondisi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; ?>
                <?php foreach ($post as $row) : ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row["nama"]; ?></td>
                    <td><?php echo $row["kampung"]; ?></td>
                    <td><?php echo $row["kondisi_jalan"]; ?></td>
                    <td style="width: 150px">
                      <a href="detail.php?id=<?= $row["id"]; ?>" class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i></a>
                      <a href="ubah.php?id=<?= $row["id"]; ?>" class="btn btn-sm btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                      <a href="hapus.php?id=<?= $row["id"]; ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
                    </td>
                  </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
