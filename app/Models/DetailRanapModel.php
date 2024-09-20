<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailRanapModel extends Model
{

    function detailPasienRanap()
    {

        $builder = $this->db->table('pasien');
        $builder->select('reg_periksa.no_rawat,pasien.no_rkm_medis,pasien.nm_pasien,pasien.jk,concat(pasien.tmp_lahir,tgl_lahir),pasien.alamat,pasien.gol_darah,pasien.agama,pasien.stts_nikah,pasien.pnd,pasien.nm_ibu,pasien.bahasa_pasien,pasien.cacat_fisik ');
        $builder->join('bahasa_pasien', 'bahasa_pasien.id=pasien.bahasa_pasien', 'inner');
        $builder->join('cacat_fisik', 'cacat_fisik.id=pasien.cacat_fisik');
        $builder->join('reg_periksa', 'reg_periksa.no_rkm_medis=pasien.no_rkm_medis');
        // $builder->limit(1);
        return $builder->get();
    }
}
