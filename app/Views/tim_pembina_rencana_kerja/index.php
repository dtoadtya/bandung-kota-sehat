<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- HEADER -->
    <div class="mb-4">

        <h4 class="fw-bold mb-1">
            Rencana Kerja
        </h4>

        <div class="text-muted">
            Tim Pembina
        </div>

    </div>


    <!-- PILIH PERIODE -->
    <div class="row g-4">

        <!-- TAHUN GANJIL -->
        <div class="col-md-6">

            <a
                href="<?= base_url(
                    'tim-pembina/rencana-kerja/ganjil'
                ) ?>"
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

                        <div
                            class="d-flex justify-content-between align-items-center"
                        >

                            <div>

                                <div
                                    class="d-inline-flex align-items-center justify-content-center mb-3"
                                    style="
                                        width:52px;
                                        height:52px;
                                        border-radius:14px;
                                        background:#eaf3ff;
                                        color:#0b4f9c;
                                    "
                                >

                                    <i
                                        class="bi bi-calendar3 fs-4"
                                    ></i>

                                </div>

                                <h5 class="fw-bold mb-2">
                                    Tahun Ganjil
                                </h5>

                                <p class="text-muted mb-0">
                                    Kelola file Rencana Kerja
                                    untuk Tahun Ganjil.
                                </p>

                            </div>

                            <i
                                class="bi bi-chevron-right fs-4 text-primary"
                            ></i>

                        </div>

                    </div>

                </div>

            </a>

        </div>


        <!-- TAHUN GENAP -->
        <div class="col-md-6">

            <a
                href="<?= base_url(
                    'tim-pembina/rencana-kerja/genap'
                ) ?>"
                class="text-decoration-none"
            >

                <div
                    class="card border-0 shadow-sm h-100"
                    style="
                        border-radius:16px;
                        transition:.2s;
                    "
                >

                    <div class="card-body p-4">

                        <div
                            class="d-flex justify-content-between align-items-center"
                        >

                            <div>

                                <div
                                    class="d-inline-flex align-items-center justify-content-center mb-3"
                                    style="
                                        width:52px;
                                        height:52px;
                                        border-radius:14px;
                                        background:#eaf3ff;
                                        color:#0b4f9c;
                                    "
                                >

                                    <i
                                        class="bi bi-calendar2-check fs-4"
                                    ></i>

                                </div>

                                <h5 class="fw-bold mb-2">
                                    Tahun Genap
                                </h5>

                                <p class="text-muted mb-0">
                                    Kelola file Rencana Kerja
                                    untuk Tahun Genap.
                                </p>

                            </div>

                            <i
                                class="bi bi-chevron-right fs-4 text-primary"
                            ></i>

                        </div>

                    </div>

                </div>

            </a>

        </div>

    </div>

</div>

<style>
    .card:hover {
        transform: translateY(-3px);
    }
</style>

<?= $this->endSection() ?>