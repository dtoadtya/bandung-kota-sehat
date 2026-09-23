<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<?php
$isAdmin = in_array(
    session()->get('role'),
    ['admin', 'super_admin'],
    true
);

$userKecamatan = $kecamatan[0] ?? null;
?>

<style>
    .forum-form-page {
        width: 100%;
    }

    .forum-form-banner {
        min-height: 135px;
        position: relative;
        overflow: hidden;
        border-radius: 14px;
        background: linear-gradient(
            105deg,
            #e9f5ff,
            #f4faff
        );
        border: 1px solid #dcebf8;
        margin-bottom: 24px;
        padding: 26px 28px 24px 55px;
    }

    .forum-form-banner::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 70px;
        height: 100%;
        background:
            linear-gradient(
                130deg,
                #ffd33d 0%,
                #ffd33d 48%,
                #087df5 49%,
                #087df5 65%,
                transparent 66%
            );
    }

    .forum-form-banner h1,
    .forum-form-banner p {
        position: relative;
        z-index: 2;
    }

    .forum-form-banner h1 {
        margin: 0;
        color: #063b78;
        font-size: 32px;
        font-weight: 800;
    }

    .forum-form-banner p {
        margin: 7px 0 0;
        color: #557594;
        font-size: 16px;
    }

    .forum-form-card {
        background: #fff;
        border: 1px solid #e0ebf5;
        border-radius: 15px;
        box-shadow: 0 6px 22px rgba(6,59,120,.06);
        overflow: hidden;
    }

    .forum-form-card-header {
        padding: 20px 24px;
        border-bottom: 1px solid #e8eff6;
        background: #fbfdff;
    }

    .forum-form-card-header h5 {
        margin: 0;
        color: #063b78;
        font-weight: 800;
    }

    .forum-form-card-body {
        padding: 28px;
    }

    .forum-form-label {
        display: block;
        margin-bottom: 8px;
        color: #244b70;
        font-size: 14px;
        font-weight: 700;
    }

    .forum-form-control {
        width: 100%;
        min-height: 46px;
        border: 1px solid #d6e4f1;
        border-radius: 9px;
        padding: 10px 13px;
        color: #243f5c;
        background: #fff;
        outline: none;
        transition: .2s ease;
    }

    .forum-form-control:focus {
        border-color: #087df5;
        box-shadow: 0 0 0 3px rgba(8,125,245,.10);
    }

    textarea.forum-form-control {
        min-height: 120px;
        resize: vertical;
    }

    .forum-form-readonly {
        background: #f4f8fc;
    }

    .forum-form-help {
        margin-top: 6px;
        color: #7189a0;
        font-size: 12px;
    }

    .forum-form-actions {
        margin-top: 8px;
        padding-top: 20px;
        border-top: 1px solid #edf2f7;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .forum-btn-save {
        min-height: 44px;
        padding: 0 20px;
        border: 0;
        border-radius: 9px;
        background: linear-gradient(135deg, #087df5, #0875df);
        color: #fff;
        font-weight: 700;
    }

    .forum-btn-back {
        min-height: 44px;
        padding: 0 18px;
        border-radius: 9px;
        background: #fff;
        border: 1px solid #d9e4ee;
        color: #36536d;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
    }

    @media (max-width: 768px) {
        .forum-form-card-body {
            padding: 20px;
        }

        .forum-form-actions {
            flex-direction: column-reverse;
        }

        .forum-btn-save,
        .forum-btn-back {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class="forum-form-page">

    <section class="forum-form-banner">

        <h1>
            Tambah Forum Kecamatan Sehat
        </h1>

        <p>
            Tambahkan data Forum Kecamatan Sehat baru.
        </p>

    </section>


    <?php if (session()->getFlashdata('error')): ?>

        <div class="alert alert-danger mb-3">
            <i class="bi bi-exclamation-circle-fill me-2"></i>
            <?= esc(session()->getFlashdata('error')) ?>
        </div>

    <?php endif; ?>


    <section class="forum-form-card">

        <div class="forum-form-card-header">

            <h5>
                <i
                    class="bi bi-chat-square-text-fill me-2"
                    style="color:#087df5;"
                ></i>

                Form Forum Kecamatan Sehat
            </h5>

        </div>


        <div class="forum-form-card-body">

            <form
                method="post"
                action="<?= base_url(
                    'forum-kecamatan-sehat/store'
                ) ?>"
            >

                <?= csrf_field() ?>

                <div class="row">

                    <div class="col-md-6 mb-4">

                        <label
                            class="forum-form-label"
                            for="kecamatan_id"
                        >
                            Kecamatan
                            <span class="text-danger">*</span>
                        </label>

                        <?php if ($isAdmin): ?>

                            <select
                                name="kecamatan_id"
                                id="kecamatan_id"
                                class="forum-form-control"
                                required
                            >

                                <option value="">
                                    -- Pilih Kecamatan --
                                </option>

                                <?php foreach ($kecamatan as $item): ?>

                                    <option
                                        value="<?= esc($item['id']) ?>"
                                        <?= old('kecamatan_id') == $item['id']
                                            ? 'selected'
                                            : '' ?>
                                    >
                                        <?= esc(
                                            $item['nama_kecamatan']
                                        ) ?>
                                    </option>

                                <?php endforeach; ?>

                            </select>

                        <?php else: ?>

                            <input
                                type="text"
                                class="forum-form-control forum-form-readonly"
                                value="<?= esc(
                                    $userKecamatan['nama_kecamatan']
                                    ?? '-'
                                ) ?>"
                                readonly
                            >

                            <input
                                type="hidden"
                                name="kecamatan_id"
                                value="<?= esc(
                                    $userKecamatan['id']
                                    ?? ''
                                ) ?>"
                            >

                            <div class="forum-form-help">
                                <i class="bi bi-shield-check me-1"></i>
                                Kecamatan ditentukan otomatis berdasarkan akun.
                            </div>

                        <?php endif; ?>

                    </div>


                    <div class="col-md-6 mb-4">

                        <label
                            class="forum-form-label"
                            for="nama_forum"
                        >
                            Nama Forum
                            <span class="text-danger">*</span>
                        </label>

                        <input
                            type="text"
                            name="nama_forum"
                            id="nama_forum"
                            class="forum-form-control"
                            placeholder="Contoh: Forum Kecamatan Sehat Andir"
                            value="<?= esc(old('nama_forum')) ?>"
                            required
                        >

                    </div>


                    <div class="col-md-6 mb-4">

                        <label
                            class="forum-form-label"
                            for="tahun"
                        >
                            Tahun
                            <span class="text-danger">*</span>
                        </label>

                        <input
                            type="number"
                            name="tahun"
                            id="tahun"
                            class="forum-form-control"
                            min="2000"
                            max="2100"
                            value="<?= esc(
                                old('tahun', date('Y'))
                            ) ?>"
                            required
                        >

                    </div>


                    <div class="col-md-6 mb-4">

                        <label
                            class="forum-form-label"
                            for="ketua"
                        >
                            Ketua
                        </label>

                        <input
                            type="text"
                            name="ketua"
                            id="ketua"
                            class="forum-form-control"
                            placeholder="Nama Ketua"
                            value="<?= esc(old('ketua')) ?>"
                        >

                    </div>


                    <div class="col-12 mb-3">

                        <label
                            class="forum-form-label"
                            for="keterangan"
                        >
                            Keterangan
                        </label>

                        <textarea
                            name="keterangan"
                            id="keterangan"
                            class="forum-form-control"
                            placeholder="Tambahkan keterangan jika diperlukan..."
                        ><?= esc(old('keterangan')) ?></textarea>

                    </div>

                </div>


                <div class="forum-form-actions">

                    <a
                        href="<?= base_url(
                            'forum-kecamatan-sehat'
                        ) ?>"
                        class="forum-btn-back"
                    >
                        <i class="bi bi-arrow-left me-1"></i>
                        Kembali
                    </a>

                    <button
                        type="submit"
                        class="forum-btn-save"
                    >
                        <i class="bi bi-save me-1"></i>
                        Simpan Data
                    </button>

                </div>

            </form>

        </div>

    </section>

</div>

<?= $this->endSection() ?>