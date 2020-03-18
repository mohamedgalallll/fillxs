<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dubizzle</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{url('assets/styles/css/themes/lite-purple.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/styles/vendor/perfect-scrollbar.css')}}">
        <link href="{{ url('css/all.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{url('css/style.css')}}">
        <link rel="icon" href="{{ url('image/logo.png') }}">

</head>
<body>
    <div class="app-admin-wrap layout-sidebar-large">
        <div class="main-header">
            <div class="logo">
                 <a href="{{route('home')}}">
                    <img width="98" src="{{url('image/dubizzle.png')}}" alt="dubizzle">
                </a>
             </div>
            <div class="menu-toggle">
                <div></div>
                <div></div>
                <div></div>
            </div>

            <div style="margin: auto"></div>

            <div class="header-part-right">
                <!-- Full screen toggle -->
                <i class="i-Full-Screen header-icon d-none d-sm-inline-block " data-fullscreen></i>
                <!-- Grid menu Dropdown -->
            <a href="{{route('home')}}">
                <i class="i-Clothing-Store header-icon"></i>
            </a>

                <!-- User avatar dropdown -->
                <div class="dropdown">
                    <div class="user col align-self-end">
                         @if (auth()->user()->avatar)
                                <img class="userimg rounded-circle mr-1" src="{{ url( 'storage'.auth()->user()->avatar ) }} "
                                id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    alt="myimg" width="25px" height="25px">
                                @else
                                <img class="userimg rounded-circle mr-1" src="{{ url('image/image.png') }}"
                                    alt="myimg" width="25px" height="25px" id="userDropdown"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @endif
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <div class="dropdown-header">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </div>
                                    <a class="dropdown-item" href="{{ route('account') }}">Account Setting</a>
                            {{-- <a class="dropdown-item">Billing history</a> --}}
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- header top menu end -->

        <div class="side-content-wrap">
            <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
                <ul class="navigation-left">
                     <li class="nav-item">
                    <a class="nav-item-hold" href="{{route('allcategories')}}">
                        <i class="nav-icon i-Computer-Secure icon-color"></i>
                        <span class="nav-text">Categories</span>
                    </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-hold" href="{{route('Sub_Categories')}}">
                            <i class="nav-icon i-Computer-Secure icon-color"></i>
                            <span class="nav-text">All Sub Categories</span>
                        </a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-item-hold" href="{{url('/All/Users')}}">
                            <i class="nav-icon i-Computer-Secure icon-color"></i>
                            <span class="nav-text">All Users</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-hold" href="{{route('addCategory')}}">
                            <i class="fas fa-plus-circle fa-2x"></i>
                            <span class="nav-text">Add Category</span>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-item-hold" href="{{route('addSubCategory')}}">
                            <i class="fas fa-plus-circle fa-2x"></i>
                            <span class="nav-text">Add Sub Category</span>
                        </a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-item-hold" href="{{url('/approve')}}">
                            <i class="nav-icon i-Computer-Secure icon-color"></i>
                            <span class="nav-text">Adds</span>
                        </a>
                    </li>
                </ul>
            </div>


            <div class="sidebar-overlay"></div>
        </div>
        <!--=============== Left side End ================-->

        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb mt-5"></div>
            @yield('content')
        </div>

        <!-- ============ Body content End ============= -->
    </div>
    <!--=============== End app-admin-wrap ================-->



<script src="{{url('assets/js/vendor/jquery-3.3.1.min.js')}}"></script>
<script src="{{url('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('assets/js/vendor/perfect-scrollbar.min.js')}}"></script>
<script src="{{url('assets/js/es5/script.min.js')}}"></script>
<script src="{{url('assets/js/es5/sidebar.large.script.min.js')}}"></script>

</body>

</html>
