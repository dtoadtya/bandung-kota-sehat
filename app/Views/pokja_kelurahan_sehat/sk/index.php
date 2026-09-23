<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .sk-page {
        background: #f4f7fb;
        min-height: calc(100vh - 60px);
        padding: 28px 30px 40px;
    }

    /* HEADER */
    .sk-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: linear-gradient(135deg, #eef7ff, #f8fbff);
        border: 1px solid #d8e7f5;
        border-left: 5px solid #2d91d9;
        border-radius: 12px;
        padding: 22px 28px;
        margin-bottom: 22px;
        position: relative;
        overflow: hidden;
    }

    .sk-header::after {
        content: "";
        position: absolute;
        width: 130px;
        height: 130px;
        right: -40px;
        top: -55px;
        border-radius: 50%;
        background: #e7f3ff;
    }

    .sk-header-content {
        position: relative;
        z-index: 2;
    }

    .sk-header h1 {
        margin: 0;
        color: #07366d;
        font-size: 28px;
        font-weight: 800;
    }

    .sk-header p {
        margin: 6px 0 0;
        color: #6682a3;
        font-size: 13px;
    }

    .sk-header-actions {
        position: relative;
        z-index: 3;
        display: flex;
        gap: 8px;
    }

    .btn-sk-back {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 10px 15px;
        border-radius: 8px;
        border: 1px solid #cbddec;
        background: #fff;
        color: #35618b;
        text-decoration: none;
        font-size: 12px;
        font-weight: 700;
    }

    .btn-sk-back:hover {
        background: #eef7ff;
        color: #07366d;
    }

    .btn-sk-add {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 10px 16px;
        border-radius: 8px;
        background: #087cf0;
        color: #fff;
        text-decoration: none;
        font-size: 12px;
        font-weight: 700;
    }

    .btn-sk-add:hover {
        background: #07366d;
        color: #fff;
    }

    /* ALERT */
    .sk-alert {
        padding: 12px 16px;
        border-radius: 8px;
        margin-bottom: 18px;
        font-size: 13px;
    }

    .sk-alert-success {
        background: #e9f8f0;
        border: 1px solid #c9ebd8;
        color: #167246;
    }

    .sk-alert-error {
        background: #fff0f0;
        border: 1px solid #f1cccc;
        color: #b42323;
    }

    /* CARD */
    .sk-card {
        background: #fff;
        border: 1px solid #dce8f5;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 3px 12px rgba(7, 54, 109, .035);
    }

    .sk-card-header {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 20px 24px;
        border-bottom: 1px solid #e3ebf4;
    }

    .sk-card-icon {
        width: 42px;
        height: 42px;
        flex-shrink: 0;
        border-radius: 10px;
        background: #e7f2ff;
        color: #087cf0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .sk-card-icon svg {
        width: 23px;
        height: 23px;
    }

    .sk-card-title h2 {
        margin: 0;
        color: #07366d;
        font-size: 20px;
        font-weight: 800;
    }

    .sk-card-title p {
        margin: 4px 0 0;
        color: #6b86a6;
        font-size: 12px;
    }

    /* TABLE */
    .sk-table-wrapper {
        padding: 20px 24px 24px;
        overflow-x: auto;
    }

    .sk-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 12px;
    }

    .sk-table thead th {
        background: #f4f7fb;
        color: #07366d;
        font-weight: 800;
        text-align: left;
        padding: 13px 14px;
        border-bottom: 1px solid #dce7f1;
        white-space: nowrap;
    }

    .sk-table tbody td {
        padding: 14px;
        color: #405d7d;
        border-bottom: 1px solid #e6edf4;
        vertical-align: middle;
    }

    .sk-table tbody tr:last-child td {
        border-bottom: none;
    }

    .sk-table tbody tr:hover {
        background: #fbfdff;
    }

    .nomor {
        color: #35618b;
        width: 45px;
    }

    .kelurahan-badge {
        display: inline-block;
        background: #eaf3ff;
        color: #1262a4;
        padding: 6px 10px;
        border-radius: 6px;
        font-weight: 700;
    }

    .kecamatan-text {
        color: #6c84a0;
        font-size: 11px;
        margin-top: 3px;
    }

    .file-name {
        color: #35618b;
        font-weight: 600;
        word-break: break-word;
    }

    .action-wrapper {
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
    }

    .btn-action {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        border: none;
        text-decoration: none;
        padding: 7px 10px;
        border-radius: 6px;
        font-size: 11px;
        font-weight: 700;
        cursor: pointer;
    }

    .btn-action svg {
        width: 13px;
        height: 13px;
    }

    .btn-view {
        background: #e8f4ff;
        color: #087cf0;
    }

    .btn-view:hover {
        background: #d6ebff;
        color: #07366d;
    }

    .btn-delete {
        background: #fff0f0;
        color: #d9534f;
    }

    .btn-delete:hover {
        background: #ffe0e0;
        color: #b52b27;
    }

    /* EMPTY */
    .sk-empty {
        text-align: center;
        padding: 65px 20px;
    }

    .sk-empty-icon {
        width: 70px;
        height: 70px;
        margin: 0 auto 17px;
        background: #e8f3ff;
        color: #087cf0;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .sk-empty-icon svg {
        width: 34px;
        height: 34px;
    }

    .sk-empty h3 {
        margin: 0 0 7px;
        color: #07366d;
        font-size: 18px;
        font-weight: 800;
    }

    .sk-empty p {
        margin: 0;
        color: #6d88a7;
        font-size: 12px;
    }

    /* RESPONSIVE */
    @media (max-width: 800px) {
        .sk-page {
            padding: 20px 15px 30px;
        }

        .sk-header {
            align-items: flex-start;
            flex-direction: column;
            gap: 15px;
        }

        .sk-header-actions {
            width: 100%;
        }

        .btn-sk-back,
        .btn-sk-add {
            justify-content: center;
        }
    }
</style>


<div class="sk-page">

    <!-- HEADER -->
    <div class="sk-header">

        <div class="sk-header-content">

            <h1>
                SK Pokja Kelurahan Sehat
            </h1>

            <p>
                Kelola Surat Keputusan Pokja Kelurahan Sehat.
            </p>

        </div>

        <div class="sk-header-actions">

            <a
                href="<?= base_url('pokja-kelurahan-sehat/create') ?>"
                class="btn-sk-back"
            >
                ← Kembali
            </a>

            <a
                href="<?= base_url('pokja-kelurahan-sehat/sk/create') ?>"
                class="btn-sk-add"
            >
                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <circle cx="12" cy="12" r="9"></circle>
                    <path d="M12 8v8"></path>
                    <path d="M8 12h8"></path>
                </svg>

                Tambah Data
            </a>

        </div>

    </div>


    <!-- ALERT SUCCESS -->

    <?php if (session()->getFlashdata('success')) : ?>

        <div class="sk-alert sk-alert-success">

            <?= esc(
                session()->getFlashdata('success')
            ) ?>

        </div>

    <?php endif; ?>


    <!-- ALERT ERROR -->

    <?php if (session()->getFlashdata('error')) : ?>

        <div class="sk-alert sk-alert-error">

            <?= esc(
                session()->getFlashdata('error')
            ) ?>

        </div>

    <?php endif; ?>


    <!-- CARD -->

    <div class="sk-card">


        <!-- CARD HEADER -->

        <div class="sk-card-header">

            <div class="sk-card-icon">

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


            <div class="sk-card-title">

                <h2>
                    Data SK Pokja Kelurahan Sehat
                </h2>

                <p>
                    Daftar Surat Keputusan Pokja Kelurahan Sehat.
                </p>

            </div>

        </div>


        <?php if (!empty($data)) : ?>


            <!-- TABLE -->

            <div class="sk-table-wrapper">

                <table class="sk-table">

                    <thead>

                        <tr>

                            <th style="width: 50px;">
                                No
                            </th>

                            <?php if (!empty($isAdmin)) : ?>

                                <th>
                                    Kecamatan
                                </th>

                            <?php endif; ?>

                            <th>
                                Kelurahan
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

                            <th>
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php $no = 1; ?>

                        <?php foreach ($data as $row) : ?>

                            <tr>

                                <!-- NO -->

                                <td class="nomor">
                                    <?= $no++ ?>
                                </td>


                                <!-- KECAMATAN -->

                                <?php if (!empty($isAdmin)) : ?>

                                    <td>

                                        <strong>
                                            <?= esc(
                                                $row['nama_kecamatan']
                                                    ?? '-'
                                            ) ?>
                                        </strong>

                                    </td>

                                <?php endif; ?>


                                <!-- KELURAHAN -->

                                <td>

                                    <span class="kelurahan-badge">

                                        <?= esc(
                                            $row['nama_kelurahan']
                                                ?? '-'
                                        ) ?>

                                    </span>

                                </td>


                                <!-- NOMOR SK -->

                                <td>

                                    <?= !empty($row['no_sk'])
                                        ? esc($row['no_sk'])
                                        : '-'
                                    ?>

                                </td>


                                <!-- PERIODE -->

                                <td>

                                    <?= !empty($row['periode'])
                                        ? esc($row['periode'])
                                        : '-'
                                    ?>

                                </td>


                                <!-- KETERANGAN -->

                                <td>

                                    <?= !empty($row['keterangan'])
                                        ? esc($row['keterangan'])
                                        : '-'
                                    ?>

                                </td>


                                <!-- FILE -->

                                <td>

                                    <span class="file-name">

                                        <?= esc(
                                            $row['nama_asli']
                                                ?? $row['nama_file']
                                                ?? '-'
                                        ) ?>

                                    </span>

                                </td>


                                <!-- AKSI -->

                                <td>

                                    <div class="action-wrapper">


                                        <!-- LIHAT -->

                                        <a
                                            href="<?= base_url(
                                                'pokja-kelurahan-sehat/sk/view/'
                                                . $row['id']
                                            ) ?>"
                                            target="_blank"
                                            class="btn-action btn-view"
                                        >

                                            <svg
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            >

                                                <path
                                                    d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z"
                                                ></path>

                                                <circle
                                                    cx="12"
                                                    cy="12"
                                                    r="3"
                                                ></circle>

                                            </svg>

                                            Lihat

                                        </a>


                                        <!-- HAPUS -->

                                        <form
                                            action="<?= base_url(
                                                'pokja-kelurahan-sehat/sk/delete/'
                                                . $row['id']
                                            ) ?>"
                                            method="post"
                                            style="display:inline;"
                                            onsubmit="return confirm('Yakin ingin menghapus SK ini?');"
                                        >

                                            <?= csrf_field() ?>

                                            <button
                                                type="submit"
                                                class="btn-action btn-delete"
                                            >

                                                <svg
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                >

                                                    <polyline
                                                        points="3 6 5 6 21 6"
                                                    ></polyline>

                                                    <path
                                                        d="M19 6l-1 14H6L5 6"
                                                    ></path>

                                                    <path
                                                        d="M10 11v5"
                                                    ></path>

                                                    <path
                                                        d="M14 11v5"
                                                    ></path>

                                                    <path
                                                        d="M9 6V4h6v2"
                                                    ></path>

                                                </svg>

                                                Hapus

                                            </button>

                                        </form>


                                    </div>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>


        <?php else : ?>


            <!-- EMPTY DATA -->

            <div class="sk-empty">


                <div class="sk-empty-icon">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.7"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <path d="M7 3h7l4 4v14H7z"></path>

                        <path d="M14 3v5h5"></path>

                        <path d="M10 13h5"></path>

                        <path d="M10 17h3"></path>

                    </svg>

                </div>


                <h3>
                    Belum ada data SK Pokja Kelurahan Sehat
                </h3>


                <p>
                    Silakan tambahkan data SK terlebih dahulu.
                </p>


            </div>


        <?php endif; ?>


    </div>

</div>


<?= $this->endSection() ?>