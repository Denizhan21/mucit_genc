@extends('homepage.template')

@section('content')
    <div class="page-content">

        <!--=====================================-->
        <!--=        Newsfeed  Area Start       =-->
        <!--=====================================-->
        <div class="container">
            <div class="block-box user-single-blog">
                <div class="blog-thumbnail">
                    <img src="/{{$news->photo}}" alt="Blog">
                </div>
                <div class="blog-content-wrap">
                    <div class="blog-entry-header">

                        <h2 class="entry-title">{{$news->title}}</h2>
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <ul class="entry-meta">
                                    <li><i class="icofont-calendar"></i>  @php
                                            setlocale(LC_TIME, "turkish");
                                            setlocale(LC_ALL,'turkish');
                                            echo iconv('latin5','utf-8',strftime('%B',strtotime($news->created_at)));
                                        @endphp</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="blog-content">
                        {!! $news->content !!}
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
