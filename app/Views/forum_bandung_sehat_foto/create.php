<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="kelembagaan-header mb-4">
        <div>
            <h1>Upload Foto Kegiatan</h1>
            <p>Upload dokumentasi foto kegiatan Forum Bandung Sehat.</p>
        </div>

        <a href="<?= site_url('forum-bandung-sehat/foto-kegiatan') ?>"
           class="btn btn-light">
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>
    </div>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form action="<?= site_url('forum-bandung-sehat/foto-kegiatan/store') ?>"
                  method="post"
                  enctype="multipart/form-data">

                <?= csrf_field() ?>

                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        Foto Kegiatan
                    </label>

                    <input type="file"
                           name="foto"
                           class="form-control"
                           accept=".jpg,.jpeg,.png,.webp"
                           required>

                    <div class="form-text">
                        Format: JPG, JPEG, PNG, WEBP. Maksimal ukuran 5 MB.
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <a href="<?= site_url('forum-bandung-sehat/foto-kegiatan') ?>"
                       class="btn btn-secondary">
                        Batal
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-upload"></i>
                        Upload Foto
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

<?= $this->endSection() ?>