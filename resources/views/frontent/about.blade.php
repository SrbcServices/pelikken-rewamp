@extends('layouts.header-frontent')
@section('content')
<div class="inner_table shadow5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bridcrumb">	<a href="#">Home</a> / About</div>
            </div>
        </div>
        <div class="space-50"></div>
        <div class="row">
            @if($about)
            <div class="col-12">
                <div class="author_about">
                    <div class="author_img">
                        <div class="author_wrap">
                            @if(generalDetails())
                            <img src="{{asset('/uploads/logo/'.generalDetails()->LogoImageName.'')}}" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="author_content">	<a href="#">{{$about->heading}}</a>
                        <ul class="inline">
                            <li>{{$about->slogan}}</li>
                           
                        </ul>
                    </div>
                  
                    {!!
                     $about->AboutDiscription
                     
                     !!}
                   
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="space-50"></div>
</div>
@endsection