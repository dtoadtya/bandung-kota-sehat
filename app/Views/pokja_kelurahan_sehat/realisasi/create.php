<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?= esc($title ?? 'Tambah Realisasi Kegiatan Pokja Kelurahan Sehat') ?>
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

            width: 216px;

            background: #07366d;

            color: white;

            z-index: 1000;
        }


        .brand {
            height: 80px;

            display: flex;

            align-items: center;

            padding: 13px 18px;

            border-bottom: 1px solid rgba(255,255,255,.12);
        }


        .brand-logo {
            width: 40px;
            height: 40px;

            border-radius: 11px;

            background: #f2b705;

            display: flex;

            align-items: center;
            justify-content: center;

            margin-right: 9px;

            color: #07366d;

            font-size: 21px;

            font-weight: 900;
        }


        .brand-title {
            font-size: 15px;

            line-height: 1.05;

            font-weight: 800;
        }


        .brand-subtitle {
            margin-top: 4px;

            font-size: 8px;

            color: rgba(255,255,255,.7);

            letter-spacing: .3px;
        }


        .menu {
            padding: 17px 11px;
        }


        .menu-item {
            display: flex;

            align-items: center;

            min-height: 38px;

            padding: 0 13px;

            margin-bottom: 4px;

            border-radius: 8px;

            color: rgba(255,255,255,.85);

            text-decoration: none;

            font-size: 12px;

            font-weight: 600;
        }


        .menu-item:hover {
            background: rgba(255,255,255,.08);

            color: white;
        }


        .menu-icon {
            width: 22px;

            margin-right: 8px;

            text-align: center;

            font-size: 15px;
        }


        .menu-section-title {
            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 10px 13px;

            font-size: 12px;

            font-weight: 700;

            color: rgba(255,255,255,.9);
        }


        .section-arrow {
            font-size: 16px;
        }


        .submenu {
            padding-left: 5px;
        }


        .submenu .menu-item {
            font-size: 11px;
        }


        .submenu .menu-item.active {
            background: #1688f7;

            color: white;

            border-left: 3px solid #f2b705;
        }


        .sidebar-bottom {
            position: absolute;

            left: 0;
            right: 0;

            bottom: 0;

            padding: 0 18px 30px;
        }


        .government {
            background: #0b4f9c;

            padding: 17px 12px;

            clip-path: polygon(
                0 25%,
                12% 0,
                100% 0,
                72% 100%,
                0 100%
            );
        }


        .government strong {
            display: block;

            margin-top: 10px;

            font-size: 10px;
        }


        .government span {
            font-size: 9px;

            opacity: .8;
        }


        /* =====================================================
           CONTENT
        ===================================================== */

        .content {
            margin-left: 216px;

            min-height: 100vh;
        }


        /* =====================================================
           HEADER
        ===================================================== */

        .top-header {
            height: 65px;

            background: #ffffff;

            border-bottom: 1px solid #dfe8f2;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 24px;
        }


        .page-title {
            font-size: 16px;

            font-weight: 800;

            color: #07366d;
        }


        .user-box {
            display: flex;

            align-items: center;

            gap: 9px;

            padding: 6px 12px 6px 7px;

            border: 1px solid #d7e4f1;

            border-radius: 9px;

            background: white;
        }


        .user-circle {
            width: 31px;
            height: 31px;

            border-radius: 50%;

            background: #eaf3ff;

            display: flex;

            align-items: center;

            justify-content: center;

            color: #0b4f9c;

            font-size: 13px;

            font-weight: 800;
        }


        .user-name {
            font-size: 12px;

            font-weight: 700;

            color: #07366d;
        }


        /* =====================================================
           MAIN
        ===================================================== */

        .main {
            padding: 24px 22px 45px;
        }


        /* =====================================================
           HERO
        ===================================================== */

        .hero {
            position: relative;

            min-height: 99px;

            overflow: hidden;

            background:
                linear-gradient(
                    105deg,
                    #eaf5ff,
                    #ffffff
                );

            border: 1px solid #d6e6f5;

            border-left: 5px solid #268ad0;

            border-radius: 12px;

            margin-bottom: 20px;

            padding: 23px 34px;
        }


        .hero::after {
            content: "";

            position: absolute;

            width: 130px;
            height: 130px;

            right: -30px;
            top: -45px;

            border-radius: 50%;

            background: rgba(219,237,252,.5);
        }


        .hero-title {
            position: relative;

            z-index: 2;

            margin: 0;

            font-size: 27px;

            line-height: 1.1;

            font-weight: 800;

            color: #07366d;
        }


        .hero-description {
            position: relative;

            z-index: 2;

            margin: 6px 0 0;

            font-size: 11px;

            color: #6683a5;
        }


        .back-button {
            position: absolute;

            right: 23px;

            top: 31px;

            z-index: 4;

            padding: 10px 14px;

            border: 1px solid #cfe0f0;

            border-radius: 8px;

            background: rgba(255,255,255,.75);

            color: #0b4f9c;

            text-decoration: none;

            font-size: 11px;

            font-weight: 700;
        }


        /* =====================================================
           FORM CARD
        ===================================================== */

        .form-card {
            background: white;

            border: 1px solid #dce8f3;

            border-radius: 12px;

            padding: 20px;

            box-shadow:
                0 3px 12px rgba(11,79,156,.04);
        }


        .form-header {
            margin-bottom: 25px;
        }


        .form-title-row {
            display: flex;

            align-items: center;

            gap: 9px;
        }


        .form-icon {
            color: #087cf5;

            font-size: 19px;
        }


        .form-title {
            margin: 0;

            font-size: 17px;

            font-weight: 800;

            color: #07366d;
        }


        .form-description {
            margin: 4px 0 0;

            padding-left: 28px;

            font-size: 10px;

            color: #6984a6;
        }


        /* =====================================================
           FORM GROUP
        ===================================================== */

        .form-group {
            margin-bottom: 18px;
        }


        label {
            display: block;

            margin-bottom: 7px;

            font-size: 11px;

            font-weight: 700;

            color: #07366d;
        }


        .required {
            color: #d9534f;
        }


        input,
        select,
        textarea {
            width: 100%;

            border: 1px solid #cbdbea;

            border-radius: 6px;

            background: white;

            padding: 10px 11px;

            font-family: inherit;

            font-size: 11px;

            color: #405a78;

            outline: none;
        }


        input:focus,
        select:focus,
        textarea:focus {
            border-color: #0b4f9c;

            box-shadow:
                0 0 0 2px rgba(11,79,156,.07);
        }


        select {
            cursor: pointer;
        }


        textarea {
            min-height: 120px;

            resize: vertical;
        }


        .help-text {
            margin-top: 5px;

            font-size: 9px;

            color: #7690b1;
        }


        /* =====================================================
           BUTTON
        ===================================================== */

        .form-actions {
            display: flex;

            gap: 7px;

            margin-top: 24px;
        }


        .btn {
            border-radius: 6px;

            padding: 9px 14px;

            font-size: 10px;

            font-weight: 700;

            text-decoration: none;

            cursor: pointer;
        }


        .btn-save {
            border: none;

            background: #087cf5;

            color: white;
        }


        .btn-save:hover {
            background: #066bd4;
        }


        .btn-cancel {
            background: white;

            border: 1px solid #cbdbea;

            color: #405a78;
        }


        .btn-cancel:hover {
            background: #f4f8fc;
        }


        /* =====================================================
           ALERT
        ===================================================== */

        .alert {
            padding: 10px 12px;

            margin-bottom: 18px;

            border-radius: 6px;

            background: #fdeaea;

            border: 1px solid #f2c0c0;

            color: #a83232;

            font-size: 11px;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media(max-width: 800px) {

            .sidebar {
                width: 190px;
            }

            .content {
                margin-left: 190px;
            }

        }


        @media(max-width: 650px) {

            .sidebar {
                display: none;
            }

            .content {
                margin-left: 0;
            }

            .main {
                padding: 18px;
            }

            .hero {
                padding: 25px;
            }

            .back-button {
                position: static;

                display: inline-block;

                margin-top: 15px;
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
            style="margin-top:18px;"
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
         TOP HEADER
    ===================================================== -->

    <header class="top-header">


        <div class="page-title">

            Tambah Realisasi Kegiatan Pokja Kelurahan Sehat

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
                Tambah Realisasi Kegiatan
            </h1>


            <p class="hero-description">
                Tambahkan data realisasi kegiatan Pokja Kelurahan Sehat.
            </p>


            <a
                href="<?= base_url('pokja-kelurahan-sehat/realisasi') ?>"
                class="back-button"
            >
                ←&nbsp;&nbsp; Kembali
            </a>


        </section>



        <!-- =================================================
             FORM CARD
        ================================================== -->

        <section class="form-card">


            <?php if (session()->getFlashdata('error')): ?>

                <div class="alert">

                    <?= esc(session()->getFlashdata('error')) ?>

                </div>

            <?php endif; ?>


            <div class="form-header">


                <div class="form-title-row">

                    <div class="form-icon">
                        ▤
                    </div>

                    <h2 class="form-title">
                        Form Realisasi Kegiatan
                    </h2>

                </div>


                <p class="form-description">
                    Silakan isi data realisasi kegiatan Pokja Kelurahan Sehat.
                </p>


            </div>



            <!-- =================================================
                 FORM
            ================================================== -->

            <form
                action="<?= base_url('pokja-kelurahan-sehat/realisasi/store') ?>"
                method="post"
            >


                <?= csrf_field() ?>


                <!-- =============================================
                     KELURAHAN
                ============================================== -->

                <div class="form-group">


                    <label>
                        Kelurahan
                        <span class="required">*</span>
                    </label>


                    <select
                        name="kelurahan_id"
                        required
                    >

                        <option value="">
                            -- Pilih Kelurahan --
                        </option>


                        <?php foreach ($kelurahanList as $kelurahan): ?>

                            <option
                                value="<?= esc($kelurahan['id']) ?>"
                                <?= old('kelurahan_id') == $kelurahan['id'] ? 'selected' : '' ?>
                            >

                                <?= esc($kelurahan['nama_kecamatan']) ?>
                                -
                                <?= esc($kelurahan['nama_kelurahan']) ?>

                            </option>

                        <?php endforeach; ?>


                    </select>


                    <div class="help-text">
                        Pilih kelurahan tempat kegiatan dilaksanakan.
                    </div>


                </div>



                <!-- =============================================
                     TAHUN
                ============================================== -->

                <div class="form-group">


                    <label>
                        Tahun
                        <span class="required">*</span>
                    </label>


                    <input
                        type="number"
                        name="tahun"
                        value="<?= old('tahun', date('Y')) ?>"
                        placeholder="Contoh: 2026"
                        min="2000"
                        max="2100"
                        required
                    >


                    <div class="help-text">
                        Masukkan tahun realisasi kegiatan dalam format 4 angka.
                    </div>


                </div>



                <!-- =============================================
                     NAMA KEGIATAN
                ============================================== -->

                <div class="form-group">


                    <label>
                        Nama Kegiatan
                        <span class="required">*</span>
                    </label>


                    <textarea
                        name="nama_kegiatan"
                        placeholder="Tuliskan nama kegiatan yang telah dilaksanakan..."
                        required
                    ><?= old('nama_kegiatan') ?></textarea>


                    <div class="help-text">
                        Tuliskan nama atau uraian kegiatan yang telah dilaksanakan.
                    </div>


                </div>



                <!-- =============================================
                     TANGGAL
                ============================================== -->

                <div class="form-group">


                    <label>
                        Tanggal
                    </label>


                    <input
                        type="date"
                        name="tanggal"
                        value="<?= old('tanggal') ?>"
                    >


                    <div class="help-text">
                        Masukkan tanggal pelaksanaan kegiatan.
                    </div>


                </div>



                <!-- =============================================
                     LOKASI
                ============================================== -->

                <div class="form-group">


                    <label>
                        Lokasi
                    </label>


                    <input
                        type="text"
                        name="lokasi"
                        value="<?= old('lokasi') ?>"
                        placeholder="Masukkan lokasi kegiatan"
                    >


                </div>



                <!-- =============================================
                     KETERANGAN
                ============================================== -->

                <div class="form-group">


                    <label>
                        Keterangan
                    </label>


                    <textarea
                        name="keterangan"
                        placeholder="Tambahkan keterangan jika diperlukan..."
                        style="min-height:90px;"
                    ><?= old('keterangan') ?></textarea>


                </div>



                <!-- =============================================
                     ACTION
                ============================================== -->

                <div class="form-actions">


                    <button
                        type="submit"
                        class="btn btn-save"
                    >
                        ▣&nbsp; Simpan Data
                    </button>


                    <a
                        href="<?= base_url('pokja-kelurahan-sehat/realisasi') ?>"
                        class="btn btn-cancel"
                    >
                        Batal
                    </a>


                </div>


            </form>


        </section>


    </main>


</div>


</body>

</html>