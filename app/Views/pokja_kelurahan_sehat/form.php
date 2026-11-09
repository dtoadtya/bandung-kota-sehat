<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h4 class="fw-bold mb-1">

                <i class="bi bi-people me-2"></i>

                Edit Pokja Kelurahan Sehat

            </h4>

            <p class="text-muted mb-0">

                Perbarui data pokja, ketua, dan tahun keanggotaan.

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

                <?= session()->getFlashdata('error') ?>

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

                        Form Pokja Kelurahan Sehat

                    </h6>

                    <small class="text-muted">

                        Pilih kecamatan lalu kelurahan, isi data pokja.

                    </small>

                </div>

            </div>

        </div>


        <div class="card-body p-4">

            <form action="<?= base_url(
                'pokja-kelurahan-sehat/update/' . (int) ($data['id'] ?? 0)
            ) ?>"
                  method="post">

                <?= csrf_field() ?>


                <!-- KECAMATAN -->
                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        Kecamatan

                    </label>

                    <select name="kecamatan_id"
                            id="kecamatan_id"
                            class="form-select"
                            required>

                        <option value="">
                            -- Pilih Kecamatan --
                        </option>

                        <?php $kecAktif =
                            old(
                                'kecamatan_id',
                                $kecamatanIdAktif ?? null
                            ); ?>

                        <?php foreach (($kecamatan ?? []) as $kec) : ?>

                            <option value="<?= (int) $kec['id'] ?>"
                                <?= $kecAktif == $kec['id'] ? 'selected' : '' ?>>

                                <?= esc($kec['nama_kecamatan']) ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>


                <!-- KELURAHAN -->
                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        Kelurahan

                    </label>

                    <select name="kelurahan_id"
                            id="kelurahan_id"
                            class="form-select"
                            required>

                        <option value="">
                            -- Pilih Kelurahan --
                        </option>

                        <?php foreach (($kelurahan ?? []) as $kel) : ?>

                            <option value="<?= (int) $kel['id'] ?>"
                                <?= old('kelurahan_id', $data['kelurahan_id'] ?? null) == $kel['id'] ? 'selected' : '' ?>>

                                <?= esc($kel['nama_kelurahan']) ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>


                <!-- NAMA POKJA -->
                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        Nama Pokja

                    </label>

                    <input type="text"
                           name="nama_pokja"
                           class="form-control"
                           value="<?= old(
                               'nama_pokja',
                               esc($data['nama_pokja'] ?? '')
                           ) ?>"
                           placeholder="Contoh: Pokja Kelurahan Sehat"
                           required>

                </div>


                <!-- TAHUN -->
                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        Tahun

                    </label>

                    <input type="number"
                           name="tahun"
                           class="form-control"
                           value="<?= old(
                               'tahun',
                               esc($data['tahun'] ?? '')
                           ) ?>"
                           placeholder="Contoh: 2026"
                           min="2000"
                           max="2100"
                           required>

                </div>


                <!-- KETUA -->
                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        Ketua

                    </label>

                    <input type="text"
                           name="ketua"
                           class="form-control"
                           value="<?= old(
                               'ketua',
                               esc($data['ketua'] ?? '')
                           ) ?>"
                           placeholder="Nama ketua pokja"
                           required>

                </div>


                <!-- KETERANGAN -->
                <div class="mb-4">

                    <label class="form-label fw-semibold">

                        Keterangan

                    </label>

                    <textarea name="keterangan"
                              class="form-control"
                              rows="3"
                              placeholder="Keterangan (opsional)"><?= old(
                                  'keterangan',
                                  esc($data['keterangan'] ?? '')
                              ) ?></textarea>

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

                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {

    var kecamatanSelect = document.getElementById('kecamatan_id');
    var kelurahanSelect = document.getElementById('kelurahan_id');

    if (!kecamatanSelect || !kelurahanSelect) {
        return;
    }

    var kelurahanIdAwal = '<?= (int) old(
        'kelurahan_id',
        $data['kelurahan_id'] ?? 0
    ) ?>';

    kecamatanSelect.addEventListener('change', function () {

        var kecamatanId = this.value;

        kelurahanSelect.innerHTML =
            '<option value="">-- Pilih Kelurahan --</option>';

        if (!kecamatanId) {
            return;
        }

        fetch('<?= base_url('pokja-kelurahan-sehat/getKelurahan') ?>/'
              + encodeURIComponent(kecamatanId))
            .then(function (res) { return res.json(); })
            .then(function (rows) {

                rows.forEach(function (row) {

                    var option = document.createElement('option');

                    option.value = row.id;
                    option.textContent = row.nama_kelurahan;

                    if (String(row.id) === String(kelurahanIdAwal)) {
                        option.selected = true;
                    }

                    kelurahanSelect.appendChild(option);
                });
            })
            .catch(function () { /* abaikan */ });
    });
});
</script>

<?= $this->endSection() ?>
