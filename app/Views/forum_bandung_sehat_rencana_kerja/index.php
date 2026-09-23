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

    .btn-tambah {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 18px;
        border-radius: 9px;
        background: #087cf0;
        color: #ffffff;
        text-decoration: none;
        font-size: 14px;
        font-weight: 700;
    }

    .btn-tambah:hover {
        background: #0568cc;
        color: #ffffff;
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

    .empty-state {
        padding: 55px 20px 60px;
        text-align: center;
    }

    .empty-state-icon {
        width: 90px;
        height: 90px;
        margin: 0 auto 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 22px;
        background: #e8f3ff;
        color: #087cf0;
    }

    .empty-state-icon i {
        font-size: 48px;
    }

    .empty-state h5 {
        margin: 0 0 10px;
        color: #063b78;
        font-size: 23px;
        font-weight: 800;
    }

    .empty-state p {
        margin: 0;
        color: #7890aa;
        font-size: 15px;
    }

    .table-wrapper {
        padding: 25px 28px 28px;
        overflow-x: auto;
    }

    .table {
        margin-bottom: 0;
        vertical-align: middle;
    }

    .table thead th {
        padding: 15px;
        background: #087cf0;
        color: #ffffff;
        border: none;
        font-size: 14px;
        font-weight: 700;
        white-space: nowrap;
    }

    .table thead th:first-child {
        border-radius: 10px 0 0 10px;
    }

    .table thead th:last-child {
        border-radius: 0 10px 10px 0;
    }

    .table tbody td {
        padding: 15px;
        color: #506b88;
        border-color: #edf2f7;
        font-size: 14px;
    }

    .table tbody tr:hover {
        background: #f7fbff;
    }

    .badge-tahun {
        display: inline-block;
        padding: 6px 11px;
        border-radius: 7px;
        background: #e8f3ff;
        color: #087cf0;
        font-size: 13px;
        font-weight: 700;
    }

    .btn-aksi {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 7px 11px;
        border-radius: 7px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
    }

    .btn-edit {
        background: #e8f3ff;
        color: #087cf0;
    }

    .btn-edit:hover {
        background: #d7eaff;
        color: #0568cc;
    }

    .btn-hapus {
        border: 0;
        background: #fff0f0;
        color: #dc3545;
    }

    .btn-hapus:hover {
        background: #ffe0e0;
        color: #b02a37;
    }

    .alert {
        border-radius: 10px;
    }

    @media (max-width: 768px) {
        .kelembagaan-header {
            flex-direction: column;
        }

        .kelembagaan-header h1 {
            font-size: 28px;
        }

        .kelembagaan-card-header {
            padding: 20px;
        }

        .table-wrapper {
            padding: 18px;
        }
    }
</style>

<div class="kelembagaan-header">
    <div>
        <h1>Rencana Kerja</h1>
        <p>Kelola data rencana kerja Forum Bandung Sehat berdasarkan tahun.</p>
    </div>

    <a
        href="<?= site_url('forum-bandung-sehat/create') ?>"
        class="btn-kembali"
    >
        <i class="bi bi-arrow-left"></i>
        Kembali
    </a>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success mb-4">
        <?= esc(session()->getFlashdata('success')) ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger mb-4">
        <?= esc(session()->getFlashdata('error')) ?>
    </div>
<?php endif; ?>

<div class="kelembagaan-card">

    <div class="kelembagaan-card-header">
        <div class="kelembagaan-card-icon">
            <i class="bi bi-journal-text"></i>
        </div>

        <div class="flex-grow-1">
            <h2>Data Rencana Kerja</h2>
            <p>
                Daftar rencana kerja Forum Bandung Sehat setiap tahun.
            </p>
        </div>

        <a
            href="<?= site_url('forum-bandung-sehat/rencana-kerja/create') ?>"
            class="btn-tambah"
        >
            <i class="bi bi-plus-circle"></i>
            Tambah Data
        </a>
    </div>

    <?php if (empty($data)): ?>

        <div class="empty-state">

            <div class="empty-state-icon">
                <i class="bi bi-journal-text"></i>
            </div>

            <h5>Belum Ada Rencana Kerja</h5>

            <p>
                Silakan tambahkan rencana kerja berdasarkan tahun.
            </p>

        </div>

    <?php else: ?>

        <div class="table-wrapper">

            <table class="table table-hover">

                <thead>
                    <tr>
                        <th width="70">No</th>
                        <th width="150">Tahun</th>
                        <th>Data Rencana Kerja</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($data as $index => $row): ?>

                        <tr>
                            <td>
                                <?= $index + 1 ?>
                            </td>

                            <td>
                                <span class="badge-tahun">
                                    <?= esc($row['tahun']) ?>
                                </span>
                            </td>

                            <td>
                                <div style="
                                    max-width: 650px;
                                    white-space: pre-line;
                                    color: #506b88;
                                    line-height: 1.6;
                                ">
                                    <?= esc($row['data_rencana'] ?? '-') ?>
                                </div>
                            </td>

                            <td>
                                <div class="d-flex gap-2">

                                    <a
                                        href="<?= site_url('forum-bandung-sehat/rencana-kerja/edit/' . $row['id']) ?>"
                                        class="btn-aksi btn-edit"
                                    >
                                        <i class="bi bi-pencil"></i>
                                        Edit
                                    </a>

                                    <form
                                        action="<?= site_url('forum-bandung-sehat/rencana-kerja/delete/' . $row['id']) ?>"
                                        method="post"
                                        onsubmit="return confirm('Yakin ingin menghapus rencana kerja ini?')"
                                    >
                                        <?= csrf_field() ?>

                                        <button
                                            type="submit"
                                            class="btn-aksi btn-hapus"
                                        >
                                            <i class="bi bi-trash"></i>
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

    <?php endif; ?>

</div>

<?= $this->endSection() ?>