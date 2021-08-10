@extends('admin.template')
@section('icerik')
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Öğrenci Ekle
{{--                        ({{$rosette->name}})--}}


                        <?php
                        $id = $rosette->club_id;
                        $club = \App\Club::where('id','=',$id)->first();

                        $student = $club->id;
                        $club_student = \App\Club_user::where('club_id','=',$student)->get();
                        ?>



                    </h4>

                    <ul class="box-controls pull-right">
                        <li><a class="box-btn-close" href="#"></a></li>
                        <li><a class="box-btn-slide" href="#"></a></li>
                        <li><a class="box-btn-fullscreen" href="#"></a></li>
                    </ul>
                </div>
                {!! Form::open(['route'=>['rosette_add_store'],'method'=>'POST','files'=>'true','class'=>'form-horizontal']) !!}
                {{--    <form method="POST" action="{{route('schools.store')}}" class="form-horizontal" enctype="multipart/form-data" onsubmit="return ajaxekle();" id="ajax-form">
                        {{csrf_field()}}--}}
                <div class="box-body">
                    <div class="form-group">
                        <label>Öğrenci Ekle:</label>
                        <div class="controls">
                            <select name="user_id" id="select" class="form-control">
                                @foreach($club_student as $stud)

                                    <option value="{{$stud->student->id}}">{{$stud->student->name}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="rosette_id" value="{{$rosette_id}}">

                <div class="box-footer">
                    <a href="{{route('schools.index')}}" style="color: white" class="btn btn-danger">Geri Dön</a>
                    <button type="submit" class="btn btn-success pull-right">Okul Ekle</button>
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
    <script>
        @if (session('nosd'))
        swal({
            title:"Hata",
            text:"Mükerrer Kayıt",
            type: "warning",
            timer:2000,
            showConfirmButton: false
        });
        @endif
    </script>
@endsection
