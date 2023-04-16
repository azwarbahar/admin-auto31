<?php
require_once '../koneksi.php';
header('Content-type: application/json');
// error_reporting(E_ERROR | E_PARSE);

$petani_id = $_GET["petani_id"];
$query = "SELECT * FROM tb_inspeksi WHERE petani_id = '$petani_id' ORDER BY id ASC";
$result = mysqli_query($conn, $query);

$array = array();
while ($row = mysqli_fetch_assoc($result)) {
    $array[] = $row;
}

echo ($result) ?
    json_encode(array("kode" => "1", "inspeksi_data" => $array)) :
    json_encode(array("kode" => "0", "pesan" => "Data tidak ditemukan"));
