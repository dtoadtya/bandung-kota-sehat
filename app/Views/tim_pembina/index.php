<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .page-wrapper {
        background: #f4f8fc;
        min-height: calc(100vh - 70px);
        padding: 28px;
    }

    /* =========================================================
       HEADER
    ========================================================= */

    .page-header {
        background: linear-gradient(135deg, #eef7ff, #e5f2ff);
        border-left: 6px solid #1687e8;
        border-radius: 14px;
        padding: 26px 30px;
        margin-bottom: 24px;
        position: relative;
        overflow: hidden;
    }

    .page-header::after {
        content: "";
        position: absolute;
        width: 150px;
        height: 150px;
        right: -40px;
        top: -70px;
        background: rgba(22, 135, 232, 0.08);
        border-radius: 50%;
    }

    .page-header h1 {
        margin: 0 0 7px;
        color: #07366d;
        font-size: 30px;
        font-weight: 800;
    }

    .page-header p {
        margin: 0;
        color: #5d7898;
        font-size: 14px;
        line-height: 1.6;
    }

    /* =========================================================
       GRID
    ========================================================= */

    .menu-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    /* =========================================================
       CARD
    ========================================================= */

    .menu-card {
        background: #fff;
        border: 1px solid #d8e7f5;
        border-radius: 14px;
        min-height: 205px;
        padding: 24px;
        display: flex;
        align-items: flex-start;
        gap: 16px;
        box-sizing: border-box;
        transition: .2s ease;
    }

    .menu-card:hover {
        border-color: #087ff5;
        box-shadow: 0 8px 24px rgba(7, 79, 156, 0.08);
    }

    /* =========================================================
       ICON
    ========================================================= */

    .menu-icon {
        width: 52px;
        height: 52px;
        min-width: 52px;
        border-radius: 12px;
        background: #e8f3ff;
        color: #087ff5;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 24px;
    }

    /* =========================================================
       CONTENT
    ========================================================= */

    .menu-content {
        flex: 1;
        min-width: 0;
    }

    .menu-content h3 {
        margin: 2px 0 8px;
        color: #07366d;
        font-size: 20px;
        font-weight: 800;
    }

    .menu-content p {
        margin: 0 0 20px;
        color: #718096;
        font-size: 13px;
        line-height: 1.7;
        max-width: 430px;
    }

    /* =========================================================
       BUTTON
    ========================================================= */

    .btn-kelola {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;

        background: #087ff5;
        color: #fff;

        padding: 11px 18px;

        border-radius: 8px;

        text-decoration: none;

        font-size: 13px;
        font-weight: 700;

        transition: .2s ease;
    }

    .btn-kelola:hover {
        background: #066fd6;
        color: #fff;
        transform: translateY(-1px);
    }

    /* =========================================================
       ALERT
    ========================================================= */

    .alert-success {
        background: #eaf8f0;
        border: 1px solid #bce5cc;
        color: #237a45;
        padding: 12px 16px;
        border-radius: 9px;
        margin-bottom: 20px;
        font-size: 13px;
    }

    .alert-error {
        background: #fff1f1;
        border: 1px solid #f0c4c4;
        color: #b42323;
        padding: 12px 16px;
        border-radius: 9px;
        margin-bottom: 20px;
        font-size: 13px;
    }

    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 900px) {

        .menu-grid {
            grid-template-columns: 1fr;
        }

    }

    @media (max-width: 600px) {

        .page-wrapper {
            padding: 15px;
        }

        .page-header {
            padding: 22px;
        }

        .page-header h1 {
            font-size: 24px;
        }

        .menu-card {
            padding: 20px;
        }

        .menu-content h3 {
            font-size: 18px;
        }

        .menu-content p {
            font-size: 12px;
        }

        .btn-kelola {
            font-size: 12px;
            padding: 10px 15px;
        }

    }
</style>


<div class="page-wrapper">

    <!-- =====================================================
         HEADER
    ====================================================== -->

    <div class="page-header">

        <h1>Tim Pembina</h1>

        <p>
            Kelola data kelembagaan Tim Pembina Bandung Sehat.
        </p>

    </div>


    <!-- =====================================================
         ALERT SUCCESS
    ====================================================== -->

    <?php if (session()->getFlashdata('success')) : ?>

        <div class="alert-success">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>

    <?php endif; ?>


    <!-- =====================================================
         ALERT ERROR
    ====================================================== -->

    <?php if (session()->getFlashdata('error')) : ?>

        <div class="alert-error">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>

    <?php endif; ?>


    <!-- =====================================================
         MENU GRID
    ====================================================== -->

    <div class="menu-grid">


        <!-- =================================================
             SK
        ================================================== -->

        <div class="menu-card">

            <div class="menu-icon">
                <i class="bi bi-file-earmark-pdf"></i>
            </div>

            <div class="menu-content">

                <h3>SK</h3>

                <p>
                    Upload Surat Keputusan Tim Pembina.
                    File harus berupa PDF dengan ukuran
                    maksimal 2 MB.
                </p>

                <a
                    href="<?= base_url('tim-pembina/sk') ?>"
                    class="btn-kelola"
                >
                    <i class="bi bi-upload"></i>
                    Kelola SK
                </a>

            </div>

        </div>


        <!-- =================================================
             RENCANA KERJA
        ================================================== -->

        <div class="menu-card">

            <div class="menu-icon">
                <i class="bi bi-journal-text"></i>
            </div>

            <div class="menu-content">

                <h3>Rencana Kerja</h3>

                <p>
                    Kelola rencana kerja Tim Pembina
                    berdasarkan tahun yang dapat
                    ditentukan sendiri.
                </p>

                <a
                    href="<?= base_url('tim-pembina/rencana-kerja') ?>"
                    class="btn-kelola"
                >
                    <i class="bi bi-journal-check"></i>
                    Kelola Rencana Kerja
                </a>

            </div>

        </div>


        <!-- =================================================
             REALISASI KEGIATAN
        ================================================== -->

        <div class="menu-card">

            <div class="menu-icon">
                <i class="bi bi-bar-chart-fill"></i>
            </div>

            <div class="menu-content">

                <h3>Realisasi Kegiatan</h3>

                <p>
                    Input laporan kegiatan, waktu,
                    peserta, hasil pelaksanaan,
                    anggaran dan sumber pendanaan.
                </p>

                <a
                    href="<?= base_url('tim-pembina/realisasi') ?>"
                    class="btn-kelola"
                >
                    <i class="bi bi-clipboard-data"></i>
                    Kelola Realisasi
                </a>

            </div>

        </div>


        <!-- =================================================
             FOTO KEGIATAN
        ================================================== -->

        <div class="menu-card">

            <div class="menu-icon">
                <i class="bi bi-camera-fill"></i>
            </div>

            <div class="menu-content">

                <h3>Foto Sekretariat</h3>

                <p>
                    Upload foto sekretariat Tim Pembina.
                </p>

                <a
                    href="<?= base_url('tim-pembina/foto-kegiatan') ?>"
                    class="btn-kelola"
                >
                    <i class="bi bi-image"></i>
                    Kelola Foto
                </a>

            </div>

        </div>


    </div>

</div>


<?= $this->endSection() ?>