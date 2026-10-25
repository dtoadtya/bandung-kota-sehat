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
        width: 160px;
        height: 160px;
        right: -45px;
        top: -75px;
        background: rgba(22, 135, 232, .08);
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
        display: inline-flex;
        align-items: center;
        gap: 7px;
        text-decoration: none;
        border-radius: 8px;
        padding: 10px 16px;
        font-size: 13px;
        font-weight: 700;
    }

    .btn-kembali {
        background: #fff;
        color: #0b4f9c;
        border: 1px solid #cbdff2;
    }

    .btn-kembali:hover {
        background: #eef7ff;
        color: #0b4f9c;
    }

    .btn-tambah {
        background: #087ff5;
        color: #fff;
        border: 1px solid #087ff5;
    }

    .btn-tambah:hover {
        background: #066fd6;
        color: #fff;
    }

    .tahun-card,
    .data-card {
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
        padding: 20px 26px;
    }

    .btn-tahun {
        min-width: 110px;
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

    .data-header {
        padding: 22px 26px;
        border-bottom: 1px solid #e3edf6;
    }

    .data-header h2 {
        margin: 0;
        color: #07366d;
        font-size: 20px;
        font-weight: 800;
    }

    .data-header p {
        margin: 4px 0 0;
        color: #6d87a4;
        font-size: 12px;
    }

    .table-responsive {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 1050px;
    }

    thead th {
        background: #f5f9fd;
        color: #315b7e;
        padding: 14px 13px;
        border-bottom: 1px solid #dce8f2;
        font-size: 12px;
        font-weight: 800;
        text-align: left;
        white-space: nowrap;
    }

    tbody td {
        padding: 14px 13px;
        border-bottom: 1px solid #edf2f6;
        color: #465f77;
        font-size: 12px;
        vertical-align: top;
    }

    tbody tr:hover {
        background: #f9fcff;
    }

    .badge-tahun {
        display: inline-block;
        padding: 5px 9px;
        border-radius: 6px;
        background: #e7f3ff;
        color: #087ff5;
        font-size: 11px;
        font-weight: 800;
        white-space: nowrap;
    }

    .hasil-text {
        min-width: 180px;
        max-width: 260px;
        white-space: normal;
        line-height: 1.5;
    }

    .data-link {
        color: #087ff5;
        font-weight: 700;
        text-decoration: none;
    }

    .data-link:hover {
        text-decoration: underline;
    }

    .aksi {
        display: flex;
        align-items: center;
        gap: 7px;
        white-space: nowrap;
    }

    .btn-aksi {
        width: 76px;
        height: 34px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 7px;
        text-decoration: none;
        border: none;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
    }

    .btn-edit {
        background: #e7f3ff;
        color: #087ff5;
    }

    .btn-edit:hover {
        background: #d7ebff;
        color: #066fd6;
    }

    .btn-hapus {
        background: #fff0f0;
        color: #d63b3b;
    }

    .btn-hapus:hover {
        background: #ffe1e1;
        color: #bd2929;
    }

    .empty-data {
        padding: 45px 20px;
        text-align: center;
        color: #7c91a8;
        font-size: 13px;
    }

    .alert {
        border-radius: 10px;
        margin-bottom: 20px;
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

    <div class="page-header">

        <div class="header-actions">

            <a href="<?= base_url('forum-bandung-sehat') ?>"
               class="btn-kembali">
                ← &nbsp;Kembali
            </a>

            <a href="<?= base_url('forum-bandung-sehat/realisasi/create') ?>"
               class="btn-tambah">
                + &nbsp;Tambah Realisasi
            </a>

        </div>

        <h1>
            Realisasi Kegiatan Forum Bandung Sehat
        </h1>

        <p>
            Kelola realisasi kegiatan Forum Bandung Sehat berdasarkan Tahun Genap dan Tahun Ganjil.
        </p>

    </div>


    <?php if (session()->getFlashdata('success')): ?>

        <div class="alert alert-success">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>

    <?php endif; ?>


    <?php if (session()->getFlashdata('error')): ?>

        <div class="alert alert-danger">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>

    <?php endif; ?>


    <div class="tahun-card">

        <div class="tahun-header">

            <div class="tahun-icon">
                ▤
            </div>

            <div>

                <h2>
                    Pilih Tahun
                </h2>

                <p>
                    Pilih periode realisasi kegiatan yang ingin dikelola.
                </p>

            </div>

        </div>


        <div class="tahun-buttons">

            <a href="<?= base_url('forum-bandung-sehat/realisasi?tahunGanjil') ?>"
               class="btn-tahun <?= ($tahun ?? '') === 'Ganjil' ? 'active' : '' ?>">
                ▣ &nbsp;Tahun Ganjil
            </a>

            <a href="<?= base_url('forum-bandung-sehat/realisasi?tahunGenap') ?>"
               class="btn-tahun <?= ($tahun ?? '') === 'Genap' ? 'active' : '' ?>">
                ▣ &nbsp;Tahun Genap
            </a>

        </div>

    </div>


    <div class="data-card">

        <div class="data-header">

            <h2>
                Daftar Realisasi Kegiatan
            </h2>

            <p>
                Data realisasi kegiatan Forum Bandung Sehat.
            </p>

        </div>


        <?php if (!empty($data)): ?>

            <div class="table-responsive">

                <table>

                    <thead>

                        <tr>
                            <th style="width:50px;">No</th>
                            <th>Tahun</th>
                            <th>Nama Kegiatan</th>
                            <th>Waktu Kegiatan</th>
                            <th>Peserta</th>
                            <th>Hasil Pelaksanaan</th>
                            <th>Anggaran</th>
                            <th>Sumber Pendanaan</th>
                            <th>Link Drive</th>
                            <th>Data Dukung</th>
                            <th style="width:170px;">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php $no = 1; ?>

                        <?php foreach ($data as $row): ?>

                            <tr>

                                <td>
                                    <?= $no++ ?>
                                </td>

                                <td>
                                    <span class="badge-tahun">
                                        Tahun <?= esc($row['tahun']) ?>
                                    </span>
                                </td>

                                <td>
                                    <?= esc($row['nama_kegiatan'] ?? '-') ?>
                                </td>

                                <td>
                                    <?= !empty($row['waktu_kegiatan'])
                                        ? date(
                                            'd-m-Y',
                                            strtotime(
                                                $row['waktu_kegiatan']
                                            )
                                        )
                                        : '-' ?>
                                </td>

                                <td>
                                    <?= esc($row['peserta'] ?? '-') ?>
                                </td>

                                <td>
                                    <div class="hasil-text">
                                        <?= nl2br(
                                            esc(
                                                $row['hasil_pelaksanaan']
                                                ?? '-'
                                            )
                                        ) ?>
                                    </div>
                                </td>

                                <td>
                                    Rp
                                    <?= number_format(
                                        (float) (
                                            $row['anggaran'] ?? 0
                                        ),
                                        0,
                                        ',',
                                        '.'
                                    ) ?>
                                </td>

                                <td>
                                    <?= esc(
                                        $row['sumber_pendanaan']
                                        ?? '-'
                                    ) ?>
                                </td>

                                <td>

                                    <?php if (!empty($row['link_drive'])): ?>

                                        <a href="<?= esc(
                                            $row['link_drive']
                                        ) ?>"
                                           target="_blank"
                                           rel="noopener"
                                           class="data-link">
                                            Buka Link
                                        </a>

                                    <?php else: ?>

                                        -

                                    <?php endif; ?>

                                </td>

                                <td>

                                    <div class="hasil-text">
                                        <?= nl2br(
                                            esc(
                                                $row['data_dukung']
                                                ?? '-'
                                            )
                                        ) ?>
                                    </div>

                                </td>

                                <td>

                                    <div class="aksi">

                                        <a href="<?= base_url(
                                            'forum-bandung-sehat/realisasi/edit/'
                                            . $row['id']
                                        ) ?>"
                                           class="btn-aksi btn-edit">
                                            Edit
                                        </a>

                                        <form action="<?= base_url(
                                            'forum-bandung-sehat/realisasi/delete/'
                                            . $row['id']
                                        ) ?>"
                                              method="post"
                                              style="display:inline;"
                                              data-konfirmasi="Yakin ingin menghapus data ini?">

                                            <?= csrf_field() ?>

                                            <button type="submit"
                                                    class="btn-aksi btn-hapus">
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

        <?php else: ?>

            <div class="empty-data">

                Belum ada data realisasi kegiatan
                <?= !empty($tahun)
                    ? 'untuk Tahun ' . esc($tahun)
                    : '' ?>.

            </div>

        <?php endif; ?>

    </div>

</div>

<?= $this->endSection() ?>