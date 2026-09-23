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
     * Login User:
     * login_type = user
     *
     * Login Admin:
     * login_type = admin
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

        $loginType = (string) $this->request->getPost('login_type');


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
         *
         * Jika ada data lama dengan role lain,
         * akun tersebut tidak boleh masuk.
         */
        if (!in_array($role, ['user', 'admin'], true)) {

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
         * LOGIN USER
         * =====================================================
         */
        if ($loginType === 'user') {

            /*
             * Hanya role user yang boleh
             * masuk melalui menu User.
             */
            if ($role !== 'user') {

                return redirect()
                    ->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Akun administrator harus login melalui menu Admin.'
                    );
            }
        }


        /*
         * =====================================================
         * LOGIN ADMIN
         * =====================================================
         */
        elseif ($loginType === 'admin') {

            /*
             * Hanya role admin yang boleh
             * masuk melalui menu Admin.
             */
            if ($role !== 'admin') {

                return redirect()
                    ->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Akun ini bukan akun administrator.'
                    );
            }
        }


        /*
         * =====================================================
         * LOGIN TYPE TIDAK VALID
         * =====================================================
         */
        else {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Jenis login tidak valid.'
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
         * Hapus seluruh session
         */
        session()->destroy();


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


        return redirect()
            ->to('/login')
            ->with(
                'success',
                'Anda berhasil keluar dari sistem.'
            );
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