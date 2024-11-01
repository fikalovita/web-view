<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6">
                                <div class="form-inline" method="POST">
                                    <div class="form-group row">
                                        <div class="col-2">
                                            <input type="date" id="start_date2" class="form-control form-control-sm datepicker">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-2">
                                            <input type="date" id="end_date2" class="form-control form-control-sm datepicker" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-2">
                                            <select class="form-control form-control-sm" name="status_periksa" id="status-periksa">
                                                <option value="Belum">Belum</option>
                                                <option value="Sudah">Sudah</option>
                                                <option value="Batal">Batal</option>
                                                <option value="Dirujuk">Dirujuk</option>
                                                <option value="Meninggal">Meninggal</option>
                                                <option value="Dirawat">Dirawat</option>
                                                <option value="Pulang Paksa">Pulang Paksa</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-info btn-sm" id="filter2" data-toggle="tooltip" data-placement="left" title="filter"><i class="fas fa-filter"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-responsive-lg table-bordered table-hover table-sm mt-3" id="riwayat_ralan">
                            <thead class="thead-light">
                                <!-- <th scope="col">#</th> -->
                                <th scope="col">Tgl.Registrasi</th>
                                <th scope="col">No.Rawat</th>
                                <th scope="col">Nama Dokter</th>
                                <th scope="col">NO.RM</th>
                                <th scope="col">Nama Pasien</th>
                                <th scope="col">Status Poli</th>
                                <th scope="col">Status Periksa</th>
                                <th scope="col">Poliklinik</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div><!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<?= $this->endSection() ?>