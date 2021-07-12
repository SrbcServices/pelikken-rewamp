@extends('layouts.header-frontent')
@section('title')
Peliken.com |About pelikken
@endsection
@section('discription')
ELiKKEN is a non- partisan, non-profit, independent online news web portal dedicated to providing world news from experienced understanding starting from one end to the another. PELiKKEN seeks to gain a narrower glance at the dynamic global and national trends .
@endsection
@section('og-image')
  
         {{asset('img/title_logo/favicon.png')}}
   
@endsection
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