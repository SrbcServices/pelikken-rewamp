<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <!-- META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <meta name="description" content="@yield('discription')">
    <meta property="og:image" content="@yield('og-image')"/>
    <!--::::: FABICON ICON :::::::-->
    <link rel="icon" href="{{ asset('img/title_logo/favicon.jpg') }}">
    <!--::::: ALL CSS FILES :::::::-->

    <link rel="stylesheet" href="{{ asset('/css/Headerfrontent/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/Headerfrontent/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/Headerfrontent/fontawesome.css') }}">

    <link rel="stylesheet" href="{{ asset('/css/Headerfrontent/stellarnav.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/Headerfrontent/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/Headerfrontent/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/Headerfrontent/theme.css') }}">

</head>

<body class="theme-1">

    <div class="searching">
        <div class="container">
            <div class="row">
                <div class="col-8 text-center m-auto">
                    <div class="v1search_form">
                        <form action="/search?q=" method="get">
                            <input type="search" placeholder="Search Here..." name="query_param">
                            <button type="submit" class="cbtn1">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="close_btn">  <i class="fal fa-times"></i>
        </div>
    </div>
    <!--:::::SEARCH FORM END :::::::-->
    <!--::::: TOP BAR START :::::::-->
    <div class="topbar white_bg" id="top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-8 align-self-center">
                    <div class="trancarousel_area">
                        <p class="trand">Trending</p>
                        <div class="trancarousel owl-carousel nav_style1">

                            @if (count($global_trending_featured) > 0)
                            @foreach ($global_trending_featured as $trending)
                            <div class="trancarousel_item">

                                <p><a href="/pelikken/news/{{ $trending->slug }}">{{ $trending->NewsHeading }}</a>
                                </p>

                            </div>
                            @endforeach
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 align-self-center">
                    <div class="top_date_social text-right">
                        <div class="paper_date">
                            <p id="date_now"></p>
                        </div>
                        <div class="social1">
                            <ul class="inline">
                                @if (generalDetails())
                                <li><a href="{{ generalDetails()->Twitter }}"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li><a href="{{ generalDetails()->Facebook }}"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li><a href="{{ generalDetails()->Youtube }}"><i class="fab fa-youtube"></i></a>
                                </li>
                                <li><a href="{{ generalDetails()->Instagram }}"><i class="fab fa-instagram"></i></a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--::::: TOP BAR END :::::::-->
    <div class="border_black"></div>
    <!--::::: LOGO AREA START  :::::::-->
    <div class="logo_area white_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 align-self-center">
                    <div class="logo">
                        <a href="/">
                            @if (generalDetails())
                            <img src="{{ asset('/uploads/logo/' . generalDetails()->LogoImageName . '') }}"
                                class="nm-logo">
                            @endif
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 align-self-center">
                    <div class="banner1">

                        <div class="col-lg-8 align-self-center" style="width: 100%">
                            <div class="menu_right">
                                <div class="users_area">
                                    <ul class="inline">
                                        <li class="search_btn"><i class="far fa-search"></i>
                                        </li>
                                    </ul>
                                </div>

                                <div class="temp d-none d-lg-block">
                                    <div class="temp_wap">
                                        <div class="temp_icon">
                                            <img id="img_loc" src="">
                                        </div>
                                        <h3 id="temp"></h3>
                                        <p id="location"></p>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--::::: LOGO AREA END :::::::-->

    <!--::::: MENU AREA START  :::::::-->

    <div class="main-menu" id="header"> <a href="#top" class="up_btn up_btn1"><i
                class="far fa-chevron-double-up"></i></a>
        <div class="main-nav clearfix is-ts-sticky">
            <div class="container">
                <div class="row justify-content-between">

                    <div class="col-12 col-lg-12">
                        <div class="newsprk_nav stellarnav ">

                            <ul id="newsprk_menu">
                                <li><a href="/">Home <i class="fal fa-angle-down"></i></a>

                                </li>
                                <li><a href="/latest-news">Latest News <i class="fal fa-angle-down"></i></a>

                                </li>
                                @if (count(quantinent()) > 0)
                                <li><a href="/world">World <i class="fal fa-angle-down"></i></a>


                                    <ul>
                                        @foreach (quantinent() as $condinent)
                                        <li><a href="/world/{{ $condinent->slug }}">{{ $condinent->Condinent_Name }}<i
                                                    class="fal fa-angle-right"></i></a>
                                            @if (count($condinent->country) > 0)
                                            <ul>
                                                @foreach ($condinent->country as $country)
                                                <li><a href="/world/{{ $condinent->slug }}/{{ $country->slug }}">{{
                                                        $country->country_name }}</a>
                                                </li>
                                                @endforeach
                                            </ul>

                                            @endif
                                        </li>

                                        @endforeach

                                    </ul>


                                </li>
                                @endif



                                @if (count(menu_helper()) > 0)
                                @foreach (menu_helper() as $category)
                                <li><a href="/news/{{ $category->slug }}">{{ $category->category_name }}<i
                                            class="fal fa-angle-down"></i></a>
                                    @if (count($category->get_subcategories) > 0)
                                    <ul>

                                        @foreach ($category->get_subcategories as $item)
                                        <li><a href="/news/{{ $category->slug }}/{{ $item->slug }}">{{
                                                $item->sub_category_name }}</a>
                                        </li>
                                        @endforeach



                                    </ul>
                                    @endif
                                </li>
                                @endforeach

                                @endif

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>


    <!--HEADER END-->

    @yield('content')
    {{-- section start --}}




    <!--Footer Start-->
    <div class="footer footer_area1 primay_bg">
        <div class="container">
            <div class="cta">
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <div class="footer_logo logo">
                            <a href="index.html">
                                @if (generalDetails())
                                <img src="{{ asset('uploads/logo/' . generalDetails()->LogoImageName . '') }}">
                                @endif
                            </a>
                        </div>
                        <div class="social2">
                            @if (generalDetails())
                            <ul class="inline">
                                <li><a href="{{ generalDetails()->Twitter }}"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li><a href="{{ generalDetails()->Facebook }}"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li><a href="{{ generalDetails()->Youtube }}"><i class="fab fa-youtube"></i></a>
                                </li>
                                <li><a href="{{ generalDetails()->Instagram }}"><i class="fab fa-instagram"></i></a>
                                </li>
                            </ul>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 offset-lg-2 align-self-center">

                        <div class="signup_form">

                            <form id="subscribers">
                                @csrf

                                <input class="signup" type="email" placeholder="Your email Address" name="subs"
                                    required>
                                <input type="button" value="Register"
                                    style="background-color: #307773; text-transform: none;" class="cbtn btn-secondary"
                                    id="sub-submit">


                            </form>



                            <p class="infoo"></p>

                        </div>



                    </div>
                </div>
            </div>
            <div class="border_white"></div>
            <div class="space-40"></div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-sm-6 col-lg">
                            <div class="single_footer_nav border_white_right">

                                @if (count(get_category()) > 0)
                                <?php $count = count(get_category()) / 2; ?>
                                <h3 class="widget-title2">News categories</h3>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <ul>
                                            @foreach (get_category() as $index => $cat)
                                            @if ($index < round($count)) <li><a href="/news/{{ $cat->slug }}">{{
                                                    $cat->category_name }}</a>
                                                </li>
                                                @endif
                                                @endforeach


                                        </ul>
                                    </div>
                                    <div class="col-lg-6">
                                        <ul>
                                            @foreach (get_category() as $index => $cat)
                                            @if ($index >= round($count))
                                            <li><a href="/news/{{ $cat->slug }}">{{ $cat->category_name }}</a>
                                            </li>
                                            @endif
                                            @endforeach


                                        </ul>
                                    </div>

                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg">
                            <div class="single_footer_nav">

                                @if (count(quantinent()) > 0)
                                <?php $count = count(quantinent()) / 2; ?>
                                <h3 class="widget-title2">Living</h3>
                                <div class="col-lg-6">
                                    <ul>
                                        @foreach (quantinent() as $index => $cat)
                                        @if ($index < round($count)) <li><a href="/world/{{ $cat->slug }}">{{
                                                $cat->Condinent_Name }}</a>
                                            </li>
                                            @endif
                                            @endforeach


                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul>
                                        @foreach (quantinent() as $index => $cat)
                                        @if ($index >= round($count))
                                        <li><a href="/world/{{ $cat->slug }}">{{ $cat->Condinent_Name }}</a>
                                        </li>
                                        @endif
                                        @endforeach


                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="space-40"></div>
                    <div class="border_white"></div>
                    <div class="space-40"></div>


                </div>
                <div class="col-lg-4">
                    <div class="extra_newss border_white_left pl-4">
                        <h3 class="widget-title2">Trending news</h3>
                        @if (count($global_trending_featured) > 0)
                        @foreach ($global_trending_featured as $index => $news)
                        @if ($index < 2) <div class="single_extra_news border_white_bottom">
                            <p>{{ $news->category->category_name }} /<span>{{ $news->local }}</span>
                            </p> <a href="/pelikken/news/{{ $news->slug }}">{{ $news->NewsHeading }}</a>

                    </div>
                    @endif
                    @endforeach

                    @endif



                </div>
            </div>
        </div>
    </div>


    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <p>&copy; Copyright 2020, All Rights Reserved</p>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="copyright_menus text-right">
                        <div class="language"></div>
                        <div class="copyright_menu inline">
                            <ul>
                                <li><a href="/about">About</a>
                                </li>
                                <li><a href="/terms&condition">Terms & Condition</a>
                                </li>
                                <li><a href="/privacy&policy">Privacy & Policy</a>
                                </li>
                                <li><a href="/contacts">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    {{-- cookies show --}}

    <div class="card cookie-alert" style="padding: 10px;">
        <div class="card-body">
            <h5 class="card-title">&#x1F36A; Do you like cookies?</h5> <br>
            <p class="card-text">We use cookies to ensure you get the best experience on our website.</p> <br>
            <div class="btn-toolbar justify-content-end">
                <a href="/about" target="_blank" class="btn btn-link">Learn more</a>
                <a href="#" class="btn btn-primary accept-cookies">Accept</a>
            </div>
        </div>
    </div>

    {{-- Cookies End --}}
    <!--::::: FOOTER AREA END :::::::-->
    <!--ALL JS FILE-->
    <script>
        (function () {
            "use strict";

            var cookieAlert = document.querySelector(".cookie-alert");
            var acceptCookies = document.querySelector(".accept-cookies");

            cookieAlert.offsetHeight; // Force browser to trigger reflow (https://stackoverflow.com/a/39451131)

            if (!getCookie("acceptCookies")) {
                cookieAlert.classList.add("show");
            }

            acceptCookies.addEventListener("click", function () {
                setCookie("acceptCookies", true, 60);
                cookieAlert.classList.remove("show");
            });
        })();

        // Cookie functions stolen from w3schools
        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }

        function getCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) === ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) === 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }
    </script>

    <script src="{{ asset('/js/frontent/jquery.2.1.0.min.js') }}"></script>
    <script src="{{ asset('/js/frontent/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/frontent/jquery.nav.js') }}"></script>
    <script src="{{ asset('/js/frontent/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('/js/frontent/jquery-modal-video.min.js') }}"></script>
    <script src="{{ asset('/js/frontent/owl.carousel.js') }}"></script>
    <script src="{{ asset('/js/frontent/popper.min.js') }}"></script>


    <script src="{{ asset('/js/frontent/stellarnav.js') }}"></script>
    <script src="{{ asset('/js/frontent/wow.min.js') }}"></script>
    <script src="{{ asset('/js/frontent/slick.min.js') }}"></script>

    <script src="{{ asset('/js/main.js')}}"></script>

    <script src="https://pelikken.com/js/whether.js"></script>
    <script>
        $('#sub-submit').on('click', function () {
            $.ajax({
                type: "post",
                url: "/subscribe",
                data: $('#subscribers').serialize(),
                success: function (response) {
                    if (response.status == 'success') {
                        $('.infoo').html(response.message).css('color', 'green')
                    } else {
                        $('.infoo').html(response.message).css('color', 'red')
                    }
                }
            })
        })

        //menu hide

       
    </script>
    @yield('scripts')

</body>

</html>