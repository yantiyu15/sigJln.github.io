<?php

// koneksi ke databas

$conn = mysqli_connect("localhost","root","","sig");

// if (! $conn) {
//     die("Koneksi database gagal: " . mysqli_connect_error());
// }


// Tampil Data

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// tampil data sesuai id
// function queryById($id){
//     global $conn;
//     // Escape the ID to prevent SQL injection
//     $id = mysqli_real_escape_string($conn, $id);
//     // Modify the query to select data based on the given ID
//     $query = "SELECT * FROM jalan WHERE id = '$id'";
//     $result = mysqli_query($conn, $query);
//     $rows = [];
//     while ($row = mysqli_fetch_assoc($result)) {
//         $rows[] = $row;
//     }
//     return $rows;
// }


// Tambah Data Admin
function tambah($data){
    global $conn;
    $nama =htmlspecialchars($data["nama"]) ;
    $latitude = htmlspecialchars($data["latitude"]);
    $longitude = htmlspecialchars($data["longitude"]);
    $volume = htmlspecialchars($data["volume"]);
    $kampung = htmlspecialchars($data["kampung"]);
    $sumber_dana = htmlspecialchars($data["sumber_dana"]);
    $kerusakan = htmlspecialchars($data["kerusakan"]);
    $penyebab = htmlspecialchars($data["penyebab"]);
    $kondisi_jalan = htmlspecialchars($data["kondisi_jalan"]);

    // upload gambar
    $foto = upload();
    if( !$foto){
        return false;
    }
    $query = "INSERT INTO jalan VALUES('','$nama','$latitude','$longitude', '$volume', '$kampung', '$sumber_dana', '$kerusakan', '$penyebab', '$kondisi_jalan', '$foto')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);

}
function tambahP($data){
    global $conn;
    $komentar =htmlspecialchars($data["komentar"]);
    $saran =htmlspecialchars($data["saran"]) ;
    $latitude = htmlspecialchars($data["latitude"]);
    $longitude = htmlspecialchars($data["longitude"]);
    $alamat = htmlspecialchars($data["alamat"]);
    
   

    // upload gambar
    $foto = upload();
    if( !$foto){
        return false;
    }
    $query = "INSERT INTO keluhan VALUES( '','$komentar', $saran ,'$latitude','$longitude', '$alamat','$foto')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}
function upload(){
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // cek apakah tidak ada foto yng di upload
    if ( $error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu');
            </script>";
            return false;
    }

    // cek tipe file yang di upload 
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'webp'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('file bukan gambar');
            </script>";
            return false;
    }

    // cek jika ukurannya terlalu besar
    if ( $ukuranFile > 1000000) {
        echo "<script>
                alert('ukuran file terlalu besar');
            </script>";
            return false;
    }
      // generate nama gambar baru
      $namaFileBaru = uniqid();
      $namaFileBaru .= '.';
      $namaFileBaru .= $ekstensiGambar;
    // upload foto
    move_uploaded_file($tmpName, '../img/' . $namaFileBaru);
    return $namaFileBaru;
}


// hapus Data Admin
function hapus($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM jalan WHERE id = $id");

    return mysqli_affected_rows($conn);
}

// ubah data admin
function ubah($data){
    global $conn;
    $id = $data["id"];
    $nama =htmlspecialchars($data["nama"]) ;
    $latitude = htmlspecialchars($data["latitude"]);
    $longitude = htmlspecialchars($data["longitude"]);
    $volume = htmlspecialchars($data["volume"]);
    $kampung = htmlspecialchars($data["kampung"]);
    $sumber_dana = htmlspecialchars($data["sumber_dana"]);
    $kerusakan = htmlspecialchars($data["kerusakan"]);
    $penyebab = htmlspecialchars($data["penyebab"]);
    $kondisi_jalan = htmlspecialchars($data["kondisi_jalan"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar lama atau baru
    if ($_FILES['foto']['error']  === 4) {
       $foto = $gambarLama;
    }else{
        $foto = upload();
    }
 
    
    
    $query = "UPDATE jalan SET nama='$nama', latitude='$latitude', longitude='$longitude', volume='$volume', kampung='$kampung', sumber_dana='$sumber_dana', kerusakan='$kerusakan', penyebab='$penyebab', kondisi_jalan='$kondisi_jalan', foto='$foto' WHERE id =$id ";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}

function cari($key){
    $query= "SELECT * FROM jalan WHERE nama LIKE '%$key%'OR latitude LIKE '%$key%' OR longitude LIKE '%$key%' OR volume LIKE '%$key%' OR kampung LIKE '%$key%'OR sumber_dana LIKE '%$key%' OR kerusakan LIKE '%$key%' OR  penyebab LIKE '%$key%' OR kondisi_jalan LIKE '%$key%'";
    return query($query);
}

function hapusP($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM keluhan WHERE id = $id");

    return mysqli_affected_rows($conn);
}


?>

 