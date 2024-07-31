<?php
session_start();
include 'conn.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SITIJA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
        if( isset($_POST["username"])){
            $nama = $_POST["nama"];
            $username = $_POST["username"];
            $password = md5($_POST["password"]);
           


            $query =mysqli_query($conn,  "INSERT INTO login(nama,username,password) VALUES('$nama','$username','$password')");
            if($query){
                echo "<script>
                    alert('selamat pendaftaran anda berhasil');
                    location.href='index.php';
                </script>";
            }else{
                echo "<script>
                    alert('pendaftaran anda berhasil gagal');
                </script>";
            }
        }

    ?>
<div class="row justify-content-center">
        <div class="col-md-5">
        <main class="form-signin w-100 m-auto">
          <div class="mt-3 text-center">  
          <img src="img/logo-cianjur-kabupaten.png" alt="" style="width: 80px">
           <h1 class="h3 mb-3 fw-bold">SISTEM INFORMASI OPTIMASI JALAN MELALUI SISTEM INFORMASI GEOGRAFIS BERBASIS WEB</h1>
           <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Masuk</h3>
          </div>
   
        <form method="post">
      
            <div class="form-floating">
            <input type="nama" class="form-control" id="nama" name="nama" placeholder="nama" autofocus required >
            <label for="name">Nama</label>
                <div class="invalid-feedback">
                </div>
            </div>
            <div class="form-floating">
            <input type="username" class="form-control" id="username" name="username" placeholder="name" autofocus required >
            <label for="username">Username</label>
                <div class="invalid-feedback">
                </div>
            </div>

            <div class="form-floating">
            <input type="password" class="form-control" id="password"   placeholder="Password" name="password" minlength="8" required>
            <label for="password">Password</label>
            </div>
            <div class="pt-1">
              <button class="btn btn-primary btn-block w-100 text-light shadow" type="submit">Registrasi</button>
            </div>
        </form>
        <small class="d-block text-center mt-3">Not Registered? <a href="index.php">Login</a></small>
      </main>
    </div>
</div>
</div>

    
</body>
</html>