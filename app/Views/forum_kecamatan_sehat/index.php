<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .fks-page {
        background: #f4f8fd;
        min-height: calc(100vh - 70px);
        padding: 32px 24px 40px;
    }

    .fks-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 20px;
        margin-bottom: 28px;
    }

    .fks-title {
        margin: 0;
        color: #07366d;
        font-size: 34px;
        font-weight: 800;
        line-height: 1.2;
    }

    .fks-subtitle {
        margin: 10px 0 0;
        color: #718096;
        font-size: 15px;
    }

    .btn-fks-add {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #0b7ff3;
        color: #ffffff;
        border: none;
        border-radius: 10px;
        padding: 13px 20px;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.2s ease;
        white-space: nowrap;
    }

    .btn-fks-add:hover {
        background: #07366d;
        color: #ffffff;
        transform: translateY(-1px);
    }

    .btn-fks-add .plus-icon {
        width: 18px;
        height: 18px;
        border: 1.8px solid #ffffff;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        line-height: 1;
    }

    .fks-card {
        background: #ffffff;
        border: 1px solid #dce8f5;
        border-radius: 16px;
        box-shadow: 0 5px 18px rgba(26, 70, 110, 0.06);
        overflow: hidden;
    }

    .fks-card-header {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 27px 28px;
        border-bottom: 1px solid #e7eef6;
    }

    .fks-card-icon {
        width: 49px;
        height: 49px;
        border-radius: 13px;
        background: #e8f3ff;
        color: #087cf0;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .fks-card-icon svg {
        width: 27px;
        height: 27px;
    }

    .fks-card-title {
        margin: 0;
        color: #07366d;
        font-size: 24px;
        font-weight: 800;
        line-height: 1.2;
    }

    .fks-card-description {
        margin: 6px 0 0;
        color: #718096;
        font-size: 14px;
    }

    .fks-empty {
        min-height: 285px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 45px 20px;
    }

    .fks-empty-icon {
        width: 90px;
        height: 90px;
        border-radius: 20px;
        background: #e8f3ff;
        color: #087cf0;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 22px;
    }

    .fks-empty-icon svg {
        width: 53px;
        height: 53px;
    }

    .fks-empty-title {
        margin: 0;
        color: #07366d;
        font-size: 20px;
        font-weight: 800;
    }

    .fks-empty-text {
        margin: 10px 0 0;
        color: #718096;
        font-size: 14px;
    }

    .fks-alert {
        border-radius: 10px;
        margin-bottom: 20px;
    }

    /* Tampilan ketika data sudah tersedia */
    .fks-data-wrapper {
        padding: 24px 28px 28px;
    }

    .fks-table {
        width: 100%;
        border-collapse: collapse;
    }

    .fks-table th {
        background: #f4f8fd;
        color: #07366d;
        font-size: 13px;
        font-weight: 700;
        padding: 14px 12px;
        border-bottom: 1px solid #dce8f5;
        text-align: left;
    }

    .fks-table td {
        color: #4a5568;
        font-size: 14px;
        padding: 14px 12px;
        border-bottom: 1px solid #edf2f7;
        vertical-align: middle;
    }

    .fks-table tr:last-child td {
        border-bottom: none;
    }

    .fks-action {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 7px 11px;
        border-radius: 7px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 700;
    }

    .fks-action-view {
        color: #0b7ff3;
        background: #eaf3ff;
    }

    .fks-action-edit {
        color: #159957;
        background: #e9f8f0;
    }

    .fks-action-delete {
        color: #d9534f;
        background: #fff0ef;
        border: none;
        cursor: pointer;
    }

    @media (max-width: 768px) {

        .fks-page {
            padding: 24px 16px;
        }

        .fks-header {
            flex-direction: column;
        }

        .btn-fks-add {
            width: 100%;
            justify-content: center;
        }

        .fks-title {
            font-size: 28px;
        }

        .fks-card-header {
            padding: 22px 20px;
        }

        .fks-card-title {
            font-size: 20px;
        }

        .fks-empty {
            min-height: 250px;
        }

        .fks-table {
            min-width: 700px;
        }
    }
</style>


<div class="fks-page">

    <!-- HEADER HALAMAN -->
    <div class="fks-header">

        <div>
            <h1 class="fks-title">
                Forum Kecamatan Sehat
            </h1>

            <p class="fks-subtitle">
                Pengelolaan data Forum Kecamatan Sehat.
            </p>
        </div>


        <a href="<?= base_url('forum-kecamatan-sehat/create') ?>"
           class="btn-fks-add">

            <span class="plus-icon">+</span>

            Tambah Data

        </a>

    </div>


    <!-- PESAN BERHASIL -->
    <?php if (session()->getFlashdata('success')) : ?>

        <div class="alert alert-success fks-alert">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>

    <?php endif; ?>


    <!-- PESAN ERROR -->
    <?php if (session()->getFlashdata('error')) : ?>

        <div class="alert alert-danger fks-alert">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>

    <?php endif; ?>


    <!-- CARD DATA -->
    <div class="fks-card">

        <!-- HEADER CARD -->
        <div class="fks-card-header">

            <div class="fks-card-icon">

                <svg viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="1.8"
                     stroke-linecap="round"
                     stroke-linejoin="round">

                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>

                    <circle cx="9" cy="7" r="4"></circle>

                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>

                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>

                </svg>

            </div>


            <div>

                <h2 class="fks-card-title">
                    Data Forum Kecamatan Sehat
                </h2>

                <p class="fks-card-description">
                    Daftar anggota dan informasi Forum Kecamatan Sehat.
                </p>

            </div>

        </div>


        <?php if (!empty($data)) : ?>

            <!-- DATA SUDAH ADA -->
            <div class="fks-data-wrapper">

                <div class="table-responsive">

                    <table class="fks-table">

                        <thead>

                            <tr>

                                <th width="60">
                                    No
                                </th>

                                <th>
                                    Kecamatan
                                </th>

                                <th>
                                    Nama Ketua
                                </th>

                                <th>
                                    Periode
                                </th>

                                <th>
                                    Keterangan
                                </th>

                                <th width="180">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            <?php $no = 1; ?>

                            <?php foreach ($data as $row) : ?>

                                <tr>

                                    <td>
                                        <?= $no++ ?>
                                    </td>


                                    <td>
                                        <?= esc(
                                            $row['nama_kecamatan']
                                            ?? '-'
                                        ) ?>
                                    </td>


                                    <td>
                                        <?= esc(
                                            $row['nama_ketua']
                                            ?? '-'
                                        ) ?>
                                    </td>


                                    <td>
                                        <?= esc(
                                            $row['periode']
                                            ?? '-'
                                        ) ?>
                                    </td>


                                    <td>
                                        <?= esc(
                                            $row['keterangan']
                                            ?? '-'
                                        ) ?>
                                    </td>


                                    <td>

                                        <?php if (!empty($row['id'])) : ?>

                                            <a href="<?= base_url(
                                                'forum-kecamatan-sehat/edit/'
                                                . $row['id']
                                            ) ?>"
                                               class="fks-action fks-action-edit">

                                                Edit

                                            </a>

                                            <form action="<?= base_url(
                                                'forum-kecamatan-sehat/delete/'
                                                . $row['id']
                                            ) ?>"
                                                  method="post"
                                                  style="display:inline;"
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">

                                                <?= csrf_field() ?>

                                                <button type="submit"
                                                        class="fks-action fks-action-delete">

                                                    Hapus

                                                </button>

                                            </form>

                                        <?php endif; ?>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            </div>


        <?php else : ?>

            <!-- KONDISI BELUM ADA DATA -->
            <div class="fks-empty">

                <div class="fks-empty-icon">

                    <svg viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="1.7"
                         stroke-linecap="round"
                         stroke-linejoin="round">

                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>

                        <circle cx="9" cy="7" r="4"></circle>

                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>

                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>

                    </svg>

                </div>


                <h3 class="fks-empty-title">
                    Belum ada data Forum Kecamatan Sehat
                </h3>


                <p class="fks-empty-text">
                    Silakan tambahkan data Forum Kecamatan Sehat terlebih dahulu.
                </p>

            </div>

        <?php endif; ?>

    </div>

</div>


<?= $this->endSection() ?>