<?php

/**
 * Helper Excel (format .xlsx asli, tanpa library
 * tambahan - memakai ZipArchive bawaan PHP).
 *
 * Penggunaan:
 *
 *   return buat_xlsx(
 *       'nama-file',
 *       ['Kolom 1', 'Kolom 2'],
 *       [
 *           ['isi 1', 10],
 *           ['isi 2', 20],
 *       ]
 *   );
 */

if (! function_exists('xlsx_string')) {

    /**
     * Bangun isi file .xlsx (binary string)
     * dari judul kolom + array baris.
     */
    function xlsx_string(
        array $judulKolom,
        array $baris
    ): string {

        // =====================================================
        // XML BAGIAN-BAGIAN FILE XLSX
        // =====================================================

        $contentTypes =
            '<?xml version="1.0" encoding="UTF-8" '
            . 'standalone="yes"?>'
            . '<Types '
            . 'xmlns="http://schemas.openxmlformats.org/'
            . 'package/2006/content-types">'
            . '<Default Extension="rels" '
            . 'ContentType="application/vnd.'
            . 'openxmlformats-package.relationships+xml"/>'
            . '<Default Extension="xml" '
            . 'ContentType="application/xml"/>'
            . '<Override PartName="/xl/workbook.xml" '
            . 'ContentType="application/vnd.'
            . 'openxmlformats-officedocument.spreadsheetml.'
            . 'sheet.main+xml"/>'
            . '<Override PartName="/xl/worksheets/sheet1.xml" '
            . 'ContentType="application/vnd.'
            . 'openxmlformats-officedocument.spreadsheetml.'
            . 'worksheet+xml"/>'
            . '<Override PartName="/xl/styles.xml" '
            . 'ContentType="application/vnd.'
            . 'openxmlformats-officedocument.spreadsheetml.'
            . 'styles+xml"/>'
            . '</Types>';


        $rels =
            '<?xml version="1.0" encoding="UTF-8" '
            . 'standalone="yes"?>'
            . '<Relationships '
            . 'xmlns="http://schemas.openxmlformats.org/'
            . 'package/2006/relationships">'
            . '<Relationship Id="rId1" '
            . 'Type="http://schemas.openxmlformats.org/'
            . 'officeDocument/2006/relationships/'
            . 'officeDocument" Target="xl/workbook.xml"/>'
            . '</Relationships>';


        $workbook =
            '<?xml version="1.0" encoding="UTF-8" '
            . 'standalone="yes"?>'
            . '<workbook '
            . 'xmlns="http://schemas.openxmlformats.org/'
            . 'spreadsheetml/2006/main" '
            . 'xmlns:r="http://schemas.openxmlformats.org/'
            . 'officeDocument/2006/relationships">'
            . '<sheets>'
            . '<sheet name="Sheet1" sheetId="1" '
            . 'r:id="rId1"/>'
            . '</sheets>'
            . '</workbook>';


        $workbookRels =
            '<?xml version="1.0" encoding="UTF-8" '
            . 'standalone="yes"?>'
            . '<Relationships '
            . 'xmlns="http://schemas.openxmlformats.org/'
            . 'package/2006/relationships">'
            . '<Relationship Id="rId1" '
            . 'Type="http://schemas.openxmlformats.org/'
            . 'officeDocument/2006/relationships/'
            . 'worksheet" Target="worksheets/sheet1.xml"/>'
            . '<Relationship Id="rId2" '
            . 'Type="http://schemas.openxmlformats.org/'
            . 'officeDocument/2006/relationships/'
            . 'styles" Target="styles.xml"/>'
            . '</Relationships>';


        // style 0 = normal, style 1 = tebal + biru muda
        $styles =
            '<?xml version="1.0" encoding="UTF-8" '
            . 'standalone="yes"?>'
            . '<styleSheet '
            . 'xmlns="http://schemas.openxmlformats.org/'
            . 'spreadsheetml/2006/main">'
            . '<fonts count="2">'
            . '<font><sz val="11"/>'
            . '<name val="Calibri"/></font>'
            . '<font><b/><sz val="11"/>'
            . '<name val="Calibri"/></font>'
            . '</fonts>'
            . '<fills count="3">'
            . '<fill><patternFill patternType="none"/>'
            . '</fill>'
            . '<fill><patternFill patternType="gray125"/>'
            . '</fill>'
            . '<fill><patternFill patternType="solid">'
            . '<fgColor rgb="FFDDEBF7"/>'
            . '<bgColor indexed="64"/>'
            . '</patternFill></fill>'
            . '</fills>'
            . '<borders count="1">'
            . '<border><left/><right/><top/><bottom/>'
            . '<diagonal/></border>'
            . '</borders>'
            . '<cellStyleXfs count="1">'
            . '<xf numFmtId="0" fontId="0" fillId="0" '
            . 'borderId="0"/>'
            . '</cellStyleXfs>'
            . '<cellXfs count="2">'
            . '<xf numFmtId="0" fontId="0" fillId="0" '
            . 'borderId="0" xfId="0"/>'
            . '<xf numFmtId="0" fontId="1" fillId="2" '
            . 'borderId="0" xfId="0" applyFont="1" '
            . 'applyFill="1"/>'
            . '</cellXfs>'
            . '<cellStyles count="1">'
            . '<cellStyle name="Normal" xfId="0" '
            . 'builtinId="0"/>'
            . '</cellStyles>'
            . '</styleSheet>';


        // =====================================================
        // LEMBAR KERJA (ISI TABEL)
        // =====================================================

        $allRows = array_merge(
            [$judulKolom],
            $baris
        );

        $sheetXml =
            '<?xml version="1.0" encoding="UTF-8" '
            . 'standalone="yes"?>'
            . '<worksheet '
            . 'xmlns="http://schemas.openxmlformats.org/'
            . 'spreadsheetml/2006/main">'
            . '<sheetData>';


        foreach ($allRows as $index => $row) {

            $nomorBaris =
                $index + 1;

            // baris judul (pertama) pakai style tebal
            $style =
                $index === 0 ? ' s="1"' : '';

            $sheetXml
                .= '<row r="' . $nomorBaris . '">';

            foreach (array_values($row) as $posisi => $nilai) {

                $ref =
                    xlsx_column_letter($posisi)
                    . $nomorBaris;

                $nilai = $nilai ?? '';

                if (is_numeric($nilai) && $nilai !== '') {

                    $sheetXml
                        .= '<c r="' . $ref . '"'
                        . $style . '>'
                        . '<v>' . (0 + $nilai) . '</v>'
                        . '</c>';

                } else {

                    $sheetXml
                        .= '<c r="' . $ref . '"'
                        . $style . ' t="inlineStr">'
                        . '<is><t>'
                        . xlsx_escape(
                            (string) $nilai
                        )
                        . '</t></is>'
                        . '</c>';
                }
            }

            $sheetXml .= '</row>';
        }

        $sheetXml .= '</sheetData></worksheet>';


        // =====================================================
        // TULIS KE FILE .XLSX (ZIP)
        // =====================================================

        $path =
            tempnam(
                sys_get_temp_dir(),
                'xlsx_'
            );

        $zip = new ZipArchive();

        if ($zip->open($path, ZipArchive::OVERWRITE) !== true) {
            return '';
        }

        $zip->addFromString(
            '[Content_Types].xml',
            $contentTypes
        );

        $zip->addFromString('_rels/.rels', $rels);

        $zip->addFromString(
            'xl/workbook.xml',
            $workbook
        );

        $zip->addFromString(
            'xl/_rels/workbook.xml.rels',
            $workbookRels
        );

        $zip->addFromString('xl/styles.xml', $styles);

        $zip->addFromString(
            'xl/worksheets/sheet1.xml',
            $sheetXml
        );

        $zip->close();

        $isi =
            (string) file_get_contents($path);

        @unlink($path);

        return $isi;
    }
}


if (! function_exists('xlsx_escape')) {

    /**
     * Escape karakter khusus XML.
     */
    function xlsx_escape(string $teks): string
    {
        return htmlspecialchars(
            $teks,
            ENT_XML1 | ENT_QUOTES,
            'UTF-8'
        );
    }
}


if (! function_exists('xlsx_column_letter')) {

    /**
     * Nomor kolom (0-based) -> huruf Excel
     * (0 = A, 25 = Z, 26 = AA, dst).
     */
    function xlsx_column_letter(int $index): string
    {
        $huruf = '';

        $index += 1;

        while ($index > 0) {

            $sisa =
                ($index - 1) % 26;

            $huruf =
                chr(65 + $sisa) . $huruf;

            $index =
                intdiv($index - 1, 26);
        }

        return $huruf;
    }
}


if (! function_exists('buat_xlsx')) {

    /**
     * Kirim file .xlsx sebagai response download.
     */
    function buat_xlsx(
        string $namaFile,
        array $judulKolom,
        array $baris
    ) {

        $isi =
            xlsx_string(
                $judulKolom,
                $baris
            );

        return response()
            ->download(
                $namaFile . '.xlsx',
                $isi
            )
            ->setContentType(
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
            );
    }
}
