<?php

function plugins()
{ ?>
    <link rel="stylesheet" href="../../assets/plugins/bootstrap-more/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/dist/css2/components.css">
    <script src="../../assets/dist/jquery.min.js"></script>
    <script src="../../assets/dist/sweetalert/sweetalert.min.js"></script>
    <?php }
require('../../koneksi.php');


// SUBMIT SUPER ADMIN
if (isset($_POST['submit_tambah_petani'])) {
    $id_petani = $_POST['id_petani'];
    $nama = $_POST['nama'];
    $petugas = $_POST['petugas'];
    $kontak = $_POST['kontak'];
    $kecamatan = $_POST['kecamatan'];
    $kelurahan = $_POST['kelurahan'];
    $status = "Aktif";
    $foto = "photo_default.png";

    // TAMBAH DATA

    $query = "INSERT INTO tb_petani (`id`, `nama`, `id_petani`, `kontak`, `kelurahan`, `kecamatan`, `foto`, `status`, `petugas_id`, `created_at`, `updated_at`)
                        VALUES (NULL, '$nama', '$id_petani', '$kontak', '$kelurahan', '$kecamatan', '$foto', '$status', '$petugas',  NULL,  NULL);";
    // mysqli_query($conn, $query);
    // echo " bb";
    if (mysqli_query($conn, $query)) {
        // echo " CC";
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil',
                    text: 'Data Petani Berhasil ditambah!',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../petani.php';
                });
            });
        </script>
    <?php } else {
        echo "Error : " . mysqli_error($conn);
    }
}


// UPDATE ADMIN
if (isset($_POST['edit_petani'])) {

    $id = $_POST['id'];
    $id_petani = $_POST['id_petani'];
    $nama = $_POST['nama'];
    $petugas = $_POST['petugas'];
    $kontak = $_POST['kontak'];
    $kecamatan = $_POST['kecamatan'];
    $kelurahan = $_POST['kelurahan'];

    $query = "UPDATE tb_petani SET nama = '$nama',
											id_petani = '$id_petani',
											kontak = '$kontak',
											kelurahan = '$kelurahan',
											kecamatan = '$kecamatan',
											petugas_id = '$petugas',
											updated_at = NULL WHERE id = '$id'";
    // mysqli_query($conn, $query);
    // EDIT PARTAI
    if (mysqli_query($conn, $query)) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil',
                    text: 'Data Petani berhasil diubah',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../petani.php';
                });
            });
        </script>
    <?php } else {
        echo "Error : " . mysqli_error($conn);
    }
}

// KELUARKAN ADMIN
if (isset($_GET['keluar_petani'])) {
    $id = $_GET['id'];

    $query = "UPDATE tb_petani SET status = 'Out', updated_at = NULL WHERE id = '$id'";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil',
                    text: 'Proses Pengeluaran Petani Berhasil!',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../home.php';
                });
            });
        </script>
    <?php }
}


// HAPUS ADMIN
if (isset($_GET['hapus_petani'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM tb_petani WHERE id = '$id'";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil Dihapus',
                    text: 'Data Petani berhasil dihapus',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../petani.php';
                });
            });
        </script>
<?php }
}

?>