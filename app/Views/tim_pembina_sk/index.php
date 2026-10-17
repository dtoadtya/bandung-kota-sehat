<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>


<div class="container-fluid py-4">


    <!-- =====================================================
         PESAN SUCCESS
    ====================================================== -->

    <?php if (session()->getFlashdata('success')): ?>

        <div class="alert alert-success alert-dismissible fade show">

            <i class="bi bi-check-circle-fill me-2"></i>

            <?= session()->getFlashdata('success') ?>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    <?php endif; ?>


    <!-- =====================================================
         PESAN ERROR
    ====================================================== -->

    <?php if (session()->getFlashdata('error')): ?>

        <div class="alert alert-danger alert-dismissible fade show">

            <i class="bi bi-exclamation-circle-fill me-2"></i>

            <?= session()->getFlashdata('error') ?>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    <?php endif; ?>


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <div class="sk-header">

        <div class="sk-header-content">

            <div class="sk-header-text">

                <h2>

                    <i class="bi bi-file-earmark-check me-2"></i>

                    SK Tim Pembina

                </h2>

                <p>
                    Kelola Surat Keputusan Tim Pembina Bandung Sehat.
                </p>

            </div>


            <!-- TOMBOL TAMBAH SK -->

            <a
                href="<?= base_url('tim-pembina/sk/create') ?>"
                class="btn-tambah-sk"
            >

                <i class="bi bi-plus-lg"></i>

                <span>
                    Tambah SK
                </span>

            </a>

        </div>

    </div>


    <!-- =====================================================
         CARD DATA
    ====================================================== -->

    <div class="card border-0 shadow-sm sk-card">


        <!-- CARD HEADER -->

        <div class="card-header bg-white border-0 py-4">

            <div class="d-flex align-items-center">

                <div class="icon-box me-3">

                    <i class="bi bi-file-earmark-text"></i>

                </div>


                <div>

                    <h4 class="fw-bold mb-1">
                        Data SK Tim Pembina
                    </h4>

                    <p class="text-muted mb-0">
                        Daftar Surat Keputusan Tim Pembina Bandung Sehat.
                    </p>

                </div>

            </div>

        </div>


        <!-- =================================================
             TABLE
        ================================================== -->

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead>

                    <tr>

                        <th width="60">
                            No
                        </th>

                        <th>
                            Nomor SK
                        </th>

                        <th width="120">
                            Periode
                        </th>

                        <th>
                            Keterangan
                        </th>

                        <th>
                            Nama File
                        </th>

                        <th width="360">
                            Aksi
                        </th>

                        <th width="220">
                            Status
                        </th>

                    </tr>

                </thead>


                <tbody>


                <?php if (!empty($data)): ?>


                    <?php $no = 1; ?>


                    <?php foreach ($data as $row): ?>


                        <?php

                            /*
                            |--------------------------------------------------------------------------
                            | STATUS
                            |--------------------------------------------------------------------------
                            */

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


                            <!-- =================================================
                                 NO
                            ================================================== -->

                            <td>

                                <?= $no++ ?>

                            </td>


                            <!-- =================================================
                                 NOMOR SK
                            ================================================== -->

                            <td>

                                <strong>

                                    <?= esc(
                                        $row['no_sk']
                                        ?? '-'
                                    ) ?>

                                </strong>

                            </td>


                            <!-- =================================================
                                 PERIODE
                            ================================================== -->

                            <td>

                                <?= esc(
                                    $row['periode']
                                    ?? '-'
                                ) ?>

                            </td>


                            <!-- =================================================
                                 KETERANGAN
                            ================================================== -->

                            <td>

                                <?= esc(
                                    $row['keterangan']
                                    ?? '-'
                                ) ?>

                            </td>


                            <!-- =================================================
                                 FILE
                            ================================================== -->

                            <td>

                                <?php if (!empty($row['nama_asli'])): ?>

                                    <span class="file-name">

                                        <i
                                            class="bi bi-file-earmark-pdf text-danger me-1">
                                        </i>

                                        <?= esc(
                                            $row['nama_asli']
                                        ) ?>

                                    </span>

                                <?php elseif (!empty($row['nama_file'])): ?>

                                    <span class="file-name">

                                        <i
                                            class="bi bi-file-earmark-pdf text-danger me-1">
                                        </i>

                                        <?= esc(
                                            $row['nama_file']
                                        ) ?>

                                    </span>

                                <?php else: ?>

                                    <span class="text-muted">
                                        -
                                    </span>

                                <?php endif; ?>

                            </td>


                            <!-- =================================================
                                 AKSI
                            ================================================== -->

                            <td>

                                <div class="d-flex gap-2 flex-wrap">


                                    <!-- LIHAT BERKAS -->

                                    <a
                                        href="<?= base_url(
                                            'tim-pembina/sk/view/' .
                                            $row['id']
                                        ) ?>"
                                        class="btn btn-sm btn-outline-primary"
                                    >

                                        <i class="bi bi-eye"></i>

                                        Lihat Berkas

                                    </a>


                                    <?php
                                    /*
                                    |--------------------------------------------------------------------------
                                    | EDIT DAN HAPUS
                                    |--------------------------------------------------------------------------
                                    |
                                    | User tetap dapat melihat.
                                    | Tombol pengelolaan hanya untuk Admin.
                                    |
                                    */
                                    ?>

                                    <?php if ($role === 'admin'): ?>


                                        <!-- EDIT -->

                                        <a
                                            href="<?= base_url(
                                                'tim-pembina/sk/edit/' .
                                                $row['id']
                                            ) ?>"
                                            class="btn btn-sm btn-outline-warning"
                                        >

                                            <i class="bi bi-pencil"></i>

                                            Edit Berkas

                                        </a>


                                        <!-- HAPUS -->

                                        <form
                                            action="<?= base_url(
                                                'tim-pembina/sk/delete/' .
                                                $row['id']
                                            ) ?>"
                                            method="post"
                                            class="d-inline"
                                            onsubmit="return confirm(
                                                'Yakin ingin menghapus SK ini?'
                                            );"
                                        >

                                            <?= csrf_field() ?>

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-outline-danger"
                                            >

                                                <i class="bi bi-trash"></i>

                                                Hapus

                                            </button>

                                        </form>


                                    <?php endif; ?>


                                </div>

                            </td>


                            <!-- =================================================
                                 STATUS
                            ================================================== -->

                            <td>


                                <?php if ($role === 'admin'): ?>


                                    <!-- =========================================
                                         ADMIN
                                    ========================================== -->


                                    <?php if ($status === 'diterima'): ?>


                                        <!-- DITERIMA -->

                                        <div class="status-wrapper">

                                            <span
                                                class="badge-status badge-diterima"
                                            >

                                                <i class="bi bi-check-circle-fill"></i>

                                                Diterima

                                            </span>


                                            <!-- HASIL -->

                                            <span
                                                class="badge-status badge-diverifikasi"
                                            >

                                                <i class="bi bi-shield-check"></i>

                                                Diverifikasi

                                            </span>

                                        </div>


                                    <?php elseif ($status === 'ditolak'): ?>


                                        <!-- DITOLAK -->

                                        <div class="status-wrapper">

                                            <span
                                                class="badge-status badge-ditolak"
                                            >

                                                <i class="bi bi-x-circle-fill"></i>

                                                Ditolak

                                            </span>


                                            <?php if (
                                                !empty(
                                                    $row[
                                                        'keterangan_penolakan'
                                                    ]
                                                )
                                            ): ?>

                                                <button
                                                    type="button"
                                                    class="btn btn-sm btn-outline-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#alasanModal<?= $row['id'] ?>"
                                                >

                                                    <i class="bi bi-info-circle"></i>

                                                    Lihat Keterangan

                                                </button>

                                            <?php endif; ?>

                                        </div>


                                    <?php else: ?>


                                        <!-- PENDING -->

                                        <div class="status-wrapper">

                                            <span
                                                class="badge-status badge-pending"
                                            >

                                                <i class="bi bi-clock-fill"></i>

                                                Pending

                                            </span>


                                            <div
                                                class="d-flex gap-2 flex-wrap mt-2"
                                            >


                                                <!-- =================================
                                                     DITERIMA
                                                ================================== -->

                                                <form
                                                    action="<?= base_url(
                                                        'tim-pembina/sk/verifikasi/' .
                                                        $row['id']
                                                    ) ?>"
                                                    method="post"
                                                    class="d-inline"
                                                >

                                                    <?= csrf_field() ?>


                                                    <button
                                                        type="submit"
                                                        class="btn btn-sm btn-outline-success"
                                                        onclick="return confirm(
                                                            'Apakah Anda yakin menerima SK ini?'
                                                        );"
                                                    >

                                                        <i
                                                            class="bi bi-check-lg">
                                                        </i>

                                                        Diterima

                                                    </button>

                                                </form>


                                                <!-- =================================
                                                     DITOLAK
                                                ================================== -->

                                                <button
                                                    type="button"
                                                    class="btn btn-sm btn-outline-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#tolakModal<?= $row['id'] ?>"
                                                >

                                                    <i class="bi bi-x-lg"></i>

                                                    Ditolak

                                                </button>


                                            </div>

                                        </div>


                                    <?php endif; ?>


                                <?php else: ?>


                                    <!-- =========================================
                                         USER
                                         HANYA MELIHAT
                                    ========================================== -->


                                    <?php if ($status === 'diterima'): ?>


                                        <div class="status-wrapper">

                                            <span
                                                class="badge-status badge-diterima"
                                            >

                                                <i
                                                    class="bi bi-check-circle-fill">
                                                </i>

                                                Diterima

                                            </span>


                                            <span
                                                class="badge-status badge-diverifikasi"
                                            >

                                                <i
                                                    class="bi bi-shield-check">
                                                </i>

                                                Diverifikasi

                                            </span>

                                        </div>


                                    <?php elseif ($status === 'ditolak'): ?>


                                        <div class="status-wrapper">

                                            <span
                                                class="badge-status badge-ditolak"
                                            >

                                                <i
                                                    class="bi bi-x-circle-fill">
                                                </i>

                                                Ditolak

                                            </span>


                                            <?php if (
                                                !empty(
                                                    $row[
                                                        'keterangan_penolakan'
                                                    ]
                                                )
                                            ): ?>

                                                <button
                                                    type="button"
                                                    class="btn btn-sm btn-outline-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#alasanModal<?= $row['id'] ?>"
                                                >

                                                    <i
                                                        class="bi bi-info-circle">
                                                    </i>

                                                    Lihat Keterangan

                                                </button>

                                            <?php endif; ?>

                                        </div>


                                    <?php else: ?>


                                        <span
                                            class="badge-status badge-pending"
                                        >

                                            <i
                                                class="bi bi-clock-fill">
                                            </i>

                                            Pending

                                        </span>


                                    <?php endif; ?>


                                <?php endif; ?>


                            </td>


                        </tr>


                        <!-- =====================================================
                             MODAL TOLAK
                        ====================================================== -->

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

                                                <i
                                                    class="bi bi-x-circle me-2">
                                                </i>

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
                                                'tim-pembina/sk/tolak/' .
                                                $row['id']
                                            ) ?>"
                                            method="post"
                                        >

                                            <?= csrf_field() ?>


                                            <div class="modal-body">


                                                <!-- NOMOR SK -->

                                                <div class="mb-3">

                                                    <label
                                                        class="form-label fw-semibold"
                                                    >
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


                                                <!-- ALASAN -->

                                                <div class="mb-3">

                                                    <label
                                                        class="form-label fw-semibold"
                                                    >

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


                                                    <small
                                                        class="text-muted"
                                                    >

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

                                                    <i
                                                        class="bi bi-x-circle me-1">
                                                    </i>

                                                    Tolak Berkas

                                                </button>


                                            </div>


                                        </form>

                                    </div>

                                </div>

                            </div>


                        <?php endif; ?>


                        <!-- =====================================================
                             MODAL ALASAN PENOLAKAN
                        ====================================================== -->

                        <?php if (
                            !empty(
                                $row[
                                    'keterangan_penolakan'
                                ]
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

                                                <i
                                                    class="bi bi-exclamation-circle me-2">
                                                </i>

                                                Alasan Penolakan

                                            </h5>


                                            <button
                                                type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"
                                            ></button>

                                        </div>


                                        <div class="modal-body">


                                            <div
                                                class="alert alert-danger mb-0"
                                            >

                                                <div class="fw-bold mb-2">

                                                    Keterangan Penolakan:

                                                </div>


                                                <?= nl2br(
                                                    esc(
                                                        $row[
                                                            'keterangan_penolakan'
                                                        ]
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


                <?php else: ?>


                    <!-- =================================================
                         DATA KOSONG
                    ================================================== -->

                    <tr>

                        <td
                            colspan="7"
                            class="text-center py-5"
                        >

                            <div class="text-muted">

                                <i
                                    class="bi bi-folder-x fs-1">
                                </i>


                                <p class="mt-3 mb-0">

                                    Belum ada data SK Tim Pembina.

                                </p>

                            </div>

                        </td>

                    </tr>


                <?php endif; ?>


                </tbody>

            </table>

        </div>

    </div>

</div>


<!-- =====================================================
     STYLE
====================================================== -->

<style>

/* =====================================================
   HEADER
===================================================== */

.sk-header {

    background:
        linear-gradient(
            135deg,
            #eaf3ff,
            #dceeff
        );

    border-left:
        5px solid #1590ef;

    border-radius:
        15px;

    padding:
        25px 35px;

    margin-bottom:
        24px;

    min-height:
        120px;

    display:
        flex;

    align-items:
        center;

    position:
        relative;

    overflow:
        hidden;
}


.sk-header::after {

    content:
        "";

    position:
        absolute;

    width:
        150px;

    height:
        150px;

    border-radius:
        50%;

    background:
        rgba(255,255,255,.35);

    right:
        -40px;

    top:
        -50px;
}


.sk-header-content {

    width:
        100%;

    display:
        flex;

    justify-content:
        space-between;

    align-items:
        center;

    position:
        relative;

    z-index:
        2;
}


.sk-header h2 {

    color:
        #07366d;

    font-size:
        30px;

    font-weight:
        700;

    margin:
        0 0 6px 0;
}


.sk-header p {

    color:
        #5b79a2;

    margin:
        0;
}


/* =====================================================
   TAMBAH SK
===================================================== */

.btn-tambah-sk {

    display:
        inline-flex;

    align-items:
        center;

    gap:
        7px;

    background:
        #0b82ef;

    color:
        #ffffff;

    border:
        none;

    border-radius:
        8px;

    padding:
        12px 20px;

    text-decoration:
        none;

    font-weight:
        600;

    position:
        relative;

    z-index:
        5;

    transition:
        .2s;
}


.btn-tambah-sk:hover {

    background:
        #07366d;

    color:
        #ffffff;

    transform:
        translateY(-1px);
}


/* =====================================================
   CARD
===================================================== */

.sk-card {

    border-radius:
        15px;

    overflow:
        hidden;

    border:
        1px solid #dce6f2;
}


/* =====================================================
   ICON
===================================================== */

.icon-box {

    width:
        45px;

    height:
        45px;

    border-radius:
        12px;

    background:
        #eaf3ff;

    color:
        #0b4f9c;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    font-size:
        20px;
}


/* =====================================================
   TABLE
===================================================== */

.table-responsive {

    overflow-x:
        auto;
}


.table {

    min-width:
        1150px;
}


.table thead th {

    background:
        #eaf3ff;

    color:
        #07366d;

    font-weight:
        700;

    white-space:
        nowrap;

    border-bottom:
        1px solid #d9e6f5;

    padding:
        14px;
}


.table tbody td {

    vertical-align:
        middle;

    white-space:
        nowrap;

    padding:
        14px;
}


.table-hover tbody tr:hover {

    background-color:
        #f8fbff;
}


/* =====================================================
   FILE
===================================================== */

.file-name {

    display:
        inline-block;

    max-width:
        280px;

    overflow:
        hidden;

    text-overflow:
        ellipsis;

    white-space:
        nowrap;

    background:
        #eef7ff;

    color:
        #0b4f9c;

    padding:
        7px 10px;

    border-radius:
        8px;

    font-size:
        13px;
}


/* =====================================================
   BUTTON
===================================================== */

.btn {

    border-radius:
        8px;
}


.btn-outline-primary {

    color:
        #0b82ef;

    border-color:
        #9bc7f5;

    background:
        #ffffff;
}


.btn-outline-primary:hover {

    color:
        #ffffff;

    background:
        #0b82ef;

    border-color:
        #0b82ef;
}


.btn-outline-warning {

    color:
        #b77900;

    border-color:
        #f0c36d;

    background:
        #ffffff;
}


.btn-outline-warning:hover {

    color:
        #ffffff;

    background:
        #f2b705;

    border-color:
        #f2b705;
}


.btn-outline-danger {

    color:
        #d9534f;

    border-color:
        #efb0ad;

    background:
        #ffffff;
}


.btn-outline-danger:hover {

    color:
        #ffffff;

    background:
        #d9534f;

    border-color:
        #d9534f;
}


.btn-outline-success {

    color:
        #159957;

    border-color:
        #9eddbb;

    background:
        #ffffff;
}


.btn-outline-success:hover {

    color:
        #ffffff;

    background:
        #159957;

    border-color:
        #159957;
}


/* =====================================================
   STATUS
===================================================== */

.status-wrapper {

    display:
        flex;

    flex-direction:
        column;

    align-items:
        flex-start;

    gap:
        7px;
}


/* PENDING */

.badge-status {

    display:
        inline-flex;

    align-items:
        center;

    justify-content:
        center;

    gap:
        6px;

    min-width:
        110px;

    padding:
        8px 13px;

    border-radius:
        20px;

    font-size:
        12px;

    font-weight:
        700;

    white-space:
        nowrap;
}


.badge-pending {

    background:
        #fff8e1;

    color:
        #b77900;

    border:
        1px solid #f2c94c;
}


/* DITERIMA */

.badge-diterima {

    background:
        #eafaf1;

    color:
        #159957;

    border:
        1px solid #9eddbb;
}


/* DIVERIFIKASI */

.badge-diverifikasi {

    background:
        #eaf3ff;

    color:
        #0b4f9c;

    border:
        1px solid #9bc7f5;
}


/* DITOLAK */

.badge-ditolak {

    background:
        #fff0f0;

    color:
        #d9534f;

    border:
        1px solid #f0aaaa;
}


/* =====================================================
   MODAL
===================================================== */

.modal-content {

    border:
        0;

    border-radius:
        15px;

    box-shadow:
        0 15px 40px rgba(0,0,0,.15);
}


.modal-header {

    border-bottom:
        1px solid #e5eaf0;
}


.modal-footer {

    border-top:
        1px solid #e5eaf0;
}


/* =====================================================
   RESPONSIVE
===================================================== */

@media(max-width:768px) {

    .sk-header {

        padding:
            20px;

    }


    .sk-header-content {

        flex-direction:
            column;

        align-items:
            flex-start;

        gap:
            20px;

    }


    .sk-header h2 {

        font-size:
            24px;

    }


    .btn-tambah-sk {

        width:
            100%;

        justify-content:
            center;

    }

}

</style>


<?= $this->endSection() ?>