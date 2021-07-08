@extends('homepage.template')

@section('content')
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
        @foreach($activity as $activities)
            <div class="col-md-4">
                <div class="blog-box">
                    <div class="blog-img">
                        <a href="/activities/{{$activities->id}}">
                            <img style="width: 510px;height: 340px;" src="/{{$activities->photo}}" alt="Blog">
                        </a>
                        <div class="blog-date"><i class="icofont-calendar"></i>  @php
                                setlocale(LC_TIME, "turkish");
                                setlocale(LC_ALL,'turkish');
                                echo iconv('latin5','utf-8',strftime('%d %B %Y %A',strtotime($activities->created_at)));
                            @endphp</div>2
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-title"><a href="single-blog.html">{{$activities->title}} </a> ({{$activities->type}})</h3>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

        </div>
    </section>
@endsection

@section('css')

@endsection

@section('js')

@endsection
