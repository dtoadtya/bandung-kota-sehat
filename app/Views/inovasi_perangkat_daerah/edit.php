<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">
                <i class="bi bi-pencil-square me-2"></i>
                Edit Inovasi Perangkat Daerah
            </h4>

            <p class="text-muted mb-0">
                Perbarui informasi inovasi yang telah tersimpan.
            </p>
        </div>

        <a href="<?= base_url('inovasi/perangkat-daerah') ?>"
           class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali
        </a>
    </div>


    <!-- ERROR VALIDATION -->
    <?php if (session()->getFlashdata('errors')) : ?>

        <div class="alert alert-danger alert-dismissible fade show" role="alert">

            <div class="fw-semibold mb-2">
                <i class="bi bi-exclamation-triangle me-2"></i>
                Data belum dapat diperbarui.
            </div>

            <ul class="mb-0">
                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                    <li><?= esc($error) ?></li>
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

                <div class="bg-warning bg-opacity-10 rounded-3 p-2 me-3">
                    <i class="bi bi-pencil-square text-warning fs-5"></i>
                </div>

                <div>
                    <h6 class="fw-bold mb-0">
                        Form Edit Inovasi Perangkat Daerah
                    </h6>

                    <small class="text-muted">
                        Perbarui data inovasi sesuai kondisi terbaru.
                    </small>
                </div>

            </div>

        </div>


        <div class="card-body p-4">

            <form action="<?= base_url('inovasi/perangkat-daerah/update/' . $inovasi['id']) ?>"
                  method="post">

                <?= csrf_field() ?>


                <!-- PERANGKAT DAERAH -->
                <div class="mb-4">

                    <label for="nama_perangkat_daerah"
                           class="form-label fw-semibold">

                        Perangkat Daerah
                        <span class="text-danger">*</span>

                    </label>

                    <input type="text"
                           class="form-control"
                           id="nama_perangkat_daerah"
                           name="nama_perangkat_daerah"
                           value="<?= old('nama_perangkat_daerah', $inovasi['nama_perangkat_daerah']) ?>"
                           placeholder="Contoh: Bapperida Kota Bandung"
                           required>

                    <div class="form-text">
                        Masukkan nama Perangkat Daerah pelaksana inovasi.
                    </div>

                </div>


                <!-- NAMA INOVASI -->
                <div class="mb-4">

                    <label for="nama_inovasi"
                           class="form-label fw-semibold">

                        Nama Inovasi
                        <span class="text-danger">*</span>

                    </label>

                    <input type="text"
                           class="form-control"
                           id="nama_inovasi"
                           name="nama_inovasi"
                           value="<?= old('nama_inovasi', $inovasi['nama_inovasi']) ?>"
                           placeholder="Masukkan nama inovasi"
                           required>

                </div>


                <!-- PENJELASAN -->
                <div class="mb-4">

                    <label for="penjelasan"
                           class="form-label fw-semibold">

                        Penjelasan
                        <span class="text-danger">*</span>

                    </label>

                    <textarea class="form-control"
                              id="penjelasan"
                              name="penjelasan"
                              rows="5"
                              placeholder="Jelaskan secara singkat mengenai inovasi yang dilaksanakan..."
                              required><?= old('penjelasan', $inovasi['penjelasan']) ?></textarea>

                    <div class="form-text">
                        Jelaskan tujuan, proses, atau gambaran umum inovasi.
                    </div>

                </div>


                <!-- WAKTU -->
                <div class="row">

                    <div class="col-md-6 mb-4">

                        <label for="waktu_awal_penerapan"
                               class="form-label fw-semibold">

                            Waktu Awal Penerapan

                        </label>

                        <input type="date"
                               class="form-control"
                               id="waktu_awal_penerapan"
                               name="waktu_awal_penerapan"
                               value="<?= old('waktu_awal_penerapan', $inovasi['waktu_awal_penerapan']) ?>">

                    </div>


                    <div class="col-md-6 mb-4">

                        <label for="waktu_terakhir_pengembangan"
                               class="form-label fw-semibold">

                            Waktu Terakhir Pengembangan

                        </label>

                        <input type="date"
                               class="form-control"
                               id="waktu_terakhir_pengembangan"
                               name="waktu_terakhir_pengembangan"
                               value="<?= old('waktu_terakhir_pengembangan', $inovasi['waktu_terakhir_pengembangan']) ?>">

                    </div>

                </div>


                <!-- DAMPAK INOVASI -->
                <div class="mb-4">

                    <label for="dampak_inovasi"
                           class="form-label fw-semibold">

                        Dampak Inovasi

                    </label>

                    <textarea class="form-control"
                              id="dampak_inovasi"
                              name="dampak_inovasi"
                              rows="5"
                              placeholder="Jelaskan dampak atau manfaat yang dihasilkan dari inovasi..."><?= old('dampak_inovasi', $inovasi['dampak_inovasi']) ?></textarea>

                    <div class="form-text">
                        Jelaskan perubahan, manfaat, atau hasil yang dihasilkan oleh inovasi.
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

                        <input type="url"
                               class="form-control"
                               id="link_data_dukung"
                               name="link_data_dukung"
                               value="<?= old('link_data_dukung', $inovasi['link_data_dukung']) ?>"
                               placeholder="https://drive.google.com/...">

                    </div>

                    <div class="form-text">
                        Masukkan link Google Drive, OneDrive, atau media penyimpanan data dukung lainnya.
                    </div>

                </div>


                <!-- BUTTON -->
                <div class="d-flex justify-content-end gap-2 pt-3 border-top">

                    <a href="<?= base_url('inovasi/perangkat-daerah') ?>"
                       class="btn btn-light border">

                        <i class="bi bi-x-circle me-1"></i>
                        Batal

                    </a>

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="bi bi-check-circle me-1"></i>
                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<style>

    .form-label {
        color: #243447;
        font-size: 14px;
    }

    .form-control {
        border-color: #e5eaf0;
        border-radius: 8px;
        padding: 10px 12px;
        font-size: 14px;
    }

    .form-control:focus {
        border-color: #0b4f9c;
        box-shadow: 0 0 0 0.2rem rgba(11, 79, 156, 0.10);
    }

    textarea.form-control {
        resize: vertical;
    }

    .input-group-text {
        background-color: #f8fafc;
        border-color: #e5eaf0;
        color: #718096;
    }

    .btn {
        border-radius: 7px;
    }

</style>

<?= $this->endSection() ?>