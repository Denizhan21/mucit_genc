@extends('homepage.template')

@section('content')
    <div class="page-content">

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

    </div>
@endsection

@section('css')

@endsection

@section('js')

@endsection
