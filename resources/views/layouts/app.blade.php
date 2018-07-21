<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="Hi5Dash - HTML5 Admin Template By Jewel Theme">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" href="apple-touch-icon.html">

    <!-- Import Template Icons CSS Files -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset("css/simple-line-icons.css")}}">
    <link rel="stylesheet" href="{{asset("css/linea-basic.css")}}">
    <link rel="stylesheet" href="{{asset("css/pe-icon-7-stroke.css")}}">

    <!-- Import Custom Country Select CSS Files -->
    <link rel="stylesheet" href="{{asset("css/countrySelect.min.css")}}">

    <!-- Import Perfect ScrollBar CSS Files -->
    <link rel="stylesheet" href="{{asset("css/perfect-scrollbar.css")}}">

    <!-- Import Bootstrap CSS File -->

    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">

    <!-- Import Owl Carousel CSS File -->

    <link rel="stylesheet" href="{{asset("css/owl.carousel.min.css")}}">

    <!-- Import Template's CSS Files -->
    <link rel="stylesheet" href="{{asset("css/presets.css")}}">
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    <link rel="stylesheet" href="{{asset("css/index-01.css")}}">
    <link rel="stylesheet" href="{{asset("css/responsive.css")}}">
    @yield('head_content')


</head>


<body class="index-01">


<header class="top-header media">
    <div class="top-left mr-3">
        <a class="navbar-brand" href="/"><img style="width: 40%;height: 100%" src={{asset("images/logo-2.png")}} alt="Site Logo"></a><!-- /.navbar-brand -->
    </div><!-- /.top-left -->

    <div class="top-right media-body">
        <div class="left-content float-left">
            <a href="#" class="sidenav-toggle mr-2" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <i class="fa fa-bars"></i>
            </a><!-- /.sidenav-toggle -->

            <form class="search-form" action="#">
                <input type="text" class="form-control" id="search1" placeholder="Search ...">
                <input type="submit" class="form-control" id="submit1">
            </form><!-- /.search-form -->
        </div><!-- /.left-content -->

        <div class="right-content float-right">
            <div class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i>
                    <span class="count">{{count($userNotifications)}}</span>
                </a>

                <ul class="dropdown-menu">
                    <li class="header">You have {{count($userNotifications)}} notifications</li>
                    <li>
                        <ul class="dropdown-content">
                            @foreach($userNotifications as $userNotification)
                                <li>
                                    <a href="{{route('notifications.show',$userNotification->id)}}">
                                        <i class="fa fa-eye alert-primary"></i> {{$userNotification->message}} &nbsp; &nbsp;
                                    </a>
                                </li>
                                @endforeach

                        </ul>
                    </li>
                    <li class="footer"><a href="{{route('notifications.index')}}">View all</a></li>
                </ul><!-- /.dropdown-menu -->

            </div><!-- /.dropdown -->

            <div class="dropdown user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src={{asset($avatar)}} class="rounded-circle float-left mr-2" alt="User Image">
                    <span class="status"></span>
                    <h4 class="name">{{\Illuminate\Support\Facades\Auth::user()->name}}</h4>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('edit.user', \Illuminate\Support\Facades\Auth::user()->id)}}"><i class="fa fa-user"></i> My Profile</a></li>
                    <li><a href="{{route('notifications.index')}}"><i class="fa fa-bell"></i> Notifications ({{count($userNotifications)}})</a></li>

                    <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">
                        {{ csrf_field() }}
                    </form>

                </ul>
            </div>

        </div><!-- /.right-content -->
    </div><!-- /.top-right -->
</header><!-- /.top-header -->


<div class="content-wrapper container-fluid">
    <aside class="left-panel">
        <div class="user-card background-bg" data-image-src="images/bg5.jpg">
            <a href="#">
                <div class="avatar mr-3 float-left"><img class="rounded-circle" src={{asset($avatar)}} alt="Avatar"></div><!-- /.avatar -->
                <div class="details">
                    <h4 class="name">{{\Illuminate\Support\Facades\Auth::user()->name}}</h4><!-- /.name -->
                    <span class="designation">{{$user_title}}</span><!-- /.designation -->
                </div><!-- /.details -->
            </a>
        </div>
        <nav class="navbar">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="/">
                        <i class="fa fa-dashboard"></i> <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{url('products/index')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-list"></i> <span class="menu-title">Products</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('products.create')}}">Add Product</a>
                        <a class="dropdown-item" href="{{url('/products/index')}}">View Products</a>
                    </div>
                </li>
                @if($user->is_admin)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{url('/users/index')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-users"></i> <span class="menu-title">Users</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('users.create')}}">Add User</a>
                        <a class="dropdown-item" href="{{url('/users/index')}}">View Users</a>
                    </div>
                </li>
                @endif
                @if($user->is_wholesaler)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{route('my.followers')}}" role="button"  aria-expanded="false">
                        <i class="fa fa-users"></i> <span class="menu-title">Followers</span>
                    </a>
                </li>
                @endif
                @if($user->is_admin)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{url('/categories/index')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bookmark"></i> <span class="menu-title">Categories</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('categories.create')}}">Add Category</a>
                        <a class="dropdown-item" href="{{url('/categories/index')}}">View Categories</a>
                    </div>
                </li>
                    @endif

            </ul>
        </nav>
    </aside><!-- /.left-panel -->

    <div class="dashboard-contents">
        @yield('main_content')
        <footer class="site-footer">
            <div class="copyright">
                <div class="float-left">
                    Copyright © 2018 <a href="#" target="_blank">BSE4200</a>
                </div>

                <div class="float-right">
                    Developed with Love by <a href="https://jeweltheme.com/" rel="nofollow">BSE1850</a>
                </div>
            </div><!-- /.copyright -->
        </footer><!-- /.site-footer -->
    </div><!-- /.dashboard-contents -->
</div><!-- /.content-wrapper -->



<script src="{{asset("js/jquery-3.2.1.slim.min.js")}}"></script>
<script src="{{asset("js/plugins.js")}}"></script>
@yield('footer_js')
<script src="{{asset("js/main.js")}}"></script>
@yield('raw_js')

</body>
</html>