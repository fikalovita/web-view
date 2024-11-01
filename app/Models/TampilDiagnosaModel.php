<?php

namespace App\Models;

use CodeIgniter\Model;

class TampilDiagnosaModel extends Model
{
    public function tampilDiagnosaPasien($no_rawat)
    {
        $builder = $this->db->table('diagnosa_pasien')
            ->select('diagnosa_pasien.kd_penyakit,penyakit.nm_penyakit,diagnosa_pasien.status')
            ->join('penyakit', 'penyakit.kd_penyakit=diagnosa_pasien.kd_penyakit')
            ->where('diagnosa_pasien.no_rawat', $no_rawat);
        return $builder->get()->getResult();
    }
}
