<?php

if (isset($_POST['action'])) {
  session_start();
  require_once('../config/koneksi.php');

  if($_POST['action'] == 'select'){
    $response = array();

    $sql = "SELECT * FROM tb_kriteria ORDER BY kd_kriteria ASC";
    $query = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($query);

    if($num > 0){
      while ($row = mysqli_fetch_assoc($query)) {
        $btn_aksi = '
					<button type="button" class="btn btn-primary btn-sm btn-edit" 
            data-toggle="tooltip" 
            data-title="Edit" 
            data-id="'.$row['kd_kriteria'].'" 
            data-bobot="'.$row['bobot'].'"
          >
            <i class="simple-icon-pencil"></i>
          </button>
				';

        $response['data'][] = array(
					'',
					$row['kd_kriteria'],
					$row['kriteria'],
					$row['jenis'],
					$row['bobot'],
					$btn_aksi
				);
      }
    } else {
      $response = array('data'=>'');
    }

    echo json_encode($response);
  }

  if($_POST['action'] == 'edit'){
    $response = array();
    $id = $_POST['id'];
    $bobot = $_POST['bobot'];

    $sql = "UPDATE tb_kriteria SET bobot='$bobot' WHERE kd_kriteria='$id'";
    $query = mysqli_query($conn, $sql);

    if($query){
      $response = [
        'code'      => 'success',
        'message'   => 'Kriteria berhasil diedit',
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