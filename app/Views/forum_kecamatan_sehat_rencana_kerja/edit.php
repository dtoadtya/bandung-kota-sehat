<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="kelembagaan-header mb-4">
        <div>
            <h1>Edit Rencana Kerja</h1>
            <p>Forum Kecamatan Sehat</p>
        </div>

        <a href="<?= site_url('forum-kecamatan-sehat/rencana-kerja') ?>"
           class="btn">
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <h4 class="mb-1">
                Form Edit Rencana Kerja
            </h4>

            <p class="text-muted mb-4">
                Perbarui data rencana kerja.
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

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= esc(session()->getFlashdata('error')) ?>
                </div>
            <?php endif; ?>

            <form action="<?= site_url('forum-kecamatan-sehat/rencana-kerja/update/' . $data['id']) ?>"
                  method="post">

                <?= csrf_field() ?>

                <div class="row">

                    <?php if ($isAdmin): ?>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Kecamatan <span class="text-danger">*</span>
                            </label>

                            <select name="kecamatan_id"
                                    class="form-select"
                                    required>

                                <?php foreach ($kecamatanList as $kecamatan): ?>
                                    <option value="<?= $kecamatan['id'] ?>"
                                        <?= old(
                                            'kecamatan_id',
                                            $data['kecamatan_id']
                                        ) == $kecamatan['id']
                                            ? 'selected'
                                            : '' ?>>
                                        <?= esc($kecamatan['nama_kecamatan']) ?>
                                    </option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                    <?php endif; ?>

                    <div class="<?= $isAdmin ? 'col-md-6' : 'col-md-12' ?> mb-3">
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

                    <div class="col-md-12 mb-4">
                        <label class="form-label">
                            Rencana Kerja <span class="text-danger">*</span>
                        </label>

                        <textarea name="data_rencana"
                                  class="form-control"
                                  rows="10"
                                  required><?= old(
                                      'data_rencana',
                                      $data['data_rencana']
                                  ) ?></textarea>
                    </div>

                </div>

                <div class="d-flex justify-content-end gap-2">

                    <a href="<?= site_url('forum-kecamatan-sehat/rencana-kerja') ?>"
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