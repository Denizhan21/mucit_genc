@extends('admin.template')

@section('icerik')
    <div class="row">
        <div class="col-lg-12">
            <div class="box">

                <div class="box-header with-border">
                    <h4 class="box-title">Kulüp Öğrencileri</h4>
                    <div class="pull-right">

                        <a href="{{route('club_student_create','club='.$_GET['club'])}}" type="button" class="btn btn-primary">Öğrenci Ekle</a>

                    </div>
                </div>
                <div class="box-body no-padding">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>Ad Soyad</th>
                                <th>Okul</th>
                                <th>Sınıf</th>
                                <th>Şube</th>
                                <th>Projeleri</th>
                                <th>Ödevleri</th>
                                <th>Platform Bilgileri</th>
                                <th>Kulüpten Çıkar</th>
                            </tr>
                            @foreach($club_student  as $key=>$club_students)
                                <tr>
                                    <td>{{$club_students->student->name}}</td>
                                    <td>{{$club_students->student->school}}</td>
                                    <td>{{$club_students->student->class}}</td>
                                    <td>{{$club_students->student->branch}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        {!! Form::open(['method'=>'DELETE','action'=>['ClubUserController@destroy',$club_students->id],'style'=>'display:inline']) !!}
                                        <button onclick="return confirm('Emin misin?')" class="btn btn-xs btn-danger"><i class="fa fa-minus"></i></button>
                                        {!! Form::close() !!}
                                    </td>
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
    <script>
        @if (session('alert'))
        swal({
            title:"Başarılı",
            text:"Öğrenci Silindi",
            type: "success",
            timer:2000,
            showConfirmButton: false
        });
        @endif
        @if (session('no'))
        swal({
            title:"Başarısız",
            text:"Öğrenci Silinemedi",
            type: "warning",
            timer:2000,
            showConfirmButton: false
        });
        @endif
    </script>
@endsection
