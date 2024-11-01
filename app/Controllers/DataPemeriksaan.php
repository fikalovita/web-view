<?php

namespace App\Controllers;

use App\Models\DataPasienModel;
use App\Models\TampilDiagnosaModel;
use App\Models\TampilKunjunganModel;
use App\Models\TampilLaboratModel;
use App\Models\TampilSoapieModel;
use App\Models\TampilSbarModel;
use App\Models\TampilRadiologiModel;

class DataPemeriksaan extends BaseController
{
    public function tampilKunjungan($no_rawat)
    {
        $request = service('request');
        $DataPasienModel = new DataPasienModel();
        $tampilKunjunganModel = new TampilKunjunganModel();
        $tglAwal = $request->getPost('tgl_awal');
        $tglAkhir = $request->getPost('tgl_akhir');
        $riwayat_terakhir = $request->getPost('riwayat_terakhir');
        $riwayat = $DataPasienModel->riwayatPasien($no_rawat)->getResult();
        $no_rkm_medis = $riwayat[0]->no_rkm_medis;

        $riwayat_kunjungan = $tampilKunjunganModel->tampilKunjungan($no_rkm_medis, $tglAwal, $tglAkhir, $riwayat_terakhir)->getResult();
        $rujukanInternal = [];
        for ($i = 0; $i < count($riwayat_kunjungan); $i++) {
            $rujukanInternal[] = $riwayat_kunjungan[$i];
        }
        $getRujukanInternal = $tampilKunjunganModel->getRujukanInternal($rujukanInternal);
        $getKamarInap = $tampilKunjunganModel->getKamarInap($riwayat_kunjungan);
        $no = 1;
        $data = [];
        foreach ($riwayat_kunjungan as  $rk) {
            $row = [];
            if (!empty($riwayat_kunjungan || !empty($getRujukanInternal))) {
                $row[] = $no++;
                $row[] = $rk->no_rawat;
                $row[] = $rk->tgl_registrasi;
                $row[] = $rk->jam_reg;
                $row[] = $rk->nm_dokter;
                $row[] = $rk->nm_poli;
                $row[] = $rk->umur;
                $row[] = $rk->png_jawab;

                foreach ($getRujukanInternal as $internalPoli) {
                    $row[] = $rk->no_rawat;
                    $row[] = $rk->tgl_registrasi;
                    $row[] = $internalPoli->kd_dokter;
                    $row[] = $internalPoli->nm_dokter;
                    $row[] = $rk->umur;
                    $row[] = $internalPoli->kd_poli;
                    $row[] = $internalPoli->nm_poli;
                    $row[] = $internalPoli->png_jawab;
                }
            }
            $kddpjp = "";
            $dpjp = "";
            if ($rk->status_lanjut == "Ranap") {
                $kddpjp = $tampilKunjunganModel->getDokterRanap($rk->no_rawat);

                if ($kddpjp == "") {

                    $dpjp = $tampilKunjunganModel->getKodeDPJP($kddpjp);
                    $dpjp = $dpjp[0]->nm_dokter;
                } else {
                    $kddpjp = $rk->kd_dokter;
                    $dpjp = $rk->nm_dokter;
                }
            }

            foreach ($getKamarInap as $ranap) {
                $row[] = $rk->no_rawat;
                $row[] = $ranap->tgl_masuk;
                $row[] = $ranap->jam_masuk;
                $row[] = $dpjp;
                $row[] = $ranap->kd_kamar . ' ' . $ranap->nm_bangsal;
                $row[] = $rk->umur;
                $row[] = $rk->png_jawab;
            }

            $data[] = $row;
        }
        $data = ['data' => $data];
        return $this->response->setJSON($data);
    }

    public function tampilSoapie($no_rawat)
    {
        $request = service('request');
        $DataPasienModel = new DataPasienModel();
        $tampilSoapieModel = new TampilSoapieModel();
        $riwayat = $DataPasienModel->riwayatPasien($no_rawat)->getResult();
        $no_rkm_medis = $riwayat[0]->no_rkm_medis;
        $tglAwal = $request->getPost('tgl_awal');
        $tglAkhir = $request->getPost('tgl_akhir');
        $tampilIdentitas = $DataPasienModel->tampilIdentitas($no_rkm_medis, $tglAwal, $tglAkhir)->getResult();
        $data = [];
        foreach ($tampilIdentitas as $px) {
            $soapie_ralan = $tampilSoapieModel->pemeriksaanRawatJalan($px->no_rawat);
            $soapie_ranap = $tampilSoapieModel->pemeriksaanRawatInap($px->no_rawat);
            $row = [];
            $row[] = $px->tgl_registrasi;
            $row[] = $px->no_rawat;
            $row[] = $px->status_lanjut;
            if ((!empty($soapie_ralan)) || (!empty($soapie_ranap))) {
                $soap = '<table class="table table-bordered table-responsive-lg table-sm">
                        <thead class="table-info">
                            <tr>
                                <th scope="col-3" class="text-center">Tanggal</th>
                                <th class="text-center">Dokter/Paramedis</th>
                                <th class="text-center">Subjek</th>
                                <th class="text-center">Objek</th>
                                <th class="text-center">Asesmen</th>
                                <th class="text-center">Plan</th>
                                <th class="text-center">Instruksi</th>
                                <th class="text-center">Evaluasi</th>
                            </tr>
                        </thead>
                        <tbody>';
                if ($px->status_lanjut == 'Ralan') {
                    foreach ($soapie_ralan as $x) {
                        $alergi = ($x->alergi != "") ? '<br>Alergi :' . $x->alergi : "";
                        $suhu_tubuh = ($x->suhu_tubuh != "") ? '<br>Suhu(C) :' . $x->suhu_tubuh : "";
                        $tensi = ($x->tensi != "") ? '<br>Tensi :' . $x->tensi : "";
                        $nadi = ($x->nadi != "") ? '<br>Nadi :' . $x->nadi : "";
                        $tinggi = ($x->tinggi != "") ? '<br>Tinggi(Cm) :' . $x->tinggi : "";
                        $berat = ($x->berat != "") ? '<br>Berat(Kg) :' . $x->berat : "";
                        $gcs = ($x->gcs != "") ? '<br>GCS(E,V,M) :' . $x->gcs : "";
                        $spo2 = ($x->spo2 != "") ? '<br>SpO2(%) :' . $x->spo2 : "";
                        $kesadaran = ($x->kesadaran != "") ? '<br>Kesadaran :' . $x->kesadaran  : "";
                        $lingkar_perut = ($x->lingkar_perut != "") ? '<br>Lingkar Perut :' : "";
                        $soap .= '<tr>
                                <td class="text-nowrap text-center">' . $x->tgl_perawatan . '<br>' . $x->jam_rawat . '</td>
                                <td class="text-center text-nowrap">' . $x->nip . '<br>' . $x->nama . '</td>
                                <td>' . $x->keluhan . '</td>
                                <td class="text-nowrap">
                                    ' . $x->pemeriksaan . '
                                    ' . $alergi . '
                                    ' . $suhu_tubuh . '
                                    ' . $tensi . '
                                    ' . $nadi . '
                                    ' . $tinggi . '
                                    ' . $berat . '
                                    ' . $lingkar_perut . '
                                    ' . $spo2 . '
                                    ' . $gcs . '
                                    ' . $kesadaran . '
                                </td>
                                <td>' . $x->penilaian . '</td>
                                <td>' . $x->rtl . '</td>
                                <td>' . $x->instruksi . '</td>
                                <td>' . $x->evaluasi . '</td>
                            </tr>';
                    }
                } elseif ($px->status_lanjut == 'Ranap') {
                    foreach ($soapie_ranap as $pi) {
                        $alergi = ($pi->alergi != "") ? '<br>Alergi :' . $pi->alergi : "";
                        $suhu_tubuh = ($pi->suhu_tubuh != "") ? '<br>Suhu(C) :' . $pi->suhu_tubuh : "";
                        $tensi = ($pi->tensi != "") ? '<br>Tensi :' . $pi->tensi : "";
                        $nadi = ($pi->nadi != "") ? '<br>Nadi :' . $pi->nadi : "";
                        $tinggi = ($pi->tinggi != "") ? '<br>Tinggi(Cm) :' . $pi->tinggi : "";
                        $berat = ($pi->berat != "") ? '<br>Berat(Kg) :' . $pi->berat : "";
                        $gcs = ($pi->gcs != "") ? '<br>GCS(E,V,M) :' . $pi->gcs : "";
                        $spo2 = ($pi->spo2 != "") ? '<br>SpO2(%) :' . $pi->spo2 : "";
                        $kesadaran = ($pi->kesadaran != "") ? '<br>Kesadaran :' . $pi->kesadaran  : "";
                        // $lingkar_perut = ($pi->lingkar_perut != "") ? '<br>Lingkar Perut :' : "";
                        $soap .= '<tr>
                        <td scope="row" class="text-center text-nowrap">' . $pi->tgl_perawatan . '<br>' . $pi->jam_rawat . '</td>
                        <td class="text-center text-nowrap">' . $pi->nip . '<br>' . $pi->nama . '</td>
                        <td>' . $pi->keluhan . '</td>
                        <td>
                        ' . $pi->pemeriksaan . '
                         ' . $alergi . '
                            ' . $suhu_tubuh . '
                            ' . $tensi . '
                            ' . $nadi . '
                            ' . $tinggi . '
                            ' . $berat . '
                            ' . $spo2 . '
                            ' . $gcs . '
                            ' . $kesadaran . '
                        </td>
                        <td>' . $pi->penilaian . '</td>
                        <td>' . $pi->rtl . '</td>
                        <td>' . $pi->instruksi . '</td>
                        <td>' . $pi->evaluasi . '</td>
                    </tr>';
                    }
                }
                $soap .= '</tbody>
                      </table>';

                $row[] = $soap;
            } else {
                $row[] = [];
            }



            $data[] = $row;
        }

        $data = ['data' => $data];
        return $this->response->setJSON($data);
    }

    public function tampilSbar($no_rawat)
    {
        $request = service('request');
        $DataPasienModel = new DataPasienModel();
        $tampilSbarModel = new TampilSbarModel();
        $riwayat = $DataPasienModel->riwayatPasien($no_rawat)->getResult();
        $no_rkm_medis = $riwayat[0]->no_rkm_medis;
        $tglAwal = $request->getPost('tgl_awal');
        $tglAkhir = $request->getPost('tgl_akhir');
        $tampilIdentitas = $DataPasienModel->tampilIdentitas($no_rkm_medis, $tglAwal, $tglAkhir)->getResult();
        $data = [];
        foreach ($tampilIdentitas as $px) {
            $sbar_ralan = $tampilSbarModel->tampilSbarRalan($px->no_rawat);
            $sbar_ranap = $tampilSbarModel->tampilSbarRanap($px->no_rawat);
            $row = [];
            $row = [
                $px->tgl_registrasi,
                $px->no_rawat,
                $px->status_lanjut,
            ];
            if (!empty($sbar_ralan) || !empty($sbar_ranap)) {
                $sbar = '<table class="table table-bordered table-responsive table-sm">
                    <thead class="table-info">
                        <tr>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Dokter/Paramedis</th>
                            <th class="text-center">Situation</th>
                            <th class="text-center">Background</th>
                            <th class="text-center">Asesment</th>
                            <th class="text-center">Recomendation</th>
                            <th class="text-center">Instruksi</th>
                        </tr>
                    </thead>
                    <tbody>';

                if ($px->status_lanjut == 'Ranap') {
                    foreach ($sbar_ranap as $sr) {
                        $sbar .= '<tr>
                            <td class="text-nowrap text-center">' . $sr->tgl_perawatan . '<br>' . $sr->jam_rawat . '</td>
                            <td class="text-center text-nowrap">' . $sr->nip . '<br>' . $sr->nama . '</td>
                            <td>' . $sr->keluhan . '</td>
                            <td>' . $sr->pemeriksaan . '</td>
                            <td>' . $sr->penilaian . '</td>
                            <td>' . $sr->rtl . '</td>
                            <td>' . $sr->instruksi . '</td>
                        </tr>   
                    ';
                    } //akhir foreach sbar_ranap
                } elseif ($px->status_lanjut == 'Ralan') {
                    foreach ($sbar_ralan as $sl) {
                        $sbar .= '<tr>
                        <td class="text-nowrap text-center">' . $sl->tgl_perawatan . '<br>' . $sl->jam_rawat . '</td>
                        <td class="text-center text-nowrap">' . $sl->nip . '<br>' . $sl->nama . '</td>
                        <td>' . $sl->keluhan . '</td>
                        <td>' . $sl->pemeriksaan . '</td>
                        <td>' . $sl->penilaian . '</td>
                        <td>' . $sl->rtl . '</td>
                        <td>' . $sl->instruksi . '</td>
                    </tr>';
                    } //akhir foreach sbar ralan
                } //akhir elseif
                $sbar .= '</tbody>
                        </table>';
                $row[] = $sbar;
            } else {
                $row[] = [];
            }

            $data[] = $row;
        }
        $datajson = ['data' => $data];
        return $this->response->setJSON($datajson);
    }

    public function tampilDiagnosa($no_rawat)
    {
        $request = service('request');
        $dataPasienModel = new DataPasienModel();
        $tampilDignosaModel = new TampilDiagnosaModel();
        $riwayat = $dataPasienModel->riwayatPasien($no_rawat)->getResult();
        $no_rkm_medis = $riwayat[0]->no_rkm_medis;
        $tglAwal = $request->getPost('tgl_awal');
        $tglAkhir = $request->getPost('tgl_akhir');
        $tampilIdentitas = $dataPasienModel->tampilIdentitas($no_rkm_medis, $tglAwal, $tglAkhir)->getResult();
        // dd($tampilIdentitas);
        $data = [];
        foreach ($tampilIdentitas as $px) {
            $row = [];
            $row = [
                $px->tgl_registrasi,
                $px->no_rawat

            ];
            $tampilDiagnosa = $tampilDignosaModel->tampilDiagnosaPasien($px->no_rawat);
            $diagnosa = '<table class="table table-bordered table-responsive-lg table-sm">
                            <thead class="table-info">
                                <tr>
                                    <th scope="col">Kode Penyakit</th>
                                    <th scope="col">Nama Penyakit</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>';
            if (!empty($tampilDiagnosa)) {
                foreach ($tampilDiagnosa as $dx) {
                    $diagnosa .= '<tr>
                        <td scope="col">' . $dx->kd_penyakit . '</td>
                        <td scope="col">' . $dx->nm_penyakit . '</td>
                        <td scope="col">' . $dx->status . '</td>
                    </tr>';
                }
                $row[] = $diagnosa;
            } else {
                $row[] = [];
            }
            $diagnosa .= '</tbody>
                        </table>';
            $data[] = $row;
        }

        $datajson = ['data' => $data];
        return $this->response->setJSON($datajson);
    }
    public function tampilLaborat($no_rawat)
    {
        $request = service('request');
        $dataPasienModel = new DataPasienModel();
        $tampilLaboratModel = new TampilLaboratModel();
        $riwayat = $dataPasienModel->riwayatPasien($no_rawat)->getResult();
        $no_rkm_medis = $riwayat[0]->no_rkm_medis;
        $tglAwal = $request->getPost('tgl_awal');
        $tglAkhir = $request->getPost('tgl_akhir');
        $pasienLaborat = $dataPasienModel->pasienLaborat($no_rkm_medis, $tglAwal, $tglAkhir)->getResult();
        $data = [];
        $nmr = 1;
        foreach ($pasienLaborat as $lab) {
            $pasienLaboratRanap = $tampilLaboratModel->pasienLaboratRanap($lab->no_rawat);
            $getTglJamLaborat = $tampilLaboratModel->getTglJamLaborat($lab->no_rawat);
            $row = [];
            $row[] = $nmr++;
            $laborat = '<table class="table table-responsive-md table-sm">
                        <tbody>
                        <tr>
                            <td>No.Rawat</td>
                            <td class="text-center">:</td>
                            <td>' . $lab->no_rawat . '</td>
                        </tr>
                        <tr>
                            <td>No.Registrasi</td>
                            <td class="text-center">:</td>
                            <td>' . $lab->no_reg . '</td>
                        </tr>
                        <tr>
                            <td>Tgl.Registrasi</td>
                            <td class="text-center">:</td>
                            <td>' . $lab->tgl_registrasi . '</td>
                        </tr>
                        <tr>
                            <td>Umur Saat Daftar</td>
                            <td class="text-center">:</td>
                            <td>' . $lab->umurdaftar . ' ' . $lab->sttsumur . '</td>
                        </tr>
                        <tr>
                            <td>Unit/Poliklinik</td>
                            <td class="text-center">:</td>
                            <td>' . $lab->nm_poli . '</td>
                        </tr>
                        <tr>
                            <td>Dokter Poli</td>
                            <td class="text-center">:</td>
                            <td>' . $lab->nm_dokter . '</td>
                        </tr>';
            if ($lab->status_lanjut == 'Ranap') {
                $no = 1;
                foreach ($pasienLaboratRanap as $p) {
                    $laborat .= '<tr>
                                <td>DPJP Ranap</td>
                                <td class="text-center">:</td>
                                <td>' . $no++ . '. ' . $p->nm_dokter . '</td>
                            </tr>';
                }
            }
            $laborat .= '<tr>
                            <td>Cara Bayar</td>
                            <td class="text-center">:</td>
                            <td>' . $lab->png_jawab . '</td>
                        </tr>
                        <tr>
                            <td>Penanggung Jawab</td>
                            <td class="text-center">:</td>
                            <td>' . $lab->p_jawab . '</td>
                        </tr>
                        <tr>
                            <td>Alamat P.J</td>
                            <td class="text-center">:</td>
                            <td>' . $lab->almt_pj . '</td>
                        </tr>
                        <tr>
                            <td>Hubungan P.J</td>
                            <td class="text-center">:</td>
                            <td>' . $lab->hubunganpj . '</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td class="text-center">:</td>
                            <td>' . $lab->status_lanjut . '</td>
                        </tr>';
            $laborat .= '<tr>
                            <td>Biaya & Perawatan</td>
                            <td class="text-center">:</td>
                            <td>
                            <table class="table table-responsive-lg table-sm">
                                <tr>
                                    <td>Administrasi</td>
                                    <td class="text-center">:</td>
                                    <td class="text-right">' . number_format($lab->biaya_reg, 0, ',', '.') . '</td>
                                </tr>
                            </table>';
            if (!empty($getTglJamLaborat)) {
                $laborat .= '<table class="table table-responsive-lg table-sm">
                            <tr>
                                <td colspan="7"><b>Pemeriksaan Laboratorium PK & MB</b></td>
                            </tr>
                            <tr class="table-info">
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Kode</th>
                                <th class="text-center">Nama Pemeriksaan</th>
                                <th class="text-center">Dokter PJ</th>
                                <th class="text-center">Petugas</th>
                                 <th class="text-center">Biaya</th>
                            </tr>';

                foreach ($getTglJamLaborat as $a) {
                    $getItemLaborat = $tampilLaboratModel->getItemLaborat($lab->no_rawat, $a->tgl_periksa, $a->jam);
                    $no = 1;
                    $laborat .= '<tr><td colspan="6">' . $a->tgl_periksa . ' ' . $a->jam . '</td></tr>';
                    foreach ($getItemLaborat as $item) {
                        $laborat .= '<tr>
                        <td></td>
                        <td>' . $item->kd_jenis_prw . '</td>
                        <td>' . $item->nm_perawatan . '</td>
                        <td>' . $item->nm_dokter . '</td>
                        <td>' . $item->nama . '</td>
                        <td class="text-right">' . number_format($item->biaya, 0, ',') . '</td>
                        </tr>';
                        $detailPemeriksaanLaborat = $tampilLaboratModel->detailPemeriksaanLaborat($lab->no_rawat, $item->kd_jenis_prw, $a->tgl_periksa, $a->jam);
                        $laborat .= '<tr class="text-center table-info">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <th>Detail Pemeriksaan</th>
                                        <th>Hasil</th>
                                        <th>Nilai</th>
                                    </tr>';
                        foreach ($detailPemeriksaanLaborat as $hasil) {
                            $laborat .= '<tr>
                                            <td></td>
                                            <td></td>
                                            <td>' . $hasil->pemeriksaan . '</td>
                                            <td>' . $hasil->nilai . ' ' . $hasil->satuan . '</td>
                                            <td>' . $hasil->nilai_rujukan . ' ' . $hasil->satuan .  '</td>
                                            <td class="text-right">' . number_format($hasil->biaya_item, 0, ',') . '</td>
                                        </tr>';
                        }
                    }
                }
                $laborat .= '</table>';
            } else {
                $laborat .=  null;
            }
            $penguranganBiaya = $tampilLaboratModel->penguranganBiaya($lab->no_rawat);
            $no = 1;
            if (!empty($penguranganBiaya)) {
                $laborat .= '<table class="table table-responsive-lg">
                                <tr class=" table-info">
                                    <td class="text-center">No</td>
                                    <td class="text-center">Nama Potongan</td>
                                    <td class="text-center">Biaya</td>
                                </tr>';
                foreach ($penguranganBiaya as $diskon) {
                    $laborat .= '<tr>
                        <td class="text-center">' . $no++ . '</td>
                        <td>' . $diskon->nama_pengurangan . '</td>
                        <td class="text-right"> ' . number_format($diskon->jml_pengurangan, 0, ',') . '</td>
                    </tr>
                    <tr>
                        <th colspan="2" class="text-center">Total Biaya</th>
                        <th class="text-right"></th>
                    </tr>';
                }
                $laborat .= '</table>';
            }
            $laborat .= '</body>
                        </table>';
            $row[] = $laborat;
            $data[] = $row;
        }

        $datajson = ['data' => $data];
        return $this->response->setJSON($datajson);
    }

    public function tampilRadiologi($no_rawat)
    {
        $request = service('request');
        $dataPasienModel = new DataPasienModel();
        $tampilRadiologiModel = new TampilRadiologiModel();
        $riwayat = $dataPasienModel->riwayatPasien($no_rawat)->getResult();
        $no_rkm_medis = $riwayat[0]->no_rkm_medis;
        $pemeriksaanRadiologi = $tampilRadiologiModel->pemeriksaanRadiologi($no_rawat);
        $tglAwal = $request->getPost('tgl_awal');
        $tglAkhir = $request->getPost('tgl_akhir');
        $pasienRadiologi = $dataPasienModel->pasienLaborat($no_rkm_medis, $tglAwal, $tglAkhir)->getResult();
        // dd($pasienRadiologi);

        $nmr = 1;
        $data = [];

        foreach ($pasienRadiologi as $pr) {
            $dokterDPJP = $tampilRadiologiModel->getDokterRanap($pr->no_rawat);
            $hasilBacaan = $tampilRadiologiModel->tampilBacaanRadiologi($pr->no_rawat);
            $gambarRadiologi = $tampilRadiologiModel->tampilGambarRadiologi($pr->no_rawat);
            $row = [];
            $row[] = $nmr++;
            $rad = '<table class="table table-resposive-lg table-sm table-bordered">
                        <tbody>
                            <tr>
                                <td>No.Registrasi</td>
                                <td class="text-center">:</td>
                                <td>' . $pr->no_reg . '</td>
                            </tr>
                            <tr>
                                <td>Tgl.Registrasi</td>
                                <td class="text-center">:</td>
                                <td>' . $pr->tgl_registrasi . '</td>
                            </tr>
                            <tr>
                                <td>Umur Saat Daftar</td>
                                <td class="text-center">:</td>
                                <td>' . $pr->umurdaftar . ' ' .  $pr->sttsumur . '</td>
                            </tr>
                            <tr>
                                <td>Unit/Poliklinik</td>
                                <td class="text-center">:</td>
                                <td>' . $pr->nm_poli . '</td>
                            </tr>
                            <tr>
                                <td>Dokter Poli</td>
                                <td class="text-center">:</td>
                                <td>' . $pr->nm_dokter . '</td>
                            </tr>';
            if ($pr->status_lanjut == 'Ranap') {
                $no = 1;
                foreach ($dokterDPJP as $dpjp) {
                    $rad .= '<tr>
                                <td>DPJP Ranap</td>
                                <td class="text-center">:</td>
                                <td>' . $no++ . '. ' . $dpjp->nm_dokter . '</td>
                            </tr>';
                }
            }

            $rad .= '<tr>
                        <td>Cara Bayar</td>
                        <td class="text-center">:</td>
                        <td>' . $pr->png_jawab . '</td>
                    </tr>
                    <tr>
                        <td>Penanggung Jawab</td>
                        <td class="text-center">:</td>
                        <td>' . $pr->p_jawab . '</td>
                    </tr>
                    <tr>
                        <td>Alamat P.J</td>
                        <td class="text-center">:</td>
                        <td>' . $pr->almt_pj . '</td>
                    </tr>
                    <tr>
                        <td>Hubungan P.J</td>
                        <td class="text-center">:</td>
                        <td>' . $pr->hubunganpj . '</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td class="text-center">:</td>
                        <td>' . $pr->status_lanjut . '</td>
                    </tr>';
            $rad .= '<tr>
                        <td>Biaya Perawatan</td>
                        <td class="text-center">:</td>
                        <td>
                            <table class="table table-responsive-lg table-sm">
                                <tr>
                                    <td>Administrasi</td>
                                    <td class="text-center">:</td>
                                    <td class="text-right">' . number_format($pr->biaya_reg, 0, ',', '.') . '</td>
                                </tr>
                            </table>';
            if (!empty($pemeriksaanRadiologi)) {
                $rad .= '<div>
                            <p><b>Pemeriksaan Radiologi</b></p>
                        </div>
                            <table class="table table-bordered table-responsive-lg table-sm">
                                <thead>
                                    <tr class="text-center">
                                        <td>No.</td>
                                        <td>Tanggal</td>
                                        <td>Kode</td>
                                        <td>Nama Pemeriksaan</td>
                                        <td>Dokter PJ</td>
                                        <td>Petugas</td>
                                        <td>Biaya</td>
                                    </tr>
                                </thead>
                                <tbody>';
                foreach ($pemeriksaanRadiologi as $periksaRadiologi) {
                    $rad .= '<tr>
                                <td></td>
                                <td>' . $periksaRadiologi->tgl_periksa . '</td>
                                <td>' . $periksaRadiologi->kd_jenis_prw . '</td>
                                <td>' . $periksaRadiologi->nm_perawatan . '</td>
                                <td>' . $periksaRadiologi->nm_dokter . '</td>
                                <td>' . $periksaRadiologi->nama . '</td>
                                <td>' . $periksaRadiologi->biaya . '</td>
                             </tr>';
                }
                $rad .= ' </tbody>
                          </table>';
            } else {
                $rad .= null;
            }

            if (!empty($hasilBacaan)) {
                $rad .= '<div>
                            <p><b>Bacaan/Hasil Radiologi</b></p>
                        </div>
                        <table class="table table-responsive-lg table-sm">
                        <thead>
                            <tr class="text-center">
                                <td>No</td>
                                <td>Tanggal</td>
                                <td>Hasil Pemeriksaan</td>
                            </tr>
                        </thead>
                        <tbody>';
                foreach ($hasilBacaan as $bacaanRad) {
                    $rad .= '<tr>
                                <td></td>
                                <td class="text-nowrap">' . $bacaanRad->tgl_periksa . ' ' . $bacaanRad->jam . '</td>
                                <td>' . $bacaanRad->hasil . '</td>
                            </tr>';
                }
                $rad .= '</tbody>
                        </table>';
            } else {
                $rad .= null;
            }
            if (!empty($gambarRadiologi)) {
                $rad .= '<div>
                            <p><b>Gambar Hasil Radiologi</b></p>
                        </div>
                        <table class="table table-responsive-lg table-sm">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Tanggal</td>
                                    <td>Gambar Radiologi</td>
                                </tr>
                            </thead>
                            <tbody>';
                foreach ($gambarRadiologi as $gb) {
                    $rad .= '<tr>
                                <td></td>
                                <td>' . $gb->tgl_periksa . ' ' . $gb->jam . '</td>
                                <td><img src="http://192.168.1.45/webapps/radiologi/' . $gb->lokasi_gambar . '" alt="gambar radiologi" loading="lazy" width="30%"></td>
                            </tr>';
                }
                $rad .= '</tbody>
                         </table>';
            } else {
                $rad .= null;
            }
            $rad .= '</td>
                    </tr>
                    </tbody>
                    </table>
                    </td>
                    </tr>';
            $row[] = $rad;
            $data[] = $row;
        }
        $datajson = ['data' => $data];
        return $this->response->setJSON($datajson);
    }
}
