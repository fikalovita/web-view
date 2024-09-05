<?php

namespace App\Controllers;

use App\Models\RiwayatModel;


class Data_riwayat extends BaseController
{
    function ranapAjax()
    {
        $param['draw'] = isset($_REQUEST['draw']) ? $_REQUEST['draw'] : '';
        $start = isset($_REQUEST['start']) ? $_REQUEST['start'] : '';
        $length = isset($_REQUEST['length']) ? $_REQUEST['length'] : '';
        $search_value = isset($_REQUEST['search']['value']) ? $_REQUEST['search']['value'] : '';
        $RiwayatModel = new RiwayatModel();
        $data = [];
        $tgl1 = $this->request->getGet('tgl1');
        $tgl2 = $this->request->getGet('tgl2');
        // dd($tgl1);
        // if () {
        //     # code...
        // }
        // $date = [$tgl1, $tgl2];
        $data_inap = $RiwayatModel->RanapAjax($search_value, (int) $start, (int) $length);
        foreach ($data_inap as $value) {
            $btn_riwayat = '<a href="#" >Riwayat </a>';
            $row = [];
            $row[] = $value->no_rawat;
            $row[] = $value->tgl_masuk;
            $row[] = $value->nm_dokter;
            $row[] = $value->no_rkm_medis;
            $row[] = $value->nm_pasien;
            $row[] = $value->nm_bangsal;
            $row[] = $value->stts_pulang;
            $row[] = $btn_riwayat;
            $data[] = $row;
        }

        $total_count = $RiwayatModel->RanapAjax($search_value);
        $arr = [
            'draw' => $param['draw'],
            "recordsTotal" => count($total_count),
            "recordsFiltered" => count($total_count),
            "data" => $data

        ];

        $data_json = json_encode($arr);

        return $data_json;
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
