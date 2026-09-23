<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    /* =========================================================
       HALAMAN MENU POKJA KELURAHAN SEHAT
    ========================================================= */

    .pokja-menu-page {
        min-height: calc(100vh - 60px);
        background: #f5f8fc;
        padding: 8px 6px 40px;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .pokja-menu-header {
        position: relative;

        background: linear-gradient(
            135deg,
            #eef7ff 0%,
            #f8fbff 100%
        );

        border: 1px solid #d7e6f5;

        border-left: 6px solid #2d91d9;

        border-radius: 12px;

        min-height: 110px;

        padding: 24px 38px;

        display: flex;

        align-items: center;

        justify-content: space-between;

        overflow: hidden;

        margin-bottom: 22px;
    }


    .pokja-menu-header::after {
        content: "";

        position: absolute;

        right: -35px;
        top: -45px;

        width: 135px;
        height: 135px;

        background: #e8f4ff;

        border-radius: 50%;

        opacity: .9;
    }


    .pokja-header-text {
        position: relative;

        z-index: 2;
    }


    .pokja-header-text h1 {
        margin: 0;

        color: #07366d;

        font-size: 29px;

        font-weight: 800;

        line-height: 1.2;
    }


    .pokja-header-text p {
        margin: 7px 0 0;

        color: #6280a3;

        font-size: 13px;
    }


    /* =========================================================
       TOMBOL KEMBALI
    ========================================================= */

    .btn-kembali-pokja {
        position: relative;

        z-index: 5;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 6px;

        min-width: 96px;

        height: 38px;

        padding: 0 14px;

        background: #ffffff;

        border: 1px solid #cfe0f1;

        border-radius: 8px;

        color: #35618b;

        text-decoration: none;

        font-size: 12px;

        font-weight: 700;

        transition: .2s ease;
    }


    .btn-kembali-pokja:hover {
        background: #eef7ff;

        color: #07366d;

        border-color: #a9c9e8;
    }


    /* =========================================================
       CARD MENU
    ========================================================= */

    .pokja-menu-card {
        background: #ffffff;

        border: 1px solid #dce8f5;

        border-radius: 12px;

        overflow: hidden;

        box-shadow:
            0 3px 12px rgba(7, 54, 109, .035);
    }


    /* =========================================================
       CARD HEADER
    ========================================================= */

    .pokja-menu-card-header {
        min-height: 76px;

        display: flex;

        align-items: center;

        gap: 12px;

        padding: 17px 22px;

        border-bottom: 1px solid #e4ebf3;
    }


    .pokja-menu-title-icon {
        width: 38px;

        height: 38px;

        flex-shrink: 0;

        display: flex;

        align-items: center;

        justify-content: center;

        background: #e7f2ff;

        color: #087cf0;

        border-radius: 10px;
    }


    .pokja-menu-title-icon svg {
        width: 22px;

        height: 22px;
    }


    .pokja-menu-card-header h2 {
        margin: 0;

        color: #07366d;

        font-size: 18px;

        font-weight: 800;
    }


    .pokja-menu-card-header p {
        margin: 3px 0 0;

        color: #6d88a7;

        font-size: 11px;
    }


    /* =========================================================
       GRID MENU
    ========================================================= */

    .pokja-menu-grid {
        display: grid;

        grid-template-columns:
            repeat(2, minmax(0, 1fr));

        gap: 14px;

        padding: 21px;
    }


    /* =========================================================
       MENU ITEM
    ========================================================= */

    .pokja-menu-item {
        min-height: 154px;

        border: 1px solid #d5e4f2;

        border-radius: 10px;

        background: linear-gradient(
            135deg,
            #ffffff 0%,
            #fafdff 100%
        );

        padding: 18px;

        display: flex;

        flex-direction: column;

        justify-content: space-between;

        transition:
            transform .2s ease,
            box-shadow .2s ease,
            border-color .2s ease;
    }


    .pokja-menu-item:hover {
        transform: translateY(-2px);

        border-color: #b9d5ef;

        box-shadow:
            0 5px 15px rgba(7, 54, 109, .07);
    }


    /* =========================================================
       BAGIAN ATAS MENU
    ========================================================= */

    .pokja-item-top {
        display: flex;

        align-items: flex-start;

        gap: 11px;
    }


    .pokja-item-icon {
        width: 39px;

        height: 39px;

        flex-shrink: 0;

        background: #e7f2ff;

        color: #087cf0;

        border-radius: 10px;

        display: flex;

        align-items: center;

        justify-content: center;
    }


    .pokja-item-icon svg {
        width: 21px;

        height: 21px;
    }


    .pokja-item-content h3 {
        margin: 3px 0 4px;

        color: #07366d;

        font-size: 15px;

        font-weight: 800;
    }


    .pokja-item-content p {
        margin: 0;

        color: #6682a3;

        font-size: 11px;

        line-height: 1.55;

        max-width: 430px;
    }


    /* =========================================================
       BUTTON MENU
    ========================================================= */

    .pokja-menu-button {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 6px;

        align-self: flex-start;

        margin-top: 14px;

        min-height: 32px;

        padding: 0 13px;

        border-radius: 6px;

        background: #087cf0;

        color: #ffffff;

        text-decoration: none;

        border: none;

        font-size: 11px;

        font-weight: 700;

        transition: .2s ease;
    }


    .pokja-menu-button:hover {
        background: #07366d;

        color: #ffffff;
    }


    .pokja-menu-button svg {
        width: 13px;

        height: 13px;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 850px) {

        .pokja-menu-header {
            padding: 22px 25px;
        }

        .pokja-menu-grid {
            grid-template-columns: 1fr;
        }

    }


    @media (max-width: 600px) {

        .pokja-menu-page {
            padding: 8px 10px 30px;
        }

        .pokja-menu-header {
            flex-direction: column;

            align-items: flex-start;

            gap: 15px;

            padding: 20px;
        }

        .pokja-header-text h1 {
            font-size: 24px;
        }

        .btn-kembali-pokja {
            align-self: flex-end;
        }

        .pokja-menu-grid {
            padding: 14px;
        }

    }
</style>


<div class="pokja-menu-page">


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <div class="pokja-menu-header">

        <div class="pokja-header-text">

            <h1>
                Pokja Kelurahan Sehat
            </h1>

            <p>
                Kelola seluruh dokumen dan kegiatan Pokja Kelurahan Sehat.
            </p>

        </div>


        <a
            href="<?= base_url('pokja-kelurahan-sehat') ?>"
            class="btn-kembali-pokja"
        >

            <span>
                ←
            </span>

            Kembali

        </a>

    </div>


    <!-- =====================================================
         CARD MENU
    ====================================================== -->

    <div class="pokja-menu-card">


        <!-- HEADER CARD -->

        <div class="pokja-menu-card-header">


            <!-- ICON -->

            <div class="pokja-menu-title-icon">

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >

                    <path d="M3 10.5L12 3l9 7.5"></path>

                    <path d="M5 9.5V21h14V9.5"></path>

                    <path d="M9 21v-6h6v6"></path>

                </svg>

            </div>


            <!-- JUDUL -->

            <div>

                <h2>
                    Menu Pokja Kelurahan Sehat
                </h2>

                <p>
                    Pilih jenis data yang ingin ditambahkan atau dikelola.
                </p>

            </div>

        </div>


        <!-- =================================================
             GRID 4 MENU
        ================================================== -->

        <div class="pokja-menu-grid">


            <!-- =================================================
                 1. SK
            ================================================== -->

            <div class="pokja-menu-item">


                <div class="pokja-item-top">


                    <div class="pokja-item-icon">

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >

                            <path d="M7 3h7l4 4v14H7z"></path>

                            <path d="M14 3v5h5"></path>

                            <path d="M10 13h5"></path>

                            <path d="M10 17h5"></path>

                        </svg>

                    </div>


                    <div class="pokja-item-content">

                        <h3>
                            SK
                        </h3>

                        <p>
                            Upload Surat Keputusan Pokja Kelurahan Sehat.
                            File harus berupa PDF dengan ukuran maksimal 5 MB.
                        </p>

                    </div>

                </div>


                <a
                    href="<?= base_url('pokja-kelurahan-sehat/sk') ?>"
                    class="pokja-menu-button"
                >

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <path d="M12 3v12"></path>

                        <path d="M7 10l5 5 5-5"></path>

                        <path d="M5 21h14"></path>

                    </svg>

                    Kelola SK

                </a>

            </div>


            <!-- =================================================
                 2. RENCANA KERJA
            ================================================== -->

            <div class="pokja-menu-item">


                <div class="pokja-item-top">


                    <div class="pokja-item-icon">

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >

                            <rect
                                x="5"
                                y="3"
                                width="14"
                                height="18"
                                rx="2"
                            ></rect>

                            <path d="M8 8h8"></path>

                            <path d="M8 12h8"></path>

                            <path d="M8 16h5"></path>

                        </svg>

                    </div>


                    <div class="pokja-item-content">

                        <h3>
                            Rencana Kerja
                        </h3>

                        <p>
                            Kelola rencana kerja Pokja Kelurahan Sehat
                            berdasarkan tahun yang dapat ditentukan sendiri.
                        </p>

                    </div>

                </div>


                <a
                    href="<?= base_url('pokja-kelurahan-sehat/rencana-kerja') ?>"
                    class="pokja-menu-button"
                >

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <path d="M8 6h13"></path>

                        <path d="M8 12h13"></path>

                        <path d="M8 18h13"></path>

                        <path d="M3 6h.01"></path>

                        <path d="M3 12h.01"></path>

                        <path d="M3 18h.01"></path>

                    </svg>

                    Kelola Rencana Kerja

                </a>

            </div>


            <!-- =================================================
                 3. REALISASI KEGIATAN
            ================================================== -->

            <div class="pokja-menu-item">


                <div class="pokja-item-top">


                    <div class="pokja-item-icon">

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >

                            <path d="M4 20V10"></path>

                            <path d="M10 20V4"></path>

                            <path d="M16 20v-7"></path>

                            <path d="M22 20H2"></path>

                        </svg>

                    </div>


                    <div class="pokja-item-content">

                        <h3>
                            Realisasi Kegiatan
                        </h3>

                        <p>
                            Input laporan kegiatan, waktu, peserta,
                            hasil pelaksanaan, anggaran, dan sumber pendanaan.
                        </p>

                    </div>

                </div>


                <a
                    href="<?= base_url('pokja-kelurahan-sehat/realisasi-kegiatan') ?>"
                    class="pokja-menu-button"
                >

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <path d="M8 4h8"></path>

                        <path d="M9 2h6v4H9z"></path>

                        <path d="M6 4H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1"></path>

                        <path d="M8 12l2 2 5-5"></path>

                    </svg>

                    Kelola Realisasi

                </a>

            </div>


            <!-- =================================================
                 4. FOTO KEGIATAN
            ================================================== -->

            <div class="pokja-menu-item">


                <div class="pokja-item-top">


                    <div class="pokja-item-icon">

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >

                            <rect
                                x="3"
                                y="6"
                                width="18"
                                height="14"
                                rx="2"
                            ></rect>

                            <path d="M8 6l1.5-3h5L16 6"></path>

                            <circle
                                cx="12"
                                cy="13"
                                r="3.5"
                            ></circle>

                        </svg>

                    </div>


                    <div class="pokja-item-content">

                        <h3>
                            Foto Kegiatan
                        </h3>

                        <p>
                            Upload satu foto dokumentasi kegiatan
                            dengan ukuran maksimal 5 MB.
                        </p>

                    </div>

                </div>


                <a
                    href="<?= base_url('pokja-kelurahan-sehat/foto-kegiatan') ?>"
                    class="pokja-menu-button"
                >

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <rect
                            x="3"
                            y="5"
                            width="18"
                            height="14"
                            rx="2"
                        ></rect>

                        <circle
                            cx="8.5"
                            cy="10"
                            r="1.5"
                        ></circle>

                        <path d="M21 15l-5-5L5 19"></path>

                    </svg>

                    Kelola Foto

                </a>

            </div>


        </div>

    </div>

</div>


<?= $this->endSection() ?>