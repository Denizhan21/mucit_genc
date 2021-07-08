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
                                            <img src="/homepage/media/figure/like.svg" alt="Like">
                                            @endif
                                            @php
                                            $reaction_2 = count(\App\Rating::where('rateable_id','=',$projects->id)->where('rateable_type','=',2)->get())
                                            @endphp
                                            @if(!empty($reaction_2))
                                            <img src="/homepage/media/figure/celebrate.svg" alt="Like">
                                                @endif
                                                @php
                                            $reaction_3 = count(\App\Rating::where('rateable_id','=',$projects->id)->where('rateable_type','=',3)->get())
                                                @endphp
                                                @if(!empty($reaction_3))
                                            <img src="/homepage/media/figure/support.svg" alt="Like">
                                                @endif
                                                @php
                                            $reaction_4 = count(\App\Rating::where('rateable_id','=',$projects->id)->where('rateable_type','=',4)->get())
                                                @endphp
                                                @if(!empty($reaction_4))
                                            <img src="/homepage/media/figure/love.svg" alt="Like">
                                                @endif
                                                @php
                                            $reaction_5 = count(\App\Rating::where('rateable_id','=',$projects->id)->where('rateable_type','=',5)->get())
                                                @endphp
                                                @if(!empty($reaction_5))
                                            <img src="/homepage/media/figure/insightful.svg" alt="Like">
                                                @endif
                                                @php
                                            $reaction_6 = count(\App\Rating::where('rateable_id','=',$projects->id)->where('rateable_type','=',6)->get())
                                                @endphp
                                                @if(!empty($reaction_6))
                                            <img src="/homepage/media/figure/curious.svg" alt="Like">
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
                                                <a href="#"><i class="icofont-thumbs-up"></i>Emoji Bırak!</a>
                                                <ul class="react-list">
                                                    @php
                                                        $login = \Illuminate\Support\Facades\Auth::id();

                                                    $rating_login = \App\Rating::where('rateable_id','=',$projects->id)->where('user_id','=',$login)->first();
                                                    @endphp
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
                                                        <input type="hidden" name="rateable_id" value="{{$projects->id}}">
                                                        <input type="hidden" name="rating" value="1">
                                                        <li><label class="like-button" for="{{$key+7}}"><input id="{{$key+7}}" type="radio" name="rateable_type" value="1" ><img src="/homepage/media/figure/like.svg" alt="Like"></label></li>
                                                        <li><label class="like-button" for="{{$key+14}}"><input id="{{$key+14}}" type="radio" name="rateable_type" value="2" ><img src="/homepage/media/figure/celebrate.svg" alt="Like"></label></li>
                                                        <li><label class="like-button" for="{{$key+21}}"><input id="{{$key+21}}" type="radio" name="rateable_type" value="3" ><img src="/homepage/media/figure/support.svg" alt="Like"></label></li>
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

@endsection



