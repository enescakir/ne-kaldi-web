@extends('layouts.app')


@section('page-styles')
    @include('log-viewer::_template.style')
@endsection

@section('content')
    <div class="container">
        <h1 class="page-header">Genel Görünüm</h1>
        <div class="row">
            <div class="col-md-3">
                <canvas id="stats-doughnut-chart"></canvas>
            </div>
            <div class="col-md-9">
                <section class="box-body">
                    <div class="row">
                        @foreach($percents as $level => $item)
                            <div class="col-md-4">
                                <div class="info-box level level-{{ $level }} {{ $item['count'] === 0 ? 'level-empty' : '' }}">
                                    <span class="info-box-icon">
                                        {!! log_styler()->icon($level) !!}
                                    </span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">{{ $item['name'] }}</span>
                                        <span class="info-box-number">
                                            {{ $item['count'] }} girdi - {!! $item['percent'] !!} %
                                        </span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: {{ $item['percent'] }}%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.1/moment-with-locales.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.15.35/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        Chart.defaults.global.responsive      = true;
        Chart.defaults.global.scaleFontFamily = "'Source Sans Pro'";
        Chart.defaults.global.animationEasing = "easeOutQuart";
    </script>
    <script>
        $(function() {
            var data = {!! $reports !!};

            new Chart($('#stats-doughnut-chart')[0].getContext('2d'))
                .Doughnut(data, {
                    animationEasing : "easeOutQuart"
                });
        });
    </script>
@endsection
