<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="kelembagaan-header mb-4">

        <div>
            <h1>Tambah Realisasi Kegiatan</h1>
            <p>Forum Kecamatan Sehat - Tahun 1</p>
        </div>

        <a href="<?= site_url('forum-kecamatan-sehat/realisasi') ?>"
           class="btn">

            <i class="bi bi-arrow-left"></i>
            Kembali

        </a>

    </div>


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
                            session()->getFlashdata('errors') as $error
                        ): ?>

                            <li><?= esc($error) ?></li>

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
                               value="<?= old('tahun', date('Y')) ?>"
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


                        <input type="number"
                               name="anggaran"
                               class="form-control"
                               min="0"
                               step="0.01"
                               value="<?= old('anggaran', 0) ?>">

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


                <div class="d-flex justify-content-end gap-2">

                    <a href="<?= site_url('forum-kecamatan-sehat/realisasi/tahun-1') ?>"
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