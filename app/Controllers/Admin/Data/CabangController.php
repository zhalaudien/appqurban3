<?php

namespace App\Controllers\Data;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CabangModel;

class CabangController extends BaseController
{
    public function index()
    {

        $cabangModel = new CabangModel();
        $idpusat = session()->get('user')['pusat'];

        return view('admin/data/cabang/index', [
            'title' => 'Data Cabang',

            'cabangs' => $cabangModel->where('pusat', $idpusat)->findAll(),
        ]);
    }
}
