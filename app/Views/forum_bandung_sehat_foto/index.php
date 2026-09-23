<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="kelembagaan-header mb-4">
        <div>
            <h1>Foto Kegiatan</h1>
            <p>Dokumentasi foto kegiatan Forum Bandung Sehat.</p>
        </div>

        <a href="<?= site_url('forum-bandung-sehat/create') ?>"
           class="btn btn-light">
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="mb-1">Foto Kegiatan Forum Bandung Sehat</h4>
                    <p class="text-muted mb-0">
                        Maksimal 1 foto dengan ukuran maksimal 5 MB.
                    </p>
                </div>

                <?php if (empty($data)): ?>
                    <a href="<?= site_url('forum-bandung-sehat/foto-kegiatan/create') ?>"
                       class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i>
                        Upload Foto
                    </a>
                <?php endif; ?>
            </div>

            <?php if (empty($data)): ?>

                <div class="text-center py-5">
                <div
                    style="
                        width: 90px;
                        height: 90px;
                        margin: 0 auto 20px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        border-radius: 22px;
                        background: #e8f3ff;
                        color: #087cf0;
                    "
                >
                    <i class="bi bi-images" style="font-size: 48px;"></i>
                </div>

                <h5
                    class="mt-3"
                    style="
                        color: #063b78;
                        font-weight: 800;
                        font-size: 20px;
                    "
                >
                    Belum ada foto kegiatan
                </h5>

                <p
                    style="
                        color: #7890aa;
                        font-size: 15px;
                        margin-bottom: 0;
                    "
                >
                    Silakan upload foto kegiatan Forum Bandung Sehat.
                </p>
            </div>

            <?php else: ?>

                <div class="row">
                    <?php foreach ($data as $foto): ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="card border rounded-4 overflow-hidden">

                                <img src="<?= base_url($foto['file_path']) ?>"
                                     alt="Foto Kegiatan"
                                     class="img-fluid"
                                     style="height:240px; width:100%; object-fit:cover;">

                                <div class="card-body">
                                    <h6 class="text-truncate">
                                        <?= esc($foto['nama_asli']) ?>
                                    </h6>

                                    <small class="text-muted d-block mb-3">
                                        Ukuran:
                                        <?= number_format($foto['ukuran_file'] / 1024, 2) ?>
                                        KB
                                    </small>

                                    <div class="d-flex gap-2">
                                        <a href="<?= site_url('forum-bandung-sehat/foto-kegiatan/view/' . $foto['id']) ?>"
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-download"></i>
                                            Lihat
                                        </a>

                                        <form action="<?= site_url('forum-bandung-sehat/foto-kegiatan/delete/' . $foto['id']) ?>"
                                              method="post"
                                              onsubmit="return confirm('Yakin ingin menghapus foto ini?')">

                                            <?= csrf_field() ?>

                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-danger">
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