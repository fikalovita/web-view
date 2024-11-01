<?php

namespace App\Models;

use CodeIgniter\Model;

class TampilSbarModel extends Model
{
    public function tampilSbarRalan($no_rawat)
    {
        $builder = $this->db->table('pemeriksaan_ralan')
            ->select('pemeriksaan_ralan.tgl_perawatan,pemeriksaan_ralan.jam_rawat,pemeriksaan_ralan.keluhan,pemeriksaan_ralan.pemeriksaan,pemeriksaan_ralan.rtl,pemeriksaan_ralan.penilaian,pemeriksaan_ralan.instruksi,pemeriksaan_ralan.evaluasi,pemeriksaan_ralan.nip,pegawai.jbtn,pegawai.nama')->join('pegawai', 'pegawai.nik=pemeriksaan_ralan.nip')->Like('pemeriksaan_ralan.keluhan', '::')->Like('pemeriksaan_ralan.penilaian', '::')->Like('pemeriksaan_ralan.pemeriksaan', '::')->Like('pemeriksaan_ralan.pemeriksaan', '::')->Like('pemeriksaan_ralan.rtl', '::')->Like('pemeriksaan_ralan.instruksi', '::')->where('pemeriksaan_ralan.no_rawat', $no_rawat);
        return $builder->get()->getResult();
    }
    public function tampilSbarRanap($no_rawat)
    {
        $builder = $this->db->table('pemeriksaan_ranap')
            ->select('pemeriksaan_ranap.tgl_perawatan,pemeriksaan_ranap.jam_rawat,pemeriksaan_ranap.keluhan,pemeriksaan_ranap.pemeriksaan,pemeriksaan_ranap.alergi,pemeriksaan_ranap.rtl,pemeriksaan_ranap.penilaian,pemeriksaan_ranap.instruksi,pemeriksaan_ranap.evaluasi,pemeriksaan_ranap.nip,pegawai.jbtn,pegawai.nama')->join('pegawai', 'pegawai.nik=pemeriksaan_ranap.nip')->Like('pemeriksaan_ranap.keluhan', '::')->Like('pemeriksaan_ranap.penilaian', '::')->Like('pemeriksaan_ranap.pemeriksaan', '::')->Like('pemeriksaan_ranap.pemeriksaan', '::')->Like('pemeriksaan_ranap.rtl', '::')->Like('pemeriksaan_ranap.instruksi', '::')->where('pemeriksaan_ranap.no_rawat', $no_rawat);
        return $builder->get()->getResult();
    }
}
