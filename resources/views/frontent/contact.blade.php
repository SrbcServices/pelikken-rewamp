@extends('layouts.header-frontent')
@section('title')
Peliken.com | Contact
@endsection
@section('discription')
ELiKKEN is a non- partisan, non-profit, independent online news web portal dedicated to providing world news from experienced understanding starting from one end to the another. PELiKKEN seeks to gain a narrower glance at the dynamic global and national trends .
@endsection
@section('og-image')
  
         {{asset('img/title_logo/favicon.png')}}
   
@endsection
@section('content')
<div class="contacts section-padding">
    <div class="container">
       
        
        <div class="row">
            

                <div class="col-md-6">
                    @if ($contacts)
                    <div class="contact_title">
                        <h3>Address</h3><br>
                    </div>

                    <div style="width: 100%;">

                        {!!$contacts->MapLink!!}
                    </div>
                   @endif
                    
                </div>
                






                <div class="col-md-6" style="margin-top: 15px">
                    @if ($contacts)


                    <h3 style="margin-bottom: 15px">{{$contacts->Message}}</h3>
                    @endif
                    <form id="contact_form" action="index.html">
                        <div class="row">

                            @csrf
                            <div class="col-lg-6">
                                <input type="text" name="full_name" placeholder="Full Name">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="subject" placeholder="Subject">
                            </div>
                            <div class="col-lg-6">
                                <input type="email" name="email" placeholder="Email Adress">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="phone" placeholder="Phone Number">
                            </div>
                            <div class="col-12">
                                <textarea name="messege" id="messege" cols="30" rows="5"
                                    placeholder="Tell us about your message…"></textarea>
                            </div>
                            <div class="col-12">
                                <div class="space-20"></div>
                                <button class="cbtn1"  id="sent" >Send Message</button>
                            </div>

                        </div>
                    </form>
                </div>


            </div>
          
        </div>
    </div>

  

    @endsection

    @section('scripts')

    <script src="{{ asset('js/simply-toast.min.js') }}"></script>

    <script>

        $(document).on("click", "#sent", function (e) {
            e.preventDefault();

            $.ajax({

                type: "post",
                url: "/contacts",


                data: $("#contact_form").serializeArray(),
                beforeSend:function(){
                    $('#sent').html('<i class="fa fa-spinner" aria-hidden="true"></i>')
                },

                success: function (response) {
                   
                    if (response.status == 'error') {

                        $.simplyToast(response.message, 'danger')
                        $('#sent').html('Send Image')

                    } else {
                       $('#contact_form').trigger('reset');
                        $.simplyToast(response.message, 'success')
                        $('#sent').html('Send Image')
                    }
                },

            });



        });


    </script>


    @endsection