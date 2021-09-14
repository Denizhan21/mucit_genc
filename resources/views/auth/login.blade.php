<!DOCTYPE html>
<html class="no-js" lang="tr">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mucit GENÇ</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" type="image/x-icon" href="/homepage/media/favicon.png">
    <link rel="stylesheet" href="/homepage/dependencies/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/homepage/dependencies/icofont/icofont.min.css">
    <link rel="stylesheet" href="/homepage/dependencies/slick-carousel/css/slick.css">
    <link rel="stylesheet" href="/homepage/dependencies/slick-carousel/css/slick-theme.css">
    <link rel="stylesheet" href="/homepage/dependencies/magnific-popup/css/magnific-popup.css">
    <link rel="stylesheet" href="/homepage/dependencies/sal.js/sal.css" type="text/css">
    <link rel="stylesheet" href="/homepage/dependencies/select2/css/select2.min.css" type="text/css">

    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="/homepage/assets/css/app.css">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">

</head>

<body class="sticky-header">
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
<a href="#wrapper" data-type="section-switch" class="scrollup">
    <i class="icofont-bubble-up"></i>
</a>

<div id="preloader"></div>

<div id="wrapper" class="wrapper overflow-hidden">


    <div class="login-page-wrap">
        <div class="content-wrap">
            <div class="login-content">
                <div class="item-logo">
                    <a href="{{route('homepage')}}"><img src="/homepage/media/logo.png" style="width: 200px; height: 70px;" alt="logo"></a>
                </div>
                <div class="login-form-wrap">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#login-tab" role="tab" aria-selected="true"><i class="icofont-users-alt-4"></i> Giriş Yap</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#registration-tab" role="tab" aria-selected="false"><i class="icofont-download"></i> Kayıt Ol</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane login-tab fade show active" id="login-tab" role="tabpanel">
                            <h3 class="item-title">Hesap Bilgilerinizi <span>Giriniz</span></h3>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">

                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-Mail Adresinizi giriniz">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Şifrenizi Giriniz">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group reset-password">
                                    <a href="{{ route('password.request') }}">* Şifremi Unuttum</a>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">Beni Hatırla</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="submit-btn">
                                        {{ __('Giriş Yap') }}
                                    </button>
                                </div>
                            </form>
                        </div>



                        <div class="tab-pane registration-tab fade" id="registration-tab" role="tabpanel">
                            <h3 class="item-title">Kayıt Olmak İçin Bilgilerinizi Giriniz</h3>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Adınızı ve Soyadınızı Giriniz">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail Adresinzi Griniz">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Şifrenizi Giriniz">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Şifrenizi Tekrar Giriniz">
                                </div>



                                <div class="form-group">
                                    <button type="submit" class="submit-btn">
                                        {{ __('Kayıt Ol') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="map-line">
                <img src="/homepage/media/banner/map_line.png" alt="map">
                <ul class="map-marker">
                    <li><img src="/homepage/media/banner/marker_1.png" alt="marker"></li>
                    <li><img src="/homepage/media/banner/marker_2.png" alt="marker"></li>
                    <li><img src="/homepage/media/banner/marker_3.png" alt="marker"></li>
                    <li><img src="/homepage/media/banner/marker_4.png" alt="marker"></li>
                </ul>
            </div>
        </div>
    </div>

    <!--=====================================-->
    <!--=      Header Search Start          =-->
    <!--=====================================-->
    <div id="header-search" class="header-search">
        <button type="button" class="close">×</button>
        <form class="header-search-form">
            <input type="search" value="" placeholder="Search here..." />
            <button type="submit" class="search-btn">
                <i class="flaticon-search"></i>
            </button>
        </form>
    </div>
</div>
<!-- Jquery Js -->
<script src="/homepage/dependencies/jquery/js/jquery.min.js"></script>
<script src="/homepage/dependencies/popper.js/js/popper.min.js"></script>
<script src="/homepage/dependencies/bootstrap/js/bootstrap.min.js"></script>
<script src="/homepage/dependencies/imagesloaded/js/imagesloaded.pkgd.min.js"></script>
<script src="/homepage/dependencies/isotope-layout/js/isotope.pkgd.min.js"></script>
<script src="/homepage/dependencies/slick-carousel/js/slick.min.js"></script>
<script src="/homepage/dependencies/sal.js/sal.js"></script>
<script src="/homepage/dependencies/magnific-popup/js/jquery.magnific-popup.min.js"></script>
<script src="/homepage/dependencies/bootstrap-validator/js/validator.min.js"></script>
<script src="/homepage/dependencies/select2/js/select2.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtmXSwv4YmAKtcZyyad9W7D4AC08z0Rb4"></script>

<!-- Site Scripts -->
<script src="/homepage/assets/js/app.js"></script>
</body>

</html>
