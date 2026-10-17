<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h4 class="fw-bold mb-1">

                <i class="bi bi-lightbulb me-2"></i>

                Edit Inovasi Kecamatan

            </h4>

            <p class="text-muted mb-0">

                Perbarui data inovasi yang dilaksanakan oleh Kecamatan Kota Bandung.

            </p>

        </div>


        <a href="<?= base_url('inovasi/kecamatan') ?>"
           class="btn btn-outline-secondary">

            <i class="bi bi-arrow-left me-1"></i>

            Kembali

        </a>

    </div>


    <!-- ERROR VALIDATION -->
    <?php if (session()->getFlashdata('errors')) : ?>

        <div class="alert alert-danger alert-dismissible fade show"
             role="alert">

            <div class="fw-semibold mb-2">

                <i class="bi bi-exclamation-triangle me-2"></i>

                Data belum dapat diperbarui.

            </div>

            <ul class="mb-0">

                <?php foreach (session()->getFlashdata('errors') as $error) : ?>

                    <li>
                        <?= esc($error) ?>
                    </li>

                <?php endforeach; ?>

            </ul>

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    <?php endif; ?>


    <!-- FORM -->
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white border-0 py-3">

            <div class="d-flex align-items-center">

                <div class="bg-primary bg-opacity-10 rounded-3 p-2 me-3">

                    <i class="bi bi-building text-primary fs-5"></i>

                </div>


                <div>

                    <h6 class="fw-bold mb-0">

                        Form Edit Inovasi Kecamatan

                    </h6>

                    <small class="text-muted">

                        Perbarui informasi inovasi yang sudah tersimpan.

                    </small>

                </div>

            </div>

        </div>


        <div class="card-body p-4">

            <form
                action="<?= base_url('inovasi/kecamatan/update/' . $data['id']) ?>"
                method="post"
            >

                <?= csrf_field() ?>


                <!-- KECAMATAN -->
                <div class="mb-4">

                    <label for="kecamatan_id"
                           class="form-label fw-semibold">

                        Kecamatan

                        <span class="text-danger">*</span>

                    </label>


                    <select
                        class="form-select"
                        id="kecamatan_id"
                        name="kecamatan_id"
                        required
                    >

                        <option value="">
                            -- Pilih Kecamatan --
                        </option>


                        <?php foreach ($kecamatan as $item) : ?>

                            <option
                                value="<?= esc($item['id']) ?>"
                                <?= old(
                                    'kecamatan_id',
                                    $data['kecamatan_id']
                                ) == $item['id']
                                    ? 'selected'
                                    : '' ?>
                            >

                                <?= esc($item['nama_kecamatan']) ?>

                            </option>

                        <?php endforeach; ?>

                    </select>


                    <div class="form-text">

                        Pilih Kecamatan yang melaksanakan inovasi.

                    </div>

                </div>


                <!-- NAMA INOVASI -->
                <div class="mb-4">

                    <label for="nama_inovasi"
                           class="form-label fw-semibold">

                        Nama Inovasi

                        <span class="text-danger">*</span>

                    </label>


                    <input
                        type="text"
                        class="form-control"
                        id="nama_inovasi"
                        name="nama_inovasi"
                        value="<?= old(
                            'nama_inovasi',
                            $data['nama_inovasi']
                        ) ?>"
                        placeholder="Masukkan nama inovasi"
                        required
                    >

                </div>


                <!-- TAHUN -->
                <div class="mb-4">

                    <label for="tahun"
                           class="form-label fw-semibold">

                        Tahun

                        <span class="text-danger">*</span>

                    </label>


                    <input
                        type="number"
                        class="form-control"
                        id="tahun"
                        name="tahun"
                        value="<?= old(
                            'tahun',
                            $data['tahun']
                        ) ?>"
                        min="2000"
                        max="2100"
                        placeholder="Contoh: 2026"
                        required
                    >


                    <div class="form-text">

                        Masukkan tahun pelaksanaan inovasi.

                    </div>

                </div>


                <!-- DESKRIPSI -->
                <div class="mb-4">

                    <label for="deskripsi"
                           class="form-label fw-semibold">

                        Deskripsi Inovasi

                    </label>


                    <textarea
                        class="form-control"
                        id="deskripsi"
                        name="deskripsi"
                        rows="5"
                        placeholder="Jelaskan secara singkat mengenai inovasi yang dilaksanakan..."
                    ><?= old(
                        'deskripsi',
                        $data['deskripsi']
                    ) ?></textarea>


                    <div class="form-text">

                        Jelaskan gambaran umum inovasi yang dilaksanakan.

                    </div>

                </div>


                <!-- TUJUAN -->
                <div class="mb-4">

                    <label for="tujuan"
                           class="form-label fw-semibold">

                        Tujuan

                    </label>


                    <textarea
                        class="form-control"
                        id="tujuan"
                        name="tujuan"
                        rows="5"
                        placeholder="Jelaskan tujuan dari inovasi..."
                    ><?= old(
                        'tujuan',
                        $data['tujuan']
                    ) ?></textarea>


                    <div class="form-text">

                        Jelaskan tujuan atau sasaran yang ingin dicapai.

                    </div>

                </div>


                <!-- MANFAAT -->
                <div class="mb-4">

                    <label for="manfaat"
                           class="form-label fw-semibold">

                        Manfaat

                    </label>


                    <textarea
                        class="form-control"
                        id="manfaat"
                        name="manfaat"
                        rows="5"
                        placeholder="Jelaskan manfaat yang dihasilkan dari inovasi..."
                    ><?= old(
                        'manfaat',
                        $data['manfaat']
                    ) ?></textarea>


                    <div class="form-text">

                        Jelaskan manfaat atau hasil yang diperoleh dari inovasi.

                    </div>

                </div>


                <!-- LINK DATA DUKUNG -->
                <div class="mb-4">

                    <label for="link_data_dukung"
                           class="form-label fw-semibold">

                        Link Data Dukung

                    </label>


                    <div class="input-group">

                        <span class="input-group-text">

                            <i class="bi bi-link-45deg"></i>

                        </span>


                        <input
                            type="url"
                            class="form-control"
                            id="link_data_dukung"
                            name="link_data_dukung"
                            value="<?= old(
                                'link_data_dukung',
                                $data['link_data_dukung']
                            ) ?>"
                            placeholder="https://drive.google.com/..."
                        >

                    </div>


                    <div class="form-text">

                        Masukkan link Google Drive, OneDrive,
                        atau media penyimpanan data dukung lainnya.

                    </div>

                </div>


                <!-- BUTTON -->
                <div class="d-flex justify-content-end gap-2 pt-3 border-top">

                    <a
                        href="<?= base_url('inovasi/kecamatan') ?>"
                        class="btn btn-outline-secondary"
                    >

                        <i class="bi bi-x-circle me-1"></i>

                        Batal

                    </a>


                    <button
                        type="submit"
                        class="btn btn-primary"
                    >

                        <i class="bi bi-check-circle me-1"></i>

                        Simpan Perubahan

                    </button>

                </div>


            </form>

        </div>

    </div>

</div>


<style>

    .form-control,
    .form-select,
    .input-group-text {
        border-color: #dce3eb;
    }

    .form-control,
    .form-select {
        border-radius: 7px;
        min-height: 43px;
    }

    textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #0b4f9c;
        box-shadow: 0 0 0 3px rgba(11, 79, 156, .08);
    }

    .input-group-text {
        background: #f4f7fb;
        color: #718096;
    }

    .form-label {
        color: #243447;
        font-size: 13px;
    }

    .form-text {
        color: #718096;
        font-size: 12px;
        margin-top: 6px;
    }

    .btn {
        border-radius: 7px;
    }

</style>

<?= $this->endSection() ?>