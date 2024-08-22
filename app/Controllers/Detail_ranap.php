<?php

namespace App\Controllers;

class Detail_ranap extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Riwayat Rawat Inap'
        ];
        return view('detail_ranap', $data);
    }
}
