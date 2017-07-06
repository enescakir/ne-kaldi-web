@extends('layouts.app')

@section('page-styles')
    <style>
        #chartdiv {
            width	: 100%;
            height	: 500px;
        }
        #piediv {
            width	: 100%;
            height	: 700px;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <h1>Ziyaretçiler - {{ number_format($visitorsCount, 0, ".", ",") }} kişi
            <a type="button" href="{{ route('visitors.index') }}" class="btn btn-primary pull-right">
                <i class="glyphicon glyphicon-th-list"></i> Liste
            </a>
        </h1>
    <p class="lead"> Uygulamamızı indiren kişilerin istatistikleri</p>
        <div class="row">
            <div class="col-md-12">
                <div id="chartdiv"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
              <div id="piediv"> </div>
            </div>
        </div>
    </div>
@endsection


@section('page-scripts')
    <script type="text/javascript">
        var datas = <?php echo json_encode($visitorsDaily) ?>;
        var chart = AmCharts.makeChart("chartdiv", {
            "type": "serial",
            "theme": "light",
            "language": "tr",
            "marginRight": 40,
            "marginLeft": 40,
            "autoMarginOffset": 20,
            "mouseWheelZoomEnabled":true,
            "dataDateFormat": "YYYY-MM-DD",
            "valueAxes": [{
                "id": "v1",
                "axisAlpha": 0,
                "position": "left",
                "ignoreAxisWidth":true
            }],
            "balloon": {
                "borderThickness": 1,
                "shadowAlpha": 0
            },
            "graphs": [{
                "id": "g1",
                "balloon":{
                    "drop":true,
                    "adjustBorderColor":false,
                    "color":"#ffffff"
                },
                "bullet": "round",
                "bulletBorderAlpha": 1,
                "bulletColor": "#FFFFFF",
                "bulletSize": 5,
                "hideBulletsCount": 50,
                "lineThickness": 2,
                "title": "red line",
                "useLineColorForBulletBorder": true,
                "valueField": "value",
                "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
            }],
            "chartScrollbar": {
                "graph": "g1",
                "oppositeAxis":false,
                "offset":30,
                "scrollbarHeight": 80,
                "backgroundAlpha": 0,
                "selectedBackgroundAlpha": 0.1,
                "selectedBackgroundColor": "#888888",
                "graphFillAlpha": 0,
                "graphLineAlpha": 0.5,
                "selectedGraphFillAlpha": 0,
                "selectedGraphLineAlpha": 1,
                "autoGridCount":true,
                "color":"#AAAAAA"
            },
            "chartCursor": {
                "pan": true,
                "valueLineEnabled": true,
                "valueLineBalloonEnabled": true,
                "cursorAlpha":1,
                "cursorColor":"#258cbb",
                "limitToGraph":"g1",
                "valueLineAlpha":0.2,
                "valueZoomable":true
            },
            "valueScrollbar":{
                "oppositeAxis":false,
                "offset":50,
                "scrollbarHeight":10
            },
            "categoryField": "date",
            "categoryAxis": {
                "parseDates": true,
                "dashLength": 1,
                "minorGridEnabled": true
            },
            "export": {
                "enabled": true
            },
            "dataProvider": datas
        });
        chart.addListener("rendered", zoomChart);
        zoomChart();
        function zoomChart() {
            chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
        }
    </script>
    <script>
        var pie_datas = <?php echo json_encode($visitorDevices) ?>;
        var pie_chart = AmCharts.makeChart("piediv", {
            "type": "pie",
            "startDuration": 0,
            "theme": "light",
            "addClassNames": true,
            "legend":{
                "position":"right",
                "marginRight":100,
                "autoMargins":false
            },
            "innerRadius": "30%",
            "defs": {
                "filter": [{
                    "id": "shadow",
                    "width": "200%",
                    "height": "200%",
                    "feOffset": {
                        "result": "offOut",
                        "in": "SourceAlpha",
                        "dx": 0,
                        "dy": 0
                    },
                    "feGaussianBlur": {
                        "result": "blurOut",
                        "in": "offOut",
                        "stdDeviation": 5
                    },
                    "feBlend": {
                        "in": "SourceGraphic",
                        "in2": "blurOut",
                        "mode": "normal"
                    }
                }]
            },
            "dataProvider": pie_datas,
            "valueField": "total",
            "titleField": "via",
            "export": {
                "enabled": true
            }
        });
    </script>
@endsection
