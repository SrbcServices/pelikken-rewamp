@extends('layouts.header-frontent')
@section('content')

<div class="inner_table">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bridcrumb">	<a href="#">Home</a>/ {{$main ? ucfirst($main):''}}  / {{$sub ? ucfirst($sub) : ''}}</div>
            </div>
        </div>
    </div>
</div>
<!--::::: INNER TABLE AREA END :::::::-->

<!--::::: ARCHIVE AREA START :::::::-->
<div class="archives padding-top-30">
    <div class="container">
        <div class="row">
        <div class="col-md-6 col-lg-8">
              @if(count($news)>0)
            <div class="row">
                    <div class="col-12 align-self-center">
                       
                        <div class="categories_title">
                            <h5>Category: <a href="#">@if($main){{ucfirst($main)}} @endif</a></h5>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">

                @if(count($news)>0)
                    @foreach ($news as $item)
    


                    <div class="col-lg-6">
                        <div class="single_post post_type3 mb30">
                            <div class="post_img">
                                <div class="img_wrap">
                                    <img src="{{asset('uploads/news/'.$item->ThumbImage.'')}}" alt="">
                                </div>
                            </div>
                            <div class="single_post_text">
                                <div class="meta3">	<a href="#">{{$item->category->category_name}}</a>
                                    <a href="#">March 26, 2020</a>
                                </div>
                                <h4><a href="post1.html">{{substr($item->NewsHeading,0,100)}}</a></h4>
                                <div class="space-10"></div>
                                <p class="post-p">{{$item->SubHeading}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach                  
                @endif                    
                   
                    

                </div>
                @endif
               
            </div>
            

            <div class="col-md-6 col-lg-4">
                <div class="widget_tab md-mt-30">
                    <ul class="nav nav-tabs">
                        <li><a class="active" data-toggle="tab" href="#post1">LATEST NEWS</a>
                        </li>
                        <li><a data-toggle="tab" href="#post2" class="">HIGHLIGHTS</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="post1" class="tab-pane fade in active show">
                            <div class="widget tab_widgets mb30">
                                @if(count($latest_global_news))
                                @foreach ($latest_global_news as $news)
                                    
                            
                                <div class="single_post widgets_small">
                                    <div class="post_img">
                                        <div class="img_wrap">
                                            <a href="#">
                                                <img src="{{asset('uploads/news/'.$news->ThumbImage.'')}}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="single_post_text">
                                        <div class="meta2 meta_separator1">	<a href="#">{{$news->category->category_name}}</a>
                                            <a href="#">March 26, 2020</a>
                                        </div>
                                        <h4><a href="">{{substr($news->NewsHeading,0,50)}}</a></h4>
                                    </div>
                                </div>
                                <div class="space-15"></div>
                                <div class="border_black"></div>
                                <div class="space-15"></div>
                                @endforeach
                                @endif
                                
                                
                            </div>
                        </div>
                        <div id="post2" class="tab-pane fade">
                            <div class="widget tab_widgets mb30">
                                @if(count($global_news_highlights)>0)
                                @foreach ($global_news_highlights as $news)
                                    
                                @endforeach

                                <div class="single_post widgets_small">
                                    <div class="post_img">
                                        <div class="img_wrap">
                                            <a href="#">
                                                <img src="{{asset('uploads/news/'.$news->ThumbImage.'')}}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="single_post_text">
                                        <div class="meta2 meta_separator1">	<a href="#">{{$news->category->category_name}}</a>
                                            <a href="#">March 26, 2020</a>
                                        </div>
                                        <h4><a href="">{{substr($news->NewsHeading,0,50)}}</a></h4>
                                    </div>
                                </div>
                                <div class="space-15"></div>
                                <div class="border_black"></div>
                                <div class="space-15"></div>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!--:::::: POST TYPE 4 END :::::::-->
                
              
                <!--:::::: POST TYPE 2 END:::::::-->
                
                <!--:::::: POST TYPE 4 START :::::::-->
            </div>
        </div>
    </div>
</div>
    
@endsection