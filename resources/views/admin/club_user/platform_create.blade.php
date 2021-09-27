@extends('admin.template')
@section('icerik')
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Platform Bilgisi Ekle</h4>
                    <ul class="box-controls pull-right">
                        <li><a class="box-btn-close" href="#"></a></li>
                        <li><a class="box-btn-slide" href="#"></a></li>
                        <li><a class="box-btn-fullscreen" href="#"></a></li>
                    </ul>
                </div>
                {!! Form::open(['route'=>['platform_store'],'method'=>'POST','files'=>'true','class'=>'form-horizontal']) !!}
    <form method="POST" action="{{route('schools.store')}}" class="form-horizontal" enctype="multipart/form-data" onsubmit="return ajaxekle();" id="ajax-form">
                        {{csrf_field()}}

                <div class="box-body">
                    <div class="form-group">
                        <label for="example_input_full_name">Kullanıcı Adı:</label>
                        <input id="name" type="text" class="form-control"  name="user_name" required>
                    </div>
                </div>

                <input type="hidden" name="user_id" value="{{$_GET['user']}}">

                <div class="box-body">
                    <div class="form-group">
                        <label for="example_input_full_name">Şifre:</label>
                        <input id="name" type="text" class="form-control"  name="password" required>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="example_input_full_name">Link:</label>
                        <input id="name" type="text" class="form-control"  name="link" required>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="example_input_full_name">Resim:</label>
                        <input id="name" type="file" class="form-control"  name="images" >
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label>Durum:</label>
                        <div class="controls">
                            <select name="status" id="select" class="form-control">
                                <option selected value="0">Pasif</option>
                                <option value="1">Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label>Herkese Açık/Kapalı:</label>
                        <div class="controls">
                            <select name="authority" id="select" class="form-control">
                                <option selected value="0">Kapalı</option>
                                <option value="1">Açık</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{route('schools.index')}}" style="color: white" class="btn btn-danger">Geri Dön</a>
                    <button type="submit" class="btn btn-success pull-right">Platform Ekle</button>
                </div>
                {!! Form::close() !!}
                </form>

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
            text:"Platform Eklendi",
            type: "success",
            timer:2000,
            showConfirmButton: false
        });
        @endif
        @if (session('no'))
        swal({
            title:"Hata",
            text:"Platform Eklenemedi",
            type: "warning",
            timer:2000,
            showConfirmButton: false
        });
        @endif
    </script>
@endsection
