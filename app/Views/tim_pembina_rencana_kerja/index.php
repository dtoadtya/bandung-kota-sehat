<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .page-wrapper {
        background: #f4f8fc;
        min-height: calc(100vh - 70px);
        padding: 28px;
    }

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
        width: 150px;
        height: 150px;
        right: -40px;
        top: -70px;
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
        display: flex;
        gap: 8px;
    }

    .btn-kembali,
    .btn-tambah {
        text-decoration: none;
        border-radius: 8px;
        padding: 11px 18px;
        font-size: 13px;
        font-weight: 700;
    }

    .btn-kembali {
        background: #fff;
        color: #0b4f9c;
        border: 1px solid #cbdff2;
    }

    .btn-tambah {
        background: #087ff5;
        color: #fff;
        border: 1px solid #087ff5;
    }

    .btn-kembali:hover {
        background: #eef7ff;
    }

    .btn-tambah:hover {
        background: #066fd6;
        color: #fff;
    }

    .tahun-card {
        background: #fff;
        border: 1px solid #d8e7f5;
        border-radius: 14px;
        margin-bottom: 24px;
        overflow: hidden;
        box-shadow: 0 3px 12px rgba(22, 82, 130, .05);
    }

    .tahun-header {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 22px 26px;
        border-bottom: 1px solid #e3edf6;
    }

    .tahun-icon {
        width: 44px;
        height: 44px;
        border-radius: 10px;
        background: #e7f3ff;
        color: #087ff5;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
    }

    .tahun-header h2 {
        margin: 0;
        color: #07366d;
        font-size: 20px;
        font-weight: 800;
    }

    .tahun-header p {
        margin: 4px 0 0;
        color: #6d87a4;
        font-size: 12px;
    }

    .tahun-buttons {
        display: flex;
        gap: 10px;
        padding: 0 26px 22px;
    }

    .btn-tahun {
        min-width: 105px;
        padding: 10px 18px;
        border-radius: 7px;
        border: 1px solid #087ff5;
        background: #087ff5;
        color: #fff;
        text-decoration: none;
        text-align: center;
        font-size: 13px;
        font-weight: 700;
        transition: .2s;
    }

    .btn-tahun:hover {
        background: #066fd6;
        color: #fff;
        transform: translateY(-1px);
    }

    .btn-tahun.active {
        background: #07366d;
        border-color: #07366d;
    }

    .data-card {
        background: #fff;
        border: 1px solid #d8e7f5;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 3px 12px rgba(22, 82, 130, .05);
    }

    .data-header {
        padding: 22px 28px;
        border-bottom: 1px solid #e2ebf4;
    }

    .data-header h2 {
        margin: 0;
        color: #07366d;
        font-size: 20px;
        font-weight: 800;
    }

    .data-header p {
        margin: 5px 0 0;
        color: #6d87a4;
        font-size: 12px;
    }

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 950px;
    }

    th {
        background: #f1f7fd;
        color: #174b7e;
        font-size: 12px;
        font-weight: 800;
        padding: 14px 12px;
        text-align: left;
        border-bottom: 1px solid #dbe8f3;
        white-space: nowrap;
    }

    td {
        padding: 14px 12px;
        color: #42566b;
        font-size: 12px;
        border-bottom: 1px solid #edf2f6;
        vertical-align: top;
    }

    tbody tr:hover {
        background: #f8fbfe;
    }

    .text-center {
        text-align: center;
    }

    .tahun-badge {
        display: inline-block;
        background: #eef7ff;
        color: #087ff5;
        border: 1px solid #c9e2fa;
        padding: 5px 10px;
        border-radius: 6px;
        font-size: 11px;
        font-weight: 700;
    }

    .anggaran {
        font-weight: 700;
        color: #07366d;
        white-space: nowrap;
    }

    .action-wrapper {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        gap: 7px;
        flex-wrap: nowrap;
    }

    .btn-action {
        width: 82px;
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

    .btn-edit {
        background: #fff7e6;
        color: #c27a00;
        border-color: #f2d28b;
    }

    .btn-delete {
        background: #fff1f1;
        color: #d9534f;
        border-color: #f1c8c7;
    }

    .btn-edit:hover {
        background: #fff0cc;
    }

    .btn-delete:hover {
        background: #ffe1e1;
    }

    .empty-data {
        text-align: center;
        padding: 45px 20px;
        color: #7992ad;
        font-size: 13px;
    }

    .alert {
        padding: 13px 16px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 13px;
    }

    .alert-success {
        background: #edf9f1;
        color: #198754;
        border: 1px solid #bde5ca;
    }

    .alert-error {
        background: #fff1f1;
        color: #d9534f;
        border: 1px solid #f1c8c7;
    }

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
            margin-bottom: 70px;
        }

        .header-actions {
            left: 22px;
            right: auto;
            top: auto;
            bottom: 20px;
        }

        .tahun-buttons {
            flex-wrap: wrap;
        }
    }
</style>

<div class="page-wrapper">

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-error">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <div class="page-header">

        <div class="header-actions">

            <a href="<?= base_url('tim-pembina') ?>"
               class="btn-kembali">
                ← &nbsp;Kembali
            </a>

            <a href="<?= base_url('tim-pembina/rencana-kerja/create') ?>"
               class="btn-tambah">
                + &nbsp;Tambah Data
            </a>

        </div>

        <h1>Rencana Kerja Tim Pembina</h1>

        <p>
            Kelola rencana kerja Tim Pembina berdasarkan tahun kegiatan.
        </p>

    </div>


    <div class="tahun-card">

        <div class="tahun-header">

            <div class="tahun-icon">
                ▤
            </div>

            <div>

                <h2>Rencana Kerja</h2>

                <p>
                    Pilih tahun untuk melihat atau menambahkan rencana kerja.
                </p>

            </div>

        </div>

        <div class="tahun-buttons">

            <a href="<?= base_url('tim-pembina/rencana-kerja?tahun=1') ?>"
               class="btn-tahun <?= ($tahun ?? '') == '1' ? 'active' : '' ?>">
                ▣ &nbsp; Tahun 1
            </a>

            <a href="<?= base_url('tim-pembina/rencana-kerja?tahun=2') ?>"
               class="btn-tahun <?= ($tahun ?? '') == '2' ? 'active' : '' ?>">
                ▣ &nbsp; Tahun 2
            </a>

        </div>

    </div>


    <div class="data-card">

        <div class="data-header">

            <h2>Data Rencana Kerja Tim Pembina</h2>

            <p>
                Daftar rencana kerja yang telah dimasukkan ke dalam sistem.
            </p>

        </div>


        <div class="table-wrapper">

            <table>

                <thead>

                    <tr>

                        <th class="text-center" width="55">No</th>

                        <th>Tahun</th>

                        <th>Nama Kegiatan</th>

                        <th>Waktu Kegiatan</th>

                        <th>Peserta</th>

                        <th>Hasil Pelaksanaan</th>

                        <th>Anggaran</th>

                        <th>Sumber Pendanaan</th>

                        <th width="180">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                <?php if (!empty($data)) : ?>

                    <?php $no = 1; ?>

                    <?php foreach ($data as $row) : ?>

                        <tr>

                            <td class="text-center">
                                <?= $no++ ?>
                            </td>

                            <td>
                                <span class="tahun-badge">
                                    <?= esc($row['tahun'] ?? '-') ?>
                                </span>
                            </td>

                            <td>
                                <?= esc($row['nama_kegiatan'] ?? '-') ?>
                            </td>

                            <td>
                                <?= esc($row['waktu_kegiatan'] ?? '-') ?>
                            </td>

                            <td>
                                <?= esc($row['peserta'] ?? '-') ?>
                            </td>

                            <td>
                                <?= esc($row['hasil_pelaksanaan'] ?? '-') ?>
                            </td>

                            <td class="anggaran">

                                <?php
                                $anggaran = $row['anggaran'] ?? 0;
                                $anggaran = preg_replace('/\D/', '', (string) $anggaran);
                                ?>

                                Rp <?= number_format((int) $anggaran, 0, ',', '.') ?>

                            </td>

                            <td>
                                <?= esc($row['sumber_pendanaan'] ?? '-') ?>
                            </td>

                            <td>

                                <div class="action-wrapper">

                                    <a href="<?= base_url('tim-pembina/rencana-kerja/edit/' . $row['id']) ?>"
                                       class="btn-action btn-edit">
                                        ✎ Edit
                                    </a>

                                    <form action="<?= base_url('tim-pembina/rencana-kerja/delete/' . $row['id']) ?>"
                                          method="post"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">

                                        <?= csrf_field() ?>

                                        <button type="submit"
                                                class="btn-action btn-delete">
                                            🗑 Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else : ?>

                    <tr>

                        <td colspan="9"
                            class="empty-data">

                            Belum ada data rencana kerja Tim Pembina.

                        </td>

                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?= $this->endSection() ?>