<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .periode-card {
        background: #ffffff;
        border: 1px solid #dbe8f5;
        border-radius: 14px;
        padding: 22px 26px;
        margin-bottom: 20px;
        box-shadow: 0 2px 8px rgba(0, 60, 120, 0.05);
    }

    .periode-header {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 18px;
    }

    .periode-icon {
        width: 44px;
        height: 44px;
        border-radius: 10px;
        background: #eaf3ff;
        color: #0b4f9c;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    .periode-header h3 {
        margin: 0;
        color: #0b4f9c;
        font-size: 18px;
        font-weight: 700;
    }

    .periode-header p {
        margin: 4px 0 0;
        color: #718096;
        font-size: 13px;
    }

    .periode-buttons {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .btn-periode {
        min-width: 160px;
        padding: 12px 22px;
        border: 1px solid #c9dff5;
        background: #ffffff;
        color: #0b4f9c;
        border-radius: 9px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        text-align: center;
        transition: all 0.2s ease;
    }

    .btn-periode:hover {
        background: #eaf3ff;
        border-color: #1687e8;
        color: #0b4f9c;
        transform: translateY(-1px);
    }

    .btn-periode.active {
        background: #0b4f9c;
        color: #ffffff;
        border-color: #0b4f9c;
    }
</style>


<div class="container-fluid">

    <!-- HEADER -->
    <div class="kelembagaan-header mb-4">

        <div>
            <h1>Realisasi Kegiatan & Pendanaan</h1>
            <p>Forum Kecamatan Sehat</p>
        </div>

        <a href="<?= site_url('forum-kecamatan-sehat/create') ?>"
           class="btn">

            <i class="bi bi-arrow-left"></i>
            Kembali ke Menu

        </a>

    </div>


    <!-- =====================================================
         DATA REALISASI
    ====================================================== -->
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>

                    <h4 class="mb-1">
                        Data Realisasi Kegiatan
                    </h4>

                    <p class="text-muted mb-0">
                        Daftar realisasi kegiatan dan pendanaan.
                    </p>

                </div>

                <a href="<?= site_url('forum-kecamatan-sehat/realisasi/create') ?>"
                   class="btn btn-primary">

                    <i class="bi bi-plus-circle"></i>
                    Tambah Data

                </a>

            </div>


            <!-- SUCCESS -->
            <?php if (session()->getFlashdata('success')): ?>

                <div class="alert alert-success">
                    <?= esc(session()->getFlashdata('success')) ?>
                </div>

            <?php endif; ?>


            <!-- ERROR -->
            <?php if (session()->getFlashdata('error')): ?>

                <div class="alert alert-danger">
                    <?= esc(session()->getFlashdata('error')) ?>
                </div>

            <?php endif; ?>


            <?php if (empty($data)): ?>

                <div class="text-center py-5">

                    <i class="bi bi-clipboard-data"
                       style="font-size: 64px; color: #b8c9d9;">
                    </i>

                    <h5 class="mt-3 text-muted">
                        Belum ada data realisasi kegiatan
                    </h5>

                    <p class="text-muted">
                        Silakan tambahkan data realisasi kegiatan.
                    </p>

                </div>

            <?php else: ?>

                <div class="table-responsive">

                    <table class="table table-bordered table-hover align-middle mb-0">

                        <thead>

                            <tr>

                                <th width="55">No</th>

                                <?php if ($isAdmin): ?>

                                    <th>Kecamatan</th>

                                <?php endif; ?>

                                <th width="85">Tahun</th>

                                <th>Nama Kegiatan</th>

                                <th width="120">Waktu</th>

                                <th>Peserta</th>

                                <th>Hasil Pelaksanaan</th>

                                <th width="145">Anggaran</th>

                                <th width="130">Pendanaan</th>

                                <th>Link Drive</th>

                                <th>Data Dukung</th>

                                <th width="125">Aksi</th>

                            </tr>

                        </thead>


                        <tbody>

                            <?php foreach ($data as $i => $row): ?>

                                <tr>

                                    <td>
                                        <?= $i + 1 ?>
                                    </td>


                                    <?php if ($isAdmin): ?>

                                        <td>
                                            <?= esc(
                                                $row['nama_kecamatan'] ?? '-'
                                            ) ?>
                                        </td>

                                    <?php endif; ?>


                                    <td>

                                        <span class="badge bg-primary">

                                            <?= esc($row['tahun']) ?>

                                        </span>

                                    </td>


                                    <td>

                                        <strong>
                                            <?= esc($row['nama_kegiatan']) ?>
                                        </strong>

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

                                        <?= nl2br(
                                            esc($row['peserta'] ?: '-')
                                        ) ?>

                                    </td>


                                    <td>

                                        <?= nl2br(
                                            esc(
                                                $row['hasil_pelaksanaan']
                                                    ?: '-'
                                            )
                                        ) ?>

                                    </td>


                                    <td>

                                        Rp <?= number_format(
                                            (float) (
                                                $row['anggaran'] ?? 0
                                            ),
                                            0,
                                            ',',
                                            '.'
                                        ) ?>

                                    </td>


                                    <td>

                                        <?= esc(
                                            $row['sumber_pendanaan'] ?: '-'
                                        ) ?>

                                    </td>


                                    <td>

                                        <?php if (!empty($row['link_drive'])): ?>

                                            <a href="<?= esc($row['link_drive']) ?>"
                                               target="_blank"
                                               class="btn btn-sm btn-outline-primary">

                                                <i class="bi bi-link-45deg"></i>
                                                Buka

                                            </a>

                                        <?php else: ?>

                                            -

                                        <?php endif; ?>

                                    </td>


                                    <td>

                                        <?= nl2br(
                                            esc(
                                                $row['data_dukung'] ?: '-'
                                            )
                                        ) ?>

                                    </td>


                                    <td>

                                        <div class="d-flex gap-1">

                                            <a href="<?= site_url('forum-kecamatan-sehat/realisasi/edit/' . $row['id']) ?>"
                                               class="btn btn-sm btn-warning">

                                                <i class="bi bi-pencil"></i>

                                            </a>


                                            <form action="<?= site_url('forum-kecamatan-sehat/realisasi/delete/' . $row['id']) ?>"
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