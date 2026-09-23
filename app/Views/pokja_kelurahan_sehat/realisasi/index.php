<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?= esc($title ?? 'Realisasi Kegiatan Pokja Kelurahan Sehat') ?>
    </title>


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

            color: #07366d;

            font-size: 25px;

            font-weight: 900;
        }


        .brand-title {
            font-size: 17px;

            line-height: 1.05;

            font-weight: 800;
        }


        .brand-subtitle {
            margin-top: 6px;

            font-size: 9px;

            color: rgba(255,255,255,.72);

            letter-spacing: .5px;
        }


        /* =====================================================
           MENU
        ===================================================== */

        .menu {
            padding: 26px 14px;
        }


        .menu-item {
            display: flex;

            align-items: center;

            min-height: 43px;

            padding: 0 14px;

            margin-bottom: 6px;

            border-radius: 9px;

            color: rgba(255,255,255,.84);

            text-decoration: none;

            font-size: 13px;

            font-weight: 600;

            transition: .2s;
        }


        .menu-item:hover {
            background: rgba(255,255,255,.08);

            color: white;
        }


        .menu-icon {
            width: 25px;

            margin-right: 10px;

            text-align: center;

            font-size: 16px;
        }


        .menu-section-title {
            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 12px 14px;

            font-size: 13px;

            font-weight: 700;

            color: rgba(255,255,255,.92);
        }


        .section-arrow {
            font-size: 17px;
        }


        .submenu {
            padding-left: 5px;
        }


        .submenu .menu-item {
            font-size: 12px;
        }


        .submenu .menu-item.active {
            background: #1688f7;

            color: white;

            border-left: 4px solid #f2b705;
        }


        .sidebar-bottom {
            position: absolute;

            left: 0;
            right: 0;

            bottom: 0;

            padding-bottom: 30px;
        }


        .government {
            width: 220px;

            padding: 20px 24px;

            background: #0b4f9c;

            clip-path: polygon(
                0 0,
                100% 0,
                68% 100%,
                0 100%
            );
        }


        .government strong {
            display: block;

            font-size: 11px;
        }


        .government span {
            display: block;

            margin-top: 5px;

            font-size: 10px;

            opacity: .8;
        }


        /* =====================================================
           CONTENT
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

            background: white;

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

            gap: 10px;

            padding: 7px 14px 7px 8px;

            border: 1px solid #d7e4f1;

            border-radius: 10px;

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
            font-size: 13px;

            font-weight: 700;

            color: #07366d;
        }


        /* =====================================================
           MAIN
        ===================================================== */

        .main {
            padding: 30px 28px 50px;
        }


        /* =====================================================
           HERO
        ===================================================== */

        .hero {
            position: relative;

            min-height: 148px;

            overflow: hidden;

            background:
                linear-gradient(
                    105deg,
                    #eaf5ff,
                    #ffffff
                );

            border: 1px solid #d6e6f5;

            border-left: 7px solid #268ad0;

            border-radius: 14px;

            margin-bottom: 28px;

            padding: 34px 52px;
        }


        .hero::after {
            content: "";

            position: absolute;

            width: 170px;
            height: 170px;

            right: -35px;
            top: -65px;

            border-radius: 50%;

            background: rgba(219,237,252,.55);
        }


        .hero-title {
            position: relative;

            z-index: 2;

            margin: 0;

            font-size: 35px;

            line-height: 1.1;

            font-weight: 800;

            color: #07366d;
        }


        .hero-description {
            position: relative;

            z-index: 2;

            margin: 11px 0 0;

            font-size: 14px;

            color: #6683a5;
        }


        .back-button {
            position: absolute;

            right: 30px;

            top: 29px;

            z-index: 5;

            padding: 14px 20px;

            border: 1px solid #cfe0f0;

            border-radius: 10px;

            background: rgba(255,255,255,.82);

            color: #0b4f9c;

            text-decoration: none;

            font-size: 13px;

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

            border-radius: 14px;

            overflow: hidden;

            box-shadow:
                0 4px 15px rgba(11,79,156,.05);
        }


        /* =====================================================
           CARD HEADER
        ===================================================== */

        .card-header {
            min-height: 104px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 22px 28px;

            border-bottom: 1px solid #e4ebf3;
        }


        .card-title-wrapper {
            display: flex;

            align-items: center;

            gap: 15px;
        }


        .card-icon {
            width: 48px;
            height: 48px;

            border-radius: 12px;

            background: #eaf3ff;

            display: flex;

            align-items: center;
            justify-content: center;

            color: #087cf5;

            font-size: 25px;
        }


        .card-title {
            margin: 0;

            font-size: 24px;

            font-weight: 800;

            color: #07366d;
        }


        .card-description {
            margin: 5px 0 0;

            font-size: 13px;

            color: #6984a6;
        }


        .add-button {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding: 13px 19px;

            border-radius: 9px;

            background: #087cf5;

            color: white;

            text-decoration: none;

            font-size: 13px;

            font-weight: 700;

            transition: .2s;
        }


        .add-button:hover {
            background: #066bd4;
        }


        /* =====================================================
           CARD BODY
        ===================================================== */

        .card-body {
            min-height: 360px;

            padding: 55px 28px 70px;

            text-align: center;
        }


        .empty-icon {
            width: 90px;
            height: 90px;

            margin: 0 auto 25px;

            border-radius: 22px;

            background: #eaf3ff;

            display: flex;

            align-items: center;
            justify-content: center;

            color: #087cf5;

            font-size: 46px;
        }


        .empty-title {
            margin: 0;

            font-size: 22px;

            font-weight: 800;

            color: #07366d;
        }


        .empty-description {
            margin-top: 12px;

            font-size: 14px;

            color: #6984a6;
        }


        /* =====================================================
           TABLE
        ===================================================== */

        .table-wrapper {
            overflow-x: auto;

            padding: 25px 28px 35px;
        }


        table {
            width: 100%;

            border-collapse: collapse;

            font-size: 12px;
        }


        thead th {
            padding: 14px 12px;

            background: #07366d;

            color: white;

            text-align: left;

            font-size: 12px;

            font-weight: 700;

            white-space: nowrap;
        }


        tbody td {
            padding: 13px 12px;

            border-bottom: 1px solid #e6edf5;

            color: #405a78;

            vertical-align: top;
        }


        tbody tr:hover {
            background: #f7fbff;
        }


        .no-data {
            text-align: center;

            padding: 45px 15px;

            color: #6984a6;
        }


        /* =====================================================
           ACTION BUTTON
        ===================================================== */

        .action-wrapper {
            display: flex;

            gap: 6px;

            white-space: nowrap;
        }


        .btn-edit,
        .btn-delete {
            border: none;

            border-radius: 6px;

            padding: 7px 10px;

            font-size: 11px;

            font-weight: 700;

            text-decoration: none;

            cursor: pointer;
        }


        .btn-edit {
            background: #eaf3ff;

            color: #0b4f9c;
        }


        .btn-delete {
            background: #fdeaea;

            color: #c43d3d;
        }


        .btn-edit:hover {
            background: #dcecff;
        }


        .btn-delete:hover {
            background: #f9d9d9;
        }


        /* =====================================================
           ALERT
        ===================================================== */

        .alert {
            margin: 20px 28px 0;

            padding: 12px 15px;

            border-radius: 8px;

            font-size: 12px;
        }


        .alert-success {
            background: #e9f8ef;

            border: 1px solid #bce8ca;

            color: #16743c;
        }


        .alert-error {
            background: #fdeaea;

            border: 1px solid #f1c2c2;

            color: #a83232;
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
                padding-left: 30px;
            }

            .hero-title {
                font-size: 30px;
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
                padding: 18px;
            }

            .top-header {
                padding: 0 18px;
            }

            .page-title {
                font-size: 15px;
            }

            .hero {
                padding: 25px;
            }

            .hero-title {
                font-size: 27px;
            }

            .back-button {
                position: static;

                display: inline-block;

                margin-top: 20px;
            }

            .card-header {
                align-items: flex-start;

                flex-direction: column;

                gap: 18px;
            }

            .add-button {
                width: 100%;

                justify-content: center;
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

        <div>

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

            <span class="menu-icon">
                ▦
            </span>

            Dashboard

        </a>


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

                <span class="menu-icon">
                    ♟
                </span>

                Tim Pembina

            </a>


            <a
                href="<?= base_url('forum-bandung-sehat') ?>"
                class="menu-item"
            >

                <span class="menu-icon">
                    ▣
                </span>

                Forum Bandung Sehat

            </a>


            <a
                href="<?= base_url('forum-kecamatan-sehat') ?>"
                class="menu-item"
            >

                <span class="menu-icon">
                    ▤
                </span>

                Forum Kecamatan Sehat

            </a>


            <a
                href="<?= base_url('pokja-kelurahan-sehat') ?>"
                class="menu-item active"
            >

                <span class="menu-icon">
                    ♟
                </span>

                Pokja Kelurahan Sehat

            </a>


        </div>


        <a
            href="<?= base_url('logout') ?>"
            class="menu-item"
            style="margin-top:20px;"
        >

            <span class="menu-icon">
                ⇥
            </span>

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
         HEADER
    ===================================================== -->

    <header class="top-header">


        <div class="page-title">

            Realisasi Kegiatan Pokja Kelurahan Sehat

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


            <h1 class="hero-title">
                Realisasi Kegiatan
            </h1>


            <p class="hero-description">
                Kelola data realisasi kegiatan Pokja Kelurahan Sehat.
            </p>


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


            <!-- =============================================
                 FLASH MESSAGE
            ============================================== -->

            <?php if (session()->getFlashdata('success')): ?>

                <div class="alert alert-success">

                    <?= esc(session()->getFlashdata('success')) ?>

                </div>

            <?php endif; ?>


            <?php if (session()->getFlashdata('error')): ?>

                <div class="alert alert-error">

                    <?= esc(session()->getFlashdata('error')) ?>

                </div>

            <?php endif; ?>



            <!-- =============================================
                 CARD HEADER
            ============================================== -->

            <div class="card-header">


                <div class="card-title-wrapper">


                    <div class="card-icon">
                        📊
                    </div>


                    <div>

                        <h2 class="card-title">
                            Data Realisasi Kegiatan
                        </h2>

                        <p class="card-description">
                            Daftar laporan realisasi kegiatan Pokja Kelurahan Sehat.
                        </p>

                    </div>


                </div>



                <a
                    href="<?= base_url('pokja-kelurahan-sehat/realisasi/create') ?>"
                    class="add-button"
                >

                    <span>
                        ⊕
                    </span>

                    Tambah Data

                </a>


            </div>



            <!-- =============================================
                 DATA
            ============================================== -->

            <?php if (!empty($data)): ?>


                <div class="table-wrapper">


                    <table>


                        <thead>

                            <tr>

                                <th>
                                    No
                                </th>

                                <th>
                                    Kecamatan
                                </th>

                                <th>
                                    Kelurahan
                                </th>

                                <th>
                                    Nama Kegiatan
                                </th>

                                <th>
                                    Tahun
                                </th>

                                <th>
                                    Tanggal
                                </th>

                                <th>
                                    Lokasi
                                </th>

                                <th>
                                    Keterangan
                                </th>

                                <th>
                                    Aksi
                                </th>

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
                                        <?= !empty($row['tanggal'])
                                            ? date('d-m-Y', strtotime($row['tanggal']))
                                            : '-'
                                        ?>
                                    </td>


                                    <td>
                                        <?= esc($row['lokasi'] ?? '-') ?>
                                    </td>


                                    <td>
                                        <?= esc($row['keterangan'] ?? '-') ?>
                                    </td>


                                    <td>


                                        <div class="action-wrapper">


                                            <a
                                                href="<?= base_url('pokja-kelurahan-sehat/realisasi/edit/' . $row['id']) ?>"
                                                class="btn-edit"
                                            >
                                                Edit
                                            </a>


                                            <form
                                                action="<?= base_url('pokja-kelurahan-sehat/realisasi/delete/' . $row['id']) ?>"
                                                method="post"
                                                style="display:inline;"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');"
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


            <?php else: ?>


                <!-- =========================================
                     EMPTY STATE
                ========================================== -->

                <div class="card-body">


                    <div class="empty-icon">
                        📊
                    </div>


                    <h3 class="empty-title">
                        Belum ada data realisasi kegiatan
                    </h3>


                    <p class="empty-description">
                        Silakan tambahkan data realisasi kegiatan terlebih dahulu.
                    </p>


                </div>


            <?php endif; ?>


        </section>


    </main>


</div>


</body>

</html>