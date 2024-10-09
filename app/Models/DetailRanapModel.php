<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailRanapModel extends Model
{

    function detailPasienRanap()
    {

        $builder = $this->db->table('pasien');
        $builder->select('reg_periksa.no_rawat,reg_periksa.no_rkm_medis');
        $builder->join('reg_periksa', 'reg_periksa.no_rkm_medis=pasien.no_rkm_medis');
        return $builder->get()->getRow();
    }

    function riwayatPasienRanap($no_rawat)
    {
        //format ambil no_rawat
        $year = substr($no_rawat, 0, 4);
        $month = substr($no_rawat, 4, 2);
        $day = substr($no_rawat, 6, 2);
        $code = substr($no_rawat, 8);

        $formatted = "{$year}/{$month}/{$day}/{$code}";

        $builder = $this->db->table('pasien');
        $builder->select("reg_periksa.no_rawat,pasien.no_rkm_medis, pasien.nm_pasien, pasien.jk,pasien.alamatpj,pasien.agama,pasien.stts_nikah,pasien.pnd,concat(pasien.tmp_lahir,',',pasien.tgl_lahir) as tmp_tgl_lahir,pasien.nm_ibu,bahasa_pasien.nama_bahasa,cacat_fisik.nama_cacat");
        $builder->join('reg_periksa', 'reg_periksa.no_rkm_medis=pasien.no_rkm_medis', 'inner');
        $builder->join('bahasa_pasien', 'bahasa_pasien.id=pasien.bahasa_pasien');
        $builder->join('cacat_fisik', 'cacat_fisik.id=pasien.cacat_fisik');
        $builder->where('reg_periksa.no_rawat', $formatted);
        return $builder->get();
    }

    function tampilKunjungan($no_rawat)
    {
        $year = substr($no_rawat, 0, 4);
        $month = substr($no_rawat, 4, 2);
        $day = substr($no_rawat, 6, 2);
        $code = substr($no_rawat, 8);

        $formatted = "{$year}/{$month}/{$day}/{$code}";

        $builder = $this->db->table('reg_periksa');
        $builder->select("reg_periksa.no_rawat,reg_periksa.tgl_registrasi,reg_periksa.jam_reg,reg_periksa.status_lanjut,reg_periksa.kd_dokter,dokter.nm_dokter,concat(reg_periksa.umurdaftar, ' ', reg_periksa.sttsumur) as umur,poliklinik.kd_poli,poliklinik.nm_poli,penjab.png_jawab,reg_periksa.no_rawat");
        $builder->join('dokter', 'dokter.kd_dokter=reg_periksa.kd_dokter', 'inner');
        $builder->join('poliklinik', 'poliklinik.kd_poli=reg_periksa.kd_poli', 'inner');
        $builder->join('penjab', 'penjab.kd_pj=reg_periksa.kd_pj');
        $builder->where('reg_periksa.no_rawat', $formatted);
        return $builder->get();
    }

    function tampilIdentitas($no_rkm_medis)
    {
        $builder = $this->db->table('reg_periksa');
        $builder->select('reg_periksa.no_reg,reg_periksa.no_rawat,reg_periksa.tgl_registrasi,reg_periksa.status_lanjut');
        $builder->where('reg_periksa.stts <>', 'Batal');
        $builder->where('reg_periksa.no_rkm_medis', $no_rkm_medis);
        $builder->orderBy('reg_periksa.tgl_registrasi', 'DESC');
        $builder->limit(5);

        return $builder->get();
    }
    function tampilIdentitas2($no_rkm_medis)
    {
        $builder = $this->db->table('reg_periksa');
        $builder->select('reg_periksa.no_reg,reg_periksa.no_rawat,reg_periksa.tgl_registrasi,reg_periksa.status_lanjut');
        $builder->where('reg_periksa.stts <>', 'Batal');
        $builder->where('reg_periksa.no_rkm_medis', $no_rkm_medis);
        $builder->groupBy('reg_periksa.tgl_registrasi');
        $builder->orderBy('reg_periksa.tgl_registrasi', 'DESC');
        $builder->limit(5);

        return $builder->get();
    }

    function pasienLaborat($no_rkm_medis)
    {
        $builder = $this->db->table('reg_periksa');
        $builder->select('reg_periksa.no_reg,reg_periksa.no_rawat,reg_periksa.tgl_registrasi,reg_periksa.jam_reg,reg_periksa.hubunganpj,reg_periksa.biaya_reg,reg_periksa.status_lanjut,penjab.png_jawab,reg_periksa.umurdaftar,reg_periksa.sttsumur,reg_periksa.p_jawab,dokter.nm_dokter,poliklinik.nm_poli,reg_periksa.almt_pj');
        $builder->join('dokter', 'reg_periksa.kd_dokter=dokter.kd_dokter', 'inner');
        $builder->join('poliklinik', 'reg_periksa.kd_poli=poliklinik.kd_poli', 'inner');
        $builder->join('penjab', 'reg_periksa.kd_pj=penjab.kd_pj');
        $builder->where('reg_periksa.stts <>', 'Batal');
        $builder->where('reg_periksa.no_rkm_medis', $no_rkm_medis);
        $builder->orderBy('reg_periksa.tgl_registrasi', 'DESC');
        $builder->limit(5);
        return $builder->get();
    }
}
