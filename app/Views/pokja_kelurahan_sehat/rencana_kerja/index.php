<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= esc($title ?? 'Rencana Kerja Pokja Kelurahan Sehat') ?></title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f4f8fc;
            color: #243447;
        }

        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;

            width: 270px;

            background: #07366d;
            color: white;

            z-index: 1000;

            overflow-y: auto;
        }

        .brand {
            height: 100px;

            display: flex;
            align-items: center;

            padding: 20px 24px;

            border-bottom: 1px solid rgba(255,255,255,.12);
        }

        .brand-logo {
            width: 48px;
            height: 48px;

            border-radius: 14px;

            background: #f2b705;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-right: 12px;

            font-size: 25px;
            color: #07366d;
            font-weight: 900;
        }

        .brand-text {
            line-height: 1.1;
        }

        .brand-title {
            font-size: 17px;
            font-weight: 800;
        }

        .brand-subtitle {
            margin-top: 6px;

            font-size: 10px;

            letter-spacing: .5px;

            color: rgba(255,255,255,.7);
        }

        .menu {
            padding: 22px 14px;
        }

        .menu-item {
            display: flex;
            align-items: center;

            min-height: 44px;

            padding: 0 14px;

            margin-bottom: 5px;

            border-radius: 9px;

            color: rgba(255,255,255,.85);

            text-decoration: none;

            font-size: 14px;
            font-weight: 600;
        }

        .menu-item:hover {
            background: rgba(255,255,255,.08);
            color: white;
        }

        .menu-icon {
            width: 26px;

            margin-right: 10px;

            text-align: center;

            font-size: 17px;
        }

        .menu-section {
            margin-top: 10px;
        }

        .menu-section-title {
            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 12px 14px;

            color: rgba(255,255,255,.9);

            font-size: 14px;
            font-weight: 700;
        }

        .section-arrow {
            font-size: 18px;
        }

        .submenu {
            padding-left: 20px;
        }

        .submenu .menu-item {
            font-size: 13px;
        }

        .submenu .menu-item.active {
            background: #1688f7;

            color: white;

            border-left: 4px solid #f2b705;

            padding-left: 10px;
        }

        .sidebar-bottom {
            position: absolute;

            left: 0;
            right: 0;
            bottom: 0;

            padding: 0 24px 35px;
        }

        .government {
            position: relative;

            background: #0b4f9c;

            padding: 22px 0 18px;

            margin-left: -24px;
            margin-right: -24px;

            padding-left: 24px;

            clip-path: polygon(
                0 35%,
                12% 0,
                100% 0,
                75% 100%,
                0 100%
            );
        }

        .government strong {
            display: block;

            font-size: 12px;

            margin-top: 15px;
        }

        .government span {
            font-size: 11px;
            opacity: .8;
        }


        /* =====================================================
           MAIN CONTENT
        ===================================================== */

        .content {
            margin-left: 270px;

            min-height: 100vh;
        }


        /* =====================================================
           TOP HEADER
        ===================================================== */

        .top-header {
            height: 82px;

            background: #ffffff;

            border-bottom: 1px solid #dfe8f2;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 28px;
        }

        .page-title {
            font-size: 20px;
            font-weight: 800;

            color: #07366d;
        }

        .user-box {
            display: flex;
            align-items: center;

            gap: 11px;

            padding: 8px 15px 8px 9px;

            border: 1px solid #d7e4f1;

            border-radius: 11px;

            background: white;
        }

        .user-circle {
            width: 38px;
            height: 38px;

            border-radius: 50%;

            background: #eaf3ff;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #0b4f9c;

            font-size: 15px;
            font-weight: 800;
        }

        .user-name {
            color: #07366d;

            font-size: 14px;
            font-weight: 700;
        }


        /* =====================================================
           MAIN AREA
        ===================================================== */

        .main {
            padding: 29px 28px 50px;
        }


        /* =====================================================
           HERO
        ===================================================== */

        .hero {
            position: relative;

            min-height: 149px;

            overflow: hidden;

            background: linear-gradient(
                105deg,
                #eaf5ff,
                #ffffff
            );

            border: 1px solid #d6e6f5;

            border-radius: 16px;

            margin-bottom: 28px;

            padding: 31px 58px;

            display: flex;
            align-items: center;
        }

        .hero::before {
            content: "";

            position: absolute;

            left: 0;
            top: 0;
            bottom: 0;

            width: 8px;

            background: linear-gradient(
                to bottom,
                #0b4f9c,
                #42a5ed
            );
        }

        .hero::after {
            content: "";

            position: absolute;

            width: 180px;
            height: 180px;

            right: -45px;
            top: -65px;

            border-radius: 50%;

            background: rgba(219,237,252,.55);
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            margin: 0;

            font-size: 36px;

            line-height: 1.1;

            font-weight: 800;

            color: #07366d;
        }

        .hero-description {
            margin: 10px 0 0;

            font-size: 15px;

            color: #6683a5;
        }

        .back-button {
            position: absolute;

            right: 30px;
            top: 28px;

            z-index: 5;

            padding: 14px 20px;

            border: 1px solid #cfe0f0;

            border-radius: 11px;

            background: rgba(255,255,255,.75);

            color: #0b4f9c;

            text-decoration: none;

            font-size: 14px;
            font-weight: 700;
        }

        .back-button:hover {
            background: white;
        }


        /* =====================================================
           DATA CARD
        ===================================================== */

        .data-card {
            background: white;

            border: 1px solid #dce8f3;

            border-radius: 17px;

            overflow: hidden;

            box-shadow:
                0 3px 12px rgba(11,79,156,.04);
        }

        .data-header {
            min-height: 103px;

            padding: 24px 28px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            border-bottom: 1px solid #e1eaf3;
        }

        .data-header-left {
            display: flex;

            align-items: center;

            gap: 15px;
        }

        .data-icon {
            width: 49px;
            height: 49px;

            border-radius: 12px;

            background: #eaf4ff;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #087cf5;

            font-size: 25px;
        }

        .data-title {
            margin: 0;

            font-size: 23px;

            font-weight: 800;

            color: #07366d;
        }

        .data-description {
            margin: 5px 0 0;

            font-size: 14px;

            color: #6984a6;
        }


        /* =====================================================
           ADD BUTTON
        ===================================================== */

        .add-button {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            padding: 13px 19px;

            border-radius: 10px;

            background: #087cf5;

            color: white;

            text-decoration: none;

            font-size: 14px;

            font-weight: 700;

            box-shadow:
                0 4px 9px rgba(8,124,245,.15);
        }

        .add-button:hover {
            background: #066bd4;
        }


        /* =====================================================
           EMPTY STATE
        ===================================================== */

        .empty-state {
            min-height: 430px;

            display: flex;

            flex-direction: column;

            align-items: center;

            justify-content: center;

            text-align: center;
        }

        .empty-icon {
            width: 91px;
            height: 91px;

            border-radius: 22px;

            background: #eaf4ff;

            display: flex;

            align-items: center;

            justify-content: center;

            margin-bottom: 23px;

            color: #087cf5;

            font-size: 47px;
        }

        .empty-title {
            margin: 0;

            font-size: 24px;

            font-weight: 800;

            color: #07366d;
        }

        .empty-description {
            margin: 9px 0 0;

            font-size: 15px;

            color: #7690b1;
        }


        /* =====================================================
           TABLE
        ===================================================== */

        .table-container {
            padding: 25px 28px 30px;

            overflow-x: auto;
        }

        table {
            width: 100%;

            border-collapse: collapse;

            min-width: 900px;
        }

        th {
            background: #07366d;

            color: white;

            padding: 13px 12px;

            text-align: left;

            font-size: 13px;
        }

        td {
            padding: 13px 12px;

            border-bottom: 1px solid #e5eaf0;

            font-size: 14px;

            color: #405a78;
        }

        tr:hover td {
            background: #f8fbff;
        }

        .action {
            display: flex;
            gap: 7px;
        }

        .btn-edit,
        .btn-delete {
            border: none;

            border-radius: 7px;

            padding: 8px 12px;

            font-size: 12px;

            font-weight: 600;

            text-decoration: none;

            cursor: pointer;
        }

        .btn-edit {
            background: #0b4f9c;
            color: white;
        }

        .btn-delete {
            background: #d9534f;
            color: white;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media(max-width: 900px) {

            .sidebar {
                width: 220px;
            }

            .content {
                margin-left: 220px;
            }

            .hero {
                padding-left: 35px;
            }

            .hero-title {
                font-size: 30px;
            }

            .back-button {
                right: 20px;
            }

        }

        @media(max-width: 700px) {

            .sidebar {
                display: none;
            }

            .content {
                margin-left: 0;
            }

            .main {
                padding: 20px;
            }

            .top-header {
                padding: 0 20px;
            }

            .hero {
                padding: 28px;
            }

            .back-button {
                position: static;

                margin-left: auto;
            }

            .data-header {
                flex-direction: column;

                align-items: flex-start;

                gap: 18px;
            }

        }

    </style>

</head>


<body>


<!-- =========================================================
     SIDEBAR
========================================================= -->

<aside class="sidebar">

    <div class="brand">

        <div class="brand-logo">
            ♥
        </div>

        <div class="brand-text">

            <div class="brand-title">
                Bandung Kota<br>
                Sehat
            </div>

            <div class="brand-subtitle">
                SISTEM INFORMASI
            </div>

        </div>

    </div>


    <nav class="menu">

        <a
            href="<?= base_url('dashboard') ?>"
            class="menu-item"
        >
            <span class="menu-icon">▦</span>
            Dashboard
        </a>


        <div class="menu-section">

            <div class="menu-section-title">

                <span>
                    Kelembagaan
                </span>

                <span class="section-arrow">
                    ⌃
                </span>

            </div>


            <div class="submenu">

                <a
                    href="<?= base_url('tim-pembina') ?>"
                    class="menu-item"
                >
                    <span class="menu-icon">♟</span>
                    Tim Pembina
                </a>


                <a
                    href="<?= base_url('forum-bandung-sehat') ?>"
                    class="menu-item"
                >
                    <span class="menu-icon">▣</span>
                    Forum Bandung Sehat
                </a>


                <a
                    href="<?= base_url('forum-kecamatan-sehat') ?>"
                    class="menu-item"
                >
                    <span class="menu-icon">▤</span>
                    Forum Kecamatan Sehat
                </a>


                <a
                    href="<?= base_url('pokja-kelurahan-sehat') ?>"
                    class="menu-item active"
                >
                    <span class="menu-icon">♟</span>
                    Pokja Kelurahan Sehat
                </a>

            </div>

        </div>


        <a
            href="<?= base_url('logout') ?>"
            class="menu-item"
            style="margin-top:20px;"
        >
            <span class="menu-icon">⇥</span>
            Logout
        </a>

    </nav>


    <div class="sidebar-bottom">

        <div class="government">

            <strong>
                Pemerintah Kota Bandung
            </strong>

            <span>
                Bapperida
            </span>

        </div>

    </div>

</aside>



<!-- =========================================================
     CONTENT
========================================================= -->

<div class="content">


    <!-- =====================================================
         TOP HEADER
    ===================================================== -->

    <header class="top-header">

        <div class="page-title">
            Rencana Kerja Pokja Kelurahan Sehat
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



    <!-- =====================================================
         MAIN
    ===================================================== -->

    <main class="main">


        <!-- =================================================
             HERO
        ================================================== -->

        <section class="hero">

            <div class="hero-content">

                <h1 class="hero-title">
                    Rencana Kerja
                </h1>

                <p class="hero-description">
                    Kelola data rencana kerja Pokja Kelurahan Sehat berdasarkan tahun.
                </p>

            </div>


            <a
                href="<?= base_url('pokja-kelurahan-sehat') ?>"
                class="back-button"
            >
                ←&nbsp;&nbsp; Kembali
            </a>

        </section>



        <!-- =================================================
             DATA CARD
        ================================================== -->

        <section class="data-card">


            <div class="data-header">


                <div class="data-header-left">


                    <div class="data-icon">
                        ☷
                    </div>


                    <div>

                        <h2 class="data-title">
                            Data Rencana Kerja
                        </h2>

                        <p class="data-description">
                            Daftar rencana kerja Pokja Kelurahan Sehat setiap tahun.
                        </p>

                    </div>


                </div>


                <a
                    href="<?= base_url('pokja-kelurahan-sehat/rencana-kerja/create') ?>"
                    class="add-button"
                >
                    ⊕&nbsp; Tambah Data
                </a>


            </div>



            <!-- =================================================
                 EMPTY / DATA
            ================================================== -->

            <?php if (empty($data)): ?>


                <div class="empty-state">


                    <div class="empty-icon">
                        ☷
                    </div>


                    <h3 class="empty-title">
                        Belum Ada Rencana Kerja
                    </h3>


                    <p class="empty-description">
                        Silakan tambahkan rencana kerja berdasarkan tahun.
                    </p>


                </div>


            <?php else: ?>


                <div class="table-container">


                    <table>

                        <thead>

                            <tr>

                                <th>No</th>

                                <th>Kecamatan</th>

                                <th>Kelurahan</th>

                                <th>Nama Kegiatan</th>

                                <th>Tahun</th>

                                <th>Tanggal</th>

                                <th>Lokasi</th>

                                <th>Keterangan</th>

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
                                    <?= esc($row['nama_kecamatan'] ?? '-') ?>
                                </td>


                                <td>
                                    <?= esc($row['nama_kelurahan'] ?? '-') ?>
                                </td>


                                <td>
                                    <?= esc($row['nama_kegiatan'] ?? '-') ?>
                                </td>


                                <td>
                                    <?= esc($row['tahun'] ?? '-') ?>
                                </td>


                                <td>

                                    <?php if (!empty($row['tanggal'])): ?>

                                        <?= date(
                                            'd-m-Y',
                                            strtotime($row['tanggal'])
                                        ) ?>

                                    <?php else: ?>

                                        -

                                    <?php endif; ?>

                                </td>


                                <td>
                                    <?= esc($row['lokasi'] ?? '-') ?>
                                </td>


                                <td>
                                    <?= esc($row['keterangan'] ?? '-') ?>
                                </td>


                                <td>

                                    <div class="action">


                                        <a
                                            href="<?= base_url(
                                                'pokja-kelurahan-sehat/rencana-kerja/edit/' .
                                                $row['id']
                                            ) ?>"
                                            class="btn-edit"
                                        >
                                            Edit
                                        </a>


                                        <form
                                            action="<?= base_url(
                                                'pokja-kelurahan-sehat/rencana-kerja/delete/' .
                                                $row['id']
                                            ) ?>"
                                            method="post"
                                            style="margin:0;"
                                            onsubmit="return confirm('Yakin ingin menghapus rencana kerja ini?');"
                                        >

                                            <?= csrf_field() ?>

                                            <button
                                                type="submit"
                                                class="btn-delete"
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