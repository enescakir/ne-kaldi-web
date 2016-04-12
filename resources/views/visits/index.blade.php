@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>Ziyaretler</h1>
    <p class="lead"> Sistemden görüntülenmiş sınavlar.</p>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-striped table-bordered" style="width:100%;">
                <thead>
                <tr>
                    <th> İsim </th>
                    <th> Sınav </th>
                    <th> Tarih </th>
                    <th> Platform </th>
                    <th> Ip Adresi </th>
                    <th> Cihaz No </th>
                </tr>
                </thead>
                <tbody>
                @forelse ($visits as $visit)
                    <tr>
                        <td>{{  $visit->name }} </td>
                        <td>{{  $visit->exam_id }} </td>
                        <td>{{  date("d.m.Y h:s", strtotime($visit->created_at)) }}</td>
                        <td>{{  $visit->platform }} </td>
                        <td>{{  $visit->ip_adress }} </td>
                        <td>{{  $visit->device_id }} </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Ziyaret Yok</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
