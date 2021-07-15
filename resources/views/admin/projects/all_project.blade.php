@extends('admin.template')

@section('icerik')

    <form action="" method="get">

        <div class="col-lg-12 col-12">
            <div class="box">
                <div class="box-body pb-0">
                    <div class="row">
                        <div class="col-md-4 col-4">
                            <div class="form-group">
                                <label>Proje Adı</label>
                                <input type="text" class="form-control" name="name" value="{{$name}}" placeholder="Ad Soyad">
                            </div>

                        </div>


                            <div class="col-md-4 col-4">
                                <div class="form-group">
                                    <label>Sıralama</label>
                                    <select class="form-control select2" name="order_type" style="width: 100%;">
                                        <option value="">Sıralama Tür</option>
                                        <option value="desc" {{$order_type=='desc'?'selected':''}}>Sondan Başa</option>
                                        <option value="asc" {{$order_type=='asc'?'selected':''}}>Baştan Sona</option>
                                    </select>
                                </div>

                            </div>


                        <div class="col-md-4 col-4">
                            <div class="form-group">
                                <label>Kulüpler</label>
                                <select class="form-control select2" name="club_id" style="width: 100%;">
                                    <option value="">Sıralama Tür</option>
                                    @foreach($club as $clubs)
                                    <option value="{{$clubs->id}}" {{$clubs->id==$club_id?'selected':''}}>{{$clubs->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="col-lg-12 form-group" align="right">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i> Getir</button>
                            <a href="{{route('projects.all')}}" class="btn btn-xs btn-danger"><i class="fa fa-magic"></i> Temizle</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>







    <div class="row">
        <div class="col-lg-12">
            <div class="box">

                <div class="box-header with-border">
                    <h4 class="box-title">Tüm Projeler ({{$count}})</h4>
                </div>
                <div class="box-body no-padding">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>Proje Adı</th>
                                <th>Projeyi Gönderen</th>
                                <th>Projenin Gönderildiği Kulüp</th>
                                <th>Projenin Durumu</th>
                                <th>Projeye Git</th>
                            </tr>
                            @foreach($request_forms  as $key=>$club_projects)
                                <tr>
                                    <td>{{$club_projects->name}}</td>
                                    <td>{{$club_projects->student->name}}</td>
                                    <td>{{$club_projects->club->name}}</td>
                                    <td>
                                        @if($club_projects->status=='0')
                                            <a href="{{route('project_onayla',$club_projects->id)}}"><span class="label label-success">Onayla</span></a>
                                        @else
                                            <a href="{{route('project_onaykaldir',$club_projects->id)}}"><span class="label label-info">Onay Kaldır</span></a>
                                        @endif
                                    </td>
                                    <td><a class="" href="{{route('project_details',$club_projects->id)}}"><span class="label label-success">Git</span></a></td>
                                </tr>
                            @endforeach
                        </table>
                        <ul class="pagination pagination-sm pull-right">
                                                        {{$request_forms->appends(request()->query())->links()}}
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
