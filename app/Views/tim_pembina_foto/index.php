<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 28px;
    }

    .page-header h1 {
        margin: 0;
        color: #063b78;
        font-size: 36px;
        font-weight: 800;
    }

    .page-header p {
        margin: 8px 0 0;
        color: #7186a0;
        font-size: 16px;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 20px;
        border: 1px solid #d5e2ef;
        border-radius: 10px;
        background: #ffffff;
        color: #174d83;
        text-decoration: none;
        font-weight: 700;
        white-space: nowrap;
    }

    .btn-back:hover {
        background: #f0f7ff;
        color: #063b78;
    }

    .content-card {
        background: #ffffff;
        border: 1px solid #e0ebf5;
        border-radius: 16px;
        box-shadow: 0 5px 18px rgba(22, 73, 121, 0.06);
        overflow: hidden;
        margin-bottom: 24px;
    }

    .card-header-custom {
        padding: 24px 28px;
        border-bottom: 1px solid #edf2f7;
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .card-icon {
        width: 46px;
        height: 46px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #e8f3ff;
        color: #087cf0;
        font-size: 23px;
    }

    .card-header-custom h2 {
        margin: 0;
        color: #063b78;
        font-size: 21px;
        font-weight: 800;
    }

    .card-header-custom p {
        margin: 5px 0 0;
        color: #7890aa;
        font-size: 14px;
    }

    .card-body-custom {
        padding: 28px;
    }

    .alert-success {
        background: #edf9f1;
        color: #24723d;
        border: 1px solid #c9ecd3;
        border-radius: 9px;
        padding: 13px 16px;
        margin-bottom: 20px;
    }

    .alert-danger {
        background: #fff0f0;
        color: #a32929;
        border: 1px solid #f0caca;
        border-radius: 9px;
        padding: 13px 16px;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        color: #174d83;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .form-control {
        width: 100%;
        box-sizing: border-box;
        padding: 12px 14px;
        border: 1px solid #cbdceb;
        border-radius: 9px;
        font-size: 14px;
        background: #ffffff;
    }

    .form-control:focus {
        outline: none;
        border-color: #1687ed;
        box-shadow: 0 0 0 3px rgba(22, 135, 237, 0.12);
    }

    .help-text {
        display: block;
        margin-top: 7px;
        color: #7890aa;
        font-size: 13px;
    }

    .btn-submit {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 21px;
        border: none;
        border-radius: 9px;
        background: #087cf0;
        color: #ffffff;
        font-weight: 700;
        cursor: pointer;
    }

    .btn-submit:hover {
        background: #0568cc;
    }

    .btn-view {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 12px;
        border-radius: 7px;
        background: #eaf4ff;
        color: #086dcc;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
    }

    .btn-view:hover {
        background: #d7ebff;
        color: #075cae;
    }

    .btn-delete {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 12px;
        border: none;
        border-radius: 7px;
        background: #fff0f0;
        color: #c03939;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
    }

    .btn-delete:hover {
        background: #ffe0e0;
    }

    .table-wrapper {
        overflow-x: auto;
    }

    .data-table {
        width: 100%;
        min-width: 750px;
        border-collapse: collapse;
    }

    .data-table th {
        padding: 14px 16px;
        background: #edf7ff;
        border-bottom: 1px solid #dceaf6;
        color: #174d83;
        font-size: 13px;
        font-weight: 800;
        text-align: left;
        white-space: nowrap;
    }

    .data-table td {
        padding: 15px 16px;
        border-bottom: 1px solid #edf2f7;
        color: #536d88;
        font-size: 14px;
        vertical-align: middle;
    }

    .data-table tr:last-child td {
        border-bottom: none;
    }

    .data-table tr:hover td {
        background: #fbfdff;
    }

    .empty-state {
        text-align: center;
        padding: 45px 20px;
        color: #7890aa;
    }

    .empty-state i {
        display: block;
        font-size: 58px;
        color: #b8d5ee;
        margin-bottom: 14px;
    }

    .empty-state h3 {
        margin: 0 0 8px;
        color: #496b8d;
        font-size: 19px;
    }

    .empty-state p {
        margin: 0;
        font-size: 14px;
    }

    .preview-image {
        width: 90px;
        height: 70px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #dce8f3;
    }

    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .page-header h1 {
            font-size: 28px;
        }

        .card-body-custom {
            padding: 20px;
        }

        .card-header-custom {
            padding: 20px;
        }
    }
</style>

<div class="page-header">
    <div>
        <h1>Foto Kegiatan Tim Pembina</h1>
        <p>Upload dan kelola dokumentasi foto kegiatan Tim Pembina.</p>
    </div>

    <a href="<?= site_url('tim-pembina/create') ?>" class="btn-back">
        ← Kembali
    </a>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert-success">
        <i class="bi bi-check-circle"></i>
        <?= esc(session()->getFlashdata('success')) ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert-danger">
        <i class="bi bi-exclamation-circle"></i>
        <?= esc(session()->getFlashdata('error')) ?>
    </div>
<?php endif; ?>

<!-- FORM UPLOAD -->
<div class="content-card">
    <div class="card-header-custom">
        <div class="card-icon">
            <i class="bi bi-camera-fill"></i>
        </div>

        <div>
            <h2>Upload Foto Kegiatan</h2>
            <p>Maksimal 1 foto untuk setiap kecamatan dan ukuran maksimal 5 MB.</p>
        </div>
    </div>

    <div class="card-body-custom">

        <form
            action="<?= site_url('tim-pembina/foto-kegiatan/store') ?>"
            method="post"
            enctype="multipart/form-data"
        >

            <?= csrf_field() ?>

            <?php if ($isAdmin): ?>
                <div class="form-group">
                    <label for="kecamatan_id">
                        Kecamatan <span style="color:red">*</span>
                    </label>

                    <select
                        name="kecamatan_id"
                        id="kecamatan_id"
                        class="form-control"
                        required
                    >
                        <option value="">-- Pilih Kecamatan --</option>

                        <?php foreach ($kecamatanList as $kecamatan): ?>
                            <option value="<?= esc($kecamatan['id']) ?>">
                                <?= esc($kecamatan['nama_kecamatan']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            <?php else: ?>
                <div class="form-group">
                    <label>Kecamatan</label>

                    <input
                        type="text"
                        class="form-control"
                        value="<?= esc(session()->get('username')) ?>"
                        readonly
                    >
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="file_foto">
                    File Foto <span style="color:red">*</span>
                </label>

                <input
                    type="file"
                    name="file_foto"
                    id="file_foto"
                    class="form-control"
                    accept=".jpg,.jpeg,.png,.webp,image/*"
                    required
                >

                <small class="help-text">
                    Format yang diperbolehkan: JPG, JPEG, PNG, WEBP. Maksimal 5 MB.
                </small>
            </div>

            <button type="submit" class="btn-submit">
                <i class="bi bi-upload"></i>
                Upload Foto
            </button>

        </form>

    </div>
</div>

<!-- DATA FOTO -->
<div class="content-card">
    <div class="card-header-custom">
        <div class="card-icon">
            <i class="bi bi-images"></i>
        </div>

        <div>
            <h2>Foto yang Sudah Diunggah</h2>
            <p>Daftar dokumentasi foto kegiatan Tim Pembina.</p>
        </div>
    </div>

    <div class="table-wrapper">

        <?php if (!empty($data)): ?>

            <table class="data-table">
                <thead>
                    <tr>
                        <th width="70">No</th>

                        <?php if ($isAdmin): ?>
                            <th>Kecamatan</th>
                        <?php endif; ?>

                        <th>Preview</th>
                        <th>Nama File</th>
                        <th>Ukuran</th>
                        <th width="220">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; ?>

                    <?php foreach ($data as $foto): ?>
                        <tr>
                            <td><?= $no++ ?></td>

                            <?php if ($isAdmin): ?>
                                <td>
                                    <?= esc($foto['nama_kecamatan'] ?? '-') ?>
                                </td>
                            <?php endif; ?>

                            <td>
                                <img
                                    src="<?= site_url('tim-pembina/foto-kegiatan/view/' . $foto['id']) ?>"
                                    alt="Foto kegiatan"
                                    class="preview-image"
                                >
                            </td>

                            <td>
                                <?= esc($foto['nama_asli']) ?>
                            </td>

                            <td>
                                <?= number_format(($foto['ukuran_file'] ?? 0) / 1024, 1) ?> KB
                            </td>

                            <td>
                                <a
                                    href="<?= site_url('tim-pembina/foto-kegiatan/view/' . $foto['id']) ?>"
                                    class="btn-view"
                                    target="_blank"
                                >
                                    <i class="bi bi-eye"></i>
                                    Lihat
                                </a>

                                <form
                                    action="<?= site_url('tim-pembina/foto-kegiatan/delete/' . $foto['id']) ?>"
                                    method="post"
                                    style="display:inline;"
                                    onsubmit="return confirm('Yakin ingin menghapus foto ini?');"
                                >
                                    <?= csrf_field() ?>

                                    <button type="submit" class="btn-delete">
                                        <i class="bi bi-trash"></i>
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        <?php else: ?>

            <div class="empty-state">
                <i class="bi bi-camera"></i>
                <h3>Belum Ada Foto Kegiatan</h3>
                <p>Silakan upload foto dokumentasi kegiatan Tim Pembina.</p>
            </div>

        <?php endif; ?>

    </div>
</div>

<?= $this->endSection() ?>