@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>Ziyaretler</h1>
    <p class="lead"> Sistemden görüntülenmiş sınavlar.</p>

    <div class="row">
        <div class="col-md-12">
            <h3>Toplam {{ $visits_count }} ziyaret</h3>
            <div id="pie-chart" style="height:700px;"> </div>
        </div>
    </div>
</div>
@endsection

@section('page-scripts')
    <script>
        var datas = <?php echo json_encode($exams) ?>;
        var chart = AmCharts.makeChart("pie-chart", {
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
            "dataProvider": datas,
            "valueField": "visits_count",
            "titleField": "category",
            "export": {
                "enabled": true
            }
        });
    </script>
@endsection
