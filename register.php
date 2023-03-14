<?php
session_start();




require("Index2.php");
if(isset($_POST["submit"])){
  if(regist($_POST) > 0){
    echo "<script>
            alert('Data Berhasil Ditambahkan!');
            document.location.href = 'Index1.php';
          </script>";
  }else{
    echo mysqli_error($db);
  }
}
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
  <h1>Selamat Datang Di Menu Registrasi</h1>
  <form action="" method="POST">
    <ul>
      <li>
      <label for="username">username :</label><br>
      <input type="text" autofocus autocomplete="off" id="username" name="username">
      </li>
      <li>
      <label for="password">password :</label><br>
      <input type="password" id="password" name="password">
      </li>
      <li>
      <label for="password2">konfirmsi password :</label><br>
      <input type="password" id="password2" name="password2">
      </li>
      <li>
        <button type="submit" name="submit">Submit</button>
      </li>
    </ul>
  </form>
</body>
</html>