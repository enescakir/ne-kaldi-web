@extends('layouts.app')

@section('page-styles')
    <style>
        #chartdiv {
            width	: 100%;
            height	: 500px;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <h1>Ziyaretçiler
            <a type="button" href="{{ route('visitors.index') }}" class="btn btn-primary pull-right">
                <i class="glyphicon glyphicon-th-list"></i> Liste
            </a>
        </h1>
    <p class="lead"> Uygulamamızı indiren kişilerin istatistikleri</p>

        <div class="row">
            <div class="col-md-9">
                <div id="chartdiv"></div>
            </div>
            <div class="col-md-3">
                <div class="alert alert-info">
                    <h2><strong>İstatistikler</strong></h2>
                    <table style="width: 100%">
                        <tr>
                            <td style="text-align: right; padding-right: 5px;"><h3><strong>{{ $visitorsCount }}</strong></h3></td>
                            <td><h3> farklı kişi</h3></td>
                        </tr>
                        @foreach( $visitorDevices as $visitorDevice)
                            <tr>
                                <td style="text-align: right; padding-right: 5px;"><strong>{{ $visitorDevice->total }}</strong></td>
                                <td>{{ $visitorDevice->via }}</td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">
                    <h2><strong>{{ $visitorAPIs[1]->api_version }} -> </strong> {{ $visitorAPIs[1]->total }} %{{ $visitorAPIs[1]->total * 100 / ($visitorAPIs[0]->total + $visitorAPIs[1]->total + $visitorAPIs[2]->total) }}</h2>
                    <h2><strong>{{ $visitorAPIs[0]->api_version }} -> </strong> {{ $visitorAPIs[0]->total }} %{{ $visitorAPIs[0]->total * 100 / ($visitorAPIs[0]->total + $visitorAPIs[1]->total + $visitorAPIs[2]->total) }}</h2>
                    <h2><strong>Belirsiz -> </strong> {{ $visitorAPIs[2]->total }}</h2>
                </div>
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
@endsection
