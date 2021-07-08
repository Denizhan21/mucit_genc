@extends('homepage.template')

@section('content')
    <div class="page-content">
        <div class="container">
            <div class="block-box user-single-blog">
                <div class="blog-content-wrap">
                    <div class="blog-comment-form">
                        <h3 class="item-title">Kulüp Öğretmeni İle İletişime Geçin</h3>
                        {!! Form::open(['route'=>['club_contact_store'],'method'=>'POST','files'=>'true','class'=>'form-horizontal']) !!}

                        <div class="row gutters-20">


                            @if (Route::has('login'))
                                @auth

                                    <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                                    <input type="hidden" name="club_id" value="{{$clubs->id}}">
                                    <input type="hidden" name="status" value="0">

                                @endauth
                            @endif








                                <div class="col-lg-12 form-group" >
                                    <label>Konu:</label>
                                    <input id="name" type="text" class="form-control"  name="subject"  >
                                </div>




                            <div class="col-lg-12 form-group">
                                <textarea name="content" class="form-control textarea" placeholder="Mesajınızın detayını yazınız . . ." cols="30" rows="7"></textarea>
                            </div>


                            @if (Route::has('login'))
                                @auth

                                    <div class="col-lg-12 form-group">
                                        <button id="gameStart" class="submit-btn" type="submit">Gönder</button>
                                    </div>

                                @else

                                    <div class="alert alert-info">
                                        Projenizi göndermek için lütfen giriş yapınız. Giriş yapmak için


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

@endsection
