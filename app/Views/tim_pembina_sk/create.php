<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .page-wrapper {
        background: #f4f8fc;
        min-height: calc(100vh - 70px);
        padding: 28px;
    }

    /* ================================
       HEADER
    ================================= */

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

    /* ================================
       FORM CARD
    ================================= */

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
        width: 44px;
        height: 44px;
        border-radius: 10px;
        background: #e7f3ff;
        color: #087ff5;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
        flex-shrink: 0;
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

    /* ================================
       FORM
    ================================= */

    .form-group {
        margin-bottom: 20px;
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

    .form-help {
        display: block;
        margin-top: 6px;
        color: #7992ad;
        font-size: 11px;
    }

    /* ================================
       FILE INPUT
    ================================= */

    .file-box {
        border: 1px dashed #b9d3ea;
        border-radius: 10px;
        background: #f8fbfe;
        padding: 16px;
    }

    .file-box input[type="file"] {
        border: none;
        padding: 0;
        background: transparent;
    }

    .file-box input[type="file"]:focus {
        box-shadow: none;
    }

    /* ================================
       ACTION
    ================================= */

    .form-actions {
        display: flex;
        gap: 10px;
        margin-top: 10px;
        padding-top: 20px;
        border-top: 1px solid #edf2f7;
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

    /* ================================
       ALERT
    ================================= */

    .alert-error {
        background: #fff1f1;
        color: #a33a37;
        border: 1px solid #f1c8c7;
        padding: 12px 15px;
        border-radius: 8px;
        margin-bottom: 18px;
        font-size: 13px;
    }

    .error-list {
        margin: 6px 0 0 18px;
        padding: 0;
    }

    /* ================================
       RESPONSIVE
    ================================= */

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
            padding: 9px 13px;
        }

        .form-body {
            padding: 20px;
        }

        .form-header {
            padding: 18px;
        }
    }
</style>


<div class="page-wrapper">

    <!-- =====================================================
         HEADER
    ====================================================== -->

    <div class="page-header">

        <a href="<?= base_url('tim-pembina/sk') ?>"
           class="btn-kembali">
            ← &nbsp;Kembali
        </a>

        <h1>
            Tambah SK Tim Pembina
        </h1>

        <p>
            Input Surat Keputusan Tim Pembina Bandung Sehat.
        </p>

    </div>


    <!-- =====================================================
         VALIDATION ERROR
    ====================================================== -->

    <?php if (session()->getFlashdata('error')): ?>

        <div class="alert-error">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>

    <?php endif; ?>


    <?php if (isset($validation) && $validation->getErrors()): ?>

        <div class="alert-error">

            <strong>
                Data belum dapat disimpan.
            </strong>

            <ul class="error-list">

                <?php foreach ($validation->getErrors() as $error): ?>

                    <li>
                        <?= esc($error) ?>
                    </li>

                <?php endforeach; ?>

            </ul>

        </div>

    <?php endif; ?>


    <!-- =====================================================
         FORM CARD
    ====================================================== -->

    <div class="form-card">

        <div class="form-header">

            <div class="form-icon">
                ▣
            </div>

            <div>

                <h2>
                    Form SK Tim Pembina
                </h2>

                <p>
                    Silakan lengkapi data Surat Keputusan Tim Pembina.
                </p>

            </div>

        </div>


        <div class="form-body">

            <form
                action="<?= base_url('tim-pembina/sk/store') ?>"
                method="post"
                enctype="multipart/form-data"
            >

                <?= csrf_field() ?>


                <!-- =========================================
                     NOMOR SK
                ========================================== -->

                <div class="form-group">

                    <label>
                        Nomor Surat Keputusan
                        <span>*</span>
                    </label>

                    <input
                        type="text"
                        name="no_sk"
                        value="<?= old('no_sk') ?>"
                        placeholder="Masukkan nomor Surat Keputusan"
                        required
                    >

                    <small class="form-help">
                        Contoh: 123/Kep/BS/2026
                    </small>

                </div>


                <!-- =========================================
                     PERIODE
                ========================================== -->

                <div class="form-group">

                    <label>
                        Periode
                        <span>*</span>
                    </label>

                    <input
                        type="text"
                        name="periode"
                        value="<?= old('periode') ?>"
                        placeholder="Contoh: 2024 - 2027"
                        required
                    >

                    <small class="form-help">
                        Masukkan periode berlakunya Surat Keputusan.
                    </small>

                </div>


                <!-- =========================================
                     KETERANGAN
                ========================================== -->

                <div class="form-group">

                    <label>
                        Keterangan
                    </label>

                    <textarea
                        name="keterangan"
                        placeholder="Masukkan keterangan Surat Keputusan..."
                    ><?= old('keterangan') ?></textarea>

                    <small class="form-help">
                        Tambahkan informasi tambahan mengenai SK jika diperlukan.
                    </small>

                </div>


                <!-- =========================================
                     BERKAS
                ========================================== -->

                <div class="form-group">

                    <label>
                        Berkas Surat Keputusan
                        <span>*</span>
                    </label>

                    <div class="file-box">

                        <input
                            type="file"
                            name="file"
                            accept=".pdf,application/pdf"
                            required
                        >

                    </div>

                    <small class="form-help">
                        Format berkas yang diperbolehkan: PDF.
                    </small>

                </div>


                <!-- =========================================
                     ACTION
                ========================================== -->

                <div class="form-actions">

                    <button
                        type="submit"
                        class="btn-simpan"
                    >
                        ✓ &nbsp;Simpan Data
                    </button>

                    <a
                        href="<?= base_url('tim-pembina/sk') ?>"
                        class="btn-batal"
                    >
                        Batal
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>


<?= $this->endSection() ?>