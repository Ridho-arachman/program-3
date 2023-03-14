<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location:login.php");
  exit;
};



require("Index2.php");
$id = $_GET["Id"];
$mhs = query("SELECT * FROM mahasiswa WHERE id=$id")[0];
if(isset($_POST["submit"])){
  if(ubah($_POST) > 0){
    echo "<script>
            alert('Data Berhasil Diubah !');
            document.location.href = 'Index1.php';
          </script>";
    
  }else{
    echo "<script>
            alert('Data Gagal Diubah !');
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
  <style>
    img{
      width: 100px;
      height: 100px;
    }
  </style>
</head>
<body>
  <h1>Tambah Mahasiswa</h1>
  <form action="" method="POST" enctype="multipart/form-data">
  <ul>
        <input type="hidden" name="id" value="<?=$mhs["Id"];?>">
        <input type="hidden" name="gambarlama" value="<?= $mhs["gambar"]; ?>">
      <li>
        <label for="nama">Masukkan nama:</label>
        <input type="text" id="nama" name="nama" required value="<?=$mhs["nama"];?>" autofocus>
      </li>
      <li>
        <label for="nrp">Masukkan nrp:</label><input type="number" id="nrp" name="nrp" required value="<?= $mhs["nrp"]; ?>">
      </li>
      <li>
        <label for="jurusan">Masukkan jurusan:</label><input type="text" id="jurusan" name="jurusan" required value="<?= $mhs["jurusan"];?>">
      </li>
      <li>
        <label for="email">Masukkan email:</label><input type="email" id="email" name="email" required value="<?= $mhs["email"];?>">
      </li>
      <li>
        <label for="nama">Masukkan gambar:</label><br>
        <img src="img/<?= $mhs["gambar"]?>" alt=""><br>
        <input type="file" id="nama" name="gambar" accept="images/*">
      </li>
      <li>
       <button type="submit" name="submit">submit</button>
      </li>
    </ul>
  </form>
</body>
</html>