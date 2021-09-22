@extends('admin.template')
@section('icerik')
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Öğrenci Ekle</h4>
                    <ul class="box-controls pull-right">
                        <li><a class="box-btn-close" href="#"></a></li>
                        <li><a class="box-btn-slide" href="#"></a></li>
                        <li><a class="box-btn-fullscreen" href="#"></a></li>
                    </ul>
                </div>
                                {!! Form::open(['route'=>['club_student_store'],'method'=>'POST','files'=>'true','class'=>'form-horizontal']) !!}

                    <div class="box-body">
                        <div class="form-group">
                            <label>Eklemek İstediğiniz Öğrenciyi Seçiniz:</label>
                            <div class="controls">
                                <select name="user_id" id="select" class="form-control">
                                    <option>Seçiniz</option>
                                    @foreach($user_id as $student)
                                    <option value="{{$student->id}}">{{$student->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                <input type="hidden" name="club_id" value="{{$_GET['club']}}">
                    <div class="box-footer">
                        <a href="{{route('club_user.index','club='.$_GET['club'])}}" style="color: white" class="btn btn-danger">Geri Dön</a>
                        <button type="submit" class="btn btn-success pull-right">Öğrenci Ekle</button>
                    </div>
                                    {!! Form::close() !!}
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
            text:"Katılma İsteği Başarılı Bir Şekilde Gönderildi",
            type: "success",
            timer:2000,
            showConfirmButton: false
        });
        @endif
        @if (session('no'))
        swal({
            title:"Hata",
            text:"Katılma İsteği Gönderilemedi",
            type: "warning",
            timer:2000,
            showConfirmButton: false
        });
        @endif
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
