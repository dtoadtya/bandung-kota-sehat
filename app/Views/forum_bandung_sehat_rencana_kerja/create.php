<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Upload Rencana Kerja
            </h3>

            <p class="text-muted mb-0">

                Forum Bandung Sehat -

                Tahun <?= $periode === 'ganjil' ? 'Ganjil' : 'Genap' ?>

            </p>

        </div>

        <a
            href="<?= base_url('forum-bandung-sehat/rencana-kerja/' . $periode) ?>"
            class="btn btn-outline-secondary"
        >
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>

    </div>


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


    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form
                action="<?= base_url('forum-bandung-sehat/rencana-kerja/store') ?>"
                method="post"
                enctype="multipart/form-data"
            >

                <?= csrf_field() ?>

                <input
                    type="hidden"
                    name="periode"
                    value="<?= esc($periode) ?>"
                >


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

                </div>


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
                        Format PDF, DOC, DOCX, XLS, XLSX.
                        Maksimal 2 MB.
                    </small>

                </div>


                <div class="d-flex justify-content-end gap-2">

                    <a
                        href="<?= base_url('forum-bandung-sehat/rencana-kerja/' . $periode) ?>"
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