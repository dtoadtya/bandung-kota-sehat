<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(
        RequestInterface $request,
        $arguments = null
    ) {
        $session = session();

        // Pastikan sudah login
        if ($session->get('logged_in') !== true) {
            $session->setFlashdata(
                'error',
                'Silakan login terlebih dahulu.'
            );

            return redirect()->to('/login');
        }

        $currentRole = $session->get('role');

        // Ambil role yang diizinkan dari argument filter
        $allowedRoles = [];

        foreach ((array) $arguments as $argument) {
            $roles = explode(',', (string) $argument);

            foreach ($roles as $role) {
                $role = trim($role);

                if ($role !== '') {
                    $allowedRoles[] = $role;
                }
            }
        }

        // Jika role pengguna tidak diizinkan
        if (!in_array($currentRole, $allowedRoles, true)) {
            $session->setFlashdata(
                'error',
                'Anda tidak memiliki akses ke halaman tersebut.'
            );

            return redirect()->to('/dashboard');
        }

        return null;
    }

    public function after(
        RequestInterface $request,
        ResponseInterface $response,
        $arguments = null
    ) {
        return $response;
    }
}