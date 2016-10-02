@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mesajlar</h1>
        <p class="lead"> Kullanıcılarımızdan gelen mesajlar.</p>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover table-striped table-bordered" style="width:100%;">
                    <thead>
                    <tr>
                        <th> Mesaj</th>
                        <th> İsim</th>
                        <th> E-posta</th>
                        <th> Cevaplayan</th>
                        <th style="width: 150px"> İşlem</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($tickets as $ticket)
                        <tr class="@if ($notification->answered_at != null) success @else danger @endif">
                            <td>{{  $ticket->message }} </td>
                            <td>{{  $ticket->visitor->name }} </td>
                            <td>{{  $ticket->visitor->email }} </td>
                            <td>
                                @if ($ticket->answered_by == null)
                                    -
                                @else
                                    {{ $ticket->answered_by }}
                                @endif
                            </td>
                            <td>
                                <button type="button" id="notification-{{$ticket->id}}"
                                        class="btn btn-primary">
                                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                </button>
                                <button type="button" id="notification-{{$ticket->id}}"
                                        class="btn btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Mesaj bulunmamaktadır.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
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