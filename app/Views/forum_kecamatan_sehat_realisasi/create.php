<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .periode-card {
        background: #ffffff;
        border: 1px solid #dce8f5;
        border-radius: 14px;
        padding: 22px;
        margin-bottom: 20px;
    }

    .periode-title {
        display: flex;
        align-items: center;
        gap: 12px;
        color: #0b4f9c;
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .periode-icon {
        width: 42px;
        height: 42px;
        border-radius: 10px;
        background: #eaf3ff;
        color: #0b4f9c;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    .periode-description {
        color: #718096;
        margin-left: 54px;
        margin-bottom: 18px;
    }

    .periode-buttons {
        display: flex;
        gap: 12px;
        margin-left: 54px;
    }

    .periode-btn {
        min-width: 150px;
        padding: 11px 20px;
        border-radius: 9px;
        border: 1px solid #b8d4f2;
        background: #ffffff;
        color: #0b4f9c;
        font-weight: 600;
        text-decoration: none;
        text-align: center;
        transition: 0.2s;
    }

    .periode-btn:hover {
        background: #eaf3ff;
        color: #07366d;
        border-color: #0b4f9c;
    }

    .periode-btn.active {
        background: #0b4f9c;
        color: #ffffff;
        border-color: #0b4f9c;
    }
</style>


<div class="container-fluid">

    <!-- =====================================================
         HEADER
    ====================================================== -->

    <div class="kelembagaan-header mb-4">

        <div>

            <h1>Tambah Realisasi Kegiatan</h1>

            <p>
                Forum Kecamatan Sehat
            </p>

        </div>

        <a href="<?= site_url('forum-kecamatan-sehat/realisasi') ?>"
           class="btn">

            <i class="bi bi-arrow-left"></i>
            Kembali

        </a>

    </div>


    <!-- =====================================================
         PILIH PERIODE
         INI YANG AKAN MUNCUL DI ATAS FORM TAMBAH DATA
    ====================================================== -->

    <?php
        $periode = service('request')->getGet('tahun_periode');
    ?>

    <div class="periode-card">

        <div class="periode-title">

            <div class="periode-icon">

                <i class="bi bi-calendar3"></i>

            </div>

            <div>
                Periode Realisasi Kegiatan
            </div>

        </div>


        <div class="periode-description">

            Pilih Tahun 1 atau Tahun 2 untuk menambahkan
            realisasi kegiatan.

        </div>


        <div class="periode-buttons">

            <a href="<?= site_url('forum-kecamatan-sehat/realisasi/create?tahun_periode=1') ?>"
               class="periode-btn <?= $periode == '1' ? 'active' : '' ?>">

                <i class="bi bi-calendar-check"></i>

                Tahun 1

            </a>


            <a href="<?= site_url('forum-kecamatan-sehat/realisasi/create?tahun_periode=2') ?>"
               class="periode-btn <?= $periode == '2' ? 'active' : '' ?>">

                <i class="bi bi-calendar-check"></i>

                Tahun 2

            </a>

        </div>

    </div>


    <!-- =====================================================
         FORM
    ====================================================== -->

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <h4 class="mb-1">
                Form Realisasi Kegiatan & Pendanaan
            </h4>

            <p class="text-muted mb-4">
                Masukkan realisasi kegiatan Forum Kecamatan Sehat.
            </p>


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


            <?php if (session()->getFlashdata('error')): ?>

                <div class="alert alert-danger">

                    <?= esc(session()->getFlashdata('error')) ?>

                </div>

            <?php endif; ?>


            <form action="<?= site_url('forum-kecamatan-sehat/realisasi/store') ?>"
                  method="post">

                <?= csrf_field() ?>


                <div class="row">


                    <?php if ($isAdmin): ?>

                        <div class="col-md-4 mb-3">

                            <label class="form-label">

                                Kecamatan
                                <span class="text-danger">*</span>

                            </label>


                            <select name="kecamatan_id"
                                    class="form-select"
                                    required>

                                <option value="">
                                    -- Pilih Kecamatan --
                                </option>


                                <?php foreach ($kecamatanList as $kecamatan): ?>

                                    <option value="<?= $kecamatan['id'] ?>"
                                        <?= old('kecamatan_id') == $kecamatan['id']
                                            ? 'selected'
                                            : '' ?>>

                                        <?= esc($kecamatan['nama_kecamatan']) ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>

                    <?php endif; ?>


                    <div class="<?= $isAdmin ? 'col-md-4' : 'col-md-6' ?> mb-3">

                        <label class="form-label">

                            Tahun
                            <span class="text-danger">*</span>

                        </label>


                        <input type="number"
                               name="tahun"
                               class="form-control"
                               min="2000"
                               max="2100"
                               value="<?= old('tahun') ?>"
                               placeholder="Contoh: 2026"
                               required>

                    </div>


                    <div class="<?= $isAdmin ? 'col-md-4' : 'col-md-6' ?> mb-3">

                        <label class="form-label">

                            Waktu Pelaksanaan

                        </label>


                        <input type="date"
                               name="waktu_kegiatan"
                               class="form-control"
                               value="<?= old('waktu_kegiatan') ?>">

                    </div>


                    <div class="col-md-12 mb-3">

                        <label class="form-label">

                            Nama Kegiatan
                            <span class="text-danger">*</span>

                        </label>


                        <input type="text"
                               name="nama_kegiatan"
                               class="form-control"
                               value="<?= old('nama_kegiatan') ?>"
                               placeholder="Masukkan nama kegiatan"
                               required>

                    </div>


                    <div class="col-md-12 mb-3">

                        <label class="form-label">

                            Peserta

                        </label>


                        <textarea name="peserta"
                                  class="form-control"
                                  rows="3"
                                  placeholder="Masukkan peserta kegiatan"><?= old('peserta') ?></textarea>

                    </div>


                    <div class="col-md-12 mb-3">

                        <label class="form-label">

                            Hasil Pelaksanaan Kegiatan

                        </label>


                        <textarea name="hasil_pelaksanaan"
                                  class="form-control"
                                  rows="4"
                                  placeholder="Jelaskan hasil pelaksanaan kegiatan"><?= old('hasil_pelaksanaan') ?></textarea>

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Anggaran Kegiatan (Rp)
                        </label>

                        <input type="text"
                            name="anggaran"
                            id="anggaran"
                            class="form-control"
                            value="<?= old('anggaran') ?>"
                            placeholder="Jumlah Anggaran Kegiatan"
                            inputmode="numeric">

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label">

                            Sumber Pendanaan

                        </label>


                        <select name="sumber_pendanaan"
                                class="form-select">

                            <option value="">
                                -- Pilih Sumber Pendanaan --
                            </option>

                            <option value="APBD Kota"
                                <?= old('sumber_pendanaan') === 'APBD Kota'
                                    ? 'selected'
                                    : '' ?>>

                                APBD Kota

                            </option>

                            <option value="DAK"
                                <?= old('sumber_pendanaan') === 'DAK'
                                    ? 'selected'
                                    : '' ?>>

                                DAK

                            </option>

                            <option value="Swadaya"
                                <?= old('sumber_pendanaan') === 'Swadaya'
                                    ? 'selected'
                                    : '' ?>>

                                Swadaya

                            </option>

                        </select>

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label">

                            Link Drive/Cloud

                        </label>


                        <input type="url"
                               name="link_drive"
                               class="form-control"
                               value="<?= old('link_drive') ?>"
                               placeholder="https://drive.google.com/...">

                    </div>


                    <div class="col-md-12 mb-4">

                        <label class="form-label">

                            Data Dukung

                        </label>


                        <textarea name="data_dukung"
                                  class="form-control"
                                  rows="3"
                                  placeholder="Contoh: surat undangan, daftar hadir, foto dokumentasi"><?= old('data_dukung') ?></textarea>

                    </div>

                </div>


                <!-- =====================================================
                     TOMBOL
                ====================================================== -->

                <div class="d-flex justify-content-end gap-2">

                    <a href="<?= site_url('forum-kecamatan-sehat/realisasi') ?>"
                       class="btn btn-secondary">

                        Batal

                    </a>


                    <button type="submit"
                            class="btn btn-primary">

                        <i class="bi bi-save"></i>

                        Simpan Data

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<?= $this->endSection() ?>