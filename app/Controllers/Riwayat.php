<?php

namespace App\Controllers;

use App\Models\M_riwayat_ranap;

class Riwayat extends BaseController
{
    protected $pasien;
    function __construct()
    {
        $pasien = new M_riwayat_ranap();
    }

    public function ralan()
    {
       
        $data = [
            'title' => 'Pasien Rawat Jalan'
        ];

        return view('ralan', $data);
    }
    public function ranap()
    {
        $data = [
            'title' => 'Pasien Rawat Inap'
        ];

        return view('ralan', $data);
    }
}
