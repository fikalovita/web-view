<?php

namespace App\Models;

use CodeIgniter\Model;

class TampilRadiologiModel extends Model
{
    public function pemeriksaanRadiologi($no_rawat)
    {
        $builder = $this->db->query("select periksa_radiologi.tgl_periksa,periksa_radiologi.jam,periksa_radiologi.kd_jenis_prw,jns_perawatan_radiologi.nm_perawatan,petugas.nama,periksa_radiologi.biaya,periksa_radiologi.dokter_perujuk,dokter.nm_dokter,concat(
            if(periksa_radiologi.proyeksi<>'',concat('Proyeksi : ',periksa_radiologi.proyeksi,', '),''),
            if(periksa_radiologi.kV<>'',concat('Kv : ', periksa_radiologi.Kv,', '),''),
            if(periksa_radiologi.mAS<>'',concat('mAS : ', periksa_radiologi.mAS,', '),''),
            if(periksa_radiologi.FFD<>'',concat('FFD : ', periksa_radiologi.FFD,', '),''),
            if(periksa_radiologi.BSF<>'',concat('BSF : ',periksa_radiologi.BSF, ', '),''),
            if(periksa_radiologi.inak<>'',concat('inak : ',periksa_radiologi.inak,', '),''),
            if(periksa_radiologi.jml_penyinaran<>'',concat('Jml Penyinaran : ',periksa_radiologi.jml_penyinaran,', '),''),
            if(periksa_radiologi.dosis<>'',concat('Dosis Radiasi : ',periksa_radiologi.dosis,', ' ),'')
            ) as proyeksi from periksa_radiologi inner join jns_perawatan_radiologi on periksa_radiologi.kd_jenis_prw=jns_perawatan_radiologi.kd_jenis_prw inner join petugas on periksa_radiologi.nip=petugas.nip inner join dokter on periksa_radiologi.kd_dokter=dokter.kd_dokter where periksa_radiologi.no_rawat='" . $no_rawat . "' order by periksa_radiologi.tgl_periksa,periksa_radiologi.jam");
        return $builder->getResult();
    }

    public function tampilBacaanRadiologi($no_rawat)
    {
        $builder = $this->db->query("select tgl_periksa,jam,hasil from hasil_radiologi where no_rawat = '" . $no_rawat . "' ");
        return $builder->getResult();
    }
    public function tampilGambarRadiologi($no_rawat)
    {
        $builder = $this->db->query("select tgl_periksa,jam,lokasi_gambar from gambar_radiologi where no_rawat = '" . $no_rawat . "'");
        return $builder->getResult();
    }

    public function getDokterRanap($no_rawat)
    {
        $builder = $this->db->table('dpjp_ranap')->select('dokter.nm_dokter')->join('dokter', 'dpjp_ranap.kd_dokter=dokter.kd_dokter')->where('dpjp_ranap.no_rawat', $no_rawat);
        return $builder->get()->getResult();
    }
}
