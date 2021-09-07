@extends('homepage.template')

@section('content')

    <div id="wrapper" class="wrapper overflow-hidden">
    <section class="hero-banner">
        <div class="container">
            <div class="hero-content" data-sal="zoom-out" data-sal-duration="1000">
                <h1 class="item-title">
                    @if(!empty($news))
                    {{$news->title}}
                        @endif
                </h1>
{{--                <p> @if(!empty($news))  {!! substr($news->content,0,50) !!}... @endif</p>--}}

{{--                <div class="item-number">--}}
{{--                    @if(!empty($news))--}}
{{--                @php--}}
{{--                    setlocale(LC_TIME, "turkish");--}}
{{--                    setlocale(LC_ALL,'turkish');--}}
{{--                    echo iconv('latin5','utf-8',strftime('%B',strtotime($news->created_at)));--}}
{{--                @endphp--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--                <div class="conn-people">Ayının Gündemi</div>--}}
                @if(!empty($news))
                <a href="/news/{{$news->id}}" class="button-slide">
                    @endif
                    <span class="btn-text">Gündeme Git</span>
                    <span class="btn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="21px" height="10px">
                                <path fill-rule="evenodd" fill="rgb(255, 255, 255)" d="M16.671,9.998 L12.997,9.998 L16.462,6.000 L5.000,6.000 L5.000,4.000 L16.462,4.000 L12.997,0.002 L16.671,0.002 L21.003,5.000 L16.671,9.998 ZM17.000,5.379 L17.328,5.000 L17.000,4.621 L17.000,5.379 ZM-0.000,4.000 L3.000,4.000 L3.000,6.000 L-0.000,6.000 L-0.000,4.000 Z" />
                            </svg>
                        </span>
                </a>
            </div>
        </div>
        <div class="leftside-image">   @if(!empty($news))
            <div class="cartoon-image" data-sal="slide-down" data-sal-duration="1000" data-sal-delay="100">
                <img style="width: 689px;height: 433px" src="{{$news->photo}}" alt="People" width="689" height="433">
            </div>@endif
            <div class="shape-image" data-sal="slide-down" data-sal-duration="500" data-sal-delay="700">
                <img src="/homepage/media/banner/shape_1.png" alt="shape">
            </div>
        </div>
        <div class="map-line">
            <img src="/homepage/media/banner/map_line.png" alt="map" data-sal="slide-up" data-sal-duration="500" data-sal-delay="800">
            <ul class="map-marker">
                <li data-sal="slide-up" data-sal-duration="700" data-sal-delay="1000"><img src="/homepage/media/banner/marker_1.png" alt="marker"></li>
                <li data-sal="slide-up" data-sal-duration="800" data-sal-delay="1000"><img src="/homepage/media/banner/marker_2.png" alt="marker"></li>
                <li data-sal="slide-up" data-sal-duration="900" data-sal-delay="1000"><img src="/homepage/media/banner/marker_3.png" alt="marker"></li>
                <li data-sal="slide-up" data-sal-duration="1000" data-sal-delay="1000"><img src="/homepage/media/banner/marker_4.png" alt="marker"></li>
            </ul>
        </div>
    </section>







    <section class="section groups-popular">
        <div class="container">
            <div class="section-heading">
                <h2 class="heading-title">Külüplerimiz</h2>
                <p>Mucit Genç bünyesinde ki kulüpler ve kulüplerdeki öğrenciler ve onların projeleri. </p>
            </div>
            <div class="row gutters-15 justify-content-center">


                @foreach($club as $clubs)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="groups-box">
                        <div class="item-img">
                            <img style="width: 285px;height: 185px" src="/{{$clubs->logo}}" alt="Groups">
                        </div>
                        <div class="item-content">
                            <h3 class="item-title"><a href="/clubs/{{$clubs->id}}">{{$clubs->name}}</a></h3>
                            <div class="groups-member"><a style="color: white" href="/clubs/{{$clubs->id}}">Git</a></div>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
            <div class="see-all-btn">
                <a href="{{route('club_view')}}" class="button-slide">
                    <span class="btn-text">Kulüplere Git</span>
                    <span class="btn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="21px" height="10px">
                                <path fill-rule="evenodd" fill="rgb(255, 255, 255)" d="M16.671,9.998 L12.997,9.998 L16.462,6.000 L5.000,6.000 L5.000,4.000 L16.462,4.000 L12.997,0.002 L16.671,0.002 L21.003,5.000 L16.671,9.998 ZM17.000,5.379 L17.328,5.000 L17.000,4.621 L17.000,5.379 ZM-0.000,4.000 L3.000,4.000 L3.000,6.000 L-0.000,6.000 L-0.000,4.000 Z" />
                            </svg>
                        </span>
                </a>
            </div>
        </div>
    </section>

        <section class="testimonial-carousel">
            <ul class="shape-wrap">
                <li><img src="/homepage/media/figure/shape_4.png" alt="shape"></li>
                <li><img src="/homepage/media/figure/shape_8.png" alt="shape"></li>
                <li><img src="/homepage/media/figure/shape_2.png" alt="shape"></li>
                <li><img src="/homepage/media/figure/shape_9.png" alt="shape"></li>
                <li><img src="/homepage/media/figure/shape_10.png" alt="shape"></li>
                <li><img src="/homepage/media/figure/shape_11.png" alt="shape"></li>
                <li><img src="/homepage/media/figure/shape_8.png" alt="shape"></li>
            </ul>
        </section>

        <section class="section groups-popular">
            <div class="container">
                <div class="section-heading">
                    <h2 class="heading-title">En Son Yüklenen Projeler</h2>
                    <p>Mucit Genç bünyesinde ki en son yüklenen projeler </p>
                </div>
                <div class="row gutters-15 justify-content-center">











                    @foreach($projects_last as $key=>$projects)
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
                                            <div class="meta-text">
                                                {{count($rating = \App\Rating::where('rateable_id','=',$projects->id)->get())}}
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="block-box post-view">
                                    <div class="post-footer">
                                        <ul>
                                            @if (Route::has('login'))
                                                @auth
                                                    <li class="post-react">
                                                        @php
                                                            $login = \Illuminate\Support\Facades\Auth::id();

                                                        $rating_login = \App\Rating::where('rateable_id','=',$projects->id)->where('user_id','=',$login)->first();
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
{{--
                                                                {!! Form::model($rating_login,['route'=>['like_send_update',$rating_login->id],'method'=>'PUT','files'=>'true','class'=>'form-horizontal']) !!}
--}}
                                                             <form method="PUT" action="{{route('like_send_update',$rating_login->id)}}" class="form-horizontal" enctype="multipart/form-data" onsubmit="return ajaxeklem();" id="ajax-formm">
                                                    {{csrf_field()}}
                                                                <li><label class="like-button" for="{{$key+60}}"><input id="{{$key+60}}" type="radio" name="rateable_type" value="1" {{$rating_login->rateable_type==1?'checked':''}}><img src="/homepage/media/figure/like.svg" alt="Like"></label></li>
                                                                <li><label class="like-button" for="{{$key+120}}"><input id="{{$key+120}}" type="radio" name="rateable_type" value="2" {{$rating_login->rateable_type==2?'checked':''}}><img src="/homepage/media/figure/celebrate.svg" alt="Like"></label></li>
                                                                <li><label class="like-button" for="{{$key+180}}"><input id="{{$key+180}}" type="radio" name="rateable_type" value="3" {{$rating_login->rateable_type==3?'checked':''}}><img src="/homepage/media/figure/support.svg" alt="Like"></label></li>
                                                                <li><label class="like-button" for="{{$key+240}}"><input id="{{$key+240}}" type="radio" name="rateable_type" value="4" {{$rating_login->rateable_type==4?'checked':''}}><img src="/homepage/media/figure/love.svg" alt="Like"></label></li>
                                                                <li><label class="like-button" for="{{$key+300}}"><input id="{{$key+300}}" type="radio" name="rateable_type" value="5" {{$rating_login->rateable_type==5?'checked':''}}><img src="/homepage/media/figure/insightful.svg" alt="Like"></label></li>
                                                                <li><label class="like-button" for="{{$key+360}}"><input id="{{$key+360}}" type="radio" name="rateable_type" value="6" {{$rating_login->rateable_type==6?'checked':''}}><img src="/homepage/media/figure/curious.svg" alt="Like"></label></li>
                                                                <li><button class="btn btn-white" type="submit">Gönder</button></li>
{{--
                                                                {!! Form::close() !!}
--}}
                                                                 </form>
                                                            @else
{{--
                                                                {!! Form::open(['route'=>['like_send'],'method'=>'POST','files'=>'true','class'=>'form-horizontal']) !!}
--}}
                                                            <form method="POST" action="{{route('like_send')}}" class="form-horizontal" enctype="multipart/form-data" onsubmit="return ajaxekle();" id="ajax-form">
                                                    {{csrf_field()}}
                                                                <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                                                                <input type="hidden" name="rateable_id" value="{{$projects->id}}">
                                                                <input type="hidden" name="rating" value="1">
                                                                <li><label class="like-button" for="{{$key+60}}"><input id="{{$key+60}}" type="radio" name="rateable_type" value="1" ><img src="/homepage/media/figure/like.svg" alt="Like"></label></li>
                                                                <li><label class="like-button" for="{{$key+120}}"><input id="{{$key+120}}" type="radio" name="rateable_type" value="2" ><img src="/homepage/media/figure/celebrate.svg" alt="Like"></label></li>
                                                                <li><label class="like-button" for="{{$key+180}}"><input id="{{$key+180}}" type="radio" name="rateable_type" value="3" ><img src="/homepage/media/figure/support.svg" alt="Like"></label></li>
                                                                <li><label class="like-button" for="{{$key+240}}"><input id="{{$key+240}}" type="radio" name="rateable_type" value="4" ><img src="/homepage/media/figure/love.svg" alt="Like"></label></li>
                                                                <li><label class="like-button" for="{{$key+300}}"><input id="{{$key+300}}" type="radio" name="rateable_type" value="5" ><img src="/homepage/media/figure/insightful.svg" alt="Like"></label></li>
                                                                <li><label class="like-button" for="{{$key+360}}"><input id="{{$key+360}}" type="radio" name="rateable_type" value="6" ><img src="/homepage/media/figure/curious.svg" alt="Like"></label></li>
                                                                <li><button class="btn btn-white" type="submit">Gönder</button></li>
{{--
                                                                {!! Form::close() !!}
--}}
                                                                </form>
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
                <div class="see-all-btn">
                    <a href="{{route('project_view')}}" class="button-slide">
                        <span class="btn-text">Projelere Git</span>
                        <span class="btn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="21px" height="10px">
                                <path fill-rule="evenodd" fill="rgb(255, 255, 255)" d="M16.671,9.998 L12.997,9.998 L16.462,6.000 L5.000,6.000 L5.000,4.000 L16.462,4.000 L12.997,0.002 L16.671,0.002 L21.003,5.000 L16.671,9.998 ZM17.000,5.379 L17.328,5.000 L17.000,4.621 L17.000,5.379 ZM-0.000,4.000 L3.000,4.000 L3.000,6.000 L-0.000,6.000 L-0.000,4.000 Z" />
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </section>



        <section class="testimonial-carousel">
            <ul class="shape-wrap">
                <li><img src="/homepage/media/figure/shape_4.png" alt="shape"></li>
                <li><img src="/homepage/media/figure/shape_8.png" alt="shape"></li>
                <li><img src="/homepage/media/figure/shape_2.png" alt="shape"></li>
                <li><img src="/homepage/media/figure/shape_9.png" alt="shape"></li>
                <li><img src="/homepage/media/figure/shape_10.png" alt="shape"></li>
                <li><img src="/homepage/media/figure/shape_11.png" alt="shape"></li>
                <li><img src="/homepage/media/figure/shape_8.png" alt="shape"></li>
            </ul>
        </section>


        <section class="section blog-grid">
            <div class="container">
                <div class="section-heading flex-heading">
                    <div class="row">
                        <div class="col-lg-5">
                            <h2 class="heading-title">Duyurular</h2>
                        </div>
                        <div class="col-lg-7">

                        </div>
                    </div>
                </div>



                <div class="row">
                    @foreach($activities as $activity)
                        <div class="col-md-4">
                            <div class="blog-box">
                                <div class="blog-img">
                                    <a href="/activities/{{$activity->id}}">
                                        <img style="width: 510px;height: 340px;" src="/{{$activity->photo}}" alt="Blog">
                                    </a>
                                    <div class="blog-date"><i class="icofont-calendar"></i>
                                        @php
                                            setlocale(LC_TIME, "turkish");
                                            setlocale(LC_ALL,'turkish');
                                            echo iconv('latin5','utf-8',strftime('%d %B %Y %A',strtotime($activity->created_at)));
                                        @endphp
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <h3 class="blog-title"><a href="/activities/{{$activity->id}}">{{$activity->title}} </a> ({{$activity->type}})</h3>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>





            </div>
        </section>





</div>





@endsection

@section('css')

@endsection

@section('js')
    @if(!empty($rating_login))
        <script>
            function ajaxeklem() {
                var form = $("#ajax-formm");
                var form_data = $("#ajax-formm").serialize();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    type:"PUT",
                    url:"{{route('like_send_update',$rating_login->id)}}",
                    data: form_data,
                    success:function () {
                        swal({
                            title:"Başarılı",
                            text:"Emojiniz Düzenlendi",
                            type: "success",
                            timer:2000,
                            showConfirmButton: false
                        });
                        setInterval('window.location.reload()',2500);
                    }
                });
                return false;
            }
        </script>
    @endif


    <script>
        function ajaxekle() {
            var form = $("#ajax-form");
            var form_data = $("#ajax-form").serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                type:"POST",
                url:"{{route('like_send')}}",
                data: form_data,
                success:function () {
                    swal({
                        title:"Başarılı",
                        text:"Emojiniz Eklendi",
                        type: "success",
                        timer:2000,
                        showConfirmButton: false
                    });
                    setInterval('window.location.reload()',2500);
                    // document.getElementById("ajax-form").reset();
                }
            });
            return false;
        }
    </script>
@endsection
