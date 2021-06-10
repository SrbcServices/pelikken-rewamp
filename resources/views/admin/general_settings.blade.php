@extends('layouts.admin_layout')
@section('content')

<div>

   
        
   

    <form id="addform">
        @csrf
        <div class="form-group" style="margin-right: 20px; margin-top:0;">
            <label style="color: grey; padding-top: 30px;">Instagram Link</label>
            <input type="social" value="{{$settings->Instagram}}" class="form-control" name="instagram" id="social_media" placeholder="Copy Links">
        </div>

        <div class="form-group" style="margin-right: 20px">
            <label style="color: grey">Facebook Link</label>
            <input type="social" value="{{$settings->Facebook}}" class="form-control" name="facebook" id="social_media" placeholder="Copy Links">
        </div>


        <div class="form-group" style="margin-right: 20px">
            <label style="color: grey">Youtube Link</label>
            <input type="social" value="{{$settings->Youtube}}" class="form-control" name="youtube" id="social_media" placeholder="Copy Links">
        </div>

        <div class="form-group" style="margin-right: 20px">
            <label style="color: grey">Twitter Link</label>
            <input type="social" value="{{$settings->Twitter}}" class="form-control" name="twitter" id="social_media" placeholder="Copy Links">
        </div>


        <div class="form-group">
            <h6 style="font-weight:bold; color: grey">New Logo</h6>
            <label for="logo" style="color: grey"><img src="https://asvs.in/wp-content/uploads/2017/08/dummy.png"></label>
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
        url: "/settings",
        contentType: false,
        processData: false,

        data: form,

        success: function (response) {
            console.log(response)
            if (response.status == 'error') {

                console.log('Error Occured')

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