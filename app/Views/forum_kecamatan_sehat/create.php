<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .kelembagaan-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 20px;
        margin-bottom: 28px;
    }

    .kelembagaan-header h1 {
        margin: 0;
        color: #063b78;
        font-size: 36px;
        font-weight: 800;
    }

    .kelembagaan-header p {
        margin: 8px 0 0;
        color: #7186a0;
        font-size: 16px;
    }

    .btn-kembali {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 20px;
        border: 1px solid #d5e2ef;
        border-radius: 10px;
        background: #ffffff;
        color: #174d83;
        text-decoration: none;
        font-weight: 700;
        white-space: nowrap;
    }

    .btn-kembali:hover {
        background: #f0f7ff;
        color: #063b78;
    }

    .kelembagaan-card {
        background: #ffffff;
        border: 1px solid #e0ebf5;
        border-radius: 16px;
        box-shadow: 0 5px 18px rgba(22, 73, 121, 0.06);
        overflow: hidden;
    }

    .kelembagaan-card-header {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 24px 28px;
        border-bottom: 1px solid #edf2f7;
    }

    .kelembagaan-card-icon {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: #e8f3ff;
        color: #087cf0;
        font-size: 24px;
    }

    .kelembagaan-card-header h2 {
        margin: 0;
        color: #063b78;
        font-size: 23px;
        font-weight: 800;
    }

    .kelembagaan-card-header p {
        margin: 5px 0 0;
        color: #7890aa;
        font-size: 14px;
    }

    .kelembagaan-menu {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
        padding: 28px;
    }

    .menu-item {
        min-height: 205px;
        padding: 24px;
        border: 1px solid #dce9f5;
        border-radius: 14px;
        background: linear-gradient(
            135deg,
            #ffffff 0%,
            #f7fbff 100%
        );
        transition: all .2s ease;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .menu-item:hover {
        border-color: #1687ed;
        box-shadow: 0 8px 22px rgba(20, 126, 226, .12);
        transform: translateY(-2px);
    }

    .menu-item-top {
        display: flex;
        align-items: flex-start;
        gap: 15px;
    }

    .menu-item-icon {
        width: 52px;
        height: 52px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 13px;
        background: #e8f3ff;
        color: #087cf0;
        font-size: 26px;
    }

    .menu-item h3 {
        margin: 2px 0 7px;
        color: #073e7a;
        font-size: 20px;
        font-weight: 800;
    }

    .menu-item p {
        margin: 0;
        color: #7890aa;
        font-size: 14px;
        line-height: 1.6;
    }

    .menu-item-action {
        margin-top: 23px;
    }

    .btn-menu {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-height: 42px;
        padding: 10px 18px;
        border-radius: 9px;
        background: #087cf0;
        color: #ffffff;
        text-decoration: none;
        font-size: 14px;
        font-weight: 700;
    }

    .btn-menu:hover {
        background: #0568cc;
        color: #ffffff;
    }

    .info-box {
        margin: 0 28px 28px;
        padding: 15px 18px;
        border-radius: 10px;
        background: #f0f7ff;
        border: 1px solid #d7eaff;
        color: #537293;
        font-size: 14px;
        line-height: 1.6;
    }

    @media (max-width: 768px) {
        .kelembagaan-header {
            flex-direction: column;
        }

        .kelembagaan-header h1 {
            font-size: 28px;
        }

        .kelembagaan-menu {
            grid-template-columns: 1fr;
            padding: 18px;
        }

        .kelembagaan-card-header {
            padding: 20px;
        }

        .info-box {
            margin: 0 18px 18px;
        }
    }
</style>

<div class="kelembagaan-header">
    <div>
        <h1>Forum Kecamatan Sehat</h1>
        <p>
            Kelola seluruh dokumen dan kegiatan Forum Kecamatan Sehat.
        </p>
    </div>

    <a
        href="<?= site_url('forum-kecamatan-sehat') ?>"
        class="btn-kembali"
    >
        <i class="bi bi-arrow-left"></i>
        Kembali
    </a>
</div>

<div class="kelembagaan-card">

    <div class="kelembagaan-card-header">
        <div class="kelembagaan-card-icon">
            <i class="bi bi-building-fill"></i>
        </div>

        <div>
            <h2>Menu Forum Kecamatan Sehat</h2>
            <p>
                Pilih jenis data yang ingin ditambahkan atau dikelola.
            </p>
        </div>
    </div>

    <div class="kelembagaan-menu">

        <!-- SK -->
        <div class="menu-item">
            <div class="menu-item-top">
                <div class="menu-item-icon">
                    <i class="bi bi-file-earmark-pdf-fill"></i>
                </div>

                <div>
                    <h3>SK</h3>
                    <p>
                        Upload Surat Keputusan Forum Kecamatan Sehat.
                        File harus berupa PDF dengan ukuran maksimal 5 MB.
                    </p>
                </div>
            </div>

            <div class="menu-item-action">
                <a
                    href="<?= site_url('forum-kecamatan-sehat/sk') ?>"
                    class="btn-menu"
                >
                    <i class="bi bi-upload"></i>
                    Kelola SK
                </a>
            </div>
        </div>

        <!-- RENCANA KERJA -->
        <div class="menu-item">
            <div class="menu-item-top">
                <div class="menu-item-icon">
                    <i class="bi bi-journal-text"></i>
                </div>

                <div>
                    <h3>Rencana Kerja</h3>
                    <p>
                        Kelola rencana kerja Forum Kecamatan Sehat
                        berdasarkan tahun yang dapat ditentukan sendiri.
                    </p>
                </div>
            </div>

            <div class="menu-item-action">
                <a
                    href="<?= site_url('forum-kecamatan-sehat/rencana-kerja') ?>"
                    class="btn-menu"
                >
                    <i class="bi bi-journal-check"></i>
                    Kelola Rencana Kerja
                </a>
            </div>
        </div>

        <!-- REALISASI -->
        <div class="menu-item">
            <div class="menu-item-top">
                <div class="menu-item-icon">
                    <i class="bi bi-bar-chart-line-fill"></i>
                </div>

                <div>
                    <h3>Realisasi Kegiatan</h3>
                    <p>
                        Input laporan kegiatan, waktu, peserta,
                        hasil pelaksanaan, anggaran, dan sumber pendanaan.
                    </p>
                </div>
            </div>

            <div class="menu-item-action">
                <a
                    href="<?= site_url('forum-kecamatan-sehat/realisasi') ?>"
                    class="btn-menu"
                >
                    <i class="bi bi-clipboard-data"></i>
                    Kelola Realisasi
                </a>
            </div>
        </div>

        <!-- FOTO KEGIATAN -->
        <div class="menu-item">
            <div class="menu-item-top">
                <div class="menu-item-icon">
                    <i class="bi bi-camera-fill"></i>
                </div>

                <div>
                    <h3>Foto Kegiatan</h3>
                    <p>
                        Upload satu foto dokumentasi kegiatan
                        dengan ukuran maksimal 5 MB.
                    </p>
                </div>
            </div>

            <div class="menu-item-action">
                <a
                    href="<?= site_url('forum-kecamatan-sehat/foto-kegiatan') ?>"
                    class="btn-menu"
                >
                    <i class="bi bi-image"></i>
                    Kelola Foto
                </a>
            </div>
        </div>

    </div>

    <div class="info-box">
        <i class="bi bi-info-circle me-2"></i>
        Semua data Forum Kecamatan Sehat dikelola melalui empat menu
        di atas. Silakan pilih sesuai jenis dokumen atau kegiatan
        yang ingin dikelola.
    </div>

</div>

<?= $this->endSection() ?>