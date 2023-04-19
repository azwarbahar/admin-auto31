<?php
require_once '../template/header.php';

$pelanggan = mysqli_query($conn, "SELECT * FROM tb_pelanggan ORDER BY id DESC");

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

                    <h4 class="page-title">Data Pelanggan</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="active">
                            Data Pelanggan
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>Data Pelanggan</b></h4>


                        <!-- <a href="#" style="margin-top: 10px;" class="btn btn-primary btn-rounded waves-effect waves-light m-b-30" data-toggle="modal" data-target="#con-close-modal-tambah">Tambah Teknisi</a> -->

                        <div class="table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table  table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th data-priority="1">Nama</th>
                                            <th data-priority="1">Kontak</th>
                                            <!-- <th data-priority="1">Kendaraan</th> -->
                                            <th data-priority="1">Merek</th>
                                            <th data-priority="1">No Plat</th>
                                            <th data-priority="1">Status</th>
                                            <th data-priority="1">Email</th>
                                            <th data-priority="1">Alamat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($pelanggan as $dta) {
                                        ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td>
                                                    <a href="../assets/images/photo/<?= $dta['foto'] ?>" target="_blank"> <img src="../assets/images/photo/<?= $dta['foto'] ?>" alt="image" class="thumb-sm "></a>
                                                </td>
                                                <th><?= $dta['nama'] ?></th>
                                                <td><?= $dta['kontak'] ?></td>
                                                <!-- <td>
                                                    <a href="../assets/images/photo/" target="_blank"> <img src="../assets/images/photo/" alt="image" class="thumb-sm "></a>
                                                </td> -->
                                                <?php
                                                $Merek = $dta['merek_kendaraan'] . " - " . $dta['model_kendaraan'] . " (" . $dta['tahun_kendaraan'] . ")";
                                                ?>
                                                <td><?= $Merek ?></td>
                                                <td><?= $dta['nomor_kendaraan'] ?></td>
                                                <?php
                                                if ($dta['status'] == "Active") {
                                                    echo "<td style='text-align: center;'><span class='label label-default'> Aktif </span></td>";
                                                } else {
                                                    echo "<td style='text-align: center;'><span class='label label-danger'> Non Aktif </span></td>";
                                                }
                                                ?>
                                                <td><?= $dta['email'] ?></td>
                                                <td><?= $dta['alamat'] ?></td>
                                            </tr>
                                        <?php $i = $i + 1;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>



                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

            <?php
            require_once '../template/footer.php';
            ?>