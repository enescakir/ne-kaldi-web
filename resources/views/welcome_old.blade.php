<!DOCTYPE html>

<html lang="tr">
<head>
    <title>Sınava Ne Kaldı?</title>
    <meta charset="UTF-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no" name="viewport">
    <meta content="Ne Kaldı, öğrenim hayatımızda önemli yer tutan büyük sınavlara, ne kadar süremiz kaldığını hatırlatan geri sayım uygulamasıdır." name="description">
    <meta content="sınav, ne kadar, zaman, ösym, ygs, lys, kpss, saat, sayaç, geri sayım, tus, dus, üniversite, okul" name="keywords">
    <meta content="Enes Çakır" name="author">

    <script src="http://code.jquery.com/jquery-latest.pack.js" type="text/javascript"></script>
    <script src="{{ asset('front/js/jquery.plugin.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('front/js/jquery.countdown.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment.js"></script>

    <link href='http://fonts.googleapis.com/css?family=Dosis:400,500,700&subset=latin,latin-ext' rel=
    'stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Fira+Mono:400,700&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link href="{{ asset('front/css/jquery.countdown.css') }}" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <style>
        body {
            color: #242424;
            background-color: #f4eee2;
            text-align: center;
        }

        .title {
            color: #f9a227 !important;
            font-family: Fira Mono, Tahoma, sans-serif;
            font-size: 3em;
            font-weight: bold;
            text-shadow: -1px 1px 1px rgba(0, 0, 0, 0.3);
        }

        .logo {
            padding-top: 100px;
            width: 60%;
            margin: auto;
            margin-bottom: 20px;

        }

        .copyright {
            border-top: 2px dashed #E0E0E0;
            bottom: 5px;
            margin-top: 20px;
            padding: 20px;
        }

        p.copyright span {
            line-height: 3em;
        }

        .select2{
            margin-top: 100px;
            width: 100% !important;

        }
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
        #countceb {
            margin-top:30px;
            font-family: Fira Mono, Tahoma, sans-serif;
            font-size: 2.5em;
            color: #f9a227;
            line-height: 1em;
            font-weight: 400;
            letter-spacing: -1px;
            line-height: 1;
            text-shadow: -1px 1px 1px rgba(0, 0, 0, 0.3);
        }
        .appstore{
            margin: auto;
            margin-top:50px;
        }
        .is-countdown {
            border: 0px;
            background-color: #f4eee2;
        }

        a {
            color: #e5512d;
            text-decoration: none;
        }

        @media screen and (max-width: 480px) {
            .select2{
                margin-top: 30px;
                width: 90% !important;
            }
            #countceb {
                margin-top:20px;
                font-size: 1.8em;
            }
            .logo {
                padding-top: 40px;
                width: 50%;
            }
        }
        @media (max-width: 768px) and (min-width: 480px) {
            .select2{
                margin-top: 30px;
                width: 70% !important;
            }
            #countceb {
                margin-top:20px;
                font-size: 2.5em;
            }
            .logo {
                padding-top: 40px;
                width: 40%;
            }
        }

        @media (min-width: 768px) and (max-width: 1024px) {
            #countceb {
                margin-top:20px;
                font-size: 2em;
            }

        }
    </style>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <script type="text/javascript">
        $(function () {
            var austDay = new Date();
            $('#countceb').countdown({until: austDay,  timezone: +3, format: 'dhmS'});
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
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-md-12">
                    <img class=" logo img-responsive" src="{{ asset('logo.png') }}">
                </div>
                <div class="col-md-12">
                    <p class="title">Ne Kaldı?</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6" class="right">
            <div class="row">
                <div class="col-md-12">
                    <select id="exam_select">
                        <option value="">Sınav seçiniz...</option>
                        @foreach($exams as $exam)
                            <option value="{{ $exam->date }}">{{ $exam->abb }} - {{ $exam->name }} </option>
                        @endforeach
                    </select>
                    <h3>ne kaldı?</h3>
                </div>
                <div class="col-md-12">
                    <div id="countceb"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3">
                    {{--<a href="https://itunes.apple.com/tr/app/ne-kald-ygs-lys-kpss-yds-tus/id1143832546">--}}
                        {{--<img class="appstore img-responsive" src="{{ asset('appstore.png') }}">--}}
                    {{--</a>--}}
                    <div class="appstore">
                        <a href="https://itunes.apple.com/tr/app/ne-kald-ygs-lys-kpss-yds-tus/id1143832546?mt=8" style="display:inline-block;overflow:hidden;background:url(https://linkmaker.itunes.apple.com/images/badges/en-us/badge_appstore-lrg.svg) no-repeat;width:165px;height:40px;"></a>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <br>
    <br>
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
        $('#countceb').countdown({until: newDay,  timezone: +3, format: 'dhmS'});
    });

</script>

</body>
</html>