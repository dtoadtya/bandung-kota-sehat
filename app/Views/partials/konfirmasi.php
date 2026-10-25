<?php

/**
 * Modal konfirmasi (pengganti confirm() browser).
 *
 * Pemakaian di view:
 *
 *   <a href="..." data-konfirmasi="Yakin ingin menghapus?">
 *   <form method="post" data-konfirmasi="Yakin ingin menghapus?">
 *
 * Elemen dengan atribut data-konfirmasi otomatis ditangkap
 * oleh skrip di bawah ini (klik maupun submit).
 */

?>

<!-- =========================================================
     KONFIRMASI MODAL
========================================================== -->

<style>

.konfirmasi-overlay {
    position: fixed;
    inset: 0;
    z-index: 10000;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 20px;
    background: rgba(15, 23, 42, .55);
    backdrop-filter: blur(2px);
}

.konfirmasi-overlay.aktif {
    display: flex;
}

.konfirmasi-box {
    display: flex;
    align-items: flex-start;
    gap: 14px;
    width: 100%;
    max-width: 440px;
    padding: 22px 22px 20px;
    border-radius: 16px;
    background: #ffffff;
    box-shadow: 0 24px 60px rgba(2, 6, 23, .28);
    animation: konfirmasiMuncul .22s ease-out;
}

@keyframes konfirmasiMuncul {
    from {
        opacity: 0;
        transform: translateY(14px) scale(.96);
    }
    to {
        opacity: 1;
        transform: none;
    }
}

.konfirmasi-ikon {
    display: flex;
    align-items: center;
    justify-content: center;
    flex: 0 0 44px;
    width: 44px;
    height: 44px;
    border-radius: 50%;
    font-size: 22px;
    color: #ffffff;
    background: #0d6efd;
}

.konfirmasi-isi {
    flex: 1 1 auto;
    min-width: 0;
}

.konfirmasi-judul {
    display: block;
    margin-bottom: 6px;
    font-size: 15px;
    font-weight: 700;
    color: #0f172a;
}

.konfirmasi-pesan {
    margin: 0;
    font-size: 14px;
    line-height: 1.55;
    color: #475569;
    white-space: pre-line;
    word-break: break-word;
}

.konfirmasi-aksi {
    display: flex;
    justify-content: flex-end;
    gap: 8px;
    margin-top: 18px;
}

.konfirmasi-tombol {
    padding: 8px 16px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
}

.konfirmasi-batal {
    border: 1px solid #cbd5e1;
    background: #ffffff;
    color: #334155;
}

.konfirmasi-batal:hover {
    background: #f1f5f9;
}

.konfirmasi-ya {
    border: 1px solid #dc3545;
    background: #dc3545;
    color: #ffffff;
}

.konfirmasi-ya:hover {
    background: #bb2d3b;
}

</style>


<div
    class="konfirmasi-overlay"
    id="konfirmasiOverlay"
    role="dialog"
    aria-modal="true"
    aria-labelledby="konfirmasiJudul"
    aria-describedby="konfirmasiPesan"
>

    <div class="konfirmasi-box" id="konfirmasiBox">

        <span class="konfirmasi-ikon">
            <i class="bi bi-question-lg"></i>
        </span>

        <div class="konfirmasi-isi">

            <strong
                class="konfirmasi-judul"
                id="konfirmasiJudul"
            >
                Konfirmasi
            </strong>

            <p
                class="konfirmasi-pesan"
                id="konfirmasiPesan"
            ></p>

            <div class="konfirmasi-aksi">

                <button
                    type="button"
                    class="konfirmasi-tombol konfirmasi-batal"
                    id="konfirmasiBatal"
                >
                    Batal
                </button>

                <button
                    type="button"
                    class="konfirmasi-tombol konfirmasi-ya"
                    id="konfirmasiYa"
                >
                    Ya, lanjutkan
                </button>

            </div>

        </div>

    </div>

</div>


<script>

(function () {

    const overlay =
        document.getElementById(
            'konfirmasiOverlay'
        );

    const pesan =
        document.getElementById(
            'konfirmasiPesan'
        );

    const tombolBatal =
        document.getElementById(
            'konfirmasiBatal'
        );

    const tombolYa =
        document.getElementById(
            'konfirmasiYa'
        );

    if (!overlay || !pesan) {
        return;
    }


    let aksiKonfirmasi = null;

    let lewatiKonfirmasi = 0;


    function tutupKonfirmasi() {
        overlay.classList.remove('aktif');
    }


    window.tampilkanKonfirmasi =
        function (isiPesan, saatYa) {

            pesan.textContent =
                String(isiPesan || '');

            aksiKonfirmasi =
                typeof saatYa === 'function'
                    ? saatYa
                    : null;

            overlay.classList.add('aktif');

            tombolBatal.focus();
        };


    tombolBatal.addEventListener(
        'click',
        function () {
            tutupKonfirmasi();
        }
    );

    tombolYa.addEventListener(
        'click',
        function () {

            const aksi = aksiKonfirmasi;

            tutupKonfirmasi();

            aksiKonfirmasi = null;

            if (aksi) {
                aksi();
            }
        }
    );

    overlay.addEventListener(
        'click',
        function (event) {
            if (event.target === overlay) {
                tutupKonfirmasi();
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
                tutupKonfirmasi();
            }
        }
    );


    /* Tangkap klik elemen <a>/<button> ber-atribut
       data-konfirmasi. */

    document.addEventListener(
        'click',
        function (event) {

            const elemen =
                event.target.closest
                    ? event.target.closest(
                        '[data-konfirmasi]'
                    )
                    : null;

            if (!elemen) {
                return;
            }

            if (elemen.tagName === 'FORM') {
                return;
            }

            if (lewatiKonfirmasi > 0) {
                lewatiKonfirmasi -= 1;
                return;
            }

            event.preventDefault();

            window.tampilkanKonfirmasi(
                elemen.dataset.konfirmasi,
                function () {
                    lewatiKonfirmasi += 1;
                    elemen.click();
                }
            );
        },
        true
    );


    /* Tangkap submit <form> ber-atribut
       data-konfirmasi. */

    document.addEventListener(
        'submit',
        function (event) {

            const form = event.target;

            if (
                !form
                || !form.hasAttribute
                || !form.hasAttribute(
                    'data-konfirmasi'
                )
            ) {
                return;
            }

            if (lewatiKonfirmasi > 0) {
                lewatiKonfirmasi -= 1;
                return;
            }

            event.preventDefault();

            window.tampilkanKonfirmasi(
                form.dataset.konfirmasi,
                function () {

                    lewatiKonfirmasi += 1;

                    if (
                        typeof form.requestSubmit
                            === 'function'
                    ) {
                        form.requestSubmit();
                        return;
                    }

                    lewatiKonfirmasi -= 1;

                    HTMLFormElement.prototype.submit
                        .call(form);
                }
            );
        },
        true
    );

})();
</script>
