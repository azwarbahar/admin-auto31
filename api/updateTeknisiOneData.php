<?php
require_once '../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$id = $_POST['id'];
$key = $_POST['key'];
$value = $_POST['value'];

$query = "UPDATE tb_teknisi SET $key = '$value',
                                updated_at = NULL WHERE id = '$id'";

if (mysqli_query($conn, $query)) {

    $result["kode"] = "1";
    $result["pesan"] = "Success!";

    echo json_encode($result);
    mysqli_close($conn);
} else {
    $response["kode"] = "0";
    $response["pesan"] = "Error! " . mysqli_error($conn);
    echo json_encode($response);
    mysqli_close($conn);
}
