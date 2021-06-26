@extends('layouts.header-frontent')
@section('content')

<div class="container">

    <div class="row">
        <div class="col-10">
            <div class="businerss_news">
                <div class="row">
                    <div class="col-12">
                        <div class="bridcrumb">	<a href="#">Home</a> / Latest News</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">

                        

                        @if(count($latest_news)>0)
                       
                            
                        @foreach ($latest_news as $latest)
                            
                    
                        <div class="single_post post_type3 post_type12 mb30">
                            <div class="post_img">
                                <div class="img_wrap">
                                    <a href="/pelikken/news/{{$latest->slug}}">

                                        <img src={{ asset('uploads/news/' . $latest->ThumbImage . '')}} style="width:100%, object-fit:cover;">
                                        
                                    </a>
                                </div>   
                            </div>
                            <div class="single_post_text">
                                <div class="meta3"> <a href="/news/{{$latest->category->slug}}">{{$latest->category->category_name}}</a>
                                    <a href=href="/pelikken/news/{{$latest->slug}}"></a>
                                </div>
                                <h4><a href="/pelikken/news/{{$latest->slug}}">{{$latest->NewsHeading}}</a></h4>
                                <div class="space-10"></div>
                                <p class="post-p"> {{$latest->SubHeading}} </p>
                                <div class="space-20"></div> <a href="/pelikken/news/{{$latest->slug}}" class="readmore">Read more</a>
                            </div>
                        </div>

                        @endforeach

                            
                    @else
                    <div class="not-found">
                        <img src="{{asset('images/not-found.png')}}"/>
                    </div>
                    @endif
                   
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
