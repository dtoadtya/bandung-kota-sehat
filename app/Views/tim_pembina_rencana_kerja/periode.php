<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Rencana Kerja Tim Pembina
            </h3>

            <p class="text-muted mb-0">

                <?php if ($periode === 'ganjil'): ?>

                    Tahun Ganjil

                <?php else: ?>

                    Tahun Genap

                <?php endif; ?>

            </p>

        </div>

        <div class="d-flex gap-2">

            <a
                href="<?= base_url('tim-pembina/rencana-kerja') ?>"
                class="btn btn-outline-secondary"
            >
                <i class="bi bi-arrow-left"></i>
                Kembali
            </a>

            <a
                href="<?= base_url('tim-pembina/rencana-kerja/create/' . $periode) ?>"
                class="btn btn-primary"
            >
                <i class="bi bi-upload"></i>
                Upload File
            </a>

        </div>

    </div>


    <!-- DATA -->
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>

                            <th width="70">
                                No
                            </th>

                            <th width="120">
                                Tahun
                            </th>

                            <th>
                                Nama File
                            </th>

                            <th width="180">
                                Tanggal Unggah
                            </th>

                            <th width="260">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php if (!empty($data)): ?>

                            <?php foreach ($data as $i => $row): ?>

                                <tr>

                                    <td>
                                        <?= $i + 1 ?>
                                    </td>

                                    <td>
                                        <span class="badge bg-primary">
                                            <?= esc($row['tahun']) ?>
                                        </span>
                                    </td>

                                    <td>

                                        <div class="fw-semibold">

                                            <i
                                                class="bi bi-file-earmark-text text-primary me-2"
                                            ></i>

                                            <?= esc($row['nama_asli']) ?>

                                        </div>

                                    </td>

                                    <td>

                                        <?php
                                        if (!empty($row['created_at'])) {
                                            echo date(
                                                'd-m-Y',
                                                strtotime($row['created_at'])
                                            );
                                        }
                                        ?>

                                    </td>

                                    <td>

                                        <div class="d-flex gap-1">

                                            <a
                                                href="<?= base_url('tim-pembina/rencana-kerja/view/' . $row['id']) ?>"
                                                class="btn btn-sm btn-outline-primary"
                                                target="_blank"
                                            >
                                                <i class="bi bi-eye"></i>
                                                Lihat
                                            </a>

                                            <a
                                                href="<?= base_url('tim-pembina/rencana-kerja/download/' . $row['id']) ?>"
                                                class="btn btn-sm btn-outline-success"
                                            >
                                                <i class="bi bi-download"></i>
                                                Unduh
                                            </a>

                                            <a
                                                href="<?= base_url('tim-pembina/rencana-kerja/delete/' . $row['id']) ?>"
                                                class="btn btn-sm btn-outline-danger"
                                                data-konfirmasi="Apakah Anda yakin ingin menghapus file ini?"
                                            >
                                                <i class="bi bi-trash"></i>
                                                Hapus
                                            </a>

                                        </div>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <tr>

                                <td
                                    colspan="5"
                                    class="text-center py-5"
                                >

                                    <i
                                        class="bi bi-folder2-open fs-1 text-muted"
                                    ></i>

                                    <div class="mt-2 text-muted">
                                        Belum ada Rencana Kerja
                                        untuk periode ini.
                                    </div>

                                </td>

                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>