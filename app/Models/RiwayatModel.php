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
        $builder->limit(5);
        $query = $builder->get();
        return $query;
    }
}
