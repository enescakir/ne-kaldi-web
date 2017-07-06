@extends('layouts.app')

@section('page-styles')
@endsection

@section('content')
  <div class="container">
    <h1>Ziyaretçi Detayları #{{ $visitor->id }}
      <a type="button" href="{{ route('visitors.index') }}" class="btn btn-primary pull-right">
        <i class="glyphicon glyphicon-list"></i> Hepsi
      </a>
    </h1>
    <div class="row">
      <form class="form-horizontal">
        <div class="col-md-6">
            <div class="form-group">
              <label class="control-label col-sm-3" for="email">Ad:</label>
              <div class="col-sm-9">
                <p class="form-control-static">{{ $visitor->name ?? '-' }}</p>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="email">E-posta:</label>
              <div class="col-sm-9">
                <p class="form-control-static">{{ $visitor->email ?? '-' }}</p>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="email">One Signal #:</label>
              <div class="col-sm-9">
                <p class="form-control-static">{{ $visitor->player_id ?? '-' }}</p>
              </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
              <label class="control-label col-sm-3" for="email">Platform:</label>
              <div class="col-sm-9">
                <p class="form-control-static">{{ $visitor->platform ?? '-' }}</p>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="email">Cihaz:</label>
              <div class="col-sm-9">
                <p class="form-control-static">{{ $visitor->via ?? '-' }}</p>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="email">API v.:</label>
              <div class="col-sm-9">
                <p class="form-control-static">{{ $visitor->api_version ?? '-' }}</p>
              </div>
            </div>
        </div>
      </form>
    </div>
    <div class="row">
      <div class="col-md-12">
        <p></p>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation"  class="active"><a href="#favorites" role="tab" data-toggle="tab">Favoriler</a></li>
          <li role="presentation"><a href="#visits" role="tab" data-toggle="tab">Ziyaretler</a></li>
          <li role="presentation"><a href="#exams" role="tab" data-toggle="tab">Sınavlar</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="favorites">
            <table class="table table-condensed table-striped table-bordered" style="width:100%;">
                <thead>
                <tr>
                    <th> # </th>
                    <th> Sınav </th>
                    <th> Kısaltma </th>
                    <th> Favori Tarihi </th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($visitor->favorites as $favorite)
                    <tr>
                        <td> {{ $favorite->exam->id }} </td>
                        <td> {{ $favorite->exam->name }} </td>
                        <td> {{ $favorite->exam->abb }} </td>
                        <td> {{ date("d.m.Y H:i", strtotime($favorite->created_at)) }} </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
          <div role="tabpanel" class="tab-pane" id="visits">
            <table class="table table-condensed table-striped table-bordered" style="width:100%;">
                <thead>
                <tr>
                    <th> # </th>
                    <th> Sınav </th>
                    <th> Kısaltma </th>
                    <th> Ziyaret Tarihi </th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($visitor->visits as $visit)
                    <tr>
                        <td> {{ $visit->exam->id }} </td>
                        <td> {{ $visit->exam->name }} </td>
                        <td> {{ $visit->exam->abb }} </td>
                        <td> {{ date("d.m.Y H:i", strtotime($visit->created_at)) }} </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
          <div role="tabpanel" class="tab-pane" id="exams">
            <table class="table table-condensed table-striped table-bordered" style="width:100%;">
                <thead>
                <tr>
                    <th> # </th>
                    <th> Sınav </th>
                    <th> Kısaltma </th>
                    <th> Tarih </th>
                    <th> Açıklama </th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($visitor->custom_exams as $exam)
                    <tr>
                        <td> {{ $exam->id }} </td>
                        <td> {{ $exam->name }} </td>
                        <td> {{ $exam->abb }} </td>
                        <td> {{ date("d.m.Y H:i", strtotime($exam->date)) }} </td>
                        <td> {{ $exam->desc == 'null' ? '-' : $exam->desc }} </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection


@section('page-scripts')
@endsection
