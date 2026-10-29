<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .foto-page {
        background: #f4f8fc;
        min-height: calc(100vh - 70px);
        padding: 28px;
    }

    .foto-header {
        background: linear-gradient(135deg, #0b4f9c, #07366d);
        color: #fff;
        border-radius: 14px;
        padding: 24px 28px;
        margin-bottom: 22px;
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

    .foto-card {
        background: #fff;
        border-radius: 14px;
        padding: 28px;
        box-shadow: 0 5px 18px rgba(0,0,0,.06);
    }

    .foto-card + .foto-card {
        margin-top: 22px;
    }

    .foto-card h2 {
        margin: 0 0 7px;
        color: #243447;
        font-size: 19px;
    }

    .description {
        color: #718096;
        font-size: 13px;
        margin-bottom: 22px;
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

    .form-label {
        display: block;
        margin-bottom: 8px;
        color: #243447;
        font-size: 13px;
        font-weight: 700;
    }

    .form-control {
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #d9e2ec;
        border-radius: 8px;
        padding: 11px 13px;
        font-size: 13px;
    }

    .btn-upload {
        margin-top: 5px;
        border: none;
        background: #0b4f9c;
        color: #fff;
        padding: 11px 22px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
    }

    .btn-upload:hover {
        background: #07366d;
    }


    .preview-wrapper {
        max-width: 750px;
        margin: auto;
        padding: 15px;
        background: #f4f8fc;
        border: 1px solid #e5eaf0;
        border-radius: 12px;
        text-align: center;
    }

    .preview-image {
        width: 100%;
        max-height: 450px;
        object-fit: contain;
        border-radius: 8px;
        cursor: pointer;
    }

    .file-name {
        margin-top: 15px;
        padding: 11px 14px;
        background: #f4f8fc;
        border-radius: 8px;
        color: #718096;
        font-size: 12px;
        word-break: break-word;
    }

    .foto-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 18px;
        max-width: 750px;
        margin-left: auto;
        margin-right: auto;
    }

    .btn-ubah,
    .btn-hapus,
    .btn-batal {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 11px 20px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        cursor: pointer;
        border: 1px solid transparent;
    }

    .btn-ubah {
        background: #0b4f9c;
        color: #fff;
    }

    .btn-ubah:hover {
        background: #07366d;
        color: #fff;
    }

    .btn-hapus {
        background: #fff0f0;
        color: #d9534f;
        border-color: #f1b4b1;
    }

    .btn-hapus:hover {
        background: #ffdede;
        color: #b52b27;
    }

    .btn-batal {
        background: #fff;
        color: #526b84;
        border-color: #cbd9e5;
    }

    .btn-batal:hover {
        background: #f4f8fc;
        color: #40566d;
    }

    .foto-form-actions {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 10px;
        margin-top: 5px;
    }

    .foto-form-actions .btn-upload,
    .foto-form-actions .btn-batal {
        margin-top: 0;
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

    <div class="foto-header">

        <a
            href="<?= base_url('forum-bandung-sehat') ?>"
            class="btn-kembali"
        >
            ← &nbsp;Kembali
        </a>

        <h1>Foto Sekretariat</h1>

        <p>
            Upload foto sekretariat Forum Bandung Sehat.
        </p>

    </div>

    <!-- PREVIEW -->

    <?php if (!empty($foto)) : ?>

        <div class="foto-card">

            <h2>Foto Sekretariat Saat Ini</h2>

            <div class="description">
                Foto yang saat ini tersimpan di sistem.
                Klik foto untuk melihat ukuran penuh.
            </div>

            <div class="preview-wrapper">

                <a
                    href="<?= base_url($foto['file_path']) ?>"
                    target="_blank"
                >

                    <img
                        src="<?= base_url($foto['file_path']) ?>"
                        alt="Foto Sekretariat Forum Bandung Sehat"
                        class="preview-image"
                    >

                </a>

            </div>

            <div class="file-name">

                <strong>Nama file:</strong>
                <?= esc($foto['nama_asli']) ?>

            </div>

            <div class="foto-actions">

                <a
                    href="<?= base_url(
                        'forum-bandung-sehat/foto-kegiatan?ubah=1'
                    ) ?>"
                    class="btn-ubah"
                >
                    ✎ &nbsp;Ubah Foto
                </a>

                <form
                    action="<?= base_url(
                        'forum-bandung-sehat/foto-kegiatan/delete/'
                        . $foto['id']
                    ) ?>"
                    method="post"
                    data-konfirmasi="Yakin ingin menghapus foto sekretariat ini?"
                >

                    <?= csrf_field() ?>

                    <button
                        type="submit"
                        class="btn-hapus"
                    >
                        🗑 &nbsp;Hapus Foto
                    </button>

                </form>

            </div>

        </div>

    <?php endif; ?>


    <!-- UPLOAD / UBAH -->

    <?php if (!empty($showUpload)) : ?>

        <div class="foto-card">

            <h2>
                <?= !empty($foto)
                    ? 'Ubah Foto Sekretariat'
                    : 'Upload Foto Sekretariat' ?>
            </h2>

            <div class="description">
                <?= !empty($foto)
                    ? 'Pilih foto baru untuk menggantikan foto sekretariat yang saat ini tersimpan.'
                    : 'Upload satu foto sekretariat Forum Bandung Sehat. Upload baru akan menggantikan foto lama.' ?>
            </div>

            <div class="upload-info">

                <strong>Ketentuan:</strong><br>

                • Maksimal <strong>2 MB</strong><br>
                • JPG atau JPEG<br>
                • Wajib memiliki titik koordinat (GPS) pada foto<br>
                • Hanya satu foto yang digunakan

            </div>


            <form
                action="<?= base_url(
                    'forum-bandung-sehat/foto-kegiatan/store'
                ) ?>"
                method="post"
                enctype="multipart/form-data"
            >

                <?= csrf_field() ?>

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

                <div class="foto-form-actions">

                    <button
                        type="submit"
                        class="btn-upload"
                    >
                        <?= !empty($foto)
                            ? 'Simpan Foto Baru'
                            : 'Upload Foto' ?>
                    </button>

                    <?php if (!empty($foto)) : ?>

                        <a
                            href="<?= base_url(
                                'forum-bandung-sehat/foto-kegiatan'
                            ) ?>"
                            class="btn-batal"
                        >
                            Batal
                        </a>

                    <?php endif; ?>

                </div>

            </form>

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

document.getElementById('foto')?.addEventListener(
    'change',
    function () {

        const file = this.files[0];

        if (!file) {
            return;
        }

        if (file.size > 2 * 1024 * 1024) {

            tampilkanNotifikasi('Ukuran foto maksimal 2 MB.', 'error');

            this.value = '';

            return;
        }

        if (file.type !== 'image/jpeg') {

            tampilkanNotifikasi('Format foto harus JPG atau JPEG.', 'error');

            this.value = '';

            return;

        }

        cekKoordinat(file, this);

    }
);
</script>


<?= $this->include('partials/notifikasi') ?>

<?= $this->endSection() ?>