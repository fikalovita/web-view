<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<?php
$db = \Config\Database::connect() ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="#" method="post">
                            <fieldset disabled>
                                <div class="row">
                                    <?php foreach ($riwayat_ranap as $key => $value) : ?>
                                        <table class="table table-borderless table-responsive-md">
                                            <tbody>
                                                <tr>
                                                    <td>No.RM</td>
                                                    <td>:</td>
                                                    <td><?= $value->no_rkm_medis ?></td>
                                                    <td>Nama Pasien</td>
                                                    <td>:</td>
                                                    <td><?= $value->nm_pasien ?></td>
                                                    <td>J.K</td>
                                                    <td>:</td>
                                                    <td><?= $value->jk ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td>:</td>
                                                    <td><?= $value->alamatpj ?></td>
                                                    <td>G.D</td>
                                                    <td>:</td>
                                                    <td>GD</td>
                                                    <td>Nama Ibu Kandung</td>
                                                    <td>:</td>
                                                    <td><?= $value->nm_ibu ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Agama</td>
                                                    <td>:</td>
                                                    <td><?= $value->agama ?></td>
                                                    <td>stts.Nikah</td>
                                                    <td>:</td>
                                                    <td><?= $value->stts_nikah ?></td>
                                                    <td>Pendidikan</td>
                                                    <td>:</td>
                                                    <td><?= $value->pnd ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tempat & Tgl.Lahir</td>
                                                    <td>:</td>
                                                    <td><?= $value->tmp_tgl_lahir ?></td>
                                                    <td>Cacat Fisik</td>
                                                    <td>:</td>
                                                    <td><?= $value->nama_cacat ?></td>
                                                    <td>Bahasa</td>
                                                    <td>:</td>
                                                    <td><?= $value->nama_bahasa ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    <?php endforeach; ?>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a href="#kunjungan" class="btn nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-kunjungan" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Riwayat Kunjungan</a>
                        <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-soap" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Riwayat S.O.A.P.I.E</button>
                        <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-sbar" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Riwayat S.B.A.R</button>
                        <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-diagnosa" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Riwayat Diagnosa</button>
                        <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-lab" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Riwayat Laborat</button>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <!-- Riwayat Kunjungan -->
                    <div class="tab-pane fade show active" id="nav-kunjungan" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered table-responsive-lg table-sm" id="table-kunjungan">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">No.Rawat</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Jam</th>
                                            <th scope="col">Dokter Dituju/DPJP</th>
                                            <th scope="col">Umur</th>
                                            <th scope="col">Jenis Bayar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($riwayat_kunjungan as $rk): ?>
                                            <tr>
                                                <td>1</td>
                                                <td><?= $rk->no_rawat ?></td>
                                                <td><?= $rk->jam_reg ?></td>
                                                <td><?= $rk->tgl_registrasi ?></td>
                                                <td><?= $rk->nm_dokter ?></td>
                                                <td><?= $rk->umur  ?></td>
                                                <td><?= $rk->tgl_registrasi ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Riwayat Kunjungan -->
                    <!-- Riwayat SOAPIE -->
                    <div class="tab-pane fade" id="nav-soap" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered table-responsive-lg table-sm">
                                    <thead class="bg-info">
                                        <tr>
                                            <th scope="col" class="text-center">Tgl.Reg</th>
                                            <th scope="col" class="text-center">No.Rawat</th>
                                            <th scope="col" class="text-center">Status</th>
                                            <th scope="col" class="text-center">S.O.A.P.I.E</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($px2 = 0; $px2 < count($tampilIdentitas); $px2++) : ?>
                                            <tr>
                                                <td scope="row" class="text-nowrap"><?= $tampilIdentitas[$px2]->tgl_registrasi ?></td>
                                                <td><?= $tampilIdentitas[$px2]->no_rawat ?></td>
                                                <td><?= $tampilIdentitas[$px2]->status_lanjut ?></td>
                                                <td>
                                                    <?php
                                                    //Query SOAPIE pemeriksaan rawat jalan
                                                    $builder = $db->table('pemeriksaan_ralan')
                                                        ->select('pemeriksaan_ralan.tgl_perawatan,pemeriksaan_ralan.jam_rawat,pemeriksaan_ralan.suhu_tubuh,pemeriksaan_ralan.tensi,pemeriksaan_ralan.nadi,pemeriksaan_ralan.respirasi,pemeriksaan_ralan.tinggi,pemeriksaan_ralan.berat,pemeriksaan_ralan.gcs,pemeriksaan_ralan.spo2,pemeriksaan_ralan.kesadaran,pemeriksaan_ralan.keluhan,pemeriksaan_ralan.pemeriksaan,pemeriksaan_ralan.alergi,pemeriksaan_ralan.lingkar_perut,pemeriksaan_ralan.rtl,pemeriksaan_ralan.penilaian,pemeriksaan_ralan.instruksi,pemeriksaan_ralan.evaluasi,pemeriksaan_ralan.nip,pegawai.jbtn,pegawai.nama')->join('pegawai', 'pegawai.nik=pemeriksaan_ralan.nip')->notLike('pemeriksaan_ralan.keluhan', '::')->notLike('pemeriksaan_ralan.penilaian', '::')->notLike('pemeriksaan_ralan.pemeriksaan', '::')->notLike('pemeriksaan_ralan.pemeriksaan', '::')->notLike('pemeriksaan_ralan.rtl', '::')->notLike('pemeriksaan_ralan.instruksi', '::')->where('pemeriksaan_ralan.no_rawat', $tampilIdentitas[$px2]->no_rawat);
                                                    $query_ralan = $builder->get()->getResult();
                                                    //End Query SOAPIE pemeriksaan rawat jalan
                                                    //Query SOAPIE pemeriksaan rawat inap
                                                    $builder = $db->table('pemeriksaan_ranap')
                                                        ->select('pemeriksaan_ranap.tgl_perawatan,pemeriksaan_ranap.jam_rawat,pemeriksaan_ranap.suhu_tubuh,pemeriksaan_ranap.tensi,pemeriksaan_ranap.nadi,pemeriksaan_ranap.respirasi,pemeriksaan_ranap.tinggi,pemeriksaan_ranap.berat,pemeriksaan_ranap.gcs,pemeriksaan_ranap.spo2,pemeriksaan_ranap.kesadaran,pemeriksaan_ranap.keluhan,pemeriksaan_ranap.pemeriksaan,pemeriksaan_ranap.alergi,pemeriksaan_ranap.rtl,pemeriksaan_ranap.penilaian,pemeriksaan_ranap.instruksi,pemeriksaan_ranap.evaluasi,pemeriksaan_ranap.nip,pegawai.jbtn,pegawai.nama')->join('pegawai', 'pegawai.nik=pemeriksaan_ranap.nip')->notLike('pemeriksaan_ranap.keluhan', '::')->notLike('pemeriksaan_ranap.penilaian', '::')->notLike('pemeriksaan_ranap.pemeriksaan', '::')->notLike('pemeriksaan_ranap.pemeriksaan', '::')->notLike('pemeriksaan_ranap.rtl', '::')->notLike('pemeriksaan_ranap.instruksi', '::')->where('pemeriksaan_ranap.no_rawat', $tampilIdentitas[$px2]->no_rawat);
                                                    $query_ranap = $builder->get()->getResult();
                                                    //End Query SOAPIE pemeriksaan rawat inap
                                                    // var_dump($query_ranap);
                                                    ?>
                                                    <?php
                                                    if (!empty($query_ralan) || !empty($query_ranap)) {
                                                        echo '<table class="table table-bordered table-responsive-lg table-sm">';
                                                        echo '<thead class="table-info">
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
                                                        </thead>';
                                                        echo '<tbody>';
                                                        //cek SOAPIE rawat inap dan rawat jalan
                                                        if ($tampilIdentitas[$px2]->status_lanjut == 'Ralan') {
                                                            //SOAPIE rawat jalan
                                                            foreach ($query_ralan as $pr) {
                                                                $alergi = ($pr->alergi != "") ? '<br>Alergi :' . $pr->alergi : "";
                                                                $suhu_tubuh = ($pr->suhu_tubuh != "") ? '<br>Suhu(C) :' . $pr->suhu_tubuh : "";
                                                                $tensi = ($pr->tensi != "") ? '<br>Tensi :' . $pr->tensi : "";
                                                                $nadi = ($pr->nadi != "") ? '<br>Nadi :' . $pr->nadi : "";
                                                                $tinggi = ($pr->tinggi != "") ? '<br>Tinggi(Cm) :' . $pr->tinggi : "";
                                                                $berat = ($pr->berat != "") ? '<br>Berat(Kg) :' . $pr->berat : "";
                                                                $gcs = ($pr->gcs != "") ? '<br>GCS(E,V,M) :' . $pr->gcs : "";
                                                                $spo2 = ($pr->spo2 != "") ? '<br>SpO2(%) :' . $pr->spo2 : "";
                                                                $kesadaran = ($pr->kesadaran != "") ? '<br>Kesadaran :' . $pr->kesadaran  : "";
                                                                $lingkar_perut = ($pr->lingkar_perut != "") ? '<br>Lingkar Perut :' : "";

                                                                echo '<tr>
                                                                <td scope="row" class="text-center text-nowrap">' . $pr->tgl_perawatan . '<br>' . $pr->jam_rawat . '</td>
                                                                <td class="text-center text-nowrap">' . $pr->nip . '<br>' . $pr->nama . '</td>
                                                                <td>' . $pr->keluhan . '</td>
                                                                <td class="text-nowrap">
                                                                ' . $pr->pemeriksaan . '
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
                                                                <td>' . $pr->penilaian . '</td>
                                                                <td>' . $pr->rtl . '</td>
                                                                <td>' . $pr->instruksi . '</td>
                                                                <td>' . $pr->evaluasi . '</td>
                                                            </tr>';
                                                            }
                                                        } elseif ($tampilIdentitas[$px2]->status_lanjut == 'Ranap') {
                                                            //SOAPIE rawat inap
                                                            foreach ($query_ranap as $pi) {
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
                                                                echo '<tr>
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
                                                        //End cek SOAPIE
                                                        echo '</tbody>';
                                                        echo '</table>';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php endfor; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Riwayat SOAPIE -->
                    <!-- Riwayat SBAR -->
                    <div class="tab-pane fade" id="nav-sbar" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered table-responsive-lg table-sm">
                                    <thead class="bg-info">
                                        <tr>
                                            <th class="text-center">Tgl.Reg</th>
                                            <th class="text-center">No.Rawat</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center" class="text-center">S.B.A.R</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($px3 = 0; $px3 < count($tampilIdentitas); $px3++): ?>
                                            <tr>
                                                <td class="text-nowrap"><?= $tampilIdentitas[$px3]->tgl_registrasi ?></td>
                                                <td><?= $tampilIdentitas[$px3]->no_rawat ?></td>
                                                <td><?= $tampilIdentitas[$px3]->status_lanjut ?></td>
                                                <td>
                                                    <?php
                                                    //Query SBAR pemeriksaan rawat jalan
                                                    $builder = $db->table('pemeriksaan_ralan')
                                                        ->select('pemeriksaan_ralan.tgl_perawatan,pemeriksaan_ralan.jam_rawat,pemeriksaan_ralan.keluhan,pemeriksaan_ralan.pemeriksaan,pemeriksaan_ralan.rtl,pemeriksaan_ralan.penilaian,pemeriksaan_ralan.instruksi,pemeriksaan_ralan.evaluasi,pemeriksaan_ralan.nip,pegawai.jbtn,pegawai.nama')->join('pegawai', 'pegawai.nik=pemeriksaan_ralan.nip')->Like('pemeriksaan_ralan.keluhan', '::')->Like('pemeriksaan_ralan.penilaian', '::')->Like('pemeriksaan_ralan.pemeriksaan', '::')->Like('pemeriksaan_ralan.pemeriksaan', '::')->Like('pemeriksaan_ralan.rtl', '::')->Like('pemeriksaan_ralan.instruksi', '::')->where('pemeriksaan_ralan.no_rawat', $tampilIdentitas[$px3]->no_rawat);
                                                    $sbar_ralan = $builder->get()->getResult();
                                                    //End Query SBAR pemeriksaan rawat jalan
                                                    //Query SBAR pemeriksaan rawat inap
                                                    $builder = $db->table('pemeriksaan_ranap')
                                                        ->select('pemeriksaan_ranap.tgl_perawatan,pemeriksaan_ranap.jam_rawat,pemeriksaan_ranap.keluhan,pemeriksaan_ranap.pemeriksaan,pemeriksaan_ranap.alergi,pemeriksaan_ranap.rtl,pemeriksaan_ranap.penilaian,pemeriksaan_ranap.instruksi,pemeriksaan_ranap.evaluasi,pemeriksaan_ranap.nip,pegawai.jbtn,pegawai.nama')->join('pegawai', 'pegawai.nik=pemeriksaan_ranap.nip')->Like('pemeriksaan_ranap.keluhan', '::')->Like('pemeriksaan_ranap.penilaian', '::')->Like('pemeriksaan_ranap.pemeriksaan', '::')->Like('pemeriksaan_ranap.pemeriksaan', '::')->Like('pemeriksaan_ranap.rtl', '::')->Like('pemeriksaan_ranap.instruksi', '::')->where('pemeriksaan_ranap.no_rawat', $tampilIdentitas[$px3]->no_rawat);
                                                    $sbar_ranap = $builder->get()->getResult();
                                                    //End Query SBAR pemeriksaan rawat inap
                                                    // var_dump($sbar_ranap);
                                                    ?>
                                                    <!-- tabel data riwayat SBAR -->
                                                    <?php
                                                    if (!empty($sbar_ralan) || !empty($sbar_ranap)) {
                                                        echo '<table class="table table-bordered table-responsive-lg table-sm">';
                                                        echo '<thead class="table-info">
                                                            <tr>
                                                                <th class="text-center">Tanggal</th>
                                                                <th class="text-center">Dokter/Paramedis</th>
                                                                <th class="text-center">Situation</th>
                                                                <th class="text-center">Background</th>
                                                                <th class="text-center">Asesment</th>
                                                                <th class="text-center">Recomendation</th>
                                                                <th class="text-center">Instruksi</th>
                                                            </tr>
                                                        </thead>';
                                                        echo '<tbody>';
                                                        if ($tampilIdentitas[$px3]->status_lanjut == 'Ranap') {
                                                            foreach ($sbar_ranap as $sr) {
                                                                echo '<tr>
                                                                <td class="text-nowrap text-center">' . $sr->tgl_perawatan . '<br>' . $sr->jam_rawat . '</td>
                                                                <td class="text-center text-nowrap">' . $sr->nip . '<br>' . $sr->nama . '</td>
                                                                <td>' . $sr->keluhan . '</td>
                                                                <td>' . $sr->pemeriksaan . '</td>
                                                                <td>' . $sr->penilaian . '</td>
                                                                <td>' . $sr->rtl . '</td>
                                                                <td>' . $sr->instruksi . '</td>
                                                            </tr>';
                                                            }
                                                        } elseif ($tampilIdentitas[$px3]->status_lanjut == 'Ralan') {
                                                            foreach ($sbar_ralan as $sl) {
                                                                echo '<tr>
                                                                <td class="text-nowrap text-center">' . $sl->tgl_perawatan . '<br>' . $sl->jam_rawat . '</td>
                                                                <td class="text-center text-nowrap">' . $sl->nip . '<br>' . $sl->nama . '</td>
                                                                <td>' . $sl->keluhan . '</td>
                                                                <td>' . $sl->pemeriksaan . '</td>
                                                                <td>' . $sl->penilaian . '</td>
                                                                <td>' . $sl->rtl . '</td>
                                                                <td>' . $sl->instruksi . '</td>
                                                            </tr>';
                                                            }
                                                        }
                                                        echo '</tbody>';
                                                        echo '</table>';
                                                    };
                                                    ?>
                                                    <!-- End tabel riwayat SBAR -->
                                                </td>
                                            </tr>
                                        <?php endfor; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Riwayat SBAR -->
                    <!-- Riwayat Diagnosa -->
                    <div class="tab-pane fade" id="nav-diagnosa" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered table-responsive-lg table-sm">
                                    <thead class="bg-info">
                                        <tr>
                                            <th scope="col">Tgl.Reg</th>
                                            <th scope="col">No.Rawat</th>
                                            <th scope="col-5" class="text-center">Diagnosa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- tabel data riwayat diagnosa -->
                                        <?php for ($px = 0; $px < count($tampilIdentitas2); $px++): ?>
                                            <tr>
                                                <td><?= $tampilIdentitas2[$px]->tgl_registrasi ?></td>
                                                <td><?= $tampilIdentitas2[$px]->no_rawat ?></td>
                                                <td>
                                                    <?php
                                                    $builder = $db->table('diagnosa_pasien')
                                                        ->select('diagnosa_pasien.kd_penyakit,penyakit.nm_penyakit,diagnosa_pasien.status')
                                                        ->join('penyakit', 'penyakit.kd_penyakit=diagnosa_pasien.kd_penyakit')
                                                        ->where('diagnosa_pasien.no_rawat', $tampilIdentitas2[$px]->no_rawat);
                                                    $query = $builder->get()->getResult();
                                                    if (!empty($query)) {
                                                        echo '<table class="table table-bordered table-responsive-lg table-sm">
                                                        <thead class="table-info">
                                                            <tr>
                                                                <th scope="col">Kode Penyakit</th>
                                                                <th scope="col">Nama Penyakit</th>
                                                                <th scope="col">Status</th>
                                                            </tr>
                                                        </thead>';
                                                        echo '<tbody>';
                                                        foreach ($query as $dx) {
                                                            echo '
                                                                        <tr>
                                                                        <td scope="col">' . $dx->kd_penyakit . '</td>
                                                                        <td scope="col">' . $dx->nm_penyakit . '</td>
                                                                        <td scope="col">' . $dx->status . '</td>
                                                                        </tr>';
                                                        };
                                                        echo '</tbody>';
                                                        echo '</table>';
                                                    }

                                                    ?>
                                                    <!-- End tabel riwayat diagnosa -->
                                                </td>
                                            </tr>
                                        <?php endfor; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Riwayat Diagnosa -->
                    <!-- Riwayat Laboratorium -->
                    <div class="tab-pane fade" id="nav-lab" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered table-responsive-lg table-sm">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Tgl.Reg</th>
                                            <th scope="col">No.Rawat</th>
                                            <th scope="col">Status</th>
                                            <th scope="col" class="text-center">Laboratorium</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>
                                                <table class="table table-bordered table-responsive-lg table-sm">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col">Tanggal</th>
                                                            <th scope="col">Dokter/Paramedis</th>
                                                            <th scope="col">Subjek</th>
                                                            <th scope="col">Objek</th>
                                                            <th scope="col">Asesmen</th>
                                                            <th scope="col">Plan</th>
                                                            <th scope="col">Instruksi</th>
                                                            <th scope="col">Evaluasi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td>Mark</td>
                                                            <td>Otto</td>
                                                            <td>@mdo</td>
                                                            <td>@mdo</td>
                                                            <td>@mdo</td>
                                                            <td>@mdo</td>
                                                            <td>@mdo</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Riwayat Laborat -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<?= $this->endSection() ?>