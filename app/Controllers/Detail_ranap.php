<?php

namespace App\Controllers;

use App\Models\DetailRanapModel;

class Detail_ranap extends BaseController
{
    public function index()
    {
        $DetailRanapModel = new DetailRanapModel;

        $data = [
            'title' => 'Riwayat Rawat Inap',

        ];
        return view('detail_ranap', $data);
    }
}
