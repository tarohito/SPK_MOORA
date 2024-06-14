<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Penilaian Karyawan </h2>
            </div>
        </div>
    </div>

    <div class="row column1">

        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head dash_head d-flex justify-content-between align-items-center">
                    <div class="heading1 margin_0">
                        <h2 class="text-white">List Penilaian Karyawan</h2>
                    </div>
                    <div>
                        <button type="button" class="btn btn-success" style="margin-right: 10px;" data-toggle="modal" data-target="#formTambahData"><i class="fa fa-plus"></i>&nbsp;Tambah Data</button>
                    </div>
                </div>
                <div class="table_section padding_infor_info">
                    <div class="table-responsive-sm">
                        <table id="myTable" class="table">
                            <thead>
                                <tr>
                                    <th>Nama Karyawan</th>
                                    <th>Sikap & Etika Kerja (K1)</th>
                                    <th>Absensi (K2)</th>
                                    <th>Target Pekerjaan (K3)</th>
                                    <th>Inisiatif Pekerjaan (K4)</th>
                                    <th>Lama Kerja (K5)</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($penilaian_karyawan as $row) : ?>
                                    <tr>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['k1_ket'] ?></td>
                                        <td><?= $row['k2_ket'] ?></td>
                                        <td><?= $row['k3_ket'] ?></td>
                                        <td><?= $row['k4_ket'] ?></td>
                                        <td><?= $row['k5'] ?> Tahun</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-warning fa fa-pencil" data-toggle="modal" data-target="#editModal<?= $row['id'] ?>"></button>
                                                <button href="#" data-href="<?= base_url('penilaian_karyawan/' . $row['id']) ?>" onclick="confirmToDelete(this)" class="btn btn-sm btn-danger fa fa-trash"></button>
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

        <!-- tabel konversi -->
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head dash_head d-flex justify-content-between align-items-center">
                    <div class="heading1 margin_0">
                        <h2 class="text-white">Tabel Konversi Penilaian</h2>
                    </div>
                </div>
                <div class="table_section padding_infor_info">
                    <div class="table-responsive-sm">
                        <table id="myTable2" class="table">
                            <thead>
                                <tr>
                                    <th>Nama Karyawan</th>
                                    <th>(K1)</th>
                                    <th>(K2)</th>
                                    <th>(K3)</th>
                                    <th>(K4)</th>
                                    <th>(K5)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($penilaian_karyawan as $row) : ?>
                                    <tr>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['k1'] ?></td>
                                        <td><?= $row['k2'] ?></td>
                                        <td><?= $row['k3'] ?></td>
                                        <td><?= $row['k4'] ?></td>
                                        <td>
                                            <?php
                                            $k5_value = $row['k5'];
                                            if ($k5_value > 10) {
                                                echo 5;
                                            } elseif ($k5_value >= 6 && $k5_value <= 10) {
                                                echo 3;
                                            } else {
                                                echo 1;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- create -->
        <div class="modal fade" id="formTambahData" tabindex="-1" role="dialog" aria-labelledby="modalTambahTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header dash_head">
                        <h4 class="modal-title text-white font-weight-normal" id="modalTambahTitle">Tambah Penilaian Karyawan</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-padding">
                        <form action="<?= base_url('penilaian_karyawan/store') ?>" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="nama">Nama Karyawan</label>
                                    <select class="form-control" name="karyawan_id" id="karyawan_id" required>
                                        <option value="" disabled selected>Pilih Karyawan</option>
                                        <?php foreach ($karyawan as $k) : ?>
                                            <option value="<?= $k['id'] ?>"><?= $k['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <?php foreach ($kriteria as $k) : ?>
                                    <?php if ($k['kode_kriteria'] != 'K5') : ?>
                                        <div class="form-group col-md-6">
                                            <label for="<?= strtolower($k['kode_kriteria']) ?>"><?= $k['nama_kriteria'] ?> (<?= $k['kode_kriteria'] ?>)</label>
                                            <select class="form-control" name="<?= strtolower($k['kode_kriteria']) ?>" id="<?= strtolower($k['kode_kriteria']) ?>" required>
                                                <option value="" disabled selected>Pilih Sub Kriteria</option>
                                                <?php foreach ($sub_kriteria as $sk) : ?>
                                                    <?php if ($sk['kriteria_id'] == $k['id']) : ?>
                                                        <option value="<?= $sk['nilai'] ?>"><?= $sk['keterangan'] ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <div class="form-group col-md-6">
                                    <label for="k5">Lama Kerja (K5)</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="k5" name="k5" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Tahun</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- edit -->
        <?php foreach ($penilaian_karyawan as $a) : ?>
            <div class="modal fade" id="editModal<?= $a['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalTitle<?= $a['id'] ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header dash_head">
                            <h4 class="modal-title text-white font-weight-normal" id="editModalTitle<?= $a['id'] ?>">Edit
                                Data Karyawan</h4>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body modal-padding">
                            <form action="<?= base_url('penilaian_karyawan/update/') ?>" method="post">
                                <input type="hidden" name="id" value="<?= $a['id'] ?>">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="edit_karyawan_id">Nama Karyawan</label>
                                        <select class="form-control" name="edit_karyawan_id" id="edit_karyawan_id">
                                            <option value="" disabled>Pilih Karyawan</option>
                                            <?php foreach ($karyawan as $k) : ?>
                                                <option value="<?= $k['id'] ?>" <?= $k['id'] == $a['karyawan_id'] ? 'selected' : '' ?>><?= $k['name'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <?php foreach ($kriteria as $k) : ?>
                                        <?php if ($k['kode_kriteria'] != 'K5') : ?>
                                            <div class="form-group col-md-6">
                                                <label for="<?= 'edit_kriteria_' . $k['id'] ?>"><?= $k['nama_kriteria'] ?> (<?= $k['kode_kriteria'] ?>)</label>
                                                <select class="form-control" name="edit_sub_kriteria[<?= $k['kode_kriteria'] ?>]" id="edit_sub_kriteria_<?= $k['id'] ?>">
                                                    <option value="" disabled>Pilih Sub Kriteria</option>
                                                    <?php foreach ($sub_kriteria as $sk) : ?>
                                                        <?php if ($sk['kriteria_id'] == $k['id']) : ?>
                                                            <?php
                                                            $kolom_kriteria = strtolower($k['kode_kriteria']);
                                                            $selected = ($sk['nilai'] == $a[$kolom_kriteria]) ? 'selected' : '';
                                                            ?>
                                                            <option value="<?= $sk['nilai'] ?>" <?= $selected ?>>
                                                                <?= $sk['keterangan'] ?>
                                                            </option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <div class="form-group col-md-6">
                                        <label for="k5">Lama Kerja (K5)</label>
                                        <div class="input-group">
                                            <input type="number" value="<?= $a['k5'] ?>" class="form-control" id="k5" name="k5" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Tahun</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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


    </div>
</div>

<!-- footer -->
<div class="container-fluid">
    <div class="footer">
        <p>Copyright © 2024 Designed and built with all the love by the Taro & Friend.</p>
    </div>
</div>


<?= $this->endSection() ?>