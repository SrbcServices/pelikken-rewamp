@extends('layouts.header-frontent')
@section('content')

<div class="inner_table">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bridcrumb">	<a href="#">Home</a>/prnewswire</div>
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
            
            <div class="row">
                    
                </div>
                <div class="row justify-content-center">

              
                    @foreach ($api as $item)
    


                    <div class="col-lg-6">
                        <div class="single_post post_type3 mb30">
                            
                            <div class="single_post_text">
                                <div class="meta3">	<a href="">{{$item['company'][0]}}</a>
                                    <a href="#">{{ date('d-m-Y', strtotime($item['date'])) }}</a>
                                </div>
                                <h4><a href="/api/news_wire/{{$item['release_id']}}">{{$item['title']}}</a></h4>
                                <div class="space-10"></div>
                               
                            </div>
                        </div>
                    </div>
                    @endforeach                  
                          
                   
                    

                </div>
                     
             
               
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
                                            <a href="/pelikken/news/{{$news->slug}}">
                                                <img src="{{asset('uploads/news/'.$news->ThumbImage.'')}}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="single_post_text">
                                        <div class="meta2 meta_separator1">	<a href="/news/{{$news->category->slug}}">{{$news->category->category_name}}</a>
                                            <a href="#">{{ $news->local }}</a>
                                        </div>
                                        <h4><a href="/pelikken/news/{{$news->slug}}">{{substr($news->NewsHeading,0,50)}}</a></h4>
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
                                    
                               

                                <div class="single_post widgets_small">
                                    <div class="post_img">
                                        <div class="img_wrap">
                                            <a href="/pelikken/news/{{$news->slug}}">
                                                <img src="{{asset('uploads/news/'.$news->ThumbImage.'')}}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="single_post_text">
                                        <div class="meta2 meta_separator1">	<a href="/news/{{$news->category->slug}}">{{$news->category->category_name}}</a>
                                            <a href="#">{{ $news->local }}</a>
                                        </div>
                                        <h4><a href="/pelikken/news/{{$news->slug}}">{{substr($news->NewsHeading,0,50)}}</a></h4>
                                    </div>
                                </div>
                                <div class="space-15"></div>
                                <div class="border_black"></div>
                                <div class="space-15"></div>
                                @endforeach
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