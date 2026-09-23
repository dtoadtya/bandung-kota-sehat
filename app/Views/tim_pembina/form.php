<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title><?= esc($title) ?></title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
        }

        .container {
            max-width: 750px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .box {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
        }

        h1 {
            margin-top: 0;
            color: #172033;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 11px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .buttons {
            margin-top: 25px;
        }

        button,
        .btn {
            display: inline-block;
            padding: 11px 18px;
            border: 0;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        button {
            background: #172033;
            color: white;
        }

        .btn-cancel {
            background: #e5e7eb;
            color: #1f2937;
            margin-left: 8px;
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

                <label for="nama">
                    Nama
                </label>

                <input
                    type="text"
                    id="nama"
                    name="nama"
                    placeholder="Masukkan nama"
                    required>

            </div>

            <div class="form-group">

                <label for="jabatan">
                    Jabatan
                </label>

                <input
                    type="text"
                    id="jabatan"
                    name="jabatan"
                    placeholder="Contoh: Ketua">

            </div>

            <div class="form-group">

                <label for="instansi">
                    Instansi
                </label>

                <input
                    type="text"
                    id="instansi"
                    name="instansi"
                    placeholder="Contoh: Pemerintah Kota Bandung">

            </div>

            <div class="form-group">

                <label for="tahun">
                    Tahun
                </label>

                <input
                    type="number"
                    id="tahun"
                    name="tahun"
                    min="2000"
                    max="2100"
                    placeholder="Contoh: 2024">

            </div>

            <div class="form-group">

                <label for="keterangan">
                    Keterangan
                </label>

                <textarea
                    id="keterangan"
                    name="keterangan"
                    placeholder="Masukkan keterangan"></textarea>

            </div>

            <div class="buttons">

                <button type="submit">
                    Simpan Data
                </button>

                <a
                    href="<?= site_url('tim-pembina') ?>"
                    class="btn btn-cancel">
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>

</body>

</html>