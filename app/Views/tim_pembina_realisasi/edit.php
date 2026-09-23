<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="page-banner">
    <div>
        <h1>Edit Realisasi Kegiatan</h1>
        <p>Perbarui data realisasi kegiatan dan pendanaan.</p>
    </div>
</div>

<div class="content-card form-card">

    <form
        action="<?= base_url('tim-pembina/realisasi/update/' . $realisasi['id']) ?>"
        method="post">

        <?= csrf_field() ?>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <div><?= esc($error) ?></div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (in_array(session()->get('role'), ['admin', 'super_admin'], true)): ?>
            <div class="form-group">
                <label for="kecamatan_id">Kecamatan</label>

                <select
                    name="kecamatan_id"
                    id="kecamatan_id"
                    class="form-control"
                    required>

                    <?php foreach ($kecamatanList as $kecamatan): ?>
                        <option
                            value="<?= $kecamatan['id'] ?>"
                            <?= (int) $realisasi['kecamatan_id'] === (int) $kecamatan['id'] ? 'selected' : '' ?>>
                            <?= esc($kecamatan['nama_kecamatan'] ?? $kecamatan['nama'] ?? '') ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <label for="tahun">Tahun Pelaporan</label>

            <select name="tahun" id="tahun" class="form-control" required>
                <option value="Tahun 1" <?= $realisasi['tahun'] === 'Tahun 1' ? 'selected' : '' ?>>
                    Tahun 1
                </option>
                <option value="Tahun 2" <?= $realisasi['tahun'] === 'Tahun 2' ? 'selected' : '' ?>>
                    Tahun 2
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="nama_kegiatan">Nama Kegiatan</label>

            <input
                type="text"
                name="nama_kegiatan"
                id="nama_kegiatan"
                class="form-control"
                value="<?= old('nama_kegiatan', $realisasi['nama_kegiatan']) ?>"
                required>
        </div>

        <div class="form-group">
            <label for="waktu_kegiatan">Waktu Kegiatan</label>

            <input
                type="date"
                name="waktu_kegiatan"
                id="waktu_kegiatan"
                class="form-control"
                value="<?= old('waktu_kegiatan', $realisasi['waktu_kegiatan']) ?>">
        </div>

        <div class="form-group">
            <label for="peserta">Peserta</label>

            <textarea
                name="peserta"
                id="peserta"
                class="form-control"
                rows="3"><?= old('peserta', $realisasi['peserta']) ?></textarea>
        </div>

        <div class="form-group">
            <label for="hasil_pelaksanaan">Hasil Pelaksanaan Kegiatan</label>

            <textarea
                name="hasil_pelaksanaan"
                id="hasil_pelaksanaan"
                class="form-control"
                rows="5"><?= old('hasil_pelaksanaan', $realisasi['hasil_pelaksanaan']) ?></textarea>
        </div>

        <div class="form-group">
            <label for="anggaran">Anggaran Kegiatan (Rp)</label>

            <input
                type="number"
                name="anggaran"
                id="anggaran"
                class="form-control"
                min="0"
                step="0.01"
                value="<?= old('anggaran', $realisasi['anggaran']) ?>">
        </div>

        <div class="form-group">
            <label for="sumber_pendanaan">Sumber Pendanaan Kegiatan</label>

            <select
                name="sumber_pendanaan"
                id="sumber_pendanaan"
                class="form-control">

                <option value="">-- Pilih Sumber Pendanaan --</option>

                <option value="APBD Kota" <?= $realisasi['sumber_pendanaan'] === 'APBD Kota' ? 'selected' : '' ?>>
                    APBD Kota
                </option>

                <option value="DAK" <?= $realisasi['sumber_pendanaan'] === 'DAK' ? 'selected' : '' ?>>
                    DAK
                </option>

                <option value="Swadaya" <?= $realisasi['sumber_pendanaan'] === 'Swadaya' ? 'selected' : '' ?>>
                    Swadaya
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="link_drive">Link Drive/Cloud</label>

            <input
                type="url"
                name="link_drive"
                id="link_drive"
                class="form-control"
                value="<?= old('link_drive', $realisasi['link_drive']) ?>">
        </div>

        <div class="form-group">
            <label for="data_dukung">Data Dukung</label>

            <textarea
                name="data_dukung"
                id="data_dukung"
                class="form-control"
                rows="4"><?= old('data_dukung', $realisasi['data_dukung']) ?></textarea>
        </div>

        <div class="form-actions">
            <a
                href="<?= base_url('tim-pembina/realisasi') ?>"
                class="btn-secondary">
                Batal
            </a>

            <button type="submit" class="btn-primary">
                Simpan Perubahan
            </button>
        </div>

    </form>

</div>

<?= $this->endSection() ?>