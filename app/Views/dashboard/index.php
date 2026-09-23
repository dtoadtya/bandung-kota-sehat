<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<?php
$role = session()->get('role') ?? ($role ?? 'user');
$nama = session()->get('nama') ?? ($username ?? 'Pengguna');

$isAdmin = in_array(
    $role,
    ['admin', 'super_admin'],
    true
);
?>

<style>

/* =========================================================
   DASHBOARD
   Struktur tetap, hanya penyelarasan warna
========================================================= */

.dashboard-page {
    width: 100%;
}


/* =========================================================
   WELCOME HEADER
========================================================= */

.dashboard-welcome {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 18px;
}

.dashboard-welcome-left h1 {
    margin: 0;
    color: #063b78;
    font-size: 24px;
    font-weight: 800;
    letter-spacing: -.3px;
}

.dashboard-welcome-left p {
    margin: 5px 0 0;
    color: #69839e;
    font-size: 13px;
}

.dashboard-location {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 9px 13px;
    background: #ffffff;
    border: 1px solid #dcebf8;
    border-radius: 9px;
    color: #063b78;
    font-size: 12px;
    font-weight: 700;
    box-shadow: 0 4px 14px rgba(6, 59, 120, .05);
}

.dashboard-location i {
    color: #087df5;
}


/* =========================================================
   STAT CARDS
========================================================= */

.dashboard-stats {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 14px;
    margin-bottom: 14px;
}

.dashboard-stat-card {
    position: relative;
    min-height: 100px;
    overflow: hidden;

    background: #ffffff;

    border: 1px solid #f8dedc;
    border-radius: 10px;

    padding: 16px;

    box-shadow:
        0 5px 18px
        rgba(6, 59, 120, .06);
}

.dashboard-stat-card::after {
    content: "";
    position: absolute;
    right: -20px;
    bottom: -25px;

    width: 72px;
    height: 72px;

    border-radius: 50%;

    background: #edf6ff;
}

.dashboard-stat-card.blue::after {
    background: #edf6ff;
}

.dashboard-stat-card.green::after {
    background: #edf9f2;
}

.dashboard-stat-card.gold::after {
    background: #fff9e8;
}

.dashboard-stat-card.cyan::after {
    background: #edfaff;
}

.dashboard-stat-card.purple::after {
    background: #f5efff;
}

.dashboard-stat-top {
    position: relative;
    z-index: 2;

    display: flex;
    align-items: flex-start;
    justify-content: space-between;
}

.dashboard-stat-label {
    color: #000000;
    font-size: 11px;
    font-weight: 700;
}

.dashboard-stat-icon {
    width: 30px;
    height: 30px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 7px;

    font-size: 14px;
}

.dashboard-stat-card.blue .dashboard-stat-icon {
    background: #edf6ff;
    color: #087df5;
}

.dashboard-stat-card.green .dashboard-stat-icon {
    background: #edf9f2;
    color: #16a34a;
}

.dashboard-stat-card.gold .dashboard-stat-icon {
    background: #fff8df;
    color: #d99b00;
}

.dashboard-stat-card.cyan .dashboard-stat-icon {
    background: #edfaff;
    color: #0891b2;
}

.dashboard-stat-card.purple .dashboard-stat-icon {
    background: #f5efff;
    color: #7c3aed;
}

.dashboard-stat-value {
    position: relative;
    z-index: 2;

    margin-top: 9px;

    color: #063b78;
    font-size: 20px;
    line-height: 1;
    font-weight: 800;
}

.dashboard-stat-description {
    position: relative;
    z-index: 2;

    margin-top: 6px;

    color: #7890a7;
    font-size: 9px;
}


/* =========================================================
   CHART AREA
========================================================= */

.dashboard-chart-grid {
    display: grid;
    grid-template-columns: minmax(0, 1.7fr) minmax(280px, .9fr);
    gap: 14px;
    margin-bottom: 14px;
}

.dashboard-panel {
    background: #ffffff;

    border: 1px solid #dcebf8;
    border-radius: 10px;

    box-shadow:
        0 5px 18px
        rgba(6, 59, 120, .06);

    overflow: hidden;
}

.dashboard-panel-header {
    padding: 13px 15px 0;
}

.dashboard-panel-title {
    margin: 0;

    color: #063b78;

    font-size: 12px;
    font-weight: 800;
}

.dashboard-panel-subtitle {
    margin-top: 3px;

    color: #8a9caf;

    font-size: 9px;
}

.dashboard-chart {
    position: relative;

    height: 160px;

    padding: 8px 14px 12px;
}


/* =========================================================
   DONUT
========================================================= */

.dashboard-donut {
    height: 160px;

    display: flex;
    align-items: center;
    justify-content: center;

    position: relative;
}

.dashboard-donut canvas {
    max-width: 150px;
    max-height: 150px;
}


/* =========================================================
   BOTTOM GRID
========================================================= */

.dashboard-bottom-grid {
    display: grid;
    grid-template-columns: minmax(0, 1.3fr) minmax(0, 1fr);
    gap: 14px;
}

.dashboard-summary {
    padding: 12px 14px 14px;

    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 7px;
}

.dashboard-summary-item {
    border: 1px solid #dcebf8;
    border-radius: 7px;

    padding: 9px 10px;

    background: #fbfdff;
}

.dashboard-summary-label {
    color: #7890a7;
    font-size: 8px;
}

.dashboard-summary-value {
    margin-top: 4px;

    color: #063b78;

    font-size: 14px;
    font-weight: 800;
}


/* =========================================================
   QUICK ACTION
========================================================= */

.dashboard-actions {
    padding: 12px 14px 14px;

    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 7px;
}

.dashboard-action {
    display: flex;
    align-items: center;
    gap: 9px;

    min-height: 39px;

    padding: 7px 9px;

    border: 1px solid #dcebf8;
    border-radius: 7px;

    background: #ffffff;

    text-decoration: none;

    transition: .18s ease;
}

.dashboard-action:hover {
    background: #f6fbff;
    border-color: #b9d9f5;
    transform: translateY(-1px);
}

.dashboard-action-icon {
    width: 27px;
    height: 27px;

    flex: 0 0 27px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 6px;

    background: #edf6ff;
    color: #087df5;

    font-size: 12px;
}

.dashboard-action-text {
    min-width: 0;
}

.dashboard-action-title {
    color: #063b78;

    font-size: 9px;
    font-weight: 800;
}

.dashboard-action-description {
    margin-top: 2px;

    color: #8a9caf;

    font-size: 7px;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 1100px) {

    .dashboard-stats {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .dashboard-chart-grid {
        grid-template-columns: 1fr;
    }

    .dashboard-bottom-grid {
        grid-template-columns: 1fr;
    }
}


@media (max-width: 700px) {

    .dashboard-welcome {
        align-items: flex-start;
        flex-direction: column;
    }

    .dashboard-stats {
        grid-template-columns: 1fr;
    }

    .dashboard-summary {
        grid-template-columns: 1fr;
    }

    .dashboard-actions {
        grid-template-columns: 1fr;
    }

    .dashboard-welcome-left h1 {
        font-size: 21px;
    }
}

</style>


<div class="dashboard-page">


    <!-- =====================================================
         WELCOME
    ====================================================== -->

    <div class="dashboard-welcome">

        <div class="dashboard-welcome-left">

            <h1>
                Selamat Datang
            </h1>

            <p>
                Ringkasan data program Bandung Kota Sehat.
            </p>

        </div>

    </div>



    <!-- =====================================================
         STAT CARDS
    ====================================================== -->

    <div class="dashboard-stats">


        <!-- KECAMATAN -->

        <div class="dashboard-stat-card blue">

            <div class="dashboard-stat-top">

                <div class="dashboard-stat-label">
                    Kecamatan
                </div>

                <div class="dashboard-stat-icon">

                    <i class="bi bi-map"></i>

                </div>

            </div>


            <div class="dashboard-stat-value">

                <?= esc(
                    $jumlahKecamatan ?? 0
                ) ?>

            </div>


            <div class="dashboard-stat-description">

                Jumlah kecamatan tercatat

            </div>

        </div>



        <!-- KELURAHAN -->

        <div class="dashboard-stat-card green">

            <div class="dashboard-stat-top">

                <div class="dashboard-stat-label">
                    Kelurahan
                </div>

                <div class="dashboard-stat-icon">

                    <i class="bi bi-buildings"></i>

                </div>

            </div>


            <div class="dashboard-stat-value">

                <?= esc(
                    $jumlahKelurahan ?? 0
                ) ?>

            </div>


            <div class="dashboard-stat-description">

                Jumlah kelurahan tercatat

            </div>

        </div>



        <!-- TIM PEMBINA -->

        <div class="dashboard-stat-card gold">

            <div class="dashboard-stat-top">

                <div class="dashboard-stat-label">
                    Tim Pembina
                </div>

                <div class="dashboard-stat-icon">

                    <i class="bi bi-people"></i>

                </div>

            </div>


            <div class="dashboard-stat-value">

                <?= esc(
                    $jumlahTimPembina ?? 0
                ) ?>

            </div>


            <div class="dashboard-stat-description">

                Data Tim Pembina Bandung Sehat

            </div>

        </div>



        <!-- FORUM KECAMATAN -->

        <div class="dashboard-stat-card cyan">

            <div class="dashboard-stat-top">

                <div class="dashboard-stat-label">
                    Forum Kecamatan
                </div>

                <div class="dashboard-stat-icon">

                    <i class="bi bi-chat-square-text"></i>

                </div>

            </div>


            <div class="dashboard-stat-value">

                <?= esc(
                    $jumlahForumKecamatan ?? 0
                ) ?>

            </div>


            <div class="dashboard-stat-description">

                Data Forum Kecamatan Sehat

            </div>

        </div>



        <!-- POKJA -->

        <div class="dashboard-stat-card purple">

            <div class="dashboard-stat-top">

                <div class="dashboard-stat-label">
                    Pokja Kelurahan
                </div>

                <div class="dashboard-stat-icon">

                    <i class="bi bi-diagram-3"></i>

                </div>

            </div>


            <div class="dashboard-stat-value">

                <?= esc(
                    $jumlahPokja ?? 0
                ) ?>

            </div>


            <div class="dashboard-stat-description">

                Data Pokja Kelurahan Sehat

            </div>

        </div>


    </div>



    <!-- =====================================================
         CHARTS
    ====================================================== -->

    <div class="dashboard-chart-grid">


        <!-- LINE CHART -->

        <div class="dashboard-panel">

            <div class="dashboard-panel-header">

                <h3 class="dashboard-panel-title">
                    Statistik Program
                </h3>

                <div class="dashboard-panel-subtitle">
                    Ringkasan jumlah data pada sistem
                </div>

            </div>


            <div class="dashboard-chart">

                <canvas id="dataChart"></canvas>

            </div>

        </div>



        <!-- DONUT CHART -->

        <div class="dashboard-panel">

            <div class="dashboard-panel-header">

                <h3 class="dashboard-panel-title">
                    Distribusi Data
                </h3>

                <div class="dashboard-panel-subtitle">
                    Perbandingan data program
                </div>

            </div>


            <div class="dashboard-donut">

                <canvas id="donutChart"></canvas>

            </div>

        </div>


    </div>



    <!-- =====================================================
         BOTTOM
    ====================================================== -->

    <div class="dashboard-bottom-grid">


        <!-- RINGKASAN SISTEM -->

        <div class="dashboard-panel">

            <div class="dashboard-panel-header">

                <h3 class="dashboard-panel-title">
                    Ringkasan Sistem
                </h3>

            </div>


            <div class="dashboard-summary">


                <div class="dashboard-summary-item">

                    <div class="dashboard-summary-label">
                        Kecamatan
                    </div>

                    <div class="dashboard-summary-value">

                        <?= esc(
                            $jumlahKecamatan ?? 0
                        ) ?>

                    </div>

                </div>


                <div class="dashboard-summary-item">

                    <div class="dashboard-summary-label">
                        Kelurahan
                    </div>

                    <div class="dashboard-summary-value">

                        <?= esc(
                            $jumlahKelurahan ?? 0
                        ) ?>

                    </div>

                </div>


                <div class="dashboard-summary-item">

                    <div class="dashboard-summary-label">
                        Tim Pembina
                    </div>

                    <div class="dashboard-summary-value">

                        <?= esc(
                            $jumlahTimPembina ?? 0
                        ) ?>

                    </div>

                </div>


                <div class="dashboard-summary-item">

                    <div class="dashboard-summary-label">
                        Forum Kecamatan
                    </div>

                    <div class="dashboard-summary-value">

                        <?= esc(
                            $jumlahForumKecamatan ?? 0
                        ) ?>

                    </div>

                </div>


                <div class="dashboard-summary-item">

                    <div class="dashboard-summary-label">
                        Pokja Kelurahan
                    </div>

                    <div class="dashboard-summary-value">

                        <?= esc(
                            $jumlahPokja ?? 0
                        ) ?>

                    </div>

                </div>


            </div>

        </div>



        <!-- AKSES CEPAT -->

        <div class="dashboard-panel">

            <div class="dashboard-panel-header">

                <h3 class="dashboard-panel-title">
                    Akses Cepat
                </h3>

            </div>


            <div class="dashboard-actions">


                <a
                    href="<?= base_url(
                        'tim-pembina'
                    ) ?>"
                    class="dashboard-action"
                >

                    <div class="dashboard-action-icon">

                        <i class="bi bi-people"></i>

                    </div>

                    <div class="dashboard-action-text">

                        <div class="dashboard-action-title">
                            Tim Pembina
                        </div>

                        <div class="dashboard-action-description">
                            Kelola data
                        </div>

                    </div>

                </a>



                <?php if ($isAdmin): ?>

                    <a
                        href="<?= base_url(
                            'forum-bandung-sehat'
                        ) ?>"
                        class="dashboard-action"
                    >

                        <div class="dashboard-action-icon">

                            <i class="bi bi-building"></i>

                        </div>

                        <div class="dashboard-action-text">

                            <div class="dashboard-action-title">
                                Forum Bandung
                            </div>

                            <div class="dashboard-action-description">
                                Kelola data
                            </div>

                        </div>

                    </a>

                <?php endif; ?>



                <a
                    href="<?= base_url(
                        'forum-kecamatan-sehat'
                    ) ?>"
                    class="dashboard-action"
                >

                    <div class="dashboard-action-icon">

                        <i class="bi bi-chat-square-text"></i>

                    </div>

                    <div class="dashboard-action-text">

                        <div class="dashboard-action-title">
                            Forum Kecamatan
                        </div>

                        <div class="dashboard-action-description">
                            Kelola forum
                        </div>

                    </div>

                </a>



                <a
                    href="<?= base_url(
                        'pokja-kelurahan-sehat'
                    ) ?>"
                    class="dashboard-action"
                >

                    <div class="dashboard-action-icon">

                        <i class="bi bi-diagram-3"></i>

                    </div>

                    <div class="dashboard-action-text">

                        <div class="dashboard-action-title">
                            Pokja Kelurahan
                        </div>

                        <div class="dashboard-action-description">
                            Kelola pokja
                        </div>

                    </div>

                </a>


            </div>

        </div>


    </div>


</div>



<!-- =========================================================
     CHART.JS
========================================================= -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {


        /* =====================================================
           DATA
        ====================================================== */

        const jumlahKecamatan =
            <?= (int) (
                $jumlahKecamatan ?? 0
            ) ?>;

        const jumlahKelurahan =
            <?= (int) (
                $jumlahKelurahan ?? 0
            ) ?>;

        const jumlahTimPembina =
            <?= (int) (
                $jumlahTimPembina ?? 0
            ) ?>;

        const jumlahForumKecamatan =
            <?= (int) (
                $jumlahForumKecamatan ?? 0
            ) ?>;

        const jumlahPokja =
            <?= (int) (
                $jumlahPokja ?? 0
            ) ?>;



        /* =====================================================
           LINE CHART
        ====================================================== */

        const dataChartElement =
            document.getElementById(
                'dataChart'
            );


        if (dataChartElement) {

            new Chart(
                dataChartElement,
                {

                    type: 'line',

                    data: {

                        labels: [
                            'Kecamatan',
                            'Kelurahan',
                            'Tim Pembina',
                            'Forum Kec.',
                            'Pokja'
                        ],

                        datasets: [

                            {

                                data: [
                                    jumlahKecamatan,
                                    jumlahKelurahan,
                                    jumlahTimPembina,
                                    jumlahForumKecamatan,
                                    jumlahPokja
                                ],

                                borderColor:
                                    '#087df5',

                                backgroundColor:
                                    'rgba(8,125,245,.10)',

                                borderWidth: 2,

                                pointBackgroundColor:
                                    '#087df5',

                                pointBorderColor:
                                    '#ffffff',

                                pointBorderWidth:
                                    2,

                                pointRadius:
                                    3,

                                tension:
                                    .35,

                                fill:
                                    true

                            }

                        ]

                    },

                    options: {

                        responsive: true,

                        maintainAspectRatio:
                            false,

                        plugins: {

                            legend: {
                                display: false
                            }

                        },

                        scales: {

                            y: {

                                beginAtZero:
                                    true,

                                ticks: {

                                    color:
                                        '#7890a7',

                                    font: {
                                        size: 8
                                    },

                                    precision: 0

                                },

                                grid: {

                                    color:
                                        '#edf2f7'

                                }

                            },

                            x: {

                                ticks: {

                                    color:
                                        '#7890a7',

                                    font: {
                                        size: 8
                                    }

                                },

                                grid: {

                                    display:
                                        false

                                }

                            }

                        }

                    }

                }
            );

        }



        /* =====================================================
           DONUT CHART
        ====================================================== */

        const donutChartElement =
            document.getElementById(
                'donutChart'
            );


        if (donutChartElement) {

            new Chart(
                donutChartElement,
                {

                    type: 'doughnut',

                    data: {

                        labels: [
                            'Kecamatan',
                            'Kelurahan',
                            'Tim Pembina',
                            'Forum Kecamatan',
                            'Pokja'
                        ],

                        datasets: [

                            {

                                data: [
                                    jumlahKecamatan,
                                    jumlahKelurahan,
                                    jumlahTimPembina,
                                    jumlahForumKecamatan,
                                    jumlahPokja
                                ],

                                backgroundColor: [
                                    '#087df5',
                                    '#16a34a',
                                    '#f5b700',
                                    '#0891b2',
                                    '#7c3aed'
                                ],

                                borderColor:
                                    '#ffffff',

                                borderWidth:
                                    2

                            }

                        ]

                    },

                    options: {

                        responsive: true,

                        maintainAspectRatio:
                            false,

                        cutout:
                            '62%',

                        plugins: {

                            legend: {

                                position:
                                    'bottom',

                                labels: {

                                    color:
                                        '#69839e',

                                    boxWidth:
                                        8,

                                    boxHeight:
                                        8,

                                    padding:
                                        8,

                                    font: {
                                        size: 7
                                    }

                                }

                            }

                        }

                    }

                }
            );

        }

    }
);

</script>


<?= $this->endSection() ?>