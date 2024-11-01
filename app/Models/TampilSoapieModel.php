<?php

namespace App\Models;

use CodeIgniter\Model;

class TampilSoapieModel extends Model
{
    public function pemeriksaanRawatJalan($no_rawat)
    {
        $builder = $this->db->table('pemeriksaan_ralan')
            ->select('pemeriksaan_ralan.tgl_perawatan,pemeriksaan_ralan.jam_rawat,pemeriksaan_ralan.suhu_tubuh,pemeriksaan_ralan.tensi,pemeriksaan_ralan.nadi,pemeriksaan_ralan.respirasi,pemeriksaan_ralan.tinggi,pemeriksaan_ralan.berat,pemeriksaan_ralan.gcs,pemeriksaan_ralan.spo2,pemeriksaan_ralan.kesadaran,pemeriksaan_ralan.keluhan,pemeriksaan_ralan.pemeriksaan,pemeriksaan_ralan.alergi,pemeriksaan_ralan.lingkar_perut,pemeriksaan_ralan.rtl,pemeriksaan_ralan.penilaian,pemeriksaan_ralan.instruksi,pemeriksaan_ralan.evaluasi,pemeriksaan_ralan.nip,pegawai.jbtn,pegawai.nama')->join('pegawai', 'pegawai.nik=pemeriksaan_ralan.nip')->notLike('pemeriksaan_ralan.keluhan', '::')->notLike('pemeriksaan_ralan.penilaian', '::')->notLike('pemeriksaan_ralan.pemeriksaan', '::')->notLike('pemeriksaan_ralan.pemeriksaan', '::')->notLike('pemeriksaan_ralan.rtl', '::')->notLike('pemeriksaan_ralan.instruksi', '::')->where('pemeriksaan_ralan.no_rawat', $no_rawat);
        return $builder->get()->getResult();
    }

    public function pemeriksaanRawatInap($no_rawat)
    {
        $builder = $this->db->table('pemeriksaan_ranap')
            ->select('pemeriksaan_ranap.tgl_perawatan,pemeriksaan_ranap.jam_rawat,pemeriksaan_ranap.suhu_tubuh,pemeriksaan_ranap.tensi,pemeriksaan_ranap.nadi,pemeriksaan_ranap.respirasi,pemeriksaan_ranap.tinggi,pemeriksaan_ranap.berat,pemeriksaan_ranap.gcs,pemeriksaan_ranap.spo2,pemeriksaan_ranap.kesadaran,pemeriksaan_ranap.keluhan,pemeriksaan_ranap.pemeriksaan,pemeriksaan_ranap.alergi,pemeriksaan_ranap.rtl,pemeriksaan_ranap.penilaian,pemeriksaan_ranap.instruksi,pemeriksaan_ranap.evaluasi,pemeriksaan_ranap.nip,pegawai.jbtn,pegawai.nama')->join('pegawai', 'pegawai.nik=pemeriksaan_ranap.nip')->notLike('pemeriksaan_ranap.keluhan', '::')->notLike('pemeriksaan_ranap.penilaian', '::')->notLike('pemeriksaan_ranap.pemeriksaan', '::')->notLike('pemeriksaan_ranap.pemeriksaan', '::')->notLike('pemeriksaan_ranap.rtl', '::')->notLike('pemeriksaan_ranap.instruksi', '::')->where('pemeriksaan_ranap.no_rawat', $no_rawat);
        return $builder->get()->getResult();
    }
}
