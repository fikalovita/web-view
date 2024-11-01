<?php

namespace App\Models;

use CodeIgniter\Model;

class TampilLaboratModel extends Model
{
    public function pasienLaboratRanap($no_rawat)
    {
        $builder = $this->db->table('dpjp_ranap')->select('dokter.nm_dokter')->join('dokter', 'dpjp_ranap.kd_dokter=dokter.kd_dokter')->where('dpjp_ranap.no_rawat', $no_rawat);
        return $builder->get()->getResult();
    }

    public function getTglJamLaborat($no_rawat)
    {
        $builder = $this->db->query("select periksa_lab.tgl_periksa,periksa_lab.jam from periksa_lab where periksa_lab.kategori <> 'PA' and periksa_lab.no_rawat='" . $no_rawat . " ' group by concat(periksa_lab.no_rawat,periksa_lab.tgl_periksa,periksa_lab.jam) order by periksa_lab.tgl_periksa,periksa_lab.jam ");
        return $builder->getResult();
    }

    public function penguranganBiaya($no_rawat)
    {
        $builder = $this->db->query('select nama_pengurangan, (-1*besar_pengurangan) as jml_pengurangan from pengurangan_biaya where no_rawat="' . $no_rawat . '" order by nama_pengurangan ');
        return $builder->getResult();
    }
    function getItemLaborat($no_rawat, $tgl_periksa, $jam)
    {
        $builder = $this->db->query("select periksa_lab.tgl_periksa, periksa_lab.kd_jenis_prw,jns_perawatan_lab.nm_perawatan,petugas.nama,periksa_lab.biaya,periksa_lab.dokter_perujuk, dokter.nm_dokter from periksa_lab inner join jns_perawatan_lab on periksa_lab.kd_jenis_prw=jns_perawatan_lab.kd_jenis_prw inner join petugas on periksa_lab.nip=petugas.nip inner join dokter on periksa_lab.kd_dokter=dokter.kd_dokter where periksa_lab.kategori <> 'PA' and periksa_lab.no_rawat='" . $no_rawat . "' and periksa_lab.tgl_periksa='" . $tgl_periksa . "' and periksa_lab.jam='" . $jam . "' and tgl_periksa in (select tgl_periksa from periksa_lab group by periksa_lab.tgl_periksa)  ");
        return $builder->getResult();
    }
    public function detailPemeriksaanLaborat($no_rawat, $kd_jenis_prw, $tgl_periksa, $jam)
    {
        $builder = $this->db->query('select template_laboratorium.pemeriksaan,detail_periksa_lab.nilai,template_laboratorium.satuan,detail_periksa_lab.keterangan,detail_periksa_lab.nilai_rujukan,detail_periksa_lab.biaya_item
        from detail_periksa_lab inner join template_laboratorium on detail_periksa_lab.id_template=template_laboratorium.id_template where detail_periksa_lab.no_rawat = "' . $no_rawat . '"
        and detail_periksa_lab.kd_jenis_prw="' . $kd_jenis_prw . '" and detail_periksa_lab.tgl_periksa="' . $tgl_periksa . '" and detail_periksa_lab.jam="' . $jam . '" order by detail_periksa_lab.kd_jenis_prw,template_laboratorium.urut');
        return $builder->getResult();
    }
}
