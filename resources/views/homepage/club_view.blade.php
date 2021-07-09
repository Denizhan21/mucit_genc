@extends('homepage.template')

@section('content')
  {{--  <div class="page-content">

        <div class="container">

            <div class="row gutters-20 zoom-gallery">


                @foreach($club as $key=>$clubs)
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="user-group-photo">
                        <p align="center">{{$clubs->name}}</p>
                        <a href="/clubs/{{$clubs->id}}">
                            <img style="width: 280px;height: 230px;" src="/{{{$clubs->logo}}}" alt="Gallery">
                        </a>
                    </div>
                </div>
                @endforeach

            </div>

        </div>

    </div>--}}




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

        </div>
    </section>
@endsection

@section('css')

@endsection

@section('js')

@endsection
