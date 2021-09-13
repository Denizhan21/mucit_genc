<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="user-profile treeview">
                <a href="index.html">
                    <img src="/admin/images/avatar.jpg" alt="user">
                    <span>{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="javascript:void()"><i class="fa fa-user mr-5"></i>My Profile </a></li>
                    <li><a href="javascript:void()"><i class="fa fa-money mr-5"></i>My Balance</a></li>
                    <li><a href="javascript:void()"><i class="fa fa-envelope-open mr-5"></i>Inbox</a></li>
                    <li><a href="javascript:void()"><i class="fa fa-cog mr-5"></i>Account Setting</a></li>
                    <li><a href="javascript:void()"><i class="fa fa-power-off mr-5"></i>Logout</a></li>
                </ul>
            </li>
            <li class="header nav-small-cap">PERSONAL</li>
            <li class="active">
                <a href="{{route('admin.index')}}">
                    <i class="fa fa-home"></i> <span>Anasayfa</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
            </li>

            <li class="">
                <a href="{{route('homepage')}}">
                    <i class="fa fa-home"></i> <span>Siteye Git</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
            </li>

            @if(\Illuminate\Support\Facades\Auth::user()->authority == 'admin')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Kullanıcı İşlemleri</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('users.index','authority=admin')}}"><i class="fa fa-circle-thin"></i>Yöneticiler</a></li>
                    <li><a href="{{route('users.index','authority=teacher')}}"><i class="fa fa-circle-thin"></i>Öğretmenler</a></li>
                    <li><a href="{{route('users.index','authority=student')}}"><i class="fa fa-circle-thin"></i>Öğrenciler</a></li>
                    <li><a href="{{route('users.create')}}"><i class="fa fa-circle-thin"></i>Kullanıcı Ekle</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-building-o"></i>
                    <span>Proje İşlemleri</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('projects.all')}}"><i class="fa fa-circle-thin"></i>Projeler</a></li>
                </ul>
            </li>
            @endif
            @if(\Illuminate\Support\Facades\Auth::user()->authority == 'admin')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-building-o"></i>
                    <span>Okul İşlemleri</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('schools.index')}}"><i class="fa fa-circle-thin"></i>Okullar</a></li>

                    <li><a href="{{route('schools.create')}}"><i class="fa fa-circle-thin"></i>Okul Ekle</a></li>

                </ul>
            </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cc-diners-club "></i>
                        <span>Kulüp İşlemleri</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('clubs.index')}}"><i class="fa fa-circle-thin"></i>Kulüpler</a></li>
                        <li><a href="{{route('clubs.create')}}"><i class="fa fa-circle-thin"></i>Kulüp Ekle</a></li>
                        <li><a href="{{route('clubs.create')}}"><i class="fa fa-circle-thin"></i>Onay Bekleyen Kulüpler</a></li>
                    </ul>
                </li>
            @endif
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-newspaper-o"></i>
                    <span>Duyuru İşlemleri</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @if(\Illuminate\Support\Facades\Auth::user()->authority == 'admin')
                        <li><a href="{{route('activities.index')}}"><i class="fa fa-circle-thin"></i>Duyurular</a></li>
                    @endif
                    <li><a href="{{route('activities.create')}}"><i class="fa fa-circle-thin"></i>Duyuru Ekle</a></li>
                </ul>
            </li>


            @if(\Illuminate\Support\Facades\Auth::user()->authority == 'teacher')
            <li class="">
                <a href="{{route('teacher_club')}}">
                    <i class="fa fa-calendar"></i> <span>Kulüplerim</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
            </li>

                <li class="">
                    <a href="{{route('teacher_club')}}">
                        <i class="fa fa-calendar"></i> <span>Gelen Projeler</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
            </span>
                    </a>
                </li>
            @endif

            @if(\Illuminate\Support\Facades\Auth::user()->authority == 'admin')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-newspaper-o"></i>
                    <span>Gündem İşlemleri</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('news.index')}}"><i class="fa fa-circle-thin"></i>Gündemler</a></li>
                    <li><a href="{{route('news.create')}}"><i class="fa fa-circle-thin"></i>Gündem Ekle</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-newspaper-o"></i>
                    <span>Yorum İşlemleri</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('comments.index')}}"><i class="fa fa-circle-thin"></i>Yorumlar</a></li>
                </ul>
            </li>

            <li class="">
                <a href="{{route('logs')}}">
                    <i class="fa fa-calendar"></i> <span>Log Kayıtları</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
            </li>
            @endif




        </ul>
    </section>
</aside>
