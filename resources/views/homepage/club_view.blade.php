@extends('homepage.template')

@section('content')

    <div class="page-content">
        <div class="container">
            <div>
                <div class="col-lg-8" style="display: inline">
                    <form action="" method="get">
                        <div class="block-box product-filter">
                            <label>Filtrele:</label>

                            <div class="select-box">
                                <input class="form-control" type="text" name="name" value="{{$name}}" placeholder="Kulüp Adı">
                            </div>


                            <div class="select-box">
                                <select class="form-control" name="school_id">
                                    <option value="">Okul Seç</option>
                                    @foreach($school as $schools)
                                        <option value="{{$schools->id}}" {{$school_id==$schools->id?'selected':''}}>{{$schools->name}}</option>
                                    @endforeach
                                </select>
                                <select class="form-control" name="teacher">
                                    <option value="">Öğretmen Seç</option>
                                    @foreach($club_teacher as $club_teachers)
                                        <option value="{{$club_teachers->id}}" {{$teacher=$club_teachers->id?'selected':''}}>{{$club_teachers->name}}</option>
                                    @endforeach
                                </select>


                            </div>

                            <div class="filter-btn">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="icofont-search-2"></i> Getir</button>
                                <a href="{{route('club_view')}}" class="btn btn-xs btn-danger"><i class="icofont-magic"></i> Temizle</a>
                            </div>

                        </div>
                    </form>
                </div>
             {{--   <div class="col-lg-4" style="display: inline">
                    <form action="" method="get">

                        <div class="block-box product-filter">
                            <label>Kulübe Kaydol:</label>

                            <div class="select-box">
                                    <input class="form-control" type="text" name="code" placeholder="Kulüp Kodu">
                            </div>

                            <div class="filter-btn">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="icofont-search-2"></i> Kaydol</button>
                            </div>

                        </div>
                    </form>
                </div>--}}
            </div>
        </div>
    </div>



    <section class="section groups-popular">
        <div class="container">
            <div class="section-heading">
                <h2 class="heading-title">"Sınıf ve Kulüpler"</h2>
            </div>
            <div class="row gutters-15 justify-content-center">
                @foreach($request_forms as $clubs)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="groups-box">
                            <div class="item-img">
                                <img style="width: 285px;height: 185px" src="/homepage/media/black.jpg" alt="Groups">
                            </div>
                            <div class="item-content">
                                <h3 class="item-title"><a href="/clubs/{{$clubs->id}}">{{$clubs->name}}</a></h3>
                                <div class="groups-member"><a style="color: white" href="/clubs/{{$clubs->id}}">Git</a></div>
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
