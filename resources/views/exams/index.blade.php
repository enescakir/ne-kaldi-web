@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>Sınavlar</h1>
    <p class="lead"> Buradan sisteme yeni sınavlar ekleyebilirsiniz. Varolan sınavları silebilirsiniz.</p>

    <div class="row">
        <div class="col-md-8">
            <table class="table table-hover table-striped table-bordered" style="width:100%;">
                <thead>
                <tr>
                    <th> Sınav </th>
                    <th> Kısaltma </th>
                    <th style="width: 150px"> Tarih </th>
                    <th style="width: 150px"> İşlem </th>
                </tr>
                </thead>
                <tbody>
                @forelse ($exams as $exam)
                    <tr class="@if ($exam->activated == 1) success @else danger @endif">
                        <td>{{  $exam->name }} </td>
                        <td>{{  $exam->abb }} </td>
                        <td>{{  date("d.m.Y h:m", strtotime($exam->date)) }}</td>
                        <td>
                            <button type="button" id="exam-{{$exam->id}}" class="activate btn btn-primary">
                                <i class="fa fa-refresh" aria-hidden="true"></i>
                            </button>

                            <button type="button" id="exam-{{$exam->id}}" class="edit btn btn-warning">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </button>
                            <button type="button" id="exam-{{$exam->id}}" class="delete btn btn-danger">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>

                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Sınav yok</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            {!! Form::open(['route' => 'exams.store', 'method' => 'POST']) !!}
            <div class="portlet-body">
                <div class="form-group">
                    {!! Form::label( 'name', 'Sınavın Adı',['class' => 'control-label']) !!} <span class="required">* </span>
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Yüksek Öğretim Sınavı']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label( 'abb', 'Kısaltma',['class' => 'control-label']) !!} <span class="required">* </span>
                    {!! Form::text('abb', null, ['class' => 'form-control', 'placeholder' => 'YGS']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label( 'date', 'Tarihi',['class' => 'control-label']) !!} <span class="required">* </span>
                    {!! Form::text('date', null, ['class' => 'form-control', 'placeholder' => 'örn: 18/03/2015 - 10:00', 'id' => 'datetimepicker']) !!}

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

        $('.delete').click(function(){
            var button = $(this);
            var prefix = "exam-"
            var id = button.attr("id").substr(prefix.length);
            // var user_id = window.location.pathname.slice(0, -7).substr(12);
            if (confirm( id +" numaralı sınavı silmek istediğınizden emin misiniz") == false) {
                return;
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url:  "/exams/" + id,
                method: "DELETE",
                success: function(result){
                    button.closest('tr').remove();
                },
                error: function( xhr, status, errorThrown ) {
                    alert( "Sorry, there was a problem!" );
                    console.log( "Error: " + errorThrown );
                    console.log( "Status: " + status );
                    console.dir( xhr );
                },

            });
        });

        $('.activate').click(function(){
            var button = $(this);
            var prefix = "exam-"
            var id = button.attr("id").substr(prefix.length);
            // var user_id = window.location.pathname.slice(0, -7).substr(12);
            if (confirm( id +" numaralı sınavı onaylamak istediğınizden emin misiniz") == false) {
                return;
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url:  "/exams/" + id + "/activate",
                method: "POST",
            }).done(function() {
                location.reload();
            });
        });


    </script>
@endsection
