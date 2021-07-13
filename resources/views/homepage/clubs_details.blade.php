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
                                        <img src="/{{$club_projects->student->avatar}}" alt="{{$club_projects->student->name}}">
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
                            <p>{{$club_projects->description}}</p>




                            @if($club_projects->type=='Fotoğraf')


                                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">


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


                                </div>



                {{--            <div id="demo" class="carousel slide" data-ride="carousel">


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

                            </div>--}}

                            @elseif($club_projects->type=='Video')
                                <img style="width: 710px;height: 400px" src="/{{$club_projects->photo}}" alt="Groups">
                                <?php
                                $metin  = $club_projects->content;
                                $eski   = "view?usp=sharing";
                                $yeni   = "preview";
                                $metin = str_replace($eski, $yeni, $metin);
                                ?>
                                <iframe src="{{$metin}}" frameborder="0" width="710" height="400"></iframe>
                            @elseif($club_projects->type=='YouTube')
                                <img style="width: 710px;height: 400px" src="/{{$club_projects->photo}}" alt="Groups">

                                <iframe src="{{$club_projects->content}}" frameborder="0" width="710" height="400"></iframe>
                            @elseif($club_projects->type=='Power Point')
                                <img style="width: 710px;height: 400px" src="/{{$club_projects->photo}}" alt="Groups">
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
                                        <div class="meta-text">{{count($rating = \App\Rating::where('rateable_id','=',$club_projects->id)->get())}}</div>
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
                                                    <i class="icofont-thumbs-up"></i>
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
                                                Emoji Bırak!</a>
                                            <ul class="react-list">

                                                @if(!empty($rating_login))
                                                    {!! Form::model($rating_login,['route'=>['like_send_update',$rating_login->id],'method'=>'PUT','files'=>'true','class'=>'form-horizontal']) !!}
                                                    <li><label class="like-button" for="{{$key+7}}"><input id="{{$key+7}}" type="radio" name="rateable_type" value="1" {{$rating_login->rateable_type==1?'checked':''}}><img src="/homepage/media/figure/like.svg" alt="Like"></label></li>
                                                    <li><label class="like-button" for="{{$key+14}}"><input id="{{$key+14}}" type="radio" name="rateable_type" value="2" {{$rating_login->rateable_type==2?'checked':''}}><img src="/homepage/media/figure/celebrate.svg" alt="Like"></label></li>
                                                    <li><label class="like-button" for="{{$key+21}}"><input id="{{$key+21}}" type="radio" name="rateable_type" value="3" {{$rating_login->rateable_type==3?'checked':''}}><img src="/homepage/media/figure/support.svg" alt="Like"></label></li>
                                                    <li><label class="like-button" for="{{$key+28}}"><input id="{{$key+28}}" type="radio" name="rateable_type" value="4" {{$rating_login->rateable_type==4?'checked':''}}><img src="/homepage/media/figure/love.svg" alt="Like"></label></li>
                                                    <li><label class="like-button" for="{{$key+35}}"><input id="{{$key+35}}" type="radio" name="rateable_type" value="5" {{$rating_login->rateable_type==5?'checked':''}}><img src="/homepage/media/figure/insightful.svg" alt="Like"></label></li>
                                                    <li><label class="like-button" for="{{$key+42}}"><input id="{{$key+42}}" type="radio" name="rateable_type" value="6" {{$rating_login->rateable_type==6?'checked':''}}><img src="/homepage/media/figure/curious.svg" alt="Like"></label></li>
                                                    <li><button class="btn btn-white" type="submit">Gönder</button></li>
                                                    {!! Form::close() !!}
                                                @else
                                                    {!! Form::open(['route'=>['like_send'],'method'=>'POST','files'=>'true','class'=>'form-horizontal']) !!}
                                                    <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                                                    <input type="hidden" name="rateable_id" value="{{$club_projects->id}}">
                                                    <input type="hidden" name="rating" value="1">
                                                    <li><label class="like-button" for="{{$key+7}}"><input id="{{$key+7}}" type="radio" name="rateable_type" value="1" ><img src="/homepage/media/figure/like.svg" alt="Like"></label></li>
                                                    <li><label class="like-button" for="{{$key+14}}"><input id="{{$key+14}}" type="radio" name="rateable_type" value="2" ><img src="/homepage/media/figure/celebrate.svg" alt="Like"></label></li>
                                                    <li><label class="like-button" for="{{$key+24}}"><input id="{{$key+21}}" type="radio" name="rateable_type" value="3" ><img src="/homepage/media/figure/support.svg" alt="Like"></label></li>
                                                    <li><label class="like-button" for="{{$key+28}}"><input id="{{$key+28}}" type="radio" name="rateable_type" value="4" ><img src="/homepage/media/figure/love.svg" alt="Like"></label></li>
                                                    <li><label class="like-button" for="{{$key+35}}"><input id="{{$key+35}}" type="radio" name="rateable_type" value="5" ><img src="/homepage/media/figure/insightful.svg" alt="Like"></label></li>
                                                    <li><label class="like-button" for="{{$key+42}}"><input id="{{$key+42}}" type="radio" name="rateable_type" value="6" ><img src="/homepage/media/figure/curious.svg" alt="Like"></label></li>
                                                    <li><button class="btn btn-white" type="submit">Gönder</button></li>
                                                    {!! Form::close() !!}
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
                                                    <img src="/{{$student->student->avatar}}" alt="Chat">
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
{{--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
--}}
@endsection

@section('js')
  {{--  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
--}}@endsection

