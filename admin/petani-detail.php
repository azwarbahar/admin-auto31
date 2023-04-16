<?php
require_once '../template/header.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM tb_petani WHERE id = '$id'");
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

                    <h4 class="page-title">Detail Petani</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="petani.php">Petani</a>
                        </li>
                        <li class="active">
                            Detail
                        </li>
                    </ol>
                </div>
            </div>


            <div class="row">

                <div class="col-md-4 col-lg-3">

                    <h4><b>Data Personal :</b></h4>
                    <div class="table-responsive m-t-20">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td width="50">Nama</td>
                                    <td>
                                        : <?= $dta['nama'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>
                                        : <?= $dta['jenis_kelamin'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ID Petani</td>
                                    <td>
                                        : <?= $dta['id_petani'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kontak</td>
                                    <td>
                                        : <?= $dta['kontak'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>
                                        : <?= $dta['tanggal_lahir'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pendidikan</td>
                                    <td>
                                        : <?= $dta['pendidikan'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kelompok</td>
                                    <td>
                                        : <?= $dta['kelompok'] ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <h4><b>Data Alamat :</b></h4>
                    <div class="table-responsive m-t-20">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td width="50">Alamat</td>
                                    <td>
                                        : <?= $dta['alamat'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kelurahan</td>
                                    <td>
                                        : <?= $dta['kelurahan'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kecamatan</td>
                                    <td>
                                        : <?= $dta['kecamatan'] ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h4><b>Informasi Kebun :</b></h4>
                    <div class="table-responsive m-t-20">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td width="50">Jumlah Lahan</td>
                                    <td>
                                        : <?= $dta['jumlah_lahan'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Luas Lahan</td>
                                    <td>
                                        : <?= $dta['luas_lahan'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jenis Kakao Lokal</td>
                                    <td>
                                        : <?= $dta['kakau_lokal'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jenis Kakao S1</td>
                                    <td>
                                        : <?= $dta['kakao_s1'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jenis Kakao S2</td>
                                    <td>
                                        : <?= $dta['kakao_s2'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jarak Tanaman</td>
                                    <td>
                                        : <?= $dta['jarak_tanah'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Perkiraan Hasil Panen</td>
                                    <td>
                                        : <?= $dta['hasil_panen'] ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4 col-lg-9">

                    <div class="col-lg-12">
                        <div class="portlet">
                            <div class="portlet-heading bg-inverse">
                                <h3 class="portlet-title">
                                    Inspeksi
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
                                                <th> Foto </th>
                                                <th> Petugas </th>
                                                <th> Petani </th>
                                                <th> Nilai </th>
                                                <th> # </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php

                                            $get_inspeksi = mysqli_query($conn, "SELECT * FROM tb_inspeksi WHERE petani_id = '$id'");

                                            foreach ($get_inspeksi as $get_inspeksi) { ?>
                                                <tr>
                                                    <td style="text-align: center;">
                                                        <a href="../assets/images/photo/<?= $get_inspeksi['foto'] ?>" target="_blank"> <img src="../assets/images/photo/<?= $get_inspeksi['foto'] ?>" alt="image" class="thumb-sm "></a>
                                                    </td>
                                                    <?php
                                                    $result_petugas = mysqli_query($conn, "SELECT * FROM tb_karyawan WHERE id = '$get_inspeksi[petugas_id]'");
                                                    $dta_petugas = mysqli_fetch_assoc($result_petugas);
                                                    ?>
                                                    <td> <a href="karyawan-detail.php?id=<?= $dta_petugas['id'] ?>"> <?= $dta_petugas['nama'] ?> </a> </td>
                                                    <?php
                                                    $result_petani = mysqli_query($conn, "SELECT * FROM tb_petani WHERE id = '$get_inspeksi[petani_id]'");
                                                    $dta_petani = mysqli_fetch_assoc($result_petani);
                                                    ?>
                                                    <td> <a href="petani-detail.php?id=<?= $dta_petani['id'] ?>"> <?= $dta_petani['nama'] ?> </a> </td>
                                                    
                                                    <?php
                                                    $a1 = perhitunganSelisiGAP($get_inspeksi['a1'] - 3);
                                                    $a2 = perhitunganSelisiGAP($get_inspeksi['a2'] - 3);
                                                    $a3 = perhitunganSelisiGAP($get_inspeksi['a3'] - 4);
                                                    $a4 = perhitunganSelisiGAP($get_inspeksi['a4'] - 4);
                                                    $a5 = perhitunganSelisiGAP($get_inspeksi['a5'] - 3);
                                                    $a6 = perhitunganSelisiGAP($get_inspeksi['a6'] - 4);
                                                    $a7 = perhitunganSelisiGAP($get_inspeksi['a7'] - 4);
                                                    $a8 = perhitunganSelisiGAP($get_inspeksi['a8'] - 4);
                                                    $a9 = perhitunganSelisiGAP($get_inspeksi['a9'] - 2);
                                                    // TD factor Core
                                                    $jumlah_core = $a3 + $a4 + $a6 + $a7 + $a8;
                                                    $hasil_core = $jumlah_core / 5;
                                                    // echo "<td>$hasil_core</td>";
                                                    // TD factor Secondary
                                                    $jumlah_secondary = $a1 + $a2 + $a5 + $a9;
                                                    $hasil_secondary = $jumlah_secondary / 4;
                                                    // echo "<td>$hasil_secondary</td>";

                                                    // TD Total
                                                    $total = (0.6 * $hasil_core) + (0.4 * $hasil_secondary);
                                                    if ($total < 3) {
                                                        echo "<th style='color: red;' >$total</th>";

                                                    } else {
                                                        echo "<th>$total</th>";

                                                    }
                                                    // $tampung_total[$z] = $total;
                                                ?>
                                                  
                                                    
                                                    <td style="text-align: center;">
                                                        <a href="#" data-toggle="modal" data-target="#accordion-modal-<?= $get_inspeksi['id'] ?>" class="table-action-btn"><i class="md md-visibility"></i></a>
                                                    </td>
                                                </tr>


                                                <div id="accordion-modal-<?= $get_inspeksi['id'] ?>" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content p-0">
                                                            <div class="panel-group panel-group-joined" id="accordion-test">
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">
                                                                        <h4 class="panel-title">
                                                                            <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseOne" class="collapsed">
                                                                                DATA
                                                                            </a>
                                                                        </h4>
                                                                    </div>
                                                                    <div id="" class="sin">
                                                                        <div class="panel-body">
                                                                            <p>Petani : <a href="petani-detail.php?id=<?= $dta_petani['id'] ?>"> <?= $dta_petani['nama'] ?> </a> </p>
                                                                            <p>Petugas : <a href="karyawan-detail.php?id=<?= $dta_petugas['id'] ?>"> <?= $dta_petugas['nama'] ?> </a> </p>
                                                                            <p>Tanggal : <b style=" font-weight: bold;"> <?= $get_inspeksi['tanggal'] ?></b></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">
                                                                        <h4 class="panel-title">
                                                                            <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseTwo">
                                                                                1. Aspek Personal dan lingkungan
                                                                            </a>
                                                                        </h4>
                                                                    </div>
                                                                    <div id="collapseTwo" class=" collapse ">
                                                                        <div class="panel-body">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-6 col-form-label">Keaktifan</label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" value="<?= $get_inspeksi['a1'] ?>" class="nb-edt form-control" readonly autocomplete="off">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-6 col-form-label">Penanganan limbah pertanian</label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" value="<?= $get_inspeksi['a2'] ?>" class="nb-edt form-control" readonly autocomplete="off">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-6 col-form-label">Tidak melakukan pemabatan berlebih</label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" value="<?= $get_inspeksi['a3'] ?>" class="nb-edt form-control" readonly autocomplete="off">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-6 col-form-label">Tidak menggunakan pestisida terlarang</label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" value="<?= $get_inspeksi['a4'] ?>" class="nb-edt form-control" readonly autocomplete="off">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">
                                                                        <h4 class="panel-title">
                                                                            <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseThree" class="collapsed">
                                                                                2. Aspek Tanaman
                                                                            </a>
                                                                        </h4>
                                                                    </div>
                                                                    <div id="collapseThree" class="panel-collapse collapse">
                                                                        <div class="panel-body">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-6 col-form-label">Melakukan pemangkasan rutin</label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" value="<?= $get_inspeksi['a5'] ?>" class="nb-edt form-control" readonly autocomplete="off">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-6 col-form-label">Penanganan dahan yang terserang penyakit</label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" value="<?= $get_inspeksi['a6'] ?>" class="nb-edt form-control" readonly autocomplete="off">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">
                                                                        <h4 class="panel-title">
                                                                            <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseFour" class="collapsed">
                                                                                2. Aspek Buah
                                                                            </a>
                                                                        </h4>
                                                                    </div>
                                                                    <div id="collapseFour" class="panel-collapse collapse">
                                                                        <div class="panel-body">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-6 col-form-label">Penanganan buah yang terserang penyakit</label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" value="<?= $get_inspeksi['a7'] ?>" class="nb-edt form-control" readonly autocomplete="off">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-6 col-form-label">Rata-rata jumlah buah kakao</label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" value="<?= $get_inspeksi['a8'] ?>" class="nb-edt form-control" readonly autocomplete="off">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-6 col-form-label">Intensitas pemupukan (satuan kg)</label>
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" value="<?= $get_inspeksi['a9'] ?>" class="nb-edt form-control" readonly autocomplete="off">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->


                                            <?php
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