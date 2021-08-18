@extends('admin.template')
@section('icerik')
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Mesajı Oku</h4>
                    <ul class="box-controls pull-right">
                        <li><a class="box-btn-close" href="#"></a></li>
                        <li><a class="box-btn-slide" href="#"></a></li>
                        <li><a class="box-btn-fullscreen" href="#"></a></li>
                    </ul>
                </div>
                                {!! Form::model($contact_edit,['route'=>['contact_update',$contact_edit->id],'method'=>'GET','files'=>'true','class'=>'form-horizontal']) !!}
{{--                <form method="PUT" action="{{route('schools.update',$contact_edit->id)}}" class="form-horizontal" enctype="multipart/form-data" onsubmit="return ajaxekle();" id="ajax-form">--}}
{{--                    {{csrf_field()}}--}}

                    <div class="box-body">
                        <div class="form-group">
                            <label for="example_input_full_name">Mesajı Gönderenin İsmi:</label>
                            <input  type="text" class="form-control" disabled value="{{$contact_edit->name}}">
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="example_input_full_name">Email Adresi:</label>
                            <input type="text" class="form-control" disabled value="{{$contact_edit->email}}">
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="example_input_full_name">Telefon Numarası:</label>
                            <input type="text" class="form-control" disabled value="{{$contact_edit->tel}}">
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="example_input_full_name">Konu:</label>
                            <input type="text" class="form-control" disabled value="{{$contact_edit->subject}}">
                        </div>
                    </div>

                <div class="box-body">
                    <div class="form-group">
                        <label for="example_input_full_name">Konu:</label>
                        <textarea cols="200" rows="10" disabled>{{$contact_edit->content}}</textarea>
                    </div>
                </div>

                <input type="hidden" name="status" value="1">





                    <div class="box-footer">
                        <a href="{{route('contact_index')}}" style="color: white" class="btn btn-danger">Geri Dön</a>
                        <button type="submit" class="btn btn-success pull-right">Okundu Olarak İşaretle</button>
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
            text:"Okundu Olarak İşaretlendi",
            type: "success",
            timer:2000,
            showConfirmButton: false
        });
        @endif
        @if (session('no'))
        swal({
            title:"Hata",
            text:"Okundu Olarak İşaretlenemedi",
            type: "warning",
            timer:2000,
            showConfirmButton: false
        });
        @endif
    </script>
@endsection
