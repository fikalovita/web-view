<?php

namespace App\Controllers;

class Detail_ralan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Riwayat Rawat Jalan'
        ];

        return view('detail_ralan', $data);
    }
}
