<?php

namespace App\Models;

use CodeIgniter\Model;

class TampilKunjunganModel extends Model
{
    function tampilKunjungan($no_rkm_medis, $tglAwal, $tglAkhir, $riwayat_terakhir)
    {

        $builder = $this->db->table('reg_periksa');
        $builder->select("reg_periksa.no_rawat,reg_periksa.tgl_registrasi,reg_periksa.jam_reg,reg_periksa.status_lanjut,reg_periksa.kd_dokter,dokter.nm_dokter,concat(reg_periksa.umurdaftar, ' ', reg_periksa.sttsumur) as umur,poliklinik.kd_poli,poliklinik.nm_poli,penjab.png_jawab,reg_periksa.no_rawat");
        $builder->join('dokter', 'dokter.kd_dokter=reg_periksa.kd_dokter', 'inner');
        $builder->join('poliklinik', 'poliklinik.kd_poli=reg_periksa.kd_poli', 'inner');
        $builder->join('penjab', 'penjab.kd_pj=reg_periksa.kd_pj');
        $builder->where('reg_periksa.stts<>', 'Batal');
        $builder->where('reg_periksa.no_rkm_medis', $no_rkm_medis);
        $builder->orderBy('reg_periksa.tgl_registrasi', 'DESC');
        if ($tglAwal && $tglAkhir) {
            $builder->where('reg_periksa.tgl_registrasi >=', $tglAwal);
            $builder->where('reg_periksa.tgl_registrasi <=', $tglAkhir);
        } elseif ($riwayat_terakhir) {
            $builder->limit($riwayat_terakhir);
        } else {
            $builder->limit(5);
        }
        return $builder->get();
    }

    public function getRujukanInternal($rujukanInternal)
    {
        foreach ($rujukanInternal as $rk) {
            $builder = $this->db->query('select rujukan_internal_poli.kd_dokter,dokter.nm_dokter,rujukan_internal_poli.kd_poli,poliklinik.nm_poli from  rujukan_internal_poli
            inner join dokter on rujukan_internal_poli.kd_dokter=dokter.kd_dokter inner join poliklinik on rujukan_internal_poli.kd_poli=poliklinik.kd_poli where rujukan_internal_poli.no_rawat = "' . $rk->no_rawat . '"');
            return $builder->getResult();
        }
    }

    public function getDokterRanap($riwayatKujungan)
    {
        $builder = $this->db->query("select dpjp_ranap.kd_dokter from dpjp_ranap where dpjp_ranap.no_rawat='" . $riwayatKujungan . "'");
        return $builder->getResult();
    }

    public function getKodeDPJP($getDokterRanap)
    {
        if (!empty($getDokterRanap)) {
            foreach ($getDokterRanap as $kddpjp) {
                $builder = $this->db->query("select dokter.nm_dokter from dokter where dokter.kd_dokter='" . $kddpjp->kd_dokter . "'");
                return $builder->getResult();
            }
        }
    }

    public function getKamarInap($riwayatKujungan)
    {
        foreach ($riwayatKujungan as $rk) {
            $builder = $this->db->query("select kamar_inap.tgl_masuk, kamar_inap.jam_masuk,kamar_inap.kd_kamar,bangsal.nm_bangsal from kamar_inap inner join kamar on kamar_inap.kd_kamar=kamar.kd_kamar inner join bangsal on kamar.kd_bangsal=bangsal.kd_bangsal where kamar_inap.no_rawat='" . $rk->no_rawat . "'");
            return $builder->getResult();
        }
    }
}
