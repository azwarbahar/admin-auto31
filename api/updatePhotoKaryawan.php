<?php
require_once '../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$id = $_POST['id'];

// SET FOTO
$foto = $_FILES['foto']['name'];
$ext = pathinfo($foto, PATHINFO_EXTENSION);
$nama_foto = "image_" . time() . "." . $ext;
$file_tmp = $_FILES['foto']['tmp_name'];

$query = "UPDATE tb_karyawan SET foto = '$nama_foto',
                                updated_at = NULL WHERE id = '$id'";


if (mysqli_query($conn, $query)) {

    move_uploaded_file($file_tmp, '../assets/images/photo/' . $nama_foto);

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
