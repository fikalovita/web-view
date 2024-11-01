<?php

namespace App\Controllers;

use App\Models\RiwayatModel;

use CodeIgniter\RESTful\ResourceController;

class Data_riwayat extends BaseController
{
    public function __construct()
    {
        if (!session()->get('isLogin')) {
            redirect()->to('auth/login');
        }
    }
    function ranapAjax()
    {
        //ambil data request dari datatable dan input tanggal
        $RiwayatModel = new RiwayatModel();
        $request = service('request');
        $startDate = $request->getPost('start_date') ?: date('Y-m-d');
        $endDate = $request->getPost('end_date') ?: date('Y-m-d');
        $status_pulang = $request->getPost('status') ?: "-";
        $search = $request->getPost('search')['value'];
        $start = (int) $request->getPost('start');
        $length = (int) $request->getPost('length');

        //data pasien ranap dari model RiwayatModel()
        $data_inap = $RiwayatModel->RanapAjax($startDate, $endDate, $status_pulang, $length, $start, $search);
        $totalRecords = $RiwayatModel->getCountRanap($startDate, $endDate, $status_pulang, $search);


        $data_json = [
            'draw' => intval($request->getPost('draw')),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $data_inap
        ];

        return $this->response->setJSON($data_json);
    }

    function ralanAjax()
    {
        //ambil data request dari datatable dan input tanggal
        $RiwayatModel = new RiwayatModel();
        $request = service('request');
        $startDate = $request->getPost('start_date2') ?: date('Y-m-d');
        $endDate = $request->getPost('end_date2') ?: date('Y-m-d');
        $status_periksa = $request->getPost('status') ?: "Belum";
        $search = $request->getPost('search')['value'];
        $start = (int) $request->getPost('start');
        $length = (int) $request->getPost('length');

        //data pasien ranap dari model RiwayatModel()
        $data_inap = $RiwayatModel->RalanAjax($startDate, $endDate, $status_periksa, $length, $start, $search);
        $totalRecords = $RiwayatModel->getCountRalan($startDate, $endDate, $status_periksa, $search);


        $data_json = [
            'draw' => intval($request->getPost('draw')),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $data_inap
        ];

        return $this->response->setJSON($data_json);
    }
}
