<?php

/**
 * Helper foto sekretariat.
 *
 * Pemeriksaan titik koordinat (GPS) yang tersimpan
 * pada EXIF foto, dipakai saat upload foto.
 *
 * Penggunaan:
 *
 *   if (
 *       foto_exif_tersedia()
 *       && foto_koordinat($path) === null
 *   ) {
 *       // tolak upload
 *   }
 */

if (! function_exists('foto_exif_tersedia')) {

    /**
     * Apakah ekstensi EXIF PHP tersedia?
     *
     * Jika tidak tersedia, pemeriksaan koordinat
     * dilewati agar upload tetap berjalan.
     */
    function foto_exif_tersedia(): bool
    {
        return function_exists('exif_read_data');
    }
}

if (! function_exists('foto_koordinat')) {

    /**
     * Ambil titik koordinat dari EXIF foto.
     *
     * @return array{lat: float, lon: float}|null
     *         null jika foto tidak punya GPS
     *         atau tidak dapat dibaca.
     */
    function foto_koordinat(string $path): ?array
    {
        if (! foto_exif_tersedia()) {
            return null;
        }

        if (! is_file($path) || ! is_readable($path)) {
            return null;
        }

        // =====================================================
        // BACA EXIF
        // =====================================================
        //
        // Dibaca dua cara karena isi section GPS
        // bergantung pada isi file:
        //
        // 1. section GPS
        // 2. seluruh tag (datar)
        //

        $gps = [];

        $exif =
            @exif_read_data($path, 'GPS', true);

        if (is_array($exif) && ! empty($exif['GPS'])) {
            $gps = $exif['GPS'];
        }

        if (
            empty($gps['GPSLatitude'])
            || empty($gps['GPSLongitude'])
        ) {

            $datar = @exif_read_data($path);

            if (is_array($datar)) {
                $gps = array_merge($gps, $datar);
            }
        }

        if (
            empty($gps['GPSLatitude'])
            || empty($gps['GPSLongitude'])
        ) {
            return null;
        }

        // =====================================================
        // KE DESIMAL
        // =====================================================

        $lat =
            exif_ke_desimal(
                $gps['GPSLatitude'],
                $gps['GPSLatitudeRef'] ?? null
            );

        $lon =
            exif_ke_desimal(
                $gps['GPSLongitude'],
                $gps['GPSLongitudeRef'] ?? null
            );

        if ($lat === null || $lon === null) {
            return null;
        }

        if ($lat === 0.0 && $lon === 0.0) {
            return null;
        }

        return [
            'lat' => $lat,
            'lon' => $lon,
        ];
    }
}

if (! function_exists('exif_ke_desimal')) {

    /**
     * Konversi nilai koordinat EXIF ke desimal.
     *
     * EXIF menyimpan koordinat sebagai derajat,
     * menit, detik (mis. "4/1, 26/1, 4852/100")
     * dan petunjuk arah (N/S/E/W).
     *
     * @param mixed    $nilai GPSLatitude / GPSLongitude
     * @param mixed    $ref   GPSLatitudeRef / GPSLongitudeRef
     */
    function exif_ke_desimal(
        $nilai,
        ?string $ref = null
    ): ?float {

        $bagian = [];

        // =====================================================
        // RATAKAN KOMponen EXIF
        // =====================================================
        //
        // Nilai bisa berupa string tunggal, array
        // derajat/menit/detik, atau array bersarang.
        //

        if (is_string($nilai) || is_numeric($nilai)) {
            $nilai = [$nilai];
        }

        if (! is_array($nilai)) {
            return null;
        }

        $datar = [];

        $tumpukan = [$nilai];

        while ($tumpukan !== []) {

            $kini = array_pop($tumpukan);

            foreach ($kini as $item) {

                if (is_array($item)) {
                    $tumpukan[] = $item;
                    continue;
                }

                $datar[] = $item;
            }
        }

        foreach ($datar as $item) {

            if (! is_string($item)
                && ! is_numeric($item)
            ) {
                return null;
            }

            $item = (string) $item;

            // Pecahan EXIF, contoh: 4852/100

            if (strpos($item, '/') !== false) {

                $potong =
                    explode('/', $item);

                $pembilang =
                    (float) ($potong[0] ?? 0);

                $penyebut =
                    (float) ($potong[1] ?? 1);

                if ($penyebut == 0) {
                    return null;
                }

                $bagian[] =
                    $pembilang / $penyebut;

                continue;
            }

            if (! is_numeric($item)) {
                return null;
            }

            $bagian[] = (float) $item;
        }

        if ($bagian === []) {
            return null;
        }

        // derajat + menit/60 + detik/3600

        $desimal =
            ($bagian[0] ?? 0)
            + (($bagian[1] ?? 0) / 60)
            + (($bagian[2] ?? 0) / 3600);

        if (is_array($ref)) {
            $ref = reset($ref);
        }

        if (is_string($ref) && $ref !== '') {

            $arah = strtoupper($ref);

            if ($arah === 'S' || $arah === 'W') {
                $desimal = -$desimal;
            }
        }

        return $desimal;
    }
}
