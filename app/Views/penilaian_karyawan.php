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
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head dash_head d-flex justify-content-between align-items-center">
                    <div class="heading1 margin_0">
                        <h2 class="text-white">Tabel Konversi Penilaian</h2>
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
                        <h4 class="modal-title text-white font-weight-normal" id="modalTambahTitle">Tambah Penilaian Karyawan
                        </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-padding">
                        <form action="<?= base_url('penilaian_karyawan/store') ?>" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="nama">Nama Karyawan</label>
                                    <select class="form-control" name="karyawan_id" id="karyawan_id">
                                        <option value="" disabled selected>Pilih Karyawan</option>
                                        <?php foreach ($karyawan as $k) : ?>
                                            <option value="<?= $k['id'] ?>"><?= $k['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="k1">Sikap & Etika Kerja (K1)</label>
                                    <select class="form-control" name="k1" id="k1">
                                        <option value="" disabled selected>Pilih Sub Kriteria</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="k2">Absensi (K2)</label>
                                    <select class="form-control" name="karyawan_id" id="karyawan_id">
                                        <option value="" disabled selected>Pilih Sub Kriteria</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="k3">Target Pekerjaan (K3)</label>
                                    <select class="form-control" name="k1" id="k1">
                                        <option value="" disabled selected>Pilih Sub Kriteria</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="k4">Inisiatif Pekerjaan (K4)</label>
                                    <select class="form-control" name="karyawan_id" id="karyawan_id">
                                        <option value="" disabled selected>Pilih Sub Kriteria</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="k5">Lama Kerja (K5)</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="no_hp" name="no_hp" required>
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