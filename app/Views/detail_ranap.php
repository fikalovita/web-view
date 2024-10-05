<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<?php
$db = \Config\Database::connect(); ?>
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
                                        <div class="col-md-6">
                                            <div class="row mb-1">
                                                <label for="colFormLabelSm" class="col-1  col-form-label-sm">Pasien</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm" value="<?= $value->no_rkm_medis ?>">
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm" value="<?= $value->nm_pasien ?>">
                                                </div>
                                                <label for="colFormLabelSm" class="col- col-form-label-sm mx-3">JK</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm" value="<?= $value->jk ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <label for="colFormLabelSm" class="col-1 col-form-label-sm">Alamat</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm" value="<?= $value->alamatpj ?>">
                                                </div>
                                                <label for="colFormLabelSm" class="col- col-form-label-sm mx-2">G.D</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm">
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <label for="colFormLabelSm" class="col-1 col-form-label-sm">Agama</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm" value="<?= $value->agama ?>">
                                                </div>
                                                <label for="colFormLabelSm" class="col- col-form-label-sm">Stts.Nikah</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm" value="<?= $value->stts_nikah ?>">
                                                </div>
                                                <label for="colFormLabelSm" class="col- col-form-label-sm">Pendidikan</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm" value="<?= $value->pnd ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row mb-1">
                                                <label for="colFormLabelSm" class="col-2 col-form-label-sm">Tempat & Tgl.lahir</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm" value="<?= $value->tmp_tgl_lahir ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <label for="colFormLabelSm" class="col-2 col-form-label-sm">Nama Ibu</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm" value="<?= $value->nm_ibu ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <label for="colFormLabelSm" class="col-2 col-form-label-sm">Bahasa</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm" value="<?= $value->nama_bahasa ?>">
                                                </div>
                                                <label for="colFormLabelSm" class="col- col-form-label-sm">Cacat Fisik</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm" value="<?= $value->nama_cacat ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <label for="colFormLabelSm" class="col-2 col-form-label-sm">No.Rawat</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-control-sm" id="no_rawat" placeholder="col-form-label-sm" name="no_rawat" value="<?= $value->no_rawat ?>">
                                                </div>
                                            </div>
                                        </div>
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
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Tgl.Reg</th>
                                            <th scope="col">No.Rawat</th>
                                            <th scope="col">Status</th>
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
                                                    ?>
                                                    <?php
                                                    echo '<table class="table table-bordered table-responsive-lg table-sm">';
                                                    echo '<thead class="thead-light">
                                                            <tr>
                                                                <th scope="col-3" class="text-center">Tanggal</th>
                                                                <th scope="col" class="text-center">Dokter/Paramedis</th>
                                                                <th scope="col" class="text-center">Subjek</th>
                                                                <th scope="col" class="text-center">Objek</th>
                                                                <th scope="col" class="text-center">Asesmen</th>
                                                                <th scope="col-2" class="text-center">Plan</th>
                                                                <th scope="col" class="text-center">Instruksi</th>
                                                                <th scope="col" class="text-center">Evaluasi</th>
                                                            </tr>
                                                        </thead>';
                                                    echo '<tbody>';
                                                    //cek SOAPIE rawat inap dan rawat jalan
                                                    if ($tampilIdentitas[$px2]->status_lanjut == 'Ralan') {

                                                        foreach ($query_ralan as $pr) {
                                                            $alergi = ($pr->alergi != "") ? '<br>Alergi :' . $pr->alergi : "";
                                                            $suhu_tubuh = ($pr->suhu_tubuh != "") ? '<br>Suhu(C) :' . $pr->suhu_tubuh : "";
                                                            $tensi = ($pr->tensi != "") ? '<br>Tensi :' . $pr->tensi : "";
                                                            $nadi = ($pr->nadi != "") ? '<br>Nadi :' . $pr->nadi : "";
                                                            $tinggi = ($pr->tinggi != "") ? '<br>Tinggi(Cm) :' . $pr->tinggi : "";
                                                            $berat = ($pr->berat != "") ? '<br>Berat(Kg) :' . $pr->berat : "";
                                                            $gcs = ($pr->gcs != "") ? '<br>GCS(E,V,M)' : "";
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
                                                    }
                                                    //End cek SOAPIE
                                                    echo '</tbody>';
                                                    echo '</table>';
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
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Tgl.Reg</th>
                                            <th scope="col">No.Rawat</th>
                                            <th scope="col">Status</th>
                                            <th scope="col" class="text-center">S.B.A.R</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>
                                                <!-- tabel data riwayat SBAR -->
                                                <table class="table table-bordered table-responsive-lg table-sm">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col">Tanggal</th>
                                                            <th scope="col">Dokter/Paramedis</th>
                                                            <th scope="col">Situation</th>
                                                            <th scope="col">Background</th>
                                                            <th scope="col">Asesment</th>
                                                            <th scope="col">Recomendation</th>
                                                            <th scope="col">Instruksi</th>
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
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <!-- End tabel riwayat SBAR -->
                                            </td>
                                        </tr>
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
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Tgl.Reg</th>
                                            <th scope="col">No.Rawat</th>
                                            <th scope="col-5" class="text-center">Diagnosa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- tabel data riwayat diagnosa -->
                                        <?php for ($px = 0; $px < count($tampilIdentitas); $px++): ?>
                                            <tr>
                                                <td><?= $tampilIdentitas[$px]->tgl_registrasi ?></td>
                                                <td><?= $tampilIdentitas[$px]->no_rawat ?></td>
                                                <td>
                                                    <?php
                                                    $builder = $db->table('diagnosa_pasien')
                                                        ->select('diagnosa_pasien.kd_penyakit,penyakit.nm_penyakit,diagnosa_pasien.status')
                                                        ->join('penyakit', 'penyakit.kd_penyakit=diagnosa_pasien.kd_penyakit')
                                                        ->where('diagnosa_pasien.no_rawat', $tampilIdentitas[$px]->no_rawat);
                                                    $query = $builder->get()->getResult();

                                                    echo '<table class="table table-bordered table-responsive-lg table-sm">
                                                        <thead class="thead-light">
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