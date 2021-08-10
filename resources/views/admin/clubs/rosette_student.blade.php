@extends('admin.template')

@section('icerik')
    <div class="row">
        <div class="col-lg-12">
            <div class="box">

                <div class="box-header with-border">
                    @foreach($rosette as $project_clubs)
                        <h4 class="box-title">Rozet Öğrencileri

                            ({{$project_clubs->name}})

                        </h4>

                        <div class="pull-right">

                            <a href="{{route('rosette_add','rosette='.$project_clubs->id)}}" type="button" class="btn btn-primary">Öğrenci Ekle</a>

                        </div>
                    @endforeach
                </div>
                <div class="box-body no-padding">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>Öğrenci Adı</th>
                                <th>Sil</th>
                            </tr>
                            @foreach($rosette_student  as $key=>$club_rosettes)
                                <tr>
                                    <td>{{$club_rosettes->student->name}}</td>
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
