<?php

namespace App\Controllers;

use App\Models\RiwayatModel;

use CodeIgniter\RESTful\ResourceController;

class Data_riwayat extends BaseController
{
    function ranapAjax()
    {
        $RiwayatModel = new RiwayatModel();
        $request = service('request');
        $startDate = $request->getPost('start_date') ?: date('Y-m-d');
        $endDate = $request->getPost('end_date') ?: date('Y-m-d');
        $search = $request->getPost('search')['value'];
        $start = (int) $request->getPost('start');
        $length = (int) $request->getPost('length');

        $data_inap = $RiwayatModel->RanapAjax($startDate, $endDate, $length, $start, $start);
        $totalRecords = $RiwayatModel->getCountRanap($startDate, $endDate, $search);

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
        $param['draw'] = isset($_REQUEST['draw']) ? $_REQUEST['draw'] : '';
        $start = isset($_REQUEST['start']) ? $_REQUEST['start'] : '';
        $length = isset($_REQUEST['length']) ? $_REQUEST['length'] : '';
        $search_value = isset($_REQUEST['search']['value']) ? $_REQUEST['search']['value'] : '';
        $RiwayatModel = new RiwayatModel();
        $data = [];
        // $tgl1 = $this->request->getGet('tgl1');
        // $tgl2 = $this->request->getGet('tgl2');
        // dd($tgl1);
        // if () {
        //     # code...
        // }
        // $date = [$tgl1, $tgl2];
        $data_ralan = $RiwayatModel->RalanAjax($search_value, $start, $length);
        foreach ($data_ralan as $value) {
            $btn_riwayat = '<a href="' . base_url('detail_ralan/' . str_replace("/", "", $value->no_rawat)) . '" >Riwayat </a>';
            $row = [];
            $row[] = $value->no_rawat;
            $row[] = $value->tgl_registrasi;
            $row[] = $value->nm_dokter;
            $row[] = $value->no_rkm_medis;
            $row[] = $value->nm_pasien;
            $row[] = $value->nm_poli;
            $row[] = $value->status_poli;
            $row[] = $value->stts;
            $row[] = $btn_riwayat;
            $data[] = $row;
        }

        $total_count = $RiwayatModel->RalanAjax($search_value);
        $arr = [
            'draw' => $param['draw'],
            "recordsTotal" => count($total_count),
            "recordsFiltered" => count($total_count),
            "data" => $data

        ];

        $data_json = json_encode($arr);

        return $data_json;
    }
}
