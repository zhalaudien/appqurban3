<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CabangModel;
use App\Models\PequrbanModel;
use App\Models\PanitiaModel;


class DashboardController extends BaseController
{
    public function index()
    {
        $cabangModel     = new CabangModel();
        $pequrbanModel   = new PequrbanModel();
        $panitiaModel    = new PanitiaModel();
        $idpusat = session()->get('user')['pusat'];
        $user = session()->get('user');


        return view('admin/dashboard/index', [
            'title' => 'Dashboard admin',

            // MASTER
            'totalCabang'   => $cabangModel->where('pusat', $idpusat)->countAllResults(),
            'totalPequrban' => $pequrbanModel->countAllResults(),
            'TotalPanita'   => $panitiaModel->countAllResults(),
            'user' => $user

        ]);
    }
}
