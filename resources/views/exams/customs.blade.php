@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Kullanıcı Sınavları - {{ $exams->total() }} sınav</h1>
    <p class="lead"> Kullanıcılarımızın eklediği sınavlar.</p>
    <div class="row">
      <div class="col-md-12">
        {!! $exams->links() !!}
        <table class="table table-hover table-striped table-bordered" style="width:100%;">
          <thead>
            <tr>
              <th> # </th>
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
                <td>{{ $exam->id }} </td>
                <td>{{ $exam->name }} </td>
                <td>{{ $exam->abb }} </td>
                <td>
                  <span class="label
                  @if ($exam->day_to_date > 3) label-success
                  @elseif ($exam->day_to_date > 0) label-warning
                  @else label-danger
                  @endif" data-toggle="tooltip" data-placement="top" title="{{ $exam->day_to_date}} gün">
                  {{ date("d.m.Y H:i", strtotime($exam->date)) }}
                </span>
              </td>
              <td><a href="{{ route('visitors.show', $exam->visitor_id) }}">#{{  $exam->visitor_id }}</a></td>
              <td>{{  ($exam->desc == 'null' ? "-" : $exam->desc) }}</td>
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
