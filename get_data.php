<?php
include 'koneksi.php';

$nama_mahasiswa = '%' . htmlspecialchars($_POST['nama_siswa']) . '%';

$i = 1;
$querysql = "SELECT * FROM tbl_siswa WHERE nama_siswa LIKE ?";
$prepare = $conn->prepare($querysql);
$prepare->bind_param("s", $nama_mahasiswa);
$prepare->execute();
$result = $prepare->get_result();
while ($row = $result->fetch_assoc()) {
    $data[$i]['id'] = $row['id'];
    $data[$i]['nama_siswa'] = $row['nama_siswa'];
    $data[$i]['alamat'] = $row['alamat'];
    $data[$i]['avatar'] = $row['avatar'];
    $i++;
}

$out = array_values($data);
echo json_encode($out);
