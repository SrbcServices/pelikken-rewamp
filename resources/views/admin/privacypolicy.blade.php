@extends('layouts.admin_layout')
@section('content')
<div class="pt-4"></div>
<div class="jumbotron bg-white p-3" style="margin-bottom: 10px">
    <h3 class="text-gray">Privacy and Policy</h3>
</div>

<form>
    @csrf
    <div style="padding-top: 2%; margin: 0 2%">
        <h5 style="color: grey margin-bottom: 1%;">Privacy and Policy of  Pelikken</h5>
        <textarea  name="privacy_policy" id="editor" rows="5" cols="33" required>{{$privacy? $privacy->PrivacyPolicy ? $privacy->PrivacyPolicy:'':''}}</textarea>
    
        <button type="submit" id="submit-privacy" class="btn btn-secondary mt-5" data-sub="submit"
                                style="float: right;margin-bottom:20px;">submit</button>
    
    </div>
    

</form>
    
@endsection
@section('scripts')
    
<script src="{{ asset('js/simply-toast.min.js') }}"></script>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    

    CKEDITOR.replace('privacy_policy');
    //$('#editor').ckeditor();

</script>
<script>

$(document).on("click", "#submit-privacy", function(e){
        e.preventDefault();

        CKEDITOR.instances.editor.updateElement();

       let privacy_policy =$(`textarea[name="privacy_policy"]`).val();


       var form = new FormData();

       form.append("_token", "{{csrf_token()}}");

       form.append('privacy_policy',privacy_policy)

       $.ajax({

        url: "/admin/privacy",
        type: "post",
        contentType: false,
        processData: false,

        data: form,

        success: function (response) {
            console.log(response)
            if (response.status == 'error') {

                $.simplyToast(response.message, 'danger')
          

            } else{
              
                $.simplyToast(response.message, 'success')
            
            }
        },

});
        
    })


</script>

@endsection