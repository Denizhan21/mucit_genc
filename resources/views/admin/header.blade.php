<header class="main-header">
    <!-- Logo -->
    <a href="{{route('admin.index')}}" class="logo">
        <!-- mini logo -->
        <b class="logo-mini">
            <span class="light-logo"><img src="/admin/images/logo-light.png" alt="logo"></span>
            <span class="dark-logo"><img src="/admin/images/logo-dark.png" alt="logo"></span>
        </b>
        <!-- logo-->
        <span class="logo-lg">
		  <img src="/admin/images/logo-light-text.png" alt="logo" class="light-logo">
	  	  <img src="/admin/images/logo-dark-text.png" alt="logo" class="dark-logo">
	  </span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <div>
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="btn-group d-none d-lg-inline-block mt-5">
                <button class="btn dropdown-toggle mr-10 btn-outline btn-white" type="button" data-toggle="dropdown">Dashboard</button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href=""><i class="fa fa-shopping-cart w-30"></i>Sales Report Dashboard</a>
                </div>
            </div>
        </div>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              {{--  <li class="search-box">
                    <a class="nav-link hidden-sm-down" href="javascript:void(0)"><i class="mdi mdi-magnify"></i></a>
                    <form class="app-search" style="display: none;">
                        <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                    </form>
                </li>--}}

                <!-- Messages -->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="mdi mdi-email"></i>
                    </a>
                    <ul class="dropdown-menu scale-up">
                        <li class="header">{{count($contact)}} okunmamış mesajınız var</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu inner-content-div">
                                @foreach($contact as $contacts)
                                <li><!-- start message -->
                                    <a href="{{route('contact_edit',$contacts->id)}}">
                                        <div class="mail-contnet">
                                            <h4>
                                                {{substr($contacts->subject,0,10)}} ...
                                                <small><i class="fa fa-clock-o"></i>
                                                    <?php
                                                    date_default_timezone_set('Europe/Istanbul');
                                                    $bugunTarihi=date("d-m-Y H:i:s");
                                                    $girilentarih=date('d-m-Y H:i:s',  strtotime($contacts->created_at));
                                                    $date1=date_create($girilentarih);
                                                    $date2=date_create($bugunTarihi);
                                                    $diff=date_diff($date1,$date2);
                                                    echo $diff->format("%d gün, %h saat");
                                                    ?>
                                                </small>
                                            </h4>
                                            <span>{!! substr($contacts->content,0,20) !!}...</span>
                                        </div>
                                    </a>
                                </li>
                                @endforeach

                            </ul>
                        </li>
                        <li class="footer"><a href="{{route('contact_index')}}">Tüm Mesajlara Git</a></li>
                    </ul>
                </li>
                <!-- Notifications -->

                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="mdi mdi-bell"></i>
                    </a>
                    <ul class="dropdown-menu scale-up">
                        <li class="header">{{count($club_permission)}} tane onay bekleyen kulüp var</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu inner-content-div">
                                @foreach($contact as $contacts)
                                    <li><!-- start message -->
                                        <a href="{{route('contact_edit',$contacts->id)}}">
                                            <div class="mail-contnet">
                                                <h4>
                                                    {{substr($contacts->subject,0,10)}} ...
                                                    <small><i class="fa fa-clock-o"></i>
                                                        <?php
                                                        date_default_timezone_set('Europe/Istanbul');
                                                        $bugunTarihi=date("d-m-Y H:i:s");
                                                        $girilentarih=date('d-m-Y H:i:s',  strtotime($contacts->created_at));
                                                        $date1=date_create($girilentarih);
                                                        $date2=date_create($bugunTarihi);
                                                        $diff=date_diff($date1,$date2);
                                                        echo $diff->format("%d gün, %h saat");
                                                        ?>
                                                    </small>
                                                </h4>
                                                <span>{!! substr($contacts->content,0,20) !!}...</span>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>

                <!-- Tasks-->
{{--                <li class="dropdown tasks-menu">--}}
{{--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
{{--                        <i class="mdi mdi-message"></i>--}}
{{--                    </a>--}}
{{--                    <ul class="dropdown-menu scale-up">--}}
{{--                        <li class="header">You have 6 tasks</li>--}}
{{--                        <li>--}}
{{--                            <!-- inner menu: contains the actual data -->--}}
{{--                            <ul class="menu inner-content-div">--}}
{{--                                <li><!-- Task item -->--}}
{{--                                    <a href="#">--}}
{{--                                        <h3>--}}
{{--                                            Lorem ipsum dolor sit amet--}}
{{--                                            <small class="pull-right">30%</small>--}}
{{--                                        </h3>--}}
{{--                                        <div class="progress xs">--}}
{{--                                            <div class="progress-bar progress-bar-aqua" style="width: 30%" role="progressbar"--}}
{{--                                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">--}}
{{--                                                <span class="sr-only">30% Complete</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <!-- end task item -->--}}
{{--                                <li><!-- Task item -->--}}
{{--                                    <a href="#">--}}
{{--                                        <h3>--}}
{{--                                            Vestibulum nec ligula--}}
{{--                                            <small class="pull-right">20%</small>--}}
{{--                                        </h3>--}}
{{--                                        <div class="progress xs">--}}
{{--                                            <div class="progress-bar progress-bar-danger" style="width: 20%" role="progressbar"--}}
{{--                                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">--}}
{{--                                                <span class="sr-only">20% Complete</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <!-- end task item -->--}}
{{--                                <li><!-- Task item -->--}}
{{--                                    <a href="#">--}}
{{--                                        <h3>--}}
{{--                                            Donec id leo ut ipsum--}}
{{--                                            <small class="pull-right">70%</small>--}}
{{--                                        </h3>--}}
{{--                                        <div class="progress xs">--}}
{{--                                            <div class="progress-bar progress-bar-light-blue" style="width: 70%" role="progressbar"--}}
{{--                                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">--}}
{{--                                                <span class="sr-only">70% Complete</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <!-- end task item -->--}}
{{--                                <li><!-- Task item -->--}}
{{--                                    <a href="#">--}}
{{--                                        <h3>--}}
{{--                                            Praesent vitae tellus--}}
{{--                                            <small class="pull-right">40%</small>--}}
{{--                                        </h3>--}}
{{--                                        <div class="progress xs">--}}
{{--                                            <div class="progress-bar progress-bar-yellow" style="width: 40%" role="progressbar"--}}
{{--                                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">--}}
{{--                                                <span class="sr-only">40% Complete</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <!-- end task item -->--}}
{{--                                <li><!-- Task item -->--}}
{{--                                    <a href="#">--}}
{{--                                        <h3>--}}
{{--                                            Nam varius sapien--}}
{{--                                            <small class="pull-right">80%</small>--}}
{{--                                        </h3>--}}
{{--                                        <div class="progress xs">--}}
{{--                                            <div class="progress-bar progress-bar-red" style="width: 80%" role="progressbar"--}}
{{--                                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">--}}
{{--                                                <span class="sr-only">80% Complete</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <!-- end task item -->--}}
{{--                                <li><!-- Task item -->--}}
{{--                                    <a href="#">--}}
{{--                                        <h3>--}}
{{--                                            Nunc fringilla--}}
{{--                                            <small class="pull-right">90%</small>--}}
{{--                                        </h3>--}}
{{--                                        <div class="progress xs">--}}
{{--                                            <div class="progress-bar progress-bar-primary" style="width: 90%" role="progressbar"--}}
{{--                                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">--}}
{{--                                                <span class="sr-only">90% Complete</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <!-- end task item -->--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="footer">--}}
{{--                            <a href="#">View all tasks</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
                <!-- User Account-->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="/admin/images/avatar.jpg" class="user-image rounded-circle" alt="User Image">
                    </a>

                    <ul class="dropdown-menu scale-up">

                        <li class="user-header">
                            <img src="/admin/images/avatar.jpg" class="float-left rounded-circle" alt="User Image">
                            <p>
                                @php
                                $user_id = \Illuminate\Support\Facades\Auth::user()->id;
                                @endphp
                                {{\Illuminate\Support\Facades\Auth::user()->name}}
                                <small class="mb-5">{{\Illuminate\Support\Facades\Auth::user()->email}}</small>
                                <a href="{{route('users.edit',$user_id)}}" class="btn btn-danger btn-sm btn-rounded">View Profile</a>

                            </p>
                        </li>

                        <li class="user-body">
                            <div class="row ">
                                <div class="col-12 text-left">
                                    <a href="{{route('admin.logout')}}"><i class="fa fa-power-off"></i> Çıkış Yap</a>
                                </div>
                            </div>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-cog fa-spin"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
