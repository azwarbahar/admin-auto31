<?php
require_once '../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$id = $_POST['id'];
$teknisi_id = $_POST['teknisi_id'];
$status = $_POST['status'];

$query = "UPDATE tb_service SET teknisi_id = '$teknisi_id',
                                status_service = '$status',
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
