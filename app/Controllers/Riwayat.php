<?php

namespace App\Controllers;

use App\Models\RiwayatModel;

class Riwayat extends BaseController
{

    public function ralan()
    {

        $data = [
            'title' => 'Pasien Rawat Jalan'
        ];

        return view('ralan', $data);
    }
    public function ranap()
    {
        $RiwayatModel = new RiwayatModel();
        $data_inap = $RiwayatModel->getRanap()->getResultArray();
        dd($data_inap);
        $data = [
            'title' => 'Pasien Rawat Inap'
        ];

        return view('ranap', $data);
    }
}
