<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

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
                                    <th>Kode</th>
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

        <!-- Modal Tambah Data -->
        <div class="modal fade" id="formTambahData" tabindex="-1" role="dialog" aria-labelledby="modalTambahTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header dash_head">
                        <h4 class="modal-title text-white font-weight-normal" id="modalTambahTitle">Tambah Data Karyawan</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-padding">
                        <!-- Form tambah data disini -->
                        <form action="<?= base_url('data_karyawan/store') ?>" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="kode">Kode</label>
                                    <input type="text" class="form-control" id="kode" name="kode" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nama">Nama Karyawan</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="sikap_etika">Sikap & Etika Kerja (K1)</label>
                                    <input type="text" class="form-control" id="sikap_etika" name="sikap_etika" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="absensi">Absensi (K2)</label>
                                    <input type="text" class="form-control" id="absensi" name="absensi" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="target_pekerjaan">Target Pekerjaan (K3)</label>
                                    <input type="text" class="form-control" id="target_pekerjaan" name="target_pekerjaan" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inisiatif_pekerjaan">Inisiatif Pekerjaan (K4)</label>
                                    <input type="text" class="form-control" id="inisiatif_pekerjaan" name="inisiatif_pekerjaan" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="lama_kerja">Lama Kerja (K5)</label>
                                    <input type="text" class="form-control" id="lama_kerja" name="lama_kerja" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
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


<?= $this->endSection(); ?>