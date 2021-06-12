@extends('layouts.header-frontent')
@section('content')
<div class="contacts section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="box single_contact_box">
                    <h6>Email Id :{{$contacts->EmailId}}</h6><br>
                    <h6>Phone :{{$contacts->PhoneNumber}}</h6>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box single_contact_box">
                    <div class="contact_title">
                        <h3>Headquarters</h3>
                    </div>
                    <div class="contact_details">
                        <div class="contact_details_icon">	<i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>

                           <iframe src="" frameborder="0">{{$contacts->MapLink}}</iframe> 
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">

    <div class="cotact_form" style="margin-top: 3%">

    <div class="row">

     

        <div class="col-md-12">
      

            <h3>{{$contacts->Message}}</h3>

        </div>

        




        <div class="col-md-12">
            <form action="index.html">
                <div class="row">
                    <div class="col-lg-6">
                        <input type="text" placeholder="Full Name">
                    </div>
                    <div class="col-lg-6">
                        <input type="text" placeholder="Subject">
                    </div>
                    <div class="col-lg-6">
                        <input type="email" placeholder="Email Adress">
                    </div>
                    <div class="col-lg-6">
                        <input type="text" placeholder="Phone Number">
                    </div>
                    <div class="col-12">
                        <textarea name="messege" id="messege" cols="30" rows="5" placeholder="Tell us about your message…"></textarea>
                    </div>
                    <div class="col-12">
                        <div class="space-20"></div>
                        <input class="cbtn1" type="button" value="Sent Messege">
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>

</div>

    
@endsection