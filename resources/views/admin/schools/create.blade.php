@extends('admin.template')
@section('icerik')
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Okul Ekle</h4>
                    <ul class="box-controls pull-right">
                        <li><a class="box-btn-close" href="#"></a></li>
                        <li><a class="box-btn-slide" href="#"></a></li>
                        <li><a class="box-btn-fullscreen" href="#"></a></li>
                    </ul>
                </div>
{{--                {!! Form::open(['route'=>['schools.store'],'method'=>'POST','files'=>'true','class'=>'form-horizontal']) !!}--}}
                <form method="POST" action="{{route('schools.store')}}" class="form-horizontal" enctype="multipart/form-data" onsubmit="return ajaxekle();" id="ajax-form">
                    {{csrf_field()}}
                <div class="box-body">
                    <div class="form-group">
                        <label for="example_input_full_name">Okul İsmi:</label>
                        <input id="name" type="text" class="form-control"  name="name" required>
                    </div>
                </div>
                <div class="box-body">
                <div class="form-group">
                    <label>Durum:</label>
                    <div class="controls">
                        <select name="status" id="select" class="form-control">
                                <option value="0">Pasif</option>
                                <option value="1">Aktif</option>
                        </select>
                    </div>
                </div>
                </div>
                <div class="box-footer">
                    <a href="{{route('schools.index')}}" style="color: white" class="btn btn-danger">Geri Dön</a>
                    <button type="submit" class="btn btn-success pull-right">Okul Ekle</button>
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
                type:"POST",
                url:"{{route('schools.store')}}",
                data: form_data,
                success:function () {
                    swal({
                        title:"Başarılı",
                        text:"Okul Eklendi",
                        type: "success",
                        timer:2000,
                        showConfirmButton: false
                    });
                    document.getElementById("ajax-form").reset();
                }
            });
            return false;
        }
    </script>
    <script>
        @if (session('alert'))
        swal({
            title:"Başarılı",
            text:"Okul Eklendi",
            type: "success",
            timer:2000,
            showConfirmButton: false
        });
        @endif
        @if (session('no'))
        swal({
            title:"Hata",
            text:"Okul Eklenemedi",
            type: "warning",
            timer:2000,
            showConfirmButton: false
        });
        @endif
    </script>
@endsection
