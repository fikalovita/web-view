<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="#">
                            <fieldset disabled>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row mb-1">

                                            <label for="colFormLabelSm" class="col-1  col-form-label-sm">Pasien</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm" value="">
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm">
                                            </div>
                                            <label for="colFormLabelSm" class="col- col-form-label-sm mx-3">JK</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="colFormLabelSm" class="col-1 col-form-label-sm">Alamat</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm">
                                            </div>
                                            <label for="colFormLabelSm" class="col- col-form-label-sm mx-2">G.D</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="colFormLabelSm" class="col-1 col-form-label-sm">Agama</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm">
                                            </div>
                                            <label for="colFormLabelSm" class="col- col-form-label-sm">Stts.Nikah</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm">
                                            </div>
                                            <label for="colFormLabelSm" class="col- col-form-label-sm">Pendidikan</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-1">
                                            <label for="colFormLabelSm" class="col-2 col-form-label-sm">Tempat & Tgl.lahir</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="colFormLabelSm" class="col-2 col-form-label-sm">Nama Ibu</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="colFormLabelSm" class="col-2 col-form-label-sm">Bahasa</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm">
                                            </div>
                                            <label for="colFormLabelSm" class="col- col-form-label-sm">Cacat Fisik</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-kunjungan" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Riwayat Kunjungan</button>
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
                                <table class="table table-bordered table-responsive-lg table-sm">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">No.Rawat</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Jam</th>
                                            <th scope="col">Kd.Dokter</th>
                                            <th scope="col">Dokter Dituju/DPJP</th>
                                            <th scope="col">Umur</th>
                                            <th scope="col">Jenis Bayar</th>
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
                                            <th scope="col">Status</th>
                                            <th scope="col" class="text-center">Diagnosa</th>
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