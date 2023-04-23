<?php
require_once '../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$id = $_GET["id"];
$password_lama = $_GET["password_lama"];
$password_baru = $_GET["password_baru"];

$getSales = mysqli_query($conn, "SELECT * FROM tb_teknisi WHERE id = '$id'");
$data = mysqli_fetch_assoc($getSales);

if (password_verify($password_lama, $data["password"])) {
    $password = password_hash($password_baru, PASSWORD_DEFAULT);
    $query =  mysqli_query($conn, "UPDATE tb_teknisi SET password = '$password' WHERE id = '$id'");
    if ($query) {
        echo json_encode(array("kode" => "1", "pesan" => "Berhasil Mengubah Password"));
    } else {
        echo json_encode(array("kode" => "2", "pesan" => "Terjadi Kesalahan Saat Mengubah Password"));
    }
} else {
    echo json_encode(array("kode" => "0", "pesan" => "Password lama tidak sesuai"));
}
