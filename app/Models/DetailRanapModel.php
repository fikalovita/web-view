<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailRanapModel extends Model
{
    function detailPasienRanapAjax($no_rawat)
    {
        $builder = $this->db->table('pasien');
        $builder->select('pasien.no_rkm_medis,pasien.nm_pasien,pasien.jk,concat(pasien.tmp_lahir,tgl_lahir),pasien.alamat,pasien.gol_darah,pasien.agama,pasien.stts_nikah,pasien.pnd,pasien.nm_ibu,pasien.bahasa_pasien,pasien.cacat_fisik ');
        $builder->join('bahasa_pasien', 'bahasa_pasien.id=pasien.bahasa_pasien', 'inner');
        $builder->join('cacat_fisik', 'cacat_fisik.id=pasien.cacat_fisik');

        
    }
}
