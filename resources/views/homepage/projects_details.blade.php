@extends('homepage.template')

@section('content')
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                        <div class="block-box post-view">
                            <div class="post-header">
                                <div class="media">
                                    <div class="user-img">

                                        @if (Route::has('login'))
                                            @auth

                                        @if(!empty($projects->student->avatar))
                                            <img src="/{{$projects->student->avatar}}" alt="{{$projects->student->name}}">
                                        @else
                                            <img src="/homepage/media/figure/chat_10.jpg" alt="{{$projects->student->name}}">
                                        @endif

                                            @else
                                                <img src="/homepage/media/figure/chat_10.jpg" alt="gönderen">
                                            @endauth
                                            @endif
                                    </div>
                                    <div class="media-body">
                                        @if (Route::has('login'))
                                            @auth
                                        <div class="user-title"><a href="user-timeline.html">{{$projects->student->name}}</a></div>
                                            @else
                                                <div class="user-title"><a href="user-timeline.html">Gönderen öğrencinin ismini görebilmek için sisteme giriş yapmanız gerekmektedir</a></div>
                                            @endauth
                                        @endif
                                        <ul class="entry-meta">
                                            <li class="meta-time">
                                                <?php
                                                date_default_timezone_set('Europe/Istanbul');
                                                $bugunTarihi=date("d-m-Y H:i:s");
                                                $girilentarih=date('d-m-Y H:i:s',  strtotime($projects->created_at));
                                                $date1=date_create($girilentarih);
                                                $date2=date_create($bugunTarihi);
                                                $diff=date_diff($date1,$date2);
                                                echo $diff->format("%s saniye, %i dakika, %H saat, %d gün, %m ay, %Y yıl önce.");
                                                ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="post-body">
                                <p><b>{{$projects->name}}</b></p>
                                <p>{!! $projects->description !!}</p>
                                @if($projects->type=='Fotoğraf')



                                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">


                                        <div class="carousel-indicators">

                                            @foreach(json_decode($projects->content) as $key=>$image)
                                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$key}}" class="{{$key==0?'active':''}}" aria-current="true" aria-label="Slide {{$key+1}}"></button>
                                            @endforeach

                                        </div>


                                        <div class="carousel-inner">

                                            @foreach(json_decode($projects->content) as $key=>$image)
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




                                {{--    <div id="demo" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach(json_decode($projects->content) as $key=>$image)
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





                                @elseif($projects->type=='Video')
                                    <?php
                                    $metin  = $projects->content;
                                    $eski   = "view?usp=sharing";
                                    $yeni   = "preview";
                                    $metin = str_replace($eski, $yeni, $metin);
                                    ?>
                                    <iframe src="{{$metin}}" frameborder="0" width="710" height="400"></iframe>
                                @elseif($projects->type=='YouTube')

                                    <iframe src="{{$projects->content}}" frameborder="0" width="710" height="400"></iframe>
                                @elseif($projects->type=='Power Point')
                                    <?php
                                    $metin  = $projects->content;
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
                                                @if(count($reaction_1)!=0)
                                            <img style="width: 24px;" src="/homepage/media/figure/like.svg" alt="Like">
                                                @endif
                                                @if(count($reaction_2)!=0)
                                            <img style="width: 24px;" src="/homepage/media/figure/celebrate.svg" alt="Like">
                                                    @endif
                                                @if(count($reaction_3)!=0)
                                            <img style="width: 24px;" src="/homepage/media/figure/support.svg" alt="Like">
                                                    @endif
                                                @if(count($reaction_4)!=0)
                                            <img style="width: 24px;" src="/homepage/media/figure/love.svg" alt="Like">
                                                    @endif
                                                @if(count($reaction_5)!=0)
                                            <img style="width: 24px;" src="/homepage/media/figure/insightful.svg" alt="Like">
                                                    @endif
                                                @if(count($reaction_6)!=0)
                                            <img style="width: 24px;" src="/homepage/media/figure/curious.svg" alt="Like">
                                                    @endif








                                            </div>
                                            <div class="meta-text">{{count($rating)}}</div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="post-footer">
                                <ul>  @if (Route::has('login'))
                                        @auth
                                    <li class="post-react">
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
                                        <ul class="react-list emojies">

                                         @if(!empty($rating_login))
{{--                                                {!! Form::model($rating_login,['route'=>['like_send_update',$rating_login->id],'method'=>'PUT','files'=>'true','class'=>'form-horizontal']) !!}--}}
                                                <form method="PUT" action="{{route('like_send_update',$rating_login->id)}}" class="form-horizontal" enctype="multipart/form-data" onsubmit="return ajaxeklem();" id="ajax-formm">
                                                    {{csrf_field()}}
                                                <li><label class="like-button" for="1"><input id="1" type="radio" name="rateable_type" value="1" {{$rating_login->rateable_type==1?'checked':''}}><img src="/homepage/media/figure/like.svg" alt="Like"></label></li>
                                                <li><label class="like-button" for="2"><input id="2" type="radio" name="rateable_type" value="2" {{$rating_login->rateable_type==2?'checked':''}}><img src="/homepage/media/figure/celebrate.svg" alt="Like"></label></li>
                                                <li><label class="like-button" for="3"><input id="3" type="radio" name="rateable_type" value="3" {{$rating_login->rateable_type==3?'checked':''}}><img src="/homepage/media/figure/support.svg" alt="Like"></label></li>
                                                <li><label class="like-button" for="4"><input id="4" type="radio" name="rateable_type" value="4" {{$rating_login->rateable_type==4?'checked':''}}><img src="/homepage/media/figure/love.svg" alt="Like"></label></li>
                                                <li><label class="like-button" for="5"><input id="5" type="radio" name="rateable_type" value="5" {{$rating_login->rateable_type==5?'checked':''}}><img src="/homepage/media/figure/insightful.svg" alt="Like"></label></li>
                                                <li><label class="like-button" for="6"><input id="6" type="radio" name="rateable_type" value="6" {{$rating_login->rateable_type==6?'checked':''}}><img src="/homepage/media/figure/curious.svg" alt="Like"></label></li>
                                                <li><button class="btn btn-white" type="submit">Gönder</button></li>
{{--                                                {!! Form::close() !!}--}}
                                                </form>
                                            @else
{{--                                                {!! Form::open(['route'=>['like_send'],'method'=>'POST','files'=>'true','class'=>'form-horizontal']) !!}--}}
                                                <form method="POST" action="{{route('like_send')}}" class="form-horizontal" enctype="multipart/form-data" onsubmit="return ajaxekle();" id="ajax-form">
                                                    {{csrf_field()}}
                                                <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                                                <input type="hidden" name="rateable_id" value="{{$projects->id}}">
                                                <input type="hidden" name="rating" value="1">
                                                <li><label class="like-button" for="1"><input id="1" type="radio" name="rateable_type" value="1" ><img src="/homepage/media/figure/like.svg" alt="Like"></label></li>
                                                <li><label class="like-button" for="2"><input id="2" type="radio" name="rateable_type" value="2" ><img src="/homepage/media/figure/celebrate.svg" alt="Like"></label></li>
                                                <li><label class="like-button" for="3"><input id="3" type="radio" name="rateable_type" value="3" ><img src="/homepage/media/figure/support.svg" alt="Like"></label></li>
                                                <li><label class="like-button" for="4"><input id="4" type="radio" name="rateable_type" value="4" ><img src="/homepage/media/figure/love.svg" alt="Like"></label></li>
                                                <li><label class="like-button" for="5"><input id="5" type="radio" name="rateable_type" value="5" ><img src="/homepage/media/figure/insightful.svg" alt="Like"></label></li>
                                                <li><label class="like-button" for="6"><input id="6" type="radio" name="rateable_type" value="6" ><img src="/homepage/media/figure/curious.svg" alt="Like"></label></li>
                                                <li><button class="btn btn-white" type="submit">Gönder</button></li>
{{--                                                {!! Form::close() !!}--}}
                                                </form>
                                            @endif


                                        </ul>
                                    </li>
                                        @endauth
                                    @endif
                                    <li><i class="icofont-comment"></i>{{count($comment)}} Yorum  </li>
                                   {{-- <li class="post-share">
                                        <a href="javascript:void(0);" class="share-btn"><i class="icofont-share"></i>Share</a>
                                        <ul class="share-list">
                                            <li><a href="#" class="color-fb"><i class="icofont-facebook"></i></a></li>
                                            <li><a href="#" class="color-messenger"><i class="icofont-facebook-messenger"></i></a></li>
                                            <li><a href="#" class="color-instagram"><i class="icofont-instagram"></i></a></li>
                                            <li><a href="#" class="color-whatsapp"><i class="icofont-brand-whatsapp"></i></a></li>
                                            <li><a href="#" class="color-twitter"><i class="icofont-twitter"></i></a></li>
                                        </ul>
                                    </li>--}}
                                </ul>
                            </div>
                            @if (Route::has('login'))
                                @auth

                            @if(\Illuminate\Support\Facades\Auth::user()->comment_authority==1)
                                {!! Form::open(['route'=>['comment_send'],'method'=>'POST','files'=>'true','class'=>'form-horizontal']) !!}


                                        <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">


                                <input type="hidden" name="project_id" value="{{$projects->id}}">
                                <input type="hidden" name="status" value="">

                                <div class="col-lg-12 form-group">
                                    <textarea name="content" class="form-control textarea" placeholder="Yorumunuzu Gönderebilirsiniz . . ." cols="30" rows="7"></textarea>
                                </div>

                                <div class="col-lg-12 form-group">
                                    <button id="gameStart" class="submit-btn" type="submit">Gönder</button>
                                </div>

                                {!! Form::close() !!}
                            @endif
                                @endauth
                            @endif

                            <div class="single-product-info">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="reviews" role="tabpanel">
                                        <div class="product-review">
                                            @foreach($comment as $key=>$comments)
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="/homepage/media/figure/author_5.jpg" alt="blog">
                                                </div>
                                                <div class="media-body">
                                                    <div class="item-date">
                                                       {{-- <?php
                                                        date_default_timezone_set('Europe/Istanbul');
                                                        $bugunTarihi=date("d-m-Y H:i:s");
                                                        $girilentarih=date('d-m-Y H:i:s',  strtotime($comments->created_at));
                                                        $date1=date_create($girilentarih);
                                                        $date2=date_create($bugunTarihi);
                                                        $diff=date_diff($date1,$date2);
                                                        echo $diff->format("%s saniye, %i dakika, %H saat, %d gün, %m ay, %Y yıl önce.");
                                                        ?>--}}
                                                        @php
                                                            setlocale(LC_TIME, "turkish");
                                                            setlocale(LC_ALL,'turkish');
                                                            echo iconv('latin5','utf-8',strftime('%d %B %Y %A',strtotime($comments->created_at)));
                                                        @endphp
                                                    </div>
                                                    <div class="author-name">
                                                        <h5 class="item-title">{{$comments->user->name}}</h5>

                                                    </div>
                                                    <p>{!! $comments->content !!}</p>
                                                </div>
                                            </div>

                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>




                        </div>

                </div>



                <div class="col-lg-4 widget-block widget-break-lg">
                    <div class="widget widget-memebers">
                        <div class="widget-heading">
                            <h3 class="widget-title">Öğretmen Yorumu</h3>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="newest-member" role="tabpanel">
                                <div class="members-list">

                                    @foreach($teacher_comments as $teacher_comment)
                                    <div class="media">
                                        <div class="item-img">
                                            <a href="#">
                                                <img src="/homepage/media/figure/chat_1.jpg" alt="Chat">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="item-title"><a href="#">{{$teacher_comment->teachers->name}}</a></h4>
                                            <p style="word-wrap: break-word;width: 250px;">
                                                {!! $teacher_comment->content !!}
                                            </p>

                                        </div>

                                    </div>


                                    @endforeach


                                    @if (Route::has('login'))
                                        @auth
                                    @if(\Illuminate\Support\Facades\Auth::user()->authority=='teacher')

                                        @php
                                        $aaa = \App\Teacher_comment::where('project_id','=',$projects->id)->where('user_id','=',\Illuminate\Support\Facades\Auth::id())->first();
                                        @endphp

                                                @if(empty($aaa))
                                                {!! Form::open(['route'=>['teacher_comment'],'method'=>'POST','files'=>'true','class'=>'form-horizontal']) !!}

                                                <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">
                                                <input type="hidden" name="project_id" value="{{$projects->id}}">
                                                <div class="col-lg-12 form-group">

                                        <textarea name="content" cols="30" rows="10"></textarea>

                                        </div>
                                        <button class="btn btn-dark">Yorum yap</button>
                                        {!! Form::close() !!}
                                                    @else
                                                        {!! Form::model($aaa,['route'=>['teacher_comment_update',$aaa->id],'method'=>'PUT','files'=>'true','class'=>'form-horizontal']) !!}

                                                        <div class="col-lg-12 form-group">

                                                            <textarea name="content" cols="30" rows="10">{{$aaa->content}}</textarea>

                                                        </div>
                                                        <button class="btn btn-dark">Yorum yap</button>
                                                        {!! Form::close() !!}

                                                    @endif



                                    @endif
                                        @endauth
                                        @endif
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="widget widget-memebers">
                        <div class="widget-heading">
                            <h3 class="widget-title">Gönderen Öğrenci Yorumu</h3>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="newest-member" role="tabpanel">
                                <div class="members-list">
                                    <p>{!! $projects->student_comment !!}</p>
                                    @if (Route::has('login'))
                                        @auth
                                    @if($projects->user_id==\Illuminate\Support\Facades\Auth::user()->id)
                                    {!! Form::model($projects,['route'=>['student_comment',$projects->id],'method'=>'PUT','files'=>'true','class'=>'form-horizontal']) !!}
                                        <div class="col-lg-12 form-group">
                                    <textarea name="student_comment" cols="30" rows="10">{{$projects->student_comment}}</textarea>
                                        </div>
                                    <button class="btn btn-dark">Yorum yap</button>
                                    {!! Form::close() !!}
                                    @endif
                                        @endauth
                                    @endif
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
 {{--   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
--}}@endsection

@section('js')
   {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   --}}
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


   <script>
        @if (session('alert'))

        swal({
            title:"Başarılı",
            text:"Yorumunuz gönderilmiş olup onaylandıktan sonra yayınlanacaktır.",
            type: "success",
            timer:2000,
            showConfirmButton: false
        });
        @endif
        @if (session('no'))
        swal({
            title:"Hata",
            text:"Yorum gönderilemedi",
            type: "warning",
            timer:2000,
            showConfirmButton: false
        });
        @endif
    </script>
    <script>
        @if (session('alert'))

        swal({
            title:"Başarılı",
            text:"Yorumunuz başarıyla yapılmıştır.",
            type: "success",
            timer:2000,
            showConfirmButton: false
        });
        @endif
        @if (session('no'))
        swal({
            title:"Hata",
            text:"Yorum gönderilemedi",
            type: "warning",
            timer:2000,
            showConfirmButton: false
        });
        @endif
    </script>
    <script>
        @if (session('alert'))

        swal({
            title:"Başarılı",
            text:"Yorumunuz başarıyla yapılmıştır.",
            type: "success",
            timer:2000,
            showConfirmButton: false
        });
        @endif
        @if (session('no'))
        swal({
            title:"Hata",
            text:"Yorum gönderilemedi",
            type: "warning",
            timer:2000,
            showConfirmButton: false
        });
        @endif
    </script>
    <script>
        @if (session('alertsd'))

        swal({
            title:"Başarılı",
            text:"Emoji Gönderildi.",
            type: "success",
            timer:2000,
            showConfirmButton: false
        });
        @endif
        @if (session('nosd'))
        swal({
            title:"Hata",
            text:"Emoji gönderilemedi",
            type: "warning",
            timer:2000,
            showConfirmButton: false
        });
        @endif
    </script>
@endsection
