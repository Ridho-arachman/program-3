<?php
session_start();
require('Index2.php');


if(isset($_SESSION["login"])) {
  header("Location:Index1.php");
  exit;
};


if(isset($_POST["submit"])){
  $username = $_POST["username"];
  $password = $_POST["password"];
  $result = mysqli_query($db,"SELECT * FROM user WHERE username = '$username'
  ");
  
  if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
    
    
    if(password_verify($password,$row["password"])){
      $_SESSION["login"] = true;
      header("Location:Index1.php");
      exit;
    };
  };
  $error = true;
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
    .h{
      color: crimson;
    }
  </style>
</head>
<body>
  <h1>Login</h1>
  <a href="register.php">sign up</a>
  <?php if(isset($error)) : ?>
  <p class="h"><em>username / password salah</em></p>
  <?php endif; ?>
  <form action="" method="post">
    <ul>
      <li>
        <label for="username">username :</label><br>
        <input type="text" name="username" id="username" autofocus autocomplete="off">
      </li>
      <li>
        <label for="password">password :</label><br>
        <input type="password" name="password" id="password"  autocomplete="off">
      </li>
      <li>
        <button type="submit" name="submit">submit</button>
      </li>
    </ul>
  </form>
</body>
</html>