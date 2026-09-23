<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="kelembagaan-header mb-4">
        <div>
            <h1>Upload Foto Kegiatan</h1>
            <p>Forum Kecamatan Sehat</p>
        </div>

        <a href="<?= site_url('forum-kecamatan-sehat/foto-kegiatan') ?>"
           class="btn">
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <h4 class="mb-1">
                Form Upload Foto
            </h4>

            <p class="text-muted mb-4">
                Unggah satu foto dokumentasi kegiatan dengan ukuran maksimal 5 MB.
            </p>

            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach (
                            session()->getFlashdata('errors')
                            as $error
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

            <form action="<?= site_url('forum-kecamatan-sehat/foto-kegiatan/store') ?>"
                  method="post"
                  enctype="multipart/form-data">

                <?= csrf_field() ?>

                <?php if ($isAdmin): ?>

                    <div class="mb-3">
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

                <div class="mb-4">
                    <label class="form-label">
                        Foto Kegiatan
                        <span class="text-danger">*</span>
                    </label>

                    <input type="file"
                           name="foto"
                           class="form-control"
                           accept="image/jpeg,image/png,image/jpg,image/webp"
                           required>

                    <div class="form-text">
                        Format JPG, JPEG, PNG, atau WEBP. Maksimal 5 MB.
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2">

                    <a href="<?= site_url('forum-kecamatan-sehat/foto-kegiatan') ?>"
                       class="btn btn-secondary">
                        Batal
                    </a>

                    <button type="submit"
                            class="btn btn-primary">
                        <i class="bi bi-upload"></i>
                        Upload Foto
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

<?= $this->endSection() ?>