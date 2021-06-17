@extends('layouts.header-frontent')
@section('content')

<div class="container mb-5 mt-5">
    <div class="row ">
        <div class="col-12">
            <h3 class="mt-5">Terms &amp; Condition</h3><br>
            @if($terms)
            <div class="container-content-privacy">
                {!!$terms->TermsCondition!!}
            </div>
            @endif
        </div>
    </div>
</div>



@endsection