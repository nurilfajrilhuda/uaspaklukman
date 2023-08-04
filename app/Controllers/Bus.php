<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Bus extends BaseController
{
    public function index()
    {
        $menu = [
            'beranda' => [
                'title' => 'Beranda',
                'link'  => base_url(),
                'icon'  => 'fa-solid fa-building',
                'aktif' => '',
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
                'aktif' => 'active',
            ],
            'krubus' => [
                'title' => 'Kru Kami',
                'link'  => base_url() . '/krubus',
                'icon'  => 'fa-solid fa-users',
                'aktif' => '',
            ],
        ];

        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Bus</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                                <li class="breadcrumb-item active">Bus</li>
                            </ol>
                        </div>';
        $data['menu'] = $menu;
        $data['breadcrumb'] = $breadcrumb;
        return view('bus/content', $data);
    }
}
