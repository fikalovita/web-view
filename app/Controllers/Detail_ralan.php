<?php

namespace App\Controllers;

use App\Models\DataPasienModel;
use App\Models\tampilKunjunganModel;
// use App\Models\RiwayatModel;



class Detail_ralan extends BaseController
{

    public function index($no_rawat)
    {
        $DataPasienModel = new DataPasienModel();
        $riwayat_ralan = $DataPasienModel->riwayatPasien($no_rawat)->getResult();
        $no_rawat = $riwayat_ralan[0]->no_rawat;
        $parts = explode('/', $no_rawat);
        $norawat = $parts[0] . $parts[1] . $parts[2] . $parts[3];
        $data = [
            'title' => 'Riwayat Rawat Jalan',
            'riwayat_ralan' => $riwayat_ralan,
            'no_rawat' => $norawat
        ];
        return view('detail_ralan', $data);
    }
}
