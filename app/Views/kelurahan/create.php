<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h4 class="fw-bold mb-1">

                <i class="bi bi-pin-map me-2"></i>

                Tambah Kelurahan

            </h4>

            <p class="text-muted mb-0">

                Tambahkan data kelurahan baru di wilayah Kota Bandung.

            </p>

        </div>


        <a href="<?= base_url('kelurahan') ?>"
           class="btn btn-outline-secondary">

            <i class="bi bi-arrow-left me-1"></i>

            Kembali

        </a>

    </div>


    <!-- ERROR VALIDATION -->
    <?php if (session()->getFlashdata('error')) : ?>

        <div class="alert alert-danger alert-dismissible fade show"
             role="alert">

            <div class="fw-semibold mb-2">

                <i class="bi bi-exclamation-triangle me-2"></i>

                Data belum dapat disimpan.

            </div>

            <div>

                <?= esc(session()->getFlashdata('error')) ?>

            </div>

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

                    <i class="bi bi-buildings text-primary fs-5"></i>

                </div>


                <div>

                    <h6 class="fw-bold mb-0">

                        Form Kelurahan

                    </h6>

                    <small class="text-muted">

                        Pilih kecamatan lalu isi nama kelurahan.

                    </small>

                </div>

            </div>

        </div>


        <div class="card-body p-4">

            <form action="<?= base_url('kelurahan/store') ?>"
                  method="post">

                <?= csrf_field() ?>


                <!-- KECAMATAN -->
                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        Kecamatan

                    </label>

                    <select name="kecamatan_id"
                            class="form-select"
                            required>

                        <option value="">
                            -- Pilih Kecamatan --
                        </option>

                        <?php foreach (($kecamatan ?? []) as $kec) : ?>

                            <option value="<?= (int) $kec['id'] ?>"
                                <?= old('kecamatan_id') == $kec['id'] ? 'selected' : '' ?>>

                                <?= esc($kec['nama_kecamatan']) ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>


                <!-- NAMA -->
                <div class="mb-4">

                    <label class="form-label fw-semibold">

                        Nama Kelurahan

                    </label>

                    <input type="text"
                           name="nama_kelurahan"
                           class="form-control"
                           value="<?= old('nama_kelurahan') ?>"
                           placeholder="Contoh: Cipaganti"
                           required>

                </div>


                <div class="d-flex gap-2">

                    <a href="<?= base_url('kelurahan') ?>"
                       class="btn btn-outline-secondary">

                        <i class="bi bi-arrow-left me-1"></i>

                        Kembali

                    </a>

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="bi bi-save me-1"></i>

                        Simpan Kelurahan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<?= $this->endSection() ?>
