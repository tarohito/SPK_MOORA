<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Hasil Penilaian</h2>
            </div>
        </div>
    </div>

    <div class="row column1">

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
                        <table id="myTable" class="table">
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
                                        <td><?= ucwords($row['name']) ?></td>
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

        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head dash_head d-flex justify-content-between align-items-center">
                    <div class="heading1 margin_0">
                        <h2 class="text-white">Tabel Matrik Normalisasi</h2>
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
                                    <?php
                                    $nilai_k1 = ($row['k1'] / $akar_k1);
                                    $nilai_k2 = ($row['k2'] / $akar_k2);
                                    $nilai_k3 = ($row['k3'] / $akar_k3);
                                    $nilai_k4 = ($row['k4'] / $akar_k4);

                                    $k5_value = $row['k5'];
                                    if ($k5_value > 10) {
                                        $nilai_k5 = (5 / $akar_k5);
                                    } elseif ($k5_value >= 6 && $k5_value <= 10) {
                                        $nilai_k5 = (3 / $akar_k5);
                                    } else {
                                        $nilai_k5 = (1 / $akar_k5);
                                    }
                                    ?>
                                    <tr>
                                        <td><?= ucwords($row['name']) ?></td>
                                        <td><?= formatAngka($nilai_k1) ?></td>
                                        <td><?= formatAngka($nilai_k2) ?></td>
                                        <td><?= formatAngka($nilai_k3) ?></td>
                                        <td><?= formatAngka($nilai_k4) ?></td>
                                        <td><?= formatAngka($nilai_k5) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head dash_head d-flex justify-content-between align-items-center">
                    <div class="heading1 margin_0">
                        <h2 class="text-white">Tabel Nilai Optimum Atribut</h2>
                    </div>
                </div>
                <div class="table_section padding_infor_info">
                    <div class="table-responsive-sm">
                        <table id="myTable3" class="table">
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
                                    <?php
                                    // Hitung nilai untuk setiap kolom
                                    $nilai_k1 = ($row['k1'] / $akar_k1) * $bobot_K1;
                                    $K1 = number_format($nilai_k1, 9, '.', '');
                                    $nilai_k2 = ($row['k2'] / $akar_k2) * $bobot_K2;
                                    $K2 = number_format($nilai_k2, 9, '.', '');
                                    $nilai_k3 = ($row['k3'] / $akar_k3) * $bobot_K3;
                                    $K3 = number_format($nilai_k3, 9, '.', '');
                                    $nilai_k4 = ($row['k4'] / $akar_k4) * $bobot_K4;
                                    $K4 = number_format($nilai_k4, 9, '.', '');

                                    $k5_value = $row['k5'];
                                    if ($k5_value > 10) {
                                        $nilai_K5 = (5 / $akar_k5) * $bobot_K5;
                                        $K5 = number_format($nilai_K5, 9, '.', '');
                                    } elseif ($k5_value >= 6 && $k5_value <= 10) {
                                        $nilai_K5 = (3 / $akar_k5) * $bobot_K5;
                                        $K5 = number_format($nilai_K5, 9, '.', '');
                                    } else {
                                        $nilai_K5 = (1 / $akar_k5) * $bobot_K5;
                                        $K5 = number_format($nilai_K5, 9, '.', '');
                                    }
                                    ?>
                                    <tr>
                                        <td><?= ucwords($row['name']) ?></td>
                                        <td><?= $K1 ?></td>
                                        <td><?= $K2 ?></td>
                                        <td><?= $K3 ?></td>
                                        <td><?= $K4 ?></td>
                                        <td><?= $nilai_K5 ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head dash_head d-flex justify-content-between align-items-center">
                    <div class="heading1 margin_0">
                        <h2 class="text-white">Tabel Perankingan</h2>
                    </div>
                </div>
                <div class="table_section padding_infor_info">
                    <div class="table-responsive-sm">
                        <table id="myTable4" class="table">
                            <thead>
                                <tr>
                                    <th>Nama Karyawan</th>
                                    <th>MAXIMUM</th>
                                    <th>MINIMUM</th>
                                    <th>Yi (MAX - MIN)</th>
                                    <th>Ranking</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Inisialisasi array untuk menyimpan nilai maksimum
                                $max_values = [];

                                foreach ($penilaian_karyawan as $row) :
                                    // Hitung nilai untuk setiap kolom
                                    $nilai_k1 = ($row['k1'] / $akar_k1) * $bobot_K1;
                                    $nilai_k2 = ($row['k2'] / $akar_k2) * $bobot_K2;
                                    $nilai_k3 = ($row['k3'] / $akar_k3) * $bobot_K3;
                                    $nilai_k4 = ($row['k4'] / $akar_k4) * $bobot_K4;

                                    $k5_value = $row['k5'];
                                    if ($k5_value > 10) {
                                        $nilai_k5 = (5 / $akar_k5) * $bobot_K5;
                                    } elseif ($k5_value >= 6 && $k5_value <= 10) {
                                        $nilai_k5 = (3 / $akar_k5) * $bobot_K5;
                                    } else {
                                        $nilai_k5 = (1 / $akar_k5) * $bobot_K5;
                                    }
                                    $maximum = ($nilai_k1 + $nilai_k3 + $nilai_k4 + $nilai_k5);

                                    // Simpan nilai maksimum ke dalam array
                                    $max_values[$row['name']] = $maximum;
                                ?>
                                    <tr>
                                        <td><?= ucwords($row['name']) ?></td>
                                        <td><?= $maximum ?></td>
                                        <td><?= $nilai_k2 ?></td>
                                        <td><?= ($maximum - $nilai_k2) ?></td>
                                        <td><!-- Isi dengan nilai Ranking --></td>
                                    </tr>
                                <?php endforeach;

                                // Sorting array untuk mendapatkan nilai maksimum terbesar
                                arsort($max_values);

                                // Ambil nama karyawan dengan nilai maksimum tertinggi
                                $best_employee = key($max_values);
                                $best_score = reset($max_values);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="padding_infor_info">
                    <div class="alert alert-info" role="alert">
                        Karyawan terbaik: <strong><?= $best_employee ?></strong> dengan nilai maksimum: <strong><?= $best_score ?></strong>
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