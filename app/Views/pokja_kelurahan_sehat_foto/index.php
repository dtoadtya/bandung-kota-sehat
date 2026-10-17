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

    .alert {
        border-radius: 8px;
        padding: 12px 15px;
        margin-bottom: 18px;
        font-size: 13px;
    }

    .alert-success {
        background: #eaf7ef;
        color: #159957;
    }

    .alert-danger {
        background: #fff1f1;
        color: #d9534f;
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
</style>


<div class="foto-page">

    <div class="foto-header">

        <a
            href="<?= base_url('pokja-kelurahan-sehat') ?>"
            class="btn-kembali"
        >
            ← &nbsp;Kembali
        </a>

        <h1>Foto Sekretariat</h1>

        <p>
            Upload foto sekretariat Pokja Kelurahan Sehat.
        </p>

    </div>


    <?php if (session()->getFlashdata('success')) : ?>

        <div class="alert alert-success">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>

    <?php endif; ?>


    <?php if (session()->getFlashdata('error')) : ?>

        <div class="alert alert-danger">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>

    <?php endif; ?>


    <?php if (session()->getFlashdata('errors')) : ?>

        <div class="alert alert-danger">

            <?php foreach (
                session()->getFlashdata('errors')
                as $error
            ) : ?>

                <div><?= esc($error) ?></div>

            <?php endforeach; ?>

        </div>

    <?php endif; ?>


    <div class="foto-card">

        <h2>Upload Foto Sekretariat</h2>

        <div class="description">
            Upload satu foto sekretariat Pokja Kelurahan Sehat.
            Upload baru akan menggantikan foto lama.
        </div>

        <div class="upload-info">

            <strong>Ketentuan:</strong><br>

            • Maksimal <strong>2 MB</strong><br>
            • JPG, JPEG, PNG, atau WEBP<br>
            • Hanya satu foto yang digunakan

        </div>


        <form
            action="<?= base_url(
                'pokja-kelurahan-sehat/foto-kegiatan/store'
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
                accept=".jpg,.jpeg,.png,.webp"
                required
            >

            <button
                type="submit"
                class="btn-upload"
            >
                Upload Foto
            </button>

        </form>

    </div>


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
                        alt="Foto Sekretariat Pokja Kelurahan Sehat"
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


<script>
document.getElementById('foto')?.addEventListener(
    'change',
    function () {

        const file = this.files[0];

        if (!file) {
            return;
        }

        if (file.size > 2 * 1024 * 1024) {

            alert('Ukuran foto maksimal 2 MB.');

            this.value = '';

            return;
        }

        const allowed = [
            'image/jpeg',
            'image/png',
            'image/webp'
        ];

        if (!allowed.includes(file.type)) {

            alert(
                'Format foto harus JPG, JPEG, PNG, atau WEBP.'
            );

            this.value = '';
        }

    }
);
</script>


<?= $this->endSection() ?>