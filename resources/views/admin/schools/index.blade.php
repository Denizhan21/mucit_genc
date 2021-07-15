@extends('admin.template')

@section('icerik')
    <div class="row">
        <div class="col-lg-12">
            <div class="box">

                <div class="box-header with-border">
                    <h4 class="box-title">Okullar Tablosu</h4>
                </div>
                <div class="box-body no-padding">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>#</th>
                                <th>Okul İsmi</th>
                                <th>Okul Durum</th>
                                <th>Okul Excel Numarası</th>
                                @if(\Illuminate\Support\Facades\Auth::user()->authority == 'admin')
                                <th>Düzenle</th>
                                <th>Sil</th>
                                @endif
                            </tr>
                            @foreach($schools  as $key=>$school)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$school->name}}</td>
                                    <td>{{$school->status==0?'Pasif':''}}{{$school->status==1?'Aktif':''}}</td>
                                    <td>{{$school->id}}</td>
                                    @if(\Illuminate\Support\Facades\Auth::user()->authority == 'admin')
                                    <td><a class="btn btn-xs btn-warning" href="{{route('schools.edit',$school->id)}}"><i class="fa fa-pencil-square-o"></i></a></td>
                                    <td>
                                        {!! Form::open(['method'=>'DELETE','action'=>['SchoolController@destroy',$school->id],'style'=>'display:inline']) !!}
                                        <button onclick="return confirm('Emin misin?')" class="btn btn-xs btn-danger"><i class="fa fa-minus"></i></button>
                                        {!! Form::close() !!}
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                        <ul class="pagination pagination-sm pull-right">
                            {{ $schools->links() }}
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
            text:"Okul Silindi",
            type: "success",
            timer:2000,
            showConfirmButton: false
        });
        @endif
        @if (session('no'))
        swal({
            title:"Başarısız",
            text:"Okul Silinemedi",
            type: "warning",
            timer:2000,
            showConfirmButton: false
        });
        @endif
    </script>
@endsection
