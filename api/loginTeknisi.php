<?php
require_once '../koneksi.php';
header('Content-type: application/json');
$username = $_GET["username"];
$password = $_GET["password"];
$ray = array();
$query_user = "SELECT * FROM tb_teknisi WHERE username = '$username'";
$sql_user = mysqli_query($conn, $query_user);
$row_pass_user = mysqli_fetch_assoc($sql_user);
if ($row_pass_user) {
    if (password_verify($password, $row_pass_user["password"])) {
        $ray = $row_pass_user;

        echo json_encode(array("kode" => "1", "data" => $ray));
    } else {
        echo json_encode(array("kode" => "2", "pesan" => "Password tidak sesuai"));
    }
} else {
    echo json_encode(array("kode" => "0", "pesan" => "Username Tidak Terdaftar"));
}
