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
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            color: #243447;
        }

        .container {
            max-width: 900px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .header {
            background: #0b4f9c;
            color: white;
            padding: 22px 25px;
            border-radius: 12px 12px 0 0;
        }

        .header h1 {
            margin: 0 0 7px;
            font-size: 24px;
        }

        .header p {
            margin: 0;
            font-size: 14px;
            opacity: .9;
        }

        .card {
            background: white;
            padding: 28px;
            border-radius: 0 0 12px 12px;
            border: 1px solid #e5eaf0;
        }

        .form-group {
            margin-bottom: 19px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .required {
            color: #d9534f;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 11px 13px;
            border: 1px solid #d7dee8;
            border-radius: 7px;
            font-family: inherit;
            font-size: 14px;
            outline: none;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #0b4f9c;
            box-shadow: 0 0 0 2px rgba(11,79,156,.08);
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        .buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            border: none;
            text-decoration: none;
            padding: 11px 18px;
            border-radius: 7px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-back {
            background: #edf1f5;
            color: #243447;
        }

        .btn-save {
            background: #0b4f9c;
            color: white;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 7px;
            margin-bottom: 20px;
            background: #fdeaea;
            color: #a83232;
            border: 1px solid #f2c0c0;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Edit Rencana Kerja</h1>
        <p>Pokja Kelurahan Sehat</p>
    </div>

    <div class="card">

        <?php if (session()->getFlashdata('error')): ?>

            <div class="alert">
                <?= esc(session()->getFlashdata('error')) ?>
            </div>

        <?php endif; ?>


        <form
            action="<?= base_url('pokja-kelurahan-sehat/rencana-kerja/update/' . $data['id']) ?>"
            method="post"
        >

            <?= csrf_field() ?>


            <div class="form-group">

                <label>
                    Kecamatan / Kelurahan
                    <span class="required">*</span>
                </label>

                <select name="kelurahan_id" required>

                    <option value="">
                        -- Pilih Kelurahan --
                    </option>

                    <?php foreach ($kelurahanList as $kelurahan): ?>

                        <option
                            value="<?= esc($kelurahan['id']) ?>"
                            <?= $data['kelurahan_id'] == $kelurahan['id'] ? 'selected' : '' ?>
                        >
                            <?= esc($kelurahan['nama_kecamatan']) ?>
                            -
                            <?= esc($kelurahan['nama_kelurahan']) ?>
                        </option>

                    <?php endforeach; ?>

                </select>

            </div>


            <div class="form-group">

                <label>
                    Nama Kegiatan
                    <span class="required">*</span>
                </label>

                <input
                    type="text"
                    name="nama_kegiatan"
                    value="<?= esc($data['nama_kegiatan']) ?>"
                    required
                >

            </div>


            <div class="form-group">

                <label>
                    Tahun
                    <span class="required">*</span>
                </label>

                <input
                    type="number"
                    name="tahun"
                    value="<?= esc($data['tahun']) ?>"
                    min="2000"
                    max="2100"
                    required
                >

            </div>


            <div class="form-group">

                <label>
                    Tanggal
                </label>

                <input
                    type="date"
                    name="tanggal"
                    value="<?= esc($data['tanggal'] ?? '') ?>"
                >

            </div>


            <div class="form-group">

                <label>
                    Lokasi
                </label>

                <input
                    type="text"
                    name="lokasi"
                    value="<?= esc($data['lokasi'] ?? '') ?>"
                >

            </div>


            <div class="form-group">

                <label>
                    Keterangan
                </label>

                <textarea name="keterangan"><?= esc($data['keterangan'] ?? '') ?></textarea>

            </div>


            <div class="buttons">

                <a
                    href="<?= base_url('pokja-kelurahan-sehat/rencana-kerja') ?>"
                    class="btn btn-back">
                    Kembali
                </a>

                <button
                    type="submit"
                    class="btn btn-save">
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>