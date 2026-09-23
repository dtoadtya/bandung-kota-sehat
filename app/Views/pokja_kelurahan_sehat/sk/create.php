<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .sk-create-page {
        background: #f4f7fb;
        min-height: calc(100vh - 60px);
        padding: 28px 30px 40px;
    }

    /* HEADER */
    .sk-create-header {
        background: linear-gradient(135deg, #eef7ff, #f8fbff);
        border: 1px solid #d8e7f5;
        border-left: 5px solid #2d91d9;
        border-radius: 12px;
        padding: 22px 28px;
        margin-bottom: 22px;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .sk-create-header::after {
        content: "";
        position: absolute;
        width: 130px;
        height: 130px;
        right: -40px;
        top: -55px;
        border-radius: 50%;
        background: #e7f3ff;
    }

    .sk-create-header-content {
        position: relative;
        z-index: 2;
    }

    .sk-create-header h1 {
        margin: 0;
        color: #07366d;
        font-size: 28px;
        font-weight: 800;
    }

    .sk-create-header p {
        margin: 6px 0 0;
        color: #6682a3;
        font-size: 13px;
    }

    .btn-kembali {
        position: relative;
        z-index: 3;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 10px 16px;
        border-radius: 8px;
        border: 1px solid #cbddec;
        background: #fff;
        color: #35618b;
        text-decoration: none;
        font-size: 12px;
        font-weight: 700;
    }

    .btn-kembali:hover {
        background: #eef7ff;
        color: #07366d;
    }

    /* ALERT */
    .sk-alert {
        padding: 12px 16px;
        border-radius: 8px;
        margin-bottom: 18px;
        font-size: 13px;
    }

    .sk-alert-error {
        background: #fff0f0;
        border: 1px solid #f1cccc;
        color: #b42323;
    }

    /* CARD */
    .sk-form-card {
        background: #fff;
        border: 1px solid #dce8f5;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 3px 12px rgba(7, 54, 109, .035);
    }

    .sk-form-card-header {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 20px 24px;
        border-bottom: 1px solid #e3ebf4;
    }

    .sk-form-icon {
        width: 42px;
        height: 42px;
        flex-shrink: 0;
        border-radius: 10px;
        background: #e7f2ff;
        color: #087cf0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .sk-form-icon svg {
        width: 23px;
        height: 23px;
    }

    .sk-form-title h2 {
        margin: 0;
        color: #07366d;
        font-size: 20px;
        font-weight: 800;
    }

    .sk-form-title p {
        margin: 4px 0 0;
        color: #6b86a6;
        font-size: 12px;
    }

    /* FORM */
    .sk-form-body {
        padding: 25px 28px 28px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        color: #07366d;
        font-size: 13px;
        font-weight: 800;
    }

    .required {
        color: #d9534f;
    }

    .form-control {
        width: 100%;
        box-sizing: border-box;
        min-height: 44px;
        padding: 10px 13px;
        border: 1px solid #d5e1ed;
        border-radius: 8px;
        background: #fff;
        color: #243447;
        font-family: inherit;
        font-size: 13px;
        outline: none;
        transition: .2s;
    }

    .form-control:focus {
        border-color: #087cf0;
        box-shadow: 0 0 0 3px rgba(8, 124, 240, .10);
    }

    select.form-control {
        cursor: pointer;
    }

    textarea.form-control {
        min-height: 100px;
        resize: vertical;
    }

    .form-help {
        margin-top: 6px;
        color: #7188a4;
        font-size: 11px;
        line-height: 1.5;
    }

    /* FILE */
    .file-box {
        border: 1px dashed #bcd2e7;
        border-radius: 10px;
        padding: 18px;
        background: #fafdff;
    }

    .file-input {
        width: 100%;
        font-size: 12px;
        color: #526d89;
    }

    .file-input::file-selector-button {
        margin-right: 12px;
        border: none;
        border-radius: 7px;
        padding: 9px 13px;
        background: #e8f3ff;
        color: #087cf0;
        font-weight: 700;
        cursor: pointer;
    }

    .file-input::file-selector-button:hover {
        background: #d9edff;
    }

    /* INFO */
    .info-box {
        display: flex;
        gap: 12px;
        align-items: flex-start;
        background: #eef7ff;
        border: 1px solid #d5e9fb;
        border-radius: 9px;
        padding: 14px 16px;
        margin-bottom: 22px;
    }

    .info-icon {
        width: 30px;
        height: 30px;
        flex-shrink: 0;
        border-radius: 8px;
        background: #dceeff;
        color: #087cf0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .info-icon svg {
        width: 17px;
        height: 17px;
    }

    .info-text {
        color: #55718f;
        font-size: 12px;
        line-height: 1.6;
    }

    .info-text strong {
        color: #07366d;
    }

    /* BUTTON */
    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 9px;
        padding-top: 8px;
        border-top: 1px solid #e7edf4;
        margin-top: 25px;
    }

    .btn-cancel {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 10px 17px;
        border-radius: 8px;
        border: 1px solid #d2dfeb;
        background: #fff;
        color: #52708f;
        text-decoration: none;
        font-size: 12px;
        font-weight: 700;
    }

    .btn-cancel:hover {
        background: #f5f8fb;
    }

    .btn-save {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        padding: 10px 18px;
        border: none;
        border-radius: 8px;
        background: #087cf0;
        color: #fff;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
    }

    .btn-save:hover {
        background: #07366d;
    }

    .btn-save svg {
        width: 15px;
        height: 15px;
    }

    @media (max-width: 700px) {

        .sk-create-page {
            padding: 20px 15px 30px;
        }

        .sk-create-header {
            align-items: flex-start;
            flex-direction: column;
            gap: 15px;
        }

        .sk-create-header h1 {
            font-size: 23px;
        }

        .sk-form-body {
            padding: 20px;
        }

        .form-actions {
            flex-direction: column-reverse;
        }

        .btn-cancel,
        .btn-save {
            width: 100%;
        }
    }
</style>


<div class="sk-create-page">

    <!-- HEADER -->

    <div class="sk-create-header">

        <div class="sk-create-header-content">

            <h1>
                Upload SK Pokja Kelurahan Sehat
            </h1>

            <p>
                Tambahkan Surat Keputusan Pokja Kelurahan Sehat.
            </p>

        </div>

        <a
            href="<?= base_url('pokja-kelurahan-sehat/sk') ?>"
            class="btn-kembali"
        >
            ← Kembali
        </a>

    </div>


    <!-- ERROR -->

    <?php if (session()->getFlashdata('error')) : ?>

        <div class="sk-alert sk-alert-error">

            <?= esc(
                session()->getFlashdata('error')
            ) ?>

        </div>

    <?php endif; ?>


    <!-- CARD -->

    <div class="sk-form-card">


        <!-- CARD HEADER -->

        <div class="sk-form-card-header">

            <div class="sk-form-icon">

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >

                    <path d="M7 3h7l4 4v14H7z"></path>

                    <path d="M14 3v5h5"></path>

                    <path d="M10 13h5"></path>

                    <path d="M10 17h5"></path>

                </svg>

            </div>

            <div class="sk-form-title">

                <h2>
                    Data SK Pokja Kelurahan Sehat
                </h2>

                <p>
                    Lengkapi informasi Surat Keputusan dan upload dokumen SK.
                </p>

            </div>

        </div>


        <!-- FORM BODY -->

        <div class="sk-form-body">


            <!-- INFO -->

            <div class="info-box">

                <div class="info-icon">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <circle
                            cx="12"
                            cy="12"
                            r="10"
                        ></circle>

                        <line
                            x1="12"
                            y1="16"
                            x2="12"
                            y2="12"
                        ></line>

                        <line
                            x1="12"
                            y1="8"
                            x2="12.01"
                            y2="8"
                        ></line>

                    </svg>

                </div>

                <div class="info-text">

                    <strong>Informasi:</strong>

                    File Surat Keputusan harus berformat
                    <strong>PDF</strong>
                    dengan ukuran maksimal
                    <strong>5 MB</strong>.

                </div>

            </div>


            <!-- FORM -->

            <form
                action="<?= base_url('pokja-kelurahan-sehat/sk/store') ?>"
                method="post"
                enctype="multipart/form-data"
            >

                <?= csrf_field() ?>


                <!-- KELURAHAN -->

                <div class="form-group">

                    <label
                        for="kelurahan_id"
                        class="form-label"
                    >

                        Kelurahan
                        <span class="required">*</span>

                    </label>


                    <?php if (!empty($isAdmin)) : ?>

                        <select
                            name="kelurahan_id"
                            id="kelurahan_id"
                            class="form-control"
                            required
                        >

                            <option value="">
                                -- Pilih Kelurahan --
                            </option>

                            <?php if (!empty($kelurahanList)) : ?>

                                <?php foreach ($kelurahanList as $kelurahan) : ?>

                                    <option
                                        value="<?= esc($kelurahan['id']) ?>"
                                        <?= old('kelurahan_id') == $kelurahan['id']
                                            ? 'selected'
                                            : ''
                                        ?>
                                    >

                                        <?= esc(
                                            $kelurahan['nama_kelurahan']
                                        ) ?>

                                        <?php if (!empty($kelurahan['nama_kecamatan'])) : ?>

                                            -
                                            <?= esc(
                                                $kelurahan['nama_kecamatan']
                                            ) ?>

                                        <?php endif; ?>

                                    </option>

                                <?php endforeach; ?>

                            <?php endif; ?>

                        </select>


                    <?php else : ?>


                        <input
                            type="text"
                            class="form-control"
                            value="<?= esc(
                                $kelurahanUser['nama_kelurahan']
                                    ?? ''
                            ) ?>"
                            readonly
                        >

                        <input
                            type="hidden"
                            name="kelurahan_id"
                            value="<?= esc(
                                $kelurahanUser['id']
                                    ?? ''
                            ) ?>"
                        >


                    <?php endif; ?>


                    <div class="form-help">

                        Pilih kelurahan yang memiliki Surat Keputusan
                        Pokja Kelurahan Sehat.

                    </div>

                </div>


                <!-- NOMOR SK -->

                <div class="form-group">

                    <label
                        for="no_sk"
                        class="form-label"
                    >

                        Nomor SK

                    </label>

                    <input
                        type="text"
                        name="no_sk"
                        id="no_sk"
                        class="form-control"
                        value="<?= old('no_sk') ?>"
                        placeholder="Contoh: 001/SK/PKS/2026"
                    >

                    <div class="form-help">

                        Masukkan nomor Surat Keputusan jika tersedia.

                    </div>

                </div>


                <!-- PERIODE -->

                <div class="form-group">

                    <label
                        for="periode"
                        class="form-label"
                    >

                        Periode

                    </label>

                    <input
                        type="text"
                        name="periode"
                        id="periode"
                        class="form-control"
                        value="<?= old('periode') ?>"
                        placeholder="Contoh: 2026 - 2030"
                    >

                    <div class="form-help">

                        Masukkan periode berlaku Surat Keputusan.

                    </div>

                </div>


                <!-- KETERANGAN -->

                <div class="form-group">

                    <label
                        for="keterangan"
                        class="form-label"
                    >

                        Keterangan

                    </label>

                    <textarea
                        name="keterangan"
                        id="keterangan"
                        class="form-control"
                        placeholder="Masukkan keterangan tambahan mengenai SK..."
                    ><?= old('keterangan') ?></textarea>

                </div>


                <!-- FILE -->

                <div class="form-group">

                    <label
                        for="file_sk"
                        class="form-label"
                    >

                        File SK
                        <span class="required">*</span>

                    </label>


                    <div class="file-box">

                        <input
                            type="file"
                            name="file_sk"
                            id="file_sk"
                            class="file-input"
                            accept="application/pdf,.pdf"
                            required
                        >

                        <div class="form-help">

                            Format yang diperbolehkan:
                            <strong>PDF</strong>.
                            Ukuran maksimal:
                            <strong>5 MB</strong>.

                        </div>

                    </div>

                </div>


                <!-- BUTTON -->

                <div class="form-actions">

                    <a
                        href="<?= base_url('pokja-kelurahan-sehat/sk') ?>"
                        class="btn-cancel"
                    >

                        Batal

                    </a>


                    <button
                        type="submit"
                        class="btn-save"
                    >

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >

                            <path
                                d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"
                            ></path>

                            <polyline
                                points="17 21 17 13 7 13 7 21"
                            ></polyline>

                            <polyline
                                points="7 3 7 8 15 8"
                            ></polyline>

                        </svg>

                        Simpan Data

                    </button>

                </div>


            </form>

        </div>

    </div>

</div>


<?= $this->endSection() ?>