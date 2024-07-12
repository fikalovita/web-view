<?php

namespace App\Controllers;

class Riwayat extends BaseController
{
    public function index() {
        $data = [
            'title' => 'Pasien Rawat Jalan'
        ];

        

        return view ('dashboard');
    }
}
