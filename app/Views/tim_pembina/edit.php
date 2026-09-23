<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="mb-4">
        <h3>Edit Tim Pembina</h3>
    </div>

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <form action="<?= base_url('tim-pembina/update/' . $data['id']) ?>"
                  method="post">

                <?= csrf_field() ?>

                <div class="mb-3">

                    <label class="form-label">
                        Nama
                    </label>

                    <input type="text"
                           name="nama"
                           class="form-control"
                           value="<?= esc($data['nama']) ?>"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Jabatan
                    </label>

                    <input type="text"
                           name="jabatan"
                           class="form-control"
                           value="<?= esc($data['jabatan']) ?>"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Keterangan
                    </label>

                    <textarea name="keterangan"
                              class="form-control"
                              rows="4"><?= esc($data['keterangan']) ?></textarea>

                </div>

                <a href="<?= base_url('tim-pembina') ?>"
                   class="btn btn-secondary">
                    Kembali
                </a>

                <button type="submit"
                        class="btn btn-primary">
                    Simpan Perubahan
                </button>

            </form>

        </div>

    </div>

</div>

<?= $this->endSection() ?>