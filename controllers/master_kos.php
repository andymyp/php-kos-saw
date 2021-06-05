<?php

if (isset($_POST['action'])) {
  session_start();
  require_once('../config/koneksi.php');

  if($_POST['action'] == 'select'){
    $response = array();

    $sql = "SELECT * FROM tb_kos ORDER BY tgl_input DESC";
    $query = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($query);

    if($num > 0){
      while ($row = mysqli_fetch_assoc($query)) {
        $btn_aksi = '
					<button type="button" class="btn btn-success btn-sm btn-detail" 
            data-toggle="tooltip" 
            data-title="Detail" 
            data-id="'.$row['kd_kos'].'"
            data-pemilik="'.$row['pemilik'].'"
            data-alamat="'.$row['alamat'].'"
            data-kategori="'.$row['kategori'].'"
            data-luaskamar="'.$row['luas_kamar'].'"
            data-harga="'.$row['harga'].'"
            data-jarak="'.$row['jarak'].'"
            data-fasilitas="'.$row['fasilitas'].'"
          >
            <i class="simple-icon-eye"></i>
          </button>
          <button type="button" class="btn btn-primary btn-sm btn-edit" 
            data-toggle="tooltip" 
            data-title="Edit" 
            data-id="'.$row['kd_kos'].'"
            data-pemilik="'.$row['pemilik'].'"
            data-alamat="'.$row['alamat'].'"
            data-kategori="'.$row['kategori'].'"
            data-luaskamar="'.$row['luas_kamar'].'"
            data-harga="'.$row['harga'].'"
            data-jarak="'.$row['jarak'].'"
            data-fasilitas="'.$row['fasilitas'].'"
          >
            <i class="simple-icon-pencil"></i>
          </button>
          <button type="button" class="btn btn-danger btn-sm btn-hapus" 
            data-toggle="tooltip" 
            data-title="Hapus" 
            data-id="'.$row['kd_kos'].'"
          >
            <i class="simple-icon-trash"></i>
          </button>
				';

        $response['data'][] = array(
					'',
					$row['pemilik'],
					$row['jarak'].' m',
					$row['kategori'],
					number_format($row['harga'], 0, '', '.'),
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
    $kd_kos = rand(000000,999999);
    $pemilik = $_POST['pemilik'];
    $kategori = $_POST['kategori'];
    $luas_kamar = $_POST['luas_kamar'];
    $jarak = $_POST['jarak'];
    $fasilitas = $_POST['fasilitas'];
    $alamat = $_POST['alamat'];
    $harga = $_POST['harga'];

    $id_biaya = 0;
    $id_jarak = 0;
    $id_fasilitas = 0;
    $id_luas_kamar = 0;

    $sql = "INSERT INTO tb_kos VALUES ($kd_kos, '$pemilik', '$kategori', '$luas_kamar', '$jarak', '$fasilitas', '$alamat', '$harga', NOW())";
    $query = mysqli_query($conn, $sql);

    if($query){
      $sub = mysqli_query($conn, "SELECT * FROM tb_subkriteria");

      while($sub_row = mysqli_fetch_assoc($sub)){
        if($sub_row['kd_kriteria'] == 'C1'){
          $minmax = explode(',', $sub_row['min_max']);
          $min = $minmax[0] == '0' ? 0 : $minmax[0];
          $max = $minmax[1] == '0' ? 999999999 : $minmax[1];

          if($harga >= intval($min) && $harga <= intval($max)){
            $id_biaya = $sub_row['id_sub'];
          }
        }

        if($sub_row['kd_kriteria'] == 'C2'){
          $minmax = explode(',', $sub_row['min_max']);
          $min = $minmax[0] == '0' ? 0 : $minmax[0];
          $max = $minmax[1] == '0' ? 999999999 : $minmax[1];

          if($jarak >= intval($min) && $jarak <= intval($max)){
            $id_jarak = $sub_row['id_sub'];
          }
        }

        if($sub_row['kd_kriteria'] == 'C3'){
          if($sub_row['subkriteria'] == $fasilitas){
            $id_fasilitas = $sub_row['id_sub'];
          }
        }

        if($sub_row['kd_kriteria'] == 'C4'){
          if($sub_row['subkriteria'] == $luas_kamar){
            $id_luas_kamar = $sub_row['id_sub'];
          }
        }
      }

      $sql1 = "INSERT INTO tb_nilai VALUES ('', '$kd_kos', '$id_biaya')";
      $query1 = mysqli_query($conn, $sql1);

      $sql2 = "INSERT INTO tb_nilai VALUES ('', '$kd_kos', '$id_jarak')";
      $query2 = mysqli_query($conn, $sql2);

      $sql3 = "INSERT INTO tb_nilai VALUES ('', '$kd_kos', '$id_fasilitas')";
      $query3 = mysqli_query($conn, $sql3);

      $sql4 = "INSERT INTO tb_nilai VALUES ('', '$kd_kos', '$id_luas_kamar')";
      $query4 = mysqli_query($conn, $sql4);

      if($query1 && $query2 && $query3 && $query4){
        $response = [
          'code'      => 'success',
          'message'   => 'Kos berhasil ditambahkan',
        ];
      } else {
        $response = [
          'code'      => 'danger',
          'message'   => $conn->error,
        ];
      }
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
    $pemilik = $_POST['pemilik'];
    $kategori = $_POST['kategori'];
    $luas_kamar = $_POST['luas_kamar'];
    $jarak = $_POST['jarak'];
    $fasilitas = $_POST['fasilitas'];
    $alamat = $_POST['alamat'];
    $harga = $_POST['harga'];

    $id_biaya = 0;
    $id_jarak = 0;
    $id_fasilitas = 0;
    $id_luas_kamar = 0;

    $sql = "UPDATE tb_kos SET pemilik='$pemilik', alamat='$alamat', harga='$harga', jarak='$jarak', fasilitas='$fasilitas', kategori='$kategori', luas_kamar='$luas_kamar' WHERE kd_kos='$id'";
    $query = mysqli_query($conn, $sql);

    if($query){
      $sub = mysqli_query($conn, "SELECT * FROM tb_subkriteria");

      while($sub_row = mysqli_fetch_assoc($sub)){
        if($sub_row['kd_kriteria'] == 'C1'){
          $minmax = explode(',', $sub_row['min_max']);
          $min = $minmax[0] == '0' ? 0 : $minmax[0];
          $max = $minmax[1] == '0' ? 999999999 : $minmax[1];

          if($harga >= intval($min) && $harga <= intval($max)){
            $id_biaya = $sub_row['id_sub'];
          }
        }

        if($sub_row['kd_kriteria'] == 'C2'){
          $minmax = explode(',', $sub_row['min_max']);
          $min = $minmax[0] == '0' ? 0 : $minmax[0];
          $max = $minmax[1] == '0' ? 999999999 : $minmax[1];

          if($jarak >= intval($min) && $jarak <= intval($max)){
            $id_jarak = $sub_row['id_sub'];
          }
        }

        if($sub_row['kd_kriteria'] == 'C3'){
          if($sub_row['subkriteria'] == $fasilitas){
            $id_fasilitas = $sub_row['id_sub'];
          }
        }

        if($sub_row['kd_kriteria'] == 'C4'){
          if($sub_row['subkriteria'] == $luas_kamar){
            $id_luas_kamar = $sub_row['id_sub'];
          }
        }
      }

      $no_nilai = 1;
      $nilai = mysqli_query($conn, "SELECT * FROM tb_nilai WHERE kd_kos='$id'");

      while($nilai_row = mysqli_fetch_assoc($nilai)){
        if($no_nilai == 1){
          $id_nilai = $nilai_row['id_nilai'];
          $sql1 = "UPDATE tb_nilai SET id_sub='$id_biaya' WHERE kd_kos='$id' AND id_nilai='$id_nilai'";
          $query1 = mysqli_query($conn, $sql1);
        }

        if($no_nilai == 2){
          $id_nilai = $nilai_row['id_nilai'];
          $sql2 = "UPDATE tb_nilai SET id_sub='$id_jarak' WHERE kd_kos='$id' AND id_nilai='$id_nilai'";
          $query2 = mysqli_query($conn, $sql2);
        }

        if($no_nilai == 3){
          $id_nilai = $nilai_row['id_nilai'];
          $sql3 = "UPDATE tb_nilai SET id_sub='$id_fasilitas' WHERE kd_kos='$id' AND id_nilai='$id_nilai'";
          $query3 = mysqli_query($conn, $sql3);
        }

        if($no_nilai == 4){
          $id_nilai = $nilai_row['id_nilai'];
          $sql4 = "UPDATE tb_nilai SET id_sub='$id_luas_kamar' WHERE kd_kos='$id' AND id_nilai='$id_nilai'";
          $query4 = mysqli_query($conn, $sql4);
        }
        
        $no_nilai++;
      }

      if($query1 && $query2 && $query3 && $query4){
        $response = [
          'code'      => 'success',
          'message'   => 'Kos berhasil diedit',
        ];
      } else {
        $response = [
          'code'      => 'danger',
          'message'   => $conn->error,
        ];
      }
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

    $sql = "DELETE FROM tb_kos WHERE kd_kos='$id'";
    $query = mysqli_query($conn, $sql);

    if($query){
      $response = [
        'code'      => 'success',
        'message'   => 'Kos berhasil dihapus',
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