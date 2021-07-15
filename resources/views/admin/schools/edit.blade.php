@extends('admin.template')
@section('icerik')
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Okul Düzenle</h4>
                    <ul class="box-controls pull-right">
                        <li><a class="box-btn-close" href="#"></a></li>
                        <li><a class="box-btn-slide" href="#"></a></li>
                        <li><a class="box-btn-fullscreen" href="#"></a></li>
                    </ul>
                </div>
{{--                {!! Form::model($school,['route'=>['schools.update',$school->id],'method'=>'PUT','files'=>'true','class'=>'form-horizontal']) !!}--}}
                <form method="PUT" action="{{route('schools.update',$school->id)}}" class="form-horizontal" enctype="multipart/form-data" onsubmit="return ajaxekle();" id="ajax-form">
                    {{csrf_field()}}
                <div class="box-body">
                    <div class="form-group">
                        <label for="example_input_full_name">Okul İsmi:</label>
                        <input id="name" type="text" class="form-control"  name="name" required value="{{$school->name}}">
                    </div>
                </div>
                <div class="box-body">
                <div class="form-group">
                    <label>Durum:</label>
                    <div class="controls">
                        <select name="status" id="select" class="form-control">
                            <option value="0" {{$school->status==0?'selected':''}}>Pasif</option>
                            <option value="1" {{$school->status==1?'selected':''}}>Aktif</option>
                        </select>
                    </div>
                </div>
                </div>
                <div class="box-footer">
                    <a href="{{route('schools.index')}}" style="color: white" class="btn btn-danger">Geri Dön</a>
                    <button type="submit" class="btn btn-success pull-right">Okul Düzenle</button>
                </div>
{{--                {!! Form::close() !!}--}}
                </form>
            </div>
        </div>
    </div>
@endsection
@section('css')
@endsection
@section('js')
    <script>
        function ajaxekle() {
            var form = $("#ajax-form");
            var form_data = $("#ajax-form").serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                type:"PUT",
                url:"{{route('schools.update',$school->id)}}",
                data: form_data,
                success:function () {
                    swal({
                        title:"Başarılı",
                        text:"Okul Düzenlendi",
                        type: "success",
                        timer:2000,
                        showConfirmButton: false
                    });
                }
            });
            return false;
        }
    </script>
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
