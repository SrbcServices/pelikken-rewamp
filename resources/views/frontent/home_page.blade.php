@extends('layouts.header-frontent')
@section('content')

@if(count($highlights)>0)
<div class="post_gallary_area fifth_bg mb40">
    <div class="container">
        <div class="row">
            @foreach ($highlights as $index => $news)
                
           
@if($index == 0)
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider_demo2">
                            <div class="single_post post_type6 xs-mb30">
                                <div class="post_img gradient1">
                                    <img src="{{asset('/uploads/news/'.$news->ThumbImage.'')}}" alt="" style="width: 100%">
                                </div>
                                <div class="single_post_text" style="padding: 18px 20px">
                                     <div class="meta meta_separator1">	<a href="/news/{{$news->category->slug}}">{{$news->category->category_name}}</a>
                                        <a href="#">March 26, 2020</a>
                                    </div>
                                    <h4><a class="" href="/pelikken/news/{{$news->slug}}">{{substr($news->NewsHeading,0,60)}}</a></h4>
                                    <div class="space-10"></div>
                                   <p class="post-p">{{substr($news->SubHeading,0,140)}}..</p> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 {{-- slides --}}
@endif
@endforeach
<div class="col-lg-6">

    <div class="row">
        @foreach ($highlights as $index => $news)
      @if($index != 0)

        <div class="col-lg-6">
            <div class="slider_demo2">
                <div class="single_post post_type6 xs-mb30">
                    <div class="post_img gradient1">
                        <img src="{{asset('/uploads/news/'.$news->ThumbImage.'')}}" alt="" style="width: 100%">
                    </div>
                    <div class="single_post_text" style="padding: 18px 12px">
                         <div class="meta meta_separator1">	<a href="news/{{$news->category->slug}}">{{$news->category->category_name}}</a>
                            <a href="#">March 26, 2020</a>
                        </div>
                        <h6 ><a  href="/pelikken/news/{{$news->slug}}" class="small" style="font-size: 18px;line-height:20px;">{{substr($news->NewsHeading,0,60)}}</a></h6>
                        
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
      
        


    </div>

    {{-- second row --}}
  
  
</div>


    

 {{-- slides End --}}




        </div>
    </div>
</div>
@endif
{{-- Scetion end --}}

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <h2 class="widget-title">Trending News</h2>
            <div class="carousel_post2_type3 nav_style1 owl-carousel">
                <!--CAROUSEL START-->
                @if(count($trending)>0)
                @foreach ($trending as $index =>$news)
                  @if($index < 4)  
                <div class="single_post post_type3">
                    <div class="post_img">
                        <div class="img_wrap">
                            <img src="{{asset('uploads/news/'.$news->ThumbImage.'')}}" alt="">
                        </div>
                    </div>
                    <div class="single_post_text">
                        <div class="meta3">	<a href="news/{{$news->category->category_name}}">{{$news->category->category_name}}</a>
                            <a href="#">March 26, 2020</a>
                        </div>
                        <h4><a href="/pelikken/news/{{$news->slug}}">{{$news->NewsHeading}}</a></h4>
                        <div class="space-10"></div>
                        <p class="post-p">{{substr($news->SubHeading,0,150)}}</p>
                    </div>
                </div>
                @endif
                @endforeach
               @endif
                
            </div>

{{-- ///////////////////////////// --}}
<div class="row">
    @if(count($trending)>0)
    @foreach ($trending as $index =>$news)
      @if($index < 4)          
      <div class="space-15"></div>
    <div class="col-lg-6">
        <div class="single_post widgets_small">
            <div class="post_img">
                <div class="img_wrap">
                    <img src="{{asset('uploads/news/'.$news->ThumbImage.'')}}" alt="no" loading="lazy">
                </div>
                
            </div>
            <div class="single_post_text">
                <div class="meta2">
                    <a href="/news/{{$news->category->slug}}">{{$news->category->category_name}}</a>
                    <a href="">09-06-2021</a>
                </div>
                <h4>
                    <a href="/pelikken/news/{{$news->slug}}">{{substr($news->NewsHeading,0,40)}}</a>
                </h4>
            </div>
        </div>
        <div class="space-15"></div>
        <div class="border_black"></div>
       



    </div>
     @endif
     @endforeach
     @endif                                      
   
                                           
    
                                            
</div>

















        </div>

    {{-- latest view --}}
@if(count($latest_news)>0)
        <div class="col-lg-4">
            <div class="widget tab_widgets mb30">
                <h2 class="widget-title">Latest News</h2>
                <div class="post_type2_carousel owl-carousel nav_style1">
                    <!--CAROUSEL START-->
                    <div class="single_post2_carousel">
                        @foreach ($latest_news as $index => $news)
                           @if($index <=6) 
                       

                        <div class="single_post widgets_small type8">
                            <div class="post_img">
                                <div class="img_wrap">
                                    <img src="{{asset('uploads/news/'.$news->ThumbImage.'')}}" alt="">
                                </div>
                            </div>
                            <div class="single_post_text">
                                <div class="meta2">	<a href="/news/{{$news->category->category_name}}">{{$news->category->category_name}}</a>
                                    <a href="#">March 26, 2020</a>
                                </div>
                                <h4><a href="/pelikken/news/{{$news->slug}}">{{substr($news->NewsHeading,0,60)}}</a></h4>
                            </div>
                            
                        </div>
                        <div class="space-15"></div>
                        <div class="border_black"></div>
                        <div class="space-15"></div>
                        
                        @endif
                        @endforeach
                        
                        
                        
                    </div>
                        {{-- Slide next column --}}

                    <div class="single_post2_carousel">
                        @foreach ($latest_news as $index => $news)
                           @if($index >=7 ) 
                       

                        <div class="single_post widgets_small type8">
                            <div class="post_img">
                                <div class="img_wrap">
                                    <img src="{{asset('uploads/news/'.$news->ThumbImage.'')}}" alt="">
                                </div>
                            </div>
                            <div class="single_post_text">
                                <div class="meta2">	<a href="/news/{{$news->category->category_name}}">{{$news->category->category_name}}</a>
                                    <a href="#">March 26, 2020</a>
                                </div>
                                <h4><a href="/pelikken/news/{{$news->slug}}">{{substr($news->NewsHeading,0,60)}}</a></h4>
                            </div>
                            
                        </div>
                        <div class="space-15"></div>
                        <div class="border_black"></div>
                        <div class="space-15"></div>
                        
                        @endif
                        @endforeach
                        
                        
                        
                        
                    </div>
                </div>
                <!--CAROUSEL END-->
            </div>


        </div>
@endif

    {{-- latest view end --}}



    </div>
</div>

{{-- under latest view section start --}}

<div class="container">
  
    
    <div class="row">

        <div class="col-lg-8">
            @if(count($trending)>0)
            
            <div class="row">
@foreach ($trending as $index => $news)
    
@if($index >=10)
                <div class="col-lg-6">
                    <div class="single_post widgets_small">
                        <div class="post_img">
                            <div class="img_wrap">
                                <a href="#">
                                    <img src="{{asset('uploads/news/'.$news->ThumbImage.'')}}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="single_post_text">
                            <div class="meta2">	<a href="/news/{{$news->category->category_name}}">{{$news->category->category_name}}</a>
                                <a href="#">March 26, 2020</a>
                            </div>
                            <h4>
                                
                            <a > <h4><a href="/news/{{$news->slug}}">{{substr($news->NewsHeading,0,60)}}</a></h4></a>

                            </h4>	
                        </div>
                    </div>
                    <div class="space-15"></div>
                    <div class="border_black"></div>
                    <div class="space-15"></div>



                </div>
                @endif
                @endforeach


                

                


            </div>
            @endif


        </div>

    </div>
</div>

{{-- under latest view section End --}}
<div class="container">
    <div class="row">
        
{{-- Entertainment News --}}
<div class="col-lg-8">
    <div class="row">
        <div class="col-12">
            <div class="heading">
                <h2 class="widget-title">Featured News </h2>
            </div>
        </div>
    </div>
    <div class="entertrainment_carousel mb30">
        <!--CAROUSEL START-->
        <div class="entertrainment_item">
            <div class="row justify-content-center">
@if(count($global_trending_featured)>0)
@foreach ($global_trending_featured as $news)
    

                <div class="col-md-6">
                    <div class="single_post post_type3 mb30">
                        <div class="post_img">
                            <div class="img_wrap">
                                <a href="#">
                                    <img src="{{asset('uploads/news/'.$news->ThumbImage.'')}}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="single_post_text">
                            <div class="meta3"> <a href="/news/{{$news->category->slug}}">{{$news->category->category_name}}</a>
                                <a href="#">March 26, 2020</a>
                            </div>
                            <h4><a href="/pelikken/news/{{$news->slug}}">{{$news->NewsHeading}}</a></h4>
                            <div class="space-10"></div>
                            <p class="post-p">{{$news->SubHeading}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                
                
                
            </div>
        </div>


    </div>
    <!--CAROUSEL END-->
    @if(count($section_news_main)>0)
    <div class="row">
        <div class="col-12">







@foreach ($section_news_main as $section)
    

            <div class="sports">
                <div class="row">
                    <div class="col-12">
                        <div class="heading">
                            <h2 class="widget-title">{{$section->section_name}}</h2>
                        </div>
                    </div>
                </div>
                @if(count($section->get_category->get_news)>0)
                <div class="row">
                    <div class="col-md-6">
                        <div class="single_post post_type3 mb30">
                            <div class="post_img">
                                <a href="/pelikken/news/{{$section->get_category->get_news[0]->slug}}">
                                    <img src="{{asset('uploads/news/'.$section->get_category->get_news[0]->ThumbImage.'')}}" alt="">
                                </a>
                            </div>
                            <div class="single_post_text">
                                <div class="meta3"> <a href="news/{{$section->get_category->category_name}}">{{$section->get_category->category_name}}</a>
                                    <a href="#">March 26, 2020</a>
                                </div>
                                <h4><a href="/pelikken/news/{{$section->get_category->get_news[0]->slug}}">{{$section->get_category->get_news[0]->NewsHeading}}</a></h4>
                                <div class="space-10"></div>
                                <p class="post-p">{{$section->get_category->get_news[0]->SubHeading}}
                                </p>
                                <div class="space-20"></div> <a href="/pelikken/news/{{$section->get_category->get_news[0]->slug}}" class="readmore">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="sports_carousel owl-carousel nav_style1">
                            <!--CAROUSEL START-->
                            <div class="sports_carousel_item">
                                @foreach ($section->get_category->get_news as $index => $news)
                                    @if($index >= 1 && $index<=5)
                               
                                <div class="single_post widgets_small">
                                    <div class="post_img">
                                        <div class="img_wrap">
                                            <a href="pelikken/news/{{$news->slug}}">
                                                <img src="{{asset('uploads/news/'.$news->ThumbImage.'')}}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="single_post_text">
                                        <div class="meta2"> <a href="/news/{{$section->get_category->slug}}">{{$section->get_category->category_name}}</a>
                                            <a href="#">March 26, 2020</a>
                                        </div>
                                        <h4><a href="pelikken/news/{{$news->slug}}">{{substr($news->NewsHeading,0,60)}}</a></h4>
                                    </div>
                                </div>
                                <div class="space-15"></div>
                                <div class="border_black"></div>
                                <div class="space-15"></div>
                                @endif
                                @endforeach
                                
                                
                               
                            </div>
                            <div class="sports_carousel_item">
                                @foreach ($section->get_category->get_news as $index => $news)
                                @if($index >= 6 && $index<=10)
                                <div class="single_post widgets_small">
                                    <div class="post_img">
                                        <div class="img_wrap">
                                            <a href="/pelikken/news/{{$news->slug}}">
                                                <img src="{{asset('uploads/news/'.$news->ThumbImage.'')}}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="single_post_text">
                                        <div class="meta2"> <a href="/news/{{$section->get_category->slug}}">{{$section->get_category->category_name}}</a>
                                            <a href="#">March 26, 2020</a>
                                        </div>
                                        <h4><a href="/pelikken/news/{{$news->slug}}">{{substr($news->NewsHeading,0,60)}}</a></h4>
                                    </div>
                                </div>
                                <div class="space-15"></div>
                                <div class="border_black"></div>
                                <div class="space-15"></div>
                                @endif
                               
                                    
                                @endforeach
                                
                                
                                
                                
                            </div>
                        </div>
                        <!--CAROUSEL END-->
                    </div>
                </div>
                @endif
            </div>
            @endforeach



        </div>

    </div>
    @endif
    
    
</div>
{{-- Entertainment News End --}}
    {{-- Kerala News --}}

    <div class="col-lg-4">
        <div class="row">
            <div class="col-lg-6 col-lg-12">
                <!--:::::: POST TYPE 4 START :::::::-->
                @if(count($section_news_sidebar)>0)
                @foreach ($section_news_sidebar as $section)
                    
               
                <div class="widget mb30">
                    <h2 class="widget-title">{{$section->section_name}}</h2>
                    @if(count($section->get_category->get_news)>0)
                    <div class="widget4_carousel owl-carousel nav_style1">
                        <!--CAROUSEL START-->
                        <div class="carousel_items">
                            @foreach ($section->get_category->get_news as $index => $news)
                                
                           @if($index<8)
                            <div class="single_post widgets_small widgets_type4">
                                <div class="post_img number">
                                    <img src="{{asset('uploads/news/'.$news->ThumbImage.'')}}" alt="">
                                </div>
                                <div class="single_post_text">
                                    <div class="meta2"> <a href="/news/{{$section->get_category->slug}}">{{$section->get_category->category_name}}</a>
                                        <a href="#">March 26, 2020</a>
                                    </div>
                                    <h4><a href="/pelikken/news/{{$news->slug}}">{{substr($news->NewsHeading,0,60)}}</a></h4>
                                    <div class="space-15"></div>
                                    <div class="border_black"></div>
                                </div>
                            </div>
                            <div class="space-15"></div>
                            @endif
                            @endforeach
                            
                            
                        </div>
                        <div class="carousel_items">
                            
                            @foreach ($section->get_category->get_news as $index => $news)
                                
                           @if($index>8 && $index<16)
                            <div class="single_post widgets_small widgets_type4">
                                <div class="post_img number">
                                    <img src="{{asset('uploads/news/'.$news->ThumbImage.'')}}" alt="">
                                </div>
                                <div class="single_post_text">
                                    <div class="meta2"> <a href="/news/{{$section->get_category->slug}}">{{$section->get_category->category_name}}</a>
                                        <a href="#">March 26, 2020</a>
                                    </div>
                                    <h4><a href="/pelikken/news/{{$news->slug}}">{{substr($news->NewsHeading,0,60)}}</a></h4>
                                    <div class="space-15"></div>
                                    <div class="border_black"></div>
                                </div>
                            </div>
                            <div class="space-15"></div>
                            @endif
                            @endforeach
                            
                            
                            
                            
                        </div>
                    </div>
                    @endif
                    <!--CAROUSEL END-->
                </div>
                @endforeach
@endif




                <!--:::::: POST TYPE 4 END :::::::-->
            </div>
           
        </div>
    </div>

    {{-- kerala News End --}}

    {{-- INDIAN START --}}
   

{{-- INDIAN END --}}
  
    </div>
</div>
@endsection