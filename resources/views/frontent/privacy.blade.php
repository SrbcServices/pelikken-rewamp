@extends('layouts.header-frontent')
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