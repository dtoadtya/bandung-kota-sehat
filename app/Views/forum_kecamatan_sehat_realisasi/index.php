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

    .btn-kembali {
        position: absolute;
        right: 28px;
        top: 25px;
        z-index: 2;
        text-decoration: none;
        background: #fff;
        color: #0b4f9c;
        border: 1px solid #cbdff2;
        border-radius: 8px;
        padding: 11px 18px;
        font-size: 13px;
        font-weight: 600;
    }

    .btn-kembali:hover {
        background: #eef7ff;
    }

    .tahun-card {
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
        padding: 22px 26px;
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

    .btn-tambah {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: #087ff5;
        color: #fff;
        text-decoration: none;
        padding: 11px 18px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 18px;
    }

    .btn-tambah:hover {
        background: #066fd6;
        color: #fff;
    }

    .table-card {
        background: #fff;
        border: 1px solid #d8e7f5;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 3px 12px rgba(22, 82, 130, 0.05);
    }

    .table-responsive {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 1200px;
    }

    thead th {
        background: #07366d;
        color: #fff;
        padding: 14px 12px;
        font-size: 12px;
        font-weight: 700;
        text-align: left;
        white-space: nowrap;
    }

    tbody td {
        padding: 13px 12px;
        border-bottom: 1px solid #e7eef5;
        color: #425b73;
        font-size: 12px;
        vertical-align: top;
    }

    tbody tr:hover {
        background: #f8fbff;
    }

    .badge-tahun {
        display: inline-block;
        padding: 5px 9px;
        border-radius: 6px;
        background: #e7f3ff;
        color: #087ff5;
        font-weight: 700;
        font-size: 11px;
    }

    .aksi {
        display: flex;
        align-items: center;
        gap: 6px;
        white-space: nowrap;
    }

    .btn-aksi {
        min-width: 76px;
        height: 34px;
        padding: 0 10px;
        border-radius: 6px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        font-size: 11px;
        font-weight: 700;
        border: 1px solid transparent;
        cursor: pointer;
        box-sizing: border-box;
    }

    .btn-edit {
        background: #fff7e0;
        color: #b77900;
        border-color: #f2cf72;
    }

    .btn-edit:hover {
        background: #ffeeb8;
        color: #8c5d00;
    }

    .btn-hapus {
        background: #fff0f0;
        color: #d9534f;
        border-color: #f1b4b1;
    }

    .btn-hapus:hover {
        background: #ffdede;
        color: #b52b27;
    }

    .btn-link {
        background: #eef7ff;
        color: #087ff5;
        border-color: #b9daf7;
    }

    .btn-link:hover {
        background: #dceeff;
        color: #066fd6;
    }

    .empty-data {
        text-align: center;
        padding: 40px 20px;
        color: #7d92a8;
        font-size: 13px;
    }

    .alert-success,
    .alert-danger {
        border-radius: 8px;
        padding: 12px 15px;
        margin-bottom: 18px;
        font-size: 13px;
    }

    .alert-success {
        background: #eaf8f0;
        color: #198754;
        border: 1px solid #bde5cd;
    }

    .alert-danger {
        background: #fff0f0;
        color: #d9534f;
        border: 1px solid #f1b4b1;
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
            padding-right: 90px;
        }

        .btn-kembali {
            right: 18px;
            top: 20px;
        }

        .tahun-buttons {
            flex-wrap: wrap;
        }
    }
</style>

<div class="page-wrapper">

    <div class="page-header">
        <a href="<?= base_url('forum-kecamatan-sehat') ?>"
           class="btn-kembali">
            ← &nbsp;Kembali
        </a>

        <h1>Realisasi Kegiatan</h1>

        <p>
            Kelola realisasi kegiatan Forum Kecamatan Sehat berdasarkan tahun pelaksanaan.
        </p>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert-success">
            ✓ &nbsp;<?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert-danger">
            ⚠ &nbsp;<?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <div class="tahun-card">

        <div class="tahun-header">

            <div class="tahun-icon">▤</div>

            <div>
                <h2>Realisasi Kegiatan</h2>

                <p>
                    Pilih tahun untuk melihat atau menambahkan realisasi kegiatan.
                </p>
            </div>

        </div>

        <div class="tahun-buttons">

            <a href="<?= base_url('forum-kecamatan-sehat/realisasi?tahunGanjil') ?>"
               class="btn-tahun <?= ($tahun ?? '') == 'Ganjil' ? 'active' : '' ?>">
                ▣ &nbsp; Tahun Ganjil
            </a>

            <a href="<?= base_url('forum-kecamatan-sehat/realisasi?tahunGenap') ?>"
               class="btn-tahun <?= ($tahun ?? '') == 'Genap' ? 'active' : '' ?>">
                ▣ &nbsp; Tahun Genap
            </a>

            <a href="<?= base_url('forum-kecamatan-sehat/realisasi') ?>"
               class="btn-tahun <?= ($tahun ?? '') === '' || ($tahun ?? null) === null ? 'active' : '' ?>">
                Semua
            </a>

        </div>

    </div>

    <a href="<?= base_url(
        'forum-kecamatan-sehat/realisasi/create'
        . (!empty($tahun) ? '?tahun=' . urlencode($tahun) : '')
    ) ?>"
       class="btn-tambah">
        ＋ &nbsp;Tambah Realisasi Kegiatan
    </a>

    <div class="table-card">

        <div class="table-responsive">

            <table>

                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th width="150">Kecamatan</th>
                        <th width="80">Tahun</th>
                        <th width="190">Nama Kegiatan</th>
                        <th width="120">Waktu Kegiatan</th>
                        <th width="150">Peserta</th>
                        <th width="230">Hasil Pelaksanaan</th>
                        <th width="130">Anggaran</th>
                        <th width="130">Pendanaan</th>
                        <th width="180">Link Drive</th>
                        <th width="200">Data Dukung</th>
                        <th width="170">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                <?php if (!empty($data)): ?>

                    <?php foreach ($data as $i => $row): ?>

                        <tr>

                            <td>
                                <?= $i + 1 ?>
                            </td>

                            <td>
                                <?= esc(
                                    $row['nama_kecamatan']
                                    ?? '-'
                                ) ?>
                            </td>

                            <td>
                                <span class="badge-tahun">
                                    Tahun <?= esc($row['tahun'] ?? '-') ?>
                                </span>
                            </td>

                            <td>
                                <?= esc(
                                    $row['nama_kegiatan']
                                    ?? '-'
                                ) ?>
                            </td>

                            <td>
                                <?= !empty($row['waktu_kegiatan'])
                                    ? date(
                                        'd-m-Y',
                                        strtotime($row['waktu_kegiatan'])
                                    )
                                    : '-'
                                ?>
                            </td>

                            <td>
                                <?= esc($row['peserta'] ?? '-') ?>
                            </td>

                            <td>
                                <?= nl2br(
                                    esc($row['hasil_pelaksanaan'] ?? '-')
                                ) ?>
                            </td>

                            <td>
                                <?php if (
                                    isset($row['anggaran']) &&
                                    $row['anggaran'] !== '' &&
                                    $row['anggaran'] !== null
                                ): ?>

                                    Rp <?= number_format(
                                        (float) $row['anggaran'],
                                        0,
                                        ',',
                                        '.'
                                    ) ?>

                                <?php else: ?>

                                    -

                                <?php endif; ?>
                            </td>

                            <td>
                                <?= esc(
                                    $row['sumber_pendanaan']
                                    ?? '-'
                                ) ?>
                            </td>

                            <td>

                                <?php if (!empty($row['link_drive'])): ?>

                                    <a href="<?= esc($row['link_drive']) ?>"
                                       target="_blank"
                                       rel="noopener"
                                       class="btn-aksi btn-link">
                                        ↗ Lihat Link
                                    </a>

                                <?php else: ?>

                                    -

                                <?php endif; ?>

                            </td>

                            <td>
                                <?= nl2br(
                                    esc($row['data_dukung'] ?? '-')
                                ) ?>
                            </td>

                            <td>

                                <div class="aksi">

                                    <a href="<?= base_url(
                                        'forum-kecamatan-sehat/realisasi/edit/'
                                        . $row['id']
                                    ) ?>"
                                       class="btn-aksi btn-edit">
                                        ✎ Edit
                                    </a>

                                    <form action="<?= base_url(
                                        'forum-kecamatan-sehat/realisasi/delete/'
                                        . $row['id']
                                    ) ?>"
                                          method="post"
                                          style="margin:0;"
                                          data-konfirmasi="Yakin ingin menghapus data ini?">

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
                        <td colspan="12">
                            <div class="empty-data">
                                Belum ada data realisasi kegiatan.
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