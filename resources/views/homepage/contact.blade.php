@extends('homepage.template')

@section('content')
    <div class="page-content">
        <div class="container">
            <div class="block-box user-single-blog">
                <div class="blog-content-wrap">
                    <div class="blog-comment-form">
                        <h3 class="item-title">Kulüp Öğretmeni İle İletişime Geçin</h3>
                        {!! Form::open(['route'=>['contact_store'],'method'=>'POST','files'=>'true','class'=>'form-horizontal']) !!}

                        <div class="row gutters-20">

                            <input type="hidden" name="status" value="0">

                            <div class="col-lg-6 form-group" >
                                <label>İsim Soyisim:</label>
                                <input id="name" type="text" class="form-control"  name="name">
                            </div>

                            <div class="col-lg-6 form-group" >
                                <label>Email:</label>
                                <input id="name" type="text" class="form-control"  name="email">
                            </div>

                            <div class="col-lg-6 form-group" >
                                <label>Telefon Numarası:</label>
                                <input id="name" type="text" class="form-control"  name="tel">
                            </div>


                            <div class="col-lg-6 form-group" >
                                <label>Konu:</label>
                                <input id="name" type="text" class="form-control"  name="subject">
                            </div>


                            <div class="col-lg-12 form-group">
                                <textarea name="content" class="form-control textarea" placeholder="Mesajınızın detayını yazınız . . ." cols="30" rows="7"></textarea>
                            </div>


                                    <div class="col-lg-12 form-group">
                                        <button id="gameStart" class="submit-btn" type="submit">Gönder</button>
                                    </div>

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
        @if (session('alert'))

        swal({
            title:"Başarılı",
            text:"Form Başarıyla Gönderildi.",
            type: "success",
            timer:2000,
            showConfirmButton: false
        });
        @endif
        @if (session('no'))
        swal({
            title:"Hata",
            text:"Form Gönderilemedi",
            type: "warning",
            timer:2000,
            showConfirmButton: false
        });
        @endif
    </script>
@endsection
