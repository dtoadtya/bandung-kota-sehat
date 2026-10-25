<?php

if (session()->get('logged_in')) {
    header('Location: ' . base_url('dashboard'));
    exit;
}

header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');
header('Expires: 0');

?>
<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        <?= esc($title ?? 'Login - Bandung Sehat') ?>
    </title>

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>

        :root {
            --blue: #0b4f9c;
            --blue-dark: #07366d;
            --blue-light: #eaf3ff;
            --gold: #f2b705;
            --red: #d9534f;
            --text: #243447;
            --muted: #718096;
            --border: #dce6f0;
        }


        * {
            box-sizing: border-box;
        }


        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100%;
        }


        body {

            min-height: 100vh;

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            color: var(--text);

            /*
             * BACKGROUND UTAMA
             *
             * Ganti nama file jika nama gambar
             * Anda berbeda.
             */
            background-image:
                linear-gradient(
                    rgba(7, 54, 109, 0.10),
                    rgba(7, 54, 109, 0.10)
                ),
                url("<?= base_url('assets/images/login-background.png') ?>");

            background-size: cover;

            background-position: center center;

            background-repeat: no-repeat;

            background-attachment: fixed;

            position: relative;

            overflow-x: hidden;
        }


        /*
        =====================================================
        OVERLAY HALUS
        =====================================================
        */

        body::before {

            content: "";

            position: fixed;

            inset: 0;

            background:
                linear-gradient(
                    90deg,
                    rgba(255,255,255,0.05) 0%,
                    rgba(255,255,255,0.00) 45%,
                    rgba(255,255,255,0.08) 100%
                );

            pointer-events: none;

            z-index: 0;
        }


        /*
        =====================================================
        HALAMAN UTAMA
        =====================================================
        */

        .login-page {

            min-height: 100vh;

            width: 100%;

            position: relative;

            z-index: 1;

            display: flex;

            align-items: center;

            justify-content: flex-end;

            padding:
                45px
                22vw
                45px
                45px;
        }


        /*
        =====================================================
        JUDUL BANDUNG SEHAT
        KIRI BAWAH
        =====================================================
        */

        .brand-area {

            position: fixed;

            left: 7vw;

            bottom: 55px;

            width: 470px;

            z-index: 3;

            color: white;

            text-shadow:
                0 2px 8px rgba(0,0,0,0.20);
        }


        .brand-area h1 {

            margin: 0;

            font-size: 35px;

            line-height: 1.05;

            font-weight: 800;

            letter-spacing: -1px;
        }


        .brand-area h1 span {

            color: #0098fd;
        }


        .brand-area p {

            margin: 18px 0 0;

            max-width: 430px;

            font-size: 17px;

            line-height: 1.45;

            color: white;
        }


        /*
        =====================================================
        CARD LOGIN
        =====================================================
        */

        .login-card {

        width: 450px;

        max-width: 450px;

        background: rgba(255, 255, 255, 0.97);

        border-radius: 17px;

        padding: 42px 50px;

        box-shadow:
            0 25px 70px rgba(7, 54, 109, 0.22);

        backdrop-filter: blur(5px);

        border:
            1px solid rgba(255, 255, 255, 0.85);

        position: relative;

        z-index: 5;
    }

        /*
        =====================================================
        HEADER LOGIN
        =====================================================
        */

        .login-header h2 {

            margin: 0 0 7px;

            color: var(--blue-dark);

            font-size: 34px;

            font-weight: 800;
        }


        .login-header p {

            margin: 0 0 27px;

            color: #647b98;

            font-size: 15px;
        }


        /*
        =====================================================
        ALERT
        =====================================================
        */

        .alert {

            padding: 12px 14px;

            border-radius: 8px;

            margin-bottom: 18px;

            font-size: 13px;
        }


        .alert-danger {

            background: #fff1f0;

            border: 1px solid #f5c6c3;

            color: var(--red);
        }


        .alert-success {

            background: #eefaf4;

            border: 1px solid #bfe5cf;

            color: #198754;
        }


        /*
        =====================================================
        FORM
        =====================================================
        */

        .form-group {

            margin-bottom: 18px;
        }


        .form-group label {

            display: block;

            margin-bottom: 8px;

            color: var(--blue-dark);

            font-size: 14px;

            font-weight: 700;
        }


        .required {

            color: var(--red);
        }


        .form-control {

            width: 100%;

            height: 51px;

            border:
                1px solid var(--border);

            border-radius: 8px;

            padding:
                0 14px;

            background: white;

            color: var(--text);

            font-family: inherit;

            font-size: 14px;

            outline: none;

            transition: .2s;
        }


        .form-control:focus {

            border-color: #1687e8;

            box-shadow:
                0 0 0 3px
                rgba(22,135,232,0.10);
        }


        /*
        =====================================================
        TOGGLE PASSWORD
        =====================================================
        */

        .password-wrapper {

            position: relative;
        }


        .password-wrapper .form-control {

            padding-right: 48px;
        }


        .btn-toggle-password {

            position: absolute;

            top: 50%;

            right: 6px;

            transform: translateY(-50%);

            width: 38px;

            height: 38px;

            border: none;

            background: transparent;

            color: #718096;

            font-size: 18px;

            cursor: pointer;

            border-radius: 8px;

            display: flex;

            align-items: center;

            justify-content: center;

            transition: .2s;
        }


        .btn-toggle-password:hover {

            color: var(--blue);

            background: var(--blue-light);
        }


        /*
        =====================================================
        BUTTON
        =====================================================
        */

        .btn-login {

            width: 100%;

            height: 52px;

            border: none;

            border-radius: 8px;

            background: #0b5db7;

            color: white;

            font-size: 15px;

            font-weight: 700;

            cursor: pointer;

            transition: .2s;

            margin-top: 4px;
        }


        .btn-login:hover {

            background: var(--blue-dark);

            transform: translateY(-1px);
        }


        /*
        =====================================================
        FOOTER
        =====================================================
        */

        .footer-login {

            text-align: center;

            margin-top: 25px;

            color: var(--muted);

            font-size: 12px;

            line-height: 1.5;
        }


        .footer-login strong {

            color: var(--blue);

            font-size: 13px;
        }


        .footer-login-copyright {

            display: block;

            margin-top: 8px;

            color: var(--muted);

            font-size: 11px;
        }


        .footer-login-copyright a {

            color: var(--blue);

            font-weight: 700;

            text-decoration: none;
        }


        .footer-login-copyright a:hover {

            text-decoration: underline;
        }


        /*
        =====================================================
        RESPONSIVE
        =====================================================
        */

        @media (max-width: 1100px) {

            .login-page {

                padding-right: 4vw;
            }


            .brand-area {

                left: 4vw;

                width: 400px;
            }


            .brand-area h1 {

                font-size: 42px;
            }


            .login-card {

                max-width: 500px;
            }
        }


        @media (max-width: 850px) {

            body {

                background-position:
                    center center;

                background-attachment:
                    scroll;
            }


            .login-page {

                min-height: 100vh;

                padding:
                    30px
                    20px
                    210px;

                align-items: center;

                justify-content: center;
            }


            .login-card {

                max-width: 520px;

                padding:
                    35px 35px;
            }


            .brand-area {

                position: absolute;

                left: 25px;

                right: 25px;

                bottom: 30px;

                width: auto;

                text-align: center;
            }


            .brand-line {

                margin:
                    0 auto
                    14px;
            }


            .brand-area h1 {

                font-size: 34px;
            }


            .brand-area p {

                margin:
                    12px auto 0;

                font-size: 15px;
            }
        }


        @media (max-width: 520px) {

            .login-page {

                padding:
                    20px
                    15px
                    200px;
            }


            .login-card {

                padding:
                    28px 23px;

                border-radius: 14px;
            }


            .login-header h2 {

                font-size: 28px;
            }


            .login-header p {

                font-size: 13px;
            }


            .brand-area h1 {

                font-size: 29px;
            }


            .brand-area p {

                font-size: 13px;
            }


            .form-control {

                height: 48px;
            }


            .btn-login {

                height: 50px;
            }
        }

    </style>

</head>


<body>


<!-- =====================================================
     HALAMAN LOGIN
====================================================== -->

<div class="login-page">


    <!-- =================================================
         JUDUL BANDUNG SEHAT
         KIRI BAWAH
    ================================================== -->

    <div class="brand-area">

        <div class="brand-line"></div>

        <h1>
            Bandung Kota
            <span>Sehat</span>
        </h1>

        <p>
            Bersama Mewujudkan Kota Bandung
            yang Sehat, Nyaman dan Berkelanjutan
        </p>

    </div>


    <!-- =================================================
         CARD LOGIN
         KANAN
    ================================================== -->

    <div class="login-card">


        <!-- =================================================
             HEADER
        ================================================== -->

        <div class="login-header">

            <h2>
                Selamat Datang
            </h2>

            <p>
                Silakan login untuk melanjutkan.
            </p>

        </div>


        <!-- =================================================
             PESAN ERROR
        ================================================== -->

        <?php if (session()->getFlashdata('error')) : ?>

            <div class="alert alert-danger">

                <?= esc(
                    session()->getFlashdata('error')
                ) ?>

            </div>

        <?php endif; ?>


        <!-- =================================================
             PESAN SUKSES
        ================================================== -->

        <?php if (session()->getFlashdata('success')) : ?>

            <div class="alert alert-success">

                <?= esc(
                    session()->getFlashdata('success')
                ) ?>

            </div>

        <?php endif; ?>


        <!-- =================================================
             FORM LOGIN
        ================================================== -->

        <form
            action="<?= base_url('login') ?>"
            method="post"
        >

            <?= csrf_field() ?>


            <!-- USERNAME -->

            <div class="form-group">

                <label for="login_username">

                    Username

                    <span class="required">
                        *
                    </span>

                </label>


                <input
                    type="text"
                    id="login_username"
                    name="username"
                    class="form-control"
                    placeholder="Masukkan username"
                    value="<?= old('username') ?>"
                    required
                    autofocus
                >

            </div>


            <!-- PASSWORD -->

            <div class="form-group">

                <label for="login_password">

                    Password

                    <span class="required">
                        *
                    </span>

                </label>


                <div class="password-wrapper">

                    <input
                        type="password"
                        id="login_password"
                        name="password"
                        class="form-control"
                        placeholder="Masukkan password"
                        required
                    >

                    <button
                        type="button"
                        class="btn-toggle-password"
                        onclick="togglePassword()"
                        aria-label="Tampilkan password"
                    >
                        <i class="bi bi-eye" id="togglePasswordIcon"></i>
                    </button>

                </div>

            </div>


            <!-- BUTTON -->

            <button
                type="submit"
                class="btn-login"
            >
                Masuk ke Dashboard
            </button>

        </form>


        <!-- =================================================
             FOOTER
        ================================================== -->

        <div class="footer-login">

            <strong>
                ● Bandung Kota Sehat
            </strong>

            <br>

            Sistem Informasi Kelembagaan

            <span class="footer-login-copyright">
                version 1 by:DnA
            </span>

        </div>


    </div>

</div>


<!-- =====================================================
     JAVASCRIPT
====================================================== -->

<script>

function togglePassword()
{

    var input =
        document.getElementById('login_password');


    var icon =
        document.getElementById('togglePasswordIcon');


    if (input.type === 'password') {

        input.type = 'text';

        icon.classList.remove('bi-eye');

        icon.classList.add('bi-eye-slash');

    } else {

        input.type = 'password';

        icon.classList.remove('bi-eye-slash');

        icon.classList.add('bi-eye');

    }

}

</script>


</body>

</html>