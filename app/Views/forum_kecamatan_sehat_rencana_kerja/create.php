<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    /* =========================================================
       HEADER
    ========================================================= */
    .kelembagaan-header {
        background: linear-gradient(135deg, #eef7ff, #f8fbff);
        border-left: 5px solid #1687e8;
        border-radius: 14px;
        padding: 28px 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 8px rgba(0, 60, 120, 0.05);
    }

    .kelembagaan-header h1 {
        margin: 0;
        color: #0b4f9c;
        font-size: 26px;
        font-weight: 700;
    }

    .kelembagaan-header p {
        margin: 5px 0 0;
        color: #718096;
        font-size: 14px;
    }

    .kelembagaan-header .btn {
        background: #ffffff;
        color: #0b4f9c;
        border: 1px solid #cfe2f5;
        border-radius: 9px;
        padding: 9px 16px;
        font-weight: 500;
    }

    .kelembagaan-header .btn:hover {
        background: #eaf3ff;
        border-color: #1687e8;
    }

    /* =========================================================
       PERIODE TAHUN
    ========================================================= */
    .periode-card {
        background: #ffffff;
        border: 1px solid #dbe8f5;
        border-radius: 14px;
        padding: 22px 26px;
        margin-bottom: 20px;
        box-shadow: 0 2px 8px rgba(0, 60, 120, 0.05);
    }

    .periode-header {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 18px;
    }

    .periode-icon {
        width: 44px;
        height: 44px;
        border-radius: 10px;
        background: #eaf3ff;
        color: #0b4f9c;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    .periode-header h3 {
        margin: 0;
        color: #0b4f9c;
        font-size: 18px;
        font-weight: 700;
    }

    .periode-header p {
        margin: 4px 0 0;
        color: #718096;
        font-size: 13px;
    }

    .periode-buttons {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .btn-periode {
        min-width: 150px;
        padding: 11px 22px;
        border: 1px solid #c9dff5;
        background: #ffffff;
        color: #0b4f9c;
        border-radius: 9px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .btn-periode:hover {
        background: #eaf3ff;
        border-color: #1687e8;
        transform: translateY(-1px);
    }

    .btn-periode.active {
        background: #0b4f9c;
        color: #ffffff;
        border-color: #0b4f9c;
        box-shadow: 0 3px 8px rgba(11, 79, 156, 0.20);
    }

    .btn-periode span {
        margin-right: 6px;
    }

    /* =========================================================
       FORM
    ========================================================= */
    .card {
        border-radius: 14px;
    }

    .card-body {
        padding: 26px;
    }

    .card-body h4 {
        color: #0b4f9c;
        font-weight: 700;
    }

    .form-label {
        color: #0b4f9c;
        font-weight: 500;
    }

    .form-control,
    .form-select {
        border: 1px solid #cfe0ef;
        border-radius: 8px;
        min-height: 44px;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #1687e8;
        box-shadow: 0 0 0 0.15rem rgba(22, 135, 232, 0.12);
    }

    textarea.form-control {
        min-height: 220px;
        resize: vertical;
    }

    /* =========================================================
       TOMBOL
    ========================================================= */
    .btn-primary {
        background: #0b4f9c;
        border-color: #0b4f9c;
        border-radius: 8px;
        padding: 9px 18px;
    }

    .btn-primary:hover {
        background: #07366d;
        border-color: #07366d;
    }

    .btn-secondary {
        border-radius: 8px;
        padding: 9px 18px;
    }

    /* =========================================================
       RESPONSIVE
    ========================================================= */
    @media (max-width: 768px) {
        .kelembagaan-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .periode-buttons {
            flex-direction: column;
        }

        .btn-periode {
            width: 100%;
        }

        .card-body {
            padding: 20px;
        }
    }
</style>


<div class="container-fluid">

    <!-- =====================================================
         HEADER
    ====================================================== -->
    <div class="kelembagaan-header mb-4">

        <div>
            <h1>Tambah Rencana Kerja</h1>
            <p>Forum Kecamatan Sehat</p>
        </div>

        <a href="<?= site_url('forum-kecamatan-sehat/rencana-kerja') ?>"
           class="btn">
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>

    </div>


    <!-- =====================================================
         PILIH TAHUN 1 / TAHUN 2
    ====================================================== -->
    <div class="periode-card">

        <div class="periode-header">

            <div class="periode-icon">
                <i class="bi bi-calendar3"></i>
            </div>

            <div>
                <h3>Periode Rencana Kerja</h3>
                <p>
                    Pilih periode rencana kerja yang akan digunakan.
                </p>
            </div>

        </div>


        <div class="periode-buttons">

            <button type="button"
                    class="btn-periode"
                    id="btnTahun1"
                    onclick="pilihTahun(1)">
                <span>▣</span>
                Tahun 1
            </button>

            <button type="button"
                    class="btn-periode"
                    id="btnTahun2"
                    onclick="pilihTahun(2)">
                <span>▣</span>
                Tahun 2
            </button>

        </div>

    </div>


    <!-- =====================================================
         FORM RENCANA KERJA
    ====================================================== -->
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <h4 class="mb-1">
                Form Rencana Kerja
            </h4>

            <p class="text-muted mb-4">
                Masukkan rencana kerja berdasarkan tahun pelaksanaan.
            </p>


            <!-- ERROR VALIDASI -->
            <?php if (session()->getFlashdata('errors')): ?>

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        <?php foreach (session()->getFlashdata('errors') as $error): ?>

                            <li>
                                <?= esc($error) ?>
                            </li>

                        <?php endforeach; ?>

                    </ul>

                </div>

            <?php endif; ?>


            <!-- ERROR UMUM -->
            <?php if (session()->getFlashdata('error')): ?>

                <div class="alert alert-danger">

                    <?= esc(session()->getFlashdata('error')) ?>

                </div>

            <?php endif; ?>


            <!-- =================================================
                 FORM
            ================================================== -->
            <form action="<?= site_url('forum-kecamatan-sehat/rencana-kerja/store') ?>"
                  method="post">

                <?= csrf_field() ?>


                <div class="row">


                    <!-- =========================================
                         KECAMATAN
                    ========================================== -->
                    <?php if ($isAdmin): ?>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Kecamatan
                                <span class="text-danger">*</span>
                            </label>


                            <select name="kecamatan_id"
                                    class="form-select"
                                    required>

                                <option value="">
                                    -- Pilih Kecamatan --
                                </option>


                                <?php foreach ($kecamatanList as $kecamatan): ?>

                                    <option
                                        value="<?= $kecamatan['id'] ?>"
                                        <?= old('kecamatan_id') == $kecamatan['id']
                                            ? 'selected'
                                            : '' ?>>

                                        <?= esc($kecamatan['nama_kecamatan']) ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>

                    <?php endif; ?>


                    <!-- =========================================
                         TAHUN
                    ========================================== -->
                    <div class="<?= $isAdmin ? 'col-md-6' : 'col-md-12' ?> mb-3">

                        <label class="form-label">

                            Tahun

                            <span class="text-danger">*</span>

                        </label>


                        <input type="number"
                               name="tahun"
                               class="form-control"
                               min="2000"
                               max="2100"
                               value="<?= old('tahun') ?>"
                               placeholder="Contoh: 2026"
                               required>

                    </div>


                    <!-- =========================================
                         RENCANA KERJA
                    ========================================== -->
                    <div class="col-md-12 mb-4">

                        <label class="form-label">

                            Rencana Kerja

                            <span class="text-danger">*</span>

                        </label>


                        <textarea
                            name="data_rencana"
                            class="form-control"
                            rows="10"
                            placeholder="Tuliskan rencana kerja secara lengkap..."
                            required><?= old('data_rencana') ?></textarea>

                    </div>


                </div>


                <!-- =================================================
                     TOMBOL
                ================================================== -->
                <div class="d-flex justify-content-end gap-2">


                    <a href="<?= site_url('forum-kecamatan-sehat/rencana-kerja') ?>"
                       class="btn btn-secondary">

                        Batal

                    </a>


                    <button type="submit"
                            class="btn btn-primary">

                        <i class="bi bi-save"></i>

                        Simpan Data

                    </button>


                </div>


            </form>

        </div>

    </div>

</div>


<!-- =========================================================
     JAVASCRIPT TAHUN 1 / TAHUN 2
========================================================= -->
<script>

function pilihTahun(tahun)
{
    const btnTahun1 = document.getElementById('btnTahun1');
    const btnTahun2 = document.getElementById('btnTahun2');

    /*
     * Hapus status aktif dari kedua tombol
     */
    btnTahun1.classList.remove('active');
    btnTahun2.classList.remove('active');


    /*
     * Aktifkan tombol sesuai pilihan
     */
    if (tahun === 1) {

        btnTahun1.classList.add('active');

    }

    if (tahun === 2) {

        btnTahun2.classList.add('active');

    }
}

</script>


<?= $this->endSection() ?>