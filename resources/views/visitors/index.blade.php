@extends('layouts.app')

@section('page-styles')
@endsection

@section('content')
    <div class="container">
    <h1>Ziyaretçiler - {{ number_format($visitors->total(), 0, ".", ",") }} kişi
        <a type="button" href="{{ route('visitors.statistics') }}" class="btn btn-primary pull-right">
            <i class="glyphicon glyphicon-signal"></i> İstatistikler
        </a>
    </h1>
    <p class="lead"> Uygulamamızı indiren kişilerin listesi</p>

    <div class="row">
        <div class="col-md-12">
            {!! $visitors->links() !!}
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
                    <th style="width:90px"> İşlem </th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($visitors as $visitor)
                    <tr id="visitor-{{ $visitor->id }}">
                        <td> {{ $visitor->id }} </td>
                        <td> {{ $visitor->created_at }} </td>
                        <td> {{ $visitor->name }} </td>
                        <td> {{ $visitor->email }} </td>
                        <td> {{ $visitor->player_id ? 'Var' : 'Yok'}} </td>
                        <td> {{ $visitor->via }} </td>
                        <td> {{ $visitor->visits_count }} </td>
                        <td> {{ $visitor->favorites_count }} </td>
                        <td> {{ $visitor->custom_exams_count }} </td>
                        <td>
                          <div class="btn-group" role="group">
                            <a type="button" href="{{ route('visitors.show', $visitor->id) }}" class="show btn btn-primary btn-sm">
                              <i class="fa fa-search" aria-hidden="true"></i>
                            </a>
                            <button type="button" visitor-id="{{ $visitor->id }}" class="delete btn btn-danger btn-sm">
                              <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                          </div>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


@section('page-scripts')
<script type="text/javascript">
$('.delete').click(function () {
  var button = $(this);
  var id = button.attr('visitor-id');
  swal({
    title: 'Silmek istediğine emin misin?',
    html: '#' + id + ' numaralı ziyaretçiyi silmek istediğine emin misin?',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'İptal',
    confirmButtonText: 'Evet, sil!',
    showLoaderOnConfirm: true,
    preConfirm: function () {
      return new Promise(function (resolve, reject) {
        $.ajax({
          url: "/visitors/" + id,
          method: "DELETE",
          success: function (result) {
            resolve(result)
          },
          error: function (xhr, status, errorThrown) {
            reject()
            ajaxError(xhr, status, errorThrown)
          }
        });
      })
    },
    allowOutsideClick: false,
  }).then(function (result) {
    $('#visitor-' + id).remove()
    swal(
      'Silinti!',
      'Ziyaretçi başarıyla silindi',
      'success'
    )
  })
});
</script>
@endsection
