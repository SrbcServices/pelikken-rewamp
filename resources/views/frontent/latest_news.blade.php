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
                        <div class="single_post post_type3 post_type12 mb30">
                            <div class="post_img">
                                <div class="img_wrap">
                                    <a href="#">
                                        <img src="{{asset('/img/Headerfrontend/sider-top.jpg')}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="single_post_text">
                                <div class="meta3"> <a href="#">uiux.subash</a>
                                    <a href="#">March 26, 2020</a>
                                </div>
                                <h4><a href="post1.html">Copa America: Luis Suarez from devastated
                                        US</a></h4>
                                <div class="space-10"></div>
                                <p class="post-p">The property, complete with 30-seat screening from
                                    room, a 100-seat amphitheater and a swimming pond with…</p>
                                <div class="space-20"></div> <a href="#" class="readmore">Read more</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
