<?php
require_once '../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$pelanggan_id = $_POST['pelanggan_id'];
$nama = $_POST['nama'];
$merek_kendaraan = $_POST['merek_kendaraan'];
$model_kendaraan = $_POST['model_kendaraan'];
$tahun_kendaraan = $_POST['tahun_kendaraan'];
$nomor_kendaraan = $_POST['nomor_kendaraan'];
$kontak = $_POST['kontak'];
$alamat = $_POST['alamat'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$masalah = $_POST['masalah'];
$jenis = "Service Luar";
$status_bayar = "Belum";
$status_service = "New";


$query = "INSERT INTO `tb_service` (`pelanggan_id`, `nama`, `merek_kendaraan`, `model_kendaraan`,
                        `tahun_kendaraan`, `nomor_kendaraan`, `kontak`, `alamat`, `latitude`, `longitude`,
                        `masalah`, `jenis`, `teknisi_id`, `biaya`, `bukti_pembayaran`, `status_bayar`,
                        `status_service`, `created_at`, `updated_at`)
                VALUES ('$pelanggan_id', '$nama', '$merek_kendaraan', '$model_kendaraan',
                        '$tahun_kendaraan', '$nomor_kendaraan', '$kontak', '$alamat', '$latitude', '$longitude',
                        '$masalah', '$jenis', NULL, NULL, NULL, '$status_bayar',
                        '$status_service', NULL, NULL);";

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
