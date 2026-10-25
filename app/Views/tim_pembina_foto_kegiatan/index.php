<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .foto-page {
        background: #f4f8fc;
        min-height: calc(100vh - 70px);
        padding: 28px;
    }

    .foto-header {
        background: linear-gradient(
            135deg,
            #0b4f9c,
            #07366d
        );
        color: #fff;
        border-radius: 14px;
        padding: 24px 28px;
        margin-bottom: 22px;
        box-shadow: 0 8px 20px rgba(7, 54, 109, .12);
    }

    .foto-header h1 {
        margin: 0;
        font-size: 24px;
        font-weight: 700;
    }

    .foto-header p {
        margin: 7px 0 0;
        font-size: 14px;
        opacity: .92;
    }

    .btn-kembali {
        display: inline-block;
        color: #fff;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .btn-kembali:hover {
        color: #fff;
        opacity: .85;
    }

    .foto-card {
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 5px 18px rgba(0, 0, 0, .06);
        padding: 28px;
    }

    .foto-card + .foto-card {
        margin-top: 22px;
    }

    .foto-card h2 {
        margin: 0 0 7px;
        color: #243447;
        font-size: 19px;
        font-weight: 700;
    }

    .description {
        color: #718096;
        font-size: 13px;
        margin-bottom: 25px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        color: #243447;
        font-size: 13px;
        font-weight: 700;
    }

    .form-control {
        width: 100%;
        border: 1px solid #d9e2ec;
        border-radius: 8px;
        padding: 11px 13px;
        font-size: 13px;
        background: #fff;
        box-sizing: border-box;
    }

    .form-control:focus {
        outline: none;
        border-color: #0b4f9c;
        box-shadow: 0 0 0 3px rgba(11, 79, 156, .08);
    }

    .upload-info {
        background: #f4f8fc;
        border: 1px solid #e5eaf0;
        border-radius: 9px;
        padding: 13px 15px;
        margin-bottom: 20px;
        color: #718096;
        font-size: 12px;
        line-height: 1.7;
    }

    .upload-info strong {
        color: #243447;
    }

    .btn-simpan {
        border: none;
        background: #0b4f9c;
        color: #fff;
        padding: 11px 22px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
    }

    .btn-simpan:hover {
        background: #07366d;
    }


    /* PREVIEW FOTO */
    .preview-wrapper {
        width: 100%;
        max-width: 700px;
        margin: 0 auto 18px;
        text-align: center;
        background: #f4f8fc;
        border: 1px solid #e5eaf0;
        border-radius: 12px;
        padding: 15px;
        box-sizing: border-box;
    }

    .preview-image {
        display: block;
        width: 100%;
        max-height: 450px;
        object-fit: contain;
        border-radius: 8px;
        cursor: pointer;
        transition: .2s;
    }

    .preview-image:hover {
        opacity: .92;
        transform: scale(1.01);
    }

    .file-name {
        background: #f4f8fc;
        border-radius: 8px;
        padding: 11px 14px;
        color: #718096;
        font-size: 12px;
        word-break: break-word;
    }

    .file-name strong {
        color: #243447;
    }

    .preview-hint {
        text-align: center;
        color: #718096;
        font-size: 12px;
        margin-bottom: 15px;
    }

    @media (max-width: 768px) {
        .foto-page {
            padding: 18px;
        }

        .foto-card {
            padding: 20px;
        }
    }
</style>


<div class="foto-page">

    <!-- =========================================================
         HEADER
    ========================================================== -->

    <div class="foto-header">

        <a
            href="<?= base_url('tim-pembina') ?>"
            class="btn-kembali"
        >
            ← &nbsp;Kembali
        </a>

        <h1>Foto Sekretariat</h1>

        <p>
            Upload foto sekretariat Tim Pembina.
        </p>

    </div>

    <!-- =========================================================
         FORM UPLOAD
    ========================================================== -->

    <div class="foto-card">

        <h2>Upload Foto Sekretariat</h2>

        <div class="description">

            Upload foto sekretariat Tim Pembina.
            Jika sudah terdapat foto, upload foto baru akan
            menggantikan foto lama.

        </div>


        <!-- KETENTUAN FILE -->

        <div class="upload-info">

            <strong>Ketentuan file:</strong>

            <br>

            • Maksimal ukuran:
            <strong>2 MB</strong>

            <br>

            • Format:
            <strong>JPG, JPEG</strong>

            <br>

            • Wajib memiliki titik koordinat (GPS) pada foto.

            <br>

            • Hanya satu foto sekretariat yang digunakan.

            <br>

            • Upload foto baru akan menggantikan foto lama.

        </div>


        <form
            action="<?= base_url('tim-pembina/foto-kegiatan/store') ?>"
            method="post"
            enctype="multipart/form-data"
        >

            <?= csrf_field() ?>


            <div class="form-group">

                <label
                    for="foto"
                    class="form-label"
                >
                    Pilih Foto Sekretariat
                </label>

                <input
                    type="file"
                    name="foto"
                    id="foto"
                    class="form-control"
                    accept=".jpg,.jpeg"
                    required
                >

            </div>


            <button
                type="submit"
                class="btn-simpan"
            >
                Upload Foto
            </button>

        </form>

    </div>


    <!-- =========================================================
         FOTO YANG SUDAH DIUPLOAD
    ========================================================== -->

    <?php if (!empty($foto)) : ?>

        <div class="foto-card">

            <h2>Foto Sekretariat Saat Ini</h2>

            <div class="description">
                Foto sekretariat yang saat ini tersimpan di sistem.
            </div>


            <div class="preview-hint">
                Klik foto untuk melihat ukuran penuh.
            </div>


            <div class="preview-wrapper">

                <a
                    href="<?= base_url($foto['file_path']) ?>"
                    target="_blank"
                >

                    <img
                        src="<?= base_url($foto['file_path']) ?>"
                        alt="Foto Sekretariat"
                        class="preview-image"
                    >

                </a>

            </div>


            <div class="file-name">

                <strong>Nama file:</strong>

                <?= esc($foto['nama_asli']) ?>

            </div>

        </div>

    <?php endif; ?>

</div>


<script src="https://cdn.jsdelivr.net/npm/exif-js@2.3.0/exif.js"></script>

<script>

/*
| Cek titik koordinat (GPS) pada EXIF foto.
| Pemeriksaan penuh tetap dilakukan oleh server.
*/
function cekKoordinat(file, input) {

    if (typeof EXIF === 'undefined') {
        return;
    }

    EXIF.getData(file, function () {

        const lat = EXIF.getTag(this, 'GPSLatitude');
        const lon = EXIF.getTag(this, 'GPSLongitude');

        if (!lat || !lon) {
            tampilkanNotifikasi('Foto wajib memiliki titik koordinat (GPS) pada EXIF. Gunakan foto yang diambil dengan lokasi aktif.', 'error');
            input.value = '';
        }
    });
}

document.addEventListener('DOMContentLoaded', function () {

    const fotoInput = document.getElementById('foto');

    if (!fotoInput) {
        return;
    }


    fotoInput.addEventListener('change', function () {

        const file = this.files[0];

        if (!file) {
            return;
        }


        /*
        |--------------------------------------------------------------------------
        | MAKSIMAL 2 MB
        |--------------------------------------------------------------------------
        */

        const maxSize = 2 * 1024 * 1024;

        if (file.size > maxSize) {

            tampilkanNotifikasi('Ukuran foto maksimal 2 MB.', 'error');

            this.value = '';

            return;
        }


        /*
        |--------------------------------------------------------------------------
        | FORMAT FILE
        |--------------------------------------------------------------------------
        */

        if (file.type !== 'image/jpeg') {

            tampilkanNotifikasi('Format foto harus JPG atau JPEG.', 'error');

            this.value = '';

            return;

        }

        cekKoordinat(file, this);

    });

});
</script>


<?= $this->include('partials/notifikasi') ?>

<?= $this->endSection() ?>