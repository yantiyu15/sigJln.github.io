<?php 
session_start();
include 'conn.php';
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
      echo "
      <script>
      alert('Username atau Password Salah');
      document.location.href = 'index.php'
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
</head>
<body>
<div class="row justify-content-center">
        <div class="col-md-5">
        <main class="form-signin w-100 m-auto">
          <div class="mt-3 text-center">  
          <img src="img/logo-cianjur-kabupaten.png" alt="" style="width: 80px">
           <h1 class="h3 mb-3 fw-bold">SISTEM INFORMASI OPTIMASI JALAN MELALUI SISTEM INFORMASI GEOGRAFIS BERBASIS WEB</h1>
           <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Masuk</h3>
          </div>
   
        <form action="cekLogin.php" method="post">
      
            <div class="form-floating">
            <input type="username" class="form-control" id="username" name="username" placeholder="name" autofocus required >
            <label for="username">Username</label>
                <div class="invalid-feedback">
                </div>
            </div>

            <div class="form-floating">
            <input type="password" class="form-control" id="password"   placeholder="Password" name="password" required>
            <label for="password"  minlength="8">Password</label>
            </div>
            <div class="pt-1">
              <button class="btn btn-primary btn-block w-100 text-light shadow" type="submit">Masuk</button>
            </div>
        </form>
        <small class="d-block text-center mt-3">Not Registered? <a href="registrasi.php">Register Now</a></small>
      </main>
    </div>
</div>
</div>

    
</body>
</html>