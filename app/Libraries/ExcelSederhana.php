<?php

namespace App\Libraries;

/**
 * Pembuat file Excel .xlsx sederhana
 * tanpa library eksternal.
 *
 * Cukup untuk tabel data sederhana:
 * header + baris, teks / angka.
 */
class ExcelSederhana
{

    /**
     * Kirim file .xlsx sebagai unduhan
     * lalu hentikan eksekusi.
     */
    public function unduh(
        string $namaFile,
        array  $header,
        array  $baris
    ): void {

        $binary =
            $this->buat($header, $baris);

        header(
            'Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        );

        header(
            'Content-Disposition: attachment; filename="'
            . $namaFile
            . '"'
        );

        header(
            'Content-Length: '
            . strlen($binary)
        );

        echo $binary;

        exit;
    }


    /**
     * Buat isi file .xlsx sebagai string binary.
     */
    public function buat(
        array $header,
        array $baris
    ): string {

        $zip =
            new \ZipArchive();

        $path =
            tempnam(
                sys_get_temp_dir(),
                'xlsx_'
            );

        if ($path === false) {
            throw new \RuntimeException(
                'Gagal membuat file sementara.'
            );
        }

        // ZipArchive butuh ekstensi .zip
        $zipPath =
            $path . '.xlsx';

        rename($path, $zipPath);

        if (
            $zip->open(
                $zipPath,
                \ZipArchive::CREATE
                | \ZipArchive::OVERWRITE
            ) !== true
        ) {
            throw new \RuntimeException(
                'Gagal membuat file zip.'
            );
        }


        // =====================================================
        // LEMBAR KERJA
        // =====================================================

        $sheet =
            $this->buatSheet($header, $baris);


        // =====================================================
        // FILE-FILE DI DALAM .xlsx
        // =====================================================

        $zip->addFromString(
            '[Content_Types].xml',
            $this->contentTypeXml()
        );

        $zip->addFromString(
            '_rels/.rels',
            $this->relsXml()
        );

        $zip->addFromString(
            'xl/workbook.xml',
            $this->workbookXml()
        );

        $zip->addFromString(
            'xl/_rels/workbook.xml.rels',
            $this->workbookRelsXml()
        );

        $zip->addFromString(
            'xl/styles.xml',
            $this->stylesXml()
        );

        $zip->addFromString(
            'xl/worksheets/sheet1.xml',
            $sheet
        );

        $zip->close();

        $binary =
            file_get_contents($zipPath);

        unlink($zipPath);

        return (string) $binary;
    }


    /**
     * Isi xl/worksheets/sheet1.xml
     */
    private function buatSheet(
        array $header,
        array $baris
    ): string {

        $xml =
            '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            . '<worksheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main">'
            . '<sheetData>';


        // Baris 1: header (bold)

        $xml .=
            '<row r="1">';

        foreach ($header as $i => $nilai) {

            $xml .=
                $this->selTeks(
                    (string) $nilai,
                    $i + 1,
                    1,
                    1       // style bold
                );
        }

        $xml .=
            '</row>';


        // Baris berikutnya: data

        foreach ($baris as $b => $isiBaris) {

            $nomorBaris =
                $b + 2;

            $xml .=
                '<row r="'
                . $nomorBaris
                . '">';

            foreach ($isiBaris as $i => $nilai) {

                $kolom =
                    $i + 1;

                if (is_int($nilai) || is_float($nilai)) {

                    $xml .=
                        $this->selAngka(
                            $nilai,
                            $kolom,
                            $nomorBaris
                        );

                } else {

                    $xml .=
                        $this->selTeks(
                            (string) $nilai,
                            $kolom,
                            $nomorBaris
                        );
                }
            }

            $xml .=
                '</row>';
        }

        $xml .=
            '</sheetData>'
            . '</worksheet>';

        return $xml;
    }


    /**
     * Sel berisi teks (inline string).
     */
    private function selTeks(
        string $teks,
        int    $kolom,
        int    $baris,
        int    $style = 0
    ): string {

        $teks =
            preg_replace(
                '/[\x00-\x08\x0B\x0C\x0E-\x1F]/',
                '',
                $teks
            ) ?? '';

        $styleAttr =
            $style > 0
                ? ' s="' . $style . '"'
                : '';

        return '<c r="'
            . $this->ref($kolom, $baris)
            . '" t="inlineStr"'
            . $styleAttr
            . '><is><t xml:space="preserve">'
            . htmlspecialchars(
                $teks,
                ENT_XML1 | ENT_QUOTES,
                'UTF-8'
            )
            . '</t></is></c>';
    }


    /**
     * Sel berisi angka.
     */
    private function selAngka(
        $nilai,
        int $kolom,
        int $baris
    ): string {

        return '<c r="'
            . $this->ref($kolom, $baris)
            . '"><v>'
            . $nilai
            . '</v></c>';
    }


    /**
     * Referensi sel, contoh: 1,1 -> "A1"
     */
    private function ref(int $kolom, int $baris): string
    {
        return $this->namaKolom($kolom) . $baris;
    }


    /**
     * Nomor kolom -> huruf, contoh: 1 -> A, 27 -> AA
     */
    private function namaKolom(int $kolom): string
    {
        $nama = '';

        while ($kolom > 0) {

            $sisa =
                ($kolom - 1) % 26;

            $nama =
                chr(65 + $sisa) . $nama;

            $kolom =
                intdiv($kolom - 1, 26);
        }

        return $nama;
    }


    private function contentTypeXml(): string
    {
        return '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            . '<Types xmlns="http://schemas.openxmlformats.org/package/2006/content-types">'
            . '<Default Extension="rels" ContentType="application/vnd.openxmlformats-package.relationships+xml"/>'
            . '<Default Extension="xml" ContentType="application/xml"/>'
            . '<Override PartName="/xl/workbook.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet.main+xml"/>'
            . '<Override PartName="/xl/worksheets/sheet1.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.worksheet+xml"/>'
            . '<Override PartName="/xl/styles.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.styles+xml"/>'
            . '</Types>';
    }


    private function relsXml(): string
    {
        return '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            . '<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">'
            . '<Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument" Target="xl/workbook.xml"/>'
            . '</Relationships>';
    }


    private function workbookXml(): string
    {
        return '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            . '<workbook xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships">'
            . '<sheets>'
            . '<sheet name="Sheet1" sheetId="1" r:id="rId1"/>'
            . '</sheets>'
            . '</workbook>';
    }


    private function workbookRelsXml(): string
    {
        return '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            . '<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">'
            . '<Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/worksheet" Target="worksheets/sheet1.xml"/>'
            . '<Relationship Id="rId2" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/styles" Target="styles.xml"/>'
            . '</Relationships>';
    }


    private function stylesXml(): string
    {
        return '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            . '<styleSheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main">'
            . '<fonts count="2">'
            . '<font><sz val="11"/><name val="Calibri"/></font>'
            . '<font><b/><sz val="11"/><name val="Calibri"/></font>'
            . '</fonts>'
            . '<fills count="2">'
            . '<fill><patternFill patternType="none"/></fill>'
            . '<fill><patternFill patternType="gray125"/></fill>'
            . '</fills>'
            . '<borders count="1"><border/></borders>'
            . '<cellStyleXfs count="1">'
            . '<xf numFmtId="0" fontId="0" fillId="0" borderId="0"/>'
            . '</cellStyleXfs>'
            . '<cellXfs count="2">'
            . '<xf numFmtId="0" fontId="0" fillId="0" borderId="0" xfId="0"/>'
            . '<xf numFmtId="0" fontId="1" fillId="0" borderId="0" xfId="0" applyFont="1"/>'
            . '</cellXfs>'
            . '</styleSheet>';
    }
}
