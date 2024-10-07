<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatModel extends Model
{

    function RanapAjax($startDate = null, $endDate = null, $status_pulang = null, $limit = 0, $offset = 0, $search = '')
    {


        $builder = $this->db->table('kamar_inap');
        $builder->select("kamar_inap.no_rawat,kamar_inap.tgl_masuk,bangsal.nm_bangsal,pasien.no_rkm_medis, pasien.nm_pasien, dokter.nm_dokter,kamar_inap.stts_pulang");
        $builder->join('kamar', 'kamar_inap.kd_kamar=kamar.kd_kamar', 'inner');
        $builder->join('bangsal', 'kamar.kd_bangsal=bangsal.kd_bangsal', 'inner');
        $builder->join('reg_periksa', 'kamar_inap.no_rawat=reg_periksa.no_rawat', 'inner');
        $builder->join('pasien', 'reg_periksa.no_rkm_medis=pasien.no_rkm_medis', 'inner');
        $builder->join('dpjp_ranap', 'reg_periksa.no_rawat=dpjp_ranap.no_rawat', 'inner');
        $builder->join('dokter', 'dpjp_ranap.kd_dokter=dokter.kd_dokter', 'inner');
        $builder->where('stts_pulang', $status_pulang);



        if ($startDate && $endDate) {
            $builder->where('kamar_inap.tgl_masuk >=', $startDate);
            $builder->where('kamar_inap.tgl_masuk <=', $endDate);
        }

        if ($search) {
            $arr_search = explode(" ", $search);
            for ($i = 0; $i < count($arr_search); $i++) {
                $builder->orLike('kamar_inap.no_rawat', $arr_search[$i]);
                $builder->orLike('kamar_inap.tgl_masuk', $arr_search[$i]);
                $builder->orLike('bangsal.nm_bangsal', $arr_search[$i]);
                $builder->orLike('reg_periksa.no_rkm_medis', $arr_search[$i]);
                $builder->orLike('pasien.nm_pasien', $arr_search[$i]);
                $builder->orLike('dokter.nm_dokter', $arr_search[$i]);
                $builder->orLike('kamar_inap.stts_pulang', $arr_search[$i]);
            }
        }

        $builder->limit($limit, $offset);
        return $builder->get()->getResult();
    }

    public function getCountRanap($startDate = null, $endDate = null, $status_pulang = null, $search = '')
    {

        $builder = $this->db->table('kamar_inap');
        $builder->select('kamar_inap.no_rawat,kamar_inap.tgl_masuk,bangsal.nm_bangsal,pasien.no_rkm_medis, pasien.nm_pasien, dokter.nm_dokter,kamar_inap.stts_pulang');
        $builder->join('kamar', 'kamar_inap.kd_kamar=kamar.kd_kamar', 'inner');
        $builder->join('bangsal', 'kamar.kd_bangsal=bangsal.kd_bangsal', 'inner');
        $builder->join('reg_periksa', 'kamar_inap.no_rawat=reg_periksa.no_rawat', 'inner');
        $builder->join('pasien', 'reg_periksa.no_rkm_medis=pasien.no_rkm_medis', 'inner');
        $builder->join('dpjp_ranap', 'reg_periksa.no_rawat=dpjp_ranap.no_rawat', 'inner');
        $builder->join('dokter', 'dpjp_ranap.kd_dokter=dokter.kd_dokter', 'inner');
        $builder->where('stts_pulang', $status_pulang);
        $builder->like('reg_periksa.status_bayar', 'Belum Bayar');




        if ($startDate && $endDate) {
            $builder->where('kamar_inap.tgl_masuk >=', $startDate);
            $builder->where('kamar_inap.tgl_masuk <=', $endDate);
        }

        if ($search) {
            $arr_search = explode(" ", $search);
            for ($i = 0; $i < count($arr_search); $i++) {
                $builder->orLike('kamar_inap.no_rawat', $arr_search[$i]);
                $builder->orLike('kamar_inap.tgl_masuk', $arr_search[$i]);
                $builder->orLike('bangsal.nm_bangsal', $arr_search[$i]);
                $builder->orLike('reg_periksa.no_rkm_medis', $arr_search[$i]);
                $builder->orLike('pasien.nm_pasien', $arr_search[$i]);
                $builder->orLike('dokter.nm_dokter', $arr_search[$i]);
                $builder->orLike('kamar_inap.stts_pulang', $arr_search[$i]);
            }
        }


        return $builder->countAllResults();
    }

    function RalanAjax($keyword = null, $start = 0, $length = 0)
    {
        $builder = $this->db->table('reg_periksa');
        $builder->select('reg_periksa.no_rawat, reg_periksa.tgl_registrasi,reg_periksa.no_rkm_medis,pasien.nm_pasien,poliklinik.nm_poli,dokter.nm_dokter,reg_periksa.status_poli,reg_periksa.stts');
        $builder->join('pasien', 'reg_periksa.no_rkm_medis=pasien.no_rkm_medis', 'inner');
        $builder->join('dokter', 'reg_periksa.kd_dokter=dokter.kd_dokter', 'inner');
        $builder->join('poliklinik', 'reg_periksa.kd_poli=poliklinik.kd_poli');
        $builder->where('reg_periksa.status_lanjut', 'Ralan');

        if ($keyword) {
            $arr_keyword = explode(" ", $keyword);
            for ($i = 0; $i < count($arr_keyword); $i++) {
                $builder->orLike('reg_periksa.no_rawat', $arr_keyword[$i]);
                $builder->orLike('reg_periksa.tgl_registrasi', $arr_keyword[$i]);
                $builder->orlike('reg_periksa.no_rkm_medis', $arr_keyword[$i]);
                $builder->orLike('pasien.nm_pasien', $arr_keyword[$i]);
                $builder->orLike('poliklinik.nm_poli', $keyword[$i]);
                $builder->orLike('dokter.nm_dokter', $keyword[$i]);
                $builder->orLike('reg_periksa.status_poli', $keyword[$i]);
                $builder->orLike('reg_periksa.stts', $keyword[$i]);
            }
        }

        if ($start != 0 or $length != 0) {
            $builder->limit($length, $start);
        }

        return $builder->orderBy('reg_periksa.no_rawat')->get()->getResult();
    }
}
