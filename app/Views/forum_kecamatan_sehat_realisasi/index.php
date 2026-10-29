<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .page-wrapper {
        background: #f4f8fc;
        min-height: calc(100vh - 70px);
        padding: 28px;
    }

    .page-header {
        background: linear-gradient(135deg, #eef7ff, #e5f2ff);
        border-left: 6px solid #1687e8;
        border-radius: 14px;
        padding: 28px 30px;
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
        margin: 0 0 8px;
        color: #07366d;
        font-size: 30px;
        font-weight: 800;
    }

    .page-header p {
        margin: 0;
        color: #5d7898;
        font-size: 14px;
    }

    .btn-kembali {
        position: absolute;
        right: 28px;
        top: 25px;
        z-index: 2;
        text-decoration: none;
        background: #fff;
        color: #0b4f9c;
        border: 1px solid #cbdff2;
        border-radius: 8px;
        padding: 11px 18px;
        font-size: 13px;
        font-weight: 600;
    }

    .btn-kembali:hover {
        background: #eef7ff;
    }

    .alert-success,
    .alert-danger {
        border-radius: 8px;
        padding: 12px 15px;
        margin-bottom: 18px;
        font-size: 13px;
    }

    .alert-success {
        background: #eaf8f0;
        color: #198754;
        border: 1px solid #bde5cd;
    }

    .alert-danger {
        background: #fff0f0;
        color: #d9534f;
        border: 1px solid #f1b4b1;
    }

    .periode-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px;
    }

    .periode-link {
        text-decoration: none;
        display: block;
    }

    .periode-card {
        background: #fff;
        border: 1px solid #d8e7f5;
        border-radius: 16px;
        height: 100%;
        padding: 26px;
        display: flex;
        align-items: center;
        gap: 18px;
        box-shadow: 0 3px 12px rgba(22, 82, 130, 0.05);
        transition: .2s;
    }

    .periode-link:hover .periode-card {
        border-color: #1687e8;
        box-shadow: 0 6px 18px rgba(22, 135, 232, 0.12);
        transform: translateY(-2px);
    }

    .periode-icon {
        width: 58px;
        height: 58px;
        border-radius: 50%;
        background: #eaf3ff;
        color: #0b4f9c;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        flex-shrink: 0;
    }

    .periode-card h5 {
        margin: 0 0 4px;
        color: #07366d;
        font-size: 18px;
        font-weight: 800;
    }

    .periode-card p {
        margin: 0;
        color: #6d87a4;
        font-size: 13px;
    }

    @media (max-width: 768px) {
        .page-wrapper {
            padding: 15px;
        }

        .page-header {
            padding: 22px;
        }

        .page-header h1 {
            font-size: 23px;
            padding-right: 90px;
        }

        .btn-kembali {
            right: 18px;
            top: 20px;
        }

        .periode-row {
            grid-template-columns: 1fr;
            gap: 16px;
        }
    }
</style>

<div class="page-wrapper">

    <div class="page-header">

        <a href="<?= base_url('forum-kecamatan-sehat') ?>"
           class="btn-kembali">
            ← &nbsp;Kembali
        </a>

        <h1>Realisasi Kegiatan</h1>

        <p>
            Kelola realisasi kegiatan berdasarkan tahun pelaksanaan.
        </p>

    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert-success">
            ✓ &nbsp;<?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert-danger">
            ⚠ &nbsp;<?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <div class="periode-row">

        <a href="<?= base_url('forum-kecamatan-sehat/realisasi/ganjil') ?>"
           class="periode-link">

            <div class="periode-card">

                <div class="periode-icon">▣</div>

                <div>
                    <h5>Tahun Ganjil</h5>
                    <p>Realisasi Kegiatan Tahun Ganjil</p>
                </div>

            </div>

        </a>

        <a href="<?= base_url('forum-kecamatan-sehat/realisasi/genap') ?>"
           class="periode-link">

            <div class="periode-card">

                <div class="periode-icon">▤</div>

                <div>
                    <h5>Tahun Genap</h5>
                    <p>Realisasi Kegiatan Tahun Genap</p>
                </div>

            </div>

        </a>

    </div>

</div>

<?= $this->endSection() ?>
