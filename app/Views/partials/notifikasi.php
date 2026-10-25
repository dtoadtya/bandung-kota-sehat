<?php

/**
 * Notifikasi modal (pengganti alert() browser).
 *
 * Pemakaian di view JavaScript:
 *
 *   tampilkanNotifikasi('Pesan', 'error');
 *   tampilkanNotifikasi('Berhasil', 'success');
 *
 * Flash message server (success, error, errors)
 * otomatis ditampilkan saat partial ini di-include.
 */

$pesanSukses =
    session()->getFlashdata('success');

$pesanError =
    session()->getFlashdata('error');

$daftarError =
    session()->getFlashdata('errors');

$pesanValidasi = '';

if (is_array($daftarError) && $daftarError !== []) {
    $pesanValidasi =
        implode("\n", $daftarError);
}

?>

<!-- =========================================================
     NOTIFIKASI MODAL
========================================================== -->

<style>

.notifikasi-overlay {
    position: fixed;
    inset: 0;
    z-index: 9999;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 20px;
    background: rgba(15, 23, 42, .55);
    backdrop-filter: blur(2px);
}

.notifikasi-overlay.aktif {
    display: flex;
}

.notifikasi-box {
    display: flex;
    align-items: flex-start;
    gap: 14px;
    width: 100%;
    max-width: 440px;
    padding: 22px 22px 20px;
    border-radius: 16px;
    background: #ffffff;
    box-shadow: 0 24px 60px rgba(2, 6, 23, .28);
    animation: notifikasiMuncul .22s ease-out;
}

@keyframes notifikasiMuncul {
    from {
        opacity: 0;
        transform: translateY(14px) scale(.96);
    }
    to {
        opacity: 1;
        transform: none;
    }
}

.notifikasi-ikon {
    display: flex;
    align-items: center;
    justify-content: center;
    flex: 0 0 44px;
    width: 44px;
    height: 44px;
    border-radius: 50%;
    font-size: 22px;
    color: #ffffff;
    background: #dc3545;
}

.notifikasi-box.success .notifikasi-ikon {
    background: #198754;
}

.notifikasi-box.info .notifikasi-ikon {
    background: #0d6efd;
}

.notifikasi-isi {
    flex: 1 1 auto;
    min-width: 0;
}

.notifikasi-judul {
    display: block;
    margin-bottom: 6px;
    font-size: 15px;
    font-weight: 700;
    color: #0f172a;
}

.notifikasi-pesan {
    margin: 0;
    font-size: 14px;
    line-height: 1.55;
    color: #475569;
    white-space: pre-line;
    word-break: break-word;
}

.notifikasi-tutup {
    flex: 0 0 auto;
    border: 0;
    background: transparent;
    font-size: 26px;
    line-height: 1;
    color: #94a3b8;
    cursor: pointer;
}

.notifikasi-tutup:hover {
    color: #0f172a;
}

</style>


<div
    class="notifikasi-overlay"
    id="notifikasiOverlay"
    role="dialog"
    aria-modal="true"
    aria-labelledby="notifikasiJudul"
>

    <div class="notifikasi-box error" id="notifikasiBox">

        <span class="notifikasi-ikon">
            <i
                class="bi bi-exclamation-triangle-fill"
                id="notifikasiIkon"
            ></i>
        </span>

        <div class="notifikasi-isi">

            <strong
                class="notifikasi-judul"
                id="notifikasiJudul"
            >
                Notifikasi
            </strong>

            <p
                class="notifikasi-pesan"
                id="notifikasiPesan"
            ></p>

        </div>

        <button
            type="button"
            class="notifikasi-tutup"
            id="notifikasiTutup"
            aria-label="Tutup notifikasi"
        >
            &times;
        </button>

    </div>

</div>


<script>

(function () {

    const overlay =
        document.getElementById(
            'notifikasiOverlay'
        );

    const box =
        document.getElementById(
            'notifikasiBox'
        );

    const judul =
        document.getElementById(
            'notifikasiJudul'
        );

    const pesan =
        document.getElementById(
            'notifikasiPesan'
        );

    const ikon =
        document.getElementById(
            'notifikasiIkon'
        );

    const tombolTutup =
        document.getElementById(
            'notifikasiTutup'
        );

    if (!overlay || !box) {
        return;
    }


    const setelan = {
        success: {
            judul: 'Berhasil',
            ikon:  'bi-check-circle-fill'
        },
        error: {
            judul: 'Perhatian',
            ikon:  'bi-exclamation-triangle-fill'
        },
        info: {
            judul: 'Informasi',
            ikon:  'bi-info-circle-fill'
        }
    };


    window.tampilkanNotifikasi =
        function (isiPesan, tipe) {

            const kunci =
                tipe in setelan ? tipe : 'error';

            const opsi = setelan[kunci];

            judul.textContent = opsi.judul;

            pesan.textContent =
                String(isiPesan || '');

            ikon.className =
                'bi ' + opsi.ikon;

            box.className =
                'notifikasi-box ' + kunci;

            overlay.classList.add('aktif');

            tombolTutup.focus();
        };


    function tutupNotifikasi() {
        overlay.classList.remove('aktif');
    }


    /*
    | Layout utama juga menampilkan flash berupa
    | kotak .alert tepat di atas konten.
    |
    | Agar pesan tidak muncul dua kali (kotak alert
    | dan modal), kotak alert itu dihapus saat modal
    | menampilkan flash yang sama.
    */

    window.hapusAlertLayout =
        function () {
            document
                .querySelectorAll(
                    '.app-content > .alert'
                )
                .forEach(function (elemen) {
                    elemen.remove();
                });
        };

    tombolTutup.addEventListener(
        'click',
        tutupNotifikasi
    );

    overlay.addEventListener(
        'click',
        function (event) {
            if (event.target === overlay) {
                tutupNotifikasi();
            }
        }
    );

    document.addEventListener(
        'keydown',
        function (event) {
            if (
                event.key === 'Escape'
                && overlay.classList.contains('aktif')
            ) {
                tutupNotifikasi();
            }
        }
    );

})();
</script>


<?php if ($pesanSukses): ?>

    <script>
        tampilkanNotifikasi(
            <?= json_encode($pesanSukses) ?>,
            'success'
        );

        if (typeof hapusAlertLayout === 'function') {
            hapusAlertLayout();
        }
    </script>

<?php elseif ($pesanError): ?>

    <script>
        tampilkanNotifikasi(
            <?= json_encode($pesanError) ?>,
            'error'
        );

        if (typeof hapusAlertLayout === 'function') {
            hapusAlertLayout();
        }
    </script>

<?php elseif ($pesanValidasi): ?>

    <script>
        tampilkanNotifikasi(
            <?= json_encode($pesanValidasi) ?>,
            'error'
        );

        if (typeof hapusAlertLayout === 'function') {
            hapusAlertLayout();
        }
    </script>

<?php endif; ?>
