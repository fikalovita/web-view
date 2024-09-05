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
                                <form action="#" class="form-inline" method="GET">
                                    <div class="form-group row mr-2">
                                        <div class="col-2">
                                            <input type="text" id="max" name="max" class="dt-datetime">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-2">
                                            <input type="text" id="min" name="min" class="dt-datetime" autocomplete="off">
                                        </div>
                                    </div>
                                    <!-- <div class="col-2">
                                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-filter"></i></button>
                                    </div> -->
                                </form>
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
                                    <th scope="col">Action</th>
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