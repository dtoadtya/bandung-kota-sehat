<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Realisasi Kegiatan Tim Pembina
            </h3>

            <p class="text-muted mb-0">
                <?= esc($namaPeriode) ?>
            </p>

        </div>

        <div class="d-flex gap-2">

            <a
                href="<?= base_url('tim-pembina/realisasi') ?>"
                class="btn btn-outline-secondary"
            >
                <i class="bi bi-arrow-left"></i>
                Kembali
            </a>

            <a
                href="<?= base_url('tim-pembina/realisasi/create/' . $periode) ?>"
                class="btn btn-primary"
            >
                <i class="bi bi-plus-lg"></i>
                Tambah Realisasi
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

                            <th width="100">
                                Tahun
                            </th>

                            <th width="200">
                                Nama Kegiatan
                            </th>

                            <th width="150">
                                Waktu Kegiatan
                            </th>

                            <th width="160">
                                Peserta
                            </th>

                            <th width="220">
                                Hasil Pelaksanaan
                            </th>

                            <th width="150">
                                Anggaran
                            </th>

                            <th width="150">
                                Sumber Pendanaan
                            </th>

                            <th width="130">
                                Link Drive
                            </th>

                            <th width="200">
                                Data Dukung
                            </th>

                            <th width="220">
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
                                            <?= esc($row['tahun'] ?? '-') ?>
                                        </span>
                                    </td>

                                    <td>
                                        <div class="fw-semibold">
                                            <?= esc($row['nama_kegiatan'] ?? '-') ?>
                                        </div>
                                    </td>

                                    <td>

                                        <?= !empty($row['waktu_kegiatan'])
                                            ? date(
                                                'd-m-Y',
                                                strtotime($row['waktu_kegiatan'])
                                            )
                                            : '-' ?>

                                    </td>

                                    <td>
                                        <?= esc($row['peserta'] ?? '-') ?>
                                    </td>

                                    <td>
                                        <?= esc($row['hasil_pelaksanaan'] ?? '-') ?>
                                    </td>

                                    <td>

                                        <?php
                                        $anggaran = $row['anggaran'] ?? '';

                                        if (
                                            $anggaran !== ''
                                            && $anggaran !== null
                                        ) {
                                            echo 'Rp ' . number_format(
                                                (float) $anggaran,
                                                0,
                                                ',',
                                                '.'
                                            );
                                        } else {
                                            echo '-';
                                        }
                                        ?>

                                    </td>

                                    <td>
                                        <?= esc($row['sumber_pendanaan'] ?? '-') ?>
                                    </td>

                                    <td>

                                        <?php if (!empty($row['link_drive'])): ?>

                                            <a
                                                href="<?= esc($row['link_drive']) ?>"
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                class="text-primary"
                                            >
                                                Lihat Link
                                            </a>

                                        <?php else: ?>

                                            -

                                        <?php endif; ?>

                                    </td>

                                    <td>
                                        <?= esc($row['data_dukung'] ?? '-') ?>
                                    </td>

                                    <td>

                                        <div class="d-flex gap-1">

                                            <a
                                                href="<?= base_url('tim-pembina/realisasi/edit/' . $row['id']) ?>"
                                                class="btn btn-sm btn-outline-primary"
                                            >
                                                <i class="bi bi-pencil"></i>
                                                Edit
                                            </a>

                                            <form
                                                action="<?= base_url('tim-pembina/realisasi/delete/' . $row['id']) ?>"
                                                method="post"
                                                style="display:inline;"
                                                data-konfirmasi="Apakah Anda yakin ingin menghapus data ini?"
                                            >

                                                <?= csrf_field() ?>

                                                <button
                                                    type="submit"
                                                    class="btn btn-sm btn-outline-danger"
                                                >
                                                    <i class="bi bi-trash"></i>
                                                    Hapus
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <tr>

                                <td
                                    colspan="11"
                                    class="text-center py-5"
                                >

                                    <i
                                        class="bi bi-folder2-open fs-1 text-muted"
                                    ></i>

                                    <div class="mt-2 text-muted">
                                        Belum ada data realisasi kegiatan
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
