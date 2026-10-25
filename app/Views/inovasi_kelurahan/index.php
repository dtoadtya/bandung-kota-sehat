<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">
                <i class="bi bi-lightbulb me-2"></i>
                Inovasi Kelurahan
            </h4>

            <p class="text-muted mb-0">
                Kelola data inovasi yang dilaksanakan oleh Kelurahan Kota Bandung.
            </p>
        </div>

        <a href="<?= base_url('inovasi/kelurahan/create') ?>"
           class="btn btn-primary">

            <i class="bi bi-plus-circle me-1"></i>
            Tambah Inovasi

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

                    <i class="bi bi-house-fill text-primary fs-5"></i>

                </div>

                <div>

                    <h6 class="fw-bold mb-0">
                        Daftar Inovasi Kelurahan
                    </h6>

                    <small class="text-muted">
                        Data inovasi berdasarkan Kecamatan, Kelurahan dan tahun pelaksanaan.
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

                            <th>
                                Kecamatan
                            </th>

                            <th>
                                Kelurahan
                            </th>

                            <th>
                                Nama Inovasi
                            </th>

                            <th>
                                Tahun
                            </th>

                            <th>
                                Deskripsi
                            </th>

                            <th>
                                Tujuan
                            </th>

                            <th>
                                Manfaat
                            </th>

                            <th>
                                Data Dukung
                            </th>

                            <th class="text-center" width="150">
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

                                        <div class="fw-semibold">
                                            <?= esc($row['nama_kecamatan']) ?>
                                        </div>

                                    </td>


                                    <td>

                                        <div class="fw-semibold">
                                            <?= esc($row['nama_kelurahan']) ?>
                                        </div>

                                    </td>


                                    <td>

                                        <div class="fw-semibold">
                                            <?= esc($row['nama_inovasi']) ?>
                                        </div>

                                    </td>


                                    <td>

                                        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2">

                                            <?= esc($row['tahun']) ?>

                                        </span>

                                    </td>


                                    <td>

                                        <?php
                                        $deskripsi = $row['deskripsi'] ?? '';
                                        ?>

                                        <?php if ($deskripsi) : ?>

                                            <?= esc(
                                                strlen($deskripsi) > 100
                                                    ? substr($deskripsi, 0, 100) . '...'
                                                    : $deskripsi
                                            ) ?>

                                        <?php else : ?>

                                            <span class="text-muted">
                                                -
                                            </span>

                                        <?php endif; ?>

                                    </td>


                                    <td>

                                        <?php
                                        $tujuan = $row['tujuan'] ?? '';
                                        ?>

                                        <?php if ($tujuan) : ?>

                                            <?= esc(
                                                strlen($tujuan) > 100
                                                    ? substr($tujuan, 0, 100) . '...'
                                                    : $tujuan
                                            ) ?>

                                        <?php else : ?>

                                            <span class="text-muted">
                                                -
                                            </span>

                                        <?php endif; ?>

                                    </td>


                                    <td>

                                        <?php
                                        $manfaat = $row['manfaat'] ?? '';
                                        ?>

                                        <?php if ($manfaat) : ?>

                                            <?= esc(
                                                strlen($manfaat) > 100
                                                    ? substr($manfaat, 0, 100) . '...'
                                                    : $manfaat
                                            ) ?>

                                        <?php else : ?>

                                            <span class="text-muted">
                                                -
                                            </span>

                                        <?php endif; ?>

                                    </td>


                                    <td>

                                        <?php if (!empty($row['link_data_dukung'])) : ?>

                                            <a href="<?= esc($row['link_data_dukung']) ?>"
                                               target="_blank"
                                               class="btn btn-sm btn-outline-primary">

                                                <i class="bi bi-box-arrow-up-right me-1"></i>
                                                Lihat

                                            </a>

                                        <?php else : ?>

                                            <span class="text-muted">
                                                -
                                            </span>

                                        <?php endif; ?>

                                    </td>


                                    <td class="text-center">

                                        <div class="d-flex justify-content-center gap-1">

                                            <a href="<?= base_url('inovasi/kelurahan/edit/' . $row['id']) ?>"
                                               class="btn btn-sm btn-outline-warning"
                                               title="Ubah">

                                                <i class="bi bi-pencil-square"></i>

                                            </a>


                                            <form action="<?= base_url('inovasi/kelurahan/delete/' . $row['id']) ?>"
                                                  method="post"
                                                  class="d-inline"
                                                  data-konfirmasi="Apakah Anda yakin ingin menghapus data inovasi ini?">

                                                <?= csrf_field() ?>

                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-danger"
                                                        title="Hapus">

                                                    <i class="bi bi-trash"></i>

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else : ?>

                            <tr>

                                <td colspan="10"
                                    class="text-center py-5">

                                    <div class="mb-3">

                                        <i class="bi bi-house-fill text-muted"
                                           style="font-size: 42px;">
                                        </i>

                                    </div>

                                    <h6 class="fw-semibold">
                                        Belum ada data inovasi
                                    </h6>

                                    <p class="text-muted mb-3">
                                        Silakan tambahkan data inovasi Kelurahan.
                                    </p>

                                    <a href="<?= base_url('inovasi/kelurahan/create') ?>"
                                       class="btn btn-primary btn-sm">

                                        <i class="bi bi-plus-circle me-1"></i>
                                        Tambah Inovasi

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