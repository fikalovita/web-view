<?php

namespace App\Controllers;

use App\Models\DetailRanapModel;

class Detail_ranap extends BaseController
{
    public function index($no_rawat)
    {

        $DetailRanapModel = new DetailRanapModel;
        $pasien_ranap = $DetailRanapModel->detailPasienRanap()->getRow();
        $no_rawat = str_replace('/', '', $pasien_ranap->no_rawat);
        // var_dump((int) $no_rawat);
        // die();
        $data = ['no_rawat' => (int) $no_rawat];
        $data = [
            'title' => 'Riwayat Rawat Inap',
            'pasien_ranap' => $pasien_ranap

        ];
        return view('detail_ranap', $data);
    }
}
