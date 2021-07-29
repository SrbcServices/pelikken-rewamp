@extends('layouts.admin_layout')
@section('content')

<div class="pt-4"></div>
<div class="jumbotron bg-white p-3" style="margin-bottom: 10px">
    <h3 class="text-gray">General Settings</h3>
</div>

<div>


    <form id="addform">
        @csrf
        <div class="form-group" style="margin-right: 20px; margin-top:0;">
            <label style="color: grey; padding-top: 30px;">Instagram Link</label>
            <input type="social" value="{{$settings? $settings->Instagram ? $settings->Instagram : '' :'' }}" class="form-control" name="instagram" id="social_media" placeholder="Copy Links">
    
        </div>

        <div class="form-group" style="margin-right: 20px">
            <label style="color: grey">Facebook Link</label>
            <input type="social" value="{{$settings? $settings->Facebook ? $settings->Facebook : '' :'' }}" class="form-control" name="facebook" id="social_media" placeholder="Copy Links">
          
        </div>


        <div class="form-group" style="margin-right: 20px">
            <label style="color: grey">Youtube Link</label>
            <input type="social" value="{{$settings? $settings->Youtube ? $settings->Youtube : '' :'' }}" class="form-control" name="youtube" id="social_media" placeholder="Copy Links">

        </div>

        <div class="form-group" style="margin-right: 20px">
            <label style="color: grey">Twitter Link</label>
            <input type="social" value="{{$settings? $settings->Twitter ? $settings->Twitter : '' :'' }}" class="form-control" name="twitter" id="social_media" placeholder="Copy Links">
          
        </div>


        <div class="form-group">
            <h6 style="font-weight:bold; color: grey">New Logo</h6>
            <label for="logo" style="color: grey"><img src="{{asset('images/dummy.png')}}"></label>
            <input type="file" name="newlogo" class="form-control-file" id="logo" style="display: none">
        </div>


        <div class="form-group">
            <button id="submit" class="btn btn-secondary mt-3 mb-3 ml-2" >Submit</button>
        </div>
    </div>
          




    </form>
    

    
@endsection
@section('scripts')

<script src="{{ asset('js/simply-toast.min.js') }}"></script>

<script>


        $(document).on("click", "#submit", function(e){
        e.preventDefault();
        let instagram = $(`input[name="instagram"]`).val();
        let facebook = $(`input[name="facebook"]`).val();
        let youtube = $(`input[name="youtube"]`).val();
        let twitter = $(`input[name="twitter"]`).val();
        let newlogo = $(`input[name="newlogo"]`)[0].files;

        var form = new FormData();

form.append("_token", "{{csrf_token()}}");
form.append('instagram',instagram)
form.append('facebook',facebook)
form.append('youtube',youtube)
form.append('twitter',twitter)
form.append('newlogo',newlogo[0])


        $.ajax({

        type: "post",
        url: "/admin/settings",
        contentType: false,
        processData: false,

        data: form,
        beforeSend:function(){
            $('#submit').html('<i class="fa fa-spinner" aria-hidden="true"></i>')
        },

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