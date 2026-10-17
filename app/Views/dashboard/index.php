<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<?php
$role = session()->get('role') ?? ($role ?? 'user');
$nama = session()->get('nama') ?? ($username ?? 'Pengguna');
?>

<style>

/* =========================================================
   DASHBOARD
   Struktur tetap, hanya penyelarasan warna
========================================================= */

.dashboard-page {
    width: 100%;
}


/* =========================================================
   WELCOME HEADER
========================================================= */

.dashboard-welcome {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 18px;
}

.dashboard-welcome-left h1 {
    margin: 0;
    color: #063b78;
    font-size: 24px;
    font-weight: 800;
    letter-spacing: -.3px;
}

.dashboard-welcome-left p {
    margin: 5px 0 0;
    color: #69839e;
    font-size: 13px;
}

.dashboard-location {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 9px 13px;
    background: #ffffff;
    border: 1px solid #dcebf8;
    border-radius: 9px;
    color: #063b78;
    font-size: 12px;
    font-weight: 700;
    box-shadow: 0 4px 14px rgba(6, 59, 120, .05);
}

.dashboard-location i {
    color: #087df5;
}


/* =========================================================
   STAT CARDS
========================================================= */

.dashboard-stats {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 14px;
    margin-bottom: 14px;
}

.dashboard-stat-card {
    position: relative;
    min-height: 100px;
    overflow: hidden;

    background: #ffffff;

    border: 1px solid #f8dedc;
    border-radius: 10px;

    padding: 16px;

    box-shadow:
        0 5px 18px
        rgba(6, 59, 120, .06);
}

.dashboard-stat-card::after {
    content: "";
    position: absolute;
    right: -20px;
    bottom: -25px;

    width: 72px;
    height: 72px;

    border-radius: 50%;

    background: #edf6ff;
}

.dashboard-stat-card.blue::after {
    background: #edf6ff;
}

.dashboard-stat-card.green::after {
    background: #edf9f2;
}

.dashboard-stat-card.gold::after {
    background: #fff9e8;
}

.dashboard-stat-card.cyan::after {
    background: #edfaff;
}

.dashboard-stat-card.purple::after {
    background: #f5efff;
}

.dashboard-stat-top {
    position: relative;
    z-index: 2;

    display: flex;
    align-items: flex-start;
    justify-content: space-between;
}

.dashboard-stat-label {
    color: #000000;
    font-size: 11px;
    font-weight: 700;
}

.dashboard-stat-icon {
    width: 30px;
    height: 30px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 7px;

    font-size: 14px;
}

.dashboard-stat-card.blue .dashboard-stat-icon {
    background: #edf6ff;
    color: #087df5;
}

.dashboard-stat-card.green .dashboard-stat-icon {
    background: #edf9f2;
    color: #16a34a;
}

.dashboard-stat-card.gold .dashboard-stat-icon {
    background: #fff8df;
    color: #d99b00;
}

.dashboard-stat-card.cyan .dashboard-stat-icon {
    background: #edfaff;
    color: #0891b2;
}

.dashboard-stat-card.purple .dashboard-stat-icon {
    background: #f5efff;
    color: #7c3aed;
}

.dashboard-stat-value {
    position: relative;
    z-index: 2;

    margin-top: 9px;

    color: #063b78;
    font-size: 20px;
    line-height: 1;
    font-weight: 800;
}

.dashboard-stat-description {
    position: relative;
    z-index: 2;

    margin-top: 6px;

    color: #7890a7;
    font-size: 9px;
}


/* =========================================================
   CHART AREA
========================================================= */

.dashboard-chart-grid {
    display: grid;
    grid-template-columns: minmax(0, 1.7fr) minmax(280px, .9fr);
    gap: 14px;
    margin-bottom: 14px;
}

.dashboard-panel {
    background: #ffffff;

    border: 1px solid #dcebf8;
    border-radius: 10px;

    box-shadow:
        0 5px 18px
        rgba(6, 59, 120, .06);

    overflow: hidden;
}

.dashboard-panel-header {
    padding: 13px 15px 0;
}

.dashboard-panel-title {
    margin: 0;

    color: #063b78;

    font-size: 12px;
    font-weight: 800;
}

.dashboard-panel-subtitle {
    margin-top: 3px;

    color: #8a9caf;

    font-size: 9px;
}

.dashboard-chart {
    position: relative;

    height: 160px;

    padding: 8px 14px 12px;
}


/* =========================================================
   DONUT
========================================================= */

.dashboard-donut {
    height: 160px;

    display: flex;
    align-items: center;
    justify-content: center;

    position: relative;
}

.dashboard-donut canvas {
    max-width: 150px;
    max-height: 150px;
}


/* =========================================================
   BOTTOM GRID
========================================================= */

.dashboard-bottom-grid {
    display: grid;
    grid-template-columns: minmax(0, 1.3fr) minmax(0, 1fr);
    gap: 14px;
}

.dashboard-summary {
    padding: 12px 14px 14px;

    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 7px;
}

.dashboard-summary-item {
    border: 1px solid #dcebf8;
    border-radius: 7px;

    padding: 9px 10px;

    background: #fbfdff;
}

.dashboard-summary-label {
    color: #7890a7;
    font-size: 8px;
}

.dashboard-summary-value {
    margin-top: 4px;

    color: #063b78;

    font-size: 14px;
    font-weight: 800;
}


/* =========================================================
   QUICK ACTION
========================================================= */

.dashboard-actions {
    padding: 12px 14px 14px;

    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 7px;
}

.dashboard-action {
    display: flex;
    align-items: center;
    gap: 9px;

    min-height: 39px;

    padding: 7px 9px;

    border: 1px solid #dcebf8;
    border-radius: 7px;

    background: #ffffff;

    text-decoration: none;

    transition: .18s ease;
}

.dashboard-action:hover {
    background: #f6fbff;
    border-color: #b9d9f5;
    transform: translateY(-1px);
}

.dashboard-action-icon {
    width: 27px;
    height: 27px;

    flex: 0 0 27px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 6px;

    background: #edf6ff;
    color: #087df5;

    font-size: 12px;
}

.dashboard-action-text {
    min-width: 0;
}

.dashboard-action-title {
    color: #063b78;

    font-size: 9px;
    font-weight: 800;
}

.dashboard-action-description {
    margin-top: 2px;

    color: #8a9caf;

    font-size: 7px;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 1100px) {

    .dashboard-stats {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .dashboard-chart-grid {
        grid-template-columns: 1fr;
    }

    .dashboard-bottom-grid {
        grid-template-columns: 1fr;
    }
}


@media (max-width: 700px) {

    .dashboard-welcome {
        align-items: flex-start;
        flex-direction: column;
    }

    .dashboard-stats {
        grid-template-columns: 1fr;
    }

    .dashboard-summary {
        grid-template-columns: 1fr;
    }

    .dashboard-actions {
        grid-template-columns: 1fr;
    }

    .dashboard-welcome-left h1 {
        font-size: 21px;
    }
}


/* =========================================================
   KARTU STATISTIK - BISA DIKLIK
========================================================= */

.dashboard-stat-card[data-progres] {
    cursor: pointer;
    transition:
        transform .15s ease,
        box-shadow .15s ease;
}

.dashboard-stat-card[data-progres]:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(6, 59, 120, .10);
}

.dashboard-stat-card[data-progres].active {
    outline: 2px solid #087df5;
    outline-offset: -2px;
}

.dashboard-stat-hint {
    display: flex;
    align-items: center;
    gap: 4px;
    margin-top: 10px;
    font-size: 10px;
    font-weight: 700;
    color: #087df5;
}


/* =========================================================
   PANEL PROGRES KELEMBAGAAN
========================================================= */

.dashboard-progres {
    background: #ffffff;
    border: 1px solid #dcebf8;
    border-radius: 12px;
    padding: 14px 16px 16px;
    margin-bottom: 20px;
    box-shadow: 0 6px 18px rgba(6, 59, 120, .06);
}

.dashboard-progres-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 12px;
}

.dashboard-progres-title {
    font-size: 14px;
    font-weight: 800;
    color: #063b78;
}

.dashboard-progres-close {
    border: 0;
    background: transparent;
    color: #7890a7;
    font-size: 20px;
    line-height: 1;
    cursor: pointer;
}

.dashboard-progres-list {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 8px;
}

.dashboard-progres-item {
    border: 1px solid #e3eefb;
    border-radius: 8px;
    background: #fbfdff;
    padding: 10px;
    text-align: center;
}

.dashboard-progres-item .progres-label {
    font-size: 11px;
    color: #7890a7;
}

.dashboard-progres-item .progres-value {
    font-size: 18px;
    font-weight: 800;
    color: #063b78;
    margin-top: 4px;
}

.dashboard-progres-item .progres-badge {
    display: inline-block;
    margin-top: 6px;
    padding: 3px 10px;
    border-radius: 20px;
    font-size: 10px;
    font-weight: 700;
}

.dashboard-progres-item .progres-badge.terisi {
    background: #eafaf1;
    color: #159957;
    border: 1px solid #9eddbb;
}

.dashboard-progres-item .progres-badge.kosong {
    background: #fff8e1;
    color: #b77900;
    border: 1px solid #f2c94c;
}


/* =========================================================
   FORM NILAI SELF-ASSESSMENT (SEMENTARA)
========================================================= */

.dashboard-progres-form {
    margin-top: 12px;
    padding: 12px;
    background: #f8fafc;
    border: 1px solid #e6eef6;
    border-radius: 10px;
}

.dashboard-progres-form .progres-form-title {
    font-size: 12px;
    font-weight: 700;
    color: #33506b;
    margin-bottom: 8px;
}

.dashboard-progres-form .progres-form-badge {
    display: inline-block;
    margin-left: 6px;
    padding: 2px 8px;
    border-radius: 20px;
    background: #fff8e1;
    color: #b77900;
    border: 1px solid #f2c94c;
    font-size: 10px;
    font-weight: 700;
    vertical-align: middle;
}

.dashboard-progres-form .progres-form-row {
    display: flex;
    gap: 8px;
}

.dashboard-progres-form .progres-form-input {
    flex: 1;
    min-width: 0;
    padding: 8px 10px;
    border: 1px solid #cfe2f5;
    border-radius: 8px;
    background: #ffffff;
    color: #063b78;
    font-size: 12px;
    font-weight: 600;
}

.dashboard-progres-form .progres-form-input:focus {
    outline: none;
    border-color: #087df5;
    box-shadow: 0 0 0 2px rgba(8, 125, 245, .15);
}

.dashboard-progres-form .progres-form-submit {
    padding: 8px 14px;
    border: 0;
    border-radius: 8px;
    background: #087df5;
    color: #ffffff;
    font-size: 12px;
    font-weight: 700;
    cursor: pointer;
}

.dashboard-progres-form .progres-form-submit:hover {
    background: #0568d4;
}

.dashboard-progres-form .progres-form-info {
    margin-top: 8px;
    font-size: 10.5px;
    color: #69839e;
}

.dashboard-progres-form .progres-form-info .badge {
    display: inline-block;
    padding: 2px 8px;
    border-radius: 20px;
    font-size: 10px;
    font-weight: 700;
    background: #eafaf1;
    color: #159957;
    border: 1px solid #9eddbb;
}


/* =========================================================
   TOMBOL UNDUH EXCEL (Khusus Admin)
========================================================= */

.dashboard-progres-export {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
    margin-bottom: 12px;
    padding-bottom: 12px;
    border-bottom: 1px dashed #e6eef6;
}

.dashboard-progres-export-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 14px;
    border-radius: 8px;
    background: #159957;
    color: #ffffff;
    font-size: 12px;
    font-weight: 700;
    text-decoration: none;
}

.dashboard-progres-export-btn:hover {
    background: #0e7a42;
    color: #ffffff;
}

.dashboard-progres-export-info {
    font-size: 11px;
    color: #69839e;
}


/* =========================================================
   TOOLBAR DROPDOWN GRAFIK
========================================================= */

.dashboard-chart-toolbar {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 8px;
    margin-bottom: 14px;
}

.dashboard-chart-toolbar label {
    font-size: 12px;
    font-weight: 600;
    color: #69839e;
}

.dashboard-chart-toolbar select {
    border: 1px solid #cfe2f5;
    border-radius: 8px;
    background: #ffffff;
    color: #063b78;
    font-size: 12px;
    font-weight: 700;
    padding: 7px 12px;
    cursor: pointer;
}

.dashboard-chart-toolbar-right {
    display: flex;
    align-items: center;
    gap: 8px;
}

.dashboard-export-excel {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 7px 12px;
    border-radius: 8px;
    background: #159957;
    color: #ffffff;
    font-size: 12px;
    font-weight: 700;
    text-decoration: none;
}

.dashboard-export-excel:hover {
    background: #0f7a44;
}


@media (max-width: 700px) {

    .dashboard-progres-list {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .dashboard-chart-toolbar {
        justify-content: flex-start;
    }
}

</style>


<div class="dashboard-page">


    <!-- =====================================================
         WELCOME
    ====================================================== -->

    <div class="dashboard-welcome">

        <div class="dashboard-welcome-left">

            <h1>
                Selamat Datang
            </h1>

            <p>
                Ringkasan data program Bandung Kota Sehat.
            </p>

        </div>

    </div>



    <!-- =====================================================
         STAT CARDS
    ====================================================== -->

    <div class="dashboard-stats">


        <!-- TIM PEMBINA -->
        <!-- Klik kartu untuk melihat progres -->

        <div
            class="dashboard-stat-card gold"
            role="button"
            tabindex="0"
            data-progres="tim_pembina"
            onclick="toggleProgres('tim_pembina')"
            onkeydown="if(event.key==='Enter'){toggleProgres('tim_pembina')}"
        >

            <div class="dashboard-stat-top">

                <div class="dashboard-stat-label">
                    Tim Pembina
                </div>

                <div class="dashboard-stat-icon">

                    <i class="bi bi-people"></i>

                </div>

            </div>


            <div class="dashboard-stat-value">

                <?= esc(
                    $jumlahTimPembina ?? 0
                ) ?>

            </div>


            <div class="dashboard-stat-description">

                Data Tim Pembina Bandung Sehat

            </div>


            <div class="dashboard-stat-hint">

                <i class="bi bi-chevron-down"></i>

                Lihat progres

            </div>

        </div>



        <!-- FORUM BANDUNG SEHAT -->
        <!-- Klik kartu untuk melihat progres -->

        <div
            class="dashboard-stat-card green"
            role="button"
            tabindex="0"
            data-progres="forum_bandung_sehat"
            onclick="toggleProgres('forum_bandung_sehat')"
            onkeydown="if(event.key==='Enter'){toggleProgres('forum_bandung_sehat')}"
        >

            <div class="dashboard-stat-top">

                <div class="dashboard-stat-label">
                    Forum Bandung Sehat
                </div>

                <div class="dashboard-stat-icon">

                    <i class="bi bi-building"></i>

                </div>

            </div>


            <div class="dashboard-stat-value">

                <?= esc(
                    $jumlahForumBandung ?? 0
                ) ?>

            </div>


            <div class="dashboard-stat-description">

                Jumlah Forum Bandung Sehat tercatat

            </div>


            <div class="dashboard-stat-hint">

                <i class="bi bi-chevron-down"></i>

                Lihat progres

            </div>

        </div>



        <!-- FORUM KECAMATAN SEHAT -->
        <!-- Klik kartu untuk melihat progres -->

        <div
            class="dashboard-stat-card cyan"
            role="button"
            tabindex="0"
            data-progres="forum_kecamatan_sehat"
            onclick="toggleProgres('forum_kecamatan_sehat')"
            onkeydown="if(event.key==='Enter'){toggleProgres('forum_kecamatan_sehat')}"
        >

            <div class="dashboard-stat-top">

                <div class="dashboard-stat-label">
                    Forum Kecamatan Sehat
                </div>

                <div class="dashboard-stat-icon">

                    <i class="bi bi-chat-square-text"></i>

                </div>

            </div>


            <div class="dashboard-stat-value">

                <?= esc(
                    $jumlahForumKecamatan ?? 0
                ) ?>

            </div>


            <div class="dashboard-stat-description">

                Data Forum Kecamatan Sehat

            </div>


            <div class="dashboard-stat-hint">

                <i class="bi bi-chevron-down"></i>

                Lihat progres

            </div>

        </div>



        <!-- POKJA KELURAHAN SEHAT -->
        <!-- Klik kartu untuk melihat progres -->

        <div
            class="dashboard-stat-card purple"
            role="button"
            tabindex="0"
            data-progres="pokja_kelurahan_sehat"
            onclick="toggleProgres('pokja_kelurahan_sehat')"
            onkeydown="if(event.key==='Enter'){toggleProgres('pokja_kelurahan_sehat')}"
        >

            <div class="dashboard-stat-top">

                <div class="dashboard-stat-label">
                    Pokja Kelurahan Sehat
                </div>

                <div class="dashboard-stat-icon">

                    <i class="bi bi-diagram-3"></i>

                </div>

            </div>


            <div class="dashboard-stat-value">

                <?= esc(
                    $jumlahPokja ?? 0
                ) ?>

            </div>


            <div class="dashboard-stat-description">

                Data Pokja Kelurahan Sehat

            </div>


            <div class="dashboard-stat-hint">

                <i class="bi bi-chevron-down"></i>

                Lihat progres

            </div>

        </div>


    </div>



    <!-- =====================================================
         PROGRES KELEMBAGAAN
         Muncul saat kartu statistik diklik
    ====================================================== -->

    <div
        class="dashboard-progres"
        id="panelProgres"
        style="display:none"
    >


        <?php

            /*
            |--------------------------------------------------------------------------
            | DATA PROGRES
            |--------------------------------------------------------------------------
            */

            $daftarProgres =
                $progresKelembagaan ?? [];

            $labelItemProgres = [
                'sk'            => 'SK',
                'rencana_kerja' => 'Rencana Kerja',
                'realisasi'     => 'Realisasi Kegiatan',
                'foto'          => 'Foto Sekretariat',
            ];

            $roleUser =
                session()->get('role')
                ?? ($role ?? 'user');

        ?>


        <?php if ($roleUser === 'admin'): ?>


            <div class="dashboard-progres-export">

                <a
                    href="<?= site_url('self-assessment/excel') ?>"
                    class="dashboard-progres-export-btn"
                >
                    <i class="bi bi-file-earmark-excel"></i>
                    Unduh Excel
                </a>

                <span class="dashboard-progres-export-info">
                    Semua nilai self-assessment seluruh user
                    (khusus admin)
                </span>

            </div>


        <?php endif; ?>


        <?php foreach ($daftarProgres as $key => $modul): ?>


            <div
                class="dashboard-progres-section"
                id="progres-<?= esc($key) ?>"
                style="display:none"
            >


                <div class="dashboard-progres-header">

                    <div class="dashboard-progres-title">

                        Progres
                        <?= esc($modul['label']) ?>

                    </div>

                    <button
                        type="button"
                        class="dashboard-progres-close"
                        title="Tutup"
                        onclick="toggleProgres('<?= esc($key) ?>')"
                    >
                        &times;
                    </button>

                </div>


                <div class="dashboard-progres-list">

                    <?php foreach (
                        $labelItemProgres
                        as $itemKey
                        => $itemLabel
                    ): ?>

                        <?php

                            $nilai =
                                (int) (
                                    $modul['items'][$itemKey]
                                    ?? 0
                                );

                            $terisi =
                                $nilai > 0;

                        ?>

                        <div class="dashboard-progres-item">

                            <div class="progres-label">
                                <?= esc($itemLabel) ?>
                            </div>

                            <div class="progres-value">
                                <?= $nilai ?>
                            </div>

                            <span
                                class="progres-badge <?= $terisi
                                    ? 'terisi'
                                    : 'kosong' ?>"
                            >
                                <?= $terisi
                                    ? 'Terisi'
                                    : 'Belum' ?>
                            </span>

                        </div>

                    <?php endforeach; ?>

                </div>


                <?php

                    /*
                    |--------------------------------------------------------------------------
                    | FORM NILAI SELF-ASSESSMENT
                    |--------------------------------------------------------------------------
                    */

                    $nilaiSA =
                        $modul['nilai_self_assessment']
                        ?? null;

                ?>


                <form
                    class="dashboard-progres-form"
                    method="post"
                    action="<?= site_url('self-assessment/store') ?>"
                >


                    <input
                        type="hidden"
                        name="modul"
                        value="<?= esc($key) ?>"
                    >


                    <div class="progres-form-title">

                        Nilai Self-Assessment

                        <span class="progres-form-badge">
                            sementara
                        </span>

                    </div>


                    <div class="progres-form-row">

                        <input
                            type="number"
                            name="nilai"
                            class="progres-form-input"
                            min="0"
                            max="100"
                            step="0.5"
                            placeholder="0 - 100"
                            value="<?= $nilaiSA !== null
                                ? esc(number_format(
                                    (float) $nilaiSA['nilai'],
                                    2,
                                    '.',
                                    ''
                                ))
                                : '' ?>"
                            required
                        >

                        <button
                            type="submit"
                            class="progres-form-submit"
                        >
                            Simpan
                        </button>

                    </div>


                    <div class="progres-form-info">

                        <?php if ($nilaiSA): ?>

                            <?php

                                $tanggalSA =
                                    $nilaiSA['updated_at']
                                    ?? $nilaiSA['created_at']
                                    ?? null;

                            ?>

                            <span class="badge">
                                Tersimpan
                            </span>

                            status
                            <strong>
                                <?= esc(
                                    $nilaiSA['status']
                                    ?? 'sementara'
                                ) ?>
                            </strong>

                            <?php if ($tanggalSA): ?>
                                &middot;
                                <?= date(
                                    'd/m/Y H:i',
                                    strtotime($tanggalSA)
                                ) ?>
                            <?php endif; ?>

                        <?php else: ?>

                            Belum dinilai
                            &middot;
                            isi nilai 0 - 100 lalu
                            klik Simpan

                        <?php endif; ?>

                    </div>


                </form>


            </div>


        <?php endforeach; ?>


    </div>



    <!-- =====================================================
         CHARTS
    ====================================================== -->

    <!-- DROPDOWN PILIH TAMPILAN GRAFIK + TOMBOL EXCEL -->

    <div class="dashboard-chart-toolbar">


        <?php if (($role ?? session()->get('role')) === 'admin'): ?>

            <a
                href="<?= site_url('export/self-assessment') ?>"
                class="dashboard-export-excel"
                title="Unduh nilai self-assessment seluruh user (Excel)"
            >
                <i class="bi bi-file-earmark-excel"></i>
                Unduh Excel
            </a>

        <?php endif; ?>


        <div class="dashboard-chart-toolbar-right">

            <label for="chartScope">
                Tampilkan grafik
            </label>

            <select id="chartScope">

                <option value="kelembagaan">
                    Kelembagaan (semua)
                </option>

                <option value="tim_pembina">
                    Tim Pembina
                </option>

                <option value="forum_bandung_sehat">
                    Forum Bandung Sehat
                </option>

                <option value="forum_kecamatan_sehat">
                    Forum Kecamatan Sehat
                </option>

                <option value="pokja_kelurahan_sehat">
                    Pokja Kelurahan Sehat
                </option>

            </select>

        </div>

    </div>


    <div class="dashboard-chart-grid">


        <!-- LINE CHART -->

        <div class="dashboard-panel">

            <div class="dashboard-panel-header">

                <h3 class="dashboard-panel-title">
                    Statistik Program
                </h3>

                <div class="dashboard-panel-subtitle">
                    Ringkasan jumlah data pada sistem
                </div>

            </div>


            <div class="dashboard-chart">

                <canvas id="dataChart"></canvas>

            </div>

        </div>



        <!-- DONUT CHART -->

        <div class="dashboard-panel">

            <div class="dashboard-panel-header">

                <h3 class="dashboard-panel-title">
                    Distribusi Data
                </h3>

                <div class="dashboard-panel-subtitle">
                    Perbandingan data program
                </div>

            </div>


            <div class="dashboard-donut">

                <canvas id="donutChart"></canvas>

            </div>

        </div>


    </div>



    <!-- =====================================================
         BOTTOM
    ====================================================== -->

    <div class="dashboard-bottom-grid">


        <!-- RINGKASAN SISTEM -->

        <div class="dashboard-panel">

            <div class="dashboard-panel-header">

                <h3 class="dashboard-panel-title">
                    Ringkasan Sistem
                </h3>

            </div>


            <div class="dashboard-summary">


                <div class="dashboard-summary-item">

                    <div class="dashboard-summary-label">
                        Tim Pembina
                    </div>

                    <div class="dashboard-summary-value">

                        <?= esc(
                            $jumlahTimPembina ?? 0
                        ) ?>

                    </div>

                </div>


                <div class="dashboard-summary-item">

                    <div class="dashboard-summary-label">
                        Forum Bandung Sehat
                    </div>

                    <div class="dashboard-summary-value">

                        <?= esc(
                            $jumlahForumBandung ?? 0
                        ) ?>

                    </div>

                </div>


                <div class="dashboard-summary-item">

                    <div class="dashboard-summary-label">
                        Forum Kecamatan
                    </div>

                    <div class="dashboard-summary-value">

                        <?= esc(
                            $jumlahForumKecamatan ?? 0
                        ) ?>

                    </div>

                </div>


                <div class="dashboard-summary-item">

                    <div class="dashboard-summary-label">
                        Pokja Kelurahan
                    </div>

                    <div class="dashboard-summary-value">

                        <?= esc(
                            $jumlahPokja ?? 0
                        ) ?>

                    </div>

                </div>


            </div>

        </div>



        <!-- AKSES CEPAT -->

        <div class="dashboard-panel">

            <div class="dashboard-panel-header">

                <h3 class="dashboard-panel-title">
                    Akses Cepat
                </h3>

            </div>


            <div class="dashboard-actions">


                <?php if (
                    in_array(
                        $role,
                        [
                            'user',
                            'admin'
                        ],
                        true
                    )
                ): ?>


                    <!-- INOVASI - PERANGKAT DAERAH -->

                    <a
                        href="<?= base_url(
                            'inovasi/perangkat-daerah'
                        ) ?>"
                        class="dashboard-action"
                    >

                        <div class="dashboard-action-icon">

                            <i class="bi bi-building-fill"></i>

                        </div>

                        <div class="dashboard-action-text">

                            <div class="dashboard-action-title">
                                Perangkat Daerah
                            </div>

                            <div class="dashboard-action-description">
                                Kelola inovasi
                            </div>

                        </div>

                    </a>



                    <!-- INOVASI - KECAMATAN -->

                    <a
                        href="<?= base_url(
                            'inovasi/kecamatan'
                        ) ?>"
                        class="dashboard-action"
                    >

                        <div class="dashboard-action-icon">

                            <i class="bi bi-building"></i>

                        </div>

                        <div class="dashboard-action-text">

                            <div class="dashboard-action-title">
                                Kecamatan
                            </div>

                            <div class="dashboard-action-description">
                                Kelola inovasi
                            </div>

                        </div>

                    </a>



                    <!-- INOVASI - KELURAHAN -->

                    <a
                        href="<?= base_url(
                            'inovasi/kelurahan'
                        ) ?>"
                        class="dashboard-action"
                    >

                        <div class="dashboard-action-icon">

                            <i class="bi bi-house-fill"></i>

                        </div>

                        <div class="dashboard-action-text">

                            <div class="dashboard-action-title">
                                Kelurahan
                            </div>

                            <div class="dashboard-action-description">
                                Kelola inovasi
                            </div>

                        </div>

                    </a>


                <?php endif; ?>


            </div>

        </div>


    </div>


</div>



<!-- =========================================================
     CHART.JS
========================================================= -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {


        /* =====================================================
           DATA
           Keempat komponen Kelembagaan
        ====================================================== */

        const jumlahTimPembina =
            <?= (int) (
                $jumlahTimPembina ?? 0
            ) ?>;

        const jumlahForumBandung =
            <?= (int) (
                $jumlahForumBandung ?? 0
            ) ?>;

        const jumlahForumKecamatan =
            <?= (int) (
                $jumlahForumKecamatan ?? 0
            ) ?>;

        const jumlahPokja =
            <?= (int) (
                $jumlahPokja ?? 0
            ) ?>;


        /* =====================================================
           PROGRES TIAP KELEMBAGAAN
        ====================================================== */

        const progres =
            <?= json_encode(
                $progresKelembagaan ?? []
            ) ?>;

        const labelKelembagaan = [
            'Tim Pembina',
            'Forum Bandung Sehat',
            'Forum Kecamatan Sehat',
            'Pokja Kelurahan Sehat'
        ];

        const dataKelembagaan = [
            jumlahTimPembina,
            jumlahForumBandung,
            jumlahForumKecamatan,
            jumlahPokja
        ];

        const labelSubProgres = [
            'SK',
            'Rencana Kerja',
            'Realisasi Kegiatan',
            'Foto Sekretariat'
        ];

        const keySubProgres = [
            'sk',
            'rencana_kerja',
            'realisasi',
            'foto'
        ];


        /*
         * Label + data sesuai pilihan dropdown
         */
        function ambilScope(scope) {

            if (scope === 'kelembagaan') {

                return {
                    labels: labelKelembagaan,
                    data: dataKelembagaan
                };
            }

            const modul = progres[scope];

            if (!modul) {
                return null;
            }

            const items = modul.items || {};

            return {
                labels: labelSubProgres,
                data: keySubProgres.map(function (key) {
                    return Number(items[key] || 0);
                })
            };
        }


        /* =====================================================
           PANEL PROGRES - KLIK KARTU STATISTIK
        ====================================================== */

        window.toggleProgres = function (key) {

            const panel =
                document.getElementById(
                    'panelProgres'
                );

            if (!panel || !key) {
                return;
            }

            const sections = panel.querySelectorAll(
                '.dashboard-progres-section'
            );

            const cards = document.querySelectorAll(
                '[data-progres]'
            );

            const aktif = panel.dataset.open;


            /* Klik kartu yang sama -> tutup */

            if (aktif === key) {

                panel.style.display = 'none';
                panel.dataset.open = '';

                sections.forEach(function (item) {
                    item.style.display = 'none';
                });

                cards.forEach(function (card) {
                    card.classList.remove('active');
                });

                return;
            }


            /* Buka panel + tampilkan progresnya */

            sections.forEach(function (item) {
                item.style.display =
                    item.id === 'progres-' + key
                        ? 'block'
                        : 'none';
            });

            cards.forEach(function (card) {
                card.classList.toggle(
                    'active',
                    card.dataset.progres === key
                );
            });

            panel.dataset.open = key;
            panel.style.display = 'block';

            panel.scrollIntoView({
                behavior: 'smooth',
                block: 'nearest'
            });
        };



        /* =====================================================
           LINE CHART
        ====================================================== */

        let lineChart = null;

        const dataChartElement =
            document.getElementById(
                'dataChart'
            );


        if (dataChartElement) {

            lineChart = new Chart(
                dataChartElement,
                {

                    type: 'line',

                    data: {

                        labels:
                            labelKelembagaan,

                        datasets: [

                            {

                                data:
                                    dataKelembagaan,

                                borderColor:
                                    '#087df5',

                                backgroundColor:
                                    'rgba(8,125,245,.10)',

                                borderWidth: 2,

                                pointBackgroundColor:
                                    '#087df5',

                                pointBorderColor:
                                    '#ffffff',

                                pointBorderWidth:
                                    2,

                                pointRadius:
                                    3,

                                tension:
                                    .35,

                                fill:
                                    true

                            }

                        ]

                    },

                    options: {

                        responsive: true,

                        maintainAspectRatio:
                            false,

                        plugins: {

                            legend: {
                                display: false
                            }

                        },

                        scales: {

                            y: {

                                beginAtZero:
                                    true,

                                ticks: {

                                    color:
                                        '#7890a7',

                                    font: {
                                        size: 8
                                    },

                                    precision: 0

                                },

                                grid: {

                                    color:
                                        '#edf2f7'

                                }

                            },

                            x: {

                                ticks: {

                                    color:
                                        '#7890a7',

                                    font: {
                                        size: 8
                                    }

                                },

                                grid: {

                                    display:
                                        false

                                }

                            }

                        }

                    }

                }
            );

        }



        /* =====================================================
           DONUT CHART
        ====================================================== */

        let donutChart = null;

        const donutChartElement =
            document.getElementById(
                'donutChart'
            );


        if (donutChartElement) {

            donutChart = new Chart(
                donutChartElement,
                {

                    type: 'doughnut',

                    data: {

                        labels:
                            labelKelembagaan,

                        datasets: [

                            {

                                data:
                                    dataKelembagaan,

                                backgroundColor: [
                                    '#f5b700',
                                    '#087df5',
                                    '#0891b2',
                                    '#7c3aed'
                                ],

                                borderColor:
                                    '#ffffff',

                                borderWidth:
                                    2

                            }

                        ]

                    },

                    options: {

                        responsive: true,

                        maintainAspectRatio:
                            false,

                        cutout:
                            '62%',

                        plugins: {

                            legend: {

                                position:
                                    'bottom',

                                labels: {

                                    color:
                                        '#69839e',

                                    boxWidth:
                                        8,

                                    boxHeight:
                                        8,

                                    padding:
                                        8,

                                    font: {
                                        size: 7
                                    }

                                }

                            }

                        }

                    }

                }
            );

        }


        /* =====================================================
           DROPDOWN PILIH TAMPILAN GRAFIK
        ====================================================== */

        const chartScope =
            document.getElementById(
                'chartScope'
            );


        if (chartScope) {

            chartScope.addEventListener(
                'change',
                function () {

                    const scope =
                        ambilScope(
                            chartScope.value
                        );

                    if (!scope) {
                        return;
                    }

                    if (lineChart) {

                        lineChart.data.labels =
                            scope.labels;

                        lineChart.data.datasets[0].data =
                            scope.data;

                        lineChart.update();
                    }

                    if (donutChart) {

                        donutChart.data.labels =
                            scope.labels;

                        donutChart.data.datasets[0].data =
                            scope.data;

                        donutChart.update();
                    }
                }
            );
        }

    }
);

</script>


<?= $this->endSection() ?>