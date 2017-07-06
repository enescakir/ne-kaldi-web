@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Bildirimler
      <a type="button" id="create-notification" href="#" class="btn btn-primary pull-right">
        <i class="glyphicon glyphicon-plus"></i> Yeni Ekle
      </a>
    </h1>
    <p class="lead"> Buradan sistemdeki bütün bildirimleri görüntüleyebilirsiniz.</p>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-hover table-striped table-bordered" style="width:100%;">
          <thead>
            <tr>
              <th>#</th>
              <th>Metin</th>
              <th>Oluşturan</th>
              <th>Sınav</th>
              <th>Planlanan</th>
              <th>Gönderilme</th>
              <th style="width: 120px"> İşlem</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($notifications as $notification)
              <tr id="notification-{{ $notification->id }}" class="@if ($notification->sent_at !=null) success @else danger @endif">
                <td>{{  $notification->id }} </td>
                <td id="notification-message-{{ $notification->id }}">{{  $notification->message }} </td>
                <td>{{  $notification->creator->name }} </td>
                <td>
                  @if ($notification->exam == null)
                    Herkes
                  @else
                    {{ $notification->exam->abb }}
                  @endif
                </td>
                <td>{{  date("d.m.Y H:i", strtotime($notification->expected_at)) }}</td>
                <td>{{ $notification->sent_at ? date("d.m.Y H:i", strtotime($notification->sent_at)) : 'Gönderilmedi' }}</td>
                <td>
                  <div class="btn-group" role="group">
                    @unless ($notification->sent_at)
                      <button type="button" notification-id="{{$notification->id}}" class="send btn btn-primary btn-sm">
                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                      </button>
                      <button type="button" notification-id="{{$notification->id}}" class="edit btn btn-warning btn-sm">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                      </button>
                    @endunless
                    <button type="button" notification-id="{{$notification->id}}" class="delete btn btn-danger btn-sm">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5">Bildirim bulunmamaktadır.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <div class="col-md-4">
        {!! Form::open(['route' => 'notification.store', 'method' => 'POST']) !!}
        <div class="portlet-body">
          <div class="form-group">
            {!! Form::label( 'message', 'Bildirim',['class' => 'control-label']) !!} <span class="required">* </span>
            {!! Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => 'Başarılar dileriz']) !!}
          </div>

          <div class="form-group">
            {!! Form::label( 'expected_at', 'Planlanan Tarih:',['class' => 'control-label']) !!} <span
            class="required">* </span>
            {!! Form::text('expected_at', null, ['class' => 'form-control', 'placeholder' => 'örn: 18/03/2015 - 10:00', 'id' => 'datetimepicker']) !!}

          </div>
          <div class="form-group">
            {!! Form::label( 'exam_id', 'Sınav',['class' => 'control-label']) !!} <span class="required">* </span>
            <select name="exam_id" id="examselect" class="select2 form-control" multiple>
            </select>
            <div class="help-block">
              Sınav seçmezseniz herkese gider
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary">Gönder</button>
          </div>

        </div>
        {!! Form::close() !!}

      </div>

    </div>
  </div>
@endsection

@section('page-scripts')
  <script type="text/javascript">
  $('.delete').click(function () {
    var button = $(this);
    var id = button.attr('notification-id');
    var message = $('#notification-message-' + id).html()
    swal({
      title: 'Silmek istediğine emin misin?',
      html: '<strong>#' + id + ' Bildirim:</strong><br>"' + message + '"',
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
            url: "/notification/" + id,
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
      $('#notification-' + id).remove()
      swal(
        'Silinti!',
        'Bildirim başarıyla silindi',
        'success'
      )
    })
  });


  $('.send').click(function () {
    var button = $(this);
    var id = button.attr('notification-id');
    var message = $('#notification-message-' + id).html()
    swal({
      title: 'Göndermek istediğine emin misin?',
      html: '<strong>#' + id + ' Bildirim:</strong><br>"' + message + '"',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'İptal',
      confirmButtonText: 'Evet, gönder!',
      showLoaderOnConfirm: true,
      preConfirm: function () {
        return new Promise(function (resolve, reject) {
          $.ajax({
            url: "/notification/" + id + "/send",
            method: "POST",
            data: [""],
            dataType: 'json',
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
      swal(
        'Gönderildi!',
        result.count + ' kişiye başarıyla bildirim gönderildi.',
        'success'
      ).then( function() {
        location.reload();
      })
    })
  });

  $('#create-notification').click(function () {
    swal({
      title: 'Bildirim Oluştur',
      showCancelButton: true,
      confirmButtonText: 'Oluştur',
      cancelButtonText: 'İptal',
      showLoaderOnConfirm: true,
      html:
      '<textarea id="swal-input1" class="swal2-textarea" placeholder="Mesaj"></textarea>' +
      '<input id="swal-input2" class="swal2-input" placeholder="Planlanan Tarih">' +
      '{!! Form::select('swal-input3', $exams, null, ['id' => 'swal-input3', 'class' => 'swal2-select select2', 'multiple']) !!}<div class"help-block>Sınav seçmezseniz herkese gider</div>',
      onOpen: function () {
        $('#swal-input1').focus();
        $('#swal-input2').datetimepicker({
          language: "tr",
          format: 'dd/mm/yyyy - hh:ii',
          autoclose: true,
          todayHighlight: true,
          minuteStep: 5
        });
        $("#swal-input3").select2({
          dropdownParent: $('.swal2-container'),
          placeholder: 'Sınavlar',
        });
      },
      preConfirm: function () {
        return new Promise(function (resolve, reject) {
          var input1 = $('#swal-input1').val();
          var input2 = $('#swal-input2').val();
          var input3 = $('#swal-input3').val();
          if (!input1) {
            reject('Bildirim metni boş bırakılamaz.')
          } else {
            $.ajax({
              url: "/notification",
              method: "POST",
              dataType: "json",
              data: {"message" : input1, "expected_at": input2, "exams": input3 },
              success: function(result){
                console.log(result)
                resolve(result)
              },
              error: function (xhr, ajaxOptions, thrownError) {
                ajaxError(xhr, ajaxOptions, thrownError)
              }
            });
          }
        })
      },
    }).then(function (result) {
      swal({
        title: "Eklendi!",
        type: "success",
        confirmButtonText: "Tamam",
      }).then(function() { location.reload(); });
    }).catch(swal.noop)
  });
  </script>
@endsection
