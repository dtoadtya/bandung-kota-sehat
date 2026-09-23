<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    /**
     * Filter sebelum controller dijalankan.
     */
    public function before(
        RequestInterface $request,
        $arguments = null
    ) {
        $session = session();

        /*
         * Jika belum login, jangan izinkan masuk
         * ke halaman yang membutuhkan autentikasi.
         */
        if ($session->get('logged_in') !== true) {

            $session->setFlashdata(
                'error',
                'Silakan login terlebih dahulu.'
            );

            return redirect()->to('/login');
        }

        return null;
    }

    /**
     * Filter setelah controller selesai.
     */
    public function after(
        RequestInterface $request,
        ResponseInterface $response,
        $arguments = null
    ) {
        return $response;
    }
}