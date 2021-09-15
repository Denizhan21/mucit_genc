@extends('homepage.template')

@section('content')


    <div class="page-content">


        <div class="container">

            <form action="" method="get">
            <div class="block-box product-filter">
                <label>Filtrele:</label>

                <div class="select-box">
                    <input class="form-control" type="text" name="name" value="{{$name}}" placeholder="Proje Adı">
                </div>


                <div class="select-box">
                    <select class="form-control" name="order_club">
                        <option value="">Kulüp Seç</option>
                        @foreach($clubs as $club)
                        <option value="{{$club->id}}" {{$order_club==$club->id?'selected':''}}>{{$club->name}}</option>
                        @endforeach
                    </select>
                   {{-- <select class="form-control" name="order_field">
                        <option value="">Sıralama</option>
                        <option value="created_at" {{$order_field=='created_at'?'selected':''}}>Talep Tarihi</option>
                        <option value="date_required" {{$order_field=='date_required'?'selected':''}}>İstenen Tarih</option>
                        <option value="start" {{$order_field=='start'?'selected':''}}>Başlangıç Tarihi</option>
                        <option value="end" {{$order_field=='end'?'selected':''}}>Bitiş Tarihi</option>
                    </select>--}}
                    <select class="form-control" name="order_type">
                        <option value="">Sıralama</option>
                        <option value="desc" {{$order_type=='desc'?'selected':''}}>Sondan Başa</option>
                        <option value="asc" {{$order_type=='asc'?'selected':''}}>Baştan Sona</option>
                    </select>

                    @if (Route::has('login'))
                        @auth
                    <select class="form-control" name="user_id">
                        <option value="">Projeyi GÖnderren</option>
                        @foreach($project_user as $users)
                        <option value="{{$users->id}}" {{$user_id==$users->id?'selected':''}}>{{$users->name}}</option>
                        @endforeach
                    </select>
                        @endauth
                    @endif
                </div>

                <div class="filter-btn">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="icofont-search-2"></i> Getir</button>
                    <a href="{{route('project_view')}}" class="btn btn-xs btn-danger"><i class="icofont-magic"></i> Temizle</a>
                </div>

            </div>
            </form>









            <div class="row gutters-20">

                @foreach($request_forms as $key=>$projects)
                    <div class="col-lg-4 col-md-6">
                        <div class="block-box user-blog">
                            <div class="blog-img">
                                <a href="/projects/{{$projects->id}}">

                                    @if($projects->type == 'Fotoğraf')
                                        @foreach(json_decode($projects->content) as $key=>$image)
                                            <div class="carousel-item {{$key==0?'active':''}}">
                                                <img style="width: 376px;height: 250px" src="/{{$image}}" alt="Groups">
                                            </div>
                                        @endforeach
                                    @else
                                        <img style="width: 376px;height: 250px" src="/{{$projects->photo}}" alt="Groups">
                                    @endif



                                </a>
                            </div>

                            <div class="blog-content">
                                <div class="blog-category">
                                    <a href="/clubs/{{$projects->club->id}}">{{$projects->club->name}}</a>

                                </div>
                                <h3 class="blog-title"><a href="/projects/{{$projects->id}}">{{$projects->name}}</a></h3>
                                <div class="blog-date"><i class="icofont-calendar"></i>
                                    @php
                                        setlocale(LC_TIME, "turkish");
                                        setlocale(LC_ALL,'turkish');
                                        echo iconv('latin5','utf-8',strftime('%d %B %Y %A',strtotime($projects->created_at)));
                                    @endphp
                                </div>
                                <p>{!! substr($projects->description,0,20) !!}...</p>
                            </div>
                            <div class="blog-meta">
                                <ul>
                                    <li class="blog-reaction">
                                        <div class="reaction-icon">
                                            @php
                                            $reaction_1 = count(\App\Rating::where('rateable_id','=',$projects->id)->where('rateable_type','=',1)->get())
                                            @endphp
                                            @if(!empty($reaction_1))
                                            <img style="width: 24px;" src="/homepage/media/figure/like.svg" alt="Like">
                                            @endif
                                            @php
                                            $reaction_2 = count(\App\Rating::where('rateable_id','=',$projects->id)->where('rateable_type','=',2)->get())
                                            @endphp
                                            @if(!empty($reaction_2))
                                            <img style="width: 24px;" src="/homepage/media/figure/celebrate.svg" alt="Like">
                                                @endif
                                                @php
                                            $reaction_3 = count(\App\Rating::where('rateable_id','=',$projects->id)->where('rateable_type','=',3)->get())
                                                @endphp
                                                @if(!empty($reaction_3))
                                            <img style="width: 24px;" src="/homepage/media/figure/support.svg" alt="Like">
                                                @endif
                                                @php
                                            $reaction_4 = count(\App\Rating::where('rateable_id','=',$projects->id)->where('rateable_type','=',4)->get())
                                                @endphp
                                                @if(!empty($reaction_4))
                                            <img style="width: 24px;" src="/homepage/media/figure/love.svg" alt="Like">
                                                @endif
                                                @php
                                            $reaction_5 = count(\App\Rating::where('rateable_id','=',$projects->id)->where('rateable_type','=',5)->get())
                                                @endphp
                                                @if(!empty($reaction_5))
                                            <img style="width: 24px;" src="/homepage/media/figure/insightful.svg" alt="Like">
                                                @endif
                                                @php
                                            $reaction_6 = count(\App\Rating::where('rateable_id','=',$projects->id)->where('rateable_type','=',6)->get())
                                                @endphp
                                                @if(!empty($reaction_6))
                                            <img style="width: 24px;" src="/homepage/media/figure/curious.svg" alt="Like">
                                                @endif

                                        </div>
                                        @php
                                            $rating = \App\Rating::where('rateable_id','=',$projects->id)->get();
                                    @endphp

                                        <div class="meta-text">
                                            <div id="total_rating_{{$key}}">
                                            {{count($rating)}}
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="block-box post-view">
                            <div class="post-footer">
                                <ul>
                                    @if (Route::has('login'))
                                        @auth

                                            @php
                                                $login = \Illuminate\Support\Facades\Auth::id();

                                            $rating_login = \App\Rating::where('rateable_id','=',$projects->id)->where('user_id','=',$login)->first();
                                            @endphp

                                            <li class="post-react">
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
                                                            <input type="hidden" id="rateable_id_{{$key}}" name="rateable_id" value="{{$projects->id}}">
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
                                </ul>
                            </div>
                            </div>

                        </div>
                    </div>
                @endforeach
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



