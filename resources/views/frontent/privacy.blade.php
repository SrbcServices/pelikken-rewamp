@extends('layouts.header-frontent')
@section('title')
Peliken.com | Privacy & Policy
@endsection
@section('discription')
ELiKKEN is a non- partisan, non-profit, independent online news web portal dedicated to providing world news from experienced understanding starting from one end to the another. PELiKKEN seeks to gain a narrower glance at the dynamic global and national trends .
@endsection
@section('og-image')
  
         {{asset('img/title_logo/favicon.png')}}
   
@endsection
@section('content')

<div class="container mb-5 mt-5">
    <div class="row ">
        <div class="col-12">
            <h3 class="mt-5">Privacy &amp; Policy</h3>
            @if($privacy)
            <div class="container-content-privacy">
                {!!$privacy->PrivacyPolicy!!}
            </div>
            @endif
        </div>
    </div>
</div>

@endsection