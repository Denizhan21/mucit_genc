@extends('homepage.template')

@section('content')
    <div class="page-content">
        <div class="container">
            <div class="block-box user-single-blog">
                <div class="blog-content-wrap">
                    <div class="blog-comment-form">
                        <h3 class="item-title">Projenizi Gönderin    ({{$club->name}})</h3>
                        {!! Form::open(['route'=>['project_store'],'method'=>'POST','files'=>'true','class'=>'form-horizontal']) !!}

                        <div class="row gutters-20">


                            @if (Route::has('login'))
                                @auth

                            <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                                    <input type="hidden" name="status" value="0">
                                    <input type="hidden" name="club_id" value="{{$club->id}}">

                                @endauth
                            @endif



                            @php
                                $talepgrup = [
                                    'photo'=>'Fotoğraf',
                                    'power_point'=>'Power Point',
                                    'video'=>'Video',
                                    'youtube'=>'YouTube',
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

                                <div class="col-lg-12 form-group" id="youtube_area" style="display: none">

                                    <div class="alert alert-warning">
                                        <strong>Dikkat!</strong>Youtube linkinizi belirtilen şekilde yükeleyiniz. Anlatım videosu için

                                        <div class="video-btn">
                                            <a href="https://drive.google.com/file/d/1CV4GWlHQnWj-QGvsmm3hy5wTL4Azs0EE/preview" class="popup-youtube play-icon alert-link">
                                                tıklayınız.
                                            </a>
                                        </div>

                                    </div>

                                    <label>Youtube Linkinizi Giriniz:</label>
                                    <input name="content" type="text" class="form-control" placeholder="Video için Youtube Linkinizi Giriniz">

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
                                <textarea name="description" class="form-control textarea  my-editor" style="height: 300px;">{!! $club->content !!}</textarea>
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
            document.getElementById('youtube_area').style.display = 'none';
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
    <script>
        var editor_config = {
            path_absolute : "/",
            selector: 'textarea.my-editor',
            relative_urls: false,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table directionality",
                "emoticons template paste textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            file_picker_callback : function(callback, value, meta) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
                if (meta.filetype == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.openUrl({
                    url : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no",
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            }
        };
        tinymce.init(editor_config);
    </script>

@endsection
