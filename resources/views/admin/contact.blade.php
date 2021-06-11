@extends('layouts.admin_layout')
@section('content')

<div class="pt-4"></div>
    <div class="jumbotron bg-white p-3" style="margin-bottom: 10px">
        <h3 class="text-gray">Contact Page</h3>
    </div>
    <form>
        @csrf
<div class="row">
    

    <div class="col-md-11">

        <div class="form-group" style="margin-left: 5%">
            <label>
                <h6>Message</h6>
            </label>
            <input type="text" value="{{$contact? $contact->Message ? $contact->Message:'':''}}" name="message" class="form-control">
        </div>

    </div>

    <div class="col-md-11">

        <div class="form-group" style="margin-left: 5%">
            <label>
                <h6>Email</h6>
            </label>
            <input type="text" value="{{$contact? $contact->EmailId ? $contact->EmailId:'':''}}" name="email" class="form-control">
        </div>

    </div>

    <div class="col-md-11">

        <div class="form-group" style="margin-left: 5%">
            <label>
                <h6>Phone</h6>
            </label>
            <input type="text" name="phone" value="{{$contact? $contact->PhoneNumber ? $contact->PhoneNumber:'':''}}" class="form-control">
        </div>

    </div>

    <div class="col-md-11">

        <div class="form-group" style="margin-left: 5%">
            <label>
                <h6>Map Link</h6>
            </label>
            <input type="text" name="map_link" value="{{$contact? $contact->MapLink ? $contact->MapLink:'':''}}" class="form-control">
        </div>

    </div>

    <div class="col-md-11">

    <button type="submit" id="submit-contact" class="btn btn-secondary mt-5" data-sub="submit"
    style="float: right;margin-bottom:20px;">submit</button>

    </div>



</div>

</form>

@endsection

@section('scripts')

<script src="{{ asset('js/simply-toast.min.js') }}"></script>

<script>

$('#submit-contact').on('click', function(ev) {
            ev.preventDefault();

    let message = $(`input[name="message"]`).val();
    let email = $(`input[name="email"]`).val();
    let phone = $(`input[name="phone"]`).val();
    let map_link = $(`input[name="map_link"]`).val();

    var form = new FormData();

    form.append("_token", "{{csrf_token()}}");
    form.append('message',message)
    form.append('email',email)
    form.append('phone',phone)
    form.append('map_link',map_link)
    
    $.ajax({

        type: "post",
        url: "/contact",
        contentType: false,
        processData: false,

        data: form,

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