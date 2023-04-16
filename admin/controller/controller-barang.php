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
if (isset($_POST['submit_tambah_barang'])) {

    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $satuan = $_POST['satuan'];
    $status = "Tersedia";

    // SET FOTO
    $foto = $_FILES['foto']['name'];
    $ext = pathinfo($foto, PATHINFO_EXTENSION);
    $nama_foto = "image_" . time() . "." . $ext;
    $file_tmp = $_FILES['foto']['tmp_name'];

    // TAMBAH DATA
    $query = "INSERT INTO tb_barang VALUES (NULL, '$nama', '$harga', '$satuan', '$nama_foto', '$status', NULL,  NULL);";
    // mysqli_query($conn, $query);
    if (mysqli_query($conn, $query)) {
        move_uploaded_file($file_tmp, '../../assets/images/barang/' . $nama_foto);
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil',
                    text: 'Data Barang Berhasil ditambah!',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../barang.php';
                });
            });
        </script>
    <?php } else {
        echo "Error : " . mysqli_error($conn);
    }
}

// UPDATE
if (isset($_POST['edit_barang'])) {

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $satuan = $_POST['satuan'];
    $status = $_POST['status'];
    // SET FOTO
    if ($_FILES['foto_edit']['name'] != '') {
        $foto = $_FILES['foto_edit']['name'];
        $ext = pathinfo($foto, PATHINFO_EXTENSION);
        $nama_foto = "image_" . time() . "." . $ext;
        $file_tmp = $_FILES['foto_edit']['tmp_name'];
        // HAPUS OLD FOTO
        $target = "foto/" . $_POST['foto_now'];
        if (file_exists($target) && $_POST['foto_now'] != 'default.png') unlink($target);
        // UPLOAD NEW FOTO
        move_uploaded_file($file_tmp, '../../assets/images/barang/' . $nama_foto);
    } else {
        $nama_foto = $_POST['foto_now'];
    }

    $query = "UPDATE tb_barang SET nama = '$nama',
											harga = '$harga',
											satuan = '$satuan',
											foto = '$nama_foto',
											status = '$status',
											updated_at = NULL WHERE id = '$id'";
    // mysqli_query($conn, $query);
    // EDIT PARTAI
    if (mysqli_query($conn, $query)) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil',
                    text: 'Data Barang berhasil diubah',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../barang.php';
                });
            });
        </script>
    <?php } else {
        echo "Error : " . mysqli_error($conn);
    }
}


// HAPUS ADMIN
if (isset($_GET['hapus_barang'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM tb_barang WHERE id = '$id'";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil Dihapus',
                    text: 'Data Barang berhasil dihapus',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../barang.php';
                });
            });
        </script>
<?php }
}

?>