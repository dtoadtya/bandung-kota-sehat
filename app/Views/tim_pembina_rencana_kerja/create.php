<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Upload Rencana Kerja
            </h3>

            <p class="text-muted mb-0">

                Tim Pembina -

                <?php if ($periode === 'ganjil'): ?>

                    Tahun Ganjil

                <?php else: ?>

                    Tahun Genap

                <?php endif; ?>

            </p>

        </div>

        <a
            href="<?= base_url('tim-pembina/rencana-kerja/' . $periode) ?>"
            class="btn btn-outline-secondary"
        >
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>

    </div>


    <!-- ERROR -->
    <?php if (session()->getFlashdata('errors')): ?>

        <div class="alert alert-danger">

            <ul class="mb-0">

                <?php foreach (
                    session()->getFlashdata('errors')
                    as $error
                ): ?>

                    <li>
                        <?= esc($error) ?>
                    </li>

                <?php endforeach; ?>

            </ul>

        </div>

    <?php endif; ?>


    <!-- FORM -->
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form
                action="<?= base_url('tim-pembina/rencana-kerja/store') ?>"
                method="post"
                enctype="multipart/form-data"
            >

                <?= csrf_field() ?>


                <!-- PERIODE -->
                <input
                    type="hidden"
                    name="periode"
                    value="<?= esc($periode) ?>"
                >


                <!-- TAHUN -->
                <div class="mb-4">

                    <label
                        for="tahun"
                        class="form-label fw-semibold"
                    >
                        Tahun <span class="text-danger">*</span>
                    </label>

                    <input
                        type="number"
                        name="tahun"
                        id="tahun"
                        class="form-control"
                        min="2000"
                        max="2100"
                        value="<?= old('tahun') ?>"
                        placeholder="Contoh: 2026"
                        required
                    >

                    <small class="text-muted">
                        Masukkan tahun Rencana Kerja.
                    </small>

                </div>


                <!-- FILE -->
                <div class="mb-4">

                    <label
                        for="file"
                        class="form-label fw-semibold"
                    >
                        Upload File Rencana Kerja
                        <span class="text-danger">*</span>
                    </label>

                    <input
                        type="file"
                        name="file"
                        id="file"
                        class="form-control"
                        accept=".pdf,.doc,.docx,.xls,.xlsx"
                        required
                    >

                    <small class="text-muted">
                        Format yang diperbolehkan:
                        PDF, DOC, DOCX, XLS, XLSX.
                        Maksimal 10 MB.
                    </small>

                </div>


                <!-- BUTTON -->
                <div class="d-flex justify-content-end gap-2">

                    <a
                        href="<?= base_url('tim-pembina/rencana-kerja/' . $periode) ?>"
                        class="btn btn-light border"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <i class="bi bi-upload"></i>
                        Upload File
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<?= $this->endSection() ?>