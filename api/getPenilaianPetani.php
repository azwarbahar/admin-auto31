<?php
require_once '../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$petani_id = $_GET['petani_id'];

$query = "SELECT * FROM tb_inspeksi WHERE petani_id = '$petani_id' ORDER BY id  DESC LIMIT 1";
$result = mysqli_query($conn, $query);
$data_inspeksi = mysqli_fetch_assoc($result);
if (mysqli_num_rows($result) > 0) {
    $a1 = perhitunganSelisiGAP($data_inspeksi['a1'] - 2);
    $a2 = perhitunganSelisiGAP($data_inspeksi['a2'] - 3);
    $a3 = perhitunganSelisiGAP($data_inspeksi['a3'] - 4);
    $a4 = perhitunganSelisiGAP($data_inspeksi['a4'] - 4);
    $a5 = perhitunganSelisiGAP($data_inspeksi['a5'] - 3);
    $a6 = perhitunganSelisiGAP($data_inspeksi['a6'] - 3);
    $a7 = perhitunganSelisiGAP($data_inspeksi['a7'] - 3);
    $a8 = perhitunganSelisiGAP($data_inspeksi['a8'] - 4);
    $a9 = perhitunganSelisiGAP($data_inspeksi['a9'] - 2);
    // TD factor Core
    $jumlah_core = $a3 + $a4 + $a6 + $a7 + $a8;
    $hasil_core = $jumlah_core / 5;

    // TD factor Secondary
    $jumlah_secondary = $a1 + $a2 + $a5 + $a9;
    $hasil_secondary = $jumlah_secondary / 4;

    // TD Total
    $total = (0.6 * $hasil_core) + (0.4 * $hasil_secondary);
    $respon["kode"] = "1";
    $respon["pesan"] = "Success";
    $respon["nilai"] = "$total";
    echo json_encode($respon);
    mysqli_close($conn);
} else {
    $respon["kode"] = "2";
    $respon["pesan"] = "gagal";
    echo json_encode($respon);
    mysqli_close($conn);
}
