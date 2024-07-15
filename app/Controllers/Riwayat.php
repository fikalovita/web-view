<?php

namespace App\Controllers;

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
        $data = [
            'title' => 'Pasien Rawat Inap'
        ];

        return view('ralan', $data);
    }
}
