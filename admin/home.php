<?php
require_once '../template/header.php';

$service_luar = mysqli_query($conn, "SELECT * FROM tb_service WHERE jenis = 'Service Luar' ORDER BY id DESC LIMIT 10");
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
                    <h4 class="page-title">Dashboard</h4>
                    <p class="text-muted page-title-alt">Selamat datang Admin!</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="widget-panel widget-style-2 bg-white">
                        <i class="md md-group text-primary"></i>
                        <?php
                        $pelanggan = mysqli_query($conn, "SELECT * FROM tb_pelanggan");
                        $row_pelanggan = mysqli_num_rows($pelanggan);
                        $row_pelanggan_final = $row_pelanggan;
                        ?>
                        <h2 class="m-0 text-dark counter font-600"><?= $row_pelanggan_final ?></h2>
                        <div class="text-muted m-t-5">Pelanggan</div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget-panel widget-style-2 bg-white">
                        <i class="md md-assignment-ind text-warning"></i>
                        <?php
                        $teknisi = mysqli_query($conn, "SELECT * FROM tb_teknisi");
                        $row_teknisi = mysqli_num_rows($teknisi);
                        $row_teknisi_final = $row_teknisi;
                        ?>
                        <h2 class="m-0 text-dark counter font-600"><?= $row_teknisi_final ?></h2>
                        <div class="text-muted m-t-5">Teknisi</div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget-panel widget-style-2 bg-white">
                        <i class="md md-archive text-info"></i>
                        <?php
                        $barang = mysqli_query($conn, "SELECT * FROM tb_barang");
                        $row_barang = mysqli_num_rows($barang);
                        $row_barang_final = $row_barang;
                        ?>
                        <h2 class="m-0 text-dark counter font-600"><?= $row_barang_final ?></h2>
                        <div class="text-muted m-t-5">Data Barang</div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget-panel widget-style-2 bg-white">
                        <i class="md md-directions-car text-danger"></i>
                        <?php
                        $service = mysqli_query($conn, "SELECT * FROM tb_service");
                        $row_service = mysqli_num_rows($service);
                        $row_service_final = $row_service;
                        ?>
                        <h2 class="m-0 text-dark counter font-600"><?= $row_service_final ?></h2>
                        <div class="text-muted m-t-5">Total Service</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-9">
                    <div class="card-box">

                        <h4 class="text-dark header-title m-t-0">Permintaan Service Luar Terbaru</h4>
                        <div class="nicescroll p-20">

                            <table class="table m-0  table-actions-bar">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Kendaraan</th>
                                        <th>Waktu</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    // $inspeksi = mysqli_query($conn, "SELECT * FROM tb_inspeksi ORDER BY updated_at DESC LIMIT 15");
                                    foreach ($service_luar as $dta_service_luar) {
                                        $kendaraan = $dta_service_luar['merek_kendaraan'] . " - " . $dta_service_luar['model_kendaraan'] . " (" . $dta_service_luar['tahun_kendaraan'] . ")";
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td> <a href=""><?= $dta_service_luar['nama'] ?></a> </td>
                                            <td> <?= $kendaraan ?></td>
                                            <td> <?= $dta_service_luar['created_at'] ?></td>
                                            <?php
                                            if ($dta_service_luar['status_service'] == "New") {
                                                echo "<td style='text-align: center;'><span class='label label-default'> New </span></td>";
                                            } else if ($dta_service_luar['status_service'] == "Proccess") {
                                                echo "<td style='text-align: center;'><span class='label label-inverse'> Proccess </span></td>";
                                            } else if ($dta_service_luar['status_service'] == "Cancel") {
                                                echo "<td style='text-align: center;'><span class='label label-danger'> Cancel </span></td>";
                                            } else {
                                                echo "<td style='text-align: center;'><span class='label label-success'> Done </span></td>";
                                            }
                                            ?>
                                            <td style="text-align: center;">
                                                <a href="#" data-toggle="modal" data-target="#detail-<?= $dta_service_luar['id'] ?>" class="table-action-btn"><i class="md md-visibility"></i></a>
                                            </td>
                                        </tr>

                                        <!-- MODAL DETAIL -->
                                        <div id="detail-<?= $dta_service_luar['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog" style="width:55%;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title" id="custom-width-modalLabel">Detail</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <?php
                                                            $result_pelanggan = mysqli_query($conn, "SELECT * FROM tb_pelanggan WHERE id = '$dta_service_luar[pelanggan_id]'");
                                                            $dta_pelanggan = mysqli_fetch_assoc($result_pelanggan);
                                                            $foto = "";
                                                            if ($dta_service_luar['jenis'] == "Service Luar") {
                                                                $foto = $dta_pelanggan['foto'];
                                                            } else {
                                                                $foto = "photo_default.png";
                                                            }
                                                            ?>
                                                            <div class="col-sm-2">
                                                                <img src="../assets/images/photo/<?= $foto ?>" alt="image" class="img-responsive img-circle thumb-lg">
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <h3><?= $dta_service_luar['nama'] ?></h3>
                                                                <p>Kontak : <?= $dta_service_luar['kontak'] ?></p>
                                                                <?php
                                                                if ($dta_service_luar['jenis'] == "Service Luar") {
                                                                    echo "<p>Lokasi :  $dta_service_luar[alamat] </p>";
                                                                } else {
                                                                    echo "<p>Alamat : $dta_service_luar[alamat]</p>";
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <h4>Service</h4>
                                                        <div class="row">
                                                            <div class="col-sm-7">
                                                                <?php
                                                                if ($dta_service_luar['jenis'] == "Service Luar") {
                                                                    echo "<p><b style='color: white;'>Jenis :</b> <span class='label label-primary m-l-5'>Service Luar</span></p>";
                                                                } else {
                                                                    echo "<p><b style='color: white;'>Jenis :</b> <span class='label label-success m-l-5'>Service Dalam</span></p>";
                                                                }
                                                                ?>
                                                                <p><b style="color: white;">Waktu :</b> <?= $dta_service_luar['created_at'] ?></p>
                                                                <p><b style="color: white;">Kendaraan :</b> <?= $kendaraan ?></p>
                                                                <p><b style="color: white;">Nomor Kendaraan :</b> <?= $dta_service_luar['nomor_kendaraan'] ?></p>
                                                                <?php
                                                                if ($dta_service_luar['status_service'] == "New") {
                                                                    echo "<p><b style='color: white;'>Status Service :</b> <span class='label label-default m-l-5'>New</span></p>";
                                                                } else if ($dta_service_luar['status_service'] == "Proccess") {
                                                                    echo "<p><b style='color: white;'>Status Service :</b> <span class='label label-inverse m-l-5'>Proccess</span></p>";
                                                                } else {
                                                                    echo "<p><b style='color: white;'>Status Service :</b> <span class='label label-success m-l-5'>Done</span></p>";
                                                                }
                                                                ?>
                                                                <?php
                                                                $result_teknisi = mysqli_query($conn, "SELECT * FROM tb_teknisi WHERE id = '$dta_service_luar[teknisi_id]'");
                                                                $dta_teknisi = mysqli_fetch_assoc($result_teknisi);
                                                                ?>
                                                                <p><b style="color: white;">Teknisi :</b> <a href="#"><?= $dta_teknisi['nama'] ?></a></p>
                                                                <p><b style="color: white;">Kendala :</b> <?= $dta_service_luar['masalah'] ?></p>

                                                            </div>
                                                            <div class="col-sm-5">
                                                                <?php
                                                                if ($dta_service_luar['status_bayar'] == "Belum") {
                                                                    echo "<p><b style='color: white;'>Status Bayar :</b> <span class='label label-danger m-l-5'>Belum</span></p>";
                                                                } else {
                                                                    echo "<p><b style='color: white;'>Status Bayar :</b> <span class='label label-success m-l-5'>Selesai</span></p>";
                                                                }
                                                                ?>
                                                                <?php
                                                                $biaya = "-";
                                                                if ($dta_service_luar['biaya'] == NULL) {
                                                                    $biaya = "-";
                                                                } else {
                                                                    $biaya = $dta_service_luar['biaya'];
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

                                    <?php $i = $i + 1;
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card-box">

                        <h4 class="text-dark header-title m-t-0">Service</h4>
                        <div class="nicescroll p-20">


                            <!-- MODAL TABAH -->
                            <div id="con-close-modal-tambah" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">Tambah Service Dalam</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="controller/controller-service.php" enctype="multipart/form-data">

                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Nama</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Nama" name="nama" id="nama">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Merek</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control select2" name="merek" id="merek" required="">
                                                            <option value=''>- Pilih -</option>
                                                            <option value='Aston Martin'>Aston Martin</option>
                                                            <option value='Audi'>Audi</option>
                                                            <option value='Bentley'>Bentley</option>
                                                            <option value='BMW'>BMW</option>
                                                            <option value='Chevrolet'>Chevrolet</option>
                                                            <option value='Daihatsu'>Daihatsu</option>
                                                            <option value='Datsun'>Datsun</option>
                                                            <option value='Dodge'>Dodge</option>
                                                            <option value='Ferrari'>Ferrari</option>
                                                            <option value='Ford'>Ford</option>
                                                            <option value='Honda'>Honda</option>
                                                            <option value='Hummer'>Hummer</option>
                                                            <option value='Hyunday'>Hyunday</option>
                                                            <option value='Isuzu'>Isuzu</option>
                                                            <option value='Jaguar'>Jaguar</option>
                                                            <option value='JEP'>JEP</option>
                                                            <option value='KIA'>KIA</option>
                                                            <option value='Lamborghini'>Lamborghini</option>
                                                            <option value='Lexus'>Lexus</option>
                                                            <option value='Marcedes'>Marcedes</option>
                                                            <option value='Mitsubishi'>Mitsubishi</option>
                                                            <option value='Nissan'>Nissan</option>
                                                            <option value='Suzuki'>Suzuki</option>
                                                            <option value='Toyota'>Toyota</option>
                                                            <option value='Volvo'>Volvo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Model</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Mis: Avanza or Jazz" name="model" id="model">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Tahun Kendaraan</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="nb-edt form-control" required="" autocomplete="off" placeholder="Tahun Kendaraan" name="tahun" id="tahun">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Nomor Kendaraan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Mis: DD 0000 XX" name="nomor" id="nomor">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Kontak</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="nb-edt form-control" required="" autocomplete="off" placeholder="Kontak" name="kontak" id="kontak">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Alamat</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Alamat" name="alamat" id="alamat">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Masalah</label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control autogrow" id="field-7" required="" name="masalah" placeholder="Lengkapi" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                                                    <button type="submit" name="submit_tambah_service" class="btn btn-default waves-effect">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- AKHIR MODAL TABAH -->

                            <a href="#" class="btn btn-success btn-lg btn-block waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal-tambah">
                                <span class="btn-label"><i class="fa fa-add"></i>
                                </span>Tambah Service</a>
                            <br><br>
                            <h3 style="text-align: center;">Total Service</h3>

                            <?php
                            $service = mysqli_query($conn, "SELECT * FROM tb_service ");
                            $row_service = mysqli_num_rows($service);
                            $row_service_final = $row_service;
                            ?>
                            <p style="font-size: 50px; text-align: center; color: darkturquoise;"><?= $row_service_final ?></p>


                        </div>
                    </div>
                </div>


            </div>


        </div>


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
        <script>
            // membaca elemen scroll area
            var scrollArea = document.querySelector('.scroll-area');

            // atur scroll area agar otomatis scroll ke bawah ketika konten berubah
            scrollArea.addEventListener('DOMNodeInserted', function() {
                scrollArea.scrollTop = scrollArea.scrollHeight;
            });
        </script>
        <?php
        require_once '../template/footer.php';
        ?>