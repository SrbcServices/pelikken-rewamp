@extends('layouts.header-frontent')
@section('content')
    
<div class="container">
    <div class="row">

        <div class="col-8 col-lg-8">
            <div class="businerss_news">
            

                <div class="row">
                    <div class="col-12">
                        <div class="bridcrumb">	<a href="#">Home /@if($main){{ucfirst($main)}} @endif </a></div>
                    </div>
                </div>
                <div class="row">

                    @if (count($news)>0)
                    @foreach ($news as $newses)
                        
                    <div class="col-12">
                        <div class="single_post post_type3 post_type12 mb30">
                            <div class="post_img">
                                <div class="img_wrap">
                                    <a href="/pelikken/news/{{$newses->slug}}">
                                        <img src="{{asset('/uploads/news/' .$newses->ThumbImage )}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="single_post_text">
                                <div class="meta3"> <a href="/news/{{$newses->category->slug}}">{{$newses->category->category_name}}</a>
                                    <a href="#">March 26, 2020</a>
                                </div>
                                <h4><a href="/pelikken/news/{{$newses->slug}}">{{$newses->NewsHeading}}</a></h4>
                                <div class="space-10"></div>
                                <p class="post-p">{{$newses->SubHeading}}</p>
                                <div class="space-20"></div> <a href="/pelikken/news/{{$newses->slug}}" class="readmore">Read more</a>
                            </div>
                        </div>
                        
                    </div>

                    @endforeach

                    <div class="d-flex" style="margin-top: 30px; Margin-bottom: 30px">
                        {{ $news->links('pagination::bootstrap-4') }}
                    </div>
                        
                    @else
                    <div class="not-found">
                        <img src="{{asset('images/not-found.png')}}"/>
                    </div>
@endif

                </div>
            </div>
        </div>

        
        
       
        <div class="col-md-4 col-lg-4 mt-5">
            <div class="widget_tab md-mt-30">
                <ul class="nav nav-tabs">
                    <li><a class="active" data-toggle="tab" href="#post1">FEATURED</a>
                    </li>
                    <li><a data-toggle="tab" href="#post2" class="">HIGHLIGHTS</a>
                    </li>
                </ul>

                

                <div class="tab-content">

                    @if (count($global_feature_featured)>0)
                    @foreach ($global_feature_featured as $featured)

                    <div id="post1" class="tab-pane fade in active show">
                        <div class="widget tab_widgets mb30">

                            <div class="single_post widgets_small">
                                <div class="post_img">
                                    <div class="img_wrap">
                                        <a href="/pelikken/news/{{$featured->slug}}">
                                            <img src="{{asset('/uploads/news/' .$featured->ThumbImage)}}" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="single_post_text">
                                    <div class="meta2 meta_separator1">	<a href="/news/{{$featured->category->slug}}">{{$featured->category->category_name}}</a>
                                        <a href="#">March 26, 2020</a>
                                    </div>
                                    <h4><a href="/pelikken/news/{{$featured->slug}}">{{substr($featured->NewsHeading,0,100)}}</a></h4>
                                </div>
                            </div>
                            <div class="space-15"></div>
                            <div class="border_black"></div>
                            <div class="space-15"></div>
                            
                        </div>
                    </div>

                    @endforeach
                    @endif

                    
                        
                    @if (count($global_news_highlights)>0)
                    @foreach ($global_news_highlights as $highlights)

                    <div id="post2" class="tab-pane fade">

                    

                        <div class="widget tab_widgets mb30">
                            <div class="single_post widgets_small">
                                <div class="post_img">
                                    <div class="img_wrap">
                                        <a href="/pelikken/news/{{$highlights->slug}}">
                                            <img src="{{asset('/uploads/news/' .$highlights->ThumbImage)}}" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="single_post_text">
                                    <div class="meta2 meta_separator1">	<a href="/news/{{$highlights->category->slug}}">{{$highlights->category->category_name}}</a>
                                        <a href="#">March 26, 2020</a>
                                    </div>
                                    <h4><a href="/pelikken/news/{{$highlights->slug}}">{{substr($highlights->NewsHeading,0,60)}}</a></h4>
                                </div>
                            </div>
                            <div class="space-15"></div>
                            <div class="border_black"></div>
                            <div class="space-15"></div>
                            
                        </div>
                
                    </div>
                    @endforeach
                        
                    @endif
                </div>
            </div>

            <!--:::::: POST TYPE 4 END :::::::-->
            
          
            <!--:::::: POST TYPE 2 END:::::::-->
            
            <!--:::::: POST TYPE 4 START :::::::-->
        </div>

             
        
            
        


    </div>
</div>


@endsection