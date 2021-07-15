@extends('admin.template')

@section('icerik')






<div class="row">
    <div class="col-lg-12">
        <div class="box">

            <div class="box-header with-border">
                <h4 class="box-title">Projeler</h4>
            </div>
            <div class="box-body no-padding">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tr>
                            <th>Proje Adı</th>
                            <th>Projeyi Gönderen</th>
                            <th>Gönderilen Kulüp</th>
                            <th>Proje Durum</th>
                            <th>Projeye Git</th>
                        </tr>
                        @foreach($project as $projects)
                            @foreach($club as $clubs)
                                @if($projects->club_id == $clubs->id)
                            <tr>
                                <td>{{$projects->name}}</td>
                                <td>{{$projects->student->name}}</td>
                                <td>{{$projects->club->name}}</td>
                                <td>
                                    @if($projects->status=='0')
                                        <a href="{{route('project_onayla',$projects->id)}}"><span class="label label-success">Onayla</span></a>
                                    @else
                                        <a href="{{route('project_onaykaldir',$projects->id)}}"><span class="label label-info">Onay Kaldır</span></a>
                                    @endif
                                </td>
                                <td><a class="" href="{{route('project_details',$projects->id)}}"><span class="label label-success">Git</span></a></td>
                            </tr>
                                @endif
                            @endforeach
                        @endforeach
                    </table>
                    <ul class="pagination pagination-sm pull-right">
{{--                       {{$request_forms->appends(request()->query())->links()}}--}}
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
