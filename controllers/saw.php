<?php 

// VARIABLES
$biaya = explode(',', $_POST['biaya']);
$jarak = explode(',', $_POST['jarak']);
$fasilitas = $_POST['fasilitas'];
$luas_kamar = $_POST['luas_kamar'];

$biaya_min = $biaya[0] == '0' ? 0 : $biaya[0];
$biaya_max = $biaya[1] == '0' ? 999999999999 : $biaya[1];
$jarak_min = $jarak[0] == '0' ? 0 : $jarak[0];
$jarak_max = $jarak[1] == '0' ? 999999999999 : $jarak[1];

$K = 1;
$nilai_kos = array();
$hasil_normalisasi = 0;
$hasil_ranks = array();

// SAW
$kos = mysqli_query(
  $conn, 
  "SELECT * FROM tb_kos 
  WHERE (harga >= '$biaya_min' AND harga <= '$biaya_max')
  OR (jarak >= '$jarak_min' AND jarak <= '$jarak_max')
  OR fasilitas = '$fasilitas'
  OR luas_kamar = '$luas_kamar'
  ORDER BY tgl_input ASC"
);

while($kos_row = mysqli_fetch_assoc($kos)){
  $kd_kos = $kos_row['kd_kos'];
  $nilai = mysqli_query($conn, "SELECT a.*, b.nilai FROM tb_nilai a, tb_subkriteria b WHERE a.id_sub=b.id_sub AND a.kd_kos='$kd_kos' ORDER BY a.id_sub ASC");
  
  while($nilai_row = mysqli_fetch_assoc($nilai)){
    $id_sub = $nilai_row['id_sub'];
    $kri = mysqli_query($conn, "SELECT a.*, b.jenis, b.bobot FROM tb_subkriteria a, tb_kriteria b WHERE a.kd_kriteria=b.kd_kriteria AND a.id_sub='$id_sub' ORDER BY kd_kriteria ASC");

    while($kri_row = mysqli_fetch_assoc($kri)){
      if($kri_row['jenis'] == "Cost"){
        $min = mysqli_query($conn, "SELECT MIN(b.nilai) AS min FROM tb_nilai a, tb_subkriteria b WHERE a.id_sub=b.id_sub AND a.kd_kos='$kd_kos' AND a.id_sub='$id_sub'");

        while($min_row = mysqli_fetch_assoc($min)){
          $hasil = $min_row['min']/$nilai_row['nilai'];
          $hasil_kali = $hasil*$kri_row['bobot'];
          $hasil_normalisasi=$hasil_normalisasi+$hasil_kali;
        }
      }
      else if($kri_row['jenis'] == "Benefit"){
        $max = mysqli_query($conn, "SELECT MAX(b.nilai) AS max FROM tb_nilai a, tb_subkriteria b WHERE a.id_sub=b.id_sub AND a.kd_kos='$kd_kos' AND a.id_sub='$id_sub'");

        while($max_row = mysqli_fetch_assoc($max)){
          $hasil = $nilai_row['nilai']/$max_row['max'];
          $hasil_kali = $hasil*$kri_row['bobot'];
          $hasil_normalisasi=$hasil_normalisasi+$hasil_kali;
        }
      }
    }
  }

  $hasil_rank['nilai'] = $hasil_normalisasi;
  $hasil_rank['kd_kos'] = $kos_row['kd_kos'];
  $hasil_rank['pemilik'] = $kos_row['pemilik'];
  $hasil_rank['kategori'] = $kos_row['kategori'];
  $hasil_rank['luas_kamar'] = $kos_row['luas_kamar'];
  $hasil_rank['jarak'] = $kos_row['jarak'];
  $hasil_rank['fasilitas'] = $kos_row['fasilitas'];
  $hasil_rank['alamat'] = $kos_row['alamat'];
  $hasil_rank['harga'] = $kos_row['harga'];
  array_push($hasil_ranks, $hasil_rank);

  $K++;
}

?>