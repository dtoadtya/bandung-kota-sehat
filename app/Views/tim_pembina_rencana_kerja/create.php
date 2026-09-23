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

    .tahun-card,
    .form-card {
        background: #fff;
        border: 1px solid #d8e7f5;
        border-radius: 14px;
        margin-bottom: 24px;
        overflow: hidden;
        box-shadow: 0 3px 12px rgba(22, 82, 130, .05);
    }

    .tahun-header,
    .form-header {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 22px 26px;
        border-bottom: 1px solid #e3edf6;
    }

    .tahun-icon,
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
    }

    .tahun-header h2,
    .form-header h2 {
        margin: 0;
        color: #07366d;
        font-size: 20px;
        font-weight: 800;
    }

    .tahun-header p,
    .form-header p {
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
    }

    .btn-tahun:hover,
    .btn-tahun.active {
        background: #07366d;
        border-color: #07366d;
        color: #fff;
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
    }

    input:focus,
    select:focus,
    textarea:focus {
        border-color: #1687e8;
        box-shadow: 0 0 0 3px rgba(22, 135, 232, .10);
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

    @media (max-width: 768px) {
        .page-wrapper {
            padding: 15px;
        }

        .page-header h1 {
            font-size: 23px;
            padding-right: 80px;
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

    <div class="page-header">

        <a href="<?= base_url('tim-pembina/rencana-kerja') ?>"
           class="btn-kembali">
            ← &nbsp;Kembali
        </a>

        <h1>
            Tambah Rencana Kerja
        </h1>

        <p>
            Input rencana kerja Tim Pembina berdasarkan tahun dan kegiatan.
        </p>

    </div>


    <div class="tahun-card">

        <div class="tahun-header">

            <div class="tahun-icon">
                ▤
            </div>

            <div>

                <h2>Rencana Kerja</h2>

                <p>
                    Kelola rencana kerja Tim Pembina berdasarkan tahun kegiatan.
                </p>

            </div>

        </div>


        <div class="tahun-buttons">

            <a href="<?= base_url('tim-pembina/rencana-kerja/create?tahun=1') ?>"
               class="btn-tahun <?= ($tahun ?? '') == '1' ? 'active' : '' ?>">
                ▣ &nbsp; Tahun 1
            </a>

            <a href="<?= base_url('tim-pembina/rencana-kerja/create?tahun=2') ?>"
               class="btn-tahun <?= ($tahun ?? '') == '2' ? 'active' : '' ?>">
                ▣ &nbsp; Tahun 2
            </a>

        </div>

    </div>


    <div class="form-card">

        <div class="form-header">

            <div class="form-icon">
                ▥
            </div>

            <div>

                <h2>Form Rencana Kerja</h2>

                <p>
                    Silakan isi rencana kerja Tim Pembina.
                </p>

            </div>

        </div>


        <div class="form-body">

            <form action="<?= base_url('tim-pembina/rencana-kerja/store') ?>"
                  method="post">

                <?= csrf_field() ?>

                <input type="hidden"
                       name="tahun_periode"
                       value="<?= esc($tahun ?? '') ?>">


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
                            Pilih tanggal pelaksanaan kegiatan.
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

                    </div>

                </div>


                <div class="form-group">

                    <label>
                        Hasil Pelaksanaan Kegiatan
                    </label>

                    <textarea name="hasil_pelaksanaan"
                              placeholder="Tuliskan hasil pelaksanaan kegiatan..."><?= old('hasil_pelaksanaan') ?></textarea>

                </div>


                <div class="form-row">

                    <div class="form-group">

                        <label>
                            Anggaran Pelaksanaan (Rp)
                        </label>

                        <input type="text"
                               name="anggaran"
                               id="anggaran"
                               value="<?= old('anggaran') ?>"
                               placeholder="Contoh: 5.000.000"
                               inputmode="numeric">

                        <small class="form-help">
                            Contoh penulisan: 5.000.000
                        </small>

                    </div>


                    <div class="form-group">

                        <label>
                            Sumber Pendanaan
                        </label>

                        <select name="sumber_pendanaan">

                            <option value="">
                                -- Pilih Sumber Pendanaan --
                            </option>

                            <option value="APBD Kota">
                                APBD Kota
                            </option>

                            <option value="DAK">
                                DAK
                            </option>

                            <option value="Swadaya">
                                Swadaya
                            </option>

                        </select>

                    </div>

                </div>


                <div class="form-group">

                    <label>
                        Link Drive/Cloud
                    </label>

                    <input type="url"
                           name="link_drive"
                           value="<?= old('link_drive') ?>"
                           placeholder="https://drive.google.com/...">

                    <small class="form-help">
                        Masukkan tautan Google Drive atau penyimpanan cloud lainnya.
                    </small>

                </div>


                <div class="form-actions">

                    <button type="submit"
                            class="btn-simpan">
                        ✓ &nbsp;Simpan Data
                    </button>

                    <a href="<?= base_url('tim-pembina/rencana-kerja') ?>"
                       class="btn-batal">
                        Batal
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const anggaran = document.getElementById('anggaran');

    if (!anggaran) {
        return;
    }

    function formatAnggaran(value) {

        let angka = value.replace(/\D/g, '');

        if (angka === '') {
            return '';
        }

        return angka.replace(
            /\B(?=(\d{3})+(?!\d))/g,
            '.'
        );
    }

    anggaran.addEventListener('input', function () {
        this.value = formatAnggaran(this.value);
    });

    if (anggaran.value !== '') {
        anggaran.value = formatAnggaran(anggaran.value);
    }

    anggaran.form.addEventListener('submit', function () {
        anggaran.value = anggaran.value.replace(/\./g, '');
    });

});
</script>

<?= $this->endSection() ?>