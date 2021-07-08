@extends('admin.template')

@section('icerik')
    <div class="row">
        <div class="col-lg-12">
            <div class="box">

                <div class="box-header with-border">
                    <h4 class="box-title">Etkinlikler Tablosu</h4>
                </div>
                <div class="box-body no-padding">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>#</th>
                                <th>Yorum Yapan</th>
                                <th>Yorum Yapılma Tarihi</th>
                                <th>Yorum Durum</th>
                                <th>Düzenle</th>
                                <th>Sil</th>
                            </tr>
                            @foreach($comments  as $key=>$activity)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$activity->user->name}}</td>
                                    <td>{{$activity->created_at}}</td>
                                    <td>{{$activity->status}}</td>
                                    <td><a class="btn btn-xs btn-warning" href="{{route('comments.edit',$activity->id)}}"><i class="fa fa-pencil-square-o"></i></a></td>
                                    <td>
                                        {!! Form::open(['method'=>'DELETE','action'=>['CommentController@destroy',$activity->id],'style'=>'display:inline']) !!}
                                        <button onclick="return confirm('Emin misin?')" class="btn btn-xs btn-danger"><i class="fa fa-minus"></i></button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <ul class="pagination pagination-sm pull-right">
                            {{ $comments->links() }}
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
            text:"Etkinlik Silindi",
            type: "success",
            timer:2000,
            showConfirmButton: false
        });
        @endif
        @if (session('no'))
        swal({
            title:"Başarısız",
            text:"Etkinlik Silinemedi",
            type: "warning",
            timer:2000,
            showConfirmButton: false
        });
        @endif
    </script>
@endsection
