<?php
    include '../conn.php';
    // ambil data di url
    $id = $_GET["id"];

    // query data mahasiswa berdasarkan id
    $jln = query("SELECT * FROM keluhan WHERE id= $id")[0];
    // cek apakah tombol submit sudah ditekan atau belum

    if (isset($_POST["submit"])) {
        $id = $_POST["id"];
        $komentar = $_POST["komentar"];
        $saran = $_POST["saran"];
        $latitude = $_POST["latitude"];
        $longitude = $_POST["longitude"];
        $alamat = $_POST["alamat"];
        $gambarLama = $_POST["gambarLama"];
        if ($_FILES['foto']['error']  === 4) {
            $foto = $gambarLama;
        }else{
             $foto = upload();
        }
        $status = $_POST["status"];
    $stmt = $conn->prepare("UPDATE keluhan SET komentar=?, saran=?, latitude=?, longitude=?, alamat=?, foto=?, status=? WHERE id=?");
    $stmt->bind_param("sssssssi", $komentar, $saran, $latitude, $longitude, $alamat, $foto, $status, $id);
    if ($stmt->execute()) {
        echo "
        <script>
        alert('data berhasil disimpan');
        document.location.href = 'keluhan.php'
        </script>
        ";
    } else {
        echo "
        <script>
        alert('data gagal disimpan');
        document.location.href = 'keluhan.php'
        </script>
        ";
    }
    
    $stmt->close();
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
                    <h5>Proses Update Pengajuan</h5>
                </div>
                <div class="col-lg-4 text-end">
                  <a href="keluhan.php" class="text-decoration-none text-danger"><i class="bi bi-arrow-left"></i>Kembali</a>
                </div>
            </div>
          <div class="col-lg-10">
          <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id"  value="<?= $jln["id"]; ?>">
                <input type="hidden" name="gambarLama"  value="<?= $jln["foto"]; ?>">
                <div data-mdb-input-init class="form-outline ">
                    <label class="form-label" for="komentar" >komentar</label>
                    <input type="text" id="komentar" name="komentar" class="form-control" value="<?= $jln["komentar"]; ?>" required/>
                </div>
                <div data-mdb-input-init class="form-outline ">
                    <label class="form-label" for="saran" >saran</label>
                    <input type="text" id="saran" name="saran" value="<?= $jln["saran"]; ?>" class="form-control" required/>
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
                    <label class="form-label" for="alamat" >alamat</label>
                    <input type="text" id="alamat" name="alamat" class="form-control" value="<?= $jln["alamat"]; ?>" required/>
                </div>
                <div data-mdb-input-init class="form-outline ">
                    <label class="form-label" for="foto" >Foto</label><br>
                    <img src="../img/<?= $jln["foto"]; ?>" width="75"><br>
                    <input type="file" id="foto" name="foto" class="form-control" />
                </div>
                <div data-mdb-input-init class="form-outline ">
                    <label class="form-label" for="status" >Status</label>
                    <select class="form-select" name="status">
                    <option value="sedang diproses" <?= $jln['status'] == 'sedang diproses' ? 'selected' : '' ?>>Sedang Diproses</option>
                    <option value="sudah diproses" <?= $jln['status'] == 'sudah diproses' ? 'selected' : '' ?>>Sudah Diproses</option>
                    </select>
                </div>
                
                <div class="mt-3">
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
