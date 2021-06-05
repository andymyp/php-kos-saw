<?php

if (isset($_POST['action'])) {
  session_start();
  require_once('../config/koneksi.php');

  if($_POST['action'] == 'select'){
    $response = array();

    $sql = "SELECT * FROM tb_admin ORDER BY id_admin DESC";
    $query = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($query);

    if($num > 0){
      while ($row = mysqli_fetch_assoc($query)) {
        $btn_aksi = '
					<button type="button" class="btn btn-primary btn-sm btn-edit" 
            data-toggle="tooltip" 
            data-title="Edit" 
            data-id="'.$row['id_admin'].'"
            data-nama="'.$row['nama'].'"
            data-username="'.$row['username'].'"
            data-password="'.$row['password'].'"
          >
            <i class="simple-icon-pencil"></i>
          </button>
          <button type="button" class="btn btn-danger btn-sm btn-hapus" 
            data-toggle="tooltip" 
            data-title="Hapus" 
            data-id="'.$row['id_admin'].'"
          >
            <i class="simple-icon-trash"></i>
          </button>
				';

        $response['data'][] = array(
					'',
					$row['nama'],
					$row['username'],
					$btn_aksi
				);
      }
    } else {
      $response = array('data'=>'');
    }

    echo json_encode($response);
  }

  if($_POST['action'] == 'tambah'){
    $response = array();
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username='$username'");
    $num_cek = mysqli_num_rows($cek);

    if($num_cek > 0){
      $response = [
        'code'      => 'warning',
        'message'   => 'Username sudah digunakan',
      ];
    } else {
      $sql = "INSERT INTO tb_admin VALUES ('', '$nama', '$username', '$password')";
      $query = mysqli_query($conn, $sql);

      if($query){
        $response = [
          'code'      => 'success',
          'message'   => 'Admin berhasil ditambahkan',
        ];
      } else {
        $response = [
          'code'      => 'danger',
          'message'   => $conn->error,
        ];
      }
    }

    echo json_encode($response);
  }

  if($_POST['action'] == 'edit'){
    $response = array();
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username='$username'");
    $num_cek = mysqli_num_rows($cek);

    if($num_cek > 0){
      $response = [
        'code'      => 'warning',
        'message'   => 'Username sudah digunakan',
      ];
    } else {
      $sql = "UPDATE tb_admin SET nama='$nama', username='$username', password='$password' WHERE id_admin='$id'";
      $query = mysqli_query($conn, $sql);

      if($query){
        $response = [
          'code'      => 'success',
          'message'   => 'Admin berhasil diedit',
        ];
      } else {
        $response = [
          'code'      => 'danger',
          'message'   => $conn->error,
        ];
      }
    }

    echo json_encode($response);
  }

  if($_POST['action'] == 'hapus'){
    $response = array();
    $id = $_POST['id'];

    $sql = "DELETE FROM tb_admin WHERE id_admin='$id'";
    $query = mysqli_query($conn, $sql);

    if($query){
      $response = [
        'code'      => 'success',
        'message'   => 'Admin berhasil dihapus',
      ];
    } else {
      $response = [
        'code'      => 'danger',
        'message'   => $conn->error,
      ];
    }

    echo json_encode($response);
  }
}

?>