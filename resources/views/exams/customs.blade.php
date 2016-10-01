@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Kullanıcı Sınavları</h1>
        <p class="lead"> Kullanıcılarımızın eklediği sınavlar.</p>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-striped table-bordered" style="width:100%;">
                <thead>
                <tr>
                    <th> Sınav </th>
                    <th> Kısaltma </th>
                    <th> Tarih </th>
                    <th> Kullanıcı # </th>
                    <th> Açıklama </th>
                </tr>
                </thead>
                <tbody>
                @forelse ($exams as $exam)
                    <tr>
                        <td>{{  $exam->name }} </td>
                        <td>{{  $exam->abb }} </td>
                        <td>{{  date("d.m.Y H:i", strtotime($exam->date)) }} </td>
                        <td>{{  $exam->visitor_id }} </td>
                        <td>{{  ($exam->desc == null ? "-" : $exam->desc) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Kullanıcı sınavı bulunmamaktadır.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('page-scripts')
@endsection
