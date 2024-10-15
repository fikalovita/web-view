<?php

namespace App\Controllers;

use App\Models\DetailRanapModel;

class Detail_ranap extends BaseController
{
    public function index($no_rawat)
    {
        $uri = current_url(true);
        $DetailRanapModel = new DetailRanapModel;
        $no_rawat = $uri->getSegment(2);
        $riwayat_ranap = $DetailRanapModel->riwayatPasienRanap($no_rawat)->getResult();
        $no_rkm_medis  = $riwayat_ranap[0]->no_rkm_medis;
        $riwayat_kunjungan = $DetailRanapModel->tampilKunjungan($no_rkm_medis)->getResult();
        $tampilIdentitas = $DetailRanapModel->tampilIdentitas($no_rkm_medis)->getResult();
        $tampilIdentitas2 = $DetailRanapModel->tampilIdentitas2($no_rkm_medis)->getResult();
        $pasienLaborat = $DetailRanapModel->pasienLaborat($no_rkm_medis)->getResult();


        $data = ['no_rawat' => (int) $no_rawat];
        $data = [
            'title' => 'Riwayat Rawat Inap',
            'riwayat_ranap' => $riwayat_ranap,
            'riwayat_kunjungan' => $riwayat_kunjungan,
            'tampilIdentitas' => $tampilIdentitas,
            'tampilIdentitas2' => $tampilIdentitas2,
            'pasienLaborat' => $pasienLaborat

        ];


        return view('detail_ranap', $data);
    }
}
