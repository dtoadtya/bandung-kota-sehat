<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    * {
        box-sizing: border-box;
    }

    .pokja-page {
        min-height: calc(100vh - 60px);
        background: #f5f8fc;
        padding: 26px 36px 45px;
    }

    /* =========================
       HEADER HALAMAN
    ========================= */

    .pokja-page-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 29px;
    }

    .pokja-heading h1 {
        margin: 0;
        color: #07366d;
        font-size: 34px;
        font-weight: 800;
        line-height: 1.2;
        letter-spacing: -0.5px;
    }

    .pokja-heading p {
        margin: 10px 0 0;
        color: #718096;
        font-size: 14px;
        line-height: 1.5;
    }


    /* =========================
       TOMBOL TAMBAH DATA
    ========================= */

    .pokja-add-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;

        min-width: 153px;
        height: 46px;

        background: #087cf0;
        color: #ffffff;

        border-radius: 10px;
        text-decoration: none;

        font-size: 14px;
        font-weight: 700;

        transition: all .2s ease;
    }

    .pokja-add-button:hover {
        background: #07366d;
        color: #ffffff;
        transform: translateY(-1px);
    }

    .pokja-plus {
        width: 17px;
        height: 17px;

        border: 1.7px solid #ffffff;
        border-radius: 50%;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        font-size: 13px;
        line-height: 1;
    }


    /* =========================
       CARD
    ========================= */

    .pokja-card {
        width: 100%;

        background: #ffffff;

        border: 1px solid #dce8f5;
        border-radius: 16px;

        overflow: hidden;

        box-shadow:
            0 4px 14px rgba(7, 54, 109, 0.045);
    }


    /* =========================
       CARD HEADER
    ========================= */

    .pokja-card-header {
        min-height: 110px;

        display: flex;
        align-items: center;

        gap: 15px;

        padding: 27px 28px;

        border-bottom: 1px solid #e5eaf0;
    }


    /* =========================
       ICON CARD
    ========================= */

    .pokja-card-icon {
        width: 49px;
        height: 49px;

        flex-shrink: 0;

        background: #e7f2ff;

        border-radius: 13px;

        display: flex;
        align-items: center;
        justify-content: center;

        color: #087cf0;
    }

    .pokja-card-icon svg {
        width: 28px;
        height: 28px;
    }


    /* =========================
       JUDUL CARD
    ========================= */

    .pokja-card-content h2 {
        margin: 0;

        color: #07366d;

        font-size: 24px;
        font-weight: 800;

        line-height: 1.2;
    }

    .pokja-card-content p {
        margin: 6px 0 0;

        color: #718096;

        font-size: 14px;
        line-height: 1.4;
    }


    /* =========================
       EMPTY STATE
    ========================= */

    .pokja-empty {
        min-height: 285px;

        display: flex;
        flex-direction: column;

        justify-content: center;
        align-items: center;

        text-align: center;

        padding: 40px 20px 48px;
    }


    .pokja-empty-icon {
        width: 90px;
        height: 90px;

        background: #e7f2ff;

        border-radius: 20px;

        display: flex;
        align-items: center;
        justify-content: center;

        color: #087cf0;

        margin-bottom: 22px;
    }

    .pokja-empty-icon svg {
        width: 52px;
        height: 52px;
    }


    .pokja-empty h3 {
        margin: 0;

        color: #07366d;

        font-size: 20px;
        font-weight: 800;

        line-height: 1.3;
    }

    .pokja-empty p {
        margin: 9px 0 0;

        color: #718096;

        font-size: 14px;
        line-height: 1.5;
    }


    /* =========================
       TABEL KETIKA DATA ADA
    ========================= */

    .pokja-table-wrapper {
        padding: 24px 28px 28px;

        overflow-x: auto;
    }

    .pokja-table {
        width: 100%;

        border-collapse: collapse;
    }

    .pokja-table th {
        background: #f5f8fc;

        color: #07366d;

        font-size: 13px;
        font-weight: 700;

        padding: 14px 13px;

        border-bottom: 1px solid #dce8f5;

        text-align: left;
    }

    .pokja-table td {
        color: #4a5568;

        font-size: 14px;

        padding: 14px 13px;

        border-bottom: 1px solid #edf2f7;
    }

    .pokja-table tr:last-child td {
        border-bottom: none;
    }


    /* =========================
       BADGE KECAMATAN
    ========================= */

    .pokja-kecamatan {
        display: inline-block;

        padding: 5px 10px;

        background: #eaf3ff;

        color: #0b4f9c;

        border-radius: 7px;

        font-size: 12px;
        font-weight: 700;
    }


    /* =========================
       AKSI
    ========================= */

    .pokja-edit {
        display: inline-block;

        padding: 7px 11px;

        background: #e9f8f0;
        color: #159957;

        border-radius: 7px;

        text-decoration: none;

        font-size: 12px;
        font-weight: 700;
    }

    .pokja-delete {
        padding: 7px 11px;

        background: #fff0ef;
        color: #d9534f;

        border: none;
        border-radius: 7px;

        font-size: 12px;
        font-weight: 700;

        cursor: pointer;
    }


    /* =========================
       ALERT
    ========================= */

    .pokja-alert {
        margin-bottom: 20px;
        border-radius: 9px;
    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 768px) {

        .pokja-page {
            padding: 24px 16px 35px;
        }

        .pokja-page-header {
            flex-direction: column;
            gap: 18px;
        }

        .pokja-add-button {
            width: 100%;
        }

        .pokja-heading h1 {
            font-size: 29px;
        }

        .pokja-card-header {
            padding: 22px 20px;
        }

        .pokja-card-content h2 {
            font-size: 20px;
        }

        .pokja-empty {
            min-height: 260px;
        }

        .pokja-table {
            min-width: 650px;
        }
    }
</style>


<div class="pokja-page">


    <!-- ======================================
         JUDUL HALAMAN
    ======================================= -->

    <div class="pokja-page-header">

        <div class="pokja-heading">

            <h1>
                Pokja Kelurahan Sehat
            </h1>

            <p>
                Pengelolaan data Pokja Kelurahan Sehat.
            </p>

        </div>


        <!-- TOMBOL TAMBAH DATA -->

        <a href="<?= base_url('pokja-kelurahan-sehat/create') ?>"
           class="pokja-add-button">

            <span class="pokja-plus">
                +
            </span>

            Tambah Data

        </a>

    </div>


    <!-- ======================================
         PESAN SUCCESS
    ======================================= -->

    <?php if (session()->getFlashdata('success')) : ?>

        <div class="alert alert-success pokja-alert">

            <?= esc(
                session()->getFlashdata('success')
            ) ?>

        </div>

    <?php endif; ?>


    <!-- ======================================
         PESAN ERROR
    ======================================= -->

    <?php if (session()->getFlashdata('error')) : ?>

        <div class="alert alert-danger pokja-alert">

            <?= esc(
                session()->getFlashdata('error')
            ) ?>

        </div>

    <?php endif; ?>


    <!-- ======================================
         CARD UTAMA
    ======================================= -->

    <div class="pokja-card">


        <!-- ==================================
             HEADER CARD
        =================================== -->

        <div class="pokja-card-header">


            <!-- ICON -->

            <div class="pokja-card-icon">

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


            <!-- JUDUL CARD -->

            <div class="pokja-card-content">

                <h2>
                    Data Pokja Kelurahan Sehat
                </h2>

                <p>
                    Daftar anggota dan informasi Pokja Kelurahan Sehat.
                </p>

            </div>

        </div>


        <!-- ==================================
             DATA
        =================================== -->

        <?php if (!empty($kelurahan)) : ?>


            <div class="pokja-table-wrapper">

                <table class="pokja-table">

                    <thead>

                        <tr>

                            <th width="60">
                                No
                            </th>

                            <th>
                                Kecamatan
                            </th>

                            <th>
                                Kelurahan
                            </th>

                            <th width="160">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php $no = 1; ?>


                        <?php foreach ($kelurahan as $row) : ?>

                            <tr>

                                <td>
                                    <?= $no++ ?>
                                </td>


                                <td>

                                    <span class="pokja-kecamatan">

                                        <?= esc(
                                            $row['nama_kecamatan']
                                            ?? '-'
                                        ) ?>

                                    </span>

                                </td>


                                <td>

                                    <strong>

                                        <?= esc(
                                            $row['nama_kelurahan']
                                            ?? '-'
                                        ) ?>

                                    </strong>

                                </td>


                                <td>

                                    <a
                                        href="<?= base_url(
                                            'pokja-kelurahan-sehat/edit/'
                                            . $row['id']
                                        ) ?>"
                                        class="pokja-edit"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        action="<?= base_url(
                                            'pokja-kelurahan-sehat/delete/'
                                            . $row['id']
                                        ) ?>"
                                        method="post"
                                        style="display:inline;"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');"
                                    >

                                        <?= csrf_field() ?>

                                        <button
                                            type="submit"
                                            class="pokja-delete"
                                        >
                                            Hapus
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        <?php endforeach; ?>


                    </tbody>

                </table>

            </div>


        <?php else : ?>


            <!-- ==================================
                 EMPTY STATE
            =================================== -->

            <div class="pokja-empty">


                <!-- ICON RUMAH -->

                <div class="pokja-empty-icon">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.7"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <path d="M3 10.5L12 3l9 7.5"></path>

                        <path d="M5 9.5V21h14V9.5"></path>

                        <path d="M9 21v-6h6v6"></path>

                    </svg>

                </div>


                <h3>
                    Belum ada data Pokja Kelurahan Sehat
                </h3>


                <p>
                    Silakan tambahkan data Pokja Kelurahan Sehat terlebih dahulu.
                </p>


            </div>


        <?php endif; ?>


    </div>

</div>


<?= $this->endSection() ?>