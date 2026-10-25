<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">
                <i class="bi bi-lightbulb me-2"></i>
                Inovasi Perangkat Daerah
            </h4>

            <p class="text-muted mb-0">
                Daftar inovasi yang dilaksanakan oleh Perangkat Daerah Kota Bandung.
            </p>
        </div>

        <a href="<?= base_url('inovasi/perangkat-daerah/create') ?>"
           class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>
            Tambah Inovasi
        </a>
    </div>


    <!-- ALERT SUCCESS -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
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
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-circle me-2"></i>
            <?= esc(session()->getFlashdata('error')) ?>

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    <?php endif; ?>


    <!-- CARD TABLE -->
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white border-0 py-3">
            <div class="d-flex align-items-center">
                <div class="bg-primary bg-opacity-10 rounded-3 p-2 me-3">
                    <i class="bi bi-building text-primary fs-5"></i>
                </div>

                <div>
                    <h6 class="fw-bold mb-0">
                        Data Inovasi Perangkat Daerah
                    </h6>

                    <small class="text-muted">
                        Kelola data inovasi Perangkat Daerah
                    </small>
                </div>
            </div>
        </div>


        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>
                            <th width="50">No</th>

                            <th>
                                Perangkat Daerah
                            </th>

                            <th>
                                Nama Inovasi
                            </th>

                            <th>
                                Penjelasan
                            </th>

                            <th>
                                Waktu Awal Penerapan
                            </th>

                            <th>
                                Waktu Terakhir Pengembangan
                            </th>

                            <th>
                                Dampak Inovasi
                            </th>

                            <th>
                                Link Data Dukung
                            </th>

                            <th width="150" class="text-center">
                                Aksi
                            </th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php if (!empty($inovasi)) : ?>

                            <?php $no = 1; ?>

                            <?php foreach ($inovasi as $row) : ?>

                                <tr>

                                    <!-- NO -->
                                    <td>
                                        <?= $no++ ?>
                                    </td>


                                    <!-- PERANGKAT DAERAH -->
                                    <td>
                                        <div class="fw-semibold">
                                            <?= esc($row['nama_perangkat_daerah']) ?>
                                        </div>
                                    </td>


                                    <!-- NAMA INOVASI -->
                                    <td>
                                        <div class="fw-semibold text-primary">
                                            <?= esc($row['nama_inovasi']) ?>
                                        </div>
                                    </td>


                                    <!-- PENJELASAN -->
                                    <td>
                                        <div style="min-width: 220px;">
                                            <?= esc($row['penjelasan']) ?>
                                        </div>
                                    </td>


                                    <!-- WAKTU AWAL -->
                                    <td>
                                        <?php if (!empty($row['waktu_awal_penerapan'])) : ?>

                                            <?= date(
                                                'd-m-Y',
                                                strtotime($row['waktu_awal_penerapan'])
                                            ) ?>

                                        <?php else : ?>

                                            <span class="text-muted">
                                                -
                                            </span>

                                        <?php endif; ?>
                                    </td>


                                    <!-- WAKTU TERAKHIR -->
                                    <td>
                                        <?php if (!empty($row['waktu_terakhir_pengembangan'])) : ?>

                                            <?= date(
                                                'd-m-Y',
                                                strtotime($row['waktu_terakhir_pengembangan'])
                                            ) ?>

                                        <?php else : ?>

                                            <span class="text-muted">
                                                -
                                            </span>

                                        <?php endif; ?>
                                    </td>


                                    <!-- DAMPAK -->
                                    <td>
                                        <div style="min-width: 220px;">
                                            <?= esc($row['dampak_inovasi']) ?>
                                        </div>
                                    </td>


                                    <!-- LINK DATA DUKUNG -->
                                    <td>

                                        <?php if (!empty($row['link_data_dukung'])) : ?>

                                            <a href="<?= esc($row['link_data_dukung']) ?>"
                                               target="_blank"
                                               rel="noopener noreferrer"
                                               class="btn btn-sm btn-outline-primary">

                                                <i class="bi bi-link-45deg me-1"></i>
                                                Lihat

                                            </a>

                                        <?php else : ?>

                                            <span class="text-muted">
                                                -
                                            </span>

                                        <?php endif; ?>

                                    </td>


                                    <!-- AKSI -->
                                    <td class="text-center">

                                        <div class="d-flex justify-content-center gap-1">

                                            <!-- EDIT -->
                                            <a href="<?= base_url(
                                                'inovasi/perangkat-daerah/edit/' . $row['id']
                                            ) ?>"
                                               class="btn btn-sm btn-outline-warning"
                                               title="Edit">

                                                <i class="bi bi-pencil"></i>

                                            </a>


                                            <!-- HAPUS -->
                                            <a href="<?= base_url(
                                                'inovasi/perangkat-daerah/delete/' . $row['id']
                                            ) ?>"
                                               class="btn btn-sm btn-outline-danger"
                                               title="Hapus"
                                               data-konfirmasi="Apakah Anda yakin ingin menghapus data inovasi ini?">

                                                <i class="bi bi-trash"></i>

                                            </a>

                                        </div>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else : ?>

                            <tr>

                                <td colspan="9" class="text-center py-5">

                                    <div class="text-muted">

                                        <i class="bi bi-inbox fs-1 d-block mb-3"></i>

                                        <div class="fw-semibold">
                                            Belum ada data inovasi.
                                        </div>

                                        <small>
                                            Silakan tambahkan inovasi Perangkat Daerah.
                                        </small>

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


<style>

    .table thead th {
        font-size: 13px;
        font-weight: 600;
        color: #243447;
        white-space: nowrap;
    }

    .table tbody td {
        font-size: 13px;
        color: #4a5568;
    }

    .table-hover tbody tr:hover {
        background-color: #f8fbff;
    }

</style>

<?= $this->endSection() ?>