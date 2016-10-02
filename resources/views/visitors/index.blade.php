@extends('layouts.app')

@section('page-styles')
    <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <style>
        tfoot {
            display: table-header-group!important;
        }
    </style>
@endsection

@section('content')
    <div class="container">
    <h1>Ziyaretçiler
        <a type="button" href="{{ route('visitors.statistics') }}" class="btn btn-primary pull-right">
            <i class="glyphicon glyphicon-signal"></i> İstatistikler
        </a>
    </h1>
    <p class="lead"> Uygulamamızı indiren kişilerin listesi</p>

    <div class="row">
        <div class="col-md-12">
            <table id="visitors-table" class="table table-hover table-striped table-bordered" style="width:100%;">
                <thead>
                <tr>
                    <th> # </th>
                    <th> Tarih </th>
                    <th> İsim </th>
                    <th> E-posta </th>
                    <th> Bildirim </th>
                    <th> Via </th>
                    <th> Ziyaret </th>
                    <th> Favori </th>
                    <th> Sınav </th>
                    <th style="width: 50px"> İşlem </th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                    <th> # </th>
                    <th> Tarih </th>
                    <th> İsim </th>
                    <th> E-posta </th>
                    <th>
                        <select>
                            <option value="">Hepsi</option>
                            <option value="Var">Var</option>
                            <option value="Yok">Yok</option>
                        </select>
                    </th>
                    <th>
                        <select>
                            <option value="">Hepsi</option>
                            <option value="Simulator">Simulator</option>
                            <option value="iPhone 5S">iPhone 5S</option>
                            <option value="iPhone 6S">iPhone 6S</option>
                        </select>
                    </th>
                    <th> Ziyaret </th>
                    <th> Favori </th>
                    <th> Sınav </th>
                    <th></th>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection


@section('page-scripts')
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

    <script type="text/javascript">
        $.ajaxSetup({ headers: { 'X-CSRF-Token': $('meta[name="_token"]').attr('content') } });
        $('#visitors-table tfoot th').each( function () {
            var title = $(this).text();
            if(title != "" && title.indexOf("Hepsi") == -1){
                $(this).html( '<input type="text" style="width:100%;" id=' + title.toLowerCase() + ' placeholder= ' + title + ' />' );
            }
        } );

        var table = $('#visitors-table').DataTable({
            "language": {
                "emptyTable":     "Veri bulunamadı",
                "info":           "_TOTAL_ ziyaretçiden _START_ - _END_  arası gösteriliyor",
                "infoEmpty":      "Showing 0 to 0 of 0 entries",
                "infoFiltered":   "(toplam _MAX_ ziyaretçi)",
                "lengthMenu":     "Her sayfada _MENU_ ziyaretçi",
                "loadingRecords": "Yükleniyor...",
                "processing":     "İşleniyor...",
                "search":         "Ara:",
                "zeroRecords":    "Arama kriterlerinize uygun kayıt bulunamadı.",
                "paginate": {
                    "first":      "İlk",
                    "last":       "Son",
                    "next":       "İleri",
                    "previous":   "Geri"
                },
            },
            "processing": true,
            "serverSide": true,
            "ajax": "/visitors/data",

            "columns": [
                { data: 'id', name: 'id', width: "3%" },
                { data: 'created_at', name: 'created_at' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'notification_token', name: 'notification_token' },
                { data: 'via', name: 'via' },
                { data: 'visits_count', name: 'visits_count' },
                { data: 'favorites_count', name: 'favorites_count' },
                { data: 'custom_exams_count', name: 'custom_exams_count' },
                { data: 'operations',name: 'operations', orderable:false }
            ],
            "search": {
                "caseInsensitive": true
            },
            "order": [[ 0, "desc" ]]
        });

        // Apply the search
        table.columns().every( function () {
            var that = this;

            $( 'input', this.footer() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                            .search( this.value )
                            .draw();
                }
            } );

            $( 'select', this.footer() ).on( 'change', function () {
                if ( that.search() !== this.value ) {
                    that
                            .search( this.value )
                            .draw();
                }
            } );
        } );

        table.on('click', '.delete', function (e) {
            e.preventDefault();
            var nRow = table.row( $(this).parents('tr')[0] );
            var aData = table.row( nRow ).data();
            var id = aData['id'];

            if (confirm( id + " numaralı ziyaretçiyi silmek istediğınizden emin misiniz?") == false) {
                return;
            }


            $.ajax({
                url: "/visitors/" + id,
                method: "DELETE",
                success: function(result){
                    table.row( $(this).parents('tr')).remove().draw();
                },
                error: function( xhr, status, errorThrown ) {
                    alert( "Sorry, there was a problem!" );
                    console.log( "Error: " + errorThrown );
                    console.log( "Status: " + status );
                    console.dir( xhr );
                },
            });
        });
    </script>
@endsection
