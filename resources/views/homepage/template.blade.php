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





    <header class="fixed-header">
        <div class="header-menu">
            <div class="navbar">
                <div class="nav-item d-none d-sm-block">
                    <div class="header-logo">
                        <a href="{{route('homepage')}}"><img src="/homepage/media/logo.png" alt="Cirkle"></a>
                    </div>
                </div>
                <div class="nav-item nav-top-menu">
                    <nav id="dropdown" class="template-main-menu">
                        <ul class="menu-content">
                            <li class="header-nav-item">
                                <a href="{{route('homepage')}}" class="menu-link active">Anasayfa</a>
                            </li>
                            <li class="header-nav-item">
                                <a href="{{route('club_view')}}" class="menu-link active">Kulüpler</a>
                            </li>
                            <li class="header-nav-item">
                                <a href="{{route('project_view')}}" class="menu-link active">Projeler</a>
                            </li>
                            <li class="header-nav-item">
                                <a href="{{route('activity_view')}}" class="menu-link active">Duyurular</a>
                            </li>
                            <li class="header-nav-item">
                                <a href="{{route('contact')}}" class="menu-link active">İletişim</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="nav-item header-control">
{{--                    @if(\Illuminate\Support\Facades\Auth::user()->authority=='student')--}}
{{--                        <div class="inline-item d-flex align-items-center">--}}
{{--                            <div class="dropdown dropdown-cart">--}}
{{--                                <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">--}}
{{--                                    <i class="icofont-shopping-cart"></i>--}}
{{--                                </button>--}}
{{--                                <div class="dropdown-menu dropdown-menu-right">--}}
{{--                                    <div class="item-heading">--}}
{{--                                        <h6 class="heading-title">Shopping Cart: <span>3</span></h6>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-body">--}}
{{--                                        <div class="media">--}}
{{--                                            <div class="item-img">--}}
{{--                                                <img src="media/figure/cart_1.jpg" alt="Product">--}}
{{--                                            </div>--}}
{{--                                            <div class="media-body">--}}
{{--                                                <h6 class="item-title"><a href="#">Black Coffee Mug</a></h6>--}}
{{--                                                <div class="item-category">COFFEE MUGS</div>--}}
{{--                                                <div class="item-price">$29 x 1</div>--}}
{{--                                                <div class="btn-area">--}}
{{--                                                    <a href="#" class="close-btn"><i class="icofont-ui-close"></i></a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="media">--}}
{{--                                            <div class="item-img">--}}
{{--                                                <img src="media/figure/cart_2.jpg" alt="Product">--}}
{{--                                            </div>--}}
{{--                                            <div class="media-body">--}}
{{--                                                <h6 class="item-title"><a href="#">Head Phone</a></h6>--}}
{{--                                                <div class="item-category">Assets</div>--}}
{{--                                                <div class="item-price">$15 x 1</div>--}}
{{--                                                <div class="btn-area">--}}
{{--                                                    <a href="#" class="close-btn"><i class="icofont-ui-close"></i></a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="media">--}}
{{--                                            <div class="item-img">--}}
{{--                                                <img src="media/figure/cart_3.jpg" alt="Product">--}}
{{--                                            </div>--}}
{{--                                            <div class="media-body">--}}
{{--                                                <h6 class="item-title"><a href="#">Black Watch</a></h6>--}}
{{--                                                <div class="item-category">Watch</div>--}}
{{--                                                <div class="item-price">$59 x 1</div>--}}
{{--                                                <div class="btn-area">--}}
{{--                                                    <a href="#" class="close-btn"><i class="icofont-ui-close"></i></a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-footer">--}}
{{--                                        <a href="#" class="view-btn">View All Product</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="dropdown dropdown-friend">--}}
{{--                                <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">--}}
{{--                                    <i class="icofont-users-alt-4"></i>--}}
{{--                                </button>--}}
{{--                                <div class="dropdown-menu dropdown-menu-right">--}}
{{--                                    <div class="item-heading">--}}
{{--                                        <h6 class="heading-title">Friend Requests</h6>--}}
{{--                                        <div class="heading-btn">--}}
{{--                                            <a href="#">Settings</a>--}}
{{--                                            <a href="#">Mark all as Read</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-body">--}}
{{--                                        <div class="media">--}}
{{--                                            <div class="item-img">--}}
{{--                                                <img src="media/figure/chat_5.jpg" alt="Notify">--}}
{{--                                                <span class="chat-status offline"></span>--}}
{{--                                            </div>--}}
{{--                                            <div class="media-body">--}}
{{--                                                <h6 class="item-title"><a href="#">Lily Zaman</a></h6>--}}
{{--                                                <p>4 in mutual friends</p>--}}
{{--                                                <div class="btn-area">--}}
{{--                                                    <a href="#" class="item-btn"><i class="icofont-plus"></i></a>--}}
{{--                                                    <a href="#" class="item-btn"><i class="icofont-minus"></i></a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="media">--}}
{{--                                            <div class="item-img">--}}
{{--                                                <img src="media/figure/chat_1.jpg" alt="Notify">--}}
{{--                                                <span class="chat-status online"></span>--}}
{{--                                            </div>--}}
{{--                                            <div class="media-body">--}}
{{--                                                <h6 class="item-title"><a href="#">Ketty Rose</a></h6>--}}
{{--                                                <p>3 in mutual friends</p>--}}
{{--                                                <div class="btn-area">--}}
{{--                                                    <a href="#" class="item-btn"><i class="icofont-plus"></i></a>--}}
{{--                                                    <a href="#" class="item-btn"><i class="icofont-minus"></i></a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="media">--}}
{{--                                            <div class="item-img">--}}
{{--                                                <img src="media/figure/chat_8.jpg" alt="Notify">--}}
{{--                                                <span class="chat-status online"></span>--}}
{{--                                            </div>--}}
{{--                                            <div class="media-body">--}}
{{--                                                <h6 class="item-title"><a href="#">Rustom vai</a></h6>--}}
{{--                                                <p>6 in mutual friends</p>--}}
{{--                                                <div class="btn-area">--}}
{{--                                                    <a href="#" class="item-btn"><i class="icofont-plus"></i></a>--}}
{{--                                                    <a href="#" class="item-btn"><i class="icofont-minus"></i></a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-footer">--}}
{{--                                        <a href="#" class="view-btn">View All Friend Request</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="dropdown dropdown-message">--}}
{{--                                <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">--}}
{{--                                    <i class="icofont-speech-comments"></i>--}}
{{--                                </button>--}}
{{--                                <div class="dropdown-menu dropdown-menu-right">--}}
{{--                                    <div class="item-heading">--}}
{{--                                        <h6 class="heading-title">Message</h6>--}}
{{--                                        <div class="heading-btn">--}}
{{--                                            <a href="#">Settings</a>--}}
{{--                                            <a href="#">Mark all as Read</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-body">--}}
{{--                                        <a href="#" class="media">--}}
{{--                                            <div class="item-img">--}}
{{--                                                <img src="media/figure/notifiy_1.png" alt="Notify">--}}
{{--                                            </div>--}}
{{--                                            <div class="media-body">--}}
{{--                                                <h6 class="item-title">Diana Jameson</h6>--}}
{{--                                                <div class="item-time">15 mins ago</div>--}}
{{--                                                <p>when are nknowen printer took galley of types ...</p>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                        <a href="#" class="media">--}}
{{--                                            <div class="item-img">--}}
{{--                                                <img src="media/figure/notifiy_2.png" alt="Notify">--}}
{{--                                            </div>--}}
{{--                                            <div class="media-body">--}}
{{--                                                <h6 class="item-title">Quirty</h6>--}}
{{--                                                <div class="item-time">15 mins ago</div>--}}
{{--                                                <p>when are nknowen printer took galley of types ...</p>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                        <a href="#" class="media">--}}
{{--                                            <div class="item-img">--}}
{{--                                                <img src="media/figure/notifiy_3.png" alt="Notify">--}}
{{--                                            </div>--}}
{{--                                            <div class="media-body">--}}
{{--                                                <h6 class="item-title">Zinia Jessy</h6>--}}
{{--                                                <div class="item-time">15 mins ago</div>--}}
{{--                                                <p>when are nknowen printer took galley of types ...</p>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-footer">--}}
{{--                                        <a href="#" class="view-btn">View All Messages</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="dropdown dropdown-notification">--}}
{{--                                <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">--}}
{{--                                    <i class="icofont-notification"></i><span class="notify-count">3</span>--}}
{{--                                </button>--}}
{{--                                <div class="dropdown-menu dropdown-menu-right">--}}
{{--                                    <div class="item-heading">--}}
{{--                                        <h6 class="heading-title">Notifications</h6>--}}
{{--                                        <div class="heading-btn">--}}
{{--                                            <a href="#">Settings</a>--}}
{{--                                            <a href="#">Mark all as Read</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-body">--}}
{{--                                        <a href="#" class="media">--}}
{{--                                            <div class="item-img">--}}
{{--                                                <img src="media/figure/notifiy_1.png" alt="Notify">--}}
{{--                                            </div>--}}
{{--                                            <div class="media-body">--}}
{{--                                                <h6 class="item-title">Diana Jameson</h6>--}}
{{--                                                <div class="item-time">15 mins ago</div>--}}
{{--                                                <p>when are nknowen printer took galley of types ...</p>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                        <a href="#" class="media">--}}
{{--                                            <div class="item-img">--}}
{{--                                                <img src="media/figure/notifiy_2.png" alt="Notify">--}}
{{--                                            </div>--}}
{{--                                            <div class="media-body">--}}
{{--                                                <h6 class="item-title">Quirty</h6>--}}
{{--                                                <div class="item-time">15 mins ago</div>--}}
{{--                                                <p>when are nknowen printer took galley of types ...</p>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                        <a href="#" class="media">--}}
{{--                                            <div class="item-img">--}}
{{--                                                <img src="media/figure/notifiy_3.png" alt="Notify">--}}
{{--                                            </div>--}}
{{--                                            <div class="media-body">--}}
{{--                                                <h6 class="item-title">Zinia Jessy</h6>--}}
{{--                                                <div class="item-time">15 mins ago</div>--}}
{{--                                                <p>when are nknowen printer took galley of types ...</p>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div class="item-footer">--}}
{{--                                        <a href="#" class="view-btn">View All Notification</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endif--}}
                    <div class="inline-item">
                        <div class="dropdown dropdown-admin">
                            <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                    <span class="media">
                                        <span class="item-img">
{{--                                            @if(!empty(\Illuminate\Support\Facades\Auth::user()->avatar))--}}
{{--                                                <img style="width: 44px;height: 44px" src="/{{\Illuminate\Support\Facades\Auth::user()->avatar}}" alt="{{\Illuminate\Support\Facades\Auth::user()->name}}">--}}
{{--                                            @elseif(empty(\Illuminate\Support\Facades\Auth::user()->avatar))--}}
                                                <img src="/homepage/media/figure/chat_5.jpg" alt="Chat">
{{--                                            @endif--}}
                                                <span class="acc-verified">
                                                    <i class="icofont-check"></i>
                                                </span>
                                        </span>
                                        <span class="media-body">
                                            <span class="item-title">
{{--                                                {{\Illuminate\Support\Facades\Auth::user()->name}}--}}
                                            </span>
                                        </span>
                                    </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <ul class="admin-options">
{{--                                    @if(\Illuminate\Support\Facades\Auth::user()->authority=='admin' OR \Illuminate\Support\Facades\Auth::user()->authority=='teacher')--}}
                                        <li><a href="{{route('admin.index')}}">Panele Git</a></li>
{{--                                    @endif--}}
                                    <li><a href="{{ route('homepage.logout') }}">Çıkış Yap</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>












    @yield('content')

    @include('homepage.footer')

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
