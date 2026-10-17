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
        text-align: center;
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
        text-align: center;
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
        align-items: center;
        justify-content: flex-start;
        gap: 7px;
        flex-wrap: nowrap;
    }

    .btn-action {
        width: 115px;
        height: 36px;
        box-sizing: border-box;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        border: none;
        text-decoration: none;
        padding: 0 8px;
        margin: 0;
        border-radius: 6px;
        font-size: 11px;
        font-weight: 700;
        cursor: pointer;
        white-space: nowrap;
        transition: .2s;
    }

    .btn-action svg {
        width: 13px;
        height: 13px;
        flex-shrink: 0;
    }

    .btn-view {
        background: #e8f4ff;
        color: #087cf0;
    }

    .btn-view:hover {
        background: #d6ebff;
        color: #07366d;
    }

    .btn-edit {
        background: #fff7e6;
        color: #c27a00;
    }

    .btn-edit:hover {
        background: #fff0cc;
        color: #8a5500;
    }

    .btn-delete {
        background: #fff0f0;
        color: #d9534f;
    }

    .btn-delete:hover {
        background: #ffe0e0;
        color: #b52b27;
    }

    /* STATUS */
    .status-wrapper {
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        align-items: center;
        justify-content: center;
        gap: 7px;
    }

    .badge-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 13px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        white-space: nowrap;
    }

    .badge-pending {
        background: #fff8e1;
        color: #b77900;
        border: 1px solid #f2c94c;
    }

    .badge-disetujui {
        background: #eafaf1;
        color: #159957;
        border: 1px solid #9eddbb;
    }

    .badge-diverifikasi {
        background: #eaf3ff;
        color: #0b4f9c;
        border: 1px solid #9bc7f5;
    }

    .badge-ditolak {
        background: #fff0f0;
        color: #d9534f;
        border: 1px solid #f0aaaa;
    }

    .btn-status-approve,
    .btn-status-reject,
    .btn-status-info {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        border-radius: 6px;
        font-size: 11px;
        font-weight: 700;
        padding: 6px 10px;
        cursor: pointer;
        border: 1px solid transparent;
    }

    .btn-status-approve {
        background: #eafaf1;
        color: #159957;
        border-color: #9eddbb;
    }

    .btn-status-reject {
        background: #fff0f0;
        color: #d9534f;
        border-color: #f0aaaa;
    }

    .btn-status-info {
        background: #eef7ff;
        color: #0b4f9c;
        border-color: #9bc7f5;
    }

    .status-actions {
        display: flex;
        gap: 6px;
        flex-wrap: nowrap;
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

                            <th style="width: 220px;">
                                Status
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php $no = 1; ?>

                        <?php foreach ($data as $row) : ?>


                            <?php

                                $status =
                                    strtolower(
                                        trim(
                                            $row['status']
                                            ?? 'pending'
                                        )
                                    );

                                $role =
                                    session()->get('role');

                            ?>


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


                                        <!-- LIHAT BERKAS -->

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

                                            Lihat Berkas

                                        </a>


                                        <!-- EDIT BERKAS -->

                                        <a
                                            href="<?= base_url(
                                                'pokja-kelurahan-sehat/sk/edit/'
                                                . $row['id']
                                            ) ?>"
                                            class="btn-action btn-edit"
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
                                                    d="M17 3a2.83 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"
                                                ></path>

                                            </svg>

                                            Edit Berkas

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


                                <!-- STATUS -->

                                <td>

                                    <?php if ($role === 'admin'): ?>


                                        <?php if ($status === 'disetujui'): ?>


                                            <div class="status-wrapper">

                                                <span
                                                    class="badge-status badge-diverifikasi"
                                                >

                                                    <i class="bi bi-check-circle-fill"></i>

                                                    Diverifikasi

                                                </span>

                                            </div>


                                        <?php elseif ($status === 'ditolak'): ?>


                                            <div class="status-wrapper">

                                                <span
                                                    class="badge-status badge-ditolak"
                                                >

                                                    <i class="bi bi-x-circle-fill"></i>

                                                    Ditolak

                                                </span>


                                                <?php if (
                                                    !empty(
                                                        $row['keterangan_penolakan']
                                                    )
                                                ): ?>

                                                    <button
                                                        type="button"
                                                        class="btn-status-info"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#alasanModal<?= $row['id'] ?>"
                                                    >
                                                        <i class="bi bi-info-circle"></i>
                                                        Lihat Keterangan
                                                    </button>

                                                <?php endif; ?>

                                            </div>


                                        <?php else: ?>


                                            <div class="status-wrapper">

                                                <span
                                                    class="badge-status badge-pending"
                                                >

                                                    <i class="bi bi-clock-fill"></i>

                                                    Pending

                                                </span>


                                                <div class="status-actions">


                                                    <form
                                                        action="<?= base_url(
                                                            'pokja-kelurahan-sehat/sk/disetujui/' .
                                                            $row['id']
                                                        ) ?>"
                                                        method="post"
                                                        class="d-inline"
                                                    >

                                                        <?= csrf_field() ?>


                                                        <button
                                                            type="submit"
                                                            class="btn-status-approve"
                                                            onclick="return confirm(
                                                                'Apakah Anda yakin menyetujui SK ini?'
                                                            );"
                                                        >

                                                            <i class="bi bi-check-lg"></i>

                                                            Setujui

                                                        </button>

                                                    </form>


                                                    <button
                                                        type="button"
                                                        class="btn-status-reject"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#tolakModal<?= $row['id'] ?>"
                                                    >

                                                        <i class="bi bi-x-lg"></i>

                                                        Tolak

                                                    </button>


                                                </div>

                                            </div>


                                        <?php endif; ?>


                                    <?php else: ?>


                                        <!-- USER: HANYA MELIHAT STATUS -->

                                        <?php if ($status === 'disetujui'): ?>

                                            <span
                                                class="badge-status badge-disetujui"
                                            >

                                                <i class="bi bi-check-circle-fill"></i>

                                                Disetujui

                                            </span>

                                        <?php elseif ($status === 'ditolak'): ?>

                                            <div class="status-wrapper">

                                                <span
                                                    class="badge-status badge-ditolak"
                                                >

                                                    <i class="bi bi-x-circle-fill"></i>

                                                    Ditolak

                                                </span>


                                                <?php if (
                                                    !empty(
                                                        $row['keterangan_penolakan']
                                                    )
                                                ): ?>

                                                    <button
                                                        type="button"
                                                        class="btn-status-info"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#alasanModal<?= $row['id'] ?>"
                                                    >
                                                        <i class="bi bi-info-circle"></i>
                                                        Lihat Keterangan
                                                    </button>

                                                <?php endif; ?>

                                            </div>

                                        <?php else: ?>

                                            <span
                                                class="badge-status badge-pending"
                                            >

                                                <i class="bi bi-clock-fill"></i>

                                                Pending

                                            </span>

                                        <?php endif; ?>


                                    <?php endif; ?>

                                </td>

                            </tr>


                            <!-- MODAL TOLAK (ADMIN) -->

                            <?php if ($role === 'admin'): ?>


                                <div
                                    class="modal fade"
                                    id="tolakModal<?= $row['id'] ?>"
                                    tabindex="-1"
                                    aria-hidden="true"
                                >

                                    <div
                                        class="modal-dialog modal-dialog-centered"
                                    >

                                        <div class="modal-content">


                                            <div class="modal-header">

                                                <h5
                                                    class="modal-title fw-bold text-danger"
                                                >

                                                    <i class="bi bi-x-circle me-2"></i>

                                                    Tolak Berkas SK

                                                </h5>


                                                <button
                                                    type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"
                                                ></button>

                                            </div>


                                            <form
                                                action="<?= base_url(
                                                    'pokja-kelurahan-sehat/sk/tolak/' .
                                                    $row['id']
                                                ) ?>"
                                                method="post"
                                            >

                                                <?= csrf_field() ?>


                                                <div class="modal-body">


                                                    <div class="mb-3">

                                                        <label class="form-label fw-semibold">
                                                            Nomor SK
                                                        </label>


                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            value="<?= esc(
                                                                $row['no_sk']
                                                                ?? '-'
                                                            ) ?>"
                                                            readonly
                                                        >

                                                    </div>


                                                    <div class="mb-3">

                                                        <label class="form-label fw-semibold">

                                                            Alasan Penolakan

                                                            <span class="text-danger">
                                                                *
                                                            </span>

                                                        </label>


                                                        <textarea
                                                            name="keterangan_penolakan"
                                                            class="form-control"
                                                            rows="5"
                                                            placeholder="Masukkan alasan mengapa berkas SK ditolak..."
                                                            required
                                                        ></textarea>


                                                        <small class="text-muted">

                                                            Keterangan penolakan
                                                            wajib diisi.

                                                        </small>

                                                    </div>


                                                </div>


                                                <div class="modal-footer">


                                                    <button
                                                        type="button"
                                                        class="btn btn-secondary"
                                                        data-bs-dismiss="modal"
                                                    >
                                                        Batal
                                                    </button>


                                                    <button
                                                        type="submit"
                                                        class="btn btn-danger"
                                                    >
                                                        <i class="bi bi-x-circle me-1"></i>
                                                        Tolak Berkas
                                                    </button>


                                                </div>


                                            </form>

                                        </div>

                                    </div>

                                </div>


                            <?php endif; ?>


                            <!-- MODAL ALASAN PENOLAKAN -->

                            <?php if (
                                !empty(
                                    $row['keterangan_penolakan']
                                )
                            ): ?>


                                <div
                                    class="modal fade"
                                    id="alasanModal<?= $row['id'] ?>"
                                    tabindex="-1"
                                    aria-hidden="true"
                                >

                                    <div
                                        class="modal-dialog modal-dialog-centered"
                                    >

                                        <div class="modal-content">


                                            <div class="modal-header">

                                                <h5
                                                    class="modal-title fw-bold text-danger"
                                                >

                                                    <i class="bi bi-exclamation-circle me-2"></i>

                                                    Alasan Penolakan

                                                </h5>


                                                <button
                                                    type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"
                                                ></button>

                                            </div>


                                            <div class="modal-body">


                                                <div class="alert alert-danger mb-0">

                                                    <div class="fw-bold mb-2">

                                                        Keterangan Penolakan:

                                                    </div>


                                                    <?= nl2br(
                                                        esc(
                                                            $row['keterangan_penolakan']
                                                        )
                                                    ) ?>

                                                </div>


                                            </div>


                                            <div class="modal-footer">

                                                <button
                                                    type="button"
                                                    class="btn btn-secondary"
                                                    data-bs-dismiss="modal"
                                                >
                                                    Tutup
                                                </button>

                                            </div>


                                        </div>

                                    </div>

                                </div>


                            <?php endif; ?>


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