@extends('layouts.header-frontent')

@section('content')
<div class="inner_table">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bridcrumb">	<a href="#">Home</a> / Exclusive</div>
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
                    <div class="col-12 align-self-center">
                        <div class="categories_title">
                            <h5>Category: <a href="#">Exclusive</a></h5>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="single_post post_type3 mb30">
                            <div class="post_img">
                                <div class="img_wrap">
                                    <img src="{{asset('/img/Headerfrontend/sider-top.jpg')}}" alt="">
                                </div>
                            </div>
                            <div class="single_post_text">
                                <div class="meta3">	<a href="#">TECHNOLOGY</a>
                                    <a href="#">March 26, 2020</a>
                                </div>
                                <h4><a href="post1.html">Japan’s virus success has puzzled the world. Is its luck running out?</a></h4>
                                <div class="space-10"></div>
                                <p class="post-p">The property, complete with 30-seat screening from room, a 100-seat amphitheater and a swimming pond with sandy shower…</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 d-md-none d-lg-block">
                        <div class="single_post post_type3 mb30">
                            <div class="post_img">
                                <div class="img_wrap">
                                    <img src="{{asset('/img/Headerfrontend/sider-top.jpg')}}" alt="">
                                </div>
                            </div>
                            <div class="single_post_text">
                                <div class="meta3">	<a href="#">TECHNOLOGY</a>
                                    <a href="#">March 26, 2020</a>
                                </div>
                                <h4><a href="post1.html">Japan’s virus success has puzzled the world. Is its luck running out?</a></h4>
                                <div class="space-10"></div>
                                <p class="post-p">The property, complete with 30-seat screening from room, a 100-seat amphitheater and a swimming pond with sandy shower…</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-12">
        
                           
                        
                        <ul class="pagination">
                            {{-- <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true"><i class="fas fa-caret-left"></i></span>
                                </a>
                            </li>
                            <li class="page-item"><a class="" href="#">1</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next"> <span aria-hidden="true"><i class="fas fa-caret-right"></i></span>
                                </a>
                            </li> --}}

                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>

                        </ul>
                    </div> 
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
</div>
    
@endsection