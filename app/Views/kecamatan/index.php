<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">
                <i class="bi bi-geo-alt me-2"></i>
                Data Kecamatan
            </h4>

            <p class="text-muted mb-0">
                Kelola data kecamatan di wilayah Kota Bandung.
            </p>
        </div>

        <a href="<?= base_url('kecamatan/create') ?>"
           class="btn btn-primary">

            <i class="bi bi-plus-circle me-1"></i>
            Tambah Kecamatan

        </a>

    </div>


    <!-- ALERT SUCCESS -->
    <?php if (session()->getFlashdata('success')) : ?>

        <div class="alert alert-success alert-dismissible fade show"
             role="alert">

            <i class="bi bi-check-circle me-2"></i>

            <?= esc(session()->getFlashdata('success')) ?>

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    <?php endif; ?>


    <!-- ALERT ERROR -->
    <?php if (session()->getFlashdata('error')) : ?>

        <div class="alert alert-danger alert-dismissible fade show"
             role="alert">

            <i class="bi bi-exclamation-triangle me-2"></i>

            <?= esc(session()->getFlashdata('error')) ?>

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    <?php endif; ?>


    <!-- CARD -->
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white border-0 py-3">

            <div class="d-flex align-items-center">

                <div class="bg-primary bg-opacity-10 rounded-3 p-2 me-3">

                    <i class="bi bi-geo-alt text-primary fs-5"></i>

                </div>

                <div>

                    <h6 class="fw-bold mb-0">
                        Daftar Kecamatan
                    </h6>

                    <small class="text-muted">
                        Kode dan nama kecamatan Kota Bandung.
                    </small>

                </div>

            </div>

        </div>


        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th class="text-center" width="60">
                                No
                            </th>

                            <th width="140">
                                Kode
                            </th>

                            <th>
                                Nama Kecamatan
                            </th>

                            <th class="text-center" width="120">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php if (!empty($data)) : ?>

                            <?php $no = 1; ?>

                            <?php foreach ($data as $row) : ?>

                                <tr>

                                    <td class="text-center">
                                        <?= $no++ ?>
                                    </td>


                                    <td>

                                        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2">

                                            <?= esc($row['kode'] ?? '-') ?>

                                        </span>

                                    </td>


                                    <td>

                                        <div class="fw-semibold">
                                            <?= esc($row['nama_kecamatan']) ?>
                                        </div>

                                    </td>


                                    <td class="text-center">

                                        <form action="<?= base_url('kecamatan/delete/' . $row['id']) ?>"
                                              method="post"
                                              class="d-inline"
                                              data-konfirmasi="Apakah Anda yakin ingin menghapus kecamatan ini?">

                                            <?= csrf_field() ?>

                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-danger"
                                                    title="Hapus">

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else : ?>

                            <tr>

                                <td colspan="4"
                                    class="text-center py-5">

                                    <div class="mb-3">

                                        <i class="bi bi-geo-alt text-muted"
                                           style="font-size: 42px;">
                                        </i>

                                    </div>

                                    <h6 class="fw-semibold">
                                        Belum ada data kecamatan
                                    </h6>

                                    <p class="text-muted mb-3">
                                        Silakan tambahkan data kecamatan.
                                    </p>

                                    <a href="<?= base_url('kecamatan/create') ?>"
                                       class="btn btn-primary btn-sm">

                                        <i class="bi bi-plus-circle me-1"></i>
                                        Tambah Kecamatan

                                    </a>

                                </td>

                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>


<style>

    .table thead th {
        font-size: 13px;
        font-weight: 600;
        color: #243447;
        white-space: nowrap;
        padding: 13px 14px;
    }

    .table tbody td {
        font-size: 13px;
        color: #4a5568;
        padding: 13px 14px;
    }

    .table-hover tbody tr:hover {
        background-color: #f8fbff;
    }

    .btn {
        border-radius: 7px;
    }

    .badge {
        font-size: 12px;
        font-weight: 600;
    }

</style>

<?= $this->endSection() ?>
