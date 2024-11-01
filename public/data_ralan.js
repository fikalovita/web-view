var table = $('#riwayat_ralan').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: 'http://192.168.1.144:8080/data_riwayat/ralanAjax',
        type: 'POST',
        data: function (d) {
            d.start_date2 = $('#start_date2').val();
            d.end_date2 = $('#end_date2').val();
            d.status = $('#status-periksa').val();
        }

    },

    columns: [{
            data: 'tgl_registrasi'
        },
        {
            data: 'no_rawat'
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
            data: 'status_poli'
        },
        {
            data: 'stts'
        },
        {
            data: 'nm_poli'
        },

        {
            data: null,
            className: 'text-center',
            render: function (data) {
                return '<button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Riwayat Pemeriksaan" id="detailRalan" onclick="detailRalan(' + data.no_rawat.replace(/\//g, '') + ')"><i class="fas fa-notes-medical"></i></button>';
            }
        }

    ]
});

$('#filter2').on('click', function () {
    table.ajax.reload();

})




function detailRalan(no_rawat) {

window.location.href = 'http://192.168.1.144:8080/detail_ralan/' + no_rawat;


}