<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


/*
|--------------------------------------------------------------------------
| HALAMAN AWAL
|--------------------------------------------------------------------------
*/

$routes->get('/', 'Auth::login');


/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
*/

$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::loginProcess');
$routes->get('/logout', 'Auth::logout');


/*
|--------------------------------------------------------------------------
| REGISTRASI
|--------------------------------------------------------------------------
*/

$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::registerProcess');


/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

$routes->get(
    '/dashboard',
    'Dashboard::index',
    ['filter' => 'auth']
);


/*
|--------------------------------------------------------------------------
| KECAMATAN
|--------------------------------------------------------------------------
| Hanya Admin
|--------------------------------------------------------------------------
*/

$routes->group(
    'kecamatan',
    ['filter' => 'role:admin'],
    static function ($routes) {

        $routes->get(
            '/',
            'Kecamatan::index'
        );

        $routes->get(
            'create',
            'Kecamatan::create'
        );

        $routes->post(
            'store',
            'Kecamatan::store'
        );

        $routes->post(
            'delete/(:num)',
            'Kecamatan::delete/$1'
        );
    }
);


/*
|--------------------------------------------------------------------------
| KELURAHAN
|--------------------------------------------------------------------------
| Hanya Admin
|--------------------------------------------------------------------------
*/

$routes->group(
    'kelurahan',
    ['filter' => 'role:admin'],
    static function ($routes) {

        $routes->get(
            '/',
            'Kelurahan::index'
        );

        $routes->get(
            'create',
            'Kelurahan::create'
        );

        $routes->post(
            'store',
            'Kelurahan::store'
        );

        $routes->post(
            'delete/(:num)',
            'Kelurahan::delete/$1'
        );
    }
);


/*
|--------------------------------------------------------------------------
| TIM PEMBINA
|--------------------------------------------------------------------------
| User dan Admin
|--------------------------------------------------------------------------
*/

$routes->group(
    'tim-pembina',
    ['filter' => 'role:user,admin'],
    static function ($routes) {


        /*
        |--------------------------------------------------------------------------
        | DATA TIM PEMBINA
        |--------------------------------------------------------------------------
        */

        $routes->get(
            '/',
            'TimPembina::index'
        );

        $routes->get(
            'create',
            'TimPembina::create'
        );

        $routes->post(
            'store',
            'TimPembina::store'
        );

        $routes->get(
            'edit/(:num)',
            'TimPembina::edit/$1'
        );

        $routes->post(
            'update/(:num)',
            'TimPembina::update/$1'
        );

        $routes->post(
            'delete/(:num)',
            'TimPembina::delete/$1'
        );


        /*
        |--------------------------------------------------------------------------
        | SK TIM PEMBINA
        |--------------------------------------------------------------------------
        | USER:
        | - Lihat daftar
        | - Lihat berkas
        |
        | ADMIN:
        | - Tambah
        | - Edit
        | - Hapus
        | - Verifikasi
        | - Tolak
        |--------------------------------------------------------------------------
        */


        // -------------------------------------------------
        // USER + ADMIN : LIHAT DATA
        // -------------------------------------------------

        $routes->get(
            'sk',
            'TimPembinaSk::index'
        );

        $routes->get(
            'sk/view/(:num)',
            'TimPembinaSk::view/$1'
        );


        // -------------------------------------------------
        // ADMIN : KELOLA SK
        // -------------------------------------------------

        $routes->get(
            'sk/create',
            'TimPembinaSk::create',
            ['filter' => 'role:admin']
        );

        $routes->post(
            'sk/store',
            'TimPembinaSk::store',
            ['filter' => 'role:admin']
        );

        $routes->get(
            'sk/edit/(:num)',
            'TimPembinaSk::edit/$1',
            ['filter' => 'role:admin']
        );

        $routes->post(
            'sk/update/(:num)',
            'TimPembinaSk::update/$1',
            ['filter' => 'role:admin']
        );

        $routes->post(
            'sk/delete/(:num)',
            'TimPembinaSk::delete/$1',
            ['filter' => 'role:admin']
        );


        // -------------------------------------------------
        // ADMIN : VERIFIKASI
        // -------------------------------------------------

        $routes->post(
            'sk/verifikasi/(:num)',
            'TimPembinaSk::verifikasi/$1',
            ['filter' => 'role:admin']
        );

        $routes->post(
            'sk/tolak/(:num)',
            'TimPembinaSk::tolak/$1',
            ['filter' => 'role:admin']
        );


        /*
        |--------------------------------------------------------------------------
        | RENCANA KERJA TIM PEMBINA
        |--------------------------------------------------------------------------
        |
        | Rencana Kerja
        | ├── Tahun Ganjil
        | └── Tahun Genap
        |
        */


        // -------------------------------------------------
        // HALAMAN UTAMA
        // -------------------------------------------------

        $routes->get(
            'rencana-kerja',
            'TimPembinaRencanaKerja::index'
        );


        // -------------------------------------------------
        // TAHUN GANJIL
        // -------------------------------------------------

        $routes->get(
            'rencana-kerja/ganjil',
            'TimPembinaRencanaKerja::periode/ganjil'
        );

        $routes->get(
            'rencana-kerja/create/ganjil',
            'TimPembinaRencanaKerja::create/ganjil'
        );


        // -------------------------------------------------
        // TAHUN GENAP
        // -------------------------------------------------

        $routes->get(
            'rencana-kerja/genap',
            'TimPembinaRencanaKerja::periode/genap'
        );

        $routes->get(
            'rencana-kerja/create/genap',
            'TimPembinaRencanaKerja::create/genap'
        );


        // -------------------------------------------------
        // RENCANA KERJA - PROSES
        // -------------------------------------------------

        $routes->post(
            'rencana-kerja/store',
            'TimPembinaRencanaKerja::store'
        );

        $routes->get(
            'rencana-kerja/view/(:num)',
            'TimPembinaRencanaKerja::view/$1'
        );

        $routes->get(
            'rencana-kerja/download/(:num)',
            'TimPembinaRencanaKerja::download/$1'
        );

        $routes->get(
            'rencana-kerja/delete/(:num)',
            'TimPembinaRencanaKerja::delete/$1'
        );


        /*
        |--------------------------------------------------------------------------
        | REALISASI KEGIATAN
        |--------------------------------------------------------------------------
        */

        $routes->get(
            'realisasi',
            'TimPembinaRealisasi::index'
        );

        $routes->get(
            'realisasi/create',
            'TimPembinaRealisasi::create'
        );

        $routes->post(
            'realisasi/store',
            'TimPembinaRealisasi::store'
        );

        $routes->get(
            'realisasi/edit/(:num)',
            'TimPembinaRealisasi::edit/$1'
        );

        $routes->post(
            'realisasi/update/(:num)',
            'TimPembinaRealisasi::update/$1'
        );

        $routes->post(
            'realisasi/delete/(:num)',
            'TimPembinaRealisasi::delete/$1'
        );


        /*
        |--------------------------------------------------------------------------
        | FOTO KEGIATAN
        |--------------------------------------------------------------------------
        */

        $routes->get(
            'foto-kegiatan',
            'TimPembinaFotoKegiatan::index'
        );

        $routes->post(
            'foto-kegiatan/store',
            'TimPembinaFotoKegiatan::store'
        );

        $routes->get(
            'foto-kegiatan/view/(:num)',
            'TimPembinaFotoKegiatan::view/$1'
        );

        $routes->post(
            'foto-kegiatan/delete/(:num)',
            'TimPembinaFotoKegiatan::delete/$1'
        );
    }
);


/*
|--------------------------------------------------------------------------
| FORUM BANDUNG SEHAT
|--------------------------------------------------------------------------
| Hanya Admin dan Admin Forum Bandung Sehat
|--------------------------------------------------------------------------
*/

$routes->group(
    'forum-bandung-sehat',
    ['filter' => 'role:admin,admin_fbs'],
    static function ($routes) {


        /*
        |--------------------------------------------------------------------------
        | DATA FORUM BANDUNG SEHAT
        |--------------------------------------------------------------------------
        */

        $routes->get(
            '/',
            'ForumBandungSehat::index'
        );

        $routes->get(
            'create',
            'ForumBandungSehat::create'
        );

        $routes->post(
            'store',
            'ForumBandungSehat::store'
        );

        $routes->get(
            'edit/(:num)',
            'ForumBandungSehat::edit/$1'
        );

        $routes->post(
            'update/(:num)',
            'ForumBandungSehat::update/$1'
        );

        $routes->post(
            'delete/(:num)',
            'ForumBandungSehat::delete/$1'
        );


        /*
        |--------------------------------------------------------------------------
        | SK FORUM BANDUNG SEHAT
        |--------------------------------------------------------------------------
        */

        $routes->get(
            'sk',
            'ForumBandungSehatSk::index'
        );

        $routes->get(
            'sk/create',
            'ForumBandungSehatSk::create'
        );

        $routes->post(
            'sk/store',
            'ForumBandungSehatSk::store'
        );

        $routes->get(
            'sk/edit/(:num)',
            'ForumBandungSehatSk::edit/$1'
        );

        $routes->post(
            'sk/update/(:num)',
            'ForumBandungSehatSk::update/$1'
        );

        $routes->get(
            'sk/view/(:num)',
            'ForumBandungSehatSk::view/$1'
        );

        $routes->post(
            'sk/delete/(:num)',
            'ForumBandungSehatSk::delete/$1'
        );

        $routes->post(
            'sk/disetujui/(:num)',
            'ForumBandungSehatSk::verifikasi/$1',
            ['filter' => 'role:admin,admin_fbs']
        );

        $routes->post(
            'sk/tolak/(:num)',
            'ForumBandungSehatSk::tolak/$1',
            ['filter' => 'role:admin,admin_fbs']
        );


        /*
        |--------------------------------------------------------------------------
        | RENCANA KERJA FORUM BANDUNG SEHAT
        |--------------------------------------------------------------------------
        |
        | Rencana Kerja
        | ├── Tahun Ganjil
        | └── Tahun Genap
        |
        */

        $routes->get(
            'rencana-kerja',
            'ForumBandungSehatRencanaKerja::index'
        );

        $routes->get(
            'rencana-kerja/ganjil',
            'ForumBandungSehatRencanaKerja::periode/ganjil'
        );

        $routes->get(
            'rencana-kerja/genap',
            'ForumBandungSehatRencanaKerja::periode/genap'
        );

        $routes->get(
            'rencana-kerja/create/ganjil',
            'ForumBandungSehatRencanaKerja::create/ganjil'
        );

        $routes->get(
            'rencana-kerja/create/genap',
            'ForumBandungSehatRencanaKerja::create/genap'
        );

        $routes->post(
            'rencana-kerja/store',
            'ForumBandungSehatRencanaKerja::store'
        );

        $routes->get(
            'rencana-kerja/view/(:num)',
            'ForumBandungSehatRencanaKerja::view/$1'
        );

        $routes->get(
            'rencana-kerja/download/(:num)',
            'ForumBandungSehatRencanaKerja::download/$1'
        );

        $routes->get(
            'rencana-kerja/delete/(:num)',
            'ForumBandungSehatRencanaKerja::delete/$1'
        );


        /*
        |--------------------------------------------------------------------------
        | REALISASI KEGIATAN
        |--------------------------------------------------------------------------
        */

        $routes->get(
            'realisasi',
            'ForumBandungSehatRealisasi::index'
        );

        $routes->get(
            'realisasi/create',
            'ForumBandungSehatRealisasi::create'
        );

        $routes->post(
            'realisasi/store',
            'ForumBandungSehatRealisasi::store'
        );

        $routes->get(
            'realisasi/edit/(:num)',
            'ForumBandungSehatRealisasi::edit/$1'
        );

        $routes->post(
            'realisasi/update/(:num)',
            'ForumBandungSehatRealisasi::update/$1'
        );

        $routes->post(
            'realisasi/delete/(:num)',
            'ForumBandungSehatRealisasi::delete/$1'
        );


        /*
        |--------------------------------------------------------------------------
        | FOTO KEGIATAN
        |--------------------------------------------------------------------------
        */

        $routes->get(
            'foto-kegiatan',
            'ForumBandungSehatFotoKegiatan::index'
        );

        $routes->get(
            'foto-kegiatan/create',
            'ForumBandungSehatFotoKegiatan::create'
        );

        $routes->post(
            'foto-kegiatan/store',
            'ForumBandungSehatFotoKegiatan::store'
        );

        $routes->get(
            'foto-kegiatan/view/(:num)',
            'ForumBandungSehatFotoKegiatan::view/$1'
        );

        $routes->post(
            'foto-kegiatan/delete/(:num)',
            'ForumBandungSehatFotoKegiatan::delete/$1'
        );
    }
);


/*
|--------------------------------------------------------------------------
| FORUM KECAMATAN SEHAT
|--------------------------------------------------------------------------
| User dan Admin
|--------------------------------------------------------------------------
*/

$routes->group(
    'forum-kecamatan-sehat',
    ['filter' => 'role:user,admin'],
    static function ($routes) {


        /*
        |--------------------------------------------------------------------------
        | DATA FORUM KECAMATAN
        |--------------------------------------------------------------------------
        */

        $routes->get(
            '/',
            'ForumKecamatanSehat::index'
        );

        $routes->get(
            'create',
            'ForumKecamatanSehat::create'
        );

        $routes->post(
            'store',
            'ForumKecamatanSehat::store'
        );

        $routes->get(
            'edit/(:num)',
            'ForumKecamatanSehat::edit/$1'
        );

        $routes->post(
            'update/(:num)',
            'ForumKecamatanSehat::update/$1'
        );

        $routes->post(
            'delete/(:num)',
            'ForumKecamatanSehat::delete/$1'
        );


        /*
        |--------------------------------------------------------------------------
        | SK
        |--------------------------------------------------------------------------
        */

        $routes->get(
            'sk',
            'ForumKecamatanSehatSk::index'
        );

        $routes->get(
            'sk/create',
            'ForumKecamatanSehatSk::create'
        );

        $routes->post(
            'sk/store',
            'ForumKecamatanSehatSk::store'
        );

        $routes->get(
            'sk/edit/(:num)',
            'ForumKecamatanSehatSk::edit/$1'
        );

        $routes->post(
            'sk/update/(:num)',
            'ForumKecamatanSehatSk::update/$1'
        );

        $routes->get(
            'sk/view/(:num)',
            'ForumKecamatanSehatSk::view/$1'
        );

        $routes->get(
            'sk/download/(:num)',
            'ForumKecamatanSehatSk::download/$1'
        );

        $routes->post(
            'sk/delete/(:num)',
            'ForumKecamatanSehatSk::delete/$1'
        );

        $routes->post(
            'sk/disetujui/(:num)',
            'ForumKecamatanSehatSk::verifikasi/$1',
            ['filter' => 'role:admin']
        );

        $routes->post(
            'sk/tolak/(:num)',
            'ForumKecamatanSehatSk::tolak/$1',
            ['filter' => 'role:admin']
        );


        /*
        |--------------------------------------------------------------------------
        | RENCANA KERJA FORUM KECAMATAN SEHAT
        |--------------------------------------------------------------------------
        |
        | Rencana Kerja
        | ├── Tahun Ganjil
        | └── Tahun Genap
        |
        */

        $routes->get(
            'rencana-kerja',
            'ForumKecamatanSehatRencanaKerja::index'
        );

        $routes->get(
            'rencana-kerja/ganjil',
            'ForumKecamatanSehatRencanaKerja::periode/ganjil'
        );

        $routes->get(
            'rencana-kerja/genap',
            'ForumKecamatanSehatRencanaKerja::periode/genap'
        );

        $routes->get(
            'rencana-kerja/create/ganjil',
            'ForumKecamatanSehatRencanaKerja::create/ganjil'
        );

        $routes->get(
            'rencana-kerja/create/genap',
            'ForumKecamatanSehatRencanaKerja::create/genap'
        );

        $routes->post(
            'rencana-kerja/store',
            'ForumKecamatanSehatRencanaKerja::store'
        );

        $routes->get(
            'rencana-kerja/view/(:num)',
            'ForumKecamatanSehatRencanaKerja::view/$1'
        );

        $routes->get(
            'rencana-kerja/download/(:num)',
            'ForumKecamatanSehatRencanaKerja::download/$1'
        );

        $routes->get(
            'rencana-kerja/delete/(:num)',
            'ForumKecamatanSehatRencanaKerja::delete/$1'
        );


        /*
        |--------------------------------------------------------------------------
        | REALISASI KEGIATAN
        |--------------------------------------------------------------------------
        */

        $routes->get(
            'realisasi',
            'ForumKecamatanSehatRealisasi::index'
        );

        $routes->get(
            'realisasi/create',
            'ForumKecamatanSehatRealisasi::create'
        );

        $routes->post(
            'realisasi/store',
            'ForumKecamatanSehatRealisasi::store'
        );

        $routes->get(
            'realisasi/edit/(:num)',
            'ForumKecamatanSehatRealisasi::edit/$1'
        );

        $routes->post(
            'realisasi/update/(:num)',
            'ForumKecamatanSehatRealisasi::update/$1'
        );

        $routes->post(
            'realisasi/delete/(:num)',
            'ForumKecamatanSehatRealisasi::delete/$1'
        );


        /*
        |--------------------------------------------------------------------------
        | FOTO KEGIATAN
        |--------------------------------------------------------------------------
        */

        $routes->get(
            'foto-kegiatan',
            'ForumKecamatanSehatFotoKegiatan::index'
        );

        $routes->get(
            'foto-kegiatan/create',
            'ForumKecamatanSehatFotoKegiatan::create'
        );

        $routes->post(
            'foto-kegiatan/store',
            'ForumKecamatanSehatFotoKegiatan::store'
        );

        $routes->get(
            'foto-kegiatan/view/(:num)',
            'ForumKecamatanSehatFotoKegiatan::view/$1'
        );

        $routes->post(
            'foto-kegiatan/delete/(:num)',
            'ForumKecamatanSehatFotoKegiatan::delete/$1'
        );
    }
);


/*
|--------------------------------------------------------------------------
| POKJA KELURAHAN SEHAT
|--------------------------------------------------------------------------
| User dan Admin
|--------------------------------------------------------------------------
*/

$routes->group(
    'pokja-kelurahan-sehat',
    ['filter' => 'role:user,admin'],
    static function ($routes) {


        /*
        |--------------------------------------------------------------------------
        | DATA POKJA
        |--------------------------------------------------------------------------
        */

        $routes->get(
            '/',
            'PokjaKelurahanSehat::index'
        );

        $routes->get(
            'create',
            'PokjaKelurahanSehat::create'
        );

        $routes->post(
            'store',
            'PokjaKelurahanSehat::store'
        );

        $routes->post(
            'delete/(:num)',
            'PokjaKelurahanSehat::delete/$1'
        );

        $routes->get(
            'getKelurahan/(:num)',
            'PokjaKelurahanSehat::getKelurahan/$1'
        );


        /*
        |--------------------------------------------------------------------------
        | SK POKJA
        |--------------------------------------------------------------------------
        */

        $routes->get(
            'sk',
            'PokjaKelurahanSehatSk::index'
        );

        $routes->get(
            'sk/create',
            'PokjaKelurahanSehatSk::create'
        );

        $routes->post(
            'sk/store',
            'PokjaKelurahanSehatSk::store'
        );

        $routes->get(
            'sk/edit/(:num)',
            'PokjaKelurahanSehatSk::edit/$1'
        );

        $routes->post(
            'sk/update/(:num)',
            'PokjaKelurahanSehatSk::update/$1'
        );

        $routes->get(
            'sk/view/(:num)',
            'PokjaKelurahanSehatSk::view/$1'
        );

        $routes->get(
            'sk/download/(:num)',
            'PokjaKelurahanSehatSk::download/$1'
        );

        $routes->post(
            'sk/delete/(:num)',
            'PokjaKelurahanSehatSk::delete/$1'
        );

        $routes->post(
            'sk/disetujui/(:num)',
            'PokjaKelurahanSehatSk::verifikasi/$1',
            ['filter' => 'role:admin']
        );

        $routes->post(
            'sk/tolak/(:num)',
            'PokjaKelurahanSehatSk::tolak/$1',
            ['filter' => 'role:admin']
        );
    }
);


/*
|--------------------------------------------------------------------------
| POKJA KELURAHAN SEHAT - RENCANA KERJA
|--------------------------------------------------------------------------
| User dan Admin
|--------------------------------------------------------------------------
|
| Struktur:
| Rencana Kerja
| ├── Tahun Ganjil
| └── Tahun Genap
|
*/

$routes->group(
    'pokja-kelurahan-sehat/rencana-kerja',
    ['filter' => 'role:user,admin'],
    static function ($routes) {

        $routes->get(
            '/',
            'PokjaKelurahanSehatRencanaKerja::index'
        );

        $routes->get(
            'ganjil',
            'PokjaKelurahanSehatRencanaKerja::periode/ganjil'
        );

        $routes->get(
            'genap',
            'PokjaKelurahanSehatRencanaKerja::periode/genap'
        );

        $routes->get(
            'create/ganjil',
            'PokjaKelurahanSehatRencanaKerja::create/ganjil'
        );

        $routes->get(
            'create/genap',
            'PokjaKelurahanSehatRencanaKerja::create/genap'
        );

        $routes->post(
            'store',
            'PokjaKelurahanSehatRencanaKerja::store'
        );

        $routes->get(
            'view/(:num)',
            'PokjaKelurahanSehatRencanaKerja::view/$1'
        );

        $routes->get(
            'download/(:num)',
            'PokjaKelurahanSehatRencanaKerja::download/$1'
        );

        $routes->get(
            'delete/(:num)',
            'PokjaKelurahanSehatRencanaKerja::delete/$1'
        );
    }
);


/*
|--------------------------------------------------------------------------
| POKJA KELURAHAN SEHAT - REALISASI KEGIATAN
|--------------------------------------------------------------------------
| User dan Admin
|--------------------------------------------------------------------------
*/

$routes->group(
    'pokja-kelurahan-sehat/realisasi',
    ['filter' => 'role:user,admin'],
    static function ($routes) {

        $routes->get(
            '/',
            'PokjaKelurahanSehatRealisasi::index'
        );

        $routes->get(
            'create',
            'PokjaKelurahanSehatRealisasi::create'
        );

        $routes->post(
            'store',
            'PokjaKelurahanSehatRealisasi::store'
        );

        $routes->get(
            'edit/(:num)',
            'PokjaKelurahanSehatRealisasi::edit/$1'
        );

        $routes->post(
            'update/(:num)',
            'PokjaKelurahanSehatRealisasi::update/$1'
        );

        $routes->post(
            'delete/(:num)',
            'PokjaKelurahanSehatRealisasi::delete/$1'
        );
    }
);


/*
|--------------------------------------------------------------------------
| POKJA KELURAHAN SEHAT - FOTO KEGIATAN
|--------------------------------------------------------------------------
| User dan Admin
|--------------------------------------------------------------------------
*/

$routes->group(
    'pokja-kelurahan-sehat/foto-kegiatan',
    ['filter' => 'role:user,admin'],
    static function ($routes) {

        $routes->get(
            '/',
            'PokjaKelurahanSehatFoto::index'
        );

        $routes->get(
            'create',
            'PokjaKelurahanSehatFoto::create'
        );

        $routes->post(
            'store',
            'PokjaKelurahanSehatFoto::store'
        );

        $routes->post(
            'delete/(:num)',
            'PokjaKelurahanSehatFoto::delete/$1'
        );
    }
);


/*
|--------------------------------------------------------------------------
| INOVASI KECAMATAN
|--------------------------------------------------------------------------
| User dan Admin
|--------------------------------------------------------------------------
*/

$routes->group(
    'inovasi/kecamatan',
    ['filter' => 'role:user,admin'],
    static function ($routes) {

        $routes->get(
            '/',
            'InovasiKecamatan::index'
        );

        $routes->get(
            'create',
            'InovasiKecamatan::create'
        );

        $routes->post(
            'store',
            'InovasiKecamatan::store'
        );

        $routes->get(
            'edit/(:num)',
            'InovasiKecamatan::edit/$1'
        );

        $routes->post(
            'update/(:num)',
            'InovasiKecamatan::update/$1'
        );

        $routes->post(
            'delete/(:num)',
            'InovasiKecamatan::delete/$1'
        );
    }
);


/*
|--------------------------------------------------------------------------
| INOVASI KELURAHAN
|--------------------------------------------------------------------------
| User dan Admin
|--------------------------------------------------------------------------
*/

$routes->group(
    'inovasi/kelurahan',
    ['filter' => 'role:user,admin'],
    static function ($routes) {

        $routes->get(
            '/',
            'InovasiKelurahan::index'
        );

        $routes->get(
            'create',
            'InovasiKelurahan::create'
        );

        $routes->post(
            'store',
            'InovasiKelurahan::store'
        );

        $routes->get(
            'edit/(:num)',
            'InovasiKelurahan::edit/$1'
        );

        $routes->post(
            'update/(:num)',
            'InovasiKelurahan::update/$1'
        );

        $routes->post(
            'delete/(:num)',
            'InovasiKelurahan::delete/$1'
        );
    }
);

// =====================================================
// INOVASI - PERANGKAT DAERAH
// =====================================================

$routes->get('inovasi/perangkat-daerah', 'InovasiPerangkatDaerah::index');
$routes->get('inovasi/perangkat-daerah/create', 'InovasiPerangkatDaerah::create');
$routes->post('inovasi/perangkat-daerah/store', 'InovasiPerangkatDaerah::store');
$routes->get('inovasi/perangkat-daerah/edit/(:num)', 'InovasiPerangkatDaerah::edit/$1');
$routes->post('inovasi/perangkat-daerah/update/(:num)', 'InovasiPerangkatDaerah::update/$1');
$routes->get('inovasi/perangkat-daerah/delete/(:num)', 'InovasiPerangkatDaerah::delete/$1');

// =====================================================
// SELF-ASSESSMENT (NILAI SEMENTARA DI PANEL PROGRES DASHBOARD)
// =====================================================

$routes->post(
    'self-assessment/store',
    'SelfAssessment::store',
    ['filter' => 'role:user,admin']
);

$routes->get(
    'self-assessment/excel',
    'SelfAssessment::excel',
    ['filter' => 'role:admin']
);

$routes->get(
    'export/self-assessment',
    'Export::selfAssessment',
    ['filter' => 'role:admin']
);

