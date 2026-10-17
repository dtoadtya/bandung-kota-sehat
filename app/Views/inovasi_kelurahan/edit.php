<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .page-header {
        margin-bottom: 20px;
    }

    .page-header h1 {
        color: #07366d;
        font-size: 26px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .page-header p {
        color: #718096;
        font-size: 13px;
    }

    .form-card {
        background: white;
        border-radius: 14px;
        border: 1px solid #e5eaf0;
        box-shadow: 0 4px 15px rgba(0,0,0,.04);
        overflow: hidden;
    }

    .form-header {
        padding: 22px;
        background: linear-gradient(135deg, #eaf3ff, #f7fbff);
        border-bottom: 1px solid #e5eaf0;
    }

    .form-header h2 {
        color: #07366d;
        font-size: 20px;
        margin: 0 0 5px;
    }

    .form-header p {
        color: #718096;
        font-size: 13px;
        margin: 0;
    }

    .form-body {
        padding: 25px;
    }

    .form-group {
        margin-bottom: 19px;
    }

    label {
        display: block;
        color: #243447;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 7px;
    }

    .required {
        color: #d9534f;
    }

    input,
    select,
    textarea {
        width: 100%;
        border: 1px solid #dce3eb;
        border-radius: 8px;
        padding: 11px 13px;
        font-family: inherit;
        font-size: 13px;
        color: #243447;
        background: white;
    }

    textarea {
        min-height: 120px;
        resize: vertical;
    }

    input:focus,
    select:focus,
    textarea:focus {
        outline: none;
        border-color: #0b4f9c;
        box-shadow: 0 0 0 3px rgba(11,79,156,.08);
    }

    .form-actions {
        display: flex;
        gap: 10px;
        margin-top: 25px;
    }

    .btn-save {
        background: #0b4f9c;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 11px 18px;
        font-weight: 700;
        cursor: pointer;
    }

    .btn-cancel {
        background: #f4f7fb;
        color: #243447;
        border: 1px solid #dce3eb;
        border-radius: 8px;
        padding: 11px 18px;
        font-weight: 700;
        text-decoration: none;
    }

    .alert-error {
        background: #fdecec;
        color: #b42318;
        border: 1px solid #f3c3bd;
        border-radius: 8px;
        padding: 12px 15px;
        margin-bottom: 18px;
    }
</style>

<div class="page-header">

    <h1>Edit Inovasi Kelurahan</h1>

    <p>
        Perbarui data inovasi Kelurahan.
    </p>

</div>


<div class="form-card">

    <div class="form-header">

        <h2>Form Edit Inovasi Kelurahan</h2>

        <p>
            Perbarui informasi inovasi Kelurahan.
        </p>

    </div>


    <div class="form-body">

        <?php if (session()->getFlashdata('errors')): ?>

            <div class="alert-error">

                <strong>
                    Periksa kembali data berikut:
                </strong>

                <ul>

                    <?php foreach (session()->getFlashdata('errors') as $error): ?>

                        <li>
                            <?= esc($error) ?>
                        </li>

                    <?php endforeach; ?>

                </ul>

            </div>

        <?php endif; ?>


        <form
            action="<?= site_url('inovasi/kelurahan/update/' . $data['id']) ?>"
            method="post"
        >

            <?= csrf_field() ?>


            <div class="form-group">

                <label>
                    Kelurahan <span class="required">*</span>
                </label>

                <select
                    name="kelurahan_id"
                    required
                >

                    <option value="">
                        -- Pilih Kelurahan --
                    </option>

                    <?php foreach ($kelurahan as $item): ?>

                        <option
                            value="<?= esc($item['id']) ?>"
                            <?= $data['kelurahan_id'] == $item['id'] ? 'selected' : '' ?>
                        >
                            <?= esc($item['nama_kecamatan']) ?>
                            —
                            <?= esc($item['nama_kelurahan']) ?>
                        </option>

                    <?php endforeach; ?>

                </select>

            </div>


            <div class="form-group">

                <label>
                    Nama Inovasi <span class="required">*</span>
                </label>

                <input
                    type="text"
                    name="nama_inovasi"
                    value="<?= old('nama_inovasi', $data['nama_inovasi']) ?>"
                    required
                >

            </div>


            <div class="form-group">

                <label>
                    Tahun <span class="required">*</span>
                </label>

                <input
                    type="number"
                    name="tahun"
                    value="<?= old('tahun', $data['tahun']) ?>"
                    min="2000"
                    max="2100"
                    required
                >

            </div>


            <div class="form-group">

                <label>
                    Deskripsi Inovasi
                </label>

                <textarea name="deskripsi"><?= old('deskripsi', $data['deskripsi']) ?></textarea>

            </div>


            <div class="form-group">

                <label>
                    Tujuan
                </label>

                <textarea name="tujuan"><?= old('tujuan', $data['tujuan']) ?></textarea>

            </div>


            <div class="form-group">

                <label>
                    Manfaat
                </label>

                <textarea name="manfaat"><?= old('manfaat', $data['manfaat']) ?></textarea>

            </div>


            <div class="form-group">

                <label>
                    Link Data Dukung
                </label>

                <input
                    type="url"
                    name="link_data_dukung"
                    value="<?= old('link_data_dukung', $data['link_data_dukung']) ?>"
                    placeholder="https://drive.google.com/..."
                >

            </div>


            <div class="form-actions">

                <button
                    type="submit"
                    class="btn-save"
                >
                    Simpan Perubahan
                </button>

                <a
                    href="<?= site_url('inovasi/kelurahan') ?>"
                    class="btn-cancel"
                >
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>

<?= $this->endSection() ?>