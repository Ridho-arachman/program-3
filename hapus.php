<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location:login.php");
  exit;
};


require("Index2.php");
$id = $_GET["Id"];
if(hapus($id) > 0){
  echo "<script>
            alert('Data Berhasil Hapus !');
            document.location.href = 'Index1.php';
          </script>";
  }else{
    echo "<script>
            alert('Data Gagal Hapus !');
            document.location.href ='Index1.php';
          </script>";
};
?>