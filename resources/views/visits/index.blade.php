@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>Ziyaretler</h1>
    <p class="lead"> Sistemden görüntülenmiş sınavlar.</p>

    <div class="row">
        <div class="col-md-8">
            <table class="table table-hover table-striped table-bordered" style="width:100%;">
                <thead>
                <tr>
                    <th> Sınav </th>
                    <th> Tarih </th>
                    <th> Ziyaretçi No </th>
                </tr>
                </thead>
                <tbody>
                @forelse ($visits as $visit)
                    <tr>
                        <td>{{  $visit->exam->abb }} </td>
                        <td>{{  date("d.m.Y h:m:s", strtotime($visit->created_at)) }}</td>
                        <td>{{  $visit->visitor->id }} </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Ziyaret Yok</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <div class="jumbotron">
                <h2>İstatistikler</h2>
                <p>{{ count($visits) }} ziyaret</p>
                <p> 104 YGS</p>
            </div>
        </div>

    </div>
</div>
@endsection
