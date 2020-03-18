<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dubizzle') }}</title>
    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    <link rel="icon" href="{{ url('image/logo.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ url('css/all.css')}}" rel="stylesheet">
    <link href="{{ url('css/app.css')}}" rel="stylesheet">
    @if (session('lang') == 'ar')
    <link href="{{ url('css/bootstrap.min.css')}}" rel="stylesheet">
    @endif
    <link href="{{ url('css/lightslider.css')}}" rel="stylesheet">
    <link href="{{ url('css/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ url('css/style.css')}}" rel="stylesheet">
    @if (session('lang') == 'ar')
        <link href="{{ url('css/rtl.css')}}" rel="stylesheet">
    @endif
</head>
<body>
    <div id="app">
        @if (session('error'))
            <div class="alert alert-danger mb-0">
                {{session('error')}}
            </div>
        @endif

        {{-- start top-menu --}}
        <div class="top-menu">
            <div class="container">
                <div class="pull-left">
                    <a class="a-menu" href="{{session('lang') == 'en' ?  '?lang=ar': '?lang=en'}}">
                        <span>{{session('lang') == 'en' ?  'العربيه': 'English'}}</span>
                    </a>
                    <a href="#" class="a-menu"><span>{{trans('web.help')}}</span></a>
                </div>
            </div>
        </div>
        {{-- end top-menu --}}

        {{-- start navbar --}}

        <div class="middle-menu">
            <div class="container">
                <div class="row">
                    <div class="col text-left">
                        <a href="{{route('home')}}">
                            <img width="98" src="data:image/png;base64,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" alt="dubizzle">
                        </a>
                    </div>
                    <!-- Left Side Of Navbar -->
                    <div class="col text-right">
                    </div>
                    <ul class="navbar-nav mr-auto">
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{trans('web.logInOrSignUp')}}</a>
                        </li>
                        @else
                        <li class="nav-item dropdown" style="font-size:14px">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @if (auth()->user()->avatar)
                                <img class="userimg rounded-circle mr-1" src="{{ url('storage'. auth()->user()->avatar ) }}"
                                    alt="myimg" width="25px" height="25px">
                                @else
                                <img class="userimg rounded-circle mr-1" src="{{ url('image/image.png') }}"
                                    alt="myimg" width="25px" height="25px">
                                @endif
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="me">
                                <div class="dropdown-content ">
                                    @if(auth()->user()->isAdmin == '1')
                                    <a class="dropdown-item" href="{{url('/admin')}}">{{trans('web.dashBoard')}}</a>
                                    @endif
                                    <a class="dropdown-item" href="{{url('/myads')}}">{{trans('web.myAds')}}</a>
                                    <a class="dropdown-item" href="{{url('/myfavourites')}}">{{trans('web.myFavorites')}}</a>
                                    <a class="dropdown-item" href="{{ route('profile') }}">{{trans('web.profile')}}</a>
                                    <a class="dropdown-item" href="{{ route('account') }}">{{trans('web.accountSettings')}}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        {{trans('web.logout')}}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </li>
                        @endguest
                    </ul>
                <a href="{{url('/chooseAds')}}" class="btn btn-danger btn-bold">{{trans('web.placeYourAd')}}</a>
                </div>
            </div>
        </div>
        <hr class="hr">
        {{-- end navbar --}}

        {{-- start nav --}}
        <div class="container">
            <div class="last-nav">
              <nav class="navbar navbar-expand-md navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        @foreach (App\Category::all() as $category)
                            <li class="nav-item dropdown drophover">
                            <a class="nav-link" href="{{url('/ads/?mainCat='.$category->id)}}"> {{$category->title}} </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    @foreach (App\Sub_Category::where('cat_id', $category->id)->get()  as $supCat)
                                        <li>
                                            <a class="dropdown-item" href="{{url('/ads/?mainCat='.$category->id).'&subCat='.$supCat->id}}">
                                                {{ $supCat->title}}
                                                <span class="popular-num"></span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </nav>
            </div>

        </div>
        <hr class="hr">
        {{-- end nav --}}

        {{-- start main --}}
        <main>
            <div class="overlay">
            </div>
            @yield('content')
        </main>
        {{-- end main --}}

        {{-- start footer --}}
        <footer class="mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <h4>{{trans('web.company')}}</h4>
                        <ul class="list-unstyled">
                            <li>
                                <a href="#">{{trans('web.aboutUs')}}</a>
                            </li>
                            <li>
                                <a href="#">{{trans('web.advertising')}}</a>
                            </li>
                            <li>
                                <a href="#">{{trans('web.careers')}}</a>
                            </li>
                            <li>
                                <a href="#">{{trans('web.termsOfUse')}}</a>
                            </li>
                            <li>
                                <a href="#">{{trans('web.privacypolicy')}}</a>
                            </li>
                            <li>
                                <a href="#">{{trans('web.blog')}}</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-3">
                        <h4>{{trans('web.getSocial')}}</h4>
                        <ul class="list-unstyled">
                            <li>
                                <a href="#">{{trans('web.facebook')}}</a>
                            </li>
                            <li>
                                <a href="#">{{trans('web.twitter')}}</a>
                            </li>
                            <li>
                                <a href="#">{{trans('web.youtube')}}</a>
                            </li>
                            <li>
                                <a href="#">{{trans('web.instagram')}}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-3">
                        <h4> {{trans('web.support')}}</h4>
                        <ul class="list-unstyled">
                            <li>
                                <a href="#">{{trans('web.help')}}</a>
                            </li>
                            <li>
                                <a href="#">{{trans('web.contactUs')}}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-3">
                        <h4>  {{trans('web.languages')}}</h4>
                        <ul class="list-unstyled">
                            <li>
                                <a href="#"> {{trans('web.english')}}</a>
                            </li>
                            <li>
                                <a href="#">{{trans('web.arabi')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="sub-footer">
                    <div id="copyright">
                        <div class="row">
                            <div class="col-6 all-rights">
                                <div class="footer__logo">

                                    <img src="{{url('image/olx-logo-en.png')}}" alt="Dubizzle, an OLX company">

                                </div>
                                <span class="copyright-msg">© dubizzle.com 2019, {{trans('web.allRightsReserved')}}</span>
                            </div>
                            <div class="col-6 img-copy text-center">
                                <img src="{{url('image/consumer-protection-badge.png')}}"
                                    alt="logo">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        {{-- end footer --}}
    </div>

    <!-- Scripts -->

    <script src="{{url('js/jquery.js')}}" ></script>
    <script src="{{ url('js/app.js') }}" ></script>
    <script src="{{ url('js/lightslider.js') }}" ></script>
    <script src="{{ url('js/jquery-ui.min.js') }}" ></script>
    <script src="{{ url('js/plug.js') }}" ></script>
@yield('js')
</body>

</html>
