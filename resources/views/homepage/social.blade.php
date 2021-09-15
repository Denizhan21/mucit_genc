@extends('homepage.template')

@section('content')

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">

                </div>
                <div class="col-lg-8">
                    @foreach($social  as $key=>$club_projects)
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
                                                $rating = \App\Rating::where('rateable_id','=',$club_projects->id)->get();
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
                                                        <div id="user_rate_result_{{$key}}"><img style="width: 20px;" src="/homepage/media/figure/like.svg" alt="Like"></div>
                                                    @elseif($rating_login->rateable_type==2)
                                                        <div id="user_rate_result_{{$key}}"><img style="width: 20px;" src="/homepage/media/figure/celebrate.svg" alt="Like"></div>
                                                    @elseif($rating_login->rateable_type==3)
                                                        <div id="user_rate_result_{{$key}}"><img style="width: 20px;" src="/homepage/media/figure/support.svg" alt="Like"></div>
                                                    @elseif($rating_login->rateable_type==4)
                                                        <div id="user_rate_result_{{$key}}"><img style="width: 20px;" src="/homepage/media/figure/love.svg" alt="Like"></div>
                                                    @elseif($rating_login->rateable_type==5)
                                                        <div id="user_rate_result_{{$key}}"><img style="width: 20px;" src="/homepage/media/figure/insightful.svg" alt="Like"></div>
                                                    @elseif($rating_login->rateable_type==6)
                                                        <div id="user_rate_result_{{$key}}"><img style="width: 20px;" src="/homepage/media/figure/curious.svg" alt="Like"></div>
                                                    @endif

                                                </a>
                                                <ul class="react-list">

                                                    @if(!empty($rating_login))
                                                        <fieldset id="emoji_area_update_{{$key}}">
                                                            <li><label class="like-button" for="{{$key+500000}}"><input id="{{$key+500000}}" type="radio" name="rateable_type" value="1" {{$rating_login->rateable_type==1?'checked':''}} onclick="rating_score_update({{$rating_login->id}},{{$key}})" ><img src="/homepage/media/figure/like.svg" alt="Like"></label></li>
                                                            <li><label class="like-button" for="{{$key+1000000}}"><input id="{{$key+1000000}}" type="radio" name="rateable_type" value="2" {{$rating_login->rateable_type==2?'checked':''}} onclick="rating_score_update({{$rating_login->id}},{{$key}})" ><img src="/homepage/media/figure/celebrate.svg" alt="Like"></label></li>
                                                            <li><label class="like-button" for="{{$key+1500000}}"><input id="{{$key+1500000}}" type="radio" name="rateable_type" value="3" {{$rating_login->rateable_type==3?'checked':''}} onclick="rating_score_update({{$rating_login->id}},{{$key}})" ><img src="/homepage/media/figure/support.svg" alt="Like"></label></li>
                                                            <li><label class="like-button" for="{{$key+2000000}}"><input id="{{$key+2000000}}" type="radio" name="rateable_type" value="4" {{$rating_login->rateable_type==4?'checked':''}} onclick="rating_score_update({{$rating_login->id}},{{$key}})" ><img src="/homepage/media/figure/love.svg" alt="Like"></label></li>
                                                            <li><label class="like-button" for="{{$key+2500000}}"><input id="{{$key+2500000}}" type="radio" name="rateable_type" value="5" {{$rating_login->rateable_type==5?'checked':''}} onclick="rating_score_update({{$rating_login->id}},{{$key}})" ><img src="/homepage/media/figure/insightful.svg" alt="Like"></label></li>
                                                            <li><label class="like-button" for="{{$key+3000000}}"><input id="{{$key+3000000}}" type="radio" name="rateable_type" value="6" {{$rating_login->rateable_type==6?'checked':''}} onclick="rating_score_update({{$rating_login->id}},{{$key}})" ><img src="/homepage/media/figure/curious.svg" alt="Like"></label></li>
                                                        </fieldset>

                                                    @else

                                                        <fieldset id="emoji_area_{{$key}}" >
                                                            <input type="hidden" id="rateable_id_{{$key}}" name="rateable_id" value="{{$club_projects->id}}">
                                                            <li><label class="like-button" for="{{$key+500000}}"><input id="{{$key+500000}}" type="radio" name="rateable_type" value="1" onclick="rating_score({{$key}})"><img src="/homepage/media/figure/like.svg" alt="Like"></label></li>
                                                            <li><label class="like-button" for="{{$key+1000000}}"><input id="{{$key+1000000}}" type="radio" name="rateable_type" value="2" onclick="rating_score({{$key}})"><img src="/homepage/media/figure/celebrate.svg" alt="Like"></label></li>
                                                            <li><label class="like-button" for="{{$key+1500000}}"><input id="{{$key+1500000}}" type="radio" name="rateable_type" value="3" onclick="rating_score({{$key}})"><img src="/homepage/media/figure/support.svg" alt="Like"></label></li>
                                                            <li><label class="like-button" for="{{$key+2000000}}"><input id="{{$key+2000000}}" type="radio" name="rateable_type" value="4" onclick="rating_score({{$key}})"><img src="/homepage/media/figure/love.svg" alt="Like"></label></li>
                                                            <li><label class="like-button" for="{{$key+2500000}}"><input id="{{$key+2500000}}" type="radio" name="rateable_type" value="5" onclick="rating_score({{$key}})"><img src="/homepage/media/figure/insightful.svg" alt="Like"></label></li>
                                                            <li><label class="like-button" for="{{$key+3000000}}"><input id="{{$key+3000000}}" type="radio" name="rateable_type" value="6" onclick="rating_score({{$key}})"><img src="/homepage/media/figure/curious.svg" alt="Like"></label></li>
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
        function rating_score_update ( ke,ka ) {

            var rateable_type = $("input[name=rateable_type]:checked").val();
            var url = '{{ route("rating_send_update", ":id") }}';
            url = url.replace(':id', ke );

            $.ajax( {
                type    : "GET",
                data: {
                    "rateable_type" : rateable_type,
                    "_token": "{{ csrf_token() }}",
                },
                {{--url     : "{{route('rating_send_update',$projects->id)}}",--}}
                url: url,
                success : function ()
                {


                    if(rateable_type == 1) var emoji = '<img style="width: 20px;" src="/homepage/media/figure/like.svg" alt="Like">';
                    if(rateable_type == 2) var emoji = '<img style="width: 20px;" src="/homepage/media/figure/celebrate.svg" alt="celebrate">';
                    if(rateable_type == 3) var emoji = '<img style="width: 20px;" src="/homepage/media/figure/support.svg" alt="support">';
                    if(rateable_type == 4) var emoji = '<img style="width: 20px;" src="/homepage/media/figure/love.svg" alt="love">';
                    if(rateable_type == 5) var emoji = '<img style="width: 20px;" src="/homepage/media/figure/insightful.svg" alt="insightful">';
                    if(rateable_type == 6) var emoji = '<img style="width: 20px;" src="/homepage/media/figure/curious.svg" alt="curious">';

                    document.getElementById('user_rate_result_'+ka).innerHTML = emoji;

                    document.getElementById('emoji_area_update'+ka).style.display = "none";

                },
                error   : function ( xhr ) {
                    alert( "HATA" );
                }

            } );
            return false;
        }

        @if(!empty($rating))
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
        @endif

    </script>
@endsection
