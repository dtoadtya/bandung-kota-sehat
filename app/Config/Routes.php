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

        $routes->get('/', 'Kecamatan::index');

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

        $routes->get('/', 'Kelurahan::index');

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

    }
);


/*
|--------------------------------------------------------------------------
| TIM PEMBINA - SK
|--------------------------------------------------------------------------
| User dan Admin
|--------------------------------------------------------------------------
*/

$routes->group(
    'tim-pembina/sk',
    ['filter' => 'role:user,admin'],
    static function ($routes) {

        $routes->get(
            '/',
            'TimPembinaSk::index'
        );

        $routes->get(
            'create',
            'TimPembinaSk::create'
        );

        $routes->post(
            'store',
            'TimPembinaSk::store'
        );

        $routes->get(
            'edit/(:num)',
            'TimPembinaSk::edit/$1'
        );

        $routes->post(
            'update/(:num)',
            'TimPembinaSk::update/$1'
        );

        $routes->get(
            'view/(:num)',
            'TimPembinaSk::view/$1'
        );

        $routes->post(
            'delete/(:num)',
            'TimPembinaSk::delete/$1'
        );

    }
);


/*
|--------------------------------------------------------------------------
| TIM PEMBINA - RENCANA KERJA
|--------------------------------------------------------------------------
| User dan Admin
|--------------------------------------------------------------------------
*/

$routes->group(
    'tim-pembina/rencana-kerja',
    ['filter' => 'role:user,admin'],
    static function ($routes) {

        $routes->get(
            '/',
            'TimPembinaRencanaKerja::index'
        );

        $routes->get(
            'create',
            'TimPembinaRencanaKerja::create'
        );

        $routes->post(
            'store',
            'TimPembinaRencanaKerja::store'
        );

        $routes->get(
            'edit/(:num)',
            'TimPembinaRencanaKerja::edit/$1'
        );

        $routes->post(
            'update/(:num)',
            'TimPembinaRencanaKerja::update/$1'
        );

        $routes->post(
            'delete/(:num)',
            'TimPembinaRencanaKerja::delete/$1'
        );

    }
);


/*
|--------------------------------------------------------------------------
| TIM PEMBINA - REALISASI KEGIATAN
|--------------------------------------------------------------------------
| User dan Admin
|--------------------------------------------------------------------------
*/

$routes->group(
    'tim-pembina/realisasi',
    ['filter' => 'role:user,admin'],
    static function ($routes) {

        $routes->get(
            '/',
            'TimPembinaRealisasi::index'
        );

        $routes->get(
            'create',
            'TimPembinaRealisasi::create'
        );

        $routes->post(
            'store',
            'TimPembinaRealisasi::store'
        );

        $routes->get(
            'edit/(:num)',
            'TimPembinaRealisasi::edit/$1'
        );

        $routes->post(
            'update/(:num)',
            'TimPembinaRealisasi::update/$1'
        );

        $routes->post(
            'delete/(:num)',
            'TimPembinaRealisasi::delete/$1'
        );

    }
);


/*
|--------------------------------------------------------------------------
| TIM PEMBINA - FOTO KEGIATAN
|--------------------------------------------------------------------------
| User dan Admin
|--------------------------------------------------------------------------
*/

$routes->group(
    'tim-pembina/foto-kegiatan',
    ['filter' => 'role:user,admin'],
    static function ($routes) {

        $routes->get(
            '/',
            'TimPembinaFotoKegiatan::index'
        );

        $routes->get(
            'create',
            'TimPembinaFotoKegiatan::create'
        );

        $routes->post(
            'store',
            'TimPembinaFotoKegiatan::store'
        );

        $routes->get(
            'view/(:num)',
            'TimPembinaFotoKegiatan::view/$1'
        );

        $routes->post(
            'delete/(:num)',
            'TimPembinaFotoKegiatan::delete/$1'
        );

    }
);


/*
|--------------------------------------------------------------------------
| FORUM BANDUNG SEHAT
|--------------------------------------------------------------------------
| User dan Admin
|--------------------------------------------------------------------------
*/

$routes->group(
    'forum-bandung-sehat',
    ['filter' => 'role:user,admin'],
    static function ($routes) {

        /*
        |--------------------------------------------------------------------------
        | DATA FORUM
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
        | SK
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


        /*
        |--------------------------------------------------------------------------
        | RENCANA KERJA
        |--------------------------------------------------------------------------
        */

        $routes->get(
            'rencana-kerja',
            'ForumBandungSehatRencanaKerja::index'
        );

        $routes->get(
            'rencana-kerja/create',
            'ForumBandungSehatRencanaKerja::create'
        );

        $routes->post(
            'rencana-kerja/store',
            'ForumBandungSehatRencanaKerja::store'
        );

        $routes->get(
            'rencana-kerja/edit/(:num)',
            'ForumBandungSehatRencanaKerja::edit/$1'
        );

        $routes->post(
            'rencana-kerja/update/(:num)',
            'ForumBandungSehatRencanaKerja::update/$1'
        );

        $routes->post(
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
        | DATA FORUM
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


        /*
        |--------------------------------------------------------------------------
        | RENCANA KERJA
        |--------------------------------------------------------------------------
        */

        $routes->get(
            'rencana-kerja',
            'ForumKecamatanSehatRencanaKerja::index'
        );

        $routes->get(
            'rencana-kerja/create',
            'ForumKecamatanSehatRencanaKerja::create'
        );

        $routes->post(
            'rencana-kerja/store',
            'ForumKecamatanSehatRencanaKerja::store'
        );

        $routes->get(
            'rencana-kerja/edit/(:num)',
            'ForumKecamatanSehatRencanaKerja::edit/$1'
        );

        $routes->post(
            'rencana-kerja/update/(:num)',
            'ForumKecamatanSehatRencanaKerja::update/$1'
        );

        $routes->post(
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

    }
);


/*
|--------------------------------------------------------------------------
| POKJA KELURAHAN SEHAT - RENCANA KERJA
|--------------------------------------------------------------------------
| User dan Admin
|--------------------------------------------------------------------------
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
            'create',
            'PokjaKelurahanSehatRencanaKerja::create'
        );

        $routes->post(
            'store',
            'PokjaKelurahanSehatRencanaKerja::store'
        );

        $routes->get(
            'edit/(:num)',
            'PokjaKelurahanSehatRencanaKerja::edit/$1'
        );

        $routes->post(
            'update/(:num)',
            'PokjaKelurahanSehatRencanaKerja::update/$1'
        );

        $routes->post(
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
| FORUM KECAMATAN SEHAT - TAHUN
|--------------------------------------------------------------------------
*/

$routes->get(
    'forum-kecamatan-sehat/realisasi/tahun-1',
    'ForumKecamatanSehatRealisasi::tahun1'
);

$routes->get(
    'forum-kecamatan-sehat/realisasi/tahun-2',
    'ForumKecamatanSehatRealisasi::tahun2'
);