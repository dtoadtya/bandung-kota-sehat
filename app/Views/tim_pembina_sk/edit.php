<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .page-wrapper {
        background: #f4f8fc;
        min-height: calc(100vh - 70px);
        padding: 28px;
    }

    .page-header {
        background: linear-gradient(135deg, #eef7ff, #e5f2ff);
        border-left: 6px solid #1687e8;
        border-radius: 14px;
        padding: 28px 30px;
        margin-bottom: 24px;
        position: relative;
        overflow: hidden;
    }

    .page-header::after {
        content: "";
        position: absolute;
        width: 150px;
        height: 150px;
        right: -40px;
        top: -70px;
        background: rgba(22, 135, 232, 0.08);
        border-radius: 50%;
    }

    .page-header h1 {
        margin: 0 0 8px;
        color: #07366d;
        font-size: 30px;
        font-weight: 800;
    }

    .page-header p {
        margin: 0;
        color: #5d7898;
        font-size: 14px;
    }

    .btn-kembali {
        position: absolute;
        right: 28px;
        top: 25px;
        z-index: 2;
        text-decoration: none;
        background: #fff;
        color: #0b4f9c;
        border: 1px solid #cbdff2;
        border-radius: 8px;
        padding: 11px 18px;
        font-size: 13px;
        font-weight: 600;
    }

    .btn-kembali:hover {
        background: #eef7ff;
    }

    .form-card {
        background: #fff;
        border: 1px solid #d8e7f5;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 3px 12px rgba(22, 82, 130, 0.05);
    }

    .form-header {
        padding: 22px 28px;
        border-bottom: 1px solid #e2ebf4;
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .form-icon {
        width: 42px;
        height: 42px;
        border-radius: 10px;
        background: #e7f3ff;
        color: #087ff5;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    .form-header h2 {
        margin: 0;
        color: #07366d;
        font-size: 20px;
        font-weight: 800;
    }

    .form-header p {
        margin: 4px 0 0;
        color: #6d87a4;
        font-size: 12px;
    }

    .form-body {
        padding: 28px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #174b7e;
        font-size: 13px;
        font-weight: 700;
    }

    label span {
        color: #e53935;
    }

    input,
    textarea {
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #c8dceb;
        border-radius: 8px;
        padding: 12px 13px;
        color: #34495e;
        background: #fff;
        font-family: inherit;
        font-size: 13px;
        outline: none;
        transition: .2s;
    }

    input:focus,
    textarea:focus {
        border-color: #1687e8;
        box-shadow: 0 0 0 3px rgba(22, 135, 232, 0.10);
    }

    textarea {
        min-height: 110px;
        resize: vertical;
    }

    .file-lama {
        background: #f5f9fd;
        border: 1px solid #dce9f4;
        border-radius: 8px;
        padding: 13px 15px;
        margin-bottom: 10px;
        color: #526b84;
        font-size: 13px;
    }

    .file-lama strong {
        color: #07366d;
    }

    .form-help {
        display: block;
        margin-top: 6px;
        color: #7992ad;
        font-size: 11px;
    }

    .form-actions {
        display: flex;
        gap: 10px;
        margin-top: 24px;
    }

    .btn-simpan {
        border: none;
        background: #087ff5;
        color: #fff;
        padding: 11px 20px;
        border-radius: 7px;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
    }

    .btn-simpan:hover {
        background: #066fd6;
    }

    .btn-batal {
        text-decoration: none;
        background: #fff;
        color: #526b84;
        border: 1px solid #cbd9e5;
        padding: 10px 20px;
        border-radius: 7px;
        font-size: 13px;
        font-weight: 600;
    }

    .btn-batal:hover {
        background: #f4f8fc;
    }

    @media (max-width: 768px) {
        .page-wrapper {
            padding: 15px;
        }

        .page-header {
            padding: 22px;
        }

        .page-header h1 {
            font-size: 23px;
            padding-right: 90px;
        }

        .btn-kembali {
            right: 18px;
            top: 20px;
        }
    }
</style>

<div class="page-wrapper">

    <div class="page-header">

        <a href="<?= base_url('tim-pembina/sk') ?>"
           class="btn-kembali">
            ← &nbsp;Kembali
        </a>

        <h1>
            Edit SK Tim Pembina
        </h1>

        <p>
            Perbarui data dan berkas Surat Keputusan Tim Pembina.
        </p>

    </div>

    <div class="form-card">

        <div class="form-header">

            <div class="form-icon">
                ✎
            </div>

            <div>
                <h2>
                    Form Edit SK Tim Pembina
                </h2>

                <p>
                    Silakan ubah data SK yang diperlukan.
                </p>
            </div>

        </div>

        <div class="form-body">

            <form action="<?= base_url('tim-pembina/sk/update/' . $data['id']) ?>"
                  method="post"
                  enctype="multipart/form-data">

                <?= csrf_field() ?>

                <div class="form-group">

                    <label>
                        Nomor Surat Keputusan <span>*</span>
                    </label>

                    <input
                        type="text"
                        name="no_sk"
                        value="<?= esc($data['no_sk'] ?? '') ?>"
                        placeholder="Masukkan nomor SK"
                        required
                    >

                </div>

                <div class="form-group">

                    <label>
                        Periode <span>*</span>
                    </label>

                    <input
                        type="text"
                        name="periode"
                        value="<?= esc($data['periode'] ?? '') ?>"
                        placeholder="Contoh: 2026-2029"
                        required
                    >

                </div>

                <div class="form-group">

                    <label>
                        Keterangan
                    </label>

                    <textarea
                        name="keterangan"
                        placeholder="Masukkan keterangan SK..."
                    ><?= esc($data['keterangan'] ?? '') ?></textarea>

                </div>

                <div class="form-group">

                    <label>
                        Berkas SK Saat Ini
                    </label>

                    <div class="file-lama">

                        📄

                        <strong>
                            <?= esc($data['nama_asli'] ?? $data['nama_file'] ?? '-') ?>
                        </strong>

                    </div>

                </div>

                <div class="form-group">

                    <label>
                        Ganti Berkas SK
                    </label>

                    <input
                        type="file"
                        name="file"
                        accept="application/pdf,.pdf"
                    >

                    <small class="form-help">
                        Kosongkan jika tidak ingin mengganti berkas PDF.
                        Maksimal 10 MB.
                    </small>

                </div>

                <div class="form-actions">

                    <button type="submit"
                            class="btn-simpan">
                        ✓ &nbsp;Simpan Perubahan
                    </button>

                    <a href="<?= base_url('tim-pembina/sk') ?>"
                       class="btn-batal">
                        Batal
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

<?= $this->endSection() ?>