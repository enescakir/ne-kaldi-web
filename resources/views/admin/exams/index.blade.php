<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Sınavlar</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>.pkt_added {text-decoration:none !important;}</style></head>

<body>

<div class="container">
    <h1>Ne Kaldı? Sınavlar</h1>
    <p class="lead"> Buradan sisteme yeni sınavlar ekleyebilirsiniz. Varolan sınavları silebilirsiniz.</p>

    <div class="row">
        <div class="col-md-6">
                <table class="table table-hover table-striped table-bordered" style="width:100%;">
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

        <div class="col-md-6">
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
                    <button type="submit" class="btn btn-lg btn-primary">Oluştur</button>
                </div>

            </div>
            {!! Form::close() !!}

        </div>

    </div>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


</body>
</html>