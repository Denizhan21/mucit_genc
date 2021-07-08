@extends('admin.template')

@section('icerik')
    <div class="row">
        <div class="col-lg-12">
            <div class="box">

                <div class="box-header with-border">
                    <h4 class="box-title">Haberler Tablosu</h4>
                </div>
                <div class="box-body no-padding">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>#</th>
                                <th>Başlık</th>
                                <th>Yüklenme Zamanı</th>
                                <th>Düzenle</th>
                                <th>Sil</th>
                            </tr>
                            @foreach($news  as $key=>$activity)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$activity->title}}</td>
                                    <td>{{$activity->created_at}}</td>
                                    <td><a class="btn btn-xs btn-warning" href="{{route('news.edit',$activity->id)}}"><i class="fa fa-pencil-square-o"></i></a></td>
                                    <td>
                                        {!! Form::open(['method'=>'DELETE','action'=>['NewsController@destroy',$activity->id],'style'=>'display:inline']) !!}
                                        <button onclick="return confirm('Emin misin?')" class="btn btn-xs btn-danger"><i class="fa fa-minus"></i></button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <ul class="pagination pagination-sm pull-right">
                            {{ $activities->links() }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')

@endsection

@section('js')
    <script>
        @if (session('alert'))
        swal({
            title:"Başarılı",
            text:"Haber Silindi",
            type: "success",
            timer:2000,
            showConfirmButton: false
        });
        @endif
        @if (session('no'))
        swal({
            title:"Başarısız",
            text:"Haber Silinemedi",
            type: "warning",
            timer:2000,
            showConfirmButton: false
        });
        @endif
    </script>
@endsection
