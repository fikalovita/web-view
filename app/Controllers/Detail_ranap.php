<?php

namespace App\Controllers;

use App\Models\DataPasienModel;

class Detail_ranap extends BaseController
{
    public function index($no_rawat)
    {
        $DataPasienModel = new DataPasienModel();
        $riwayat_ranap = $DataPasienModel->riwayatPasien($no_rawat)->getResult();
        $no_rawat = $riwayat_ranap[0]->no_rawat;
        $parts = explode('/', $no_rawat);
        $norawat = $parts[0] . $parts[1] . $parts[2] . $parts[3];
        $data = [
            'title' => 'Riwayat Rawat Inap',
            'riwayat_ranap' => $riwayat_ranap,
            'no_rawat' => $norawat
        ];
        return view('detail_ranap', $data);
    }
}
