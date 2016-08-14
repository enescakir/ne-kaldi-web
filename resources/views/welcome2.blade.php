<!DOCTYPE html>

<html lang="tr">
<head>
    <title>Sınava Ne Kaldı?</title>
    <meta charset="UTF-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Sınavınıza ne kadar kaldığınız öğrenin. YGS, LYS, KPSS, YDS, ALES, TUS" name="description">
    <meta content="sınav, ne kadar, zaman, ösym, ygs, lys, kpss, saat, sayaç, geri sayım, tus, dus, üniversite, okul" name="keywords">
    <meta content="Enes Çakır" name="author">

    <script src="http://code.jquery.com/jquery-latest.pack.js" type="text/javascript"></script>
    <script src="{{ asset('front/js/jquery.countdown.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment.js"></script>

    <link href='http://fonts.googleapis.com/css?family=Dosis:400,500,700&subset=latin,latin-ext' rel=
    'stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Fira+Mono:400,700&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('front/css/jquery.countdown.css') }}" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-selection__rendered{
            font-size:18px !important;
            color: #f9a227 !important;
            font-weight:400 !important;
            text-shadow: none !important;
        }

        .select2-container--default .select2-selection--single{
            padding:6px;
            height: 40px;
            font-size:30px !important;

        }

    </style>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <script type="text/javascript">
        $(function () {
            var austDay = new Date();
            $('#countceb').countdown({until: austDay,  timezone: +3,layout: '{dn} {dl}, {hn} {hl}, {mn} {ml}, {sn} {sl}', format: 'dhms'});
        });
    </script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-49890851-2', 'auto');
        ga('send', 'pageview');

    </script>
</head>

<body>
<div class="holder">
    <p><img class="logo-blink" style="width:30%" src="{{ asset('logo.png') }}"></p>
    <h1><span>Ne Kaldı?</span></h1><br>

    <h1><span class="tbl">
            <select id="exam_select">
                <option value="">Sınav seçiniz...</option>
                @foreach($exams as $exam)
                    <option value="{{ $exam->date }}">{{ $exam->abb }} - {{ $exam->name }} </option>
                @endforeach
            </select>
            ne kaldı?</span>
    </h1>
    <br>
    <br>

    <div id="countceb"></div>

    <p><img class="logo-blink" src="{{ asset('appstore.png') }}"></p>

    <p class="copyright"><br><span>&copy; 2016 | Geliştirici: <a href="http://www.enescakir.com" target="_blank">Enes Çakır</a></span></p>
</div>
<script type="text/javascript">
    $('#exam_select').select2({
        width:400
    });

    $('select').on('select2:select', function (evt) {
        $('#countceb').countdown('destroy')
        console.log($("#exam_select").val())
        var dayString = $("#exam_select").val()
        if ( dayString == ""){
            var newDay = new Date();
        }
        else{
            var newDay = moment(dayString, "YYYY-MM-DD HH:mm:ss").toDate();
        }
        $('#countceb').countdown({until: newDay,  timezone: +3,layout: '{dn} {dl}, {hn} {hl}, {mn} {ml}, {sn} {sl}', format: 'dhms'});
    });

</script>

</body>
</html>