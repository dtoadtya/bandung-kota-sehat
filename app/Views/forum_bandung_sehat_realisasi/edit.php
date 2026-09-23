<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="kelembagaan-header mb-4">
        <div>
            <h1>Edit Realisasi Kegiatan</h1>
            <p>Forum Bandung Sehat</p>
        </div>

        <a href="<?= site_url('forum-bandung-sehat/realisasi') ?>"
           class="btn btn-light">
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <h4 class="mb-1">
                Form Edit Realisasi Kegiatan
            </h4>

            <p class="text-muted mb-4">
                Perbarui data realisasi kegiatan.
            </p>

            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?= site_url('forum-bandung-sehat/realisasi/update/' . $data['id']) ?>"
                  method="post">

                <?= csrf_field() ?>

                <div class="row">

                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Tahun <span class="text-danger">*</span>
                        </label>

                        <input type="number"
                               name="tahun"
                               class="form-control"
                               min="2000"
                               max="2100"
                               value="<?= old('tahun', $data['tahun']) ?>"
                               required>
                    </div>

                    <div class="col-md-8 mb-3">
                        <label class="form-label">
                            Nama Kegiatan <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                               name="nama_kegiatan"
                               class="form-control"
                               value="<?= old('nama_kegiatan', $data['nama_kegiatan']) ?>"
                               required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Waktu Pelaksanaan
                        </label>

                        <input type="date"
                               name="waktu_kegiatan"
                               class="form-control"
                               value="<?= old('waktu_kegiatan', $data['waktu_kegiatan']) ?>">
                    </div>

                    <div class="col-md-8 mb-3">
                        <label class="form-label">
                            Peserta
                        </label>

                        <textarea name="peserta"
                                  class="form-control"
                                  rows="3"><?= old('peserta', $data['peserta']) ?></textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">
                            Hasil Pelaksanaan Kegiatan
                        </label>

                        <textarea name="hasil_pelaksanaan"
                                  class="form-control"
                                  rows="4"><?= old('hasil_pelaksanaan', $data['hasil_pelaksanaan']) ?></textarea>
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
                               value="<?= old('anggaran', $data['anggaran']) ?>">
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
                                <?= old('sumber_pendanaan', $data['sumber_pendanaan']) === 'APBD Kota' ? 'selected' : '' ?>>
                                APBD Kota
                            </option>

                            <option value="DAK"
                                <?= old('sumber_pendanaan', $data['sumber_pendanaan']) === 'DAK' ? 'selected' : '' ?>>
                                DAK
                            </option>

                            <option value="Swadaya"
                                <?= old('sumber_pendanaan', $data['sumber_pendanaan']) === 'Swadaya' ? 'selected' : '' ?>>
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
                               value="<?= old('link_drive', $data['link_drive']) ?>">
                    </div>

                    <div class="col-md-12 mb-4">
                        <label class="form-label">
                            Data Dukung
                        </label>

                        <textarea name="data_dukung"
                                  class="form-control"
                                  rows="3"><?= old('data_dukung', $data['data_dukung']) ?></textarea>
                    </div>

                </div>

                <div class="d-flex justify-content-end gap-2">

                    <a href="<?= site_url('forum-bandung-sehat/realisasi') ?>"
                       class="btn btn-secondary">
                        Batal
                    </a>

                    <button type="submit"
                            class="btn btn-primary">
                        <i class="bi bi-save"></i>
                        Perbarui Data
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

<?= $this->endSection() ?>