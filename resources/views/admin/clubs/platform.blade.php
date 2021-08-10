@extends('admin.template')

@section('icerik')
    <div class="row">
        <div class="col-lg-12">
            <div class="box">

                <div class="box-header with-border">
                    @foreach($project_club as $project_clubs)
                        <h4 class="box-title">Kulüp Platform Bilgileri

                            ({{$project_clubs->name}})

                        </h4>

                        <div class="pull-right">

                            <a href="{{route('platform_create','club='.$project_clubs->id)}}" type="button" class="btn btn-primary">Yeni Platform Bilgisi Ekle</a>

                        </div>
                    @endforeach
                </div>
                <div class="box-body no-padding">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>Kullanıcı Adı</th>
                                <th>Şifre</th>
                                <th>Durum</th>
                                <th>Herkese Açık/Kapalı</th>
                                <th>Platform Bilgilerine Git</th>
                            </tr>
                            @foreach($club_platform  as $key=>$club_platforms)
                                <tr>
                                    <td>{{$club_platforms->user_name}}</td>
                                   <td>{{$club_platforms->password}}</td>
                                    <td>{{$club_platforms->status==1?'Aktif':''}}   {{$club_platforms->status==0?'Pasif':''}}</td>
                                    <td>{{$club_platforms->authority==1?'Açık':''}}   {{$club_platforms->authority==0?'Kapalı':''}}</td>
                                    <td><a class="" href="{{route('platform_details',$club_platforms->id)}}"><span class="label label-success">Git</span></a></td>
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
