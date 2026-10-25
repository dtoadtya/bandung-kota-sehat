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

    .btn-header {
        text-decoration: none;
        background: #fff;
        color: #0b4f9c;
        border: 1px solid #cbdff2;
        border-radius: 8px;
        padding: 11px 18px;
        font-size: 13px;
        font-weight: 600;
    }

    .btn-header:hover {
        background: #eef7ff;
        color: #0b4f9c;
    }

    .btn-tambah {
        background: #087ff5;
        color: #fff;
        border-color: #087ff5;
    }

    .btn-tambah:hover {
        background: #066fd6;
        color: #fff;
    }

    .tahun-card,
    .table-card {
        background: #fff;
        border: 1px solid #d8e7f5;
        border-radius: 14px;
        margin-bottom: 24px;
        overflow: hidden;
        box-shadow: 0 3px 12px rgba(22, 82, 130, 0.05);
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
        padding: 20px 26px 22px;
    }

    .btn-tahun {
        min-width: 110px;
        padding: 11px 18px;
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

    .table-header {
        padding: 22px 26px;
        border-bottom: 1px solid #e2ebf4;
    }

    .table-header h2 {
        margin: 0;
        color: #07366d;
        font-size: 20px;
        font-weight: 800;
    }

    .table-header p {
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
        min-width: 1150px;
    }

    th {
        background: #f4f8fc;
        color: #315777;
        font-size: 12px;
        font-weight: 800;
        padding: 13px 14px;
        border-bottom: 1px solid #dce8f2;
        text-align: left;
        white-space: nowrap;
    }

    td {
        padding: 13px 14px;
        color: #465d73;
        font-size: 12px;
        border-bottom: 1px solid #edf2f6;
        vertical-align: top;
    }

    tbody tr:hover {
        background: #f9fcff;
    }

    .badge-tahun {
        display: inline-block;
        background: #e7f3ff;
        color: #087ff5;
        padding: 5px 9px;
        border-radius: 6px;
        font-size: 11px;
        font-weight: 700;
    }

    .aksi {
        display: flex;
        gap: 6px;
        flex-wrap: nowrap;
    }

    .btn-aksi {
        min-width: 70px;
        height: 34px;
        padding: 0 10px;
        border-radius: 6px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        font-weight: 700;
        border: 1px solid;
        white-space: nowrap;
        cursor: pointer;
    }

    .btn-edit {
        background: #fff7e0;
        color: #b27800;
        border-color: #f0cf70;
    }

    .btn-edit:hover {
        background: #ffefbd;
        color: #8f6200;
    }

    .btn-hapus {
        background: #fff0f0;
        color: #d43d3d;
        border-color: #f0b8b8;
    }

    .btn-hapus:hover {
        background: #ffe0e0;
        color: #b92e2e;
    }

    .empty-data {
        text-align: center;
        padding: 45px 20px;
        color: #7890a8;
    }

    .empty-data-icon {
        font-size: 35px;
        margin-bottom: 8px;
    }

    .link-data {
        color: #087ff5;
        font-weight: 600;
        text-decoration: none;
    }

    .link-data:hover {
        text-decoration: underline;
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
            padding-right: 100px;
        }

        .header-actions {
            right: 18px;
            top: 20px;
        }

        .btn-header {
            padding: 9px 12px;
        }

        .tahun-buttons {
            flex-wrap: wrap;
        }
    }
</style>

<div class="page-wrapper">

    <!-- HEADER -->

    <div class="page-header">

        <div class="header-actions">

            <a href="<?= base_url('tim-pembina') ?>"
               class="btn-header">
                ← &nbsp;Kembali
            </a>

            <a href="<?= base_url('tim-pembina/realisasi/create?tahun=' . ($tahun ?? '1')) ?>"
               class="btn-header btn-tambah">
                + &nbsp;Tambah Realisasi
            </a>

        </div>

        <h1>
            Realisasi Kegiatan Tim Pembina
        </h1>

        <p>
            Kelola realisasi kegiatan dan pendanaan Tim Pembina berdasarkan tahun kegiatan.
        </p>

    </div>


    <!-- TAHUN -->

    <div class="tahun-card">

        <div class="tahun-header">

            <div class="tahun-icon">
                ▤
            </div>

            <div>

                <h2>
                    Realisasi Kegiatan
                </h2>

                <p>
                    Pilih tahun untuk melihat dan mengelola realisasi kegiatan.
                </p>

            </div>

        </div>

        <div class="tahun-buttons">

            <a href="<?= base_url('tim-pembina/realisasi?tahun=1') ?>"
               class="btn-tahun <?= ($tahun ?? '') == '1' ? 'active' : '' ?>">
                ▣ &nbsp; Tahun Ganjil
            </a>

            <a href="<?= base_url('tim-pembina/realisasi?tahun=2') ?>"
               class="btn-tahun <?= ($tahun ?? '') == '2' ? 'active' : '' ?>">
                ▣ &nbsp; Tahun Genap
            </a>

        </div>

    </div>


    <!-- TABLE -->

    <div class="table-card">

        <div class="table-header">

            <h2>
                Data Realisasi Kegiatan
                <?php if (($tahun ?? '') !== ''): ?>
                    Tahun <?= esc($tahun) ?>
                <?php endif; ?>
            </h2>

            <p>
                Daftar realisasi kegiatan Tim Pembina.
            </p>

        </div>


        <div class="table-responsive">

            <table>

                <thead>

                    <tr>
                        <th width="50">No</th>
                        <th>Tahun</th>
                        <th>Nama Kegiatan</th>
                        <th>Waktu Kegiatan</th>
                        <th>Peserta</th>
                        <th>Hasil Pelaksanaan</th>
                        <th>Anggaran</th>
                        <th>Sumber Pendanaan</th>
                        <th>Link Drive</th>
                        <th>Data Dukung</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                <?php if (!empty($data)): ?>

                    <?php $no = 1; ?>

                    <?php foreach ($data as $row): ?>

                        <tr>

                            <td>
                                <?= $no++ ?>
                            </td>

                            <td>

                                <span class="badge-tahun">
                                    <?= esc($row['tahun'] ?? '-') ?>
                                </span>

                            </td>

                            <td>
                                <?= esc($row['nama_kegiatan'] ?? '-') ?>
                            </td>

                            <td>

                                <?= !empty($row['waktu_kegiatan'])
                                    ? date(
                                        'd-m-Y',
                                        strtotime($row['waktu_kegiatan'])
                                    )
                                    : '-' ?>

                            </td>

                            <td>
                                <?= esc($row['peserta'] ?? '-') ?>
                            </td>

                            <td>
                                <?= esc($row['hasil_pelaksanaan'] ?? '-') ?>
                            </td>

                            <td>

                                <?php
                                    $anggaran = $row['anggaran'] ?? '';

                                    if (
                                        $anggaran !== ''
                                        && $anggaran !== null
                                    ) {
                                        echo 'Rp ' . number_format(
                                            (float) $anggaran,
                                            0,
                                            ',',
                                            '.'
                                        );
                                    } else {
                                        echo '-';
                                    }
                                ?>

                            </td>

                            <td>
                                <?= esc($row['sumber_pendanaan'] ?? '-') ?>
                            </td>

                            <td>

                                <?php if (!empty($row['link_drive'])): ?>

                                    <a href="<?= esc($row['link_drive']) ?>"
                                       target="_blank"
                                       rel="noopener noreferrer"
                                       class="link-data">
                                        Lihat Link
                                    </a>

                                <?php else: ?>

                                    -

                                <?php endif; ?>

                            </td>

                            <td>
                                <?= esc($row['data_dukung'] ?? '-') ?>
                            </td>

                            <td>

                                <div class="aksi">

                                    <a href="<?= base_url('tim-pembina/realisasi/edit/' . $row['id']) ?>"
                                       class="btn-aksi btn-edit">
                                        ✎ Edit
                                    </a>

                                    <form action="<?= base_url('tim-pembina/realisasi/delete/' . $row['id']) ?>"
                                          method="post"
                                          style="display:inline;"
                                          data-konfirmasi="Apakah Anda yakin ingin menghapus data ini?">

                                        <?= csrf_field() ?>

                                        <button type="submit"
                                                class="btn-aksi btn-hapus">
                                            🗑 Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>

                        <td colspan="11">

                            <div class="empty-data">

                                <div class="empty-data-icon">
                                    ▱
                                </div>

                                Belum ada data realisasi kegiatan
                                <?= ($tahun ?? '') !== ''
                                    ? 'untuk Tahun ' . esc($tahun)
                                    : '' ?>.

                            </div>

                        </td>

                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?= $this->endSection() ?>