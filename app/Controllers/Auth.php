<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }


    /**
     * =========================================================
     * HALAMAN LOGIN
     * =========================================================
     */
    public function login()
    {
        // Jika sudah login, langsung ke dashboard
        if ($this->isLoggedIn()) {
            return redirect()->to('/dashboard');
        }

        return view('auth/login', [
            'title' => 'Login - Bandung Sehat'
        ]);
    }


    /**
     * =========================================================
     * PROSES LOGIN
     * =========================================================
     *
     * Satu form untuk semua role.
     *
     * Role yang digunakan hanya:
     *
     * - user
     * - admin
     *
     * Tidak ada lagi super_admin.
     */
    public function loginProcess()
    {
        $username = trim(
            (string) $this->request->getPost('username')
        );

        $password = (string) $this->request->getPost('password');


        /*
         * -----------------------------------------------------
         * Validasi input
         * -----------------------------------------------------
         */
        if ($username === '' || $password === '') {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Username dan password wajib diisi.'
                );
        }


        /*
         * -----------------------------------------------------
         * Cari user berdasarkan username
         * -----------------------------------------------------
         */
        $user = $this->userModel
            ->where('username', $username)
            ->first();


        /*
         * -----------------------------------------------------
         * Username tidak ditemukan
         * -----------------------------------------------------
         */
        if (!$user) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Username atau password salah.'
                );
        }


        /*
         * -----------------------------------------------------
         * Cek status akun
         *
         * is_active = 1 -> aktif
         * is_active = 0 -> tidak aktif
         * -----------------------------------------------------
         */
        if ((int) ($user['is_active'] ?? 1) !== 1) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Akun Anda tidak aktif. Silakan hubungi administrator.'
                );
        }


        /*
         * -----------------------------------------------------
         * Cek password
         * -----------------------------------------------------
         */
        if (
            !password_verify(
                $password,
                $user['password']
            )
        ) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Username atau password salah.'
                );
        }


        /*
         * -----------------------------------------------------
         * Ambil role dari database
         * -----------------------------------------------------
         */
        $role = $user['role'] ?? 'user';


        /*
         * =====================================================
         * VALIDASI ROLE
         * =====================================================
         *
         * Sistem hanya mengenal:
         *
         * user
         * admin
         * admin_fbs
         *
         * Jika ada data lama dengan role lain,
         * akun tersebut tidak boleh masuk.
         */
        if (!in_array($role, ['user', 'admin', 'admin_fbs'], true)) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Role akun tidak valid. Silakan hubungi administrator.'
                );
        }


        /*
         * =====================================================
         * BUAT SESSION LOGIN
         * =====================================================
         */
        session()->regenerate();

        session()->set([
            'user_id'   => (int) $user['id'],
            'username'  => $user['username'],
            'nama'      => $user['nama'] ?? $user['username'],
            'role'      => $role,
            'logged_in' => true,
        ]);


        /*
         * =====================================================
         * REDIRECT DASHBOARD
         * =====================================================
         */
        return redirect()
            ->to('/dashboard')
            ->with(
                'success',
                'Selamat datang, '
                . ($user['nama'] ?? $user['username'])
                . '!'
            );
    }


    /**
     * =========================================================
     * REGISTRASI USER
     * =========================================================
     *
     * Registrasi umum DITUTUP.
     *
     * User kecamatan sudah ditentukan
     * melalui database.
     */
    public function register()
    {
        return redirect()
            ->to('/login')
            ->with(
                'error',
                'Registrasi akun ditutup. Akun User telah ditentukan oleh sistem.'
            );
    }


    /**
     * =========================================================
     * PROSES REGISTRASI USER
     * =========================================================
     *
     * Tidak boleh membuat user baru
     * melalui halaman publik.
     */
    public function registerProcess()
    {
        return redirect()
            ->to('/login')
            ->with(
                'error',
                'Registrasi akun ditutup. Silakan gunakan akun kecamatan yang telah diberikan.'
            );
    }


    /**
     * =========================================================
     * LOGOUT
     * =========================================================
     */
    public function logout()
    {
        /*
        | Hapus seluruh session
        */
        session()->destroy();


        /*
        | Setelah destroy(), session PHP sudah nonaktif
        | sehingga flashdata tidak tersimpan, dan browser
        | menerima cookie sesi yang dihapus.
        |
        | Buka sesi baru, lalu kirim ulang cookie sesi
        | supaya pesan keluar tetap tampil di halaman
        | login.
        */
        session()->start();

        $konfigurasiSesi = config(\Config\Session::class);


        /*
         * Cegah browser menampilkan
         * halaman dashboard dari cache
         */
        $this->response->setHeader(
            'Cache-Control',
            'no-store, no-cache, must-revalidate, max-age=0'
        );

        $this->response->setHeader(
            'Pragma',
            'no-cache'
        );

        $this->response->setHeader(
            'Expires',
            '0'
        );


        $redirect = redirect()
            ->to('/login')
            ->with(
                'success',
                'Anda berhasil keluar dari sistem.'
            );

        $redirect->setCookie(
            (new \CodeIgniter\Cookie\Cookie(
                $konfigurasiSesi->cookieName,
                session_id(),
                [
                    'expires'  => time()
                        + $konfigurasiSesi->expiration,
                    'path'     => '/',
                    'httponly' => true,
                    'samesite' => 'Lax',
                ]
            ))->withPrefix('')
        );

        return $redirect;
    }



    /**
     * =========================================================
     * CEK LOGIN
     * =========================================================
     */
    private function isLoggedIn(): bool
    {
        return session()->get('logged_in') === true;
    }
}