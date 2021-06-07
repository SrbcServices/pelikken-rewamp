@extends('layouts.header-frontent')
@section('content')
    
<div class="container">
    <div class="row">

        <div class="col-8 col-lg-8">
            <div class="businerss_news">
                <div class="row">
                    <div class="col-12">
                        <div class="bridcrumb">	<a href="#">Home</a> / Finance</div>
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

        <div class="col-md-4 col-lg-4">
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
                            <div class="single_post widgets_small">
                                <div class="post_img">
                                    <div class="img_wrap">
                                        <a href="#">
                                            <img src="{{asset('/img/Headerfrontend/sider-top.jpg')}}" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="single_post_text">
                                    <div class="meta2 meta_separator1">	<a href="#">TECHNOLOGY</a>
                                        <a href="#">March 26, 2020</a>
                                    </div>
                                    <h4><a href="post1.html">Copa America: Luis Suarez from devastated US</a></h4>
                                </div>
                            </div>
                            <div class="space-15"></div>
                            <div class="border_black"></div>
                            <div class="space-15"></div>
                            
                        </div>
                    </div>
                    <div id="post2" class="tab-pane fade">
                        <div class="widget tab_widgets mb30">
                            <div class="single_post widgets_small">
                                <div class="post_img">
                                    <div class="img_wrap">
                                        <a href="#">
                                            <img src="{{asset('/img/Headerfrontend/sider-top.jpg')}}" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="single_post_text">
                                    <div class="meta2 meta_separator1">	<a href="#">TECHNOLOGY</a>
                                        <a href="#">March 26, 2020</a>
                                    </div>
                                    <h4><a href="post1.html">Copa America: Luis Suarez from devastated US</a></h4>
                                </div>
                            </div>
                            <div class="space-15"></div>
                            <div class="border_black"></div>
                            <div class="space-15"></div>
                            
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


@endsection