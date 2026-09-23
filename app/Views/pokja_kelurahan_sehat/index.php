<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .pokja-page {
        min-height: calc(100vh - 60px);
        background: #f5f8fc;
        padding: 26px 37px 45px;
    }

    /* =========================
       HEADER HALAMAN
    ========================= */

    .pokja-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 28px;
    }

    .pokja-header h1 {
        margin: 0;
        color: #07366d;
        font-size: 34px;
        font-weight: 800;
        line-height: 1.2;
    }

    .pokja-header p {
        margin: 9px 0 0;
        color: #718096;
        font-size: 14px;
    }


    /* =========================
       TOMBOL TAMBAH DATA
    ========================= */

    .btn-tambah-pokja {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;

        min-width: 153px;
        height: 46px;

        background: #087cf0;
        color: #fff;

        border-radius: 10px;

        text-decoration: none;

        font-size: 14px;
        font-weight: 700;

        transition: .2s ease;
    }

    .btn-tambah-pokja:hover {
        background: #07366d;
        color: #fff;
    }

    .btn-tambah-pokja .plus {
        width: 17px;
        height: 17px;

        border: 1.5px solid #fff;
        border-radius: 50%;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        font-size: 13px;
        line-height: 1;
    }


    /* =========================
       CARD UTAMA
    ========================= */

    .pokja-card {
        width: 100%;

        background: #fff;

        border: 1px solid #dce8f5;

        border-radius: 16px;

        overflow: hidden;

        box-shadow:
            0 4px 14px rgba(7, 54, 109, .04);
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

    .pokja-icon {
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

    .pokja-icon svg {
        width: 28px;
        height: 28px;
    }


    /* =========================
       JUDUL CARD
    ========================= */

    .pokja-card-text h2 {
        margin: 0;

        color: #07366d;

        font-size: 24px;
        font-weight: 800;

        line-height: 1.2;
    }

    .pokja-card-text p {
        margin: 6px 0 0;

        color: #718096;

        font-size: 14px;
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
    }

    .pokja-empty p {
        margin: 9px 0 0;

        color: #718096;

        font-size: 14px;
    }


    /* =========================
       TABEL JIKA ADA DATA
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

        padding: 14px;

        font-size: 13px;
        font-weight: 700;

        text-align: left;

        border-bottom: 1px solid #dce8f5;
    }

    .pokja-table td {
        padding: 14px;

        color: #4a5568;

        font-size: 14px;

        border-bottom: 1px solid #edf2f7;
    }

    .pokja-table tr:last-child td {
        border-bottom: none;
    }


    /* =========================
       BADGE
    ========================= */

    .pokja-badge {
        display: inline-block;

        padding: 5px 10px;

        background: #eaf3ff;

        color: #0b4f9c;

        border-radius: 7px;

        font-size: 12px;
        font-weight: 700;
    }


    /* =========================
       TOMBOL AKSI
    ========================= */

    .btn-edit-pokja {
        display: inline-block;

        padding: 7px 11px;

        background: #e9f8f0;
        color: #159957;

        border-radius: 7px;

        text-decoration: none;

        font-size: 12px;
        font-weight: 700;
    }

    .btn-hapus-pokja {
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
    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 768px) {

        .pokja-page {
            padding: 24px 16px 35px;
        }

        .pokja-header {
            flex-direction: column;
            gap: 18px;
        }

        .btn-tambah-pokja {
            width: 100%;
        }

        .pokja-header h1 {
            font-size: 29px;
        }
    }
</style>


<div class="pokja-page">


    <!-- ======================================
         HEADER
    ======================================= -->

    <div class="pokja-header">

        <div>

            <h1>
                Pokja Kelurahan Sehat
            </h1>

            <p>
                Pengelolaan data Pokja Kelurahan Sehat.
            </p>

        </div>


        <a
            href="<?= base_url('pokja-kelurahan-sehat/create') ?>"
            class="btn-tambah-pokja"
        >

            <span class="plus">
                +
            </span>

            Tambah Data

        </a>

    </div>


    <!-- ======================================
         PESAN
    ======================================= -->

    <?php if (session()->getFlashdata('success')) : ?>

        <div class="alert alert-success pokja-alert">

            <?= esc(
                session()->getFlashdata('success')
            ) ?>

        </div>

    <?php endif; ?>


    <?php if (session()->getFlashdata('error')) : ?>

        <div class="alert alert-danger pokja-alert">

            <?= esc(
                session()->getFlashdata('error')
            ) ?>

        </div>

    <?php endif; ?>


    <!-- ======================================
         CARD DATA
    ======================================= -->

    <div class="pokja-card">


        <!-- CARD HEADER -->

        <div class="pokja-card-header">


            <!-- ICON RUMAH -->

            <div class="pokja-icon">

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


            <!-- TEKS CARD -->

            <div class="pokja-card-text">

                <h2>
                    Data Pokja Kelurahan Sehat
                </h2>

                <p>
                    Daftar anggota dan informasi Pokja Kelurahan Sehat.
                </p>

            </div>

        </div>


        <!-- ==================================
             JIKA BELUM ADA DATA
        =================================== -->

        <?php if (empty($dataPokja)) : ?>

            <div class="pokja-empty">


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


        <?php else : ?>


            <!-- ==================================
                 JIKA SUDAH ADA DATA
            =================================== -->

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

                            <th>
                                Nama Pokja
                            </th>

                            <th>
                                Tahun
                            </th>

                            <th>
                                Ketua
                            </th>

                            <th width="140">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php $no = 1; ?>


                        <?php foreach ($dataPokja as $row) : ?>

                            <tr>

                                <td>
                                    <?= $no++ ?>
                                </td>


                                <td>

                                    <span class="pokja-badge">

                                        <?= esc(
                                            $row['nama_kecamatan'] ?? '-'
                                        ) ?>

                                    </span>

                                </td>


                                <td>

                                    <?= esc(
                                        $row['nama_kelurahan'] ?? '-'
                                    ) ?>

                                </td>


                                <td>

                                    <?= esc(
                                        $row['nama_pokja'] ?? '-'
                                    ) ?>

                                </td>


                                <td>

                                    <?= esc(
                                        $row['tahun'] ?? '-'
                                    ) ?>

                                </td>


                                <td>

                                    <?= esc(
                                        $row['ketua'] ?? '-'
                                    ) ?>

                                </td>


                                <td>

                                    <a
                                        href="<?= base_url(
                                            'pokja-kelurahan-sehat/edit/'
                                            . $row['id']
                                        ) ?>"
                                        class="btn-edit-pokja"
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
                                            class="btn-hapus-pokja"
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


        <?php endif; ?>


    </div>

</div>


<?= $this->endSection() ?>