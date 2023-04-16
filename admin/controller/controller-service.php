<?php

function plugins()
{ ?>
    <link rel="stylesheet" href="../../assets/plugins/bootstrap-more/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/dist/css2/components.css">
    <script src="../../assets/dist/jquery.min.js"></script>
    <script src="../../assets/dist/sweetalert/sweetalert.min.js"></script>
    <?php }
require('../../koneksi.php');


// SUBMIT
if (isset($_POST['submit_tambah_service'])) {

    $nama = $_POST['nama'];
    $merek = $_POST['merek'];
    $model = $_POST['model'];
    $tahun = $_POST['tahun'];
    $nomor = $_POST['nomor'];
    $kontak = $_POST['kontak'];
    $alamat = $_POST['alamat'];
    $masalah = $_POST['masalah'];
    $jenis = "Service Dalam";
    $status_bayar = "Belum";
    $status_service = "New";

    // TAMBAH DATA
    $query = "INSERT INTO tb_service VALUES (NULL, NULL, '$nama', '$merek', '$model', '$tahun', '$nomor', '$kontak', '$alamat', NULL, NULL, '$masalah', '$jenis', NULL, NULL, '$status_bayar', '$status_service', NULL,  NULL);";
    // mysqli_query($conn, $query);
    if (mysqli_query($conn, $query)) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil',
                    text: 'Data Service Berhasil ditambah!',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../index.php';
                });
            });
        </script>
    <?php } else {
        echo "Error : " . mysqli_error($conn);
    }
}


// UPDATE
if (isset($_POST['edit_bayar'])) {

    $id = $_POST['id'];
    $biaya = $_POST['biaya'];
    $status_bayar = "Lunas";
    $status_service = "Done";

    $query = "UPDATE tb_service SET biaya = '$biaya',
                                    status_bayar = '$status_bayar',
                                    status_service = '$status_service',
									updated_at = NULL WHERE id = '$id'";
    // mysqli_query($conn, $query);
    // EDIT 
    if (mysqli_query($conn, $query)) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil',
                    text: 'Berhasil Menyimpan Pembayaran',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../service.php';
                });
            });
        </script>
<?php } else {
        echo "Error : " . mysqli_error($conn);
    }
}

?>