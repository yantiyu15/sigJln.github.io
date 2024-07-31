<?php
include '../conn.php';
// ambil data di url
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$jln = query("SELECT * FROM jalan WHERE id= $id")[0];
// cek apakah tombol submit sudah ditekan atau belum

if (isset($_POST["submit"])) {
    // cek apakah data berhasil atau tidak di ubah ke database
    if (ubah($_POST)) {
        echo "
        <script>
        alert('data berhasil diubah');
        document.location.href = 'jalan.php'
        </script>
        ";
    } else {
        echo "
        <script>
        alert('data gagal diubah');
        document.location.href = 'jalan.php'
        </script>
        ";
    }
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
            <a href="jalan.php" class="nav-link link-dark">
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
                    <h5>Ubah Data Jalan</h5>
                </div>
                <div class="col-lg-4 text-end">
                  <a href="jalan.php" class="text-decoration-none text-danger"><i class="bi bi-arrow-left"></i>Kembali</a>
                </div>
            </div>
          <div class="col-lg-10">
          <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id"  value="<?= $jln["id"]; ?>">
                <input type="hidden" name="gambarLama"  value="<?= $jln["foto"]; ?>">
                <div data-mdb-input-init class="form-outline ">
                    <label class="form-label" for="nama" >Nama Jalan</label>
                    <input type="text" id="nama" name="nama" class="form-control" value="<?= $jln["nama"]; ?>" required/>
                </div>
                <div data-mdb-input-init class="form-outline ">
                    <label class="form-label" for="latitude" >Latitude</label>
                    <input type="text" id="latitude" name="latitude" class="form-control" value="<?= $jln["latitude"]; ?>" required/>
                </div>
                <div data-mdb-input-init class="form-outline ">
                    <label class="form-label" for="longitude" >Longitude</label>
                    <input type="text" id="longitude" name="longitude" class="form-control" value="<?= $jln["longitude"]; ?>" required/>
                </div>
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="volume" >Volume</label>
                    <input type="text" id="volume" name="volume" class="form-control" value="<?= $jln["volume"]; ?>" required/>
                </div>
                <div data-mdb-input-init class="form-outline ">
                    <label class="form-label" for="kampung" >Lokasi</label>
                    <input type="text" id="kampung" value="<?= $jln["kampung"]; ?>" name="kampung" class="form-control" required/>
                </div>
                <div data-mdb-input-init class="form-outline ">
                    <label class="form-label" for="sumber_dana" >Sumber Dana</label>
                    <input type="text" id="sumber_dana" value="<?= $jln["sumber_dana"]; ?>" name="sumber_dana" class="form-control" required/>
                </div>
                <div data-mdb-input-init class="form-outline ">
                    <label class="form-label" for="kerusakan" >Kerusakan Jalan</label>
                    <input type="text" id="kerusakan" name="kerusakan" value="<?= $jln["kerusakan"]; ?>" class="form-control" required/>
                </div>
                <div data-mdb-input-init class="form-outline ">
                    <label class="form-label" for="penyebab" >Penyebab</label>
                    <input type="text" id="penyebab" value="<?= $jln["kerusakan"]; ?>"name="penyebab" class="form-control" required/>
                </div>
                <div data-mdb-input-init class="form-outline ">
                    <label class="form-label" for="kondisi" >Kondisi Jalan</label>
                    <input type="text" id="kondisi" name="kondisi_jalan" class="form-control"  value="<?= $jln["kondisi_jalan"]; ?>" required/>
                </div>
                <div data-mdb-input-init class="form-outline mb-5 ">
                    <label class="form-label" for="foto" >Foto</label><br>
                    <img src="../img/<?= $jln["foto"]; ?>" width="75"><br>
                    <input type="file" id="foto" name="foto" class="form-control" required/>
                </div>
                <div class="mb-2">
                    <button type="submit" name="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i></i>Ubah</button>
                </div>
                </form>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
</body>
</html>
