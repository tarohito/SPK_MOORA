<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Dashboard Penilaian Kinerja Karyawan</h2>
            </div>
        </div>
    </div>

    <div class="row column1">
        <div class="col-md-6 col-lg-3">
            <div class="full counter_section margin_bottom_30 purple_bg">
                <div class="couter_icon">
                    <div>
                        <i class="fa fa-user"></i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                        <p class="total_no"><?= $totalKaryawan ?></p>
                        <p class="head_couter">Data Karyawan</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="full counter_section margin_bottom_30 yellow_bg">
                <div class="couter_icon">
                    <div>
                        <i class="fa fa-clock-o"></i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                        <p class="total_no">123.50</p>
                        <p class="head_couter">Average Time</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="full counter_section margin_bottom_30 green_bg">
                <div class="couter_icon">
                    <div>
                        <i class="fa fa-cloud-download"></i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                        <p class="total_no">1,805</p>
                        <p class="head_couter">Collections</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="full counter_section margin_bottom_30 red_bg">
                <div class="couter_icon">
                    <div>
                        <i class="fa fa-comments-o"></i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                        <p class="total_no">54</p>
                        <p class="head_couter">Comments</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<?= $this->endSection(); ?>