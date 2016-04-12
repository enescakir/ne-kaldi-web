<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        padding: 15px;
    }

    table tr:nth-child(even) {
        background-color: #eee;
    }
    table tr:nth-child(odd) {
        background-color: #fff;
    }
    table th {
        color: white;
        background-color: black;
    }

</style>
<div class="table-scrollable">
    <table class="table table-hover" style="width:50%;">
        <thead>
        <tr>
            <th> Sınav </th>
            <th> Kısaltma </th>
            <th> Tarih </th>
        </tr>
        </thead>
        <tbody>
        @forelse ($exams as $exam)
            <tr>
                <td>{{  $exam->name }} </td>
                <td>{{  $exam->abb }} </td>
                <td>{{  date("d.m.Y h:s", strtotime($exam->date)) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Sınav yok</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

{!! Form::open(['route' => 'admin.exams.store', 'method' => 'POST']) !!}
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
                {!! Form::text('date', null, ['class' => 'form-control', 'placeholder' => 'örn: 18/03/2015 10:00']) !!}
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-lg green-jungle">OLUŞTUR</button>
            </div>

        </div>
{!! Form::close() !!}
