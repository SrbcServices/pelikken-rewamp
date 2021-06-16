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
                
                    <div class="contact_title">
                        <h3>Address</h3><br>
                    </div>
                
                    <div style="width: 100%;">

                           {!!$contacts->MapLink!!} 
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
                        <textarea name="messege" id="messege" cols="30" rows="5" placeholder="Tell us about your message…"></textarea>
                    </div>
                    <div class="col-12">
                        <div class="space-20"></div>
                        <input class="cbtn1" type="button" id="sent" value="Sent Messege">
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

        $(document).on("click", "#sent", function(e){
                e.preventDefault();
                
        $.ajax({

        type: "post",
        url: "/contacts",


        data:$("#contact_form").serializeArray(),

        success: function (response) {
            console.log(response)
            if (response.status == 'error') {

                $.simplyToast(response.message, 'danger')
                console.log('error')

            } else{
                // $('#addform').load(document.URL + ' #addform');
                $.simplyToast(response.message, 'success')
                console.log('Success')
            }
        },

        });

                

        });


</script>

    
@endsection