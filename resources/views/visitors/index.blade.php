@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>Ziyaretçiler</h1>
    <p class="lead"> Sistemi kullanan kişiler</p>

    <div class="row">
        <div class="col-md-8">
            <table class="table table-hover table-striped table-bordered" style="width:100%;">
                <thead>
                <tr>
                    <th> # </th>
                    <th> Tarih </th>
                    <th> Bildirim </th>
                    <th> Cihaz No </th>
                    <th> Platform </th>
                    <th> Via </th>

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
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Ziyaretçi Yok</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $visitors->links() }}
        </div>
        <div class="col-md-4">
            <div class="jumbotron">
                <h2>İstatistikler</h2>
                <p>{{ $visitors->total() }} farklı kişi</p>
                @foreach( $visitorDevices as $visitorDevice)
                    <p>{{ $visitorDevice->total . ' ' . $visitorDevice->via }}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
