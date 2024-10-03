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
        $no_rkm_medis = $uri->getSegment(3);
        // dd($no_rkm_medis);
        //ambil data pasien
        $riwayat_ranap = $DetailRanapModel->riwayatPasienRanap($no_rawat)->getResult();
        $riwayat_kunjungan = $DetailRanapModel->tampilKunjungan($no_rawat)->getResult();
        $riwayat_diagnosa = $DetailRanapModel->tampilDiagnosa($no_rkm_medis)->getResult();
        $data = ['no_rawat' => (int) $no_rawat];
        $data = [
            'title' => 'Riwayat Rawat Inap',
            'riwayat_ranap' => $riwayat_ranap,
            'riwayat_kunjungan' => $riwayat_kunjungan,
            'riwayat_diagnosa' => $riwayat_diagnosa

        ];
        return view('detail_ranap', $data);
    }
}
