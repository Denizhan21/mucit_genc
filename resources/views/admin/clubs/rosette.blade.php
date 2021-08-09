@extends('admin.template')

@section('icerik')
    <div class="row">
        <div class="col-lg-12">
            <div class="box">

                <div class="box-header with-border">
                    @foreach($project_club as $project_clubs)
                    <h4 class="box-title">Kulüp Rozetleri

                            ({{$project_clubs->name}})

                    </h4>

                    <div class="pull-right">

                        <a href="{{route('rosette_create','club='.$project_clubs->id)}}" type="button" class="btn btn-primary">Rozet Ekle</a>

                    </div>
                    @endforeach
                </div>
                <div class="box-body no-padding">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>Rozet Adı</th>
                                <th>Logo</th>
                                <th>Öğrenciler</th>
                                <th>Rozete Git</th>
                            </tr>
                            @foreach($club_rosette  as $key=>$club_rosettes)
                                <tr>
                                    <td>{{$club_rosettes->name}}</td>
                                    <td><img width="200" src="/{{$club_rosettes->logo}}" alt="{{$club_rosettes->name}}"></td>
                                    <td><a class="" href="{{route('rosette_details',$club_rosettes->id)}}"><span class="label label-success">Git</span></a></td>
                                    <td><a class="" href="{{route('rosette_details',$club_rosettes->id)}}"><span class="label label-success">Git</span></a></td>
                                </tr>
                            @endforeach
                        </table>
                        <ul class="pagination pagination-sm pull-right">
                            {{--                            {{$request_forms->appends(request()->query())->links()}}--}}
                        </ul>
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
