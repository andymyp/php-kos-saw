<?php

if (isset($_POST['action'])) {
  session_start();
  require_once('../config/koneksi.php');

  if($_POST['action'] == 'select'){
    $response = array();

    $sql = "SELECT a.*, b.kriteria FROM tb_subkriteria a, tb_kriteria b WHERE a.kd_kriteria=b.kd_kriteria ORDER BY id_sub DESC";
    $query = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($query);

    if($num > 0){
      while ($row = mysqli_fetch_assoc($query)) {
        $minmax = explode(',', $row['min_max']);
        $min = $minmax[0];
        $max = $minmax[1];

        $btn_aksi = '
					<button type="button" class="btn btn-primary btn-sm btn-edit" 
            data-toggle="tooltip" 
            data-title="Edit" 
            data-id="'.$row['id_sub'].'"
            data-kriteria="'.$row['kd_kriteria'].'"
            data-subkriteria="'.$row['subkriteria'].'"
            data-min="'.$min.'"
            data-max="'.$max.'"
            data-nilai="'.$row['nilai'].'"
          >
            <i class="simple-icon-pencil"></i>
          </button>
          <button type="button" class="btn btn-danger btn-sm btn-hapus" 
            data-toggle="tooltip" 
            data-title="Hapus" 
            data-id="'.$row['id_sub'].'"
          >
            <i class="simple-icon-trash"></i>
          </button>
				';

        $response['data'][] = array(
					'',
					$row['kriteria'],
					$row['subkriteria'],
					$row['nilai'],
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
    $kd_kriteria = $_POST['kd_kriteria'];
    $subkriteria = $_POST['subkriteria'];
    $min = $_POST['min'];
    $max = $_POST['max'];
    $nilai = $_POST['nilai'];

    $sql = "INSERT INTO tb_subkriteria VALUES ('', '$kd_kriteria', '$subkriteria', '$min,$max', '$nilai')";
    $query = mysqli_query($conn, $sql);

    if($query){
      $response = [
        'code'      => 'success',
        'message'   => 'Sub-kriteria berhasil ditambahkan',
      ];
    } else {
      $response = [
        'code'      => 'danger',
        'message'   => $conn->error,
      ];
    }

    echo json_encode($response);
  }

  if($_POST['action'] == 'edit'){
    $response = array();
    $id = $_POST['id'];
    $kd_kriteria = $_POST['kd_kriteria'];
    $subkriteria = $_POST['subkriteria'];
    $min = $_POST['min'];
    $max = $_POST['max'];
    $nilai = $_POST['nilai'];

    $sql = "UPDATE tb_subkriteria SET kd_kriteria='$kd_kriteria',  subkriteria='$subkriteria', min_max='$min,$max',  nilai='$nilai' WHERE id_sub='$id'";
    $query = mysqli_query($conn, $sql);

    if($query){
      $response = [
        'code'      => 'success',
        'message'   => 'Sub-kriteria berhasil diedit',
      ];
    } else {
      $response = [
        'code'      => 'danger',
        'message'   => $conn->error,
      ];
    }

    echo json_encode($response);
  }

  if($_POST['action'] == 'hapus'){
    $response = array();
    $id = $_POST['id'];

    $sql = "DELETE FROM tb_subkriteria WHERE id_sub='$id'";
    $query = mysqli_query($conn, $sql);

    if($query){
      $response = [
        'code'      => 'success',
        'message'   => 'Sub-kriteria berhasil dihapus',
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