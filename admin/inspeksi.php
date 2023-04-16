<?php
require_once '../template/header.php';

$inspeksi = mysqli_query($conn, "SELECT * FROM tb_inspeksi ORDER BY id DESC");

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

                    <h4 class="page-title">Catatan Inspeksi</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="active">
                            Catatan Inspeksi
                        </li>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">

                        <table id="datatable-buttons" class="table table-striped table-bordered table-actions-bar">
                            <thead>
                                <tr>
                                    <th> Foto </th>
                                    <th> Petugas </th>
                                    <th> Petani </th>
                                    <th> Tanggal </th>
                                    <th> # </th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1;
                                foreach ($inspeksi as $dta) { ?>
                                    <tr>
                                        <td style="text-align: center;">
                                            <a href="../assets/images/photo/<?= $dta['foto'] ?>" target="_blank"> <img src="../assets/images/photo/<?= $dta['foto'] ?>" alt="image" class="thumb-sm "></a>
                                        </td>
                                        <?php
                                        $result_petugas = mysqli_query($conn, "SELECT * FROM tb_karyawan WHERE id = '$dta[petugas_id]'");
                                        $dta_petugas = mysqli_fetch_assoc($result_petugas);
                                        ?>
                                        <td> <a href="karyawan-detail.php?id=<?= $dta_petugas['id'] ?>"> <?= $dta_petugas['nama'] ?> </a> </td>
                                        <?php
                                        $result_petani = mysqli_query($conn, "SELECT * FROM tb_petani WHERE id = '$dta[petani_id]'");
                                        $dta_petani = mysqli_fetch_assoc($result_petani);
                                        ?>
                                        <td> <a href="petani-detail.php?id=<?= $dta_petani['id'] ?>"> <?= $dta_petani['nama'] ?> </a> </td>
                                        <td><?= $dta['tanggal'] ?></td>
                                        <td style="text-align: center;">
                                            <a href="#" data-toggle="modal" data-target="#accordion-modal-<?= $dta['id'] ?>" class="table-action-btn"><i class="md md-visibility"></i></a>
                                        </td>
                                    </tr>


                                    <div id="accordion-modal-<?= $dta['id'] ?>" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
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
                                                                <p>Tanggal : <b style=" font-weight: bold;"> <?= $dta['tanggal'] ?></b></p>
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
                                                                        <input type="text" value="<?= $dta['a1'] ?>" class="nb-edt form-control" readonly autocomplete="off">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6 col-form-label">Penanganan limbah pertanian</label>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" value="<?= $dta['a2'] ?>" class="nb-edt form-control" readonly autocomplete="off">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6 col-form-label">Tidak melakukan pemabatan berlebih</label>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" value="<?= $dta['a3'] ?>" class="nb-edt form-control" readonly autocomplete="off">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6 col-form-label">Tidak menggunakan pestisida terlarang</label>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" value="<?= $dta['a4'] ?>" class="nb-edt form-control" readonly autocomplete="off">
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
                                                                        <input type="text" value="<?= $dta['a5'] ?>" class="nb-edt form-control" readonly autocomplete="off">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6 col-form-label">Penanganan dahan yang terserang penyakit</label>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" value="<?= $dta['a6'] ?>" class="nb-edt form-control" readonly autocomplete="off">
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
                                                                        <input type="text" value="<?= $dta['a7'] ?>" class="nb-edt form-control" readonly autocomplete="off">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6 col-form-label">Rata-rata jumlah buah kakao</label>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" value="<?= $dta['a8'] ?>" class="nb-edt form-control" readonly autocomplete="off">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6 col-form-label">Intensitas pemupukan (satuan kg)</label>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" value="<?= $dta['a9'] ?>" class="nb-edt form-control" readonly autocomplete="off">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->



                                <?php $i = $i + 1;
                                } ?>

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