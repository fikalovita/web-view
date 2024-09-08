<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                            </div>
                            <div class="col-sm-6">
                                <div class="form-inline" method="POST">
                                    <div class="form-group row mr-2">
                                        <div class="col-2">
                                            <input type="date" id="start_date" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-2">
                                            <input type="date" id="end_date" class="form-control form-control-sm" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-success btn-sm" id="filter1"><i class="fas fa-filter"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-responsive-lg table-bordered table-sm table-hover mt-3" id="riwayat_ranap">
                            <thead class="thead-light">
                                <tr>
                                    <!-- <th scope="col">#</th> -->
                                    <th scope="col">No.Rawat</th>
                                    <th scope="col">Tgl.Masuk</th>
                                    <th scope="col">Nama Dokter/DPJP</th>
                                    <th scope="col">NO.RM</th>
                                    <th scope="col">Nama Pasien</th>
                                    <th scope="col">Kamar</th>
                                    <th scope="col">Status Pulang</th>
                                    <!-- <th scope="col">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div><!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<?= $this->endSection() ?>