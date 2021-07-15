@extends('admin.template')

@section('icerik')
    <div class="row">
        <div class="col-lg-12">
            <div class="box">

                <div class="box-header with-border">
                    <h4 class="box-title">Kulüp Projeleri
                        @foreach($project_club as $project_clubs)
                        ({{$project_clubs->name}})
                        @endforeach
                    </h4>
                </div>
                <div class="box-body no-padding">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>Proje Adı</th>
                                <th>Projeyi Gönderen</th>
                                <th>Proje Durumu</th>
                                <th>Projeye Git</th>
                            </tr>
                            @foreach($club_project  as $key=>$club_projects)
                                <tr>
                                    <td>{{$club_projects->name}}</td>
                                    <td>{{$club_projects->student->name}}</td>
                                    <th>
                                        @if($club_projects->status=='0')
                                            <a href="{{route('project_onayla',$club_projects->id)}}"><span class="label label-success">Onayla</span></a>
                                        @else
                                            <a href="{{route('project_onaykaldir',$club_projects->id)}}"><span class="label label-info">Onay Kaldır</span></a>
                                        @endif
                                    </th>
                                   <td><a class="" href="{{route('project_details',$club_projects->id)}}"><span class="label label-success">Git</span></a></td>
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
