@extends('layouts.app')

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
            <table class="table table-hover table-striped table-bordered" style="width:100%;">
                <thead>
                <tr>
                    <th> # </th>
                    <th> Tarih </th>
                    <th> Bildirim </th>
                    <th> Cihaz No </th>
                    <th> Platform </th>
                    <th> Via </th>
                    <th> Ziyaret </th>
                    <th style="width: 50px"> İşlem </th>
                </tr>
                </thead>
                <tbody>
                @forelse ($visitors as $visitor)
                    <tr>
                        <td>{{  $visitor->id }} </td>
                        <td>{{  date("d.m.Y h:m:s", strtotime($visitor->created_at)) }}</td>
                        @if($visitor->notification_token)
                            <td>Var</td>
                        @else
                            <td>Yok</td>
                        @endif
                        <td>{{  $visitor->device_id }} </td>
                        <td>{{  $visitor->platform }} </td>
                        <td>{{  $visitor->via }} </td>
                        <td>{{  $visitor->visits_count }} </td>
                        <td>
                            <button type="button" id="visitor-{{$visitor->id}}" class="delete btn btn-danger">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Ziyaretçi Yok</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $visitors->links() }}
        </div>
    </div>
</div>
@endsection


@section('page-scripts')
    <script type="text/javascript">
        $('.delete').click(function(){
            var button = $(this);
            var prefix = "visitor-"
            var id = button.attr("id").substr(prefix.length);
            // var user_id = window.location.pathname.slice(0, -7).substr(12);
            if (confirm( id +" numaralı ziyaretçiyi silmek istediğınizden emin misiniz") == false) {
                return;
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url:  "/visitors/" + id,
                method: "DELETE",
                success: function(result){
                    button.closest('tr').remove();
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
