<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Sub Kriteria</h2>
            </div>
        </div>
    </div>
    <?php foreach ($kriteria as $row) : ?>
        <div class="row column1">
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head dash_head d-flex justify-content-between align-items-center">
                        <div class="heading1 margin_0">
                            <h2 class="text-white"><?= $row['nama_kriteria'] ?> (<?= $row['kode_kriteria'] ?>)</h2>
                        </div>
                        <div>
                            <button type="button" class="btn btn-success" style="margin-right: 10px;" data-toggle="modal" data-target="#modalTambah<?= $row['id'] ?>"><i class="fa fa-plus"></i>&nbsp;Tambah Data</button>
                        </div>
                    </div>
                    <div class="table_section padding_infor_info">
                        <div class="table-responsive-sm">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sub Kriteria</th>
                                        <th>Keterangan</th>
                                        <th>Nilai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($sub_kriteria as $a) : ?>
                                        <?php if ($a['kriteria_id'] == $row['id']) : ?>
                                            <tr>
                                                <td><?= $a['nama_kriteria'] ?></td>
                                                <td><?= $a['keterangan'] ?></td>
                                                <td><?= $a['nilai'] ?></td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal<?= $a['id'] ?>">Edit</button>
                                                        <button href="#" data-href="<?= base_url('sub_kriteria/' . $a['id']) ?>" onclick="confirmToDelete(this)" class="btn btn-sm btn-danger fa fa-trash"></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Tambah -->
        <div class="modal fade" id="modalTambah<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalTambahTitle<?= $row['id'] ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header dash_head">
                        <h4 class="modal-title text-white font-weight-normal" id="modalTambahTitle<?= $row['id'] ?>">Tambah Sub Kriteria</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-padding">
                        <!-- Form tambah data disini -->
                        <form action="<?= base_url('sub_kriteria/store') ?>" method="post">
                            <input type="hidden" name="kriteria_id" value="<?= $row['id'] ?>">
                            <div class="form-group">
                                <label for="keterangan">Kriteria</label>
                                <input type="text" class="form-control" value="<?= $row['nama_kriteria'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                            </div>
                            <div class="form-group">
                                <label for="nilai">Nilai</label>
                                <input type="number" class="form-control" id="nilai" name="nilai" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        <?php foreach ($sub_kriteria as $a) : ?>
            <?php if ($a['kriteria_id'] == $row['id']) : ?>
                <div class="modal fade" id="editModal<?= $a['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalTitle<?= $a['id'] ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role=" document">
                        <div class="modal-content">
                            <div class="modal-header dash_head">
                                <h4 class="modal-title text-white font-weight-normal" id="editModalTitle<?= $a['id'] ?>">Edit Sub Kriteria</h4>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body modal-padding">
                                <!-- Form edit data disini -->
                                <form action="<?= base_url('sub_kriteria/update') ?>" method="post">
                                    <input type="hidden" name="id" value="<?= $a['id'] ?>">
                                    <div class="form-group">
                                        <label for="kriteria_id">Kriteria</label>
                                        <select class="form-control" name="kriteria_id" id="kriteria_id">
                                            <?php foreach ($kriteria as $k) : ?>
                                                <option value="<?= $k['id'] ?>" <?= $k['id'] == $a['kriteria_id'] ? 'selected' : '' ?>><?= $k['nama_kriteria'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <input type="text" class="form-control" id="keterangan" name="keterangan" required value="<?= $a['keterangan'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="nilai">Nilai</label>
                                        <input type="number" class="form-control" id="nilai" name="nilai" required value="<?= $a['nilai'] ?>">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endforeach ?>


    <!-- delete -->
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

    <?= $this->endSection() ?>