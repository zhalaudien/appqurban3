<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CabangModel;
use App\Models\PequrbanModel;


class DashboardController extends BaseController
{
    public function index()
    {
        $cabangModel     = new CabangModel();
        $pequrbanModel   = new PequrbanModel();
        $idpusat = session()->get('user')['pusat'];


        return view('dashboard/index', [
            'title' => 'Dashboard admin',

            // MASTER
            'totalCabang'   => $cabangModel->where('pusat', $idpusat)->countAllResults(),
            'totalPequrban' => $pequrbanModel->countAllResults(),

        ]);
    }
}
