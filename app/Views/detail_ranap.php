<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-info card-outline">
                    <div class="card-body">
                        <form action="#" method="post">
                            <fieldset disabled>
                                <div class="row">
                                    <?php foreach ($riwayat_ranap as $key => $value) : ?>
                                        <table class="table table-bordered table-responsive-md table-sm">
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-inline" method="POST">
                                    <div class="form-group mx-sm-1 mb-2">
                                        <div class="form-group mr-sm-2 mb-2">

                                        </div>
                                        <input type="date" class="form-control form-control-sm" id="tgl_awal" name="tgl_awal">
                                    </div>
                                    <div class="form-group mr-sm-2 mb-2">
                                        <input type="date" class="form-control form-control-sm" id="tgl_akhir" name="tgl_akhir">
                                    </div>

                                    <button class="btn btn-info mb-2 btn-sm" id="btn-riwayat"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a href="#kunjungan" class="btn nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-kunjungan" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Riwayat Kunjungan</a>
                        <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-soap" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Riwayat S.O.A.P.I.E</button>
                        <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-sbar" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Riwayat S.B.A.R</button>
                        <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-diagnosa" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Riwayat Diagnosa</button>
                        <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-lab" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Riwayat Laborat</button>
                        <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-rad" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Riwayat Radiologi</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <!-- Riwayat Kunjungan -->
                    <div class="tab-pane fade show active" id="nav-kunjungan" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered table-responsive-lg table-sm table-hover" id="tabel-kunjungan-ranap">
                                    <thead class="bg-info">
                                        <tr class="text-center">

                                            <th scope="col">No</th>
                                            <th scope="col">No.Rawat</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Jam</th>
                                            <th scope="col">Dokter Dituju/DPJP</th>
                                            <th scope="col">Poliklinik/Kamar</th>
                                            <th scope="col">Umur</th>
                                            <th scope="col">Jenis Bayar</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Riwayat Kunjungan -->
                    <!-- Riwayat SOAPIE -->
                    <div class="tab-pane fade" id="nav-soap" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered table-responsive table-sm" id="tabel-soapie-ranap">
                                    <thead class="bg-info">
                                        <tr class="text-center">
                                            <th scope="col">Tgl.Reg</th>
                                            <th scope="col">No.Rawat</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">S.O.A.P.I.E</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Riwayat SOAPIE -->
                    <!-- Riwayat SBAR -->
                    <div class="tab-pane fade" id="nav-sbar" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered table-responsive-lg table-sm" id="tabel-sbar-ranap">
                                    <thead class="bg-info">
                                        <tr class="text-center">
                                            <th>Tgl.Reg</th>
                                            <th>No.Rawat</th>
                                            <th>Status</th>
                                            <th>S.B.A.R</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Riwayat SBAR -->
                    <!-- Riwayat Diagnosa -->
                    <div class="tab-pane fade" id="nav-diagnosa" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered table-responsive-lg table-sm" id="tabel-diagnosa-ranap">
                                    <thead class="bg-info">
                                        <tr class="text-center">
                                            <th scope="col">Tgl.Reg</th>
                                            <th scope="col">No.Rawat</th>
                                            <th scope="col-5">Diagnosa</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Riwayat Diagnosa -->
                    <!-- Riwayat Laboratorium -->
                    <div class="tab-pane fade" id="nav-lab" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered table-responsive-lg table-sm" id="tabel-laborat-ranap">
                                    <thead class="bg-info">
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th scope="col">Pemeriksaan</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Riwayat Laborat -->
                    <!-- Riwayat Radiologi -->
                    <div class="tab-pane fade show" id="nav-rad" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-responsive-lg table-bordered table-sm" id="tabel-radiologi-ranap">
                                    <thead class="bg-info">
                                        <tr class="text-center">
                                            <td>No</td>
                                            <td>Pemeriksaan</td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Riwayat Radiologi -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<script>
    const no_rawat = <?= json_encode($no_rawat) ?>;
    // DataTable for Riwayat Kunjungan
    let tableKunjungan = $('#tabel-kunjungan-ranap').DataTable({
        searching: false,
        paging: false,
        info: false,
        processing: true,
        ajax: {
            url: "<?= base_url('datapemeriksaan/tampilKunjungan/') ?>" + no_rawat,
            method: 'POST',
            data: function(data) {
                data.tgl_awal = $('#tgl_awal').val();
                data.tgl_akhir = $('#tgl_akhir').val();

            }
        },
    });
    // DataTable for Riwayat SOAPIE
    let tableSoapie = $('#tabel-soapie-ranap').DataTable({
        searching: false,
        paging: false,
        info: false,
        processing: true,
        ajax: {
            url: "<?= base_url('datapemeriksaan/tampilsoapie/') ?>" + no_rawat,
            method: 'POST',
            data: function(data) {
                data.tgl_awal = $('#tgl_awal').val();
                data.tgl_akhir = $('#tgl_akhir').val();

            }
        },
        createdRow: function(row, data) {
            $('td', row).eq(0).addClass('text-nowrap');
        }
    });
    //tabel riwayat SBAR
    let tableSbar = $('#tabel-sbar-ranap').DataTable({
        searching: false,
        paging: false,
        info: false,
        processing: true,
        ajax: {
            url: "<?= base_url('datapemeriksaan/tampilsbar/') ?>" + no_rawat,
            method: 'POST',
            data: function(data) {
                data.tgl_awal = $('#tgl_awal').val();
                data.tgl_akhir = $('#tgl_akhir').val();

            }
        },
        createdRow: function(row, data) {
            $('td', row).eq(0).addClass('text-nowrap');
        }
    });
    //tabel riwayat laborat
    var tableLaborat = $('#tabel-laborat-ranap').DataTable({
        searching: false,
        paging: false,
        info: false,
        processing: true,
        ajax: {
            url: "<?= base_url('datapemeriksaan/tampillaborat/') ?>" + no_rawat,
            method: 'POST',
            data: function(data) {
                data.tgl_awal = $('#tgl_awal').val();
                data.tgl_akhir = $('#tgl_akhir').val();
            }
        },
        createdRow: function(row, data) {
            $('td', row).eq(0).addClass('text-nowrap');
        }
    });
    //tabel riwayat diagnosa
    let tableDiagnosa = $('#tabel-diagnosa-ranap').DataTable({
        searching: false,
        paging: false,
        info: false,
        processing: true,
        ajax: {
            url: "<?= base_url('datapemeriksaan/tampilDiagnosa/') ?>" + no_rawat,
            method: 'POST',
            data: function(data) {
                data.tgl_awal = $('#tgl_awal').val();
                data.tgl_akhir = $('#tgl_akhir').val();
            }
        },
        createdRow: function(row, data) {
            $('td', row).eq(0).addClass('text-nowrap');
        }
    });

    //tabel riwayat radiologi
    let tableRadiologi = $('#tabel-radiologi-ranap').DataTable({
        searching: false,
        paging: false,
        info: false,
        processing: true,
        ajax: {
            url: "<?= base_url('datapemeriksaan/tampilRadiologi/') ?>" + no_rawat,
            method: 'POST',
            data: function(data) {
                data.tgl_awal = $('#tgl_awal').val();
                data.tgl_akhir = $('#tgl_akhir').val();

            }
        },
        createdRow: function(row, data) {
            $('td', row).eq(0).addClass('text-nowrap');
        }
    });
    $('#btn-riwayat').on('click', function() {
        tableKunjungan.ajax.reload();
        tableSoapie.ajax.reload();
        tableSbar.ajax.reload();
        tableDiagnosa.ajax.reload();
        tableLaborat.ajax.reload();
        tableRadiologi.ajax.reload();

    })
</script>
<?= $this->endSection() ?>