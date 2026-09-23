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
            #f2faff 0%,
            #e5f4ff 55%,
            #dcefff 100%
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
        background: #ffffff;
        border: 1px solid #e0ebf5;
        border-radius: 15px;
        padding: 28px;
        box-shadow: 0 8px 24px rgba(27, 71, 112, .07);
        max-width: 850px;
    }

    .form-title {
        margin: 0 0 25px;
        color: #163f67;
        font-size: 21px;
        font-weight: 800;
    }

    .form-group {
        margin-bottom: 20px;
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
        border: 1px solid #d5e4ef;
        border-radius: 9px;
        padding: 12px 14px;
        color: #3f5e78;
        font-size: 14px;
        outline: none;
        box-sizing: border-box;
    }

    .form-control-custom:focus {
        border-color: #087df5;
        box-shadow: 0 0 0 3px rgba(8, 125, 245, .1);
    }

    textarea.form-control-custom {
        min-height: 110px;
        resize: vertical;
    }

    .file-info {
        margin-top: 8px;
        color: #7890aa;
        font-size: 13px;
        line-height: 1.6;
    }

    .existing-file {
        margin-bottom: 22px;
        padding: 15px 17px;
        border: 1px solid #d8eaf8;
        border-radius: 9px;
        background: #f3f9ff;
        color: #315b7e;
        font-size: 14px;
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
    <h1>Upload SK Forum Bandung Sehat</h1>
    <p>Tambahkan atau ganti Surat Keputusan Forum Bandung Sehat.</p>
</div>

<div class="form-card">

    <h2 class="form-title">
        <i class="bi bi-file-earmark-pdf me-2"></i>
        Form Surat Keputusan
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

    <?php if (!empty($sk)) : ?>
        <div class="existing-file">
            <i class="bi bi-info-circle me-2"></i>
            File saat ini:
            <strong><?= esc($sk['nama_asli']) ?></strong>.
            Upload file baru akan menggantikan file lama.
        </div>
    <?php endif; ?>

    <form
        action="<?= site_url('forum-bandung-sehat/sk/store') ?>"
        method="post"
        enctype="multipart/form-data"
    >
        <?= csrf_field() ?>

        <div class="form-group">
            <label class="form-label">
                Nomor SK
            </label>

            <input
                type="text"
                name="no_sk"
                class="form-control-custom"
                value="<?= old('no_sk', $sk['no_sk'] ?? '') ?>"
                placeholder="Contoh: 123/SK/FBS/2026"
                required
            >
        </div>

        <div class="form-group">
            <label class="form-label">
                Periode SK
            </label>

            <input
                type="text"
                name="periode"
                class="form-control-custom"
                value="<?= old('periode', $sk['periode'] ?? '') ?>"
                placeholder="Contoh: 2026 - 2029"
                required
            >
        </div>

        <div class="form-group">
            <label class="form-label">
                Keterangan
            </label>

            <textarea
                name="keterangan"
                class="form-control-custom"
                placeholder="Tambahkan keterangan jika diperlukan"
            ><?= old('keterangan', $sk['keterangan'] ?? '') ?></textarea>
        </div>

        <div class="form-group">
            <label class="form-label">
                File SK PDF
            </label>

            <input
                type="file"
                name="file_sk"
                class="form-control-custom"
                accept=".pdf,application/pdf"
                required
            >

            <div class="file-info">
                Format wajib PDF dan ukuran maksimal 5 MB.
                Jika sudah ada file sebelumnya, file baru akan menggantikannya.
            </div>
        </div>

        <div class="form-actions">
            <a
                href="<?= site_url('forum-bandung-sehat/sk') ?>"
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
                Simpan SK
            </button>
        </div>

    </form>

</div>

<?= $this->endSection() ?>