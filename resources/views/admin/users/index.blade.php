@extends('admin.template')
@section('icerik')
    <form action="" method="get">
        <input type="hidden" name="authority" value="{{$authority}}">
        <div class="col-lg-12 col-12">
            <div class="box">
                <div class="box-body pb-0">
                    <div class="row">
                        <div class="col-md-4 col-4">
                            <div class="form-group">
                                <label>Ad Soyad</label>
                                <input type="text" class="form-control" name="name" value="{{$name}}" placeholder="Ad Soyad">
                            </div>
                            <div class="form-group">
                                <label>E-Mail</label>
                                <input type="text" class="form-control" name="email" value="{{$email}}" placeholder="Eposta">
                            </div>
                        </div>
                        @if($authority=='student')
                        <div class="col-md-4 col-4">
                            <div class="form-group">
                                <label>Okul Seçiniz</label>
                                <select class="form-control select2" style="width: 100%;" name="school">
                                    <option value="">Okul Seçiniz</option>
                                    @foreach($schools as $school_student)
                                        <option value="{{$school_student->id}}" {{$school_student->id==$school?'selected':''}}>{{$school_student->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sınıf Seçiniz</label>
                                <select class="form-control select2" name="class">
                                    <option value="">Sınıf Seçiniz</option>
                                    <option value="1.Sınıf" {{$class=='1.Sınıf'?'selected':''}}>1. Sınıf</option>
                                    <option value="2.Sınıf" {{$class=='2.Sınıf'?'selected':''}}>2. Sınıf</option>
                                    <option value="3.Sınıf" {{$class=='3.Sınıf'?'selected':''}}>3. Sınıf</option>
                                    <option value="4.Sınıf" {{$class=='4.Sınıf'?'selected':''}}>4. Sınıf</option>
                                    <option value="5.Sınıf" {{$class=='5.Sınıf'?'selected':''}}>5. Sınıf</option>
                                    <option value="6.Sınıf" {{$class=='6.Sınıf'?'selected':''}}>6. Sınıf</option>
                                    <option value="7.Sınıf" {{$class=='7.Sınıf'?'selected':''}}>7. Sınıf</option>
                                    <option value="8.Sınıf" {{$class=='8.Sınıf'?'selected':''}}>8. Sınıf</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-4">
                            <div class="form-group">
                                <label>Şube Seçiniz</label>
                                <select class="form-control select2" name="branch" style="width: 100%;">
                                    <option value="">Şube</option>
                                    <option value="A sınıfı" {{$branch=='A sınıfı'?'selected':''}}>A sınıfı</option>
                                    <option value="B sınıfı" {{$branch=='B sınıfı'?'selected':''}}>B sınıfı</option>
                                    <option value="C sınıfı" {{$branch=='C sınıfı'?'selected':''}}>C sınıfı</option>
                                    <option value="D sınıfı" {{$branch=='D sınıfı'?'selected':''}}>D sınıfı</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Cinsiyet Seçiniz</label>
                                <select class="form-control select2" name="gender" style="width: 100%;">
                                    <option value="">Cinsiyet</option>
                                    <option value="Erkek" {{$gender=='Erkek'?'selected':''}}>Erkek</option>
                                    <option value="Kız" {{$gender=='Kız'?'selected':''}}>Kız</option>
                                </select>
                            </div>
                        </div>
                        @endif
                        <div class="col-lg-12 form-group" align="right">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i> Getir</button>
                            <a href="{{route('users.index', 'authority='.$authority)}}" class="btn btn-xs btn-danger"><i class="fa fa-magic"></i> Temizle</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" class="form-control">
        <br>
        <button class="btn btn-success">İçeri Kullanıcı Aktar</button>
        <a class="btn btn-warning" href="{{ route('export') }}">Kullanıcıları dışa aktar</a>
    </form>
    <hr>


    <div class="row">
        <div class="col-lg-12">
            <div class="box">

                <div class="box-header with-border">
                    <h4 class="box-title">Kullanıcılar Tablosu ({{$count}})</h4>
                </div>
                <div class="box-body no-padding">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>#</th>
                                <th>Ad Soyad</th>
                                <th>Yetki</th>
                                <th>Düzenle</th>
                                <th>Sil</th>
                            </tr>
                            @foreach($request_forms  as $key=>$users)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$users->name}}</td>
                                    @if($users->authority=='admin')
                                        <td><span class="label label-success">Yönetici</span></td>
                                    @elseif($users->authority=='teacher')
                                        <td><span class="label label-warning">Öğretmen</span></td>
                                    @elseif($users->authority=='student')
                                        <td><span class="label label-danger">Öğrenci</span></td>
                                    @endif
                                    <td><a class="btn btn-xs btn-warning" href="{{route('users.edit',$users->id)}}"><i class="fa fa-pencil-square-o"></i></a></td>
                                    <td>
                                        {!! Form::open(['method'=>'DELETE','id'=>'usersdelete','action'=>['UserController@destroy',$users->id],'style'=>'display:inline']) !!}
                                        <button onclick="return confirm('Emin misin?')" class="btn btn-xs btn-danger"><i class="fa fa-minus"></i></button>
                                        {!! Form::close() !!}
                                    </td>
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
    <script>
        @if (session('alertsd'))
        swal({
            title:"Başarılı",
            text:"Mükerrer Kayıt",
            type: "success",
            timer:2000,
            showConfirmButton: false
        });
        @endif
        @if (session('alert'))
        swal({
            title:"Başarılı",
            text:"Kullanıcı Silindi",
            type: "success",
            timer:2000,
            showConfirmButton: false
        });
        @endif
        @if (session('no'))
        swal({
            title:"Başarısız",
            text:"Kullanıcı Silinemedi",
            type: "warning",
            timer:2000,
            showConfirmButton: false
        });
        @endif
    </script>
@endsection


