@extends('layouts.admin_layout')
@section('content')






<form>
@csrf
<div style="padding-top: 2%; margin: 0 2%">
    <h5 style="color: grey margin-bottom: 1%;">About Discription</h5>
    <textarea  name="about_discription" id="editor" rows="5" cols="33" required>{{$about->AboutDiscription}}</textarea>

    <button type="submit" id="submit-about" class="btn btn-secondary mt-5" data-sub="submit"
                            style="float: right;margin-bottom:20px;">submit</button>

</div>

</form>


    





@endsection

@section('scripts')
<script src="{{ asset('js/simply-toast.min.js') }}"></script>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    

    CKEDITOR.replace('about_discription');
    //$('#editor').ckeditor();

</script>

<Script>

$(document).on("click", "#submit-about", function(e){
        e.preventDefault();

        CKEDITOR.instances.editor.updateElement();

       let about_discription =$(`textarea[name="about_discription"]`).val();


       var form = new FormData();

       form.append("_token", "{{csrf_token()}}");

       form.append('about_discription',about_discription)

       $.ajax({

        url: "/about",
        type: "post",
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


        
    })

</script>

    
@endsection