<?php
require_once '../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$pelanggan_id = $_GET["pelanggan_id"];
$query = "SELECT * FROM tb_service WHERE pelanggan_id = '$pelanggan_id' AND (status_service = 'New' OR status_service = 'Process') ORDER BY id   DESC LIMIT 1";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $array = $row;
}

echo ($result) ?
    json_encode(array("kode" => "1", "result_service" => $array)) :
    json_encode(array("kode" => "0", "pesan" => "Data tidak ditemukan"));
