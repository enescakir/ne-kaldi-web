@extends('layouts.app')

@section('page-styles')
@endsection

@section('content')
    <div class="container">
    <h1>Ziyaretçiler
        <a type="button" href="{{ route('visitors.statistics') }}" class="btn btn-primary pull-right">
            <i class="glyphicon glyphicon-signal"></i> İstatistikler
        </a>
    </h1>
    <p class="lead"> Uygulamamızı indiren kişilerin listesi</p>

    <div class="row">
        <div class="col-md-12">
            <table id="visitors-table" class="table table-hover table-striped table-bordered" style="width:100%;">
                <thead>
                <tr>
                    <th> # </th>
                    <th> Tarih </th>
                    <th> İsim </th>
                    <th> E-posta </th>
                    <th> Bildirim </th>
                    <th> Via </th>
                    <th> Ziyaret </th>
                    <th> Favori </th>
                    <th> Sınav </th>
                    <th style="width: 50px"> İşlem </th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                    <th> # </th>
                    <th> Tarih </th>
                    <th> İsim </th>
                    <th> E-posta </th>
                    <th>
                        <select>
                            <option value="">Hepsi</option>
                            <option value="Var">Var</option>
                            <option value="Yok">Yok</option>
                        </select>
                    </th>
                    <th>
                        <select>
                            <option value="">Hepsi</option>
                            <option value="Simulator">Simulator</option>
                            <option value="iPhone 5S">iPhone 5S</option>
                            <option value="iPhone 6S">iPhone 6S</option>
                        </select>
                    </th>
                    <th> Ziyaret </th>
                    <th> Favori </th>
                    <th> Sınav </th>
                    <th></th>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection


@section('page-scripts')

@endsection
