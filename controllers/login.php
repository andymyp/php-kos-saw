<?php

if (isset($_POST['action'])) {
  session_start();
  require_once('../config/koneksi.php');

  if($_POST['action'] == 'login'){
    $response = array();
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tb_admin WHERE username='$username'";
    $query = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($query);

    if($num > 0){
      $row = mysqli_fetch_assoc($query);

      if($row['password'] == $password){
        $_SESSION['spk_login'] = true;
        $_SESSION['id_admin'] = $row['id_admin'];
        $_SESSION['nama'] = $row['nama'];

        $response = [
          'code'      => 'success',
          'message'   => 'Berhasil login',
        ];
      } else {
        $response = [
          'code'      => 'danger',
          'message'   => 'Password salah',
        ];
      }
    } else {
      $response = [
        'code'      => 'danger',
        'message'   => 'Username tidak terdaftar',
      ];
    }

    echo json_encode($response);
  }

  if($_POST['action'] == 'logout'){
    $response = array();

    unset($_SESSION['spk_login']);
    unset($_SESSION['id_admin']);
    unset($_SESSION['nama']);

    if(!isset($_SESSION['spk_login'])){
      $response = [
        'code'      => 'success',
        'message'   => 'Berhasil logout',
      ];
    } else {
      $response = [
        'code'      => 'danger',
        'message'   => 'Gagal logout',
      ];
    }

    echo json_encode($response);
  }
}

?>