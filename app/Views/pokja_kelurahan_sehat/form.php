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
    .pokja-form-page {
        width: 100%;
    }

    .pokja-form-banner {
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

    .pokja-form-banner::before {
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

    .pokja-form-banner h1,
    .pokja-form-banner p {
        position: relative;
        z-index: 2;
    }

    .pokja-form-banner h1 {
        margin: 0;
        color: #063b78;
        font-size: 32px;
        font-weight: 800;
    }

    .pokja-form-banner p {
        margin: 7px 0 0;
        color: #557594;
        font-size: 16px;
    }

    .pokja-form-card {
        background: #fff;
        border: 1px solid #e0ebf5;
        border-radius: 15px;
        box-shadow: 0 6px 22px rgba(6,59,120,.06);
        overflow: hidden;
    }

    .pokja-form-header {
        padding: 20px 24px;
        border-bottom: 1px solid #e8eff6;
        background: #fbfdff;
    }

    .pokja-form-header h5 {
        margin: 0;
        color: #063b78;
        font-weight: 800;
    }

    .pokja-form-body {
        padding: 28px;
    }

    .pokja-label {
        display: block;
        margin-bottom: 8px;
        color: #244b70;
        font-size: 14px;
        font-weight: 700;
    }

    .pokja-control {
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

    .pokja-control:focus {
        border-color: #087df5;
        box-shadow: 0 0 0 3px rgba(8,125,245,.10);
    }

    .pokja-control:disabled {
        background: #f4f8fc;
        color: #7890a7;
    }

    textarea.pokja-control {
        min-height: 120px;
        resize: vertical;
    }

    .pokja-help {
        margin-top: 6px;
        color: #7189a0;
        font-size: 12px;
    }

    .pokja-actions {
        margin-top: 8px;
        padding-top: 20px;
        border-top: 1px solid #edf2f7;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .pokja-save {
        min-height: 44px;
        padding: 0 20px;
        border: 0;
        border-radius: 9px;
        background: linear-gradient(135deg,#087df5,#0875df);
        color: #fff;
        font-weight: 700;
    }

    .pokja-back {
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
        .pokja-form-body {
            padding: 20px;
        }

        .pokja-actions {
            flex-direction: column-reverse;
        }

        .pokja-save,
        .pokja-back {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class="pokja-form-page">

    <section class="pokja-form-banner">

        <h1>
            Tambah Pokja Kelurahan Sehat
        </h1>

        <p>
            Tambahkan data Pokja Kelurahan Sehat baru.
        </p>

    </section>


    <?php if (session()->getFlashdata('error')): ?>

        <div class="alert alert-danger mb-3">
            <i class="bi bi-exclamation-circle-fill me-2"></i>
            <?= esc(session()->getFlashdata('error')) ?>
        </div>

    <?php endif; ?>


    <section class="pokja-form-card">

        <div class="pokja-form-header">

            <h5>
                <i
                    class="bi bi-diagram-3-fill me-2"
                    style="color:#087df5;"
                ></i>

                Form Pokja Kelurahan Sehat
            </h5>

        </div>


        <div class="pokja-form-body">

            <form
                method="post"
                action="<?= base_url(
                    'pokja-kelurahan-sehat/store'
                ) ?>"
            >

                <?= csrf_field() ?>

                <div class="row">

                    <!-- KECAMATAN -->

                    <div class="col-md-6 mb-4">

                        <label
                            for="kecamatan"
                            class="pokja-label"
                        >
                            Kecamatan
                            <span class="text-danger">*</span>
                        </label>


                        <?php if ($isAdmin): ?>

                            <select
                                name="kecamatan_id"
                                id="kecamatan"
                                class="pokja-control"
                                required
                            >

                                <option value="">
                                    -- Pilih Kecamatan --
                                </option>

                                <?php foreach ($kecamatan as $item): ?>

                                    <option
                                        value="<?= esc(
                                            $item['id']
                                        ) ?>"
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
                                class="pokja-control"
                                value="<?= esc(
                                    $userKecamatan['nama_kecamatan']
                                    ?? '-'
                                ) ?>"
                                readonly
                            >

                            <input
                                type="hidden"
                                name="kecamatan_id"
                                id="kecamatan"
                                value="<?= esc(
                                    $userKecamatan['id']
                                    ?? ''
                                ) ?>"
                            >

                            <div class="pokja-help">
                                <i class="bi bi-shield-check me-1"></i>
                                Kecamatan ditentukan otomatis berdasarkan akun.
                            </div>

                        <?php endif; ?>

                    </div>


                    <!-- KELURAHAN -->

                    <div class="col-md-6 mb-4">

                        <label
                            for="kelurahan"
                            class="pokja-label"
                        >
                            Kelurahan
                            <span class="text-danger">*</span>
                        </label>

                        <select
                            name="kelurahan_id"
                            id="kelurahan"
                            class="pokja-control"
                            required
                        >

                            <option value="">
                                -- Pilih Kecamatan Dahulu --
                            </option>

                        </select>

                        <div class="pokja-help">
                            Kelurahan akan menyesuaikan kecamatan yang dipilih.
                        </div>

                    </div>


                    <!-- NAMA POKJA -->

                    <div class="col-md-6 mb-4">

                        <label
                            for="nama_pokja"
                            class="pokja-label"
                        >
                            Nama Pokja
                            <span class="text-danger">*</span>
                        </label>

                        <input
                            type="text"
                            name="nama_pokja"
                            id="nama_pokja"
                            class="pokja-control"
                            placeholder="Contoh: Pokja Kelurahan Sehat"
                            value="<?= esc(
                                old('nama_pokja')
                            ) ?>"
                            required
                        >

                    </div>


                    <!-- TAHUN -->

                    <div class="col-md-6 mb-4">

                        <label
                            for="tahun"
                            class="pokja-label"
                        >
                            Tahun
                        </label>

                        <input
                            type="number"
                            name="tahun"
                            id="tahun"
                            class="pokja-control"
                            min="2000"
                            max="2100"
                            value="<?= esc(
                                old('tahun', date('Y'))
                            ) ?>"
                        >

                    </div>


                    <!-- KETUA -->

                    <div class="col-md-6 mb-4">

                        <label
                            for="ketua"
                            class="pokja-label"
                        >
                            Ketua
                        </label>

                        <input
                            type="text"
                            name="ketua"
                            id="ketua"
                            class="pokja-control"
                            placeholder="Nama Ketua"
                            value="<?= esc(
                                old('ketua')
                            ) ?>"
                        >

                    </div>


                    <!-- KETERANGAN -->

                    <div class="col-12 mb-3">

                        <label
                            for="keterangan"
                            class="pokja-label"
                        >
                            Keterangan
                        </label>

                        <textarea
                            name="keterangan"
                            id="keterangan"
                            class="pokja-control"
                            placeholder="Tambahkan keterangan jika diperlukan..."
                        ><?= esc(
                            old('keterangan')
                        ) ?></textarea>

                    </div>

                </div>


                <div class="pokja-actions">

                    <a
                        href="<?= base_url(
                            'pokja-kelurahan-sehat'
                        ) ?>"
                        class="pokja-back"
                    >
                        <i class="bi bi-arrow-left me-1"></i>
                        Kembali
                    </a>

                    <button
                        type="submit"
                        class="pokja-save"
                    >
                        <i class="bi bi-save me-1"></i>
                        Simpan Data
                    </button>

                </div>

            </form>

        </div>

    </section>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const kecamatan =
        document.getElementById('kecamatan');

    const kelurahan =
        document.getElementById('kelurahan');


    function loadKelurahan(id) {

        if (!id) {

            kelurahan.innerHTML =
                '<option value="">-- Pilih Kecamatan Dahulu --</option>';

            return;
        }

        kelurahan.innerHTML =
            '<option value="">Memuat kelurahan...</option>';

        kelurahan.disabled = true;


        fetch(
            '<?= site_url(
                'pokja-kelurahan-sehat/getKelurahan'
            ) ?>/' + encodeURIComponent(id)
        )
        .then(function (response) {

            if (!response.ok) {
                throw new Error(
                    'Gagal mengambil data kelurahan.'
                );
            }

            return response.json();

        })
        .then(function (data) {

            kelurahan.innerHTML =
                '<option value="">-- Pilih Kelurahan --</option>';

            data.forEach(function (item) {

                const option =
                    document.createElement('option');

                option.value = item.id;

                option.textContent =
                    item.nama_kelurahan;

                kelurahan.appendChild(option);

            });

            kelurahan.disabled = false;

        })
        .catch(function (error) {

            console.error(error);

            kelurahan.innerHTML =
                '<option value="">Gagal memuat kelurahan</option>';

            kelurahan.disabled = false;

        });
    }


    if (kecamatan) {

        kecamatan.addEventListener(
            'change',
            function () {
                loadKelurahan(this.value);
            }
        );


        /*
         * Untuk user biasa:
         * kecamatan sudah ditentukan otomatis,
         * jadi langsung ambil kelurahannya.
         */
        if (kecamatan.value) {
            loadKelurahan(kecamatan.value);
        }

    }

});
</script>

<?= $this->endSection() ?>