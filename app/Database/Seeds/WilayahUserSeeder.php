<?php

namespace Database\Seeds;

use CodeIgniter\Database\Seeder;

class WilayahUserSeeder extends Seeder
{
    /**
     * Password untuk semua akun kecamatan dan kelurahan.
     */
    private const PASSWORD = '12345678';

    /**
     * Username khusus untuk kecamatan tertentu
     * agar tidak bentrok dengan kelurahan
     * yang namanya sama.
     */
    private const USERNAME_KECAMATAN = [
        'Batununggal' => 'kec_batununggal',
    ];

    public function run(): void
    {
        $hash = password_hash(
            self::PASSWORD,
            PASSWORD_BCRYPT,
            ['cost' => 12]
        );

        $dibuat = 0;
        $diperbarui = 0;
        $dilewati = 0;

        $kecamatanList = $this->db
            ->table('kecamatan')
            ->orderBy('id', 'ASC')
            ->get()
            ->getResultArray();

        foreach ($kecamatanList as $kecamatan) {
            $hasil = $this->simpanAkun(
                $kecamatan['nama_kecamatan'],
                $this->username(
                    $kecamatan['nama_kecamatan'],
                    'kecamatan'
                ),
                $hash
            );

            $dibuat   += $hasil === 'insert' ? 1 : 0;
            $diperbarui += $hasil === 'update' ? 1 : 0;
            $dilewati   += $hasil === 'skip'   ? 1 : 0;
        }

        $kelurahanList = $this->db
            ->table('kelurahan')
            ->orderBy('id', 'ASC')
            ->get()
            ->getResultArray();

        foreach ($kelurahanList as $kelurahan) {
            $hasil = $this->simpanAkun(
                $kelurahan['nama_kelurahan'],
                $this->username(
                    $kelurahan['nama_kelurahan'],
                    'kelurahan'
                ),
                $hash
            );

            $dibuat   += $hasil === 'insert' ? 1 : 0;
            $diperbarui += $hasil === 'update' ? 1 : 0;
            $dilewati   += $hasil === 'skip'   ? 1 : 0;
        }

        echo sprintf(
            "WilayahUserSeeder selesai: %d akun dibuat, %d diperbarui, %d dilewati.\n",
            $dibuat,
            $diperbarui,
            $dilewati
        );
    }

    /**
     * Membuat username dari nama wilayah.
     *
     * Contoh:
     * Babakan Ciparay -> babakan_ciparay
     * Dunguscariang   -> dunguscariang
     */
    private function username(string $nama, string $tipe): string
    {
        $username = strtolower(
            str_replace(' ', '_', trim($nama))
        );

        if (
            $tipe === 'kecamatan'
            && isset(self::USERNAME_KECAMATAN[$nama])
        ) {
            $username = self::USERNAME_KECAMATAN[$nama];
        }

        return $username;
    }

    /**
     * Simpan akun: insert jika belum ada,
     * update password jika sudah ada.
     *
     * @return string insert|update|skip
     */
    private function simpanAkun(
        string $nama,
        string $username,
        string $hash
    ): string {
        $builder = $this->db->table('users');

        $existing = $builder
            ->where('username', $username)
            ->get()
            ->getRow();

        $waktu = date('Y-m-d H:i:s');

        if ($existing) {
            /*
             * Jangan sentuh akun non-user
             * seperti admin.
             */
            if (($existing->role ?? '') !== 'user') {
                echo "Dilewati (role bukan user): {$username}\n";

                return 'skip';
            }

            $builder
                ->where('id', $existing->id)
                ->update([
                    'nama'       => $nama,
                    'password'   => $hash,
                    'is_active'  => 1,
                    'updated_at' => $waktu,
                ]);

            return 'update';
        }

        $builder->insert([
            'nama'       => $nama,
            'username'   => $username,
            'password'   => $hash,
            'role'       => 'user',
            'is_active'  => 1,
            'created_at' => $waktu,
            'updated_at' => $waktu,
        ]);

        return 'insert';
    }
}
