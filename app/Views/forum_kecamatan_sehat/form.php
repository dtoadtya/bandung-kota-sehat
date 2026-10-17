<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .menu-page {
        background: #f4f8fc;
        min-height: calc(100vh - 70px);
        padding: 28px;
    }

    .menu-header {
        background: linear-gradient(135deg, #eef7ff, #e5f2ff);
        border-left: 6px solid #1687e8;
        border-radius: 14px;
        padding: 28px 30px;
        margin-bottom: 24px;
    }

    .menu-header h1 {
        margin: 0 0 7px;
        color: #07366d;
        font-size: 30px;
        font-weight: 800;
    }

    .menu-header p {
        margin: 0;
        color: #5d7898;
        font-size: 14px;
    }

    .menu-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .menu-card {
        background: #fff;
        border: 1px solid #d8e7f5;
        border-radius: 14px;
        min-height: 205px;
        padding: 24px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: .2s ease;
    }

    .menu-card:hover {
        border-color: #087ff5;
        box-shadow: 0 8px 24px rgba(7, 79, 156, .10);
        transform: translateY(-1px);
    }

    .menu-top {
        display: flex;
        align-items: flex-start;
        gap: 16px;
    }

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
        font-size: 25px;
    }

    .menu-content h3 {
        margin: 2px 0 8px;
        color: #07366d;
        font-size: 20px;
        font-weight: 800;
    }

    .menu-content p {
        margin: 0;
        color: #718096;
        font-size: 13px;
        line-height: 1.7;
    }

    .menu-action {
        margin-top: 22px;
    }

    .btn-kelola {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: #087ff5;
        color: #fff;
        padding: 11px 18px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
        transition: .2s;
    }

    .btn-kelola:hover {
        background: #066fd6;
        color: #fff;
    }

    @media (max-width: 768px) {
        .menu-page {
            padding: 15px;
        }

        .menu-grid {
            grid-template-columns: 1fr;
        }
    }
</style>


<div class="menu-page">

    <div class="menu-header">
        <h1>Forum Kecamatan Sehat</h1>
        <p>
            Kelola data dan dokumen Forum Kecamatan Sehat.
        </p>
    </div>


    <div class="menu-grid">


        <!-- SK -->
        <div class="menu-card">

            <div class="menu-top">

                <div class="menu-icon">
                    <i class="bi bi-file-earmark-pdf"></i>
                </div>

                <div class="menu-content">
                    <h3>SK</h3>

                    <p>
                        Upload Surat Keputusan Forum Kecamatan Sehat.
                        File harus berupa PDF dengan ukuran maksimal 5 MB.
                    </p>
                </div>

            </div>

            <div class="menu-action">
                <a href="<?= base_url('forum-kecamatan-sehat/sk') ?>"
                   class="btn-kelola">
                    <i class="bi bi-upload"></i>
                    Kelola SK
                </a>
            </div>

        </div>


        <!-- RENCANA KERJA -->
        <div class="menu-card">

            <div class="menu-top">

                <div class="menu-icon">
                    <i class="bi bi-journal-text"></i>
                </div>

                <div class="menu-content">
                    <h3>Rencana Kerja</h3>

                    <p>
                        Kelola rencana kerja Forum Kecamatan Sehat
                        berdasarkan tahun pelaksanaan.
                    </p>
                </div>

            </div>

            <div class="menu-action">
                <a href="<?= base_url('forum-kecamatan-sehat/rencana-kerja') ?>"
                   class="btn-kelola">
                    <i class="bi bi-journal-check"></i>
                    Kelola Rencana Kerja
                </a>
            </div>

        </div>


        <!-- REALISASI -->
        <div class="menu-card">

            <div class="menu-top">

                <div class="menu-icon">
                    <i class="bi bi-bar-chart-fill"></i>
                </div>

                <div class="menu-content">
                    <h3>Realisasi Kegiatan</h3>

                    <p>
                        Input laporan kegiatan, waktu, peserta,
                        hasil pelaksanaan, anggaran dan sumber pendanaan.
                    </p>
                </div>

            </div>

            <div class="menu-action">
                <a href="<?= base_url('forum-kecamatan-sehat/realisasi') ?>"
                   class="btn-kelola">
                    <i class="bi bi-clipboard-data"></i>
                    Kelola Realisasi
                </a>
            </div>

        </div>


        <!-- FOTO -->
        <div class="menu-card">

            <div class="menu-top">

                <div class="menu-icon">
                    <i class="bi bi-camera-fill"></i>
                </div>

                <div class="menu-content">
                    <h3>Foto Kegiatan</h3>

                    <p>
                        Upload foto dokumentasi kegiatan
                        Forum Kecamatan Sehat dengan ukuran maksimal 5 MB.
                    </p>
                </div>

            </div>

            <div class="menu-action">
                <a href="<?= base_url('forum-kecamatan-sehat/foto-kegiatan') ?>"
                   class="btn-kelola">
                    <i class="bi bi-image"></i>
                    Kelola Foto
                </a>
            </div>

        </div>


    </div>

</div>

<?= $this->endSection() ?>