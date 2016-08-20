@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sınavlar
            <a type="button" href="{{ route('exams.create') }}" class="btn btn-primary pull-right">
                <i class="glyphicon glyphicon-plus"></i> Yeni Ekle
            </a>
        </h1>
        <p class="lead"> Buradan sisteme yeni sınavlar ekleyebilirsiniz. Varolan sınavları silebilirsiniz.</p>
    <div class="row">
        <div class="col-md-6">
            <h3>Gelecek Sınavlar</h3>
            <table class="table table-hover table-striped table-bordered" style="width:100%;">
                <thead>
                <tr>
                    <th> Sınav </th>
                    <th> Kısaltma </th>
                    <th style="width: 150px"> Tarih </th>
                    <th> Gösterim </th>
                    <th style="width: 150px"> İşlem </th>
                </tr>
                </thead>
                <tbody>
                @forelse ($exams as $exam)
                    <tr class="@if ($exam->activated == 1) success @else danger @endif">
                        <td>{{  $exam->name }} </td>
                        <td>{{  $exam->abb }} </td>
                        <td>{{  date("d.m.Y H:i", strtotime($exam->date)) }}</td>
                        <td>{{  $exam->visits_count }} </td>
                        <td>
                            <button type="button" id="exam-{{$exam->id}}" class="activate btn btn-info">
                                <i class="fa fa-refresh" aria-hidden="true"></i>
                            </button>

                            <a type="button" href="{{ route( 'exams.edit', $exam->id ) }}" class="edit btn btn-warning">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </a>
                            <button type="button" id="exam-{{$exam->id}}" class="delete btn btn-danger">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>

                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Gelecek sınav yok</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h3>Geçmiş Sınavlar</h3>
            <table class="table table-hover table-striped table-bordered" style="width:100%;">
                <thead>
                <tr>
                    <th> Sınav </th>
                    <th> Kısaltma </th>
                    <th style="width: 150px"> Tarih </th>
                    <th> Gösterim </th>
                    <th style="width: 150px"> İşlem </th>
                </tr>
                </thead>
                <tbody>
                @forelse ($passed_exams as $exam)
                    <tr class="@if ($exam->activated == 1) success @else danger @endif">
                        <td>{{  $exam->name }} </td>
                        <td>{{  $exam->abb }} </td>
                        <td>{{  date("d.m.Y H:i", strtotime($exam->date)) }}</td>
                        <td>{{  $exam->visits_count }} </td>
                        <td>
                            <button type="button" id="exam-{{$exam->id}}" class="activate btn btn-info">
                                <i class="fa fa-refresh" aria-hidden="true"></i>
                            </button>

                            <a type="button" href="{{ route( 'exams.edit', $exam->id ) }}" class="edit btn btn-warning">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </a>
                            <button type="button" id="exam-{{$exam->id}}" class="delete btn btn-danger">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>

                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Geçmiş sınav yok</td>
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
