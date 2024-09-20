<?php

namespace App\Controllers;

use App\Models\DetailRanapModel;

class Detail_ranap extends BaseController
{
    public function index($no_rawat)
    {
        $uri = current_url(true);
        $DetailRanapModel = new DetailRanapModel;
        $pasien_ranap = $DetailRanapModel->detailPasienRanap();
        $no_rawat = $uri->getSegment(2);
        // $param = $pasien_ranap->no_rawat;
        $riwayat_ranap = $DetailRanapModel->riwayatPasienRanap($no_rawat)->getResult();
        dd($no_rawat);
        $data = ['no_rawat' => (int) $no_rawat];
        $data = [
            'title' => 'Riwayat Rawat Inap',
            'riwayat_ranap' => $riwayat_ranap

        ];
        return view('detail_ranap', $data);
    }
}
