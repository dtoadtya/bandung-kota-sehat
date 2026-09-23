<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title><?= esc($title ?? 'Buat Akun - Bandung Sehat') ?></title>


    <style>

        :root {
            --blue: #0b4f9c;
            --blue-dark: #07366d;
            --blue-light: #eaf3ff;
            --gold: #f2b705;
            --green: #159957;
            --red: #d9534f;
            --bg: #f4f7fb;
            --text: #243447;
            --muted: #718096;
            --border: #e5eaf0;
        }


        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }


        body {

            min-height: 100vh;

            display: flex;

            justify-content: center;

            align-items: center;

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background:
                radial-gradient(
                    circle at 15% 80%,
                    rgba(255,255,255,.9),
                    transparent 35%
                ),
                radial-gradient(
                    circle at 85% 15%,
                    rgba(255,255,255,.8),
                    transparent 35%
                ),
                linear-gradient(
                    180deg,
                    #8fd0ee,
                    #c5eaf8 50%,
                    #eef9fd
                );

            padding: 30px;
        }


        .wrapper {

            width: 100%;

            max-width: 470px;
        }


        /* BRAND */

        .brand {

            display: flex;

            align-items: center;

            gap: 10px;

            margin-bottom: 20px;
        }


        .brand-logo {

            width: 42px;

            height: 42px;

            display: flex;

            justify-content: center;

            align-items: center;

            border-radius: 10px;

            background: white;

            color: var(--blue);

            font-size: 18px;

            font-weight: bold;

            box-shadow:
                0 8px 20px
                rgba(7,54,109,.12);
        }


        .brand-name {

            font-size: 18px;

            font-weight: 700;

            color: var(--text);
        }


        /* CARD */

        .card {

            padding: 35px;

            border-radius: 25px;

            background:
                rgba(255,255,255,.72);

            border:
                1px solid
                rgba(255,255,255,.9);

            box-shadow:
                0 25px 60px
                rgba(7,54,109,.16);

            backdrop-filter: blur(18px);

            -webkit-backdrop-filter: blur(18px);
        }


        .icon {

            width: 55px;

            height: 55px;

            margin: 0 auto 18px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 16px;

            background: white;

            color: var(--blue);

            font-size: 24px;

            box-shadow:
                0 8px 20px
                rgba(7,54,109,.08);
        }


        h1 {

            text-align: center;

            color: var(--text);

            font-size: 28px;

            margin-bottom: 8px;
        }


        .subtitle {

            text-align: center;

            color: var(--muted);

            font-size: 14px;

            line-height: 1.5;

            margin-bottom: 25px;
        }


        /* ALERT */

        .alert {

            padding: 12px 14px;

            border-radius: 10px;

            margin-bottom: 18px;

            font-size: 13px;
        }


        .alert-danger {

            color: #a94442;

            background: #fff0ef;

            border: 1px solid #f4c7c5;
        }


        /* FORM */

        .form-group {

            margin-bottom: 17px;
        }


        label {

            display: block;

            margin-bottom: 7px;

            font-size: 14px;

            font-weight: 600;

            color: var(--text);
        }


        .input-wrapper {

            position: relative;
        }


        .input-icon {

            position: absolute;

            left: 14px;

            top: 50%;

            transform:
                translateY(-50%);

            font-size: 16px;

            color: #718096;
        }


        input {

            width: 100%;

            height: 48px;

            padding:
                0 15px 0 43px;

            border:
                1px solid
                var(--border);

            border-radius: 11px;

            background:
                rgba(255,255,255,.75);

            outline: none;

            font-size: 14px;

            color: var(--text);
        }


        input:focus {

            border-color: var(--blue);

            background: white;

            box-shadow:
                0 0 0 3px
                rgba(11,79,156,.10);
        }


        /* BUTTON */

        .btn {

            width: 100%;

            height: 50px;

            margin-top: 8px;

            border: none;

            border-radius: 11px;

            background: var(--blue);

            color: white;

            font-size: 15px;

            font-weight: 700;

            cursor: pointer;

            transition: .2s;
        }


        .btn:hover {

            background: var(--blue-dark);

            transform:
                translateY(-1px);
        }


        /* LOGIN LINK */

        .login-link {

            text-align: center;

            margin-top: 22px;

            font-size: 14px;

            color: var(--muted);
        }


        .login-link a {

            color: var(--blue);

            font-weight: 700;

            text-decoration: none;
        }


        .login-link a:hover {

            text-decoration: underline;
        }


        /* FOOTER */

        .footer {

            text-align: center;

            margin-top: 22px;

            color: var(--muted);

            font-size: 13px;
        }


        .dot {

            display: inline-block;

            width: 7px;

            height: 7px;

            border-radius: 50%;

            background: var(--gold);

            margin-right: 5px;
        }


        .footer strong {

            color: var(--blue);
        }


        @media(max-width:600px) {

            body {
                padding: 20px;
            }

            .card {
                padding: 27px 22px;
            }

            h1 {
                font-size: 25px;
            }
        }

    </style>

</head>


<body>


<div class="wrapper">


    <!-- BRAND -->

    <div class="brand">

        <div class="brand-logo">
            BS
        </div>

        <div class="brand-name">
            Bandung Sehat
        </div>

    </div>


    <!-- CARD -->

    <div class="card">


        <div class="icon">
            ✦
        </div>


        <h1>
            Buat Akun
        </h1>


        <p class="subtitle">

            Daftarkan akun untuk mengakses<br>

            Sistem Informasi Kelembagaan Bandung Sehat.

        </p>


        <!-- ERROR -->

        <?php if (session()->getFlashdata('error')): ?>

            <div class="alert alert-danger">

                <?= esc(
                    session()->getFlashdata('error')
                ) ?>

            </div>

        <?php endif; ?>


        <!-- FORM -->

        <form
            action="<?= base_url('register') ?>"
            method="post"
        >

            <?= csrf_field() ?>


            <!-- USERNAME -->

            <div class="form-group">

                <label>
                    Username
                </label>

                <div class="input-wrapper">

                    <span class="input-icon">
                        👤
                    </span>

                    <input
                        type="text"
                        name="username"
                        placeholder="Buat username"
                        value="<?= old('username') ?>"
                        autocomplete="username"
                        required
                    >

                </div>

            </div>


            <!-- PASSWORD -->

            <div class="form-group">

                <label>
                    Password
                </label>

                <div class="input-wrapper">

                    <span class="input-icon">
                        🔒
                    </span>

                    <input
                        type="password"
                        name="password"
                        placeholder="Buat password"
                        autocomplete="new-password"
                        required
                    >

                </div>

            </div>


            <!-- KONFIRMASI -->

            <div class="form-group">

                <label>
                    Konfirmasi Password
                </label>

                <div class="input-wrapper">

                    <span class="input-icon">
                        🔐
                    </span>

                    <input
                        type="password"
                        name="password_confirm"
                        placeholder="Ulangi password"
                        autocomplete="new-password"
                        required
                    >

                </div>

            </div>


            <!-- BUTTON -->

            <button
                type="submit"
                class="btn"
            >
                Buat Akun
            </button>


        </form>


        <!-- LINK LOGIN -->

        <div class="login-link">

            Sudah memiliki akun?

            <a href="<?= base_url('login') ?>">
                Login di sini
            </a>

        </div>


        <!-- FOOTER -->

        <div class="footer">

            <span class="dot"></span>

            <strong>
                Bandung Sehat
            </strong>

            <br>

            Sistem Informasi Kelembagaan

        </div>


    </div>

</div>


</body>

</html>