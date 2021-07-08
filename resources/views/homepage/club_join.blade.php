@extends('homepage.template')

@section('content')
    <div class="page-content">
        <div class="container">
            <div class="block-box user-single-blog">
                <div class="blog-content-wrap">
                    <div class="blog-comment-form">
                        <h3 class="item-title">Kulübe Üye Olun  ({{$club->name}})</h3>
                        {!! Form::open(['route'=>['club_join_store'],'method'=>'POST','files'=>'true','class'=>'form-horizontal']) !!}

                        <div class="row gutters-20">


                            @if (Route::has('login'))
                                @auth

                                    <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                                    <input type="hidden" name="club_id" value="{{$club->id}}">
                                    <input type="hidden" name="status" value="0">
                                @endauth
                            @endif












                            @if (Route::has('login'))
                                @auth

                                    @if(\Illuminate\Support\Facades\Auth::user()->authority == 'Student')
                                    <div class="col-lg-12 form-group">
                                        <button id="gameStart" class="submit-btn" type="submit">Kaydol</button>
                                    </div>
                                        @else
                                        yetkiniz yok
                                        @endif

                                @else

                                    <div class="alert alert-info">
                                       Kulübe Kaydolmaz için lütfen giriş yapınız. Giriş yapmak için


                                        <a href="{{route('login')}}" class="alert-link">
                                            tıklayınız.
                                        </a>


                                    </div>


                                @endauth
                            @endif



                        </div>
                        {!! Form::close() !!}
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
