<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="kelembagaan-header mb-4">
        <div>
            <h1>Foto Kegiatan</h1>
            <p>Forum Kecamatan Sehat</p>
        </div>

        <a href="<?= site_url('forum-kecamatan-sehat/create') ?>"
           class="btn">
            <i class="bi bi-arrow-left"></i>
            Kembali ke Menu
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="mb-1">
                        Dokumentasi Foto Kegiatan
                    </h4>

                    <p class="text-muted mb-0">
                        Maksimal satu foto dengan ukuran maksimal 5 MB.
                    </p>
                </div>

                <?php if (empty($data)): ?>
                    <a href="<?= site_url('forum-kecamatan-sehat/foto-kegiatan/create') ?>"
                       class="btn btn-primary">
                        <i class="bi bi-upload"></i>
                        Upload Foto
                    </a>
                <?php endif; ?>
            </div>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= esc(session()->getFlashdata('success')) ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= esc(session()->getFlashdata('error')) ?>
                </div>
            <?php endif; ?>

            <?php if (empty($data)): ?>

                <div class="text-center py-5">
                    <i class="bi bi-image"
                       style="font-size: 64px; color: #b8c9d9;"></i>

                    <h5 class="mt-3 text-muted">
                        Belum ada foto kegiatan
                    </h5>

                    <p class="text-muted">
                        Silakan unggah foto dokumentasi kegiatan.
                    </p>
                </div>

            <?php else: ?>

                <div class="row g-4">

                    <?php foreach ($data as $row): ?>

                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 border-0 shadow-sm">

                                <div class="card-body">

                                    <?php if ($isAdmin): ?>
                                        <span class="badge bg-primary mb-2">
                                            <?= esc(
                                                $row['nama_kecamatan'] ?? '-'
                                            ) ?>
                                        </span>
                                    <?php endif; ?>

                                    <div class="mb-3">
                                        <i class="bi bi-file-earmark-image me-2"></i>
                                        <?= esc($row['nama_asli']) ?>
                                    </div>

                                    <small class="text-muted d-block mb-3">
                                        Ukuran:
                                        <?= number_format(
                                            ((int) $row['ukuran_file']) / 1024,
                                            2
                                        ) ?>
                                        KB
                                    </small>

                                    <div class="d-flex gap-2">

                                        <a href="<?= site_url('forum-kecamatan-sehat/foto-kegiatan/view/' . $row['id']) ?>"
                                           target="_blank"
                                           class="btn btn-sm btn-primary">
                                            <i class="bi bi-eye"></i>
                                            Lihat
                                        </a>

                                        <form action="<?= site_url('forum-kecamatan-sehat/foto-kegiatan/delete/' . $row['id']) ?>"
                                              method="post"
                                              onsubmit="return confirm('Yakin ingin menghapus foto ini?')">

                                            <?= csrf_field() ?>

                                            <button type="submit"
                                                    class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </div>

                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>

            <?php endif; ?>

        </div>
    </div>

</div>

<?= $this->endSection() ?>