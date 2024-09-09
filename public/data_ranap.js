        $(document).ready(function () {
            var table = $('#riwayat_ranap').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: 'http://localhost:8080/data_riwayat/ranapAjax',
                    type: 'POST',
                    data: function (d) {
                        d.start_date = $('#start_date').val();
                        d.end_date = $('#end_date').val();
                    }
                },

                columns: [{
                        data: 'no_rawat'
                    },
                    {
                        data: 'tgl_masuk'
                    },
                    {
                        data: 'nm_dokter'
                    },
                    {
                        data: 'no_rkm_medis'
                    },
                    {
                        data: 'nm_pasien'
                    },
                    {
                        data: 'nm_bangsal'
                    },
                    {
                        data: 'stts_pulang'
                    },

                    {
                        data: null,
                        className: 'text-center',
                        render: function (data) {
                            return '<button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Riwayat Pemeriksaan" id="detailRanap" onclick="detailRanap(' + data.no_rawat.replace(/\//g, '') + ',' + data.no_rkm_medis.replace(/\//g, '') + ')"><i class="fas fa-notes-medical"></i></button>';
                        }
                    }

                ]
            });

            $('#filter1').on('click', function () {
                table.ajax.reload();
            })


        });

        function detailRanap(no_rawat, no_rkm_medis) {

            window.location.href = 'http://localhost:8080/detail_ranap/' + no_rawat + '/' + no_rkm_medis;
}
    