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

        transition: .2s;
    }

    .btn-kembali:hover {
        background: #eef7ff;
        color: #0b4f9c;
    }


    /* ================================
       FORM CARD
    ================================= */

    .form-card {
        background: #fff;

        border: 1px solid #d8e7f5;
        border-radius: 14px;

        overflow: hidden;

        box-shadow:
            0 3px 12px rgba(22, 82, 130, 0.05);
    }


    /* ================================
       FORM HEADER
    ================================= */

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

        background: #fff7e6;
        color: #c27a00;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 20px;

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


    /* ================================
       FORM BODY
    ================================= */

    .form-body {
        padding: 28px;
    }

    .form-group {
        margin-bottom: 20px;
    }


    /* ================================
       LABEL
    ================================= */

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


    /* ================================
       INPUT
    ================================= */

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

        box-shadow:
            0 0 0 3px rgba(22, 135, 232, 0.10);
    }

    textarea {
        min-height: 115px;

        resize: vertical;
    }


    /* ================================
       CURRENT FILE
    ================================= */

    .current-file {
        display: flex;

        align-items: center;

        gap: 12px;

        padding: 13px 15px;

        margin-bottom: 12px;

        background: #f8fbfe;

        border: 1px solid #dceaf5;

        border-radius: 9px;
    }

    .current-file-icon {
        width: 38px;
        height: 38px;

        border-radius: 8px;

        background: #eef7ff;
        color: #087ff5;

        display: flex;
        align-items: center;
        justify-content: center;

        flex-shrink: 0;

        font-size: 17px;
    }

    .current-file-content {
        min-width: 0;
    }

    .current-file-title {
        display: block;

        color: #174b7e;

        font-size: 12px;
        font-weight: 700;

        margin-bottom: 3px;
    }

    .current-file-name {
        display: block;

        color: #71869b;

        font-size: 11px;

        overflow: hidden;

        text-overflow: ellipsis;

        white-space: nowrap;
    }


    /* ================================
       FILE INPUT
    ================================= */

    .file-box {
        border: 1px dashed #b9d4ec;

        background: #f8fbfe;

        border-radius: 10px;

        padding: 16px;
    }

    .file-box input[type="file"] {
        border: none;

        padding: 8px 0;

        background: transparent;
    }

    .file-box input[type="file"]:focus {
        box-shadow: none;
    }

    .file-help {
        display: block;

        margin-top: 7px;

        color: #7992ad;

        font-size: 11px;
    }


    /* ================================
       HELP TEXT
    ================================= */

    .form-help {
        display: block;

        margin-top: 6px;

        color: #7992ad;

        font-size: 11px;
    }


    /* ================================
       ACTION
    ================================= */

    .form-actions {
        display: flex;

        gap: 10px;

        margin-top: 8px;

        padding-top: 8px;
    }

    .btn-update {
        border: none;

        background: #087ff5;

        color: #fff;

        padding: 11px 20px;

        border-radius: 7px;

        font-size: 13px;
        font-weight: 700;

        cursor: pointer;

        transition: .2s;
    }

    .btn-update:hover {
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

        transition: .2s;
    }

    .btn-batal:hover {
        background: #f4f8fc;

        color: #40566d;
    }


    /* ================================
       ALERT
    ================================= */

    .alert {
        padding: 12px 15px;

        border-radius: 8px;

        margin-bottom: 18px;

        font-size: 13px;
    }

    .alert-error {
        background: #fff1f1;

        color: #a33a37;

        border: 1px solid #f1c8c7;
    }

    .alert-success {
        background: #edf9f2;

        color: #176b3c;

        border: 1px solid #c9ead7;
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

        .form-header {
            padding: 18px;
        }

        .form-body {
            padding: 20px;
        }

        .form-actions {
            flex-wrap: wrap;
        }
    }
</style>


<div class="page-wrapper">


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <div class="page-header">

        <a
            href="<?= base_url('forum-kecamatan-sehat/sk') ?>"
            class="btn-kembali"
        >
            ← &nbsp;Kembali
        </a>


        <h1>
            Edit SK Forum Kecamatan Sehat
        </h1>


        <p>
            Perbarui data Surat Keputusan Forum Kecamatan Sehat.
        </p>

    </div>


    <!-- =====================================================
         FLASH ERROR
    ====================================================== -->

    <?php if (session()->getFlashdata('error')): ?>

        <div class="alert alert-error">

            <?= session()->getFlashdata('error') ?>

        </div>

    <?php endif; ?>


    <!-- =====================================================
         FORM CARD
    ====================================================== -->

    <div class="form-card">


        <!-- FORM HEADER -->

        <div class="form-header">

            <div class="form-icon">
                ✎
            </div>

            <div>

                <h2>
                    Form Edit SK Forum Kecamatan Sehat
                </h2>

                <p>
                    Perbarui informasi Surat Keputusan dan berkas pendukung.
                </p>

            </div>

        </div>


        <!-- FORM BODY -->

        <div class="form-body">


            <form
                action="<?= base_url(
                    'forum-kecamatan-sehat/sk/update/' . $data['id']
                ) ?>"
                method="post"
                enctype="multipart/form-data"
            >

                <?= csrf_field() ?>


                <!-- =========================================
                     NOMOR SK
                ========================================== -->

                <div class="form-group">

                    <label>
                        Nomor Surat Keputusan <span>*</span>
                    </label>

                    <input
                        type="text"
                        name="no_sk"
                        value="<?= old(
                            'no_sk',
                            $data['no_sk'] ?? ''
                        ) ?>"
                        placeholder="Contoh: 123/Kep.XXX-Bag/2026"
                        required
                    >

                    <small class="form-help">
                        Masukkan nomor Surat Keputusan Forum Kecamatan Sehat.
                    </small>

                </div>


                <!-- =========================================
                     PERIODE
                ========================================== -->

                <div class="form-group">

                    <label>
                        Periode <span>*</span>
                    </label>

                    <input
                        type="text"
                        name="periode"
                        value="<?= old(
                            'periode',
                            $data['periode'] ?? ''
                        ) ?>"
                        placeholder="Contoh: 2026 - 2029"
                        required
                    >

                    <small class="form-help">
                        Masukkan periode berlaku Surat Keputusan.
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
                        placeholder="Masukkan keterangan SK apabila diperlukan..."
                    ><?= old(
                        'keterangan',
                        $data['keterangan'] ?? ''
                    ) ?></textarea>

                    <small class="form-help">
                        Keterangan tambahan mengenai Surat Keputusan.
                    </small>

                </div>


                <!-- =========================================
                     BERKAS SAAT INI
                ========================================== -->

                <div class="form-group">

                    <label>
                        Berkas Saat Ini
                    </label>


                    <?php
                    $namaFileSaatIni =
                        $data['nama_asli']
                        ?? $data['nama_file']
                        ?? null;
                    ?>


                    <?php if ($namaFileSaatIni): ?>

                        <div class="current-file">

                            <div class="current-file-icon">
                                PDF
                            </div>


                            <div class="current-file-content">

                                <span class="current-file-title">
                                    Berkas Surat Keputusan
                                </span>

                                <span class="current-file-name">
                                    <?= esc($namaFileSaatIni) ?>
                                </span>

                            </div>

                        </div>


                    <?php else: ?>

                        <div class="current-file">

                            <div class="current-file-icon">
                                PDF
                            </div>

                            <div class="current-file-content">

                                <span class="current-file-title">
                                    Belum ada berkas
                                </span>

                                <span class="current-file-name">
                                    Silakan unggah berkas PDF baru.
                                </span>

                            </div>

                        </div>

                    <?php endif; ?>


                </div>


                <!-- =========================================
                     FILE BARU
                ========================================== -->

                <div class="form-group">

                    <label>
                        Ganti Berkas Surat Keputusan
                    </label>


                    <div class="file-box">

                        <input
                            type="file"
                            name="file"
                            accept="application/pdf,.pdf"
                        >


                        <small class="file-help">
                            Kosongkan jika tidak ingin mengganti berkas.
                            Format PDF, maksimal 10 MB.
                        </small>

                    </div>

                </div>


                <!-- =========================================
                     ACTION
                ========================================== -->

                <div class="form-actions">

                    <button
                        type="submit"
                        class="btn-update"
                    >
                        ✓ &nbsp;Simpan Perubahan
                    </button>


                    <a
                        href="<?= base_url('forum-kecamatan-sehat/sk') ?>"
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