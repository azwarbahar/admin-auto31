<?php
require_once '../template/header.php';

$petani = mysqli_query($conn, "SELECT * FROM tb_petani ORDER BY id DESC");

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

                    <h4 class="page-title">Data Petani</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="active">
                            Data Petani
                        </li>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">


                        <!-- MODAL TABAH KARYAWAN -->
                        <div id="con-close-modal-petani" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title">Tambah Petani</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="controller/controller-petani.php" enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Kode Petani</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Nomor" name="id_petani" id="id_petani">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Nama Lengkap" name="nama" id="nama">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Petugas</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2" name="petugas" id="petugas" required="">
                                                        <option value="">- Pilih -</option>
                                                        <?php
                                                        $koordinator = mysqli_query($conn, "SELECT * FROM tb_karyawan WHERE posisi = 'Petugas'");
                                                        while ($row = mysqli_fetch_assoc($koordinator)) {
                                                            echo "<option value='$row[id]'>$row[nama]</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Kontak</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="nb-edt form-control" required="" autocomplete="off" placeholder="Kontak" name="kontak" id="kontak">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Kecamatan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Kecamatan" name="kecamatan" id="kecamatan">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Desa/Kelurahan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Kelurahan" name="kelurahan" id="kelurahan">
                                                </div>
                                            </div>
                                            
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                                                <button type="submit" name="submit_tambah_petani" class="btn btn-default waves-effect">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- AKHIR MODAL TABAH KARYAWAN -->
                        <a href="#" class="btn btn-default btn-rounded waves-effect waves-light m-b-30" data-toggle="modal" data-target="#con-close-modal-petani">Tambah</a>

                        <table id="datatable-buttons" class="table table-striped table-bordered table-actions-bar">
                            
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Kel/Desa</th>
                                    <th>Kecamatan</th>
                                    <th>Kontak</th>
                                    <th>Petugas</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1;
                                foreach ($petani as $dta) { ?>
                                    <tr>
                                        <td><?= $dta['id_petani'] ?></td>
                                        <td><?= $dta['nama'] ?></td>
                                        <td><?= $dta['kelurahan'] ?></td>
                                        <td><?= $dta['kecamatan'] ?></td>
                                        <td><?= $dta['kontak'] ?></td>
                                        <?php
                                        $result_petugas = mysqli_query($conn, "SELECT * FROM tb_karyawan WHERE id = '$dta[petugas_id]'");
                                        $dta_petugas = mysqli_fetch_assoc($result_petugas);
                                        ?>
                                        <td> <a href="karyawan-detail.php?id=<?= $dta_petugas['id'] ?>"> <?= $dta_petugas['nama'] ?> </a> </td>

                                        <?php
                                        $status = $dta['status'];
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
                                            <a href="petani-detail.php?id=<?= $dta['id'] ?>" class="table-action-btn"><i class="md md-visibility"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#edit-<?= $dta['id'] ?>" class="table-action-btn"><i class="md md-edit"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#hapus-<?= $dta['id'] ?>" class="table-action-btn"><i class="md md-delete"></i></a>
                                        </td>
                                    </tr>

                                    <!-- MODAL EDIT PETANI -->
                                    <div id="edit-<?= $dta['id'] ?>" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                    <h4 class="modal-title">Edit Petani</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="controller/controller-petani.php" enctype="multipart/form-data">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Kode Petani</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" value="<?= $dta['id_petani'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Nomor" name="id_petani" id="id_petani">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" value="<?= $dta['nama'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Nama Lengkap" name="nama" id="nama">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Petugas</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control select2" name="petugas" id="petugas" required="">
                                                                    <option value="">- Pilih -</option>
                                                                    <?php
                                                                    $koordinator = mysqli_query($conn, "SELECT * FROM tb_karyawan WHERE posisi = 'Petugas'");
                                                                    while ($row = mysqli_fetch_assoc($koordinator)) {
                                                                        if ($dta['petugas_id'] == $row['id']) {
                                                                            echo "<option selected value='$row[id]'>$row[nama]</option>";
                                                                        } else {
                                                                            echo "<option value='$row[id]'>$row[nama]</option>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Kontak</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" value="<?= $dta['kontak'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Kontak" name="kontak" id="kontak">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Kecamatan</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" value="<?= $dta['kecamatan'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Kecamatan" name="kecamatan" id="kecamatan">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Desa/Kelurahan</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" value="<?= $dta['kelurahan'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Kelurahan" name="kelurahan" id="kelurahan">
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="<?= $dta['id'] ?>">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                                                            <button type="submit" name="edit_petani" class="btn btn-default waves-effect">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- AKHIR MODAL EDIT KARYAWAN -->


                                    <!-- MODAL HAPUS -->
                                    <div class="modal fade" tabindex="-1" id="hapus-<?= $dta['id'] ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content bg-inverse">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" style="color: white;">Hapus Data Petani</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p style="color: white;">Yakin Ingin Menghapus Data Petani ?</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Batal</button>
                                                    <a href="controller/controller-petani.php?hapus_petani=true&id=<?= $dta['id'] ?>" type="button" class="btn btn-outline-dark" style="background-color: white;">Hapus</a>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->

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