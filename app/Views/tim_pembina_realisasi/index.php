<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= esc($title) ?></title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f4f7fb;
            color: #243447;
        }

        .content {
            margin-left: 270px;
            min-height: 100vh;
        }

        .top-header {
            height: 82px;
            background: white;
            border-bottom: 1px solid #dfe8f2;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
        }

        .page-title {
            color: #07366d;
            font-size: 20px;
            font-weight: 800;
        }

        .user-box {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 7px 14px 7px 8px;
            border: 1px solid #d7e4f1;
            border-radius: 9px;
            background: white;
        }

        .user-circle {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: #eaf3ff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0b4f9c;
            font-weight: 800;
        }

        .user-name {
            color: #07366d;
            font-size: 12px;
            font-weight: 700;
        }

        .main {
            padding: 28px;
        }

        .hero {
            position: relative;
            overflow: hidden;
            background: linear-gradient(
                105deg,
                #eaf5ff,
                #ffffff
            );
            border: 1px solid #d6e6f5;
            border-left: 5px solid #268ad0;
            border-radius: 13px;
            padding: 26px 38px;
            margin-bottom: 22px;
        }

        .hero h1 {
            margin: 0;
            color: #07366d;
            font-size: 30px;
            font-weight: 800;
        }

        .hero p {
            margin: 7px 0 0;
            color: #6683a5;
            font-size: 12px;
        }

        .back-button {
            position: absolute;
            right: 30px;
            top: 29px;
            padding: 11px 17px;
            border: 1px solid #cfe0f0;
            border-radius: 8px;
            background: white;
            color: #0b4f9c;
            text-decoration: none;
            font-size: 11px;
            font-weight: 700;
        }

        .card {
            background: white;
            border: 1px solid #dce8f3;
            border-radius: 13px;
            overflow: hidden;
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 23px 28px;
            border-bottom: 1px solid #e4ebf2;
        }

        .card-title {
            color: #07366d;
            font-size: 21px;
            font-weight: 800;
        }

        .card-desc {
            margin-top: 5px;
            color: #718096;
            font-size: 11px;
        }

        .btn-add {
            background: #087cf5;
            color: white;
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 700;
        }

        .table-wrapper {
            padding: 20px 25px 25px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 1000px;
            border-collapse: collapse;
        }

        th {
            background: #07366d;
            color: white;
            padding: 13px 10px;
            font-size: 11px;
            text-align: left;
        }

        td {
            padding: 12px 10px;
            border-bottom: 1px solid #e3eaf2;
            font-size: 11px;
            vertical-align: top;
        }

        tr:hover td {
            background: #f8fbff;
        }

        .empty {
            text-align: center;
            padding: 55px 20px;
            color: #718096;
        }

        .empty-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 18px;
            border-radius: 18px;
            background: #eaf3ff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #087cf5;
            font-size: 32px;
        }

        .empty-title {
            color: #07366d;
            font-size: 19px;
            font-weight: 800;
            margin-bottom: 7px;
        }

        .aksi {
            display: flex;
            gap: 5px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 7px 9px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 10px;
            font-weight: 700;
            border: 0;
            cursor: pointer;
        }

        .btn-edit {
            color: #9a7100;
            background: #fff5d6;
        }

        .btn-delete {
            color: #b33;
            background: #fff0f0;
        }

        .alert {
            margin-bottom: 18px;
            padding: 12px 15px;
            border-radius: 7px;
            font-size: 11px;
        }

        .success {
            background: #eaf8f0;
            border: 1px solid #bce5ce;
            color: #267345;
        }

        .error {
            background: #fff0f0;
            border: 1px solid #efc2c2;
            color: #a33;
        }
    </style>
</head>

<body>

<div class="content">

    <header class="top-header">

        <div class="page-title">
            Realisasi Kegiatan Tim Pembina
        </div>

        <div class="user-box">
            <div class="user-circle">
                S
            </div>

            <div class="user-name">
                Super Administrator
            </div>
        </div>

    </header>


    <main class="main">

        <section class="hero">

            <h1>
                Realisasi Kegiatan
            </h1>

            <p>
                Kelola laporan realisasi kegiatan dan pendanaan Tim Pembina.
            </p>

            <a
                href="<?= base_url('tim-pembina') ?>"
                class="back-button"
            >
                ←&nbsp;&nbsp; Kembali
            </a>

        </section>


        <?php if (session()->getFlashdata('success')): ?>

            <div class="alert success">
                <?= esc(session()->getFlashdata('success')) ?>
            </div>

        <?php endif; ?>


        <?php if (session()->getFlashdata('error')): ?>

            <div class="alert error">
                <?= esc(session()->getFlashdata('error')) ?>
            </div>

        <?php endif; ?>


        <section class="card">

            <div class="card-header">

                <div>

                    <div class="card-title">
                        📊 Data Realisasi Kegiatan
                    </div>

                    <div class="card-desc">
                        Daftar laporan realisasi kegiatan dan pendanaan Tim Pembina.
                    </div>

                </div>


                <a
                    href="<?= base_url('tim-pembina/realisasi/create') ?>"
                    class="btn-add"
                >
                    ⊕ Tambah Data
                </a>

            </div>


            <?php if (empty($data)): ?>

                <div class="empty">

                    <div class="empty-icon">
                        📊
                    </div>

                    <div class="empty-title">
                        Belum ada data realisasi kegiatan
                    </div>

                    <div>
                        Silakan tambahkan data realisasi kegiatan terlebih dahulu.
                    </div>

                </div>

            <?php else: ?>


                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th>No</th>

                                <th>Nama Kegiatan</th>

                                <th>Waktu</th>

                                <th>Peserta</th>

                                <th>Hasil</th>

                                <th>Anggaran Pelaksanaan</th>

                                <th>Sumber Pendanaan</th>

                                <th>Link Drive/Cloud</th>

                                <th>Aksi</th>

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
                                    <?= esc($row['nama_kegiatan']) ?>
                                </td>

                                <td>
                                    <?= !empty($row['waktu_kegiatan'])
                                        ? date('d/m/Y', strtotime($row['waktu_kegiatan']))
                                        : '-'
                                    ?>
                                </td>

                                <td>
                                    <?= esc($row['peserta'] ?: '-') ?>
                                </td>

                                <td>
                                    <?= esc($row['hasil'] ?: '-') ?>
                                </td>

                                <td>
                                    Rp <?= number_format(
                                        (float) ($row['anggaran'] ?? 0),
                                        0,
                                        ',',
                                        '.'
                                    ) ?>
                                </td>

                                <td>
                                    <?= esc($row['sumber_pendanaan'] ?: '-') ?>
                                </td>

                                <td>

                                    <?php if (!empty($row['link_data'])): ?>

                                        <a
                                            href="<?= esc($row['link_data']) ?>"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                        >
                                            Lihat Data
                                        </a>

                                    <?php else: ?>

                                        -

                                    <?php endif; ?>

                                </td>


                                <td>

                                    <div class="aksi">

                                        <a
                                            href="<?= base_url('tim-pembina/realisasi/edit/' . $row['id']) ?>"
                                            class="btn btn-edit"
                                        >
                                            Ubah
                                        </a>


                                        <form
                                            action="<?= base_url('tim-pembina/realisasi/delete/' . $row['id']) ?>"
                                            method="post"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                                            style="display:inline;"
                                        >

                                            <?= csrf_field() ?>

                                            <button
                                                type="submit"
                                                class="btn btn-delete"
                                            >
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

        </section>

    </main>

</div>

</body>
</html>