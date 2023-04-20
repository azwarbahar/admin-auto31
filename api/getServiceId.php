<?php
require_once '../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$id = $_GET["id"];
$query = "SELECT * FROM tb_service WHERE id = '$id'";

$result = mysqli_query($conn, $query);

//  $array = array();
while ($row = mysqli_fetch_assoc($result)) {
    $array = $row;
}

echo ($result) ?
    json_encode(array("kode" => "1", "result_service" => $array)) :
    json_encode(array("kode" => "0", "pesan" => "Data tidak ditemukan"));
