<?php
require_once '../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$tanggal = $_POST['tanggal'];
$tahun = $_POST['tahun'];
$petani_id = $_POST['petani_id'];
$petugas_id = $_POST['petugas_id'];
$a1 = $_POST['a1'];
$a2 = $_POST['a2'];
$a3 = $_POST['a3'];
$a4 = $_POST['a4'];
$a5 = $_POST['a5'];
$a6 = $_POST['a6'];
$a7 = $_POST['a7'];
$a8 = $_POST['a8'];
$a9 = $_POST['a9'];

// SET FOTO
$foto = $_FILES['foto']['name'];
$ext = pathinfo($foto, PATHINFO_EXTENSION);
$nama_foto = "image_" . time() . "." . $ext;
$file_tmp = $_FILES['foto']['tmp_name'];

$query = "INSERT INTO `tb_inspeksi` (`tanggal`, `tahun`, `petani_id`, `petugas_id`,
                        `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `a7`, `a8`, `a9`,
                        `foto`, `created_at`, `updated_at`)
                VALUES ('$tanggal', '$tahun', '$petani_id', '$petugas_id',
                        '$a1', '$a2', '$a3', '$a4', '$a5', '$a6', '$a7', '$a8', '$a9',
                        '$nama_foto', NULL, NULL);";

if (mysqli_query($conn, $query)) {

    move_uploaded_file($file_tmp, '../assets/images/photo/' . $nama_foto);

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
