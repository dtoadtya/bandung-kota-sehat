<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Tambah Realisasi Kegiatan
            </h3>

            <p class="text-muted mb-0">
                Tim Pembina -
                <?= esc($namaPeriode) ?>
            </p>

        </div>

        <a
            href="<?= base_url('tim-pembina/realisasi/' . $periode) ?>"
            class="btn btn-outline-secondary"
        >
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>

    </div>


    <!-- ERROR -->
    <?php if (session()->getFlashdata('errors')): ?>

        <div class="alert alert-danger">

            <ul class="mb-0">

                <?php foreach (
                    session()->getFlashdata('errors')
                    as $error
                ): ?>

                    <li>
                        <?= esc($error) ?>
                    </li>

                <?php endforeach; ?>

            </ul>

        </div>

    <?php endif; ?>


    <!-- FORM -->
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form
                action="<?= base_url('tim-pembina/realisasi/store') ?>"
                method="post"
            >

                <?= csrf_field() ?>


                <!-- PERIODE -->
                <input
                    type="hidden"
                    name="periode"
                    value="<?= esc($periode) ?>"
                >


                <!-- TAHUN -->
                <div class="mb-4">

                    <label
                        for="tahun"
                        class="form-label fw-semibold"
                    >
                        Tahun <span class="text-danger">*</span>
                    </label>

                    <input
                        type="number"
                        name="tahun"
                        id="tahun"
                        class="form-control"
                        min="2000"
                        max="2100"
                        value="<?= old('tahun') ?>"
                        placeholder="Contoh: 2026"
                        required
                    >

                    <small class="text-muted">
                        Masukkan tahun realisasi kegiatan.
                    </small>

                </div>


                <!-- NAMA KEGIATAN -->
                <div class="mb-4">

                    <label
                        for="nama_kegiatan"
                        class="form-label fw-semibold"
                    >
                        Nama Kegiatan
                        <span class="text-danger">*</span>
                    </label>

                    <input
                        type="text"
                        name="nama_kegiatan"
                        id="nama_kegiatan"
                        class="form-control"
                        value="<?= old('nama_kegiatan') ?>"
                        placeholder="Masukkan nama kegiatan"
                        required
                    >

                </div>


                <!-- WAKTU & PESERTA -->
                <div class="row g-3 mb-4">

                    <div class="col-md-6">

                        <label
                            for="waktu_kegiatan"
                            class="form-label fw-semibold"
                        >
                            Waktu Kegiatan
                            <span class="text-danger">*</span>
                        </label>

                        <input
                            type="date"
                            name="waktu_kegiatan"
                            id="waktu_kegiatan"
                            class="form-control"
                            value="<?= old('waktu_kegiatan') ?>"
                            required
                        >

                        <small class="text-muted">
                            Pilih tanggal pelaksanaan kegiatan.
                        </small>

                    </div>

                    <div class="col-md-6">

                        <label
                            for="peserta"
                            class="form-label fw-semibold"
                        >
                            Peserta
                        </label>

                        <input
                            type="text"
                            name="peserta"
                            id="peserta"
                            class="form-control"
                            value="<?= old('peserta') ?>"
                            placeholder="Jumlah atau uraian peserta"
                        >

                        <small class="text-muted">
                            Contoh: 25 orang / Tim Pembina.
                        </small>

                    </div>

                </div>


                <!-- HASIL PELAKSANAAN -->
                <div class="mb-4">

                    <label
                        for="hasil_pelaksanaan"
                        class="form-label fw-semibold"
                    >
                        Hasil Pelaksanaan Kegiatan
                    </label>

                    <textarea
                        name="hasil_pelaksanaan"
                        id="hasil_pelaksanaan"
                        class="form-control"
                        rows="3"
                        placeholder="Tuliskan hasil pelaksanaan kegiatan..."
                    ><?= old('hasil_pelaksanaan') ?></textarea>

                </div>


                <!-- ANGGARAN & SUMBER PENDANAAN -->
                <div class="row g-3 mb-4">

                    <div class="col-md-6">

                        <label
                            for="anggaran"
                            class="form-label fw-semibold"
                        >
                            Anggaran Pelaksanaan (Rp)
                        </label>

                        <input
                            type="text"
                            name="anggaran"
                            id="anggaran"
                            class="form-control"
                            value="<?= old('anggaran') ?>"
                            placeholder="Contoh: 5.000.000"
                            inputmode="numeric"
                        >

                        <small class="text-muted">
                            Masukkan jumlah anggaran kegiatan.
                        </small>

                    </div>

                    <div class="col-md-6">

                        <label
                            for="sumber_pendanaan"
                            class="form-label fw-semibold"
                        >
                            Sumber Pendanaan
                        </label>

                        <select
                            name="sumber_pendanaan"
                            id="sumber_pendanaan"
                            class="form-select"
                        >

                            <option value="">
                                -- Pilih Sumber Pendanaan --
                            </option>

                            <option value="APBD Kota"
                                <?= old('sumber_pendanaan') == 'APBD Kota'
                                    ? 'selected'
                                    : '' ?>>
                                APBD Kota
                            </option>

                            <option value="DAK"
                                <?= old('sumber_pendanaan') == 'DAK'
                                    ? 'selected'
                                    : '' ?>>
                                DAK
                            </option>

                            <option value="Swadaya"
                                <?= old('sumber_pendanaan') == 'Swadaya'
                                    ? 'selected'
                                    : '' ?>>
                                Swadaya
                            </option>

                        </select>

                    </div>

                </div>


                <!-- LINK DRIVE -->
                <div class="mb-4">

                    <label
                        for="link_drive"
                        class="form-label fw-semibold"
                    >
                        Link Drive/Cloud Data Dukung
                    </label>

                    <input
                        type="url"
                        name="link_drive"
                        id="link_drive"
                        class="form-control"
                        value="<?= old('link_drive') ?>"
                        placeholder="https://drive.google.com/..."
                    >

                    <small class="text-muted">
                        Masukkan tautan Google Drive atau
                        penyimpanan cloud lainnya.
                    </small>

                </div>


                <!-- DATA DUKUNG -->
                <div class="mb-4">

                    <label
                        for="data_dukung"
                        class="form-label fw-semibold"
                    >
                        Keterangan Data Dukung
                    </label>

                    <textarea
                        name="data_dukung"
                        id="data_dukung"
                        class="form-control"
                        rows="3"
                        placeholder="Tuliskan keterangan data dukung atau dokumen pendukung..."
                    ><?= old('data_dukung') ?></textarea>

                </div>


                <!-- BUTTON -->
                <div class="d-flex justify-content-end gap-2">

                    <a
                        href="<?= base_url('tim-pembina/realisasi/' . $periode) ?>"
                        class="btn btn-light border"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <i class="bi bi-check-lg"></i>
                        Simpan Data
                    </button>

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

        anggaran.value = formatAnggaran(
            anggaran.value
        );

    }

    anggaran.form.addEventListener('submit', function () {

        anggaran.value = anggaran.value.replace(/\./g, '');

    });

});
</script>

<?= $this->endSection() ?>
