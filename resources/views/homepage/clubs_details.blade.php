@extends('homepage.template')

@section('content')
    <div class="page-content">



        <div class="container">
            @if (Route::has('login'))
                @auth


                    @php

                        $user_club = \App\Club_user::where('club_id','=',$clubs->id)->where('status','=','1')->where('user_id','=',\Illuminate\Support\Facades\Auth::id())->first();
                    @endphp


                    @if(!empty($user_club))
                        @if($clubs->confirmation == 1 OR \Illuminate\Support\Facades\Auth::id() == $user_club->id)
                            <a href="/project_send/{{$clubs->code}}"   class="btn btn-round btn-dark">Kulübe Proje Gönder</a>
                        @endif

                    @else
                        @if($clubs->confirmation == 1)
                            <a href="/project_send/{{$clubs->code}}"   class="btn btn-round btn-dark">Kulübe Proje Gönder</a>
                        @endif

                    @endif

                @endauth
            @endif


            <hr>
            <div class="newsfeed-banner">
                <div class="media">

                    <div class="media-body">
                        <h3 class="item-title">{{$clubs->name}}</h3>
                        {{-- <p>{{$clubs->subject}}</p>--}}
                    </div>
                </div>
                <ul class="animation-img">
                    <li data-sal="slide-down" data-sal-duration="800" data-sal-delay="400"><img src="/homepage/media/banner/shape_7.png" alt="shape"></li>

                    @if(!empty($clubs->logo))
                        <li data-sal="slide-up" data-sal-duration="500"><img style="width: 525px;height: 179px;" src="/{{$clubs->logo}}" alt="shape"></li>
                    @endif

                </ul>
            </div>


            <div class="newsfeed-search">
                <ul class="member-list">

                    <li class="active-member">
                        <a href="#">
                                <span class="member-icon">
                                    <i class="icofont-users"></i>
                                </span>
                            <span class="member-text">
                                    Toplam Üye:
                                </span>
                            <span class="member-count">{{count($clubs_users)}}</span>
                        </a>
                    </li>

                    <li class="active-member">
                        <a href="#">
                                <span class="member-icon">
                                    <i class="icofont-notepad"></i>
                                </span>
                            <span class="member-text">
                                    Toplam Proje:
                                </span>
                            <span class="member-count">{{count($clubs_projects)}}</span>
                        </a>
                    </li>

                </ul>



                {{--                    <ul class="search-list">--}}

                {{--                        <li class="search-input">--}}
                {{--                            <div class="widget ">--}}
                {{--                                <a href="{{route('platform_club',$clubs->id)}}" class="item-btn">--}}
                {{--                                    <span class="btn-text">Platform Bilgilerine Git</span>--}}
                {{--                                    <span class="btn-icon">--}}
                {{--                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="21px" height="10px">--}}
                {{--                                        <path fill-rule="evenodd" d="M16.671,9.998 L12.997,9.998 L16.462,6.000 L5.000,6.000 L5.000,4.000 L16.462,4.000 L12.997,0.002 L16.671,0.002 L21.003,5.000 L16.671,9.998 ZM17.000,5.379 L17.328,5.000 L17.000,4.621 L17.000,5.379 ZM-0.000,4.000 L3.000,4.000 L3.000,6.000 L-0.000,6.000 L-0.000,4.000 Z" />--}}
                {{--                                    </svg>--}}
                {{--                                </span>--}}
                {{--                                </a>--}}
                {{--                            </div>--}}

                {{--                        </li>--}}
                {{--                    </ul>--}}


                @if($clubs->status=='1')
                    <ul class="search-list">

                        <li class="search-input">
                            <div class="widget ">
                                <a href="{{route('club_join',$clubs->code)}}" class="item-btn">
                                    <span class="btn-text">Kayıt Olun</span>
                                    <span class="btn-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="21px" height="10px">
                                        <path fill-rule="evenodd" d="M16.671,9.998 L12.997,9.998 L16.462,6.000 L5.000,6.000 L5.000,4.000 L16.462,4.000 L12.997,0.002 L16.671,0.002 L21.003,5.000 L16.671,9.998 ZM17.000,5.379 L17.328,5.000 L17.000,4.621 L17.000,5.379 ZM-0.000,4.000 L3.000,4.000 L3.000,6.000 L-0.000,6.000 L-0.000,4.000 Z" />
                                    </svg>
                                </span>
                                </a>
                            </div>

                        </li>
                    </ul>
                @endif
            </div>





            @if (Route::has('login'))
                @auth
                    @php

                        $user_club = \App\Club_user::where('club_id','=',$clubs->id)->where('status','=','1')->where('user_id','=',\Illuminate\Support\Facades\Auth::id())->first();
                    @endphp
                    @foreach($club_link as $key=>$club_links)
                        @if(!empty($user_club)  OR  $club_links->authority == 1)
                            <div class="newsfeed-search">
                                <ul class="member-list">

                                    <li class="active-member">
                                        <a href="{{$club_links->link}}">
                                <span class="member-text">
                                    Canlı Link {{$key+1}}:
                                </span>
                                            <span class="member-count">{{$club_links->link}}</span>
                                        </a>
                                    </li>

                                </ul>

                            </div>
                        @endif
                    @endforeach
                @else
                    @foreach($club_link as $key=>$club_links)
                        @if($club_links->authority == 1)
                            <div class="newsfeed-search">
                                <ul class="member-list">

                                    <li class="active-member">
                                        <a href="{{$club_links->link}}">
                                <span class="member-text">
                                    Canlı Link {{$key+1}}:
                                </span>
                                            <span class="member-count">{{$club_links->link}}</span>
                                        </a>
                                    </li>

                                </ul>

                            </div>
                        @endif
                    @endforeach
                @endauth
            @endif








            <div class="row">




                <div class="col-lg-8">
                    <div  id="newest-member" role="tabpanel" class="block-box user-about">
                        <div class="widget-heading">
                            <h3 class="widget-title">Kulüp Detayları</h3>
                        </div>
                        <ul class="user-info">
                            <li>
                                <label>Kulüp Konusu</label>
                                <p>{{$clubs->subject}}</p>
                            </li>
                            <li>
                                <label>Kulüp Açıklaması</label>
                                <p>{!! $clubs->description !!}</p>
                            </li>
                        </ul>
                        <hr>
                        <div class="widget-heading">
                            <h4><small>Kulüp Tanıtımı</small></h4>
                        </div>

                        @if($clubs->type == 'Drive')

                            <?php
                            $metin  = $clubs->text;
                            $eski   = "view?usp=sharing";
                            $yeni   = "preview";
                            $metin = str_replace($eski, $yeni, $metin);
                            ?>
                            <iframe src="{{$metin}}" frameborder="0" width="710" height="400"></iframe>

                        @else

                            <iframe src="{{$clubs->text}}" frameborder="0" width="710" height="400"></iframe>
                        @endif
                    </div>
















                    @foreach($clubs_projects  as $key=>$club_projects)


                        <div class="block-box post-view">
                            <div class="post-header">
                                <div class="media">
                                    <div class="user-img">
                                        @if (Route::has('login'))
                                            @auth
                                                @if(!empty($club_projects->student->avatar))
                                                    <img style="width: 44px;height: 44px" src="/{{$club_projects->student->avatar}}" alt="{{$club_projects->student->name}}">
                                                @else
                                                    <img src="/homepage/media/figure/chat_10.jpg" alt="{{$club_projects->student->name}}">
                                                @endif
                                            @else
                                                <img src="/homepage/media/figure/chat_10.jpg" alt="{{$club_projects->student->name}}">
                                            @endauth
                                        @endif


                                    </div>
                                    <div class="media-body">
                                        @if (Route::has('login'))
                                            @auth
                                                <div class="user-title"><a href="user-timeline.html">{{$club_projects->student->name}}</a></div>
                                            @else
                                                <div class="user-title"><a href="user-timeline.html">Gönderen öğrencinin ismini görebilmek için sisteme giriş yapmanız gerekmektedir</a></div>
                                            @endauth
                                        @endif
                                        <ul class="entry-meta">
                                            <li class="meta-time">
                                                {{--   <?php
                                                   date_default_timezone_set('Europe/Istanbul');
                                                   $bugunTarihi=date("d-m-Y H:i:s");
                                                   $girilentarih=date('d-m-Y H:i:s',  strtotime($club_projects->created_at));
                                                   $date1=date_create($girilentarih);
                                                   $date2=date_create($bugunTarihi);
                                                   $diff=date_diff($date1,$date2);
                                                   echo $diff->format("%s saniye, %i dakika, %H saat, %d gün, %m ay, %Y yıl önce.");
                                                   ?>--}}

                                                @php
                                                    setlocale(LC_TIME, "turkish");
                                                    setlocale(LC_ALL,'turkish');
                                                    echo iconv('latin5','utf-8',strftime('%d %B %Y %A',strtotime($club_projects->created_at)));
                                                @endphp
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="post-body">
                                <p><b>{{$club_projects->name}}</b></p>
                                <p>{!! $club_projects->description !!}</p>




                                @if($club_projects->type=='Fotoğraf')


                                    {{--  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">


                                          <div class="carousel-indicators">

                                              @foreach(json_decode($club_projects->content) as $key=>$image)
                                                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$key}}" class="{{$key==0?'active':''}}" aria-current="true" aria-label="Slide {{$key+1}}"></button>
                                              @endforeach

                                          </div>


                                          <div class="carousel-inner">

                                              @foreach(json_decode($club_projects->content) as $key=>$image)
                                                  <div class="carousel-item {{$key==0?'active':''}}">
                                                      <img style="width:710px;height: 400px; " src="/{{$image}}" class="d-block w-100" alt="Gallery">
                                                  </div>
                                              @endforeach



                                          </div>



                                          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                              <span class="visually-hidden">Previous</span>
                                          </button>
                                          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                              <span class="visually-hidden">Next</span>
                                          </button>


                                      </div>--}}



                                    <div id="demo" class="carousel slide" data-ride="carousel">


                                        <div class="carousel-inner">
                                            @foreach(json_decode($club_projects->content) as $key=>$image)
                                                <div class="carousel-item {{$key==0?'active':''}}">
                                                    <img style="width:710px;height: 400px; " src="/{{$image}}" alt="Gallery">
                                                </div>
                                            @endforeach
                                        </div>


                                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                            <span class="carousel-control-prev-icon"></span>
                                        </a>
                                        <a class="carousel-control-next" href="#demo" data-slide="next">
                                            <span class="carousel-control-next-icon"></span>
                                        </a>

                                    </div>

                                @elseif($club_projects->type=='Video')
                                    <img style="width: 710px;height: 400px" src="/{{$club_projects->photo}}" alt="Groups">
                                    <br><br><br>
                                    <hr>
                                    <?php
                                    $metin  = $club_projects->content;
                                    $eski   = "view?usp=sharing";
                                    $yeni   = "preview";
                                    $metin = str_replace($eski, $yeni, $metin);
                                    ?>
                                    <iframe src="{{$metin}}" frameborder="0" width="710" height="400"></iframe>
                                @elseif($club_projects->type=='YouTube')
                                    <img style="width: 710px;height: 400px" src="/{{$club_projects->photo}}" alt="Groups">
                                    <br><br><br>
                                    <hr>

                                    <iframe src="{{$club_projects->content}}" frameborder="0" width="710" height="400"></iframe>
                                @elseif($club_projects->type=='Power Point')
                                    <img style="width: 710px;height: 400px" src="/{{$club_projects->photo}}" alt="Groups">
                                    <br><br><br>
                                    <hr>
                                    <?php
                                    $metin  = $club_projects->content;
                                    $eski   = "view?usp=sharing";
                                    $yeni   = "preview";
                                    $metin = str_replace($eski, $yeni, $metin);
                                    ?>
                                    <iframe src="{{$metin}}" frameborder="0" width="710" height="400"></iframe>
                                @endif




















                                <div class="post-meta-wrap">
                                    <div class="post-meta">
                                        <div class="post-reaction">
                                            <div class="reaction-icon">
                                                @php
                                                    $reaction_1 = count(\App\Rating::where('rateable_id','=',$club_projects->id)->where('rateable_type','=',1)->get())
                                                @endphp
                                                @if(!empty($reaction_1))
                                                    <img style="width: 24px;" src="/homepage/media/figure/like.svg" alt="Like">
                                                @endif
                                                @php
                                                    $reaction_2 = count(\App\Rating::where('rateable_id','=',$club_projects->id)->where('rateable_type','=',2)->get())
                                                @endphp
                                                @if(!empty($reaction_2))
                                                    <img style="width: 24px;" src="/homepage/media/figure/celebrate.svg" alt="Like">
                                                @endif
                                                @php
                                                    $reaction_3 = count(\App\Rating::where('rateable_id','=',$club_projects->id)->where('rateable_type','=',3)->get())
                                                @endphp
                                                @if(!empty($reaction_3))
                                                    <img style="width: 24px;" src="/homepage/media/figure/support.svg" alt="Like">
                                                @endif
                                                @php
                                                    $reaction_4 = count(\App\Rating::where('rateable_id','=',$club_projects->id)->where('rateable_type','=',4)->get())
                                                @endphp
                                                @if(!empty($reaction_4))
                                                    <img style="width: 24px;" src="/homepage/media/figure/love.svg" alt="Like">
                                                @endif
                                                @php
                                                    $reaction_5 = count(\App\Rating::where('rateable_id','=',$club_projects->id)->where('rateable_type','=',5)->get())
                                                @endphp
                                                @if(!empty($reaction_5))
                                                    <img style="width: 24px;" src="/homepage/media/figure/insightful.svg" alt="Like">
                                                @endif
                                                @php
                                                    $reaction_6 = count(\App\Rating::where('rateable_id','=',$club_projects->id)->where('rateable_type','=',6)->get())
                                                @endphp
                                                @if(!empty($reaction_6))
                                                    <img style="width: 24px;" src="/homepage/media/figure/curious.svg" alt="Like">
                                                @endif
                                            </div>
                                            @php
                                            $rating = \App\Rating::where('rateable_id','=',$club_projects->id)->get()
                                            @endphp
                                            <div class="meta-text"><div id="total_rating_{{$key}}">{{count($rating)}}</div></div>
                                        </div>
                                    </div>
                                    @php
                                        $comment = \App\Comment::where('project_id','=',$club_projects->id)->where('status','=','1')->get();
                                    @endphp
                                    <div class="post-meta">
                                        <div class="meta-text">{{count($comment)}} Yorum  </div>
                                    </div>
                                </div>
                            </div>
                            <div class="post-footer">
                                <ul>
                                    @if (Route::has('login'))
                                        @auth
                                            <li class="post-react">
                                                @php
                                                    $login = \Illuminate\Support\Facades\Auth::id();

                                                $rating_login = \App\Rating::where('rateable_id','=',$club_projects->id)->where('user_id','=',$login)->first();
                                                @endphp



                                                <a href="#">
                                                    @if(empty($rating_login))

                                                        <div id="user_rate_result_{{$key}}"><i class="icofont-thumbs-up"></i></div>

                                                    @elseif($rating_login->rateable_type==1)
                                                        <img style="width: 20px;" src="/homepage/media/figure/like.svg" alt="Like">
                                                    @elseif($rating_login->rateable_type==2)
                                                        <img style="width: 20px;" src="/homepage/media/figure/celebrate.svg" alt="Like">
                                                    @elseif($rating_login->rateable_type==3)
                                                        <img style="width: 20px;" src="/homepage/media/figure/support.svg" alt="Like">
                                                    @elseif($rating_login->rateable_type==4)
                                                        <img style="width: 20px;" src="/homepage/media/figure/love.svg" alt="Like">
                                                    @elseif($rating_login->rateable_type==5)
                                                        <img style="width: 20px;" src="/homepage/media/figure/insightful.svg" alt="Like">
                                                    @elseif($rating_login->rateable_type==6)
                                                        <img style="width: 20px;" src="/homepage/media/figure/curious.svg" alt="Like">
                                                    @endif

                                                </a>



                                                <ul class="react-list">

                                                    @if(!empty($rating_login))

                                                    @else
                                                        <fieldset id="emoji_area_{{$key}}" >
                                                            <input type="hidden" id="rateable_id_{{$key}}" name="rateable_id" value="{{$club_projects->id}}">
                                                            <li><label class="like-button" for="{{$key+5}}"><input id="{{$key+5}}" type="radio" name="rateable_type" value="1" onclick="rating_score({{$key}})"><img src="/homepage/media/figure/like.svg" alt="Like"></label></li>
                                                            <li><label class="like-button" for="{{$key+10}}"><input id="{{$key+10}}" type="radio" name="rateable_type" value="2" onclick="rating_score({{$key}})"><img src="/homepage/media/figure/celebrate.svg" alt="Like"></label></li>
                                                            <li><label class="like-button" for="{{$key+15}}"><input id="{{$key+15}}" type="radio" name="rateable_type" value="3" onclick="rating_score({{$key}})"><img src="/homepage/media/figure/support.svg" alt="Like"></label></li>
                                                            <li><label class="like-button" for="{{$key+20}}"><input id="{{$key+20}}" type="radio" name="rateable_type" value="4" onclick="rating_score({{$key}})"><img src="/homepage/media/figure/love.svg" alt="Like"></label></li>
                                                            <li><label class="like-button" for="{{$key+25}}"><input id="{{$key+25}}" type="radio" name="rateable_type" value="5" onclick="rating_score({{$key}})"><img src="/homepage/media/figure/insightful.svg" alt="Like"></label></li>
                                                            <li><label class="like-button" for="{{$key+30}}"><input id="{{$key+30}}" type="radio" name="rateable_type" value="6" onclick="rating_score({{$key}})"><img src="/homepage/media/figure/curious.svg" alt="Like"></label></li>
                                                            {{--                                                       <label  for="{{$key+35}}"><input class="rateable_id" id="{{$key+35}}" type="text" name="rateable_id" value="{{$club_projects->id}}" ></label>--}}
                                                        </fieldset>
                                                    @endif



                                                </ul>
                                            </li>
                                        @endauth
                                    @endif
                                    <li class="post-react">
                                        <a href="/projects/{{$club_projects->id}}"><i class="icofont-arrow-right"></i>Projeye Git</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
















                </div>
                <div class="col-lg-4 widget-block widget-break-lg">


                    <div class="widget widget-user-about">
                        <div class="widget-heading">
                            <h3 class="widget-title">Görevli Öğretmen</h3>

                        </div>
                        <div class="user-info">
                            <p>{{$clubs->teachers->name}}</p>
                            <a href="/club_contact/{{$clubs->id}}" class="btn btn-dark">Öğretmene Sor</a>
                        </div>
                    </div>

                    <div class="widget widget-memebers">
                        <div class="widget-heading">
                            <h3 class="widget-title">Öğrenciler</h3>

                        </div>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="newest-member" role="tabpanel">
                                <div class="members-list">
                                    @foreach($clubs_users as $key=>$student)
                                        <div class="media">
                                            <div class="item-img">
                                                <a href="#">
                                                    @if(!empty($student->student->avatar))
                                                        <img style="width: 44px; height: 44px" src="/{{$student->student->avatar}}" alt="Chat">
                                                    @else
                                                        <img src="/homepage/media/figure/chat_1.jpg" alt="Chat">

                                                    @endif

                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="item-title"><a href="#">{{$student->student->name}}</a></h4>

                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                            </div>

                        </div>


                    </div>

                    <div class="widget widget-memebers">
                        <div class="widget-heading">
                            <h3 class="widget-title">Projeler</h3>

                        </div>



                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="newest-member" role="tabpanel">
                                <div class="members-list">

                                    @foreach($clubs_projects  as $key=>$club_projects)
                                        <div class="media">
                                            <div class="item-img">
                                                <a href="#">

                                                    <img src="/homepage/media/figure/chat_1.jpg" alt="Chat">


                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="item-title"><a href="#">{{$club_projects->name}}</a></h4>
                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>

        function rating_score ( ke ) {

            console.log(ke);

            var rateable_type = $("input[name=rateable_type]:checked").val()
            $.ajax( {
                type    : "POST",
                data: {
                    "rateable_id" : $("#rateable_id_"+ke).val(),
                    "rateable_type" : rateable_type,
                    "_token": "{{ csrf_token() }}",
                },
                url     : "{{route('rating_send')}}",
                success : function ()
                {

                    document.getElementById('total_rating_'+ke).innerHTML = {{count($rating)+1}};

                    if(rateable_type == 1) var emoji = '<img style="width: 20px;" src="/homepage/media/figure/like.svg" alt="Like">';
                    if(rateable_type == 2) var emoji = '<img style="width: 20px;" src="/homepage/media/figure/celebrate.svg" alt="celebrate">';
                    if(rateable_type == 3) var emoji = '<img style="width: 20px;" src="/homepage/media/figure/support.svg" alt="support">';
                    if(rateable_type == 4) var emoji = '<img style="width: 20px;" src="/homepage/media/figure/love.svg" alt="love">';
                    if(rateable_type == 5) var emoji = '<img style="width: 20px;" src="/homepage/media/figure/insightful.svg" alt="insightful">';
                    if(rateable_type == 6) var emoji = '<img style="width: 20px;" src="/homepage/media/figure/curious.svg" alt="curious">';

                    document.getElementById('user_rate_result_'+ke).innerHTML = emoji;

                    document.getElementById('emoji_area_'+ke).style.display = "none";

                },
                error   : function ( xhr ) {
                    alert( "HATA OLUŞTU" );
                }

            } );
            return false;
        }
    </script>

@endsection

