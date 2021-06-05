<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "spk_kos";

$conn = mysqli_connect($host, $user, $pass, $db);

if(mysqli_connect_error()){
  echo "<script>alert('Koneksi database error!')</script>";
  die();
}

?>