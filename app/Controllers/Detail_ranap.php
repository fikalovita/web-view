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
        //ambil data pasien
        $riwayat_ranap = $DetailRanapModel->riwayatPasienRanap($no_rawat)->getResult();
        $data = ['no_rawat' => (int) $no_rawat];
        $data = [
            'title' => 'Riwayat Rawat Inap',
            'riwayat_ranap' => $riwayat_ranap

        ];
        return view('detail_ranap', $data);
    }
    function tampilKunjungan()
    {
        $request = service('request');
        $DetailRanapModel = new DetailRanapModel;
        $no_rawat = $request->getPost('no_rawat');
        // dd($no_rawat);
        $data_kunjungan = $DetailRanapModel->tampilKunjungan($no_rawat)->getResult();
        $data_json = [
            'data' => $data_kunjungan
        ];

        return $this->response->setJSON($data_json);
    }
}
