<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Kriteria Penilaian</h2>
            </div>
        </div>
    </div>
    <div class="row column1">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head dash_head d-flex justify-content-between align-items-center">
                    <div class="heading1 margin_0">
                        <h2 class="text-white">List Kriteria Penilaian</h2>
                    </div>
                    <div>
                        <button type="button" class="btn btn-success" style="margin-right: 10px;" data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus"></i>&nbsp;Tambah Data</button>
                    </div>
                </div>
                <div class="table_section padding_infor_info">
                    <div class="table-responsive-sm">
                        <table id="myTable" class="table">
                            <thead>
                                <tr>
                                    <th>Kode Kriteria</th>
                                    <th>Nama Kriteria</th>
                                    <th>Bobot</th>
                                    <th>Jenis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kriteria as $row) : ?>
                                    <tr>
                                        <td><?= ucwords($row['kode_kriteria']); ?></td>
                                        <td><?= ucwords($row['nama_kriteria']); ?></td>
                                        <td><?= ucwords($row['bobot']); ?></td>
                                        <td><?= ucwords($row['jenis']); ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-warning fa fa-pencil-square-o" style="margin-right: 5px;" data-toggle="modal" data-target="#editModal<?= $row['id'] ?>"></button>
                                                <button href="#" data-href="<?= base_url('kriteria_penilaian/' . $row['id']) ?>" onclick="confirmToDelete(this)" class="btn btn-sm btn-danger fa fa-trash"></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header dash_head">
                <h4 class="modal-title text-white font-weight-normal" id="modalTambahTitle">Tambah Kriteria Penilaian</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-padding">
                <!-- Form tambah data disini -->
                <form action="<?= base_url('kriteria_penilaian/store') ?>" method="post">
                    <div class="form-group">
                        <label for="kode_kriteria">Kode Kriteria</label>
                        <input type="text" class="form-control" id="kode_kriteria" name="kode_kriteria" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_kriteria">Nama Kriteria</label>
                        <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" required>
                    </div>
                    <div class="form-group">
                        <label for="bobot">Bobot</label>
                        <input type="float" class="form-control" id="bobot" name="bobot" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <select class="form-control" id="jenis" name="jenis">
                            <option value="Benefit">Benefit</option>
                            <option value="Cost">Cost</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Data -->
<?php foreach ($kriteria as $row) : ?>
    <div class="modal fade" id="editModal<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalTitle<?= $row['id'] ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role=" document">
            <div class="modal-content">
                <div class="modal-header dash_head">
                    <h4 class="modal-title text-white font-weight-normal" id="editModalTitle<?= $row['id'] ?>">Edit Kriteria Penilaian</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-padding">
                    <!-- Form edit data disini -->
                    <form action="<?= base_url('kriteria_penilaian/update') ?>" method="post">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <div class="form-group">
                            <label for="kode_kriteria">Kode Kriteria</label>
                            <input type="text" class="form-control" id="kode_kriteria" name="kode_kriteria" required value="<?= $row['kode_kriteria'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="nama_kriteria">Nama Kriteria</label>
                            <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" required value="<?= $row['nama_kriteria'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="bobot">Bobot</label>
                            <input type="float" class="form-control" id="bobot" name="bobot" required value="<?= $row['bobot'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis</label>
                            <select class="form-control" id="jenis" name="jenis">
                                <option value="Benefit" <?= $row['jenis'] == 'Benefit' ? 'selected' : '' ?>>Benefit</option>
                                <option value="Cost" <?= $row['jenis'] == 'Cost' ? 'selected' : '' ?>>Cost</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<div id="confirm-dialog" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center"> <!-- Tambahkan class text-center -->
                <h4 class="h2">Apa Anda Yakin ??</h4>
                <p>Data tersebut akan terhapus dan hilang selamanya</p>
            </div>
            <div class="modal-footer justify-content-center"> <!-- Tambahkan class justify-content-center -->
                <a href="#" role="button" id="delete-button" class="btn btn-danger">Hapus</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<!-- footer -->
<div class="container-fluid">
    <div class="footer">
        <p>Copyright © 2024 Designed and built with all the love by the Taro & Friend.</p>
    </div>
</div>

<?= $this->endSection(); ?>