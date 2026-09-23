<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .page-container {
        padding: 30px;
        background: #f4f7fb;
        min-height: calc(100vh - 80px);
    }

    .page-header {
        background: #eef7ff;
        border-left: 5px solid #1683d8;
        border-radius: 14px;
        padding: 30px 38px;
        margin-bottom: 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
    }

    .page-header h1 {
        margin: 0;
        color: #063b78;
        font-size: 32px;
        font-weight: 800;
    }

    .page-header p {
        margin: 8px 0 0;
        color: #6682a4;
        font-size: 14px;
    }

    .btn-back {
        text-decoration: none;
        color: #07509c;
        background: white;
        border: 1px solid #cbdff2;
        border-radius: 10px;
        padding: 13px 22px;
        font-weight: 700;
        white-space: nowrap;
    }

    .form-card {
        background: white;
        border: 1px solid #dce7f2;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(17, 64, 112, 0.04);
    }

    .form-card-header {
        padding: 24px 28px;
        border-bottom: 1px solid #e4ebf3;
    }

    .form-card-header h2 {
        margin: 0;
        color: #063b78;
        font-size: 21px;
        font-weight: 800;
    }

    .form-card-header p {
        margin: 7px 0 0;
        color: #7890ad;
        font-size: 13px;
    }

    .form-body {
        padding: 28px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #073d78;
        font-size: 14px;
        font-weight: 700;
    }

    .required {
        color: #e53935;
    }

    input,
    select,
    textarea {
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #c9dced;
        border-radius: 8px;
        padding: 13px 14px;
        background: white;
        color: #24486e;
        font-family: inherit;
        font-size: 14px;
        outline: none;
    }

    input:focus,
    select:focus,
    textarea:focus {
        border-color: #1683d8;
        box-shadow: 0 0 0 3px rgba(22, 131, 216, 0.10);
    }

    textarea {
        min-height: 120px;
        resize: vertical;
    }

    .form-help {
        margin-top: 7px;
        color: #7890ad;
        font-size: 12px;
    }

    .form-actions {
        display: flex;
        gap: 10px;
        margin-top: 28px;
    }

    .btn-save {
        border: none;
        border-radius: 8px;
        padding: 13px 22px;
        background: #087ff5;
        color: white;
        font-weight: 700;
        cursor: pointer;
    }

    .btn-cancel {
        text-decoration: none;
        border: 1px solid #c9dced;
        border-radius: 8px;
        padding: 12px 22px;
        background: white;
        color: #315b85;
        font-weight: 700;
    }

    .alert-error {
        background: #fff1f1;
        border: 1px solid #f1bcbc;
        color: #b42323;
        border-radius: 8px;
        padding: 13px 16px;
        margin-bottom: 20px;
    }

    @media (max-width: 768px) {
        .page-container {
            padding: 18px;
        }

        .page-header {
            padding: 24px;
            flex-direction: column;
            align-items: flex-start;
        }

        .page-header h1 {
            font-size: 26px;
        }

        .form-row {
            grid-template-columns: 1fr;
            gap: 0;
        }

        .form-body {
            padding: 20px;
        }
    }
</style>

<div class="page-container">

    <div class="page-header">
        <div>
            <h1>Tambah Realisasi Kegiatan</h1>
            <p>Input laporan realisasi kegiatan dan pendanaan Tim Pembina.</p>
        </div>

        <a href="<?= base_url('tim-pembina/create') ?>" class="btn-back">
            ← Kembali
        </a>
    </div>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert-error">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>

    <div class="form-card">

        <div class="form-card-header">
            <h2>▤ Form Laporan Realisasi Kegiatan</h2>
            <p>Silakan isi laporan realisasi kegiatan sesuai pelaksanaan.</p>
        </div>

        <div class="form-body">

            <form action="<?= base_url('tim-pembina/realisasi/store') ?>" method="post">

                <?= csrf_field() ?>

                <div class="form-group">
                    <label for="kecamatan_id">Kecamatan</label>

                    <select name="kecamatan_id" id="kecamatan_id">
                        <option value="">-- Pilih Kecamatan --</option>

                        <?php foreach ($kecamatanList ?? [] as $kecamatan) : ?>
                            <option
                                value="<?= esc($kecamatan['id']) ?>"
                                <?= old('kecamatan_id') == $kecamatan['id'] ? 'selected' : '' ?>
                            >
                                <?= esc($kecamatan['nama_kecamatan']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-row">

                    <div class="form-group">
                        <label for="tahun">
                            Tahun <span class="required">*</span>
                        </label>

                        <input
                            type="number"
                            name="tahun"
                            id="tahun"
                            value="<?= old('tahun', date('Y')) ?>"
                            placeholder="Contoh: 2026"
                            required
                        >

                        <div class="form-help">
                            Tahun dapat disesuaikan dengan periode kegiatan.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama_kegiatan">
                            Nama Kegiatan <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="nama_kegiatan"
                            id="nama_kegiatan"
                            value="<?= old('nama_kegiatan') ?>"
                            placeholder="Masukkan nama kegiatan"
                            required
                        >
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group">
                        <label for="waktu_kegiatan">
                            Waktu Kegiatan (D/M/Y) <span class="required">*</span>
                        </label>

                        <input
                            type="date"
                            name="waktu_kegiatan"
                            id="waktu_kegiatan"
                            value="<?= old('waktu_kegiatan') ?>"
                            required
                        >

                        <div class="form-help">
                            Pilih tanggal pelaksanaan kegiatan.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="peserta">Peserta</label>

                        <input
                            type="text"
                            name="peserta"
                            id="peserta"
                            value="<?= old('peserta') ?>"
                            placeholder="Jumlah atau uraian peserta"
                        >

                        <div class="form-help">
                            Contoh: 25 orang / Tim Pembina Bandung Sehat.
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <label for="hasil">
                        Hasil Pelaksanaan Kegiatan
                    </label>

                    <textarea
                        name="hasil"
                        id="hasil"
                        placeholder="Tuliskan hasil pelaksanaan kegiatan..."
                    ><?= old('hasil') ?></textarea>
                </div>

                <div class="form-row">

                    <div class="form-group">
                        <label for="anggaran">Anggaran Pelaksanaan (Rp)</label>

                        <input
                            type="number"
                            name="anggaran"
                            id="anggaran"
                            value="<?= old('anggaran') ?>"
                            placeholder="Contoh: 5000000"
                            min="0"
                        >
                    </div>

                    <div class="form-group">
                        <label for="sumber_pendanaan">Sumber Pendanaan</label>

                        <input
                            type="text"
                            name="sumber_pendanaan"
                            id="sumber_pendanaan"
                            value="<?= old('sumber_pendanaan') ?>"
                            placeholder="Contoh: APBD, APBN, Swadaya"
                        >
                    </div>

                </div>

                <div class="form-group">
                    <label for="link_data">
                        Link Drive/Cloud Data Dukung
                    </label>

                    <input
                        type="url"
                        name="link_data"
                        id="link_data"
                        value="<?= old('link_data') ?>"
                        placeholder="https://drive.google.com/..."
                    >

                    <div class="form-help">
                        Masukkan tautan Google Drive atau penyimpanan cloud lainnya.
                    </div>
                </div>

                <div class="form-group">
                    <label for="data_dukung">Keterangan Data Dukung</label>

                    <textarea
                        name="data_dukung"
                        id="data_dukung"
                        placeholder="Tuliskan keterangan data dukung atau dokumen pendukung..."
                    ><?= old('data_dukung') ?></textarea>
                </div>

                <div class="form-actions">
                    <button
                        type="submit"
                        class="btn-save"
                    >
                        ✓ &nbsp; Simpan Data
                    </button>

                    <a
                        href="<?= base_url('tim-pembina/realisasi') ?>"
                        class="btn-cancel"
                    >
                        Batal
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

<?= $this->endSection() ?>