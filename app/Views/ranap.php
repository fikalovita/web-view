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
                                <h5 class="card-title">Data Pasien Rawat Inap </h5>
                            </div>
                            <div class="col-sm-6">
                                <form action="" class="form-inline">
                                    <div class="form-group row mr-2">
                                        <div class="col-2">
                                            <input type="text" class="form-control form-control-sm" id="datepicker" placeholder="Pilih Tanggal">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-2">
                                            <input id="datepicker2" type="text" class="form-control form-control-sm" id="staticEmail" placeholder="Pilih Tanggal">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-success btn-sm"><i class="fas fa-filter"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table class="table table-responsive-lg table-bordered table-sm mt-3">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">No.Rawat</th>
                                    <th scope="col">Nama Dokter</th>
                                    <th scope="col">NO.RM</th>
                                    <th scope="col">Nama Pasien</th>
                                    <th scope="col">Poliklinik</th>
                                    <th scope="col">Action</th>
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
                                    <td class="text-center"><button class="btn btn-success btn-sm">Riwayat</button></td>
                                </tr>
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