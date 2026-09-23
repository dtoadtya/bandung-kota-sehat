<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .page-wrapper {
        background: #f4f8fc;
        min-height: calc(100vh - 70px);
        padding: 28px;
    }

    /* ================================
       HEADER
    ================================= */

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
        width: 160px;
        height: 160px;
        right: -45px;
        top: -75px;
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

    .header-actions {
        position: absolute;
        right: 28px;
        top: 25px;
        z-index: 2;
    }

    .btn-tambah {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;

        text-decoration: none;

        background: #087ff5;
        color: #fff;

        border: 1px solid #087ff5;
        border-radius: 8px;

        padding: 11px 18px;

        font-size: 13px;
        font-weight: 700;

        transition: .2s;
    }

    .btn-tambah:hover {
        background: #066fd6;
        color: #fff;
        transform: translateY(-1px);
    }


    /* ================================
       CARD DATA
    ================================= */

    .content-card {
        background: #fff;
        border: 1px solid #d8e7f5;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 3px 12px rgba(22, 82, 130, 0.05);
    }

    .card-header {
        padding: 22px 26px;
        border-bottom: 1px solid #e3edf6;

        display: flex;
        align-items: center;
        gap: 14px;
    }

    .card-icon {
        width: 44px;
        height: 44px;

        border-radius: 10px;

        background: #e7f3ff;
        color: #087ff5;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 21px;

        flex-shrink: 0;
    }

    .card-header h2 {
        margin: 0;

        color: #07366d;

        font-size: 20px;
        font-weight: 800;
    }

    .card-header p {
        margin: 4px 0 0;

        color: #6d87a4;

        font-size: 12px;
    }


    /* ================================
       TABLE
    ================================= */

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;

        min-width: 900px;
    }

    thead th {
        background: #eef7ff;

        color: #174b7e;

        padding: 14px 16px;

        text-align: left;

        font-size: 12px;
        font-weight: 800;

        border-bottom: 1px solid #d8e7f5;

        white-space: nowrap;
    }

    tbody td {
        padding: 14px 16px;

        color: #465d73;

        font-size: 13px;

        border-bottom: 1px solid #edf2f7;

        vertical-align: middle;
    }

    tbody tr:hover {
        background: #f8fbfe;
    }

    .text-center {
        text-align: center;
    }


    /* ================================
       FILE
    ================================= */

    .badge-file {
        display: inline-flex;

        align-items: center;
        gap: 6px;

        padding: 6px 10px;

        border-radius: 6px;

        background: #eef7ff;
        color: #087ff5;

        font-size: 11px;
        font-weight: 700;

        max-width: 230px;

        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }


    /* ================================
       AKSI
       SEMUA TOMBOL SAMA UKURAN
    ================================= */

    .action-wrapper {
        display: flex;

        align-items: center;

        justify-content: flex-start;

        gap: 7px;

        flex-wrap: nowrap;
    }

    /*
     * Semua tombol aksi:
     * Lebar  : 115px
     * Tinggi : 36px
     */
    .btn-action {
        width: 115px;
        height: 36px;

        box-sizing: border-box;

        display: inline-flex;

        align-items: center;
        justify-content: center;

        padding: 0 8px;

        margin: 0;

        border-radius: 6px;

        font-size: 11px;
        font-weight: 700;

        line-height: 1;

        text-decoration: none;

        border: 1px solid transparent;

        cursor: pointer;

        white-space: nowrap;

        transition: .2s;
    }


    /* ================================
       LIHAT BERKAS
    ================================= */

    .btn-view {
        background: #eef7ff;

        color: #087ff5;

        border-color: #c9e2fa;
    }

    .btn-view:hover {
        background: #dceeff;

        color: #066fd6;
    }


    /* ================================
       EDIT BERKAS
    ================================= */

    .btn-edit {
        background: #fff7e6;

        color: #c27a00;

        border-color: #f2d28b;
    }

    .btn-edit:hover {
        background: #fff0cc;

        color: #a76400;
    }


    /* ================================
       HAPUS
    ================================= */

    .btn-delete {
        background: #fff1f1;

        color: #d9534f;

        border-color: #f1c8c7;
    }

    .btn-delete:hover {
        background: #ffe2e1;

        color: #c9302c;
    }


    /*
     * Form hapus tidak boleh
     * mengubah ukuran tombol
     */
    .action-wrapper form {
        display: block;

        margin: 0;

        padding: 0;
    }


    /* ================================
       EMPTY STATE
    ================================= */

    .empty-state {
        padding: 55px 25px;

        text-align: center;

        color: #718096;
    }

    .empty-icon {
        width: 64px;
        height: 64px;

        margin: 0 auto 15px;

        border-radius: 50%;

        background: #eef7ff;
        color: #087ff5;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 28px;
    }

    .empty-state h3 {
        margin: 0 0 7px;

        color: #40566d;

        font-size: 17px;
        font-weight: 800;
    }

    .empty-state p {
        margin: 0;

        font-size: 13px;

        color: #8193a6;
    }


    /* ================================
       ALERT
    ================================= */

    .alert {
        padding: 12px 15px;

        border-radius: 8px;

        margin-bottom: 18px;

        font-size: 13px;
    }

    .alert-success {
        background: #edf9f2;

        color: #176b3c;

        border: 1px solid #c9ead7;
    }

    .alert-error {
        background: #fff1f1;

        color: #a33a37;

        border: 1px solid #f1c8c7;
    }


    /* ================================
       RESPONSIVE
    ================================= */

    @media (max-width: 768px) {

        .page-wrapper {
            padding: 15px;
        }

        .page-header {
            padding: 22px;
        }

        .page-header h1 {
            font-size: 23px;

            padding-right: 0;

            margin-bottom: 55px;
        }

        .header-actions {
            left: 22px;
            right: 22px;

            top: auto;
            bottom: 20px;
        }

        .btn-tambah {
            width: 100%;

            justify-content: center;
        }

        .card-header {
            padding: 18px;
        }

        /*
         * Pada layar kecil tombol tetap
         * memiliki ukuran yang sama.
         */
        .action-wrapper {
            flex-wrap: nowrap;
        }

        .btn-action {
            width: 115px;
            min-width: 115px;
        }
    }
</style>


<div class="page-wrapper">


    <!-- =========================================================
         HEADER
    ========================================================== -->

    <div class="page-header">

        <div class="header-actions">

            <a href="<?= base_url('tim-pembina/sk/create') ?>"
               class="btn-tambah">

                + &nbsp;Tambah SK

            </a>

        </div>


        <h1>
            SK Tim Pembina
        </h1>


        <p>
            Kelola Surat Keputusan Tim Pembina Bandung Sehat.
        </p>

    </div>


    <!-- =========================================================
         FLASH MESSAGE
    ========================================================== -->

    <?php if (session()->getFlashdata('success')): ?>

        <div class="alert alert-success">

            <?= esc(session()->getFlashdata('success')) ?>

        </div>

    <?php endif; ?>


    <?php if (session()->getFlashdata('error')): ?>

        <div class="alert alert-error">

            <?= esc(session()->getFlashdata('error')) ?>

        </div>

    <?php endif; ?>


    <!-- =========================================================
         DATA SK
    ========================================================== -->

    <div class="content-card">


        <div class="card-header">

            <div class="card-icon">
                ▣
            </div>


            <div>

                <h2>
                    Data SK Tim Pembina
                </h2>


                <p>
                    Daftar Surat Keputusan Tim Pembina Bandung Sehat.
                </p>

            </div>

        </div>


        <?php if (!empty($data)): ?>


            <div class="table-wrapper">

                <table>


                    <thead>

                        <tr>

                            <th
                                class="text-center"
                                style="width:60px;"
                            >
                                No
                            </th>


                            <th>
                                Nomor SK
                            </th>


                            <th>
                                Periode
                            </th>


                            <th>
                                Keterangan
                            </th>


                            <th>
                                Nama File
                            </th>


                            <th
                                style="width:380px;"
                            >
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        <?php $no = 1; ?>


                        <?php foreach ($data as $row): ?>


                            <tr>


                                <td class="text-center">

                                    <?= $no++ ?>

                                </td>


                                <td>

                                    <strong>

                                        <?= esc(
                                            $row['no_sk'] ?? '-'
                                        ) ?>

                                    </strong>

                                </td>


                                <td>

                                    <?= esc(
                                        $row['periode'] ?? '-'
                                    ) ?>

                                </td>


                                <td>

                                    <?= esc(
                                        $row['keterangan'] ?? '-'
                                    ) ?>

                                </td>


                                <td>


                                    <?php if (!empty($row['nama_asli'])): ?>

                                        <span class="badge-file">

                                            PDF

                                            <?= esc(
                                                $row['nama_asli']
                                            ) ?>

                                        </span>


                                    <?php elseif (!empty($row['nama_file'])): ?>

                                        <span class="badge-file">

                                            PDF

                                            <?= esc(
                                                $row['nama_file']
                                            ) ?>

                                        </span>


                                    <?php else: ?>

                                        <span
                                            style="color:#9aa9b8;"
                                        >
                                            Tidak ada berkas
                                        </span>

                                    <?php endif; ?>


                                </td>


                                <!-- =================================================
                                     AKSI
                                ================================================== -->

                                <td>


                                    <div class="action-wrapper">


                                        <?php if (!empty($row['id'])): ?>


                                            <?php if (
                                                !empty($row['file_path']) ||
                                                !empty($row['nama_file'])
                                            ): ?>


                                                <!-- LIHAT BERKAS -->

                                                <a
                                                    href="<?= base_url(
                                                        'tim-pembina/sk/view/' .
                                                        $row['id']
                                                    ) ?>"

                                                    class="btn-action btn-view"
                                                >
                                                    👁 Lihat Berkas
                                                </a>


                                                <!-- EDIT BERKAS -->

                                                <a
                                                    href="<?= base_url(
                                                        'tim-pembina/sk/edit/' .
                                                        $row['id']
                                                    ) ?>"

                                                    class="btn-action btn-edit"
                                                >
                                                    ✎ Edit Berkas
                                                </a>


                                            <?php endif; ?>


                                            <!-- HAPUS -->

                                            <form
                                                action="<?= base_url(
                                                    'tim-pembina/sk/delete/' .
                                                    $row['id']
                                                ) ?>"

                                                method="post"

                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus SK ini?');"
                                            >

                                                <?= csrf_field() ?>


                                                <button
                                                    type="submit"
                                                    class="btn-action btn-delete"
                                                >
                                                    🗑 Hapus
                                                </button>


                                            </form>


                                        <?php endif; ?>


                                    </div>


                                </td>


                            </tr>


                        <?php endforeach; ?>


                    </tbody>


                </table>

            </div>


        <?php else: ?>


            <!-- =================================================
                 EMPTY STATE
            ================================================== -->

            <div class="empty-state">


                <div class="empty-icon">
                    ▣
                </div>


                <h3>
                    Belum ada data SK Tim Pembina
                </h3>


                <p>
                    Silakan tambahkan SK Tim Pembina terlebih dahulu.
                </p>


            </div>


        <?php endif; ?>


    </div>

</div>


<?= $this->endSection() ?>