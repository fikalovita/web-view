<?php

namespace App\Controllers;

use App\Models\RiwayatModel;

class Detail_ralan extends BaseController
{
    
    public function index()
    {
        $riwayatModel = new RiwayatModel();
        $data = [
            'title' => 'Riwayat Rawat Jalan'
        ];

        return view('detail_ralan', $data);
    }
}
