@extends('admin.template')
@section('icerik')
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Proje Düzenle</h4>
                    <ul class="box-controls pull-right">
                        <li><a class="box-btn-close" href="#"></a></li>
                        <li><a class="box-btn-slide" href="#"></a></li>
                        <li><a class="box-btn-fullscreen" href="#"></a></li>
                    </ul>
                </div>
                {!! Form::model($project,['route'=>['project_edit',$project->id],'method'=>'PUT','files'=>'true','class'=>'form-horizontal']) !!}
                <div class="box-body">

                    <div class="form-group">
                        <label for="example_input_full_name">Proje İsmi:</label>
                        <input id="name" type="text" class="form-control"  name="name" required value="{{$project->name}}">
                    </div>

                    <textarea name="description" style="height: 300px;" class="my-editor">{!! $project->description !!}</textarea>

                    @if($project->type=='Fotoğraf')

                        <div class="form-group">
                            <label for="example_input_full_name">Yeniden Fotoğraf Yükleyin:</label>
                            <input id="name" type="file" class="form-control"  name="content[]"  multiple  value="{{$project->content}}">
                        </div>

                        <div class="col-lg-6">
                            <div id="demo" class="carousel slide" data-ride="carousel">


                            <div class="carousel-inner">
                                @foreach(json_decode($project->content) as $key=>$image)
                                    <div class="carousel-item {{$key==0?'active':''}}">
                                        <img style="width:710px;height: 400px; " src="/{{$image}}" alt="Gallery">
                                    </div>
                                @endforeach
                            </div>


                            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#demo" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>

                        </div>
                        </div>
                    @elseif($project->type=='Video')
                        <?php
                        $metin  = $project->content;
                        $eski   = "view?usp=sharing";
                        $yeni   = "preview";
                        $metin = str_replace($eski, $yeni, $metin);
                        ?>

                            <div class="form-group">
                                <label for="example_input_full_name">Drive Linki:</label>
                                <input id="name" type="text" class="form-control"  name="content" required value="{{$project->content}}">
                            </div>

                        <iframe src="{{$metin}}" frameborder="0" width="710" height="400"></iframe>



                    @elseif($project->type=='Power Point')
                        <?php
                        $metin  = $project->content;
                        $eski   = "view?usp=sharing";
                        $yeni   = "preview";
                        $metin = str_replace($eski, $yeni, $metin);
                        ?>

                            <div class="form-group">
                                <label for="example_input_full_name">Drive Linki:</label>
                                <input id="name" type="text" class="form-control"  name="content" required value="{{$project->content}}">
                            </div>


                        <iframe src="{{$metin}}" frameborder="0" width="710" height="400"></iframe>
                    @endif

                    <div class="box-footer">
                        <a href="{{route('projects.all')}}" style="color: white" class="btn btn-danger">Geri Dön</a>
                        <button type="submit" class="btn btn-success pull-right">Proje Düzenle</button>
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
