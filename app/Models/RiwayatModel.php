<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatModel extends Model
{
    function getRanap()
    {
        $builder = $this->db->table('kamar_inap');
        $builder->select('kamar_inap.no_rawat,bangsal.nm_bangsal,reg_periksa.no_rkm_medis, pasien.nm_pasien, dokter.nm_dokter,kamar_inap.stts_pulang');
        $builder->join('reg_periksa', 'kamar_inap.no_rawat=reg_periksa.no_rawat', 'inner');
        $builder->join('pasien', 'reg_periksa.no_rkm_medis=pasien.no_rkm_medis', 'inner');
        $builder->join('dpjp_ranap', 'reg_periksa.no_rawat=dpjp_ranap.no_rawat', 'inner');
        $builder->join('dokter', 'dpjp_ranap.kd_dokter=dokter.kd_dokter', 'inner');
        $builder->join('kamar', 'kamar_inap.kd_kamar=kamar.kd_kamar', 'inner');
        $builder->join('bangsal', 'kamar.kd_bangsal=bangsal.kd_bangsal', 'inner');
        // $builder->limit(5);
        $query = $builder->get();
        return $query;
    }

    function RanapAjax($keyword = null, $tgl1 = null, $tgl2 = null, $start = 0, $length = 0)
    {
        $where = "kamar_inap.tgl_masuk BETWEEN '$tgl1' AND '$tgl2' ";
        $builder = $this->db->table('kamar_inap');
        $builder->select('kamar_inap.no_rawat,kamar_inap.tgl_masuk,bangsal.nm_bangsal,reg_periksa.no_rkm_medis, pasien.nm_pasien, dokter.nm_dokter,kamar_inap.stts_pulang');
        $builder->join('reg_periksa', 'kamar_inap.no_rawat=reg_periksa.no_rawat', 'inner');
        $builder->join('pasien', 'reg_periksa.no_rkm_medis=pasien.no_rkm_medis', 'inner');
        $builder->join('dpjp_ranap', 'reg_periksa.no_rawat=dpjp_ranap.no_rawat', 'inner');
        $builder->join('dokter', 'dpjp_ranap.kd_dokter=dokter.kd_dokter', 'inner');
        $builder->join('kamar', 'kamar_inap.kd_kamar=kamar.kd_kamar', 'inner');
        $builder->join('bangsal', 'kamar.kd_bangsal=bangsal.kd_bangsal', 'inner');
        $builder->where($where);

        if ($keyword) {
            $arr_keyword = explode(" ", $keyword);
            for ($i = 0; $i < count($arr_keyword); $i++) {
                $builder->orLike('kamar_inap.no_rawat', $arr_keyword[$i]);
                $builder->orLike('bangsal.nm_bangsal', $arr_keyword[$i]);
                $builder->orLike('pasien.nm_pasien', $arr_keyword[$i]);
                $builder->orLike('reg_periksa.no_rkm_medis', $arr_keyword[$i]);
                $builder->orLike('dokter.nm_dokter', $arr_keyword[$i]);
                $builder->orLike('kamar_inap.stts_pulang', $arr_keyword[$i]);
                $builder->orLike('kamar_inap.tgl_masuk', $arr_keyword[$i]);
            }
        }

        if ($start != 0 or $length != 0) {

            $builder->limit($length, $start);
        }

        return $builder->orderBy('kamar_inap.no_rawat')->get()->getResult();
    }
}
