<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Article Management</title>

        <link rel="stylesheet" href="{{ asset('css/components.css') }}">
        <link rel="stylesheet" href="{{ asset('css/icons.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsee.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl-carousel/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl-carousel/owl.theme.css') }}">  
        <!-- CUSTOM STYLE -->
        <link rel="stylesheet" href="{{ asset('css/template-style.css') }}">
        <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>-->
        <script type="text/javascript" src="{{ asset('js/jquery-1.8.3.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery-ui.min.js') }}"></script>   
    </head>
    <body class="size-1520">
        <header>
            <div class="line">
                <div class="box">
                    <div class="s-12 l-2">
                        <img class="full-img logo" src="{{ asset('img/logo.svg') }}">
                    </div>
                    <div class="s-12 l-8 right">
                        <div class="margin">      
                            <form  class="customform s-12 l-8" method="get" action="/article/search">
                                <div class="s-9"><input name="search" type="text" placeholder="Search form" title="Search form" /></div>
                                <div class="s-3"><button type="submit">Search</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- TOP NAV -->  
            <div class="line">
                <nav>
                    <p class="nav-text">Main navigation</p>
                    <div class="top-nav">
                        <ul class="right">
                            <li><a href="/">Home</a></li>
                            <li>
                                <a>Category</a>
                                <ul>
                                    @foreach($categories as $value)
                                    <li ><a href="{{ URL::to('category/' . $value->id) }}">{{$value->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a>Contact</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <div class="line">
            <div class="box margin-bottom">
                <div class="margin2x">
                    <!-- ASIDE NAV -->
                    <aside class="s-12 m-4 l-3 xl-2">
                        <h4 class="margin-bottom">Select Tag1</h4>
                        <div class="aside-nav minimize-on-small">
                            <p class="aside-nav-text">Select Tag</p>
                            <ul>
                                @foreach($tags_list as $tag_value)
                                <li><a href="{{ URL::to('tag/' . $tag_value->id) }}">{{$tag_value->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>

                    @yield('content')
                </div>
            </div>
        </div>
        <!-- FOOTER -->
        <footer>
            <div class="line">
                <div class="s-12 l-6">
                    <p>Copyright 2019</p>
                </div>
            </div>
        </footer>
        <script type="text/javascript" src="{{ asset('js/responsee.js') }}"></script> 
        <script type="text/javascript" src="{{ asset('css/owl-carousel/owl.carousel.js') }}"></script>

    </body>
</html>
