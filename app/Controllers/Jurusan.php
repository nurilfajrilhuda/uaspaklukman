<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JurusanModel;
use PhpParser\Node\Stmt\TryCatch;

class Jurusan extends BaseController
{
    protected $pm;
    private $menu;
    private $rules;
    public function __construct()
    {
        $this->pm = new JurusanModel();

        $this->menu = [
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
                'aktif' => 'active',
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

        $this->rules = [
            'kd_jurusan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode Jurusan Harus Di isi',
                ]
            ],
            'nama_jurusan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Jurusan Harus Di isi',
                ]
            ],
            'harga_umum' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga Umum Harus Di isi',
                ]
            ],
            'harga_pelajar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga Pelajar Harus Di isi',
                ]
            ],
            'keberangkatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keberangkatan Harus Di isi',
                ]
            ],
        ];
    }

    public function index()
    {
        
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Jurusan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                                <li class="breadcrumb-item active">Jurusan</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "Data Jurusan";

        $query = $this->pm->find();
        $data['data_jurusan'] = $query;
        return view('jurusan/content', $data);
    }

    public function tambah()
    {
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Jurusan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                                <li class="breadcrumb-item"><a href="' . base_url() . '/jurusan">Jurusan</a></li>
                                <li class="breadcrumb-item active">Tambah Jurusan</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Tambah Prodi';
        $data['action'] = base_url() . '/jurusan/simpan';
        return view('jurusan/input', $data);
    }

    public function simpan()
    {
        
        if (strtolower($this->request->getMethod()) !== 'post'){
            
            return redirect()->back()->withInput();
        }
        if (!$this->validate($this->rules)) {
            return redirect()->back()->withInput();
        }
        $dt = $this->request->getPost();
        try {
            $simpan = $this->pm->insert($dt);
            return redirect()->to('jurusan')->with('success', 'Data berhasil disimpan');

        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            
            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
        
    }

    public function hapus($id)
    {
        if(empty($id)) {
            return redirect()->back()->with('error', 'Hapus data gagal dilakukan');
        }

        try {
            $this->pm->delete($id);
            return redirect()->to('jurusan')->with('success', 'Data prodi dengan kode ' . $id . ' berhasil dihapus');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return redirect()->to('jurusan')->with('error', $e->getMessage());
        }
        
    }

    public function edit($id){
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Jurusan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                                <li class="breadcrumb-item"><a href="' . base_url() . '/jurusan">Jurusan</a></li>
                                <li class="breadcrumb-item active">Edit Jurusan</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Edit Prodi';
        $data['action'] = base_url() . '/jurusan/update';

        $data['edit_data'] =  $this->pm->find($id);
        dd($data['edit_data']);
        return view('jurusan/input', $data);
    }

    public function update() {
        $dtEdit = $this->request->getPost();
        $param = $dtEdit['param'];
        unset($dtEdit['param']);

        if (!$this->validate($this->rules)) {
            return redirect()->back()->withInput();
        }

        try {
            $this->pm->update($param, $dtEdit);
            return redirect()->with('success', 'Data berhasil diupdate');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
