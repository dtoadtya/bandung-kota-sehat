<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="kelembagaan-header mb-4">
        <div>
            <h1>Rencana Kerja</h1>
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
                        Data Rencana Kerja
                    </h4>

                    <p class="text-muted mb-0">
                        Rencana kerja Forum Kecamatan Sehat berdasarkan tahun.
                    </p>
                </div>

                <a href="<?= site_url('forum-kecamatan-sehat/rencana-kerja/create') ?>"
                   class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i>
                    Tambah Data
                </a>
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
                    <i class="bi bi-journal-text"
                       style="font-size: 64px; color: #b8c9d9;"></i>

                    <h5 class="mt-3 text-muted">
                        Belum ada rencana kerja
                    </h5>

                    <p class="text-muted">
                        Silakan tambahkan rencana kerja terlebih dahulu.
                    </p>
                </div>

            <?php else: ?>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle mb-0">

                        <thead>
                            <tr>
                                <th width="60">No</th>

                                <?php if ($isAdmin): ?>
                                    <th>Kecamatan</th>
                                <?php endif; ?>

                                <th width="100">Tahun</th>
                                <th>Rencana Kerja</th>
                                <th width="130">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($data as $i => $row): ?>
                                <tr>
                                    <td><?= $i + 1 ?></td>

                                    <?php if ($isAdmin): ?>
                                        <td>
                                            <strong>
                                                <?= esc($row['nama_kecamatan'] ?? '-') ?>
                                            </strong>
                                        </td>
                                    <?php endif; ?>

                                    <td>
                                        <span class="badge bg-primary">
                                            <?= esc($row['tahun']) ?>
                                        </span>
                                    </td>

                                    <td>
                                        <?= nl2br(
                                            esc($row['data_rencana'] ?: '-')
                                        ) ?>
                                    </td>

                                    <td>
                                        <div class="d-flex gap-1">

                                            <a href="<?= site_url('forum-kecamatan-sehat/rencana-kerja/edit/' . $row['id']) ?>"
                                               class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <form action="<?= site_url('forum-kecamatan-sehat/rencana-kerja/delete/' . $row['id']) ?>"
                                                  method="post"
                                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                                <?= csrf_field() ?>

                                                <button type="submit"
                                                        class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>

                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>

            <?php endif; ?>

        </div>
    </div>

</div>

<?= $this->endSection() ?>