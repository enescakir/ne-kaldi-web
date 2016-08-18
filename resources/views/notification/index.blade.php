@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bildirimler</h1>
        <p class="lead"> Buradan sistemdeki bütün bildirimleri görüntüleyebilirsiniz.</p>

        <div class="row">
            <div class="col-md-8">
                <table class="table table-hover table-striped table-bordered" style="width:100%;">
                    <thead>
                    <tr>
                        <th> Metin</th>
                        <th> Oluşturan</th>
                        <th> Planlanan</th>
                        <th> Gönderilme</th>
                        <th style="width: 150px"> İşlem</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($notifications as $notification)
                        <tr class="@if ($notification->sent_at !=null) success @else danger @endif">
                            <td>{{  $notification->message }} </td>
                            <td>{{  $notification->creator->name }} </td>
                            <td>{{  date("d.m.Y h:m", strtotime($notification->expected_at)) }}</td>
                            @if ($notification->sent_at !=null)
                                <td>{{  date("d.m.Y h:m", strtotime($notification->sent_at)) }}</td>
                            @else
                                <td>Gönderilmedi</td>
                            @endif
                            <td>
                                <button type="button" id="notification-{{$notification->id}}"
                                        class="send btn btn-primary">
                                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                </button>

                                <button type="button" id="notification-{{$notification->id}}"
                                        class="edit btn btn-warning">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </button>
                                <button type="button" id="notification-{{$notification->id}}"
                                        class="delete btn btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
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
                        <button type="submit" class="btn btn-lg btn-primary">Oluştur</button>
                    </div>

                </div>
                {!! Form::close() !!}

            </div>

        </div>
    </div>
@endsection

@section('page-scripts')

    <script src="{{ asset('scripts/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('scripts/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('scripts/bootstrap-datetimepicker.tr.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        $('#datetimepicker').datetimepicker({
            language: "tr",
            format: 'dd/mm/yyyy - hh:ii',
            autoclose: true,
            todayHighlight: true,
            minuteStep: 5
        });

        $('.delete').click(function () {
            var button = $(this);
            var prefix = "notification-"
            var id = button.attr("id").substr(prefix.length);
            // var user_id = window.location.pathname.slice(0, -7).substr(12);
            if (confirm(id + " numaralı bildirimi silmek istediğinize emin misiniz?") == false) {
                return;
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });
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
            var prefix = "notification-"
            var id = button.attr("id").substr(prefix.length);
            // var user_id = window.location.pathname.slice(0, -7).substr(12);
            if (confirm(id + " numaralı bildirimi göndermek istediğinize emin misiniz?") == false) {
                return;
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });
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