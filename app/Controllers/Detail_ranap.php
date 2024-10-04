<?php

namespace App\Controllers;

use App\Models\DetailRanapModel;

class Detail_ranap extends BaseController
{
    public function index($no_rawat)
    {
        $array =  array();
        $uri = current_url(true);
        $DetailRanapModel = new DetailRanapModel;
        $no_rawat = $uri->getSegment(2);
        $no_rkm_medis = $uri->getSegment(3);
        // dd($no_rkm_medis);
        //ambil data pasien
        $riwayat_ranap = $DetailRanapModel->riwayatPasienRanap($no_rawat)->getResult();
        $riwayat_kunjungan = $DetailRanapModel->tampilKunjungan($no_rawat)->getResult();
        $tampilIdentitas = $DetailRanapModel->tampilIdentitas($no_rkm_medis)->getResult();
        // $tampilDiagnosa = $DetailRanapModel->tampilDiagnosa($tampilIdentitas)->getResult();
        // dd($tampilDiagnosa);




        $data = ['no_rawat' => (int) $no_rawat];
        $data = [
            'title' => 'Riwayat Rawat Inap',
            'riwayat_ranap' => $riwayat_ranap,
            'riwayat_kunjungan' => $riwayat_kunjungan,
            'tampilIdentitas' => $tampilIdentitas,


        ];


        return view('detail_ranap', $data);
    }
}
