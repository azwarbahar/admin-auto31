<?php
require_once '../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$petugas_id = $_GET["petugas_id"];
$role = $_GET["role"];
if ($role == "Petugas") {
    $query = "SELECT * FROM tb_petani WHERE petugas_id = '$petugas_id' AND status = 'Suspended' ";
    $result = mysqli_query($conn, $query);
} else {
    $query = "SELECT * FROM tb_petani WHERE status = 'Suspended' ";
    $result = mysqli_query($conn, $query);
}

$array = array();
while ($row = mysqli_fetch_assoc($result)) {
    $array[] = $row;
}

echo ($result) ?
    json_encode(array("kode" => "1", "petani_data" => $array)) :
    json_encode(array("kode" => "0", "pesan" => "Data tidak ditemukan"));
