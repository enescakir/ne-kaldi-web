@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Bildirimler
      <div class="btn-group pull-right" role="group">
        <a type="button" id="create-notification" href="#" class="btn btn-primary">
          <i class="glyphicon glyphicon-plus"></i> Yeni Ekle
        </a>
        @if (request()->has('is_custom') && request()->is_custom == 0)
          <a type="button" href="{{ route('notification.index', ['is_custom' => '1']) }}" class="btn btn-warning">
            <i class="glyphicon glyphicon-flash"></i> Özel
          </a>
        @else
          <a type="button" href="{{ route('notification.index', ['is_custom' => '0']) }}" class="btn btn-warning">
            <i class="glyphicon glyphicon-flash"></i> Otomatik
          </a>
        @endif
      </div>
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
              <th>Kişi</th>
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
                  {{ count($notification->exams) > 0 ? $notification->exams->implode('abb', ', ') : 'Herkes'}}
                </td>
                <td>{{ date("d.m.Y H:i", strtotime($notification->expected_at)) }}</td>
                <td>{{ $notification->sent_at ? date("d.m.Y H:i", strtotime($notification->sent_at)) : '-' }}</td>
                <td>{{  $notification->recepients ?: '-' }} </td>
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
                <td colspan="6">Bildirim bulunmamaktadır.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
        {!! $notifications->links() !!}
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
      '{!! Form::select('swal-input3[]', $exams, null, ['id' => 'swal-input3', 'class' => 'swal2-select select2', 'multiple']) !!}<div class"help-block>Sınav seçmezseniz herkese gider</div>',
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
