<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Data Alternatif</h2>
            </div>
        </div>
    </div>

    <div class="row column1">

        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head dash_head d-flex justify-content-between align-items-center">
                    <div class="heading1 margin_0">
                        <h2 class="text-white">List Data Alternatif</h2>
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
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="divisi">Jabatan</label>
                                    <input type="text" class="form-control" id="divisi" name="divisi" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="no_hp">No. HP</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" required></textarea>
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