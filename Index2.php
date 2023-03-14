<?php
$db = mysqli_connect("localhost","root","","phpdasar");




function query($query){
  global $db;
  $result = mysqli_query($db,$query);
  $rows = [];
  while( $row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  };
  return $rows;
};



function uploud(){
  $name_file = $_FILES["gambar"]["name"];
  $type_file = $_FILES["gambar"]["type"];
  $ukuranfile = $_FILES["gambar"]["size"];
  $error = $_FILES["gambar"]["error"];
  $tmp_name = $_FILES["gambar"]["tmp_name"];
  
  if($error === 4){
    echo "<script>
          alert('Masukkan Gambar terlebib dahulu!');
          </script>";
    return false;
  };
  
  //$ekstensiGambarValid = ['jpg','jpeg','png'];
  $ekstensiGambar = explode('/',$type_file);
  $ekstensiGambar = end($ekstensiGambar);
  /*if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
    echo "<script>
          alert('File Yang Anda Masukkan Bukan Gambar !');
          </script>";
    return false;
  };*/
  
  if($ukuranfile > 1500000){
    echo "<script>
          alert('File Gambar Yang Anda Masukkan Terlalu Besar');
          </script>";
    return false;
  }
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.'.$ekstensiGambar;
  move_uploaded_file($tmp_name,"img/".$namaFileBaru);
  return $namaFileBaru;
};



function tambah($data){
  global $db;
  $nama = htmlspecialchars($data["nama"]); 
  $nrp = htmlspecialchars($data["nrp"]);
  $jurusan = htmlspecialchars($data["jurusan"]) ;
  $email = htmlspecialchars($data["email"]);
  
  $gambar = uploud();
  if(!$gambar){
    return false;
  };
  
  $query = "INSERT INTO mahasiswa
            VALUES
            (null,'$nama','$nrp',
            '$jurusan','$email','$gambarc
            )
            ";

  mysqli_query($db,$query);
  mysqli_error($db);
  return mysqli_affected_rows($db);
};





function hapus($id){
  global $db;
  mysqli_query($db,"DELETE FROM mahasiswa WHERE mahasiswa.Id = $id") or die(mysqli_error($db));
  return mysqli_affected_rows($db);
};




function ubah($data){
  global $db;
  $id = $data["id"];
  $nama = htmlspecialchars($data["nama"]);
  $nrp = htmlspecialchars($data["nrp"]);
  $jurusan = htmlspecialchars($data["jurusan"]) ;
  $email = htmlspecialchars($data["email"]);
  $gambarlama = htmlspecialchars($data["gambarlama"]);
  
  if($_FILES["gambar"]["error"] === 4){
    $gambar = $gambarlama;
  }else{
    $gambar = uploud();
  };
  
  $query = "UPDATE mahasiswa SET
            nama = '$nama', 
            nrp = '$nrp', 
            jurusan = '$jurusan', 
            email = '$email', 
            gambar = '$gambar'
            WHERE Id = $id
            ";
 mysqli_query($db,$query);
 return mysqli_affected_rows($db);
};




function cari($key){
  $query = "SELECT * FROM mahasiswa
            WHERE 
            nama LIKE '%$key%' OR 
            nrp LIKE '%$key%' OR
            jurusan LIKE '%$key%' OR 
            email LIKE '%$key%'
            ";
 
 return query($query);
};



function regist($data){
  global $db;
  $username = strtolower(stripcslashes($data["username"]));
  $password = mysqli_real_escape_string($db,$data["password"]);
  $password2 = mysqli_real_escape_string($db,$data["password2"]);
  
  $result = mysqli_query($db,"SELECT 
            username FROM user WHERE 
            username = '$username'
            ");

  if(mysqli_fetch_assoc($result)){
       echo "<script>
            alert('username Sudah Terdaftar  !');
            </script>
            ";
       return false;
  };
  
  if( $password !== $password2){
    echo "<script>
            alert('Pastikan KonFirmasi Password Benar  !');
          </script>";
    return false;
  };
  
  $password = password_hash($password,PASSWORD_DEFAULT);
  
  mysqli_query($db,"INSERT INTO user 
                VALUES
                (null,'$username'
                ,'$password')
                ");
  return mysqli_affected_rows($db);
};
?>