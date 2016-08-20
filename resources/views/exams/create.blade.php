@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>Yeni Sınav Ekle</h1>
    <p class="lead"> Buradan sisteme yeni sınavlar ekleyebilirsiniz</p>

    <div class="row">
        <div class="col-md-1"></div>
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
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <div class="alert alert-info" role="alert">
                <h4>Tahmini Saatler</h4>
                <ul>
                    <li><strong>DGS</strong> => 09:30</li>
                    <li><strong>YDS</strong> => 09:30</li>
                    <li><strong>DUS</strong> => 09:30</li>
                    <li><strong>TUS</strong> => 09:30</li>
                    <li><strong>KPSS</strong> => 09:30</li>
                    <li><strong>DHBT</strong> => 09:30</li>
                    <li><strong>ALES</strong> => 09:30</li>
                    <li><strong>İSG</strong> => 09:30</li>
                    <li><strong>YDUS</strong> => 09:30</li>
                    <li><strong>ÖABT</strong> => 09:30</li>
                    <li><strong>YGS</strong> => 10:00</li>
                    <li><strong>e-YDS</strong> => 14:00</li>
                </ul>
            </div>
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
