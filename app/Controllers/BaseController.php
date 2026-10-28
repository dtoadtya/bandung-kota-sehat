<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 *
 * Extend this class in any new controllers:
 * ```
 *     class Home extends BaseController
 * ```
 *
 * For security, be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */

    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Load here all helpers you want to be available in your controllers that extend BaseController.
        // Caution: Do not put the this below the parent::initController() call below.
        // $this->helpers = ['form', 'url'];

        // Caution: Do not edit this line.
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        // $this->session = service('session');
    }

    /**
     * Cek apakah user saat ini adalah admin.
     */
    protected function isAdminUser(): bool
    {
        return in_array(
            session()->get('role'),
            ['admin', 'super_admin', 'admin_fbs'],
            true
        );
    }

    /**
     * Ambil user_id dari session.
     */
    protected function currentUserId(): ?int
    {
        $id = session()->get('user_id');

        return $id !== null ? (int) $id : null;
    }

    /**
     * Filter query builder berdasarkan user.
     *
     * Admin melihat semua data.
     * User biasa hanya melihat datanya sendiri.
     */
    protected function filterByUser($query)
    {
        if ($this->isAdminUser()) {
            return $query;
        }

        $userId = $this->currentUserId();

        if ($userId === null) {
            $query->where('user_id', null);
            return $query;
        }

        $query->where('user_id', $userId);

        return $query;
    }

    /**
     * Cek apakah akun adalah TATANAN_1 s/d TATANAN_9
     * (akun perangkat daerah).
     */
    protected function isTatananUser(): bool
    {
        return (bool) preg_match(
            '/^TATANAN_[1-9]$/i',
            (string) session()->get('username')
        );
    }

    /**
     * Cache hasil deteksi wilayah user
     * (agar query tidak berulang
     * dalam satu request).
     */
    private $cacheUserKecamatan = false;
    private $cacheUserKelurahan = false;

    /**
     * Ambil data kecamatan milik user berdasarkan
     * username (contoh: andir -> Andir,
     * kec_batununggal -> Batununggal).
     *
     * Kembalikan null jika bukan user kecamatan.
     */
    protected function userKecamatan(): ?array
    {
        if ($this->cacheUserKecamatan !== false) {
            return $this->cacheUserKecamatan;
        }

        $username = session()->get('username');

        if (!$username) {
            return $this->cacheUserKecamatan = null;
        }

        $username = strtolower(
            trim((string) $username)
        );

        if (str_starts_with($username, 'kec_')) {
            $username = substr($username, 4);
        }

        $kecamatanList = db_connect()
            ->table('kecamatan')
            ->get()
            ->getResultArray();

        foreach ($kecamatanList as $kecamatan) {
            $mapped = strtolower(
                str_replace(
                    ' ',
                    '_',
                    trim($kecamatan['nama_kecamatan'])
                )
            );

            if ($mapped === $username) {
                return $this->cacheUserKecamatan = $kecamatan;
            }
        }

        return $this->cacheUserKecamatan = null;
    }

    /**
     * Ambil data kelurahan milik user berdasarkan
     * username (contoh: kel_cipaganti -> Cipaganti).
     *
     * Kembalikan null jika bukan user kelurahan.
     */
    protected function userKelurahan(): ?array
    {
        if ($this->cacheUserKelurahan !== false) {
            return $this->cacheUserKelurahan;
        }

        $username = session()->get('username');

        if (!$username) {
            return $this->cacheUserKelurahan = null;
        }

        $username = strtolower(
            trim((string) $username)
        );

        if (str_starts_with($username, 'kel_')) {
            $username = substr($username, 4);
        }

        $kelurahanList = db_connect()
            ->table('kelurahan')
            ->select('kelurahan.*, kecamatan.nama_kecamatan')
            ->join(
                'kecamatan',
                'kecamatan.id = kelurahan.kecamatan_id',
                'left'
            )
            ->get()
            ->getResultArray();

        foreach ($kelurahanList as $kelurahan) {
            $mapped = strtolower(
                str_replace(
                    ' ',
                    '_',
                    trim($kelurahan['nama_kelurahan'])
                )
            );

            if ($mapped === $username) {
                return $this->cacheUserKelurahan = $kelurahan;
            }
        }

        return $this->cacheUserKelurahan = null;
    }
}
