<?php
require_once '../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$id = $_POST['id'];
$biaya = $_POST['biaya'];

$query = "UPDATE tb_service SET biaya = '$biaya',
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
