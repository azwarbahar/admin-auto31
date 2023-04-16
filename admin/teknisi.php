<?php
require_once '../template/header.php';

$teknisi = mysqli_query($conn, "SELECT * FROM tb_teknisi ORDER BY id DESC");

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

                    <h4 class="page-title">Data Teknisi</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="active">
                            Data Teknisi
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>Data Teknisi</b></h4>

                        <!-- MODAL TABAH -->
                        <div id="con-close-modal-tambah" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title">Tambah Teknisi</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="controller/controller-teknisi.php" enctype="multipart/form-data">

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nama</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Nama" name="nama" id="nama">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Kontak</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="nb-edt form-control" required="" autocomplete="off" placeholder="Kontak" name="kontak" id="kontak">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Foto</label>
                                                <div class="col-sm-9 bootstrap-filestyle">
                                                    <input type="file" class="filestyle" data-placeholder="Belum ada foto" name="foto" id="foto" required="">
                                                    <div class="row text-info" id="viewProgress" hidden="">
                                                        <span class="col-sm-5">Sedang mengapload foto... <b><i id="progress">0%</i></b></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Username</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Username" name="username" id="username">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <p>*Username akan menjadi password default untuk Login</p>

                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                                                <button type="submit" name="submit_tambah_teknisi" class="btn btn-default waves-effect">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- AKHIR MODAL TABAH -->

                        <a href="#" style="margin-top: 10px;" class="btn btn-primary btn-rounded waves-effect waves-light m-b-30" data-toggle="modal" data-target="#con-close-modal-tambah">Tambah Teknisi</a>

                        <table id="datatable-buttons" class="table table-striped table-bordered table-actions-bar">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1;
                                foreach ($teknisi as $dta) {
                                ?>
                                    <tr>
                                        <td style="text-align: center;">
                                            <a href="../assets/images/photo/<?= $dta['foto'] ?>" target="_blank"> <img src="../assets/images/photo/<?= $dta['foto'] ?>" alt="image" class="thumb-sm "></a>
                                        </td>
                                        <td><?= $dta['nama'] ?></td>
                                        <td><?= $dta['username'] ?></td>
                                        <?php
                                        if ($dta['status'] == "Active") {
                                            echo "<td style='text-align: center;'><span class='label label-default'> Aktif </span></td>";
                                        } else {
                                            echo "<td style='text-align: center;'><span class='label label-danger'> Non Aktif </span></td>";
                                        }
                                        ?>
                                        <td style="text-align: center;">
                                            <a href="#" data-toggle="modal" data-target="#edit-<?= $dta['id'] ?>" class="table-action-btn"><i class="md md-edit"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#hapus-<?= $dta['id'] ?>" class="table-action-btn"><i class="md md-delete"></i></a>
                                        </td>
                                    </tr>

                                    <!-- MODAL EDIT -->
                                    <div id="edit-<?= $dta['id'] ?>" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                    <h4 class="modal-title">Edit Teknisi</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="controller/controller-teknisi.php" enctype="multipart/form-data">

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Nama</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" value="<?= $dta['nama'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Nama" name="nama" id="nama">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Kontak</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" value="<?= $dta['kontak'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Kontak" name="kontak" id="kontak">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Foto</label>
                                                            <div class="col-sm-9 bootstrap-filestyle">
                                                                <input type="file" class="filestyle" data-placeholder="Belum ada foto" name="foto_edit" id="foto_edit">
                                                                <div class="row text-info" id="viewProgress" hidden="">
                                                                    <span class="col-sm-5">Sedang mengapload foto... <b><i id="progress">0%</i></b></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Status</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control select" name="status" id="status" required="">
                                                                    <?php

                                                                    if ($dta['status'] == "Active") {
                                                                        echo "<option selected value='Active'>Aktif</option>
                                                                <option value='Non Active'>Non Aktif</option>";
                                                                    } else {
                                                                        echo "<option value='Active'>Aktif</option>
                                                                <option selected value='Non Active'>Non Aktif</option>";
                                                                    }
                                                                    ?>

                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="<?= $dta['id'] ?>">
                                                            <input type="hidden" name="foto_now" value="<?= $dta['foto'] ?>">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                                                            <button type="submit" name="edit_teknisi" class="btn btn-default waves-effect">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- AKHIR MODAL EDIT -->


                                    <!-- MODAL HAPUS -->
                                    <div class="modal fade" tabindex="-1" id="hapus-<?= $dta['id'] ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content bg-inverse">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" style="color: white;">Hapus Data Teknisi</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p style="color: white;">Yakin Ingin Menghapus Data Teknisi ?</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Batal</button>
                                                    <a href="controller/controller-teknisi.php?hapus_teknisi=true&id=<?= $dta['id'] ?>" type="button" class="btn btn-outline-dark" style="background-color: white;">Hapus</a>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->


                                <?php //$i = $i + 1;
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