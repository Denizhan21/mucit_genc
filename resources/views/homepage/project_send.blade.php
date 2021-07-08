@extends('homepage.template')

@section('content')
    <div class="page-content">
        <div class="container">
            <div class="block-box user-single-blog">
                <div class="blog-content-wrap">
                    <div class="blog-comment-form">
                        <h3 class="item-title">Projenizi Gönderin</h3>
                        {!! Form::open(['route'=>['project_store'],'method'=>'POST','files'=>'true','class'=>'form-horizontal']) !!}

                        <div class="row gutters-20">


                            @if (Route::has('login'))
                                @auth

                            <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                                    <input type="hidden" name="status" value="0">

                                @endauth
                            @endif



                            @php
                                $talepgrup = [
                                    'photo'=>'Fotoğraf',
                                    'power_point'=>'Power Point',
                                    'video'=>'Video',
                                    ];
                            @endphp

                            <div class="col-lg-12">


                                <div id="type" class="alert alert-danger" role="alert" style="display: none">
                                    Lütfen dosya türünüzü seçiniz.
                                </div>


                                <label><b>Göndericeğiniz Dosya Türünü Seçiniz:</b></label>

                                @foreach($talepgrup as $key=>$alan)


                                    <input type="radio" name="type" id="{{$key}}" value="{{$alan}}" required class="type_type" onclick="return tipOther()"/>
                                    <label for="{{$key}}">{{$alan}}</label>&nbsp;&nbsp;&nbsp;

                                @endforeach


                            </div>

                            <div class="col-lg-12 form-group">

                                <div id="name_name" class="alert alert-danger" role="alert" style="display: none">
                                    Lütfen Projenizin adını giriniz.
                                </div>

                                <label>Projenizin Adını Giriniz:</label>
                                <input id="name_name_name" name="name" type="text" class="form-control name_name" placeholder="Projenizin Adını Giriniz">
                            </div>

                            <div class="col-lg-12 form-group" id="video_area" style="display: none">

                                <div class="alert alert-warning">
                                    <strong>Dikkat!</strong> Drive linkinizi belirtilen şekilde yükeleyiniz. Anlatım videosu için

                                    <div class="video-btn">
                                        <a href="https://drive.google.com/file/d/1CV4GWlHQnWj-QGvsmm3hy5wTL4Azs0EE/preview" class="popup-youtube play-icon alert-link">
                                            tıklayınız.
                                        </a>
                                    </div>

                                </div>

                                <label>Drive Linkinizi Giriniz:</label>
                                <input name="content" type="text" class="form-control" placeholder="Video için Drive Linkinizi Giriniz">

                                <div class="col-lg-12 form-group" >
                                    <label>Proje Kapak Fotoğrafınızı Seçiniz:</label>
                                    <input id="name" type="file" class="form-control"  name="photo">
                                </div>

                            </div>

                            <div class="col-lg-12 form-group" id="power_point_area" style="display: none">

                                <div class="alert alert-warning">
                                    <strong>Dikkat!</strong> Drive linkinizi belirtilen şekilde yükeleyiniz. Anlatım videosu için

                                    <div class="video-btn">
                                        <a href="https://drive.google.com/file/d/1CV4GWlHQnWj-QGvsmm3hy5wTL4Azs0EE/preview" class="popup-youtube play-icon alert-link">
                                            tıklayınız.
                                        </a>
                                    </div>

                                </div>

                                <label>Drive Linkinizi Giriniz:</label>
                                <input name="content" type="text" class="form-control" placeholder="Power Point için Drive Linkinizi Giriniz">

                                <div class="col-lg-12 form-group" >
                                    <label>Proje Kapak Fotoğrafınızı Seçiniz:</label>
                                    <input id="name" type="file" class="form-control"  name="photo">
                                </div>

                            </div>

                            <div class="col-lg-12 form-group" id="photo_area" style="display: none">
                                    <label>Fotoğraflarınızı Seçiniz:</label>
                                    <input id="name" type="file" class="form-control"  name="content[]"  multiple>
                            </div>

                            <div class="col-lg-12 form-group">
                                <label>Projenizi Göndddermek İstediğiniz Kulübü Seçiniz:</label>
                                <select class="form-control" name="club_id">
                                 @php
                                 $clubs = \App\Club::where('confirmation','=','1')->get();

                                 $clubs_confirmation = \App\Club_user::where('user_id','=',\Illuminate\Support\Facades\Auth::id())->where('status','=','1')->get();
                                 @endphp
                                    @foreach($clubs as $club)
                                        <option value="{{$club->id}}">{{$club->name}}</option>
                                    @endforeach
                                    @foreach($clubs_confirmation as $club_confirmations)
                                        <option value="{{$club_confirmations->clubs->id}}">{{$club_confirmations->clubs->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-12 form-group">
                                <textarea name="description" class="form-control textarea" placeholder="Projenizin detaylarını giriniz . . ." cols="30" rows="7"></textarea>
                            </div>


                            @if (Route::has('login'))
                                @auth

                            <div class="col-lg-12 form-group">
                                <button id="gameStart" class="submit-btn" type="submit">Gönder</button>
                            </div>

                                @else

                                        <div class="alert alert-info">
                                             Projenizi göndermek için lütfen giriş yapınız. Giriş yapmak için


                                                <a href="{{route('login')}}" class="alert-link">
                                                    tıklayınız.
                                                </a>


                                        </div>


                                @endauth
                            @endif



                        </div>
                        {!! Form::close() !!}
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
        @foreach($talepgrup as $key=>$alan)
        document.getElementById('{{$key}}').addEventListener('change', function () {
            if (document.getElementById('{{$key}}').checked) {
                document.getElementById('{{$key}}_area').style.display = 'block';
            }
        });
        @endforeach
    </script>

    <script>
        function tipOther() {

            document.getElementById('video_area').style.display = 'none';
            document.getElementById('power_point_area').style.display = 'none';
            document.getElementById('photo_area').style.display = 'none';
        }
    </script>


    <script type="text/javascript">
        $(document).ready(function () {
            $('#gameStart').click(function() {
                checked = $("input[class=type_type]:checked").length;
                if(!checked) {
                    document.getElementById('type').style.display = 'block';
                    return false
                }else {
                    document.getElementById('type').style.display = 'none';
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#gameStart').click(function() {
                if(document.getElementById("name_name_name").value=="") {
                    document.getElementById('name_name').style.display = 'block';
                    return false
                }else {
                    document.getElementById('name_name').style.display = 'none';
                }
            });
        });
    </script>


@endsection
