<?php

namespace App\Models;

use CodeIgniter\Model;

class M_riwayat_ranap extends Model
{
    // function getRanap()
    // {
    //     $builder = $this->db->table('kamar_inap');
    //     $builder->select('kamar_inap.no_rawat,kamar_inap.kd_kamar,reg_periksa.no_rkm_medis, pasien.nm_pasien');
    //     $builder->join('reg_periksa', 'kamar_inap.no_rawat=reg_periksa.no_rawat', 'inner');
    //     $builder->join('pasien', 'reg_periksa.no_rkm_medis=pasien.no_rkm_medis', 'inner');
    //     $builder->limit(5);
    //     $query = $builder->get();
    //     return $query;
    // }
}
