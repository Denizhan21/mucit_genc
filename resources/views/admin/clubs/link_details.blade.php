@extends('admin.template')
@section('icerik')
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Platform Bilgisi Düzenle</h4>
                    <ul class="box-controls pull-right">
                        <li><a class="box-btn-close" href="#"></a></li>
                        <li><a class="box-btn-slide" href="#"></a></li>
                        <li><a class="box-btn-fullscreen" href="#"></a></li>
                    </ul>
                </div>
                {!! Form::model($link,['route'=>['link_update',$link->id],'method'=>'PUT','files'=>'true','class'=>'form-horizontal']) !!}
                {{--                <form method="PUT" action="{{route('schools.update',$school->id)}}" class="form-horizontal" enctype="multipart/form-data" onsubmit="return ajaxekle();" id="ajax-form">--}}
                {{--                    {{csrf_field()}}--}}
                <div class="box-body">
                    <div class="form-group">
                        <label for="example_input_full_name">Link:</label>
                        <input id="name" type="text" class="form-control"  name="link" required value="{{$link->link}}">
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label>Durum:</label>
                        <div class="controls">
                            <select name="status" id="select" class="form-control">
                                <option value="0" {{$link->status==0?'selected':''}}>Pasif</option>
                                <option value="1" {{$link->status==1?'selected':''}}>Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label>Herkese Açık/Kapalı:</label>
                        <div class="controls">
                            <select name="authority" id="select" class="form-control">
                                <option value="0" {{$link->authority==0?'selected':''}}>Kapalı</option>
                                <option value="1" {{$link->authority==1?'selected':''}}>Açık</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{route('schools.index')}}" style="color: white" class="btn btn-danger">Geri Dön</a>
                    <button type="submit" class="btn btn-success pull-right">Okul Düzenle</button>
                </div>
                {!! Form::close() !!}
                {{--                </form>--}}
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
            text:"Okul Düzenlendi",
            type: "success",
            timer:2000,
            showConfirmButton: false
        });
        @endif
        @if (session('no'))
        swal({
            title:"Hata",
            text:"Okul Düzenlenemedi",
            type: "warning",
            timer:2000,
            showConfirmButton: false
        });
        @endif
    </script>
@endsection
