<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .page-wrapper {
        background: #f4f8fc;
        min-height: calc(100vh - 70px);
        padding: 28px;
    }

    /* HEADER */
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

    /* CARD TAHUN */
    .tahun-card {
        background: #fff;
        border: 1px solid #d8e7f5;
        border-radius: 14px;
        margin-bottom: 24px;
        overflow: hidden;
        box-shadow: 0 3px 12px rgba(22, 82, 130, 0.05);
    }

    .tahun-header {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 22px 26px;
        border-bottom: 1px solid #e3edf6;
    }

    .tahun-icon {
        width: 44px;
        height: 44px;
        border-radius: 10px;
        background: #e7f3ff;
        color: #087ff5;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
    }

    .tahun-header h2 {
        margin: 0;
        color: #07366d;
        font-size: 20px;
        font-weight: 800;
    }

    .tahun-header p {
        margin: 4px 0 0;
        color: #6d87a4;
        font-size: 12px;
    }

    .tahun-buttons {
        display: flex;
        gap: 10px;
        padding: 0 26px 22px;
    }

    .btn-tahun {
        min-width: 105px;
        padding: 10px 18px;
        border-radius: 7px;
        border: 1px solid #087ff5;
        background: #087ff5;
        color: #fff;
        text-decoration: none;
        text-align: center;
        font-size: 13px;
        font-weight: 700;
        transition: .2s;
    }

    .btn-tahun:hover {
        background: #066fd6;
        color: #fff;
        transform: translateY(-1px);
    }

    .btn-tahun.active {
        background: #07366d;
        border-color: #07366d;
    }

    /* FORM CARD */
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

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
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
    select,
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
    select:focus,
    textarea:focus {
        border-color: #1687e8;
        box-shadow: 0 0 0 3px rgba(22, 135, 232, 0.10);
    }

    textarea {
        min-height: 105px;
        resize: vertical;
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
        margin-top: 8px;
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

        .form-row {
            grid-template-columns: 1fr;
        }

        .tahun-buttons {
            flex-wrap: wrap;
        }
    }
</style>

<div class="page-wrapper">

    <!-- HEADER -->
    <div class="page-header">
        <a href="<?= base_url('forum-bandung-sehat') ?>" class="btn-kembali">
            ← &nbsp;Kembali
        </a>

        <h1>Tambah Rencana Kerja</h1>
        <p>
            Kelola rencana kerja Forum Bandung Sehat berdasarkan tahun yang dapat ditentukan sendiri.
        </p>
    </div>

    <!-- TAHUN 1 & TAHUN 2 -->
    <div class="tahun-card">

        <div class="tahun-header">
            <div class="tahun-icon">
                ▤
            </div>

            <div>
                <h2>Rencana Kerja</h2>
                <p>
                    Kelola rencana kerja Forum Bandung Sehat berdasarkan tahun kegiatan.
                </p>
            </div>
        </div>

        <div class="tahun-buttons">

            <a href="<?= base_url('forum-bandung-sehat/rencana-kerja/create?tahun=1') ?>"
               class="btn-tahun <?= ($tahun ?? '') == '1' ? 'active' : '' ?>">
                ▣ &nbsp; Tahun 1
            </a>

            <a href="<?= base_url('forum-bandung-sehat/rencana-kerja/create?tahun=2') ?>"
               class="btn-tahun <?= ($tahun ?? '') == '2' ? 'active' : '' ?>">
                ▣ &nbsp; Tahun 2
            </a>

        </div>

    </div>

    <!-- FORM -->
    <div class="form-card">

        <div class="form-header">

            <div class="form-icon">
                ▤
            </div>

            <div>
                <h2>Form Rencana Kerja</h2>
                <p>
                    Silakan isi rencana kerja Forum Bandung Sehat sesuai kegiatan yang direncanakan.
                </p>
            </div>

        </div>

        <div class="form-body">

            <form action="<?= base_url('forum-bandung-sehat/rencana-kerja/store') ?>"
                  method="post">

                <?= csrf_field() ?>

                <!-- TAHUN PERIODE -->
                <input type="hidden"
                       name="tahun_periode"
                       value="<?= esc($tahun ?? '') ?>">

                <!-- NAMA KEGIATAN -->
                <div class="form-group">

                    <label>
                        Nama Kegiatan <span>*</span>
                    </label>

                    <input type="text"
                           name="nama_kegiatan"
                           value="<?= old('nama_kegiatan') ?>"
                           placeholder="Masukkan nama kegiatan"
                           required>

                </div>

                <!-- WAKTU + PESERTA -->
                <div class="form-row">

                    <div class="form-group">

                        <label>
                            Waktu Kegiatan <span>*</span>
                        </label>

                        <input type="date"
                               name="waktu_kegiatan"
                               value="<?= old('waktu_kegiatan') ?>"
                               required>

                        <small class="form-help">
                            Pilih tanggal pelaksanaan atau rencana kegiatan.
                        </small>

                    </div>

                    <div class="form-group">

                        <label>
                            Peserta
                        </label>

                        <input type="text"
                               name="peserta"
                               value="<?= old('peserta') ?>"
                               placeholder="Jumlah atau uraian peserta">

                        <small class="form-help">
                            Contoh: 25 orang / Forum Bandung Sehat.
                        </small>

                    </div>

                </div>

                <!-- HASIL PELAKSANAAN -->
                <div class="form-group">

                    <label>
                        Hasil Pelaksanaan Kegiatan
                    </label>

                    <textarea name="hasil_pelaksanaan"
                              placeholder="Tuliskan hasil atau target yang ingin dicapai dari kegiatan..."><?= old('hasil_pelaksanaan') ?></textarea>

                </div>

                <!-- TAHUN + ANGGARAN -->
                <div class="form-row">

                    <div class="form-group">

                        <label>
                            Tahun <span>*</span>
                        </label>

                        <input type="number"
                               name="tahun"
                               value="<?= old('tahun', date('Y')) ?>"
                               min="2000"
                               max="2100"
                               required>

                        <small class="form-help">
                            Tahun dapat disesuaikan dengan periode kegiatan.
                        </small>

                    </div>

                    <div class="form-group">

                        <label>
                            Anggaran
                        </label>

                        <input type="text"
                               name="anggaran"
                               value="<?= old('anggaran') ?>"
                               placeholder="Contoh: 5000000">

                    </div>

                </div>

                <!-- SUMBER PENDANAAN -->
                <div class="form-group">

                    <label>
                        Sumber Pendanaan
                    </label>

                    <select name="sumber_pendanaan">

                        <option value="">
                            -- Pilih Sumber Pendanaan --
                        </option>

                        <option value="APBD"
                            <?= old('sumber_pendanaan') == 'APBD' ? 'selected' : '' ?>>
                            APBD
                        </option>

                        <option value="APBN"
                            <?= old('sumber_pendanaan') == 'APBN' ? 'selected' : '' ?>>
                            APBN
                        </option>

                        <option value="Swadaya"
                            <?= old('sumber_pendanaan') == 'Swadaya' ? 'selected' : '' ?>>
                            Swadaya
                        </option>

                        <option value="Lainnya"
                            <?= old('sumber_pendanaan') == 'Lainnya' ? 'selected' : '' ?>>
                            Lainnya
                        </option>

                    </select>

                </div>

                <!-- LINK DATA DUKUNG -->
                <div class="form-row">

                    <div class="form-group">

                        <label>
                            Link Drive/Cloud Data Dukung
                        </label>

                        <input type="url"
                               name="link_drive"
                               value="<?= old('link_drive') ?>"
                               placeholder="https://drive.google.com/...">

                        <small class="form-help">
                            Masukkan tautan Google Drive atau penyimpanan cloud lainnya.
                        </small>

                    </div>

                    <div class="form-group">

                        <label>
                            Keterangan Data Dukung
                        </label>

                        <input type="text"
                               name="keterangan_data_dukung"
                               value="<?= old('keterangan_data_dukung') ?>"
                               placeholder="Keterangan singkat terkait data dukung...">

                    </div>

                </div>

                <!-- BUTTON -->
                <div class="form-actions">

                    <button type="submit" class="btn-simpan">
                        ✓ &nbsp;Simpan Data
                    </button>

                    <a href="<?= base_url('forum-bandung-sehat') ?>"
                       class="btn-batal">
                        Batal
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

<?= $this->endSection() ?>