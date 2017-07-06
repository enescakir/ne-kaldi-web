@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Sınavlar
      <div class="btn-group pull-right" role="group">
        <a type="button" href="{{ route('exams.create') }}" class="btn btn-primary">
          <i class="glyphicon glyphicon-plus"></i> Yeni Ekle
        </a>
        @if (request()->passed == 1)
          <a type="button" href="{{ route('exams.index') }}" class="btn btn-success">
            <i class="glyphicon glyphicon-share-alt"></i> Aktif
          </a>
        @else
          <a type="button" href="{{ route('exams.index', ['passed' => '1']) }}" class="btn btn-danger">
            <i class="glyphicon glyphicon-repeat"></i> Geçmiş
          </a>
        @endif
      </div>
    </h1>
    <p class="lead"> Buradan sisteme yeni sınavlar ekleyebilirsiniz. Varolan sınavları silebilirsiniz.</p>
    <div class="row">
      <div class="col-md-12">
        <h3>Gelecek Sınavlar</h3>
        <table class="table table-hover table-striped table-bordered" style="width:100%;">
          <thead>
            <tr>
              <th> Sınav </th>
              <th> Kısaltma </th>
              <th style="width: 140px"> Tarih </th>
              <th> Başvuru Baş. </th>
              <th> Başvuru Bit. </th>
              <th style="width: 40px"> Fv. </th>
              <th style="width: 80px"> Gr. </th>
              <th style="width: 150px"> İşlem </th>
            </tr>
          </thead>
          <tbody>
            @forelse ($exams as $exam)
              <tr id="exam-{{ $exam->id }}" class="@if ($exam->activated == 1) success @else danger @endif">
                <td>{{  $exam->name }} </td>
                <td>{{  $exam->abb }} </td>
                <td>
                  <span class="label
                    @if ($exam->day_to_date > 3) label-success
                    @elseif ($exam->day_to_date > 0) label-warning
                    @else label-danger
                    @endif" data-toggle="tooltip" data-placement="top" title="{{ $exam->day_to_date}} gün">
                      {{ date("d.m.Y H:i", strtotime($exam->date)) }}
                  </span>
                </td>
                <td>
                  @if ($exam->start)
                    <span class="label
                      @if ($exam->day_to_start > 3) label-success
                      @elseif ($exam->day_to_start > 0) label-warning
                      @else label-danger
                      @endif" data-toggle="tooltip" data-placement="top" title="{{ $exam->day_to_start}} gün">
                        {{ date("d.m.Y", strtotime($exam->start)) }}
                    </span>
                  @else
                    -
                  @endif
                </td>
                <td>
                  @if ($exam->end)
                    <span class="label
                      @if ($exam->day_to_end > 3) label-success
                      @elseif ($exam->day_to_end > 0) label-warning
                      @else label-danger
                      @endif" data-toggle="tooltip" data-placement="top" title="{{ $exam->day_to_end}} gün">
                        {{ date("d.m.Y", strtotime($exam->end)) }}
                    </span>
                  @else
                    -
                  @endif
                </td>
                <td>{{  $exam->favorites_count }}</td>
                <td>{{  $exam->visits_count }} </td>
                <td>
                  <div class="btn-group" role="group">
                    <button type="button" exam-id="{{ $exam->id }}" exam-name="{{ $exam->name }}" class="activate btn btn-info btn-sm">
                      <i class="fa fa-refresh" aria-hidden="true"></i>
                    </button>
                    <a type="button" href="{{ route( 'exams.show', $exam->id ) }}" class="show btn btn-success btn-sm">
                      <i class="fa fa-search" aria-hidden="true"></i>
                    </a>
                    <a type="button" href="{{ route( 'exams.edit', $exam->id ) }}" class="edit btn btn-warning btn-sm">
                      <i class="fa fa-edit" aria-hidden="true"></i>
                    </a>
                    <button type="button" exam-id="{{ $exam->id }}" exam-name="{{ $exam->name }}" class="delete btn btn-danger btn-sm">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="10">Gelecek sınav yok</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

@section('page-scripts')

  <script type="text/javascript">
  $('.delete').click(function () {
    var button = $(this);
    var id = button.attr('exam-id');
    var name = button.attr('exam-name');
    swal({
      title: 'Silmek istediğine emin misin?',
      html: '<strong>Sınav:</strong> ' + name,
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'İptal',
      confirmButtonText: 'Evet, sil!',
      showLoaderOnConfirm: true,
      preConfirm: function () {
        return new Promise(function (resolve, reject) {
          $.ajax({
            url: "/exams/" + id,
            method: "DELETE",
            success: function (result) {
              resolve(result)
            },
            error: function (xhr, status, errorThrown) {
              reject()
              ajaxError(xhr, status, errorThrown)
            }
          });
        })
      },
      allowOutsideClick: false,
    }).then(function (result) {
      $('#exam-' + id).remove()
      swal(
        'Silinti!',
        'Sınav başarıyla silindi',
        'success'
      )
    })
  });

  $('.activate').click(function(){
    var button = $(this);
    var id = button.attr('exam-id');
    var name = button.attr('exam-name');
    swal({
      title: 'Onay durumunu değiştirmek istediğine emin misin?',
      html: '<strong>Sınav:</strong> ' + name,
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'İptal',
      confirmButtonText: 'Evet, değiştir!',
      showLoaderOnConfirm: true,
      preConfirm: function () {
        return new Promise(function (resolve, reject) {
          $.ajax({
            url:  "/exams/" + id + "/activate",
            method: "POST",
            success: function (result) {
              resolve(result)
            },
            error: function (xhr, status, errorThrown) {
              reject()
              ajaxError(xhr, status, errorThrown)
            }
          });
        })
      },
      allowOutsideClick: false,
    }).then(function (result) {
      if (result == 1) {
        swal(
          'Onaylandı!',
          'Sınav başarıyla onaylandı',
          'success'
        ).then(function () {
          location.reload();
        })
      } else {
        swal(
          'Onay kaldırıldı!',
          'Sınavın onayı başarıyla kaldırıldı',
          'success'
        ).then(function () {
          location.reload();
        })
      }
    })
  });
  </script>
@endsection
