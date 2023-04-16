<?php
require_once '../template/header.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM tb_karyawan WHERE id = '$id'");
$dta = mysqli_fetch_assoc($result);

?>
<!-- Content -->


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">

                    <h4 class="page-title">Karyawan</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="karyawan.php">Karyawan</a>
                        </li>
                        <li class="active">
                            Detail
                        </li>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col-md-4 col-lg-3">
                    <div class="profile-detail card-box">
                        <div>
                            <img src="../assets/images/photo/<?= $dta['foto'] ?>" class="img-circle" alt="profile-image">

                            <hr>
                            <div class="text-left">
                                <p class="text-muted font-13"><strong>Nama :</strong> <span class="m-l-15"><?= $dta['nama'] ?></span></p>

                                <p class="text-muted font-13"><strong>ID :</strong><span class="m-l-15"><?= $dta['no_kepegawaian'] ?></span></p>
                                <?php
                                if ($dta['posisi'] == "Petugas") {

                                    $result_koordinator = mysqli_query($conn, "SELECT * FROM tb_karyawan WHERE id = '$dta[koordinator]'");
                                    $dta_koordinator = mysqli_fetch_assoc($result_koordinator);

                                ?>
                                    <p class="text-muted font-13"><strong>Koordinator :</strong> <span class="m-l-15"> <a href="karyawan-detail.php?id=<?= $dta_koordinator['id'] ?>"></a> <?= $dta_koordinator['nama'] ?></span></p>

                                <?php
                                }
                                ?>
                                <p class="text-muted font-13"><strong>Kontak :</strong> <span class="m-l-15"><?= $dta['kontak'] ?></span></p>

                                <p class="text-muted font-13"><strong>Alamat :</strong> <span class="m-l-15"><?= $dta['alamat'] ?></span></p>

                                <p class="text-muted font-13"><strong>Jenis Kelamin :</strong> <span class="m-l-15"><?= $dta['jenis_kelamin'] ?></span></p>

                                <p class="text-muted font-13"><strong>Tempat Lahir :</strong> <span class="m-l-15"><?= $dta['tempat_lahir'] ?></span></p>

                                <p class="text-muted font-13"><strong>Tanggal Lahir :</strong> <span class="m-l-15"><?= $dta['tanggal_lahir'] ?></span></p>

                                <p class="text-muted font-13"><strong>Username :</strong> <span class="m-l-15"><?= $dta['username'] ?></span></p>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-4 col-lg-9">


                    <div class="col-lg-12">
                        <div class="portlet">
                            <div class="portlet-heading bg-inverse">
                                <h3 class="portlet-title">
                                    Data Petani
                                </h3>
                                <div class="portlet-widgets">
                                    <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                    <span class="divider"></span>
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#bg-inverse"><i class="ion-minus-round"></i></a>
                                    <span class="divider"></span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="bg-inverse" class="panel-collapse collapse in">
                                <div class="portlet-body">

                                    <table id="datatable-buttons" class="table table-striped table-bordered table-actions-bar">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>Kel/Desa</th>
                                                <th>Kecamatan</th>
                                                <th>Kontak</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $i = 1;
                                            if ($dta['posisi'] == "Petugas") {
                                                $petani = mysqli_query($conn, "SELECT * FROM tb_petani WHERE petugas_id = '$id' ORDER BY id DESC");
                                            } else {
                                                $petani = mysqli_query($conn, "SELECT * FROM tb_petani ORDER BY id DESC");
                                            }

                                            foreach ($petani as $dta_petani) { ?>
                                                <tr>
                                                    <td><?= $dta_petani['id_petani'] ?></td>
                                                    <td><?= $dta_petani['nama'] ?></td>
                                                    <td><?= $dta_petani['kelurahan'] ?></td>
                                                    <td><?= $dta_petani['kecamatan'] ?></td>
                                                    <td><?= $dta_petani['kontak'] ?></td>
                                                    <?php
                                                    $status = $dta_petani['status'];
                                                    if ($status == "Aktif") {
                                                        echo "<td><span class='label label-primary'> Aktif </span></td>";
                                                    } else if ($status == "Out") {
                                                        echo "<td><span class='label label-danger'> Keluar </span></td>";
                                                    } else if ($status == "Suspended") {
                                                        echo "<td><span class='label label-warning'> Suspended </span></td>";
                                                    } else {
                                                        echo "<td><span class='label label-inverse'>" . $status . " </span></td>";
                                                    }
                                                    ?>
                                                    <td style="text-align: center;">
                                                        <a href="petani-detail.php?id=<?= $dta_petani['id'] ?>" class="table-action-btn"><i class="md md-visibility"></i></a>
                                                    </td>
                                                </tr>

                                            <?php $i = $i + 1;
                                            } ?>

                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <!-- End Content -->
            <?php
            require_once '../template/footer.php';
            ?>