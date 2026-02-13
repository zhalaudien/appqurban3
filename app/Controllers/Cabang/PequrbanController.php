<?php

namespace App\Controllers\Cabang;

use App\Controllers\BaseController;
use App\Models\PequrbanModel;

class PequrbanController extends BaseController
{
    protected PequrbanModel $model;
    protected int $cabangId;

    public function __construct()
    {
        $this->model    = new PequrbanModel();
        $this->cabangId = session()->get('user')['cabang_id'];
    }

    public function index()
    {
        $data = [
            'title'    => 'Data Pequrban',
            'pequrban' => $this->model
                ->where('cabang_id', $this->cabangId)
                ->findAll(),
        ];

        return view('cabang/pequrban/index', $data);
    }

    public function create()
    {
        return view('cabang/pequrban/create', [
            'title' => 'Tambah Pequrban'
        ]);
    }

    public function store()
    {
        $this->model->insert([
            'nama'        => $this->request->getPost('nama'),
            'jenis_hewan' => $this->request->getPost('jenis_hewan'),
            'sumber'      => $this->request->getPost('sumber'),
            'harga'       => $this->request->getPost('harga'),
            'cabang_id'   => $this->cabangId, // 🔒 AUTO
        ]);

        return redirect()->to('/cabang/pequrban')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = $this->model
            ->where('id', $id)
            ->where('cabang_id', $this->cabangId)
            ->first();

        if (! $data) {
            return redirect()->back();
        }

        return view('cabang/pequrban/edit', [
            'title' => 'Edit Pequrban',
            'row'   => $data
        ]);
    }

    public function update($id)
    {
        $this->model
            ->where('id', $id)
            ->where('cabang_id', $this->cabangId)
            ->set([
                'nama'        => $this->request->getPost('nama'),
                'jenis_hewan' => $this->request->getPost('jenis_hewan'),
                'sumber'      => $this->request->getPost('sumber'),
                'harga'       => $this->request->getPost('harga'),
            ])->update();

        return redirect()->to('/cabang/pequrban')->with('success', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        $this->model
            ->where('id', $id)
            ->where('cabang_id', $this->cabangId)
            ->delete();

        return redirect()->to('/cabang/pequrban')->with('success', 'Data berhasil dihapus');
    }
}
