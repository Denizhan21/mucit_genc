@extends('admin.template')
@section('icerik')
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Kulüp Düzenle</h4>
                    <ul class="box-controls pull-right">
                        <li><a class="box-btn-close" href="#"></a></li>
                        <li><a class="box-btn-slide" href="#"></a></li>
                        <li><a class="box-btn-fullscreen" href="#"></a></li>
                    </ul>
                </div>
                {!! Form::model($club,['route'=>['clubs.update',$club->id],'method'=>'PUT','files'=>'true','class'=>'form-horizontal']) !!}
                <div class="box-body">

                    <div class="form-group">
                        <label for="example_input_full_name">Kulüp İsmi:</label>
                        <input id="name" type="text" class="form-control"  name="name" required value="{{$club->name}}">
                    </div>

                    @php
                        $talepgrup = [
                            'drive'=>'Drive',
                            'youtube'=>'YouTube',
                            ];
                    @endphp
                    <div class="form-group">
                        <label>Tanıtım Dosyası Tipini Seçiniz:</label>
                        <div class="controls">
                            <select name="type" id="select" class="form-control">
                                @foreach($talepgrup as $key=>$alan)
                                    <option {{$alan==$club->type?'selected':''}} value="{{$alan}}">{{$alan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="example_input_full_name">Kulüp Tanıtım Videosu/PDF si(Drive Linki Olarak Yükleyiniz):</label>
                        <input value="{{$club->text}}" id="name" type="text" class="form-control"  name="text">
                    </div>

                    <div class="form-group">
                        <label>Okul Seçiniz:</label>
                        <div class="controls">
                            <select name="school_id" id="select" class="form-control">
                                @foreach($school as $key=>$alan)
                                    <option value="{{$alan->id}}" {{$alan->id==$club->school_id?'selected':''}}>{{$alan->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="demo-radio-button">
                        <div class="form-group">
                            <label>Görevli Öğretmen:</label>
                            <div class="controls">
                                <select name="teacher" id="select" class="form-control">
                                    @foreach($teacher as $teachers)
                                        <option value="{{$teachers->id}}" {{$club->teacher==$teachers->id?'selected':''}}>{{$teachers->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    @php
                        $type = ['1.Konu', '2.Konu', '3.Konu', '4.Konu', '5.Konu', '6.Konu', '7.Konu', '8.Konu'];
                    @endphp
                    <div class="form-group">
                        <label>Konu:</label>
                        <div class="controls">
                            <select name="subject" id="select" class="form-control">
                                @foreach($type as $key=>$alan)
                                    <option value="{{$alan}}" {{$club->subject==$alan?'selected':''}}>{{$alan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="demo-radio-button">
                        <div class="form-group">
                            <label>Kulüp Durum:</label>
                            <div class="controls">
                                <select name="status" id="select" class="form-control">
                                    <option {{$club->status==1?'selected':''}} value="1">Üye Kabulüne Açık</option>
                                    <option {{$club->status==2?'selected':''}} value="2">Üye Kabulüne Kod ile Açık</option>
                                    <option {{$club->status==3?'selected':''}} value="3">Üye Kabulüne Kapalı</option>
                                    <option {{$club->status==4?'selected':''}} value="4">Pasif</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="demo-radio-button">
                        <div class="form-group">
                            <label>Kulüp Harici Proje Gönderme:</label>
                            <div class="controls">
                                <select name="confirmation" id="select" class="form-control">
                                    <option {{$club->confirmation==1?'selected':''}} value="1">Açık</option>
                                    <option {{$club->confirmation==0?'selected':''}} value="0">Kapalı</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="example_input_full_name">Mecvut Logo:</label>
                        <img width="200" src="/{{$club->logo}}" alt="{{$club->name}}">
                    </div>

                    <div class="form-group">
                        <label for="example_input_full_name">Yeni Logo:</label>
                        <input id="name" type="file" class="form-control"  name="logo">
                    </div>

                    <textarea name="description" style="height: 300px;" class="my-editor">{!! $club->description !!}</textarea>


                    <textarea name="content" style="height: 300px;" class="my-editor">{!! $club->content !!}</textarea>


                    <div class="box-footer">
                        <a href="{{route('clubs.index')}}" style="color: white" class="btn btn-danger">Geri Dön</a>
                        <button type="submit" class="btn btn-success pull-right">Kulüp Düzenle</button>
                    </div>
                    {!! Form::close() !!}
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
                    text:"Kulüp Düzenlendi",
                    type: "success",
                    timer:2000,
                    showConfirmButton: false
                });
                @endif
                @if (session('no'))
                swal({
                    title:"Hata",
                    text:"Kulüp Düzenlenemedi",
                    type: "warning",
                    timer:2000,
                    showConfirmButton: false
                });
                @endif
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
