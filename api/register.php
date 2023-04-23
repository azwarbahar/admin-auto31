<?php
require_once '../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$nama = $_POST['nama'];
$kontak = $_POST['kontak'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_fix = password_hash($password, PASSWORD_DEFAULT);
$foto = "photo_default.png";
$status = "Active";


$query = "INSERT INTO `tb_pelanggan` (`nama`, `kontak`, `email`, `password`,
                                    `foto`, `status`, `created_at`, `updated_at`)
                VALUES ('$nama', '$kontak', '$email', '$password_fix',
                        '$foto', '$status', NULL, NULL);";

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
