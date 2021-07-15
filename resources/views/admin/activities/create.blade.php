@extends('admin.template')
@section('icerik')
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Duyuru Ekle</h4>
                    <ul class="box-controls pull-right">
                        <li><a class="box-btn-close" href="#"></a></li>
                        <li><a class="box-btn-slide" href="#"></a></li>
                        <li><a class="box-btn-fullscreen" href="#"></a></li>
                    </ul>
                </div>
{{--                <form action="{{route('activities.store')}}" method="POST" class="form-horizontal" onsubmit="return ajaxekle()" id="ajax-form"></form>--}}
                {!! Form::open(['route'=>['activities.store'],'method'=>'POST','files'=>'true','class'=>'form-horizontal']) !!}
                <div class="box-body">
                    <div class="form-group">
                        <label for="example_input_full_name">Duyuru Başlığı:</label>
                        <input id="name" type="text" class="form-control"  name="title" required>
                    </div>
                    <div class="form-group">
                        <label>Duyuru Tipi:</label>
                        <div class="controls">
                            <select name="type" id="select" class="form-control">
                                <option value="Duyuru">Duyuru</option>
                                <option value="Haber">Haber</option>
                                <option value="Etkinlik">Etkinlik</option>
                            </select>
                        </div>
                    </div>
                    @if(\Illuminate\Support\Facades\Auth::user()->authority == 'admin')
                    <div class="form-group">
                        <label>Durum:</label>
                        <div class="controls">
                            <select name="status" id="select" class="form-control">
                                    <option value="1">Aktif</option>
                                    <option value="0">Pasif</option>
                            </select>
                        </div>
                    </div>
                    @else
                        <input type="hidden" name="status" value="0">
                    @endif

                    <div class="form-group">
                        <label for="example_input_full_name">Duyuru Kapak Fotoğrafı:</label>
                        <input id="name" type="file" class="form-control"  name="photo" required>
                    </div>
                    <div class="form-group">

                   <textarea name="content" style="height: 500px;" class="my-editor"></textarea>

                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{route('activities.index')}}" style="color: white" class="btn btn-danger">Geri Dön</a>
                    <button type="submit" class="btn btn-success pull-right">Duyuru Ekle</button>
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
            text:"Duyuru Eklendi",
            type: "success",
            timer:2000,
            showConfirmButton: false
        });
        @endif
        @if (session('no'))
        swal({
            title:"Hata",
            text:"Duyuru Eklenemedi",
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
