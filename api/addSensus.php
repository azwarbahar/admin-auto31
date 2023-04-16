<?php
require_once '../../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$petani_id = $_POST['petani_id'];
$petugas_id = $_POST['petugas_id'];
$tanggal = $_POST['tanggal'];

$query = "INSERT INTO `tb_sensus` (`nama_organisasi`, `jabatan`,
                        `tanggal_mulai`, `tanggal_berakhir`, `status_organisasi_user`,
                        `kedudukan_organisasi`, `organisasi_id`, `deskripsi`, `user_id`,
                        `created_at`, `updated_at`)
                VALUES ('$nama_organisasi', '$jabatan', '$tanggal_mulai', '$tanggal_berakhir',
                        '$status_organisasi_user', '$kedudukan_organisasi', '$organisasi_id',
                        '$deskripsi', '$user_id', NULL, NULL);";

if (mysqli_query($conn, $query)) {
    $result["kode"] = "1";
    $result["pesan"] = "Success";
    echo json_encode($result);
    mysqli_close($conn);
} else {
    $response["kode"] = "0";
    $response["pesan"] = "Error! " . mysqli_error($conn);
    echo json_encode($response);
    mysqli_close($conn);
}
