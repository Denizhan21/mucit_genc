@extends('admin.template')

@section('icerik')
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="box">

                <div class="box-header with-border">
                    <h4 class="box-title">Kullanıcı Ekle</h4>
                    <ul class="box-controls pull-right">
                        <li><a class="box-btn-close" href="#"></a></li>
                        <li><a class="box-btn-slide" href="#"></a></li>
                        <li><a class="box-btn-fullscreen" href="#"></a></li>
                    </ul>
                </div>

                <form method="POST" action="{{ route('users.store') }}" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    {{csrf_field()}}

                    <div class="box-body">


                        <div class="demo-radio-button">
                            <label>Kullanıcı Tipi:</label>

                                <input type="radio" name="authority" id="authority-0" value="student" class="with-gap radio-col-red authority" onclick="return Authority()"/>
                                <label for="authority-0">Öğrenci</label>&nbsp;&nbsp;&nbsp;

                            <input type="radio" name="authority" id="authority-1" value="teacher" class="with-gap radio-col-red authority" onclick="return Authority()"/>
                            <label for="authority-1">Öğretmen</label>&nbsp;&nbsp;&nbsp;

                            <input type="radio" name="authority" id="authority-2" value="admin" class="with-gap radio-col-red authority" onclick="return Authority()"/>
                            <label for="authority-2">Yönetici</label>&nbsp;&nbsp;&nbsp;

                        </div>

                        <div class="form-group">
                            <label for="example_input_full_name">Ad Soyad:</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>E-Mail Adresi:</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Fotoğraf:</label>
                            <input  type="file" class="form-control" name="avatar">
                        </div>

                        <div class="form-group">
                            <label>Şifre:</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Şifre Tekrar:</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-group">
                            <label>Okul:</label>
                            <div class="controls">
                                <select name="school" id="select" class="form-control">
                                    @foreach($school as $schools)
                                        <option value="{{$schools->id}}">{{$schools->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Yorum:</label>
                            <div class="controls">
                                <select name="comment_authority" id="select" class="form-control">
                                    <option value="0">Yorum Onay Kapalı</option>

                                    <option value="1">Yorum Açık</option>

                                </select>
                            </div>
                        </div>

                        <div id="student_area"  style="display: none">
                            <div class="demo-radio-button">



                                @php
                                    $type = ['1.Sınıf', '2.Sınıf', '3.Sınıf', '4.Sınıf', '5.Sınıf', '6.Sınıf', '7.Sınıf', '8.Sınıf', '9.Sınıf', '10.Sınıf','11.Sınıf', '12.Sınıf','Üniversite'];
                                @endphp
                                <div class="form-group">
                                    <label>Sınıf:</label>
                                    <div class="controls">
                                        <select name="class" id="select" class="form-control">
                                            @foreach($type as $key=>$alan)

                                                <option value="{{$alan}}">{{$alan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                @php
                                    $type = ['A sınıfı', 'B sınıfı', 'C sınıfı', 'D sınıfı'];
                                @endphp
                                <div class="form-group">
                                    <label>Sınıf:</label>
                                    <div class="controls">
                                        <select name="branch" id="select" class="form-control">
                                            @foreach($type as $key=>$alan)
                                                <option value="{{$alan}}">{{$alan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                @php
                                    $type = ['Erkek', 'Kız'];
                                @endphp
                                <div class="form-group">
                                    <label>Cinsiyet:</label>
                                    <div class="controls">
                                        <select name="gender" id="select" class="form-control">
                                            @foreach($type as $key=>$alan)
                                                <option value="{{$alan}}">{{$alan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="box-footer">
                            <a href="{{route('users.index')}}" style="color: white" class="btn btn-danger">Geri Dön</a>
                            <button id="gameStart" type="submit" class="btn btn-success pull-right">Kullanıcı Ekle</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('css')
@endsection
@section('js')
    <script>
        function Authority() {
            var radio = document.getElementById("authority-0");
            if (radio.checked == true){
                document.getElementById('student_area').style.display = "block";
            } else {
                document.getElementById('student_area').style.display = "none";
            }
        }
    </script>
    <script>
        @if (session('alert'))
        swal({
            title:"Başarılı",
            text:"Kullanıcı Eklendi",
            type: "success",
            timer:2000,
            showConfirmButton: false
        });
        @endif
        @if (session('pass'))
        swal({
            title:"Başarısız",
            text:"Şifreler Eşleşmiyor",
            type: "error",
            timer:2000,
            showConfirmButton: false
        });
        @endif
        @if (session('no'))
        swal({
            title:"Hata",
            text:"Kayıt Yapılamadı",
            type: "warning",
            timer:2000,
            showConfirmButton: false
        });
        @endif
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#gameStart').click(function() {
                checked = $("input[name=authority]:checked").length;
                if(!checked) {
                    alert("Lütfen kullanıcı tipini seçiniz.");
                    return false
                }
            });
        });
    </script>
@endsection
