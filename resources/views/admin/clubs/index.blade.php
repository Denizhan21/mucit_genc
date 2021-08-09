@extends('admin.template')

@section('icerik')
    <div class="row">
        <div class="col-lg-12">
            <div class="box">

                <div class="box-header with-border">
                    <h4 class="box-title">Kulüpler</h4>
                </div>
                <div class="box-body no-padding">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>Kulüp İsmi</th>
                                @if(\Illuminate\Support\Facades\Auth::user()->authority=='admin')
                                <th>Görevli Öğretmen</th>
                                @endif
                                <th>Kayıtlı Okul</th>
                                <th>Kulüp Katılım Linki</th>
                                <th>Kayıtlı Öğrenciler</th>
                                <th>Gönderilen Projeler</th>
                                <th>Rozetler</th>
                                <th>Platform Bilgileri</th>
                                <th>Düzenle</th>
                                <th>Sil</th>
                            </tr>
                            @foreach($club  as $key=>$clubs)
                                @if(\Illuminate\Support\Facades\Auth::user()->authority=='admin')
                                <tr>
                                    <td>{{$clubs->name}}</td>
                                    @if(\Illuminate\Support\Facades\Auth::user()->authority=='admin')
                                    <td>{{$clubs->teachers->name}}</td>
                                    @endif
                                    <td>{{$clubs->schools->name}}</td>
                                    <td><a href="{{route('club_join',$clubs->code)}}">{{route('club_join',$clubs->code)}}</a></td>
                                    <td><a class="" href="{{route('club_user.index','club='.$clubs->id)}}"><span class="label label-success">Git</span></a></td>
                                    <td><a class="" href="{{route('projects.index','club='.$clubs->id)}}"><span class="label label-success">Git</span></a></td>
                                    <td><a class="" href="{{route('club_rosette','club='.$clubs->id)}}"><span class="label label-success">Git</span></a></td>
                                    <td><a class="" href="#"><span class="label label-success">Git</span></a></td>
                                    <td><a class="btn btn-xs btn-warning" href="{{route('clubs.edit',$clubs->id)}}"><i class="fa fa-pencil-square-o"></i></a></td>
                                    <td>
                                        {!! Form::open(['method'=>'DELETE','action'=>['ClubController@destroy',$clubs->id],'style'=>'display:inline']) !!}
                                        <button onclick="return confirm('Emin misin?')" class="btn btn-xs btn-danger"><i class="fa fa-minus"></i></button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endif
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
    <script>
        @if (session('alert'))
        swal({
            title:"Başarılı",
            text:"Kulüp Silindi",
            type: "success",
            timer:2000,
            showConfirmButton: false
        });
        @endif
        @if (session('no'))
        swal({
            title:"Başarısız",
            text:"Kulüp Silinemedi",
            type: "warning",
            timer:2000,
            showConfirmButton: false
        });
        @endif
    </script>
@endsection
