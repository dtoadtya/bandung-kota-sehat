<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .page-banner {
        position: relative;
        min-height: 150px;
        margin-bottom: 28px;
        padding: 28px 28px 26px 58px;
        border-radius: 14px;
        overflow: hidden;
        background: linear-gradient(
            135deg,
            #f2faff,
            #e5f4ff,
            #dcefff
        );
        border: 1px solid #d5eafa;
    }

    .page-banner::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 9px;
        background: linear-gradient(
            180deg,
            #087df5,
            #f0b429
        );
    }

    .page-banner h1 {
        margin: 0 0 7px;
        color: #063b78;
        font-size: 34px;
        font-weight: 800;
    }

    .page-banner p {
        margin: 0;
        color: #3c6388;
        font-size: 17px;
    }

    .form-card {
        max-width: 850px;
        background: #ffffff;
        border: 1px solid #e0ebf5;
        border-radius: 15px;
        padding: 28px;
        box-shadow: 0 8px 24px rgba(27, 71, 112, .07);
    }

    .form-card h2 {
        margin: 0 0 25px;
        color: #163f67;
        font-size: 21px;
        font-weight: 800;
    }

    .form-group {
        margin-bottom: 21px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        color: #315b7e;
        font-size: 14px;
        font-weight: 700;
    }

    .form-control-custom {
        width: 100%;
        box-sizing: border-box;
        padding: 12px 14px;
        border: 1px solid #d5e4ef;
        border-radius: 9px;
        color: #3f5e78;
        font-size: 14px;
        outline: none;
    }

    .form-control-custom:focus {
        border-color: #087df5;
        box-shadow: 0 0 0 3px rgba(8, 125, 245, .1);
    }

    textarea.form-control-custom {
        min-height: 230px;
        resize: vertical;
    }

    .form-help {
        margin-top: 8px;
        color: #7890aa;
        font-size: 13px;
    }

    .form-actions {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 28px;
    }

    .btn-custom {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: none;
        border-radius: 9px;
        padding: 11px 18px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 700;
        cursor: pointer;
    }

    .btn-primary-custom {
        background: #087df5;
        color: #ffffff;
    }

    .btn-primary-custom:hover {
        background: #0568cc;
        color: #ffffff;
    }

    .btn-secondary-custom {
        background: #edf5fb;
        color: #315b7e;
    }

    .btn-secondary-custom:hover {
        background: #dcecf8;
        color: #174d78;
    }
</style>

<div class="page-banner">
    <h1>Edit Rencana Kerja</h1>
    <p>Perbarui rencana kerja Forum Bandung Sehat.</p>
</div>

<div class="form-card">

    <h2>
        <i class="bi bi-pencil-square me-2"></i>
        Edit Rencana Kerja
    </h2>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>

    <?php $errors = session()->getFlashdata('errors'); ?>

    <?php if (!empty($errors) && is_array($errors)) : ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach ($errors as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form
        action="<?= site_url('forum-bandung-sehat/rencana-kerja/update/' . $data['id']) ?>"
        method="post"
    >
        <?= csrf_field() ?>

        <div class="form-group">
            <label class="form-label">
                Tahun
            </label>

            <input
                type="number"
                name="tahun"
                class="form-control-custom"
                value="<?= old('tahun', $data['tahun']) ?>"
                min="2000"
                max="2100"
                required
            >

            <div class="form-help">
                Tahun harus berupa 4 angka, contoh 2026.
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">
                Rencana Kerja
            </label>

            <textarea
                name="data_rencana"
                class="form-control-custom"
                required
            ><?= old('data_rencana', $data['data_rencana']) ?></textarea>
        </div>

        <div class="form-actions">
            <a
                href="<?= site_url('forum-bandung-sehat/rencana-kerja') ?>"
                class="btn-custom btn-secondary-custom"
            >
                <i class="bi bi-arrow-left"></i>
                Kembali
            </a>

            <button
                type="submit"
                class="btn-custom btn-primary-custom"
            >
                <i class="bi bi-save"></i>
                Simpan Perubahan
            </button>
        </div>

    </form>

</div>

<?= $this->endSection() ?>