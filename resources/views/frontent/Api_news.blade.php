@extends('layouts.header-frontent')
@section('content')


<div class="archives post post1 padding-top-30">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 col-lg-8 m-auto">
                <div class="bridcrumb"> <a href="#">Home</a> / news / prnewswire</div>
            </div>
        </div>
        <div class="space-30"></div>
        <div class="row">
            <div class="col-12 col-md-10 col-lg-8 m-auto">

                @if (count($api['data']['multimedia']) >0)
                    
               <img src="{{$api['data']['multimedia'][0]['url']}}" alt="">
              
               
               @endif
              
                <div class="space-20"></div>
                <div class="single_post_heading">
                  
                    <h1>{{$api['data']['title']}}</h1>
                  
                </div>
                <div class="space-20"></div>
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <div class="author">
                            <div class="author_img">
                                <div class="author_img_wrap">
                                    <img src="" alt="">
                                </div>
                            </div> <a href="#">prnewswire</a>
                            <ul>
                                <li><a href="#"></a>
                                </li>
                                <li>Updated </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <div class="author_social inline text-right">
                            <ul>
                                
                                <li><a href="https://www.facebook.com/sharer/sharer.php?{{url()->current()}}" target="_blank" ><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li><a href="https://www.linkedin.com/shareArticle?{{url()->current()}}"

                                     target="_blank" ><i class="fab fa-linkedin"></i></a>
                                </li>
                                
                                <li><a href="https://twitter.com/intent/tweet?{{url()->current()}}"><i class="fab fa-twitter"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="space-30"></div>
                
                <div class="space-20"></div>
                <div>
                   {!!$api['data']['body']!!}
                </div>
                <br><br>
                
                
               
                <div class="space-20"></div>
                
                <div class="space-20"></div>

                <div class="discription" style="border: 1px solid red; padding: 20px;">
                    <h6 style="padding-bottom: 10px"><u style="color: #307773;">DISCLAIMER</u></h6>

                    <p>This story is provided by Cision PR Newswire India. PELiKKEN will not be responsible in any way for the content of this article. </p>
                    <p>This story is auto-generated from a syndicated feed.</p>

                </div>
                <div class="space-20"></div>
                <div class="space-20"></div>
                <div class="space-20"></div>

            </div>
        </div>
    </div>
    {{-- latest News --}}

    
    @endsection
