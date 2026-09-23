<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

    <style>
        .page-banner {
            position: relative;
            min-height: 150px;
            margin-bottom: 28px;
            padding: 28px 28px 26px 58px;
            border-radius: 14px;
            overflow: hidden;
            background: linear-gradient(
                135deg,
                #f2faff 0%,
                #e5f4ff 55%,
                #dcefff 100%
            );
            border: 1px solid #d5eafa;
        }

        .page-banner::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 9px;
            background: linear-gradient(
                180deg,
                #087df5,
                #f0b429
            );
        }

        .page-banner h1 {
            margin: 0 0 7px;
            color: #063b78;
            font-size: 38px;
            font-weight: 800;
        }

        .page-banner p {
            margin: 0;
            color: #3c6388;
            font-size: 18px;
        }

        .content-card {
            background: #ffffff;
            border: 1px solid #e0ebf5;
            border-radius: 15px;
            padding: 22px;
            box-shadow: 0 8px 24px rgba(27, 71, 112, .07);
        }

        .card-header-custom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .card-header-custom h2 {
            margin: 0;
            color: #163f67;
            font-size: 21px;
            font-weight: 800;
        }

        .btn-tambah {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 18px;
            border-radius: 9px;
            background: #087df5;
            color: #ffffff;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
        }

        .btn-tambah:hover {
            background: #0568cc;
            color: #ffffff;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            border: 1px solid #e1edf6;
            border-radius: 12px;
        }

        .custom-table {
            width: 100%;
            min-width: 850px;
            border-collapse: separate;
            border-spacing: 0;
        }

        .custom-table thead th {
            padding: 15px 14px;
            background: linear-gradient(
                180deg,
                #edf7ff,
                #e7f3fd
            );
            color: #214b70;
            border-bottom: 1px solid #dcebf7;
            font-size: 14px;
            font-weight: 800;
            white-space: nowrap;
        }

        .custom-table tbody td {
            padding: 14px;
            color: #3f5e78;
            border-bottom: 1px solid #edf2f6;
            font-size: 14px;
            vertical-align: middle;
        }

        .custom-table tbody tr:last-child td {
            border-bottom: 0;
        }

        .custom-table tbody tr:hover {
            background: #fbfdff;
        }

        .btn-hapus {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            border: 0;
            border-radius: 7px;
            padding: 7px 11px;
            background: #fff0f0;
            color: #d64545;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }

        .btn-hapus:hover {
            background: #ffe0e0;
        }

        .empty-state {
            text-align: center;
            padding: 75px 20px;
            color: #8198ab;
        }

        .empty-state i {
            display: block;
            font-size: 64px;
            margin-bottom: 16px;
            opacity: .55;
        }

        .empty-state h4 {
            margin: 0 0 8px;
            color: #53728d;
            font-weight: 800;
        }

        .empty-state p {
            margin: 0;
            font-size: 14px;
        }
    </style>

    <div class="page-banner">
        <h1>Forum Bandung Sehat</h1>
        <p>Kelola data dan dokumen Forum Bandung Sehat.</p>
    </div>

    <div class="content-card">

        <div class="card-header-custom">
        <h2>Data Forum Bandung Sehat</h2>

        <a
            href="<?= site_url('forum-bandung-sehat/create') ?>"
            class="btn-tambah"
        >
            <i class="bi bi-plus-circle"></i>
            Tambah Forum
        </a>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($data)) : ?>

        <div class="table-wrapper">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th>Nama Kegiatan</th>
                        <th>Tahun</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Keterangan</th>
                        <th width="100">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; ?>

                    <?php foreach ($data as $row) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= esc($row['nama_kegiatan'] ?? '-') ?></td>
                            <td><?= esc($row['tahun'] ?? '-') ?></td>
                            <td><?= esc($row['tanggal'] ?? '-') ?></td>
                            <td><?= esc($row['lokasi'] ?? '-') ?></td>
                            <td><?= esc($row['keterangan'] ?? '-') ?></td>
                            <td>
                                <form
                                    action="<?= site_url('forum-bandung-sehat/delete/' . $row['id']) ?>"
                                    method="post"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                                >
                                    <?= csrf_field() ?>

                                    <button
                                        type="submit"
                                        class="btn-hapus"
                                    >
                                        <i class="bi bi-trash"></i>
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    <?php else : ?>

        <div class="empty-state">
            <i class="bi bi-building"></i>
            <h4>Belum Ada Data Forum</h4>
            <p>
                Klik tombol Tambah Forum untuk membuka menu pengelolaan data.
            </p>
        </div>

    <?php endif; ?>

</div>

<?= $this->endSection() ?>