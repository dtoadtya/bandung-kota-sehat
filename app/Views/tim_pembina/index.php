<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .tim-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 20px;
        margin-bottom: 26px;
    }

    .tim-header h1 {
        margin: 0;
        color: #063b78;
        font-size: 34px;
        font-weight: 800;
    }

    .tim-header p {
        margin: 8px 0 0;
        color: #7186a0;
        font-size: 16px;
    }

    .btn-tambah {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 11px 18px;
        border-radius: 9px;
        background: #087cf0;
        color: #ffffff;
        text-decoration: none;
        font-size: 14px;
        font-weight: 700;
        white-space: nowrap;
        border: none;
    }

    .btn-tambah:hover {
        background: #0568cc;
        color: #ffffff;
    }

    .tim-card {
        background: #ffffff;
        border: 1px solid #e0ebf5;
        border-radius: 16px;
        box-shadow: 0 5px 18px rgba(22, 73, 121, 0.06);
        overflow: hidden;
    }

    .tim-card-header {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 24px 28px;
        border-bottom: 1px solid #edf2f7;
    }

    .tim-card-icon {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: #e8f3ff;
        color: #087cf0;
        font-size: 24px;
        flex-shrink: 0;
    }

    .tim-card-header h2 {
        margin: 0;
        color: #063b78;
        font-size: 23px;
        font-weight: 800;
    }

    .tim-card-header p {
        margin: 5px 0 0;
        color: #7890aa;
        font-size: 14px;
    }

    .table-wrapper {
        padding: 20px 28px 28px;
        overflow-x: auto;
    }

    .tim-table {
        width: 100%;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
        vertical-align: middle;
    }

    .tim-table thead th {
        padding: 14px 12px;
        background: #e8f3ff;
        color: #174d83;
        border-top: 1px solid #bcd5ed;
        border-bottom: 1px solid #bcd5ed;
        border-right: 1px solid #bcd5ed;
        font-size: 14px;
        font-weight: 800;
        white-space: nowrap;
    }

    .tim-table thead th:first-child {
        border-left: 1px solid #bcd5ed;
        border-radius: 8px 0 0 0;
    }

    .tim-table thead th:last-child {
        border-radius: 0 8px 0 0;
    }

    .tim-table tbody td {
        padding: 14px 12px;
        color: #506b88;
        border-left: 1px solid #dce8f3;
        border-bottom: 1px solid #dce8f3;
        font-size: 14px;
        background: #ffffff;
    }

    .tim-table tbody td:last-child {
        border-right: 1px solid #dce8f3;
    }

    .tim-table tbody tr:last-child td:first-child {
        border-radius: 0 0 0 8px;
    }

    .tim-table tbody tr:last-child td:last-child {
        border-radius: 0 0 8px 0;
    }

    .tim-table tbody tr:hover td {
        background: #f7fbff;
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
        font-size: 21px;
        font-weight: 800;
    }

    .empty-state p {
        margin: 0;
        color: #7890aa;
        font-size: 15px;
    }

    .btn-aksi {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        padding: 7px 11px;
        border-radius: 7px;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        border: none;
        white-space: nowrap;
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
        background: #fff0f0;
        color: #dc3545;
    }

    .btn-hapus:hover {
        background: #ffe0e0;
        color: #b02a37;
    }

    .badge-tahun {
        display: inline-block;
        padding: 5px 9px;
        border-radius: 7px;
        background: #e8f3ff;
        color: #087cf0;
        font-size: 12px;
        font-weight: 700;
    }

    .alert {
        border-radius: 10px;
    }

    @media (max-width: 768px) {
        .tim-header {
            flex-direction: column;
        }

        .tim-header h1 {
            font-size: 28px;
        }

        .tim-card-header {
            padding: 20px;
            align-items: flex-start;
        }

        .table-wrapper {
            padding: 18px;
        }
    }
</style>

<div class="tim-header">
    <div>
        <h1>Tim Pembina</h1>
        <p>Pengelolaan data Tim Pembina Bandung Sehat.</p>
    </div>

    <a
        href="<?= site_url('tim-pembina/create') ?>"
        class="btn-tambah"
    >
        <i class="bi bi-plus-circle"></i>
        Tambah Data
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

<div class="tim-card">

    <div class="tim-card-header">
        <div class="tim-card-icon">
            <i class="bi bi-people-fill"></i>
        </div>

        <div>
            <h2>Data Tim Pembina</h2>
            <p>
                Daftar anggota dan informasi Tim Pembina Bandung Sehat.
            </p>
        </div>
    </div>

    <?php if (empty($data)): ?>

        <div class="empty-state">

            <div class="empty-state-icon">
                <i class="bi bi-people"></i>
            </div>

            <h5>Belum ada data Tim Pembina</h5>

            <p>
                Silakan tambahkan data Tim Pembina terlebih dahulu.
            </p>

        </div>

    <?php else: ?>

        <div class="table-wrapper">

            <table class="tim-table">

                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Instansi</th>
                        <th>Tahun</th>
                        <th>Keterangan</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($data as $index => $row): ?>

                        <tr>
                            <td>
                                <?= $index + 1 ?>
                            </td>

                            <td>
                                <strong style="color: #063b78;">
                                    <?= esc($row['nama'] ?? '-') ?>
                                </strong>
                            </td>

                            <td>
                                <?= esc($row['jabatan'] ?? '-') ?>
                            </td>

                            <td>
                                <?= esc($row['instansi'] ?? '-') ?>
                            </td>

                            <td>
                                <?php if (!empty($row['tahun'])): ?>
                                    <span class="badge-tahun">
                                        <?= esc($row['tahun']) ?>
                                    </span>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>

                            <td>
                                <?= esc($row['keterangan'] ?? '-') ?>
                            </td>

                            <td>
                                <div class="d-flex gap-2">

                                    <?php if (isset($row['id'])): ?>

                                        <form
                                            action="<?= site_url('tim-pembina/delete/' . $row['id']) ?>"
                                            method="post"
                                            onsubmit="return confirm('Yakin ingin menghapus data Tim Pembina ini?')"
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

                                    <?php endif; ?>

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