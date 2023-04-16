<?php
require_once '../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$petani_id = $_GET["petani_id"];
$query = "SELECT * FROM tb_sensus WHERE petani_id = '$petani_id' ORDER BY id ASC";

//  $array = array();
if (mysqli_query($conn, $query)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $array = $row;
    }
    if ($array != null) {
        echo json_encode(array("kode" => "1", "result_sensus" => $array));
    } else {
        echo json_encode(array("kode" => "2", "pesan" => "Data tidak ditemukan"));
    }
} else {
    echo json_encode(array("kode" => "0", "pesan" => mysqli_error($conn)));
}
