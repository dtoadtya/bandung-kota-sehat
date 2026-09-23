<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?= esc($title ?? 'Bandung Sehat') ?>
    </title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <!-- Bandung Sehat CSS -->
    <link
        rel="stylesheet"
        href="<?= base_url('assets/css/bandung-sehat.css') ?>"
    >

    <style>

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100%;
        }

        body {
            font-family:
                "Segoe UI",
                Arial,
                sans-serif;

            background: #f4f8fc;

            color: #062b63;
        }


        /* =====================================================
           APP
        ===================================================== */

        .app-shell {
            min-height: 100vh;

            display: flex;

            background:
                #f4f8fc;
        }


        /* =====================================================
           SIDEBAR
        ===================================================== */

        .app-sidebar {
            width: 270px;

            min-width: 270px;

            min-height: 100vh;

            background:
                linear-gradient(
                    180deg,
                    #063b78 0%,
                    #052f63 52%,
                    #032653 100%
                );

            color: #ffffff;

            position: fixed;

            left: 0;
            top: 0;
            bottom: 0;

            z-index: 1000;

            display: flex;

            flex-direction: column;

            overflow-y: auto;

            box-shadow:
                4px 0 15px
                rgba(0, 0, 0, .08);
        }


        /* =====================================================
           BRAND
        ===================================================== */

        .app-brand {

            height: 100px;

            display: flex;

            align-items: center;

            padding:
                18px 24px;

            border-bottom:
                1px solid
                rgba(255,255,255,.12);
        }


        .app-brand-icon {

            width: 48px;
            height: 48px;

            border-radius: 12px;

            background:
                #ffc400;

            display: flex;

            align-items: center;
            justify-content: center;

            color:
                #063b78;

            font-size: 26px;

            margin-right: 12px;

            flex-shrink: 0;
        }


        .app-brand-text strong {

            display: block;

            font-size: 18px;

            font-weight: 800;

            line-height: 1.1;
        }


        .app-brand-text span {

            display: block;

            margin-top: 5px;

            font-size: 10px;

            letter-spacing: .6px;

            color:
                rgba(255,255,255,.72);
        }


        /* =====================================================
           MENU
        ===================================================== */

        .app-menu {

            padding:
                24px 14px;
        }


        .app-menu-title {

            font-size: 10px;

            font-weight: 800;

            letter-spacing: 1px;

            color:
                rgba(255,255,255,.52);

            padding:
                0 10px;

            margin:
                0 0 10px;
        }


        .app-menu a {

            display: flex;

            align-items: center;

            gap: 14px;

            min-height: 48px;

            padding:
                11px 14px;

            margin-bottom: 6px;

            border-radius: 10px;

            color:
                rgba(255,255,255,.88);

            text-decoration: none;

            font-size: 14px;

            font-weight: 600;

            transition:
                .2s ease;
        }


        .app-menu a i {

            width: 22px;

            text-align: center;

            font-size: 18px;
        }


        .app-menu a:hover {

            background:
                rgba(255,255,255,.10);

            color:
                #ffffff;
        }


        .app-menu a.active {

            background:
                linear-gradient(
                    90deg,
                    #087df5,
                    #168af5
                );

            color:
                #ffffff;

            border-left:
                4px solid #ffc400;

            padding-left:
                10px;

            box-shadow:
                0 5px 15px
                rgba(0,0,0,.10);
        }


        /* =====================================================
           KELEMBAGAAN DROPDOWN
        ===================================================== */

        .kelembagaan-dropdown {

            margin-bottom: 6px;
        }


        .kelembagaan-button {

            width: 100%;

            min-height: 48px;

            border: none;

            border-radius: 10px;

            background: transparent;

            color:
                rgba(255,255,255,.88);

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding:
                11px 14px;

            font-size: 14px;

            font-weight: 600;

            cursor: pointer;

            transition:
                .2s ease;
        }


        .kelembagaan-button:hover {

            background:
                rgba(255,255,255,.10);

            color:
                #ffffff;
        }


        .kelembagaan-button-left {

            display: flex;

            align-items: center;

            gap: 14px;
        }


        .kelembagaan-button i {

            width: 22px;

            text-align: center;

            font-size: 18px;
        }


        .kelembagaan-arrow {

            font-size: 12px;

            transition:
                transform .2s ease;
        }


        .kelembagaan-dropdown.open
        .kelembagaan-arrow {

            transform:
                rotate(180deg);
        }


        .kelembagaan-items {

            display: none;

            padding:
                4px 0 4px 20px;
        }


        .kelembagaan-dropdown.open
        .kelembagaan-items {

            display: block;
        }


        .kelembagaan-items a {

            min-height: 42px;

            padding:
                9px 14px;

            margin-bottom: 4px;

            font-size: 13px;

            border-radius: 8px;
        }


        .kelembagaan-items a i {

            font-size: 15px;
        }


        /* =====================================================
           SIDEBAR FOOTER
        ===================================================== */

        .app-sidebar-footer {

            margin-top: auto;

            padding:
                20px 24px 24px;

            min-height: 125px;

            position: relative;

            overflow: hidden;
        }


        .app-sidebar-footer::before {

            content: "";

            position: absolute;

            left: 0;
            right: 0;

            bottom: 55px;

            height: 80px;

            background:
                linear-gradient(
                    135deg,
                    transparent 10%,
                    rgba(0,126,255,.30) 11%,
                    rgba(0,126,255,.30) 65%,
                    transparent 66%
                );
        }


        .app-sidebar-footer::after {

            content: "";

            position: absolute;

            left: -10px;

            bottom: 0;

            width: 90px;

            height: 25px;

            background:
                #ffc400;

            transform:
                skewX(-35deg);
        }


        .app-sidebar-footer-text {

            position: relative;

            z-index: 2;

            font-size: 12px;

            line-height: 1.6;

            color:
                rgba(255,255,255,.85);
        }


        .app-sidebar-footer-text strong {

            display: block;

            color:
                #ffffff;

            font-size: 13px;
        }


        /* =====================================================
           MAIN
        ===================================================== */

        .app-main {

            margin-left: 270px;

            min-height: 100vh;

            width:
                calc(100% - 270px);

            display: flex;

            flex-direction: column;
        }


        /* =====================================================
           TOPBAR
        ===================================================== */

        .app-topbar {

            height: 82px;

            background:
                #ffffff;

            border-bottom:
                1px solid #e4ebf3;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding:
                0 28px;

            position: sticky;

            top: 0;

            z-index: 900;
        }


        .topbar-title {

            font-size: 20px;

            font-weight: 800;

            color:
                #063b78;
        }


        .topbar-user {

            display: flex;

            align-items: center;

            gap: 10px;

            padding:
                7px 12px;

            border:
                1px solid #dce7f2;

            border-radius: 10px;

            background:
                #ffffff;

            box-shadow:
                0 2px 8px
                rgba(6,59,120,.04);
        }


        .topbar-user-avatar {

            width: 38px;
            height: 38px;

            border-radius: 50%;

            background:
                #e7f1ff;

            color:
                #07509c;

            display: flex;

            align-items: center;
            justify-content: center;

            font-weight: 800;
        }


        .topbar-user-name {

            color:
                #063b78;

            font-size: 15px;

            font-weight: 700;
        }


        /* =====================================================
           CONTENT
        ===================================================== */

        .app-content {

            flex: 1;

            padding:
                28px;

            background:
                linear-gradient(
                    180deg,
                    #f4f8fc 0%,
                    #f8fbfe 100%
                );
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .app-footer {

            min-height: 60px;

            padding:
                0 28px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            background:
                #ffffff;

            border-top:
                1px solid #e4ebf3;

            color:
                #68809a;

            font-size: 11px;
        }


        .app-footer strong {

            color:
                #087df5;
        }


        /* =====================================================
           MOBILE
        ===================================================== */

        @media (max-width: 900px) {

            .app-sidebar {

                width: 235px;

                min-width: 235px;
            }

            .app-main {

                margin-left: 235px;

                width:
                    calc(100% - 235px);
            }

            .app-content {

                padding:
                    18px;
            }

            .app-topbar {

                padding:
                    0 18px;
            }

            .topbar-title {

                font-size: 17px;
            }

        }


        @media (max-width: 650px) {

            .app-sidebar {

                position: relative;

                width: 220px;

                min-width: 220px;
            }

            .app-main {

                margin-left: 0;

                width:
                    100%;
            }

            .app-topbar {

                position: relative;
            }

        }

    </style>

</head>


<body>

<div class="app-shell">


    <!-- =====================================================
         SIDEBAR
    ====================================================== -->

    <aside
        class="app-sidebar"
        id="appSidebar"
    >

        <!-- BRAND -->

        <div class="app-brand">

            <div class="app-brand-icon">

                <i class="bi bi-heart-pulse-fill"></i>

            </div>

            <div class="app-brand-text">

                <strong>
                    Bandung Kota Sehat
                </strong>

                <span>
                    SISTEM INFORMASI
                </span>

            </div>

        </div>


        <!-- MENU -->

        <nav class="app-menu">

            <?php
                $currentRole =
                    session()->get('role');

                $currentSegment =
                    service('uri')->getSegment(1);
            ?>


            <!-- =================================================
                 UTAMA
            ================================================== -->
            <a
                href="<?= base_url('dashboard') ?>"
                class="<?= $currentSegment === 'dashboard' ? 'active' : '' ?>"
            >

                <i class="bi bi-grid-fill"></i>

                <span>
                    Dashboard
                </span>

            </a>


            <!-- =================================================
                 KELEMBAGAAN
            ================================================== -->
            <div
                class="
                    kelembagaan-dropdown
                    <?= in_array(
                        $currentSegment,
                        [
                            'tim-pembina',
                            'timpembina',
                            'forum-bandung-sehat',
                            'forum-kecamatan-sehat',
                            'pokja-kelurahan-sehat'
                        ],
                        true
                    )
                    ? 'open'
                    : '' ?>
                "
                id="kelembagaanDropdown"
            >


                <button
                    type="button"
                    class="kelembagaan-button"
                    onclick="toggleKelembagaan()"
                >

                    <span class="kelembagaan-button-left">

                        <i class="bi bi-building-fill"></i>

                        <span>
                            Kelembagaan
                        </span>

                    </span>


                    <i
                        class="
                            bi
                            bi-chevron-down
                            kelembagaan-arrow
                        "
                    ></i>

                </button>


                <div
                    class="kelembagaan-items"
                    id="kelembagaanItems"
                >


                    <!-- TIM PEMBINA -->

                    <?php if (
                        in_array(
                            $currentRole,
                            [
                                'user',
                                'admin',
                            ],
                            true
                        )
                    ): ?>

                        <a
                            href="<?= base_url('tim-pembina') ?>"
                            class="<?= in_array(
                                $currentSegment,
                                [
                                    'tim-pembina',
                                    'timpembina'
                                ],
                                true
                            )
                            ? 'active'
                            : '' ?>"
                        >

                            <i class="bi bi-people-fill"></i>

                            <span>
                                Tim Pembina
                            </span>

                        </a>

                    <?php endif; ?>


                    <!-- FORUM BANDUNG -->

                    <?php if (
                        in_array(
                            $currentRole,
                            [
                                'user',
                                'admin'
                            ],
                            true
                        )
                    ): ?>

                        <a
                            href="<?= base_url(
                                'forum-bandung-sehat'
                            ) ?>"
                            class="<?= $currentSegment ===
                                'forum-bandung-sehat'
                                ? 'active'
                                : '' ?>"
                        >

                            <i class="bi bi-building"></i>

                            <span>
                                Forum Bandung Sehat
                            </span>

                        </a>

                    <?php endif; ?>


                    <!-- FORUM KECAMATAN -->

                    <a
                        href="<?= base_url(
                            'forum-kecamatan-sehat'
                        ) ?>"
                        class="<?= $currentSegment ===
                            'forum-kecamatan-sehat'
                            ? 'active'
                            : '' ?>"
                    >

                        <i class="bi bi-chat-square-text-fill"></i>

                        <span>
                            Forum Kecamatan Sehat
                        </span>

                    </a>


                    <!-- POKJA -->

                    <a
                        href="<?= base_url(
                            'pokja-kelurahan-sehat'
                        ) ?>"
                        class="<?= $currentSegment ===
                            'pokja-kelurahan-sehat'
                            ? 'active'
                            : '' ?>"
                    >

                        <i class="bi bi-diagram-3-fill"></i>

                        <span>
                            Pokja Kelurahan Sehat
                        </span>

                    </a>


                </div>

            </div>


            <!-- =================================================
                 AKUN
            ================================================== -->
            <a
                href="<?= base_url('logout') ?>"
                onclick="
                    return confirm(
                        'Apakah Anda yakin ingin keluar?'
                    )
                "
            >

                <i class="bi bi-box-arrow-right"></i>

                <span>
                    Logout
                </span>

            </a>


        </nav>


        <!-- SIDEBAR FOOTER -->

        <div class="app-sidebar-footer">

            <div class="app-sidebar-footer-text">

                <strong>
                    Pemerintah Kota Bandung
                </strong>

                Bapperida

            </div>

        </div>

    </aside>


    <!-- =====================================================
         MAIN
    ====================================================== -->

    <main class="app-main">


        <!-- TOPBAR -->

        <header class="app-topbar">

            <div class="topbar-title">

                <?= esc(
                    $title ?? 'Tim Pembina'
                ) ?>

            </div>


            <div class="topbar-user">

                <div class="topbar-user-avatar">

                    <?= strtoupper(
                        substr(
                            session()->get('nama')
                            ?: session()->get('username')
                            ?: 'U',
                            0,
                            1
                        )
                    ) ?>

                </div>


                <div class="topbar-user-name">

                    <?= esc(
                        session()->get('nama')
                        ?: session()->get('username')
                        ?: 'Pengguna'
                    ) ?>

                </div>

            </div>

        </header>


        <!-- CONTENT -->

        <section class="app-content">


            <?php if (
                session()->getFlashdata('success')
            ): ?>

                <div class="alert alert-success">

                    <i
                        class="bi bi-check-circle-fill me-2"
                    ></i>

                    <?= esc(
                        session()->getFlashdata(
                            'success'
                        )
                    ) ?>

                </div>

            <?php endif; ?>


            <?php if (
                session()->getFlashdata('error')
            ): ?>

                <div class="alert alert-danger">

                    <i
                        class="bi bi-exclamation-circle-fill me-2"
                    ></i>

                    <?= esc(
                        session()->getFlashdata(
                            'error'
                        )
                    ) ?>

                </div>

            <?php endif; ?>


            <?= $this->renderSection('content') ?>


        </section>


        <!-- FOOTER -->

        <footer class="app-footer">

            <strong>
                Bandung Kota Sehat
            </strong>

            <span>
                Sistem Informasi Bandung Kota Sehat
            </span>

        </footer>


    </main>

</div>


<script>

function toggleKelembagaan()
{
    const menu =
        document.getElementById(
            'kelembagaanDropdown'
        );

    if (!menu) {
        return;
    }

    menu.classList.toggle('open');
}

</script>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>


<script
    src="<?= base_url(
        'assets/js/bandung-sehat.js'
    ) ?>"
></script>


</body>

</html>