<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location:login.php");
  exit;
};

require("Index2.php");

$mahasiswa = query("SELECT * FROM mahasiswa");
if(isset($_POST["cari"])){
  $mahasiswa = cari($_POST["key"]);
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
  <h1>Data Mahasiswa</h1>
  <a href="Tambah.php">Tambah Data Mahasiswa</a><br>
  
  <form action="" method="POST">
    <input type="search" name="key" placeholder="Masukkan Keyword.." autofocus autocomplete="off">
    <button type="submit" name="cari">cari</button>
  </form>
  
  <table border="1" cellpadding="5" cellspacing="0">
    <tr>
      <th>No</th>
      <th>aksi</th>
      <th>gambar</th>
      <th>nama</th>
      <th>nrp</th>
      <th>jurusan</th>
      <th>email</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach ($mahasiswa as $mhs): ?>
    <tr>
      <td><?= $i++ ?></td>
      <td>
        <a href="ubah.php?Id=<?= $mhs["Id"]?>">ubah</a>|
        <a href="hapus.php?Id=<?= $mhs["Id"];?>" onclick="return confirm('yakin');">hapus</a>
      </td>
      <td><img src="img/<?= $mhs["gambar"];?>" alt=""></td>
      <td><?= $mhs["nama"];?></td>
      <td><?= $mhs["nrp"];?></td>
      <td><?= $mhs["jurusan"]; ?></td>
      <td><?= $mhs["email"]; ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
<button><a href="logout.php">Logout</a></button>
</body>
</html>