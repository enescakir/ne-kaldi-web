<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="_token" content="{{ csrf_token() }}" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Ne Kaldı?</title>

  <!-- Fonts -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
  {{--<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700&subset=latin-ext" rel='stylesheet' type='text/css'>--}}
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&subset=latin-ext" rel="stylesheet" type='text/css'>

  <!-- Styles -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('styles/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('styles/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('styles/select2.min.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('styles/summernote.css') }}" rel="stylesheet" type="text/css"/>

  <style>
  body {
    font-family: 'Open Sans', sans-serif;
  }

  .fa-btn {
    margin-right: 6px;
  }
  </style>
  @yield('page-styles')

</head>
<body id="app-layout">
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">

        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/') }}">
          Ne Kaldı?
        </a>
      </div>

      <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav">
          <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              Sınavlar <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('exams.index') }}">Merkezi Sınavlar</a></li>
              <li><a href="{{ route('exams.customs.index') }}">Kullanıcı Sınavları</a></li>
            </ul>
          </li>

          <li><a href="{{ route('visits.index') }}">Ziyaretler</a></li>
          <li><a href="{{ route('favorites.index') }}">Favoriler</a></li>
          <li><a href="{{ route('visitors.statistics') }}">Ziyaretçiler</a></li>
          <li><a href="{{ route('notification.index') }}">Bildirimler</a></li>
          <li><a href="{{ route('log-viewer::logs.list') }}">Loglar</a></li>
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
          <!-- Authentication Links -->
          @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Giriş</a></li>
            <li><a href="{{ url('/register') }}">Kayıt Ol</a></li>
          @else
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Çıkış</a></li>
              </ul>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    @if (Session::has('success_message'))
      <div class="alert alert-success fade in">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          {!! Session::pull('success_message')  !!}
        </div>
      @endif
      @if (Session::has('info_message'))
        <div class="alert alert-success fade in">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            {!! Session::pull('info_message')  !!}
          </div>
        @endif
        @if (Session::has('error_message'))
          <div class="alert alert-success fade in">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              {!! Session::pull('error_message')  !!}
            </div>
          @endif
        </div>

        @yield('content')

        <!-- JavaScripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
        <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
        <script src="https://www.amcharts.com/lib/3/serial.js"></script>
        <script src="https://www.amcharts.com/lib/3/pie.js"></script>
        <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
        <script src="https://www.amcharts.com/lib/3/lang/tr.js"></script>
        <script src="{{ asset('scripts/moment.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('scripts/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('scripts/bootstrap-datetimepicker.tr.js') }}" type="text/javascript"></script>
        <script src="{{ asset('scripts/sweetalert2.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('scripts/select2.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('scripts/summernote.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('scripts/summernote-tr-TR.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript">
        $.ajaxSetup({ headers: { 'X-CSRF-Token': $('meta[name="_token"]').attr('content') } });
        $(function() {

          $('.summernote').summernote({
            height: 150,
            toolbar: [
              ['style', ['bold', 'italic', 'underline', 'clear']],
              ['insert', ['picture', 'link', 'video']],
              ['color', ['color']],
              ['para', ['style', 'ul', 'ol', 'paragraph']],
            ]
          });

          $('.datetime-picker').datetimepicker({
            language: "tr",
            format: 'dd/mm/yyyy - hh:ii',
            autoclose: true,
            todayHighlight: true,
            minuteStep: 5
          });

          $('.date-picker').datetimepicker({
            language: "tr",
            format: 'dd/mm/yyyy',
            autoclose: true,
            todayHighlight: true,
          });

          $(".select2").select2({
          });

          $('[data-toggle="popover"]').popover();
        });


        function ajaxError(xhr, ajaxOptions, thrownError) {
          console.log("XHR:");
          console.log(xhr);
          console.log("Ajax Options:");
          console.log(ajaxOptions);
          console.log("Thrown Error:");
          console.log(thrownError);
          swal({
            title: "Bir hata ile karşılaşıldı!",
            type: "error",
            confirmButtonText: "Tamam",
          });
        }

        </script>
        @yield('page-scripts')
      </body>
      </html>
