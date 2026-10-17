<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                Rencana Kerja Tim Pembina
            </h3>

            <p class="text-muted mb-0">
                Kelola Rencana Kerja Tim Pembina berdasarkan tahun.
            </p>
        </div>

        <a
            href="<?= base_url('tim-pembina') ?>"
            class="btn btn-outline-secondary"
        >
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>

    </div>


    <!-- PILIH PERIODE -->
    <div class="row g-4">

        <!-- TAHUN GANJIL -->
        <div class="col-md-6">

            <a
                href="<?= base_url('tim-pembina/rencana-kerja/ganjil') ?>"
                class="text-decoration-none"
            >

                <div
                    class="card border-0 shadow-sm h-100"
                    style="
                        border-radius: 16px;
                        transition: .2s;
                    "
                >

                    <div class="card-body p-4">

                        <div class="d-flex align-items-center">

                            <div
                                class="rounded-circle d-flex align-items-center justify-content-center me-3"
                                style="
                                    width: 58px;
                                    height: 58px;
                                    background: #eaf3ff;
                                    color: #0b4f9c;
                                "
                            >
                                <i
                                    class="bi bi-calendar-event fs-3"
                                ></i>
                            </div>

                            <div>

                                <h5 class="fw-bold mb-1 text-dark">
                                    Tahun Ganjil
                                </h5>

                                <div class="text-muted">
                                    Rencana Kerja Tahun Ganjil
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </a>

        </div>


        <!-- TAHUN GENAP -->
        <div class="col-md-6">

            <a
                href="<?= base_url('tim-pembina/rencana-kerja/genap') ?>"
                class="text-decoration-none"
            >

                <div
                    class="card border-0 shadow-sm h-100"
                    style="
                        border-radius: 16px;
                        transition: .2s;
                    "
                >

                    <div class="card-body p-4">

                        <div class="d-flex align-items-center">

                            <div
                                class="rounded-circle d-flex align-items-center justify-content-center me-3"
                                style="
                                    width: 58px;
                                    height: 58px;
                                    background: #eaf3ff;
                                    color: #0b4f9c;
                                "
                            >
                                <i
                                    class="bi bi-calendar-check fs-3"
                                ></i>
                            </div>

                            <div>

                                <h5 class="fw-bold mb-1 text-dark">
                                    Tahun Genap
                                </h5>

                                <div class="text-muted">
                                    Rencana Kerja Tahun Genap
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </a>

        </div>

    </div>

</div>

<?= $this->endSection() ?>