@extends('layouts.header-frontent')
@section('content')

<div class="container">

    <div class="row">
        <div class="col-10">
            <div class="businerss_news">
                <div class="row">
                    <div class="col-12">
                        <div class="bridcrumb">	<a href="#">Home</a> / World</div>
                    </div>
                </div>
                <div class="row">

                    @if (count($world)>0)

                    @foreach ($world as $worlds)
                        
                  

                    <div class="col-12 ">
                        <div class="single_post post_type3 post_type12 mb30">
                            <div class="post_img">
                                <div class="img_wrap">
                                    <a href="/pelikken/news/{{$worlds->slug}}">
                                        <img src="{{asset('uploads/news/' .$worlds->ThumbImage. '')}}">
                                    </a>
                                </div>
                            </div>
                            <div class="single_post_text">
                                <div class="meta3"> <a href="/news/{{$worlds->category->slug}}">{{$worlds->category->category_name}}</a>
                                    <a href="#">March 26, 2020</a>
                                </div>
                                <h4><a href="/pelikken/news/{{$worlds->slug}}">{{$worlds->NewsHeading}}</a></h4>
                                <div class="space-10"></div>
                                <p class="post-p">{{$worlds->SubHeading}}</p>
                                <div class="space-20"></div> <a href="/pelikken/news/{{$worlds->slug}}" class="readmore">Read more</a>
                            </div>
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



@endsection
