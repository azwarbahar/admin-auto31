<?php
require_once '../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$role = $_GET["role"];
$petugas_id = $_GET["petugas_id"];
if ($role == "Koordinator") {
    $query_sudah_sensus = "SELECT * FROM tb_petani WHERE tanggal_sensus IS NOT NULL ";
    $result_sudah_sensus = mysqli_query($conn, $query_sudah_sensus);
    $jumlah_sudah_sensus = mysqli_num_rows($result_sudah_sensus);

    $query_belum_sensus = "SELECT * FROM tb_petani WHERE tanggal_sensus IS NULL ";
    $result_belum_sensus = mysqli_query($conn, $query_belum_sensus);
    $jumlah_belum_sensus = mysqli_num_rows($result_belum_sensus);

    $query_suspended = "SELECT * FROM tb_petani WHERE status = 'Suspended' ";
    $result_suspended = mysqli_query($conn, $query_suspended);
    $jumlah_suspended = mysqli_num_rows($result_suspended);

    $result["kode"] = "1";
    $result["pesan"] = "Success";
    $result["sudah_sensus"] = "$jumlah_sudah_sensus";
    $result["belum_sensus"] = "$jumlah_belum_sensus";
    $result["suspended"] = "$jumlah_suspended";
    echo json_encode($result);
    mysqli_close($conn);
} else {
    $query_sudah_sensus = "SELECT * FROM tb_petani WHERE petugas_id = '$petugas_id' AND tanggal_sensus IS NOT NULL ";
    $result_sudah_sensus = mysqli_query($conn, $query_sudah_sensus);
    $jumlah_sudah_sensus = mysqli_num_rows($result_sudah_sensus);

    $query_belum_sensus = "SELECT * FROM tb_petani WHERE petugas_id = '$petugas_id' AND tanggal_sensus IS NULL ";
    $result_belum_sensus = mysqli_query($conn, $query_belum_sensus);
    $jumlah_belum_sensus = mysqli_num_rows($result_belum_sensus);

    $query_suspended = "SELECT * FROM tb_petani WHERE petugas_id = '$petugas_id' AND status = 'Suspended' ";
    $result_suspended = mysqli_query($conn, $query_suspended);
    $jumlah_suspended = mysqli_num_rows($result_suspended);

    $result["kode"] = "1";
    $result["pesan"] = "Success";
    $result["sudah_sensus"] = "$jumlah_sudah_sensus";
    $result["belum_sensus"] = "$jumlah_belum_sensus";
    $result["suspended"] = "$jumlah_suspended";
    echo json_encode($result);
    mysqli_close($conn);
}

// $result = mysqli_query($conn, $query);

// //  $array = array();
// while ($row = mysqli_fetch_assoc($result)) {
//     $array = $row;
// }

// echo ($result) ?
//     json_encode(array("kode" => "1", "result_petani" => $array)) :
//     json_encode(array("kode" => "0", "pesan" => "Data tidak ditemukan"));
