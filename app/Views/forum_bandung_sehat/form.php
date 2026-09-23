<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title><?= esc($title) ?></title>

    <style>

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f7fb;
        }

        .container {
            max-width: 750px;
            margin: 40px auto;
            padding: 20px;
        }

        .box {
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            margin-top: 0;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 7px;
        }

        input,
        textarea {
            width: 100%;
            padding: 11px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        textarea {
            min-height: 100px;
        }

        button,
        .btn {
            padding: 11px 18px;
            border: 0;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
        }

        button {
            background: #172033;
            color: white;
        }

        .cancel {
            background: #ddd;
            color: #111;
        }

    </style>

</head>

<body>

<div class="container">

    <div class="box">

        <h1><?= esc($title) ?></h1>

        <form method="post"
              action="<?= esc($action) ?>">

            <?= csrf_field() ?>

            <div class="form-group">

                <label>
                    Nama Kegiatan
                </label>

                <input
                    type="text"
                    name="nama_kegiatan"
                    placeholder="Contoh: Rapat Forum Bandung Sehat"
                    required>

            </div>

            <div class="form-group">

                <label>
                    Tahun
                </label>

                <input
                    type="number"
                    name="tahun"
                    min="2000"
                    max="2100"
                    placeholder="Contoh: 2024">

            </div>

            <div class="form-group">

                <label>
                    Tanggal
                </label>

                <input
                    type="date"
                    name="tanggal">

            </div>

            <div class="form-group">

                <label>
                    Lokasi
                </label>

                <input
                    type="text"
                    name="lokasi"
                    placeholder="Contoh: Kota Bandung">

            </div>

            <div class="form-group">

                <label>
                    Keterangan
                </label>

                <textarea
                    name="keterangan"
                    placeholder="Masukkan keterangan"></textarea>

            </div>

            <button type="submit">
                Simpan Data
            </button>

            <a
                href="<?= site_url('forum-bandung-sehat') ?>"
                class="btn cancel">
                Batal
            </a>

        </form>

    </div>

</div>

</body>

</html>