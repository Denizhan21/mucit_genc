@extends('homepage.template')

@section('content')


    <div class="page-content">
        <div class="container">
            <div class="row">









                @if (Route::has('login'))
                    @auth
                        @php

                            $user_club = \App\Club_user::where('club_id','=',$clubs->id)->where('status','=','1')->where('user_id','=',\Illuminate\Support\Facades\Auth::id())->first();
                        @endphp
                        @foreach($platform as $key=>$platforms)
                            @if(!empty($user_club)  OR  $club_links->authority == 1)
                                <div class="col-lg-12">
                                    <div  id="newest-member" role="tabpanel" class="block-box user-about">
                                        <div class="widget-heading">
                                            <h3 class="widget-title">Kulüp Platform Bilgileri ({{$key+1}})</h3>
                                        </div>
                                        <ul class="user-info">
                                            <li>
                                                <label>Kullanuıcı Adı</label>
                                                <p>{{$platforms->user_name}}</p>
                                            </li>
                                            <li>
                                                <label>Şifre</label>
                                                <p>{{$platforms->password}}</p>
                                            </li>
                                            <li>
                                                <label>Link</label>
                                                <p>{{$platforms->link}}</p>
                                            </li>
                                            <li>
                                                <label>Fotoğraf</label>
                                                <img style="width: 300px;" src="/{{$platforms->images}}" alt="Fotoğraf Yok">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        @foreach($platform as $key=>$platforms)
                            @if($platforms->authority == 1)
                                <div class="col-lg-12">
                                    <div  id="newest-member" role="tabpanel" class="block-box user-about">
                                        <div class="widget-heading">
                                            <h3 class="widget-title">Kulüp Platform Bilgileri ({{$key+1}})</h3>
                                        </div>
                                        <ul class="user-info">
                                            <li>
                                                <label>Kullanuıcı Adı</label>
                                                <p>{{$platforms->user_name}}</p>
                                            </li>
                                            <li>
                                                <label>Şifre</label>
                                                <p>{{$platforms->password}}</p>
                                            </li>
                                            <li>
                                                <label>Link</label>
                                                <p>{{$platforms->link}}</p>
                                            </li>
                                            <li>
                                                <label>Fotoğraf</label>
                                                <img style="width: 300px;" src="/{{$platforms->images}}" alt="Fotoğraf Yok">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endauth
                @endif










               {{-- @foreach($platform as $key=>$platforms)
                <div class="col-lg-12">
                    <div  id="newest-member" role="tabpanel" class="block-box user-about">
                        <div class="widget-heading">
                            <h3 class="widget-title">Kulüp Platform Bilgileri ({{$key+1}})</h3>
                        </div>
                        <ul class="user-info">
                            <li>
                                <label>Kullanuıcı Adı</label>
                                <p>{{$platforms->user_name}}</p>
                            </li>
                            <li>
                                <label>Şifre</label>
                                <p>{{$platforms->password}}</p>
                            </li>
                            <li>
                                <label>Link</label>
                                <p>{{$platforms->link}}</p>
                            </li>
                            <li>
                                <label>Fotoğraf</label>
                                <img style="width: 300px;" src="/{{$platforms->images}}" alt="Fotoğraf Yok">
                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach
--}}















            </div>
        </div>
    </div>
@endsection

@section('css')

@endsection

@section('js')

@endsection
