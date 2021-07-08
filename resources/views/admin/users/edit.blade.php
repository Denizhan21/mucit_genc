@extends('admin.template')

@section('icerik')
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="box">

                <div class="box-header with-border">
                    <h4 class="box-title">Kullanıcı Düzenle</h4>
                    <ul class="box-controls pull-right">
                        <li><a class="box-btn-close" href="#"></a></li>
                        <li><a class="box-btn-slide" href="#"></a></li>
                        <li><a class="box-btn-fullscreen" href="#"></a></li>
                    </ul>
                </div>

                {!! Form::model($user,['route'=>['users.update',$user->id],'method'=>'PUT','files'=>'true','class'=>'form-horizontal']) !!}

                <div class="box-body">

                    <div class="form-group">
                        <label for="example_input_full_name">Ad Soyad:</label>
                        <input value="{{$user->name}}" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>E-Mail Adresi:</label>
                        <input value="{{$user->email}}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Şifre:</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Şifre Tekrar:</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                    </div>

                    <div class="form-group">
                        <label>Okul:</label>
                        <div class="controls">
                            <select name="school" id="select" class="form-control">
                                @foreach($school as $schools)
                                    <option value="{{$schools->id}}" {{$user->school==$schools->id?'selected':''}}>{{$schools->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Yorum:</label>
                        <div class="controls">
                            <select name="comment_authority" id="select" class="form-control">
                                <option value="0" {{$user->comment_authority==0?'selected':''}}>Yorum Onay Kapalı</option>

                                    <option value="1" {{$user->comment_authority==1?'selected':''}}>Yorum Açık</option>

                            </select>
                        </div>
                    </div>


                    @if($user->authority=='student')
                        <div class="demo-radio-button">


                            @php
                                $type = ['1.Sınıf', '2.Sınıf', '3.Sınıf', '4.Sınıf', '5.Sınıf', '6.Sınıf', '7.Sınıf', '8.Sınıf'];
                            @endphp
                            <div class="form-group">
                                <label>Sınıf:</label>
                                <div class="controls">
                                    <select name="class" id="select" class="form-control">
                                        @foreach($type as $key=>$alan)

                                            <option value="{{$alan}}" {{$user->class==$alan?'selected':''}}>{{$alan}}</option>
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
                                            <option value="{{$alan}}" {{$user->branch==$alan?'selected':''}}>{{$alan}}</option>
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
                                            <option value="{{$alan}}" {{$user->gender==$alan?'selected':''}}>{{$alan}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="box-footer">
                        <a href="{{route('users.index')}}" style="color: white" class="btn btn-danger">Geri Dön</a>
                        <button id="gameStart" type="submit" class="btn btn-success pull-right">Kullanıcı Düzenle</button>
                    </div>

                </div>
                {{Form::close()}}
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
@endsection

