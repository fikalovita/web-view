<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailRanapModel extends Model
{

    function detailPasienRanap()
    {

        $builder = $this->db->table('pasien');
        $builder->select('reg_periksa.no_rawat,pasien.no_rkm_medis');
        $builder->join('reg_periksa', 'reg_periksa.no_rkm_medis=pasien.no_rkm_medis');
        return $builder->get()->getRow();
    }

    function riwayatPasienRanap($no_rawat)
    {

        $builder = $this->db->table('pasien');
        $builder->select('reg_periksa.no_rawat,pasien.no_rkm_medis, pasien.nm_pasien');
        $builder->join('reg_periksa', 'reg_periksa.no_rkm_medis=pasien.no_rkm_medis');
        $builder->where(str_replace('/', '', 'no_rawat'), $no_rawat);
        return $builder->get();
    }
}
