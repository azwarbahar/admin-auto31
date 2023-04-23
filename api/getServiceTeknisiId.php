<?php
require_once '../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$teknisi_id = $_GET["teknisi_id"];
$query = "SELECT * FROM tb_service WHERE teknisi_id = '$teknisi_id' ORDER BY id DESC";
$result = mysqli_query($conn, $query);

$array = array();
while ($row = mysqli_fetch_assoc($result)) {
    $array[] = $row;
}

echo ($result) ?
    json_encode(array("kode" => "1", "service_data" => $array)) :
    json_encode(array("kode" => "0", "pesan" => "Data tidak ditemukan"));
