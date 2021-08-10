@extends('admin.template')

@section('icerik')
    <div class="row">
        <div class="col-lg-12">
            <div class="box">

                <div class="box-header with-border">
                    @foreach($project_club as $project_clubs)
                        <h4 class="box-title">Kulüp Canlı Linkleri

                            ({{$project_clubs->name}})

                        </h4>

                        <div class="pull-right">

                            <a href="{{route('link_create','club='.$project_clubs->id)}}" type="button" class="btn btn-primary">Link Ekle</a>

                        </div>
                    @endforeach
                </div>
                <div class="box-body no-padding">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>Link</th>
                                <th>Durum</th>
                                <th>Herkese Açık/Kapalı</th>
                                <th>Linke Git</th>
                            </tr>
                            @foreach($club_link  as $key=>$club_links)
                                <tr>
                                    <td>{{$club_links->link}}</td>
                                    <td>{{$club_links->status==1?'Aktif':''}}   {{$club_links->status==0?'Pasif':''}}</td>
                                    <td>{{$club_links->authority==1?'Açık':''}}   {{$club_links->authority==0?'Kapalı':''}}</td>
                                    <td><a class="" href="{{route('link_details',$club_links->id)}}"><span class="label label-success">Git</span></a></td>
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
