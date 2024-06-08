<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

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
                            <h2 class="text-white"><?= $row['nama_kriteria']; ?></h2>
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
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- footer -->
<div class="container-fluid">
    <div class="footer">
        <p>Copyright © 2024 Designed and built with all the love by the Taro & Friend.</p>
    </div>
</div>

<?= $this->endSection(); ?>