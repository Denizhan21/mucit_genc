



@if (Route::has('login'))
    @auth

        @if(\Illuminate\Support\Facades\Auth::user()->authority=='admin')
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
                                        <a href="#" class="menu-link have-sub">Kulüpler</a>
                                        <ul class="mega-menu mega-menu-col-2">

                                            @foreach($clubs_header as $clubs)
                                            <li>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="/clubs/{{$clubs->id}}">{{$clubs->name}}</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            @endforeach




                                        </ul>
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
                          {{--  <div class="inline-item d-none d-md-block">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search here.......">
                                    <div class="input-group-append">
                                        <button class="submit-btn" type="button"><i class="icofont-search"></i></button>
                                    </div>
                                </div>
                            </div>--}}
                            <div class="inline-item d-flex align-items-center">
                                <div class="dropdown dropdown-cart">
                                    <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        <i class="icofont-shopping-cart"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="item-heading">
                                            <h6 class="heading-title">Shopping Cart: <span>3</span></h6>
                                        </div>
                                        <div class="item-body">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/cart_1.jpg" alt="Product">
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title"><a href="#">Black Coffee Mug</a></h6>
                                                    <div class="item-category">COFFEE MUGS</div>
                                                    <div class="item-price">$29 x 1</div>
                                                    <div class="btn-area">
                                                        <a href="#" class="close-btn"><i class="icofont-ui-close"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/cart_2.jpg" alt="Product">
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title"><a href="#">Head Phone</a></h6>
                                                    <div class="item-category">Assets</div>
                                                    <div class="item-price">$15 x 1</div>
                                                    <div class="btn-area">
                                                        <a href="#" class="close-btn"><i class="icofont-ui-close"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/cart_3.jpg" alt="Product">
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title"><a href="#">Black Watch</a></h6>
                                                    <div class="item-category">Watch</div>
                                                    <div class="item-price">$59 x 1</div>
                                                    <div class="btn-area">
                                                        <a href="#" class="close-btn"><i class="icofont-ui-close"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-footer">
                                            <a href="#" class="view-btn">View All Product</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown dropdown-friend">
                                    <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        <i class="icofont-users-alt-4"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="item-heading">
                                            <h6 class="heading-title">Friend Requests</h6>
                                            <div class="heading-btn">
                                                <a href="#">Settings</a>
                                                <a href="#">Mark all as Read</a>
                                            </div>
                                        </div>
                                        <div class="item-body">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/chat_5.jpg" alt="Notify">
                                                    <span class="chat-status offline"></span>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title"><a href="#">Lily Zaman</a></h6>
                                                    <p>4 in mutual friends</p>
                                                    <div class="btn-area">
                                                        <a href="#" class="item-btn"><i class="icofont-plus"></i></a>
                                                        <a href="#" class="item-btn"><i class="icofont-minus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/chat_1.jpg" alt="Notify">
                                                    <span class="chat-status online"></span>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title"><a href="#">Ketty Rose</a></h6>
                                                    <p>3 in mutual friends</p>
                                                    <div class="btn-area">
                                                        <a href="#" class="item-btn"><i class="icofont-plus"></i></a>
                                                        <a href="#" class="item-btn"><i class="icofont-minus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/chat_8.jpg" alt="Notify">
                                                    <span class="chat-status online"></span>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title"><a href="#">Rustom vai</a></h6>
                                                    <p>6 in mutual friends</p>
                                                    <div class="btn-area">
                                                        <a href="#" class="item-btn"><i class="icofont-plus"></i></a>
                                                        <a href="#" class="item-btn"><i class="icofont-minus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-footer">
                                            <a href="#" class="view-btn">View All Friend Request</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown dropdown-message">
                                    <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        <i class="icofont-speech-comments"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="item-heading">
                                            <h6 class="heading-title">Message</h6>
                                            <div class="heading-btn">
                                                <a href="#">Settings</a>
                                                <a href="#">Mark all as Read</a>
                                            </div>
                                        </div>
                                        <div class="item-body">
                                            <a href="#" class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/notifiy_1.png" alt="Notify">
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title">Diana Jameson</h6>
                                                    <div class="item-time">15 mins ago</div>
                                                    <p>when are nknowen printer took galley of types ...</p>
                                                </div>
                                            </a>
                                            <a href="#" class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/notifiy_2.png" alt="Notify">
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title">Quirty</h6>
                                                    <div class="item-time">15 mins ago</div>
                                                    <p>when are nknowen printer took galley of types ...</p>
                                                </div>
                                            </a>
                                            <a href="#" class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/notifiy_3.png" alt="Notify">
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title">Zinia Jessy</h6>
                                                    <div class="item-time">15 mins ago</div>
                                                    <p>when are nknowen printer took galley of types ...</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="item-footer">
                                            <a href="#" class="view-btn">View All Messages</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown dropdown-notification">
                                    <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        <i class="icofont-notification"></i><span class="notify-count">3</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="item-heading">
                                            <h6 class="heading-title">Notifications</h6>
                                            <div class="heading-btn">
                                                <a href="#">Settings</a>
                                                <a href="#">Mark all as Read</a>
                                            </div>
                                        </div>
                                        <div class="item-body">
                                            <a href="#" class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/notifiy_1.png" alt="Notify">
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title">Diana Jameson</h6>
                                                    <div class="item-time">15 mins ago</div>
                                                    <p>when are nknowen printer took galley of types ...</p>
                                                </div>
                                            </a>
                                            <a href="#" class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/notifiy_2.png" alt="Notify">
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title">Quirty</h6>
                                                    <div class="item-time">15 mins ago</div>
                                                    <p>when are nknowen printer took galley of types ...</p>
                                                </div>
                                            </a>
                                            <a href="#" class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/notifiy_3.png" alt="Notify">
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title">Zinia Jessy</h6>
                                                    <div class="item-time">15 mins ago</div>
                                                    <p>when are nknowen printer took galley of types ...</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="item-footer">
                                            <a href="#" class="view-btn">View All Notification</a>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="inline-item">
                                <div class="dropdown dropdown-admin">

                                    <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                    <span class="media">
                                        <span class="item-img">
                                            <img src="/homepage/media/figure/chat_5.jpg" alt="Chat">
                                            <span class="acc-verified"><i class="icofont-check"></i></span>
                                        </span>
                                        <span class="media-body">
                                            <span class="item-title">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                                        </span>
                                    </span>
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="admin-options">

                                            <li><a href="{{route('admin.index')}}">Panele Git</a></li>
                                            <li><a href="#">Projeni Gönder</a></li>
                                            <li><a href="{{ route('homepage.logout') }}">Çıkış Yap</a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>


        @elseif(\Illuminate\Support\Facades\Auth::user()->authority=='teacher')
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
                                        <a href="#" class="menu-link have-sub">Kulüpler</a>
                                        <ul class="mega-menu mega-menu-col-2">

                                            @foreach($clubs_header as $clubs)
                                                <li>
                                                    <ul class="sub-menu">
                                                        <li>
                                                            <a href="/clubs/{{$clubs->id}}">{{$clubs->name}}</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            @endforeach




                                        </ul>
                                    </li>

                                    <li class="header-nav-item">
                                        <a href="{{route('project_view')}}" class="menu-link active">Projeler</a>
                                    </li>

                                    <li class="header-nav-item">
                                        <a href="{{route('homepage')}}" class="menu-link active">Duyurular</a>
                                    </li>


                                    <li class="header-nav-item">
                                        <a href="{{route('homepage')}}" class="menu-link active">İletişim</a>
                                    </li>

                                </ul>
                            </nav>
                        </div>



                        <div class="nav-item header-control">
                            {{--  <div class="inline-item d-none d-md-block">
                                  <div class="input-group">
                                      <input type="text" class="form-control" placeholder="Search here.......">
                                      <div class="input-group-append">
                                          <button class="submit-btn" type="button"><i class="icofont-search"></i></button>
                                      </div>
                                  </div>
                              </div>--}}
                            <div class="inline-item d-flex align-items-center">
                                <div class="dropdown dropdown-cart">
                                    <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        <i class="icofont-shopping-cart"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="item-heading">
                                            <h6 class="heading-title">Shopping Cart: <span>3</span></h6>
                                        </div>
                                        <div class="item-body">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/cart_1.jpg" alt="Product">
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title"><a href="#">Black Coffee Mug</a></h6>
                                                    <div class="item-category">COFFEE MUGS</div>
                                                    <div class="item-price">$29 x 1</div>
                                                    <div class="btn-area">
                                                        <a href="#" class="close-btn"><i class="icofont-ui-close"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/cart_2.jpg" alt="Product">
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title"><a href="#">Head Phone</a></h6>
                                                    <div class="item-category">Assets</div>
                                                    <div class="item-price">$15 x 1</div>
                                                    <div class="btn-area">
                                                        <a href="#" class="close-btn"><i class="icofont-ui-close"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/cart_3.jpg" alt="Product">
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title"><a href="#">Black Watch</a></h6>
                                                    <div class="item-category">Watch</div>
                                                    <div class="item-price">$59 x 1</div>
                                                    <div class="btn-area">
                                                        <a href="#" class="close-btn"><i class="icofont-ui-close"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-footer">
                                            <a href="#" class="view-btn">View All Product</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown dropdown-friend">
                                    <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        <i class="icofont-users-alt-4"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="item-heading">
                                            <h6 class="heading-title">Friend Requests</h6>
                                            <div class="heading-btn">
                                                <a href="#">Settings</a>
                                                <a href="#">Mark all as Read</a>
                                            </div>
                                        </div>
                                        <div class="item-body">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/chat_5.jpg" alt="Notify">
                                                    <span class="chat-status offline"></span>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title"><a href="#">Lily Zaman</a></h6>
                                                    <p>4 in mutual friends</p>
                                                    <div class="btn-area">
                                                        <a href="#" class="item-btn"><i class="icofont-plus"></i></a>
                                                        <a href="#" class="item-btn"><i class="icofont-minus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/chat_1.jpg" alt="Notify">
                                                    <span class="chat-status online"></span>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title"><a href="#">Ketty Rose</a></h6>
                                                    <p>3 in mutual friends</p>
                                                    <div class="btn-area">
                                                        <a href="#" class="item-btn"><i class="icofont-plus"></i></a>
                                                        <a href="#" class="item-btn"><i class="icofont-minus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/chat_8.jpg" alt="Notify">
                                                    <span class="chat-status online"></span>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title"><a href="#">Rustom vai</a></h6>
                                                    <p>6 in mutual friends</p>
                                                    <div class="btn-area">
                                                        <a href="#" class="item-btn"><i class="icofont-plus"></i></a>
                                                        <a href="#" class="item-btn"><i class="icofont-minus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-footer">
                                            <a href="#" class="view-btn">View All Friend Request</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown dropdown-message">
                                    <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        <i class="icofont-speech-comments"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="item-heading">
                                            <h6 class="heading-title">Message</h6>
                                            <div class="heading-btn">
                                                <a href="#">Settings</a>
                                                <a href="#">Mark all as Read</a>
                                            </div>
                                        </div>
                                        <div class="item-body">
                                            <a href="#" class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/notifiy_1.png" alt="Notify">
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title">Diana Jameson</h6>
                                                    <div class="item-time">15 mins ago</div>
                                                    <p>when are nknowen printer took galley of types ...</p>
                                                </div>
                                            </a>
                                            <a href="#" class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/notifiy_2.png" alt="Notify">
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title">Quirty</h6>
                                                    <div class="item-time">15 mins ago</div>
                                                    <p>when are nknowen printer took galley of types ...</p>
                                                </div>
                                            </a>
                                            <a href="#" class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/notifiy_3.png" alt="Notify">
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title">Zinia Jessy</h6>
                                                    <div class="item-time">15 mins ago</div>
                                                    <p>when are nknowen printer took galley of types ...</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="item-footer">
                                            <a href="#" class="view-btn">View All Messages</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown dropdown-notification">
                                    <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        <i class="icofont-notification"></i><span class="notify-count">3</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="item-heading">
                                            <h6 class="heading-title">Notifications</h6>
                                            <div class="heading-btn">
                                                <a href="#">Settings</a>
                                                <a href="#">Mark all as Read</a>
                                            </div>
                                        </div>
                                        <div class="item-body">
                                            <a href="#" class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/notifiy_1.png" alt="Notify">
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title">Diana Jameson</h6>
                                                    <div class="item-time">15 mins ago</div>
                                                    <p>when are nknowen printer took galley of types ...</p>
                                                </div>
                                            </a>
                                            <a href="#" class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/notifiy_2.png" alt="Notify">
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title">Quirty</h6>
                                                    <div class="item-time">15 mins ago</div>
                                                    <p>when are nknowen printer took galley of types ...</p>
                                                </div>
                                            </a>
                                            <a href="#" class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/notifiy_3.png" alt="Notify">
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title">Zinia Jessy</h6>
                                                    <div class="item-time">15 mins ago</div>
                                                    <p>when are nknowen printer took galley of types ...</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="item-footer">
                                            <a href="#" class="view-btn">View All Notification</a>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="inline-item">
                                <div class="dropdown dropdown-admin">

                                    <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                    <span class="media">
                                        <span class="item-img">
                                            <img src="/homepage/media/figure/chat_5.jpg" alt="Chat">
                                            <span class="acc-verified"><i class="icofont-check"></i></span>
                                        </span>
                                        <span class="media-body">
                                            <span class="item-title">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                                        </span>
                                    </span>
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="admin-options">

                                            <li><a href="{{route('admin.index')}}">Panele Git</a></li>
                                            <li><a href="#">Projeni Gönder</a></li>
                                            <li><a href="{{ route('homepage.logout') }}">Çıkış Yap</a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        @elseif(\Illuminate\Support\Facades\Auth::user()->authority=='student')
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
                                        <a href="#" class="menu-link have-sub">Kulüpler</a>
                                        <ul class="mega-menu mega-menu-col-2">

                                            @foreach($clubs_header as $clubs)
                                                <li>
                                                    <ul class="sub-menu">
                                                        <li>
                                                            <a href="/clubs/{{$clubs->id}}">{{$clubs->name}}</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            @endforeach




                                        </ul>
                                    </li>

                                    <li class="header-nav-item">
                                        <a href="{{route('project_view')}}" class="menu-link active">Projeler</a>
                                    </li>

                                    <li class="header-nav-item">
                                        <a href="{{route('homepage')}}" class="menu-link active">Duyurular</a>
                                    </li>


                                    <li class="header-nav-item">
                                        <a href="{{route('homepage')}}" class="menu-link active">İletişim</a>
                                    </li>

                                </ul>
                            </nav>
                        </div>



                        <div class="nav-item header-control">
                            {{--  <div class="inline-item d-none d-md-block">
                                  <div class="input-group">
                                      <input type="text" class="form-control" placeholder="Search here.......">
                                      <div class="input-group-append">
                                          <button class="submit-btn" type="button"><i class="icofont-search"></i></button>
                                      </div>
                                  </div>
                              </div>--}}
                            <div class="inline-item d-flex align-items-center">
                                <div class="dropdown dropdown-cart">
                                    <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        <i class="icofont-shopping-cart"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="item-heading">
                                            <h6 class="heading-title">Shopping Cart: <span>3</span></h6>
                                        </div>
                                        <div class="item-body">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/cart_1.jpg" alt="Product">
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title"><a href="#">Black Coffee Mug</a></h6>
                                                    <div class="item-category">COFFEE MUGS</div>
                                                    <div class="item-price">$29 x 1</div>
                                                    <div class="btn-area">
                                                        <a href="#" class="close-btn"><i class="icofont-ui-close"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/cart_2.jpg" alt="Product">
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title"><a href="#">Head Phone</a></h6>
                                                    <div class="item-category">Assets</div>
                                                    <div class="item-price">$15 x 1</div>
                                                    <div class="btn-area">
                                                        <a href="#" class="close-btn"><i class="icofont-ui-close"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/cart_3.jpg" alt="Product">
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title"><a href="#">Black Watch</a></h6>
                                                    <div class="item-category">Watch</div>
                                                    <div class="item-price">$59 x 1</div>
                                                    <div class="btn-area">
                                                        <a href="#" class="close-btn"><i class="icofont-ui-close"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-footer">
                                            <a href="#" class="view-btn">View All Product</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown dropdown-friend">
                                    <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        <i class="icofont-users-alt-4"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="item-heading">
                                            <h6 class="heading-title">Friend Requests</h6>
                                            <div class="heading-btn">
                                                <a href="#">Settings</a>
                                                <a href="#">Mark all as Read</a>
                                            </div>
                                        </div>
                                        <div class="item-body">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/chat_5.jpg" alt="Notify">
                                                    <span class="chat-status offline"></span>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title"><a href="#">Lily Zaman</a></h6>
                                                    <p>4 in mutual friends</p>
                                                    <div class="btn-area">
                                                        <a href="#" class="item-btn"><i class="icofont-plus"></i></a>
                                                        <a href="#" class="item-btn"><i class="icofont-minus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/chat_1.jpg" alt="Notify">
                                                    <span class="chat-status online"></span>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title"><a href="#">Ketty Rose</a></h6>
                                                    <p>3 in mutual friends</p>
                                                    <div class="btn-area">
                                                        <a href="#" class="item-btn"><i class="icofont-plus"></i></a>
                                                        <a href="#" class="item-btn"><i class="icofont-minus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/chat_8.jpg" alt="Notify">
                                                    <span class="chat-status online"></span>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title"><a href="#">Rustom vai</a></h6>
                                                    <p>6 in mutual friends</p>
                                                    <div class="btn-area">
                                                        <a href="#" class="item-btn"><i class="icofont-plus"></i></a>
                                                        <a href="#" class="item-btn"><i class="icofont-minus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-footer">
                                            <a href="#" class="view-btn">View All Friend Request</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown dropdown-message">
                                    <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        <i class="icofont-speech-comments"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="item-heading">
                                            <h6 class="heading-title">Message</h6>
                                            <div class="heading-btn">
                                                <a href="#">Settings</a>
                                                <a href="#">Mark all as Read</a>
                                            </div>
                                        </div>
                                        <div class="item-body">
                                            <a href="#" class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/notifiy_1.png" alt="Notify">
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title">Diana Jameson</h6>
                                                    <div class="item-time">15 mins ago</div>
                                                    <p>when are nknowen printer took galley of types ...</p>
                                                </div>
                                            </a>
                                            <a href="#" class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/notifiy_2.png" alt="Notify">
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title">Quirty</h6>
                                                    <div class="item-time">15 mins ago</div>
                                                    <p>when are nknowen printer took galley of types ...</p>
                                                </div>
                                            </a>
                                            <a href="#" class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/notifiy_3.png" alt="Notify">
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title">Zinia Jessy</h6>
                                                    <div class="item-time">15 mins ago</div>
                                                    <p>when are nknowen printer took galley of types ...</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="item-footer">
                                            <a href="#" class="view-btn">View All Messages</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown dropdown-notification">
                                    <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        <i class="icofont-notification"></i><span class="notify-count">3</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="item-heading">
                                            <h6 class="heading-title">Notifications</h6>
                                            <div class="heading-btn">
                                                <a href="#">Settings</a>
                                                <a href="#">Mark all as Read</a>
                                            </div>
                                        </div>
                                        <div class="item-body">
                                            <a href="#" class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/notifiy_1.png" alt="Notify">
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title">Diana Jameson</h6>
                                                    <div class="item-time">15 mins ago</div>
                                                    <p>when are nknowen printer took galley of types ...</p>
                                                </div>
                                            </a>
                                            <a href="#" class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/notifiy_2.png" alt="Notify">
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title">Quirty</h6>
                                                    <div class="item-time">15 mins ago</div>
                                                    <p>when are nknowen printer took galley of types ...</p>
                                                </div>
                                            </a>
                                            <a href="#" class="media">
                                                <div class="item-img">
                                                    <img src="media/figure/notifiy_3.png" alt="Notify">
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="item-title">Zinia Jessy</h6>
                                                    <div class="item-time">15 mins ago</div>
                                                    <p>when are nknowen printer took galley of types ...</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="item-footer">
                                            <a href="#" class="view-btn">View All Notification</a>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="inline-item">
                                <div class="dropdown dropdown-admin">

                                    <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                    <span class="media">
                                        <span class="item-img">
                                            <img src="/homepage/media/figure/chat_5.jpg" alt="Chat">
                                            <span class="acc-verified"><i class="icofont-check"></i></span>
                                        </span>
                                        <span class="media-body">
                                            <span class="item-title">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                                        </span>
                                    </span>
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="admin-options">

                                            <li><a href="{{route('admin.index')}}">Panele Git</a></li>
                                            <li><a href="#">Projeni Gönder</a></li>
                                            <li><a href="{{ route('homepage.logout') }}">Çıkış Yap</a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        @endif

    @else

        <header class="fixed-header">
            <div id="rt-sticky-placeholder"></div>
            <div id="header-menu" class="header-menu menu-layout1">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-2">
                            <div class="temp-logo">
                                <a href="{{route('homepage')}}"><img src="/homepage/media/logo.png" alt="Logo"></a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7 col-sm-7 col-8 d-flex justify-content-xl-start justify-content-center">
                            <div class="mobile-nav-item hide-on-desktop-menu">
                                <div class="mobile-toggler">
                                    <button type="button" class="mobile-menu-toggle">
                                        <i class="icofont-navigation-menu"></i>
                                    </button>
                                </div>
                                <div class="mobile-logo">
                                    <a href="{{route('homepage')}}">
                                        <img src="/homepage/media/mobile_logo.png" alt="Logo">
                                    </a>
                                </div>
                            </div>
                            <nav id="dropdown" class="template-main-menu">
                                <button type="button" class="mobile-menu-toggle mobile-toggle-close">
                                    <i class="icofont-close"></i>
                                </button>
                                <ul class="menu-content">
                                    <li class="header-nav-item">
                                        <a href="{{route('homepage')}}" class="menu-link active">Anasayfa</a>
                                    </li>
                                    <li class="hide-on-mobile-menu">
                                        <a href="#" class="menu-link have-sub">Kulüpler</a>
                                        <ul class="mega-menu mega-menu-col-2">
                                            @foreach($clubs_header as $clubs)
                                                <li>
                                                    <ul class="sub-menu">
                                                        <li>
                                                            <a href="/clubs/{{$clubs->id}}">{{$clubs->name}}</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>


                                    <li class="header-nav-item">
                                        <a href="{{route('project_view')}}" class="menu-link">Projeler</a>
                                    </li>


                                    <li class="header-nav-item">
                                        <a href="contact.html" class="menu-link">Etkinlikler</a>
                                    </li>

                                    <li class="header-nav-item">
                                        <a href="contact.html" class="menu-link">Haberler</a>
                                    </li>

                                    <li class="header-nav-item">
                                        <a href="contact.html" class="menu-link">İletişim</a>
                                    </li>


                                </ul>
                            </nav>
                        </div>
                        <div class="col-xl-4 col-lg-3 col-sm-5 col-4 d-flex justify-content-end">
                            <div class="header-action">
                                <ul>

                                    <li class="login-btn">
                                        <a href="{{route('login')}}" class="item-btn"><i class="fas fa-user"></i>Giriş</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

    @endauth
@endif
