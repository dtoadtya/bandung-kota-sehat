<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .fb-page {
        min-height: calc(100vh - 70px);
        background: #f5f8fc;
        padding: 28px 28px 45px;
    }

    /* HEADER */
    .fb-banner {
        position: relative;
        overflow: hidden;
        min-height: 118px;
        padding: 28px 34px;
        margin-bottom: 24px;
        border-radius: 14px;
        background: linear-gradient(
            135deg,
            #eef8ff 0%,
            #e3f2ff 100%
        );
        border-left: 6px solid #1687e8;
    }

    .fb-banner::after {
        content: "";
        position: absolute;
        width: 150px;
        height: 150px;
        right: -35px;
        top: -75px;
        border-radius: 50%;
        background: rgba(22, 135, 232, .08);
    }

    .fb-banner h1 {
        position: relative;
        z-index: 2;
        margin: 0;
        color: #063b78;
        font-size: 32px;
        font-weight: 800;
    }

    .fb-banner p {
        position: relative;
        z-index: 2;
        margin: 7px 0 0;
        color: #5c7897;
        font-size: 14px;
    }

    /* GRID */
    .fb-menu {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
    }

    /* CARD */
    .fb-card {
        min-height: 205px;
        background: #ffffff;
        border: 1px solid #d7e5f2;
        border-radius: 15px;
        padding: 24px;
        box-shadow: 0 3px 12px rgba(22, 82, 130, .04);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: .2s ease;
    }

    .fb-card:hover {
        border-color: #087ff5;
        box-shadow: 0 7px 20px rgba(22, 127, 230, .10);
    }

    .fb-card-top {
        display: flex;
        align-items: flex-start;
        gap: 16px;
    }

    .fb-icon {
        width: 52px;
        height: 52px;
        flex-shrink: 0;
        border-radius: 12px;
        background: #e7f2ff;
        color: #087ff5;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 25px;
    }

    .fb-card h2 {
        margin: 3px 0 7px;
        color: #063b78;
        font-size: 21px;
        font-weight: 800;
    }

    .fb-card p {
        margin: 0;
        color: #7087a1;
        font-size: 14px;
        line-height: 1.65;
    }

    .fb-card-action {
        margin-top: 22px;
    }

    .fb-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        min-height: 42px;
        padding: 10px 18px;
        border-radius: 8px;
        background: #087ff5;
        color: #ffffff;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
        transition: .2s ease;
    }

    .fb-btn:hover {
        background: #066fd6;
        color: #ffffff;
        transform: translateY(-1px);
    }

    @media (max-width: 768px) {

        .fb-page {
            padding: 20px 15px 35px;
        }

        .fb-banner {
            padding: 24px;
        }

        .fb-banner h1 {
            font-size: 27px;
        }

        .fb-menu {
            grid-template-columns: 1fr;
        }
    }
</style>


<div class="fb-page">

    <!-- HEADER -->

    <div class="fb-banner">

        <h1>Forum Bandung Sehat</h1>

        <p>
            Kelola data kelembagaan Forum Bandung Sehat.
        </p>

    </div>


    <!-- MENU 4 CARD -->

    <div class="fb-menu">


        <!-- =========================
             SK
        ========================== -->

        <div class="fb-card">

            <div class="fb-card-top">

                <div class="fb-icon">
                    <i class="bi bi-file-earmark-pdf"></i>
                </div>

                <div>

                    <h2>SK</h2>

                    <p>
                        Upload Surat Keputusan Forum Bandung Sehat.
                        File harus berupa PDF dengan ukuran maksimal 2 MB.
                    </p>

                </div>

            </div>

            <div class="fb-card-action">

                <a
                    href="<?= site_url('forum-bandung-sehat/sk') ?>"
                    class="fb-btn"
                >
                    <i class="bi bi-upload"></i>
                    Kelola SK
                </a>

            </div>

        </div>


        <!-- =========================
             RENCANA KERJA
        ========================== -->

        <div class="fb-card">

            <div class="fb-card-top">

                <div class="fb-icon">
                    <i class="bi bi-journal-text"></i>
                </div>

                <div>

                    <h2>Rencana Kerja</h2>

                    <p>
                        Kelola rencana kerja Forum Bandung Sehat
                        berdasarkan tahun yang dapat ditentukan sendiri.
                    </p>

                </div>

            </div>

            <div class="fb-card-action">

                <a
                    href="<?= site_url('forum-bandung-sehat/rencana-kerja') ?>"
                    class="fb-btn"
                >
                    <i class="bi bi-journal-check"></i>
                    Kelola Rencana Kerja
                </a>

            </div>

        </div>


        <!-- =========================
             REALISASI KEGIATAN
        ========================== -->

        <div class="fb-card">

            <div class="fb-card-top">

                <div class="fb-icon">
                    <i class="bi bi-bar-chart-line-fill"></i>
                </div>

                <div>

                    <h2>Realisasi Kegiatan</h2>

                    <p>
                        Input laporan kegiatan, waktu, peserta,
                        hasil pelaksanaan, anggaran dan sumber pendanaan.
                    </p>

                </div>

            </div>

            <div class="fb-card-action">

                <a
                    href="<?= site_url('forum-bandung-sehat/realisasi') ?>"
                    class="fb-btn"
                >
                    <i class="bi bi-clipboard-data"></i>
                    Kelola Realisasi
                </a>

            </div>

        </div>


        <!-- =========================
             FOTO KEGIATAN
        ========================== -->

        <div class="fb-card">

            <div class="fb-card-top">

                <div class="fb-icon">
                    <i class="bi bi-camera-fill"></i>
                </div>

                <div>

                    <h2>Foto Sekretariat</h2>

                    <p>
                        Upload satu foto Sekretariat
                        dengan ukuran maksimal 2 MB.
                    </p>

                </div>

            </div>

            <div class="fb-card-action">

                <a
                    href="<?= site_url('forum-bandung-sehat/foto-kegiatan') ?>"
                    class="fb-btn"
                >
                    <i class="bi bi-image"></i>
                    Kelola Foto
                </a>

            </div>

        </div>


    </div>

</div>


<?= $this->endSection() ?>