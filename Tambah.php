<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location:login.php");
  exit;
};


require("Index2.php");
if(isset($_POST["submit"])){
  if(tambah($_POST) > 0){
    echo "<script>
            alert('Data Berhasil Ditambahkan !');
            document.location.href = 'Index1.php';
          </script>";
    
  }else{
    echo "<script>
            alert('Data Gagal Ditambahkan !');
            document.location.href ='Index1.php';
          </script>";
  };
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>Tambah Mahasiswa</h1>
  <form action="" method="POST" enctype="multipart/form-data">
  <ul>
      <li>
        <label for="nama">Masukkan nama:</label><input type="text" id="nama" name="nama" autofocus required>
      </li>
      <li>
        <label for="nrp">Masukkan nrp:</label><input type="number" id="nrp" name="nrp" required>
      </li>
      <li>
        <label for="jurusan">Masukkan jurusan:</label><input type="text" id="jurusan" name="jurusan" required>
      </li>
      <li>
        <label for="email">Masukkan email:</label><input type="email" id="email" name="email" required>
      </li>
      <li>
        <label for="gambar">Masukkan gambar:</label><input type="file" accept="image/*" id="gambar" name="gambar">
      </li>
      <li>
       <button type="submit" name="submit">submit</button>
      </li>
    </ul>
  </form>
</body>
</html>