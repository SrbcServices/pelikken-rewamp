<!DOCTYPE html>
<html lang="en">

<head>
    <title>HEADER</title>
    <!-- META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--::::: FABICON ICON :::::::-->
    <link rel="icon" href="{{asset('/img/Headerfrontend/fabicon.png')}}">
    <!--::::: ALL CSS FILES :::::::-->
    
    <link rel="stylesheet" href="{{asset('/css/Headerfrontent/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/Headerfrontent/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/Headerfrontent/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('/css/Headerfrontent/modal-video.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/Headerfrontent/stellarnav.css')}}">
    <link rel="stylesheet" href="{{asset('/css/Headerfrontent/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('/css/Headerfrontent/slick.css')}}">
    <link rel="stylesheet" href="{{asset('/css/Headerfrontent/theme.css')}}">
    
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
        <div class="close_btn"> <i class="fal fa-times"></i>
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

                            @if (count($global_trending_featured)>0)
                            @foreach ($global_trending_featured as $trending)
                            <div class="trancarousel_item"> 
                            
                                <p><a href="/pelikken/news/{{$trending->slug}}">{{$trending->NewsHeading}}</a>
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
                            <p>Thursday, March 26, 2020</p>
                        </div>
                        <div class="social1">
                            <ul class="inline">
                                @if(generalDetails())
                                <li><a href="{{generalDetails()->Twitter}}"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li><a href="{{generalDetails()->Facebook}}"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li><a href="{{generalDetails()->Youtube}}"><i class="fab fa-youtube"></i></a>
                                </li>
                                <li><a href="{{generalDetails()->Instagram}}"><i class="fab fa-instagram"></i></a>
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
                            @if(generalDetails())
                            <img src="{{asset('/uploads/logo/'.generalDetails()->LogoImageName.'')}}">
                            @endif
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 align-self-center">
                    {{-- <div class="banner1">
                        <a href="#">
                            <img src="{{asset('/img/Headerfrontend/banner.jpg')}}">
                        </a>
                    </div> --}}
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

                    <div class="col-10 col-lg-10">
                        <div class="newsprk_nav stellarnav">
                            <ul id="newsprk_menu">
                                <li><a href="/">Home <i class="fal fa-angle-down"></i></a>
                                    
                                </li>
                                <li><a href="/latest-news">Latest News <i class="fal fa-angle-down"></i></a>
                                    
                                </li>
                             @if(count(quantinent())>0)
                                <li><a href="/world">World <i class="fal fa-angle-down"></i></a>
                             
                                 
                                    <ul>
                                        @foreach (quantinent() as $condinent)
                                        <li><a href="/world/{{$condinent->slug}}">{{$condinent->Condinent_Name}}<i class="fal fa-angle-right"></i></a>
                                            @if(count($condinent->country)>0)
                                              <ul>
                                                @foreach ($condinent->country as $country)
                                                   <li><a href="/world/{{$condinent->slug}}/{{$country->slug}}">{{$country->country_name}}</a>
                                                   </li>
                                                @endforeach
                                               </ul>
                                               
                                            @endif
                                        </li>
                                        
                                        @endforeach
                                       
                                    </ul>
                           

                                </li>
                                @endif
                              
                               

                                @if(count(menu_helper())>0)
                                @foreach (menu_helper() as $category)
                                <li><a href="/news/{{$category->slug}}">{{$category->category_name}}<i class="fal fa-angle-down"></i></a>
                                    @if(count($category->get_subcategories)>0)
                                    <ul>
                                        
                                            @foreach ($category->get_subcategories as $item)
                                            <li><a href="/news/{{$category->slug}}/{{$item->slug}}">{{$item->sub_category_name}}</a>
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

                    <div class="col-2 col-lg-2 align-self-center">
                        <div class="menu_right">
                            <div class="users_area">
                                <ul class="inline">
                                    <li class="search_btn"><i class="far fa-search"></i>
                                    </li>
                                    {{-- <li><i class="fal fa-user-circle"></i>
                                    </li> --}}
                                </ul>
                            </div>
                            
                            <div class="temp d-none d-lg-block">
                                <div class="temp_wap">
                                    <div class="temp_icon">
                                        <img src="{{asset('/img/Headerfrontend/temp.png')}}">
                                    </div>
                                    <h3 class="temp_count">13</h3>
                                    <p>San Francisco</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
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
                                @if(generalDetails())
                                <img src="{{asset('uploads/logo/'.generalDetails()->LogoImageName.'')}}">
                                @endif
                            </a>
                        </div>
                        <div class="social2">
                            @if(generalDetails())
                            <ul class="inline">
                                <li><a href="{{generalDetails()->Twitter}}"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li><a href="{{generalDetails()->Facebook}}"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li><a href="{{generalDetails()->Youtube}}"><i class="fab fa-youtube"></i></a>
                                </li>
                                <li><a href="{{generalDetails()->Instagram}}"><i class="fab fa-instagram"></i></a>
                                </li>
                            </ul>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 offset-lg-2 align-self-center">
                        <div class="signup_form">
                            <form action="index.html" method="post">
                                <input class="signup" type="email" placeholder="Your email address">
                                <input type="button" style="background-color: #307773" class="cbtn" value="sign up">
                            </form>
                            <p>We hate spam as much as you do</p>
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
                                
                                @if(count(get_category())>0)
                               <?php $count = count(get_category())/2;
                             
                                
                                
                                ?>
                                <h3 class="widget-title2">News categories</h3>
                                <div class="row">
                                  
                                    <div class="col-lg-6">
                                        <ul>
                                            @foreach (get_category() as $index => $cat)
                                            @if($index < round($count))
                                            <li><a href="/news/{{$cat->slug}}">{{$cat->category_name}}</a>
                                            </li>
                                            @endif
                                            @endforeach
                                            
                                            
                                        </ul>
                                    </div>
                                    <div class="col-lg-6">
                                        <ul>
                                            @foreach (get_category() as $index => $cat)
                                            @if($index >= round($count))
                                            <li><a href="/news/{{$cat->slug}}">{{$cat->category_name}}</a>
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
                                 
                                @if(count(quantinent())>0)
                               <?php $count = count(quantinent())/2;
                             
                                
                                
                                ?>
                                <h3 class="widget-title2">Living</h3>
                                <div class="col-lg-6">
                                    <ul>
                                        @foreach (quantinent() as $index => $cat)
                                        @if($index < round($count))
                                        <li><a href="/world/{{$cat->slug}}">{{$cat->Condinent_Name}}</a>
                                        </li>
                                        @endif
                                        @endforeach
                                        
                                        
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul>
                                        @foreach (quantinent() as $index => $cat)
                                        @if($index >= round($count))
                                        <li><a href="/world/{{$cat->slug}}">{{$cat->Condinent_Name}}</a>
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
                        @if(count($global_trending_featured)>0)
                        @foreach ($global_trending_featured as $index => $news)
                        @if($index<2)
                        <div class="single_extra_news border_white_bottom">
                            <p>{{$news->category->category_name}} /<span>{{$news->local}}</span>
                            </p> <a href="/pelikken/news/{{$news->slug}}">{{$news->NewsHeading}}</a>
                            
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
                                    <li><a href="">Terms & Condition</a>
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
    <!--::::: FOOTER AREA END :::::::-->
    <!--ALL JS FILE-->

	<script src="{{asset('/js/frontent/jquery.2.1.0.min.js')}}"></script>
	<script src="{{asset('/js/frontent/bootstrap.min.js')}}"></script>
	<script src="{{asset('/js/frontent/jquery.nav.js')}}"></script>
	<script src="{{asset('/js/frontent/jquery.waypoints.min.js')}}"></script>
	<script src="{{asset('/js/frontent/jquery-modal-video.min.js')}}"></script>
	<script src="{{asset('/js/frontent/owl.carousel.js')}}"></script>
	<script src="{{asset('/js/frontent/popper.min.js')}}"></script>
	<script src="{{asset('/js/frontent/circle-progress.js')}}"></script>
	<script src="{{asset('/js/frontent/slick.min.js')}}"></script>
	<script src="{{asset('/js/frontent/stellarnav.js')}}"></script>
	<script src="{{asset('/js/frontent/wow.min.js')}}"></script>
	<script src="{{asset('/js/frontent/main.js')}}"></script>
    @yield('scripts')
</body>

</html>