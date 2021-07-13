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

    <link rel="stylesheet" href="/homepage/assets/css/app.css">

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">


    <!-- Ajax  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdn.tiny.cloud/1/guga53l51d8lxq6hmvluiuvqfj89iqdblnwjsdjuwy7gqteo/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


    @yield('css')

    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">
</head>

<body class="bg-link-water">

<a href="#wrapper" data-type="section-switch" class="scrollup">
    <i class="icofont-bubble-up"></i>
</a>

<div id="preloader"></div>

<div id="wrapper" class="wrapper">



    @include('homepage.header')






    @yield('content')
    {{--    Footer Başlangıç  --}}
    <footer class="footer-wrap footer-dashboard">

        <div class="main-footer">
            <div class="container">
                <div class="row row-cols-lg-4 row-cols-sm-2 row-cols-1">
                    <div class="col">
                        <div class="footer-box">
                            <div class="footer-logo">
                                <a href="{{route('homepage')}}"><img src="/homepage/media/logo_dark.png" alt="Logo"></a>
                            </div>
                            <p>DigitalZone Acıbadem Okulları B2RT(Bilgisayar Bilimleri ve Robotik Teknolojiler) Ekibi ve Mucit Genç Ekibi tarafından yazılım ve uygulama kısmı ile tamamen özgün , 21.yy dijital yetkinliklerini öğrencilere kazandırmak amacı ile geliştirilmiş bir projedir.</p>
                        </div>
                    </div>
                    <div class="col d-flex justify-content-lg-center">
                        <div class="footer-box">
                            <h3 class="footer-title">
                                Kullanışlı Linkler
                            </h3>
                            <div class="footer-link">
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="about-us.html">About us</a></li>
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="contact.html">Contacts</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex justify-content-lg-center">
                        <div class="footer-box">
                            <h3 class="footer-title">
                                İletişim
                            </h3>
                            <div class="footer-link">
                                <ul>
                                    <li><a href="newsfeed.html">NewsFeed</a></li>
                                    <li><a href="user-timeline.html">Profile</a></li>
                                    <li><a href="user-friends.html">Friends</a></li>
                                    <li><a href="user-groups.html">Groups</a></li>
                                    <li><a href="forums.html">Forums</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex justify-content-lg-center">
                        <div class="footer-box">
                            <h3 class="footer-title">
                                Sosyal Medya Hesapları
                            </h3>
                            <div class="footer-link">
                                <ul>
                                    <li><a href="https://www.facebook.com/">facebook</a></li>
                                    <li><a href="https://twitter.com/">twitter</a></li>
                                    <li><a href="https://www.instagram.com/">instagram</a></li>
                                    <li><a href="https://www.youtube.com/">Youtube</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-copyright">© 2021 Denizhan Yazılım. Tüm Hakları Saklıdır.</div>
        </div>
    </footer>
    {{--    Footer Bitiş  --}}

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

<script src="/homepage/assets/js/app.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>



@yield('js')

</body>

</html>
