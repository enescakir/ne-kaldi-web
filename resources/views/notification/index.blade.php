@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Bildirimler</h1>
    <p class="lead"> Buradan sistemdeki bütün bildirimleri görüntüleyebilirsiniz.</p>

    <div class="row">
      <div class="col-md-12">
        <table class="table table-hover table-striped table-bordered" style="width:100%;">
          <thead>
            <tr>
              <th> Metin</th>
              <th> Oluşturan</th>
              <th> Sınav</th>
              <th> Planlanan</th>
              <th> Gönderilme</th>
              <th style="width: 150px"> İşlem</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($notifications as $notification)
              <tr id="notification-{{ $notification->id }}" class="@if ($notification->sent_at !=null) success @else danger @endif">
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
                @if ($notification->sent_at !=null)
                  <td>{{  date("d.m.Y H:i", strtotime($notification->sent_at)) }}</td>
                @else
                  <td>Gönderilmedi</td>
                @endif
                <td>
                  <div class="btn-group" role="group">
                    <button type="button" notification-id="notification-{{$notification->id}}" class="send btn btn-primary">
                      <i class="fa fa-paper-plane" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="edit btn btn-warning">
                      <i class="fa fa-edit" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="delete btn btn-danger">
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
            <select name="exam_id" id="examselect" class="form-control">
              <option value="">Herkes</option>
              @foreach($exams as $exam)
                <option value="{{ $exam->id }}">{{ $exam->abb }} - {{  date("d.m.Y", strtotime($exam->date)) }}</option>
              @endforeach
            </select>
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
    var id = button.attr("notification-id");
    // var user_id = window.location.pathname.slice(0, -7).substr(12);
    if (confirm(id + " numaralı bildirimi silmek istediğinize emin misiniz?") == false) {
      return;
    }

    $.ajax({
      url: "/notification/" + id,
      method: "DELETE",
      success: function (result) {
        button.closest('tr').remove();
      },
      error: function (xhr, status, errorThrown) {
        alert("Sorry, there was a problem!");
        console.log("Error: " + errorThrown);
        console.log("Status: " + status);
        console.dir(xhr);
      },

    });
  });


  $('.send').click(function () {
    var button = $(this);
    var id = button.attr("notification-id");
    var message = $('#notification-message-' + id).text()
    swal({
      title: 'Emin misin?',
      text: id + ' numaralı bildirimi göndermek istediğinize emin misiniz?',
      html: '<strong>Mesaj</strong><br>' + message,
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then(function () {
      swal(
        'Deleted!',
        'Your file has been deleted.',
        'success'
      )
    })

    $.ajax({
      url: "/notification/" + id + "/send",
      method: "POST",
      data: [""],
      dataType: 'json',
      success: function (result) {
        console.log(result)
        location.reload();
      },
      error: function (xhr, status, errorThrown) {
        alert("Sorry, there was a problem!");
        console.log("Error: " + errorThrown);
        console.log("Status: " + status);
        console.dir(xhr);
      }
    });
  });


  </script>
@endsection
