<?php
require_once '../template/header.php';

$service = mysqli_query($conn, "SELECT * FROM tb_service ORDER BY id DESC");
// $service_dalam = mysqli_query($conn, "SELECT * FROM tb_service WHERE jenis = 'Service Dalam' ORDER BY id DESC");

?>


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

                    <h4 class="page-title">Transaksi</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="active">
                            Transaksi
                        </li>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>Transaksi</b></h4>
                        <p class="text-muted font-13 m-b-30">

                        </p>

                        <table id="datatable-buttons" class="table table-striped table-bordered table-actions-bar">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Status</th>
                                    <th>Nama</th>
                                    <th>Kendaraan</th>
                                    <th>Jenis Service</th>
                                    <th>Waktu</th>
                                    <th>Pembayaran</th>
                                    <th>Total Biaya</th>
                                    <th>#</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1;
                                foreach ($service as $dta) {
                                ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <?php
                                        if ($dta['status_service'] == "New") {
                                            echo "<td style='text-align: center;'><span class='label label-default'> New </span></td>";
                                        } else if ($dta['status_service'] == "Proccess") {
                                            echo "<td style='text-align: center;'><span class='label label-inverse'> Proccess </span></td>";
                                        } else if ($dta['status_service'] == "Cancel") {
                                            echo "<td style='text-align: center;'><span class='label label-danger'> Cancel </span></td>";
                                        } else {
                                            echo "<td style='text-align: center;'><span class='label label-success'> Done </span></td>";
                                        }
                                        $kendaraan = $dta['merek_kendaraan'] . " - " . $dta['model_kendaraan'] . " (" . $dta['tahun_kendaraan'] . ")";
                                        ?>
                                        <td> <a href=""><?= $dta['nama'] ?></a> </td>
                                        <td> <?= $kendaraan ?> </td>
                                        <td> <?= $dta['jenis'] ?> </td>
                                        <td><?= $dta['created_at'] ?></td>
                                        <?php
                                        if ($dta['status_bayar'] == "Lunas") {
                                            echo "<td style='text-align: center;'><span class='label label-success'> Lunas </span></td>";
                                        } else {
                                            echo "<td style='text-align: center;'><span class='label label-danger'> Belum </span></td>";
                                        }

                                        $biaya = "-";
                                        if ($dta['biaya'] == NULL) {
                                            $biaya = "-";
                                        } else {
                                            $biaya = $dta['biaya'];
                                        }
                                        ?>
                                        <td>Rp. <?= $biaya ?></td>
                                        <td style="text-align: center;">
                                            <?php
                                            if ($dta['status_bayar'] == "Belum") {
                                            ?>
                                                <a href="#" data-toggle="modal" data-target="#bayar-<?= $dta['id'] ?>" class="table-action-btn"><i class="md md-attach-money"></i></a>
                                            <?php
                                            }
                                            ?>
                                            <a href="#" data-toggle="modal" data-target="#detail-<?= $dta['id'] ?>" class="table-action-btn"><i class="md md-visibility"></i></a>
                                        </td>
                                    </tr>
                                    <!-- MODAL DETAIL -->
                                    <div id="detail-<?= $dta['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog" style="width:55%;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="custom-width-modalLabel">Detail</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <?php
                                                        $result_pelanggan = mysqli_query($conn, "SELECT * FROM tb_pelanggan WHERE id = '$dta[pelanggan_id]'");
                                                        $dta_pelanggan = mysqli_fetch_assoc($result_pelanggan);
                                                        $foto = "";
                                                        if ($dta['jenis'] == "Service Luar") {
                                                            $foto = $dta_pelanggan['foto'];
                                                        } else {
                                                            $foto = "photo_default.png";
                                                        }
                                                        ?>
                                                        <div class="col-sm-2">
                                                            <img src="../assets/images/photo/<?= $foto ?>" alt="image" class="img-responsive img-circle thumb-lg">
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <h3><?= $dta['nama'] ?></h3>
                                                            <p>Kontak : <?= $dta['kontak'] ?></p>
                                                            <?php
                                                            if ($dta['jenis'] == "Service Luar") {
                                                                echo "<p>Lokasi :  $dta[alamat] </p>";
                                                            } else {
                                                                echo "<p>Alamat : $dta[alamat]</p>";
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <h4>Service</h4>
                                                    <div class="row">
                                                        <div class="col-sm-7">
                                                            <?php
                                                            if ($dta['jenis'] == "Service Luar") {
                                                                echo "<p><b style='color: white;'>Jenis :</b> <span class='label label-primary m-l-5'>Service Luar</span></p>";
                                                            } else {
                                                                echo "<p><b style='color: white;'>Jenis :</b> <span class='label label-success m-l-5'>Service Dalam</span></p>";
                                                            }
                                                            ?>
                                                            <p><b style="color: white;">Waktu :</b> <?= $dta['created_at'] ?></p>
                                                            <p><b style="color: white;">Kendaraan :</b> <?= $kendaraan ?></p>
                                                            <p><b style="color: white;">Nomor Kendaraan :</b> <?= $dta['nomor_kendaraan'] ?></p>
                                                            <?php
                                                            if ($dta['status_service'] == "New") {
                                                                echo "<p><b style='color: white;'>Status Service :</b> <span class='label label-default m-l-5'>New</span></p>";
                                                            } else if ($dta['status_service'] == "Proccess") {
                                                                echo "<p><b style='color: white;'>Status Service :</b> <span class='label label-inverse m-l-5'>Proccess</span></p>";
                                                            } else {
                                                                echo "<p><b style='color: white;'>Status Service :</b> <span class='label label-success m-l-5'>Done</span></p>";
                                                            }
                                                            ?>
                                                            <?php
                                                            $result_teknisi = mysqli_query($conn, "SELECT * FROM tb_teknisi WHERE id = '$dta[teknisi_id]'");
                                                            $dta_teknisi = mysqli_fetch_assoc($result_teknisi);
                                                            ?>
                                                            <p><b style="color: white;">Teknisi :</b> <a href="#"><?= $dta_teknisi['nama'] ?></a></p>
                                                            <p><b style="color: white;">Kendala :</b> <?= $dta['masalah'] ?></p>

                                                        </div>
                                                        <div class="col-sm-5">
                                                            <?php
                                                            if ($dta['status_bayar'] == "Belum") {
                                                                echo "<p><b style='color: white;'>Status Bayar :</b> <span class='label label-danger m-l-5'>Belum</span></p>";
                                                            } else {
                                                                echo "<p><b style='color: white;'>Status Bayar :</b> <span class='label label-success m-l-5'>Selesai</span></p>";
                                                            }
                                                            ?>
                                                            <?php
                                                            $biaya = "-";
                                                            if ($dta['biaya'] == NULL) {
                                                                $biaya = "-";
                                                            } else {
                                                                $biaya = $dta['biaya'];
                                                            }
                                                            ?>
                                                            <p><b style="color: white;">Biaya :</b> <a href="#">Rp. <?= $biaya ?></a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                    <!-- <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- AKHIR MODAL DETAIL -->

                                    <!-- MODAL EDIT -->
                                    <div id="bayar-<?= $dta['id'] ?>" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                    <h4 class="modal-title">Pembayaran</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="controller/controller-service.php" enctype="multipart/form-data">

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Nama</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" disabled value="<?= $dta['nama'] ?>" class="nb-edt form-control" autocomplete="off" placeholder="Nama" name="nama" id="nama">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Kendaraan</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" disabled value="<?= $kendaraan ?>" class="nb-edt form-control" autocomplete="off" placeholder="Kendaraan" name="kendaraan" id="kendaraan">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Total Biaya</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="nb-edt form-control" autocomplete="off" placeholder="Biaya" name="biaya" id="biaya">
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="<?= $dta['id'] ?>">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                                                            <button type="submit" name="edit_bayar" class="btn btn-default waves-effect">Bayar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- AKHIR MODAL EDIT -->




                                <?php $i = $i + 1;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

            <?php
            require_once '../template/footer.php';
            ?>