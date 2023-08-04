<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $menu = [
            'beranda' => [
                'title' => 'Beranda',
                'link'  => base_url(),
                'icon'  => 'fa-solid fa-building',
                'aktif' => 'active',
            ],
            'jurusan' => [
                'title' => 'Jurusan',
                'link'  => base_url() . '/jurusan',
                'icon'  => 'fa-solid fa-location-dot',
                'aktif' => '',
            ],
            'bus' => [
                'title' => 'Bus Kami',
                'link'  => base_url() . '/bus',
                'icon'  => 'fa-solid fa-bus',
                'aktif' => '',
            ],
            'krubus' => [
                'title' => 'Kru Kami',
                'link'  => base_url() . '/krubus',
                'icon'  => 'fa-solid fa-users',
                'aktif' => '',
            ],
        ];

        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Beranda</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Beranda</li>
                            </ol>
                        </div>';
        $data['menu'] = $menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "Welcome to my site";
        $data['selamat_datang'] = "Selamat Datang Di aplikasi Sederhana";
        return view('template/content', $data); 
    }
}
